<?php
/**
 * Archive peage post type: routes
 * Архивная страница с выводом постов Направления туров
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 */
## Удаляет "Рубрика: ", "Метка: " и т.д. из заголовка архива
add_filter('get_the_archive_title', function ($title) {
    return preg_replace('~^[^:]+: ~', '', $title);
});
$routes_text = get_field('routes_text', 'options');

get_header();

// Top Block
get_template_part('template-parts/top', 'block');
?>

<section class="archive-routes gradient-bg">
    <div class="container">
        <ul class="archive-routes__categories routes-cat d-flex">
            <li class="routes-cat__item">
                <a href="#routes-one">Экспедиционные туры</a>
            </li>

            <li class="routes-cat__item">
                <a href="#routes-two">Однодневные туры</a>
            </li>
        </ul>

        <article id="routes-one" class="archive-routes__box routes-box">
            <h2 class="route-params__title single-sidebar-title">Экспедиционные туры</h2>

            <?php
            $arg_routes_few_days = array(
                'orderby' => 'name',
                'order' => 'DESC',
                'posts_per_page' => -1,
                'post_type' => 'routes',
                'post_status' => 'publish',
                'tax_query' => array(
                    array(
                        'taxonomy' => 'routes-tax',
                        'field' => 'slug',
                        'terms' => 'few-day-tours',
                    )
                )
            );

            $query_routes_few_days = new WP_Query($arg_routes_few_days);
            ?>

            <ul class=" archive-routes-list d-flex">
                <?php
                if ($query_routes_few_days->have_posts()) {
                    while ($query_routes_few_days->have_posts()) {
                        $query_routes_few_days->the_post();

                        get_template_part('template-parts/route', 'item');
                    }
                    ;
                    wp_reset_postdata() ?>
                <?php } ?>
            </ul>
        </article>

        <article id="routes-two" class="archive-routes__box routes-box">
            <h2 class="route-params__title single-sidebar-title">Однодневные туры</h2>

            <?php
            $arg_routes_one_day = array(
                'orderby' => 'name',
                'order' => 'DESC',
                'posts_per_page' => -1,
                'post_type' => 'routes',
                'post_status' => 'publish',
                'tax_query' => array(
                    array(
                        'taxonomy' => 'routes-tax',
                        'field' => 'slug',
                        'terms' => 'one-day-tours',
                    )
                )
            );

            $query_routes_one_day = new WP_Query($arg_routes_one_day);
            ?>

            <ul class=" archive-routes-list d-flex">
                <?php
                if ($query_routes_one_day->have_posts()) {
                    while ($query_routes_one_day->have_posts()) {
                        $query_routes_one_day->the_post();

                        get_template_part('template-parts/route', 'item');
                    }
                    ;
                    wp_reset_postdata() ?>
                <?php } ?>
            </ul>

            <?php
            if ($routes_text) {
                echo '<div class="routes-box__text mt-4">' . $routes_text . '</div>';
            } ?>
        </article>
    </div>
</section>


<?php
get_template_part('template-parts/block', 'cta2');

get_template_part('template-parts/block', 'services');

get_footer();