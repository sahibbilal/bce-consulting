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

<section class="cmn-inner-hero divImg" style="background-image: url('<?php echo get_field('industry_banner_image')['url']; ?>');">
    <div class="container">
        <div class="row">
            <div class="col-lg-10 col-xl-8 wow custom-fadeInUp">
                <span class="h6">INDUSTRIES</span>
                <h1 class="display"><?php the_title(); ?></h1>
            </div>
        </div>
    </div>
</section>

<?php if(!empty(get_field('industry_about_section'))){ ?>
<section class="cmn-spacer">
    <div class="container cmn-left-right-section">
        <?php foreach (get_field('industry_about_section') as $about) {
            if($about['image'] || $about['content']){
        ?>
        <div class="row">
            <?php if($about['image']){ ?>
            <div class="col-lg-5 align-self-center">
                <div class="cmn-block-img wow custom-fadeInUp">
                    <img src="<?php echo $about['image']['url']; ?>" alt="<?php echo $about['image']['alt']; ?>" width="522" height="522" class="img-fluid" />
                </div>
            </div>
            <?php } ?>
            <?php if($about['content']){ ?>
            <div class="col-lg-1 wow custom-fadeInUp">
                <div class="middle-border"></div>
            </div>
            <div class="col-lg-6 align-self-center wow custom-fadeInUp">
                <?php echo $about['content']; ?>
            </div>
            <?php } ?>
        </div>
        <?php } }?>
    </div>
</section>
<?php } ?>
<?php if( get_field('industry_insights_section') && ( get_field('industry_insights_section_header') || !empty(get_field('industry_insights_section_insights')) || get_field('industry_insights_section_link_url') || get_field('industry_insights_section_link_text') ) ){ ?>
<section class="cmn-case-insight-slider">
    <div class="container">
        <?php if(get_field('industry_insights_section_header')){ ?>
        <h3><?php echo get_field('industry_insights_section_header'); ?></h3>
        <?php } ?>
        <?php if(!empty(get_field('industry_insights_section_insights'))){ ?>
        <div class="insight-studie-slider">
            <?php foreach (get_field('industry_insights_section_insights') as $insights) {
                if(get_post_status($insights) == 'publish'){
            ?>
            <div class="box-items">
                <div class="item-content">
                    <span class="post-date"><?php echo get_the_date('F d, Y', $insights); ?></span>
                    <h4 class="h5"><a href="<?php echo get_the_permalink($insights); ?>" class="stretched-link"><?php echo get_the_title($insights); ?></a></h4>
                </div>
                <?php if(get_field('blog_featured_image', $insights)){ ?>
                <div class="item-img">
                    <img class="divImg" alt="<?php echo get_field('blog_featured_image', $insights)['alt']; ?>" width="294" height="248" src="<?php echo get_template_directory_uri(); ?>/assets/images/0.gif" style="background-image: url('<?php echo get_field('blog_featured_image', $insights)['url']; ?>');">
                </div>
                <?php } ?>
            </div>
            <?php } } ?>
        </div>
        <?php } ?>
        <?php if(get_field('industry_insights_section_link_url') && get_field('industry_insights_section_link_text')){ ?>
        <div class="slider-footer d-flex align-items-center">
            <div class="slider-nav"></div>
            <a href="<?php echo get_field('industry_insights_section_link_url'); ?>" class="btn btn-link ms-auto"><?php echo get_field('industry_insights_section_link_text'); ?></a>
        </div>
        <?php } ?>
    </div>
</section>
<?php } ?>
<?php if(get_field('industry_team_section') && !empty(get_field('industry_team_section_team'))){ ?>
<section class="cmn-team-list inner-page-team-list">
    <div class="container">
        <?php if(get_field('industry_team_section_header')){ ?>
        <h3><?php echo get_field('industry_team_section_header'); ?></h3>
        <?php } ?>
        <?php if(!empty(get_field('industry_team_section_team'))){ ?>
        <div class="row">
            <?php foreach (get_field('industry_team_section_team') as $team) {
                if(get_post_status($team) == 'publish'){
            ?>
            <div class="col-md-6 col-lg-4 col-xl-3 wow custom-fadeInUp">
                <div class="team-card">
                    <?php if(get_field('team_member_profile_image', $team)){ ?>
                    <div class="team-img">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/0.gif" alt="<?php echo get_field('team_member_profile_image', $team)['alt']; ?>" height="293" width="293" style="background-image: url('<?php echo get_field('team_member_profile_image', $team)['url']; ?>')" class="divImg" />
                    </div>
                    <?php } ?>
                    <div class="team-intro">
                         <h5><a href="<?php echo get_the_permalink($team); ?>" class="stretched-link"><?php echo get_the_title($team); ?></a></h5>
                        <?php if(get_field('team_member_role', $team)){ ?> 
                        <span><?php echo get_field('team_member_role', $team); ?></span>
                        <?php } ?>
                        <?php if(get_field('team_member_ocation', $team)){ ?>
                        <span><?php echo get_field('team_member_ocation', $team); ?></span>
                        <?php } ?>
                    </div>
                </div>
            </div>
            <?php } } ?>
        </div>
        <?php } ?>
    </div>
</section>
<?php } ?>
<?php get_template_part( 'template-parts/custom/footer', 'cta' ); ?>
<script>
    $(".industry-menu").addClass("mega-current_page_item");
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
