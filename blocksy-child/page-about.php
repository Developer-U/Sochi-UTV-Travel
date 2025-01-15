<?php
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}
/**
 *  Page About
 */

get_header();

get_template_part('template-parts/top', 'block');

get_template_part('template-parts/block', 'about');

get_template_part('template-parts/advantages');

get_template_part('template-parts/block', 'services');

get_template_part('template-parts/block', 'faq');

get_template_part('template-parts/block', 'cta');

get_footer();