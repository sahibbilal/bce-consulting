<?php
/* 
Template Name: Careers
*/
get_header(); ?>
<?php if (get_field('career_banner_section') && (get_field('career_banner_section_image') || get_field('career_banner_section_header'))) { ?>
    <section class="cmn-inner-hero divImg" style="background-image: url('<?php echo get_field('career_banner_section_image')['url']; ?>');">
        <div class="container">
            <div class="row">
                <div class="col-lg-10 col-xl-8 wow custom-fadeInUp">
                    <span class="h6">CAREERS</span>
                    <?php if (get_field('career_banner_section_header')) { ?>
                        <h1><?php echo get_field('career_banner_section_header'); ?></h1>
                    <?php } ?>
                </div>
            </div>
        </div>
    </section>
<?php } ?>

<?php if (get_field('career_intro_section') && (get_field('career_intro_section_header') || get_field('career_intro_section_content') || get_field('career_intro_section_button_link_text'))) { ?>
    <section class="short-career-intro">
        <div class="container">
            <div class="row">
                <?php if (get_field('career_intro_section_header')) { ?>
                    <div class="col-lg-6 col-xl-5 mb-lg-0 mb-4 wow custom-fadeInUp">
                        <h2><?php echo get_field('career_intro_section_header'); ?></h2>
                    </div>
                <?php } ?>
                <?php if (get_field('career_intro_section_content') || get_field('career_intro_section_button_link_text')) { ?>
                    <div class="col-lg-6 ms-auto wow custom-fadeInUp">
                        <?php if (get_field('career_intro_section_content')) {
                            echo get_field('career_intro_section_content');
                        } ?>
                        <?php if (get_field('career_intro_section_button_link_text')) { ?>
                            <a id="scroll-down" href="javascript:;" class="btn btn-link"><?php echo get_field('career_intro_section_button_link_text'); ?></a>
                        <?php } ?>
                    </div>
                <?php } ?>
            </div>
        </div>
    </section>
<?php } ?>

<?php if (get_field('career_image_slider_section') && !empty(get_field('career_image_slider_section'))) { ?>
    <section class="company-gallery">
        <div class="container">
            <div class="gallery-slider">
                <?php foreach (get_field('career_image_slider_section') as $slideImage) { ?>
                    <?php if (key_exists('image', $slideImage)) { ?>
                        <div class="gallery-items">
                            <img class="img-fluid" alt="<?php echo $slideImage['image']['alt']; ?>" width="636" height="383" src="<?php echo $slideImage['image']['url']; ?>">
                        </div>
                    <?php } ?>
                <?php } ?>
            </div>
            <div class="slider-footer d-flex justify-content-center">
                <div class="slider-nav"></div>
            </div>
        </div>
    </section>
<?php } ?>

<?php if (get_field('career_zig_zag_section') && !empty(get_field('career_zig_zag_section'))) { ?>
    <section class="career-zig-zag">
        <div class="container cmn-left-right-section">
            <?php foreach (get_field('career_zig_zag_section') as $zigzag) { ?>
                <div class="row">
                    <?php if (key_exists('image', $zigzag)) { ?>
                        <div class="col-lg-5 align-self-center">
                            <div class="cmn-block-img wow custom-fadeInUp">
                                <img src="<?php echo $zigzag['image']['url']; ?>" alt="<?php echo $zigzag['image']['alt']; ?>" width="522" height="522" class="img-fluid" />
                            </div>
                        </div>
                    <?php } ?>
                    <div class="col-lg-1 wow custom-fadeInUp">
                        <div class="middle-border"></div>
                    </div>
                    <?php if (key_exists('content', $zigzag)) { ?>
                        <div class="col-lg-6 align-self-center wow custom-fadeInUp">
                            <?php echo $zigzag['content']; ?>
                        </div>
                    <?php } ?>
                </div>
            <?php } ?>
        </div>
    </section>
<?php } ?>

<?php
    $careersArgs = array(
        'post_type' => 'career',
        'post_status' => 'publish',
        'posts_per_page' => -1,
        'order_by' => 'date',
        'order' => 'DESC',
    );

    $careers = new WP_Query($careersArgs);
    if ($careers->have_posts() && get_field('career_opportunities_section')) {
?>
    <section id="jobOpportunities" class="opportunities">
        <div class="container">
            <?php if (get_field('career_opportunities_section_header')) { ?>
                <h3 class="h1"><?php echo get_field('career_opportunities_section_header'); ?></h3>
            <?php } ?>
            <?php while ($careers->have_posts()) { $careers->the_post(); ?>
                <div class="job-listing wow custom-fadeInUp">
                    <a href="<?php echo get_the_permalink(); ?>" class="h5 mb-md-0 stretched-link"><?php echo get_the_title(); ?></a>
                    <?php

                    $locations = get_the_terms(get_the_ID(), 'locations');
                    if (!empty($locations)) {
                    ?>
                        <div class="job-location ms-md-3">
                            <?php foreach ($locations as $location) { ?>
                                <span class="badge badge-fill"><?php echo $location->name; ?></span>
                            <?php } ?>
                        </div>
                    <?php } ?>
                </div>
            <?php } wp_reset_query(); ?>
            <?php if (get_field('career_opportunities_section_content')) { ?>
                <div class="direct-mail wow custom-fadeInUp">
                    <?php echo get_field('career_opportunities_section_content'); ?>
                </div>
            <?php } ?>
        </div>
    </section>
<?php } ?>
<?php get_template_part('template-parts/custom/footer', 'cta'); ?>
<?php get_footer(); ?>

<script>
    $(document).ready(function() {
        $('.gallery-slider').slick({
            infinite: false,
            slidesToShow: 2,
            slidesToScroll: 2,
            arrows: true,
            dots: false,
            speed: 500,
            autoplay: false,
            autoplaySpeed: 1000,
            appendArrows: '.slider-nav',
            responsive: [{
                breakpoint: 992,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1,
                }
            }]
        });
        $('#scroll-down').click(function() {
            var headHeight = $('header').outerHeight(true);
            var pos = $('#jobOpportunities').offset().top - headHeight;
            $('html, body').animate({
                scrollTop: pos
            }, 500);
        });
    });
</script>