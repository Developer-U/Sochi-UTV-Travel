<?php
/**
 * Displaying Block Photo Video
 * Блок Фото и видео
 */

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}
/*ACF fields*/
$page_id = get_the_ID();
$media_title = get_field('media_title', $page_id);

if (have_rows('new_photo_gallery_image', 'options') || have_rows('new_video_item', 'options')) {
    ?>

    <section class="media gradient-bg">
        <div class="container">
            <?php
            if ($media_title) {
                echo '<h2 class="big-title media__title">' . $media_title . '</h2>';
            }
            ?>

            <div class="swiper media__slider photo-gallery-slider">
                <div class="swiper-wrapper">
                    <?php if (have_rows('new_photo_gallery_image', 'options')): ?>
                        <?php while (have_rows('new_photo_gallery_image', 'options')):
                            the_row();
                            $photo_gallery_image = get_sub_field('photo_gallery_image', 'options');
                            $photo_other_pages = get_sub_field('photo_other_pages', 'options');

                            if ($photo_other_pages == 'да') {
                                ?>

                                <a href="<?php echo $photo_gallery_image['url']; ?>" class="swiper-slide photo-gallery-slider__slide"
                                    data-fancybox="photo_block_gallery">
                                    <img src="<?php echo $photo_gallery_image['url']; ?>"
                                        alt="<?php echo $photo_gallery_image['alt']; ?>">
                                </a>

                            <?php }
                        endwhile; ?>
                    <?php endif; ?>
                </div>

                <div class="swiper-button-next slider-arrow-next"></div>
                <div class="swiper-button-prev slider-arrow-prev"></div>
            </div>

            <div class="media__video media-video-box d-flex align-items-start justify-content-start justify-content-md-between justify-content-lg-end">
                <div class="kaska-decor position-relative col d-none d-md-block">
                    <span class="kaska-decor__img position-absolute"></span>
                </div>

                <ul class="media-video-box__wrap few-video-wrap d-grid grid-two">
                    <?php if (have_rows('new_video_item', 'options')): ?>
                        <?php while (have_rows('new_video_item', 'options')):
                            the_row();
                            $few_video_type = get_sub_field('few_video_type', 'options');
                            $few_video = get_sub_field('few_video', 'options');
                            $few_video_id = get_sub_field('few_video_id', 'options');
                            $video_other_pages = get_sub_field('video_other_pages', 'options');

                            if ($video_other_pages == 'да') {
                                ?>

                                <li class="few-video-wrap__video">
                                    <?php
                                    if ($few_video_type == 'файл' && $few_video) { ?>
                                        <video controls class="few-video-wrap__file">
                                            <source src="<?php echo esc_url($few_video['url']); ?>" type="video/webm" />

                                            <source src="<?php echo esc_url($few_video['url']); ?>" type="video/mp4" />
                                        </video>

                                    <?php } else if ($few_video_type == 'ссылка' && $few_video_id) { ?>
                                            <iframe src="https://rutube.ru/play/embed/<?php echo $few_video_id; ?>" frameBorder="0"
                                                allow="clipboard-write; autoplay" webkitAllowFullScreen mozallowfullscreen allowFullScreen>
                                            </iframe>
                                    <?php } ?>
                                </li>

                            <?php }
                        endwhile; ?>
                    <?php endif; ?>
                </ul>

                <a href="#" class="button media__button col-auto">Смотреть все фото и видео</a>
            </div>
        </div>
    </section>

<?php }