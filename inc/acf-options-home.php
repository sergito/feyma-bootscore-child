<?php
/**
 * ACF Options Page - Configuración de Home
 * Registra una página de opciones en el admin de WordPress para gestionar
 * todas las secciones dinámicas de la página de inicio
 *
 * @package Bootscore Child
 */
 
// Exit if accessed directly
defined('ABSPATH') || exit;
 
/**
 * Register ACF Options Page for Home Settings
 */
if( function_exists('acf_add_options_page') ) {
 
    // Página principal: Home
    acf_add_options_page(array(
        'page_title'    => 'Configuración de Home',
        'menu_title'    => 'Home',
        'menu_slug'     => 'home-settings',
        'capability'    => 'edit_posts',
        'icon_url'      => 'dashicons-admin-home',
        'position'      => 2,
        'redirect'      => true, // Redirige a la primera subpágina
        'updated_message' => 'Configuración guardada correctamente'
    ));
 
    // Subpágina: Slider
    acf_add_options_sub_page(array(
        'page_title'    => 'Hero Slider',
        'menu_title'    => 'Slider',
        'parent_slug'   => 'home-settings',
        'menu_slug'     => 'home-slider',
        'capability'    => 'edit_posts',
        'updated_message' => 'Slider guardado correctamente'
    ));
 
}
 
/**
 * Register ACF Fields for Hero Slider
 */
add_action('acf/init', 'feyma_register_slider_fields');
 
function feyma_register_slider_fields() {
 
    if( !function_exists('acf_add_local_field_group') ) {
        return;
    }
 
    acf_add_local_field_group(array(
        'key' => 'group_hero_slider',
        'title' => 'Hero Slider - Configuración',
        'fields' => array(
            // Configuración general del slider
            array(
                'key' => 'field_slider_config',
                'label' => 'Configuración del Slider',
                'name' => '',
                'type' => 'tab',
                'placement' => 'top',
            ),
            array(
                'key' => 'field_slider_interval',
                'label' => 'Intervalo de cambio (ms)',
                'name' => 'slider_interval',
                'type' => 'number',
                'instructions' => 'Tiempo en milisegundos entre cada slide. Default: 5000 (5 segundos)',
                'default_value' => 5000,
                'min' => 1000,
                'max' => 20000,
                'step' => 500,
            ),
            array(
                'key' => 'field_slider_autoplay',
                'label' => 'Autoplay',
                'name' => 'slider_autoplay',
                'type' => 'true_false',
                'instructions' => 'Activar cambio automático de slides',
                'default_value' => 1,
                'ui' => 1,
            ),
            // Tab de Slides
            array(
                'key' => 'field_slides_tab',
                'label' => 'Slides',
                'name' => '',
                'type' => 'tab',
                'placement' => 'top',
            ),
            // Repeater de Slides
            array(
                'key' => 'field_hero_slides',
                'label' => 'Slides del Hero',
                'name' => 'hero_slides',
                'type' => 'repeater',
                'instructions' => 'Agregá los slides que se mostrarán en el Hero de la página de inicio',
                'min' => 1,
                'max' => 10,
                'layout' => 'block',
                'button_label' => 'Agregar Slide',
                'sub_fields' => array(
                    // Título parte 1 (blanco)
                    array(
                        'key' => 'field_slide_titulo_1',
                        'label' => 'Título (parte blanca)',
                        'name' => 'titulo_blanco',
                        'type' => 'text',
                        'instructions' => 'Primera parte del título en color blanco',
                        'required' => 1,
                        'placeholder' => 'Ej: Envíos gratis',
                        'wrapper' => array(
                            'width' => '50',
                        ),
                    ),
                    // Título parte 2 (dorado/accent)
                    array(
                        'key' => 'field_slide_titulo_2',
                        'label' => 'Título (parte dorada)',
                        'name' => 'titulo_dorado',
                        'type' => 'text',
                        'instructions' => 'Segunda parte del título en color dorado',
                        'required' => 1,
                        'placeholder' => 'Ej: a todo el país',
                        'wrapper' => array(
                            'width' => '50',
                        ),
                    ),
                    // Descripción
                    array(
                        'key' => 'field_slide_descripcion',
                        'label' => 'Descripción',
                        'name' => 'descripcion',
                        'type' => 'textarea',
                        'instructions' => 'Texto descriptivo del slide',
                        'required' => 1,
                        'rows' => 3,
                        'placeholder' => 'Comprá desde la comodidad de tu casa...',
                    ),
                    // Texto del botón
                    array(
                        'key' => 'field_slide_boton_texto',
                        'label' => 'Texto del botón',
                        'name' => 'boton_texto',
                        'type' => 'text',
                        'instructions' => 'Texto que aparece en el botón CTA',
                        'required' => 1,
                        'default_value' => 'Ver productos',
                        'placeholder' => 'Ver productos',
                        'wrapper' => array(
                            'width' => '50',
                        ),
                    ),
                    // URL del botón
                    array(
                        'key' => 'field_slide_boton_url',
                        'label' => 'URL del botón',
                        'name' => 'boton_url',
                        'type' => 'url',
                        'instructions' => 'Link del botón. Dejá vacío para ir a la tienda',
                        'placeholder' => 'https://...',
                        'wrapper' => array(
                            'width' => '50',
                        ),
                    ),
                    // Imagen del slide
                    array(
                        'key' => 'field_slide_imagen',
                        'label' => 'Imagen',
                        'name' => 'imagen',
                        'type' => 'image',
                        'instructions' => 'Imagen del slide (recomendado: 600x400px, PNG con fondo transparente)',
                        'required' => 0,
                        'return_format' => 'array',
                        'preview_size' => 'medium',
                        'library' => 'all',
                    ),
                    // Alt de la imagen
                    array(
                        'key' => 'field_slide_imagen_alt',
                        'label' => 'Alt de la imagen',
                        'name' => 'imagen_alt',
                        'type' => 'text',
                        'instructions' => 'Texto alternativo para la imagen (SEO)',
                        'placeholder' => 'Descripción de la imagen',
                    ),
                    // Activo/Inactivo
                    array(
                        'key' => 'field_slide_activo',
                        'label' => 'Slide activo',
                        'name' => 'activo',
                        'type' => 'true_false',
                        'instructions' => 'Desactivá para ocultar temporalmente este slide',
                        'default_value' => 1,
                        'ui' => 1,
                    ),
                ),
            ),
        ),
        'location' => array(
            array(
                array(
                    'param' => 'options_page',
                    'operator' => '==',
                    'value' => 'home-slider',
                ),
            ),
        ),
        'menu_order' => 0,
        'position' => 'normal',
        'style' => 'default',
        'label_placement' => 'top',
        'instruction_placement' => 'label',
        'hide_on_screen' => '',
        'active' => true,
        'description' => 'Configuración del Hero Slider de la página de inicio',
    ));
}
 
/**
 * Helper function to get home option
 *
 * @param string $field_name ACF field name
 * @param mixed $default Default value if field is empty
 * @return mixed
 */
function feyma_get_home_option( $field_name, $default = false ) {
    $value = get_field( $field_name, 'option' );
    return $value ? $value : $default;
}
 
/**
 * Helper function to get hero slides
 * Returns only active slides
 *
 * @return array
 */
function feyma_get_hero_slides() {
    $slides = get_field('hero_slides', 'option');
 
    if( !$slides || !is_array($slides) ) {
        return array();
    }
 
    // Filtrar solo slides activos
    $active_slides = array_filter($slides, function($slide) {
        return isset($slide['activo']) && $slide['activo'];
    });
 
    return array_values($active_slides); // Re-indexar array
}
 
/**
 * Get slider configuration
 *
 * @return array
 */
function feyma_get_slider_config() {
    return array(
        'interval' => feyma_get_home_option('slider_interval', 5000),
        'autoplay' => feyma_get_home_option('slider_autoplay', true),
    );
}