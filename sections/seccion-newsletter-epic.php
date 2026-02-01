<!-- ============================================
     NEWSLETTER - ÉPICA CON ANIMACIONES
     ============================================ -->
<section class="newsletter-section">
    <div class="container">
        <div class="newsletter-container" data-aos="fade-up">
            
            <!-- Icono animado -->
            <div class="newsletter-icon">
                <i class="bi bi-envelope-heart"></i>
            </div>
            
            <!-- Título -->
            <h2>Suscribite al Newsletter</h2>
            <p>Recibí ofertas exclusivas, lanzamientos y las mejores novedades tech.</p>
            
            <!-- Formulario -->
            <form class="newsletter-form" method="post" action="#" data-aos="fade-up" data-aos-delay="200">
                <input 
                    type="email" 
                    class="newsletter-input" 
                    placeholder="tu@email.com" 
                    required
                    name="newsletter_email"
                    id="newsletter_email"
                >
                <button type="submit" class="newsletter-button">
                    <span>Suscribirme</span>
                    <i class="bi bi-arrow-right"></i>
                </button>
            </form>
            
            <!-- Trust badges -->
            <div class="newsletter-trust" data-aos="fade-up" data-aos-delay="400">
                <div class="trust-item">
                    <i class="bi bi-check-circle-fill"></i>
                    <span>Spam? Jamás.</span>
                </div>
                <div class="trust-item">
                    <i class="bi bi-check-circle-fill"></i>
                    <span>Podés desuscribirte cuando quieras</span>
                </div>
                <div class="trust-item">
                    <i class="bi bi-check-circle-fill"></i>
                    <span>100% Seguro</span>
                </div>
            </div>
            
        </div>
    </div>
</section>

<!-- ============================================
     JAVASCRIPT - NEWSLETTER AJAX (Opcional)
     ============================================ -->
<script>
jQuery(document).ready(function($) {
    
    $('.newsletter-form').on('submit', function(e) {
        e.preventDefault();
        
        var $form = $(this);
        var $button = $form.find('.newsletter-button');
        var $input = $form.find('.newsletter-input');
        var email = $input.val();
        
        // Validación básica
        if (!email || !email.includes('@')) {
            alert('Por favor, ingresá un email válido');
            return;
        }
        
        // Deshabilitar botón
        $button.prop('disabled', true).html('<span>Procesando...</span>');
        
        // AJAX (opcional - requiere backend)
        $.ajax({
            url: '<?php echo admin_url("admin-ajax.php"); ?>',
            type: 'POST',
            data: {
                action: 'subscribe_newsletter',
                email: email
            },
            success: function(response) {
                // Éxito
                $button.html('<i class="bi bi-check-circle-fill"></i> <span>¡Suscrito!</span>');
                $button.css('background', 'linear-gradient(135deg, #10B981 0%, #059669 100%)');
                $input.val('');
                
                // Mensaje de éxito
                alert('¡Gracias por suscribirte! Revisá tu email.');
                
                // Restaurar después de 3 segundos
                setTimeout(function() {
                    $button.prop('disabled', false);
                    $button.html('<span>Suscribirme</span> <i class="bi bi-arrow-right"></i>');
                    $button.css('background', '');
                }, 3000);
            },
            error: function() {
                // Error
                $button.html('<i class="bi bi-x-circle-fill"></i> <span>Error</span>');
                $button.css('background', 'linear-gradient(135deg, #EF4444 0%, #DC2626 100%)');
                
                alert('Hubo un error. Por favor, intentá de nuevo.');
                
                // Restaurar después de 3 segundos
                setTimeout(function() {
                    $button.prop('disabled', false);
                    $button.html('<span>Suscribirme</span> <i class="bi bi-arrow-right"></i>');
                    $button.css('background', '');
                }, 3000);
            }
        });
    });
});
</script>
