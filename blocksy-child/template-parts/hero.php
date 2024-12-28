<?php
/**
 * Template part for displaying Hero block / Первый экран со слайдером 
 */

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}
$hero_title = get_field('hero_title');
?>

<section class="hero">
    <!-- Slider block фоновая картинка слайдером абсолютом от hero-->
    <div class="hero__background">
        <div class="swiper hero-slider">
            <div class="swiper-wrapper">
                <?php if (have_rows('new_hero_slide_image')): ?>
                    <?php while (have_rows('new_hero_slide_image')):
                        the_row();
                        $hero_slide_image = get_sub_field('hero_slide_image');
                        ?>

                        <article class="swiper-slide hero-slider__slide"
                            style="<?php if ($hero_slide_image): ?>background-image: url(<?php echo $hero_slide_image['url']; ?> ) <?php else: ?>background: #1C2540;<?php endif; ?>">
                        </article>

                    <?php endwhile; ?>
                <?php endif; ?>
            </div>

            <!-- <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div> -->
        </div>
    </div>

    <!-- Left block menu -->
    <div class="hero-box__left hero-left d-none d-xl-flex flex-column justify-content-end">
        <?php
        estore_primary_menu();

        get_template_part('template-parts/social');
        ?>
    </div>

    <div class="container-fluid hero__box hero-box d-grid gap-3">
        <button class="button col-auto hero-box__button d-block d-lg-none">забронировать тур</button>

        <div class="hero-box__heading hero-title-box d-flex align-items-start justify-content-end">
            <span class="hero-title-box__plashka plashka fire">
                <p class="hero-title-box__attention">
                    Горячие обеды<br>на гриле!
                </p>
            </span>

            <?php
            if ($hero_title) {
                echo '<h1 class="hero-box__title">' . $hero_title . '</h1>';
            } ?>
        </div>

        <div class="hero-box__buttons hero-title-box d-flex justify-content-between">            
            <?php
            get_template_part('template-parts/buttons', 'block');
            ?>
            <div></div>
        </div>
    </div>
</section>