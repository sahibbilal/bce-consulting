<?php
/* 
Template Name: Contact 
*/
get_header(); ?>

<section class="contact-form-section">
    <div class="container cmn-left-right-section">
        <div class="row">
            <?php if (get_field('contact_header') || get_field('contact_title') || (get_field('contact_inquiry_title') && get_field('contact_email_address')) || (get_field('contact_mailing_title') && get_field('contact_mailing_address')) || (get_field('contact_linkedin_icon') && get_field('contact_linkedin_url'))) { ?>
                <div class="col-lg-5 align-self-center">
                    <div class="contact-left-block wow custom-fadeInUp">
                        <?php if (get_field('contact_header')) { ?>
                            <h6><?php echo get_field('contact_header'); ?></h6>
                        <?php } ?>
                        <?php if (get_field('contact_title')) { ?>
                            <h1><?php echo get_field('contact_title'); ?></h1>
                        <?php } ?>
                        <?php if ((get_field('contact_inquiry_title') && get_field('contact_email_address')) || (get_field('contact_mailing_title') && get_field('contact_mailing_address')) || get_field('contact_linkedin_icon')) { ?>
                            <div class="contact-info">
                                <ul class="mb-0 list-unstyled">
                                    <?php if (get_field('contact_inquiry_title') && get_field('contact_email_address')) { ?>
                                        <li>
                                            <strong class="mb-1 d-block"><?php echo get_field('contact_inquiry_title'); ?></strong>
                                            <a href="mailto:<?php echo get_field('contact_email_address'); ?>" class="text-20 btn btn-link"><?php echo get_field('contact_email_address'); ?></a>
                                        </li>
                                    <?php } ?>
                                    <?php if (get_field('contact_mailing_title') && get_field('contact_mailing_address')) { ?>
                                        <li>
                                            <strong class="mb-1 d-block"><?php echo get_field('contact_mailing_title'); ?></strong>
                                            <span class="d-block">
                                                <?php echo get_field('contact_mailing_address'); ?>
                                            </span>
                                        </li>
                                    <?php } ?>
                                    <?php if (get_field('contact_linkedin_icon') && get_field('contact_linkedin_url')) { ?>
                                        <li><a href="<?php echo get_field('contact_linkedin_url'); ?>" rel="noopener" target="_blank" class="social-link"><img src="<?php echo get_field('contact_linkedin_icon')['url']; ?>" width="24" height="24" alt="<?php echo get_field('contact_linkedin_icon')['alt']; ?>" class="svg" /></a></li>
                                    <?php } ?>
                                </ul>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            <?php } ?>
            <div class="col-lg-1 wow custom-fadeInUp">
                <div class="middle-border"></div>
            </div>
            <div class="col-lg-6 contact-form wow custom-fadeInUp align-self-center">
                <?php echo do_shortcode('[contact-form-7 id="28" title="Contact form 1"]'); ?>
                <span class="note d-block text-16">This site is protected by reCAPTCHA and the Google <a href="https://policies.google.com/privacy" rel="noopener" target="_blank">Privacy Policy</a> and <a href="https://policies.google.com/terms" rel="noopener" target="_blank">Terms of Service</a> apply.</a>
            </div>
        </div>
    </div>
</section>
<?php if (get_field('contact_company_addresses') && get_field('contact_map_image')) { ?>
    <section class="map-address">
        <div class="container">
            <div class="row align-items-center">
                <?php if (!empty(get_field('contact_company_addresses'))) { ?>
                    <div class="col-lg-6 wow custom-fadeInUp">
                        <ul class="list-unstyled">
                            <?php foreach (get_field('contact_company_addresses') as $address) { ?>
                                <li>
                                    <?php if (key_exists('title', $address) && $address['title'] != '') { ?>
                                        <span class="title d-block mb-1"><?php echo $address['title']; ?></span>
                                    <?php } ?>
                                    <?php if (key_exists('address', $address) && $address['address'] != '') { ?>
                                        <span class="text-18 d-block">
                                            <?php echo $address['address']; ?>
                                        </span>
                                    <?php } ?>
                                    <?php if (key_exists('map_link_title', $address) && $address['map_link_title'] != '' && key_exists('map_link_url', $address) && $address['map_link_url'] != '') { ?>
                                        <a href="<?php echo $address['map_link_url']; ?>" rel="noopener" target="_blank" class="btn btn-link"><?php echo $address['map_link_title']; ?></a>
                                    <?php } ?>
                                </li>
                            <?php } ?>
                        </ul>
                    </div>
                <?php } ?>
                <?php if (get_field('contact_map_image')) { ?>
                    <div class="col-lg-6 text-center wow custom-fadeInUp">
                        <div class="map-image">
                            <img src="<?php echo get_field('contact_map_image')['url']; ?>" width="638" height="371" alt="<?php echo get_field('contact_map_image')['alt']; ?>" class="img-fluid" />
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </section>
<?php } ?>
<?php get_footer(); ?>
<script>
    var $ = jQuery.noConflict();
    document.body.classList.add("dark-header");
    $('.wpcf7-form').on('submit', function() {
        $(this).find('#submit').attr('disabled', true);
    });
    $('.wpcf7').on('wpcf7submit', function(e) {
        $(this).find('#submit').removeAttr('disabled');
    });
    document.addEventListener('wpcf7mailsent', function(event) {
        location = '<?php echo get_the_permalink('66'); ?>';
    }, false);
</script>