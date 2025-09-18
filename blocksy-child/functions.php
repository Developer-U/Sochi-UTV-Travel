<?php
if (!defined('WP_DEBUG')) {
	die('Direct access forbidden.');
}


// Добавим Страницу опций на ACF PRO options_theme

if (function_exists('acf_add_options_page')) {

	acf_add_options_page(array(
		'page_title' => 'Основные настройки',
		'menu_title' => 'Основная информация',
		'menu_slug' => 'theme-general-settings',
		'capability' => 'edit_posts',
		'redirect' => false
	));

	acf_add_options_page(array(
		'page_title' => 'Идентичные блоки',
		'menu_title' => 'Идентичные блоки',
		'icon_url' => 'dashicons-table-col-after',
		'menu_slug' => 'theme-general-blocks',
		'capability' => 'edit_posts',
		'redirect' => false
	));
}

/*
 * Скрипты и стили
 */
require get_stylesheet_directory() . '/includes/enqueue-scripts.php';

/*
 * Файл навигации (меню на сайте)
 */
require get_stylesheet_directory() . '/includes/navigations.php';

/*
 * Подключение настроек темы
 */
require get_stylesheet_directory() . '/includes/duplicate-types.php';

/*
 * Добавим произвольные типы записей
 */
require get_stylesheet_directory() . '/includes/post-types.php';

/*
 * Шорткоды
 */
require get_stylesheet_directory() . '/includes/shortcodes.php';


// 1. создаем новую колонку Категория

add_filter('manage_' . 'routes' . '_posts_columns', 'add_views_column', 2);

function add_views_column($columns)
{

	// вставляем в нужное место - 3 - 3-я колонка
	$out = array();
	foreach ($columns as $col => $name) {
		if (++$i == 3)
			$out['taxonomy_name'] = 'Категория';
		$out[$col] = $name;
	}

	return $out;
}

// 2. заполняем колонку данными.

add_action('manage_' . 'routes' . '_posts_custom_column', 'fill_views_column', 5, 2);
function fill_views_column($column, $post_id)
{
	$taxonomy = 'routes-tax';
	$terms = get_the_terms($post_id, $taxonomy);

	if ($column === 'taxonomy_name') {
		foreach ($terms as $term) {
			echo $term->name;
		}
	}
}