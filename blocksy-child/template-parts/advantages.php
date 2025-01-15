<?php
/**
 * Displaying Block Advantages
 * Блок Преимущества
 */

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}
/*ACF fields*/
$page_id = get_the_ID();
$advantages_title = is_singular('routes') ? get_field('advantages_route_title', 'options') : get_field('advantages_title', $page_id);
$new_advantage = is_singular('routes') ? 'new_route_advantage' : 'new_advantage';

if (have_rows($new_advantage, 'options')) {
    ?>
    <section class="advantages <?php if (!is_singular('routes') && !is_page('about')) { ?>gradient-bg<?php } ?>">
        <div class="container">
            <?php
            if (is_archive()) {
                echo '<h2 class="advantages__title">Почему с нами лучше?</h2>';
            } else {
                if ($advantages_title) {
                    echo '<h2 class="advantages__title">' . $advantages_title . '</h2>';
                }
            }
            ?>
            <ul class="advantages__list advantages-list d-grid grid-four">
                <?php if (have_rows($new_advantage, 'options')) {
                    $i = 0; ?>
                    <?php while (have_rows($new_advantage, 'options')) {
                        the_row();
                        $advantage_title =
                            is_singular('routes') ? get_sub_field('advantage_route_title', 'options') : get_sub_field('advantage_title', 'options');
                        $index = $i++;
                        ?>

                        <li data-aos="fade-left" data-aos-offset="200" data-aos-delay="<?php echo 100 * ($index * 2.5); ?>"
                            data-aos-duration="900" data-aos-easing="ease-in-out" data-aos-once="false"
                            data-aos-anchor-placement="top-left" class="advantages-list__item position-relative">
                            <?php echo $advantage_title; ?>
                        </li>
                    <?php }
                } ?>
            </ul>
        </div>
    </section>
<?php }