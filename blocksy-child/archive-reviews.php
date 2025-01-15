<?php
/**
 * Archive peage post type: reviews
 * Архивная страница с выводом постов Отзывы
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 */
## Удаляет "Рубрика: ", "Метка: " и т.д. из заголовка архива
add_filter('get_the_archive_title', function ($title) {
    return preg_replace('~^[^:]+: ~', '', $title);
});

get_header();

// Top Block
get_template_part('template-parts/top', 'block');

get_template_part('template-parts/block', 'reviews');

get_template_part('template-parts/block', 'meals');

get_template_part('template-parts/advantages');

get_template_part('template-parts/block', 'technics');

get_footer();