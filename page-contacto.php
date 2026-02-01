<?php
/**
 *  Template Name: Contacto
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
                    <h1 class="hero-title" data-aos="fade-up">Contacto</h1>
                    <p class="hero-subtitle" data-aos="fade-up" data-aos-delay="100">
                        Estamos para ayudarte
                    </p>
                    <nav aria-label="breadcrumb" data-aos="fade-up" data-aos-delay="200">
                        <ol class="breadcrumb justify-content-center">
                            <li class="breadcrumb-item"><a href="/">Inicio</a></li>
                            <li class="breadcrumb-item active">Contacto</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </section>

    <!-- ============================================
         CONTACT INFO CARDS
         ============================================ -->
    <section class="contact-info-section py-5">
        <div class="container">
            <div class="row g-4 mb-5">
                <!-- Email Card -->
                <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
                    <div class="contact-info-card">
                        <div class="info-icon purple">
                            <i class="bi bi-envelope"></i>
                        </div>
                        <h3>Email</h3>
                        <a href="mailto:consultas@feyma.ar" class="info-link">
                            consultas@feyma.ar
                        </a>
                    </div>
                </div>

                <!-- Location Card -->
                <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="200">
                    <div class="contact-info-card">
                        <div class="info-icon gold">
                            <i class="bi bi-geo-alt"></i>
                        </div>
                        <h3>Oficina Comercial</h3>
                        <p class="info-text">
                            Av. Del Libertador 6299, C1428ARF<br>
                            Cdad. Autónoma de Buenos Aires
                        </p>
                    </div>
                </div>

                <!-- WhatsApp Card -->
                <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="300">
                    <div class="contact-info-card">
                        <div class="info-icon purple">
                            <i class="bi bi-whatsapp"></i>
                        </div>
                        <h3>Whatsapp</h3>
                        <a href="https://wa.me/5491144116575" class="info-link" target="_blank">
                            (+54) 11 4411-6575
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ============================================
         CONTACT FORM SECTION
         ============================================ -->
    <section class="contact-form-section">
        <div class="form-circuit-bg"></div>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="contact-form-wrapper" data-aos="fade-up">
                        <div class="text-center mb-5">
                            <h2 class="section-title">Envíenos un mensaje</h2>
                            <p class="section-subtitle">Completá el formulario y te responderemos a la brevedad</p>
                        </div>

                        <form id="contactForm" class="contact-form">
                            <div class="row g-3">
                                <!-- Name -->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="nombre" class="form-label">Nombre*</label>
                                        <input 
                                            type="text" 
                                            class="form-control" 
                                            id="nombre" 
                                            name="nombre" 
                                            required
                                            placeholder="Tu nombre">
                                    </div>
                                </div>

                                <!-- Last Name -->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="apellido" class="form-label">Apellido</label>
                                        <input 
                                            type="text" 
                                            class="form-control" 
                                            id="apellido" 
                                            name="apellido"
                                            placeholder="Tu apellido">
                                    </div>
                                </div>

                                <!-- Email -->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="email" class="form-label">Email*</label>
                                        <input 
                                            type="email" 
                                            class="form-control" 
                                            id="email" 
                                            name="email" 
                                            required
                                            placeholder="tu@email.com">
                                    </div>
                                </div>

                                <!-- Phone -->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="telefono" class="form-label">Teléfono</label>
                                        <input 
                                            type="tel" 
                                            class="form-control" 
                                            id="telefono" 
                                            name="telefono"
                                            placeholder="Tu teléfono">
                                    </div>
                                </div>

                                <!-- Subject -->
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="tema" class="form-label">Tema*</label>
                                        <input 
                                            type="text" 
                                            class="form-control" 
                                            id="tema" 
                                            name="tema" 
                                            required
                                            placeholder="Asunto de tu consulta">
                                    </div>
                                </div>

                                <!-- Message -->
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="mensaje" class="form-label">Mensaje*</label>
                                        <textarea 
                                            class="form-control" 
                                            id="mensaje" 
                                            name="mensaje" 
                                            rows="6" 
                                            required
                                            placeholder="Dejanos tu consulta"></textarea>
                                    </div>
                                </div>

                                <!-- Submit Button -->
                                <div class="col-12 text-center">
                                    <button type="submit" class="btn btn-gold btn-lg px-5">
                                        <i class="bi bi-send"></i> Enviar
                                    </button>
                                    <p class="form-note mt-3">
                                        Su dirección de correo electrónico no será publicada. Los campos obligatorios están marcados *
                                    </p>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ============================================
         MAP SECTION
         ============================================ -->
    <section class="map-section">
        <div class="container-fluid p-0">
            <div class="map-wrapper" data-aos="fade-up">
                <iframe 
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3285.7845467857867!2d-58.44969212347236!3d-34.55343195521234!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x95bcb5d7de0a84d3%3A0x7a6d6f7d6e7b7c7d!2sAv.%20del%20Libertador%206299%2C%20C1428ARF%20CABA!5e0!3m2!1ses-419!2sar!4v1704312000000!5m2!1ses-419!2sar" 
                    width="100%" 
                    height="450" 
                    style="border:0;" 
                    allowfullscreen="" 
                    loading="lazy" 
                    referrerpolicy="no-referrer-when-downgrade">
                </iframe>
            </div>
        </div>
    </section>

<?php
get_footer();
