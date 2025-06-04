<?php
/* 
Template Name: Team 
*/
get_header(); ?>

<?php if (get_field('team_banner_section') && (get_field('team_banner_section_image') || get_field('team_banner_section_header') || get_field('team_banner_section_title'))) { ?>
    <section class="cmn-inner-hero divImg" style="background-image: url('<?php echo get_field('team_banner_section_image')['url']; ?>');">
        <div class="container">
            <div class="row">
                <div class="col-lg-10 col-xl-8 wow custom-fadeInUp">
                    <?php if (get_field('team_banner_section_header')) { ?>
                        <span class="h6"><?php echo get_field('team_banner_section_header'); ?></span>
                    <?php } ?>
                    <?php if (get_field('team_banner_section_title')) { ?>
                        <h1><?php echo get_field('team_banner_section_title'); ?></h1>
                    <?php } ?>
                </div>
            </div>
        </div>
    </section>
<?php } ?>

<?php

$teamArgs = array(
    'post_type' => 'team-member',
    'post_status' => 'publish',
    'posts_per_page' => -1,
    'order_by' => 'menu_order title',
    'order' => 'ASC'
);

$teamMembers = new WP_Query($teamArgs);
if ($teamMembers->have_posts()) {
?>
    <section class="cmn-team-list">
        <div class="container">
            <div class="row">
                <?php while ($teamMembers->have_posts()) {
                    $teamMembers->the_post(); ?>
                    <div class="col-md-6 col-lg-4 col-xl-3 wow custom-fadeInUp">
                        <div class="team-card">
                            <?php if (get_field('team_member_profile_image', get_the_ID())) { ?>
                                <div class="team-img">
                                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/0.gif" alt="<?php echo get_field('team_member_profile_image', get_the_ID())['alt']; ?>" height="293" width="293" style="background-image: url('<?php echo get_field('team_member_profile_image', get_the_ID())['url']; ?>')" class="divImg" />
                                </div>
                            <?php } ?>
                            <div class="team-intro">
                                <h5><a href="<?php echo get_the_permalink(); ?>" class="stretched-link"><?php echo get_the_title(); ?></a></h5>
                                <span><?php echo get_field('team_member_role', get_the_ID()); ?></span>
                                <span><?php echo get_field('team_member_ocation', get_the_ID()); ?></span>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </section>
<?php wp_reset_query();
} ?>

<?php if (get_field('team_interest_section') && (get_field('team_interest_section_image') || get_field('team_interest_section_title') || get_field('team_interest_section_short_description') || (get_field('team_interest_section_cta_title') && get_field('team_interest_section_cta_link')))) { ?>
    <section class="team-cta">
        <div class="container">
            <div class="row align-items-center">
                <?php if (get_field('team_interest_section_image')) { ?>
                    <div class="col-lg-6 ms-auto mb-lg-0 mb-5 order-lg-2">
                        <img src="<?php echo get_field('team_interest_section_image')['url']; ?>" alt="<?php echo get_field('team_interest_section_image')['alt']; ?>" height="560" width="636" class="img-fluid" />
                    </div>
                <?php } ?>
                <?php if (get_field('team_interest_section_title') || get_field('team_interest_section_short_description') || (get_field('team_interest_section_cta_title') && get_field('team_interest_section_cta_link'))) { ?>
                    <div class="col-lg-6 col-xl-5">
                        <?php if (get_field('team_interest_section_title')) { ?>
                            <h4 class="h1"><?php echo get_field('team_interest_section_title'); ?></h4>
                        <?php } ?>
                        <?php if (get_field('team_interest_section_short_description')) { ?>
                            <p><?php echo get_field('team_interest_section_short_description'); ?></p>
                        <?php } ?>
                        <?php if (get_field('team_interest_section_cta_title') && get_field('team_interest_section_cta_link')) { ?>
                            <a href="<?php echo get_field('team_interest_section_cta_link'); ?>" class="btn btn-primary"><?php echo get_field('team_interest_section_cta_title'); ?></a>
                        <?php } ?>
                    </div>
                <?php } ?>
            </div>
        </div>
    </section>
<?php } ?>
<?php get_template_part('template-parts/custom/footer', 'cta'); ?>
<?php get_footer(); ?>