<?php
/**
 * Displaying Block Route dates
 * Блок Преимущества
 */

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}
/*ACF fields*/
$page_id = get_the_ID();
$route_date_title = get_field('route_date_title', $page_id);
$route_date_text = get_field('route_date_text', $page_id);
$route_current_title = get_field('route_current_title', $page_id);
$route_current_date = get_field('route_current_date', $page_id);
$route_next_title = get_field('route_next_title', $page_id);
$route_end = get_field('route_end', $page_id);

if ($route_current_date['start'] || $route_current_date['end']) {
    ?>
    <article id="dates_<?php echo $page_id; ?>" class="route-date">
        <h2 class="route-date__title single-sidebar-title">
            <?php if ($route_date_title) {
                echo $route_date_title;
            } else {
                echo 'График тура';
            }
            ?>
        </h2>

        <?php if ($route_date_text) {
            echo '<div class="route-date__text post">' . $route_date_text . '</div>';
        } ?>

        <h3 class="route-date__subtitle">
            <?php if ($route_current_title) {
                echo $route_current_title;
            } else {
                echo 'На&nbsp;данный момент идёт набор группы на&nbsp;следующие даты:';
            }
            ?>
        </h3>

        <div class="route-date__box date-box d-flex align-items-center gap-3">
            <date class="date-box__date"><?php echo $route_current_date['start']; ?></date>
            <date class="date-box__date"><?php echo $route_current_date['end']; ?></date>
            <?php if ($route_end == 'да') {
                echo '<p class="text-danger small mb-0">Набор закончен</p>';
            } ?>
        </div>

        <?php if (have_rows('new_next_route_date')) { ?>
            <div class="route-date__next next-dates">
                <ul class="next-dates__list next-dates-list">
                    <?php if (have_rows('new_next_route_date')) {
                        while (have_rows('new_next_route_date')) {
                            the_row();
                            $next_route_date = get_sub_field('next_route_date');
                            ?>

                            <li class="next-dates-list__item date-box d-flex gap-3">
                                <date class="date-box__date"><?php echo $next_route_date['start']; ?></date>
                                <date class="date-box__date"><?php echo $next_route_date['end']; ?></date>
                            </li>
                        <?php }
                    } ?>
                </ul>
            </div>
        <?php } ?>
    </article>
<?php }