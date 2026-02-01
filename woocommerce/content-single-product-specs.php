<?php
/**
 * Template parcial para mostrar las especificaciones técnicas en single product
 *
 * Usa los campos ACF PRO del grupo "Especificaciones Técnicas del Producto"
 *
 * Para usar: incluir en tu template de single product:
 * <?php include(get_stylesheet_directory() . '/woocommerce/content-single-product-specs.php'); ?>
 *
 * @package Bootscore Child
 */

defined('ABSPATH') || exit;

global $product;
$product_id = $product->get_id();

// Helper function para mostrar valor con fallback
function feyma_spec($field_name, $product_id, $default = '-') {
    $value = get_field($field_name, $product_id);
    return $value ? $value : $default;
}
?>

<!-- ============================================
     TAB DE ESPECIFICACIONES TÉCNICAS
     ============================================ -->
<div class="specs-grid">

    <!-- PROCESADOR -->
    <?php if (get_field('cpu_modelo', $product_id)) : ?>
    <div class="spec-category">
        <h3><i class="bi bi-cpu"></i> Procesador</h3>
        <table class="spec-table">
            <?php if (get_field('cpu_marca', $product_id)) : ?>
            <tr>
                <td>Marca</td>
                <td><?php echo esc_html(get_field('cpu_marca', $product_id)); ?></td>
            </tr>
            <?php endif; ?>

            <?php if (get_field('cpu_modelo', $product_id)) : ?>
            <tr>
                <td>Modelo</td>
                <td><?php echo esc_html(get_field('cpu_modelo', $product_id)); ?></td>
            </tr>
            <?php endif; ?>

            <?php if (get_field('cpu_nucleos', $product_id)) : ?>
            <tr>
                <td>Núcleos</td>
                <td><?php echo esc_html(get_field('cpu_nucleos', $product_id)); ?></td>
            </tr>
            <?php endif; ?>

            <?php if (get_field('cpu_threads', $product_id)) : ?>
            <tr>
                <td>Threads</td>
                <td><?php echo esc_html(get_field('cpu_threads', $product_id)); ?></td>
            </tr>
            <?php endif; ?>

            <?php if (get_field('cpu_freq_base', $product_id)) : ?>
            <tr>
                <td>Frecuencia Base</td>
                <td><?php echo esc_html(get_field('cpu_freq_base', $product_id)); ?> GHz</td>
            </tr>
            <?php endif; ?>

            <?php if (get_field('cpu_freq_turbo', $product_id)) : ?>
            <tr>
                <td>Turbo Boost</td>
                <td>Hasta <?php echo esc_html(get_field('cpu_freq_turbo', $product_id)); ?> GHz</td>
            </tr>
            <?php endif; ?>

            <?php if (get_field('cpu_cache', $product_id)) : ?>
            <tr>
                <td>Caché</td>
                <td><?php echo esc_html(get_field('cpu_cache', $product_id)); ?> MB</td>
            </tr>
            <?php endif; ?>

            <?php if (get_field('cpu_tdp', $product_id)) : ?>
            <tr>
                <td>TDP</td>
                <td><?php echo esc_html(get_field('cpu_tdp', $product_id)); ?> W</td>
            </tr>
            <?php endif; ?>
        </table>
    </div>
    <?php endif; ?>

    <!-- GRÁFICOS -->
    <?php if (get_field('gpu_modelo', $product_id)) : ?>
    <div class="spec-category">
        <h3><i class="bi bi-gpu-card"></i> Gráficos</h3>
        <table class="spec-table">
            <?php if (get_field('gpu_tipo', $product_id)) : ?>
            <tr>
                <td>Tipo</td>
                <td><?php echo esc_html(get_field('gpu_tipo', $product_id)); ?></td>
            </tr>
            <?php endif; ?>

            <?php if (get_field('gpu_marca', $product_id)) : ?>
            <tr>
                <td>Marca</td>
                <td><?php echo esc_html(get_field('gpu_marca', $product_id)); ?></td>
            </tr>
            <?php endif; ?>

            <?php if (get_field('gpu_modelo', $product_id)) : ?>
            <tr>
                <td>Modelo</td>
                <td><?php echo esc_html(get_field('gpu_modelo', $product_id)); ?></td>
            </tr>
            <?php endif; ?>

            <?php if (get_field('gpu_vram', $product_id)) : ?>
            <tr>
                <td>Memoria</td>
                <td>
                    <?php echo esc_html(get_field('gpu_vram', $product_id)); ?>
                    <?php if (get_field('gpu_vram_tipo', $product_id)) : ?>
                        <?php echo esc_html(get_field('gpu_vram_tipo', $product_id)); ?>
                    <?php endif; ?>
                </td>
            </tr>
            <?php endif; ?>

            <?php if (get_field('gpu_tgp', $product_id)) : ?>
            <tr>
                <td>TGP</td>
                <td><?php echo esc_html(get_field('gpu_tgp', $product_id)); ?> W</td>
            </tr>
            <?php endif; ?>

            <?php
            $gpu_features = get_field('gpu_features', $product_id);
            if ($gpu_features && !empty($gpu_features)) :
            ?>
            <tr>
                <td>Tecnologías</td>
                <td><?php echo implode(', ', $gpu_features); ?></td>
            </tr>
            <?php endif; ?>
        </table>
    </div>
    <?php endif; ?>

    <!-- MEMORIA RAM -->
    <?php if (get_field('ram_capacidad', $product_id)) : ?>
    <div class="spec-category">
        <h3><i class="bi bi-memory"></i> Memoria RAM</h3>
        <table class="spec-table">
            <?php if (get_field('ram_capacidad', $product_id)) : ?>
            <tr>
                <td>Capacidad</td>
                <td><?php echo esc_html(get_field('ram_capacidad', $product_id)); ?></td>
            </tr>
            <?php endif; ?>

            <?php if (get_field('ram_tipo', $product_id)) : ?>
            <tr>
                <td>Tipo</td>
                <td><?php echo esc_html(get_field('ram_tipo', $product_id)); ?></td>
            </tr>
            <?php endif; ?>

            <?php if (get_field('ram_frecuencia', $product_id)) : ?>
            <tr>
                <td>Frecuencia</td>
                <td><?php echo esc_html(get_field('ram_frecuencia', $product_id)); ?> MHz</td>
            </tr>
            <?php endif; ?>

            <?php if (get_field('ram_slots', $product_id)) : ?>
            <tr>
                <td>Slots</td>
                <td><?php echo esc_html(get_field('ram_slots', $product_id)); ?></td>
            </tr>
            <?php endif; ?>

            <?php if (get_field('ram_max', $product_id)) : ?>
            <tr>
                <td>Máximo Expandible</td>
                <td><?php echo esc_html(get_field('ram_max', $product_id)); ?></td>
            </tr>
            <?php endif; ?>
        </table>
    </div>
    <?php endif; ?>

    <!-- ALMACENAMIENTO -->
    <?php if (get_field('storage_capacidad', $product_id)) : ?>
    <div class="spec-category">
        <h3><i class="bi bi-hdd"></i> Almacenamiento</h3>
        <table class="spec-table">
            <?php if (get_field('storage_capacidad', $product_id)) : ?>
            <tr>
                <td>Capacidad</td>
                <td><?php echo esc_html(get_field('storage_capacidad', $product_id)); ?></td>
            </tr>
            <?php endif; ?>

            <?php if (get_field('storage_tipo', $product_id)) : ?>
            <tr>
                <td>Tipo</td>
                <td><?php echo esc_html(get_field('storage_tipo', $product_id)); ?></td>
            </tr>
            <?php endif; ?>

            <?php if (get_field('storage_velocidad_lectura', $product_id)) : ?>
            <tr>
                <td>Velocidad Lectura</td>
                <td>Hasta <?php echo esc_html(get_field('storage_velocidad_lectura', $product_id)); ?> MB/s</td>
            </tr>
            <?php endif; ?>

            <?php if (get_field('storage_velocidad_escritura', $product_id)) : ?>
            <tr>
                <td>Velocidad Escritura</td>
                <td>Hasta <?php echo esc_html(get_field('storage_velocidad_escritura', $product_id)); ?> MB/s</td>
            </tr>
            <?php endif; ?>

            <?php if (get_field('storage_slots', $product_id)) : ?>
            <tr>
                <td>Slots Disponibles</td>
                <td><?php echo esc_html(get_field('storage_slots', $product_id)); ?> x M.2</td>
            </tr>
            <?php endif; ?>
        </table>
    </div>
    <?php endif; ?>

    <!-- PANTALLA -->
    <?php if (get_field('display_tamanio', $product_id)) : ?>
    <div class="spec-category">
        <h3><i class="bi bi-display"></i> Pantalla</h3>
        <table class="spec-table">
            <?php if (get_field('display_tamanio', $product_id)) : ?>
            <tr>
                <td>Tamaño</td>
                <td><?php echo esc_html(get_field('display_tamanio', $product_id)); ?> pulgadas</td>
            </tr>
            <?php endif; ?>

            <?php if (get_field('display_resolucion', $product_id)) : ?>
            <tr>
                <td>Resolución</td>
                <td><?php echo esc_html(get_field('display_resolucion', $product_id)); ?></td>
            </tr>
            <?php endif; ?>

            <?php if (get_field('display_panel', $product_id)) : ?>
            <tr>
                <td>Panel</td>
                <td><?php echo esc_html(get_field('display_panel', $product_id)); ?></td>
            </tr>
            <?php endif; ?>

            <?php if (get_field('display_refresh_rate', $product_id)) : ?>
            <tr>
                <td>Tasa de Refresco</td>
                <td><?php echo esc_html(get_field('display_refresh_rate', $product_id)); ?> Hz</td>
            </tr>
            <?php endif; ?>

            <?php if (get_field('display_response_time', $product_id)) : ?>
            <tr>
                <td>Tiempo de Respuesta</td>
                <td><?php echo esc_html(get_field('display_response_time', $product_id)); ?> ms</td>
            </tr>
            <?php endif; ?>

            <?php if (get_field('display_brillo', $product_id)) : ?>
            <tr>
                <td>Brillo</td>
                <td><?php echo esc_html(get_field('display_brillo', $product_id)); ?> nits</td>
            </tr>
            <?php endif; ?>

            <?php if (get_field('display_color_gamut', $product_id)) : ?>
            <tr>
                <td>Cobertura Color</td>
                <td><?php echo esc_html(get_field('display_color_gamut', $product_id)); ?></td>
            </tr>
            <?php endif; ?>

            <?php
            $display_features = get_field('display_features', $product_id);
            if ($display_features && !empty($display_features)) :
            ?>
            <tr>
                <td>Características</td>
                <td><?php echo implode(', ', $display_features); ?></td>
            </tr>
            <?php endif; ?>
        </table>
    </div>
    <?php endif; ?>

    <!-- BATERÍA -->
    <?php if (get_field('battery_capacidad', $product_id)) : ?>
    <div class="spec-category">
        <h3><i class="bi bi-battery-charging"></i> Batería</h3>
        <table class="spec-table">
            <?php if (get_field('battery_capacidad', $product_id)) : ?>
            <tr>
                <td>Capacidad</td>
                <td><?php echo esc_html(get_field('battery_capacidad', $product_id)); ?> Wh</td>
            </tr>
            <?php endif; ?>

            <?php if (get_field('battery_duracion', $product_id)) : ?>
            <tr>
                <td>Duración</td>
                <td>Hasta <?php echo esc_html(get_field('battery_duracion', $product_id)); ?> horas</td>
            </tr>
            <?php endif; ?>

            <?php if (get_field('charger_power', $product_id)) : ?>
            <tr>
                <td>Cargador</td>
                <td><?php echo esc_html(get_field('charger_power', $product_id)); ?> W</td>
            </tr>
            <?php endif; ?>
        </table>
    </div>
    <?php endif; ?>

    <!-- CONECTIVIDAD -->
    <?php if (get_field('wifi', $product_id) || have_rows('ports', $product_id)) : ?>
    <div class="spec-category">
        <h3><i class="bi bi-wifi"></i> Conectividad</h3>
        <table class="spec-table">
            <?php if (get_field('wifi', $product_id)) : ?>
            <tr>
                <td>Wi-Fi</td>
                <td><?php echo esc_html(get_field('wifi', $product_id)); ?></td>
            </tr>
            <?php endif; ?>

            <?php if (get_field('bluetooth', $product_id)) : ?>
            <tr>
                <td>Bluetooth</td>
                <td><?php echo esc_html(get_field('bluetooth', $product_id)); ?></td>
            </tr>
            <?php endif; ?>

            <?php if (get_field('ethernet', $product_id)) : ?>
            <tr>
                <td>Ethernet</td>
                <td><?php echo esc_html(get_field('ethernet', $product_id)); ?></td>
            </tr>
            <?php endif; ?>

            <?php if (have_rows('ports', $product_id)) : ?>
            <tr>
                <td>Puertos</td>
                <td>
                    <ul class="ports-list">
                        <?php while (have_rows('ports', $product_id)) : the_row(); ?>
                            <li>
                                <?php echo esc_html(get_sub_field('cantidad')); ?>x
                                <?php echo esc_html(get_sub_field('tipo')); ?>
                            </li>
                        <?php endwhile; ?>
                    </ul>
                </td>
            </tr>
            <?php endif; ?>
        </table>
    </div>
    <?php endif; ?>

    <!-- AUDIO -->
    <?php if (get_field('audio_speakers', $product_id)) : ?>
    <div class="spec-category">
        <h3><i class="bi bi-soundwave"></i> Audio</h3>
        <table class="spec-table">
            <?php if (get_field('audio_speakers', $product_id)) : ?>
            <tr>
                <td>Altavoces</td>
                <td><?php echo esc_html(get_field('audio_speakers', $product_id)); ?></td>
            </tr>
            <?php endif; ?>

            <?php if (get_field('audio_tech', $product_id)) : ?>
            <tr>
                <td>Tecnología</td>
                <td><?php echo esc_html(get_field('audio_tech', $product_id)); ?></td>
            </tr>
            <?php endif; ?>
        </table>
    </div>
    <?php endif; ?>

    <!-- TECLADO & TOUCHPAD -->
    <?php if (get_field('keyboard_type', $product_id)) : ?>
    <div class="spec-category">
        <h3><i class="bi bi-keyboard"></i> Teclado & Touchpad</h3>
        <table class="spec-table">
            <?php if (get_field('keyboard_type', $product_id)) : ?>
            <tr>
                <td>Tipo</td>
                <td><?php echo esc_html(get_field('keyboard_type', $product_id)); ?></td>
            </tr>
            <?php endif; ?>

            <?php if (get_field('keyboard_backlight', $product_id)) : ?>
            <tr>
                <td>Retroiluminación</td>
                <td><?php echo esc_html(get_field('keyboard_backlight', $product_id)); ?></td>
            </tr>
            <?php endif; ?>

            <tr>
                <td>Teclado Numérico</td>
                <td><?php echo get_field('keyboard_numpad', $product_id) ? 'Sí' : 'No'; ?></td>
            </tr>
        </table>
    </div>
    <?php endif; ?>

    <!-- DIMENSIONES & PESO -->
    <?php if (get_field('dim_ancho', $product_id)) : ?>
    <div class="spec-category">
        <h3><i class="bi bi-rulers"></i> Dimensiones & Peso</h3>
        <table class="spec-table">
            <?php if (get_field('dim_ancho', $product_id)) : ?>
            <tr>
                <td>Ancho</td>
                <td><?php echo esc_html(get_field('dim_ancho', $product_id)); ?> mm</td>
            </tr>
            <?php endif; ?>

            <?php if (get_field('dim_profundidad', $product_id)) : ?>
            <tr>
                <td>Profundidad</td>
                <td><?php echo esc_html(get_field('dim_profundidad', $product_id)); ?> mm</td>
            </tr>
            <?php endif; ?>

            <?php if (get_field('dim_altura', $product_id)) : ?>
            <tr>
                <td>Altura</td>
                <td><?php echo esc_html(get_field('dim_altura', $product_id)); ?> mm</td>
            </tr>
            <?php endif; ?>

            <?php if (get_field('dim_peso', $product_id)) : ?>
            <tr>
                <td>Peso</td>
                <td><?php echo esc_html(get_field('dim_peso', $product_id)); ?> kg</td>
            </tr>
            <?php endif; ?>

            <?php
            $certificaciones = get_field('certificaciones', $product_id);
            if ($certificaciones && !empty($certificaciones)) :
            ?>
            <tr>
                <td>Certificación</td>
                <td><?php echo implode(', ', $certificaciones); ?></td>
            </tr>
            <?php endif; ?>
        </table>
    </div>
    <?php endif; ?>

    <!-- SISTEMA OPERATIVO -->
    <?php if (get_field('sistema_operativo', $product_id)) : ?>
    <div class="spec-category">
        <h3><i class="bi bi-window"></i> Sistema Operativo</h3>
        <table class="spec-table">
            <?php if (get_field('sistema_operativo', $product_id)) : ?>
            <tr>
                <td>SO Incluido</td>
                <td><?php echo esc_html(get_field('sistema_operativo', $product_id)); ?></td>
            </tr>
            <?php endif; ?>

            <tr>
                <td>Arquitectura</td>
                <td>64-bit</td>
            </tr>
        </table>
    </div>
    <?php endif; ?>

    <!-- CONTENIDO DE LA CAJA -->
    <?php if (get_field('contenido_caja', $product_id)) : ?>
    <div class="spec-category">
        <h3><i class="bi bi-box-seam"></i> Contenido de la Caja</h3>
        <table class="spec-table">
            <tr>
                <td colspan="2">
                    <div class="box-content">
                        <?php echo nl2br(esc_html(get_field('contenido_caja', $product_id))); ?>
                    </div>
                </td>
            </tr>
        </table>
    </div>
    <?php endif; ?>

</div>

<style>
.spec-category {
    background: white;
    border-radius: 12px;
    padding: 24px;
    margin-bottom: 24px;
    box-shadow: 0 2px 8px rgba(0,0,0,0.05);
}

.spec-category h3 {
    font-size: 18px;
    font-weight: 700;
    color: #1a1a1a;
    margin-bottom: 16px;
    display: flex;
    align-items: center;
    gap: 10px;
}

.spec-category h3 i {
    color: #3D3180;
    font-size: 22px;
}

.spec-table {
    width: 100%;
    border-collapse: collapse;
}

.spec-table tr {
    border-bottom: 1px solid #f0f0f0;
}

.spec-table tr:last-child {
    border-bottom: none;
}

.spec-table td {
    padding: 12px 0;
    font-size: 14px;
}

.spec-table td:first-child {
    font-weight: 600;
    color: #666;
    width: 40%;
}

.spec-table td:last-child {
    color: #1a1a1a;
    font-weight: 500;
}

.ports-list {
    list-style: none;
    padding: 0;
    margin: 0;
}

.ports-list li {
    padding: 4px 0;
}

.box-content {
    line-height: 1.8;
}

@media (max-width: 768px) {
    .spec-category {
        padding: 16px;
    }

    .spec-table td {
        font-size: 13px;
        padding: 10px 0;
    }
}
</style>
