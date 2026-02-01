# Hero Slider V2 - Guía de Configuración

## 🎯 Características

- **Altura:** 670px
- **Layout:** Imagen 40% izquierda | Texto 60% derecha
- **Carousel:** Transiciones cada 7 segundos
- **Animaciones:** Badge, título, descripción, botón e imagen
- **Marquesina:** Logos de pago con scroll infinito
- **Responsive:** Optimizado para todos los dispositivos

## 📋 Importar Campos ACF

### Paso 1: Importar el JSON

1. Ve a **WordPress Admin** > **Custom Fields** > **Tools**
2. Click en **Import Field Groups**
3. Selecciona el archivo: `acf-hero-slider-v2.json`
4. Click en **Import**

### Paso 2: Configurar Options Page (si no existe)

Si no tienes una Options Page llamada "Home (ACF)", créala:

```php
// Agregar en functions.php si no existe
if( function_exists('acf_add_options_page') ) {
    acf_add_options_page(array(
        'page_title'  => 'Home (ACF)',
        'menu_title'  => 'Home (ACF)',
        'menu_slug'   => 'acf-options-home',
        'capability'  => 'edit_posts',
        'icon_url'    => 'dashicons-admin-home',
        'redirect'    => false
    ));
}
```

### Paso 3: Configurar los Slides

1. Ve a **WordPress Admin** > **Home (ACF)**
2. Verás el repeater **"Slides del Hero Carousel"**
3. Click en **"Agregar Slide"**

## 🎨 Campos de cada Slide

### 1️⃣ **Tema de color**
- **Opciones:** Dorado (default), Azul, Verde, Rojo, Púrpura
- **Afecta:** Badge, gradiente del título y botón
- **Recomendado:** Usar "default" (dorado) para consistencia con la marca

### 2️⃣ **Imagen del Producto** (Requerido)
- **Ubicación:** Lado IZQUIERDO del slider
- **Tamaño recomendado:** 500x400px o 600x500px
- **Formato:** PNG con fondo transparente (preferible) o JPG
- **Peso:** Máximo 200KB para mejor rendimiento
- **Tip:** La imagen tendrá efecto de flotación animado

### 3️⃣ **Badge**
- **Badge Text:** Texto corto (ej: "NUEVO", "HOT SALE", "OFERTA")
- **Badge Icon:** Nombre del icono de Bootstrap Icons sin "bi-"
  - Ejemplos: `lightning-charge`, `fire`, `star-fill`, `tag-fill`
  - Ver todos los iconos: https://icons.getbootstrap.com/
- **Animación:** slideInDown con efecto bounce

### 4️⃣ **Título Principal**
- **Title:** Primera parte (en blanco)
  - Ejemplo: "Las Mejores"
  - Máximo: 50 caracteres
- **Title Gradient:** Segunda parte (con gradiente dorado)
  - Ejemplo: "Notebooks Gaming"
  - Máximo: 50 caracteres
- **Resultado:** "Las Mejores **Notebooks Gaming**" (la segunda parte con gradiente)
- **Animación:** slideInLeft con delay

### 5️⃣ **Descripción**
- **Texto:** Máximo 150 caracteres (2 líneas recomendado)
- **Ejemplo:** "Procesadores de última generación y tarjetas gráficas RTX para llevar tu experiencia gaming al siguiente nivel."
- **Animación:** fadeIn suave

### 6️⃣ **Botón de Acción**
- **Button Text:** Texto del botón (ej: "Ver Productos", "Comprar Ahora")
- **Button Link:** URL completa (ej: `/tienda/notebooks-gaming/`)
- **Animación:** slideInUp
- **Efecto hover:** Expansión con gradiente dorado

## 📱 Responsive Breakpoints

### Desktop (> 991px)
- Altura: 670px
- Imagen: 40% izquierda
- Texto: 60% derecha

### Tablet (768px - 991px)
- Altura: auto (min 600px)
- Imagen: más compacta (350px)
- Padding reducido

### Mobile (< 767px)
- Min-height: 550px
- **Orden invertido:** Texto arriba, imagen abajo
- Título: 28px
- Stack vertical

### Extra Small (< 575px)
- Título: 24px
- Badge más pequeño
- Controles compactos

## 🎬 Animaciones

Cada slide tiene animaciones automáticas:

1. **Badge:** Baja desde arriba (0s)
2. **Título:** Entra desde izquierda (0.2s delay)
3. **Descripción:** Fade in (0.4s delay)
4. **Botón:** Sube desde abajo (0.6s delay)
5. **Imagen:** Flotación continua infinita

## 🎯 Temas de Color Disponibles

### Default (Dorado) - Recomendado
- Badge: Fondo dorado (#F7B32B)
- Gradiente: Dorado a naranja
- Botón: Dorado con hover más oscuro

### Blue (Azul)
- Badge: Fondo azul (#3B82F6)
- Gradiente: Azul brillante
- Botón: Azul con hover

### Green (Verde)
- Badge: Fondo verde (#10B981)
- Gradiente: Verde a esmeralda
- Botón: Verde con hover

### Red (Rojo)
- Badge: Fondo rojo (#EF4444)
- Gradiente: Rojo a rosa
- Botón: Rojo con hover

### Purple (Púrpura)
- Badge: Fondo púrpura (#8B5CF6)
- Gradiente: Púrpura a violeta
- Botón: Púrpura con hover

## 💳 Marquesina de Pagos

La marquesina debajo del slider es **hardcodeada** en `page-inicio-acf.php` (líneas 134-197).

### Elementos incluidos:
- Hasta 12 cuotas sin interés
- Logos: Visa, MasterCard, Amex, MercadoPago, Naranja
- Envíos gratis
- Compra 100% segura

### Para personalizar:
Edita el archivo `page-inicio-acf.php` y modifica los items de la marquesina.

## 🖼️ Imágenes de Logos de Pago

Asegúrate de tener estos archivos SVG en:
```
bootscore-child-feyma/assets/images/payment/
├── visa.svg
├── mastercard.svg
├── amex.svg
├── mercadopago.svg
└── naranja.svg
```

Si no los tienes, los items mostrarán solo los iconos de Bootstrap Icons.

## 🚀 Ejemplo de Configuración

### Slide 1: Gaming
- **Tema:** Default (Dorado)
- **Badge Text:** "NUEVA TEMPORADA"
- **Badge Icon:** "lightning-charge"
- **Title:** "Las Mejores"
- **Title Gradient:** "Notebooks Gaming"
- **Description:** "Procesadores de última generación y tarjetas gráficas RTX para llevar tu experiencia gaming al siguiente nivel."
- **Button Text:** "Ver Gaming"
- **Button Link:** "/tienda/gaming/"
- **Imagen:** notebook-gaming.png (500x400px, PNG transparente)

### Slide 2: Ofertas
- **Tema:** Red (Rojo)
- **Badge Text:** "HOT SALE"
- **Badge Icon:** "fire"
- **Title:** "Ofertas"
- **Title Gradient:** "Irresistibles"
- **Description:** "Descuentos de hasta 40% en productos seleccionados. Stock limitado."
- **Button Text:** "Ver Ofertas"
- **Button Link:** "/ofertas/"
- **Imagen:** productos-oferta.png

### Slide 3: Componentes
- **Tema:** Blue (Azul)
- **Badge Text:** "NUEVO"
- **Badge Icon:** "star-fill"
- **Title:** "Componentes"
- **Title Gradient:** "de Última Generación"
- **Description:** "Arma tu PC con los mejores componentes del mercado."
- **Button Text:** "Armar PC"
- **Button Link:** "/tienda/componentes/"
- **Imagen:** componentes.png

## ⚡ Tips de Optimización

1. **Imágenes:**
   - Usa WebP cuando sea posible
   - Comprime las imágenes (TinyPNG, ImageOptim)
   - PNG transparente para productos

2. **Textos:**
   - Títulos cortos y directos (máx 10 palabras)
   - Descripciones concisas (2 líneas máx)
   - Usa palabras clave

3. **Performance:**
   - No uses más de 3-4 slides
   - Limita peso de imágenes a 200KB c/u
   - El carousel usa lazy loading automático

4. **UX:**
   - Usa temas de color coherentes con la marca
   - Ordena slides por importancia (el primero es el más visible)
   - Asegúrate que los links funcionen correctamente

## 🔧 Compilación SCSS

El SCSS se compila automáticamente en el theme padre Bootscore.

Si necesitas compilar manualmente:
```bash
cd bootscore-child-feyma/assets/scss
sass main.scss:../css/main.css --style=compressed
```

## 📞 Soporte

Si tienes problemas:
1. Verifica que ACF PRO esté activado
2. Asegúrate de tener al menos 1 slide configurado
3. Revisa que las imágenes estén subidas correctamente
4. Comprueba que la Options Page "Home (ACF)" exista
5. Limpia el caché de WordPress/plugins de caché

## 📄 Archivos Relacionados

```
bootscore-child-feyma/
├── acf-hero-slider-v2.json          # JSON para importar
├── page-inicio-acf.php              # Template de la home
├── assets/
│   ├── scss/
│   │   ├── _hero-slider-v2.scss     # Estilos del slider
│   │   └── main.scss                # Importa hero-slider-v2
│   └── images/
│       └── payment/                 # Logos de pago (SVG)
└── README-HERO-SLIDER-V2.md         # Este archivo
```

---

✨ **¡Listo!** Tu Hero Slider V2 está configurado y listo para usar.
