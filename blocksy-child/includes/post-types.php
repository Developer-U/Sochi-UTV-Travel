<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

/* Регистрируем новый тип записей - Услуги
-----------------------------------------------*/
add_action('init', 'services');
function services()
{
  $labels = array(
    'name' => 'Услуги',
    'singular_name' => 'Услуга',
    'add_new' => 'Добавить услугу',
    'add_new_item' => 'Добавить новую услугу',
    'edit_item' => 'Редактировать услугу',
    'new_item' => 'Новая услуга',
    'view_item' => 'Посмотреть Услуги',
    'search_items' => 'Найти Услуги',
    'not_found' =>  'Услуг не найдено',
    'not_found_in_trash' => 'В корзине услуг не найдено',
    'parent_item_colon' => '',
    'menu_name' => 'Услуги'
  );

  $args = array(
    'labels' => $labels,
    'public' => true,
    'menu_icon' => 'dashicons-megaphone',
    'publicly_queryable' => true,
    'show_ui' => true,
    'show_in_menu' => true,
    'show_in_nav_menus'   => true,
    'show_in_rest' => true,
    'query_var' => true,
    'rewrite' => true,
    'capability_type' => 'post',
    'has_archive' => false,
    'hierarchical' => false,    
    'menu_position' => 5,
    'supports' => array('title','editor', 'excerpt', 'thumbnail', 'custom-fields'),

  );
  register_post_type('services',$args);  
}

/* Регистрируем новый тип записей - Отзывы
-----------------------------------------------*/
add_action('init', 'reviews');
function reviews()
{
  $labels = array(
    'name' => 'Отзывы',
    'singular_name' => 'Отзыв',
    'add_new' => 'Добавить Отзыв',
    'add_new_item' => 'Добавить новый Отзыв',
    'edit_item' => 'Редактировать Отзыв',
    'new_item' => 'Новый Отзыв',
    'view_item' => 'Посмотреть Отзывы',
    'search_items' => 'Найти Отзывы',
    'not_found' =>  'Отзывов не найдено',
    'not_found_in_trash' => 'В корзине отзывов не найдено',
    'parent_item_colon' => '',
    'menu_name' => 'Отзывы'
  );

  $args = array(
    'labels' => $labels,
    'public' => true,
    'menu_icon' => 'dashicons-format-status',
    'publicly_queryable' => true,
    'show_ui' => true,
    'show_in_menu' => true,
    'query_var' => true,
    'rewrite' => true,
    'capability_type' => 'post',
    'has_archive' => false,
    'hierarchical' => false,
    'menu_position' => 5,
    'supports' => array('title','editor','thumbnail', 'custom-fields'),

  );
  register_post_type('reviews',$args);  
}

/* Регистрируем новый тип записей - Направления туров и рубрики к ним
-----------------------------------------------*/
add_action('init', 'routes');
function routes()
{
  $labels = array(
    'name' => 'Направления',
    'singular_name' => 'Направление',
    'add_new' => 'Добавить направление',
    'add_new_item' => 'Добавить новое направление',
    'edit_item' => 'Редактировать направление',
    'new_item' => 'Новое направление',
    'view_item' => 'Посмотреть направление',    
    'search_items' => 'Найти направление',
    'not_found' =>  'Направлений не найдено', 
    'parent_item_colon' => '',
    'menu_name' => 'Направления'
  );

  $args = array(
    'labels' => $labels,
    'public' => true,
    'menu_icon' => 'dashicons-grid-view',
    'publicly_queryable' => true,
    'show_ui' => true,
    'show_in_menu' => true,
    'query_var' => true,
    'rewrite' => true,
    'capability_type' => 'post',
	'show_tagcloud' => true,
    'has_archive' => true,
    'hierarchical' => true,
    'menu_position' => 6,
    'supports' => array('title', 'editor','excerpt','thumbnail', 'page-attributes'),
	  // 'taxonomies' => array('taxonomy', 'post_tag'),
  );

  // register_taxonomy( 'taxonomy', [ 'routes' ], [
	// 	'label'                 => '', // определяется параметром $labels->name
	// 	'labels'                => [
	// 		'name'              => 'Категории',
	// 		'singular_name'     => 'Категория',
	// 		'search_items'      => 'Найти категорию',
	// 		'all_items'         => 'Все категории',
	// 		'view_item '        => 'Показать категорию',
	// 		'parent_item'       => 'Родительская категория',
	// 		'parent_item_colon' => 'Родительская категория:',
	// 		'edit_item'         => 'Редактировать категорию',
	// 		'update_item'       => 'Обновить категорию',
	// 		'add_new_item'      => 'Добавить новую категорию',
	// 		'new_item_name'     => 'Название категории',
	// 		'menu_name'         => 'Категории',
	// 		'back_to_items'     => '← Вернуться к рубрике',
	// 	],
	// 	'description'           => '', // описание таксономии
	// 	'public'                => true,
	// 	'publicly_queryable'    => null, // равен аргументу public
	// 	'show_in_nav_menus'     => true, // равен аргументу public
	// 	'show_ui'               => true, // равен аргументу public
	// 	'show_in_menu'          => true, // равен аргументу show_ui
	// 	'show_tagcloud'         => true, // равен аргументу show_ui
	// 	'show_in_quick_edit'    => null, // равен аргументу show_ui
	// 	'hierarchical'          => true,
  //   'show_admin_column'     => true,

	// 	'rewrite'               => true,
	// 	//'query_var'             => $taxonomy, // название параметра запроса
	// 	'capabilities'          => array(),
	// 	'meta_box_cb'           => 'post_categories_meta_box', // html метабокса. callback: `post_categories_meta_box` или `post_tags_meta_box`. false — метабокс отключен.
	// 	'show_admin_column'     => false, // авто-создание колонки таксы в таблице ассоциированного типа записи. (с версии 3.5)
	// 	'show_in_rest'          => true, // добавить в REST API
	// 	'rest_base'             => null, // $taxonomy
	// 	// '_builtin'              => false,
	// 	//'update_count_callback' => '_update_post_term_count',
	// ] );

  register_post_type('routes',$args);  
}

