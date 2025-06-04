<?php
/* 
Template Name: Home 
*/
get_header(); ?>
<?php if( get_field('home_banner_section') && ( get_field('home_banner_section_image') || get_field('home_banner_section_mobile_image') || get_field('home_banner_section_header') || get_field('home_banner_section_button_link_url') || get_field('home_banner_section_button_link_text') ) ){ ?>
<section class="cmn-home-hero">
    <?php if(get_field('home_banner_section_image')){ ?>
    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/0.gif" style="background-image: url(<?php echo get_field('home_banner_section_image')['url']; ?>);" alt="" class="divImg d-none d-md-block" role="presentation" />
    <?php } ?>
    <?php if(get_field('home_banner_section_mobile_image')){ ?>
    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/0.gif" style="background-image: url(<?php echo get_field('home_banner_section_mobile_image')['url']; ?>);" alt="" class="divImg d-md-none" role="presentation" />
    <?php } ?>
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-xl-10 wow custom-fadeInUp">
                <?php if(get_field('home_banner_section_header')){ ?>
                <h1 class="display"><?php echo get_field('home_banner_section_header'); ?></h1>
                <?php } ?>
                <?php if(get_field('home_banner_section_button_link_url') && get_field('home_banner_section_button_link_text')){ ?>
                <a href="<?php echo get_field('home_banner_section_button_link_url'); ?>" class="btn btn-primary"><?php echo get_field('home_banner_section_button_link_text'); ?></a><br/>
                <?php } ?>
                <a id="scroll-down" href="javascript:;" class="goto-next"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/arrow-down.svg" alt="arrow down" width="18" height="33" /></a>
            </div>
        </div>
    </div>
</section>
<?php } ?>
<?php if( get_field('home_about_section') && ( get_field('home_about_section_header') ||  get_field('home_about_section_short_description') || get_field('home_about_section_button_link_url') || get_field('home_about_section_button_link_text') ) ){ ?>
<section id="home-about-section" class="home-about-content-section">
    <div class="container">
        <div class="row justify-content-between align-items-center">
            <?php if(get_field('home_about_section_header')){ ?>
            <div class="col-lg-6 col-xl-5 wow custom-fadeInUp">
                <h2><?php echo get_field('home_about_section_header'); ?></h2>
            </div>
            <?php } ?>
            <?php if(get_field('home_about_section_short_description') || get_field('home_about_section_button_link_url') || get_field('home_about_section_button_link_text')){ ?>
            <div class="col-lg-6 wow custom-fadeInUp">
                <?php if(get_field('home_about_section_short_description')){ ?>
                <?php echo get_field('home_about_section_short_description'); ?>
                <?php } ?>
                <?php if(get_field('home_about_section_button_link_url') && get_field('home_about_section_button_link_text')){ ?>
                <a href="<?php echo get_field('home_about_section_button_link_url'); ?>" class="btn btn-link"><?php echo get_field('home_about_section_button_link_text'); ?></a>
                <?php } ?>
            </div>
            <?php } ?>
        </div>
    </div>
</section>
<?php } ?>
<?php if(!empty(get_field('home_counter_section'))){ ?>
<section class="counter-section">
    <div class="container">
        <div class="row mx-0 text-center justify-content-center align-items-center">
            <?php foreach (get_field('home_counter_section') as $counter) {
                if($counter['currency'] || $counter['number'] || $counter['variable'] || $counter['title']){
            ?>
            <div class="col-md-6 col-xl-3 px-0 wow custom-fadeInUp">
                <div class="counter-block">
                    <?php if($counter['currency'] || $counter['number'] || $counter['variable']){ ?>
                    <span class="big-number mb-0"><?php if($counter['currency']){ echo $counter['currency']; } ?><?php if($counter['number']){ ?><span class="counter" data-count="<?php echo $counter['number']; ?>">0</span><?php } ?><?php if($counter['variable']){ echo $counter['variable']; } ?></span>
                    <?php } ?>
                    <?php if($counter['title']){ ?>
                    <span class="d-block text-16 mt-2"><?php echo $counter['title']; ?></span>
                    <?php } ?>
                </div>
            </div>
            <?php } } ?>
        </div>
    </div>
</section>
<?php } ?>
<?php if((get_field('home_capabilities_section') && (get_field('home_capabilities_section_image') || get_field('home_capabilities_section_header') || !empty(get_field('home_capabilities_section_capabilities')) || get_field('home_capabilities_section_link_url') || get_field('home_capabilities_section_link_text'))) || (get_field('home_industries_section') && ( get_field('home_industries_section_image') || get_field('home_industries_section_header') || !empty(get_field('home_industries_section_industries')) || get_field('home_industries_section_link_url') || get_field('home_industries_section_link_text'))) || (get_field('home_careers_section') && ( get_field('home_careers_section_image') || get_field('home_careers_section_header') || get_field('home_careers_section_short_description') || get_field('home_careers_section_link_url') || get_field('home_careers_section_link_text')))){ ?>
<section class="home-cmn-left-right-section">
    <div class="container cmn-left-right-section">
        <?php if( get_field('home_capabilities_section') && ( get_field('home_capabilities_section_image') || get_field('home_capabilities_section_header') || !empty(get_field('home_capabilities_section_capabilities')) || get_field('home_capabilities_section_link_url') || get_field('home_capabilities_section_link_text') ) ){ ?>
        <div class="row">
            <?php if(get_field('home_capabilities_section_image')){ ?>
            <div class="col-lg-5 align-self-center">
                <div class="cmn-block-img wow custom-fadeInUp">
                    <img src="<?php echo get_field('home_capabilities_section_image')['url']; ?>" width="522" height="560" alt="<?php echo get_field('home_capabilities_section_image')['alt']; ?>" class="img-fluid" />
                </div>
            </div>
            <?php } ?>
            <?php if(get_field('home_capabilities_section_header') || !empty(get_field('home_capabilities_section_capabilities')) || get_field('home_capabilities_section_link_url') || get_field('home_capabilities_section_link_text')){ ?>
            <div class="col-lg-1 wow custom-fadeInUp">
                <div class="middle-border"></div>
            </div>
            <div class="col-lg-6 wow custom-fadeInUp align-self-center">
                <?php if(get_field('home_capabilities_section_header')){ ?>
                <h3><?php echo get_field('home_capabilities_section_header'); ?></h3>
                <?php } ?>
                <?php if(!empty(get_field('home_capabilities_section_capabilities'))){ ?>
                <div class="tag-group">
                    <?php foreach (get_field('home_capabilities_section_capabilities') as $capabilities) {
                        if(get_post_status($capabilities) == 'publish'){
                    ?>
                    <a href="<?php echo get_permalink($capabilities); ?>" class="badge"><?php echo get_the_title($capabilities); ?></a>
                    <?php } } ?>
                </div>
                <?php } ?>
                <?php if(get_field('home_capabilities_section_link_url') && get_field('home_capabilities_section_link_text')){ ?>
                <a href="<?php echo get_field('home_capabilities_section_link_url'); ?>" class="btn btn-link text-20"><?php echo get_field('home_capabilities_section_link_text'); ?></a>
                <?php } ?>
            </div>
            <?php } ?>
        </div>
        <?php } ?>
        <?php if(get_field('home_industries_section') && ( get_field('home_industries_section_image') || get_field('home_industries_section_header') || !empty(get_field('home_industries_section_industries')) || get_field('home_industries_section_link_url') || get_field('home_industries_section_link_text') ) ){ ?>
        <div class="row">
            <?php if(get_field('home_industries_section_image')){ ?>
            <div class="col-lg-5 align-self-center">
                <div class="cmn-block-img wow custom-fadeInUp">
                    <img src="<?php echo get_field('home_industries_section_image')['url']; ?>" width="522" height="560" alt="<?php echo get_field('home_industries_section_image')['alt']; ?>" class="img-fluid" />
                </div>
            </div>
            <?php } ?>
            <?php if(get_field('home_industries_section_header') || !empty(get_field('home_industries_section_industries')) || get_field('home_industries_section_link_url') || get_field('home_industries_section_link_text')){ ?>
            <div class="col-lg-1 wow custom-fadeInUp">
                <div class="middle-border"></div>
            </div>
            <div class="col-lg-6 wow custom-fadeInUp align-self-center">
                <?php if(get_field('home_industries_section_header')){ ?>
                <h3><?php echo get_field('home_industries_section_header'); ?></h3>
                <?php } ?>
                <?php if(!empty(get_field('home_industries_section_industries'))){ ?>
                <div class="tag-group">
                    <?php foreach (get_field('home_industries_section_industries') as $industries) {
                        if(get_post_status($industries) == 'publish'){
                    ?>
                    <a href="<?php echo get_permalink($industries); ?>" class="badge"><?php echo get_the_title($industries); ?></a>
                    <?php } } ?>
                </div>
                <?php } ?>
                <?php if(get_field('home_industries_section_link_url') && get_field('home_industries_section_link_text')){ ?>
                <a href="<?php echo get_field('home_industries_section_link_url'); ?>" class="btn btn-link text-20"><?php echo get_field('home_industries_section_link_text'); ?></a>
                <?php } ?>
            </div>
            <?php } ?>
        </div>
        <?php } ?>
        <?php if(get_field('home_careers_section') && ( get_field('home_careers_section_image') || get_field('home_careers_section_header') || get_field('home_careers_section_short_description') || get_field('home_careers_section_link_url') || get_field('home_careers_section_link_text') ) ){ ?>
        <div class="row">
            <?php if(get_field('home_careers_section_image')){ ?>
            <div class="col-lg-5 align-self-center">
                <div class="cmn-block-img wow custom-fadeInUp">
                    <img src="<?php echo get_field('home_careers_section_image')['url']; ?>" width="636" height="500" alt="<?php echo get_field('home_careers_section_image')['alt']; ?>" class="img-fluid" />
                </div>
            </div>
            <?php } ?>
            <?php if(get_field('home_careers_section_header') || get_field('home_careers_section_short_description') || get_field('home_careers_section_link_url') || get_field('home_careers_section_link_text')){ ?>
            <div class="col-lg-1 wow custom-fadeInUp">
                <div class="middle-border"></div>
            </div>
            <div class="col-lg-6 wow custom-fadeInUp align-self-center">
                <?php if(get_field('home_careers_section_header')){ ?>
                <h2><?php echo get_field('home_careers_section_header'); ?></h2>
                <?php } ?>
                <?php if(get_field('home_careers_section_short_description')){ ?>
                <?php echo get_field('home_careers_section_short_description'); ?>
                <?php } ?>
                <?php if(get_field('home_careers_section_link_url') && get_field('home_careers_section_link_text')){ ?>
                <a href="<?php echo get_field('home_careers_section_link_url'); ?>" class="btn btn-link text-20"><?php echo get_field('home_careers_section_link_text'); ?></a>
                <?php } ?>
            </div>
            <?php } ?>
        </div>
        <?php } ?>
    </div>
</section>
<?php } ?>
<?php get_template_part( 'template-parts/custom/footer', 'cta' ); ?>
<?php get_footer(); ?>
<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/assets/js/counter.js"></script>
<script>
    $(document).ready(function () {
        $('#scroll-down').click(function () {
            var headHeight = $('header').outerHeight(true) - 25;
            var pos = $('#home-about-section').offset().top - headHeight;
            $('html, body').animate({
                scrollTop: pos
            }, 800);
        });
    });
</script>