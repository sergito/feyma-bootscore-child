<!-- ============================================
     EXPLORA POR CATEGORÍA
     ============================================ -->
<section class="categories-explore">
    <div class="container">
        
        <!-- Header -->
        <div class="section-header" data-aos="fade-up">
            <h2 class="section-title">Explora por Categoría</h2>
            <p class="section-subtitle">Encuentra el equipo perfecto para tu necesidad</p>
        </div>
        
        <!-- Category Cards Grid -->
        <div class="row g-4">
            
            <!-- Gaming -->
            <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="100">
                <div class="category-card gaming">
                    <div class="category-icon">
                        <i class="bi bi-controller"></i>
                    </div>
                    <h3>Gaming</h3>
                    <p class="category-description">Alto rendimiento extremo</p>
                    <a href="<?php //echo get_term_link( get_term_by('slug', 'gaming', 'product_cat') ); ?>" class="category-count">
                        <span>120+ productos</span>
                        <i class="bi bi-arrow-right"></i>
                    </a>
                </div>
            </div>
            
            <!-- Diseño -->
            <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="200">
                <div class="category-card design">
                    <div class="category-icon">
                        <i class="bi bi-palette"></i>
                    </div>
                    <h3>Diseño</h3>
                    <p class="category-description">Creación profesional</p>
                    <a href="<?php //echo get_term_link( get_term_by('slug', 'diseno', 'product_cat') ); ?>" class="category-count">
                        <span>80+ productos</span>
                        <i class="bi bi-arrow-right"></i>
                    </a>
                </div>
            </div>
            
            <!-- Oficina -->
            <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="300">
                <div class="category-card office">
                    <div class="category-icon">
                        <i class="bi bi-briefcase"></i>
                    </div>
                    <h3>Oficina</h3>
                    <p class="category-description">Productividad diaria</p>
                    <a href="<?php //echo get_term_link( get_term_by('slug', 'oficina', 'product_cat') ); ?>" class="category-count">
                        <span>150+ productos</span>
                        <i class="bi bi-arrow-right"></i>
                    </a>
                </div>
            </div>
            
            <!-- Apple -->
            <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="400">
                <div class="category-card apple">
                    <div class="category-icon">
                        <i class="bi bi-apple"></i>
                    </div>
                    <h3>Apple</h3>
                    <p class="category-description">Ecosistema completo</p>
                    <a href="<?php //echo get_term_link( get_term_by('slug', 'apple', 'product_cat') ); ?>" class="category-count">
                        <span>50+ productos</span>
                        <i class="bi bi-arrow-right"></i>
                    </a>
                </div>
            </div>
            
        </div>
    </div>
</section>
