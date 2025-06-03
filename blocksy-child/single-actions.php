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

<section class="gallery single-gallery grey">
    <div class="container-fluid">
        <!-- Раздел фото -->
        <article class="single-gallery__wrap">
            <h2 class="gallery-tab-target__title single-gallery__title">Наши фото</h2>

            <ul class="gallery-tab-target__list gallery-tab-list">
                <?php
                if (have_rows('add_photo_block', 'options')): ?>
                    <?php $i = 1;
                    while (have_rows('add_photo_block', 'options')):
                        the_row();
                        $gallery_content = get_sub_field('gallery_photo_content', 'options');
                        $index = $i++;
                        ?>

                        <li class="gallery-tab-list__item gallery-tab-list__item_<?php if (($index % 2) == 0) { ?>second<?php } else { ?>first<?php }
                        if ($index > 1) { ?> d-none<?php } ?>">
                            <?php if ($gallery_content['first']) { ?>
                                <a href="<?php echo $gallery_content['first']['url']; ?>"
                                    class="gallery-tab-list__image <?php if (($index % 2) == 0) { ?>row-1-4<?php } else { ?>row-1-3<?php } ?>"
                                    data-fancybox="gallery">
                                    <img src="<?php echo $gallery_content['first']['url']; ?>"
                                        alt="<?php echo $gallery_content['first']['alt']; ?>">
                                </a>
                            <?php }
                            if ($gallery_content['second']) { ?>
                                <a href="<?php echo $gallery_content['second']['url']; ?>"
                                    class="gallery-tab-list__image <?php if (($index % 2) == 0) { ?>row-1-3<?php } else { ?>row-3-4<?php } ?>"
                                    data-fancybox="gallery">
                                    <img src="<?php echo $gallery_content['second']['url']; ?>"
                                        alt="<?php echo $gallery_content['second']['alt']; ?>">
                                </a>
                            <?php }
                            if ($gallery_content['third']) { ?>
                                <a href="<?php echo $gallery_content['third']['url']; ?>"
                                    class="gallery-tab-list__image <?php if (($index % 2) == 0) { ?>row-3-4<?php } else { ?>row-1-4<?php } ?>"
                                    data-fancybox="gallery">
                                    <img src="<?php echo $gallery_content['third']['url']; ?>"
                                        alt="<?php echo $gallery_content['third']['alt']; ?>">
                                </a>
                            <?php }
                            if ($gallery_content['fourth']) { ?>
                                <a href="<?php echo $gallery_content['fourth']['url']; ?>"
                                    class="gallery-tab-list__image <?php if (($index % 2) == 0) { ?>row-1-4<?php } else { ?>row-1-2<?php } ?>"
                                    data-fancybox="gallery">
                                    <img src="<?php echo $gallery_content['fourth']['url']; ?>"
                                        alt="<?php echo $gallery_content['fourth']['alt']; ?>">
                                </a>
                            <?php }
                            if ($gallery_content['fifth']) { ?>
                                <a href="<?php echo $gallery_content['fifth']['url']; ?>"
                                    class="gallery-tab-list__image <?php if (($index % 2) == 0) { ?>row-1-3<?php } else { ?>row-2-4<?php } ?>"
                                    data-fancybox="gallery">
                                    <img src="<?php echo $gallery_content['fifth']['url']; ?>"
                                        alt="<?php echo $gallery_content['fifth']['alt']; ?>">
                                </a>
                            <?php }
                            if ($gallery_content['sixth']) { ?>
                                <a href="<?php echo $gallery_content['sixth']['url']; ?>"
                                    class="gallery-tab-list__image <?php if (($index % 2) == 0) { ?>row-3-4<?php } else { ?>row-1-4<?php } ?>"
                                    data-fancybox="gallery">
                                    <img src="<?php echo $gallery_content['sixth']['url']; ?>"
                                        alt="<?php echo $gallery_content['sixth']['alt']; ?>">
                                </a>
                            <?php } ?>
                        </li>

                    <?php endwhile; ?>
                <?php endif; ?>
            </ul>
        </article>

        <!-- Раздел видео -->
        <article class="single-gallery__wrap">
            <h2 class="gallery-tab-target__title single-gallery__title">Наши видео</h2>

            <ul class="allery-tab-target__list gallery-tab-list gallery-video-list d-grid">
                <?php
                if (have_rows('add_video_block', 'options')): ?>
                    <?php $i = 1;
                    while (have_rows('add_video_block', 'options')):
                        the_row();
                        $gallery_video_type = get_sub_field('gallery_video_type', 'options');
                        $gallery_video = get_sub_field('gallery_video', 'options');
                        $gallery_video_id = get_sub_field('gallery_video_id', 'options');
                        $index = $i++;
                        ?>

                        <li class="gallery-tab-list__video <?php if ($index > 6) { ?> d-none<?php } ?>">
                            <?php
                            if ($gallery_video_type == 'файл' && $gallery_video) { ?>
                                <video controls class="gallery-tab-list__image">
                                    <source src="<?php echo esc_url($gallery_video['url']); ?>" type="video/webm" />

                                    <source src="<?php echo esc_url($gallery_video['url']); ?>" type="video/mp4" />
                                </video>
                            <?php } else if ($gallery_video_type == 'ссылка' && $gallery_video_id) { ?>
                                    <iframe src="https://rutube.ru/play/embed/<?php echo $gallery_video_id; ?>" frameBorder="0"
                                        allow="clipboard-write; autoplay" webkitAllowFullScreen mozallowfullscreen allowFullScreen>
                                    </iframe>
                            <?php } ?>
                        </li>

                    <?php endwhile; ?>
                <?php endif; ?>
            </ul>
        </article>

        <a href="/gallery" class="button media__button col-auto mt-4">Смотреть все фото и видео</a>
    </div>
</section>

<?php
get_template_part('template-parts/block', 'content-gallery-photo');

get_template_part('template-parts/block', 'cta2');

get_template_part('template-parts/block', 'actions');

have_posts();
wp_reset_query();

get_footer();