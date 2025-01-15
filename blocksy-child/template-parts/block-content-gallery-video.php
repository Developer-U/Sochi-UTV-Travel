<?php
/**
 * Block returned layout type of content in Gallery: Video
 * 
 */
?>

<ul class="allery-tab-target__list gallery-tab-list gallery-video-list d-grid">
    <?php
    if (have_rows('add_video_block', 'options')): ?>
        <?php $i = 1;
        while (have_rows('add_video_block', 'options')):
            the_row();  
            $gallery_video_type = get_sub_field('gallery_video_type', 'options');
            $gallery_video = get_sub_field('gallery_video', 'options');
            $gallery_video_id = get_sub_field('gallery_video_id', 'options');
            $index = $i++;
            ?>

            <li class="gallery-tab-list__video">
                <?php
                if ($gallery_video_type == 'файл' && $gallery_video) { ?> 
                    <video controls class="gallery-tab-list__image">
                        <source src="<?php echo esc_url($gallery_video['url']); ?>" type="video/webm" />

                        <source src="<?php echo esc_url($gallery_video['url']); ?>" type="video/mp4" />
                    </video>                    
                <?php } else if ($gallery_video_type == 'ссылка' && $gallery_video_id) { ?>
                    <iframe src="https://rutube.ru/play/embed/<?php echo $gallery_video_id; ?>" frameBorder="0"
                        allow="clipboard-write; autoplay" webkitAllowFullScreen mozallowfullscreen allowFullScreen>
                    </iframe>                    
                <?php } ?>
            </li>

        <?php endwhile; ?>
    <?php endif; ?>
</ul>