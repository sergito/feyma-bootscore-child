<?php
/**
 *  Template Name: Pedido Completado
 **/
 
// Exit if accessed directly
defined('ABSPATH') || exit;

get_header();
?>
<style>
 
       

        /* Order Received */
        .order-received-page {
            padding: 60px 0 80px;
        }

        .success-header {
            text-align: center;
            margin-bottom: 50px;
            animation: fadeInDown 0.6s ease;
        }

        .success-icon {
            width: 100px;
            height: 100px;
            background: var(--success);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 24px;
            animation: scaleIn 0.6s cubic-bezier(0.68, -0.55, 0.265, 1.55);
        }

        .success-icon i {
            font-size: 50px;
            color: white;
        }

        .success-header h1 {
            font-size: 36px;
            font-weight: 800;
            color: var(--dark);
            margin-bottom: 12px;
        }

        .success-header p {
            font-size: 18px;
            color: var(--gray);
        }

        .order-number {
            display: inline-block;
            padding: 6px 16px;
            background: rgba(61, 49, 128, 0.1);
            color: var(--feyma-purple);
            border-radius: 20px;
            font-weight: 700;
            margin-top: 12px;
        }

        .order-details-box {
            background: white;
            border-radius: 16px;
            box-shadow: var(--shadow-md);
            padding: 30px;
            margin-bottom: 24px;
        }

        .box-title {
            font-size: 20px;
            font-weight: 700;
            color: var(--dark);
            margin-bottom: 24px;
            padding-bottom: 16px;
            border-bottom: 2px solid var(--gray-lighter);
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .box-title i {
            font-size: 24px;
            color: var(--feyma-purple);
        }

        .detail-row {
            display: flex;
            justify-content: space-between;
            padding: 12px 0;
            border-bottom: 1px solid var(--gray-lighter);
        }

        .detail-label {
            color: var(--gray-dark);
            font-weight: 500;
        }

        .detail-value {
            font-weight: 600;
            color: var(--dark);
        }

        .order-product {
            display: flex;
            gap: 16px;
            padding: 20px 0;
            border-bottom: 1px solid var(--gray-lighter);
        }

        .order-product:last-child {
            border-bottom: none;
        }

        .product-image {
            width: 80px;
            height: 80px;
            background: var(--gray-lighter);
            border-radius: 12px;
            overflow: hidden;
            flex-shrink: 0;
        }

        .product-image img {
            width: 100%;
            height: 100%;
            object-fit: contain;
        }

        .product-info h4 {
            font-size: 16px;
            font-weight: 600;
            margin-bottom: 4px;
        }

        .product-info p {
            font-size: 13px;
            color: var(--gray);
            margin: 0;
        }

        .product-price {
            font-size: 18px;
            font-weight: 700;
            color: var(--feyma-purple);
            margin-left: auto;
        }

        .order-total {
            background: var(--gray-lighter);
            padding: 20px;
            border-radius: 12px;
            margin-top: 20px;
        }

        .total-row {
            display: flex;
            justify-content: space-between;
            padding: 8px 0;
            font-size: 16px;
        }

        .total-row.final {
            padding-top: 16px;
            margin-top: 16px;
            border-top: 2px solid var(--feyma-purple);
        }

        .total-row.final .total-label {
            font-size: 20px;
            font-weight: 700;
        }

        .total-row.final .total-value {
            font-size: 24px;
            font-weight: 900;
            color: var(--feyma-purple);
        }

        .action-buttons {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 16px;
            margin-top: 30px;
        }

        .btn {
            border-radius: 10px;
            font-weight: 600;
            padding: 14px 24px;
            transition: all 0.3s ease;
            text-decoration: none;
            text-align: center;
        }

        .btn-primary {
            background: var(--feyma-purple);
            border: none;
            color: white;
        }

        .btn-primary:hover {
            background: var(--feyma-purple-dark);
            transform: translateY(-2px);
            color: white;
        }

        .btn-outline {
            border: 2px solid var(--gray-light);
            background: white;
            color: var(--dark);
        }

        .btn-outline:hover {
            border-color: var(--feyma-purple);
            color: var(--feyma-purple);
        }

        .info-box {
            background: rgba(59, 130, 246, 0.1);
            border-left: 4px solid var(--info);
            padding: 20px;
            border-radius: 8px;
            margin-top: 24px;
        }

        .info-box h4 {
            font-size: 16px;
            font-weight: 700;
            color: var(--dark);
            margin-bottom: 8px;
        }

        .info-box p {
            font-size: 14px;
            color: var(--gray-dark);
            margin: 0;
        }

        .timeline {
            margin-top: 30px;
        }

        .timeline-item {
            display: flex;
            gap: 16px;
            padding: 16px 0;
            position: relative;
        }

        .timeline-item::before {
            content: '';
            position: absolute;
            left: 19px;
            top: 50px;
            width: 2px;
            height: calc(100% - 40px);
            background: var(--gray-light);
        }

        .timeline-item:last-child::before {
            display: none;
        }

        .timeline-icon {
            width: 40px;
            height: 40px;
            background: var(--feyma-purple);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            flex-shrink: 0;
        }

        .timeline-item.pending .timeline-icon {
            background: var(--gray-light);
            color: var(--gray);
        }

        .timeline-content h5 {
            font-size: 16px;
            font-weight: 700;
            margin-bottom: 4px;
        }

        .timeline-content p {
            font-size: 14px;
            color: var(--gray);
            margin: 0;
        }

        /* Footer */
        .site-footer {
            background: var(--dark);
            color: rgba(255, 255, 255, 0.8);
            padding: 40px 0 20px;
            margin-top: 80px;
        }

        .footer-bottom {
            text-align: center;
            padding: 20px 0;
            border-top: 1px solid rgba(255, 255, 255, 0.1);
            margin-top: 30px;
            font-size: 14px;
        }

        @keyframes fadeInDown {
            from {
                opacity: 0;
                transform: translateY(-30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes scaleIn {
            from {
                transform: scale(0);
            }
            to {
                transform: scale(1);
            }
        }

        @media (max-width: 767px) {
            .success-header h1 {
                font-size: 28px;
            }

            .order-product {
                flex-direction: column;
            }

            .product-price {
                margin-left: 0;
            }
        }
    </style>
  <div id="content" class="site-content <?= apply_filters('bootscore/class/container', 'container', 'page'); ?> <?= apply_filters('bootscore/class/content/spacer', 'pt-4 pb-5', 'page'); ?>">
    <div id="primary" class="content-area">
      
      <?php do_action( 'bootscore_after_primary_open', 'page' ); ?>

  <!-- ORDER RECEIVED PAGE -->
<div class="order-received-page">
    <div class="container">

        <!-- SUCCESS HEADER -->
        <div class="success-header">
            <div class="success-icon">
                <i class="bi bi-check-lg"></i>
            </div>
            <h1>¡Pedido Confirmado!</h1>
            <p>Tu compra se realizó con éxito. Te enviamos un email de confirmación.</p>
            <span class="order-number">Pedido #18945</span>
        </div>

        <div class="row">
            
            <!-- LEFT COLUMN -->
            <div class="col-lg-8">
                
                <!-- ORDER INFO -->
                <div class="order-details-box">
                    <h2 class="box-title">
                        <i class="bi bi-info-circle"></i>
                        Información del Pedido
                    </h2>

                    <div class="detail-row">
                        <span class="detail-label">Número de Pedido:</span>
                        <span class="detail-value">#18945</span>
                    </div>
                    <div class="detail-row">
                        <span class="detail-label">Fecha:</span>
                        <span class="detail-value">27 de Diciembre, 2024</span>
                    </div>
                    <div class="detail-row">
                        <span class="detail-label">Email:</span>
                        <span class="detail-value">cliente@email.com</span>
                    </div>
                    <div class="detail-row">
                        <span class="detail-label">Total:</span>
                        <span class="detail-value" style="color: var(--feyma-purple); font-size: 18px;">$2.639.900</span>
                    </div>
                    <div class="detail-row">
                        <span class="detail-label">Método de Pago:</span>
                        <span class="detail-value">Transferencia Bancaria</span>
                    </div>
                </div>

                <!-- PRODUCTS ORDERED -->
                <div class="order-details-box">
                    <h2 class="box-title">
                        <i class="bi bi-box-seam"></i>
                        Productos Ordenados
                    </h2>

                    <div class="order-product">
                        <div class="product-image">
                            <img src="https://placehold.co/200x200/3d3180/FFFFFF?text=Laptop" alt="Laptop">
                        </div>
                        <div class="product-info">
                            <h4>Laptop Gaming ROG Strix G15</h4>
                            <p>RAM: 16GB | Storage: 1TB SSD</p>
                            <p><strong>Cantidad:</strong> 1</p>
                        </div>
                        <div class="product-price">$2.425.000</div>
                    </div>

                    <div class="order-product">
                        <div class="product-image">
                            <img src="https://placehold.co/200x200/3d3180/FFFFFF?text=Mouse" alt="Mouse">
                        </div>
                        <div class="product-info">
                            <h4>Mouse Logitech G502 HERO</h4>
                            <p>Color: Negro | DPI: 25.600</p>
                            <p><strong>Cantidad:</strong> 1</p>
                        </div>
                        <div class="product-price">$89.900</div>
                    </div>

                    <div class="order-product">
                        <div class="product-image">
                            <img src="https://placehold.co/200x200/3d3180/FFFFFF?text=Teclado" alt="Teclado">
                        </div>
                        <div class="product-info">
                            <h4>Teclado Mecánico HyperX Alloy Origins</h4>
                            <p>Switch: Red | RGB: Sí</p>
                            <p><strong>Cantidad:</strong> 1</p>
                        </div>
                        <div class="product-price">$125.000</div>
                    </div>

                    <div class="order-total">
                        <div class="total-row">
                            <span>Subtotal:</span>
                            <span>$2.639.900</span>
                        </div>
                        <div class="total-row">
                            <span>Envío:</span>
                            <span style="color: var(--success); font-weight: 700;">GRATIS</span>
                        </div>
                        <div class="total-row final">
                            <span class="total-label">Total:</span>
                            <span class="total-value">$2.639.900</span>
                        </div>
                    </div>
                </div>

                <!-- SHIPPING INFO -->
                <div class="order-details-box">
                    <h2 class="box-title">
                        <i class="bi bi-truck"></i>
                        Información de Envío
                    </h2>

                    <div class="detail-row">
                        <span class="detail-label">Destinatario:</span>
                        <span class="detail-value">Juan Pérez</span>
                    </div>
                    <div class="detail-row">
                        <span class="detail-label">Dirección:</span>
                        <span class="detail-value">Av. Corrientes 1234, Piso 5 Dpto B</span>
                    </div>
                    <div class="detail-row">
                        <span class="detail-label">Ciudad:</span>
                        <span class="detail-value">Buenos Aires, CABA</span>
                    </div>
                    <div class="detail-row">
                        <span class="detail-label">Código Postal:</span>
                        <span class="detail-value">C1043</span>
                    </div>
                    <div class="detail-row">
                        <span class="detail-label">Teléfono:</span>
                        <span class="detail-value">+54 911 1234-5678</span>
                    </div>
                    <div class="detail-row">
                        <span class="detail-label">Método de Envío:</span>
                        <span class="detail-value">Andreani - Envío Gratis</span>
                    </div>

                    <div class="info-box">
                        <h4><i class="bi bi-info-circle"></i> Tiempo estimado de entrega</h4>
                        <p>Tu pedido llegará en 3-5 días hábiles. Recibirás un email con el código de seguimiento una vez que se despache.</p>
                    </div>
                </div>

            </div>

            <!-- RIGHT COLUMN -->
            <div class="col-lg-4">
                
                <!-- NEXT STEPS -->
                <div class="order-details-box">
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
                <div class="action-buttons">
                    <a href="my-account.html" class="btn btn-primary">
                        <i class="bi bi-person-circle"></i>
                        Ver Mi Cuenta
                    </a>
                    <a href="shop.html" class="btn btn-outline">
                        <i class="bi bi-arrow-left"></i>
                        Seguir Comprando
                    </a>
                    <a href="#" class="btn btn-outline" onclick="window.print(); return false;">
                        <i class="bi bi-printer"></i>
                        Imprimir Orden
                    </a>
                    <a href="#" class="btn btn-outline">
                        <i class="bi bi-headset"></i>
                        Contactar Soporte
                    </a>
                </div>

            </div>

        </div>

    </div>
</div>

    </div>
  </div>

<?php
get_footer();
