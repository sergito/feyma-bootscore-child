/**
 * Variation Buttons for WooCommerce - Custom Design
 */

(function($) {
    'use strict';

    const VariationButtons = {
        
        init: function() {
            this.createVariationStructure();
            this.bindEvents();
        },

        /**
         * Crear estructura completa de variaciones
         */
        createVariationStructure: function() {
            const $form = $('form.variations_form');
            if (!$form.length) return;

            const $table = $('.variations');
            if (!$table.length) return;

            // Crear contenedor principal
            const $container = $('<div class="product-variations"></div>');
            $container.append('<h3>Elegí tu configuración</h3>');

            const self = this;

            // Procesar cada fila de variación
            $table.find('tr').each(function() {
                const $row = $(this);
                const $label = $row.find('.label label');
                const $select = $row.find('select');

                if (!$select.length) return;

                const labelText = $label.text().replace(':', '').trim();
                const attributeName = $select.data('attribute_name');
                
                // Crear grupo de variación
                const $group = self.createVariationGroup(labelText, attributeName, $select);
                $container.append($group);
            });

            // Insertar antes de la tabla y ocultar la tabla
            $table.before($container).hide();
        },

        /**
         * Crear grupo de variación
         */
        createVariationGroup: function(label, attributeName, $select) {
            const $group = $('<div class="variation-group"></div>');
            $group.append(`<label class="variation-label">${label}</label>`);

            const isColor = this.isColorAttribute(attributeName);
            const $options = $('<div class="variation-options"></div>');
            
            if (isColor) {
                $options.addClass('color-options');
            }

            const self = this;

            // Crear botón por cada opción
            $select.find('option').each(function() {
                const $option = $(this);
                const value = $option.val();
                const text = $option.text();

                if (!value) return; // Skip placeholder

                let $button;

                if (isColor && self.isHexColor(value)) {
                    $button = self.createColorButton(value, text, attributeName);
                } else {
                    $button = self.createTextButton(value, text, attributeName, $option);
                }

                // Marcar como activo si está seleccionado
                if ($option.is(':selected')) {
                    $button.addClass('active');
                }

                // Marcar como deshabilitado
                if ($option.is(':disabled')) {
                    $button.prop('disabled', true).addClass('disabled');
                }

                $options.append($button);
            });

            $group.append($options);
            return $group;
        },

        /**
         * Crear botón de texto
         */
        createTextButton: function(value, text, attributeName, $option) {
            const $button = $('<button type="button" class="variation-btn"></button>')
                .attr('data-option', this.getOptionName(attributeName))
                .attr('data-value', value)
                .data('attribute', attributeName)
                .text(text);

            // Obtener información de precio si existe
            const priceInfo = this.getPriceInfo($option, value);
            
            if (priceInfo.price) {
                const $priceSpan = $('<span class="var-price"></span>').text(priceInfo.text);
                $button.append($priceSpan);
            }

            // Agregar badge de recomendado si aplica
            if (priceInfo.isRecommended) {
                const $badge = $('<span class="recommended">Recomendado</span>');
                $button.append($badge);
            }

            return $button;
        },

        /**
         * Crear botón de color
         */
        createColorButton: function(value, text, attributeName) {
            const colorHex = value.startsWith('#') ? value : '#' + value;
            
            const $button = $('<button type="button" class="color-btn"></button>')
                .attr('data-option', 'color')
                .attr('data-value', value)
                .attr('title', text)
                .data('attribute', attributeName)
                .html(`
                    <span class="color-circle" style="background: ${colorHex};"></span>
                    ${text}
                `);

            return $button;
        },

        /**
         * Obtener información de precio
         */
        getPriceInfo: function($option, value) {
            const result = {
                price: 0,
                text: '',
                isRecommended: false
            };

            // Intentar obtener precio desde data attributes o texto
            const text = $option.text();
            
            // Buscar si dice "Incluido"
            if (text.toLowerCase().includes('incluido') || text.toLowerCase().includes('included')) {
                result.text = 'Incluido';
                result.isRecommended = true;
                return result;
            }

            // Buscar precio en formato + $XXX o - $XXX
            const priceMatch = text.match(/([+\-])\s*\$\s*([\d.,]+)/);
            if (priceMatch) {
                const sign = priceMatch[1];
                const amount = priceMatch[2];
                
                if (sign === '+' && amount !== '0') {
                    result.price = parseFloat(amount.replace(/[.,]/g, ''));
                    result.text = `+ $${amount}`;
                } else if (amount === '0') {
                    result.text = '+ $0';
                }
            } else {
                // Si no hay precio, mostrar + $0
                result.text = '+ $0';
            }

            return result;
        },

        /**
         * Obtener nombre limpio del atributo
         */
        getOptionName: function(attributeName) {
            return attributeName.replace('attribute_pa_', '').replace('pa_', '');
        },

        /**
         * Eventos
         */
        bindEvents: function() {
            const self = this;
            
            // Click en botones de variación
            $(document).on('click', '.variation-btn, .color-btn', function(e) {
                e.preventDefault();
                
                const $btn = $(this);
                
                if ($btn.prop('disabled') || $btn.hasClass('disabled')) return;
                
                const attributeName = $btn.data('attribute');
                const value = $btn.data('value');
                const $select = $(`.variations select[data-attribute_name="${attributeName}"]`);
                
                if (!$select.length) return;

                // Actualizar select
                $select.val(value).trigger('change');
                
                // Actualizar clases visuales
                $btn.siblings('.variation-btn, .color-btn').removeClass('active');
                $btn.addClass('active');
            });
            
            // Cuando cambian las variaciones disponibles
            $('form.variations_form')
                .on('woocommerce_update_variation_values', function() {
                    self.updateButtonStates();
                })
                .on('found_variation', function(event, variation) {
                    self.updateButtonStates();
                });
            
            // Reset variations
            $('.reset_variations').on('click', function() {
                setTimeout(function() {
                    $('.variation-btn, .color-btn').removeClass('active');
                    self.updateButtonStates();
                }, 10);
            });
        },

        /**
         * Actualizar estados de botones
         */
        updateButtonStates: function() {
            $('.variations select').each(function() {
                const $select = $(this);
                const attributeName = $select.data('attribute_name');
                
                $select.find('option').each(function() {
                    const $option = $(this);
                    const value = $option.val();
                    
                    if (!value) return;
                    
                    const $button = $(`.variation-btn[data-attribute="${attributeName}"][data-value="${value}"], .color-btn[data-attribute="${attributeName}"][data-value="${value}"]`);
                    
                    if (!$button.length) return;
                    
                    // Actualizar disabled
                    if ($option.is(':disabled') || (!$option.hasClass('enabled') && !$option.hasClass('attached'))) {
                        $button.prop('disabled', true).addClass('disabled');
                    } else {
                        $button.prop('disabled', false).removeClass('disabled');
                    }
                    
                    // Actualizar active
                    if ($option.is(':selected')) {
                        $button.addClass('active').siblings().removeClass('active');
                    }
                });
            });
        },

        /**
         * Verificar si es atributo de color
         */
        isColorAttribute: function(attributeName) {
            const colorAttributes = [
                'pa_color',
                'pa_colour',
                'pa_color-de-producto',
                'attribute_pa_color',
                'attribute_pa_colour'
            ];
            
            return colorAttributes.some(attr => 
                attributeName.toLowerCase().includes(attr.toLowerCase())
            );
        },

        /**
         * Verificar si es código hex
         */
        isHexColor: function(value) {
            const hexPattern = /^#?([0-9A-F]{3}){1,2}$/i;
            return hexPattern.test(value);
        }
    };

    // Inicializar
    $(document).ready(function() {
        // Esperar a que WooCommerce esté listo
        if (typeof wc_add_to_cart_variation_params !== 'undefined') {
            VariationButtons.init();
        } else {
            setTimeout(function() {
                VariationButtons.init();
            }, 500);
        }
    });

})(jQuery);