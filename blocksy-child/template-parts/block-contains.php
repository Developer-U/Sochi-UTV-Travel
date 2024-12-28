<?php
/**
 * Displaying Block Contains
 * Блок Что входит в стоимость
 */

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

/*ACF fields*/
$page_id = get_the_ID();
$contains_background_image = get_field('contains_background_image', $page_id);
$contains_title = get_field('contains_title', $page_id);

// Fields on right block
$contains_bar_text = get_field('contains_bar_text', $page_id);
$contains_right_image = get_field('contains_right_image', $page_id);

if ($contains_title) { ?>
    <section class="contains position-relative" <?php
    if ($contains_background_image) { ?>
            style="background-image: url('<?php echo $contains_background_image['url']; ?>)" <?php } ?>>

        <div class="container">
            <?php
            if ($contains_title) {
                echo '<h2 class="right-image__title">' . $contains_title . '</h2>';
            }
            ?>
            <div class="contains__texts right-image-text-block">
                <?php                
                if (have_rows('new_contains_item')) { ?>
                    <ul class="contains__list right-image-list">
                        <?php if (have_rows('new_contains_item')) { ?>
                            <?php while (have_rows('new_contains_item')) {
                                the_row();
                                $contains_item_title = get_sub_field('contains_item_title');
                                $contains_item_text = get_sub_field('contains_item_text');
                                ?>

                                <li class="right-image-list__item right-image-item position-relative">
                                    <h3 class="right-image-item__title">
                                        <?php echo $contains_item_title; ?>
                                    </h3>

                                    <p class="right-image-item__text">
                                        <?php echo $contains_item_text; ?>
                                    </p>
                                </li>
                            <?php }
                        } ?>
                    </ul>
                <?php }
                ?>
                <button class="button contains__button">Забронировать тур</button>
            </div>
        </div>

        <div class="contains__wrap right-wrap">
            <?php
            if ($contains_bar_text) {
                echo '<div class="gold-bar-text gold-bar-text__contains"><div>' . $contains_bar_text . '</div></div>';
            }
            if ($contains_right_image) {
                echo '<figure class="right-wrap__image right-wrap__image_contains position-relative"><img src="' . $contains_right_image['url'] . '" alt="' . $contains_right_image['alt'] . '"></figure>';
            }            
            ?>
        </div>
    </section>

<?php } ?>