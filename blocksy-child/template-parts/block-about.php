<?php
/**
 * Display Block CTA 2
 * блок с формой обратной связи (Справа картинка, слева - контент)
 */

if (!defined('ABSPATH')) {
    exit;
}

$page_id = get_the_ID();
$block_about_title = get_field('block_about_title', $page_id);
$block_about_text = get_field('block_about_text', $page_id);
$block_about_background_image = get_field('block_about_background_image', $page_id);
$block_about_right_side_image = get_field('block_about_right_side_image', $page_id);
$button_about_title = get_field('button_about_title', $page_id);
$button_about_link = get_field('button_about_link', $page_id);

if ($block_about_text) {
    ?>
    <section class="cta cta-2 about position-relative top-lightness left" <?php
    if ($block_about_background_image) { ?>
            style="background-image: url('<?php echo $block_about_background_image['url']; ?>)" <?php } ?>>
        <?php
        if ($block_about_right_side_image) { ?>
            <div data-aos="fade-up" data-aos-offset="50" data-aos-delay="0" data-aos-duration="900"
            data-aos-easing="linear" data-aos-once="false" data-aos-anchor-placement="top-center"
            class="cta_2__right cta_2__right_about position-absolute d-none d-lg-block"
                style="background-image: url('<?php echo $block_about_right_side_image['url']; ?>)"></div>
        <?php } ?>
        <div class="container">
            <div class="about__wrap">
                <h2 data-aos="fade-left" data-aos-offset="100" data-aos-delay="50" data-aos-duration="900"
                    data-aos-easing="linear" data-aos-once="true" class="about__title position-relative">
                    <?php echo $block_about_title; ?>
                </h2>

                <div class="about__texts post">
                    <?php echo $block_about_text;
                    if ($button_about_title && $button_about_link) {
                        echo '<a href="' . $button_about_link . '" class="button">' . $button_about_title . '</a>';
                    }
                    ?>
                </div>
            </div>
        </div>
    </section>
<?php }
