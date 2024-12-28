<?php
/**
 * Displaying Block Technics
 * Блок Наша техника
 */

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

/*ACF fields*/
$page_id = get_the_ID();
$technics_title = get_field('technics_title', $page_id);

if (have_rows('new_technics', 'options')) {
    ?>
    <section class="technics">
        <div class="container">
            <?php
            if ($technics_title) {
                echo '<h2 class="technics__title">' . $technics_title . '</h2>';
            }
            ?>
            <ul class="technics__list technics-list d-grid grid-two">
                <?php if (have_rows('new_technics', 'options')) { ?>
                    <?php while (have_rows('new_technics', 'options')) {
                        the_row();
                        $one_technics_title = get_sub_field('one_technics_title', 'options');
                        $one_technics_image = get_sub_field('one_technics_image', 'options');
                        $one_technics_underground = get_sub_field('one_technics_underground', 'options');
                        $one_technics_strong = get_sub_field('one_technics_strong', 'options');
                        $one_technics_text = get_sub_field('one_technics_text', 'options');
                        ?>

                        <li class="technics-list__item technics-item">
                            <?php
                            if ($one_technics_image) {
                                echo '<figure class="technics-item__image position-relative"><img src="' . $one_technics_image['url'] . '" alt="' . $one_technics_image['alt'] . '"></figure>';
                            }
                            if ($one_technics_underground == 'да') {
                                echo '<div class="technics-item__background position-relative"></div>';
                            }
                            if ($one_technics_title) {
                                echo '<h2 class="technics-item__title position-relative">' . $one_technics_title . '</h2>';
                            }
                            if ($one_technics_strong) {
                                echo '<h3 class="technics-item__strong position-relative">' . $one_technics_strong . '&nbsp;л.с.</h3>';
                            }
                            if ($one_technics_text) {
                                echo '<div class="technics-item__text position-relative">' . $one_technics_text . '</div>';
                            }
                            ?>
                            <a href="#" class="button technics-item__button">Погнали!</a>
                        </li>
                    <?php }
                } ?>
            </ul>
        </div>
    </section>
<?php }