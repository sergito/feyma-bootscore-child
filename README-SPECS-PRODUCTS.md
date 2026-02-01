# 📋 Sistema de Especificaciones Técnicas de Productos

## 🎯 Descripción

Sistema completo de campos ACF PRO para especificaciones técnicas de productos (Notebooks, PCs, Componentes) con formularios SUPER optimizados para completar rápidamente.

---

## ✅ Características

### **Campos 100% Optimizados:**
- ✅ **Selects** en lugar de text (marca CPU, GPU, RAM, etc.)
- ✅ **Números** con min/max (núcleos, threads, peso)
- ✅ **Choices** predefinidos (resoluciones, tamaños, frecuencias)
- ✅ **Checkboxes** para features (Ray Tracing, DLSS, G-SYNC)
- ✅ **Repeaters** para puertos (agrega múltiples fácilmente)
- ✅ **True/False** visuales (teclado numérico sí/no)
- ✅ **Tabs organizados** por categoría

### **6 Tabs Organizados:**
1. **Información Básica** - Marca, Modelo, Uso
2. **Procesador & Gráficos** - CPU, GPU, Features
3. **Memoria & Almacenamiento** - RAM, SSD
4. **Pantalla** - Display completo
5. **Conectividad** - Wi-Fi, Bluetooth, Puertos
6. **Batería & Dimensiones** - Batería, Peso, Dimensiones
7. **Audio, Teclado & Extras** - Audio, Webcam, SO

---

## 📂 Archivos Incluidos

```
bootscore-child-feyma/
│
├── acf-json/
│   └── group_product_specs_extreme.json        # Campos ACF para importar
│
├── woocommerce/
│   └── content-single-product-specs.php        # Template para mostrar specs
│
└── README-SPECS-PRODUCTS.md                    # Esta guía
```

---

## 🚀 Instalación

### PASO 1: Importar Campos ACF

1. Ir a **WordPress Admin → Custom Fields → Tools**
2. Tab **"Import Field Groups"**
3. Abrir: `acf-json/group_product_specs_extreme.json`
4. Copiar todo el contenido
5. Pegar en ACF y click **"Import JSON"**

✅ Aparecerá: **"Especificaciones Técnicas del Producto"**

---

### PASO 2: Verificar Instalación

1. Ir a **Productos → Editar cualquier producto**
2. Scroll down → Deberías ver 7 tabs nuevos:
   - Información Básica
   - Procesador & Gráficos
   - Memoria & Almacenamiento
   - Pantalla
   - Conectividad
   - Batería & Dimensiones
   - Audio, Teclado & Extras

---

### PASO 3: Integrar en Template (Opcional)

**Opción A - Incluir en tu single product:**

Edita `woocommerce/content-single-product.php` y agrega:

```php
<!-- Dentro del tab de Especificaciones -->
<div class="tab-pane fade" id="specifications" role="tabpanel">
    <div class="tab-content-wrapper">
        <?php include(get_stylesheet_directory() . '/woocommerce/content-single-product-specs.php'); ?>
    </div>
</div>
```

**Opción B - Usar directamente en cualquier parte:**

```php
<?php
global $product;
$product_id = $product->get_id();

// Mostrar specs
include(get_stylesheet_directory() . '/woocommerce/content-single-product-specs.php');
?>
```

---

## ⚙️ Guía de Uso - Por Tab

### 📌 Tab 1: Información Básica

| Campo | Tipo | Descripción | Ejemplo |
|-------|------|-------------|---------|
| **Marca** | Select | Marca del producto | ASUS, MSI, HP, Dell, Apple |
| **Modelo** | Text | Modelo específico | TUF Gaming F15 FX507VV |
| **Uso Recomendado** | Select | Principal uso | Gaming, Diseño, Oficina |

---

### 🖥️ Tab 2: Procesador & Gráficos

#### Procesador:
| Campo | Tipo | Ejemplo |
|-------|------|---------|
| **Marca CPU** | Select | Intel, AMD, Apple |
| **Modelo CPU** | Text | Core i7-13620H |
| **Núcleos** | Number | 10 |
| **Threads** | Number | 16 |
| **Frecuencia Base** | Text | 2.4 (GHz) |
| **Frecuencia Turbo** | Text | 4.9 (GHz) |
| **Caché** | Text | 24 (MB) |
| **TDP** | Text | 45 (W) |

#### GPU:
| Campo | Tipo | Ejemplo |
|-------|------|---------|
| **Tipo GPU** | Select | Dedicada, Integrada, Híbrida |
| **Marca GPU** | Select | NVIDIA, AMD, Intel, Apple |
| **Modelo GPU** | Text | GeForce RTX 4060 |
| **VRAM** | Select | 8GB |
| **Tipo VRAM** | Select | GDDR6 |
| **TGP** | Text | 140 (W) |
| **Features GPU** | Checkbox | Ray Tracing, DLSS, DLSS 3, FSR |

---

### 💾 Tab 3: Memoria & Almacenamiento

#### RAM:
| Campo | Tipo | Ejemplo |
|-------|------|---------|
| **Capacidad RAM** | Select | 16GB |
| **Tipo RAM** | Select | DDR5 |
| **Frecuencia** | Text | 4800 (MHz) |
| **Slots** | Text | 2x SO-DIMM |
| **Máximo Expandible** | Select | 32GB |

#### SSD:
| Campo | Tipo | Ejemplo |
|-------|------|---------|
| **Capacidad SSD** | Select | 1TB |
| **Tipo SSD** | Select | NVMe PCIe 4.0 |
| **Velocidad Lectura** | Text | 7000 (MB/s) |
| **Velocidad Escritura** | Text | 5000 (MB/s) |
| **Slots M.2** | Number | 2 |

---

### 🖼️ Tab 4: Pantalla

| Campo | Tipo | Opciones/Ejemplo |
|-------|------|------------------|
| **Tamaño** | Select | 13.3", 14", 15.6", 17.3" |
| **Resolución** | Select | 1920x1080 (FHD), 2560x1440 (QHD), 3840x2160 (4K) |
| **Tipo Panel** | Select | IPS, OLED, Mini-LED, VA |
| **Tasa Refresco** | Select | 60Hz, 120Hz, 144Hz, 240Hz |
| **Tiempo Respuesta** | Text | 3 (ms) |
| **Brillo** | Text | 300 (nits) |
| **Cobertura Color** | Text | 100% sRGB |
| **Características** | Checkbox | Anti-Glare, Touchscreen, G-SYNC, HDR |

---

### 📡 Tab 5: Conectividad

| Campo | Tipo | Ejemplo |
|-------|------|---------|
| **Wi-Fi** | Select | Wi-Fi 6E (802.11ax) |
| **Bluetooth** | Select | Bluetooth 5.3 |
| **Ethernet** | Radio | Sí (RJ-45 Gigabit) / No |
| **Puertos** | Repeater | Ver abajo ⬇️ |

#### Repeater "Puertos":
Cada fila tiene:
- **Tipo** (Select): Thunderbolt 4, USB-C 3.2 Gen 2, HDMI 2.1, etc.
- **Cantidad** (Number): 1, 2, 3...

**Ejemplo:**
```
Tipo: Thunderbolt 4        | Cantidad: 1
Tipo: USB-A 3.2 Gen 1      | Cantidad: 3
Tipo: HDMI 2.1             | Cantidad: 1
Tipo: Audio Jack 3.5mm     | Cantidad: 1
```

---

### 🔋 Tab 6: Batería & Dimensiones

#### Batería:
| Campo | Tipo | Ejemplo |
|-------|------|---------|
| **Capacidad** | Text | 90 (Wh) |
| **Duración** | Text | 6 (horas) |
| **Potencia Cargador** | Text | 280 (W) |

#### Dimensiones:
| Campo | Tipo | Ejemplo |
|-------|------|---------|
| **Ancho** | Text | 354.9 (mm) |
| **Profundidad** | Text | 251.9 (mm) |
| **Altura** | Text | 22.4 ~ 25.4 (mm) |
| **Peso** | Text | 2.2 (kg) |

---

### 🎵 Tab 7: Audio, Teclado & Extras

| Campo | Tipo | Ejemplo |
|-------|------|---------|
| **Altavoces** | Text | 2x 2W Stereo |
| **Tecnología Audio** | Text | DTS:X Ultra |
| **Tipo Teclado** | Text | Chiclet RGB |
| **Retroiluminación** | Select | RGB por zona (4 zonas) |
| **Teclado Numérico** | True/False | ✅ Sí |
| **Webcam** | Text | 720p HD |
| **Sistema Operativo** | Select | Windows 11 Home |
| **Certificaciones** | Checkbox | MIL-STD-810H, Energy Star |
| **Contenido Caja** | Textarea | (un ítem por línea) |

**Ejemplo Contenido Caja:**
```
1x Laptop
1x Adaptador AC 280W
1x Cable de alimentación
1x Manual de usuario
1x Tarjeta de garantía
```

---

## 📝 Ejemplo Completo - ASUS TUF Gaming F15

### Tab "Información Básica":
```
Marca: ASUS
Modelo: TUF Gaming F15 FX507VV
Uso Recomendado: Gaming
```

### Tab "Procesador & Gráficos":
```
CPU:
- Marca: Intel
- Modelo: Core i7-13620H
- Núcleos: 10
- Threads: 16
- Frecuencia Base: 2.4
- Frecuencia Turbo: 4.9
- Caché: 24
- TDP: 45

GPU:
- Tipo: Dedicada
- Marca: NVIDIA
- Modelo: GeForce RTX 4060
- VRAM: 8GB
- Tipo VRAM: GDDR6
- TGP: 140
- Features: ☑ Ray Tracing, ☑ DLSS 3, ☑ OptiX
```

### Tab "Memoria & Almacenamiento":
```
RAM:
- Capacidad: 16GB
- Tipo: DDR5
- Frecuencia: 4800
- Slots: 2x SO-DIMM
- Máx Expandible: 32GB

SSD:
- Capacidad: 1TB
- Tipo: NVMe PCIe 4.0
- Lectura: 7000
- Escritura: 5000
- Slots: 2
```

### Tab "Pantalla":
```
- Tamaño: 15.6"
- Resolución: 1920x1080 (Full HD)
- Panel: IPS
- Tasa Refresco: 144 Hz
- Tiempo Respuesta: 3
- Brillo: 300
- Cobertura: 100% sRGB
- Features: ☑ Anti-Glare, ☑ G-SYNC
```

### Tab "Conectividad":
```
- Wi-Fi: Wi-Fi 6E (802.11ax)
- Bluetooth: Bluetooth 5.3
- Ethernet: Sí (RJ-45 Gigabit)

Puertos:
[1] Thunderbolt 4               x 1
[2] USB-C 3.2 Gen 2             x 1
[3] USB-A 3.2 Gen 1             x 3
[4] HDMI 2.1                    x 1
[5] Audio Jack 3.5mm            x 1
```

### Tab "Batería & Dimensiones":
```
Batería:
- Capacidad: 90
- Duración: 6
- Cargador: 280

Dimensiones:
- Ancho: 354.9
- Profundidad: 251.9
- Altura: 22.4 ~ 25.4
- Peso: 2.2
```

### Tab "Audio, Teclado & Extras":
```
- Altavoces: 2x 2W Stereo
- Tecnología: DTS:X Ultra
- Teclado: Chiclet RGB
- Retroiluminación: RGB por zona (4 zonas)
- Teclado Numérico: ☑ Sí
- Webcam: 720p HD
- SO: Windows 11 Home
- Certificaciones: ☑ MIL-STD-810H

Contenido Caja:
1x ASUS TUF Gaming F15 FX507VV
1x Adaptador AC 280W
1x Cable de alimentación
1x Manual de usuario
1x Tarjeta de garantía
```

---

## 🎨 Personalización del Template

El archivo `woocommerce/content-single-product-specs.php` ya incluye **estilos CSS** para mostrar las specs en formato de tabla elegante.

### Colores personalizables:

```css
.spec-category h3 i {
    color: #3D3180;  /* ← Cambia por tu color de marca */
}
```

---

## 💡 Tips Pro

### 1. **Completa solo los campos relevantes**
No todos los productos tienen todos los campos. Si dejas algo vacío, simplemente no se mostrará en el front-end.

### 2. **Usa Copy/Paste para productos similares**
ACF PRO permite duplicar productos con todos sus campos. Duplica y edita solo lo necesario.

### 3. **Repeater de Puertos es super útil**
En lugar de escribir "3x USB-A, 1x HDMI", usas el repeater:
```
USB-A 3.2 Gen 1   | 3
HDMI 2.1          | 1
Thunderbolt 4     | 1
```

### 4. **Selects ahorran tiempo**
En lugar de escribir "Intel Core i7-13620H" cada vez:
- Select "Intel" → escribe "Core i7-13620H"
- Más rápido y sin errores de tipeo

---

## 🔥 Ventajas vs Campos Anteriores (WYSIWYG)

| Antes (WYSIWYG) | Ahora (Campos Específicos) |
|----------------|----------------------------|
| ❌ Copiar/pegar textos enormes | ✅ Completar campos uno por uno |
| ❌ Formato inconsistente | ✅ Formato siempre igual |
| ❌ Difícil de editar | ✅ Edición super rápida |
| ❌ Errores de tipeo | ✅ Selects predefinidos |
| ❌ Sin estructura | ✅ 100% estructurado |
| ❌ Difícil exportar | ✅ Fácil exportar a CSV/API |

---

## 📊 Funciones PHP Útiles

### Obtener un campo:
```php
$cpu_modelo = get_field('cpu_modelo', $product_id);
echo $cpu_modelo; // "Core i7-13620H"
```

### Verificar si existe:
```php
if (get_field('gpu_modelo', $product_id)) {
    echo get_field('gpu_modelo', $product_id);
}
```

### Usar repeater de puertos:
```php
if (have_rows('ports', $product_id)) :
    while (have_rows('ports', $product_id)) : the_row();
        echo get_sub_field('cantidad') . 'x ' . get_sub_field('tipo');
    endwhile;
endif;
```

### Usar checkbox:
```php
$gpu_features = get_field('gpu_features', $product_id);
if ($gpu_features && in_array('Ray Tracing', $gpu_features)) {
    echo 'Este producto tiene Ray Tracing!';
}
```

---

## 🛠️ Integración con SEO

Los campos ACF pueden usarse para mejorar tu SEO automáticamente:

```php
// En functions.php
add_filter('woocommerce_product_get_description', 'feyma_add_specs_to_description');
function feyma_add_specs_to_description($description) {
    global $product;
    $product_id = $product->get_id();

    $cpu = get_field('cpu_modelo', $product_id);
    $gpu = get_field('gpu_modelo', $product_id);
    $ram = get_field('ram_capacidad', $product_id);

    if ($cpu || $gpu || $ram) {
        $specs_summary = "Especificaciones técnicas: ";
        if ($cpu) $specs_summary .= "Procesador $cpu. ";
        if ($gpu) $specs_summary .= "GPU $gpu. ";
        if ($ram) $specs_summary .= "Memoria RAM $ram. ";

        $description .= "\n\n" . $specs_summary;
    }

    return $description;
}
```

---

## ❓ FAQ

### ¿Puedo usar esto con el antiguo grupo "Computadoras"?

Sí, puedes tener ambos grupos activos. Este nuevo es un reemplazo mejorado, pero puedes usar los dos simultáneamente.

### ¿Funciona con productos variables?

Sí, los campos ACF se aplican al producto padre. Si necesitas specs diferentes por variación, usa campos de variación de WooCommerce.

### ¿Puedo exportar las specs a CSV?

Sí, con plugins como "WP All Import" o "Advanced Custom Fields: Export" puedes exportar todos los campos ACF a CSV.

### ¿Los campos son obligatorios?

No. Solo "Marca" y "Modelo" son obligatorios. El resto es opcional y solo se muestra si tiene valor.

---

## 🎉 ¡Listo!

Ahora tienes un sistema profesional de especificaciones técnicas con:
- ✅ Formularios ultra optimizados
- ✅ 7 tabs organizados
- ✅ Selects, checkboxes, repeaters
- ✅ Template listo para usar
- ✅ Documentación completa

**Próximos pasos:**
1. Importar el JSON de ACF
2. Crear/editar un producto de prueba
3. Completar los campos en los tabs
4. Ver el resultado en el front-end

**¿Necesitas ayuda?** Todos los campos tienen instrucciones y placeholders de ejemplo. 🚀

---

**Versión:** 1.0.0
**Fecha:** Enero 2026
**Autor:** FEYMA Development Team

**¡A completar specs como un PRO! ⚡**
