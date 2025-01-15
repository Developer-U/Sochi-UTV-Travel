<?php
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}
/**
 *  Page Gallery (Photo & Video)
 */

get_header();

get_template_part('template-parts/top', 'block');

get_template_part('template-parts/block', 'gallery');

get_template_part('template-parts/block', 'services');

get_template_part('template-parts/block', 'cta');

get_footer();