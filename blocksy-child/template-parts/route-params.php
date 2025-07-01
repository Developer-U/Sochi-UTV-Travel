<?php
/**
 * Displaying Block Route Params
 * Отображает блок параметров маршрута
 */
$post_id = get_the_ID();
$route_params = get_field('route_params', $post_id);
?>
<div class="route-params single single-text">
    <?php
    if ($route_params) {
        echo '<h2 class="route-params__title single-sidebar-title">Параметры маршрута</h2>';

        // Вариант, если это конечная страница маршрута
        if (is_singular('routes')) {
            echo '<div class="params-list post">' . $route_params . '</div>';
        } else {
            echo '';
        }
    } else {
        if (is_singular('routes')) {
            echo '<div class="post">Время маршрута и расстояние - по договорённости</div>';
        } else {
            echo '';
        }
    }
    ?>

    <?php
    if (!is_archive()) {
        echo get_template_part('template-parts/block', 'route-days');
    }
    ?>
</div>