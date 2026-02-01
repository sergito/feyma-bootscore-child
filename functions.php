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



// --- FUNCIONALIDAD FILTROS EN MOBILE ESTILO TIENDA NUBE ---
if ( ! function_exists( 'woocommerce_result_count' ) ) {
    function woocommerce_result_count() {
        global $wp_query;
        $total = $wp_query->found_posts;

        echo '<div class="d-flex justify-content-between align-items-center woocommerce-result-count-wrapper">';

        // Texto del contador
        echo '<div class="woocommerce-result-count mb-0 d-lg-block d-none">';
        echo esc_html( $total ) . ' productos';
        echo '</div>';

        // Botón Filtrar
        echo '<button class="' . apply_filters(
            'bootscore/class/sidebar/button',
            'd-lg-none btn btn-outline-dark mb-0 d-flex justify-content-between align-items-center'
        ) . '" type="button" data-bs-toggle="offcanvas" data-bs-target="#sidebar" aria-controls="sidebar">';
        echo '<i class="bi bi-sliders"></i> ' . esc_html__( 'Filtrar', 'bootscore' );
        echo '</button>';

        echo '</div>';
    }
}


// --- CAMBIAR TEXTO BOTON SINGLE ADD TO CART ---
/*
add_filter( 'woocommerce_product_single_add_to_cart_text', function() {
    return __( 'Agregar', 'bootscore' );
});
*/

// --- CAMBIAR TEXTO BOTON ADD TO CART EN SHOP ---
add_filter( 'woocommerce_product_add_to_cart_text', 'custom_add_to_cart_text_shop' );
function custom_add_to_cart_text_shop() {
    return 'Agregar'; 
}


// --- Cambiar cantidad y columnas de productos relacionados ---
add_filter( 'woocommerce_output_related_products_args', 'custom_woocommerce_related_products', 20 );
function custom_woocommerce_related_products( $args ) {
    $args['posts_per_page'] = 8; // Número de productos a mostrar
    $args['columns'] = 4;        // Número de columnas
    return $args;
}


// --- Personalizar Boton "Finalizar compra" en Checkout ---
add_filter( 'woocommerce_order_button_html', 'personalizar_boton_finalizar_compra' );

function personalizar_boton_finalizar_compra( $button_html ) {
    // Creamos nuestro botón con clases personalizadas
    $nuevo_boton = '<button type="submit" class="btn-lg btn btn-primary" id="place_order" name="woocommerce_checkout_place_order" value="Iniciar el pago">
    <i class="bi bi-bag-check me-2"></i><span>Iniciar el pago</span></button>';
    return $nuevo_boton;
}

// --- Personalizar Botón "Proceed to Checkout" en Carrito ---
add_filter( 'gettext', 'cambiar_texto_carrito', 20, 3 );

function cambiar_texto_carrito( $translated_text, $text, $domain ) {
    if ( $domain === 'woocommerce' ) {
        switch ( $text ) {
            case 'Proceed to checkout':
                $translated_text = 'Iniciar compra';
                break;
            case 'Finalizar compra':
                $translated_text = 'Iniciar compra';
                break;
        }
    }
    return $translated_text;
}

// --- Ocultar Shipping Calculator, Cupón y Envío en el Carrito ---
add_action( 'wp_enqueue_scripts', 'ocultar_elementos_carrito', 100 );

function ocultar_elementos_carrito() {
    if ( is_cart() ) {
        // Agregar CSS inline para ocultar elementos del carrito
        wp_add_inline_style( 'bootscore-child-style', '
            /* Ocultar shipping calculator */
            .woocommerce-shipping-calculator,
            .shipping-calculator-form,
            .shipping-calculator-button {
                display: none !important;
            }

            /* Ocultar cupón */
            .coupon,
            .woocommerce-form-coupon-toggle,
            form.checkout_coupon {
                display: none !important;
            }

            /* Ocultar fila de envío en totales */
            .cart-subtotal + tr,
            tr.woocommerce-shipping-totals,
            .woocommerce-shipping-destination,
            .shipping-calculator-button {
                display: none !important;
            }
        ' );
    }
}

// --- Deshabilitar cupones en el carrito (pero mantenerlos en checkout) ---
add_filter( 'woocommerce_coupons_enabled', 'deshabilitar_cupones_solo_carrito' );

function deshabilitar_cupones_solo_carrito( $enabled ) {
    if ( is_cart() ) {
        return false;
    }
    return $enabled;
}


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

	  // Page Hero V2 - Hero header épico para páginas internas
	  $modified_pageHeroV2 = date('YmdHi', filemtime(get_stylesheet_directory() . '/assets/css/page-hero-v2.css'));
	  wp_enqueue_style('page-hero-v2', get_stylesheet_directory_uri() . '/assets/css/page-hero-v2.css', array('main'), $modified_pageHeroV2);

	  // Page Contacto - Estilos mejorados para página de contacto
	  $modified_pageContacto = date('YmdHi', filemtime(get_stylesheet_directory() . '/assets/css/page-contacto.css'));
	  wp_enqueue_style('page-contacto', get_stylesheet_directory_uri() . '/assets/css/page-contacto.css', array('main'), $modified_pageContacto);

	  // Page Mi Cuenta - Estilos mejorados para WooCommerce Mi Cuenta
	  $modified_pageMiCuenta = date('YmdHi', filemtime(get_stylesheet_directory() . '/assets/css/page-mi-cuenta.css'));
	  wp_enqueue_style('page-mi-cuenta', get_stylesheet_directory_uri() . '/assets/css/page-mi-cuenta.css', array('main'), $modified_pageMiCuenta);

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
  
      // Solo en páginas de producto
	  if ( is_product() ) {
			
		wp_enqueue_script( 
			'variation-buttons-js', 
			get_stylesheet_directory_uri() . '/assets/js/variation-buttons.js',
			array('jquery'),
			'1.0.0',
			true
		);
		
      }

	  // Get modification time. Enqueue file with modification date to prevent browser from loading cached scripts when file content changes.
	  $modificated_CustomJS = date('YmdHi', filemtime(get_stylesheet_directory() . '/assets/js/custom.js'));
	  wp_enqueue_script('custom-js', get_stylesheet_directory_uri() . '/assets/js/custom.js', array('jquery','aos-js'), $modificated_CustomJS, false, true);

	  // Contact & Newsletter JS
	  wp_enqueue_script('contact-newsletter-js', get_stylesheet_directory_uri() . '/assets/js/contact-newsletter.js', array('jquery'), wp_get_theme()->get('Version'), true);

	  // Checkout Steps JS - Only on checkout page
	  if (is_checkout() && !is_wc_endpoint_url('order-received')) {
		wp_enqueue_script('checkout-steps-js', get_stylesheet_directory_uri() . '/assets/js/checkout-steps.js', array('jquery'), wp_get_theme()->get('Version'), true);
	  }
}


// Mostrar badges sobre la imagen del producto - uno debajo del otro
add_action('woocommerce_before_shop_loop_item_title', 'mostrar_badges_etiquetas_sobre_imagen', 15);

function mostrar_badges_etiquetas_sobre_imagen() {
    global $product;
    
    // Obtener las etiquetas del producto
    $tags = wp_get_post_terms($product->get_id(), 'product_tag', array('fields' => 'all'));
    
    if (empty($tags) || is_wp_error($tags)) {
        return;
    }
    
    echo '<div class="product-badges-absolute">';
    
    $badges_mostrados = 0;
    $max_badges = 3; // Máximo de badges a mostrar
    
    // Array de colores que se usarán secuencialmente
    $colores = array('#3D3180', '#DC9C2E', '#3B82F6', '#10B981', '#EF4444', '#8B5CF6');
    
    // Recorrer las etiquetas del producto
    foreach ($tags as $index => $tag) {
        if ($badges_mostrados >= $max_badges) break;
        
        // Seleccionar color secuencialmente y volver a empezar cuando se termine el array
        $color = $colores[$index % count($colores)];
        
        echo '<span class="product-badge" style="background-color: ' . esc_attr($color) . ';">' 
             . esc_html($tag->name) . 
             '</span>';
        
        $badges_mostrados++;
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


//add_action( 'woocommerce_after_add_to_cart_button', 'mensaje_personalizado_producto' );
/*
function mensaje_personalizado_producto() {
    ?>
        <div class="trust-badges">
            <div class="trust-item">
                <i class="bi bi-shield-check"></i>
                <span>Garantía oficial ASUS</span>
            </div>
            <div class="trust-item">
                <i class="bi bi-truck"></i>
                <span>Envío gratis</span>
            </div>
            <div class="trust-item">
                <i class="bi bi-arrow-clockwise"></i>
                <span>30 días devolución</span>
            </div>
            <div class="trust-item">
                <i class="bi bi-credit-card"></i>
                <span>Pago seguro</span>
            </div>
        </div>

        <div class="product-share">
            <span>Compartir:</span>
            <a href="#" class="share-btn" title="Facebook">
                <i class="bi bi-facebook"></i>
            </a>
            <a href="#" class="share-btn" title="Twitter">
                <i class="bi bi-twitter-x"></i>
            </a>
            <a href="#" class="share-btn" title="WhatsApp">
                <i class="bi bi-whatsapp"></i>
            </a>
            <a href="#" class="share-btn" title="Copiar enlace">
                <i class="bi bi-link-45deg"></i>
            </a>
        </div>
    <?php
}
*/

//Limpiar br en los widgets de texto:
remove_filter('widget_text_content', 'wpautop');


// Mostrar imagen de la marca en card:
add_action( 'woocommerce_shop_loop_item_title', 'show_product_brand_logo', 5 );

function show_product_brand_logo() {
    global $product;

    // Obtener las marcas del producto (taxonomía product_brand de WooCommerce)
    $terms = get_the_terms( $product->get_id(), 'product_brand' );
    
    if ( empty( $terms ) || is_wp_error( $terms ) ) return;

    // Elegir la primera marca con imagen
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


// Mostrar atributos en card:
add_action( 'woocommerce_shop_loop_item_title', 'mostrar_badges_sobre_imagen', 11 );

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
    
    echo '<div class="product-specs">';
    
    $badges_mostrados = 0;
    $max_badges = 6; // Máximo de badges a mostrar
    
    // Atributos a excluir
    $atributos_excluidos = array('pa_color', 'pa_accesorio', 'pa_categoria', 'pa_idioma', 'pa_ram');
    
    // Iconos por atributo
    $iconos_atributos = array(
        'pa_chip' => 'bi bi-cpu',
        'pa_procesador' => 'bi bi-cpu',
        'pa_gpu' => 'bi bi-gpu-card',
        'pa_tarjeta-grafica' => 'bi bi-gpu-card',
        'pa_disco' => 'bi bi-hdd',
        'pa_almacenamiento' => 'bi bi-hdd',
        'pa_pantalla' => 'bi bi-display',
        'pa_display' => 'bi bi-display',
        'pa_memoria' => 'bi bi-memory',
        'pa_marca' => 'bi bi-tag',
        'pa_sistema-operativo' => 'bi bi-windows',
        'pa_bateria' => 'bi bi-battery-charging',
        'pa_peso' => 'bi bi-box',
        'pa_tamano' => 'bi bi-rulers',
        'pa_conectividad' => 'bi bi-wifi',
        'pa_puertos' => 'bi bi-usb-symbol',
    );
    
    // Recorrer todos los atributos del producto
    foreach ($attributes as $slug => $attribute_data) {
        if ($badges_mostrados >= $max_badges) break;
        
        // Saltar atributos excluidos
        if (in_array($slug, $atributos_excluidos)) {
            continue;
        }
        
        // Obtener el icono según el slug del atributo
        $icono = '';
        if (isset($iconos_atributos[$slug])) {
            $icono = '<i class="' . esc_attr($iconos_atributos[$slug]) . '"></i> ';
        }
        
        // Para productos variables
        if ($product->is_type('variable')) {
            if (!empty($attribute_data) && is_array($attribute_data)) {
                echo '<span class="spec-item">' . $icono . esc_html($attribute_data[0]) . '</span>';
                $badges_mostrados++;
            }
        } 
        // Para productos simples con atributos de taxonomía
        else {
            // Verificar si es un atributo de taxonomía (empieza con 'pa_')
            if (strpos($slug, 'pa_') === 0) {
                $terms = wp_get_post_terms($product->get_id(), $slug, array('number' => 1));
                if (!empty($terms) && !is_wp_error($terms)) {
                    echo '<span class="spec-item">' . $icono . esc_html($terms[0]->name) . '</span>';
                    $badges_mostrados++;
                }
            } 
            // Si es un atributo personalizado (no taxonomía)
            else {
                if (is_object($attribute_data) && method_exists($attribute_data, 'get_options')) {
                    $options = $attribute_data->get_options();
                    if (!empty($options)) {
                        $value = is_array($options) ? $options[0] : $options;
                        echo '<span class="spec-item">' . $icono . esc_html($value) . '</span>';
                        $badges_mostrados++;
                    }
                }
            }
        }
    }
    
    echo '</div>';
}



// DESACTIVADO: Mostrar características clave después del resumen corto
// Función comentada por request del usuario para limpiar single-product
/*
add_action('woocommerce_single_product_summary', 'mostrar_caracteristicas_clave', 25);

function mostrar_caracteristicas_clave() {
    global $product;

    $procesador = get_field('procesador');
    $placa_video = get_field('placa_de_video');
    $display = get_field('display');
    $memoria_ram = get_field('memoria_ram');

    if (!$procesador && !$placa_video && !$display && !$memoria_ram) {
        return;
    }

    echo '<div class="key-features">';
    echo '<h3>Características Destacadas</h3>';
    echo '<ul>';

    if ($procesador) {
        echo '<li>';
        echo '<i class="bi bi-cpu-fill"></i>';
        echo '<div>';
        echo '<strong>' . esc_html($procesador) . '</strong>';
        echo '</div>';
        echo '</li>';
    }

    if ($placa_video) {
        echo '<li>';
        echo '<i class="bi bi-gpu-card"></i>';
        echo '<div>';
        echo '<strong>' . esc_html($placa_video) . '</strong>';
        echo '</div>';
        echo '</li>';
    }

    if ($display) {
        echo '<li>';
        echo '<i class="bi bi-display"></i>';
        echo '<div>';
        echo '<strong>' . esc_html($display) . '</strong>';
        echo '</div>';
        echo '</li>';
    }

    if ($memoria_ram) {
        echo '<li>';
        echo '<i class="bi bi-memory"></i>';
        echo '<div>';
        echo '<strong>RAM: ' . esc_html($memoria_ram) . '</strong>';
        echo '</div>';
        echo '</li>';
    }

    echo '</ul>';
    echo '</div>';
}
*/

// Agregar tabs personalizadas después de las tabs de WooCommerce
add_filter('woocommerce_product_tabs', 'agregar_tabs_personalizadas', 98);

function agregar_tabs_personalizadas($tabs) {
    
    // Asegurar que la tab de descripción existe
    if (!isset($tabs['description'])) {
        $tabs['description'] = array(
            'title'    => __('Descripción', 'woocommerce'),
            'priority' => 10,
            'callback' => 'woocommerce_product_description_tab'
        );
    }
    
    // Verificar que existan datos ACF antes de agregar la tab
    $tiene_datos = get_field('_caracteristicas_generales') || 
                   get_field('conectividad') || 
                   get_field('dimensiones') || 
                   get_field('almacenamiento') || 
                   get_field('memoria') ||
                   get_field('procesador') ||
                   get_field('memoria_ram') ||
                   get_field('display') ||
                   get_field('placa_de_video');
    
    // Solo agregar tab si hay datos
    if ($tiene_datos) {
        $tabs['especificaciones_tecnicas'] = array(
            'title'    => 'Especificaciones',
            'priority' => 15,
            'callback' => 'tab_especificaciones_tecnicas_content'
        );
    }
    
    // Remover tab de valoraciones
    unset($tabs['reviews']);
    
    // Agregar tab de Envíos
    /*
    $tabs['shipping'] = array(
        'title'    => 'Envíos',
        'priority' => 25,
        'callback' => 'tab_envios_content'
    );
    */
    
    return $tabs;
}

// Contenido de la tab de Envíos
/*
function tab_envios_content() {
    global $product;
    
    echo '<div class="tab-content-wrapper">';
    echo '<div class="shipping-info">';
    echo '<h2>Información de Envíos</h2>';
    
    // Obtener métodos de envío disponibles
    $shipping_methods = WC()->shipping()->get_shipping_methods();
    
    if (!empty($shipping_methods)) {
        foreach ($shipping_methods as $method) {
            if ($method->enabled === 'yes') {
                $method_title = $method->get_method_title();
                $method_description = $method->get_method_description();
                
                // Determinar icono según tipo de método
                $icon = 'bi-truck';
                if (strpos(strtolower($method_title), 'express') !== false || 
                    strpos(strtolower($method_title), 'rápido') !== false) {
                    $icon = 'bi-lightning-charge-fill';
                } elseif (strpos(strtolower($method_title), 'retiro') !== false || 
                          strpos(strtolower($method_title), 'pickup') !== false) {
                    $icon = 'bi-shop';
                } elseif (strpos(strtolower($method_title), 'gratis') !== false || 
                          strpos(strtolower($method_title), 'free') !== false) {
                    $icon = 'bi-truck';
                }
                
                echo '<div class="shipping-option">';
                echo '<div class="shipping-icon">';
                echo '<i class="bi ' . esc_attr($icon) . '"></i>';
                echo '</div>';
                echo '<div class="shipping-details">';
                echo '<h3>' . esc_html($method_title) . '</h3>';
                if ($method_description) {
                    echo '<p>' . esc_html($method_description) . '</p>';
                }
                echo '</div>';
                echo '</div>';
            }
        }
    }
    
    // Calculadora de envío funcional
    echo '<div class="shipping-calculator">';
    echo '<h3>Calculá el costo y tiempo de envío</h3>';
    
    // Añadir producto temporalmente al carrito para calcular envío
    echo '<div class="woocommerce-shipping-calculator">';
    
    if (WC()->cart) {
        // Formulario de cálculo de envío
        woocommerce_shipping_calculator();
    } else {
        // Formulario personalizado si el carrito no está disponible
        echo '<form class="shipping-calc-form" method="post" action="">';
        echo '<p class="form-row form-row-wide">';
        echo '<input type="text" class="input-text" placeholder="Código postal" name="calc_shipping_postcode" id="calc_shipping_postcode" />';
        echo '</p>';
        
        echo '<p class="form-row">';
        echo '<select name="calc_shipping_country" class="country_to_state select2-hidden-accessible" rel="calc_shipping_state">';
        
        $countries = WC()->countries->get_shipping_countries();
        foreach ($countries as $key => $value) {
            echo '<option value="' . esc_attr($key) . '">' . esc_html($value) . '</option>';
        }
        
        echo '</select>';
        echo '</p>';
        
        echo '<p class="form-row">';
        echo '<button type="submit" name="calc_shipping" value="1" class="button">Calcular</button>';
        echo wp_nonce_field('woocommerce-shipping-calculator', 'woocommerce-shipping-calculator-nonce', true, false);
        echo '</p>';
        echo '</form>';
        
        // Mostrar resultados si se calculó
        if (isset($_POST['calc_shipping']) && wp_verify_nonce($_POST['woocommerce-shipping-calculator-nonce'], 'woocommerce-shipping-calculator')) {
            echo '<div class="shipping-results">';
            do_action('woocommerce_calculated_shipping');
            echo '</div>';
        }
    }
    
    echo '</div>';
    echo '</div>';
    
    echo '</div>';
    echo '</div>';
}
*/

function tab_especificaciones_tecnicas_content() {
    global $product;
    
    $procesador = get_field('procesador');
    $placa_video = get_field('placa_de_video');
    $memoria_ram = get_field('memoria_ram');
    $display = get_field('display');
    $caracteristicas = get_field('_caracteristicas_generales');
    $conectividad = get_field('conectividad');
    $dimensiones = get_field('dimensiones');
    $almacenamiento_field = get_field('almacenamiento');
    $memoria = get_field('memoria');
    
    echo '<div class="tab-content-wrapper">';
    echo '<div class="specs-grid">';
    
    // Procesador
    if ($procesador || $caracteristicas) {
        echo '<div class="spec-category">';
        echo '<h3><i class="bi bi-cpu"></i> Procesador</h3>';
        echo '<table class="spec-table">';
        
        if ($caracteristicas) {
            // Parsear el contenido WYSIWYG y extraer datos
            $content = strip_tags($caracteristicas);
            echo '<tr><td colspan="2">' . wp_kses_post($caracteristicas) . '</td></tr>';
        }
        
        echo '</table>';
        echo '</div>';
    }
    
    // Gráficos
    if ($placa_video) {
        echo '<div class="spec-category">';
        echo '<h3><i class="bi bi-gpu-card"></i> Gráficos</h3>';
        echo '<table class="spec-table">';
        echo '<tr><td>GPU</td><td>' . esc_html($placa_video) . '</td></tr>';
        echo '</table>';
        echo '</div>';
    }
    
    // Memoria RAM
    if ($memoria_ram || $memoria) {
        echo '<div class="spec-category">';
        echo '<h3><i class="bi bi-memory"></i> Memoria RAM</h3>';
        echo '<table class="spec-table">';
        
        if ($memoria_ram) {
            echo '<tr><td>Capacidad</td><td>' . esc_html($memoria_ram) . '</td></tr>';
        }
        
        if ($memoria) {
            echo '<tr><td colspan="2">' . wp_kses_post($memoria) . '</td></tr>';
        }
        
        echo '</table>';
        echo '</div>';
    }
    
    // Almacenamiento
    if ($almacenamiento_field) {
        echo '<div class="spec-category">';
        echo '<h3><i class="bi bi-hdd"></i> Almacenamiento</h3>';
        echo '<table class="spec-table">';
        echo '<tr><td colspan="2">' . wp_kses_post($almacenamiento_field) . '</td></tr>';
        echo '</table>';
        echo '</div>';
    }
    
    // Pantalla
    if ($display) {
        echo '<div class="spec-category">';
        echo '<h3><i class="bi bi-display"></i> Pantalla</h3>';
        echo '<table class="spec-table">';
        echo '<tr><td>Display</td><td>' . esc_html($display) . '</td></tr>';
        echo '</table>';
        echo '</div>';
    }
    
    // Conectividad
    if ($conectividad) {
        echo '<div class="spec-category">';
        echo '<h3><i class="bi bi-wifi"></i> Conectividad</h3>';
        echo '<table class="spec-table">';
        echo '<tr><td colspan="2">' . wp_kses_post($conectividad) . '</td></tr>';
        echo '</table>';
        echo '</div>';
    }
    
    // Dimensiones
    if ($dimensiones) {
        echo '<div class="spec-category">';
        echo '<h3><i class="bi bi-rulers"></i> Dimensiones & Peso</h3>';
        echo '<table class="spec-table">';
        echo '<tr><td colspan="2">' . wp_kses_post($dimensiones) . '</td></tr>';
        echo '</table>';
        echo '</div>';
    }
    
    echo '</div>';
    echo '</div>';
}



// Mostrar campo "Usos" como categoría adicional
//add_action('woocommerce_single_product_summary', 'mostrar_usos_producto', 6);

function mostrar_usos_producto() {
    $usos = get_field('usos');
    
    if ($usos) {
        echo '<div class="product-usage-tag">';
        
        $icono = '';
        switch($usos) {
            case 'Gaming':
                $icono = 'bi-controller';
                break;
            case 'Diseño':
                $icono = 'bi-palette';
                break;
            case 'Oficina':
                $icono = 'bi-briefcase';
                break;
            case 'Hogar':
                $icono = 'bi-house';
                break;
        }
        
        if ($icono) {
            echo '<i class="bi ' . esc_attr($icono) . '"></i> ';
        }
        
        echo '<span>' . esc_html($usos) . '</span>';
        echo '</div>';
    }
}


// Mostrar marca como logo (si existe imagen de término de marca)
/*
add_action('woocommerce_single_product_summary', 'mostrar_marca_producto', 3);

function mostrar_marca_producto() {
    $marca_text = get_field('marca');
    
    if ($marca_text) {
        // Intentar obtener logo de marca si existe taxonomía product_brand
        $brand_terms = get_the_terms(get_the_ID(), 'product_brand');
        
        echo '<div class="product-brand">';
        
        if (!empty($brand_terms) && !is_wp_error($brand_terms)) {
            foreach ($brand_terms as $term) {
                $thumbnail_id = get_term_meta($term->term_id, 'thumbnail_id', true);
                if ($thumbnail_id) {
                    $image = wp_get_attachment_image_url($thumbnail_id, 'full');
                    echo '<img src="' . esc_url($image) . '" alt="' . esc_attr($marca_text) . '" height="24">';
                    break;
                }
            }
        } else {
            // Si no hay imagen, mostrar texto
            echo '<span class="brand-text">' . esc_html($marca_text) . '</span>';
        }
        
        echo '</div>';
    }

    global $product;
    
    $tags = get_the_terms($product->get_id(), 'product_tag');
    
    if ($tags && !is_wp_error($tags)) {
        echo '<div class="product-brand">';
        foreach ($tags as $tag) {
            echo '<span class="category-tag">' . esc_html($tag->name) . '</span>';
        }
        echo '</div>';
    }
}
*/

add_filter( 'gettext', 'traducir_textos_woocommerce', 20, 3 );
function traducir_textos_woocommerce( $translated, $text, $domain ) {

    if ( $domain === 'woocommerce' ) {
        if ( $text === 'Active Filters' ) {
            $translated = 'Filtros Activos';
        }
    }

    return $translated;
}

/*
add_filter( 'woocommerce_get_price_html', 'custom_single_variable_price_html_clean', 100, 2 );
function custom_single_variable_price_html_clean( $price, $product ) {

    // SOLO SINGLE PRODUCT
    if ( ! is_product() ) {
        return $price;
    }

    // SOLO PRODUCTOS VARIABLES
    if ( ! $product->is_type( 'variable' ) ) {
        return $price;
    }

    $min_price   = $product->get_variation_price( 'min', true );
    $max_price   = $product->get_variation_price( 'max', true );
    $min_regular = $product->get_variation_regular_price( 'min', true );

    $installments = 'Hasta <strong>12 cuotas sin interés</strong> de $202.083';

    // VARIABLE EN OFERTA
    if ( $min_regular > $min_price ) {

        $discount = round( ( ( $min_regular - $min_price ) / $min_regular ) * 100 );

        return '
        <div class="product-price">
            <div class="price-main">
                <span class="current-price">$' . number_format( $min_price, 0, ',', '.' ) . '</span>
                <span class="price-old">$' . number_format( $min_regular, 0, ',', '.' ) . '</span>
                <span class="discount-badge">-' . esc_html( $discount ) . '%</span>
            </div>
            <div class="price-installments">
                <i class="bi bi-credit-card"></i>
                ' . $installments . '
            </div>
        </div>';
    }

    // VARIABLE SIN OFERTA
    return '
    <div class="product-price">
        <div class="price-main">
            <span class="current-price">$' . number_format( $min_price, 0, ',', '.' ) . '</span>
        </div>
        <div class="price-installments">
            <i class="bi bi-credit-card"></i>
            ' . $installments . '
        </div>
    </div>';
}
*/


// add_action('woocommerce_after_add_to_cart_form', 'feyma_share_info', 25); // DESACTIVADO - Usuario no quiere badges verdes
//add_action('woocommerce_single_product_summary', 'feyma_share_info', 31);

function feyma_share_info() {
    global $product;
    global $post;

?>

    <!-- Sección 4: Información de Envío -->
    <div class="cba-price-section p-0" style="border-bottom:0">
        <div class="trust-badges">
            <div class="trust-item">
                <i class="bi bi-shield-check"></i>
                <span>Garantía oficial</span>
            </div>
            <div class="trust-item">
                <i class="bi bi-credit-card"></i>
                <span>Pago seguro</span>
            </div>

            <div class="trust-item">
                <i class="bi bi-truck"></i>
                <span>Envíos gratis a todo el país!</span>
            </div>
                
            <div class="trust-item">
                <i class="bi bi-geo-alt"></i>
                <span>Retiralo en nuestras oficinas, Av. del Libertador 6299, C1428ARF, CABA. De 10 a 17hs.</span>
            </div>
        </div>

        <div class="product-share">
            <span>Compartir:</span>
            <!--
            <a href="#" class="share-btn" title="Facebook">
                <i class="bi bi-facebook"></i>
            </a>
            <a href="#" class="share-btn" title="X">
                <i class="bi bi-twitter-x"></i>
            </a>
            <a href="#" class="share-btn" title="WhatsApp">
                <i class="bi bi-whatsapp"></i>
            </a>
            <a href="#" class="share-btn" title="Copiar enlace">
                <i class="bi bi-link-45deg"></i>
            </a>
            -->

            <?php
                $plantilla = '';

                $plantilla = '<a class="share-btn Link dc-facebook" href="{facebook}" target="_blank"><i class="fab fa-facebook-f"></i></a>'.'<a class="share-btn Link dc-twitter" href="{twitter}" target="_blank"><i class="fa-brands fa-x-twitter"></i></a>'.'<a class="Link share-btn" href="{whatsapp}" target="_blank"><i class="fab fa-whatsapp"></i></a><a href="#" class="share-btn" title="Copiar enlace"><i class="bi bi-link-45deg"></i></a>';

                $cad			= '';
                $urlArticulo 	= urlencode(get_permalink());
                $titleArticulo 	= str_replace( ' ', '%20', get_the_title());

                // Urls
                $facebookURL = 'https://www.facebook.com/sharer/sharer.php?u='.$urlArticulo;
                $twitterURL	 = 'https://twitter.com/intent/tweet?text='.$titleArticulo.'&amp;url='.$urlArticulo.'&amp;via=Almavin';
                $whatsappURL = 'https://wa.me/?text='.$titleArticulo . ' ' . $urlArticulo;
            
                $ar_buscar 		= array('{facebook}','{twitter}','{whatsapp}');
                $ar_reemplazar 	= array($facebookURL,$twitterURL,$whatsappURL);

                //$cad	 = '<div class="BoxRedes mt-4">';
                //$cad	.= '<h6 class="mb-3"><strong>Share this product</strong>:</h6>';
                $cad	=  str_replace($ar_buscar, $ar_reemplazar, $plantilla);
                //$cad	.= '</div>';
                    
                echo $cad;	
            ?>
        </div>
    
        <div style="display: flex; align-items: center; gap: 12px; margin-top: 30px; border-bottom:0">
            <span style="font-size: 14px; color: #6b7280;">¿Alguna duda?</span>
            <div class="cba-contact-icons">
                <a href="#" class="cba-contact-link" title="Enviar email">
                    <svg fill="currentColor" viewBox="0 0 20 20">
                        <path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z"/>
                        <path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z"/>
                    </svg>
                </a>
                
                <a href="#" class="cba-contact-link cba-whatsapp" title="WhatsApp">
                    <svg fill="currentColor" viewBox="0 0 24 24">
                        <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/>
                    </svg>
                </a>
            </div>
        </div>
    </div>

<?php
}

/*************************************************
## Live Search con Autocompletado
*************************************************/

// Encolar script de live search
add_action('wp_enqueue_scripts', 'feyma_enqueue_live_search', 20);

function feyma_enqueue_live_search() {
    // Encolar el script
    wp_enqueue_script(
        'feyma-live-search',
        get_stylesheet_directory_uri() . '/assets/js/live-search.js',
        array('jquery'),
        '1.0.0',
        true
    );

    // Pasar variables al script
    wp_localize_script('feyma-live-search', 'feymaSearch', array(
        'ajaxurl' => admin_url('admin-ajax.php'),
        'nonce' => wp_create_nonce('feyma_search_nonce')
    ));
}

// AJAX Handler para búsqueda (usuarios logueados)
add_action('wp_ajax_feyma_live_search', 'feyma_live_search_handler');

// AJAX Handler para búsqueda (usuarios no logueados)
add_action('wp_ajax_nopriv_feyma_live_search', 'feyma_live_search_handler');

function feyma_live_search_handler() {
    // Verificar nonce
    check_ajax_referer('feyma_search_nonce', 'nonce');

    $query = isset($_POST['query']) ? sanitize_text_field($_POST['query']) : '';

    if (empty($query) || strlen($query) < 2) {
        wp_send_json_error(array('message' => 'Query too short'));
    }

    // Realizar búsqueda en productos de WooCommerce
    $args = array(
        'post_type' => 'product',
        'post_status' => 'publish',
        's' => $query,
        'posts_per_page' => 5,
        'orderby' => 'relevance',
        'order' => 'DESC'
    );

    $search_query = new WP_Query($args);
    $products = array();

    if ($search_query->have_posts()) {
        while ($search_query->have_posts()) {
            $search_query->the_post();
            $product = wc_get_product(get_the_ID());

            if (!$product) continue;

            // Obtener imagen del producto
            $image_id = $product->get_image_id();
            $image_url = $image_id ? wp_get_attachment_image_url($image_id, 'thumbnail') : wc_placeholder_img_src('thumbnail');

            // Obtener extracto corto
            $excerpt = wp_trim_words(get_the_excerpt(), 15, '...');

            $products[] = array(
                'id' => get_the_ID(),
                'title' => get_the_title(),
                'url' => get_permalink(),
                'image' => $image_url,
                'price' => $product->get_price_html(),
                'excerpt' => $excerpt
            );
        }
        wp_reset_postdata();
    }

    // Obtener total de resultados
    $total_args = $args;
    $total_args['posts_per_page'] = -1;
    $total_args['fields'] = 'ids';
    $total_query = new WP_Query($total_args);
    $total = $total_query->post_count;
    wp_reset_postdata();

    wp_send_json_success(array(
        'products' => $products,
        'total' => $total,
        'query' => $query
    ));
}

// ==================================================
// CONTACT FORM & NEWSLETTER - EPIC SYSTEM
// ==================================================

/**
 * Crear tablas en la base de datos al activar el tema
 */
function feyma_create_database_tables() {
    global $wpdb;
    
    $charset_collate = $wpdb->get_charset_collate();
    
    // Tabla de contactos
    $table_contacts = $wpdb->prefix . 'feyma_contacts';
    $sql_contacts = "CREATE TABLE IF NOT EXISTS $table_contacts (
        id mediumint(9) NOT NULL AUTO_INCREMENT,
        nombre varchar(100) NOT NULL,
        apellido varchar(100) DEFAULT '',
        email varchar(100) NOT NULL,
        telefono varchar(50) DEFAULT '',
        tema varchar(200) NOT NULL,
        mensaje text NOT NULL,
        fecha datetime DEFAULT CURRENT_TIMESTAMP NOT NULL,
        estado varchar(20) DEFAULT 'nuevo',
        notas text DEFAULT '',
        PRIMARY KEY  (id)
    ) $charset_collate;";
    
    // Tabla de suscriptores newsletter
    $table_newsletter = $wpdb->prefix . 'feyma_newsletter';
    $sql_newsletter = "CREATE TABLE IF NOT EXISTS $table_newsletter (
        id mediumint(9) NOT NULL AUTO_INCREMENT,
        email varchar(100) NOT NULL,
        fecha_suscripcion datetime DEFAULT CURRENT_TIMESTAMP NOT NULL,
        estado varchar(20) DEFAULT 'activo',
        PRIMARY KEY  (id),
        UNIQUE KEY email (email)
    ) $charset_collate;";
    
    require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
    dbDelta($sql_contacts);
    dbDelta($sql_newsletter);
}
add_action('after_setup_theme', 'feyma_create_database_tables');

/**
 * AJAX Handler - Procesar formulario de contacto
 */
function feyma_handle_contact_form() {
    // Verificar nonce
    check_ajax_referer('feyma_contact_nonce', 'nonce');
    
    global $wpdb;
    $table_name = $wpdb->prefix . 'feyma_contacts';
    
    // Sanitizar datos
    $nombre = sanitize_text_field($_POST['nombre']);
    $apellido = sanitize_text_field($_POST['apellido']);
    $email = sanitize_email($_POST['email']);
    $telefono = sanitize_text_field($_POST['telefono']);
    $tema = sanitize_text_field($_POST['tema']);
    $mensaje = sanitize_textarea_field($_POST['mensaje']);
    
    // Validar email
    if (!is_email($email)) {
        wp_send_json_error(array('message' => 'Email inválido'));
    }
    
    // Insertar en la base de datos
    $inserted = $wpdb->insert(
        $table_name,
        array(
            'nombre' => $nombre,
            'apellido' => $apellido,
            'email' => $email,
            'telefono' => $telefono,
            'tema' => $tema,
            'mensaje' => $mensaje,
            'estado' => 'nuevo'
        ),
        array('%s', '%s', '%s', '%s', '%s', '%s', '%s')
    );
    
    if ($inserted) {
        // Enviar email de notificación al admin (opcional)
        $admin_email = get_option('admin_email');
        $subject = '🔔 Nuevo mensaje de contacto - ' . $tema;
        $body = "Nuevo mensaje de contacto recibido:\n\n";
        $body .= "Nombre: $nombre $apellido\n";
        $body .= "Email: $email\n";
        $body .= "Teléfono: $telefono\n";
        $body .= "Tema: $tema\n\n";
        $body .= "Mensaje:\n$mensaje\n";
        
        wp_mail($admin_email, $subject, $body);
        
        wp_send_json_success(array(
            'message' => '¡Mensaje enviado con éxito! Te responderemos pronto.'
        ));
    } else {
        wp_send_json_error(array('message' => 'Error al guardar el mensaje. Intenta nuevamente.'));
    }
}
add_action('wp_ajax_feyma_contact_form', 'feyma_handle_contact_form');
add_action('wp_ajax_nopriv_feyma_contact_form', 'feyma_handle_contact_form');

/**
 * AJAX Handler - Procesar suscripción newsletter
 */
function feyma_handle_newsletter() {
    // Verificar nonce
    check_ajax_referer('feyma_newsletter_nonce', 'nonce');
    
    global $wpdb;
    $table_name = $wpdb->prefix . 'feyma_newsletter';
    
    // Sanitizar email
    $email = sanitize_email($_POST['email']);
    
    // Validar email
    if (!is_email($email)) {
        wp_send_json_error(array('message' => 'Email inválido'));
    }
    
    // Verificar si ya está suscrito
    $exists = $wpdb->get_var($wpdb->prepare(
        "SELECT COUNT(*) FROM $table_name WHERE email = %s",
        $email
    ));
    
    if ($exists > 0) {
        wp_send_json_error(array('message' => 'Este email ya está suscrito'));
    }
    
    // Insertar en la base de datos
    $inserted = $wpdb->insert(
        $table_name,
        array(
            'email' => $email,
            'estado' => 'activo'
        ),
        array('%s', '%s')
    );
    
    if ($inserted) {
        wp_send_json_success(array(
            'message' => '¡Gracias por suscribirte! 🎉 Recibirás nuestras mejores ofertas.'
        ));
    } else {
        wp_send_json_error(array('message' => 'Error al suscribirse. Intenta nuevamente.'));
    }
}
add_action('wp_ajax_feyma_newsletter', 'feyma_handle_newsletter');
add_action('wp_ajax_nopriv_feyma_newsletter', 'feyma_handle_newsletter');

/**
 * Encolar nonces para AJAX
 */
function feyma_enqueue_contact_scripts() {
    wp_localize_script('jquery', 'feymaContact', array(
        'ajaxurl' => admin_url('admin-ajax.php'),
        'contact_nonce' => wp_create_nonce('feyma_contact_nonce'),
        'newsletter_nonce' => wp_create_nonce('feyma_newsletter_nonce')
    ));
}
add_action('wp_enqueue_scripts', 'feyma_enqueue_contact_scripts');

/**
 * Agregar página de administración
 */
function feyma_admin_menu() {
    add_menu_page(
        'Contactos & Newsletter',
        'Contactos & News',
        'manage_options',
        'feyma-contacts',
        'feyma_admin_page',
        'dashicons-email-alt',
        30
    );
}
add_action('admin_menu', 'feyma_admin_menu');

/**
 * Encolar DataTables en admin
 */
function feyma_admin_enqueue_scripts($hook) {
    if ($hook != 'toplevel_page_feyma-contacts') {
        return;
    }
    
    // DataTables CSS
    wp_enqueue_style('datatables-css', 'https://cdn.datatables.net/1.13.7/css/dataTables.bootstrap5.min.css');
    wp_enqueue_style('datatables-responsive-css', 'https://cdn.datatables.net/responsive/2.5.0/css/responsive.bootstrap5.min.css');
    
    // Bootstrap 5
    wp_enqueue_style('bootstrap-admin', 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css');
    
    // DataTables JS
    wp_enqueue_script('datatables-js', 'https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js', array('jquery'), null, true);
    wp_enqueue_script('datatables-bootstrap-js', 'https://cdn.datatables.net/1.13.7/js/dataTables.bootstrap5.min.js', array('datatables-js'), null, true);
    wp_enqueue_script('datatables-responsive-js', 'https://cdn.datatables.net/responsive/2.5.0/js/dataTables.responsive.min.js', array('datatables-js'), null, true);
    wp_enqueue_script('datatables-responsive-bootstrap-js', 'https://cdn.datatables.net/responsive/2.5.0/js/responsive.bootstrap5.min.js', array('datatables-responsive-js'), null, true);
    
    // Bootstrap JS
    wp_enqueue_script('bootstrap-admin-js', 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js', array('jquery'), null, true);
}
add_action('admin_enqueue_scripts', 'feyma_admin_enqueue_scripts');

/**
 * Página de administración
 */
function feyma_admin_page() {
    global $wpdb;
    $table_contacts = $wpdb->prefix . 'feyma_contacts';
    $table_newsletter = $wpdb->prefix . 'feyma_newsletter';
    
    // Obtener datos
    $contacts = $wpdb->get_results("SELECT * FROM $table_contacts ORDER BY fecha DESC");
    $newsletters = $wpdb->get_results("SELECT * FROM $table_newsletter ORDER BY fecha_suscripcion DESC");
    
    // Stats
    $total_contacts = $wpdb->get_var("SELECT COUNT(*) FROM $table_contacts");
    $total_newsletters = $wpdb->get_var("SELECT COUNT(*) FROM $table_newsletter");
    $new_contacts = $wpdb->get_var("SELECT COUNT(*) FROM $table_contacts WHERE estado = 'nuevo'");
    ?>
    <div class="wrap">
        <h1 class="wp-heading-inline">📧 Contactos & Newsletter</h1>
        
        <div class="container-fluid mt-4">
            <!-- Stats Cards -->
            <div class="row mb-4">
                <div class="col-md-4">
                    <div class="card border-primary">
                        <div class="card-body">
                            <h5 class="card-title text-primary">📩 Total Contactos</h5>
                            <h2 class="mb-0"><?php echo $total_contacts; ?></h2>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card border-success">
                        <div class="card-body">
                            <h5 class="card-title text-success">📬 Suscriptores</h5>
                            <h2 class="mb-0"><?php echo $total_newsletters; ?></h2>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card border-warning">
                        <div class="card-body">
                            <h5 class="card-title text-warning">🆕 Nuevos</h5>
                            <h2 class="mb-0"><?php echo $new_contacts; ?></h2>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Tabs -->
            <ul class="nav nav-tabs mb-3" id="myTab" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="contacts-tab" data-bs-toggle="tab" data-bs-target="#contacts" type="button" role="tab">
                        📩 Contactos (<?php echo $total_contacts; ?>)
                    </button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="newsletter-tab" data-bs-toggle="tab" data-bs-target="#newsletter" type="button" role="tab">
                        📬 Newsletter (<?php echo $total_newsletters; ?>)
                    </button>
                </li>
            </ul>
            
            <div class="tab-content" id="myTabContent">
                <!-- Contactos Tab -->
                <div class="tab-pane fade show active" id="contacts" role="tabpanel">
                    <div class="card">
                        <div class="card-body">
                            <table id="contactsTable" class="table table-striped table-hover" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Fecha</th>
                                        <th>Nombre</th>
                                        <th>Email</th>
                                        <th>Teléfono</th>
                                        <th>Tema</th>
                                        <th>Mensaje</th>
                                        <th>Estado</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($contacts as $contact): ?>
                                    <tr>
                                        <td><?php echo $contact->id; ?></td>
                                        <td><?php echo date('d/m/Y H:i', strtotime($contact->fecha)); ?></td>
                                        <td><?php echo esc_html($contact->nombre . ' ' . $contact->apellido); ?></td>
                                        <td><a href="mailto:<?php echo esc_attr($contact->email); ?>"><?php echo esc_html($contact->email); ?></a></td>
                                        <td><?php echo esc_html($contact->telefono); ?></td>
                                        <td><?php echo esc_html($contact->tema); ?></td>
                                        <td><?php echo wp_trim_words($contact->mensaje, 10); ?></td>
                                        <td>
                                            <?php if ($contact->estado == 'nuevo'): ?>
                                                <span class="badge bg-warning">Nuevo</span>
                                            <?php else: ?>
                                                <span class="badge bg-success">Leído</span>
                                            <?php endif; ?>
                                        </td>
                                    </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                
                <!-- Newsletter Tab -->
                <div class="tab-pane fade" id="newsletter" role="tabpanel">
                    <div class="card">
                        <div class="card-body">
                            <table id="newsletterTable" class="table table-striped table-hover" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Fecha Suscripción</th>
                                        <th>Email</th>
                                        <th>Estado</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($newsletters as $subscriber): ?>
                                    <tr>
                                        <td><?php echo $subscriber->id; ?></td>
                                        <td><?php echo date('d/m/Y H:i', strtotime($subscriber->fecha_suscripcion)); ?></td>
                                        <td><a href="mailto:<?php echo esc_attr($subscriber->email); ?>"><?php echo esc_html($subscriber->email); ?></a></td>
                                        <td>
                                            <?php if ($subscriber->estado == 'activo'): ?>
                                                <span class="badge bg-success">Activo</span>
                                            <?php else: ?>
                                                <span class="badge bg-secondary">Inactivo</span>
                                            <?php endif; ?>
                                        </td>
                                    </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <script>
    jQuery(document).ready(function($) {
        // Initialize DataTables
        $('#contactsTable').DataTable({
            responsive: true,
            order: [[0, 'desc']],
            language: {
                url: '//cdn.datatables.net/plug-ins/1.13.7/i18n/es-ES.json'
            },
            pageLength: 25
        });
        
        $('#newsletterTable').DataTable({
            responsive: true,
            order: [[0, 'desc']],
            language: {
                url: '//cdn.datatables.net/plug-ins/1.13.7/i18n/es-ES.json'
            },
            pageLength: 25
        });
    });
    </script>
    
    <style>
    .card {
        box-shadow: 0 0.125rem 0.25rem rgba(0,0,0,0.075);
        border-radius: 0.5rem;
        margin-bottom: 1.5rem;
    }
    .nav-tabs .nav-link {
        font-weight: 600;
    }
    .table th {
        font-weight: 600;
        background-color: #f8f9fa;
    }
    </style>
    <?php
}


/**
 * Mover stock debajo de la galeria en single product:
 */
