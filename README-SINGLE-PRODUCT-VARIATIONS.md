# Single Product con Botones de Radio para Variaciones

## 🎯 Objetivo

Transformar el single product de WooCommerce para usar botones de radio estilizados en lugar de combobox (dropdowns), creando una experiencia de compra superior para tecnología y notebooks.

## ✨ Características Implementadas

### 1. Botones de Radio Estilizados
- ✅ Reemplaza los `<select>` por botones clickeables
- ✅ Diseño basado en e-commerce modernos (Apple, Mercado Libre)
- ✅ Badges "RECOMENDADO" en opciones destacadas
- ✅ Checkmarks verdes para opciones incluidas
- ✅ Precios incrementales visibles (+ $180.000)
- ✅ Border morado cuando está seleccionado

### 2. Variaciones de Color
- ✅ Círculos de color con nombre
- ✅ Sombra morada en seleccionado
- ✅ Layout horizontal optimizado

### 3. Diseño "Elegí tu configuración"
- ✅ Título con icono
- ✅ Grupos por atributo (Memoria RAM, Almacenamiento, Color)
- ✅ Grid responsive adaptable

### 4. Integración Completa
- ✅ 100% compatible con WooCommerce Variations API
- ✅ Actualización de precio en tiempo real
- ✅ Stock dinámico
- ✅ Sin conflictos con Bootscore
- ✅ Accesible y funcional

## 📂 Archivos Modificados/Creados

### Nuevos Archivos

1. **`woocommerce/single-product/add-to-cart/variable.php`**
   - Template personalizado para productos variables
   - Genera botones en lugar de selects
   - Calcula precios diferenciales automáticamente
   - Detecta opciones de color

2. **`assets/js/product-variations-buttons.js`**
   - Maneja clicks en botones
   - Sincroniza con selects ocultos de WooCommerce
   - Actualiza clases `.active`
   - Deshabilita opciones no disponibles
   - Animaciones suaves

3. **`README-SINGLE-PRODUCT-VARIATIONS.md`** (este archivo)
   - Documentación completa del sistema

### Archivos Modificados

1. **`assets/scss/_bootscore-producto.scss`**
   - Nuevos estilos para `.product-configuration`
   - Botones `.variation-option` con estados hover y active
   - Badge `.recommended-badge` naranja
   - Precios con `.included-text` y `.included-icon`
   - Variaciones de color con círculos
   - Responsive para mobile
   - Mantiene estilos legacy por compatibilidad

2. **`functions.php`**
   - Enqueue de `product-variations-buttons.js` solo en productos
   - Usa filemtime para cache busting

## 🎨 Estructura de Estilos

### Clases Principales

```scss
.product-configuration {
    // Contenedor principal
    .configuration-title {
        // "Elegí tu configuración" con icono
    }

    .variations {
        // Tabla de WooCommerce (modificada)
        .label {
            // Label del atributo
        }
        .value {
            // Contenedor de opciones
            select {
                // Oculto con display: none
            }
        }
    }

    .variation-buttons-wrapper {
        // Grid de botones
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(160px, 1fr));

        &.color-variation {
            // Grid más ancho para colores
        }
    }

    .variation-option {
        // Botón individual
        &.active {
            // Estado seleccionado (border morado)
        }

        .recommended-badge {
            // Badge "RECOMENDADO" naranja
        }

        .option-label {
            // Texto del valor (16GB DDR5)
        }

        .option-price {
            // Precio incremental
            .included-text {
                // "Incluido" en verde
            }
            .included-icon {
                // Checkmark verde
            }
        }

        &.variation-color {
            // Variación de color con círculo
            .color-circle {
                // Círculo de color
            }
            .color-name {
                // Nombre del color
            }
        }
    }
}
```

### Variables CSS

```scss
--feyma-purple: #3D3180;  // Border activo
--feyma-gold: #DC9C2E;    // Dorado corporativo
--success: #10B981;       // Verde para "Incluido"
--danger: #EF4444;        // Rojo
--gray-light: #E5E7EB;    // Border normal
```

### Badge "RECOMENDADO"

```scss
.recommended-badge {
    position: absolute;
    top: -8px;
    right: -8px;
    background: linear-gradient(135deg, #F97316 0%, #EA580C 100%);
    color: white;
    font-size: 10px;
    font-weight: 700;
    text-transform: uppercase;
    box-shadow: 0 4px 12px rgba(249, 115, 22, 0.4);
}
```

## 🔧 Cómo Funciona

### 1. Renderizado (PHP)

El template `variable.php` itera sobre cada atributo del producto:

```php
foreach ( $attributes as $attribute_name => $options ) {
    // Renderiza el select oculto (requerido por WooCommerce)
    wc_dropdown_variation_attribute_options(...);

    // Calcula precios diferenciales
    foreach ( $available_variations as $variation ) {
        $price_diff = $variation_price - $min_price;
        $variation_prices[$attr_value] = $price_diff;
    }

    // Renderiza botones personalizados
    foreach ( $options as $option ) {
        echo '<div class="variation-option" data-value="'.$option.'">';
        // Badge "RECOMENDADO" si $price_diff === 0
        // "Incluido" con checkmark si $price_diff === 0
        // "+ $180.000" si $price_diff > 0
        echo '</div>';
    }
}
```

### 2. Interacción (JavaScript)

```javascript
// Click en botón
$('.variation-option').on('click', function() {
    const value = $(this).data('value');

    // Actualizar visual
    $options.removeClass('active');
    $(this).addClass('active');

    // Actualizar select oculto
    $select.val(value).trigger('change');
});

// WooCommerce actualiza precio y stock automáticamente
```

### 3. Sincronización

- Los botones actualizan el `<select>` oculto
- WooCommerce detecta el cambio con `.trigger('change')`
- WooCommerce actualiza:
  - Precio de la variación
  - Disponibilidad de stock
  - Imagen del producto
  - SKU y otros datos

## 📱 Responsive

### Desktop (> 768px)
```scss
grid-template-columns: repeat(auto-fill, minmax(160px, 1fr));
// Resultado: 3-4 botones por fila
```

### Mobile (< 767px)
```scss
grid-template-columns: 1fr;
// Resultado: 1 botón por fila, stack vertical
```

### Tablets (768px - 991px)
- Grid adaptable según espacio disponible
- Mantiene mínimo 160px por botón

## 🎯 Casos de Uso

### Producto con 3 atributos

**Memoria RAM:**
- 8GB DDR5 → + $0 (con badge "RECOMENDADO")
- 16GB DDR5 → Incluido (con checkmark verde)
- 32GB DDR5 → + $180.000

**Almacenamiento:**
- 512GB SSD → + $0
- 1TB SSD NVMe → Incluido (con checkmark)
- 2TB SSD NVMe → + $250.000

**Color:**
- Negro Eclipse → (círculo negro)
- Gris Mecha → (círculo gris)

### Producto Simple vs Variable

- **Producto Simple:** No muestra variaciones (comportamiento normal)
- **Producto Variable:** Muestra botones personalizados
- **Producto Agrupado:** No afectado
- **Producto Externo:** No afectado

## 🚀 Ventajas del Sistema

### UX Mejorada
1. **Visual Claro:** Usuario ve todas las opciones de un vistazo
2. **Precios Transparentes:** Diferencias de precio visibles inmediatamente
3. **Menos Clicks:** Un click vs dos (abrir dropdown + seleccionar)
4. **Mobile-First:** Botones grandes fáciles de tocar en móviles

### Conversión
1. **Destacar Opción Recomendada:** Badge naranja atrae la vista
2. **"Incluido" Genera Valor:** Checkmark verde implica oferta
3. **Precios Incrementales:** Usuario entiende exactamente cuánto más paga

### Técnico
1. **Sin Plugins:** Todo nativo con WooCommerce API
2. **Sin Conflictos:** No modifica core de WooCommerce
3. **Actualizable:** Compatible con futuras versiones de WooCommerce
4. **Performance:** JavaScript liviano, solo carga en productos

## 🐛 Troubleshooting

### Los botones no aparecen

**Problema:** Se siguen viendo los selects
**Solución:**
1. Verifica que el archivo `variable.php` esté en la ruta correcta
2. Limpia caché de WordPress/servidor
3. Compila SCSS: `sass main.scss:../css/main.css --style=compressed`

### Los precios no se actualizan

**Problema:** Click en botón no cambia el precio
**Solución:**
1. Verifica que el JS se está cargando: DevTools > Network
2. Revisa consola de errores: DevTools > Console
3. Asegúrate que jQuery está disponible

### Badge "RECOMENDADO" aparece en todos

**Problema:** Todos los botones tienen el badge naranja
**Solución:**
- El badge solo debe aparecer en opciones con `$price_diff === 0`
- Verifica la lógica en `variable.php` línea ~75

### Opciones no disponibles se pueden clickear

**Problema:** Variaciones fuera de stock son clickeables
**Solución:**
- El JS debe deshabilitar opciones no disponibles
- Verifica función `updateButtonsAvailability()` en el JS

## 📊 Compatibilidad

### WooCommerce
- ✅ WooCommerce 6.0+
- ✅ WooCommerce 7.0+
- ✅ WooCommerce 8.0+

### WordPress
- ✅ WordPress 6.0+
- ✅ WordPress 6.1+
- ✅ WordPress 6.2+

### Themes
- ✅ Bootscore 6.0+
- ⚠️ Otros themes: Requiere adaptar estilos

### Navegadores
- ✅ Chrome/Edge (últimas 2 versiones)
- ✅ Firefox (últimas 2 versiones)
- ✅ Safari (últimas 2 versiones)
- ✅ iOS Safari
- ✅ Chrome Android

## 🔄 Actualizaciones Futuras

### Fase 2 (Opcional)
- [ ] Animación de cambio de imagen principal
- [ ] Tooltip con descripción de variación
- [ ] Comparación de especificaciones
- [ ] Variaciones en grid tipo tabla

### Fase 3 (Opcional)
- [ ] Guardar configuración en localStorage
- [ ] Compartir configuración específica por URL
- [ ] Calculadora de financiación integrada

## 📝 Mantenimiento

### Actualizar WooCommerce

1. **Antes de actualizar:**
   - Hacer backup de `variable.php`
   - Revisar changelog de WooCommerce

2. **Después de actualizar:**
   - Verificar que botones funcionan
   - Revisar nueva versión del template original
   - Comparar y mergear cambios si es necesario

### Modificar Estilos

1. **Editar SCSS:**
   ```bash
   cd bootscore-child-feyma/assets/scss
   # Editar _bootscore-producto.scss
   ```

2. **Compilar:**
   ```bash
   sass main.scss:../css/main.css --style=compressed
   ```

3. **Limpiar caché:**
   - WordPress cache
   - Browser cache (Ctrl+Shift+R)
   - CDN cache si aplica

### Agregar Nuevos Atributos

Los nuevos atributos se manejan automáticamente:

1. Crear atributo en WooCommerce
2. Agregar variaciones con el atributo
3. El sistema detectará y renderizará botones

**Para colores:** El nombre del atributo debe contener "color" o "colour"

## 💡 Tips de Configuración

### Nombres de Atributos Recomendados

```
✅ Memoria RAM
✅ Almacenamiento
✅ Color
✅ Procesador
✅ Tamaño de Pantalla
✅ Tarjeta Gráfica

❌ RAM  (muy corto)
❌ Configuración de Memoria RAM DDR5  (muy largo)
```

### Valores de Atributos

```
✅ 16GB DDR5
✅ 1TB SSD NVMe
✅ Negro Eclipse

❌ 16  (falta contexto)
❌ DDR5 de 16 Gigabytes  (muy largo)
```

### Organización de Variaciones

1. **Más vendido primero:** La opción con `$price_diff = 0` debería ser la más popular
2. **Orden lógico:** Menos a más (8GB → 16GB → 32GB)
3. **Máximo 4-5 opciones por atributo:** Más opciones pueden abrumar

## 🎓 Recursos

### Documentación Oficial
- [WooCommerce Variable Products](https://woocommerce.com/document/variable-product/)
- [WooCommerce Template Structure](https://woocommerce.com/document/template-structure/)
- [Bootstrap Icons](https://icons.getbootstrap.com/)

### Ejemplos de Referencia
- Apple Store (configuradores)
- Mercado Libre (variaciones)
- Amazon (selección de opciones)

---

**Desarrollado para FEYMA.AR**
Sistema de variaciones moderno para e-commerce de tecnología

**Stack:** WooCommerce + Bootscore + Bootstrap 5 + jQuery
**Versión:** 1.0.0
**Fecha:** 2026-01-29
