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

<!-- HERO SECTION - CIRCUIT PATTERNS ÉPICOS -->
<section class="hero-section">
    <!-- Tu imagen como base -->
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
        
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="0" class="active"></button>
            <button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="1"></button>
            <button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="2"></button>
        </div>

        <div class="carousel-inner">
            
            <!-- SLIDE 1: NOTEBOOKS -->
            <div class="carousel-item active">
                <div class="container">
                    <div class="row align-items-center min-vh-90">
                        <div class="col-lg-6" data-aos="fade-right" data-aos-duration="1000">
                            <div class="hero-content">
                                <span class="hero-badge" data-aos="zoom-in" data-aos-delay="200">
                                    <i class="bi bi-lightning-charge-fill me-2"></i>
                                    Nuevos Arrivals 2025
                                </span>
                                <h1 class="hero-title" data-aos="fade-up" data-aos-delay="400">
                                    Potencia<br>
                                    <span class="gradient-text">ilimitada.</span>
                                </h1>
                                <p class="hero-description" data-aos="fade-up" data-aos-delay="600">
                                    Notebooks de última generación. Intel Core i9 Gen 14,<br>
                                    RTX 4090, 144Hz. El futuro en tus manos.
                                </p>
                                <div class="hero-buttons" data-aos="fade-up" data-aos-delay="800">
                                    <a href="<?php echo get_term_link( 'notebooks', 'product_cat' ); ?>" class="btn-hero">
                                        <span>Ver Notebooks</span>
                                        <i class="bi bi-arrow-right ms-2"></i>
                                    </a>
                                    <a href="<?php echo wc_get_page_permalink( 'shop' ); ?>" class="btn-hero-outline">
                                        Catálogo Completo
                                    </a>
                                </div>
                                
                                <!-- Specs destacadas -->
                                <div class="hero-specs" data-aos="fade-up" data-aos-delay="1000">
                                    <div class="spec-item">
                                        <i class="bi bi-cpu"></i>
                                        <span>Intel i9</span>
                                    </div>
                                    <div class="spec-item">
                                        <i class="bi bi-gpu-card"></i>
                                        <span>RTX 4090</span>
                                    </div>
                                    <div class="spec-item">
                                        <i class="bi bi-lightning-charge"></i>
                                        <span>144Hz</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-lg-6" data-aos="fade-left" data-aos-duration="1000" data-aos-delay="400">
                            <div class="hero-image-wrapper">
                                <div class="hero-product-glow"></div>
                                <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/notebook-hero.png" 
                                     alt="Notebook Gaming" 
                                     class="img-fluid hero-product-img"
                                     onerror="this.src=https://via.placeholder.com/600x400/5F4B8B/F7B32B?text=Notebook+Gaming'">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- SLIDE 2: GAMING -->
            <div class="carousel-item">
                <div class="container">
                    <div class="row align-items-center min-vh-90">
                        <div class="col-lg-6" data-aos="fade-right" data-aos-duration="1000">
                            <div class="hero-content">
                                <span class="hero-badge gaming" data-aos="zoom-in" data-aos-delay="200">
                                    <i class="bi bi-controller me-2"></i>
                                    Gaming Zone
                                </span>
                                <h1 class="hero-title" data-aos="fade-up" data-aos-delay="400">
                                    Domina el<br>
                                    <span class="gradient-text-gaming">juego.</span>
                                </h1>
                                <p class="hero-description" data-aos="fade-up" data-aos-delay="600">
                                    Equipos gaming de alto rendimiento. RTX 4090,<br>
                                    refrigeración líquida, RGB. Máxima performance.
                                </p>
                                <div class="hero-buttons" data-aos="fade-up" data-aos-delay="800">
                                    <a href="<?php echo get_term_link( 'gaming', 'product_tag' ); ?>" class="btn-hero gaming">
                                        <span>Ver Gaming</span>
                                        <i class="bi bi-controller ms-2"></i>
                                    </a>
                                </div>
                                
                                <!-- Gaming specs -->
                                <div class="hero-specs" data-aos="fade-up" data-aos-delay="1000">
                                    <div class="spec-item">
                                        <i class="bi bi-fire"></i>
                                        <span>Ultra FPS</span>
                                    </div>
                                    <div class="spec-item">
                                        <i class="bi bi-thermometer-sun"></i>
                                        <span>Cooling</span>
                                    </div>
                                    <div class="spec-item">
                                        <i class="bi bi-brightness-high"></i>
                                        <span>RGB</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-lg-6" data-aos="fade-left" data-aos-duration="1000" data-aos-delay="400">
                            <div class="hero-image-wrapper">
                                <div class="hero-product-glow gaming"></div>
                                <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/gaming-hero.png" 
                                     alt="Gaming Setup" 
                                     class="img-fluid hero-product-img"
                                     onerror="this.src='https://via.placeholder.com/600x400/EF4444/FFFFFF?text=Gaming+Setup'">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- SLIDE 3: APPLE -->
            <div class="carousel-item">
                <div class="container">
                    <div class="row align-items-center min-vh-90">
                        <div class="col-lg-6" data-aos="fade-right" data-aos-duration="1000">
                            <div class="hero-content">
                                <span class="hero-badge apple" data-aos="zoom-in" data-aos-delay="200">
                                    <i class="bi bi-apple me-2"></i>
                                    Apple Premium
                                </span>
                                <h1 class="hero-title" data-aos="fade-up" data-aos-delay="400">
                                    Piensa<br>
                                    <span class="gradient-text-apple">diferente.</span>
                                </h1>
                                <p class="hero-description" data-aos="fade-up" data-aos-delay="600">
                                    MacBook Pro M3 Max. iMac 24". iPad Pro.<br>
                                    La mejor tecnología Apple en Argentina.
                                </p>
                                <div class="hero-buttons" data-aos="fade-up" data-aos-delay="800">
                                    <a href="<?php echo get_term_link( 'apple', 'product_tag' ); ?>" class="btn-hero apple">
                                        <span>Ver Apple</span>
                                        <i class="bi bi-apple ms-2"></i>
                                    </a>
                                </div>
                                
                                <!-- Apple specs -->
                                <div class="hero-specs" data-aos="fade-up" data-aos-delay="1000">
                                    <div class="spec-item">
                                        <i class="bi bi-cpu"></i>
                                        <span>M3 Max</span>
                                    </div>
                                    <div class="spec-item">
                                        <i class="bi bi-display"></i>
                                        <span>Retina</span>
                                    </div>
                                    <div class="spec-item">
                                        <i class="bi bi-apple"></i>
                                        <span>Ecosystem</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-lg-6" data-aos="fade-left" data-aos-duration="1000" data-aos-delay="400">
                            <div class="hero-image-wrapper">
                                <div class="hero-product-glow apple"></div>
                                <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/apple-hero.png" 
                                     alt="Apple Products" 
                                     class="img-fluid hero-product-img"
                                     onerror="this.src='https://via.placeholder.com/600x400/1A1A1A/FFFFFF?text=Apple+Products'">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

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