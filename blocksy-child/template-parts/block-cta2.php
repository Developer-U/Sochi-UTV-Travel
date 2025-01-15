<?php
/**
 * Display Block CTA 2
 * блок с формой обратной связи (Справа картинка, слева - контент)
 */

if (!defined('ABSPATH')) {
    exit;
}

$page_id = get_the_ID();
$fields_prefix = is_archive() || is_single() ? 'options' : $page_id;
$fields_index = is_archive() ? '_' . $page_id : '';
$cta_2_title = get_field('cta_2_title' . $fields_index, $fields_prefix);
$cta_2_background_image = get_field('cta_2_background_image', 'options');
$cta_2_right_side_image = get_field('cta_2_right_side_image', 'options');
$cta_2_form_title = get_field('cta_2_form_title', 'options');
$cta_2_form_subtitle = get_field('cta_2_form_subtitle', 'options');
$cta_2_form_text = get_field('cta_2_form_text', 'options');
$contact_form = is_single() ? '[contact-form-7 id="96ae830" title="Сокращённая форма Забронировать определённый тур внутри тура"]' : '[contact-form-7 id="b539263" title="Сокращённая форма Забронировать тур"]';

if ($cta_2_title) {
    ?>
    <section id="cta_2_<?php echo $page_id; ?>" class="cta cta-2 position-relative top-lightness left" <?php
    if ($cta_2_background_image) { ?>
            style="background-image: url('<?php echo $cta_2_background_image['url']; ?>)" <?php } ?>>
        <?php
        if ($cta_2_right_side_image) { ?>
            <div class="cta_2__right position-absolute d-none d-md-block"
                style="background-image: url('<?php echo $cta_2_right_side_image['url']; ?>)"></div>
        <?php } ?>
        <div class="container">
            <h2 data-aos="fade-left" data-aos-offset="50" data-aos-delay="50" data-aos-duration="900"
                data-aos-easing="linear" data-aos-once="true" class="cta-2__title position-relative">
                <?php echo $cta_2_title; ?>
            </h2>

            <div class="cta-wrap__form kaska-decor cta-form cta-form__form2 position-relative">
                <span class="kaska-decor__img position-absolute d-none d-md-block"></span>
                <?php
                if ($cta_2_form_title) {
                    echo '<h4 class="cta-form__title cta-form__title_form2">' . $cta_2_form_title . '</h4>';
                }
                if ($cta_2_form_subtitle) {
                    echo '<h5 class="cta-form__subtitle cta-form__subtitle_form2 position-relative">' . $cta_2_form_subtitle . '</h5>';
                }
                if ($cta_2_form_text) {
                    echo '<div class="cta-form__text">' . $cta_2_form_text . '</div>';
                }
                echo do_shortcode($contact_form);
                ?>
            </div>
        </div>
    </section>
<?php } ?>