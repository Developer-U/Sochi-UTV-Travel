<?php
/**
 * Archive peage post type: actions
 * Архивная страница с выводом постов Наши акции
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 */
## Удаляет "Рубрика: ", "Метка: " и т.д. из заголовка архива
add_filter('get_the_archive_title', function ($title) {
    return preg_replace('~^[^:]+: ~', '', $title);
});
$action_digits = get_field('action_digits');
$actions_one_action_image = get_field('actions_one_action_image', 'options');
$actions_one_action_text = get_field('actions_one_action_text', 'options');
get_header();

// Top Block
get_template_part('template-parts/top', 'block');

// Block first action
get_template_part('template-parts/block', 'first-action');

get_template_part('template-parts/block', 'actions');

get_template_part('template-parts/block', 'services');

get_template_part('template-parts/block', 'photo-video');

get_template_part('template-parts/block', 'cta');

get_footer();