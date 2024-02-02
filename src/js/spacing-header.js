(function(){

    window.addEventListener('resize', h);

    function h() {
        if(document.querySelector('.header')){
            let p = document.querySelector('header').clientHeight;
            var el = document.body;

            if(document.querySelector('.no-pt-header')){
                return;
            }

            if (document.querySelector('.pt-header')) {
                el = document.querySelector('.pt-header');
            }
            el.style.paddingTop = p + 'px';
        }
    }
    window.onpaint = h();

    if(document.querySelector('.header')){
        let header = document.querySelector('.header');
        function toggleHeaderClass() {
            if(!document.querySelector('.no_change_scroll')){
                if (window.scrollY > 500) {
                    header.classList.add('scrolled');
                } else {
                    header.classList.remove('scrolled');
                }
            }
        }
        window.addEventListener('scroll', toggleHeaderClass);
    }

})();