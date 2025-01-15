<?php
/**
 * The header for our theme
 *
 *
 * @package Blocksy
 */



?><!doctype html>
<html <?php language_attributes(); ?><?php echo blocksy_html_attr() ?>>

<head>
	<?php do_action('blocksy:head:start') ?>

	<meta charset="<?php bloginfo('charset'); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=5, viewport-fit=cover">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<?php wp_head(); ?>
	<?php do_action('blocksy:head:end') ?>
</head>

<?php
ob_start();
blocksy_output_header();
$global_header = ob_get_clean();
?>

<body <?php body_class(); ?> <?php echo blocksy_body_attr() ?>>

	<a class="skip-link show-on-focus" href="<?php echo apply_filters('blocksy:head:skip-to-content:href', '#main') ?>">
		<?php echo __('Skip to content', 'blocksy'); ?>
	</a>

	<?php
	if (function_exists('wp_body_open')) {
		wp_body_open();
	}
	?>

	<?php
	$logo_color = get_field('logo_color', 'options');
	$tel = get_field('tel-link', 'options');
	$phone_num = get_field('tel', 'options');

	?>

	<header class="<?php if (is_front_page()) { ?>header<?php } else { ?>header other-pages<?php } ?>">
		<div class="container-fluid">
			<div class="header__wrapper d-flex justify-content-start  justify-content-lg-between align-items-center">
				<?php get_template_part('template-parts/nav', 'menu'); ?>

				<a href="/" class="header__logo">
					<?php
					if ($logo_color) { ?>
						<img src="<?php echo $logo_color['url']; ?>" alt="<?php echo $logo_color['alt']; ?>">
					<?php } ?>
				</a>
				
				<?php
				if (is_front_page()) {
					if ($tel && $phone_num) { ?>
						<span class="header__tel col-auto">
							<a class="col-auto" href="tel:+7<?php echo $tel; ?>">
								<?php echo $phone_num; ?>
							</a>
						</span>
					<?php }
					;
					echo '<div class="col-auto d-none d-lg-block">';
					get_template_part('template-parts/booking', 'button');
					echo '</div>';

				} else {
					echo '<div class="other-pages-menu d-none d-xl-block">';
					echo estore_primary_menu();
					echo '</div>';

					if ($tel && $phone_num) { ?>
						<span class="header__tel col-auto">
							<a class="col-auto" href="tel:+7<?php echo $tel; ?>">
								<?php echo $phone_num; ?>
							</a>
						</span>
					<?php }
					
				}
				?>
			</div>
		</div>
	</header>