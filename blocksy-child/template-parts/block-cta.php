<?php
/**
 * Display Block CTA
 * блок с формой обратной связи
 */

if (!defined('ABSPATH')) {
    exit;
}

$page_id = get_the_ID();
$cta_title = get_field('cta_title', $page_id);
$cta_background_image = get_field('cta_background_image', $page_id);
$cta_right_side_image = get_field('cta_right_side_image', $page_id);
$cta_form_title = get_field('cta_form_title', $page_id);
$cta_form_subtitle = get_field('cta_form_subtitle', $page_id);

if ($cta_title) {
    ?>

    <section class="cta position-relative top-lightness" <?php
    if ($cta_background_image) { ?>
            style="background-image: url('<?php echo $cta_background_image['url']; ?>)" <?php } ?>>
        <?php
        if ($cta_right_side_image) { ?>
            <div class="cta__right position-absolute d-none d-md-block"
                style="background-image: url('<?php echo $cta_right_side_image['url']; ?>)"></div>
        <?php } ?>
        <div class="container">
            <div class="cta__wrap cta-wrap d-grid align-items-start justify-content-between">
                <div class="cta-wrap__texts">
                    <?php
                    if ($cta_title) {
                        echo '<h2 class="cta__title">' . $cta_title . '</h2>';
                    }
                    if (have_rows('new_cta_item', $page_id)) { ?>
                        <ul class="cta-wrap__list cta-wrap-list">
                            <?php if (have_rows('new_cta_item', $page_id)) { ?>
                                <?php while (have_rows('new_cta_item', $page_id)) {
                                    the_row();
                                    $cta_item = get_sub_field('cta_item', $page_id);
                                    ?>

                                    <li class="cta-wrap-list__item cta-wrap-list-item position-relative">
                                        <?php echo $cta_item; ?>
                                    </li>
                                <?php }
                            } ?>
                        </ul>
                    <?php }
                    ?>
                </div>

                <div class="cta-wrap__form kaska-decor cta-form position-relative">
                    <span class="kaska-decor__img position-absolute d-none d-md-block"></span>
                    <?php
                    if ($cta_form_title) {
                        echo '<h4 class="cta-form__title">' . $cta_form_title . '</h4>';
                    }
                    if ($cta_form_subtitle) {
                        echo '<h5 class="cta-form__subtitle position-relative">' . $cta_form_subtitle . '</h5>';
                    }
                    echo do_shortcode('[contact-form-7 id="51d9e51" title="Основная форма Забронировать тур"]');
                    ?>
                </div>
            </div>
        </div>
    </section>
<?php }