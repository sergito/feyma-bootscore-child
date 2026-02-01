/**
 * FEYMA - Product Variations with Radio Buttons
 * Convierte los selects de variaciones en botones clickeables
 * Compatible con WooCommerce variations API
 */

(function($) {
    'use strict';

    // Esperar a que el DOM y WooCommerce estén listos
    $(document).ready(function() {

        // Solo ejecutar en páginas de producto
        if (!$('body').hasClass('single-product')) {
            return;
        }

        // Esperar a que WooCommerce inicialice las variaciones
        $(document).on('wc_variation_form', function() {
            initVariationButtons();
        });

        // También inicializar inmediatamente por si WooCommerce ya cargó
        initVariationButtons();

    });

    function initVariationButtons() {
        const $form = $('form.variations_form');

        if (!$form.length) {
            return;
        }

        // Para cada select de variación, configurar los botones
        $form.find('.variations select').each(function() {
            const $select = $(this);
            const attributeName = $select.data('attribute_name') || $select.attr('name');
            const $wrapper = $select.closest('.value').find('.variation-buttons-wrapper');

            if (!$wrapper.length) {
                return;
            }

            setupButtonsForSelect($select, $wrapper, $form);
        });

        // Trigger inicial para sincronizar con selecciones por defecto
        $form.find('.variations select').trigger('change');
    }

    function setupButtonsForSelect($select, $wrapper, $form) {
        const $options = $wrapper.find('.variation-option');

        // Click en un botón de variación
        $options.on('click', function(e) {
            e.preventDefault();

            const $button = $(this);
            const value = $button.data('value');

            // Remover clase active de todos los botones de este grupo
            $options.removeClass('active');

            // Agregar clase active al botón clickeado
            $button.addClass('active');

            // Actualizar el select oculto
            $select.val(value).trigger('change');

            // Pequeña animación de feedback
            $button.css('transform', 'scale(0.95)');
            setTimeout(function() {
                $button.css('transform', '');
            }, 100);
        });

        // Sincronizar cuando WooCommerce cambia el select (ej: reset)
        $select.on('change', function() {
            const selectedValue = $(this).val();

            $options.each(function() {
                const $option = $(this);
                const optionValue = $option.data('value');

                if (optionValue == selectedValue) {
                    $option.addClass('active');
                } else {
                    $option.removeClass('active');
                }
            });
        });

        // Deshabilitar opciones no disponibles
        $form.on('woocommerce_update_variation_values', function() {
            updateButtonsAvailability($select, $options);
        });

        // Initial check
        updateButtonsAvailability($select, $options);
    }

    function updateButtonsAvailability($select, $options) {
        // Obtener opciones disponibles del select
        const availableOptions = [];
        $select.find('option').each(function() {
            const value = $(this).val();
            if (value && value !== '') {
                availableOptions.push(value);
            }
        });

        // Deshabilitar botones para opciones no disponibles
        $options.each(function() {
            const $option = $(this);
            const value = $option.data('value');

            if (availableOptions.indexOf(value) === -1 && availableOptions.length > 0) {
                $option.addClass('disabled').css({
                    'opacity': '0.4',
                    'cursor': 'not-allowed',
                    'pointer-events': 'none'
                });
            } else {
                $option.removeClass('disabled').css({
                    'opacity': '',
                    'cursor': '',
                    'pointer-events': ''
                });
            }
        });
    }

    // Mejorar el link "Clear"
    $(document).on('click', '.reset_variations', function(e) {
        e.preventDefault();

        const $form = $(this).closest('form.variations_form');

        // Remover todas las clases active
        $form.find('.variation-option').removeClass('active');

        // Reset de los selects
        $form.find('.variations select').val('').trigger('change');

        // Smooth scroll hacia arriba de variaciones
        $('html, body').animate({
            scrollTop: $('.product-configuration').offset().top - 100
        }, 400);
    });

    // Añadir animación al mostrar el precio de variación
    $('form.variations_form').on('show_variation', function(event, variation) {
        const $priceContainer = $(this).find('.woocommerce-variation-price');

        if ($priceContainer.length) {
            $priceContainer.hide().fadeIn(300);
        }

        // Actualizar el botón de añadir al carrito
        const $button = $(this).find('.single_add_to_cart_button');
        $button.removeClass('disabled').prop('disabled', false);
    });

    // Ocultar precio cuando no hay variación seleccionada
    $('form.variations_form').on('hide_variation', function() {
        const $button = $(this).find('.single_add_to_cart_button');
        $button.addClass('disabled').prop('disabled', true);
    });

    // Animación para botón de compra
    $(document).on('mouseenter', '.single_add_to_cart_button:not(:disabled)', function() {
        $(this).find('i').css('transform', 'scale(1.2) rotate(10deg)');
    }).on('mouseleave', '.single_add_to_cart_button', function() {
        $(this).find('i').css('transform', '');
    });

})(jQuery);
