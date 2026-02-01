<?php
/**
 * The template for displaying product content in the single-product.php template
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-single-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.6.0
 */

defined( 'ABSPATH' ) || exit;

global $product;

/**
 * Hook: woocommerce_before_single_product.
 *
 * @hooked woocommerce_output_all_notices - 10
 */
do_action( 'woocommerce_before_single_product' );

if ( post_password_required() ) {
	echo get_the_password_form(); // WPCS: XSS ok.
	return;
}
?>
<div id="product-<?php the_ID(); ?>" <?php wc_product_class( '', $product ); ?>>

    <div id="wpgs-galleryContainer" class="gal-container">
		<?php
		/**
		 * Hook: woocommerce_before_single_product_summary.
		 *
		 * @hooked woocommerce_show_product_sale_flash - 10
		 * @hooked woocommerce_show_product_images - 20
		 */
		do_action( 'woocommerce_before_single_product_summary' );
		?>

	</div>

	<div class="summary entry-summary">

		<?php
		/**
		 * Hook: woocommerce_single_product_summary.
		 *
		 * @hooked woocommerce_template_single_title - 5
		 * @hooked woocommerce_template_single_rating - 10
		 * @hooked woocommerce_template_single_price - 10
		 * @hooked woocommerce_template_single_excerpt - 20
		 * @hooked woocommerce_template_single_add_to_cart - 30
		 * @hooked woocommerce_template_single_meta - 40
		 * @hooked woocommerce_template_single_sharing - 50
		 * @hooked WC_Structured_Data::generate_product_data() - 60
		 */
		do_action( 'woocommerce_single_product_summary' );
		?>

		<!-- PAGO SEGURO CARD -->
		<div class="secure-payment-card">
			<div class="card-icon">
				<i class="bi bi-shield-lock-fill"></i>
			</div>
			<h3>Pago 100% Seguro</h3>
			<p>Tus datos están protegidos con encriptación SSL</p>
		</div>

		<!-- SOPORTE CARD -->
		<div class="support-card">
			<div class="support-icon">
				<i class="bi bi-headset"></i>
			</div>
			<h3>¿Necesitas Ayuda?</h3>
			<p>Nuestro equipo de soporte premium está disponible 24/7</p>
			<div class="support-actions">
				<a href="tel:+5491112345678" class="support-btn">
					<i class="bi bi-telephone-fill"></i>
					+54 911 1234-5678
				</a>
				<a href="https://wa.me/5491112345678" target="_blank" class="support-btn support-btn-chat">
					<i class="bi bi-chat-dots-fill"></i>
					Chat en Vivo
				</a>
			</div>
		</div>

	</div>

</div>

<?php do_action( 'woocommerce_after_single_product' ); ?>
