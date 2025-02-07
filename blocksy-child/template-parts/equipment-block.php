<?php
/**
 * Block equipment
 * Блок экипировка
 */
$equipment_text = get_field('equipment_text', 'options');

if ($equipment_text) {
    ?>
    <blockquote class="equipment mt-4">
        <?php echo '<div class="equipment__text post">' . $equipment_text . '</div>';
        if (have_rows('equipment_photos', 'options')) { ?>
            <ul class="equipment__list equipment-list d-flex">
                <?php if (have_rows('equipment_photos', 'options')) {
                    while (have_rows('equipment_photos', 'options')) {
                        the_row();
                        $equipment_photo = get_sub_field('equipment_photo', 'options');
                        ?>

                        <li class="equipment-list__item equipment-list">
                            <a href="<?php echo $equipment_photo['url']; ?>" data-fancybox="gallery">
                                <img src="<?php echo $equipment_photo['url']; ?>" alt="<?php echo $equipment_photo['alt']; ?>">
                            </a>
                        </li>

                    <?php }
                } ?>
            </ul>
        <?php } ?>
    </blockquote>
<?php }