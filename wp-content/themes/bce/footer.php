<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since Twenty Seventeen 1.0
 * @version 1.2
 */

?>
</div>
<?php //get_template_part( 'template-parts/custom/footer', 'cta' ); ?>
<footer>
    <div class="container wow custom-fadeInUp">
        <div class="row align-items-start">
            <div class="col-lg-auto">
                <?php 
                    if(get_field('footer_logo','options')){
                        $logoURL = get_field('footer_logo','options')['url'];
                    }else{
                        $logoURL = get_template_directory_uri().'/assets/images/f-logo.png';
                    }
                ?>
                <a href="<?php echo get_home_url(); ?>" class="ft-logo">
                    <img src="<?php echo $logoURL; ?>" width="218" height="45" alt="<?php echo get_bloginfo('name'); ?>" class="img-fluid" />
                </a>
            </div>
            <div class="col-lg d-lg-flex justify-content-end">
                <?php wp_nav_menu(array('theme_location' => 'footer-menu1', 'menu_class' => 'list-unstyled ft-menu text-lg-end' )); ?>
                <?php if(get_field('footer_linkedin_icon','options') && get_field('footer_linkedin_url','options')){ ?>
                <a href="<?php echo get_field('footer_linkedin_url','options'); ?>" rel="noopener" target="_blank" class="social-link">
                    <img src="<?php echo get_field('footer_linkedin_icon','options')['url']; ?>" width="24" height="24" alt="<?php echo get_field('footer_linkedin_icon','options')['alt']; ?>" class="svg" />
                </a>
                <?php } ?>
            </div>
        </div>
        <div class="copyright-block">
            <div class="row">
                <div class="col-lg">
                    <span>&copy; <?php echo date('Y'); ?> Belanger Crumb & Eschle. <span class="d-inline-block">All rights reserved. </span></span>
                    <span class="text-white d-block d-md-inline-block designed-by">Design by <a href="https://www.spinxdigital.com/" rel="noopener" target="_blank">SPINX Digital</a></span>
                </div>
                <?php if(!empty(get_field('footer_links','options'))){ ?>
                <div class="col-lg-auto">
                    <ul class="list-unstyled privacy-links text-lg-end mb-0">
                        <?php foreach (get_field('footer_links','options') as $footerLinks) {
                            if($footerLinks['header'] && $footerLinks['link_url']){
                        ?>
                        <li><a href="<?php echo $footerLinks['link_url']; ?>"><?php echo $footerLinks['header']; ?></a></li>
                        <?php } } ?>
                    </ul>
                </div>
                <?php } ?>
            </div>
        </div>
    </div>
</footer>

<!-- Header Search Modal -->
<div class="modal fade header-search" id="searchPopup" tabindex="-1" aria-labelledby="searchPopuplLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="header-form">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                    <img src="<?php echo esc_url(get_template_directory_uri().'/assets/images/close.svg'); ?>" alt="" class="img-fluid svg" role="presentation" />
                </button>
                <form role="search" method="get" action="<?php echo get_home_url(); ?>">
                    <div class="form-group">
                        <div class="form-label">
                            <input type="submit" class="d-none">
                            <input name="s" class="form-control" type="text">
                            <label>Search...</label>
                        </div>
                    </div>
                </form>
                <span class="text-12 d-inline-block">Hit enter to search or ESC to close</span>
            </div>
        </div>
    </div>
</div>
<!-- Cookie Modal -->
<?php get_template_part( 'template-parts/custom/cookie-consent' ); ?>
<!-- /Cookie Modal -->

<!-- Code snippet  -->
<?php 
$snippet = get_field( 'code_snippet', get_the_ID() );
if( $snippet ) {
	echo $snippet;
}
?>
<!-- Code snippet  -->

<?php wp_footer(); ?>
</body>
</html>
