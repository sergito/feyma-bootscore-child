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

		<!-- TRUST BADGES MODERNO -->
		<div class="trust-badges-single">
			<div class="trust-badge-item">
				<i class="bi bi-shield-check"></i>
				<span>Garantía oficial</span>
			</div>
			<div class="trust-badge-item">
				<i class="bi bi-credit-card"></i>
				<span>Pago seguro</span>
			</div>
			<div class="trust-badge-item">
				<i class="bi bi-truck"></i>
				<span>Envíos gratis a todo el país!</span>
			</div>
			<div class="trust-badge-item trust-badge-location">
				<i class="bi bi-geo-alt"></i>
				<div class="location-text">
					<strong>Retiralo en nuestras oficinas,</strong>
					<span>Av. del Libertador 6299,</span>
					<span>C1428ARF, CABA. De 10 a 17hs.</span>
				</div>
			</div>
		</div>

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

		<!-- SEPARADOR -->
		<div class="product-divider"></div>

		<!-- COMPARTIR SOCIAL -->
		<div class="product-share-modern">
			<span class="share-label">Compartir:</span>
			<div class="share-buttons">
				<a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo urlencode(get_permalink()); ?>"
				   target="_blank"
				   class="share-btn-circle"
				   aria-label="Compartir en Facebook">
					<i class="bi bi-facebook"></i>
				</a>
				<a href="https://twitter.com/intent/tweet?url=<?php echo urlencode(get_permalink()); ?>&text=<?php echo urlencode(get_the_title()); ?>"
				   target="_blank"
				   class="share-btn-circle"
				   aria-label="Compartir en X (Twitter)">
					<i class="bi bi-twitter-x"></i>
				</a>
				<a href="https://wa.me/?text=<?php echo urlencode(get_the_title() . ' ' . get_permalink()); ?>"
				   target="_blank"
				   class="share-btn-circle"
				   aria-label="Compartir en WhatsApp">
					<i class="bi bi-whatsapp"></i>
				</a>
				<button class="share-btn-circle copy-link-btn"
						data-url="<?php echo esc_url(get_permalink()); ?>"
						aria-label="Copiar enlace">
					<i class="bi bi-link-45deg"></i>
				</button>
			</div>
		</div>

		<!-- CONTACTO RÁPIDO -->
		<div class="quick-contact">
			<span class="contact-label">¿Alguna duda?</span>
			<div class="contact-buttons">
				<a href="mailto:info@feyma.com.ar" class="contact-btn contact-btn-email">
					<i class="bi bi-envelope-fill"></i>
				</a>
				<a href="https://wa.me/5491112345678" target="_blank" class="contact-btn contact-btn-whatsapp">
					<i class="bi bi-whatsapp"></i>
				</a>
			</div>
		</div>

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
