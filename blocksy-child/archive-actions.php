<?php
/**
 * Archive peage post type: actions
 * Архивная страница с выводом постов Наши акции
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 */
## Удаляет "Рубрика: ", "Метка: " и т.д. из заголовка архива
add_filter('get_the_archive_title', function ($title) {
    return preg_replace('~^[^:]+: ~', '', $title);
});
$action_digits = get_field('action_digits');
$actions_one_action_image = get_field('actions_one_action_image', 'options');
$actions_one_action_text = get_field('actions_one_action_text', 'options');
get_header();

// Top Block
get_template_part('template-parts/top', 'block');

// Block first action
$arg_actions = array(
    'orderby' => 'name',
    'order' => 'DESC',
    'posts_per_page' => 1,
    'post_type' => 'actions',
    'post_status' => 'publish',
);

$query_actions = new WP_Query($arg_actions);

if ($query_actions->have_posts()) {
    ?>
    <section class="actions">
        <div class="container">
            <div class="actions__wrap actions-wrap d-grid align-items-start">
                <article class="route-item route-item__action position-relative"
                    style="background-image: url('<?php echo wp_get_attachment_url(get_post_thumbnail_id()); ?>'); background-size: cover; background-repeat: no-repeat">
                    <div class="route-item__wrap position-relative archive-route d-grid">
                        <?php
                        if ($action_digits) { ?>
                            <span class="actions-wrap__digits text-danger"
                            data-aos="fade-left" data-aos-offset="0" data-aos-delay="100" data-aos-duration="800"
                                    data-aos-easing="ease-in" data-aos-once="true" data-aos-anchor-placement="top">
                                <?php echo $action_digits; ?>
                            </span>
                        <?php } ?>
                        <h3 class="route-item__title route-item__title_actions">
                            <?php the_title(); ?>
                        </h3>

                        <?php
                        if ($actions_one_action_image) { ?>
                            <div class="actions-wrap__image position-relative">
                                <div class="top-block-right__image top-block-right__image_first-action position-absolute"
                                    style="background-image: url('<?php echo $actions_one_action_image['url']; ?>)"
                                    data-aos="fade-right" data-aos-offset="50" data-aos-delay="0" data-aos-duration="800"
                                    data-aos-easing="ease-in" data-aos-once="false" data-aos-anchor-placement="top-center"></div>
                            </div>
                        <?php } ?>
                    </div>
                </article>

                <div class="action-wrap__text action-block js-action">
                    <?php
                    if ($actions_one_action_text) {
                        echo '<div class="action-block__text">' . $actions_one_action_text . '</div>';
                    } ?>

                    <div class="archive-route__bottom archive-route__bottom_actions d-flex gap-2 align-items-start js-item">
                        <a href="<?php the_permalink(); ?>" class="button gold col-auto">Узнать больше</a>

                        <div class="action-block__bottom col-auto">
                            <button type="button" class="button green js-item-open"
                                data-name-action="<?php the_title(); ?>">Забронировать</button>

                            <div class="route-item__form js-item-content">
                                <?php echo do_shortcode('[contact-form-7 id="cebd4ea" title="Быстрое бронирование по акции"]'); ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

<?php }

get_template_part('template-parts/block', 'actions');

get_template_part('template-parts/block', 'services');

get_template_part('template-parts/block', 'photo-video');

get_template_part('template-parts/block', 'cta');

get_footer();