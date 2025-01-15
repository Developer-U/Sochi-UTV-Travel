<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

register_nav_menus( array(
    'primary' => 'Основное', 
    'left_sidebar' => 'Меню в сайдбаре',
    'services' => 'Меню услуг',   
));

function estore_primary_menu() {
    wp_nav_menu( [
        'theme_location'  => 'primary',    
        'menu_id'         => 'primary-menu'   
    ] );
}

function estore_services_menu() {
    wp_nav_menu( [
        'theme_location'  => 'services',    
        'menu_id'         => 'services-menu'   
    ] );
}

function estore_left_sidebar_menu() {
    wp_nav_menu( [
        'theme_location'  => 'left_sidebar',    
        'menu_id'         => 'primary-menu'   
    ] );
}