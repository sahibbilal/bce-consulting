<?php
/* 
Template Name: Insights 
*/
get_header(); ?>
<?php if ( get_field('insights_banner_section') && ( get_field('insights_banner_section_image') || get_field('insights_banner_section_title') || get_field('insights_banner_section_header') ) ) : ?>
<section class="cmn-inner-hero divImg" style="background-image: url('<?php echo get_field('insights_banner_section_image')['url']; ?>');">
    <div class="container">
        <div class="row">
            <div class="col-lg-10 col-xl-8 wow custom-fadeInUp">
                <?php if(get_field('insights_banner_section_title')){ ?>
                <span class="h6"><?php echo get_field('insights_banner_section_title'); ?></span>
                <?php } ?>
                <?php if(get_field('insights_banner_section_header')){ ?>
                <h1><?php echo get_field('insights_banner_section_header'); ?></h1>
                <?php } ?>
            </div>
        </div>
    </div>
</section>
<?php endif; ?>

<?php
$paged = ( get_query_var('paged') == 0 ) ? 1 : get_query_var('paged');
$blogArgs = array('post_type' => 'post', 'post_status' => 'publish', 'orderby' => 'date', 'order' => 'DESC', 'paged' => $paged, 'posts_per_page' => 10);

if ( ! empty( $_GET['post_category' ] ) && is_array( $_GET['post_category' ] ) ) {
    $blogArgs['cat'] = implode( ',', $_GET['post_category' ] );
}

$blogLoop = new WP_Query($blogArgs);
   // if ($blogLoop->have_posts()) :
$industires_cat = get_term_by('name', 'Industries', 'category');
$services_cat   = get_term_by('name', 'Services', 'category');
$authors_cat    = get_term_by('name', 'Authors', 'category'); 


?>
<div class="container insights-filter-container" style="">
    
    <form class="insights-filter">
        <input type="hidden" id="pos-y" name="pos_y" value="0">
        <div class="insights-filter__controls">
            <button class="insights-filter__submit btn btn-small btn-primary">Filter</button>
            <a class="btn btn-link btn-small" href="<?php the_permalink(); ?>">Clear All</a>
        </div>
        <?php
        foreach ( [$industires_cat, $services_cat, $authors_cat] as $cat ) :
            if ( empty( $cat ) ) {
                continue;
            }
            $args = array(
                'hide_empty' => false,
                'title_li' =>  '',
                'hierarchical' => true,
                'child_of' => $cat->term_id,
                'walker' => new Custom_Walker_Category(),
                'depth' => 2,
                'selected_cats' => ( ! empty( $_GET['post_category'] ) ? $_GET['post_category'] : array() ),
            );
            ?>
            <div class="tag tag__<?php echo $cat->slug; ?>">
                <div class="tag__title"><?php echo $cat->name; ?><span class="count"></span><span class="toggler">+</span></div>
                <div class="tag__list-wrapper" style="">
                    <div class="tag-list__border">
                    <ul class="tag__list">
                        <?php wp_list_categories( $args ); ?>
                    </ul>
                    </div>
                </div>
            </div>
            <?php
        endforeach;
        ?>
    <!-- </div> -->
    </form>
</div>
<section class="insight-listing">
    <div class="insight-list">
        <div class="container">
            <div class="row gutters-row">
            	<?php while ($blogLoop->have_posts()) : $blogLoop->the_post();
	            ?>
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
                <?php endwhile; wp_reset_postdata(); ?>
            </div>
            <?php $total_pages = $blogLoop->max_num_pages;
                if ($total_pages > 1){ 
            ?>
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
            <?php } ?>
        </div>
    </div>
</section>
<?php //endif; ?>
<?php get_template_part( 'template-parts/custom/footer', 'cta' ); ?>
<?php get_footer(); ?>
