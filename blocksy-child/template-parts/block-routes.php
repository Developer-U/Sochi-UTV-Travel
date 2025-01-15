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
$routes_title = is_singular() ? 'Также вам может понравиться:' : get_field('routes_title', $page_id);
$routes_count = is_archive('routes') ? '99' : '4';

$routes_image = get_field('routes_image', $page_id);
$routes_image_underground = get_field('routes_image_underground', $page_id);

$arg_routes = array(
    'orderby' => 'name',
    'order' => 'DESC',
    'posts_per_page' => $routes_count,
    'post_type' => 'routes',
    'post_status' => 'publish',
    'post__not_in' => array($id), // Исключим текущий пост
);

$query_routes = new WP_Query($arg_routes);

if ($query_routes->have_posts()) {
    ?>
    <section
        class="<?php if (is_archive('routes')) { ?>archive-routes gradient-bg<?php } else { ?>routes lightness<?php } ?>"
        <?php
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

            <ul class="<?php if (is_archive('routes') || is_singular('routes')) { ?>
                    archive-routes-list d-flex
                <?php } else { ?>
                    routes__list routes-list d-grid align-items-start position-relative
                <?php } ?>
                ">
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

        <?php
        if (!is_archive('routes') && !is_singular('routes')) { ?>
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
            <a href="#" class="routes-bg__link button attention">смотреть все туры</a>
        <?php } ?>
    </section>
<?php } ?>

