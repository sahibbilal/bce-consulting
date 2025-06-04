<?php get_header(); ?>

<section class="cmn-cms-page">
	<div class="container">
        <div class="row">
            <div class="col-xl-10 wow custom-fadeInUp">
                <h1 class="entry-title"><?php echo get_the_title(); ?></h1>
                <div class="entry-content text-20">
                    <?php the_content() ?>
                </div>
            </div>
        </div>
	</div>
</section>

<?php get_footer(); ?>
<script>
    document.body.classList.add("dark-header");
</script>