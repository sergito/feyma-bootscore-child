<?php
/**
 * My Account Dashboard - EPIC VERSION
 *
 * @package WooCommerce\Templates
 * @version 4.4.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

// Get customer data
$customer = wp_get_current_user();
$customer_orders = wc_get_orders( array(
    'customer' => get_current_user_id(),
    'limit' => 5,
) );
$total_orders = wc_get_customer_order_count( get_current_user_id() );
$total_spent = wc_get_customer_total_spent( get_current_user_id() );
?>

<!-- ============================================
     HERO HEADER MI CUENTA - SIMPLE
     ============================================ -->
<div class="mi-cuenta-hero-simple">
    <div class="hero-content">
        <div class="user-avatar">
            <?php echo get_avatar( get_current_user_id(), 60 ); ?>
        </div>
        <div class="user-info">
            <h1 class="hero-greeting">
                Hola, <span class="user-name"><?php echo esc_html( $customer->display_name ); ?></span>
            </h1>
            <p class="hero-subtitle">
                Bienvenido a tu panel de control
            </p>
        </div>
    </div>
</div>

<!-- ============================================
     STATS CARDS - SIMPLE
     ============================================ -->
<div class="mi-cuenta-stats-simple">
    <div class="row g-3 mb-4">
        <!-- Pedidos Totales -->
        <div class="col-lg-4 col-sm-6">
            <div class="stat-card-simple purple">
                <div class="stat-icon-simple">
                    <i class="bi bi-bag-check-fill"></i>
                </div>
                <div class="stat-content-simple">
                    <div class="stat-number-simple"><?php echo esc_html( $total_orders ); ?></div>
                    <div class="stat-label-simple">Pedidos</div>
                </div>
            </div>
        </div>

        <!-- Total Gastado -->
        <div class="col-lg-4 col-sm-6">
            <div class="stat-card-simple gold">
                <div class="stat-icon-simple">
                    <i class="bi bi-currency-dollar"></i>
                </div>
                <div class="stat-content-simple">
                    <div class="stat-number-simple"><?php echo wc_price( $total_spent ); ?></div>
                    <div class="stat-label-simple">Total Gastado</div>
                </div>
            </div>
        </div>

        <!-- Miembro Desde -->
        <div class="col-lg-4 col-sm-6">
            <div class="stat-card-simple blue">
                <div class="stat-icon-simple">
                    <i class="bi bi-calendar-check-fill"></i>
                </div>
                <div class="stat-content-simple">
                    <div class="stat-number-simple"><?php echo esc_html( date_i18n( 'Y', strtotime( $customer->user_registered ) ) ); ?></div>
                    <div class="stat-label-simple">Miembro Desde</div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- ============================================
     QUICK ACTIONS
     ============================================ -->
<div class="mi-cuenta-actions mb-5">
    <h2 class="section-title">Acciones Rápidas</h2>
    <div class="row g-3">
        <div class="col-lg-3 col-md-6">
            <a href="<?php echo esc_url( wc_get_endpoint_url( 'orders' ) ); ?>" class="action-card">
                <i class="bi bi-receipt"></i>
                <span>Mis Pedidos</span>
            </a>
        </div>
        <div class="col-lg-3 col-md-6">
            <a href="<?php echo esc_url( wc_get_endpoint_url( 'edit-address' ) ); ?>" class="action-card">
                <i class="bi bi-geo-alt"></i>
                <span>Direcciones</span>
            </a>
        </div>
        <div class="col-lg-3 col-md-6">
            <a href="<?php echo esc_url( wc_get_endpoint_url( 'edit-account' ) ); ?>" class="action-card">
                <i class="bi bi-person-circle"></i>
                <span>Mi Cuenta</span>
            </a>
        </div>
        <div class="col-lg-3 col-md-6">
            <a href="<?php echo esc_url( wc_get_page_permalink( 'shop' ) ); ?>" class="action-card">
                <i class="bi bi-shop"></i>
                <span>Seguir Comprando</span>
            </a>
        </div>
    </div>
</div>

<!-- ============================================
     ÚLTIMOS PEDIDOS
     ============================================ -->
<?php if ( $customer_orders ) : ?>
<div class="mi-cuenta-recent-orders">
    <h2 class="section-title">Últimas Compras</h2>
    <div class="row g-4">
        <?php foreach ( $customer_orders as $order ) : ?>
            <div class="col-lg-6">
                <div class="order-card-mini">
                    <div class="order-header">
                        <div class="order-number">
                            <i class="bi bi-hash"></i>
                            <?php echo esc_html( $order->get_order_number() ); ?>
                        </div>
                        <span class="order-status status-<?php echo esc_attr( $order->get_status() ); ?>">
                            <?php echo esc_html( wc_get_order_status_name( $order->get_status() ) ); ?>
                        </span>
                    </div>
                    <div class="order-info">
                        <div class="order-date">
                            <i class="bi bi-calendar3"></i>
                            <?php echo esc_html( wc_format_datetime( $order->get_date_created() ) ); ?>
                        </div>
                        <div class="order-total">
                            <strong><?php echo $order->get_formatted_order_total(); ?></strong>
                        </div>
                    </div>
                    <div class="order-footer">
                        <a href="<?php echo esc_url( $order->get_view_order_url() ); ?>" class="view-order-btn">
                            Ver Detalles <i class="bi bi-arrow-right"></i>
                        </a>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>

    <?php if ( $total_orders > 5 ) : ?>
    <div class="text-center mt-4">
        <a href="<?php echo esc_url( wc_get_endpoint_url( 'orders' ) ); ?>" class="btn-view-all">
            Ver Todos los Pedidos <i class="bi bi-arrow-right"></i>
        </a>
    </div>
    <?php endif; ?>
</div>
<?php else : ?>
<div class="mi-cuenta-empty-state">
    <div class="empty-icon">
        <i class="bi bi-cart-x"></i>
    </div>
    <h3>No has realizado ningún pedido aún</h3>
    <p>Explora nuestra tienda y encuentra los mejores productos en tecnología</p>
    <a href="<?php echo esc_url( wc_get_page_permalink( 'shop' ) ); ?>" class="btn-start-shopping">
        <i class="bi bi-shop"></i> Comenzar a Comprar
    </a>
</div>
<?php endif; ?>

<?php
/**
 * My Account dashboard.
 *
 * @since 2.6.0
 */
do_action( 'woocommerce_account_dashboard' );

/**
 * Deprecated woocommerce_before_my_account action.
 *
 * @deprecated 2.6.0
 */
do_action( 'woocommerce_before_my_account' );

/**
 * Deprecated woocommerce_after_my_account action.
 *
 * @deprecated 2.6.0
 */
do_action( 'woocommerce_after_my_account' );
