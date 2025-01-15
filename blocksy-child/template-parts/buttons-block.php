<?php
/**
 * Template part for displaying Buttons block
 * Отображает блок с кнопками (максимум три) - ссылками
 */

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}
$page_id = get_the_ID();
$button_first = get_field('button_first', $page_id);
$button_second = get_field('button_second', $page_id);
$button_third = get_field('button_third', $page_id);
if (($button_first['title'] && $button_first['link']) || ($button_second['title'] && $button_second['link']) || ($button_third['title'] && $button_third['link'])) {
    ?>

    <div class="social-buttons-block d-flex align-items-center">
        <div class="d-block d-xl-none">
            <?php
            get_template_part('template-parts/social');
            ?>
        </div>

        <div class="buttons-block d-flex gap-2">
            <?php
            if ($button_first['title'] && $button_first['link']) {
                echo '<a class="button gold" href=" ' . $button_first['link'] . ' " target="_blank">' . $button_first['title'] . '</a>';
            }
            if ($button_second['title'] && $button_second['link']) {
                echo '<a class="button green d-none d-md-flex" href=" ' . $button_second['link'] . ' " target="_blank">' . $button_second['title'] . '</a>';
            }
            if ($button_third['title'] && $button_third['link']) {
                echo '<a class="button dark-green d-none d-md-flex" href=" ' . $button_third['link'] . ' " target="_blank">' . $button_third['title'] . '</a>';
            }
            ?>
        </div>
    </div>

<?php } ?>