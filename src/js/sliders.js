(function(){

    if(document.querySelector('#hero')){
        new Splide('#hero', {
            type: 'loop',
            autoplay: true,
            interval: 5000,
            arrows: true,
            pagination: false,
            perPage: 1,
            perMove: 1,
            breakpoints: {
            }
        }).mount();
    }

    if(document.querySelector('#new_products')){
        new Splide('#new_products', {
            type: 'loop',
            autoplay: true,
            interval: 5000,
            arrows: false,
            pagination: false,
            perPage: 4,
            gap: '2.25rem',
            perMove: 1,
            drag: false,
            breakpoints: {
            }
        }).mount();
    }

    if(document.querySelector('#customers')){
        new Splide('#customers', {
            type: 'loop',
            rewind: true,
            arrows: false,
            pagination: false,
            perPage: 5,
            gap: '1.3rem',
            perMove: 1,
        }).mount(window.splide.Extensions);
    }

    if(document.querySelector('#main') && document.querySelector('#thumbs')){
        let slider1 = new Splide('#main', {
            type: 'fade',
            arrows: false,
            pagination: false,
            perPage: 1,
            perMove: 1,
            breakpoints: {
            }
        });
        
        let slider2 = new Splide('#thumbs', {
            type: 'loop',
            direction: 'ttb',
            isNavigation: true,
            height: '335px',
            fixedWidth : '100%',
            fixedHeight: 'auto',
            gap: '16px',
            arrows: false,
            pagination: false,
            perPage: 3,
            perMove: 1,
            breakpoints: {
            }
        });
        
        slider1.sync(slider2);
        slider1.mount();
        slider2.mount();
    }

})();