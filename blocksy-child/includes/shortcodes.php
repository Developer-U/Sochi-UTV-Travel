<?php
/**
 * Display Block Shortcodes
 * Шорткоды
 */

if (!defined('ABSPATH')) {
	exit; // Exit if accessed directly
}

/*
 * Шорткод тарифы
 */
add_shortcode('route-tabs', 'route_tabs_shortcode_callback');

function route_tabs_shortcode_callback()
{
	ob_start();

	get_template_part('template-parts/block', 'route-tabs');

	$output = ob_get_contents(); // всё, что вывели, окажется внутри $output
	ob_end_clean();

	return $output;
}


