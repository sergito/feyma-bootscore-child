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

    acf_add_options_page(array(
        'page_title'    => 'Configuración de Home',
        'menu_title'    => 'Home (ACF)',
        'menu_slug'     => 'home-settings',
        'capability'    => 'edit_posts',
        'icon_url'      => 'dashicons-admin-home',
        'position'      => 2,
        'redirect'      => false,
        'updated_message' => 'Configuración de Home guardada correctamente'
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
