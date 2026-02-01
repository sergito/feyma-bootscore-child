<?php
/**
 *  Template Name: políticas
 **/
 
// Exit if accessed directly
defined('ABSPATH') || exit;

get_header();
?>

<!-- ============================================
         HERO SECTION
         ============================================ -->
    <section class="page-hero">
        <div class="hero-circuit-bg"></div>
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-12 text-center">
                    <h1 class="hero-title" data-aos="fade-up">Política de cambios y devoluciones</h1>
                    <p class="hero-subtitle" data-aos="fade-up" data-aos-delay="100">
                        Tu tranquilidad es nuestra prioridad
                    </p>
                    <nav aria-label="breadcrumb" data-aos="fade-up" data-aos-delay="200">
                        <ol class="breadcrumb justify-content-center">
                            <li class="breadcrumb-item"><a href="/">Inicio</a></li>
                            <li class="breadcrumb-item active">Políticas</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </section>

    <!-- ============================================
         POLICIES SECTION
         ============================================ -->
    <section class="policies-section py-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-10">
                    
                    <!-- Intro -->
                    <div class="policy-intro text-center mb-5" data-aos="fade-up">
                        <div class="intro-icon">
                            <i class="bi bi-shield-check"></i>
                        </div>
                        <h2 class="section-title mb-3">Compra con confianza</h2>
                        <p class="section-subtitle">
                            En <strong>Feyma tech</strong> queremos que te sientas seguro con tu compra. 
                            Conocé nuestras políticas de cambios, devoluciones y garantías.
                        </p>
                    </div>

                    <!-- Section 1: Online Sales -->
                    <div class="policy-section" data-aos="fade-up">
                        <div class="policy-header">
                            <i class="bi bi-laptop"></i>
                            <h3>Venta en línea o telefónica</h3>
                        </div>

                        <div class="accordion policy-accordion" id="onlineAccordion">
                            <!-- Item 1.1 -->
                            <div class="accordion-item">
                                <h2 class="accordion-header">
                                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#online1">
                                        Plazo general para cambios o devoluciones
                                    </button>
                                </h2>
                                <div id="online1" class="accordion-collapse collapse show" data-bs-parent="#onlineAccordion">
                                    <div class="accordion-body">
                                        <p>
                                            En compras a distancia (web o telefónicas), el cliente dispone de <strong>30 días corridos</strong> 
                                            desde la recepción del producto para solicitar un cambio o la devolución del dinero. Para que 
                                            <strong>Feyma tech</strong> acepte la devolución, el artículo debe estar sin uso y en las mismas 
                                            condiciones en que fue entregado. Feyma tech solo acepta cambios por el mismo modelo, salvo que 
                                            exista un defecto comprobado.
                                        </p>
                                    </div>
                                </div>
                            </div>

                            <!-- Item 1.2 -->
                            <div class="accordion-item">
                                <h2 class="accordion-header">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#online2">
                                        Condiciones y procedimiento
                                    </button>
                                </h2>
                                <div id="online2" class="accordion-collapse collapse" data-bs-parent="#onlineAccordion">
                                    <div class="accordion-body">
                                        <p>
                                            Para tramitar un cambio o devolución, el cliente debe contactar al departamento de Atención al 
                                            Cliente de <strong>Feyma tech</strong> dentro del plazo indicado para coordinar la recolección del 
                                            producto. El producto debe enviarse con su embalaje original y todos los accesorios y documentación 
                                            suministrados, incluyendo el ticket de compra.
                                        </p>
                                        <p>
                                            <strong>Feyma tech</strong> no acepta cambios ni devoluciones por vías distintas de las indicadas.
                                        </p>
                                    </div>
                                </div>
                            </div>

                            <!-- Item 1.3 -->
                            <div class="accordion-item">
                                <h2 class="accordion-header">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#online3">
                                        Gastos
                                    </button>
                                </h2>
                                <div id="online3" class="accordion-collapse collapse" data-bs-parent="#onlineAccordion">
                                    <div class="accordion-body">
                                        <p>
                                            En las devoluciones por arrepentimiento o cambios sin defecto, <strong>Feyma tech</strong> 
                                            reembolsará el precio pagado por el producto pero no reembolsará el importe correspondiente al envío. 
                                            El cliente asumirá los costos directos de devolución.
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Section 2: Defective Products -->
                    <div class="policy-section" data-aos="fade-up" data-aos-delay="100">
                        <div class="policy-header">
                            <i class="bi bi-tools"></i>
                            <h3>Devoluciones por productos defectuosos</h3>
                        </div>

                        <div class="accordion policy-accordion" id="defectiveAccordion">
                            <!-- Item 2.1 -->
                            <div class="accordion-item">
                                <h2 class="accordion-header">
                                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#defect1">
                                        Plazo especial para fallas
                                    </button>
                                </h2>
                                <div id="defect1" class="accordion-collapse collapse show" data-bs-parent="#defectiveAccordion">
                                    <div class="accordion-body">
                                        <p>
                                            Si el cliente considera que el producto entregado tiene un defecto de fabricación o no coincide 
                                            con lo solicitado, debe comunicarlo a <strong>Feyma tech</strong> dentro de los <strong>7 días 
                                            hábiles</strong> posteriores a la fecha de confirmación de envío.
                                        </p>
                                    </div>
                                </div>
                            </div>

                            <!-- Item 2.2 -->
                            <div class="accordion-item">
                                <h2 class="accordion-header">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#defect2">
                                        Evaluación y resultado
                                    </button>
                                </h2>
                                <div id="defect2" class="accordion-collapse collapse" data-bs-parent="#defectiveAccordion">
                                    <div class="accordion-body">
                                        <p>
                                            <strong>Feyma tech</strong> examinará el producto y notificará al cliente, por correo o teléfono, 
                                            si corresponde la devolución o sustitución. La devolución o sustitución se realizará lo antes 
                                            posible y siempre dentro de los 30 días siguientes a la confirmación de que existe una falla.
                                        </p>
                                        <p>
                                            En caso de defectos debidamente comprobados, <strong>Feyma tech</strong> reembolsará al cliente el 
                                            importe pagado, incluidos los gastos de envío. El reembolso se realizará por el mismo medio de pago 
                                            utilizado. El producto no debe haber sido utilizado y debe encontrarse con su embalaje y etiquetas 
                                            originales.
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Section 3: Right of Withdrawal -->
                    <div class="policy-section" data-aos="fade-up" data-aos-delay="150">
                        <div class="policy-header">
                            <i class="bi bi-arrow-return-left"></i>
                            <h3>Derecho de arrepentimiento</h3>
                        </div>

                        <div class="accordion policy-accordion" id="withdrawalAccordion">
                            <!-- Item 3.1 -->
                            <div class="accordion-item">
                                <h2 class="accordion-header">
                                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#withdraw1">
                                        Plazo y requisitos
                                    </button>
                                </h2>
                                <div id="withdraw1" class="accordion-collapse collapse show" data-bs-parent="#withdrawalAccordion">
                                    <div class="accordion-body">
                                        <p>
                                            Conforme a la Ley de Defensa del Consumidor N.º 24.240, el comprador tiene derecho a revocar la 
                                            operación dentro de los <strong>10 días corridos</strong> contados desde la fecha de recepción del 
                                            producto. Para ejercer este derecho, el cliente debe notificar fehacientemente a <strong>Feyma 
                                            tech</strong> y poner el producto a disposición con su embalaje original y sin uso.
                                        </p>
                                        <p>
                                            <strong>Feyma tech</strong> reembolsará el precio pagado descontando los gastos de devolución, 
                                            que correrán por cuenta del cliente.
                                        </p>
                                    </div>
                                </div>
                            </div>

                            <!-- Item 3.2 -->
                            <div class="accordion-item">
                                <h2 class="accordion-header">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#withdraw2">
                                        Forma de reembolso
                                    </button>
                                </h2>
                                <div id="withdraw2" class="accordion-collapse collapse" data-bs-parent="#withdrawalAccordion">
                                    <div class="accordion-body">
                                        <p>
                                            La devolución puede demorar algunos días por cuestiones administrativas. Si el reembolso se 
                                            realiza por transferencia bancaria, la cuenta debe estar a nombre del titular que efectuó la 
                                            compra o se requerirá su autorización.
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Section 4: Warranty -->
                    <div class="policy-section" id="garantia" data-aos="fade-up" data-aos-delay="200">
                        <div class="policy-header">
                            <i class="bi bi-shield-check"></i>
                            <h3>Garantía de fábrica y garantía del vendedor</h3>
                        </div>

                        <div class="accordion policy-accordion" id="warrantyAccordion">
                            <!-- Item 4.1 -->
                            <div class="accordion-item">
                                <h2 class="accordion-header">
                                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#warranty1">
                                        Dos garantías independientes
                                    </button>
                                </h2>
                                <div id="warranty1" class="accordion-collapse collapse show" data-bs-parent="#warrantyAccordion">
                                    <div class="accordion-body">
                                        <p>
                                            Los productos comercializados por <strong>Feyma tech</strong> cuentan con dos garantías: una 
                                            expedida por el fabricante y otra solidaria expedida por <strong>Feyma tech</strong>, en cumplimiento 
                                            de la Ley 24.240. Estas garantías son independientes; cada una tiene sus propios plazos y condiciones 
                                            y no se vinculan entre sí.
                                        </p>
                                    </div>
                                </div>
                            </div>

                            <!-- Item 4.2 -->
                            <div class="accordion-item">
                                <h2 class="accordion-header">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#warranty2">
                                        Duración de la garantía del vendedor
                                    </button>
                                </h2>
                                <div id="warranty2" class="accordion-collapse collapse" data-bs-parent="#warrantyAccordion">
                                    <div class="accordion-body">
                                        <p>
                                            <strong>Feyma tech</strong> ofrece una garantía de <strong>12 meses</strong> desde la fecha de 
                                            venta; dicha garantía es ejecutada por técnicos certificados de <strong>Feyma tech</strong>. Para 
                                            acceder a esta garantía, el cliente debe solicitarla de forma escrita (por ejemplo, mediante el 
                                            formulario de garantías de <strong>Feyma tech</strong>).
                                        </p>
                                        <p>
                                            La garantía del fabricante puede tener un plazo diferente y se ejecuta en el centro de atención 
                                            designado por el fabricante; el traslado corre por cuenta del fabricante o del cliente según las 
                                            condiciones de ese fabricante.
                                        </p>
                                    </div>
                                </div>
                            </div>

                            <!-- Item 4.3 -->
                            <div class="accordion-item">
                                <h2 class="accordion-header">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#warranty3">
                                        Alcance de la garantía
                                    </button>
                                </h2>
                                <div id="warranty3" class="accordion-collapse collapse" data-bs-parent="#warrantyAccordion">
                                    <div class="accordion-body">
                                        <p>
                                            La garantía de <strong>Feyma tech</strong> cubre exclusivamente fallas de hardware por defectos de 
                                            fabricación; quedan excluidos los fallos por mal uso, incompatibilidad de software, actualizaciones 
                                            de drivers o modificaciones de hardware.
                                        </p>
                                        <p>
                                            Si dentro de los 12 meses el equipo presenta una falla cubierta por la garantía del vendedor, 
                                            <strong>Feyma tech</strong> puede optar por reparar el producto, sustituirlo por uno idéntico o 
                                            equivalente, o reembolsar el importe abonado.
                                        </p>
                                        <p>
                                            En caso de que la reparación no sea posible y el cliente acepte un cambio por un modelo de mayores 
                                            prestaciones, se deberá abonar la diferencia de precio.
                                        </p>
                                    </div>
                                </div>
                            </div>

                            <!-- Item 4.4 -->
                            <div class="accordion-item">
                                <h2 class="accordion-header">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#warranty4">
                                        Condiciones para mantener la garantía
                                    </button>
                                </h2>
                                <div id="warranty4" class="accordion-collapse collapse" data-bs-parent="#warrantyAccordion">
                                    <div class="accordion-body">
                                        <ol class="warranty-list">
                                            <li>
                                                El producto debe ser presentado con todos los accesorios, cables, manuales y embalaje original; 
                                                no debe haber sido manipulado, modificado ni reparado por terceros.
                                            </li>
                                            <li>
                                                La garantía se anula si se detectan golpes, roturas, caídas, rayones, etiquetas alteradas, 
                                                sulfatación, humedad u otras evidencias de uso indebido, o si se hubieran realizado modificaciones 
                                                de hardware no autorizadas. La apertura del equipo por personal ajeno a Feyma tech puede invalidar 
                                                la garantía de fábrica, por lo que Feyma tech coloca sellos inviolables para asegurar su integridad.
                                            </li>
                                        </ol>
                                    </div>
                                </div>
                            </div>

                            <!-- Item 4.5 -->
                            <div class="accordion-item">
                                <h2 class="accordion-header">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#warranty5">
                                        Procedimiento para ejecutar la garantía
                                    </button>
                                </h2>
                                <div id="warranty5" class="accordion-collapse collapse" data-bs-parent="#warrantyAccordion">
                                    <div class="accordion-body">
                                        <div class="warranty-steps">
                                            <div class="step-item">
                                                <div class="step-number">1</div>
                                                <div class="step-content">
                                                    <h5>Comunicación</h5>
                                                    <p>Ante un defecto cubierto, el cliente debe comunicarse con <strong>Feyma tech</strong> 
                                                    para iniciar el trámite.</p>
                                                </div>
                                            </div>
                                            <div class="step-item">
                                                <div class="step-number">2</div>
                                                <div class="step-content">
                                                    <h5>Diagnóstico</h5>
                                                    <p><strong>Feyma tech</strong> evaluará el equipo y, en un plazo razonable, confirmará si 
                                                    corresponde la reparación, sustitución o reembolso.</p>
                                                </div>
                                            </div>
                                            <div class="step-item">
                                                <div class="step-number">3</div>
                                                <div class="step-content">
                                                    <h5>Reparación o cambio</h5>
                                                    <p>La reparación o sustitución se efectuará en un plazo máximo de 30 días desde la 
                                                    confirmación de la falla.</p>
                                                </div>
                                            </div>
                                            <div class="step-item">
                                                <div class="step-number">4</div>
                                                <div class="step-content">
                                                    <h5>Documentación</h5>
                                                    <p>El cliente recibirá un informe donde consten las partes reemplazadas y la fecha de 
                                                    entrega, y deberá conservar su factura para cualquier reclamo futuro.</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Item 4.6 -->
                            <div class="accordion-item">
                                <h2 class="accordion-header">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#warranty6">
                                        Notas finales
                                    </button>
                                </h2>
                                <div id="warranty6" class="accordion-collapse collapse" data-bs-parent="#warrantyAccordion">
                                    <div class="accordion-body">
                                        <div class="alert alert-warning">
                                            <i class="bi bi-exclamation-triangle-fill me-2"></i>
                                            <strong>Importante:</strong> <strong>Feyma tech</strong> no es responsable de la pérdida de datos 
                                            personales contenidos en discos o memorias de los equipos. Recomendamos siempre realizar copias de 
                                            seguridad antes de enviar un producto a servicio técnico.
                                        </div>
                                        <p class="mt-3">
                                            En todos los casos, <strong>Feyma tech</strong> trabaja conforme a la legislación argentina de 
                                            defensa del consumidor, especialmente los artículos 32, 33 y 34 de la Ley 24.240, que regulan el 
                                            derecho de arrepentimiento y las obligaciones del vendedor.
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Contact CTA -->
                    <div class="policy-cta text-center mt-5" data-aos="fade-up">
                        <div class="cta-card">
                            <h3>¿Necesitás ayuda con tu compra?</h3>
                            <p>Nuestro equipo de atención al cliente está listo para asistirte</p>
                            <div class="cta-buttons mt-4">
                                <a href="/contacto" class="btn btn-gold btn-lg me-3">
                                    <i class="bi bi-envelope"></i> Contactanos
                                </a>
                                <a href="https://wa.me/5491144116575" class="btn btn-outline-success btn-lg" target="_blank">
                                    <i class="bi bi-whatsapp"></i> WhatsApp
                                </a>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>

<?php
get_footer();
