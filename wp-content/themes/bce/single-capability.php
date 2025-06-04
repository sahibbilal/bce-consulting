<?php

/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.0
 */
get_header(); ?>

<section class="cmn-inner-hero divImg" style="background-image: url('<?php echo get_field('capability_banner_image')['url']; ?>');">
    <div class="container">
        <div class="row">
            <div class="col-lg-10 col-xl-8 wow custom-fadeInUp">
                <span class="h6">SERVICES</span>
                <h1 class="display"><?php the_title(); ?></h1>
            </div>
        </div>
    </div>
</section>
<?php if (get_field('capability_about_content') || !empty(get_field('capability_counter_section')) || get_field('capability_description_section') || !empty(get_field('capability_steps_section'))) { ?>
    <section class="capabilities-details-section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-10 col-xl-8">
                    <?php if (get_field('capability_about_content')) { ?>
                        <div class="cmn-content-block wow custom-fadeInUp">
                            <?php echo get_field('capability_about_content'); ?>
                        </div>
                    <?php } ?>
                    <?php if (!empty(get_field('capability_counter_section'))) { ?>
                        <div class="counter-section">
                            <div class="row mx-0 text-center justify-content-center align-items-center">
                                <?php foreach (get_field('capability_counter_section') as $counter) {
                                    if ($counter['currency'] || $counter['number'] || $counter['variable'] || $counter['title']) {
                                ?>
                                        <div class="col-md-6 px-0 wow custom-fadeInUp">
                                            <div class="counter-block">
                                                <?php if ($counter['currency'] || $counter['number'] || $counter['variable']) { ?>
                                                    <span class="big-number mb-0"><?php if ($counter['currency']) {
                                                                                        echo $counter['currency'];
                                                                                    } ?><?php if ($counter['number']) { ?><span class="counter" data-count="<?php echo $counter['number']; ?>">0</span><?php } ?><?php if ($counter['variable']) {
                                                                                                                                                                                                                                                                            echo $counter['variable'];
                                                                                                                                                                                                                                                                        } ?></span>
                                                <?php } ?>
                                                <?php if ($counter['title']) { ?>
                                                    <span class="d-block text-16 mt-2"><?php echo $counter['title']; ?></span>
                                                <?php } ?>
                                            </div>
                                        </div>
                                <?php }
                                } ?>
                            </div>
                        </div>
                    <?php } ?>
                    <?php if (get_field('capability_description_section')) { ?>
                        <div class="cmn-content-block wow custom-fadeInUp">
                            <?php echo get_field('capability_description_section'); ?>
                        </div>
                    <?php } ?>
                    <?php if (!empty(get_field('capability_steps_section'))) { ?>
                        <div class="four-steps text-18">
                            <div class="row mx-0">
                                <?php foreach (get_field('capability_steps_section') as $steps) {
                                    if ($steps['header'] || $steps['title']) {
                                ?>
                                        <div class="col-md-6 px-0">
                                            <div class="steps-txt">
                                                <?php if ($steps['header']) { ?>
                                                    <h5 class="mb-3"><?php echo $steps['header']; ?></h5>
                                                <?php } ?>
                                                <?php if ($steps['title']) { ?>
                                                    <p><?php echo $steps['title']; ?></p>
                                                <?php } ?>
                                            </div>
                                        </div>
                                <?php }
                                } ?>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </section>
<?php } ?>
<?php if (get_field('capability_insights_section') && (get_field('capability_insights_section_header') || !empty(get_field('capability_insights_section_insights')) || get_field('capability_insights_section_link_url') || get_field('capability_insights_section_link_text'))) { ?>
    <section class="cmn-case-insight-slider">
        <div class="container">
            <?php if (get_field('capability_insights_section_header')) { ?>
                <h3><?php echo get_field('capability_insights_section_header'); ?></h3>
            <?php } ?>
            <?php if (!empty(get_field('capability_insights_section_insights'))) { ?>
                <div class="insight-studie-slider">
                    <?php foreach (get_field('capability_insights_section_insights') as $insights) {
                        if (get_post_status($insights) == 'publish') {
                    ?>
                            <div class="box-items">
                                <div class="item-content">
                                    <span class="post-date"><?php echo get_the_date('F d, Y', $insights); ?></span>
                                    <h4 class="h5"><a href="<?php echo get_the_permalink($insights); ?>" class="stretched-link"><?php echo get_the_title($insights); ?></a></h4>
                                </div>
                                <?php if (get_field('blog_featured_image', $insights)) { ?>
                                    <div class="item-img">
                                        <img class="divImg" alt="<?php echo get_field('blog_featured_image', $insights)['alt']; ?>" width="294" height="248" src="<?php echo get_template_directory_uri(); ?>/assets/images/0.gif" style="background-image: url('<?php echo get_field('blog_featured_image', $insights)['url']; ?>');">
                                    </div>
                                <?php } ?>
                            </div>
                    <?php }
                    } ?>
                </div>
            <?php } ?>
            <?php if (get_field('capability_insights_section_link_url') && get_field('capability_insights_section_link_text')) { ?>
                <div class="slider-footer d-flex align-items-center">
                    <div class="slider-nav"></div>
                    <a href="<?php echo get_field('capability_insights_section_link_url'); ?>" class="btn btn-link ms-auto"><?php echo get_field('capability_insights_section_link_text'); ?></a>
                </div>
            <?php } ?>
        </div>
    </section>
<?php } ?>
<?php if (get_field('capability_team_section') && !empty(get_field('capability_team_section_team'))) { ?>
    <section class="cmn-team-list inner-page-team-list">
        <div class="container">
            <?php if (get_field('capability_team_section_header')) { ?>
                <h3><?php echo get_field('capability_team_section_header'); ?></h3>
            <?php } ?>
            <?php if (!empty(get_field('capability_team_section_team'))) { ?>
                <div class="row">
                    <?php foreach (get_field('capability_team_section_team') as $team) {
                        if (get_post_status($team) == 'publish') {
                    ?>
                            <div class="col-md-6 col-lg-4 col-xl-3 wow custom-fadeInUp">
                                <div class="team-card">
                                    <?php if (get_field('team_member_profile_image', $team)) { ?>
                                        <div class="team-img">
                                            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/0.gif" alt="<?php echo get_field('team_member_profile_image', $team)['alt']; ?>" height="293" width="293" style="background-image: url('<?php echo get_field('team_member_profile_image', $team)['url']; ?>')" class="divImg" />
                                        </div>
                                    <?php } ?>
                                    <div class="team-intro">
                                        <h5><a href="<?php echo get_the_permalink($team); ?>" class="stretched-link"><?php echo get_the_title($team); ?></a></h5>
                                        <?php if (get_field('team_member_role', $team)) { ?>
                                            <span><?php echo get_field('team_member_role', $team); ?></span>
                                        <?php } ?>
                                        <?php if (get_field('team_member_ocation', $team)) { ?>
                                            <span><?php echo get_field('team_member_ocation', $team); ?></span>
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>
                    <?php }
                    } ?>
                </div>
            <?php } ?>
        </div>
    </section>
<?php } ?>
<?php get_template_part( 'template-parts/custom/footer', 'cta' ); ?>
<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/assets/js/counter.js"></script>
<script>
    $(".capabilities-menu").addClass("mega-current_page_item");
    $(document).ready(function() {
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
            responsive: [{
                breakpoint: 992,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1,
                }
            }]
        });
    });
</script>
<?php get_footer(); ?>