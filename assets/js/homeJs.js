jQuery(function ($) {

      function initSmoothScroll() {
        $('a[href^="#"]').on('click', function(e) {
            const target = $(this.hash);
            if (target.length) {
                e.preventDefault();
                $('html, body').animate({
                    scrollTop: target.offset().top - 80
                }, 800, 'swing');
            }
        });
        
        console.log('✅ Smooth scroll inicializado');
    }

    initSmoothScroll();

}); // jQuery End
