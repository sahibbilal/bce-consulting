<?php

/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.0
 */

get_header(); ?>

<section class="search-results-section">
    <div class="container">
        <div class="row">
            
            <div class="offset-lg-2 col-lg-7 wow custom-fadeInUp">
                <div class="search-data text-18">
                    <?php 
                        if(get_search_query()){
                            global $wp_query;
                            $count = $wp_query->found_posts;
                            if($count == 1){
                                printf( __('<span>Showing Result for</span> %s', 'bce' ), '<h1>“' . get_search_query() . '”</h1>' );
                            }else{
                                printf( __('<span>Showing Results for</span> %s', 'bce' ), '<h1>“' . get_search_query() . '”</h1>' );
                            }
                        } 
                    ?>
                </div>
                <?php if ( have_posts() ){ ?>
                <div class="search-suggestions">
                    <?php while ( have_posts() ) : the_post(); ?>
                    <div class="search-res text-18">
                        <a href="<?php echo get_the_permalink(); ?>" class="btn btn-link stretched-link"><?php echo get_the_title(); ?></a>
                        <div class="search-desc">
                            <?php
                                if(get_post_type(get_the_ID()) == 'post'){
                                    $searchDescription = wp_trim_words(get_field('blog_about_content'), 30, NULL);
                                }elseif(get_post_type(get_the_ID()) == 'capability'){
                                    $searchDescription = wp_trim_words(get_field('capability_about_content'), 30, NULL);
                                }elseif(get_post_type(get_the_ID()) == 'career' || get_post_type(get_the_ID()) =='team-member'){
                                    $searchDescription = wp_trim_words(get_the_content(), 30, NULL);
                                }elseif(get_post_type(get_the_ID()) == 'industry-verticals'){
                                    $searchDescription = wp_trim_words(get_field('industry_listing_details_short_description'), 30, NULL);
                                }elseif(is_page_template('templates/about.php')){
                                    $searchDescription = wp_trim_words(get_field('about_us_section_description'), 30, NULL);
                                }elseif(is_page_template('templates/capabilities.php')){
                                    $searchDescription = wp_trim_words(get_field('capabilities_about_section_short_description'), 30, NULL);
                                }elseif(is_page_template('templates/careers.php')){
                                    $searchDescription = wp_trim_words(get_field('career_intro_section_content'), 30, NULL);
                                }elseif(is_page_template('templates/home.php')){
                                    $searchDescription = wp_trim_words(get_field('home_about_section_short_description'), 30, NULL);
                                }elseif(is_page_template('templates/industries.php')){
                                    $searchDescription = wp_trim_words(get_field('industries_about_section_short_description'), 30, NULL);
                                }elseif(is_page_template('templates/team.php')){
                                    $searchDescription = wp_trim_words(get_field('team_interest_section_short_description'), 30, NULL);
                                }else{
                                    $searchDescription = wp_trim_words(get_the_content(), 30, NULL);
                                }
                            ?>
                            <?php if($searchDescription){ ?>
                                <p><?php echo $searchDescription; ?></p>
                            <?php } ?>
                        </div>
                    </div>
                <?php endwhile; ?>
                </div>
                <?php }else{ ?>
                <div class="search-suggestions">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12">
                                <h4>No Result Found.</h4>
                            </div>
                        </div>
                    </div>
                </div>
                <?php } ?>
            </div>
            <?php $total_pages = $wp_query->max_num_pages;
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
<script>
    document.body.classList.add("dark-header");
</script>

<?php get_footer(); ?>
