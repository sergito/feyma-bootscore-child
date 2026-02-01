jQuery(function ($) {

    'use strict';

    // ============================================
    // CONFIGURACIÓN GLOBAL
    // ============================================
    const FeymaHome = {
        cart: {
            items: [],
            count: 0,
            total: 0
        },
        slider: {
            currentSlide: 0,
            totalSlides: 3,
            autoplayInterval: null,
            autoplayDelay: 6000
        },
        header: {
            lastScroll: 0,
            scrollThreshold: 100
        }
    };

    // ============================================
    // INICIALIZACIÓN
    // ============================================
    console.log('🚀 FEYMA Home - Inicializando...');
    
    initAOS();
    initHeroSlider();
    initHeader();
    initSearch();
    initBrandsSlider();
    
    initSmoothScroll();
    initScrollEffects();
    initParallax();
    
    console.log('✅ FEYMA Home - Cargado exitosamente');
    logWelcome();

    // ============================================
    // AOS ANIMATIONS
    // ============================================
    function initAOS() {
        AOS.init({
            duration: 800,
            easing: 'ease-out-cubic',
            once: true,
            offset: 120,
            delay: 50,
            anchorPlacement: 'top-bottom'
        });

        // Refresh en resize
        let resizeTimer;
        window.addEventListener('resize', function() {
            clearTimeout(resizeTimer);
            resizeTimer = setTimeout(() => {
                AOS.refresh();
            }, 250);
        });
    }

    // ============================================
    // HERO SLIDER
    // ============================================
    function initHeroSlider() {
        const carousel = document.getElementById('heroCarousel');
        if (!carousel) return;

        const bsCarousel = new bootstrap.Carousel(carousel, {
            interval: FeymaHome.slider.autoplayDelay,
            pause: 'hover',
            wrap: true,
            touch: true
        });

        // Control manual con teclado
        document.addEventListener('keydown', function(e) {
            if (e.key === 'ArrowLeft') {
                bsCarousel.prev();
            } else if (e.key === 'ArrowRight') {
                bsCarousel.next();
            }
        });

        // Pausar en hover de todo el carousel
        carousel.addEventListener('mouseenter', function() {
            bsCarousel.pause();
            console.log('⏸️ Slider pausado');
        });

        carousel.addEventListener('mouseleave', function() {
            bsCarousel.cycle();
            console.log('▶️ Slider reanudado');
        });

        // Tracking de slide actual
        carousel.addEventListener('slid.bs.carousel', function(e) {
            FeymaHome.slider.currentSlide = e.to;
            console.log('📸 Slide activo:', e.to + 1);
            
            // Refresh AOS para nuevos elementos
            AOS.refresh();
        });

        // Progress bar (opcional)
        createSliderProgress(carousel);
    }

    function createSliderProgress(carousel) {
        const indicators = carousel.querySelectorAll('.carousel-indicators button');
        
        indicators.forEach((indicator, index) => {
            // Agregar barra de progreso
            const progressBar = document.createElement('div');
            progressBar.className = 'indicator-progress';
            progressBar.style.cssText = `
                position: absolute;
                bottom: 0;
                left: 0;
                height: 2px;
                background: #dc9c2f;
                width: 0;
                transition: width ${FeymaHome.slider.autoplayDelay}ms linear;
            `;
            
            indicator.style.position = 'relative';
            indicator.style.overflow = 'hidden';
            indicator.appendChild(progressBar);
        });

        // Animar progreso del slide activo
        carousel.addEventListener('slide.bs.carousel', function(e) {
            const activeIndicator = carousel.querySelector('.carousel-indicators .active .indicator-progress');
            if (activeIndicator) {
                activeIndicator.style.width = '0';
            }
        });

        carousel.addEventListener('slid.bs.carousel', function(e) {
            const activeIndicator = carousel.querySelector('.carousel-indicators .active .indicator-progress');
            if (activeIndicator) {
                activeIndicator.style.width = '100%';
            }
        });
    }

    // ============================================
    // HEADER SCROLL EFFECTS
    // ============================================
    function initHeader() {
        const header = document.querySelector('.main-header');
        const logo = document.querySelector('.main-header .navbar-brand img');
        
        if (!header) return;

        window.addEventListener('scroll', throttle(function() {
            const currentScroll = window.pageYOffset;

            if (currentScroll > FeymaHome.header.scrollThreshold) {
                header.classList.add('scrolled');
            } else {
                header.classList.remove('scrolled');
            }

            FeymaHome.header.lastScroll = currentScroll;
        }, 100));
    }

    // ============================================
    // BÚSQUEDA
    // ============================================
    function initSearch() {
        const searchInput = document.querySelector('.search-input');
        const searchBtn = document.querySelector('.search-btn');
        const searchModal = document.getElementById('searchModal');

        if (searchInput) {
            // Expandir en focus
            searchInput.addEventListener('focus', function() {
                this.closest('.search-box').classList.add('expanded');
            });

            searchInput.addEventListener('blur', function() {
                if (!this.value) {
                    this.closest('.search-box').classList.remove('expanded');
                }
            });

            // Búsqueda en tiempo real
            searchInput.addEventListener('input', debounce(function(e) {
                const query = e.target.value;
                if (query.length >= 3) {
                    performSearch(query);
                }
            }, 300));

            // Enter para buscar
            searchInput.addEventListener('keypress', function(e) {
                if (e.key === 'Enter') {
                    e.preventDefault();
                    performSearch(this.value);
                }
            });
        }

        if (searchBtn) {
            searchBtn.addEventListener('click', function(e) {
                e.preventDefault();
                const query = searchInput.value;
                if (query) {
                    performSearch(query);
                }
            });
        }

        // Modal de búsqueda
        if (searchModal) {
            searchModal.addEventListener('shown.bs.modal', function() {
                const modalInput = this.querySelector('input[type="search"]');
                if (modalInput) {
                    modalInput.focus();
                }
            });
        }
    }

    // ============================================
    // BRANDS SLIDER
    // ============================================
    function initBrandsSlider() {
        const brandsSlider = document.querySelector('.brands-slider');
        if (!brandsSlider) return;

        const brandSlides = brandsSlider.querySelectorAll('.brand-slide');
        
        // Clonar slides para efecto infinito
        brandSlides.forEach(slide => {
            const clone = slide.cloneNode(true);
            brandsSlider.appendChild(clone);
        });

        // Hacer clickeable cada marca
        brandsSlider.addEventListener('click', function(e) {
            const brandBtn = e.target.closest('.brand-btn');
            if (brandBtn) {
                const brandName = brandBtn.querySelector('img')?.alt || 'Brand';
                console.log('🏷️ Click en marca:', brandName);
                // Redirigir a página de marca
                // window.location.href = `/marca/${brandName.toLowerCase()}`;
            }
        });
    }
 

    // ============================================
    // SMOOTH SCROLL
    // ============================================
    function initSmoothScroll() {
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function(e) {
                const href = this.getAttribute('href');
                
                if (href !== '#' && href !== '#0') {
                    const target = document.querySelector(href);
                    
                    if (target) {
                        e.preventDefault();
                        
                        const headerOffset = 80;
                        const elementPosition = target.getBoundingClientRect().top;
                        const offsetPosition = elementPosition + window.pageYOffset - headerOffset;

                        window.scrollTo({
                            top: offsetPosition,
                            behavior: 'smooth'
                        });
                    }
                }
            });
        });
    }

    // ============================================
    // SCROLL EFFECTS
    // ============================================
    function initScrollEffects() {
        // Reveal on scroll
        const revealElements = document.querySelectorAll('[data-reveal]');
        
        if (revealElements.length === 0) return;

        const revealObserver = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('revealed');
                    revealObserver.unobserve(entry.target);
                }
            });
        }, {
            threshold: 0.1,
            rootMargin: '0px 0px -50px 0px'
        });

        revealElements.forEach(el => {
            revealObserver.observe(el);
        });

        // Counter animation
        animateCounters();
    }

    function animateCounters() {
        const counters = document.querySelectorAll('[data-count]');
        
        counters.forEach(counter => {
            const target = parseInt(counter.dataset.count);
            const duration = 2000;
            const increment = target / (duration / 16);
            let current = 0;

            const updateCounter = () => {
                current += increment;
                
                if (current < target) {
                    counter.textContent = Math.floor(current);
                    requestAnimationFrame(updateCounter);
                } else {
                    counter.textContent = target;
                }
            };

            // Iniciar cuando sea visible
            const observer = new IntersectionObserver((entries) => {
                if (entries[0].isIntersecting) {
                    updateCounter();
                    observer.disconnect();
                }
            });

            observer.observe(counter);
        });
    }

    // ============================================
    // PARALLAX EFFECT
    // ============================================
    function initParallax() {
        const parallaxElements = document.querySelectorAll('[data-parallax]');
        
        if (parallaxElements.length === 0) return;

        window.addEventListener('scroll', throttle(function() {
            const scrolled = window.pageYOffset;
            
            parallaxElements.forEach(el => {
                const speed = el.dataset.parallax || 0.5;
                const yPos = -(scrolled * speed);
                el.style.transform = `translateY(${yPos}px)`;
            });
        }, 10));
    }

    // ============================================
    // CONFETTI EFFECT
    // ============================================
    function createConfetti() {
        const colors = ['#3d3180', '#dc9c2f', '#10B981', '#EF4444'];
        const confettiCount = 50;

        for (let i = 0; i < confettiCount; i++) {
            const confetti = document.createElement('div');
            confetti.className = 'confetti';
            confetti.style.cssText = `
                position: fixed;
                top: -10px;
                left: ${Math.random() * 100}%;
                width: 10px;
                height: 10px;
                background: ${colors[Math.floor(Math.random() * colors.length)]};
                opacity: ${Math.random()};
                transform: rotate(${Math.random() * 360}deg);
                animation: confettiFall ${2 + Math.random() * 3}s ease-out forwards;
                z-index: 9999;
            `;

            document.body.appendChild(confetti);

            setTimeout(() => confetti.remove(), 5000);
        }
    }

    // ============================================
    // UTILITIES
    // ============================================
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

    // ============================================
    // CONSOLE WELCOME
    // ============================================
    function logWelcome() {
        console.log('%c FEYMA Technology Store ', 'background: #3d3180; color: #dc9c2f; font-size: 24px; font-weight: bold; padding: 15px;');
        console.log('%c 💜 Bienvenido al sitio oficial ', 'color: #3d3180; font-size: 14px; font-weight: bold;');
        console.log('%c ⚡ Tech Patterns & Modern Design ', 'color: #dc9c2f; font-size: 12px;');
        console.log('');
        console.log('🛒 Carrito:', FeymaHome.cart.count, 'items');
        console.log('📸 Slider:', FeymaHome.slider.currentSlide + 1, '/', FeymaHome.slider.totalSlides);
        console.log('');
        console.log('💡 Teclas de atajo:');
        console.log('   ← → : Navegar slider');
        console.log('   ESC : Cerrar modales');
        console.log('');
    }

    // ============================================
    // PERFORMANCE MONITORING
    // ============================================
    if (window.performance) {
        window.addEventListener('load', function() {
            setTimeout(() => {
                const perfData = window.performance.timing;
                const pageLoadTime = perfData.loadEventEnd - perfData.navigationStart;
                console.log('⚡ Tiempo de carga:', pageLoadTime + 'ms');
            }, 0);
        });
    }

    // Funcion para agregar clase dinamica a carrito vacio o lleno
    const cartBtnSelector = '.cart-toggler';
    const countSelector = '.cart-content-count';

    const cartBtn = document.querySelector(cartBtnSelector);
    if (!cartBtn) return;

    function updateCartState() {
        const countEl = document.querySelector(countSelector);
        const count = countEl ? parseInt(countEl.textContent, 10) : 0;

        if (count > 0) {
            cartBtn.classList.add('cart-has-items');
            cartBtn.classList.remove('cart-empty');
        } else {
            cartBtn.classList.add('cart-empty');
            cartBtn.classList.remove('cart-has-items');
        }
    }

    // Estado inicial
    updateCartState();

    // Observa cambios en todo el body (Woo suele reemplazar fragments)
    const observer = new MutationObserver(updateCartState);

    observer.observe(document.body, {
        childList: true,
        subtree: true,
        characterData: true
    });


}); // jQuery End
