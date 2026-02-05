/**
 * FEYMA EPIC CHECKOUT - Multi-Step Checkout System
 * Navegación entre pasos, validaciones y actualización en tiempo real
 */

(function($) {
    'use strict';

    // ============================================
    // VARIABLES GLOBALES
    // ============================================
    let currentStep = 1;
    const totalSteps = 4;
    let emailLocked = false;

    // ============================================
    // INICIALIZACIÓN
    // ============================================
    $(document).ready(function() {
        try {
            console.log('%c🔥 FEYMA CHECKOUT - INICIANDO', 'background: #3D3180; color: #F7B32B; font-size: 16px; padding: 8px;');

            // Inicializar estados de steps (activo/inactivo)
            initializeStepStates();

            initCheckoutSteps();
            initEmailField();
            initOrderSummarySticky();
            initShippingMethodsRefresh();
            hideEmailFieldFromStep2();

            console.log('%c✅ CHECKOUT LISTO', 'background: #10B981; color: white; font-size: 14px; padding: 6px;');
        } catch (error) {
            console.error('❌ ERROR EN INICIALIZACIÓN DEL CHECKOUT:', error);
            // Fallback: mostrar todos los campos del checkout si falla
            $('.checkout-step').removeClass('checkout-step-hidden').show();
        }
    });

    // ============================================
    // INICIALIZAR ESTADOS DE STEPS
    // ============================================
    function initializeStepStates() {
        console.log('%c🎨 INICIALIZANDO ESTADOS DE STEPS', 'background: #10B981; color: white; font-size: 14px; padding: 6px;');

        $('.checkout-step').each(function() {
            const $step = $(this);
            const stepNum = parseInt($step.data('step'));

            // Aplicar clase según si es el step actual o no
            if (stepNum === currentStep) {
                $step.addClass('step-active').removeClass('step-inactive');
                console.log(`  ✅ Step ${stepNum} - ACTIVO`);
            } else {
                $step.addClass('step-inactive').removeClass('step-active');
                console.log(`  ⏸️ Step ${stepNum} - INACTIVO`);
            }

            // Asegurar visibilidad
            $step.css({
                'display': 'block',
                'visibility': 'visible'
            });
        });
    }

    // ============================================
    // STEP NAVIGATION
    // ============================================
    function initCheckoutSteps() {
        // Next Step Buttons
        $(document).on('click', '.btn-next-step', function(e) {
            e.preventDefault();
            const nextStep = parseInt($(this).data('next'));

            if (validateCurrentStep(currentStep)) {
                goToStep(nextStep);
            }
        });

        // Previous Step Buttons
        $(document).on('click', '.btn-prev-step', function(e) {
            e.preventDefault();
            const prevStep = parseInt($(this).data('prev'));
            goToStep(prevStep);
        });

        // Change Email Button
        $(document).on('click', '.btn-change-email', function(e) {
            e.preventDefault();
            unlockEmail();
            goToStep(1);
        });

        // Enter key on email field
        $('#billing_email').on('keypress', function(e) {
            if (e.which === 13) {
                e.preventDefault();
                $('.btn-next-step[data-next="2"]').click();
            }
        });
    }

    // ============================================
    // GO TO STEP FUNCTION
    // ============================================
    function goToStep(stepNumber) {
        if (stepNumber < 1 || stepNumber > totalSteps) return;

        console.log('🚀 Navegando de Step', currentStep, '→ Step', stepNumber);

        // Actualizar clases de TODOS los steps
        $('.checkout-step').each(function() {
            const $step = $(this);
            const stepNum = parseInt($step.data('step'));

            if (stepNum === stepNumber) {
                // Step destino: ACTIVO
                $step.removeClass('step-inactive').addClass('step-active');
            } else {
                // Otros steps: INACTIVOS
                $step.removeClass('step-active').addClass('step-inactive');
            }
        });

        // Update current step
        currentStep = stepNumber;

        // Update progress bar
        updateProgressBar(stepNumber);

        // Scroll suave al step activo
        const $targetStep = $('#step-' + stepNumber);
        if ($targetStep.length) {
            $('html, body').animate({
                scrollTop: $targetStep.offset().top - 100
            }, 500, 'swing');
        }

        // Special actions per step
        if (stepNumber === 2) {
            lockEmail();
        }

        if (stepNumber === 3) {
            refreshShippingMethods();
        }

        console.log('✅ Step', stepNumber, 'ahora ACTIVO');
    }

    // ============================================
    // PRESERVE STEP VISIBILITY (AFTER WOOCOMMERCE AJAX)
    // ============================================
    function preserveStepVisibility() {
        console.log('🛡️ Preservando estado del Step', currentStep, 'después de AJAX');

        // Restaurar clases activo/inactivo después de AJAX
        $('.checkout-step').each(function() {
            const $step = $(this);
            const stepNum = parseInt($step.data('step'));

            if (stepNum === currentStep) {
                $step.removeClass('step-inactive').addClass('step-active');
                console.log('  ✅ Step', stepNum, '- ACTIVO restaurado');
            } else {
                $step.removeClass('step-active').addClass('step-inactive');
                console.log('  ⏸️ Step', stepNum, '- INACTIVO restaurado');
            }

            // Asegurar visibilidad
            $step.css('display', 'block');
        });

        // Also update progress bar to match
        updateProgressBar(currentStep);
    }

    // ============================================
    // PROGRESS BAR UPDATE
    // ============================================
    function updateProgressBar(stepNumber) {
        $('.progress-step').each(function() {
            const step = parseInt($(this).data('step'));

            if (step < stepNumber) {
                $(this).addClass('completed').removeClass('active');
            } else if (step === stepNumber) {
                $(this).addClass('active').removeClass('completed');
            } else {
                $(this).removeClass('active completed');
            }
        });

        // Update progress lines
        $('.progress-line').each(function(index) {
            if (index < stepNumber - 1) {
                $(this).addClass('completed');
            } else {
                $(this).removeClass('completed');
            }
        });
    }

    // ============================================
    // EMAIL FIELD HANDLING
    // ============================================
    function initEmailField() {
        // Auto-focus email on load
        setTimeout(function() {
            $('#billing_email').focus();
        }, 500);
    }

    function lockEmail() {
        const $emailField = $('#billing_email');
        const $emailDisplay = $('#email-display');

        if (!$emailField.length) {
            console.warn('⚠️ Campo de email no encontrado');
            return;
        }

        const email = $emailField.val();

        if (email && !emailLocked) {
            // CRÍTICO FIX: Copiar el email al campo oculto de WooCommerce
            const $wooEmailField = $('.billing-fields-wrapper #billing_email_field input[name="billing_email"]');
            if ($wooEmailField.length && $wooEmailField.attr('id') !== 'billing_email') {
                $wooEmailField.val(email);
                console.log('✅ Email copiado al campo WooCommerce oculto:', email);
            }

            // También asegurar que el campo principal tenga el valor
            $emailField.val(email);

            // Show email in step 2
            if ($emailDisplay.length) {
                $emailDisplay.text(email);
            }

            // Disable email field
            $emailField.prop('readonly', true).addClass('locked');

            emailLocked = true;

            console.log('🔒 Email bloqueado:', email);
        }
    }

    function unlockEmail() {
        const $emailField = $('#billing_email');

        if ($emailField.length) {
            $emailField.prop('readonly', false).removeClass('locked');
            emailLocked = false;
            console.log('🔓 Email desbloqueado');
        }
    }

    // Hide email field from billing fields in step 2
    function hideEmailFieldFromStep2() {
        const $billingEmailField = $('.billing-fields-wrapper #billing_email_field');

        if ($billingEmailField.length) {
            // Email field is handled separately in step 1
            // Hide it from the default WooCommerce billing fields
            $billingEmailField.hide();
            console.log('👁️ Campo de email oculto de fields de WooCommerce');
        }

        // CRÍTICO FIX: Sync email before form submission
        $('form.checkout').on('checkout_place_order', function() {
            const email = $('#billing_email').val();
            const $wooEmailField = $('.billing-fields-wrapper input[name="billing_email"]');

            if ($wooEmailField.length) {
                $wooEmailField.val(email);
                console.log('✅ Email sincronizado antes de enviar:', email);
            }

            return true; // Allow form submission
        });
    }

    // ============================================
    // FORM VALIDATIONS
    // ============================================
    function validateCurrentStep(step) {
        let isValid = true;
        let errorMessage = '';

        switch(step) {
            case 1:
                // Validate email
                const email = $('#billing_email').val();
                if (!email || !isValidEmail(email)) {
                    errorMessage = 'Por favor ingresá un email válido';
                    isValid = false;
                    $('#billing_email').addClass('error-field');
                } else {
                    $('#billing_email').removeClass('error-field');
                }
                break;

            case 2:
                // Validate required billing fields
                const requiredFields = [
                    'billing_first_name',
                    'billing_last_name',
                    'billing_dni',  // ← AGREGAR ESTA LÍNEA
                    'billing_address_1',
                    'billing_city',
                    'billing_postcode',
                    'billing_phone'
                ];

                requiredFields.forEach(function(fieldName) {
                    const $field = $('[name="' + fieldName + '"]');
                    if ($field.length && !$field.val()) {
                        $field.addClass('error-field');
                        isValid = false;
                    } else {
                        $field.removeClass('error-field');
                    }
                });

                if (!isValid) {
                    errorMessage = 'Por favor completá todos los campos obligatorios';
                }
                break;

            case 3:
                // Validate shipping method selected
                if (!$('input[name="shipping_method[0]"]:checked').length) {
                    errorMessage = 'Por favor seleccioná un método de envío';
                    isValid = false;
                }
                break;

            case 4:
                // Validate payment method selected
                if (!$('input[name="payment_method"]:checked').length) {
                    errorMessage = 'Por favor seleccioná un método de pago';
                    isValid = false;
                }
                break;
        }

        if (!isValid && errorMessage) {
            showNotification(errorMessage, 'error');
        }

        return isValid;
    }

    function isValidEmail(email) {
        return /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email);
    }

    // ============================================
    // STICKY ORDER SUMMARY
    // ============================================
    function initOrderSummarySticky() {
        const $summary = $('.order-summary-sticky');

        if ($summary.length) {
            $(window).on('scroll', throttle(function() {
                const scrollTop = $(window).scrollTop();
                const offset = 100;

                if (scrollTop > offset) {
                    $summary.addClass('is-sticky');
                } else {
                    $summary.removeClass('is-sticky');
                }
            }, 100));
        }

        // Update order review on checkout update
        $(document.body).on('updated_checkout', function() {
            console.log('🔄 Checkout actualizado por WooCommerce AJAX');
            animateOrderSummary();
            // Preservar estado activo/inactivo después de AJAX
            preserveStepVisibility();
            
            // ⭐ AGREGAR ESTO: Refrescar AOS después del update
            if (typeof AOS !== 'undefined') {
                setTimeout(function() {
                    AOS.refresh();
                    console.log('✅ AOS refrescado después de update_checkout');
                }, 100);
            }
        });
    }

    function animateOrderSummary() {
        const $summary = $('.order-summary-sticky');
        $summary.addClass('updating');

        setTimeout(function() {
            $summary.removeClass('updating');
        }, 600);
    }

    // ============================================
    // SHIPPING METHODS REFRESH
    // ============================================
    function initShippingMethodsRefresh() {
        // Listen for address changes
        $('body').on('change', 'input[name="billing_postcode"], select[name="billing_country"], select[name="billing_state"]', function() {
            if (currentStep === 3) {
                refreshShippingMethods();
            }
        });
    }

    function refreshShippingMethods() {
        const $wrapper = $('#shipping-methods-wrapper');

        // Show loading
        $wrapper.html(`
            <div class="loading-shipping">
                <div class="spinner-border text-primary" role="status">
                    <span class="visually-hidden">Actualizando métodos de envío...</span>
                </div>
                <p>Actualizando métodos de envío...</p>
            </div>
        `);

        // Trigger WooCommerce update
        $('body').trigger('update_checkout');

        // After update, move shipping methods to our wrapper
        setTimeout(function() {
            const $shippingTable = $('.woocommerce-shipping-methods');

            if ($shippingTable.length) {
                $wrapper.html($shippingTable.parent().html());
                styleShippingMethods();
            } else {
                $wrapper.html('<p class="no-shipping">No hay métodos de envío disponibles para tu ubicación.</p>');
            }
        }, 1000);
    }

    function styleShippingMethods() {
        // Add custom styling to shipping methods
        $('.woocommerce-shipping-methods li').each(function() {
            $(this).addClass('shipping-method-item');
        });
    }

    // ============================================
    // NOTIFICATIONS
    // ============================================
    function showNotification(message, type = 'error') {
        const colors = {
            success: '#10B981',
            error: '#EF4444',
            warning: '#F59E0B',
            info: '#3B82F6'
        };

        const icons = {
            success: 'bi-check-circle-fill',
            error: 'bi-exclamation-circle-fill',
            warning: 'bi-exclamation-triangle-fill',
            info: 'bi-info-circle-fill'
        };

        const $toast = $('<div class="checkout-toast"></div>');
        $toast.html(`
            <i class="bi ${icons[type]} me-2"></i>
            <span>${message}</span>
        `);

        $toast.css({
            position: 'fixed',
            top: '100px',
            right: '30px',
            background: colors[type],
            color: 'white',
            padding: '16px 24px',
            borderRadius: '12px',
            boxShadow: '0 10px 40px rgba(0,0,0,0.3)',
            zIndex: 99999,
            fontWeight: '600',
            fontSize: '15px',
            display: 'flex',
            alignItems: 'center',
            animation: 'slideInRight 0.4s ease, slideOutRight 0.4s ease 2.6s'
        });

        $('body').append($toast);

        setTimeout(function() {
            $toast.remove();
        }, 3000);
    }

    // ============================================
    // UTILITIES
    // ============================================
    function throttle(func, limit) {
        let inThrottle;
        return function(...args) {
            if (!inThrottle) {
                func.apply(this, args);
                inThrottle = true;
                setTimeout(() => inThrottle = false, limit);
            }
        };
    }

    // ============================================
    // ANIMATIONS CSS (Inyectar en head)
    // ============================================
    const checkoutAnimations = `
        <style>
        @keyframes slideInRight {
            from {
                transform: translateX(100px);
                opacity: 0;
            }
            to {
                transform: translateX(0);
                opacity: 1;
            }
        }

        @keyframes slideOutRight {
            from {
                transform: translateX(0);
                opacity: 1;
            }
            to {
                transform: translateX(100px);
                opacity: 0;
            }
        }

        .error-field {
            border-color: #EF4444 !important;
            box-shadow: 0 0 0 0.2rem rgba(239, 68, 68, 0.15) !important;
        }

        .order-summary-sticky.updating {
            animation: pulse 0.6s ease;
        }

        @keyframes pulse {
            0%, 100% { opacity: 1; }
            50% { opacity: 0.7; }
        }
        </style>
    `;

    $('head').append(checkoutAnimations);

    // ============================================
    // CONSOLE LOG
    // ============================================
    console.log('%c💜 FEYMA CHECKOUT', 'color: #3D3180; font-size: 14px; font-weight: bold;');
    console.log('%c⚡ Multi-Step System Active', 'color: #F7B32B; font-size: 12px;');

})(jQuery);
