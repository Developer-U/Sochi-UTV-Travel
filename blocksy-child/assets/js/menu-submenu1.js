window.addEventListener('DOMContentLoaded', function(){
    const availableScreenWidth = window.screen.availWidth; 

    /*Open submenu function*/
    // Функция открытия / закрытия подменю разных уровней   
    
    const submenu_btn_desctop = document.querySelector('.other-pages-menu .menu-item-50 > a'); // Кнопка открытия подменю десктоп
    const submenu_btn_mobile = document.querySelector('.js-submenu-open .menu-item-50 > a'); // Кнопка открытия подменю мобилка

    const sub_menu_desctop = document.querySelector('.other-pages-menu .menu-item-50 > ul.sub-menu'); // Подменю десктоп
    const sub_menu_mobile = document.querySelector('.js-submenu-open .menu-item-50 > ul.sub-menu'); // Подменю мобилка    
    
    if(submenu_btn_desctop !== null) {  
        submenu_btn_desctop.addEventListener('mouseenter', function(event){
            event.preventDefault();
        
            sub_menu_desctop.classList.add('active'); 

            sub_menu_desctop.addEventListener('mouseleave', function(event){
                event.target.classList.remove('active'); 
            });          
            
        }); 
    } 
        
    if(submenu_btn_mobile !== null) {    
        submenu_btn_mobile.addEventListener('click', function(event){
            event.preventDefault();
            sub_menu_mobile.classList.toggle('active');            
        }); 
    }    

    /*Open submenu function end*/


    /*Open burger menu*/
    var menu = document.querySelector('#navbar')
    ,burger_open = document.querySelector('.burger')  
    ,burger_close = document.querySelector('.burger-close');    

    burger_open.addEventListener('click', function(){   
        if( menu.classList.contains('opened') === false ) {
            menu.classList.add('opened');
            document.querySelector('body').classList.add('closed');
        } 

        // Скрытие меню при нажатии на один из пунктов меню верхнего уровня

        document.querySelectorAll('.menu > li >a').forEach(function(oneItem){
            oneItem.addEventListener('click', function(event){                
                if(event.target.getAttribute('href') !== '#') {         
                    menu.classList.remove('opened');
                    document.querySelector('body').classList.remove('closed'); 
                    sub_menu_mobile.classList.remove('active');      
                }
            
            });
        });

        // Скрытие меню при нажатии на один из пунктов меню первого уровня

        document.querySelectorAll('.menu-item-50 >.sub-menu li').forEach(function(oneUnderItem){
            oneUnderItem.addEventListener('click', function(event){                
                if(event.target.getAttribute('href') !== '#') {         
                    menu.classList.remove('opened');
                    document.querySelector('body').classList.remove('closed'); 
                    sub_menu_mobile.classList.remove('active');                     
                }
            
            });
        });
                
        // Скрытие меню при клике на пустое место (если у тебя меню на всю страницу, удаляй код)

        menu.addEventListener('click', function(event) {            
            if( this == event.target) {                
                menu.classList.remove('opened');
                document.querySelector('body').classList.remove('closed');                   
              
            } 
        });
        
    });
    burger_close.addEventListener('click', function(){    
        if( menu.classList.contains('opened') === true ) {
            menu.classList.remove('opened');
            document.querySelector('body').classList.remove('closed');
            sub_menu_mobile.classList.remove('active');      
        } 
    });

    /*Open burger menu end*/

   
    // Simplebar
    // Только для бургерного меню подключаем simplebar
    const menu_mobile = document.querySelector('.navbar-content');   
        
    if( availableScreenWidth <= 1199) {
        new SimpleBar(menu_mobile, { autoHide: true } );
    }       
    
});