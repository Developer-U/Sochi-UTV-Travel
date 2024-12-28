<?php
if (!defined('ABSPATH')) {
	exit; // Exit if accessed directly
}
/**
 *  Main Page
 */

get_header();

get_template_part('template-parts/hero');

get_template_part('template-parts/block', 'right-image');

get_template_part('template-parts/block', 'services');

get_template_part('template-parts/block', 'routes');

get_template_part('template-parts/advantages');

get_template_part('template-parts/block', 'meals');

get_template_part('template-parts/block', 'technics');

get_template_part('template-parts/block', 'contains');

get_template_part('template-parts/block', 'photo-video');

get_template_part('template-parts/block', 'reviews');

get_template_part('template-parts/block', 'cta');

get_footer();
?>