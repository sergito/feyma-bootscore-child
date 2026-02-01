<?php
/**
 * Variable product add to cart - FEYMA CUSTOM
 * Botones de radio en lugar de combobox para mejor UX
 *
 * @see https://woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 6.1.0
 */

defined( 'ABSPATH' ) || exit;

global $product;

$attribute_keys  = array_keys( $attributes );
$variations_json = wp_json_encode( $available_variations );
$variations_attr = function_exists( 'wc_esc_json' ) ? wc_esc_json( $variations_json ) : _wp_specialchars( $variations_json, ENT_QUOTES, 'UTF-8', true );

do_action( 'woocommerce_before_add_to_cart_form' ); ?>

<form class="variations_form cart" action="<?php echo esc_url( apply_filters( 'woocommerce_add_to_cart_form_action', $product->get_permalink() ) ); ?>" method="post" enctype='multipart/form-data' data-product_id="<?php echo absint( $product->get_id() ); ?>" data-product_variations="<?php echo $variations_attr; // WPCS: XSS ok. ?>">
	<?php do_action( 'woocommerce_before_variations_form' ); ?>

	<?php if ( empty( $available_variations ) && false !== $available_variations ) : ?>
		<p class="stock out-of-stock"><?php echo esc_html( apply_filters( 'woocommerce_out_of_stock_message', __( 'This product is currently out of stock and unavailable.', 'woocommerce' ) ) ); ?></p>
	<?php else : ?>

		<!-- CONFIGURACIÓN DE VARIACIONES CON BOTONES -->
		<div class="product-configuration">
			<h3 class="configuration-title">
				<i class="bi bi-sliders"></i>
				Elegí tu configuración
			</h3>

			<table class="variations" cellspacing="0">
				<tbody>
					<?php foreach ( $attributes as $attribute_name => $options ) : ?>
						<tr>
							<td class="label">
								<label for="<?php echo esc_attr( sanitize_title( $attribute_name ) ); ?>">
									<?php echo wc_attribute_label( $attribute_name ); // WPCS: XSS ok. ?>
								</label>
							</td>
							<td class="value">
								<?php
									wc_dropdown_variation_attribute_options(
										array(
											'options'   => $options,
											'attribute' => $attribute_name,
											'product'   => $product,
										)
									);

									// Obtener el valor seleccionado (por defecto o de la URL)
									$selected = isset( $_REQUEST[ 'attribute_' . sanitize_title( $attribute_name ) ] )
										? wc_clean( wp_unslash( $_REQUEST[ 'attribute_' . sanitize_title( $attribute_name ) ] ) )
										: $product->get_variation_default_attribute( $attribute_name );

									// Obtener información de precios de variaciones para cada opción
									$variation_prices = array();
									$min_price = $product->get_variation_price( 'min', true );

									foreach ( $available_variations as $variation ) {
										$variation_obj = wc_get_product( $variation['variation_id'] );
										if ( ! $variation_obj ) continue;

										$variation_attributes = $variation['attributes'];
										$attr_key = 'attribute_' . sanitize_title( $attribute_name );

										if ( isset( $variation_attributes[$attr_key] ) ) {
											$attr_value = $variation_attributes[$attr_key];
											$variation_price = $variation_obj->get_price();
											$price_diff = $variation_price - $min_price;
											$variation_prices[$attr_value] = $price_diff;
										}
									}

									// Renderizar botones personalizados
									$attribute_class = sanitize_title( $attribute_name );
									$is_color = ( strpos( strtolower( $attribute_name ), 'color' ) !== false ||
												  strpos( strtolower( $attribute_name ), 'colour' ) !== false );
									?>

									<div class="variation-buttons-wrapper <?php echo $is_color ? 'color-variation' : ''; ?>"
										 data-attribute="<?php echo esc_attr( sanitize_title( $attribute_name ) ); ?>">

										<?php foreach ( $options as $option ) :
											$price_diff = isset( $variation_prices[$option] ) ? $variation_prices[$option] : 0;
											$is_default = ( $selected === $option );
											$recommended = ( $price_diff === 0 && count( $options ) > 1 ); // Primera opción sin cargo extra
											?>

											<div class="variation-option <?php echo $is_color ? 'variation-color' : ''; ?> <?php echo $is_default ? 'active' : ''; ?>"
												 data-value="<?php echo esc_attr( $option ); ?>"
												 data-price-diff="<?php echo $price_diff; ?>">

												<?php if ( $recommended ) : ?>
													<span class="recommended-badge">RECOMENDADO</span>
												<?php endif; ?>

												<?php if ( $is_color ) : ?>
													<!-- Opción de color con círculo -->
													<span class="color-circle" style="background-color: <?php echo esc_attr( $option ); ?>;"></span>
													<span class="color-name"><?php echo esc_html( $option ); ?></span>
												<?php else : ?>
													<!-- Opción regular -->
													<span class="option-label"><?php echo esc_html( $option ); ?></span>
													<span class="option-price">
														<?php if ( $price_diff === 0 ) : ?>
															<span class="included-text">Incluido</span>
															<i class="bi bi-check-circle-fill included-icon"></i>
														<?php elseif ( $price_diff > 0 ) : ?>
															+ <?php echo wc_price( $price_diff ); ?>
														<?php else : ?>
															<?php echo wc_price( $price_diff ); ?>
														<?php endif; ?>
													</span>
												<?php endif; ?>
											</div>

										<?php endforeach; ?>

									</div>

									<?php
									echo end( $attribute_keys ) === $attribute_name ? wp_kses_post( apply_filters( 'woocommerce_reset_variations_link', '<a class="reset_variations" href="#">' . esc_html__( 'Clear', 'woocommerce' ) . '</a>' ) ) : '';
								?>
							</td>
						</tr>
					<?php endforeach; ?>
				</tbody>
			</table>

			<?php do_action( 'woocommerce_after_variations_table' ); ?>

			<div class="single_variation_wrap">
				<?php
					/**
					 * Hook: woocommerce_before_single_variation.
					 */
					do_action( 'woocommerce_before_single_variation' );

					/**
					 * Hook: woocommerce_single_variation. Used to output the cart button and placeholder for variation data.
					 *
					 * @since 2.4.0
					 * @hooked woocommerce_single_variation - 10 Empty div for variation data.
					 * @hooked woocommerce_single_variation_add_to_cart_button - 20 Qty and cart button.
					 */
					do_action( 'woocommerce_single_variation' );

					/**
					 * Hook: woocommerce_after_single_variation.
					 */
					do_action( 'woocommerce_after_single_variation' );
				?>
			</div>
		</div>

	<?php endif; ?>

	<?php do_action( 'woocommerce_after_variations_form' ); ?>
</form>

<?php
do_action( 'woocommerce_after_add_to_cart_form' );
