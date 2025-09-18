<?php
/**
 * Displaying Block Route Tabs
 * Блок Выбор параметра маршрута
 */

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

/*ACF fields*/
$page_id = get_the_ID();

if (have_rows('add_route_tab', $page_id) && have_rows('add_route_tab_content', $page_id)) {
    ?>

    <main id="route_tabs" class="gallery-tabs route-tabs">
        <!-- Кнопки-переключатели табов -->
        <ul class="route-tabs__btns gallery-tab-btns route-tab-btns d-flex gap-1">
            <?php
            if (have_rows('add_route_tab', $page_id)) {
                $i = 1;
                while (have_rows('add_route_tab', $page_id)) {
                    the_row();
                    $route_tab_name = get_sub_field('route_tab_name', $page_id);
                    $index = $i++;
                    ?>

                    <li class="button gallery-tab-btns__button route-tab-btns__button js-pathTabs col-auto <?php if ($index == 1): ?>active<?php endif; ?>"
                        data-path="<?php echo $index; ?>" data-tabpathrep="galery_<?php echo $index; ?>">
                        <?php echo $route_tab_name; ?>
                    </li>
                <?php }
            } ?>
        </ul>

        <div class="route-tabs__wrap route-tabs-wrap">
            <?php
            if (have_rows('add_route_tab_content', $page_id)) {
                $n = 1;
                while (have_rows('add_route_tab_content', $page_id)) {
                    the_row();
                    $route_tab_title = get_sub_field('route_tab_title', $page_id);
                    $route_tab_content = get_sub_field('route_tab_content', $page_id);
                    $indexN = $n++;
                    ?>

                    <article
                        class="route-tabs-wrap__target js-targetTabs route-tabs-target <?php if ($indexN === 1): ?>active<?php endif; ?>"
                        data-target="<?php echo $indexN; ?>" data-tabTargetReprep="galery_<?php echo $indexN; ?>">
                        <h2 class="route-tabs-wrap__title"> <?php echo $route_tab_title; ?></h2>

                        <div><?php echo $route_tab_content; ?></div>
                    </article>

                <?php }
            } ?>
        </div>
    </main>

<?php }