<?php
/**
 *  Template Name: Preguntas Frecuentes
 **/

// Exit if accessed directly
defined('ABSPATH') || exit;

get_header();
?>

<!-- ============================================
         HERO SECTION V2
         ============================================ -->
    <section class="page-hero-v2">
        <div class="hero-circuit-pattern-v2"></div>
        <div class="hero-particles-v2"></div>
        <div class="scan-line-v2"></div>

        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="page-hero-content-v2">
                        <div class="hero-icon" data-aos="zoom-in">
                            <i class="bi bi-question-circle"></i>
                        </div>
                        <h1 class="page-hero-title-v2" data-aos="fade-up" data-aos-delay="100">
                            Preguntas Frecuentes
                        </h1>
                        <p class="page-hero-subtitle-v2" data-aos="fade-up" data-aos-delay="200">
                            Respondemos todas tus dudas sobre nuestros productos y servicios
                        </p>
                        <nav aria-label="breadcrumb" data-aos="fade-up" data-aos-delay="300">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="/">Inicio</a></li>
                                <li class="breadcrumb-item active">FAQ</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ============================================
         FAQ CATEGORIES
         ============================================ -->
    <section class="faq-categories-section py-4 bg-light">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <div class="faq-categories" data-aos="fade-up">
                        <a href="#compras" class="faq-category-link">
                            <i class="bi bi-cart3"></i>
                            <span>Compras</span>
                        </a>
                        <a href="#envios" class="faq-category-link">
                            <i class="bi bi-truck"></i>
                            <span>Envíos</span>
                        </a>
                        <a href="#pagos" class="faq-category-link">
                            <i class="bi bi-credit-card"></i>
                            <span>Pagos</span>
                        </a>
                        <a href="#garantias" class="faq-category-link">
                            <i class="bi bi-shield-check"></i>
                            <span>Garantías</span>
                        </a>
                        <a href="#cuenta" class="faq-category-link">
                            <i class="bi bi-person-circle"></i>
                            <span>Mi Cuenta</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ============================================
         FAQ CONTENT
         ============================================ -->
    <section class="faq-content-section py-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-10">

                    <!-- COMPRAS -->
                    <div id="compras" class="faq-category-block mb-5" data-aos="fade-up">
                        <h2 class="faq-category-title">
                            <i class="bi bi-cart3"></i>
                            Compras
                        </h2>
                        <div class="accordion" id="accordionCompras">
                            <div class="accordion-item">
                                <h3 class="accordion-header">
                                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#compra1">
                                        ¿Cómo realizo una compra?
                                    </button>
                                </h3>
                                <div id="compra1" class="accordion-collapse collapse show" data-bs-parent="#accordionCompras">
                                    <div class="accordion-body">
                                        Para realizar una compra, simplemente navegá por nuestro catálogo, agregá los productos que desees al carrito, y seguí el proceso de checkout. Deberás crear una cuenta o iniciar sesión, completar tus datos de envío y elegir el método de pago.
                                    </div>
                                </div>
                            </div>

                            <div class="accordion-item">
                                <h3 class="accordion-header">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#compra2">
                                        ¿Puedo modificar mi pedido después de comprarlo?
                                    </button>
                                </h3>
                                <div id="compra2" class="accordion-collapse collapse" data-bs-parent="#accordionCompras">
                                    <div class="accordion-body">
                                        Una vez confirmado el pedido, no es posible modificarlo. Sin embargo, podés contactarnos inmediatamente y haremos todo lo posible por ayudarte antes de que el pedido sea despachado.
                                    </div>
                                </div>
                            </div>

                            <div class="accordion-item">
                                <h3 class="accordion-header">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#compra3">
                                        ¿Los productos tienen stock real?
                                    </button>
                                </h3>
                                <div id="compra3" class="accordion-collapse collapse" data-bs-parent="#accordionCompras">
                                    <div class="accordion-body">
                                        Sí, todos los productos publicados en nuestro sitio tienen stock real actualizado. En el caso excepcional de que un producto se agote entre tu compra y la confirmación, te contactaremos inmediatamente para ofrecerte alternativas.
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- ENVÍOS -->
                    <div id="envios" class="faq-category-block mb-5" data-aos="fade-up" data-aos-delay="100">
                        <h2 class="faq-category-title">
                            <i class="bi bi-truck"></i>
                            Envíos
                        </h2>
                        <div class="accordion" id="accordionEnvios">
                            <div class="accordion-item">
                                <h3 class="accordion-header">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#envio1">
                                        ¿Cuánto tarda en llegar mi pedido?
                                    </button>
                                </h3>
                                <div id="envio1" class="accordion-collapse collapse" data-bs-parent="#accordionEnvios">
                                    <div class="accordion-body">
                                        Los tiempos de entrega varían según la zona: en CABA y GBA de 1 a 3 días hábiles, y en el interior del país de 3 a 7 días hábiles. Estos tiempos se cuentan desde la confirmación del pago.
                                    </div>
                                </div>
                            </div>

                            <div class="accordion-item">
                                <h3 class="accordion-header">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#envio2">
                                        ¿Cómo puedo rastrear mi pedido?
                                    </button>
                                </h3>
                                <div id="envio2" class="accordion-collapse collapse" data-bs-parent="#accordionEnvios">
                                    <div class="accordion-body">
                                        Una vez despachado tu pedido, recibirás un email con el código de seguimiento. Podés rastrearlo en la página del correo o usar nuestra herramienta de seguimiento ingresando tu número de pedido.
                                    </div>
                                </div>
                            </div>

                            <div class="accordion-item">
                                <h3 class="accordion-header">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#envio3">
                                        ¿Realizan envíos a todo el país?
                                    </button>
                                </h3>
                                <div id="envio3" class="accordion-collapse collapse" data-bs-parent="#accordionEnvios">
                                    <div class="accordion-body">
                                        Sí, realizamos envíos a todo el territorio argentino a través de empresas de correo confiables. El costo se calcula automáticamente según tu ubicación al momento del checkout.
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- PAGOS -->
                    <div id="pagos" class="faq-category-block mb-5" data-aos="fade-up" data-aos-delay="200">
                        <h2 class="faq-category-title">
                            <i class="bi bi-credit-card"></i>
                            Pagos
                        </h2>
                        <div class="accordion" id="accordionPagos">
                            <div class="accordion-item">
                                <h3 class="accordion-header">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#pago1">
                                        ¿Qué métodos de pago aceptan?
                                    </button>
                                </h3>
                                <div id="pago1" class="accordion-collapse collapse" data-bs-parent="#accordionPagos">
                                    <div class="accordion-body">
                                        Aceptamos tarjetas de crédito y débito (Visa, Mastercard, American Express), transferencia bancaria, y Mercado Pago. También ofrecemos planes de financiación en cuotas sin interés.
                                    </div>
                                </div>
                            </div>

                            <div class="accordion-item">
                                <h3 class="accordion-header">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#pago2">
                                        ¿Puedo pagar en cuotas?
                                    </button>
                                </h3>
                                <div id="pago2" class="accordion-collapse collapse" data-bs-parent="#accordionPagos">
                                    <div class="accordion-body">
                                        Sí, ofrecemos planes de financiación en 3, 6 y 12 cuotas sin interés con tarjetas seleccionadas. Las opciones de cuotas disponibles se muestran durante el proceso de pago.
                                    </div>
                                </div>
                            </div>

                            <div class="accordion-item">
                                <h3 class="accordion-header">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#pago3">
                                        ¿Es seguro comprar en este sitio?
                                    </button>
                                </h3>
                                <div id="pago3" class="accordion-collapse collapse" data-bs-parent="#accordionPagos">
                                    <div class="accordion-body">
                                        Absolutamente. Utilizamos certificados SSL para encriptar toda tu información. Además, trabajamos con plataformas de pago certificadas que cumplen con los más altos estándares de seguridad.
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- GARANTÍAS -->
                    <div id="garantias" class="faq-category-block mb-5" data-aos="fade-up" data-aos-delay="300">
                        <h2 class="faq-category-title">
                            <i class="bi bi-shield-check"></i>
                            Garantías y Devoluciones
                        </h2>
                        <div class="accordion" id="accordionGarantias">
                            <div class="accordion-item">
                                <h3 class="accordion-header">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#garantia1">
                                        ¿Los productos tienen garantía?
                                    </button>
                                </h3>
                                <div id="garantia1" class="accordion-collapse collapse" data-bs-parent="#accordionGarantias">
                                    <div class="accordion-body">
                                        Sí, todos nuestros productos cuentan con garantía oficial del fabricante. La duración varía según el producto (generalmente 6 meses a 2 años). Los detalles específicos de cada garantía están en la descripción del producto.
                                    </div>
                                </div>
                            </div>

                            <div class="accordion-item">
                                <h3 class="accordion-header">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#garantia2">
                                        ¿Puedo devolver un producto?
                                    </button>
                                </h3>
                                <div id="garantia2" class="accordion-collapse collapse" data-bs-parent="#accordionGarantias">
                                    <div class="accordion-body">
                                        Tenés 10 días corridos desde la recepción del producto para ejercer tu derecho de arrepentimiento. El producto debe estar sin uso, con su embalaje original y todos los accesorios.
                                    </div>
                                </div>
                            </div>

                            <div class="accordion-item">
                                <h3 class="accordion-header">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#garantia3">
                                        ¿Cómo hago efectiva la garantía?
                                    </button>
                                </h3>
                                <div id="garantia3" class="accordion-collapse collapse" data-bs-parent="#accordionGarantias">
                                    <div class="accordion-body">
                                        Contactanos a través de nuestros canales de atención con tu número de pedido y descripción del problema. Te guiaremos en el proceso y coordinaremos el servicio técnico correspondiente.
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- MI CUENTA -->
                    <div id="cuenta" class="faq-category-block mb-5" data-aos="fade-up" data-aos-delay="400">
                        <h2 class="faq-category-title">
                            <i class="bi bi-person-circle"></i>
                            Mi Cuenta
                        </h2>
                        <div class="accordion" id="accordionCuenta">
                            <div class="accordion-item">
                                <h3 class="accordion-header">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#cuenta1">
                                        ¿Necesito crear una cuenta para comprar?
                                    </button>
                                </h3>
                                <div id="cuenta1" class="accordion-collapse collapse" data-bs-parent="#accordionCuenta">
                                    <div class="accordion-body">
                                        Sí, necesitás crear una cuenta para realizar compras. Esto nos permite darte un mejor servicio, guardar tu historial de pedidos y ofrecerte promociones personalizadas.
                                    </div>
                                </div>
                            </div>

                            <div class="accordion-item">
                                <h3 class="accordion-header">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#cuenta2">
                                        ¿Olvidé mi contraseña, qué hago?
                                    </button>
                                </h3>
                                <div id="cuenta2" class="accordion-collapse collapse" data-bs-parent="#accordionCuenta">
                                    <div class="accordion-body">
                                        Hacé click en "¿Olvidaste tu contraseña?" en la página de inicio de sesión. Te enviaremos un email con instrucciones para restablecerla.
                                    </div>
                                </div>
                            </div>

                            <div class="accordion-item">
                                <h3 class="accordion-header">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#cuenta3">
                                        ¿Cómo veo el estado de mi pedido?
                                    </button>
                                </h3>
                                <div id="cuenta3" class="accordion-collapse collapse" data-bs-parent="#accordionCuenta">
                                    <div class="accordion-body">
                                        Iniciá sesión en tu cuenta y dirigite a "Mis Pedidos" en tu panel de usuario. Ahí podrás ver el estado actualizado de todas tus compras.
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- CONTACTO CTA -->
                    <div class="faq-contact-cta text-center" data-aos="fade-up" data-aos-delay="500">
                        <div class="cta-content">
                            <i class="bi bi-headset"></i>
                            <h3>¿No encontraste la respuesta que buscabas?</h3>
                            <p>Nuestro equipo está listo para ayudarte</p>
                            <a href="<?php echo get_permalink(get_page_by_path('contacto')); ?>" class="btn btn-lg btn-primary">
                                <i class="bi bi-chat-dots me-2"></i>Contactanos
                            </a>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>

<?php
get_footer();
