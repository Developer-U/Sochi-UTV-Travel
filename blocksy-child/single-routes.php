<?php
/**
 * The template for displaying Single routes
 *
 * Template Name: Страница направления тура
 * Template Post Type: routes
 */

get_header();

$page_id = get_the_ID();

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

            <?php the_content(); ?>
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

<?php
get_template_part('template-parts/block', 'contains');

get_template_part('template-parts/block', 'technics');

get_template_part('template-parts/route', 'geographics');

get_template_part('template-parts/advantages');

get_template_part('template-parts/block', 'cta2');

get_template_part('template-parts/block', 'routes');

have_posts();
wp_reset_query();

get_footer();