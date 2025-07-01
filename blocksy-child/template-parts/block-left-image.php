<?php
/**
 * Displaying Block width text and left image
 * Блок отражает справа текст, слева до края экрана изображение
 */

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

/*ACF fields*/
$page_id = get_the_ID();
$background_image = get_field('background_left_image', $page_id);
$left_image_title = get_field('left_image_title', $page_id);
$left_image_text = get_field('left_image_text', $page_id);

$left_image = get_field('left_image', $page_id);

$button_left_image_title = get_field('button_left_image_title', $page_id);
$button_left_image_link = get_field('button_left_image_link', $page_id);

if ($left_image_title) { ?>
    <section class="left-image position-relative" <?php
    if ($background_image) { ?>
            style="background-image: url('<?php echo $background_image['url']; ?>)" <?php } ?>>
        <div class="section-gradient position-absolute"></div>

        <div class="container position-relative">
            <?php
            if ($left_image_title) {
                echo '<h2 class="left-image__title">' . $left_image_title . '</h2>';
            }
            if ($left_image_text) {
                echo '<div class="left-image__text">' . $left_image_text . '</div>';
            }
            ?>
            <div class="left-image__texts right-image-text-block">
                <?php

                if (have_rows('new_left_image_item')) { ?>
                    <ul class="left-image__list right-image-list">
                        <?php if (have_rows('new_left_image_item')) { ?>
                            <?php while (have_rows('new_left_image_item')) {
                                the_row();
                                $left_image_item_title = get_sub_field('left_image_item_title');
                                ?>

                                <li class="right-image-list__item right-image-item position-relative">
                                    <div class="left-image-item__title">
                                        <?php echo $left_image_item_title; ?>
                                    </div>
                                </li>
                            <?php }
                        } ?>
                    </ul>
                <?php }

                if ($button_left_image_title && $button_left_image_link) {
                    echo '<a href="' . $button_left_image_link . '" class="button mt-4">' . $button_left_image_title . '</a>';
                }
                ?>
            </div>
        </div>

        <div class="left-image__wrap right-wrap">
            <?php
            if ($left_image) { ?>
                <figure data-aos="fade-left" data-aos-offset="50" data-aos-delay="0" data-aos-duration="900"
                    data-aos-easing="linear" data-aos-once="true" data-aos-anchor-placement="top-left"
                    class="right-wrap__image position-relative">
                    <img src="<?php echo $left_image['url']; ?>" alt="<?php echo $left_image['alt']; ?>">
                </figure>
            <?php }
            ?>
        </div>
    </section>

<?php } ?>