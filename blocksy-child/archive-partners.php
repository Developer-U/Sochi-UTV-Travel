<?php
/**
 * Archive peage post type: partners
 * Архивная страница с выводом постов Наши партнёры
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 */
## Удаляет "Рубрика: ", "Метка: " и т.д. из заголовка архива
add_filter('get_the_archive_title', function ($title) {
    return preg_replace('~^[^:]+: ~', '', $title);
});

get_header();

// Top Block
get_template_part('template-parts/top', 'block');
?>

<section class="archive-routes gradient-bg">
    <div class="container">
        <?php
        $arg_partners = array(
            'orderby' => 'date',
            'order' => 'DESC',
            'posts_per_page' => -1,
            'post_type' => 'partners',
            'post_status' => 'publish',
        );

        $query_partners = new WP_Query($arg_partners);
        ?>

        <ul class="archive-partners-list">
            <?php
            if ($query_partners->have_posts()) {
                while ($query_partners->have_posts()) {
                    $query_partners->the_post();
                    $partner_link = get_field('partner_link');
                    ?>

                    <li class="archive-partners-list__item partner-item position-relative col-12 col-md-6"
                        style="background-image: url('<?php echo wp_get_attachment_url(get_post_thumbnail_id()); ?>'); background-size: cover; background-repeat: no-repeat">
                        <div class="route-item__wrap position-relative archive-route d-grid">
                            <div class="archive-route__top">
                                <h3 class="route-item__title route-item__title_actions"><?php the_title(); ?></h3>

                                <div class="route-item__excerpt route-item__excerpt_partners">
                                    <?php the_excerpt(); ?>
                                </div>
                            </div>

                            <?php if ($partner_link) { ?>
                                <div class="archive-route__bottom">
                                    <a href="<?php echo $partner_link; ?>" class="button gold" target="blank">Перейти на сайт</a>
                                </div>
                            <?php } ?>
                        </div>
                    </li>
                <?php }
                ;
                wp_reset_postdata() ?>
            <?php } ?>
        </ul>
    </div>
</section>

<?php
get_template_part('template-parts/block', 'cta2');

get_template_part('template-parts/block', 'services');

get_footer();