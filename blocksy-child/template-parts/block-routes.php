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
$routes_title = get_field('routes_title', $page_id);

$routes_image = get_field('routes_image', $page_id);
$routes_image_underground = get_field('routes_image_underground', $page_id);

$arg_routes = array(
    'orderby' => 'name',
    'order' => 'DESC',
    'posts_per_page' => 4,
    'post_type' => 'routes',
    'post_status' => 'publish',
);

$query_routes = new WP_Query($arg_routes);

if ($query_routes->have_posts()) {
    ?>
    <section class="routes lightness" <?php
    if ($routes_background_image) { ?>
            style="background-image: url('<?php echo $routes_background_image['url']; ?>')" <?php } ?>>

        <div class="container">
            <?php
            if ($routes_title) {
                echo '<h2 class="routes__title centered-title">' . $routes_title . '</h2>';
            }
            ?>

            <ul class="routes__list routes-list d-grid align-items-start position-relative">
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

        <div class="routes__bg routes-bg position-absolute">
            <?php
            if ($routes_image) {
                echo '<div class="routes-bg__image position-relative d-none d-md-block" style="background-image: url(' . $routes_image['url'] . ')"></div>';
            }
            if ($routes_image_underground) {
                echo '<div class="routes-bg__background position-relative d-none d-md-block" style="background-image: url(' . $routes_image_underground['url'] . ')"></div>';
            }
            ?>            
        </div>
        <a href="#" class="routes-bg__link button attention">смотреть все туры</a>
    </section>
<?php } ?>