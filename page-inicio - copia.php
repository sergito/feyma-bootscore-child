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

        <!-- ============================================
         HERO SLIDER
         ============================================ -->
    <section class="hero-section">
        <div id="heroCarousel" class="carousel slide carousel-fade" data-bs-ride="carousel">
            
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="0" class="active"></button>
                <button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="1"></button>
                <button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="2"></button>
            </div>

            <div class="carousel-inner">
                <!-- Slide 1: Notebooks para el Hogar -->
                <div class="carousel-item active">
                    <div class="hero-slide slide-notebooks">
                        <div class="hero-circuit-pattern"></div>
                        <div class="container">
                            <div class="row align-items-center">
                                <div class="col-lg-6" data-aos="fade-right" data-aos-duration="1000">
                                    <div class="hero-content">
                                        <h1 class="hero-title">
                                            Versatilidad en<br>
                                            <span class="gradient-text">tu hogar.</span>
                                        </h1>
                                        <p class="hero-description">
                                            Desde entretenimiento hasta tareas escolares,<br>
                                            nuestras notebooks son perfectas para<br>
                                            todo lo que necesitas.
                                        </p>
                                        <a href="/notebooks" class="btn btn-hero">
                                            Ver Notebooks
                                            <i class="bi bi-arrow-right"></i>
                                        </a>
                                    </div>
                                </div>
                                <div class="col-lg-6" data-aos="fade-left" data-aos-duration="1000">
                                    <div class="hero-image">
                                        <img src="https://images.unsplash.com/photo-1588872657578-7efd1f1555ed?w=800&h=600&fit=crop" alt="Notebook" class="floating-image">
                                        <div class="hero-glow"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Slide 2: Gaming -->
                <div class="carousel-item">
                    <div class="hero-slide slide-gaming">
                        <div class="hero-circuit-pattern"></div>
                        <div class="container">
                            <div class="row align-items-center">
                                <div class="col-lg-6" data-aos="fade-right" data-aos-duration="1000">
                                    <div class="hero-content">
                                        <span class="hero-badge">Gaming</span>
                                        <h1 class="hero-title">
                                            Potencia que<br>
                                            <span class="gradient-text">domina el juego.</span>
                                        </h1>
                                        <p class="hero-description">
                                            Laptops y componentes gaming de última generación.<br>
                                            RTX 4060, procesadores Intel/AMD de alta performance.
                                        </p>
                                        <a href="/gaming" class="btn btn-hero">
                                            Explorar Gaming
                                            <i class="bi bi-arrow-right"></i>
                                        </a>
                                    </div>
                                </div>
                                <div class="col-lg-6" data-aos="fade-left" data-aos-duration="1000">
                                    <div class="hero-image">
                                        <img src="https://images.unsplash.com/photo-1603481588273-2f908a9a7a1b?w=800&h=600&fit=crop" alt="Gaming" class="floating-image">
                                        <div class="hero-glow"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Slide 3: Apple -->
                <div class="carousel-item">
                    <div class="hero-slide slide-apple">
                        <div class="hero-circuit-pattern"></div>
                        <div class="container">
                            <div class="row align-items-center">
                                <div class="col-lg-6" data-aos="fade-right" data-aos-duration="1000">
                                    <div class="hero-content">
                                        <span class="hero-badge">Próximos Ingresos</span>
                                        <h1 class="hero-title">
                                            <i class="bi bi-apple"></i> iMac<br>
                                            <span class="gradient-text">Diseño. Poder.</span>
                                        </h1>
                                        <p class="hero-description">
                                            La nueva generación de iMac llega a FEYMA.<br>
                                            Chip M3, pantalla Retina 4.5K, colores vibrantes.
                                        </p>
                                        <a href="/apple" class="btn btn-hero">
                                            Ver Modelos
                                            <i class="bi bi-arrow-right"></i>
                                        </a>
                                    </div>
                                </div>
                                <div class="col-lg-6" data-aos="fade-left" data-aos-duration="1000">
                                    <div class="hero-image">
                                        <img src="https://images.unsplash.com/photo-1517059224940-d4af9eec41b7?w=800&h=600&fit=crop" alt="iMac" class="floating-image">
                                        <div class="hero-glow"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Controls -->
            <button class="carousel-control-prev" type="button" data-bs-target="#heroCarousel" data-bs-slide="prev">
                <i class="bi bi-chevron-left"></i>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#heroCarousel" data-bs-slide="next">
                <i class="bi bi-chevron-right"></i>
            </button>
        </div>
    </section>

    <!-- ============================================
         PAYMENT METHODS / BENEFITS
         ============================================ -->
    <section class="benefits-bar">
        <div class="container-fluid">
            <div class="benefits-scroll">
                <!-- Payment Methods -->
                <div class="benefit-item">
                    <img src="https://cdn.worldvectorlogo.com/logos/visa-10.svg" alt="Visa">
                </div>
                <div class="benefit-item">
                    <img src="https://cdn.worldvectorlogo.com/logos/mastercard-2.svg" alt="Mastercard">
                </div>
                <div class="benefit-item">
                    <img src="https://cdn.worldvectorlogo.com/logos/american-express-1.svg" alt="American Express">
                </div>
                <div class="benefit-item">
                    <img src="https://cdn.worldvectorlogo.com/logos/maestro-1.svg" alt="Maestro">
                </div>
                <div class="benefit-item">
                    <img src="https://via.placeholder.com/80x40/1976D2/FFFFFF?text=Nativa" alt="Nativa">
                </div>
                <div class="benefit-item">
                    <img src="https://cdn.worldvectorlogo.com/logos/mercado-pago.svg" alt="Mercado Pago">
                </div>
                
                <!-- Benefits -->
                <div class="benefit-item benefit-text">
                    <i class="bi bi-shield-check"></i>
                    <span>Tu compra siempre está protegida</span>
                </div>
                <div class="benefit-item benefit-text">
                    <i class="bi bi-truck"></i>
                    <span>Envíos gratis a todo el país</span>
                </div>
            </div>
        </div>
    </section>

    <!-- ============================================
         BRANDS SECTION
         ============================================ -->
    <section class="brands-section">
        <div class="container">
            <div class="section-header text-center" data-aos="fade-up">
                <h2 class="section-title">Nuestras marcas</h2>
            </div>

            <div class="brands-slider">
                <div class="brand-slide">
                    <button class="brand-btn">
                        <i class="bi bi-apple"></i>
                    </button>
                </div>
                <div class="brand-slide">
                    <button class="brand-btn">
                        <img src="https://cdn.worldvectorlogo.com/logos/acer-3.svg" alt="Acer">
                    </button>
                </div>
                <div class="brand-slide">
                    <button class="brand-btn">
                        <img src="https://cdn.worldvectorlogo.com/logos/msi-1.svg" alt="MSI">
                    </button>
                </div>
                <div class="brand-slide">
                    <button class="brand-btn">
                        <img src="https://cdn.worldvectorlogo.com/logos/samsung-5.svg" alt="Samsung">
                    </button>
                </div>
                <div class="brand-slide">
                    <button class="brand-btn">
                        <img src="https://cdn.worldvectorlogo.com/logos/lenovo-2.svg" alt="Lenovo">
                    </button>
                </div>
                <div class="brand-slide">
                    <button class="brand-btn">
                        <img src="https://cdn.worldvectorlogo.com/logos/hp-2.svg" alt="HP">
                    </button>
                </div>
                <div class="brand-slide">
                    <button class="brand-btn">
                        <img src="https://cdn.worldvectorlogo.com/logos/asus-1.svg" alt="ASUS">
                    </button>
                </div>
            </div>
        </div>
    </section>

    <!-- ============================================
         UPCOMING PRODUCTS - iMac Promo
         ============================================ -->
    <section class="imac-promo-section" data-aos="fade-up">
        <div class="container">
            <div class="imac-promo-box">
                <div class="row align-items-center">
                    <div class="col-lg-6">
                        <div class="imac-promo-content">
                            <h2>
                                Próximos<br>
                                <strong>INGRESOS!</strong>
                            </h2>
                            <h3><i class="bi bi-apple"></i> iMac</h3>
                            <a href="/apple/imac" class="btn btn-imac">Ver modelos</a>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="imac-promo-image">
                            <img src="https://images.unsplash.com/photo-1527443224154-c4a3942d3acf?w=800&h=600&fit=crop" alt="iMac" class="img-fluid">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ============================================
         FEATURED PRODUCTS
         ============================================ -->
    <section class="products-section">
        <div class="container">
            <div class="section-header text-center" data-aos="fade-up">
                <h2 class="section-title">Productos Destacados</h2>
            </div>

            <div class="row g-4">
                <div class="col-12">
                    <?php echo do_shortcode('[bs-swiper-card-product featured="true"]'); ?>
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

    <!-- ============================================
         NEWSLETTER CTA
         ============================================ -->
    <section class="newsletter-section">
        <div class="newsletter-circuit-bg"></div>
        <div class="container">
            <div class="newsletter-box" data-aos="zoom-in">
                <h2>Enterate de todas las promociones y novedades.</h2>
                <a href="/contacto" class="btn btn-newsletter">
                    Contactar
                    <i class="bi bi-arrow-right"></i>
                </a>
            </div>
        </div>
    </section>

<?php
get_footer();