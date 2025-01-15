<?php
/**
 * The template for displaying Single Services
 *
 * Template Name: Страница услуги
 * Template Post Type: services
 */

get_header();

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
$post_id = get_the_ID();
$content_image = get_field('content_image');

// Block Top
get_template_part('template-parts/top', 'block');
?>

<section class="single-services">
    <div class="container">
        <?php
        if ($content_image) { ?>
            <div class="single-services__wrap service-wrap d-lg-grid align-items-start">
                <div class="single-wrap__content post">
                    <?php the_content(); ?>
                </div>

                <figure class="service-wrap__image d-none d-lg-block">
                    <img src="<?php echo $content_image['url']; ?>" alt="<?php echo $content_image['alt']; ?>">
                </figure>
            </div>
        <?php } else { ?>
            <div class="single-wrap__content post">
                <?php the_content(); ?>
            </div>
        <?php } ?>
    </div>
</section>

<?php
if ($post_id == '112') {
    get_template_part('template-parts/block', 'menu');
}

get_template_part('template-parts/block', 'cta2');

get_template_part('template-parts/block', 'services');

have_posts();
wp_reset_query();

get_footer();