<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Bootscore
 * @version 6.1.0
 */

// Exit if accessed directly
defined('ABSPATH') || exit;

get_header();
?>

<!-- HERO SECTION V2 - SLIDER COMPACTO 650PX -->
<section class="hero-section-v2">
    <div class="hero-bg-pattern"></div>

    <!-- CAROUSEL DE HERO -->
    <div id="heroCarousel" class="carousel slide carousel-fade" data-bs-ride="carousel" data-bs-interval="5000">

        <div class="carousel-indicators carousel-indicators-v2">
            <button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="0" class="active"></button>
            <button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="1"></button>
            <button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="2"></button>
            <button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="3"></button>
            <button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="4"></button>
        </div>

        <div class="carousel-inner">

            <!-- SLIDE 1: ENVÍOS GRATIS -->
            <div class="carousel-item active">
                <div class="container h-100">
                    <div class="row align-items-center h-100">
                        <div class="col-lg-6">
                            <div class="hero-content-v2">
                                <h1 class="hero-title-v2">
                                    Envíos gratis
                                    <span class="gradient-accent">a todo el país</span>
                                </h1>
                                <p class="hero-description-v2">
                                    Comprá desde la comodidad de tu casa y recibí tu producto en cualquier punto del país sin costo adicional.
                                </p>
                                <div class="hero-actions-v2">
                                    <a href="<?php echo wc_get_page_permalink( 'shop' ); ?>" class="btn-hero-v2">
                                        Ver productos
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="hero-image-container">
                                <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/camion-feyma.png"
                                     alt="Envíos gratis"
                                     class="hero-product-image"
                                     onerror="this.src='https://via.placeholder.com/600x400/3D3180/F7B32B?text=Envios+Gratis'">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- SLIDE 2: NOTEBOOKS DE OFICINA -->
            <div class="carousel-item">
                <div class="container h-100">
                    <div class="row align-items-center h-100">
                        <div class="col-lg-6">
                            <div class="hero-content-v2">
                                <h1 class="hero-title-v2">
                                    Notebooks de
                                    <span class="gradient-accent">Oficina.</span>
                                </h1>
                                <p class="hero-description-v2">
                                    Eficiencia y estilo para tu día laboral. Equipos profesionales para trabajar desde cualquier lugar.
                                </p>
                                <div class="hero-actions-v2">
                                    <a href="<?php echo get_term_link( 'notebooks', 'product_cat' ); ?>" class="btn-hero-v2">
                                        Ver Notebooks
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="hero-image-container">
                                <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/notebook-oficina.png"
                                     alt="Notebooks de Oficina"
                                     class="hero-product-image"
                                     onerror="this.src='https://via.placeholder.com/600x400/3D3180/F7B32B?text=Notebook+Oficina'">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- SLIDE 3: VERSATILIDAD -->
            <div class="carousel-item">
                <div class="container h-100">
                    <div class="row align-items-center h-100">
                        <div class="col-lg-6">
                            <div class="hero-content-v2">
                                <h1 class="hero-title-v2">
                                    Versatilidad en
                                    <span class="gradient-accent">tu hogar.</span>
                                </h1>
                                <p class="hero-description-v2">
                                    Desde entretenimiento hasta tareas escolares, nuestras notebooks son perfectas para todo lo que necesitas.
                                </p>
                                <div class="hero-actions-v2">
                                    <a href="<?php echo get_term_link( 'notebooks', 'product_cat' ); ?>" class="btn-hero-v2">
                                        Ver Notebooks
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="hero-image-container">
                                <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/notebook-versatil.png"
                                     alt="Versatilidad"
                                     class="hero-product-image"
                                     onerror="this.src='https://via.placeholder.com/600x400/3D3180/F7B32B?text=Versatilidad'">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- SLIDE 4: GAMING -->
            <div class="carousel-item">
                <div class="container h-100">
                    <div class="row align-items-center h-100">
                        <div class="col-lg-6">
                            <div class="hero-content-v2">
                                <h1 class="hero-title-v2">
                                    Potencia y rendimiento
                                    <span class="gradient-accent">para jugar sin límites.</span>
                                </h1>
                                <p class="hero-description-v2">
                                    Elevá tu experiencia en gaming con nuestras notebooks diseñadas para tu victoria.
                                </p>
                                <div class="hero-actions-v2">
                                    <a href="<?php echo get_term_link( 'gaming', 'product_tag' ); ?>" class="btn-hero-v2">
                                        Ver Notebooks
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="hero-image-container">
                                <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/notebook-gaming.png"
                                     alt="Gaming"
                                     class="hero-product-image"
                                     onerror="this.src='https://via.placeholder.com/600x400/3D3180/F7B32B?text=Gaming'">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- SLIDE 5: PAGÁ SEGURO CON NAVE -->
            <div class="carousel-item">
                <div class="container h-100">
                    <div class="row align-items-center h-100">
                        <div class="col-lg-6">
                            <div class="hero-content-v2">
                                <h1 class="hero-title-v2">
                                    Pagá seguro
                                    <span class="gradient-accent">con Nave</span>
                                </h1>
                                <p class="hero-description-v2">
                                    En nuestra tienda con Nave podés pagar con cualquier billetera virtual.
                                </p>
                                <div class="hero-actions-v2">
                                    <a href="<?php echo wc_get_page_permalink( 'shop' ); ?>" class="btn-hero-v2">
                                        Comprar
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="hero-image-container">
                                <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/pago-nave.png"
                                     alt="Pago seguro"
                                     class="hero-product-image"
                                     onerror="this.src='https://via.placeholder.com/600x400/3D3180/F7B32B?text=Pago+Seguro'">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <!-- Controls Personalizados -->
        <button class="carousel-control-prev carousel-control-prev-v2" type="button" data-bs-target="#heroCarousel" data-bs-slide="prev">
            <i class="bi bi-chevron-left"></i>
        </button>
        <button class="carousel-control-next carousel-control-next-v2" type="button" data-bs-target="#heroCarousel" data-bs-slide="next">
            <i class="bi bi-chevron-right"></i>
        </button>
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
            $categories = array(
                array(
                    'name' => 'Gaming',
                    'slug' => 'gaming',
                    'icon' => 'controller',
                    'color' => '#3D3180',
                    'desc' => 'Alto rendimiento extremo',
                    'count' => '120+ productos'
                ),
                array(
                    'name' => 'Diseño',
                    'slug' => 'diseno',
                    'icon' => 'palette',
                    'color' => '#3D3180',
                    'desc' => 'Creación profesional',
                    'count' => '80+ productos'
                ),
                array(
                    'name' => 'Oficina',
                    'slug' => 'oficina',
                    'icon' => 'briefcase',
                    'color' => '#3D3180',
                    'desc' => 'Productividad diaria',
                    'count' => '150+ productos'
                ),
                array(
                    'name' => 'Apple',
                    'slug' => 'apple',
                    'icon' => 'apple',
                    'color' => '#3D3180',
                    'desc' => 'Ecosistema completo',
                    'count' => '50+ productos'
                ),
            );
            
            foreach ( $categories as $index => $cat ) :
            ?>
            <div class="col-lg-3 col-md-6" 
                 data-aos="fade-up" 
                 data-aos-delay="<?php echo $index * 100; ?>">
                <a href="<?php echo get_term_link( $cat['slug'], 'product_tag' ); ?>"
                   class="category-card"
                   style="--cat-color: <?php echo $cat['color']; ?>">
                    <div class="category-icon">
                        <i class="bi bi-<?php echo $cat['icon']; ?>"></i>
                    </div>
                    <h3 class="category-name"><?php echo $cat['name']; ?></h3>
                    <p class="category-desc"><?php echo $cat['desc']; ?></p>
                    <div class="category-footer">
                        <span class="category-action">Ver más</span>
                        <span class="category-arrow">
                            <i class="bi bi-arrow-right"></i>
                        </span>
                    </div>
                </a>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<?php //include get_stylesheet_directory() . '/sections/seccion-por-que-elegir.php'; ?>

<!-- PRODUCTOS SELECCIONADOS - 8 productos en grid -->
<section class="selected-products-section py-5">
    <div class="container">
        <div class="row mb-5">
            <div class="col-12 text-center">
                <h2 class="section-title" data-aos="fade-up">
                    Productos <span class="text-gradient">Seleccionados</span>
                </h2>
                <p class="section-subtitle" data-aos="fade-up" data-aos-delay="200">
                    Lo mejor de nuestra tienda, elegido especialmente para ti
                </p>
            </div>
        </div>

        <div class="woocommerce">
            <div class="row g-2 g-sm-2 g-md-2 g-lg-4">
                <?php
                $args = array(
                    'visibility' => 'visible',
                    'status' => 'publish',
                    'orderby' => 'rand',
                    'limit' => 8,
                    'stock_status' => 'instock',
                    'return' => 'ids',
                );
                $custom_products = wc_get_products( $args );

                if( $custom_products ): ?>
                    
                    <?php foreach ( $custom_products as $idProducto ) : ?>

                        <?php
                        $post_object = get_post( $idProducto );

                        setup_postdata( $GLOBALS['post'] =& $post_object ); 

                        wc_get_template_part( 'content', 'product-Home');
                        ?>

                    <?php endforeach; ?>
                    
                <?php endif; ?>
            </div>
        </div>    
    </div>
</section>


<!-- PRODUCTOS DESTACADOS CON ACF -->
<section class="products-carousel-section py-5">
    <div class="container">
        <div class="text-center mt-2 mb-5">
            <h2 class="section-title" data-aos="fade-up">
                PRODUCTOS DESTACADOS
            </h2>
            <p class="section-subtitle" data-aos="fade-up" data-aos-delay="200">
                Selección especial de nuestros mejores productos
            </p>
        </div>

        <div class="row g-4">
            <div class="col-12">
                <?php
                    // 1) Traer SOLO IDs de productos destacados
                    $featured_ids = wc_get_products([
                    'featured' => true,
                    'visibility' => 'visible',
                    'status' => 'publish',
                    'limit'    => 16,        // ajustá cantidad
                    'orderby'  => 'date',
                    'order'    => 'DESC',
                    'stock_status' => 'instock',
                    'return'   => 'ids',     // SOLO IDs
                    ]);

                    if (!empty($featured_ids)) : ?>

                    <section class="related products p-0 m-0">
                        <div class="products-carousel-section py-0">
                            <div class="woocommerce featured-products-swiper">
                                <div class="swiper" id="relatedSwiper">
                                    <div class="swiper-wrapper">
                                        <?php foreach ($featured_ids as $product_id) :
                                            $product = wc_get_product($product_id);
                                            if (!$product) continue; ?>

                                            <?php
                                                $post_object = get_post( $product_id );

                                                setup_postdata( $GLOBALS['post'] =& $post_object ); 

                                                wc_get_template_part( 'content', 'product-Carrusel');
                                            ?>

                                        <?php endforeach; ?>
                                    </div>

                                    <!-- Add Pagination -->
                                    <div class="swiper-pagination"></div>
                                    <!-- Add Arrows -->
                                    <div class="swiper-button-next end-0"></div>
                                    <div class="swiper-button-prev start-0"></div>
                                </div>
                            </div>
                        </div>
                    </section>
                    <?php endif; ?>
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

// ANTES del banner de financiación

// 2. ENVÍOS Y GARANTÍAS
include(get_stylesheet_directory() . '/sections/envios-garantias.php'); 


/**
 * SECCIONES ADICIONALES PARA FRONT-PAGE.PHP
 * Añadir después de la sección de productos destacados
 */
?>

<!-- ============================================
     1. POR QUÉ ELEGIRNOS - CARACTERÍSTICAS
     ============================================ -->
<section class="why-choose-us py-5">
    <div class="container">
        <div class="row mb-5">
            <div class="col-12 text-center">
                <h2 class="section-title" data-aos="fade-up">
                    ¿Por qué elegir <span class="text-gradient">FEYMA</span>?
                </h2>
                <p class="section-subtitle" data-aos="fade-up" data-aos-delay="200">
                    La mejor experiencia de compra en tecnología
                </p>
            </div>
        </div>
        
        <div class="row g-4">
            <?php
            $features = array(
                array(
                    'icon' => 'shield-check',
                    'title' => 'Garantía Extendida',
                    'desc' => '2 años de garantía en todos los productos. Soporte técnico incluido.',
                    'color' => '#3D3180',
                    'delay' => 0
                ),
                array(
                    'icon' => 'truck',
                    'title' => 'Envío Gratis',
                    'desc' => 'En compras superiores a $50.000. Entrega express en CABA.',
                    'color' => '#3D3180',
                    'delay' => 100
                ),
                array(
                    'icon' => 'credit-card',
                    'title' => '12 Cuotas Sin Interés',
                    'desc' => 'Con todas las tarjetas de crédito. Financiación inteligente.',
                    'color' => '#3D3180',
                    'delay' => 200
                ),
                array(
                    'icon' => 'headset',
                    'title' => 'Soporte 24/7',
                    'desc' => 'Atención al cliente vía WhatsApp, Email y Chat en vivo.',
                    'color' => '#3D3180',
                    'delay' => 300
                ),
                array(
                    'icon' => 'arrow-repeat',
                    'title' => 'Cambios Gratis',
                    'desc' => '30 días para cambios y devoluciones. Sin preguntas.',
                    'color' => '#3D3180',
                    'delay' => 400
                ),
                array(
                    'icon' => 'patch-check',
                    'title' => 'Productos Originales',
                    'desc' => '100% genuinos. Importadores oficiales de las mejores marcas.',
                    'color' => '#3D3180',
                    'delay' => 500
                ),
            );
            
            foreach( $features as $feature ) :
            ?>
            <div class="col-lg-4 col-md-6" 
                 data-aos="fade-up" 
                 data-aos-delay="<?php echo $feature['delay']; ?>">
                <div class="feature-card">
                    <div class="feature-icon" style="background: <?php echo $feature['color']; ?>;">
                        <i class="bi bi-<?php echo $feature['icon']; ?>"></i>
                    </div>
                    <h3 class="feature-title"><?php echo $feature['title']; ?></h3>
                    <p class="feature-desc"><?php echo $feature['desc']; ?></p>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>


<!-- ============================================
     2. MARCAS DESTACADAS
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
                $brands = array(
                    array('name' => 'Apple', 'logo' => 'apple.svg'),
                    array('name' => 'MSI', 'logo' => 'msi.svg'),
                    array('name' => 'ASUS', 'logo' => 'asus.svg'),
                    array('name' => 'Lenovo', 'logo' => 'lenovo.svg'),
                    array('name' => 'HP', 'logo' => 'hp.svg'),
                    array('name' => 'Dell', 'logo' => 'dell.svg'),
                    array('name' => 'Razer', 'logo' => 'razer.svg'),
                    array('name' => 'Corsair', 'logo' => 'corsair.svg'),
                    array('name' => 'Logitech', 'logo' => 'logitech.svg'),
                    array('name' => 'Samsung', 'logo' => 'samsung.svg'),
                    array('name' => 'LG', 'logo' => 'lg.svg'),
                    array('name' => 'Intel', 'logo' => 'intel.svg'),
                );

                // Primera iteración
                foreach( $brands as $brand ) :
                ?>
                <div class="brand-slide">
                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/brands/<?php echo $brand['logo']; ?>"
                         alt="<?php echo $brand['name']; ?>"
                         onerror="this.style.display='none'; this.nextElementSibling.style.display='block';">
                    <span class="brand-fallback"><?php echo $brand['name']; ?></span>
                </div>
                <?php endforeach; ?>

                <!-- Duplicado para efecto infinito -->
                <?php foreach( $brands as $brand ) : ?>
                <div class="brand-slide">
                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/brands/<?php echo $brand['logo']; ?>"
                         alt="<?php echo $brand['name']; ?>"
                         onerror="this.style.display='none'; this.nextElementSibling.style.display='block';">
                    <span class="brand-fallback"><?php echo $brand['name']; ?></span>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</section>


<!-- ============================================
     3. TESTIMONIOS / REVIEWS
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
            $testimonials = array(
                array(
                    'name' => 'Martín González',
                    'location' => 'Buenos Aires',
                    'rating' => 5,
                    'text' => 'Excelente atención y productos de primera calidad. Compré mi notebook gamer y llegó al día siguiente. Totalmente recomendado!',
                    'product' => 'Notebook MSI Katana',
                    'avatar' => 'MG',
                    'delay' => 0
                ),
                array(
                    'name' => 'Laura Fernández',
                    'location' => 'Córdoba',
                    'rating' => 5,
                    'text' => 'El mejor precio del mercado. Compré mi MacBook con 12 cuotas sin interés. El envío fue rapidísimo y el producto impecable.',
                    'product' => 'MacBook Pro M3',
                    'avatar' => 'LF',
                    'delay' => 200
                ),
                array(
                    'name' => 'Diego Rodríguez',
                    'location' => 'Rosario',
                    'rating' => 5,
                    'text' => 'Increíble el soporte post-venta. Tuve una consulta técnica y me respondieron en minutos por WhatsApp. Muy profesionales.',
                    'product' => 'PC Gamer Armada',
                    'avatar' => 'DR',
                    'delay' => 400
                ),
            );
            
            foreach( $testimonials as $testimonial ) :
            ?>
            <div class="col-lg-4 col-md-6" 
                 data-aos="fade-up" 
                 data-aos-delay="<?php echo $testimonial['delay']; ?>">
                <div class="testimonial-card">
                    <div class="testimonial-header">
                        <div class="testimonial-avatar">
                            <?php echo $testimonial['avatar']; ?>
                        </div>
                        <div class="testimonial-info">
                            <h4><?php echo $testimonial['name']; ?></h4>
                            <p><?php echo $testimonial['location']; ?></p>
                        </div>
                        <div class="testimonial-rating">
                            <?php for($i = 0; $i < $testimonial['rating']; $i++): ?>
                                <i class="bi bi-star-fill"></i>
                            <?php endfor; ?>
                        </div>
                    </div>
                    <p class="testimonial-text"><?php echo $testimonial['text']; ?></p>
                    <div class="testimonial-product">
                        <i class="bi bi-bag-check"></i>
                        Compró: <strong><?php echo $testimonial['product']; ?></strong>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
        
        <!-- Stats -->
        <div class="row mt-5">
            <div class="col-12">
                <div class="stats-grid" data-aos="zoom-in">
                    <div class="stat-item">
                        <div class="stat-number">15K+</div>
                        <div class="stat-label">Clientes Felices</div>
                    </div>
                    <div class="stat-item">
                        <div class="stat-number">4.9</div>
                        <div class="stat-label">Rating Promedio</div>
                    </div>
                    <div class="stat-item">
                        <div class="stat-number">500+</div>
                        <div class="stat-label">Productos</div>
                    </div>
                    <div class="stat-item">
                        <div class="stat-number">98%</div>
                        <div class="stat-label">Satisfacción</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php
get_footer();