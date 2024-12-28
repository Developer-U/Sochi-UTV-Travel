<?php
/**
 * Displaying Block width text and right image
 * Блок отражает слева текст, справа до края экрана изображение
 */

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

/*ACF fields*/
$page_id = get_the_ID();
$background_image = get_field('background_image', $page_id);
$right_image_title = get_field('right_image_title', $page_id);
$right_image_subtitle = get_field('right_image_subtitle', $page_id);
// Fields on right block
$bar_text = get_field('bar_text', $page_id);
$right_image = get_field('right_image', $page_id);
$right_image_underground = get_field('right_image_underground', $page_id);

if ($right_image_title) { ?>
    <section class="right-image position-relative" <?php
    if ($background_image) { ?>
            style="background-image: url('<?php echo $background_image['url']; ?>)" <?php } ?>>

        <div class="container">
            <?php
            if ($right_image_title) {
                echo '<h2 class="right-image__title">' . $right_image_title . '</h2>';
            }
            ?>
            <div class="right-image__texts right-image-text-block">
                <?php
                if ($right_image_subtitle) {
                    echo '<h3 class="right-image__subtitle">' . $right_image_subtitle . '</h3>';
                }
                if (have_rows('new_right_image_item')) { ?>
                    <ul class="right-image__list right-image-list">
                        <?php if (have_rows('new_right_image_item')) { ?>
                            <?php while (have_rows('new_right_image_item')) {
                                the_row();
                                $right_image_item_title = get_sub_field('right_image_item_title');
                                $right_image_item_text = get_sub_field('right_image_item_text');
                                ?>

                                <li class="right-image-list__item right-image-item position-relative">
                                    <h3 class="right-image-item__title">
                                        <?php echo $right_image_item_title; ?>
                                    </h3>

                                    <p class="right-image-item__text">
                                        <?php echo $right_image_item_text; ?>
                                    </p>
                                </li>
                            <?php }
                        } ?>
                    </ul>
                <?php }
                ?>
            </div>
        </div>

        <div class="right-image__wrap right-wrap">
            <?php
            if ($bar_text) {
                echo '<div class="gold-bar-text position-relative"><div>' . $bar_text . '</div></div>';
            }
            if ($right_image) {
                echo '<figure class="right-wrap__image position-relative d-none d-md-block"><img src="' . $right_image['url'] . '" alt="' . $right_image['alt'] . '"></figure>';
            }
            if ($right_image_underground) {
                echo '<figure class="right-wrap__underground d-none d-md-block"><img src="' . $right_image_underground['url'] . '" alt="' . $right_image_underground['alt'] . '"></figure>';
            }
            ?>
        </div>
    </section>

<?php } ?>