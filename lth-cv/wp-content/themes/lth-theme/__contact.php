<?php
/**
 * Template Name: Liên hệ
 * 
 * @author LTH
 * @since 2020
 */
?>
<?php get_header();

$contact = get_field('contact', 'option');
$address = $contact['address'];
$hotline = $contact['hotline'];
$email = $contact['email'];
$map = $contact['map'];
$contact_form = $contact['contact_form']; ?>

<main class="main main-page main-contact">
    <?php //require_once(LIBS_DIR . '/breadcrumbs.php'); ?>

    <article class="lth-contacts">
        <?php if ($map) {echo $map;} ?>

        <div class="module module_address">
            <div class="module_header title-box">
                <h2 class="title"><?php echo __('Liên hệ'); ?></h2>
            </div>

            <div class="module_content">
                <ul>
                    <li>
                        <a href="#" title="">
                            <?php echo __('Địa chỉ'); ?> : <?php echo $address; ?>
                        </a>
                    </li>
                    <li>
                        <a href="tel:<?php echo $hotline; ?>" title="">
                            <?php echo __('Hotline'); ?> : <?php echo $hotline; ?>
                        </a>
                    </li>
                    <li>
                        <a href="mailto:<?php echo $email; ?>" title="">
                            <?php echo __('Email'); ?> : <?php echo $email; ?>
                        </a>
                    </li>
                    <?php if ( class_exists( 'WQM_Qr_Code_Generator' ) ) { ?>
                        <li class="vcard-box">
                            <div class="add-contact">
                                <a href="#" title="">
                                    <i class="fas fa-user-plus"></i>
                                    <span><?php echo __('Thêm liên hệ'); ?></span>
                                </a>

                                <?php if (is_active_sidebar('widget_qr_code_vcard')) {
                                    dynamic_sidebar('widget_qr_code_vcard');
                                } ?>
                            </div>
                        </li>

                        <li class="qr-code-box">
                            <div class="add-contact">
                                <?php if (is_active_sidebar('widget_qr_code_vcard')) {
                                    dynamic_sidebar('widget_qr_code_vcard');
                                } ?>
                            </div>
                        </li>
                    <?php } ?>
                </ul>
            </div>

            <div class="module_form_contacts">
                <?php echo do_shortcode($contact_form); ?>
            </div>
        </div>
    </article>
</main>

<?php get_footer(); ?>
