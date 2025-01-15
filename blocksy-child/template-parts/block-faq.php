<?php
/**
 * Displaying Block FAQ
 * Блок Вопрос-ответ
 * Сквозной по сайту. Заполнять в "Иднетичные блоки"
 */

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

/*ACF fields*/
$page_id = get_the_ID();
$faq_title = get_field('faq_title', 'options');

?>

<section class="faq">
    <div class="container">
        <?php
        if ($faq_title) { ?>
            <h2 data-aos="fade-right" data-aos-offset="200" data-aos-delay="0" data-aos-duration="900"
                data-aos-easing="linear" data-aos-once="true" data-aos-anchor-placement="top-left" class="faq__title">
                <?php echo $faq_title; ?>
            </h2>

            <ul class="block-accordion__list block-accord-list my-accordion accordionjs d-grid">
                <?php
                if (have_rows('new_accordion_item', 'options')) { ?>
                    <?php while (have_rows('new_accordion_item', 'options')) {
                        the_row();
                        $new_accordion__item_title = get_sub_field('new_accordion_item_title', 'options');
                        $new_accordion__item_text = get_sub_field('new_accordion_item_text', 'options');
                        ?>

                        <li class="block-accord-list__item accord-list-item post">
                            <div>
                                <?php echo $new_accordion__item_title; ?>
                                <span></span>
                            </div>

                            <div>
                                <?php echo $new_accordion__item_text; ?>
                            </div>
                        </li>
                    <?php }
                    ;
                } ?>
            </ul>

            <p class="faq__action">Не нашли ответ на ваш вопрос?</p>
            <p class="faq__action arrow">Напишите нам, ответим на любые вопросы по организации туров!</p>
        <?php }
        ?>
    </div>
</section>