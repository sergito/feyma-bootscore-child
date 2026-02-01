<?php
/**
 * Checkout Form - FEYMA EPIC MULTI-STEP CHECKOUT
 *
 * @package WooCommerce\Templates
 * @version 9.4.0
 */

if (!defined('ABSPATH')) {
  exit;
}

do_action('woocommerce_before_checkout_form', $checkout);

// If checkout registration is disabled and not logged in, the user cannot checkout.
if (!$checkout->is_registration_enabled() && $checkout->is_registration_required() && !is_user_logged_in()) {
  echo esc_html(apply_filters('woocommerce_checkout_must_be_logged_in_message', __('Debes iniciar sesión para finalizar la compra.', 'woocommerce')));
  return;
}
?>

<div class="feyma-checkout-wrapper">

  <!-- Checkout Header Simple -->
  <div class="checkout-header-simple">
    <div class="container">
      <h1>Finalizar Compra</h1>
    </div>
  </div>

  <!-- Progress Indicator -->
  <div class="checkout-progress">
    <div class="container">
      <div class="progress-steps">
        <div class="progress-step active" data-step="1">
          <div class="step-circle">
            <i class="bi bi-envelope-fill"></i>
          </div>
          <span class="step-label">Email</span>
        </div>
        <div class="progress-line"></div>
        <div class="progress-step" data-step="2">
          <div class="step-circle">
            <i class="bi bi-person-fill"></i>
          </div>
          <span class="step-label">Datos</span>
        </div>
        <div class="progress-line"></div>
        <div class="progress-step" data-step="3">
          <div class="step-circle">
            <i class="bi bi-truck"></i>
          </div>
          <span class="step-label">Envío</span>
        </div>
        <div class="progress-line"></div>
        <div class="progress-step" data-step="4">
          <div class="step-circle">
            <i class="bi bi-credit-card-fill"></i>
          </div>
          <span class="step-label">Pago</span>
        </div>
      </div>
    </div>
  </div>

  <form name="checkout" method="post" class="checkout woocommerce-checkout feyma-checkout-form" action="<?php echo esc_url(wc_get_checkout_url()); ?>" enctype="multipart/form-data" aria-label="<?php echo esc_attr__('Checkout', 'woocommerce'); ?>">

    <div class="container">
      <div class="row">

        <!-- LEFT COLUMN - 60% -->
        <div class="col-lg-7 checkout-left">

          <?php if ($checkout->get_checkout_fields()) : ?>

            <!-- STEP 1: EMAIL -->
            <div class="checkout-step" id="step-1" data-step="1">
              <div class="step-header">
                <h2>
                  <i class="bi bi-envelope-fill me-2"></i>
                  Comenzá con tu email
                </h2>
                <p class="step-description">Ingresá tu email para continuar con la compra</p>
              </div>

              <div class="step-content">
                <div class="form-group-epic">
                  <label for="billing_email" class="form-label-epic">
                    Email <span class="required">*</span>
                  </label>
                  <div class="input-group-epic">
                    <i class="bi bi-envelope input-icon"></i>
                    <input
                      type="email"
                      class="form-control-epic"
                      name="billing_email"
                      id="billing_email"
                      placeholder="tu@email.com"
                      value="<?php echo esc_attr($checkout->get_value('billing_email')); ?>"
                      autocomplete="email"
                      required
                    />
                  </div>
                </div>

                <div class="trust-badges-checkout">
                  <div class="trust-badge-item">
                    <i class="bi bi-shield-check"></i>
                    <span>Compra 100% segura</span>
                  </div>
                  <div class="trust-badge-item">
                    <i class="bi bi-lock-fill"></i>
                    <span>Datos encriptados</span>
                  </div>
                </div>

                <button type="button" class="btn-next-step btn-epic btn-primary-epic" data-next="2">
                  Continuar con mis datos
                  <i class="bi bi-arrow-right ms-2"></i>
                </button>
              </div>
            </div>

            <!-- STEP 2: BILLING & SHIPPING INFO -->
            <div class="checkout-step checkout-step-hidden" id="step-2" data-step="2">
              <div class="step-header">
                <h2>
                  <i class="bi bi-person-fill me-2"></i>
                  Tus datos personales
                </h2>
                <p class="step-description">Completá tus datos para el envío</p>
              </div>

              <div class="step-content">

                <!-- Email Display (readonly) -->
                <div class="email-locked">
                  <i class="bi bi-envelope-check-fill"></i>
                  <span id="email-display"></span>
                  <button type="button" class="btn-change-email" data-back="1">
                    <i class="bi bi-pencil"></i>
                    Cambiar
                  </button>
                </div>

                <!-- Billing Fields -->
                <?php do_action('woocommerce_checkout_before_customer_details'); ?>

                <div class="billing-fields-wrapper">
                  <?php do_action('woocommerce_checkout_billing'); ?>
                </div>

                <!-- Shipping Fields -->
                <div class="shipping-fields-wrapper">
                  <?php do_action('woocommerce_checkout_shipping'); ?>
                </div>

                <?php do_action('woocommerce_checkout_after_customer_details'); ?>

                <div class="step-navigation">
                  <button type="button" class="btn-prev-step btn-epic btn-outline-epic" data-prev="1">
                    <i class="bi bi-arrow-left me-2"></i>
                    Volver
                  </button>
                  <button type="button" class="btn-next-step btn-epic btn-primary-epic" data-next="3">
                    Continuar al envío
                    <i class="bi bi-arrow-right ms-2"></i>
                  </button>
                </div>
              </div>
            </div>

            <!-- STEP 3: SHIPPING METHOD -->
            <div class="checkout-step checkout-step-hidden" id="step-3" data-step="3">
              <div class="step-header">
                <h2>
                  <i class="bi bi-truck me-2"></i>
                  Método de envío
                </h2>
                <p class="step-description">Elegí cómo querés recibir tu pedido</p>
              </div>

              <div class="step-content">
                <div id="shipping-methods-wrapper">
                  <!-- Shipping methods will be loaded here via AJAX -->
                  <div class="loading-shipping">
                    <div class="spinner-border text-primary" role="status">
                      <span class="visually-hidden">Cargando métodos de envío...</span>
                    </div>
                    <p>Cargando métodos de envío...</p>
                  </div>
                </div>

                <div class="step-navigation">
                  <button type="button" class="btn-prev-step btn-epic btn-outline-epic" data-prev="2">
                    <i class="bi bi-arrow-left me-2"></i>
                    Volver
                  </button>
                  <button type="button" class="btn-next-step btn-epic btn-primary-epic" data-next="4">
                    Continuar al pago
                    <i class="bi bi-arrow-right ms-2"></i>
                  </button>
                </div>
              </div>
            </div>

            <!-- STEP 4: PAYMENT METHOD -->
            <div class="checkout-step checkout-step-hidden" id="step-4" data-step="4">
              <div class="step-header">
                <h2>
                  <i class="bi bi-credit-card-fill me-2"></i>
                  Método de pago
                </h2>
                <p class="step-description">Elegí cómo querés pagar</p>
              </div>

              <div class="step-content">
                <div id="payment-methods-wrapper">
                  <?php do_action('woocommerce_checkout_before_order_review_heading'); ?>
                  <?php do_action('woocommerce_checkout_before_order_review'); ?>

                  <div id="payment">
                    <?php woocommerce_checkout_payment(); ?>
                  </div>

                  <?php do_action('woocommerce_checkout_after_order_review'); ?>
                </div>

                <div class="step-navigation">
                  <button type="button" class="btn-prev-step btn-epic btn-outline-epic" data-prev="3">
                    <i class="bi bi-arrow-left me-2"></i>
                    Volver
                  </button>
                </div>
              </div>
            </div>

          <?php endif; ?>

        </div>

        <!-- RIGHT COLUMN - 40% STICKY ORDER SUMMARY -->
        <div class="col-lg-5 checkout-right">
          <div class="order-summary-sticky">
            <div class="order-summary-header">
              <h3>
                <i class="bi bi-bag-check-fill me-2"></i>
                Resumen del pedido
              </h3>
              <span class="cart-count"><?php echo WC()->cart->get_cart_contents_count(); ?> productos</span>
            </div>

            <div id="order_review" class="woocommerce-checkout-review-order">
              <?php woocommerce_order_review(); ?>
            </div>
          </div>
        </div>

      </div>
    </div>

  </form>

</div>

<?php do_action('woocommerce_after_checkout_form', $checkout); ?>
