<!-- ============================================
     MARCAS LÍDERES
     ============================================ -->
<section class="brands-section">
    <div class="container">
        
        <!-- Header -->
        <div class="section-header" data-aos="fade-up">
            <h2 class="section-title">Marcas Líderes</h2>
            <p class="section-subtitle">Trabajamos con las mejores marcas del mundo</p>
        </div>
        
        <!-- Brands Grid -->
        <div class="brands-grid" data-aos="fade-up" data-aos-delay="200">
            
            <?php
            // Array de marcas (slug => nombre)
            $brands = array(
                'apple'     => 'Apple',
                'msi'       => 'MSI',
                'asus'      => 'ASUS',
                'lenovo'    => 'Lenovo',
                'hp'        => 'HP',
                'dell'      => 'Dell',
                'razer'     => 'Razer',
                'corsair'   => 'Corsair',
                'logitech'  => 'Logitech',
                'samsung'   => 'Samsung',
                'lg'        => 'LG',
                'intel'     => 'Intel'
            );
            
            foreach( $brands as $slug => $name ):
                $logo_path = get_stylesheet_directory() . '/assets/images/brands/' . $slug . '.svg';
                $logo_url = get_stylesheet_directory_uri() . '/assets/images/brands/' . $slug . '.svg';
                ?>
                
                <div class="brand-item">
                    <?php if( file_exists($logo_path) ): ?>
                        <img 
                            src="<?php echo $logo_url; ?>" 
                            alt="<?php echo esc_attr($name); ?>"
                            loading="lazy"
                        >
                    <?php else: ?>
                        <!-- Fallback si no existe el logo -->
                        <span style="font-size: 24px; font-weight: 700; color: #6B7280;">
                            <?php echo esc_html($name); ?>
                        </span>
                    <?php endif; ?>
                </div>
                
            <?php endforeach; ?>
            
        </div>
        
        <!-- Nota para administrador -->
        <?php if( current_user_can('manage_options') ): ?>
            <div style="margin-top: 40px; padding: 20px; background: #FEF3C7; border-radius: 12px; text-align: center;">
                <p style="margin: 0; color: #92400E; font-size: 14px;">
                    <strong>📝 Nota:</strong> Subir logos a: 
                    <code>/wp-content/themes/storefront-child/assets/images/brands/</code><br>
                    Formato: apple.svg, msi.svg, asus.svg, etc.
                </p>
            </div>
        <?php endif; ?>
        
    </div>
</section>
