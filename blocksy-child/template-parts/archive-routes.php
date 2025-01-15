<?php
/**
 * Archive peage post type: routes
 * Архивная страница с выводом постов Направления туров
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

get_template_part('template-parts/block', 'routes');

get_template_part('template-parts/block', 'cta2');

get_template_part('template-parts/block', 'services');

get_footer();