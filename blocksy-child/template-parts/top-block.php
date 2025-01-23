<?php
/**
 * Display Top Block in pages
 * Отображает верхний блок на страницах
 */

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}
$page_id = get_the_ID();
$fields_prefix = is_archive() ? 'options' : $page_id;
$fields_index = is_archive() ? '_' . $page_id : '';
$top_block_title = is_archive() ? get_the_archive_title('') : get_the_title();
$post_type = get_post_type();
if ( $post_type )
{
    $post_type_data = get_post_type_object( $post_type );
    $post_type_slug = $post_type_data->rewrite['slug'];    
}

if(is_singular() || is_page()) {
    $archive_image = wp_get_attachment_url(get_post_thumbnail_id()); // Если это страница или Single типа постов - берём миниатюру страницы / поста
} else {
    $archive_image = get_field('archive_image_' .$post_type_slug, 'options'); // Архивная страница 
} 
$top_block_right_side_image = get_field('top_block_right_side_image', 'options');
$top_block_right_side_underground = get_field('top_block_right_side_underground', 'options');
$top_block_actions_image = get_field('top_block_actions_image', 'options');
?>

<section class="top-block overlay position-relative" <?php
if ($archive_image) { ?>
        style="background-image: url('<?php echo is_singular() || is_page() ? $archive_image : $archive_image['url']; ?>')"
    <?php } ?>>
    <?php
    if (is_singular('routes') && $top_block_right_side_image) { ?>
        <?php
        if ($top_block_right_side_image) { ?>
            <div class="top-block-right__image position-absolute d-none d-md-block"
                style="background-image: url('<?php echo $top_block_right_side_image['url']; ?>)"></div>
        <?php }
        if ($top_block_right_side_underground) { ?>
            <div class="top-block-right__underground position-absolute d-none d-md-block"
                style="background-image: url('<?php echo $top_block_right_side_underground['url']; ?>)"></div>
        <?php }
        ?>
    <?php } ?>
    <?php
    // Если это архивная страница Акции, то добавим плавающую карточку на фоновом изображении
    if ($page_id == '415' && $top_block_actions_image) { ?>
        <div class="top-block-right__image top-block-right__image_actions position-absolute scene">
            <div data-depth="1.0" style="background-image: url('<?php echo $top_block_actions_image['url']; ?>)"></div>
        </div>
    <?php }
    ?>
    <div
        class="container-fluid top-block__box top-box <?php if (is_singular('services') || is_page('gallery') || is_archive('actions')) { ?>short<?php } ?> d-flex flex-column justify-content-between align-items-end">
        <?php
        echo '<div class="hero-box__button d-none d-md-block">';
        if (!is_single()) {
            get_template_part('template-parts/booking', 'button');
        }
        echo '</div>';
        ?>

        <div class="<?php if (is_page('gallery')) { ?>container-fluid<?php } else { ?>container<?php } ?>">
            <h1 class="top-box__title">
                <?php                
                echo $top_block_title; ?>
            </h1>
            <!-- breadcrumbs -->
            <div class="breadcrumbs">
                <?php
                if (function_exists('yoast_breadcrumb')) {
                    (yoast_breadcrumb('<div class="breadcrumbs__list">', '</div>'));
                }
                ?>
            </div>
            <!-- breadcrumbs end -->
        </div>

        <?php get_template_part('template-parts/social'); ?>
    </div>
</section>