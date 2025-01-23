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
$fields_prefix = is_archive() ? 'options' : $page_id;
$fields_index = is_archive() ? '_' . $page_id : '';
if (is_singular('services')) {
    $services_title = 'Другие наши услуги';
} elseif (is_archive()) {
    $services_title = 'Наши услуги';
} else {
    get_field('services_title' . $fields_index, $fields_prefix);
}
$block_about_image = is_archive() ? get_stylesheet_directory_uri() . '/assets/img/about-bg.jpg' : get_field('block_about_image' . $fields_index, $fields_prefix);
$arg_services = array(
    'orderby' => 'name',
    'order' => 'DESC',
    'posts_per_page' => 50,
    'post_type' => 'services',
    'post_status' => 'publish',
    'post__not_in' => array($id), // Исключим текущий пост
);

$query_services = new WP_Query($arg_services);

if ($query_services->have_posts()) {
    ?>

    <section id="services"
        class="services <?php if (is_page('about') || is_page('gallery') || is_archive('actions')) { ?>overlay dark position-relative<?php } ?>"
        <?php if ($block_about_image) { ?> style="background-image: url('<?php echo is_archive() ? $block_about_image : $block_about_image['url']; ?>')" <?php } ?>>
        <div class="container">
            <?php
            if ($services_title) { ?>
                <h2 data-aos="fade-right" data-aos-offset="200" data-aos-delay="0" data-aos-duration="900"
                    data-aos-easing="linear" data-aos-once="true" data-aos-anchor-placement="top-left" class="services__title">
                    <?php echo $services_title; ?>
                </h2>
            <?php }
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

            <?php if (is_page('about') || is_page('gallery')) {
                echo 'div class="mt-2 mt-lg-3 mt-xl-4">';
                get_template_part('template-parts/booking', 'button');
                echo '</div>';
            } ?>
        </div>
    </section>

<?php } ?>