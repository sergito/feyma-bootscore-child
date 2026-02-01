<?php
/**
 * SECCIÓN: ENVÍOS Y GARANTÍAS - EDITABLE CON ACF
 * Añadir a front-page.php
 */
?>

<!-- ============================================
     ENVÍOS Y GARANTÍAS - ACF EDITABLE
     ============================================ -->
<section class="shipping-guarantees-section py-5 bg-light">
    <div class="container">
        <div class="row align-items-center g-5">
            
            <!-- Contenido Izquierdo -->
            <div class="col-lg-6" data-aos="fade-right">
                <div class="shipping-content">
                    <span class="section-tag">
                        <i class="bi bi-truck"></i>
                        Compromiso FEYMA
                    </span>
                    <h2 class="section-title">
                        Envíos seguros<br>
                        <span class="text-gradient">en todo el país</span>
                    </h2>
                    <p class="section-text">
                        Trabajamos con las mejores empresas de logística para garantizar 
                        que tu compra llegue en perfectas condiciones y en tiempo récord.
                    </p>
                    
                    <!-- Lista de Garantías desde ACF -->
                    <div class="guarantee-list">
                        <?php
                        // Obtener garantías desde ACF
                        if( have_rows('shipping_guarantees', 'option') ):
                            while( have_rows('shipping_guarantees', 'option') ): the_row();
                                $title = get_sub_field('title');
                                $description = get_sub_field('description');
                                $icon = get_sub_field('icon');
                                ?>
                                <div class="guarantee-item" data-aos="fade-up" data-aos-delay="100">
                                    <div class="guarantee-icon">
                                        <i class="bi bi-<?php echo esc_attr($icon); ?>"></i>
                                    </div>
                                    <div class="guarantee-content">
                                        <strong><?php echo esc_html($title); ?></strong>
                                        <p><?php echo esc_html($description); ?></p>
                                    </div>
                                </div>
                                <?php
                            endwhile;
                        else:
                            // Valores por defecto si no hay ACF configurado
                            $default_guarantees = array(
                                array(
                                    'icon' => 'truck-front-fill',
                                    'title' => 'Envío Express CABA',
                                    'desc' => '24-48 horas en Buenos Aires'
                                ),
                                array(
                                    'icon' => 'gift-fill',
                                    'title' => 'Gratis +$50.000',
                                    'desc' => 'Sin costo en compras superiores'
                                ),
                                array(
                                    'icon' => 'geo-alt-fill',
                                    'title' => 'Tracking en Tiempo Real',
                                    'desc' => 'Seguí tu pedido paso a paso'
                                ),
                                array(
                                    'icon' => 'shield-check',
                                    'title' => 'Embalaje Premium',
                                    'desc' => 'Protección máxima garantizada'
                                ),
                            );
                            
                            foreach( $default_guarantees as $guarantee ):
                            ?>
                            <div class="guarantee-item" data-aos="fade-up" data-aos-delay="100">
                                <div class="guarantee-icon">
                                    <i class="bi bi-<?php echo $guarantee['icon']; ?>"></i>
                                </div>
                                <div class="guarantee-content">
                                    <strong><?php echo $guarantee['title']; ?></strong>
                                    <p><?php echo $guarantee['desc']; ?></p>
                                </div>
                            </div>
                            <?php
                            endforeach;
                        endif;
                        ?>
                    </div>
                </div>
            </div>
            
            <!-- Visual Derecho -->
            <div class="col-lg-6" data-aos="fade-left">
                <div class="shipping-visual">
                    <div class="shipping-icon-large">
                        <i class="bi bi-truck"></i>
                    </div>
                    <div class="shipping-decorations">
                        <div class="decoration-circle circle-1"></div>
                        <div class="decoration-circle circle-2"></div>
                        <div class="decoration-circle circle-3"></div>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
</section>
