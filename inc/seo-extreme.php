<?php
/**
 * SEO EXTREMO - Sistema Completo de Optimización
 *
 * Implementa:
 * - Meta Tags dinámicos (title, description, keywords, robots, canonical)
 * - Open Graph para Facebook/LinkedIn
 * - Twitter Cards
 * - Schema.org markup (Product, Organization, BreadcrumbList, Review, AggregateRating)
 * - Rich Snippets
 * - Optimización automática cuando no hay datos manuales
 *
 * @package Bootscore Child
 * @version 1.0.0
 */

// Exit if accessed directly
defined('ABSPATH') || exit;

// ============================================
// 1. META TAGS DINÁMICOS
// ============================================

/**
 * Output meta tags in head
 */
add_action('wp_head', 'feyma_seo_meta_tags', 1);
function feyma_seo_meta_tags() {
    // No aplicar en admin
    if (is_admin()) return;

    // Obtener datos
    $meta_title = feyma_get_meta_title();
    $meta_description = feyma_get_meta_description();
    $meta_keywords = feyma_get_meta_keywords();
    $canonical_url = feyma_get_canonical_url();
    $robots = feyma_get_robots_meta();

    // Output
    ?>
    <!-- SEO EXTREMO - Meta Tags -->
    <meta name="description" content="<?php echo esc_attr($meta_description); ?>">
    <?php if ($meta_keywords) : ?>
    <meta name="keywords" content="<?php echo esc_attr($meta_keywords); ?>">
    <?php endif; ?>
    <meta name="robots" content="<?php echo esc_attr($robots); ?>">
    <link rel="canonical" href="<?php echo esc_url($canonical_url); ?>">
    <?php
}

/**
 * Get optimized meta title
 */
function feyma_get_meta_title() {
    global $post;

    if (is_singular('product') && $post) {
        // Intenta obtener título personalizado de ACF
        $custom_title = get_field('seo_title', $post->ID);

        if ($custom_title) {
            return $custom_title;
        }

        // Generar automáticamente
        $product = wc_get_product($post->ID);
        $title = $product->get_name();
        $price = $product->get_price();

        // Formato: Producto | Precio | FEYMA
        if ($price) {
            return $title . ' | $' . number_format($price, 0, ',', '.') . ' | FEYMA';
        }

        return $title . ' | FEYMA - Tecnología Argentina';
    }

    if (is_singular()) {
        return get_the_title() . ' | ' . get_bloginfo('name');
    }

    if (is_home()) {
        return get_bloginfo('name') . ' | ' . get_bloginfo('description');
    }

    if (is_archive()) {
        return get_the_archive_title() . ' | ' . get_bloginfo('name');
    }

    return get_bloginfo('name');
}

/**
 * Get optimized meta description
 */
function feyma_get_meta_description() {
    global $post;

    if (is_singular('product') && $post) {
        // Intenta obtener descripción personalizada de ACF
        $custom_desc = get_field('seo_description', $post->ID);

        if ($custom_desc) {
            return $custom_desc;
        }

        // Generar automáticamente
        $product = wc_get_product($post->ID);
        $short_desc = $product->get_short_description();

        if ($short_desc) {
            $clean_desc = wp_strip_all_tags($short_desc);
            $clean_desc = substr($clean_desc, 0, 140);
            return $clean_desc . ' Envío gratis. 12 cuotas sin interés. Garantía oficial FEYMA.';
        }

        return 'Comprá ' . $product->get_name() . ' en FEYMA. Tecnología de última generación. Envío gratis. 12 cuotas sin interés. Garantía oficial.';
    }

    if (is_singular() && $post) {
        $excerpt = get_the_excerpt($post);
        if ($excerpt) {
            return wp_trim_words($excerpt, 25, '...');
        }
    }

    if (is_home()) {
        return 'FEYMA - Tecnología Argentina. Notebooks, PCs Gaming, Componentes. Envío gratis. 12 cuotas sin interés. Asesoramiento profesional.';
    }

    return get_bloginfo('description');
}

/**
 * Get meta keywords
 */
function feyma_get_meta_keywords() {
    global $post;

    if (is_singular('product') && $post) {
        // Intenta obtener keywords personalizadas de ACF
        $custom_keywords = get_field('seo_keywords', $post->ID);

        if ($custom_keywords) {
            return $custom_keywords;
        }

        // Generar automáticamente desde categorías y tags
        $product = wc_get_product($post->ID);
        $keywords = [];

        // Agregar nombre del producto
        $keywords[] = strtolower($product->get_name());

        // Agregar categorías
        $categories = get_the_terms($post->ID, 'product_cat');
        if ($categories && !is_wp_error($categories)) {
            foreach ($categories as $cat) {
                $keywords[] = strtolower($cat->name);
            }
        }

        // Agregar tags
        $tags = get_the_terms($post->ID, 'product_tag');
        if ($tags && !is_wp_error($tags)) {
            foreach (array_slice($tags, 0, 3) as $tag) {
                $keywords[] = strtolower($tag->name);
            }
        }

        return implode(', ', array_unique($keywords));
    }

    return '';
}

/**
 * Get canonical URL
 */
function feyma_get_canonical_url() {
    global $post;

    if (is_singular() && $post) {
        // Intenta obtener canonical personalizada de ACF
        $custom_canonical = get_field('seo_canonical', $post->ID);

        if ($custom_canonical) {
            return $custom_canonical;
        }

        return get_permalink($post->ID);
    }

    if (is_home()) {
        return home_url('/');
    }

    return get_pagenum_link();
}

/**
 * Get robots meta
 */
function feyma_get_robots_meta() {
    global $post;

    if (is_singular() && $post) {
        $robots = get_field('seo_robots', $post->ID);

        if ($robots && $robots !== 'index_follow') {
            return str_replace('_', ', ', $robots);
        }
    }

    return 'index, follow, max-image-preview:large, max-snippet:-1, max-video-preview:-1';
}

// ============================================
// 2. OPEN GRAPH (Facebook, LinkedIn)
// ============================================

add_action('wp_head', 'feyma_seo_open_graph', 2);
function feyma_seo_open_graph() {
    if (is_admin()) return;

    global $post;

    $og_title = feyma_get_og_title();
    $og_description = feyma_get_og_description();
    $og_image = feyma_get_og_image();
    $og_url = feyma_get_canonical_url();
    $og_type = is_singular('product') ? 'product' : 'website';
    $og_site_name = get_bloginfo('name');

    ?>
    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="<?php echo esc_attr($og_type); ?>">
    <meta property="og:title" content="<?php echo esc_attr($og_title); ?>">
    <meta property="og:description" content="<?php echo esc_attr($og_description); ?>">
    <meta property="og:url" content="<?php echo esc_url($og_url); ?>">
    <meta property="og:site_name" content="<?php echo esc_attr($og_site_name); ?>">
    <meta property="og:image" content="<?php echo esc_url($og_image); ?>">
    <meta property="og:image:width" content="1200">
    <meta property="og:image:height" content="630">
    <meta property="og:locale" content="es_AR">
    <?php

    // Product specific OG tags
    if (is_singular('product') && $post) {
        $product = wc_get_product($post->ID);
        $price = $product->get_price();
        $currency = get_woocommerce_currency();
        $availability = $product->is_in_stock() ? 'instock' : 'outofstock';

        ?>
        <meta property="product:price:amount" content="<?php echo esc_attr($price); ?>">
        <meta property="product:price:currency" content="<?php echo esc_attr($currency); ?>">
        <meta property="product:availability" content="<?php echo esc_attr($availability); ?>">
        <?php
    }
}

function feyma_get_og_title() {
    global $post;

    if (is_singular() && $post) {
        $custom_og = get_field('og_title', $post->ID);
        if ($custom_og) return $custom_og;

        $seo_title = get_field('seo_title', $post->ID);
        if ($seo_title) return $seo_title;
    }

    return feyma_get_meta_title();
}

function feyma_get_og_description() {
    global $post;

    if (is_singular() && $post) {
        $custom_og = get_field('og_description', $post->ID);
        if ($custom_og) return $custom_og;
    }

    return feyma_get_meta_description();
}

function feyma_get_og_image() {
    global $post;

    if (is_singular() && $post) {
        // Imagen personalizada de ACF
        $custom_image = get_field('og_image', $post->ID);
        if ($custom_image && isset($custom_image['url'])) {
            return $custom_image['url'];
        }

        // Imagen destacada del producto
        if (has_post_thumbnail($post->ID)) {
            $image = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'full');
            if ($image) {
                return $image[0];
            }
        }
    }

    // Fallback: logo del sitio
    return get_stylesheet_directory_uri() . '/assets/images/logo-feyma-footer.svg';
}

// ============================================
// 3. TWITTER CARDS
// ============================================

add_action('wp_head', 'feyma_seo_twitter_cards', 3);
function feyma_seo_twitter_cards() {
    if (is_admin()) return;

    $twitter_card = is_singular('product') ? 'summary_large_image' : 'summary';
    $twitter_title = feyma_get_og_title();
    $twitter_description = feyma_get_og_description();
    $twitter_image = feyma_get_og_image();

    ?>
    <!-- Twitter Card -->
    <meta name="twitter:card" content="<?php echo esc_attr($twitter_card); ?>">
    <meta name="twitter:title" content="<?php echo esc_attr($twitter_title); ?>">
    <meta name="twitter:description" content="<?php echo esc_attr($twitter_description); ?>">
    <meta name="twitter:image" content="<?php echo esc_url($twitter_image); ?>">
    <?php
}

// ============================================
// 4. SCHEMA.ORG MARKUP (Rich Snippets)
// ============================================

add_action('wp_footer', 'feyma_seo_schema_markup', 99);
function feyma_seo_schema_markup() {
    if (is_admin()) return;

    // Organization Schema (todas las páginas)
    feyma_output_organization_schema();

    // BreadcrumbList Schema
    if (is_singular('product')) {
        feyma_output_breadcrumb_schema();
    }

    // Product Schema (solo productos)
    if (is_singular('product')) {
        feyma_output_product_schema();
    }
}

/**
 * Organization Schema
 */
function feyma_output_organization_schema() {
    $schema = [
        '@context' => 'https://schema.org',
        '@type' => 'Organization',
        'name' => 'FEYMA',
        'url' => home_url('/'),
        'logo' => get_stylesheet_directory_uri() . '/assets/images/logo-feyma-footer.svg',
        'sameAs' => [
            // Agregar redes sociales si las tienes
            // 'https://www.facebook.com/feyma',
            // 'https://www.instagram.com/feyma',
        ],
        'contactPoint' => [
            '@type' => 'ContactPoint',
            'contactType' => 'customer service',
            'areaServed' => 'AR',
            'availableLanguage' => 'Spanish'
        ]
    ];

    echo '<script type="application/ld+json">' . wp_json_encode($schema, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE) . '</script>' . "\n";
}

/**
 * BreadcrumbList Schema
 */
function feyma_output_breadcrumb_schema() {
    global $post;

    $items = [
        [
            '@type' => 'ListItem',
            'position' => 1,
            'name' => 'Inicio',
            'item' => home_url('/')
        ]
    ];

    $position = 2;

    // Categorías del producto
    $categories = get_the_terms($post->ID, 'product_cat');
    if ($categories && !is_wp_error($categories)) {
        $main_cat = $categories[0];
        $items[] = [
            '@type' => 'ListItem',
            'position' => $position++,
            'name' => $main_cat->name,
            'item' => get_term_link($main_cat)
        ];
    }

    // Producto actual
    $breadcrumb_title = get_field('breadcrumb_title', $post->ID);
    $product_title = $breadcrumb_title ? $breadcrumb_title : get_the_title($post->ID);

    $items[] = [
        '@type' => 'ListItem',
        'position' => $position,
        'name' => $product_title,
        'item' => get_permalink($post->ID)
    ];

    $schema = [
        '@context' => 'https://schema.org',
        '@type' => 'BreadcrumbList',
        'itemListElement' => $items
    ];

    echo '<script type="application/ld+json">' . wp_json_encode($schema, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE) . '</script>' . "\n";
}

/**
 * Product Schema (Rich Snippet)
 */
function feyma_output_product_schema() {
    global $post;

    $product = wc_get_product($post->ID);
    if (!$product) return;

    // Datos básicos
    $name = $product->get_name();
    $description = wp_strip_all_tags($product->get_short_description() ?: $product->get_description());
    $description = substr($description, 0, 300);
    $image = wp_get_attachment_image_url($product->get_image_id(), 'full');
    $url = get_permalink($post->ID);

    // SKU y GTIN
    $sku = get_field('schema_sku', $post->ID) ?: $product->get_sku();
    $gtin = get_field('schema_gtin', $post->ID);

    // Marca
    $brand = get_field('schema_brand', $post->ID);
    if (!$brand) {
        // Intentar obtener de atributos o tags
        $tags = get_the_terms($post->ID, 'product_tag');
        if ($tags && !is_wp_error($tags)) {
            $brand = $tags[0]->name;
        }
    }

    // Condición
    $condition = get_field('schema_condition', $post->ID) ?: 'NewCondition';

    // Precio y disponibilidad
    $price = $product->get_price();
    $currency = get_woocommerce_currency();
    $availability = $product->is_in_stock() ? 'https://schema.org/InStock' : 'https://schema.org/OutOfStock';

    // Review y Rating (si existen)
    $rating_count = $product->get_rating_count();
    $average_rating = $product->get_average_rating();

    // Construir schema
    $schema = [
        '@context' => 'https://schema.org',
        '@type' => 'Product',
        'name' => $name,
        'description' => $description,
        'image' => $image,
        'url' => $url,
        'sku' => $sku,
        'brand' => [
            '@type' => 'Brand',
            'name' => $brand ?: 'FEYMA'
        ],
        'offers' => [
            '@type' => 'Offer',
            'url' => $url,
            'priceCurrency' => $currency,
            'price' => $price,
            'priceValidUntil' => date('Y-12-31'), // Válido hasta fin de año
            'availability' => $availability,
            'itemCondition' => 'https://schema.org/' . $condition,
            'seller' => [
                '@type' => 'Organization',
                'name' => 'FEYMA'
            ]
        ]
    ];

    // Agregar GTIN si existe
    if ($gtin) {
        $schema['gtin'] = $gtin;
    }

    // Agregar reviews si existen
    if ($rating_count > 0) {
        $schema['aggregateRating'] = [
            '@type' => 'AggregateRating',
            'ratingValue' => $average_rating,
            'reviewCount' => $rating_count,
            'bestRating' => 5,
            'worstRating' => 1
        ];
    }

    echo '<script type="application/ld+json">' . wp_json_encode($schema, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE) . '</script>' . "\n";
}

// ============================================
// 5. MODIFICAR TITLE TAG
// ============================================

add_filter('pre_get_document_title', 'feyma_custom_document_title', 999);
function feyma_custom_document_title($title) {
    return feyma_get_meta_title();
}

// ============================================
// 6. DESHABILITAR CANONICAL DE WOOCOMMERCE
// ============================================

// Removemos el canonical de WooCommerce para usar el nuestro
remove_action('wp_head', 'wc_product_canonical_url', 10);

// ============================================
// 7. SITEMAP HINTS (para Yoast o RankMath futuro)
// ============================================

/**
 * Add priority and changefreq to sitemap (si usan Yoast/RankMath)
 */
add_filter('wpseo_sitemap_entry', 'feyma_sitemap_custom_priority', 10, 3);
function feyma_sitemap_custom_priority($url, $type, $post) {
    if ($type === 'post' && isset($post->ID)) {
        $priority = get_field('sitemap_priority', $post->ID);
        $changefreq = get_field('sitemap_changefreq', $post->ID);

        if ($priority) {
            $url['pri'] = $priority;
        }

        if ($changefreq) {
            $url['chf'] = $changefreq;
        }
    }

    return $url;
}
