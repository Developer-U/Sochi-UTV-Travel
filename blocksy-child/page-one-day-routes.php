<?php
/**
 * Archive page post type: routes One day routes
 * Архивная страница с выводом постов Направления туров
 * Рубрика: однодневные туры
 *
 */
$page_id = get_the_ID();
$top_block_image = wp_get_attachment_url(get_post_thumbnail_id());

$arg_routes = array(
    'orderby' => 'name',
    'order' => 'DESC',
    'posts_per_page' => $routes_count,
    'post_type' => 'routes',
    'post_status' => 'publish',
    'tax_query' => array( // массив в массиве
        array(
            'taxonomy' => 'routes-tax', // опять же - здесь название рубрики
            'field' => 'slug',
            'terms' => 'one-day-tours', // а это название термина - из какой именно рубрики нужно вывести посты
        )
    )
);

$query_routes = new WP_Query($arg_routes);

get_header();

// Top Block
get_template_part('template-parts/top', 'block');

// Block one-day-routes
if ($query_routes->have_posts()) {
    ?>
    <section class="archive-routes gradient-bg">
        <div class="container">
            <ul class="archive-routes-list d-flex">
                <?php
                if ($query_routes->have_posts()) {
                    $x = 0;
                    while ($query_routes->have_posts()) {
                        $query_routes->the_post();
                        $routes_index = $x++;

                        get_template_part('template-parts/route', 'item');
                    }
                    ;
                    wp_reset_postdata() ?>
                <?php } ?>
            </ul>
        </div>
    </section>
<?php }

get_template_part('template-parts/block', 'cta2');

get_template_part('template-parts/block', 'services');

get_footer();