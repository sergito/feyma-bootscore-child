<?php
/**
 * @package Bootscore Child
 *
 * @version 6.0.0
 */

// Exit if accessed directly
defined('ABSPATH') || exit;


/**
 * void debug ( mixed Var [, bool Exit] )
*/
if (!function_exists("debug")) {
  function debug($var, $exit = false) {
      echo "\n<pre>";

      if (is_array($var) || is_object($var)) {
          echo htmlentities(print_r($var, true));
      }
      elseif (is_string($var)) {
          echo "string(" . strlen($var) . ") \"" . htmlentities($var) . "\"\n";
      }
      else {
          var_dump($var);
      }
      echo "</pre>";

      if ($exit) {
          exit;
      }
  }
}

// REMOVE WP EMOJI
remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
remove_action( 'wp_print_styles', 'print_emoji_styles' );
remove_filter( 'wp_mail', 'wp_staticize_emoji_for_email' );
remove_filter( 'the_content_feed', 'wp_staticize_emoji' );
remove_filter( 'comment_text_rss', 'wp_staticize_emoji' );


/**
 * Enable cart page
 */
add_filter('bootscore/skip_cart', '__return_false');


/*************************************************
## Theme Setup
*************************************************/ 

if ( ! isset( $content_width ) ) $content_width = 960;

function shopwise_theme_setup() {
	
	add_theme_support( 'title-tag' );
	remove_theme_support( 'automatic-feed-links' );
	add_theme_support( 'post-thumbnails' );
    add_theme_support( 'custom-background' );
	//add_theme_support( 'post-formats', array('gallery', 'audio', 'video'));
	add_theme_support( 'wc-product-gallery-lightbox' );
	add_theme_support( 'wc-product-gallery-slider' );
	add_theme_support( 'woocommerce', array('gallery_thumbnail_image_width' => 99,'thumbnail_image_width' => 90,) );
	
	remove_theme_support( 'widgets-block-editor' );

    add_theme_support('custom-logo', array(
        'height'      => 65,  // Altura máxima del logo en píxeles
        'width'       => 180,  // Ancho máximo del logo en píxeles
        'flex-height' => true, // Permite ajustar la altura si se quiere
        'flex-width'  => true, // Permite ajustar el ancho si se quiere
    ));

}
add_action( 'after_setup_theme', 'shopwise_theme_setup' );


/**
 * Enqueue scripts and styles
 */
add_action('wp_enqueue_scripts', 'bootscore_child_enqueue_styles');
function bootscore_child_enqueue_styles() {

  // Compiled main.css
  $modified_bootscoreChildCss = date('YmdHi', filemtime(get_stylesheet_directory() . '/assets/css/main.css'));
  wp_enqueue_style('main', get_stylesheet_directory_uri() . '/assets/css/main.css', array('parent-style','bi','aos-css'), $modified_bootscoreChildCss);

  // style.css
  wp_enqueue_style('parent-style', get_template_directory_uri() . '/style.css');
  wp_enqueue_style( 'bi', 'https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css', false, '1.11');

  wp_enqueue_style( 'aos-css', 'https://unpkg.com/aos@2.3.1/dist/aos.css', false, '2.3');
  //wp_enqueue_style( 'bi', 'https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css', false, '1.11');
  
  // Scripts:
  wp_register_script('aos-js', 
		'https://unpkg.com/aos@2.3.1/dist/aos.js',
		array('jquery'),
		wp_get_theme()->get('Version'), 
		true );
  wp_enqueue_script('aos-js');

  // Get modification time. Enqueue file with modification date to prevent browser from loading cached scripts when file content changes. 
  $modificated_CustomJS = date('YmdHi', filemtime(get_stylesheet_directory() . '/assets/js/custom.js'));
  wp_enqueue_script('custom-js', get_stylesheet_directory_uri() . '/assets/js/custom.js', array('jquery','aos-js'), $modificated_CustomJS, false, true);
}


// Mostrar badges sobre la imagen del producto - uno debajo del otro
// Remover el código de debugging anterior y usar este:
add_action('woocommerce_before_shop_loop_item_title', 'mostrar_badges_sobre_imagen', 15);

function mostrar_badges_sobre_imagen() {
    global $product;
    
    // Verificar si es un producto variable
    if ($product->is_type('variable')) {
        $attributes = $product->get_variation_attributes();
    } else {
        $attributes = $product->get_attributes();
    }
    
    if (empty($attributes)) {
        return;
    }
    
    echo '<div class="product-badges-absolute">';
    
    $badges_mostrados = 0;
    
    // Lista de atributos a buscar (ajusta estos slugs según lo que veas en el debug)
    $atributos_config = array(
        'pa_chip' => array('class' => 'badge-chip', 'color' => '#5F4B8B'),
        'pa_color' => array('class' => 'badge-color', 'color' => '#F7B32B'),
        'pa_disco' => array('class' => 'badge-disco', 'color' => '#EF4444'),
        'pa_pantalla' => array('class' => 'badge-pantalla', 'color' => '#5F4B8B'),
        'pa_marca' => array('class' => 'badge-marca', 'color' => '#3B82F6'),
        'pa_memoria' => array('class' => 'badge-memoria', 'color' => '#3B82F6'),
        'pa_almacenamiento' => array('class' => 'badge-almacenamiento', 'color' => '#10B981'),
    );
    
    // Intentar obtener cada atributo
    foreach ($atributos_config as $slug => $config) {
        if ($badges_mostrados >= 4) break; // Máximo 2 badges
        
        // Para productos variables
        if ($product->is_type('variable') && isset($attributes[$slug])) {
            $values = $attributes[$slug];
            if (!empty($values) && is_array($values)) {
                echo '<span class="product-badge ' . esc_attr($config['class']) . '">' . esc_html($values[0]) . '</span>';
                $badges_mostrados++;
            }
        } 
        // Para productos simples con atributos de taxonomía
        else {
            $terms = wp_get_post_terms($product->get_id(), $slug, array('number' => 1));
            if (!empty($terms) && !is_wp_error($terms)) {
                echo '<span class="product-badge ' . esc_attr($config['class']) . '">' . esc_html($terms[0]->name) . '</span>';
                $badges_mostrados++;
            }
        }
    }
    
    echo '</div>';
}


// Script para el botón "Comprar ahora" - funciona para productos simples y variables
add_action('wp_footer', 'comprar_ahora_script');

function comprar_ahora_script() {
    if (!is_product()) return;
    ?>
    <script type="text/javascript">
    jQuery(document).ready(function($) {
        // Para productos variables
        $(document).on('click', '#comprar-ahora-btn', function(e) {
            e.preventDefault();
            
            var $addToCartBtn = $('.single_add_to_cart_button');
            var $form = $('form.variations_form');
            
            // Verificar si hay variaciones sin seleccionar
            if ($form.find('.variations select').length > 0) {
                var allSelected = true;
                $form.find('.variations select').each(function() {
                    if ($(this).val() === '') {
                        allSelected = false;
                    }
                });
                
                if (!allSelected) {
                    alert('Por favor selecciona todas las opciones del producto');
                    return;
                }
            }
            
            // Deshabilitar el botón temporalmente
            var $btnBuyNow = $(this);
            $btnBuyNow.prop('disabled', true);
            $btnBuyNow.html('<i class="bi bi-hourglass-split"></i> Procesando...');
            
            // Agregar al carrito
            $addToCartBtn.trigger('click');
            
            // Esperar y redirigir
            setTimeout(function() {
                window.location.href = '<?php echo esc_url(wc_get_checkout_url()); ?>';
            }, 1000);
        });
        
        // Para productos simples
        $(document).on('click', '#comprar-ahora-btn-simple', function(e) {
            e.preventDefault();
            
            var $form = $(this).closest('form.cart');
            var $addToCartBtn = $form.find('.single_add_to_cart_button');
            
            // Deshabilitar el botón temporalmente
            var $btnBuyNow = $(this);
            $btnBuyNow.prop('disabled', true);
            $btnBuyNow.html('<i class="bi bi-hourglass-split"></i> Procesando...');
            
            // Agregar al carrito mediante AJAX para productos simples
            var formData = $form.serialize();
            
            $.ajax({
                type: 'POST',
                url: wc_add_to_cart_params.wc_ajax_url.toString().replace('%%endpoint%%', 'add_to_cart'),
                data: formData,
                success: function(response) {
                    if (response.error) {
                        alert('Hubo un error al agregar el producto al carrito');
                        $btnBuyNow.prop('disabled', false);
                        $btnBuyNow.html('<i class="bi bi-lightning-charge-fill"></i> Comprar ahora');
                    } else {
                        // Redirigir al checkout
                        window.location.href = '<?php echo esc_url(wc_get_checkout_url()); ?>';
                    }
                },
                error: function() {
                    // Si falla el AJAX, intentar submit normal
                    $form.append('<input type="hidden" name="buy-now" value="1">');
                    $form.submit();
                }
            });
        });
    });
    </script>
    <?php
}

// Redirigir al checkout si viene desde "Comprar ahora" (fallback para productos simples)
add_filter('woocommerce_add_to_cart_redirect', 'redirigir_comprar_ahora');

function redirigir_comprar_ahora($url) {
    if (isset($_REQUEST['buy-now']) && $_REQUEST['buy-now'] == '1') {
        return wc_get_checkout_url();
    }
    return $url;
}

//Limpiar br en los widgets de texto:
remove_filter('widget_text_content', 'wpautop');


add_action( 'woocommerce_shop_loop_item_title', 'show_product_category_logo', 5 );

function show_product_category_logo() {
  global $product;

  $terms = get_the_terms( $product->get_id(), 'product_cat' );
  if ( empty( $terms ) || is_wp_error( $terms ) ) return;

  // Elegir la primera categoría con imagen
  foreach ( $terms as $term ) {
    $thumbnail_id = get_term_meta( $term->term_id, 'thumbnail_id', true );
    if ( $thumbnail_id ) {
      $image = wp_get_attachment_image_url( $thumbnail_id, 'full' );
      echo '<div class="product-category-logo">';
      echo '<img src="' . esc_url( $image ) . '" alt="' . esc_attr( $term->name ) . '">';
      echo '</div>';
      break;
    }
  }
}


// Abrir wrapper Billing
/*
add_action( 'woocommerce_before_checkout_billing_form', function () {
  echo '<div class="checkout-step checkout-step-billing active">';
});

// Cerrar wrapper Billing
add_action( 'woocommerce_after_checkout_billing_form', function () {
  echo '</div>';
});

// Envolver Shipping
add_action( 'woocommerce_before_checkout_shipping_form', function () {
  echo '<div class="checkout-step checkout-step-shipping">';
});

add_action( 'woocommerce_after_checkout_shipping_form', function () {
  echo '</div>';
});

// Envolver Payment
add_action( 'woocommerce_review_order_before_payment', function () {
  echo '<div class="checkout-step checkout-step-payment">';
});

add_action( 'woocommerce_review_order_after_payment', function () {
  echo '</div>';
});



add_action( 'woocommerce_before_checkout_form', function () {
  ?>
  <div class="checkout-steps-nav">
    <button type="button" data-step="billing" class="active">Datos</button>
    <button type="button" data-step="shipping">Envío</button>
    <button type="button" data-step="payment">Pago</button>
  </div>
  <?php
}, 5 );
*/
