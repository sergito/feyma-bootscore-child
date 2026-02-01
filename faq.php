<?php
/**
 *  Template Name: faq
 **/
 
// Exit if accessed directly
defined('ABSPATH') || exit;

get_header();
?>

      <!-- ============================================
         HERO SECTION
         ============================================ -->
    <section class="page-hero">
        <div class="hero-circuit-bg"></div>
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-12 text-center">
                    <h1 class="hero-title" data-aos="fade-up">Preguntas Frecuentes</h1>
                    <p class="hero-subtitle" data-aos="fade-up" data-aos-delay="100">
                        Encontrá las respuestas que necesitás
                    </p>
                    <nav aria-label="breadcrumb" data-aos="fade-up" data-aos-delay="200">
                        <ol class="breadcrumb justify-content-center">
                            <li class="breadcrumb-item"><a href="/">Inicio</a></li>
                            <li class="breadcrumb-item active">FAQs</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </section>

    <!-- ============================================
         FAQ SECTION
         ============================================ -->
    <section class="faq-section py-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-10">
                    
                    <!-- Intro -->
                    <div class="faq-intro text-center mb-5" data-aos="fade-up">
                        <h2 class="section-title mb-3">¿Tenés dudas?</h2>
                        <p class="section-subtitle">Acá encontrarás las respuestas a las preguntas más comunes sobre nuestros productos y servicios</p>
                    </div>

                    <!-- FAQ Accordion -->
                    <div class="accordion faq-accordion" id="faqAccordion">
                        
                        <!-- FAQ 1 -->
                        <div class="accordion-item" data-aos="fade-up" data-aos-delay="100">
                            <h2 class="accordion-header">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#faq1">
                                    <i class="bi bi-truck me-3"></i>
                                    ¿Cómo son los envíos en Feyma tech?
                                </button>
                            </h2>
                            <div id="faq1" class="accordion-collapse collapse show" data-bs-parent="#faqAccordion">
                                <div class="accordion-body">
                                    <p>
                                        <strong>Feyma tech</strong> realiza envíos a todo el país a través de empresas de logística 
                                        reconocidas. Recibirás un correo electrónico con el código de seguimiento para que puedas 
                                        verificar el estado de tu compra en todo momento, y los plazos habituales varían entre 3 y 7 
                                        días hábiles.
                                    </p>
                                </div>
                            </div>
                        </div>

                        <!-- FAQ 2 -->
                        <div class="accordion-item" data-aos="fade-up" data-aos-delay="150">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq2">
                                    <i class="bi bi-patch-check me-3"></i>
                                    ¿Los productos de Feyma tech son originales?
                                </button>
                            </h2>
                            <div id="faq2" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                                <div class="accordion-body">
                                    <p>
                                        Sí. <strong>Feyma tech</strong> comercializa únicamente productos nuevos, originales y sellados de 
                                        fábrica; la descripción de cada producto incluye la información técnica proporcionada por el 
                                        fabricante.
                                    </p>
                                </div>
                            </div>
                        </div>

                        <!-- FAQ 3 -->
                        <div class="accordion-item" data-aos="fade-up" data-aos-delay="200">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq3">
                                    <i class="bi bi-receipt me-3"></i>
                                    ¿Cómo funciona la facturación en Feyma tech?
                                </button>
                            </h2>
                            <div id="faq3" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                                <div class="accordion-body">
                                    <p>
                                        <strong>Feyma tech</strong> emite facturas A o B según corresponda. Para solicitar factura tipo A 
                                        debes ingresar tu CUIT correctamente al realizar la compra; de lo contrario se emitirá factura B 
                                        por defecto.
                                    </p>
                                </div>
                            </div>
                        </div>

                        <!-- FAQ 4 -->
                        <div class="accordion-item" data-aos="fade-up" data-aos-delay="250">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq4">
                                    <i class="bi bi-person-check me-3"></i>
                                    ¿Es necesario registrarse para comprar en Feyma tech?
                                </button>
                            </h2>
                            <div id="faq4" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                                <div class="accordion-body">
                                    <p>
                                        Sí. Por motivos de seguridad y para agilizar futuras compras, <strong>Feyma tech</strong> solicita 
                                        que crees una cuenta en el sitio web. Tus datos quedan protegidos gracias a nuestras prácticas de 
                                        cifrado y seguridad.
                                    </p>
                                </div>
                            </div>
                        </div>

                        <!-- FAQ 5 -->
                        <div class="accordion-item" data-aos="fade-up" data-aos-delay="300">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq5">
                                    <i class="bi bi-shield-check me-3"></i>
                                    ¿Qué garantía ofrecen los productos de Feyma tech?
                                </button>
                            </h2>
                            <div id="faq5" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                                <div class="accordion-body">
                                    <p>
                                        Todos los productos comercializados por <strong>Feyma tech</strong> cuentan con garantía de fábrica 
                                        y soporte post‑venta. Por regla general, las notebooks y los productos Apple tienen garantías de 
                                        12 meses. Además, <strong>Feyma tech</strong> ofrece su propia garantía como vendedor 
                                        (ver "<a href="/politica-cambios-devoluciones#garantia">Garantía del producto</a>").
                                    </p>
                                </div>
                            </div>
                        </div>

                    </div>

                    <!-- Contact CTA -->
                    <div class="faq-cta text-center mt-5" data-aos="fade-up">
                        <div class="cta-card">
                            <h3>¿No encontraste tu respuesta?</h3>
                            <p>Nuestro equipo está listo para ayudarte</p>
                            <div class="cta-buttons mt-4">
                                <a href="/contacto" class="btn btn-gold btn-lg me-3">
                                    <i class="bi bi-envelope"></i> Contactanos
                                </a>
                                <a href="https://wa.me/5491144116575" class="btn btn-outline-success btn-lg" target="_blank">
                                    <i class="bi bi-whatsapp"></i> WhatsApp
                                </a>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>

<?php
get_footer();