<!--Location Start: <?php echo __DIR__.'/'. basename(__FILE__); ?>-->
<?php if( get_field('footer_cta', 'options') && ( get_field('footer_cta_image', 'options') || get_field('footer_cta_header', 'options') || get_field('footer_cta_button_link_url', 'options') || get_field('footer_cta_button_link_text', 'options') || get_field('footer_cta_link_url', 'options') || get_field('footer_cta_link_text', 'options') || !empty(get_field('footer_cta_locations', 'options')) ) ){ ?>
<section class="cta-section">
    <?php if(get_field('footer_cta_image', 'options')){ ?>
    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/0.gif" style="background-image: url('<?php echo get_field('footer_cta_image', 'options')['url']; ?>')" width="1920" height="876" alt="<?php echo get_field('footer_cta_image', 'options')['alt']; ?>" class="img-fluid cta-banner divImg d-none d-md-block" />
    <img src="<?php echo get_field('footer_cta_image', 'options')['url']; ?>" width="1920" height="876" alt="<?php echo get_field('footer_cta_image', 'options')['alt']; ?>" class="img-fluid cta-banner d-md-none" />
    <?php } ?>
    <?php if(get_field('footer_cta_header', 'options') || get_field('footer_cta_button_link_url', 'options') || get_field('footer_cta_button_link_text', 'options') || get_field('footer_cta_link_url', 'options') || get_field('footer_cta_link_text', 'options') || !empty(get_field('footer_cta_locations', 'options'))){ ?>
    <div class="container">
        <div class="row mx-0">
            <?php if(!empty(get_field('footer_cta_locations', 'options'))){ ?>
            <div class="col-md-6 px-0 wow custom-fadeInUp">
                <div class="h-100 cta-left">
                    <ul class="m-0 list-unstyled">
                        <?php foreach (get_field('footer_cta_locations', 'options') as $locations) {if($locations['location'] || $locations['address']){ 
                        ?>
                        <li>
                            <?php if($locations['location']){ ?>
                            <span class="title d-block mb-1"><?php echo $locations['location']; ?></span>
                            <?php } ?>
                            <?php if($locations['address']){ ?>
                            <span class="text-18 d-block"><?php echo $locations['address']; ?></span>
                            <?php } ?>
                        </li>
                        <?php } } ?>
                    </ul>
                </div>
            </div>
            <?php } ?>
            <?php if(get_field('footer_cta_header', 'options') || get_field('footer_cta_button_link_url', 'options') || get_field('footer_cta_button_link_text', 'options') || get_field('footer_cta_link_url', 'options') || get_field('footer_cta_link_text', 'options')){ ?>
            <div class="col-md-6 px-0 wow custom-fadeInUp">
                <div class="h-100 cta-right">
                    <?php if(get_field('footer_cta_header', 'options')){ ?>
                    <h2 class="h1"><?php echo get_field('footer_cta_header', 'options'); ?></h2>
                    <?php } ?>
                    <?php if(get_field('footer_cta_button_link_url', 'options') || get_field('footer_cta_button_link_text', 'options')){ ?>
                    <a href="<?php echo get_field('footer_cta_button_link_url', 'options'); ?>" class="btn btn-white"><?php echo get_field('footer_cta_button_link_text', 'options'); ?></a>
                    <?php } ?>
                    <?php if(get_field('footer_cta_link_url', 'options') || get_field('footer_cta_link_text', 'options')){ ?>
                    <span class="d-block d-sm-inline-block">
                        <a href="<?php echo get_field('footer_cta_link_url', 'options'); ?>" class="btn btn-link-white text-18"><?php echo get_field('footer_cta_link_text', 'options'); ?></a>
                    </span>
                    <?php } ?>
                </div>
            </div>
            <?php } ?>
        </div>
    </div>
    <?php } ?>
</section>
<?php } ?>
<!--Location End: <?php echo __DIR__.'/'. basename(__FILE__); ?>-->