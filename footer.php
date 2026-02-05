<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Bootscore
 * @version 6.3.0
 */

// Exit if accessed directly
defined('ABSPATH') || exit;
?>

<?php do_action( 'bootscore_before_footer' ); ?>

<footer class="site-footer">
    
    <!-- Circuit Pattern Background -->
    <div class="footer-circuit-pattern"></div>
    <div class="footer-particles"></div>

    <!-- NEWSLETTER INTEGRADO EN FOOTER -->
    <div class="footer-newsletter-section">
        <div class="container">
            <div class="newsletter-footer-wrapper" data-aos="fade-up">

                <div class="newsletter-header">
                    <div class="newsletter-icon-footer">
                        <i class="bi bi-envelope-heart-fill"></i>
                    </div>
                    <div class="newsletter-text">
                        <h2>Suscribite y recibí <span class="text-gold">ofertas exclusivas</span></h2>
                        <p>Las mejores novedades tech, lanzamientos y descuentos en tu email.</p>
                    </div>
                </div>

                <!-- Formulario Newsletter -->
                <form class="newsletter-form-footer" method="post" action="#" data-aos="fade-up" data-aos-delay="200">
                    <div class="input-group-footer">
                        <input
                            type="email"
                            class="newsletter-input-footer"
                            placeholder="tu@email.com"
                            required
                            name="newsletter_email_footer"
                            id="newsletter_email_footer"
                        >
                        <button type="submit" class="newsletter-button-footer">
                            <span>Suscribirme</span>
                            <i class="bi bi-arrow-right"></i>
                        </button>
                    </div>

                    <!-- Trust badges inline -->
                    <div class="newsletter-trust-footer">
                        <i class="bi bi-shield-check"></i> Sin spam
                        <i class="bi bi-unlock"></i> Cancelá cuando quieras
                        <i class="bi bi-patch-check-fill"></i> 100% Seguro
                    </div>
                </form>

            </div>
        </div>
    </div>

        <div class="footer-content">
        <div class="container">
            <div class="row g-4">

                <!-- Columna 1: Logo y Redes Sociales -->
                <div class="col-6 col-md-6 col-lg-3" data-aos="fade-up">
                    <div class="footer-logo-section">
                        <<a href="<?php  echo esc_url(home_url('/')); ?>" class="footer-logo">
                            <img width="113" height="143" src="https://mediumaquamarine-oyster-559178.hostingersite.com/wp-content/uploads/2026/01/logo-feyma-footer-1.svg" class="image wp-image-10452  attachment-medium size-medium" alt="" style="max-width: 100%; height: auto;" decoding="async" loading="lazy">
                        </a> 
                        

                        <!-- Redes Sociales -->
                        <div class="footer-social">
                            <a href="https://www.instagram.com/feyma.ar/" target="_blank" rel="noopener" class="social-icon" aria-label="Instagram">
                                <i class="bi bi-instagram"></i>
                            </a>
                            <a href="https://www.facebook.com/feyma.ar" target="_blank" rel="noopener" class="social-icon" aria-label="Facebook">
                                <i class="bi bi-facebook"></i>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Columna 2: Contacto -->
                <div class="col-6 col-md-6 col-lg-3" data-aos="fade-up" data-aos-delay="100">
                    <div class="footer-column">
                        <h4 class="footer-title">Contacto</h4>
                        <div class="footer-contact-info">
                            <div class="contact-item">
                                <span class="contact-label"><i class="bi bi-geo-alt"></i> Dirección:</span>
                                <span class="contact-value">Av. Del Libertador 6299, C1428ARF<br>Cdad. Autónoma de Buenos Aires</span>
                            </div>
                            <div class="contact-item">
                                <span class="contact-label"><i class="bi bi-telephone"></i> Teléfono:</span>
                                <a href="tel:+5491144116575" class="contact-value">+54 9 11 44116575</a>
                            </div>
                            <div class="contact-item">
                                <span class="contact-label"><i class="bi bi-envelope"></i> Email:</span>
                                <a href="mailto:consultas@feyma.ar" class="contact-value">consultas@feyma.ar</a><br>
                                <a href="mailto:pedidosweb@feyma.ar" class="contact-value">pedidosweb@feyma.ar</a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Columna 3: Productos -->
                <div class="col-6 col-md-6 col-lg-3" data-aos="fade-up" data-aos-delay="200">
                    <div class="footer-column">
                        <h4 class="footer-title">Productos</h4>
                        <ul class="footer-links">
                            <li><a href="<?php echo esc_url(home_url('/categoria-producto/notebooks/')); ?>">Notebooks</a></li>
                            <li><a href="<?php echo esc_url(home_url('/categoria-producto/apple/')); ?>">Apple</a></li>
                            <li><a href="<?php echo esc_url(home_url('/categoria-producto/diseno/')); ?>">Diseño</a></li>
                            <li><a href="<?php echo esc_url(home_url('/categoria-producto/gaming/')); ?>">Gaming</a></li>
                            <li><a href="<?php echo esc_url(home_url('/categoria-producto/oficina/')); ?>">Oficina</a></li>
                        </ul>
                    </div>
                </div>

                <!-- Columna 4: Links -->
                <div class="col-6 col-md-6 col-lg-3" data-aos="fade-up" data-aos-delay="300">
                    <div class="footer-column">
                        <h4 class="footer-title">Links</h4>
                        <ul class="footer-links">
                            <li><a href="<?php echo esc_url(home_url('/empresa/')); ?>">Empresa</a></li>
                            <li><a href="<?php echo esc_url(home_url('/tienda/')); ?>">Tienda</a></li>
                            <li><a href="<?php echo esc_url(wc_get_cart_url()); ?>">Carrito</a></li>
                            <li><a href="<?php echo esc_url(home_url('/contacto/')); ?>">Contacto</a></li>
                            <li><a href="<?php echo esc_url(home_url('/faqs/')); ?>">FAQS</a></li>
                            <li><a href="<?php echo esc_url(home_url('/politica-de-cambios-y-devoluciones/')); ?>">Política de cambios y devoluciones</a></li>
                        </ul>
                    </div>
                </div>

            </div>
        </div>
    </div>

    
    <!-- Footer Bottom -->
    <div class="footer-bottom">
        <div class="container">
            <p>Copyright © <?php echo date('Y'); ?> Haciendo Nacimos! Agencia para <?php bloginfo('name'); ?> | Buenos Aires Argentina
            </p>
        </div>
    </div>
    
</footer>

<!-- To top button -->
<a href="#" class="<?= esc_attr(apply_filters('bootscore/class/footer/to_top_button', 'btn btn-primary shadow')); ?> position-fixed zi-1000 top-button" role="button" aria-label="<?php esc_attr_e('Return to top', 'bootscore' ); ?>"><?= wp_kses_post(apply_filters('bootscore/icon/chevron-up', '<i class="fa-solid fa-chevron-up" aria-hidden="true"></i>')); ?></a>

</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
