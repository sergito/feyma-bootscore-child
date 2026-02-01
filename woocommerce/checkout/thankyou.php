<?php
/**
 * Thankyou page - FEYMA EPIC ORDER RECEIVED PAGE
 *
 * @package WooCommerce\Templates
 * @version 8.1.0
 */

defined('ABSPATH') || exit;
?>

<div class="woocommerce-order feyma-order-received-page">

    <?php
    if ($order) :
        do_action('woocommerce_before_thankyou', $order->get_id());
    ?>

        <?php if ($order->has_status('failed')) : ?>

            <!-- ORDER FAILED -->
            <div class="failed-header">
                <div class="failed-icon">
                    <i class="bi bi-x-circle-fill"></i>
                </div>
                <h1>Hubo un problema con tu pedido</h1>
                <p>Lamentablemente no pudimos procesar tu pago. Por favor intentá nuevamente.</p>
            </div>

            <div class="alert alert-danger" role="alert">
                <i class="bi bi-exclamation-triangle-fill me-2"></i>
                <?php esc_html_e('Unfortunately your order cannot be processed as the originating bank/merchant has declined your transaction. Please attempt your purchase again.', 'woocommerce'); ?>
            </div>

            <p>
                <a href="<?php echo esc_url($order->get_checkout_payment_url()); ?>" class="btn btn-primary btn-epic">
                    <?php esc_html_e('Reintentar pago', 'woocommerce'); ?>
                </a>
            </p>

        <?php else : ?>

            <!-- SUCCESS HEADER -->
            <div class="success-header" data-aos="fade-down">
                <div class="success-icon">
                    <i class="bi bi-check-lg"></i>
                </div>
                <h1>¡Pedido Confirmado!</h1>
                <p>Tu compra se realizó con éxito. Te enviamos un email de confirmación a <strong><?php echo esc_html($order->get_billing_email()); ?></strong></p>
                <span class="order-number">Pedido #<?php echo $order->get_order_number(); ?></span>
            </div>

            <div class="row">

                <!-- LEFT COLUMN -->
                <div class="col-lg-8">

                    <!-- ORDER INFO -->
                    <div class="order-details-box" data-aos="fade-up" data-aos-delay="100">
                        <h2 class="box-title">
                            <i class="bi bi-info-circle"></i>
                            Información del Pedido
                        </h2>

                        <div class="detail-row">
                            <span class="detail-label">Número de Pedido:</span>
                            <span class="detail-value">#<?php echo $order->get_order_number(); ?></span>
                        </div>
                        <div class="detail-row">
                            <span class="detail-label">Fecha:</span>
                            <span class="detail-value"><?php echo wc_format_datetime($order->get_date_created()); ?></span>
                        </div>
                        <div class="detail-row">
                            <span class="detail-label">Email:</span>
                            <span class="detail-value"><?php echo esc_html($order->get_billing_email()); ?></span>
                        </div>
                        <div class="detail-row">
                            <span class="detail-label">Total:</span>
                            <span class="detail-value" style="color: var(--feyma-purple); font-size: 18px;"><?php echo $order->get_formatted_order_total(); ?></span>
                        </div>
                        <div class="detail-row">
                            <span class="detail-label">Método de Pago:</span>
                            <span class="detail-value"><?php echo esc_html($order->get_payment_method_title()); ?></span>
                        </div>

                        <?php if ($order->get_customer_note()) : ?>
                            <div class="detail-row">
                                <span class="detail-label">Nota:</span>
                                <span class="detail-value"><?php echo wp_kses_post(nl2br(wptexturize($order->get_customer_note()))); ?></span>
                            </div>
                        <?php endif; ?>
                    </div>

                    <!-- PRODUCTS ORDERED -->
                    <div class="order-details-box" data-aos="fade-up" data-aos-delay="200">
                        <h2 class="box-title">
                            <i class="bi bi-box-seam"></i>
                            Productos Ordenados
                        </h2>

                        <?php
                        $items = $order->get_items();
                        foreach ($items as $item_id => $item) :
                            $product = $item->get_product();
                            if (!$product) continue;

                            $thumbnail = $product->get_image('thumbnail');
                            $product_name = $item->get_name();
                            $quantity = $item->get_quantity();
                            $total = $order->get_formatted_line_subtotal($item);
                        ?>

                            <div class="order-product">
                                <div class="product-image">
                                    <?php echo $thumbnail; ?>
                                </div>
                                <div class="product-info">
                                    <h4><?php echo esc_html($product_name); ?></h4>

                                    <?php
                                    // Show variation attributes
                                    if ($item->get_variation_id()) {
                                        echo '<p class="variation-info">';
                                        $variation_data = $item->get_formatted_meta_data();
                                        foreach ($variation_data as $meta) {
                                            echo esc_html($meta->display_key) . ': ' . wp_kses_post($meta->display_value) . '<br>';
                                        }
                                        echo '</p>';
                                    }
                                    ?>

                                    <p><strong>Cantidad:</strong> <?php echo esc_html($quantity); ?></p>
                                </div>
                                <div class="product-price"><?php echo $total; ?></div>
                            </div>

                        <?php endforeach; ?>

                        <!-- ORDER TOTAL -->
                        <div class="order-total">
                            <div class="total-row">
                                <span>Subtotal:</span>
                                <span><?php echo $order->get_subtotal_to_display(); ?></span>
                            </div>

                            <?php if ($order->get_total_shipping() > 0) : ?>
                                <div class="total-row">
                                    <span>Envío:</span>
                                    <span><?php echo wc_price($order->get_total_shipping()); ?></span>
                                </div>
                            <?php else : ?>
                                <div class="total-row">
                                    <span>Envío:</span>
                                    <span style="color: var(--success); font-weight: 700;">GRATIS</span>
                                </div>
                            <?php endif; ?>

                            <?php if ($order->get_total_tax() > 0) : ?>
                                <div class="total-row">
                                    <span>Impuestos:</span>
                                    <span><?php echo wc_price($order->get_total_tax()); ?></span>
                                </div>
                            <?php endif; ?>

                            <?php if ($order->get_total_discount() > 0) : ?>
                                <div class="total-row">
                                    <span>Descuento:</span>
                                    <span style="color: var(--success);">-<?php echo wc_price($order->get_total_discount()); ?></span>
                                </div>
                            <?php endif; ?>

                            <div class="total-row final">
                                <span class="total-label">Total:</span>
                                <span class="total-value"><?php echo $order->get_formatted_order_total(); ?></span>
                            </div>
                        </div>
                    </div>

                    <!-- SHIPPING INFO -->
                    <?php if ($order->has_shipping_address()) : ?>
                        <div class="order-details-box" data-aos="fade-up" data-aos-delay="300">
                            <h2 class="box-title">
                                <i class="bi bi-truck"></i>
                                Información de Envío
                            </h2>

                            <div class="detail-row">
                                <span class="detail-label">Destinatario:</span>
                                <span class="detail-value"><?php echo esc_html($order->get_formatted_shipping_full_name()); ?></span>
                            </div>
                            <div class="detail-row">
                                <span class="detail-label">Dirección:</span>
                                <span class="detail-value"><?php echo esc_html($order->get_shipping_address_1()); ?></span>
                            </div>

                            <?php if ($order->get_shipping_address_2()) : ?>
                                <div class="detail-row">
                                    <span class="detail-label">Piso/Depto:</span>
                                    <span class="detail-value"><?php echo esc_html($order->get_shipping_address_2()); ?></span>
                                </div>
                            <?php endif; ?>

                            <div class="detail-row">
                                <span class="detail-label">Ciudad:</span>
                                <span class="detail-value"><?php echo esc_html($order->get_shipping_city()); ?>, <?php echo esc_html($order->get_shipping_state()); ?></span>
                            </div>
                            <div class="detail-row">
                                <span class="detail-label">Código Postal:</span>
                                <span class="detail-value"><?php echo esc_html($order->get_shipping_postcode()); ?></span>
                            </div>

                            <?php if ($order->get_billing_phone()) : ?>
                                <div class="detail-row">
                                    <span class="detail-label">Teléfono:</span>
                                    <span class="detail-value"><?php echo esc_html($order->get_billing_phone()); ?></span>
                                </div>
                            <?php endif; ?>

                            <?php
                            $shipping_method = $order->get_shipping_method();
                            if ($shipping_method) :
                            ?>
                                <div class="detail-row">
                                    <span class="detail-label">Método de Envío:</span>
                                    <span class="detail-value"><?php echo esc_html($shipping_method); ?></span>
                                </div>
                            <?php endif; ?>

                            <div class="info-box">
                                <h4><i class="bi bi-info-circle"></i> Tiempo estimado de entrega</h4>
                                <p>Tu pedido llegará en 3-5 días hábiles. Recibirás un email con el código de seguimiento una vez que se despache.</p>
                            </div>
                        </div>
                    <?php endif; ?>

                </div>

                <!-- RIGHT COLUMN -->
                <div class="col-lg-4">

                    <!-- NEXT STEPS -->
                    <div class="order-details-box" data-aos="fade-up" data-aos-delay="100">
                        <h2 class="box-title">
                            <i class="bi bi-list-check"></i>
                            Próximos Pasos
                        </h2>

                        <div class="timeline">
                            <div class="timeline-item">
                                <div class="timeline-icon">
                                    <i class="bi bi-check"></i>
                                </div>
                                <div class="timeline-content">
                                    <h5>Pedido Confirmado</h5>
                                    <p>Tu pedido fue confirmado y está siendo procesado</p>
                                </div>
                            </div>

                            <div class="timeline-item pending">
                                <div class="timeline-icon">
                                    <i class="bi bi-box-seam"></i>
                                </div>
                                <div class="timeline-content">
                                    <h5>Preparando Pedido</h5>
                                    <p>Estamos preparando tus productos</p>
                                </div>
                            </div>

                            <div class="timeline-item pending">
                                <div class="timeline-icon">
                                    <i class="bi bi-truck"></i>
                                </div>
                                <div class="timeline-content">
                                    <h5>En Camino</h5>
                                    <p>Tu pedido está en camino</p>
                                </div>
                            </div>

                            <div class="timeline-item pending">
                                <div class="timeline-icon">
                                    <i class="bi bi-house-check"></i>
                                </div>
                                <div class="timeline-content">
                                    <h5>Entregado</h5>
                                    <p>Tu pedido fue entregado</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- ACTION BUTTONS -->
                    <div class="action-buttons" data-aos="fade-up" data-aos-delay="200">
                        <?php if (is_user_logged_in()) : ?>
                            <a href="<?php echo esc_url(wc_get_account_endpoint_url('orders')); ?>" class="btn btn-primary btn-epic">
                                <i class="bi bi-person-circle"></i>
                                Ver Mis Pedidos
                            </a>
                        <?php endif; ?>

                        <a href="<?php echo esc_url(wc_get_page_permalink('shop')); ?>" class="btn btn-outline btn-epic">
                            <i class="bi bi-arrow-left"></i>
                            Seguir Comprando
                        </a>

                        <button onclick="window.print(); return false;" class="btn btn-outline btn-epic">
                            <i class="bi bi-printer"></i>
                            Imprimir Orden
                        </button>

                        <a href="<?php echo esc_url(get_permalink(get_option('woocommerce_myaccount_page_id'))); ?>" class="btn btn-outline btn-epic">
                            <i class="bi bi-headset"></i>
                            Contactar Soporte
                        </a>
                    </div>

                </div>

            </div>

        <?php endif; ?>

        <?php do_action('woocommerce_thankyou_' . $order->get_payment_method(), $order->get_id()); ?>
        <?php do_action('woocommerce_thankyou', $order->get_id()); ?>

    <?php else : ?>

        <!-- NO ORDER FOUND -->
        <div class="failed-header">
            <div class="failed-icon">
                <i class="bi bi-question-circle"></i>
            </div>
            <h1>Orden no encontrada</h1>
            <p>Lo sentimos, no pudimos encontrar esta orden.</p>
            <a href="<?php echo esc_url(wc_get_page_permalink('shop')); ?>" class="btn btn-primary btn-epic">
                Volver a la tienda
            </a>
        </div>

    <?php endif; ?>

</div>

<style>
    /* Include the same CSS from page-pedido-completado.php */
    <?php include(get_stylesheet_directory() . '/assets/scss/_thankyou-styles.php'); ?>
</style>
