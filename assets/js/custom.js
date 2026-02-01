/**
 * FEYMA HOME - JavaScript Épico
 * Parallax, Animaciones, Circuit Effects
 */

(function($) {
    'use strict';

    // Detectar el scroll para aplicar la clase "scrolled"
    window.addEventListener('scroll', function () {
        const navbar = document.getElementById('masthead');
        if (window.scrollY > 50) {
        navbar.classList.add('scrolled');
        } else {
        navbar.classList.remove('scrolled');
        }
    });

    /** Popup de links sociales: */
    $('div.BoxRedes a.Link').click(function(event){
      event.preventDefault();
      //popup 
      var width  = 575,
          height = 520,
          left   = ($(window).width()  - width)  / 2,
          top    = ($(window).height() - height) / 2,
          opts   = 'status=1' +
              ',width='  + width  +
              ',height=' + height +
              ',top='    + top    +
              ',left='   + left;
  
      window.open($(this).attr("href"), 'share', opts); 
    });

    // ============================================
    // INICIALIZACIÓN
    // ============================================
    $(document).ready(function() {
        console.log('%c🔥 FEYMA HOME EPIC - CARGANDO ', 'background: #5F4B8B; color: #F7B32B; font-size: 20px; padding: 10px;');

        initAOS();
        initHeroParallax();
        initCarousel();
        initCircuitEffects();
        //initSmoothScroll();
        initPerformanceMonitor();
        initSearchMobile();

        console.log('%c✅ TODO LISTO ', 'background: #10B981; color: white; font-size: 16px; padding: 8px;');
    });

    // ============================================
    // AOS - ANIMATIONS ON SCROLL
    // ============================================
    function initAOS() {
        if (typeof AOS !== 'undefined') {
            AOS.init({
                duration: 1000,
                easing: 'ease-out-cubic',
                once: true,
                offset: 120,
                delay: 50,
                anchorPlacement: 'top-bottom'
            });
            
            // Refresh on window resize
            let resizeTimer;
            $(window).on('resize', function() {
                clearTimeout(resizeTimer);
                resizeTimer = setTimeout(() => {
                    AOS.refresh();
                }, 250);
            });
            
            console.log('✅ AOS inicializado');
        }
    }

    // ============================================
    // PARALLAX EFFECT EN HERO
    // ============================================
    function initHeroParallax() {
        const $hero = $('.hero-section');
        const $circuitPattern = $('.hero-circuit-pattern');
        const $particles = $('.hero-particles');
        const $glow = $('.hero-product-glow');
        
        $(window).on('scroll', throttle(function() {
            const scrolled = $(window).scrollTop();
            const heroHeight = $hero.outerHeight();
            
            // Solo aplicar parallax si estamos en la sección hero
            if (scrolled < heroHeight) {
                const scrollPercent = scrolled / heroHeight;
                
                // Circuit pattern - mueve más lento
                $circuitPattern.css({
                    transform: `translateY(${scrolled * 0.3}px)`
                });
                
                // Particles - mueve más rápido
                $particles.css({
                    transform: `translateY(${scrolled * 0.5}px)`
                });
                
                // Glow - fade out gradual
                $glow.css({
                    opacity: 1 - scrollPercent,
                    transform: `translate(-50%, -50%) scale(${1 + scrollPercent * 0.5})`
                });
            }
        }, 10));
        
        console.log('✅ Parallax inicializado');
    }

    // ============================================
    // CAROUSEL CON EFECTOS AVANZADOS
    // ============================================
    function initCarousel() {
        const $carousel = $('#heroCarousel');
        
        if ($carousel.length) {
            // Pausar en hover
            $carousel.on('mouseenter', function() {
                $carousel.carousel('pause');
            });
            
            $carousel.on('mouseleave', function() {
                $carousel.carousel('cycle');
            });
            
            // Refresh AOS cuando cambia el slide
            $carousel.on('slid.bs.carousel', function(e) {
                if (typeof AOS !== 'undefined') {
                    setTimeout(() => {
                        AOS.refresh();
                    }, 100);
                }
                console.log('📸 Slide:', e.to + 1);
            });
            
            // Teclas de navegación
            $(document).on('keydown', function(e) {
                if (e.key === 'ArrowLeft') {
                    $carousel.carousel('prev');
                } else if (e.key === 'ArrowRight') {
                    $carousel.carousel('next');
                }
            });
            
            console.log('✅ Carousel inicializado');
        }
    }

    // ============================================
    // CIRCUIT EFFECTS INTERACTIVOS
    // ============================================
    function initCircuitEffects() {
        // Crear efecto de "chispa" al mover el mouse
        const $hero = $('.hero-section');
        let sparkTimeout;
        
        $hero.on('mousemove', throttle(function(e) {
            clearTimeout(sparkTimeout);
            
            sparkTimeout = setTimeout(() => {
                createSpark(e.pageX, e.pageY - $(window).scrollTop());
            }, 100);
        }, 200));
        
        console.log('✅ Circuit effects inicializados');
    }

    // Crear chispa en posición del mouse
    function createSpark(x, y) {
        const $spark = $('<div class="spark"></div>');
        
        $spark.css({
            position: 'absolute',
            left: x + 'px',
            top: y + 'px',
            width: '4px',
            height: '4px',
            background: '#F7B32B',
            borderRadius: '50%',
            boxShadow: '0 0 20px #F7B32B, 0 0 40px rgba(247, 179, 43, 0.5)',
            pointerEvents: 'none',
            zIndex: 100,
            animation: 'sparkFade 0.8s ease-out forwards'
        });
        
        $('.hero-section').append($spark);
        
        setTimeout(() => {
            $spark.remove();
        }, 800);
    }

    // ============================================
    // SMOOTH SCROLL
    // ============================================
  

    // ============================================
    // PERFORMANCE MONITOR (Debug)
    // ============================================
    function initPerformanceMonitor() {
        if (window.performance && console.table) {
            window.addEventListener('load', function() {
                setTimeout(() => {
                    const perfData = window.performance.timing;
                    const pageLoadTime = perfData.loadEventEnd - perfData.navigationStart;
                    const domReady = perfData.domContentLoadedEventEnd - perfData.navigationStart;
                    
                    console.log('%c⚡ PERFORMANCE ', 'background: #F7B32B; color: #000; font-weight: bold; padding: 5px;');
                    console.table({
                        'Page Load': pageLoadTime + 'ms',
                        'DOM Ready': domReady + 'ms',
                        'Resources': perfData.loadEventEnd - perfData.responseEnd + 'ms'
                    });
                }, 0);
            });
        }
    }

    // ============================================
    // UTILITIES
    // ============================================
    function throttle(func, limit) {
        let inThrottle;
        return function(...args) {
            if (!inThrottle) {
                func.apply(this, args);
                inThrottle = true;
                setTimeout(() => inThrottle = false, limit);
            }
        };
    }

    function debounce(func, wait) {
        let timeout;
        return function executedFunction(...args) {
            const later = () => {
                clearTimeout(timeout);
                func(...args);
            };
            clearTimeout(timeout);
            timeout = setTimeout(later, wait);
        };
    }

    // ============================================
    // CATEGORÍAS - HOVER EFFECTS
    // ============================================
    $('.category-card').each(function() {
        const $card = $(this);
        
        $card.on('mouseenter', function() {
            $(this).find('.category-icon').css({
                transform: 'scale(1.15) rotate(-8deg)'
            });
        });
        
        $card.on('mouseleave', function() {
            $(this).find('.category-icon').css({
                transform: 'scale(1) rotate(0deg)'
            });
        });
    });

    // ============================================
    // NEWSLETTER FORM
    // ============================================
    $('.newsletter-form').on('submit', function(e) {
        e.preventDefault();
        
        const $form = $(this);
        const $input = $form.find('input[type="email"]');
        const $button = $form.find('.btn-newsletter');
        const email = $input.val();
        
        // Validación
        if (!email || !isValidEmail(email)) {
            showToast('❌ Email inválido', 'error');
            return;
        }
        
        // Simular envío (aquí irá tu lógica de backend)
        $button.prop('disabled', true).html('<i class="bi bi-hourglass-split"></i> Enviando...');
        
        setTimeout(() => {
            showToast('✅ ¡Suscripto exitosamente!', 'success');
            $input.val('');
            $button.prop('disabled', false).html('Suscribirme <i class="bi bi-arrow-right ms-2"></i>');
        }, 1500);
    });

    function isValidEmail(email) {
        return /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email);
    }

    // ============================================
    // TOAST NOTIFICATIONS
    // ============================================
    function showToast(message, type = 'info') {
        const colors = {
            success: '#10B981',
            error: '#EF4444',
            warning: '#F59E0B',
            info: '#3B82F6'
        };

        const $toast = $('<div class="custom-toast"></div>');
        $toast.html(message);
        
        $toast.css({
            position: 'fixed',
            bottom: '30px',
            right: '30px',
            background: colors[type],
            color: 'white',
            padding: '18px 28px',
            borderRadius: '12px',
            boxShadow: '0 10px 40px rgba(0,0,0,0.3)',
            zIndex: 99999,
            fontWeight: '600',
            fontSize: '15px',
            animation: 'slideInUp 0.3s ease, slideOutDown 0.3s ease 2.7s'
        });

        $('body').append($toast);

        setTimeout(() => $toast.remove(), 3000);
    }

    // ============================================
    // ANIMATIONS CSS (Inyectar en head)
    // ============================================
    const animations = `
        <style>
        @keyframes sparkFade {
            0% {
                opacity: 1;
                transform: scale(1);
            }
            100% {
                opacity: 0;
                transform: scale(3);
            }
        }
        
        @keyframes slideInUp {
            from {
                transform: translateY(100px);
                opacity: 0;
            }
            to {
                transform: translateY(0);
                opacity: 1;
            }
        }
        
        @keyframes slideOutDown {
            from {
                transform: translateY(0);
                opacity: 1;
            }
            to {
                transform: translateY(100px);
                opacity: 0;
            }
        }
        </style>
    `;
    
    $('head').append(animations);

    // ============================================
    // CONSOLE ART
    // ============================================
    console.log('%c ', 'font-size: 1px; padding: 50px 100px; background: url(data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSIyMDAiIGhlaWdodD0iMTAwIj48dGV4dCB4PSI1MCUiIHk9IjUwJSIgZm9udC1mYW1pbHk9IkFyaWFsIiBmb250LXNpemU9IjQwIiBmb250LXdlaWdodD0iYm9sZCIgZmlsbD0iIzVGNEI4QiIgdGV4dC1hbmNob3I9Im1pZGRsZSIgZG9taW5hbnQtYmFzZWxpbmU9Im1pZGRsZSI+RkVZTUE8L3RleHQ+PC9zdmc+) no-repeat;');
    console.log('%c💜 FEYMA Technology Store 2025', 'color: #5F4B8B; font-size: 16px; font-weight: bold;');
    console.log('%c⚡ Powered by Circuit Magic', 'color: #F7B32B; font-size: 12px;');

    // ============================================
    // SEARCH MOBILE TOGGLE
    // ============================================
    function initSearchMobile() {
        console.log('🔍 Iniciando search mobile...');

        const $searchToggle = $('#searchToggleMobile');
        const $searchExpanded = $('#searchMobileExpanded');
        const $closeSearch = $('#closeSearchMobile');
        const $searchInputMobile = $('#searchInputMobile');

        console.log('📍 Elementos encontrados:', {
            toggle: $searchToggle.length,
            expanded: $searchExpanded.length,
            close: $closeSearch.length,
            input: $searchInputMobile.length
        });

        if ($searchToggle.length === 0) {
            console.warn('⚠️ #searchToggleMobile no encontrado en el DOM');
            return;
        }

        // Abrir búsqueda mobile
        $searchToggle.on('click', function(e) {
            e.preventDefault();
            console.log('🖱️ Click en search toggle');
            $searchExpanded.addClass('active');
            console.log('✅ Clase "active" agregada');
            // Focus en el input después de la animación
            setTimeout(() => {
                $searchInputMobile.focus();
            }, 300);
        });

        // Cerrar búsqueda mobile
        $closeSearch.on('click', function(e) {
            e.preventDefault();
            console.log('❌ Click en cerrar');
            $searchExpanded.removeClass('active');
        });

        // Cerrar al presionar ESC
        $(document).on('keydown', function(e) {
            if (e.key === 'Escape' && $searchExpanded.hasClass('active')) {
                console.log('⌨️ ESC presionado');
                $searchExpanded.removeClass('active');
            }
        });

        // Cerrar al hacer click fuera
        $(document).on('click', function(e) {
            if ($searchExpanded.hasClass('active') &&
                !$(e.target).closest('.search-mobile-expanded, .search-toggle-mobile').length) {
                console.log('👆 Click fuera detectado');
                $searchExpanded.removeClass('active');
            }
        });

        console.log('✅ Search mobile toggle inicializado');
    }


    document.addEventListener('DOMContentLoaded', function () {

        const el = document.querySelector('#relatedSwiper');
        if (!el || typeof Swiper === 'undefined') return;

        new Swiper(el, {
            loop: true,
            speed: 450,
            spaceBetween: 3,
            slidesPerView: 2,
            slidesPerGroup: 1,
            watchOverflow: true,

            pagination: {
            el: el.querySelector('.swiper-pagination'),
            clickable: true,
            },

            navigation: {
            nextEl: el.querySelector('.swiper-button-next'),
            prevEl: el.querySelector('.swiper-button-prev'),
            },

            breakpoints: {
            768: {
                slidesPerView: 3,
                spaceBetween: 10,
            },
            1024: {
                slidesPerView: 4,
                spaceBetween: 15,
            }
            }
        });

        //console.log('Swiper related inicializado');
    });
    

})(jQuery);
