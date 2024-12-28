<?php
/**
 * Displaying Block Services
 * Блок услуг
 */

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

/*ACF fields*/
$page_id = get_the_ID();
$services_title = get_field('services_title', $page_id);
$arg_services = array(
    'orderby' => 'name',
    'order' => 'DESC',
    'posts_per_page' => 50,
    'post_type' => 'services',
    'post_status' => 'publish',
);

$query_services = new WP_Query($arg_services);

if ($query_services->have_posts()) {
    ?>

    <section class="services">
        <div class="container">
            <?php
            if ($services_title) {
                echo '<h2 class="services__title">' . $services_title . '</h2>';
            }
            ?>

            <ul class="services__list d-grid grid-three">
                <?php
                if ($query_services->have_posts()) {
                    while ($query_services->have_posts()) {
                        $query_services->the_post();
                        $index_route = $x++;
                        ?>

                        <li class="services-list__item service-item d-grid">
                            <div class="service-item__wrap">
                                <div class="service-item__top d-grid justify-content-between">
                                    <a href="<?php the_permalink(); ?>">
                                        <h3 class="service-item__title">
                                            <?php the_title(); ?>
                                        </h3>
                                    </a>

                                    <span class="service-item__border position-relative">
                                        <figure class="service-item__picture position-absolute">
                                            <?php
                                            if (has_post_thumbnail()) {
                                                the_post_thumbnail('full', get_post_meta(get_post_thumbnail_id(), '_wp_attachment_image_alt', TRUE));
                                            } ?>
                                        </figure>
                                    </span>
                                </div>

                                <div class="service-item__excerpt">
                                    <?php the_excerpt(); ?>
                                </div>
                            </div>

                            <a href="<?php the_permalink(); ?>" class="service-item__more">
                                Подробнее
                            </a>
                        </li>

                    <?php }
                    ;
                    wp_reset_postdata() ?>
                <?php } ?>
            </ul>
        </div>
    </section>

<?php } ?>