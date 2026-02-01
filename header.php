<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Bootscore
 * @version 6.2.0
 */

// Exit if accessed directly
defined('ABSPATH') || exit;

?>
<!doctype html>
<html <?php language_attributes(); ?>>

<head>
  <meta charset="<?php bloginfo('charset'); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="profile" href="https://gmpg.org/xfn/11">

  <!-- Favicon -->
  <link rel="icon" type="image/png" href="assets/images/favicon.png">

  <!-- Google Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">

  <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<?php wp_body_open(); ?>

<div id="page" class="site">
  
  <!-- Skip Links -->
  <a class="skip-link visually-hidden-focusable" href="#primary"><?php esc_html_e( 'Skip to content', 'bootscore' ); ?></a>
  <a class="skip-link visually-hidden-focusable" href="#footer"><?php esc_html_e( 'Skip to footer', 'bootscore' ); ?></a>

  <!-- Top Bar Widget -->
  <?php if (is_active_sidebar('top-bar')) : ?>
    <?php dynamic_sidebar('top-bar'); ?>
  <?php endif; ?>
  
  <?php do_action( 'bootscore_before_masthead' ); ?>
      
    <!-- ============================================
      HEADER
    ============================================ -->
    <header id="masthead" class="main-header site-header">
        <?php do_action( 'bootscore_after_masthead_open' ); ?>

        <div class="container-fluid">
            <nav class="navbar navbar-expand-xxl">
                <div class="container">
                    <!-- Navbar Brand -->
                    <a class="<?= apply_filters('bootscore/class/header/navbar-brand', 'navbar-brand'); ?>" href="<?= esc_url(home_url()); ?>">
                       <img src="<?= esc_url(apply_filters('bootscore/logo', get_stylesheet_directory_uri() . '/assets/images/logo-feyma-footer.svg', 'default')); ?>" alt="<?php bloginfo('name'); ?> Logo" class="logo-img">

                       <img src="<?= esc_url(apply_filters('bootscore/logo', get_stylesheet_directory_uri() . '/assets/images/feyma-top-logo.svg', 'default')); ?>" alt="<?php bloginfo('name'); ?> Logo" class="logo-img-mobile" width="105" />
                    </a>  

                    <?php do_action( 'bootscore_before_navbar_brand' ); ?>

                    <!-- Offcanvas Navbar -->
                    <div class="offcanvas offcanvas-<?= esc_attr(apply_filters('bootscore/class/header/offcanvas/direction', 'end', 'menu')); ?>" tabindex="-1" id="offcanvas-navbar">
                      <div class="offcanvas-header <?= esc_attr(apply_filters('bootscore/class/offcanvas/header', '', 'menu')); ?>">
                        <span class="h5 offcanvas-title"><?= esc_html(apply_filters('bootscore/offcanvas/navbar/title', __('Menu', 'bootscore'))); ?></span>
                        <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                      </div>
                      <div class="offcanvas-body <?= esc_attr(apply_filters('bootscore/class/offcanvas/body', '', 'menu')); ?>">

                        <!-- Bootstrap 5 Nav Walker Main Menu -->
                        <?php get_template_part('template-parts/header/main-menu'); ?>

                        <!-- Top Nav 2 Widget -->
                        <?php if (is_active_sidebar('top-nav-2')) : ?>
                          <?php dynamic_sidebar('top-nav-2'); ?>
                        <?php endif; ?>

                      </div>
                    </div>

                    <!-- Navigation -->
                    <div class="">
                       
                        <!-- Header Actions -->
                        <div class="header-actions">
                            <a class="header-icon" href="<?php echo esc_url(get_permalink(wc_get_page_id('shop'))); ?>" title="Ir a la tienda">
                                <i class="bi bi-bag"></i>
                            </a>

                            <!-- Search Desktop -->
                            <div class="search-box d-none d-md-flex">
                                <input type="search" placeholder="Buscar" class="search-input">
                                <button class="search-btn">
                                    <i class="bi bi-search"></i>
                                </button>
                            </div>

                            <!-- Search Mobile Icon -->
                            <button class="header-icon search-toggle-mobile d-md-none" type="button" id="searchToggleMobile" aria-label="Toggle search">
                                <i class="bi bi-search"></i>
                            </button>

                            <!-- User -->
                            <button class="header-icon account-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvas-user" aria-controls="offcanvas-user" aria-label="<?php esc_attr_e( 'Account toggler', 'bootscore' ); ?>">
                                <i class="bi bi-person"></i>
                            </button>

                            <!-- Mini cart toggler -->
                            <?php
                            if ( is_cart() ) {
                            // Do nothing
                            } elseif ( is_checkout() ) { ?>
                              <!-- Add a back-to-cart button -->
                              <?php
                              // Check the filter and AJAX cart option
                              $skip_cart_filter = apply_filters('bootscore/skip_cart', true);
                              $ajax_cart_en = 'yes' === get_option('woocommerce_enable_ajax_add_to_cart');

                            if ($skip_cart_filter && $ajax_cart_en) {
                                $back_to_cart_url = get_permalink(wc_get_page_id('shop'));
                              } else {
                                $back_to_cart_url = wc_get_cart_url();
                              }

                              ?>
                              <a class="<?= esc_attr(apply_filters('bootscore/class/header/button', 'btn btn-outline-secondary', 'cart-toggler')); ?> <?= esc_attr(apply_filters('bootscore/class/header/action/spacer', 'ms-1 ms-md-2', 'cart-toggler')); ?> back-to-cart header-icon2 cart-icon" href="<?= esc_url($back_to_cart_url); ?>">
                                <?= wp_kses_post(apply_filters('bootscore/icon/arrow-left', '<i class="fa-solid fa-arrow-left d-none d-md-inline me-2"></i>')); ?><?= wp_kses_post(apply_filters('bootscore/icon/cart', '<i class="bi bi-cart3"></i>')); ?><span class="visually-hidden-focusable">Return to <?= esc_html(($back_to_cart_url == wc_get_cart_url()) ? 'Cart' : 'Shop'); ?></span>
                              </a>
                            <?php } else { ?>
                              <!-- Add mini-cart toggler -->
                              <button class="<?= esc_attr(apply_filters('bootscore/class/header/button', 'btn btn-outline-secondary', 'cart-toggler')); ?> <?= esc_attr(apply_filters('bootscore/class/header/action/spacer', 'ms-1 ms-md-2', 'cart-toggler')); ?> position-relative cart-toggler header-icon2 cart-icon" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvas-cart" aria-controls="offcanvas-cart" aria-label="<?php esc_attr_e( 'Cart toggler', 'bootscore' ); ?>">
                                <div class="d-inline-flex align-items-center">
                                  <?= wp_kses_post(apply_filters('bootscore/icon/cart', '<i class="bi bi-cart3"></i>')); ?> <span class="visually-hidden-focusable">Cart</span>
                                  <?php if (in_array('woocommerce/woocommerce.php', apply_filters('active_plugins', get_option('active_plugins')))) {
                                    ?>
                                    <span class="cart-content"></span>
                                  <?php } ?>
                                </div>
                              </button>
                            <?php } ?>

                             <!-- Navbar Toggler -->
                              <button class="<?= esc_attr(apply_filters('bootscore/class/header/button', 'btn btn-outline-secondary', 'nav-toggler')); ?> <?= esc_attr(apply_filters('bootscore/class/header/navbar/toggler/breakpoint', 'd-xxl-none')); ?> <?= esc_attr(apply_filters('bootscore/class/header/action/spacer', 'ms-1 ms-md-2', 'nav-toggler')); ?> nav-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvas-navbar" aria-controls="offcanvas-navbar" aria-label="<?php esc_attr_e( 'Toggle main menu', 'bootscore' ); ?>">
                                <?= wp_kses_post(apply_filters('bootscore/icon/menu', '<i class="fa-solid fa-bars"></i>')); ?> <span class="visually-hidden-focusable">Menu</span>
                              </button>
                              
                              <?php do_action( 'bootscore_after_nav_toggler' ); ?>
                        </div>
                        <!-- / .Header Actions -->

                    </div>
                </div>
            </nav>
        </div>

        <!-- Search Bar Mobile - Segunda Fila -->
        <div class="search-mobile-expanded d-md-none" id="searchMobileExpanded">
            <div class="container">
                <div class="search-mobile-wrapper">
                    <div class="search-box-mobile">
                        <input type="search" placeholder="Buscar productos..." class="search-input-mobile" id="searchInputMobile">
                        <button class="search-btn-mobile">
                            <i class="bi bi-search"></i>
                        </button>
                    </div>
                    <button class="close-search-mobile" id="closeSearchMobile">
                        <i class="bi bi-x-lg"></i>
                    </button>
                </div>
                <!-- Contenedor para resultados de búsqueda mobile -->
                <div class="search-results-wrapper-mobile"></div>
            </div>
        </div>

        <?php
        if (class_exists('WooCommerce')) :
          get_template_part('template-parts/header/collapse-search', 'woocommerce');
        else :
          get_template_part('template-parts/header/collapse-search');
        endif;
        ?>

        <!-- Offcanvas User and Cart -->
        <?php
        if (class_exists('WooCommerce')) :
          get_template_part('template-parts/header/offcanvas', 'woocommerce');
        endif;
        ?>

        <?php do_action( 'bootscore_before_masthead_close' ); ?>
        
    </header>
  
  <?php do_action( 'bootscore_after_masthead' ); ?>
