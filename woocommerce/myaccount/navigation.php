<?php

/**
 * My Account navigation
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/myaccount/navigation.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @author  WooThemes
 * @package WooCommerce/Templates
 * @version 9.3.0
 */

if (!defined('ABSPATH')) {
  exit;
}

do_action('woocommerce_before_account_navigation');
?>


<div class="row">
  <!-- End in my-account.php -->
  <div class="col-md-4">
    <nav class="woocommerce-MyAccount-navigation" aria-label="<?php esc_html_e( 'Account pages', 'woocommerce' ); ?>">
      <div class="list-group mb-4">
        <?php foreach (wc_get_account_menu_items() as $endpoint => $label) : ?>

           <?php
            // Ocultar descargas
            if ( $endpoint === 'downloads' ) {
              continue;
            }

            // Definir clases e iconos según endpoint
            $custom_class = '';
            $icon = '';
            switch ($endpoint) {
              case 'dashboard':
                $custom_class = 'mi--dashboard';
                $icon = '<i class="bi bi-speedometer2"></i>';
                break;
              case 'orders':
                $custom_class = 'mi--orders';
                $icon = '<i class="bi bi-bag-check-fill"></i>';
                break;
              case 'edit-address':
                $custom_class = 'mi--address';
                $icon = '<i class="bi bi-geo-alt-fill"></i>';
                break;
              case 'edit-account':
                $custom_class = 'mi--account';
                $icon = '<i class="bi bi-person-circle"></i>';
                break;
              case 'my-wish-list':
                $custom_class = 'mi--wishlist';
                $icon = '<i class="bi bi-heart-fill"></i>';
                break;
              case 'customer-logout':
                $custom_class = 'mi--logout';
                $icon = '<i class="bi bi-box-arrow-right"></i>';
                break;
              default:
                $icon = '<i class="bi bi-circle"></i>';
                break;
            }
          ?>

          <a href="<?php echo esc_url( wc_get_account_endpoint_url( $endpoint ) ); ?>" class="list-group-item list-group-item-action <?php echo esc_attr( $custom_class ); ?>" <?php echo wc_is_current_account_menu_item( $endpoint ) ? 'aria-current="page"' : ''; ?>>
            <span class="menu-icon"><?php echo $icon; ?></span>
            <span class="menu-label"><?php echo esc_html( $label ); ?></span>
          </a>

        <?php endforeach; ?>
      </div>
    </nav>
  </div>

  <?php do_action('woocommerce_after_account_navigation'); ?>