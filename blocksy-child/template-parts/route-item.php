<?php
/**
 * Displaying Block Route item
 * Отображает карточку Направления тура в листинге
 */
// $route_time = get_field('route_time');
// $route_duration = get_field('route_duration');

// Вариант, если это архивная страница
if (is_archive('routes')) {
    ?>
    <li class="route-item position-relative js-item"
        style="background-image: url('<?php echo wp_get_attachment_url(get_post_thumbnail_id()); ?>'); background-size: cover; background-repeat: no-repeat">
        <div class="route-item__wrap position-relative archive-route d-grid">
            <div class="archive-route__top">
                <h3 class="route-item__title"><?php the_title(); ?></h3>

                <div class="route-item__excerpt">
                    <?php the_excerpt(); ?>
                </div>

                <?php get_template_part('template-parts/route', 'params'); ?>
            </div>

            <div class="archive-route__bottom">
                <div class="route-item__bottom">
                    <button type="button" class="button green js-item-open"
                        data-name-route="<?php the_title(); ?>">Забронировать</button>

                    <div class="route-item__form js-item-content">
                        <?php echo do_shortcode('[contact-form-7 id="3e7efee" title="Быстрое бронирование по направлению"]'); ?>
                    </div>
                </div>

                <a href="<?php the_permalink(); ?>" class="button gold">Узнать больше</a>
            </div>
        </div>
    </li>

<?php } else {
    ?>
    <li class="route-item position-relative js-item"
        style="background-image: url('<?php echo wp_get_attachment_url(get_post_thumbnail_id()); ?>'); background-size: cover; background-repeat: no-repeat">
        <div class="route-item__wrap position-relative">
            <h3 class="route-item__title">
                <?php the_title(); ?>
            </h3>

            <div class="route-item__excerpt"><?php the_excerpt(); ?></div>

            <div class="route-item__bottom">
                <button type="button" class="button green js-item-open"
                    data-name-route="<?php the_title(); ?>">Забронировать</button>

                <div class="route-item__form js-item-content">
                    <?php echo do_shortcode('[contact-form-7 id="3e7efee" title="Быстрое бронирование по направлению"]'); ?>
                </div>
            </div>

            <a href="<?php the_permalink(); ?>" class="button gold">Узнать больше</a>
        </div>
    </li>
<?php } ?>

<script>
    jQuery(document).ready(function ($) {
        let sections = $('.route-item'); // Все секции услуг
        sections.each(function () { // Итерируем и далее код в цикле
            let form_button = $(this).find('.wpcf7-submit'); 
            let button = $(this).find('.js-item-open'); // добираемся до кнопки   
            let route_title = button.attr('data-name-route');  
            $(this).find('.hide-title').val(route_title); 
            console.log(route_title); 
        });

    });
</script>