<?php get_header(); ?>

<section class="team-details">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 mb-lg-0 mb-5">
                <div class="employee-detail">
                    <?php if (get_field('team_member_profile_image')) { ?>
                        <img src="<?php echo get_field('team_member_profile_image')['url']; ?>" alt="<?php echo get_field('team_member_profile_image')['alt']; ?>" width="294" height="294" class="img-fluid" />
                    <?php } ?>
                    <h3><?php echo get_the_title(); ?></h3>
                    <?php if (get_field('team_member_role') || get_field('team_member_ocation')) { ?>
                        <span class="emp-designation"><?php if(get_field('team_member_role')){ echo get_field('team_member_role').', '; } ?> <?php if(get_field('team_member_ocation')){ echo get_field('team_member_ocation'); } ?></span>
                    <?php } ?>
                    <?php if (get_field('team_member_social_media_icons') && !empty(get_field('team_member_social_media_icons'))) { ?>
                        <div class="social-icon">
                            <?php
                            foreach (get_field('team_member_social_media_icons') as $socialMedia) { ?>
                                <a href="<?php echo $socialMedia['link']; ?>" target="_blank" rel="noopener" aria-label="<?php echo esc_attr($socialMedia['icon']['name']); ?>">
                                    <img src="<?php echo esc_url($socialMedia['icon']['url']); ?>" alt="<?php echo esc_attr($socialMedia['icon']['alt']); ?>" width="24" height="24" class="img-fluid svg"  role="presentation" />
                                </a>
                            <?php } ?>
                        </div>
                    <?php } ?>
                </div>
            </div>
            <div class="col-lg-9 col-xl-7 m-auto">
                <?php if (get_the_content() != '') { ?>
                    <div class="employee-blog text-22">
                        <?php the_content(); ?>
                    </div>
                <?php } ?>
                <?php if ((get_field('team_member_expertise') && (get_field('team_member_expertise_title') || get_field('team_member_expertise_expertise'))) || (get_field('team_member_education') && (get_field('team_member_education_title') || get_field('team_member_education_education')))) { ?>
                    <div class="accordion emp-acc-detail" id="empAccDetail">
                        <?php if (get_field('team_member_expertise') && (get_field('team_member_expertise_title') || get_field('team_member_expertise_expertise'))) { ?>
                            <div class="accordion-item">
                                <div class="accordion-header" id="headingOne">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne"><?php echo get_field('team_member_expertise_title'); ?></button>
                                </div>
                                <?php if (!empty(get_field('team_member_expertise_expertise'))) { ?>
                                    <div id="collapseOne" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#empAccDetail">
                                        <div class="accordion-body">
                                            <ul>
                                                <?php foreach (get_field('team_member_expertise_expertise') as $expertise) { ?>

                                                    <li><?php echo $expertise['add_expertise']; ?></li>
                                                <?php } ?>
                                            </ul>
                                        </div>
                                    </div>
                                <?php } ?>
                            </div>
                        <?php } ?>
                        <?php if (get_field('team_member_education') && (get_field('team_member_education_title') || get_field('team_member_education_education'))) { ?>
                            <div class="accordion-item">
                                <div class="accordion-header" id="headingTwo">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo"><?php echo get_field('team_member_education_title'); ?></button>
                                </div>
                                <?php if (!empty(get_field('team_member_education_education'))) { ?>
                                    <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#empAccDetail">
                                        <div class="accordion-body">
                                            <ul>
                                                <?php foreach (get_field('team_member_education_education') as $education) { ?>

                                                    <li><?php echo $education['add_education']; ?></li>
                                                <?php } ?>
                                            </ul>
                                        </div>
                                    </div>
                                <?php } ?>
                            </div>
                        <?php } ?>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
</section>

<?php 
$ri_insights = get_field( 'related_insights' );

if ( ! empty( $ri_insights ) ) :
    ?>
    <section class="cmn-case-insight-slider">
        <div class="container">
            <?php 
            $ri_title = get_field('related_insights_title');
            if ( empty( $ri_title ) ) {
                $legacy = get_field('team_member_related_insights_title');
                $ri_title = ( ! empty( $legacy ) ) ? $legacy : 'Related Insights';
            }

            $ri_cta = get_field( 'related_insights_cta' );
            if ( empty( $ri_cta ) ) {
                $legacy = get_field( 'team_member_related_insights_cta_title' );
                $ri_cta = ( ! empty( $legacy ) ) ? $legacy : 'View Insights';
            }

            $ri_cta_link = get_field( 'related_insights_cta_link' );
            if ( empty( $ri_cta_link ) ) {
                $legacy = get_field( 'team_member_related_insights_cta_link' );
                $ri_cta_link = ( ! empty( $legacy ) ) ? $legacy : '';
            }
            
            if ( ! empty( $ri_title ) ) { ?>
                <h3><?php echo esc_html( $ri_title ); ?></h3>
            <?php } ?>
            <div class="insight-studie-slider">
                <?php 
                foreach($ri_insights as $insight ) :
                    ?>
                    <div class="box-items">
                        <div class="item-content">
                            <span class="post-date"><?php echo get_the_date('', $insight ); ?></span>
                            <h4 class="h5"><a href="<?php echo get_the_permalink( $insight ); ?>" class="stretched-link"><?php echo get_the_title( $insight ); ?></a></h4>
                        </div>
                        <?php if( get_field( 'blog_featured_image', $insight ) ){ ?>
                            <div class="item-img">
                                <img class="divImg" alt="<?php echo get_field( 'blog_featured_image', $insight )['alt']; ?>" width="294" height="248" src="<?php echo get_template_directory_uri(); ?>/assets/images/0.gif" style="background-image: url('<?php echo get_field( 'blog_featured_image', $insight )['url']; ?>');" role="presentation" >
                            </div>
                        <?php } ?>
                    </div>
                    <?php 
                endforeach;
                ?>
            </div>
            <?php if ( ! empty( $ri_cta ) && ! empty( $ri_cta_link ) ) : ?>
            <div class="slider-footer d-flex align-items-center">
                <div class="slider-nav"></div>
                <a href="<?php echo esc_url( $ri_cta_link ); ?>" class="btn btn-link ms-auto"><?php echo esc_html( $ri_cta ); ?></a>
            </div>
            <?php endif; ?>
        </div>
    </section>
    <?php 
endif; 
?>
<?php get_template_part('template-parts/custom/footer', 'cta'); ?>
<?php get_footer(); ?>
<script>
    $(".about-menu").addClass("mega-current_page_item");
    $(".about-team").addClass("current-menu-item");
    $(document).ready(function() {
        $('.insight-studie-slider').slick({
            infinite: false,
            slidesToShow: 2,
            slidesToScroll: 2,
            arrows: true,
            dots: false,
            speed: 500,
            autoplay: false,
            autoplaySpeed: 1000,
            appendArrows: '.slider-nav',
            responsive: [{
                breakpoint: 992,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1,
                }
            }]
        });
    });

    document.body.classList.add("dark-header");
</script>