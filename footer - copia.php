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

<!-- ============================================
      FOOTER
============================================ -->
<footer class="main-footer">
    <div class="footer-circuit-bg"></div>

    <div class="container">
        <div class="row g-4">
  
            <!-- Company Info -->
            <div class="col-lg-4" data-aos="fade-up" data-aos-duration="800" data-aos-delay="100">
                <div class="footer-contact">
                  <?php if (is_active_sidebar('footer-1')) : ?>
                    <?php dynamic_sidebar('footer-1'); ?>
                  <?php endif; ?>
                </div>
            </div>

            <!-- Products Links -->				
            <div class="<?= apply_filters('bootscore/class/footer/col', 'col-6 col-md-6 col-lg-2', 'footer-2'); ?>" data-aos="fade-up" data-aos-duration="800" data-aos-delay="200">
              <?php if (is_active_sidebar('footer-2')) : ?>
                <?php dynamic_sidebar('footer-2'); ?>
              <?php endif; ?>
            </div>

                    <!-- Help Links -->
            <div class="<?= apply_filters('bootscore/class/footer/col', 'col-6 col-md-6 col-lg-2', 'footer-3'); ?>" data-aos="fade-up" data-aos-duration="800" data-aos-delay="300">
              <?php if (is_active_sidebar('footer-3')) : ?>
                <?php dynamic_sidebar('footer-3'); ?>
              <?php endif; ?>
            </div>

                    <!-- Legal -->
            <div class="<?= apply_filters('bootscore/class/footer/col', 'col-lg-4', 'footer-4'); ?>" data-aos="fade-up" data-aos-duration="800" data-aos-delay="400">
              <?php if (is_active_sidebar('footer-4')) : ?>
                <?php dynamic_sidebar('footer-4'); ?>
              <?php endif; ?>
            </div>
    
        </div><!-- /.row -->

        <div class="footer-bottom">
            <p class="m-0">Copyright <span class="cr-symbol">&copy;</span>&nbsp;<?= date('Y'); ?> Para <?php bloginfo('name'); ?> por Haciendo Nacimos! Agencia / Dise&ntilde;os &amp; Desarrollos, Buenos Aires, Argentina</p>
        </div>
    </div>
</footer>

<!-- To top button -->
<a href="#" class="<?= esc_attr(apply_filters('bootscore/class/footer/to_top_button', 'btn btn-primary shadow')); ?> position-fixed zi-1000 top-button" role="button" aria-label="<?php esc_attr_e('Return to top', 'bootscore' ); ?>"><?= wp_kses_post(apply_filters('bootscore/icon/chevron-up', '<i class="fa-solid fa-chevron-up" aria-hidden="true"></i>')); ?></a>

</div><!-- #page -->

<?php wp_footer(); ?>

<script>
  jQuery(document).ready(function($) {
    // Variables globales
    let currentStep = 1;
    
    // Inicializar pasos del checkout
    function initCheckoutSteps() {
        // Mostrar solo el paso activo
        $('.checkout-step').each(function() {
            if ($(this).data('step') === currentStep) {
                $(this).addClass('active').show();
            } else {
                $(this).removeClass('active').hide();
            }
        });
        
        updateNavigation();
    }
    
    function updateNavigation() {
        const totalSteps = $('.checkout-step').length;
        
        // Botón anterior
        $('.prev-step').toggle(currentStep > 1);
        
        // Botón siguiente/realizar pedido
        if (currentStep === totalSteps) {
            $('.next-step').hide();
            $('.place-order').show();
        } else {
            $('.next-step').show().text(currentStep === totalSteps - 1 ? 'Revisar pedido →' : 'Siguiente →');
            $('.place-order').hide();
        }
    }
    
    // Event listeners
    $(document).on('click', '.next-step', function(e) {
        e.preventDefault();
        if (validateStep(currentStep)) {
            currentStep++;
            initCheckoutSteps();
        }
    });
    
    $(document).on('click', '.prev-step', function(e) {
        e.preventDefault();
        currentStep--;
        initCheckoutSteps();
    });
    
    function validateStep(step) {
        const $step = $(`.checkout-step[data-step="${step}"]`);
        let isValid = true;
        
        // Validación simple de campos requeridos
        $step.find('[required]').each(function() {
            if (!$(this).val()) {
                isValid = false;
                $(this).css('border-color', 'red');
            }
        });
        
        return isValid;
    }
    
    // Inicializar
    $(window).on('load', function() {
        setTimeout(initCheckoutSteps, 1000);
    });
});
</script>

</body>
</html>
