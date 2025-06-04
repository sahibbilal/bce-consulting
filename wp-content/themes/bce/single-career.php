<?php get_header(); ?>

<section class="careers-detail">
    <div class="container">
        <div class="row">
            <div class="col-xl-10 job-title wow custom-fadeInUp">
                <span class="h6">Careers</span>
                <h1><?php echo get_the_title(); ?></h1>
            </div>
            <?php if (get_the_content() != '') { ?>
                <div class="col-lg-8 col-xl-7 job-desc wow custom-fadeInUp">
                    <?php the_content(); ?>
                </div>
            <?php } ?>
            <?php if (get_field('career_apply_to_job', 'option')) { ?>
                <div class="col-lg-4 ms-auto apply-link wow custom-fadeInUp">
                    <?php echo do_shortcode(get_field('career_apply_to_job', 'option')); ?>
                </div>
            <?php } ?>
        </div>
    </div>
</section>
<?php get_template_part('template-parts/custom/footer', 'cta'); ?>
<?php get_footer(); ?>

<script>
    document.body.classList.add("dark-header");
    $(".career-menu").addClass("mega-current_page_item");
</script>