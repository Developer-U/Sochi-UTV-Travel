<?php
/**
 * Block returned layout type of content in Gallery: Photo
 * 
 */
?>

<ul class="gallery-tab-target__list gallery-tab-list">
    <?php
    if (have_rows('add_photo_block', 'options')): ?>
        <?php $i = 1;
        while (have_rows('add_photo_block', 'options')):
            the_row();
            $gallery_content = get_sub_field('gallery_photo_content', 'options');
            $index = $i++;
            ?>

            <li
                class="gallery-tab-list__item gallery-tab-list__item_<?php if (($index % 2) == 0) { ?>second<?php } else { ?>first<?php } ?>">
                <?php if ($gallery_content['first']) { ?>
                    <a href="<?php echo $gallery_content['first']['url']; ?>"
                        class="gallery-tab-list__image <?php if (($index % 2) == 0) { ?>row-1-4<?php } else { ?>row-1-3<?php } ?>"
                        data-fancybox="gallery">
                        <img src="<?php echo $gallery_content['first']['url']; ?>"
                            alt="<?php echo $gallery_content['first']['alt']; ?>">
                    </a>
                <?php }
                if ($gallery_content['second']) { ?>
                    <a href="<?php echo $gallery_content['second']['url']; ?>"
                        class="gallery-tab-list__image <?php if (($index % 2) == 0) { ?>row-1-3<?php } else { ?>row-3-4<?php } ?>"
                        data-fancybox="gallery">
                        <img src="<?php echo $gallery_content['second']['url']; ?>"
                            alt="<?php echo $gallery_content['second']['alt']; ?>">
                    </a>
                <?php }
                if ($gallery_content['third']) { ?>
                    <a href="<?php echo $gallery_content['third']['url']; ?>"
                        class="gallery-tab-list__image <?php if (($index % 2) == 0) { ?>row-3-4<?php } else { ?>row-1-4<?php } ?>"
                        data-fancybox="gallery">
                        <img src="<?php echo $gallery_content['third']['url']; ?>"
                            alt="<?php echo $gallery_content['third']['alt']; ?>">
                    </a>
                <?php }
                if ($gallery_content['fourth']) { ?>
                    <a href="<?php echo $gallery_content['fourth']['url']; ?>"
                        class="gallery-tab-list__image <?php if (($index % 2) == 0) { ?>row-1-4<?php } else { ?>row-1-2<?php } ?>"
                        data-fancybox="gallery">
                        <img src="<?php echo $gallery_content['fourth']['url']; ?>"
                            alt="<?php echo $gallery_content['fourth']['alt']; ?>">
                    </a>
                <?php }
                if ($gallery_content['fifth']) { ?>
                    <a href="<?php echo $gallery_content['fifth']['url']; ?>"
                        class="gallery-tab-list__image <?php if (($index % 2) == 0) { ?>row-1-3<?php } else { ?>row-2-4<?php } ?>"
                        data-fancybox="gallery">
                        <img src="<?php echo $gallery_content['fifth']['url']; ?>"
                            alt="<?php echo $gallery_content['fifth']['alt']; ?>">
                    </a>
                <?php }
                if ($gallery_content['sixth']) { ?>
                    <a href="<?php echo $gallery_content['sixth']['url']; ?>"
                        class="gallery-tab-list__image <?php if (($index % 2) == 0) { ?>row-3-4<?php } else { ?>row-1-4<?php } ?>"
                        data-fancybox="gallery">
                        <img src="<?php echo $gallery_content['sixth']['url']; ?>"
                            alt="<?php echo $gallery_content['sixth']['alt']; ?>">
                    </a>
                <?php } ?>
            </li>

        <?php endwhile; ?>
    <?php endif; ?>
</ul>