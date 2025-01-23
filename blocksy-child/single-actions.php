<?php
/**
 * The template for displaying Single Actions
 *
 * Template Name: Страница акции
 * Template Post Type: actions
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

// Block Top
get_template_part('template-parts/top', 'block');
?>

<section class="single-services">
    <div class="container">        
        <div class="single-wrap__content post">
            <?php the_content(); ?>
        </div>       
    </div>
</section>

<?php

get_template_part('template-parts/block', 'cta2');

get_template_part('template-parts/block', 'actions');

have_posts();
wp_reset_query();

get_footer();