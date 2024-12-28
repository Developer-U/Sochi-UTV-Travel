jQuery(function($) {
    const text_wraps = $('.js-item');   
    text_wraps.each(function() {
        let btn_open = $(this).find('.js-item-open');
        let btn_close = $(this).find('.js-item-close');
        let item_content = $(this).find('.js-item-content');

        btn_open.on('click', function(event){
            item_content.slideToggle('slow');

            if(btn_open.text() == 'Забронировать') {
                btn_open.text('скрыть');
                btn_open.addClass('opened');
            } else {
                btn_open.text('Забронировать');
                btn_open.removeClass('opened');
            }
            
        })
    });

    const all_types_buttons = $('.js-item-content input.button');

    all_types_buttons.each(function(){
        $(this).on('click', function(e) {  
            let tariff_wrapper = $(this).closest('.route-item');    
            let tariff_title = tariff_wrapper.attr('data-name');
            console.log(tariff_title); 
            $('.hide-title').val(tariff_title);
        });
    });

   
});