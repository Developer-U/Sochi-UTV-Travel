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
$archive_image = is_single() || is_page() ? wp_get_attachment_url(get_post_thumbnail_id()) : get_field('archive_image' . $fields_index, $fields_prefix);
$top_block_right_side_image = get_field('top_block_right_side_image', 'options');
$top_block_right_side_underground = get_field('top_block_right_side_underground', 'options');
$top_block_actions_image = get_field('top_block_actions_image', 'options');
?>

<section class="top-block overlay position-relative" <?php
if ($archive_image) { ?>
        style="background-image: url('<?php echo is_single() || is_page() ? $archive_image : $archive_image['url']; ?>')"
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
    if ($page_id == '415' && $top_block_actions_image) { ?>
        <div class="top-block-right__image top-block-right__image_actions position-absolute"
            style="background-image: url('<?php echo $top_block_actions_image['url']; ?>)"></div>
    <?php }
    ?>
    <div
        class="container-fluid top-block__box top-box <?php if (is_singular('services') || is_page('gallery') || is_archive('actions')) { ?>short<?php } ?> d-flex flex-column justify-content-between align-items-end">
        <?php
        echo '<div class="hero-box__button d-none d-md-block">';
        get_template_part('template-parts/booking', 'button');
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