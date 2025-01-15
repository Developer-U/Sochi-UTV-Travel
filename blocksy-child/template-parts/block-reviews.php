<?php
/**
 * Display Block Reviews
 * блок Отзывы наших клиентов
 */

if (!defined('ABSPATH')) {
    exit;
}

$page_id = get_the_ID();
$reviews_title = get_field('reviews_title', $page_id);
$reviews_background_image = get_field('reviews_background_image', $page_id);
$reviews_count = is_archive('reviews') ? '99' : '4';

$arg_reviews = array(
    'orderby' => 'name',
    'order' => 'DESC',
    'posts_per_page' => $reviews_count,
    'post_type' => 'reviews',
    'post_status' => 'publish',
);

$query_reviews = new WP_Query($arg_reviews);

if ($query_reviews->have_posts()) {
    ?>

    <section class="<?php if(is_archive('reviews')) { ?>archive-reviews<?php } else {?>reviews<?php }?> lightness" <?php
    if ($reviews_background_image) { ?>
            style="background-image: url('<?php echo $reviews_background_image['url']; ?>)" <?php } ?>>
        <div class="container">
            <?php
            if ($reviews_title) {
                echo '<h2 class="reviews__title centered-title position-relative">' . $reviews_title . '</h2>';
            }
            ?>

            <ul class="reviews__list reviews-list d-grid align-items-start grid-four">
                <?php
                if ($query_reviews->have_posts()) {
                    while ($query_reviews->have_posts()):
                        $query_reviews->the_post();
                        $star_rating = get_field('rating');
                        ?>

                        <li class="reviews-list__item reviews-item position-relative js-reviews">
                            <div class="reviews-item__person person-block d-flex align-items-center">
                                <figure class="person-block__image" style="background: #ddd;">
                                    <?php
                                    if (has_post_thumbnail()) {
                                        the_post_thumbnail('full', get_post_meta(get_post_thumbnail_id(), '_wp_attachment_image_alt', TRUE));
                                    } else { ?>
                                        <img class="no-image"
                                            src="<?php echo get_stylesheet_directory_uri(); ?>'/assets/img/no-image.jpg" alt="фото">
                                    <?php }
                                    ?>
                                </figure>

                                <div class="person-block__info col">
                                    <h4>
                                        <?php the_title(); ?>
                                    </h4>

                                    <?php
                                    echo $star_rating;
                                    ?>
                                </div>
                            </div>

                            <div class="reviews-item__bottom reviews-bottom d-grid gap-2">
                                <div class="reviews-item__content">
                                    <div class="reviews-item__text">
                                        <div>
                                            <?php the_content(); ?>
                                        </div>
                                    </div>
                                </div>

                                <button type="button" class="reviews-bottom__btn main-reviews__item-more"><span>Читать
                                        полностью</span></button>

                                <button type="button"
                                    class="reviews-bottom__btn main-reviews__item-less"><span>Скрыть</span></button>
                            </div>
                        </li>

                        <?php
                    endwhile;
                    wp_reset_postdata() ?>
                <?php } ?>
            </ul>

            <?php if (!is_archive('reviews')) {
                echo '<a href="#" class="reviews__link button centered">смотреть все отзывы</a>';
            } ?>
        </div>
    </section>

<?php }