<?php
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}
/**
 *  Page Contacts
 */
$page_id = get_the_ID();
$contacts_image = get_field('contacts_image');
$contacts_underground = get_field('contacts_underground');

$tel = get_field('tel-link', 'options');
$phone_num = get_field('tel', 'options');
$email = get_field('email', 'options');
$socials = get_field('social_icons', 'options');
get_header();
?>

<section class="contacts">
    <div class="container">
        <div class="contacts__wrap contacts-wrap d-grid align-items-start">
            <div class="contacts__image contacts-image d-none d-md-block">
                <?php
                if ($contacts_image) {
                    echo '<figure data-aos="fade-right" data-aos-offset="0" data-aos-delay="0" data-aos-duration="900"
                    data-aos-easing="linear" data-aos-once="false" data-aos-anchor-placement="top-center" class="contacts-image__image position-relative"><img src="' . $contacts_image['url'] . '" alt="' . $contacts_image['alt'] . '"></figure>';
                }
                if ($contacts_underground == 'да') {
                    echo '<div data-aos="fade-up" data-aos-offset="50" data-aos-delay="0" data-aos-duration="1000"
                data-aos-easing="linear" data-aos-once="false" data-aos-anchor-placement="top-center" class="technics-item__background technics-item__background_contacts position-relative"></div>';
                }
                ?>
            </div>

            <div class="contacts__text contacts-texts">
                <h1 class="contacts__title">
                    <?php the_title(); ?>
                </h1>

                <!-- breadcrumbs -->
                <div class="breadcrumbs">
                    <?php
                    if (function_exists('yoast_breadcrumb')) {
                        (yoast_breadcrumb('<div class="breadcrumbs__list">', '</div>'));
                    }
                    ?>
                </div>
                <!-- breadcrumbs end -->

                <?php
                if ($tel && $phone_num) { ?>
                    <li class="contacts-texts__item">
                        <a class="contacts-texts__link tel" href="tel:+7<?php echo $tel; ?>">
                            <?php echo $phone_num; ?>
                        </a>
                    </li>
                <?php }
                if ($socials['whatsapp']) { ?>
                    <li class="contacts-texts__item">
                        <a href="https://api.whatsapp.com/send?phone=<?php echo $socials['whatsapp']; ?>" target="_blank"
                            class="contacts-texts__link whatsapp">
                            <?php echo $socials['whatsapp']; ?>
                        </a>
                    </li>
                <?php }
                if ($email) { ?>
                    <li class="contacts-texts__item">
                        <a class="contacts-texts__link email" href="mailto:<?php echo $email; ?>">
                            <?php echo $email; ?>
                        </a>
                    </li>
                <?php } ?>
            </div>
        </div>
    </div>
</section>

<?php
get_template_part('template-parts/block', 'cta2'); 

get_footer();