<?php
/**
 * Display Block Galery
 * Вывод галереи на странице Наша галерея
 */

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}
?>

<section class="gallery">
    <div class="container-fluid">
        <div class="gallery-tabs">
            <?php
            // Показываем табы Фото и видео, только если добавлен видео-контент
            if (have_rows('add_video_block', 'options')) { ?>
                <ul class="gallery-tabs__btns gallery-tab-btns d-flex">
                    <li class="button gallery-tab-btns__button js-pathTabs col-auto active" data-path="0"
                        data-tabpathrep="galery_0">
                        фото
                    </li>

                    <li class="button gallery-tab-btns__button js-pathTabs col-auto" data-path="1"
                        data-tabpathrep="galery_1">
                        видео
                    </li>
                </ul>
            <?php } ?>

            <!-- Раздел фото -->
            <article class="gallery-tab-target__target js-targetTabs gallery-tab-target active" data-target="0"
                data-tabTargetReprep="galery_0">
                <?php
                $gallery_content_field = 'photo';
                ?>

                <h2 class="gallery-tab-target__title visually-hidden">Фото</h2>

                <ul class="gallery-tab-target__list gallery-tab-list">
                    <?php
                    if (have_rows('add_photo_block', 'options')): ?>
                        <?php $i = 1;
                        while (have_rows('add_photo_block', 'options')):
                            the_row();
                            $gallery_content = get_sub_field('gallery_photo_content', 'options');
                            $index = $i++;
                            ?>

                            <li
                                class="gallery-tab-list__item gallery-tab-list__item_<?php if (($index % 2) == 0) { ?>second<?php } else { ?>first<?php } ?>">
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
            <article class="gallery-tab-target__target js-targetTabs gallery-tab-target" data-target="1"
                data-tabTargetReprep="galery_1">
                <?php
                $gallery_content_field = 'video';
                ?>
                <h2 class="gallery-tab-target__title visually-hidden">Видео</h2>

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

                            <li class="gallery-tab-list__video">
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
        </div>

    </div>
</section>