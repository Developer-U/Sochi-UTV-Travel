window.addEventListener('DOMContentLoaded', function(){
    const hero_swiper = new Swiper(".hero-slider", {
        slidesPerView: 1, 
        spaceBetween: 4,  
        loop: true, 
        speed: 700,    
        // keyboard: {
        //     enabled: true,
        //     pageUpDown: true,
        // },       
        autoplay: {
            delay: 3000,            
            waitForTransition: true,
        },  
    });

    const photo_swiper = new Swiper(".photo-gallery-slider", {
        slidesPerView: 1, 
        spaceBetween: 10,  
        loop: true, 
        speed: 700,    
        keyboard: {
            enabled: true,
            pageUpDown: true,
        },       
        navigation: {
            nextEl: ".swiper-button-next",
            prevEl: ".swiper-button-prev",
          },
          breakpoints: {              
            768: {
                slidesPerView: 2,   
                spaceBetween: 10,             
            },
            992: {
                slidesPerView: 3,   
                spaceBetween: 10,               
            },
            1200: {
                slidesPerView: 4,   
                spaceBetween: 10,               
            }              
          } 
    });

});