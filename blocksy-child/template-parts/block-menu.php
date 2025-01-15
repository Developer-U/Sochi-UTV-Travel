<?php
/**
 * Displaying Block Menu
 * Блок Меню
 */

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}
/*ACF fields*/
$page_id = get_the_ID();

if (have_rows('new_menu_category', 'options')) {
    ?>

    <section class="menu gradient-bg">
        <div class="container">
            <h2 class="big-title menu__title">Наше меню</h2>

            <ul class="menu__categories menu-categories">
                <?php if (have_rows('new_menu_category', 'options')) { ?>
                    <?php while (have_rows('new_menu_category', 'options')) {
                        the_row();
                        $menu_cat_title = get_sub_field('menu_cat_title', 'options');
                        ?>

                        <li class="menu-categories__item menu-category">
                            <h2 class="menu-category__title">
                                <?php echo $menu_cat_title; ?>
                            </h2>

                            <ul class="menu-category__list menu-list d-flex">
                                <?php if (have_rows('new_menu_item', 'options')) { ?>
                                    <?php while (have_rows('new_menu_item', 'options')) {
                                        the_row();
                                        $menu_item_title = get_sub_field('menu_item_title', 'options');
                                        $menu_item_image = get_sub_field('menu_item_image', 'options');
                                        $menu_item_description = get_sub_field('menu_item_description', 'options');
                                        ?>

                                        <li class="menu-list__item menu-food-item d-grid align-items-start">
                                            <div class="menu-food-item__images position-relative">
                                                <figure class="menu-food-item__image">
                                                    <img src="<?php echo $menu_item_image['url']; ?>"
                                                        alt="<?php echo $menu_item_image['alt']; ?>">
                                                </figure>
                                            </div>

                                            <div class="menu-food-item__right">
                                                <h3 class="menu-food-item__title">
                                                    <?php echo $menu_item_title; ?>
                                                </h3>

                                                <?php
                                                if ($menu_item_description) {
                                                    echo '<p class="menu-food-item__description">' . $menu_item_description . '</p>';
                                                } ?>
                                            </div>
                                        </li>

                                    <?php }
                                } ?>
                            </ul>
                        </li>
                    <?php }
                } ?>
            </ul>
        </div>
    </section>

<?php }