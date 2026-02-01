<?php
/**
 *  Template Name: Seguimiento de Pedidos
 **/

// Exit if accessed directly
defined('ABSPATH') || exit;

get_header();
?>

<!-- ============================================
         HERO SECTION ÉPICO
         ============================================ -->
    <section class="page-hero-epic">
        <!-- Circuit pattern animado -->
        <div class="hero-circuit-pattern"></div>
        <div class="hero-particles"></div>
        <div class="scan-line"></div>

        <!-- Nodos de conexión pulsantes -->
        <div class="circuit-nodes">
            <div class="circuit-node"></div>
            <div class="circuit-node"></div>
            <div class="circuit-node"></div>
            <div class="circuit-node"></div>
        </div>

        <!-- Data flow (líneas que viajan) -->
        <div class="data-flow data-flow-1"></div>
        <div class="data-flow data-flow-2"></div>

        <div class="container">
            <div class="row align-items-center min-vh-50">
                <div class="col-lg-12 text-center">
                    <div class="page-hero-content" data-aos="fade-up">
                        <div class="hero-icon mb-4" data-aos="zoom-in" data-aos-delay="100">
                            <i class="bi bi-box-seam"></i>
                        </div>
                        <h1 class="page-hero-title" data-aos="fade-up" data-aos-delay="200">
                            Seguimiento de Pedidos
                        </h1>
                        <p class="page-hero-subtitle" data-aos="fade-up" data-aos-delay="300">
                            Rastreá tu pedido en tiempo real
                        </p>
                        <nav aria-label="breadcrumb" data-aos="fade-up" data-aos-delay="400">
                            <ol class="breadcrumb justify-content-center">
                                <li class="breadcrumb-item"><a href="/">Inicio</a></li>
                                <li class="breadcrumb-item active">Seguimiento</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ============================================
         TRACKING FORM SECTION
         ============================================ -->
    <section class="tracking-form-section py-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">

                    <!-- Form Card -->
                    <div class="tracking-form-card" data-aos="fade-up">
                        <div class="text-center mb-4">
                            <i class="bi bi-search tracking-icon"></i>
                            <h2 class="section-title">Rastreá tu Pedido</h2>
                            <p class="section-subtitle">Ingresá tu número de pedido y email para ver el estado</p>
                        </div>

                        <form id="trackingForm" class="tracking-form">
                            <div class="row g-3">
                                <!-- Order Number -->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="order_id" class="form-label">
                                            <i class="bi bi-hash me-2"></i>Número de Pedido*
                                        </label>
                                        <input
                                            type="text"
                                            class="form-control"
                                            id="order_id"
                                            name="order_id"
                                            required
                                            placeholder="Ej: 12345">
                                        <small class="form-text">Podés encontrarlo en el email de confirmación</small>
                                    </div>
                                </div>

                                <!-- Email -->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="order_email" class="form-label">
                                            <i class="bi bi-envelope me-2"></i>Email*
                                        </label>
                                        <input
                                            type="email"
                                            class="form-control"
                                            id="order_email"
                                            name="order_email"
                                            required
                                            placeholder="tu@email.com">
                                        <small class="form-text">Email usado en la compra</small>
                                    </div>
                                </div>

                                <!-- Submit Button -->
                                <div class="col-12 text-center mt-4">
                                    <button type="submit" class="btn btn-primary btn-lg px-5">
                                        <span class="btn-text">
                                            <i class="bi bi-search me-2"></i>Rastrear Pedido
                                        </span>
                                        <span class="btn-spinner d-none">
                                            <span class="spinner-border spinner-border-sm me-2"></span>Buscando...
                                        </span>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>

                    <!-- Result Container -->
                    <div id="trackingResult" class="tracking-result mt-4" style="display: none;"></div>

                    <!-- Info Cards -->
                    <div class="row g-4 mt-5">
                        <div class="col-md-4" data-aos="fade-up" data-aos-delay="100">
                            <div class="tracking-info-card">
                                <i class="bi bi-clock-history"></i>
                                <h4>Actualizaciones en Tiempo Real</h4>
                                <p>Seguí el estado de tu pedido desde que sale de nuestro depósito hasta tu puerta</p>
                            </div>
                        </div>

                        <div class="col-md-4" data-aos="fade-up" data-aos-delay="200">
                            <div class="tracking-info-card">
                                <i class="bi bi-bell"></i>
                                <h4>Notificaciones</h4>
                                <p>Recibí actualizaciones por email en cada cambio de estado de tu pedido</p>
                            </div>
                        </div>

                        <div class="col-md-4" data-aos="fade-up" data-aos-delay="300">
                            <div class="tracking-info-card">
                                <i class="bi bi-headset"></i>
                                <h4>Soporte 24/7</h4>
                                <p>¿Tenés dudas? Nuestro equipo está disponible para ayudarte</p>
                            </div>
                        </div>
                    </div>

                    <!-- FAQ Tracking -->
                    <div class="tracking-faq mt-5" data-aos="fade-up">
                        <h3 class="mb-4 text-center">Preguntas Frecuentes sobre Envíos</h3>
                        <div class="accordion" id="trackingAccordion">
                            <div class="accordion-item">
                                <h4 class="accordion-header">
                                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#faq1">
                                        ¿Cuándo recibiré mi número de seguimiento?
                                    </button>
                                </h4>
                                <div id="faq1" class="accordion-collapse collapse show" data-bs-parent="#trackingAccordion">
                                    <div class="accordion-body">
                                        Recibirás tu número de seguimiento por email dentro de las 24-48 horas después de confirmar tu compra, cuando tu pedido sea despachado.
                                    </div>
                                </div>
                            </div>

                            <div class="accordion-item">
                                <h4 class="accordion-header">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq2">
                                        ¿Qué significan los estados del pedido?
                                    </button>
                                </h4>
                                <div id="faq2" class="accordion-collapse collapse" data-bs-parent="#trackingAccordion">
                                    <div class="accordion-body">
                                        <ul class="mb-0">
                                            <li><strong>Pendiente:</strong> Tu pedido está siendo procesado</li>
                                            <li><strong>Procesando:</strong> Estamos preparando tu pedido para el envío</li>
                                            <li><strong>En camino:</strong> Tu pedido ya fue despachado y está en tránsito</li>
                                            <li><strong>Completado:</strong> Tu pedido fue entregado exitosamente</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>

                            <div class="accordion-item">
                                <h4 class="accordion-header">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq3">
                                        Mi pedido no se actualiza, ¿qué hago?
                                    </button>
                                </h4>
                                <div id="faq3" class="accordion-collapse collapse" data-bs-parent="#trackingAccordion">
                                    <div class="accordion-body">
                                        Si tu pedido no se actualiza por más de 48 horas, contactanos a través de nuestros canales de atención. Estaremos encantados de revisar el estado y ayudarte.
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>

    <script>
    jQuery(document).ready(function($) {
        $('#trackingForm').on('submit', function(e) {
            e.preventDefault();

            const $form = $(this);
            const $submitBtn = $form.find('button[type="submit"]');
            const $btnText = $submitBtn.find('.btn-text');
            const $btnSpinner = $submitBtn.find('.btn-spinner');
            const $resultContainer = $('#trackingResult');

            const orderId = $('#order_id').val().trim();
            const orderEmail = $('#order_email').val().trim();

            // Validar
            if (!orderId || !orderEmail) {
                showError('Por favor completá todos los campos');
                return;
            }

            // Loading state
            $submitBtn.prop('disabled', true);
            $btnText.addClass('d-none');
            $btnSpinner.removeClass('d-none');
            $resultContainer.hide();

            // AJAX Request
            $.ajax({
                url: '<?php echo admin_url('admin-ajax.php'); ?>',
                type: 'POST',
                data: {
                    action: 'track_order',
                    order_id: orderId,
                    order_email: orderEmail
                },
                success: function(response) {
                    if (response.success) {
                        displayOrderInfo(response.data);
                    } else {
                        showError(response.data.message || 'No se encontró el pedido. Verificá los datos ingresados.');
                    }
                },
                error: function() {
                    showError('Error al buscar el pedido. Por favor intentá nuevamente.');
                },
                complete: function() {
                    $submitBtn.prop('disabled', false);
                    $btnText.removeClass('d-none');
                    $btnSpinner.addClass('d-none');
                }
            });
        });

        function displayOrderInfo(order) {
            const statusClass = getStatusClass(order.status);
            const statusText = getStatusText(order.status);
            const statusIcon = getStatusIcon(order.status);

            const html = `
                <div class="order-tracking-card">
                    <div class="order-header">
                        <div class="order-number">
                            <i class="bi bi-receipt"></i>
                            <span>Pedido #${order.order_id}</span>
                        </div>
                        <div class="order-status ${statusClass}">
                            <i class="bi ${statusIcon}"></i>
                            ${statusText}
                        </div>
                    </div>

                    <div class="order-progress">
                        <div class="progress-step ${order.progress >= 1 ? 'completed' : ''}">
                            <div class="step-icon"><i class="bi bi-check-circle"></i></div>
                            <div class="step-label">Confirmado</div>
                        </div>
                        <div class="progress-line ${order.progress >= 2 ? 'completed' : ''}"></div>
                        <div class="progress-step ${order.progress >= 2 ? 'completed' : ''}">
                            <div class="step-icon"><i class="bi bi-box-seam"></i></div>
                            <div class="step-label">Procesando</div>
                        </div>
                        <div class="progress-line ${order.progress >= 3 ? 'completed' : ''}"></div>
                        <div class="progress-step ${order.progress >= 3 ? 'completed' : ''}">
                            <div class="step-icon"><i class="bi bi-truck"></i></div>
                            <div class="step-label">En Camino</div>
                        </div>
                        <div class="progress-line ${order.progress >= 4 ? 'completed' : ''}"></div>
                        <div class="progress-step ${order.progress >= 4 ? 'completed' : ''}">
                            <div class="step-icon"><i class="bi bi-house-check"></i></div>
                            <div class="step-label">Entregado</div>
                        </div>
                    </div>

                    <div class="order-details">
                        <div class="detail-row">
                            <span class="detail-label"><i class="bi bi-calendar3"></i> Fecha de pedido:</span>
                            <span class="detail-value">${order.date}</span>
                        </div>
                        <div class="detail-row">
                            <span class="detail-label"><i class="bi bi-cash-stack"></i> Total:</span>
                            <span class="detail-value">${order.total}</span>
                        </div>
                        <div class="detail-row">
                            <span class="detail-label"><i class="bi bi-geo-alt"></i> Dirección de envío:</span>
                            <span class="detail-value">${order.shipping_address}</span>
                        </div>
                        ${order.tracking_number ? `
                        <div class="detail-row">
                            <span class="detail-label"><i class="bi bi-upc-scan"></i> Código de seguimiento:</span>
                            <span class="detail-value tracking-number">${order.tracking_number}</span>
                        </div>
                        ` : ''}
                    </div>

                    <div class="order-items">
                        <h4><i class="bi bi-bag-check"></i> Productos del Pedido</h4>
                        ${order.items}
                    </div>

                    <div class="order-actions">
                        <a href="<?php echo wc_get_page_permalink('myaccount'); ?>orders/" class="btn btn-outline-primary">
                            <i class="bi bi-list-ul me-2"></i>Ver Todos mis Pedidos
                        </a>
                        <a href="<?php echo get_permalink(get_page_by_path('contacto')); ?>" class="btn btn-outline-secondary">
                            <i class="bi bi-chat-dots me-2"></i>Contactar Soporte
                        </a>
                    </div>
                </div>
            `;

            $('#trackingResult').html(html).slideDown(400);
            $('html, body').animate({
                scrollTop: $('#trackingResult').offset().top - 100
            }, 600);
        }

        function showError(message) {
            const html = `
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <i class="bi bi-exclamation-triangle me-2"></i>
                    ${message}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            `;
            $('#trackingResult').html(html).slideDown(400);
        }

        function getStatusClass(status) {
            const classes = {
                'pending': 'status-pending',
                'processing': 'status-processing',
                'on-hold': 'status-on-hold',
                'completed': 'status-completed',
                'cancelled': 'status-cancelled',
                'refunded': 'status-refunded',
                'failed': 'status-failed'
            };
            return classes[status] || 'status-pending';
        }

        function getStatusText(status) {
            const texts = {
                'pending': 'Pendiente',
                'processing': 'Procesando',
                'on-hold': 'En Espera',
                'completed': 'Completado',
                'cancelled': 'Cancelado',
                'refunded': 'Reembolsado',
                'failed': 'Fallido'
            };
            return texts[status] || 'Pendiente';
        }

        function getStatusIcon(status) {
            const icons = {
                'pending': 'bi-clock',
                'processing': 'bi-box-seam',
                'on-hold': 'bi-pause-circle',
                'completed': 'bi-check-circle',
                'cancelled': 'bi-x-circle',
                'refunded': 'bi-arrow-counterclockwise',
                'failed': 'bi-exclamation-circle'
            };
            return icons[status] || 'bi-clock';
        }
    });
    </script>

<?php
get_footer();
