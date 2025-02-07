<?php
/**
 * Displaying Block Route Params
 * Отображает блок параметров маршрута
 */
$route_text = get_field('route_text', 'options');

if ($route_text) {

    // Вариант, если это конечная страница маршрута
    if (is_singular('routes')) {
        echo '<div class="route-params single single-text">' .$route_text. '</div>';            
    } else {
        echo '';
    }
} else {
    if (is_singular('routes')) {
        echo '<div class="route-params single single-text">Время маршрута и расстояние - по договорённости</div>';
    } else {
        echo '';
    }
}
?>