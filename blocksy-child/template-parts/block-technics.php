<?php
/**
 * Displaying Block Technics
 * Блок Наша техника
 */

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

/*ACF fields*/
$page_id = get_the_ID();
$technics_title = is_archive() ? 'Наша техника' : get_field('technics_title', $page_id);

if (have_rows('new_technics', 'options')) {
    ?>
    <section id="technics" class="technics">
        <div class="container">            
            <?php
            if ($technics_title) { ?>
                <h2 class="technics__title" data-aos="fade-left" data-aos-offset="0" data-aos-delay="50"
                    data-aos-duration="800" data-aos-easing="linear" data-aos-once="true"
                    data-aos-anchor-placement="bottom-left"><?php echo $technics_title; ?></h2>
            <?php }
            ?>
            <ul class="technics__list technics-list d-grid grid-two">
                <?php if (have_rows('new_technics', 'options')) { 
                    $n = 0;?>
                    <?php while (have_rows('new_technics', 'options')) {
                        the_row();
                        $one_technics_title = get_sub_field('one_technics_title', 'options');
                        $one_technics_image = get_sub_field('one_technics_image', 'options');
                        $one_technics_underground = get_sub_field('one_technics_underground', 'options');
                        $one_technics_strong = get_sub_field('one_technics_strong', 'options');
                        $one_technics_text = get_sub_field('one_technics_text', 'options');
                        $index = $n++;
                        ?>

                        <li class="technics-list__item technics-item">
                            <?php
                            if ($one_technics_image) {
                                echo '<figure class="technics-item__image position-relative"><img src="' . $one_technics_image['url'] . '" alt="' . $one_technics_image['alt'] . '"></figure>';
                            }
                            if ($one_technics_underground == 'да') {
                                echo '<div class="technics-item__background position-relative"></div>';
                            }
                            if ($one_technics_title) { ?>
                                <h2 data-aos="fade-left" data-aos-offset="200" data-aos-delay="<?php echo 100 * ($index * 2.5); ?>" data-aos-duration="900"
                                data-aos-easing="ease-in-out" data-aos-once="false" data-aos-anchor-placement="top-left" 
                                class="technics-item__title position-relative"><?php echo $one_technics_title; ?></h2>
                            <?php }
                            if ($one_technics_strong) {
                                echo '<h3 class="technics-item__strong position-relative">' . $one_technics_strong . '&nbsp;л.с.</h3>';
                            }
                            if ($one_technics_text) {
                                echo '<div class="technics-item__text position-relative">' . $one_technics_text . '</div>';
                            }
                            ?>
                            <a href="#" class="button technics-item__button">Погнали!</a>
                        </li>
                    <?php }
                } ?>
            </ul>
        </div>
    </section>
<?php }