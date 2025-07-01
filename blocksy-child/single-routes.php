<?php
/**
 * The template for displaying Single routes
 *
 * Template Name: Страница направления тура
 * Template Post Type: routes
 */

get_header();

$page_id = get_the_ID();
$media_title = get_field('media_route_title', $page_id);
$route_current_date = get_field('route_current_date', $page_id);

if (have_posts()) {
    the_post();
}

if (
    function_exists('blc_get_content_block_that_matches')
    &&
    blc_get_content_block_that_matches([
        'template_type' => 'single',
        'template_subtype' => 'canvas'
    ])
) {
    echo blc_render_content_block(
        blc_get_content_block_that_matches([
            'template_type' => 'single',
            'template_subtype' => 'canvas'
        ])
    );
    have_posts();
    wp_reset_query();
    return;
}

// Block Top
get_template_part('template-parts/top', 'block');
?>

<section class="single-routes">
    <div class="container single-routes__wrap single-route-wrap d-grid">
        <div class="single-route-wrap__text post">
            <h2>Описание маршрута</h2>

            <?php the_content();

            get_template_part('template-parts/equipment', 'block');
            ?>
        </div>

        <div class="single-routes__sidebar route-sidebar d-grid">
            <?php echo get_template_part('template-parts/route', 'params'); ?>

            <div class="route-sidebar__image d-none d-lg-flex"
                style="background-image: url('<?php echo wp_get_attachment_url(get_post_thumbnail_id()); ?>'); background-size: cover; background-repeat: no-repeat">
                <a class="button route-sidebar__button" href="#cta_2_<?php echo $page_id; ?>">забронировать тур</a>
            </div>
        </div>

        <button class="button route-sidebar__button d-lg-none">забронировать тур</button>
    </div>
</section>

<?php if (have_rows('new_photo_gallery_route_image', $page_id)) { ?>
    <section class="media gradient-bg">
        <div class="container">
            <?php
            if ($media_title) {
                echo '<h2 data-aos="fade-right" data-aos-offset="0" data-aos-delay="0" data-aos-duration="1300"
                data-aos-easing="ease-in-out" data-aos-once="true" data-aos-anchor-placement="top-left" class="big-title media__title">' . $media_title . '</h2>';
            }
            ?>

            <div class="swiper media__slider photo-gallery-slider">
                <div class="swiper-wrapper">
                    <?php if (have_rows('new_photo_gallery_route_image', $page_id)): ?>
                        <?php while (have_rows('new_photo_gallery_route_image', $page_id)):
                            the_row();
                            $photo_gallery_image = get_sub_field('photo_gallery_route_image', $page_id);
                            ?>

                            <a href="<?php echo $photo_gallery_image['url']; ?>" class="swiper-slide photo-gallery-slider__slide"
                                data-fancybox="photo_block_gallery">
                                <img src="<?php echo $photo_gallery_image['url']; ?>"
                                    alt="<?php echo $photo_gallery_image['alt']; ?>">
                            </a>

                            <?php
                        endwhile; ?>
                    <?php endif; ?>
                </div>

                <div class="swiper-button-next slider-arrow-next"></div>
                <div class="swiper-button-prev slider-arrow-prev"></div>
            </div>

            <a href="/gallery" class="button media__button col-auto">Смотреть все фото и видео</a>
        </div>
    </section>
<?php }

get_template_part('template-parts/block', 'contains');

get_template_part('template-parts/block', 'technics');

get_template_part('template-parts/route', 'geographics');

get_template_part('template-parts/advantages');

get_template_part('template-parts/block', 'cta2');

get_template_part('template-parts/block', 'routes');

have_posts();
wp_reset_query();

get_footer();