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
$advantages_title = get_field('advantages_title', $page_id);

if (have_rows('new_advantage', 'options')) {
    ?>
    <section class="advantages gradient-bg">
        <div class="container">
            <?php
            if ($advantages_title) {
                echo '<h2 class="advantages__title">' . $advantages_title . '</h2>';
            }
            ?>
            <ul class="advantages__list advantages-list d-grid grid-four">
                <?php if (have_rows('new_advantage', 'options')) { ?>
                    <?php while (have_rows('new_advantage', 'options')) {
                        the_row();
                        $advantage_title = get_sub_field('advantage_title', 'options');
                        ?>

                        <li class="advantages-list__item position-relative">
                            <?php echo $advantage_title; ?>
                        </li>
                    <?php }
                } ?>
            </ul>
        </div>
    </section>
<?php }