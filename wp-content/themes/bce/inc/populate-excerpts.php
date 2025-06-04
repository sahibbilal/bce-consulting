<?php 
// Create custom menu page to 
function add_my_custom_menu() {
    add_menu_page(
        'Populate Blog Excerpts',
        'Populate Blog Excerpts',
        'manage_options',
        'populate-excerpts',
        'populate_excerpts_admin_page'
    );
}
add_action('admin_menu', 'add_my_custom_menu');

function populate_excerpts_admin_page() {
    ?>
    <div class="wrap">
        <h2>Populate Blog Excerpts</h2>
		<p>This function will loop through all posts of the 'Post' type and populate their excerpt fields with content from the custom ACF field 'blog_about_content'.<br> It will only populate posts that currently have an empty excerpt field.</p>
        <form method="post">
            <input type="hidden" name="populate_excerpts" value="1">
            <input type="submit" value="Populate Now" class="button button-primary">
        </form>
    </div>
    <?php
}

function handle_populate_excerpts() {
    if (isset($_POST['populate_excerpts']) && current_user_can('manage_options')) {
        populate_excerpts_from_blog_about_content();
        add_action('admin_notices', 'populate_excerpts_admin_notice');
    }
}
add_action('admin_init', 'handle_populate_excerpts');

function populate_excerpts_admin_notice() {
    ?>
    <div class="notice notice-success is-dismissible">
        <p><?php _e('Excerpts have been populated successfully!', 'my-text-domain'); ?></p>
    </div>
    <?php
}

// Function to loop through all posts and generate post content based on ACF field
function populate_excerpts_from_blog_about_content() {	
    // Query arguments
    $args = array(
        'post_type'      => 'post',
        'posts_per_page' => -1, // set to -1 to get all posts
        'post_status'    => 'publish', // only get published posts
    );

    // Create a new WP_Query
    $query = new WP_Query($args);
	
    // Loop through the posts
    if ($query->have_posts()) {
        while ($query->have_posts()) {
            $query->the_post();
			global $post;

            // Get post ID
            $post_id = get_the_ID();
		
            // Only proceed if the post doesn't already have an excerpt
            if ('' == $post->post_excerpt) {
                // Get ACF field
                $blog_about_content = get_field('blog_about_content', $post_id);

                // Generate excerpt (limit to 160 words)
                $excerpt = wp_trim_words($blog_about_content, 120, '...');
				
                // Update post excerpt
                wp_update_post(array(
                    'ID'           => $post_id,
                    'post_excerpt' => $excerpt,
                ));
            }
        }
		
        // Reset post data
        wp_reset_postdata();
    }

}
