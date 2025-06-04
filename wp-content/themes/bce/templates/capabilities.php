<?php
/* 
Template Name: Capabilities 
*/
get_header(); ?>
<?php if( get_field('capabilities_banner_section') && ( get_field('capabilities_banner_section_image') || get_field('capabilities_banner_section_title') || get_field('capabilities_banner_section_header') ) ){ ?>
<section class="cmn-inner-hero divImg" style="background-image: url('<?php echo get_field('capabilities_banner_section_image')['url']; ?>');">
    <div class="container">
        <div class="row">
            <div class="col-lg-10 col-xl-8 wow custom-fadeInUp">
                <?php if(get_field('capabilities_banner_section_title')){ ?>
                <span class="h6"><?php echo get_field('capabilities_banner_section_title'); ?></span>
                <?php } ?>
                <?php if(get_field('capabilities_banner_section_header')){ ?>
                <h1><?php echo get_field('capabilities_banner_section_header'); ?></h1>
                <?php } ?>
            </div>
        </div>
    </div>
</section>
<?php } ?>
<?php if( get_field('capabilities_about_section') && ( get_field('capabilities_about_section_image') || get_field('capabilities_about_section_header') || get_field('capabilities_about_section_short_description') ) ){ ?>
<section class="cmn-spacer">
    <div class="container cmn-left-right-section">
        <div class="row">
            <?php if(get_field('capabilities_about_section_image')){ ?>
            <div class="col-lg-5">
                <div class="cmn-block-img wow custom-fadeInUp">
                    <img src="<?php echo get_field('capabilities_about_section_image')['url']; ?>" alt="<?php echo get_field('capabilities_about_section_image')['alt']; ?>" width="522" height="522" class="img-fluid" />
                </div>
            </div>
            <?php } ?>
            <?php if(get_field('capabilities_about_section_header') || get_field('capabilities_about_section_short_description')){ ?>
            <div class="col-lg-1 wow custom-fadeInUp">
                <div class="middle-border"></div>
            </div>
            <div class="col-lg-6 wow custom-fadeInUp">
                <?php if(get_field('capabilities_about_section_header')){ ?>
                <h2><?php echo get_field('capabilities_about_section_header'); ?></h2>
                <?php } ?>
                <?php if(get_field('capabilities_about_section_short_description')){ ?>
                <?php echo get_field('capabilities_about_section_short_description'); ?>
                <?php } ?>
            </div>
            <?php } ?>
        </div>
    </div>
</section>
<?php } ?>
<?php
    $capabilityArgs = array('post_type' => 'capability', 'post_status' => 'publish', 'orderby' => 'menu_order title', 'order' => 'ASC', 'posts_per_page' => -1);
    $capabilityLoop = new WP_Query($capabilityArgs);
    if ($capabilityLoop->have_posts()) {
?>
<section class="cmn-services-card">
    <div class="container">
        <div class="row">
            <?php while ($capabilityLoop->have_posts()) : $capabilityLoop->the_post(); 
                if(get_field('capability_listing_details') && (get_field('capability_listing_details_icon') || get_field('capability_listing_details_short_description'))){
            ?>
            <div class="col-lg-4 col-md-6 wow custom-fadeInUp">
                <div class="inner-card">
                    <?php if(get_field('capability_listing_details_icon')){ ?>
                    <img src="<?php echo get_field('capability_listing_details_icon')['url']; ?>" alt="<?php echo get_field('capability_listing_details_icon')['alt']; ?>" width="32" height="32" class="img-fluid" />
                    <?php } ?>
                    <div class="content text-18">
                        <h3 class="h4"><a href="<?php the_permalink(); ?>" class="stretched-link"><?php the_title(); ?></a></h3>
                        <?php if(get_field('capability_listing_details_short_description')){ ?>
                        <?php echo get_field('capability_listing_details_short_description'); ?>
                        <?php } ?>
                    </div>
                </div>
            </div>
            <?php } endwhile; wp_reset_postdata(); ?>
        </div>
    </div>
</section>
<?php } ?>
<?php if( get_field('capabilities_case_studies_section') && ( get_field('capabilities_case_studies_section_header') || !empty(get_field('capabilities_case_studies_section_case_studies')) || get_field('capabilities_case_studies_section_link_url') || get_field('capabilities_case_studies_section_link_text') ) ){ ?>
<section class="cmn-case-insight-slider">
    <div class="container">
        <?php if(get_field('capabilities_case_studies_section_header')){ ?>
        <h3><?php echo get_field('capabilities_case_studies_section_header'); ?></h3>
        <?php } ?>
        <?php if(!empty(get_field('capabilities_case_studies_section_case_studies'))){ ?>
        <div class="insight-studie-slider">
            <?php foreach (get_field('capabilities_case_studies_section_case_studies') as $caseStudies) {
                if(get_post_status($caseStudies) == 'publish'){
            ?>
            <div class="box-items">
                <div class="item-content">
                    <span class="post-date"><?php echo get_the_date('F d, Y', $caseStudies); ?></span>
                    <h4 class="h5"><a href="<?php echo get_the_permalink($caseStudies); ?>" class="stretched-link"><?php echo get_the_title($caseStudies); ?></a></h4>
                </div>
                <?php if(get_field('blog_featured_image', $caseStudies)){ ?>
                <div class="item-img">
                    <img class="divImg" alt="<?php echo get_field('blog_featured_image', $caseStudies)['alt']; ?>" width="294" height="248" src="<?php echo get_template_directory_uri(); ?>/assets/images/0.gif" style="background-image: url('<?php echo get_field('blog_featured_image', $caseStudies)['url']; ?>');">
                </div>
                <?php } ?>
            </div>
            <?php } } ?>
        </div>
        <?php } ?>
        <?php if(get_field('capabilities_case_studies_section_link_url') && get_field('capabilities_case_studies_section_link_text')){ ?>
        <div class="slider-footer d-flex align-items-center">
            <div class="slider-nav"></div>
            <a href="<?php echo get_field('capabilities_case_studies_section_link_url'); ?>" class="btn btn-link ms-auto"><?php echo get_field('capabilities_case_studies_section_link_text'); ?></a>
        </div>
        <?php } ?>
    </div>
</section>
<?php } ?>
<script>
    $(document).ready(function () {
        $('.insight-studie-slider').slick({
            infinite: false,
            slidesToShow: 2,
            slidesToScroll: 2,
            arrows: true,
            dots: false,
            speed: 500,
            autoplay: false,
            autoplaySpeed: 1000,
            appendArrows: '.slider-nav',
            responsive: [
                {
                breakpoint: 992,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1,
                    }
                }
            ]
        });
    });
</script>
<?php get_footer(); ?>
