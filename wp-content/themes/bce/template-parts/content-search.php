<?php
/**
 * Template part for displaying results in search pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Twenty_Seventeen
 * @since 1.0
 * @version 1.0
 */
?>
<div class="col-lg-9">
    <div class="card">
        <div class="card-body">
            <a href="<?php echo esc_url( get_permalink() ); ?>" class="h4 stretched-link"><?php the_title(); ?></a>
            <?php 
            	if(get_post_type() == 'post'){
            		$content = get_the_content();
            	}elseif(get_post_type() == 'career'){
            		$aboutSection = get_field('careers_details_about_section', get_the_ID());
            		$content = $aboutSection['content'];
            	}elseif(get_post_type() == 'conference-center'){
            		$overviewSection = get_field('conference_center_overview_section', get_the_ID());
            		$content = $overviewSection['content'];
            	}elseif(get_post_type() == 'resources'){
            		$content = get_the_content();
            	}elseif(get_post_type() == 'team-member'){
            		$content = get_field('team_details', get_the_ID());
            	/*}elseif(get_post_type() == 'focus-regions'){
            		$content = get_field('short_description', get_the_ID()); */
            	/*}elseif(get_post_type() == 'regions'){
            		$content = get_field('content', get_the_ID()); */
            	/*}elseif(get_post_type() == 'youth-council'){
            		$content = get_field('bio', get_the_ID());*/
            	}elseif(get_post_type() == 'page'){
            		$content = get_the_content();
            	}            	
			    $trimmed_content = wp_trim_words( $content, 15, NULL );
            ?>
            <p class="text-14">
            	<?php echo $trimmed_content; ?>
			</p>
        </div>
    </div>
</div>
