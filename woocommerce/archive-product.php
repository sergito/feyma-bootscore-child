<?php
/**
 * The Template for displaying product archives, including the main shop page which is a post type archive
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/archive-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 8.6.0
 */

defined( 'ABSPATH' ) || exit;

get_header( 'shop' ); ?>

<!-- ============================================
         SHOP HERO EPIC - Más bajo que páginas internas
         ============================================ -->
<section class="shop-hero-epic">
    <!-- Circuit pattern animado -->
    <div class="hero-circuit-pattern"></div>
    <div class="hero-particles"></div>
    <div class="scan-line"></div>

    <!-- Nodos de conexión pulsantes -->
    <div class="circuit-nodes">
        <div class="circuit-node"></div>
        <div class="circuit-node"></div>
        <div class="circuit-node"></div>
    </div>

    <!-- Data flow (líneas que viajan) -->
    <div class="data-flow data-flow-1"></div>

    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-12 text-center">
                <div class="shop-hero-content" data-aos="fade-up">
                    <div class="hero-icon mb-3" data-aos="zoom-in" data-aos-delay="100">
                        <i class="bi bi-laptop"></i>
                    </div>
                    <h1 class="shop-hero-title" data-aos="fade-up" data-aos-delay="200">
                        <?php
                        if ( is_shop() ) {
                            echo 'Tienda';
                        } else {
                            woocommerce_page_title();
                        }
                        ?>
                    </h1>
                    <?php if ( is_shop() ) : ?>
                    <p class="shop-hero-subtitle" data-aos="fade-up" data-aos-delay="300">
                        Encuentra el equipo perfecto para tu necesidad
                    </p>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</section>

  <div id="content" class="site-content <?= apply_filters('bootscore/class/container', 'container', 'woocommerce'); ?> <?= apply_filters('bootscore/class/content/spacer', 'pt-3 pb-5', 'woocommerce'); ?>">
    <div id="primary" class="content-area">

		<?php
		/**
		 * Hook: woocommerce_before_main_content.
		 *
		 * @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
		 * @hooked woocommerce_breadcrumb - 20
		 * @hooked WC_Structured_Data::generate_website_data() - 30
		 */
		do_action( 'woocommerce_before_main_content' ); ?>

		  <div class="row">
			  <?php
				/**
				 * Hook: woocommerce_sidebar.
				 *
				 * @hooked woocommerce_get_sidebar - 10
				 */
				do_action( 'woocommerce_sidebar' );
			  ?>

		      <div class="col-lg-9">
				<?php
				/**
				 * Hook: woocommerce_shop_loop_header.
				 *
				 * @since 8.6.0
				 *
				 * @hooked woocommerce_product_taxonomy_archive_header - 10
				 */
				do_action( 'woocommerce_shop_loop_header' );

				if ( woocommerce_product_loop() ) {

					// Primero quitamos los originales para que no se dupliquen
					remove_action( 'woocommerce_before_shop_loop', 'woocommerce_output_all_notices', 10 );
					remove_action( 'woocommerce_before_shop_loop', 'woocommerce_result_count', 20 );
					remove_action( 'woocommerce_before_shop_loop', 'woocommerce_catalog_ordering', 30 );

					// Ahora en el lugar que quieras (ej. dentro de filtrosShop)
					echo "<div class='filtrosShop'>";
						woocommerce_output_all_notices(); // sigue mostrando los avisos
						woocommerce_result_count();
						woocommerce_catalog_ordering();
					echo "</div>";

					woocommerce_product_loop_start();

					if ( wc_get_loop_prop( 'total' ) ) {
						while ( have_posts() ) {
							the_post();

							/**
							 * Hook: woocommerce_shop_loop.
							 */
							do_action( 'woocommerce_shop_loop' );

							wc_get_template_part( 'content', 'product' );
						}
					}

					woocommerce_product_loop_end();

					/**
					 * Hook: woocommerce_after_shop_loop.
					 *
					 * @hooked woocommerce_pagination - 10
					 */
					do_action( 'woocommerce_after_shop_loop' );
				} else {
					/**
					 * Hook: woocommerce_no_products_found.
					 *
					 * @hooked wc_no_products_found - 10
					 */
					do_action( 'woocommerce_no_products_found' );
				}
                ?>
			  </div>
		  </div><!-- /.row -->	

		<?php
		/**
		 * Hook: woocommerce_after_main_content.
		 *
		 * @hooked woocommerce_output_content_wrapper_end - 10 (outputs closing divs for the content)
		 */
		do_action( 'woocommerce_after_main_content' );

	?>
    </div><!-- #primary -->
  </div><!-- #content -->

<?php
get_footer( 'shop' );