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
$meals_background_image = get_field('meals_background_image', $page_id);
$meals_title = get_field('meals_title', $page_id);
$meals_text = get_field('meals_text', $page_id);

if ($meals_title) { ?>
    <section class="meals" <?php
    if ($meals_background_image) { ?>
            style="background-image: url('<?php echo $meals_background_image['url']; ?>)" <?php } ?>>

        <div class="container">
            <?php
            if ($meals_title) {
                echo '<h2 class="meals__title position-relative">' . $meals_title . '</h2>';
            }
            ?>
            <div class="meals__wrap meals-wrap position-relative">
                <div class="meals-wrap__text">
                    <?php echo $meals_text; ?>
                </div>

                <a href="#" class="button meals-wrap__button">Смотреть наше меню</a>
            </div>
        </div>
    </section>
<?php }
