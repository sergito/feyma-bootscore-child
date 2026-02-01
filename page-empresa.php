<?php
/**
 *  Template Name: Empresa / Quienes Somos
 **/

// Exit if accessed directly
defined('ABSPATH') || exit;

get_header();
?>

<!-- ============================================
         HERO SECTION ÉPICO
         ============================================ -->
    <section class="page-hero-epic">
        <!-- Circuit pattern animado -->
        <div class="hero-circuit-pattern"></div>
        <div class="hero-particles"></div>
        <div class="scan-line"></div>

        <!-- Nodos de conexión pulsantes -->
        <div class="circuit-nodes">
            <div class="circuit-node"></div>
            <div class="circuit-node"></div>
            <div class="circuit-node"></div>
            <div class="circuit-node"></div>
        </div>

        <!-- Data flow (líneas que viajan) -->
        <div class="data-flow data-flow-1"></div>
        <div class="data-flow data-flow-2"></div>

        <div class="container">
            <div class="row align-items-center min-vh-50">
                <div class="col-lg-12 text-center">
                    <div class="page-hero-content" data-aos="fade-up">
                        <div class="hero-icon mb-4" data-aos="zoom-in" data-aos-delay="100">
                            <i class="bi bi-building"></i>
                        </div>
                        <h1 class="page-hero-title" data-aos="fade-up" data-aos-delay="200">
                            Quiénes Somos
                        </h1>
                        <p class="page-hero-subtitle" data-aos="fade-up" data-aos-delay="300">
                            Más de 15 años de experiencia en tecnología
                        </p>
                        <nav aria-label="breadcrumb" data-aos="fade-up" data-aos-delay="400">
                            <ol class="breadcrumb justify-content-center">
                                <li class="breadcrumb-item"><a href="/">Inicio</a></li>
                                <li class="breadcrumb-item active">Empresa</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ============================================
         ABOUT SECTION
         ============================================ -->
    <section class="about-section py-5">
        <div class="container">
            <div class="row align-items-center mb-5">
                <div class="col-lg-6" data-aos="fade-right">
                    <div class="about-content">
                        <h2 class="section-title mb-4">Nuestra Historia</h2>
                        <p class="lead">
                            FEYMA nació en 2009 con la misión de democratizar el acceso a la tecnología en Argentina.
                        </p>
                        <p>
                            Desde entonces, nos hemos consolidado como uno de los principales referentes en la venta de productos tecnológicos, ofreciendo las últimas innovaciones a precios competitivos y con un servicio de excelencia.
                        </p>
                        <p>
                            Nuestra pasión por la tecnología nos impulsa a estar siempre a la vanguardia, incorporando los productos más recientes del mercado y brindando asesoramiento especializado a cada uno de nuestros clientes.
                        </p>
                    </div>
                </div>
                <div class="col-lg-6" data-aos="fade-left">
                    <div class="about-image-wrapper">
                        <div class="tech-pattern-bg"></div>
                        <div class="about-stats">
                            <div class="stat-item">
                                <div class="stat-number">15+</div>
                                <div class="stat-label">Años de experiencia</div>
                            </div>
                            <div class="stat-item">
                                <div class="stat-number">50K+</div>
                                <div class="stat-label">Clientes satisfechos</div>
                            </div>
                            <div class="stat-item">
                                <div class="stat-number">1000+</div>
                                <div class="stat-label">Productos en catálogo</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ============================================
         VALUES SECTION
         ============================================ -->
    <section class="values-section py-5 bg-light">
        <div class="container">
            <div class="row mb-5">
                <div class="col-12 text-center" data-aos="fade-up">
                    <h2 class="section-title">Nuestros Valores</h2>
                    <p class="section-subtitle">Los pilares que guían nuestro trabajo diario</p>
                </div>
            </div>

            <div class="row g-4">
                <!-- Calidad -->
                <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
                    <div class="value-card">
                        <div class="value-icon purple">
                            <i class="bi bi-award"></i>
                        </div>
                        <h3>Calidad</h3>
                        <p>Trabajamos solo con marcas líderes y productos originales, garantizando la mejor calidad para nuestros clientes.</p>
                    </div>
                </div>

                <!-- Innovación -->
                <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="200">
                    <div class="value-card">
                        <div class="value-icon gold">
                            <i class="bi bi-lightbulb"></i>
                        </div>
                        <h3>Innovación</h3>
                        <p>Estamos constantemente actualizando nuestro catálogo con los últimos lanzamientos tecnológicos del mercado.</p>
                    </div>
                </div>

                <!-- Confianza -->
                <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="300">
                    <div class="value-card">
                        <div class="value-icon purple">
                            <i class="bi bi-shield-check"></i>
                        </div>
                        <h3>Confianza</h3>
                        <p>Más de 50.000 clientes confían en nosotros. Tu satisfacción es nuestra prioridad número uno.</p>
                    </div>
                </div>

                <!-- Precio Justo -->
                <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="400">
                    <div class="value-card">
                        <div class="value-icon gold">
                            <i class="bi bi-graph-up-arrow"></i>
                        </div>
                        <h3>Precio Justo</h3>
                        <p>Ofrecemos precios competitivos y promociones exclusivas, sin sacrificar calidad ni servicio.</p>
                    </div>
                </div>

                <!-- Atención Personalizada -->
                <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="500">
                    <div class="value-card">
                        <div class="value-icon purple">
                            <i class="bi bi-people"></i>
                        </div>
                        <h3>Atención Personalizada</h3>
                        <p>Nuestro equipo de expertos está siempre disponible para asesorarte y resolver tus dudas.</p>
                    </div>
                </div>

                <!-- Garantía -->
                <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="600">
                    <div class="value-card">
                        <div class="value-icon gold">
                            <i class="bi bi-patch-check"></i>
                        </div>
                        <h3>Garantía</h3>
                        <p>Todos nuestros productos cuentan con garantía oficial y servicio técnico especializado.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ============================================
         MISSION & VISION
         ============================================ -->
    <section class="mission-vision-section py-5">
        <div class="container">
            <div class="row g-5">
                <!-- Misión -->
                <div class="col-lg-6" data-aos="fade-up">
                    <div class="mission-card">
                        <div class="mission-icon">
                            <i class="bi bi-bullseye"></i>
                        </div>
                        <h2>Nuestra Misión</h2>
                        <p>
                            Proveer productos tecnológicos de última generación a precios accesibles, con un servicio de excelencia que garantice la satisfacción total de nuestros clientes. Buscamos ser el aliado tecnológico de confianza para cada hogar y empresa en Argentina.
                        </p>
                    </div>
                </div>

                <!-- Visión -->
                <div class="col-lg-6" data-aos="fade-up" data-aos-delay="200">
                    <div class="vision-card">
                        <div class="vision-icon">
                            <i class="bi bi-eye"></i>
                        </div>
                        <h2>Nuestra Visión</h2>
                        <p>
                            Ser la tienda de tecnología líder en Argentina, reconocida por la calidad de nuestros productos, la innovación constante y el compromiso con nuestros clientes. Aspiramos a expandir nuestra presencia y convertirnos en el referente tecnológico de Latinoamérica.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ============================================
         BRANDS SECTION
         ============================================ -->
    <section class="brands-section py-5 bg-light">
        <div class="container">
            <div class="row mb-5">
                <div class="col-12 text-center" data-aos="fade-up">
                    <h2 class="section-title">Marcas con las que Trabajamos</h2>
                    <p class="section-subtitle">Somos distribuidores oficiales de las marcas líderes del mercado</p>
                </div>
            </div>

            <div class="brands-showcase" data-aos="fade-up" data-aos-delay="200">
                <div class="brand-item">ASUS</div>
                <div class="brand-item">HP</div>
                <div class="brand-item">Lenovo</div>
                <div class="brand-item">Dell</div>
                <div class="brand-item">MSI</div>
                <div class="brand-item">Acer</div>
                <div class="brand-item">Samsung</div>
                <div class="brand-item">LG</div>
                <div class="brand-item">Intel</div>
                <div class="brand-item">AMD</div>
                <div class="brand-item">NVIDIA</div>
                <div class="brand-item">Logitech</div>
            </div>
        </div>
    </section>

    <!-- ============================================
         CTA SECTION
         ============================================ -->
    <section class="company-cta-section py-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8 text-center" data-aos="fade-up">
                    <div class="cta-content">
                        <h2 class="mb-4">¿Listo para descubrir la mejor tecnología?</h2>
                        <p class="lead mb-4">Explorá nuestro catálogo y encontrá el producto perfecto para vos</p>
                        <div class="cta-buttons">
                            <a href="<?php echo wc_get_page_permalink('shop'); ?>" class="btn btn-lg btn-primary me-3">
                                <i class="bi bi-shop me-2"></i>Ver Catálogo
                            </a>
                            <a href="<?php echo get_permalink(get_page_by_path('contacto')); ?>" class="btn btn-lg btn-outline-primary">
                                <i class="bi bi-chat-dots me-2"></i>Contactanos
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

<?php
get_footer();
