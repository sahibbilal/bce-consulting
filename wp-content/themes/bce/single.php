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
<section class="insight-banner">
    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/0.gif" alt="<?php echo get_field('blog_banner_image')['alt']; ?>" height="400" width="1440" style="background-image: url('<?php echo get_field('blog_banner_image')['url']; ?>')" class="divImg" />
</section>
<section class="cmn-detail-page">
    <div class="container">
        
        <div class="row">
            <div class="col-lg-10 mx-auto wow custom-fadeInUp">
                <div class="insight-data text-16">
                    <span><?php echo get_the_date(); ?></span>
                    <h1><?php the_title(); ?></h1>
                    <?php 
                    $tags = get_the_category(get_the_ID()); 
                    if(!empty($tags)) :
                        ?>
                        <div class="tag-group">
                            <?php 
                            $authors_cat    = get_term_by('name', 'Authors', 'category');
                            foreach ( $tags as $tag ) :
                                if ( cat_is_ancestor_of( $authors_cat->term_id, $tag->term_id ) ) {
                                    continue;
                                }
                                ?>
                                <a href="<?php echo get_category_link( $tag->term_id ); ?>" class="badge badge-small"><?php echo $tag->name; ?></a>
                            <?php endforeach; ?>
                        </div>
                        <?php 
                    endif; 
                    ?>
                </div>
            </div>
        </div>
        <?php if(get_field('blog_about_content')){ ?>
        <div class="row">
            <div class="col-12 wow custom-fadeInUp">
                <div class="editor-div">
                    <?php echo get_field('blog_about_content'); ?>
                </div>
            </div>
        </div>
        <?php } ?>
    </div>
</section>
<?php if( !empty(get_field('blog_team_section_team'))){ ?>
<section class="cmn-team-list inner-page-team-list">
    <div class="container">
        <?php if(get_field('blog_team_section_header')){ ?>
        <h3><?php echo get_field('blog_team_section_header'); ?></h3>
        <?php } ?>
        <?php if(!empty(get_field('blog_team_section_team'))){ ?>
        <div class="row">
            <?php foreach (get_field('blog_team_section_team') as $team) {
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
    document.body.classList.add("dark-header");
    $(".insights-menu").addClass("mega-current_page_item");
</script>
<?php get_footer(); ?>
