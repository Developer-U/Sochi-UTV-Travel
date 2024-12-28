<?php
/**
 * Displaying Block Route item
 * Отображает карточку Направления тура в листинге
 */
?>

<li class="route-item position-relative js-item"
    style="background-image: url('<?php echo wp_get_attachment_url(get_post_thumbnail_id()); ?>'); background-size: cover; background-repeat: no-repeat">
    <div class="route-item__wrap position-relative">
        <h3 class="route-item__title">
            <?php the_title(); ?>
        </h3>

        <div class="route-item__excerpt">
            <?php the_excerpt(); ?>
        </div>

        <div class="route-item__bottom">
            <button type="button" class="button green js-item-open">Забронировать</button>

            <div class="route-item__form js-item-content">
                <?php echo do_shortcode('[contact-form-7 id="3e7efee" title="Быстрое бронирование по направлению"]'); ?>
            </div>
        </div>

        <a href="<?php the_permalink(); ?>" class="button gold">Узнать больше</a>
    </div>
</li>