/**
 * =============================================
 * FEYMA.AR - Live Search con Autocompletado
 * Búsqueda en tiempo real con resultados visuales
 * =============================================
 */

(function($) {
    'use strict';

    let searchTimeout;
    const searchInput = $('.search-input'); // Desktop
    const searchInputMobile = $('.search-input-mobile'); // Mobile
    const searchBox = $('.search-box'); // Desktop
    const searchResultsWrapperMobile = $('.search-results-wrapper-mobile'); // Mobile wrapper
    let resultsContainer;
    let resultsContainerMobile;

    // Crear contenedor de resultados dinámicamente (Desktop)
    function createResultsContainer() {
        if (!resultsContainer) {
            resultsContainer = $('<div class="live-search-results"></div>');
            searchBox.append(resultsContainer);
        }
    }

    // Crear contenedor de resultados dinámicamente (Mobile)
    function createResultsContainerMobile() {
        if (!resultsContainerMobile) {
            resultsContainerMobile = $('<div class="live-search-results live-search-results-mobile"></div>');
            searchResultsWrapperMobile.append(resultsContainerMobile);
            console.log('📱 Contenedor de resultados mobile creado y agregado a search-results-wrapper-mobile');
        }
    }

    // Mostrar loading spinner
    function showLoading(isMobile = false) {
        console.log('⏳ showLoading - isMobile:', isMobile);

        if (isMobile) {
            createResultsContainerMobile();
            console.log('📱 Contenedor mobile creado:', resultsContainerMobile);
            resultsContainerMobile.html(`
                <div class="search-loading">
                    <div class="spinner-border text-primary" role="status">
                        <span class="visually-hidden">Buscando...</span>
                    </div>
                    <p>Buscando productos...</p>
                </div>
            `).addClass('active');
            console.log('📱 Clase "active" agregada a resultsContainerMobile');
        } else {
            createResultsContainer();
            resultsContainer.html(`
                <div class="search-loading">
                    <div class="spinner-border text-primary" role="status">
                        <span class="visually-hidden">Buscando...</span>
                    </div>
                    <p>Buscando productos...</p>
                </div>
            `).addClass('active');
        }
    }

    // Ocultar resultados
    function hideResults(isMobile = false) {
        const container = isMobile ? resultsContainerMobile : resultsContainer;
        if (container) {
            container.removeClass('active');
            setTimeout(() => {
                container.html('');
            }, 300);
        }
    }

    // Formatear precio
    function formatPrice(price) {
        if (!price) return '';
        return price.replace(/&nbsp;/g, ' ');
    }

    // Renderizar resultados
    function renderResults(data, isMobile = false, query = '') {
        const container = isMobile ? resultsContainerMobile : resultsContainer;

        if (isMobile) {
            createResultsContainerMobile();
        } else {
            createResultsContainer();
        }

        if (!data.success || data.data.products.length === 0) {
            container.html(`
                <div class="search-no-results">
                    <i class="bi bi-search"></i>
                    <p>No se encontraron productos</p>
                    <small>Intenta con otras palabras clave</small>
                </div>
            `).addClass('active');
            return;
        }

        let html = '<div class="search-results-list">';

        data.data.products.forEach(product => {
            html += `
                <a href="${product.url}" class="search-result-item">
                    <div class="result-image">
                        <img src="${product.image}" alt="${product.title}">
                    </div>
                    <div class="result-content">
                        <h4 class="result-title">${product.title}</h4>
                        ${product.excerpt ? `<p class="result-excerpt">${product.excerpt}</p>` : ''}
                        ${product.price ? `<div class="result-price">${formatPrice(product.price)}</div>` : ''}
                    </div>
                </a>
            `;
        });

        // Agregar link "Ver todos los resultados" si hay más de 5
        if (data.data.total > 5) {
            html += `
                <a href="/?s=${encodeURIComponent(query)}&post_type=product" class="search-view-all">
                    <i class="bi bi-arrow-right-circle"></i>
                    Ver todos los resultados (${data.data.total})
                </a>
            `;
        }

        html += '</div>';
        container.html(html).addClass('active');
    }

    // Realizar búsqueda AJAX
    function performSearch(query, isMobile = false) {
        console.log('🔍 performSearch llamado - Query:', query, 'isMobile:', isMobile);

        if (query.length < 2) {
            console.log('⚠️ Query muy corto, ocultando resultados');
            hideResults(isMobile);
            return;
        }

        console.log('⏳ Mostrando loading...');
        showLoading(isMobile);

        console.log('📡 Haciendo petición AJAX a:', feymaSearch.ajaxurl);
        console.log('📦 Data:', { action: 'feyma_live_search', nonce: feymaSearch.nonce, query: query });

        $.ajax({
            url: feymaSearch.ajaxurl,
            type: 'POST',
            data: {
                action: 'feyma_live_search',
                nonce: feymaSearch.nonce,
                query: query
            },
            success: function(response) {
                console.log('✅ AJAX Success - Response:', response);
                renderResults(response, isMobile, query);
            },
            error: function(xhr, status, error) {
                console.error('❌ AJAX Error:', status, error);
                console.error('Response:', xhr.responseText);

                const container = isMobile ? resultsContainerMobile : resultsContainer;
                if (isMobile) createResultsContainerMobile();
                else createResultsContainer();

                container.html(`
                    <div class="search-error">
                        <i class="bi bi-exclamation-triangle"></i>
                        <p>Error al buscar</p>
                    </div>
                `).addClass('active');
            }
        });
    }

    // ============================================
    // EVENT LISTENERS - DESKTOP
    // ============================================
    searchInput.on('input', function() {
        const query = $(this).val().trim();

        // Limpiar timeout anterior
        clearTimeout(searchTimeout);

        // Esperar 300ms después de que el usuario deje de escribir
        searchTimeout = setTimeout(() => {
            performSearch(query, false);
        }, 300);
    });

    // Focus en el input al hacer click en el botón de búsqueda (desktop)
    $('.search-btn').on('click', function(e) {
        e.preventDefault();
        searchInput.focus();
    });

    // ============================================
    // EVENT LISTENERS - MOBILE
    // ============================================
    searchInputMobile.on('input', function() {
        const query = $(this).val().trim();
        console.log('📱 Mobile input detectado:', query);

        // Limpiar timeout anterior
        clearTimeout(searchTimeout);

        // Esperar 300ms después de que el usuario deje de escribir
        searchTimeout = setTimeout(() => {
            console.log('📱 Ejecutando búsqueda mobile con query:', query);
            performSearch(query, true);
        }, 300);
    });

    // Focus en el input al hacer click en el botón de búsqueda (mobile)
    $('.search-btn-mobile').on('click', function(e) {
        e.preventDefault();
        searchInputMobile.focus();
    });

    // ============================================
    // EVENT LISTENERS - GLOBALES
    // ============================================

    // Cerrar resultados al hacer click fuera
    $(document).on('click', function(e) {
        if (!$(e.target).closest('.search-box').length) {
            hideResults(false);
        }
        if (!$(e.target).closest('.search-box-mobile').length) {
            hideResults(true);
        }
    });

    // Cerrar resultados al presionar ESC
    $(document).on('keydown', function(e) {
        if (e.key === 'Escape') {
            hideResults(false);
            hideResults(true);
            searchInput.blur();
            searchInputMobile.blur();
        }
    });

    // Navegación con teclado (Desktop)
    let currentIndex = -1;

    searchInput.on('keydown', function(e) {
        if (!resultsContainer) return;

        const items = resultsContainer.find('.search-result-item');

        if (items.length === 0) return;

        if (e.key === 'ArrowDown') {
            e.preventDefault();
            currentIndex = (currentIndex + 1) % items.length;
            items.removeClass('keyboard-focus').eq(currentIndex).addClass('keyboard-focus');
        } else if (e.key === 'ArrowUp') {
            e.preventDefault();
            currentIndex = currentIndex <= 0 ? items.length - 1 : currentIndex - 1;
            items.removeClass('keyboard-focus').eq(currentIndex).addClass('keyboard-focus');
        } else if (e.key === 'Enter' && currentIndex >= 0) {
            e.preventDefault();
            items.eq(currentIndex)[0].click();
        }
    });

    // Navegación con teclado (Mobile)
    let currentIndexMobile = -1;

    searchInputMobile.on('keydown', function(e) {
        if (!resultsContainerMobile) return;

        const items = resultsContainerMobile.find('.search-result-item');

        if (items.length === 0) return;

        if (e.key === 'ArrowDown') {
            e.preventDefault();
            currentIndexMobile = (currentIndexMobile + 1) % items.length;
            items.removeClass('keyboard-focus').eq(currentIndexMobile).addClass('keyboard-focus');
        } else if (e.key === 'ArrowUp') {
            e.preventDefault();
            currentIndexMobile = currentIndexMobile <= 0 ? items.length - 1 : currentIndexMobile - 1;
            items.removeClass('keyboard-focus').eq(currentIndexMobile).addClass('keyboard-focus');
        } else if (e.key === 'Enter' && currentIndexMobile >= 0) {
            e.preventDefault();
            items.eq(currentIndexMobile)[0].click();
        }
    });

    // Reset index cuando se ocultan los resultados
    searchInput.on('blur', function() {
        setTimeout(() => {
            currentIndex = -1;
        }, 200);
    });

    searchInputMobile.on('blur', function() {
        setTimeout(() => {
            currentIndexMobile = -1;
        }, 200);
    });

    console.log('%c🔍 Live Search Initialized', 'background: #3D3180; color: white; padding: 4px 8px; border-radius: 4px;');
    console.log('📊 Elementos encontrados:');
    console.log('  - searchInput (desktop):', searchInput.length, searchInput);
    console.log('  - searchInputMobile:', searchInputMobile.length, searchInputMobile);
    console.log('  - searchBox (desktop):', searchBox.length, searchBox);
    console.log('  - searchResultsWrapperMobile:', searchResultsWrapperMobile.length, searchResultsWrapperMobile);

})(jQuery);
