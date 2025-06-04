<?php
/*
Template Name: Gated Content
*/

get_header();

$title = get_field('clp_title');
$content = get_field('clp_content');
$shortcode = get_field('clp_gravity_form');
?>

<section class="contact-form-section">
    <div class="container cmn-left-right-section">
        <div class="row">
            <?php if ($title || $content) { ?>
                <div class="col-lg-5 align-self-center">
                    <div class="contact-left-block wow custom-fadeInUp">
                        <?php if ($title) { ?>
                            <h1><?php echo $title; ?></h1>
                        <?php } ?>
                        <?php if ($content) { ?>
                            <div class="contact-info">
                                <?php echo wp_kses_post($content); ?>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            <?php } ?>
            <div class="col-lg-1 wow custom-fadeInUp">
                <div class="middle-border"></div>
            </div>
            <div class="col-lg-6 contact-form wow custom-fadeInUp align-self-center">
                <?php echo do_shortcode($shortcode); ?>
            </div>
        </div>
    </div>
</section>
<?php get_footer(); ?>
<script>
    var $ = jQuery.noConflict();
    document.body.classList.add("dark-header");
</script>