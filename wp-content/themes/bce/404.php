<?php
get_header(); ?>
<section class="cmn-cms-page page-not-found">
    <div class="container cmn-left-right-section">
        <div class="row">
            <div class="col-lg-5 wow custom-fadeInUp align-self-center">
                <h1>Page Not Found</h1>
                <p>Sorry, the page you are looking for doesn't exist or has been moved. </p>
                <a href="<?php echo get_home_url(); ?>" class="btn btn-primary">Go to homepage</a>
            </div>
            <div class="col-lg-1 wow custom-fadeInUp">
                <div class="middle-border"></div>
            </div>
            <div class="col-lg-6 align-self-center">
                <div class="cmn-block-img wow custom-fadeInUp">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/0.gif" style="background-image: url('<?php echo get_template_directory_uri(); ?>/assets/images/image-404-hero.jpg')" width="636" height="480" alt="404 Banner" class="img-fluid divImg" />
                </div>
            </div>
        </div>
    </div>
</section>

<?php get_footer(); ?>
<script>
    document.body.classList.add("dark-header");
</script>