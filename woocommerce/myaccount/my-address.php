<?php
/**
 * My Addresses - FEYMA ENHANCED
 *
 * @package WooCommerce\Templates
 * @version 9.3.0
 */

defined( 'ABSPATH' ) || exit;

$customer_id = get_current_user_id();

if ( ! wc_ship_to_billing_address_only() && wc_shipping_enabled() ) {
	$get_addresses = apply_filters(
		'woocommerce_my_account_get_addresses',
		array(
			'billing'  => __( 'Dirección de Facturación', 'woocommerce' ),
			'shipping' => __( 'Dirección de Envío', 'woocommerce' ),
		),
		$customer_id
	);
} else {
	$get_addresses = apply_filters(
		'woocommerce_my_account_get_addresses',
		array(
			'billing' => __( 'Dirección de Facturación', 'woocommerce' ),
		),
		$customer_id
	);
}
?>

<div class="addresses-wrapper">
	<!-- Header -->
	<div class="addresses-header">
		<div class="addresses-title">
			<h2><i class="bi bi-geo-alt"></i> Mis Direcciones</h2>
			<p>Estas direcciones se utilizarán por defecto en el checkout</p>
		</div>
	</div>

	<!-- Address Cards -->
	<div class="row g-4">
		<?php foreach ( $get_addresses as $name => $address_title ) : ?>
			<?php
				$address = wc_get_account_formatted_address( $name );
				$icon = ( 'billing' === $name ) ? 'bi-receipt-cutoff' : 'bi-truck';
				$color_class = ( 'billing' === $name ) ? 'purple' : 'gold';
			?>

			<div class="col-lg-6">
				<div class="address-card <?php echo esc_attr( $color_class ); ?>">
					<div class="address-card-header">
						<div class="address-icon">
							<i class="bi <?php echo esc_attr( $icon ); ?>"></i>
						</div>
						<div class="address-card-title">
							<h3><?php echo esc_html( $address_title ); ?></h3>
						</div>
					</div>

					<div class="address-card-body">
						<?php if ( $address ) : ?>
							<address><?php echo wp_kses_post( $address ); ?></address>
						<?php else : ?>
							<div class="address-empty">
								<i class="bi bi-plus-circle"></i>
								<p>No has configurado esta dirección aún</p>
							</div>
						<?php endif; ?>
					</div>

					<div class="address-card-footer">
						<a href="<?php echo esc_url( wc_get_endpoint_url( 'edit-address', $name ) ); ?>" class="btn-edit-address">
							<i class="bi bi-pencil-square"></i>
							<?php echo $address ? 'Editar Dirección' : 'Agregar Dirección'; ?>
						</a>
					</div>

					<?php do_action( 'woocommerce_my_account_after_my_address', $name ); ?>
				</div>
			</div>

		<?php endforeach; ?>
	</div>
</div>
