<?php
/**
 * Displaying Block Route Params
 * Отображает блок параметров маршрута
 */
$route_time = get_field('route_time');
$route_duration = get_field('route_duration');
$route_volume = get_field('route_volume');

if ($route_time || $route_duration || $route_volume) {

    // Вариант, если это конечная страница маршрута
    if (is_singular('routes')) { ?>
        <ul class="route-params single">
            <?php if ($route_time) { ?>
                <li class="route-params__item time">
                    <p>Время прохождения</p>
                    <p class="color-green"><?php echo $route_time; ?></p>
                </li>
            <?php }
            if ($route_duration) { ?>
                <li class="route-params__item duration">
                    <p>Дистанция маршрута</p>
                    <p class="color-green"><?php echo $route_duration; ?>&nbsp;км</p>
                </li>
            <?php } 
            if ($route_volume) { ?>
                <li class="route-params__item volume">
                    <p>Сложность</p>
                    <p class="color-green"><?php echo $route_volume['from']. '/' .$route_volume['to']; ?></p>
                </li>
            <?php } ?>
        </ul>
    <?php } else { ?>
        <ul class="route-item__params route-params d-grid align-items-center grid-two">
            <?php if ($route_time) { ?>
                <li class="route-params__item time">
                    <p><?php echo $route_time; ?></p>
                </li>
            <?php }
            if ($route_duration) { ?>
                <li class="route-params__item duration">
                    <p><?php echo $route_duration; ?>&nbsp;км</p>
                </li>
            <?php } ?>
        </ul>
    <?php }
}
?>