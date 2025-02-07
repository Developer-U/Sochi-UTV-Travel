<?php
/**
 * Displaying Block Route Geographics
 * Блок География маршрута
 */

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

/*ACF fields*/
$page_id = get_the_ID();
$geo_route_title = get_field('geo_route_title', 'options');
$geo_gold_bar_text = get_field('geo_gold_bar_text', 'options');
$geo_green_bar_text = get_field('geo_green_bar_text', 'options');

if (have_rows('new_route_point')) {
    ?>

    <section id="geo_<?php echo $page_id; ?>" class="route-geographics position-relative"
        style="background-image: url('<?php echo wp_get_attachment_url(get_post_thumbnail_id()); ?>'); background-size: cover; background-repeat: no-repeat">

        <div class="container">
            <div class="route-geographics__wrap route-geo-wrap d-grid align-items-start">
                <div class="route-geo-wrap__left route-geo-left">
                    <h2 class="big-title route-geo-left__title">
                        <?php echo $route_point_title ? $route_point_title : 'География маршрута'; ?>
                    </h2>

                    <?php
                    if (have_rows('new_route_point')) { ?>
                        <ul class="route-geo-left__list route-geo-list">
                            <?php if (have_rows('new_route_point')) { ?>
                                <?php while (have_rows('new_route_point')) {
                                    the_row();
                                    $route_point_title = get_sub_field('route_point_title');
                                    ?>

                                    <li class="route-geo-list__item">
                                        <?php echo $route_point_title; ?>
                                    </li>
                                <?php }
                            } ?>
                        </ul>
                    <?php }
                    ?>
                    </ul>
                </div>

                <?php
                if ($geo_gold_bar_text || $geo_green_bar_text) { ?>
                    <div class="route-geo-wrap__right route-geo-right">
                        <?php
                        if ($geo_gold_bar_text) {
                            echo '<div data-depth="0.8" class="scene gold-bar-text route-geo"><div>' . $geo_gold_bar_text . '</div></div>';
                        }
                        if ($geo_green_bar_text) {
                            echo '<div data-depth="0.5" class="scene green-bar-text route-geo"><div>' . $geo_green_bar_text . '</div></div>';
                        }
                        ?>
                    <? } ?>
                </div>
            </div>
        </div>
    </section>

<?php }