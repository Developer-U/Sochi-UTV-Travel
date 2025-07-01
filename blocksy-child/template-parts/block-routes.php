<?php
/**
 * Displaying Block Routes
 * Блок Направления
 */

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

/*ACF fields*/
$page_id = get_the_ID();
$routes_background_image = get_field('routes_background_image', $page_id);
$routes_title = is_single() ? 'Также вам может понравиться:' : get_field('routes_title', $page_id);

$routes_image = get_field('routes_image', $page_id);
$routes_image_underground = get_field('routes_image_underground', $page_id);

$arg_routes_few_days = array(
    'orderby' => 'name',
    'order' => 'DESC',
    'posts_per_page' => 2,
    'post_type' => 'routes',
    'post_status' => 'publish',
    'post__not_in' => array($id), // Исключим текущий пост
    'tax_query' => array(
        array(
            'taxonomy' => 'routes-tax',
            'field' => 'slug',
            'terms' => 'few-day-tours',
        )
    )
);

$arg_routes_one_day = array(
    'orderby' => 'name',
    'order' => 'DESC',
    'posts_per_page' => 2,
    'post_type' => 'routes',
    'post_status' => 'publish',
    'post__not_in' => array($id), // Исключим текущий пост
    'tax_query' => array(
        array(
            'taxonomy' => 'routes-tax',
            'field' => 'slug',
            'terms' => 'one-day-tours',
        )
    )
);

$query_routes_few_days = new WP_Query($arg_routes_few_days);
$query_routes_one_day = new WP_Query($arg_routes_one_day);

if ($query_routes_few_days->have_posts() || $query_routes_one_day->have_posts()) {
    ?>
    <section class="routes lightness" <?php
    if ($routes_background_image) { ?>
            style="background-image: url('<?php echo $routes_background_image['url']; ?>')" <?php } ?>>

        <div class="container">
            <?php
            if ($routes_title) { ?>
                <h2 class="routes__title <?php if (!is_single()) { ?>centered-title<?php } ?>" data-aos="fade-left"
                    data-aos-offset="400" data-aos-delay="0" data-aos-duration="900" data-aos-easing="linear"
                    data-aos-once="true" data-aos-anchor-placement="bottom-left"><?php echo $routes_title; ?></h2>
            <?php }
            ?>

            <div class="routes__wrap routes-wrap d-flex flex-column flex-lg-row">
                <article class="routes-wrap__item">
                    <h2 class="route-params__title one single-sidebar-title">Экспедиционные туры</h2>

                    <ul class="routes__list routes-list d-flex flex-lg-column gap-4 position-relative">
                        <?php
                        if ($query_routes_few_days->have_posts()) {
                            $x = 1;
                            while ($query_routes_few_days->have_posts()) {
                                $query_routes_few_days->the_post();
                                $routes_index = $x++;                       
                                ?>

                                <li class="routes-list__item route-item item-<?php echo $routes_index; ?> position-relative js-item <?php if (($query_routes_few_days->found_posts < 2 || $arg_routes_one_day < 2) && $routes_index > 1) { ?>d-none<?php } ?>"
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

                            <?php }
                            ;
                            wp_reset_postdata() ?>
                        <?php } ?>
                    </ul>
                </article>

                <article class="routes-wrap__item">
                    <h2 class="route-params__title two single-sidebar-title">Однодневные туры</h2>

                    <ul class="routes__list routes-list d-flex flex-lg-column gap-4 position-relative">
                        <?php
                        if ($query_routes_one_day->have_posts()) {
                            $n = 1;
                            while ($query_routes_one_day->have_posts()) {
                                $query_routes_one_day->the_post();
                                $routes_index = $n++;
                                ?>

                                <li class="routes-list__item route-item item2-<?php echo $routes_index; ?> position-relative js-item <?php if (($query_routes_few_days->found_posts < 2 || $arg_routes_one_day < 2) && $routes_index > 1) { ?>d-none<?php } ?>"
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

                                <?php
                            }
                            ;
                            wp_reset_postdata() ?>
                        <?php } ?>
                    </ul>
                </article>
            </div>
        </div>

        <div class="routes__bg routes-bg position-absolute">
            <?php
            if ($routes_image) { ?>
                <div class="routes-bg__image position-relative d-none d-md-block"
                    style="background-image: url(<?php echo $routes_image['url']; ?>)" data-aos="zoom-in-up" data-aos-offset="0"
                    data-aos-delay="0" data-aos-duration="800" data-aos-easing="linear" data-aos-once="false"
                    data-aos-anchor-placement="center">
                </div>
            <?php }
            if ($routes_image_underground) {
                echo '<div class="routes-bg__background position-relative d-none d-md-block" style="background-image: url(' . $routes_image_underground['url'] . ')"></div>';
            }
            ?>
        </div>
        <a href="/routes" class="routes-bg__link button attention">смотреть все туры</a>
    </section>
<?php } ?>