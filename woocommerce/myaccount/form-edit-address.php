<?php
/**
 * Edit address form - FEYMA ENHANCED
 *
 * @package WooCommerce\Templates
 * @version 9.3.0
 */

defined( 'ABSPATH' ) || exit;

$page_title = ( 'billing' === $load_address ) ? esc_html__( 'Dirección de Facturación', 'woocommerce' ) : esc_html__( 'Dirección de Envío', 'woocommerce' );
$icon = ( 'billing' === $load_address ) ? 'bi-receipt-cutoff' : 'bi-truck';

do_action( 'woocommerce_before_edit_account_address_form' ); ?>

<?php if ( ! $load_address ) : ?>
	<?php wc_get_template( 'myaccount/my-address.php' ); ?>
<?php else : ?>

	<div class="edit-address-wrapper">
		<!-- Header -->
		<div class="edit-address-header">
			<div class="address-icon">
				<i class="bi <?php echo esc_attr( $icon ); ?>"></i>
			</div>
			<h2><?php echo apply_filters( 'woocommerce_my_account_edit_address_title', $page_title, $load_address ); ?></h2>
			<p class="address-subtitle">Actualizá tu información de <?php echo ( 'billing' === $load_address ) ? 'facturación' : 'envío'; ?></p>
		</div>

		<!-- Form -->
		<form method="post" novalidate class="edit-address-form">

			<div class="woocommerce-address-fields">
				<?php do_action( "woocommerce_before_edit_address_form_{$load_address}" ); ?>

				<div class="woocommerce-address-fields__field-wrapper">
					<?php
					foreach ( $address as $key => $field ) {
						woocommerce_form_field( $key, $field, wc_get_post_data_by_key( $key, $field['value'] ) );
					}
					?>
				</div>

				<?php do_action( "woocommerce_after_edit_address_form_{$load_address}" ); ?>

				<div class="form-actions">
					<button type="submit" class="btn btn-primary-feyma btn-lg" name="save_address" value="<?php esc_attr_e( 'Save address', 'woocommerce' ); ?>">
						<i class="bi bi-check-circle"></i>
						<?php esc_html_e( 'Guardar Dirección', 'woocommerce' ); ?>
					</button>
					<a href="<?php echo esc_url( wc_get_endpoint_url( 'edit-address' ) ); ?>" class="btn btn-outline-secondary">
						<i class="bi bi-x-circle"></i>
						Cancelar
					</a>
					<?php wp_nonce_field( 'woocommerce-edit_address', 'woocommerce-edit-address-nonce' ); ?>
					<input type="hidden" name="action" value="edit_address" />
				</div>
			</div>

		</form>
	</div>

<?php endif; ?>

<?php do_action( 'woocommerce_after_edit_account_address_form' ); ?>
