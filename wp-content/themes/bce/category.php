<?php
/**
 * The template for displaying archive pages
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.0
 */

get_header(); ?>
<?php if ( have_posts() ) : ?>
<section class="insight-listing category-listing">
    <div class="container list-heading">
        <span class="d-block mb-2 text-18">Showing results for</span>
        <h1 class="mb-0"><?php echo single_cat_title(); ?></h1>
    </div>
	<div class="insight-list">
        <div class="container">
            <div class="row gutters-row">
			<?php while ( have_posts() ) : the_post(); ?>
            	<div class="col-lg-6">
                    <div class="insight-box row">
                        <div class="col-md-6 order-2 order-md-0 mt-4 mt-md-0">
                            <div class="insight-item">
                                <span class="post-date"><?php echo get_the_date(); ?></span>
                                <h3 class="h5"><a href="<?php the_permalink(); ?>" class="stretched-link"><?php the_title(); ?></a></h3>
                            </div>
                        </div>
                        <?php if(get_field('blog_featured_image')){ ?>
                        <div class="col-md-6">
                            <div class="insight-img">
                                <img class="divImg img-fluid" alt="<?php echo get_field('blog_featured_image')['alt']; ?>" width="294" height="248" src="<?php echo get_template_directory_uri(); ?>/assets/images/0.gif" style="background-image: url('<?php echo get_field('blog_featured_image')['url']; ?>');">
                            </div>
                        </div>
                        <?php } ?>
                    </div>
                </div>   
			<?php endwhile; ?>
			</div>
			<?php global $wp_query;
                $total_pages = $wp_query->max_num_pages;
                if ($total_pages > 1){ 
            ?>
            <div class="col-12 wow custom-fadeInUp">
                <div class="pagination nav-links">
                    <?php 
                        $big = 999999999;
                        echo paginate_links( array(
                            'base' => str_replace( $big, '%#%', get_pagenum_link( $big ) ),
                            'format' => '?paged=%#%',
                            'current' => max( 1, get_query_var('paged') ),
                            'total' => $total_pages
                        ) );
                    ?>
                </div>
            </div>
            <?php } ?>
		</div>
	</div>
</section>
<?php endif; ?>
<?php get_template_part( 'template-parts/custom/footer', 'cta' ); ?>
<?php get_footer(); ?>
<script>
    document.body.classList.add("dark-header");
</script>