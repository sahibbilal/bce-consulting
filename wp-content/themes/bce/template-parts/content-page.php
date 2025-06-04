<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Twenty_Seventeen
 * @since 1.0
 * @version 1.0 
 */

?>
<?php if(is_page()){ ?>
<section class="cms-page">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-md-8 mx-auto">
				<?php the_content(); ?>
            </div>
        </div>
    </div>
</section>	
<?php }elseif(is_search()){ ?>
<div class="col-lg-9">
    <div class="card">
        <div class="card-body">
            <a href="<?php echo esc_url( get_permalink() ); ?>" class="h4 stretched-link"><?php the_title(); ?></a>
            <p class="text-14">
            	<?php $content = get_the_content();
			    $trimmed_content = wp_trim_words( $content, 15, NULL );
				echo $trimmed_content; ?>
			</p>
        </div>
    </div>
</div>
<?php } ?>