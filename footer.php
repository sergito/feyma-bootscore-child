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
                
                <!-- Columna 1: Logo y Contacto -->
                <div class="col-6 col-md-6 col-lg-3" data-aos="fade-up">
                     <?php if (is_active_sidebar('footer-1')) : ?>
                        <?php dynamic_sidebar('footer-1'); ?>
                     <?php endif; ?>
                </div>
                
                <!-- Columna 2: Productos -->
                <div class="col-6 col-md-6 col-lg-3" data-aos="fade-up" data-aos-delay="100">
                    <?php if (is_active_sidebar('footer-2')) : ?>
                        <?php dynamic_sidebar('footer-2'); ?>
                    <?php endif; ?>
                </div>
                
                <!-- Columna 3: Links -->
                <div class="col-6 col-md-6 col-lg-3" data-aos="fade-up" data-aos-delay="200">
                    <?php if (is_active_sidebar('footer-3')) : ?>
                        <?php dynamic_sidebar('footer-3'); ?>
                    <?php endif; ?>
                </div>
                
                <!-- Columna 4: Información Legal -->
                <div class="col-6 col-md-6 col-lg-3" data-aos="fade-up" data-aos-delay="300">
                   <?php if (is_active_sidebar('footer-4')) : ?>
                        <?php dynamic_sidebar('footer-4'); ?>
                    <?php endif; ?>
                    
                    <!-- Métodos de pago
                    <div style="margin-top: 30px;">
                        <h4>Medios de Pago</h4>
                        <div style="display: flex; gap: 10px; flex-wrap: wrap; margin-top: 15px;">
                            <i class="bi bi-credit-card-2-front" style="font-size: 32px; color: #F7B32B;"></i>
                            <i class="bi bi-credit-card" style="font-size: 32px; color: #F7B32B;"></i>
                            <i class="bi bi-cash-coin" style="font-size: 32px; color: #F7B32B;"></i>
                        </div>
                    </div>
                    -->
                </div>
                
            </div>
        </div>
    </div>
    
    <!-- Footer Bottom -->
    <div class="footer-bottom">
        <div class="container">
            <p>
                <span class="cr-symbol">&copy;</span> <?php echo date('Y'); ?> <strong>FEYMA tech</strong>. Todos los derechos reservados. 
                | Diseñado con <i class="bi bi-heart-fill" style="color: #EF4444;"></i> en Argentina
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
