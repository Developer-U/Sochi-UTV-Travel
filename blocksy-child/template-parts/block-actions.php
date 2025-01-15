<?php
/**
 * Displaying Block Actions
 * Блок Акции
 */

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

/*ACF fields*/
$page_id = get_the_ID();
$actions_title = is_singular() ? 'Наши акции' : get_field('actions_title', $page_id);
$actions_count = is_archive('actions') ? '99' : '4';

$arg_actions_block = array(
    'orderby' => 'name',
    'order' => 'DESC',
    'posts_per_page' => $actions_count,
    'post_type' => 'actions',
    'post_status' => 'publish',
);

$query_actions_block = new WP_Query($arg_actions_block);

if ($query_actions_block->have_posts()) {
    ?>
    <section class="actions gradient-bg">
        <div class="container">
            <?php
            if ($actions_title) { ?>
                <h2 class="actions__title <?php if (!is_single()) { ?>centered-title<?php } ?>" data-aos="fade-left"
                    data-aos-offset="400" data-aos-delay="0" data-aos-duration="900" data-aos-easing="linear"
                    data-aos-once="true" data-aos-anchor-placement="bottom-left"><?php echo $actions_title; ?></h2>
            <?php }
            ?>

            <ul class="actions__list actions-list d-flex position-relative">
                <?php
                if ($query_actions_block->have_posts()) {
                    while ($query_actions_block->have_posts()) {
                        $query_actions_block->the_post();

                        get_template_part('template-parts/action', 'item');
                    }
                    ;
                    wp_reset_postdata() ?>
                <?php } ?>
            </ul>

            <?php
            if (!is_archive('actions') && !is_singular('actions')) { ?>
                <a href="/actions" class="routes-bg__link button attention">смотреть все акции</a>
            <?php } ?>
        </div>
    </section>
<?php } ?>