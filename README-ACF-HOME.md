# 🏠 Configuración Home Dinámica con ACF PRO

## 📋 Descripción

Sistema completo de gestión dinámica para todas las secciones de la página de inicio usando ACF PRO. Permite configurar desde el admin de WordPress:

- ✅ Hero Carousel (slides, imágenes, textos, botones, specs)
- ✅ Categorías Destacadas (nombre, icono, color, descripción)
- ✅ Productos Seleccionados (selección manual de 8 productos)
- ✅ Productos Destacados Carousel (selección manual de productos)
- ✅ Features "Por qué elegirnos" (icono, título, descripción, color)
- ✅ Marcas (nombre, logo)
- ✅ Testimonios (nombre, ubicación, rating, texto, producto, avatar)
- ✅ Estadísticas (números destacados)

---

## 🚀 Instalación - Paso a Paso

### PASO 1: Verificar ACF PRO instalado

Asegúrate de tener **ACF PRO** instalado y activado en WordPress.

> **Importante:** Este sistema requiere la versión PRO de Advanced Custom Fields. La versión gratuita no es suficiente.

---

### PASO 2: Importar los campos ACF

1. Ir a **WordPress Admin → Custom Fields → Tools**
2. Pestaña **"Import Field Groups"**
3. Abrir el archivo: `bootscore-child-feyma/acf-json/group_home_settings.json`
4. Copiar todo el contenido del archivo JSON
5. Pegarlo en el campo de texto de ACF
6. Click en **"Import JSON"**

✅ Verás un mensaje de éxito: *"1 field group imported"*

---

### PASO 3: Verificar que los campos estén importados

1. Ir a **WordPress Admin → Custom Fields → Field Groups**
2. Deberías ver: **"Configuración de Home - FEYMA"**
3. Click para editarlo y verificar que tiene todos estos campos:
   - Hero Carousel - Slides
   - Categorías Destacadas
   - Productos Seleccionados (Grid 8 productos)
   - Productos Destacados (Carousel)
   - Por Qué Elegirnos - Features
   - Marcas Destacadas
   - Testimonios de Clientes
   - Estadísticas

---

### PASO 4: Configurar el template de la página

**Opción A - Usar el nuevo template (recomendado):**

1. Ir a **WordPress Admin → Páginas → Tu página de inicio**
2. En **"Atributos de página"** → **"Plantilla"**
3. Seleccionar: **"Inicio (con ACF PRO)"**
4. Click en **"Actualizar"**

**Opción B - Reemplazar el template actual:**

```bash
# Backup del original
mv page-inicio.php page-inicio-hardcoded-backup.php

# Renombrar el nuevo template
mv page-inicio-acf.php page-inicio.php
```

---

### PASO 5: Configurar las secciones de la home

1. Ir a **WordPress Admin → Home (ACF)** (en el menú lateral, arriba)
2. Verás todas las secciones para configurar
3. Completar cada sección según tus necesidades

---

## ⚙️ Guía de Configuración por Sección

### 🎠 Hero Carousel - Slides

**Recomendado: 3-4 slides**

Para cada slide configura:

| Campo | Descripción | Ejemplo |
|-------|-------------|---------|
| **Texto del Badge** | Etiqueta superior pequeña | "Nuevos Arrivals 2025" |
| **Icono del Badge** | Icono Bootstrap (sin `bi-`) | "lightning-charge-fill" |
| **Título Principal** | Primera línea del título | "Potencia" |
| **Título con Gradiente** | Segunda línea (con efecto) | "ilimitada." |
| **Descripción** | Texto descriptivo (admite `<br>`) | "Notebooks de última generación..." |
| **Texto del Botón** | Texto del CTA principal | "Ver Notebooks" |
| **Link del Botón** | URL del botón | Link a categoría/página |
| **Imagen del Producto** | Imagen principal (600x400px PNG) | Notebook/Gaming/Apple |
| **Especificaciones** | 3 specs técnicas máx | CPU, GPU, etc. |
| **Tema del Slide** | Color scheme | Default / Gaming / Apple |

**Iconos Bootstrap recomendados para badges:**
- `lightning-charge-fill` - Tech/Nuevos
- `controller` - Gaming
- `apple` - Apple
- `star-fill` - Destacado
- `fire` - Hot/Ofertas

---

### 📁 Categorías Destacadas

**Recomendado: 4 categorías**

| Campo | Descripción | Ejemplo |
|-------|-------------|---------|
| **Nombre** | Nombre de la categoría | "Gaming" |
| **Slug** | Slug de categoría/tag WC | "gaming" |
| **Icono** | Icono Bootstrap (sin `bi-`) | "controller" |
| **Color** | Color del icono (hex) | #3D3180 |
| **Contador** | Texto informativo | "120+ productos" |
| **Descripción** | Descripción breve | "Alto rendimiento extremo" |

**Iconos recomendados:**
- `controller` - Gaming
- `palette` - Diseño
- `briefcase` - Oficina
- `apple` - Apple
- `laptop` - Notebooks
- `pc-display` - PCs

---

### 🛍️ Productos Seleccionados (Grid 8)

1. Click en **"+ Agregar Producto"**
2. Buscar el producto por nombre
3. Seleccionar hasta 8 productos
4. Click en **"Actualizar"**

> **Nota:** Si no seleccionas ninguno, se mostrarán automáticamente productos "featured" aleatorios.

---

### ⭐ Productos Destacados (Carousel)

Igual que "Productos Seleccionados" pero para el carousel inferior.

1. Seleccionar productos manualmente
2. O dejar vacío para usar productos "featured"

---

### 💎 Por Qué Elegirnos - Features

**Recomendado: 6 features**

| Campo | Descripción | Ejemplo |
|-------|-------------|---------|
| **Icono** | Icono Bootstrap (sin `bi-`) | "shield-check" |
| **Título** | Título del feature | "Garantía Extendida" |
| **Descripción** | Descripción del beneficio | "2 años de garantía..." |
| **Color del Icono** | Color de fondo del icono | #3D3180 |

**Iconos recomendados:**
- `shield-check` - Garantía
- `truck` - Envío
- `credit-card` - Pagos
- `headset` - Soporte
- `arrow-repeat` - Cambios/Devoluciones
- `patch-check` - Originales/Calidad

---

### 🏷️ Marcas Destacadas

**Recomendado: 10-15 marcas**

| Campo | Descripción | Formato |
|-------|-------------|---------|
| **Nombre** | Nombre de la marca | "Apple" |
| **Logo** | Logo (SVG/PNG transparente) | Recomendado: SVG |

**Tamaño recomendado de logos:** 200x80px (ancho x alto)

---

### 💬 Testimonios de Clientes

**Recomendado: 3-6 testimonios**

| Campo | Descripción | Ejemplo |
|-------|-------------|---------|
| **Nombre** | Nombre del cliente | "Martín González" |
| **Ubicación** | Ciudad/Provincia | "Buenos Aires" |
| **Calificación** | Estrellas 1-5 | 5 |
| **Avatar** | Iniciales (2 letras) | "MG" |
| **Producto** | Producto que compró | "Notebook MSI Katana" |
| **Testimonio** | Texto de la reseña | "Excelente atención..." |

---

### 📊 Estadísticas

**Recomendado: 4 stats**

| Campo | Descripción | Ejemplo |
|-------|-------------|---------|
| **Número** | Número destacado | "15K+" |
| **Etiqueta** | Descripción | "Clientes Felices" |

**Ejemplos:**
- `15K+` - Clientes Felices
- `4.9` - Rating Promedio
- `500+` - Productos
- `98%` - Satisfacción

---

## 🎨 Personalización Avanzada

### Temas de Hero Slides

Los slides soportan 3 temas visuales:

1. **Default (Púrpura/Oro)** - Tecnología general
   - Badge: Púrpura (#3D3180)
   - Glow: Púrpura/Oro
   - Gradiente: Púrpura → Oro

2. **Gaming (Rojo)** - Para productos gaming
   - Badge: Rojo (#EF4444)
   - Glow: Rojo intenso
   - Gradiente: Rojo → Rosa

3. **Apple (Gris oscuro)** - Para productos Apple
   - Badge: Gris oscuro (#1A1A1A)
   - Glow: Blanco suave
   - Gradiente: Gris → Blanco

---

## 📂 Estructura de Archivos

```
bootscore-child-feyma/
│
├── inc/
│   └── acf-options-home.php          # Registro de Options Page
│
├── acf-json/
│   └── group_home_settings.json      # Campos ACF para importar
│
├── page-inicio-acf.php                # Template dinámico con ACF
├── page-inicio.php                    # Template original (backup)
│
└── README-ACF-HOME.md                 # Esta guía
```

---

## 🔧 Funciones Helper

El archivo `inc/acf-options-home.php` incluye una función helper:

```php
// Obtener un campo de las opciones de home
feyma_get_home_option( 'hero_carousel', [] );
```

Uso:
```php
$hero_slides = feyma_get_home_option('hero_carousel', []);
$categories = feyma_get_home_option('categories', []);
```

---

## ❓ Preguntas Frecuentes

### ¿Puedo mezclar productos manuales y automáticos?

No, si seleccionas productos manualmente en ACF, esos serán los únicos que se muestren. Si quieres volver a modo automático, simplemente vacía el campo.

### ¿Cuántos slides recomiendas en el hero?

**3-4 slides máximo**. Más de 4 puede cansar al usuario.

### ¿Puedo usar imágenes JPG en vez de PNG?

Sí, pero PNG con fondo transparente se ve mejor con los efectos de glow.

### ¿Cómo encuentro el slug de una categoría?

1. Ir a **Productos → Categorías** (o **Etiquetas**)
2. Editar la categoría
3. El slug aparece en la URL: `?taxonomy=product_cat&tag_ID=123&post_type=product&**slug=gaming**`

### ¿Los cambios se reflejan inmediatamente?

Sí, al guardar en **Home (ACF)** los cambios se ven de inmediato en la home.

### ¿Puedo reordenar los elementos?

Sí, en los repeaters (Hero, Categorías, Features, etc.) puedes arrastrar las filas para reordenarlas.

---

## 🎯 Checklist de Configuración Inicial

Usa esta checklist para configurar tu home por primera vez:

- [ ] ACF PRO instalado y activado
- [ ] JSON importado en **Custom Fields → Tools**
- [ ] Template **"Inicio (con ACF PRO)"** asignado a la página de inicio
- [ ] 3 slides configurados en **Hero Carousel**
- [ ] 4 categorías configuradas
- [ ] 8 productos seleccionados para el grid
- [ ] Productos para el carousel (manual o automático)
- [ ] 6 features configuradas en "Por qué elegirnos"
- [ ] 10-12 logos de marcas subidos
- [ ] 3 testimonios agregados
- [ ] 4 estadísticas configuradas

---

## 📞 Soporte

Si tienes problemas con la configuración:

1. Verifica que ACF PRO esté activado
2. Asegúrate de haber importado el JSON completo
3. Comprueba que el template correcto esté asignado
4. Revisa la consola del navegador por errores JavaScript

---

## 🎉 ¡Listo!

Tu home ahora es 100% dinámica. Todos los cambios se hacen desde **WordPress Admin → Home (ACF)** sin tocar código.

**Próximos pasos recomendados:**
1. Subir imágenes de productos en alta calidad (PNG transparente)
2. Subir logos de marcas (SVG preferiblemente)
3. Completar todos los testimonios con datos reales
4. Ajustar colores según tu paleta de marca

---

**Versión:** 1.0
**Fecha:** Enero 2026
**Autor:** FEYMA Development Team
