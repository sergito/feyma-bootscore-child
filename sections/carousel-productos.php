<?php
/**
 * SECCIÓN: CAROUSEL DE PRODUCTOS - ACF + OWL CAROUSEL
 * Añadir a front-page.php
 */
?>

<!-- ============================================
     CAROUSEL DE PRODUCTOS - OWL CAROUSEL + ACF
     ============================================ -->
<section class="products-carousel-section py-5">
    <div class="container">
        
        <!-- Título desde ACF -->
        <div class="row mb-5">
            <div class="col-12 text-center">
                <?php
                $carousel_title = get_field('carousel_title', 'option');
                $carousel_title = $carousel_title ? $carousel_title : 'Productos Destacados';
                ?>
                <h2 class="section-title" data-aos="fade-up">
                    <?php echo esc_html($carousel_title); ?>
                </h2>
                <p class="section-subtitle" data-aos="fade-up" data-aos-delay="200">
                    Selección especial de nuestros mejores productos
                </p>
            </div>
        </div>
        
        <!-- Owl Carousel -->
        <div class="owl-carousel-wrapper" data-aos="fade-up" data-aos-delay="400">
            <div id="productsCarousel" class="owl-carousel owl-theme">
                
                <?php
                // Obtener productos desde ACF
                $carousel_products = get_field('carousel_products', 'option');
                if( $carousel_products ):
                    foreach( $carousel_products as $post ):
                        setup_postdata($post);
                        global $product;
                        ?>
                        
                        <div class="carousel-product-item">
                            <div class="product-card-carousel">
                                
                                <!-- Badge de oferta -->
                                <?php if ( $product->is_on_sale() ) : ?>
                                    <span class="product-badge sale">
                                        <i class="bi bi-lightning-fill"></i>
                                        OFERTA
                                    </span>
                                <?php endif; ?>
                                
                                <?php if ( ! $product->is_in_stock() ) : ?>
                                    <span class="product-badge out-stock">
                                        AGOTADO
                                    </span>
                                <?php endif; ?>
                                
                                <!-- Imagen -->
                                <div class="product-image-carousel">
                                    <a href="<?php echo get_permalink(); ?>">
                                        <?php echo $product->get_image('medium'); ?>
                                    </a>
                                    
                                    <!-- Quick view button -->
                                    <button class="quick-view-btn" data-product-id="<?php echo get_the_ID(); ?>">
                                        <i class="bi bi-eye"></i>
                                        Vista Rápida
                                    </button>
                                </div>
                                
                                <!-- Contenido -->
                                <div class="product-content-carousel">
                                    
                                    <!-- Categoría -->
                                    <?php
                                    $categories = get_the_terms( $product->get_id(), 'product_cat' );
                                    if ( $categories && ! is_wp_error( $categories ) ) :
                                        $category = array_shift( $categories );
                                    ?>
                                        <span class="product-category-tag">
                                            <?php echo esc_html( $category->name ); ?>
                                        </span>
                                    <?php endif; ?>
                                    
                                    <!-- Título -->
                                    <h3 class="product-title-carousel">
                                        <a href="<?php echo get_permalink(); ?>">
                                            <?php echo get_the_title(); ?>
                                        </a>
                                    </h3>
                                    
                                    <!-- Rating -->
                                    <?php if ( $product->get_average_rating() > 0 ) : ?>
                                        <div class="product-rating-carousel">
                                            <?php
                                            $rating = $product->get_average_rating();
                                            $full_stars = floor($rating);
                                            $half_star = ($rating - $full_stars) >= 0.5;
                                            
                                            for ($i = 1; $i <= 5; $i++) {
                                                if ($i <= $full_stars) {
                                                    echo '<i class="bi bi-star-fill"></i>';
                                                } elseif ($i == $full_stars + 1 && $half_star) {
                                                    echo '<i class="bi bi-star-half"></i>';
                                                } else {
                                                    echo '<i class="bi bi-star"></i>';
                                                }
                                            }
                                            ?>
                                            <span class="rating-count">(<?php echo $product->get_review_count(); ?>)</span>
                                        </div>
                                    <?php endif; ?>
                                    
                                    <!-- Precio -->
                                    <div class="product-price-carousel">
                                        <?php echo $product->get_price_html(); ?>
                                    </div>
                                    
                                    <!-- Botón -->
                                    <div class="product-actions-carousel">
                                        <?php
                                        if ( $product->is_type( 'simple' ) && $product->is_purchasable() && $product->is_in_stock() ) {
                                            woocommerce_template_loop_add_to_cart();
                                        } else {
                                            echo '<a href="' . get_permalink() . '" class="button">Ver Producto</a>';
                                        }
                                        ?>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                        
                        <?php
                    endforeach;
                    wp_reset_postdata();
                else:
                    ?>
                    <div class="col-12">
                        <div class="empty-carousel">
                            <i class="bi bi-cart-x"></i>
                            <h3>No hay productos en el carousel</h3>
                            <p>Configurá productos en <strong>Opciones FEYMA → Carousel</strong></p>
                        </div>
                    </div>
                    <?php
                endif;
                ?>
                
            </div>
            
            <!-- Custom Navigation -->
            <div class="carousel-nav-custom">
                <button class="carousel-prev">
                    <i class="bi bi-chevron-left"></i>
                </button>
                <button class="carousel-next">
                    <i class="bi bi-chevron-right"></i>
                </button>
            </div>
        </div>
        
    </div>
</section>

<!-- ============================================
     JAVASCRIPT - OWL CAROUSEL INIT
     ============================================ -->
<script>
jQuery(document).ready(function($) {
    
    // Obtener configuración desde PHP (ACF)
    <?php
    $items_desktop = get_field('carousel_items_desktop', 'option');
    $items_tablet = get_field('carousel_items_tablet', 'option');
    $items_mobile = get_field('carousel_items_mobile', 'option');
    $autoplay = get_field('carousel_autoplay', 'option');
    $autoplay_speed = get_field('carousel_autoplay_speed', 'option');
    
    // Valores por defecto
    $items_desktop = $items_desktop ? $items_desktop : 4;
    $items_tablet = $items_tablet ? $items_tablet : 3;
    $items_mobile = $items_mobile ? $items_mobile : 1;
    $autoplay = isset($autoplay) ? $autoplay : true;
    $autoplay_speed = $autoplay_speed ? $autoplay_speed : 3000;
    ?>
    
    // Inicializar Owl Carousel
    var $carousel = $('#productsCarousel');
    
    if ($carousel.length) {
        $carousel.owlCarousel({
            loop: true,
            margin: 30,
            nav: false,
            dots: false,
            autoplay: <?php echo $autoplay ? 'true' : 'false'; ?>,
            autoplayTimeout: <?php echo $autoplay_speed; ?>,
            autoplayHoverPause: true,
            smartSpeed: 800,
            responsive: {
                0: {
                    items: <?php echo $items_mobile; ?>,
                    margin: 15
                },
                768: {
                    items: <?php echo $items_tablet; ?>,
                    margin: 20
                },
                992: {
                    items: <?php echo $items_desktop; ?>,
                    margin: 30
                }
            }
        });
        
        // Custom Navigation
        $('.carousel-prev').click(function() {
            $carousel.trigger('prev.owl.carousel');
        });
        
        $('.carousel-next').click(function() {
            $carousel.trigger('next.owl.carousel');
        });
        
        console.log('✅ Owl Carousel inicializado');
        console.log('Items Desktop:', <?php echo $items_desktop; ?>);
        console.log('Items Tablet:', <?php echo $items_tablet; ?>);
        console.log('Items Mobile:', <?php echo $items_mobile; ?>);
        console.log('Autoplay:', <?php echo $autoplay ? 'true' : 'false'; ?>);
        console.log('Speed:', <?php echo $autoplay_speed; ?>);
    }
});
</script>
