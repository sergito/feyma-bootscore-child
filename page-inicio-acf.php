<?php
/**
 * Template Name: Inicio (con ACF PRO)
 *
 * Versión dinámica de la home usando campos de ACF PRO
 * Configuración: WordPress Admin > Home (ACF)
 *
 * @package Bootscore
 * @version 6.1.0
 */

// Exit if accessed directly
defined('ABSPATH') || exit;

get_header();
?>


<!-- HERO SECTION - CIRCUIT PATTERNS ÉPICOS -->
<section class="hero-section">
    <!-- Efectos de fondo épicos -->
    <div class="hero-circuit-pattern"></div>
    <div class="hero-particles"></div>
    <div class="scan-line"></div>

    <!-- Nodos de conexión pulsantes -->
    <div class="circuit-nodes">
        <div class="circuit-node"></div>
        <div class="circuit-node"></div>
        <div class="circuit-node"></div>
        <div class="circuit-node"></div>
        <div class="circuit-node"></div>
    </div>

    <!-- Data flow (líneas que viajan) -->
    <div class="data-flow data-flow-1"></div>
    <div class="data-flow data-flow-2"></div>
    <div class="data-flow data-flow-3"></div>

    <!-- Hexágonos geométricos -->
    <div class="hex-pattern"></div>

    <!-- Energy pulse -->
    <div class="energy-pulse"></div>

    <!-- CAROUSEL DE HERO -->
    <div id="heroCarousel" class="carousel slide carousel-fade" data-bs-ride="carousel" data-bs-interval="6000">

        <?php
        // Get hero slides from ACF
        $hero_slides = get_field('hero_carousel', 'option');
        $slide_count = $hero_slides ? count($hero_slides) : 0;
        ?>

        <?php if ( $slide_count > 1 ) : ?>
        <div class="carousel-indicators">
            <?php for ( $i = 0; $i < $slide_count; $i++ ) : ?>
            <button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="<?php echo $i; ?>" <?php echo $i === 0 ? 'class="active"' : ''; ?>></button>
            <?php endfor; ?>
        </div>
        <?php endif; ?>

        <div class="carousel-inner">

            <?php
            if ( $hero_slides ) :
                foreach ( $hero_slides as $index => $slide ) :
                    $theme = isset($slide['theme']) ? $slide['theme'] : 'default';
                    $theme_class = ($theme !== 'default') ? $theme : '';

                    // Determinar clase de gradiente según tema
                    $gradient_class = 'gradient-text';
                    if ($theme === 'gaming') $gradient_class = 'gradient-text-gaming';
                    elseif ($theme === 'apple') $gradient_class = 'gradient-text-apple';
                    elseif ($theme === 'blue') $gradient_class = 'gradient-text-blue';
                    elseif ($theme === 'green') $gradient_class = 'gradient-text-green';
                    elseif ($theme === 'red') $gradient_class = 'gradient-text-red';
                    elseif ($theme === 'purple') $gradient_class = 'gradient-text-purple';
            ?>

            <!-- SLIDE <?php echo $index + 1; ?> -->
            <div class="carousel-item <?php echo $index === 0 ? 'active' : ''; ?>">
                <div class="container">
                    <div class="row align-items-center min-vh-90">
                        <div class="col-lg-6" data-aos="fade-right" data-aos-duration="1000">
                            <div class="hero-content">
                                <?php if ( !empty($slide['badge_text']) ) : ?>
                                <span class="hero-badge <?php echo $theme_class; ?>" data-aos="zoom-in" data-aos-delay="200">
                                    <?php if ( !empty($slide['badge_icon']) ) : ?>
                                    <i class="bi bi-<?php echo esc_attr($slide['badge_icon']); ?> me-2"></i>
                                    <?php endif; ?>
                                    <?php echo esc_html($slide['badge_text']); ?>
                                </span>
                                <?php endif; ?>

                                <h1 class="hero-title" data-aos="fade-up" data-aos-delay="400">
                                    <?php echo esc_html($slide['title']); ?><br>
                                    <span class="<?php echo $gradient_class; ?>"><?php echo esc_html($slide['title_gradient']); ?></span>
                                </h1>

                                <?php if ( !empty($slide['description']) ) : ?>
                                <p class="hero-description" data-aos="fade-up" data-aos-delay="600">
                                    <?php echo wp_kses_post($slide['description']); ?>
                                </p>
                                <?php endif; ?>

                                <div class="hero-buttons" data-aos="fade-up" data-aos-delay="800">
                                    <?php if ( !empty($slide['button_link']) ) : ?>
                                    <a href="<?php echo esc_url($slide['button_link']); ?>" class="btn-hero <?php echo $theme_class; ?>">
                                        <span><?php echo esc_html($slide['button_text']); ?></span>
                                        <i class="bi bi-arrow-right ms-2"></i>
                                    </a>
                                    <?php endif; ?>
                                    <a href="<?php echo wc_get_page_permalink( 'shop' ); ?>" class="btn-hero-outline">
                                        Catálogo Completo
                                    </a>
                                </div>

                                <?php
                                // Specs opcionales desde ACF (si existen)
                                if ( !empty($slide['specs']) && is_array($slide['specs']) ) :
                                ?>
                                <div class="hero-specs" data-aos="fade-up" data-aos-delay="1000">
                                    <?php foreach ($slide['specs'] as $spec) : ?>
                                    <div class="spec-item">
                                        <i class="bi bi-<?php echo esc_attr($spec['icon']); ?>"></i>
                                        <span><?php echo esc_html($spec['text']); ?></span>
                                    </div>
                                    <?php endforeach; ?>
                                </div>
                                <?php endif; ?>
                            </div>
                        </div>

                        <div class="col-lg-6" data-aos="fade-left" data-aos-duration="1000" data-aos-delay="400">
                            <div class="hero-image-wrapper">
                                <div class="hero-product-glow <?php echo $theme_class; ?>"></div>
                                <?php
                                if ( isset($slide['image']) && !empty($slide['image']) ) :
                                    $image_url = $slide['image']['url'];
                                    $image_alt = !empty($slide['image']['alt']) ? $slide['image']['alt'] : $slide['title'];
                                ?>
                                <img src="<?php echo esc_url($image_url); ?>"
                                     alt="<?php echo esc_attr($image_alt); ?>"
                                     class="img-fluid hero-product-img">
                                <?php else : ?>
                                <img src="https://via.placeholder.com/600x400/5F4B8B/F7B32B?text=<?php echo urlencode($slide['title']); ?>"
                                     alt="<?php echo esc_attr($slide['title']); ?>"
                                     class="img-fluid hero-product-img">
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <?php
                endforeach;
            endif;
            ?>

        </div>

        <?php if ( $slide_count > 1 ) : ?>
        <!-- Controls Personalizados -->
        <button class="carousel-control-prev" type="button" data-bs-target="#heroCarousel" data-bs-slide="prev">
            <div class="carousel-control-icon">
                <i class="bi bi-chevron-left"></i>
            </div>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#heroCarousel" data-bs-slide="next">
            <div class="carousel-control-icon">
                <i class="bi bi-chevron-right"></i>
            </div>
        </button>
        <?php endif; ?>
    </div>
</section>

<!-- HERO SECTION - COMPACT & POWERFUL (670PX) -->
<section class="hero-section-v2">
    <!-- Efectos de fondo minimalistas -->
    <div class="hero-bg-pattern"></div>

    <!-- CAROUSEL DE HERO -->
    <div id="heroCarousel" class="carousel slide" data-bs-ride="carousel" data-bs-interval="7000">

        <?php
        // Get hero slides from ACF
        $hero_slides = get_field('hero_carousel', 'option');
        $slide_count = $hero_slides ? count($hero_slides) : 0;
        ?>

        <?php if ( $slide_count > 1 ) : ?>
        <div class="carousel-indicators-v2">
            <?php for ( $i = 0; $i < $slide_count; $i++ ) : ?>
            <button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="<?php echo $i; ?>" <?php echo $i === 0 ? 'class="active"' : ''; ?>></button>
            <?php endfor; ?>
        </div>
        <?php endif; ?>

        <div class="carousel-inner">

            <?php
            if ( $hero_slides ) :
                foreach ( $hero_slides as $index => $slide ) :
                    $theme = isset($slide['theme']) ? $slide['theme'] : 'default';
                    $theme_class = ($theme !== 'default') ? $theme : '';
            ?>

            <!-- SLIDE <?php echo $index + 1; ?> -->
            <div class="carousel-item <?php echo $index === 0 ? 'active' : ''; ?>">
                <div class="container-fluid px-0">
                    <div class="row g-0 align-items-center">

                        <!-- TEXTO IZQUIERDA (60%) -->
                        <div class="col-lg-7 order-lg-1 order-2">
                            <div class="hero-content-v2">

                                <?php if ( !empty($slide['badge_text']) ) : ?>
                                <span class="hero-badge-v2 <?php echo $theme_class; ?>">
                                    <?php if ( !empty($slide['badge_icon']) ) : ?>
                                        <i class="bi bi-<?php echo esc_attr($slide['badge_icon']); ?>"></i>
                                    <?php endif; ?>
                                    <?php echo esc_html($slide['badge_text']); ?>
                                </span>
                                <?php endif; ?>

                                <h1 class="hero-title-v2">
                                    <?php echo esc_html($slide['title']); ?>
                                    <span class="gradient-accent<?php echo $theme !== 'default' ? '-' . $theme : ''; ?>">
                                        <?php echo esc_html($slide['title_gradient']); ?>
                                    </span>
                                </h1>

                                <?php if ( !empty($slide['description']) ) : ?>
                                <p class="hero-description-v2">
                                    <?php echo wp_kses_post($slide['description']); ?>
                                </p>
                                <?php endif; ?>

                                <div class="hero-actions-v2">
                                    <?php if ( !empty($slide['button_link']) ) : ?>
                                    <a href="<?php echo esc_url($slide['button_link']); ?>" class="btn-hero-v2 <?php echo $theme_class; ?>">
                                        <span><?php echo esc_html($slide['button_text']); ?></span>
                                    </a>
                                    <?php endif; ?>
                                </div>

                            </div>
                        </div>

                        <!-- IMAGEN DERECHA (40%) -->
                        <div class="col-lg-5 order-lg-2 order-1">
                            <div class="hero-image-container">
                                <?php
                                if ( isset($slide['image']) && !empty($slide['image']) ) :
                                    $image_url = $slide['image']['url'];
                                    $image_alt = $slide['image']['alt'] ? $slide['image']['alt'] : $slide['title'];
                                ?>
                                    <img src="<?php echo esc_url($image_url); ?>"
                                         alt="<?php echo esc_attr($image_alt); ?>"
                                         class="hero-product-image">
                                <?php else : ?>
                                    <img src="https://via.placeholder.com/500x400/3D3180/F7B32B?text=<?php echo urlencode($slide['title']); ?>"
                                         alt="<?php echo esc_attr($slide['title']); ?>"
                                         class="hero-product-image">
                                <?php endif; ?>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

            <?php
                endforeach;
            endif;
            ?>

        </div>

        <?php if ( $slide_count > 1 ) : ?>
        <!-- Controls Minimalistas -->
        <button class="carousel-control-prev-v2" type="button" data-bs-target="#heroCarousel" data-bs-slide="prev">
            <i class="bi bi-chevron-left"></i>
        </button>
        <button class="carousel-control-next-v2" type="button" data-bs-target="#heroCarousel" data-bs-slide="next">
            <i class="bi bi-chevron-right"></i>
        </button>
        <?php endif; ?>
    </div>
</section>

<!-- MARQUESINA DE PAGOS Y BENEFICIOS -->
<section class="payment-marquee-section">
    <div class="marquee-wrapper">
        <div class="marquee-content">
            <!-- Primera iteración -->
            <div class="marquee-item">
                <i class="bi bi-credit-card-fill"></i>
                <span>Hasta 12 cuotas sin interés</span>
            </div>
            <div class="marquee-item">
                <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/payment/visa.svg" alt="Visa" class="payment-logo">
            </div>
            <div class="marquee-item">
                <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/payment/mastercard.svg" alt="MasterCard" class="payment-logo">
            </div>
            <div class="marquee-item">
                <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/payment/amex.svg" alt="Amex" class="payment-logo">
            </div>
            <div class="marquee-item">
                <i class="bi bi-truck"></i>
                <span>Envíos gratis a todo el país</span>
            </div>
            <div class="marquee-item">
                <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/payment/mercadopago.svg" alt="MercadoPago" class="payment-logo">
            </div>
            <div class="marquee-item">
                <i class="bi bi-shield-check"></i>
                <span>Compra 100% segura</span>
            </div>
            <div class="marquee-item">
                <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/payment/naranja.svg" alt="Naranja" class="payment-logo">
            </div>

            <!-- Segunda iteración (para loop infinito) -->
            <div class="marquee-item">
                <i class="bi bi-credit-card-fill"></i>
                <span>Hasta 12 cuotas sin interés</span>
            </div>
            <div class="marquee-item">
                <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/payment/visa.svg" alt="Visa" class="payment-logo">
            </div>
            <div class="marquee-item">
                <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/payment/mastercard.svg" alt="MasterCard" class="payment-logo">
            </div>
            <div class="marquee-item">
                <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/payment/amex.svg" alt="Amex" class="payment-logo">
            </div>
            <div class="marquee-item">
                <i class="bi bi-truck"></i>
                <span>Envíos gratis a todo el país</span>
            </div>
            <div class="marquee-item">
                <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/payment/mercadopago.svg" alt="MercadoPago" class="payment-logo">
            </div>
            <div class="marquee-item">
                <i class="bi bi-shield-check"></i>
                <span>Compra 100% segura</span>
            </div>
            <div class="marquee-item">
                <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/payment/naranja.svg" alt="Naranja" class="payment-logo">
            </div>
        </div>
    </div>
</section>

<!-- TODO EL RESTO DEL CONTENIDO DE LA HOME SE MANTIENE IGUAL -->

<?php
get_footer();
?>
                        </div>
                        <div class="benefit-text">
                            <strong>Envíos gratis a todo el país</strong>
                            <span>en compras superiores</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- CATEGORÍAS DESTACADAS -->
<section class="categories-section py-5">
    <div class="container">
        <div class="row mb-5">
            <div class="col-12 text-center">
                <h2 class="section-title" data-aos="fade-up">
                    Explora por <span class="text-gradient">Categoría</span>
                </h2>
                <p class="section-subtitle" data-aos="fade-up" data-aos-delay="200">
                    Encuentra el equipo perfecto para tu necesidad
                </p>
            </div>
        </div>

        <div class="row g-4">
            <?php
            $categories = get_field('categories', 'option');

            if ( $categories ) :
                foreach ( $categories as $index => $cat ) :
            ?>
            <div class="col-lg-3 col-md-6"
                 data-aos="fade-up"
                 data-aos-delay="<?php echo $index * 100; ?>">
                <a href="<?php echo get_term_link( $cat['slug'], 'product_tag' ); ?>"
                   class="category-card"
                   style="--cat-color: <?php echo esc_attr($cat['color']); ?>">
                    <div class="category-icon">
                        <i class="bi bi-<?php echo esc_attr($cat['icon']); ?>"></i>
                    </div>
                    <h3 class="category-name"><?php echo esc_html($cat['name']); ?></h3>
                    <p class="category-desc"><?php echo esc_html($cat['description']); ?></p>
                    <div class="category-footer">
                        <span class="category-action">Ver más</span>
                        <span class="category-arrow">
                            <i class="bi bi-arrow-right"></i>
                        </span>
                    </div>
                </a>
            </div>
            <?php
                endforeach;
            endif;
            ?>
        </div>
    </div>
</section>

<?php include get_stylesheet_directory() . '/sections/seccion-por-que-elegir.php'; ?>

<!-- PRODUCTOS SELECCIONADOS - 8 productos en grid -->
<section class="selected-products-section section-epic py-5">
    <!-- Efectos épicos de fondo -->
    <div class="hero-circuit-pattern"></div>
    <div class="hero-particles"></div>
    <div class="scan-line"></div>
    <div class="circuit-nodes">
        <div class="circuit-node"></div>
        <div class="circuit-node"></div>
        <div class="circuit-node"></div>
    </div>
    <div class="data-flow data-flow-1"></div>

    <div class="container">
        <div class="row mb-5">
            <div class="col-12 text-center">
                <h2 class="section-title section-title-light" data-aos="fade-up">
                    Productos <span class="text-gradient-gold">Seleccionados</span>
                </h2>
                <p class="section-subtitle section-subtitle-light" data-aos="fade-up" data-aos-delay="200">
                    Lo mejor de nuestra tienda, elegido especialmente para ti
                </p>
            </div>
        </div>

        <div class="row g-4">
            <?php
            // Get selected products from ACF
            $selected_products = get_field('selected_products', 'option');

            // If no products selected in ACF, fallback to featured products
            if ( !$selected_products || empty($selected_products) ) {
                $args = array(
                    'post_type' => 'product',
                    'posts_per_page' => 8,
                    'orderby' => 'rand',
                    'tax_query' => array(
                        array(
                            'taxonomy' => 'product_visibility',
                            'field' => 'name',
                            'terms' => 'featured',
                            'operator' => 'IN',
                        ),
                    ),
                );
                $products_query = new WP_Query($args);
                $products = $products_query->posts;
            } else {
                $products = array_slice($selected_products, 0, 8); // Limit to 8
            }

            if ( !empty($products) ) :
                $delay = 0;
                foreach ( $products as $product_obj ) :
                    $product_id = is_object($product_obj) ? $product_obj->ID : $product_obj;
                    $product = wc_get_product($product_id);
                    if ( !$product ) continue;
            ?>
                <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="<?php echo $delay; ?>">
                    <div class="card h-100 product-card-shop">
                        <!-- Link wrapper -->
                        <a href="<?php echo get_permalink($product_id); ?>" class="product-link-wrapper">

                            <!-- Badges de sale en esquina -->
                            <?php if ($product->is_on_sale()) : ?>
                                <span class="badge bg-danger position-absolute top-0 end-0 m-2">OFERTA</span>
                            <?php endif; ?>

                            <!-- Imagen del producto -->
                            <div class="product-image-wrapper">
                                <?php echo $product->get_image('medium'); ?>
                            </div>
                        </a>

                        <!-- Card Body -->
                        <div class="card-body d-flex flex-column">

                            <!-- Título -->
                            <h3 class="woocommerce-loop-product__title">
                                <a href="<?php echo get_permalink($product_id); ?>">
                                    <?php echo $product->get_name(); ?>
                                </a>
                            </h3>

                            <!-- Badge Envío Gratis -->
                            <div class="trust-badges-shop mt-auto mb-2">
                                <div class="trust-badge-item">
                                    <i class="bi bi-truck"></i>
                                    <span>Envío gratis</span>
                                </div>
                            </div>

                            <!-- Precio DESTACADO -->
                            <div class="price-wrapper-shop">
                                <?php echo $product->get_price_html(); ?>
                            </div>

                            <!-- Botón Agregar al carrito -->
                            <?php
                            // Setup post data for woocommerce function
                            global $post;
                            $post = get_post($product_id);
                            setup_postdata($post);
                            woocommerce_template_loop_add_to_cart();
                            wp_reset_postdata();
                            ?>
                        </div>
                    </div>
                </div>
            <?php
                    $delay += 100;
                endforeach;
            else :
            ?>
                <div class="col-12 text-center">
                    <p>No hay productos seleccionados disponibles.</p>
                </div>
            <?php endif; ?>
        </div>
    </div>
</section>

<!-- PRODUCTOS DESTACADOS CON ACF -->
<section class="products-carousel-section section-epic py-5">
    <!-- Efectos épicos de fondo -->
    <div class="hero-circuit-pattern"></div>
    <div class="hero-particles"></div>
    <div class="scan-line"></div>
    <div class="circuit-nodes">
        <div class="circuit-node"></div>
        <div class="circuit-node"></div>
        <div class="circuit-node"></div>
    </div>
    <div class="data-flow data-flow-1"></div>

    <div class="container">
        <div class="text-center mt-2 mb-5">
            <h2 class="section-title section-title-light" data-aos="fade-up">
                PRODUCTOS DESTACADOS
            </h2>
            <p class="section-subtitle section-subtitle-light" data-aos="fade-up" data-aos-delay="200">
                Selección especial de nuestros mejores productos
            </p>
        </div>

        <div class="row g-4">
            <div class="col-12">
                <?php
                // Get featured carousel products from ACF
                $featured_products = get_field('featured_carousel_products', 'option');

                if ( $featured_products && !empty($featured_products) ) {
                    // Build shortcode with specific product IDs
                    $product_ids = array();
                    foreach ( $featured_products as $product_obj ) {
                        $product_ids[] = $product_obj->ID;
                    }
                    echo do_shortcode('[bs-swiper-card-product ids="' . implode(',', $product_ids) . '"]');
                } else {
                    // Fallback to featured products
                    echo do_shortcode('[bs-swiper-card-product featured="true"]');
                }
                ?>
            </div>
        </div>

        <div class="text-center mt-5" data-aos="fade-up">
            <a href="<?php echo esc_url(get_permalink(wc_get_page_id('shop'))); ?>" class="btn btn-outline-primary btn-lg">
                Ver Todos los Productos
                <i class="bi bi-arrow-right"></i>
            </a>
        </div>
    </div>
</section>


<?php include get_stylesheet_directory() . '/sections/seccion-financiacion-epic.php'; ?>

<?php
// ENVÍOS Y GARANTÍAS
include(get_stylesheet_directory() . '/sections/envios-garantias.php');
?>

<!-- ============================================
     POR QUÉ ELEGIRNOS - CARACTERÍSTICAS
     ============================================ -->
<section class="why-choose-us section-epic py-5">
    <!-- Efectos épicos de fondo -->
    <div class="hero-circuit-pattern"></div>
    <div class="hero-particles"></div>
    <div class="scan-line"></div>
    <div class="circuit-nodes">
        <div class="circuit-node"></div>
        <div class="circuit-node"></div>
        <div class="circuit-node"></div>
        <div class="circuit-node"></div>
    </div>
    <div class="data-flow data-flow-1"></div>
    <div class="data-flow data-flow-2"></div>

    <div class="container">
        <div class="row mb-5">
            <div class="col-12 text-center">
                <h2 class="section-title section-title-light" data-aos="fade-up">
                    ¿Por qué elegir <span class="text-gradient-gold">FEYMA</span>?
                </h2>
                <p class="section-subtitle section-subtitle-light" data-aos="fade-up" data-aos-delay="200">
                    La mejor experiencia de compra en tecnología
                </p>
            </div>
        </div>

        <div class="row g-4">
            <?php
            $features = get_field('why_choose_us', 'option');

            if ( $features ) :
                $delay = 0;
                foreach( $features as $feature ) :
            ?>
            <div class="col-lg-4 col-md-6"
                 data-aos="fade-up"
                 data-aos-delay="<?php echo $delay; ?>">
                <div class="feature-card">
                    <div class="feature-icon" style="background: <?php echo esc_attr($feature['color']); ?>;">
                        <i class="bi bi-<?php echo esc_attr($feature['icon']); ?>"></i>
                    </div>
                    <h3 class="feature-title"><?php echo esc_html($feature['title']); ?></h3>
                    <p class="feature-desc"><?php echo esc_html($feature['description']); ?></p>
                </div>
            </div>
            <?php
                    $delay += 100;
                endforeach;
            endif;
            ?>
        </div>
    </div>
</section>


<!-- ============================================
     MARCAS DESTACADAS
     ============================================ -->
<section class="brands-section py-5 bg-light">
    <div class="container">
        <div class="row mb-4">
            <div class="col-12 text-center">
                <h2 class="section-title" data-aos="fade-up">
                    Marcas <span class="text-gradient">Líderes</span>
                </h2>
                <p class="section-subtitle" data-aos="fade-up" data-aos-delay="200">
                    Trabajamos con las mejores marcas del mundo
                </p>
            </div>
        </div>

        <!-- Carousel de marcas en una sola fila -->
        <div class="brands-carousel-wrapper" data-aos="fade-up" data-aos-delay="400">
            <div class="brands-carousel">
                <?php
                $brands = get_field('brands', 'option');

                if ( $brands ) :
                    // Primera iteración
                    foreach( $brands as $brand ) :
                        $logo_url = isset($brand['logo']) && !empty($brand['logo']) ? $brand['logo']['url'] : '';
                ?>
                <div class="brand-slide">
                    <?php if ( $logo_url ) : ?>
                        <img src="<?php echo esc_url($logo_url); ?>"
                             alt="<?php echo esc_attr($brand['name']); ?>"
                             onerror="this.style.display='none'; this.nextElementSibling.style.display='block';">
                    <?php endif; ?>
                    <span class="brand-fallback" <?php echo $logo_url ? 'style="display:none;"' : ''; ?>>
                        <?php echo esc_html($brand['name']); ?>
                    </span>
                </div>
                <?php endforeach; ?>

                <!-- Duplicado para efecto infinito -->
                <?php foreach( $brands as $brand ) :
                    $logo_url = isset($brand['logo']) && !empty($brand['logo']) ? $brand['logo']['url'] : '';
                ?>
                <div class="brand-slide">
                    <?php if ( $logo_url ) : ?>
                        <img src="<?php echo esc_url($logo_url); ?>"
                             alt="<?php echo esc_attr($brand['name']); ?>"
                             onerror="this.style.display='none'; this.nextElementSibling.style.display='block';">
                    <?php endif; ?>
                    <span class="brand-fallback" <?php echo $logo_url ? 'style="display:none;"' : ''; ?>>
                        <?php echo esc_html($brand['name']); ?>
                    </span>
                </div>
                <?php endforeach; ?>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>


<!-- ============================================
     TESTIMONIOS / REVIEWS
     ============================================ -->
<section class="testimonials-section py-5">
    <div class="testimonials-circuit-bg"></div>

    <div class="container position-relative">
        <div class="row mb-5">
            <div class="col-12 text-center">
                <h2 class="section-title text-white" data-aos="fade-up">
                    Lo que dicen nuestros <span class="text-gold">clientes</span>
                </h2>
                <p class="section-subtitle text-white-50" data-aos="fade-up" data-aos-delay="200">
                    Miles de clientes satisfechos en toda Argentina
                </p>
            </div>
        </div>

        <div class="row g-4">
            <?php
            $testimonials = get_field('testimonials', 'option');

            if ( $testimonials ) :
                $delay = 0;
                foreach( $testimonials as $testimonial ) :
            ?>
            <div class="col-lg-4 col-md-6"
                 data-aos="fade-up"
                 data-aos-delay="<?php echo $delay; ?>">
                <div class="testimonial-card">
                    <div class="testimonial-header">
                        <div class="testimonial-avatar">
                            <?php echo esc_html($testimonial['avatar']); ?>
                        </div>
                        <div class="testimonial-info">
                            <h4><?php echo esc_html($testimonial['name']); ?></h4>
                            <p><?php echo esc_html($testimonial['location']); ?></p>
                        </div>
                        <div class="testimonial-rating">
                            <?php for($i = 0; $i < $testimonial['rating']; $i++): ?>
                                <i class="bi bi-star-fill"></i>
                            <?php endfor; ?>
                        </div>
                    </div>
                    <p class="testimonial-text"><?php echo esc_html($testimonial['text']); ?></p>
                    <?php if ( !empty($testimonial['product']) ) : ?>
                    <div class="testimonial-product">
                        <i class="bi bi-bag-check"></i>
                        Compró: <strong><?php echo esc_html($testimonial['product']); ?></strong>
                    </div>
                    <?php endif; ?>
                </div>
            </div>
            <?php
                    $delay += 200;
                endforeach;
            endif;
            ?>
        </div>

        <!-- Stats -->
        <div class="row mt-5">
            <div class="col-12">
                <div class="stats-grid" data-aos="zoom-in">
                    <?php
                    $stats = get_field('stats', 'option');

                    if ( $stats ) :
                        foreach ( $stats as $stat ) :
                    ?>
                    <div class="stat-item">
                        <div class="stat-number"><?php echo esc_html($stat['number']); ?></div>
                        <div class="stat-label"><?php echo esc_html($stat['label']); ?></div>
                    </div>
                    <?php
                        endforeach;
                    endif;
                    ?>
                </div>
            </div>
        </div>
    </div>
</section>

<?php
get_footer();
