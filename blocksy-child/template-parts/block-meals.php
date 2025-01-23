<?php
/**
 * Displaying Block Meals
 * Блок Питание на маршруте
 */

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

/*ACF fields*/
$page_id = get_the_ID();
$fields_prefix = is_archive() ? 'options' : $page_id;
$fields_index = is_archive() ? '_' . $page_id : '';
$meals_background_image = get_field('meals_background_image', 'options');
$meals_title = get_field('meals_title'. $fields_index, $fields_prefix);
$meals_text = get_field('meals_text', 'options');

if ($meals_title) { ?>
    <section class="meals" <?php
    if ($meals_background_image) { ?>
            style="background-image: url('<?php echo $meals_background_image['url']; ?>)" <?php } ?>>

        <div class="container">
            <?php
            if ($meals_title) { ?>
                <h2 data-aos="fade-left" data-aos-offset="100" data-aos-delay="50"
                data-aos-duration="900" data-aos-easing="linear" data-aos-once="true"
                class="meals__title position-relative"><?php echo $meals_title; ?></h2>
            <?php }
            ?>
            <div class="meals__wrap meals-wrap position-relative">
                <div data-aos="fade-up" data-aos-offset="100"
                    data-aos-delay="100" data-aos-duration="1000" data-aos-easing="linear" data-aos-once="false"
                    data-aos-anchor-placement="top"
                    class="meals-wrap__text">
                    <?php echo $meals_text; ?>
                </div>

                <a href="/services/goryachee-pitanie/" class="button meals-wrap__button">Смотреть наше меню</a>
            </div>
        </div>
    </section>
<?php }
