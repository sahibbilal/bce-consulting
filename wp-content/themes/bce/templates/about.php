<?php
/* 
Template Name: About 
*/
get_header(); ?>
<?php if( get_field('about_banner_section') && ( get_field('about_banner_section_image') || get_field('about_banner_section_title') || get_field('about_banner_section_header') ) ){ ?>
<section class="cmn-inner-hero divImg" style="background-image: url('<?php echo get_field('about_banner_section_image')['url']; ?>');">
    <div class="container">
        <div class="row">
            <div class="col-lg-10 col-xl-8 wow custom-fadeInUp">
                <?php if(get_field('about_banner_section_title')){ ?>
                <span class="h6"><?php echo get_field('about_banner_section_title'); ?></span>
                <?php } ?>
                <?php if(get_field('about_banner_section_header')){ ?>
                <h1><?php echo get_field('about_banner_section_header'); ?></h1>
                <?php } ?>
            </div>
        </div>
    </div>
</section>
<?php } ?>
<?php if( get_field('about_us_section') && ( get_field('about_us_section_video_placeholder_image') || get_field('about_us_section_video_url') || get_field('about_us_section_description') ) ){ ?>
<section class="about-bce-section">
    <div class="container">
        <div class="row justify-content-between align-items-center">
            <?php if( get_field('about_us_section_video_placeholder_image') ){ ?>
            <div class="col-lg-8 wow custom-fadeInUp">
                <a href="#" class="about-video" data-src="<?php echo get_field('about_us_section_video_url'); ?>" data-bs-toggle="modal" data-bs-target="#videoPopup">
                    <span class="d-block video-thumb">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/0.gif"  style="background-image: url('<?php echo get_field('about_us_section_video_placeholder_image')['url']; ?>');" width="862" height="485" alt="<?php echo get_field('about_us_section_video_placeholder_image')['alt']; ?>" class="divImg"/>
                    </span>
                    <?php if( get_field('about_us_section_video_url') ) : ?>
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/Play-Button.svg" width="88" height="88" alt="play button" class="play-btn svg"/>
                    <?php endif; ?>
                </a>
            </div>
            <?php } ?>
            <?php if(get_field('about_us_section_description')){ ?>
            <div class="col-lg-4 wow custom-fadeInUp">
                <?php echo get_field('about_us_section_description'); ?>
            </div>
            <?php } ?>
        </div>
    </div>
</section>
<?php } ?>
<?php if(!empty(get_field('about_counter_section'))){ ?>
<section class="counter-section">
    <div class="container">
        <div class="row mx-0 text-center justify-content-center align-items-center">
            <?php foreach (get_field('about_counter_section') as $counter) {
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
<?php if( !empty(get_field('about_careers_section')) || (get_field('about_capabilities_section') && (get_field('about_capabilities_section_image') || get_field('about_capabilities_section_header') || !empty(get_field('about_capabilities_section_capabilities')) || get_field('about_capabilities_section_link_url') || get_field('about_capabilities_section_link_text'))) || (get_field('about_industries_section') && ( get_field('about_industries_section_image') || get_field('about_industries_section_header') || !empty(get_field('about_industries_section_industries')) || get_field('about_industries_section_link_url') || get_field('about_industries_section_link_text')))){ ?>
<section class="about-cmn-left-right-section">
    <div class="container cmn-left-right-section">
        <?php foreach (get_field('about_careers_section') as $careers) {
            if($careers['image'] || $careers['header'] || $careers['short_description'] || $careers['link_url'] || $careers['link_text']){ 
        ?>
        <div class="row">
            <?php if($careers['image']){ ?>
            <div class="col-lg-5 align-self-center">
                <div class="cmn-block-img wow custom-fadeInUp">
                    <img src="<?php echo $careers['image']['url']; ?>" width="636" height="500" alt="<?php echo $careers['image']['alt']; ?>" class="img-fluid" />
                </div>
            </div>
            <?php } ?>
            <?php if($careers['header'] || $careers['short_description'] || $careers['link_url'] || $careers['link_text']){ ?>
            <div class="col-lg-1 wow custom-fadeInUp">
                <div class="middle-border"></div>
            </div>
            <div class="col-lg-6 wow custom-fadeInUp align-self-center">
                <?php if($careers['header']){ ?>
                <h2><?php echo $careers['header']; ?></h2>
                <?php } ?>
                <?php if($careers['short_description']){ ?>
                <?php echo $careers['short_description']; ?>
                <?php } ?>
                <?php if($careers['link_url'] || $careers['link_text']){ ?>
                <a href="<?php echo $careers['link_url']; ?>" class="btn btn-link"><?php echo $careers['link_text']; ?></a>
                <?php } ?>
            </div>
            <?php } ?>
        </div>
        <?php } } ?>
        <?php if( get_field('about_capabilities_section') && ( get_field('about_capabilities_section_image') || get_field('about_capabilities_section_header') || !empty(get_field('about_capabilities_section_capabilities')) || get_field('about_capabilities_section_link_url') || get_field('about_capabilities_section_link_text') ) ){ ?>
        <div class="row">
            <?php if(get_field('about_capabilities_section_image')){ ?>
            <div class="col-lg-5 align-self-center">
                <div class="cmn-block-img wow custom-fadeInUp">
                    <img src="<?php echo get_field('about_capabilities_section_image')['url']; ?>" width="522" height="560" alt="<?php echo get_field('about_capabilities_section_image')['alt']; ?>" class="img-fluid" />
                </div>
            </div>
            <?php } ?>
            <?php if(get_field('about_capabilities_section_header') || !empty(get_field('about_capabilities_section_capabilities')) || get_field('about_capabilities_section_link_url') || get_field('about_capabilities_section_link_text')){ ?>
            <div class="col-lg-1 wow custom-fadeInUp">
                <div class="middle-border"></div>
            </div>
            <div class="col-lg-6 wow custom-fadeInUp align-self-center">
                <?php if(get_field('about_capabilities_section_header')){ ?>
                <h3><?php echo get_field('about_capabilities_section_header'); ?></h3>
                <?php } ?>
                <?php if(!empty(get_field('about_capabilities_section_capabilities'))){ ?>
                <div class="tag-group">
                    <?php foreach (get_field('about_capabilities_section_capabilities') as $capabilities) {
                        if(get_post_status($capabilities) == 'publish'){
                    ?>
                    <a href="<?php echo get_permalink($capabilities); ?>" class="badge"><?php echo get_the_title($capabilities); ?></a>
                    <?php } } ?>
                </div>
                <?php } ?>
                <?php if(get_field('about_capabilities_section_link_url') || get_field('about_capabilities_section_link_text')){ ?>
                <a href="<?php echo get_field('about_capabilities_section_link_url'); ?>" class="btn btn-link text-20"><?php echo get_field('about_capabilities_section_link_text'); ?></a>
                <?php } ?>
            </div>
            <?php } ?>
        </div>
        <?php } ?>
        <?php if(get_field('about_industries_section') && ( get_field('about_industries_section_image') || get_field('about_industries_section_header') || !empty(get_field('about_industries_section_industries')) || get_field('about_industries_section_link_url') || get_field('about_industries_section_link_text') ) ){ ?>
        <div class="row">
            <?php if(get_field('about_industries_section_image')){ ?>
            <div class="col-lg-5 align-self-center">
                <div class="cmn-block-img wow custom-fadeInUp">
                    <img src="<?php echo get_field('about_industries_section_image')['url']; ?>" width="522" height="560" alt="<?php echo get_field('about_industries_section_image')['alt']; ?>" class="img-fluid" />
                </div>
            </div>
            <?php } ?>
            <?php if(get_field('about_industries_section_header') || !empty(get_field('about_industries_section_industries')) || get_field('about_industries_section_link_url') || get_field('about_industries_section_link_text')){ ?>
            <div class="col-lg-1 wow custom-fadeInUp">
                <div class="middle-border"></div>
            </div>
            <div class="col-lg-6 wow custom-fadeInUp align-self-center">
                <?php if(get_field('about_industries_section_header')){ ?>
                <h3><?php echo get_field('about_industries_section_header'); ?></h3>
                <?php } ?>
                <?php if(!empty(get_field('about_industries_section_industries'))){ ?>
                <div class="tag-group">
                    <?php foreach (get_field('about_industries_section_industries') as $industries) {
                        if(get_post_status($industries) == 'publish'){
                    ?>
                    <a href="<?php echo get_permalink($industries); ?>" class="badge"><?php echo get_the_title($industries); ?></a>
                    <?php } } ?>
                </div>
                <?php } ?>
                <?php if(get_field('about_industries_section_link_url') || get_field('about_industries_section_link_text')){ ?>
                <a href="<?php echo get_field('about_industries_section_link_url'); ?>" class="btn btn-link text-20"><?php echo get_field('about_industries_section_link_text'); ?></a>
                <?php } ?>
            </div>
            <?php } ?>
        </div>
        <?php } ?>
    </div>
</section>
<?php } ?>
<?php if(get_field('about_us_section') && get_field('about_us_section_video_url')){ ?>
<div class="modal fade" id="videoPopup" tabindex="-1" aria-labelledby="videoPopupLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content border-0">
            <div class="modal-body p-0">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/close.svg" alt="close" class="img-fluid svg" />
                </button>
                <!-- 16:9 aspect ratio -->
                <div class="ratio ratio-16x9">
                    <iframe src="" id="video" allowscriptaccess="always" allow="autoplay"></iframe>
                </div>
            </div>
        </div>
    </div>
</div>
<?php } ?>
<?php get_template_part( 'template-parts/custom/footer', 'cta' ); ?>
<?php get_footer(); ?>
<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/assets/js/counter.js"></script>
<script>
    /*** Video ***/
    var $bsVideoSrc;
    $('.about-video').click(function () {
        $bsVideoSrc = $(this).data("src");
    });

    $('#videoPopup').on('shown.bs.modal', function (e) {
        $("#videoPopup #video").attr('src', $bsVideoSrc + "?autoplay=1&amp;modestbranding=1&amp;showinfo=0");
    });
    $('#videoPopup').on('hide.bs.modal', function (e) {
        $("#videoPopup #video").attr('src', $bsVideoSrc);
    })
</script>