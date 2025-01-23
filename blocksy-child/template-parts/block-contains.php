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
            if ($contains_title) { ?>
                <h2 class="right-image__title" data-aos="fade-left" data-aos-offset="0" data-aos-delay="50"
                    data-aos-duration="800" data-aos-easing="linear" data-aos-once="true"
                    data-aos-anchor-placement="bottom-left"><?php echo $contains_title; ?></h2>
            <?php }
            ?>
            <div class="contains__texts right-image-text-block">
                <?php
                if (have_rows('new_contains_item')) { ?>
                    <ul class="contains__list right-image-list">
                        <?php if (have_rows('new_contains_item')) {
                            $x = 0; ?>
                            <?php while (have_rows('new_contains_item')) {
                                the_row();
                                $contains_item_title = get_sub_field('contains_item_title');
                                $contains_item_text = get_sub_field('contains_item_text');
                                $index_x = $x++;
                                ?>

                                <li data-aos="fade-up" data-aos-offset="200" data-aos-delay="<?php echo 100 * ($index * 3.5); ?>"
                                    data-aos-duration="900" data-aos-easing="ease-in-out" data-aos-once="false"
                                    data-aos-anchor-placement="top-left"
                                    class="right-image-list__item right-image-item position-relative">
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

                if(!is_single()) {
                    get_template_part('template-parts/booking', 'button'); 
                } else {
                    echo '<a class="button route-sidebar__button" href="#cta_2_' .$page_id. '">забронировать тур</a>';
                }
                ?>

            </div>
        </div>

        <div class="contains__wrap right-wrap">
            <?php
            if ($contains_bar_text) {
                echo '<div data-depth="0.8" class="scene gold-bar-text gold-bar-text__contains"><div>' . $contains_bar_text . '</div></div>';
            }
            if ($contains_right_image) {
                echo '<figure class="right-wrap__image right-wrap__image_contains position-relative"><img src="' . $contains_right_image['url'] . '" alt="' . $contains_right_image['alt'] . '"></figure>';
            }
            ?>
        </div>
    </section>

<?php } ?>