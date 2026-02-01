/**
 * =============================================
 * CONTACT FORM & NEWSLETTER - Frontend Handler
 * =============================================
 */

(function($) {
    'use strict';

    // ==================================================
    // CONTACT FORM
    // ==================================================
    $('#contactForm').on('submit', function(e) {
        e.preventDefault();

        const $form = $(this);
        const $submitBtn = $form.find('button[type="submit"]');
        const $btnText = $submitBtn.find('span').length ? $submitBtn.find('span') : $submitBtn;
        const originalText = $btnText.html();

        // Deshabilitar botón
        $submitBtn.prop('disabled', true);
        $btnText.html('<span class="spinner-border spinner-border-sm me-2"></span>Enviando...');

        // Limpiar mensajes anteriores
        $('.alert').remove();

        // Preparar datos
        const formData = {
            action: 'feyma_contact_form',
            nonce: feymaContact.contact_nonce,
            nombre: $('#nombre').val(),
            apellido: $('#apellido').val(),
            email: $('#email').val(),
            telefono: $('#telefono').val(),
            tema: $('#tema').val(),
            mensaje: $('#mensaje').val()
        };

        // AJAX request
        $.ajax({
            url: feymaContact.ajaxurl,
            type: 'POST',
            data: formData,
            success: function(response) {
                if (response.success) {
                    // Mostrar mensaje de éxito
                    $form.before(`
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <i class="bi bi-check-circle-fill me-2"></i>${response.data.message}
                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        </div>
                    `);

                    // Limpiar formulario
                    $form[0].reset();

                    // Scroll to message
                    $('html, body').animate({
                        scrollTop: $form.offset().top - 100
                    }, 500);
                } else {
                    // Mostrar mensaje de error
                    $form.before(`
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <i class="bi bi-exclamation-triangle-fill me-2"></i>${response.data.message}
                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        </div>
                    `);
                }
            },
            error: function() {
                $form.before(`
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <i class="bi bi-exclamation-triangle-fill me-2"></i>Error de conexión. Por favor intenta nuevamente.
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                `);
            },
            complete: function() {
                // Restaurar botón
                $submitBtn.prop('disabled', false);
                $btnText.html(originalText);
            }
        });
    });

    // ==================================================
    // NEWSLETTER FORM
    // ==================================================
    $('.newsletter-form-footer').on('submit', function(e) {
        e.preventDefault();

        const $form = $(this);
        const $submitBtn = $form.find('button[type="submit"]');
        const $btnText = $submitBtn.find('span').length ? $submitBtn.find('span') : $submitBtn;
        const originalText = $btnText.html();
        const $input = $form.find('input[type="email"]');

        // Deshabilitar botón
        $submitBtn.prop('disabled', true);
        $btnText.html('<span class="spinner-border spinner-border-sm me-2"></span>Enviando...');

        // Limpiar mensajes anteriores
        $form.find('.alert').remove();

        // Preparar datos
        const formData = {
            action: 'feyma_newsletter',
            nonce: feymaContact.newsletter_nonce,
            email: $input.val()
        };

        // AJAX request
        $.ajax({
            url: feymaContact.ajaxurl,
            type: 'POST',
            data: formData,
            success: function(response) {
                if (response.success) {
                    // Mostrar mensaje de éxito
                    $form.after(`
                        <div class="alert alert-success mt-3 alert-dismissible fade show" role="alert">
                            <i class="bi bi-check-circle-fill me-2"></i>${response.data.message}
                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        </div>
                    `);

                    // Limpiar input
                    $input.val('');
                } else {
                    // Mostrar mensaje de error
                    $form.after(`
                        <div class="alert alert-warning mt-3 alert-dismissible fade show" role="alert">
                            <i class="bi bi-info-circle-fill me-2"></i>${response.data.message}
                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        </div>
                    `);
                }
            },
            error: function() {
                $form.after(`
                    <div class="alert alert-danger mt-3 alert-dismissible fade show" role="alert">
                        <i class="bi bi-exclamation-triangle-fill me-2"></i>Error de conexión. Por favor intenta nuevamente.
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                `);
            },
            complete: function() {
                // Restaurar botón
                $submitBtn.prop('disabled', false);
                $btnText.html(originalText);
            }
        });
    });

    console.log('✅ Contact & Newsletter handlers initialized');

})(jQuery);
