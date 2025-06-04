<?php

/**
 * Twenty Seventeen functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 */

/**
 * Twenty Seventeen only works in WordPress 4.7 or later.
 */
if (version_compare($GLOBALS['wp_version'], '4.7-alpha', '<')) {
	require get_template_directory() . '/inc/back-compat.php';
	return;
}
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function twentyseventeen_setup()
{
	/*
	 * Make theme available for translation.
	 * Translations can be filed at WordPress.org. See: https://translate.wordpress.org/projects/wp-themes/twentyseventeen
	 * If you're building a theme based on Twenty Seventeen, use a find and replace
	 * to change 'twentyseventeen' to the name of your theme in all the template files.
	 */
	load_theme_textdomain('twentyseventeen');

	// Add default posts and comments RSS feed links to head.
	add_theme_support('automatic-feed-links');

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support('title-tag');

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support('post-thumbnails');

	add_image_size('twentyseventeen-featured-image', 2000, 1200, true);

	add_image_size('twentyseventeen-thumbnail-avatar', 100, 100, true);

	// Set the default content width.
	$GLOBALS['content_width'] = 525;

	// This theme uses wp_nav_menu() in two locations.
	register_nav_menus(array(
		'main-menu'    => __('Main Menu', 'twentyseventeen'),
		'footer-menu1'    => __('Footer Menu 1', 'twentyseventeen'),
		'footer-menu2'    => __('Footer Menu 2', 'twentyseventeen'),
	));

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support('html5', array(
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	));

	/*
	 * Enable support for Post Formats.
	 *
	 * See: https://codex.wordpress.org/Post_Formats
	 */
	add_theme_support('post-formats', array(
		'aside',
		'image',
		'video',
		'quote',
		'link',
		'gallery',
		'audio',
	));

	// Add theme support for Custom Logo.
	add_theme_support('custom-logo', array(
		'width'       => 250,
		'height'      => 250,
		'flex-width'  => true,
	));

	// Add theme support for selective refresh for widgets.
	add_theme_support('customize-selective-refresh-widgets');

	/*
	 * This theme styles the visual editor to resemble the theme style,
	 * specifically font, colors, and column width.
 	 */
	add_editor_style(array('assets/css/editor-style.css', twentyseventeen_fonts_url()));

	// Define and register starter content to showcase the theme on new sites.
	$starter_content = array(
		'widgets' => array(
			// Place three core-defined widgets in the sidebar area.
			'sidebar-1' => array(
				'text_business_info',
				'search',
				'text_about',
			),

			// Add the core-defined business info widget to the footer 1 area.
			'sidebar-2' => array(
				'text_business_info',
			),

			// Put two core-defined widgets in the footer 2 area.
			'sidebar-3' => array(
				'text_about',
				'search',
			),
		),

		// Specify the core-defined pages to create and add custom thumbnails to some of them.
		'posts' => array(
			'home',
			'about' => array(
				'thumbnail' => '{{image-sandwich}}',
			),
			'contact' => array(
				'thumbnail' => '{{image-espresso}}',
			),
			'blog' => array(
				'thumbnail' => '{{image-coffee}}',
			),
			'homepage-section' => array(
				'thumbnail' => '{{image-espresso}}',
			),
		),

		// Create the custom image attachments used as post thumbnails for pages.
		'attachments' => array(
			'image-espresso' => array(
				'post_title' => _x('Espresso', 'Theme starter content', 'twentyseventeen'),
				'file' => 'assets/images/espresso.jpg', // URL relative to the template directory.
			),
			'image-sandwich' => array(
				'post_title' => _x('Sandwich', 'Theme starter content', 'twentyseventeen'),
				'file' => 'assets/images/sandwich.jpg',
			),
			'image-coffee' => array(
				'post_title' => _x('Coffee', 'Theme starter content', 'twentyseventeen'),
				'file' => 'assets/images/coffee.jpg',
			),
		),

		// Default to a static front page and assign the front and posts pages.
		'options' => array(
			'show_on_front' => 'page',
			'page_on_front' => '{{home}}',
			'page_for_posts' => '{{blog}}',
		),

		// Set the front page section theme mods to the IDs of the core-registered pages.
		'theme_mods' => array(
			'panel_1' => '{{homepage-section}}',
			'panel_2' => '{{about}}',
			'panel_3' => '{{blog}}',
			'panel_4' => '{{contact}}',
		),

		// Set up nav menus for each of the two areas registered in the theme.
		'nav_menus' => array(
			// Assign a menu to the "top" location.
			'top' => array(
				'name' => __('Top Menu', 'twentyseventeen'),
				'items' => array(
					'link_home', // Note that the core "home" page is actually a link in case a static front page is not used.
					'page_about',
					'page_blog',
					'page_contact',
				),
			),

			// Assign a menu to the "social" location.
			'social' => array(
				'name' => __('Social Links Menu', 'twentyseventeen'),
				'items' => array(
					'link_yelp',
					'link_facebook',
					'link_twitter',
					'link_instagram',
					'link_email',
				),
			),
		),
	);

	/**
	 * Filters Twenty Seventeen array of starter content.
	 *
	 * @since Twenty Seventeen 1.1
	 *
	 * @param array $starter_content Array of starter content.
	 */
	$starter_content = apply_filters('twentyseventeen_starter_content', $starter_content);

	add_theme_support('starter-content', $starter_content);
}
add_action('after_setup_theme', 'twentyseventeen_setup');

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function twentyseventeen_content_width()
{

	$content_width = $GLOBALS['content_width'];

	// Get layout.
	$page_layout = get_theme_mod('page_layout');

	// Check if layout is one column.
	if ('one-column' === $page_layout) {
		if (twentyseventeen_is_frontpage()) {
			$content_width = 644;
		} elseif (is_page()) {
			$content_width = 740;
		}
	}

	// Check if is single post and there is no sidebar.
	if (is_single() && !is_active_sidebar('sidebar-1')) {
		$content_width = 740;
	}

	/**
	 * Filter Twenty Seventeen content width of the theme.
	 *
	 * @since Twenty Seventeen 1.0
	 *
	 * @param int $content_width Content width in pixels.
	 */
	$GLOBALS['content_width'] = apply_filters('twentyseventeen_content_width', $content_width);
}
add_action('template_redirect', 'twentyseventeen_content_width', 0);

/**
 * Register custom fonts.
 */
function twentyseventeen_fonts_url()
{
	$fonts_url = '';

	/*
	 * Translators: If there are characters in your language that are not
	 * supported by Libre Franklin, translate this to 'off'. Do not translate
	 * into your own language.
	 */
	$libre_franklin = _x('on', 'Libre Franklin font: on or off', 'twentyseventeen');

	if ('off' !== $libre_franklin) {
		$font_families = array();

		$font_families[] = 'Libre Franklin:300,300i,400,400i,600,600i,800,800i';

		$query_args = array(
			'family' => urlencode(implode('|', $font_families)),
			'subset' => urlencode('latin,latin-ext'),
		);

		$fonts_url = add_query_arg($query_args, 'https://fonts.googleapis.com/css');
	}

	return esc_url_raw($fonts_url);
}

/**
 * Add preconnect for Google Fonts.
 *
 * @since Twenty Seventeen 1.0
 *
 * @param array  $urls           URLs to print for resource hints.
 * @param string $relation_type  The relation type the URLs are printed.
 * @return array $urls           URLs to print for resource hints.
 */
function twentyseventeen_resource_hints($urls, $relation_type)
{
	if (wp_style_is('twentyseventeen-fonts', 'queue') && 'preconnect' === $relation_type) {
		$urls[] = array(
			'href' => 'https://fonts.gstatic.com',
			'crossorigin',
		);
	}

	return $urls;
}
add_filter('wp_resource_hints', 'twentyseventeen_resource_hints', 10, 2);

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function twentyseventeen_widgets_init()
{
	register_sidebar(array(
		'name'          => __('Blog Sidebar', 'pathway'),
		'id'            => 'sidebar-1',
		'description'   => __('Add widgets here to appear in your sidebar on blog posts and archive pages.', 'twentyseventeen'),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	));
}
add_action('widgets_init', 'twentyseventeen_widgets_init');

/**
 * Replaces "[...]" (appended to automatically generated excerpts) with ... and
 * a 'Continue reading' link.
 *
 * @since Twenty Seventeen 1.0
 *
 * @param string $link Link to single post/page.
 * @return string 'Continue reading' link prepended with an ellipsis.
 */



function custom_excerpt_length($length)
{
	return 24;
}
add_filter('excerpt_length', 'custom_excerpt_length', 999);

function new_excerpt_more($more)
{
	global $post;
	return '...';
}
add_filter('excerpt_more', 'new_excerpt_more');

/**
 * Handles JavaScript detection.
 *
 * Adds a `js` class to the root `<html>` element when JavaScript is detected.
 *
 * @since Twenty Seventeen 1.0
 */
function twentyseventeen_javascript_detection()
{
	echo "<script>(function(html){html.className = html.className.replace(/\bno-js\b/,'js')})(document.documentElement);</script>\n";
}
add_action('wp_head', 'twentyseventeen_javascript_detection', 0);

/**
 * Add a pingback url auto-discovery header for singularly identifiable articles.
 */
function twentyseventeen_pingback_header()
{
	if (is_singular() && pings_open()) {
		printf('<link rel="pingback" href="%s">' . "\n", get_bloginfo('pingback_url'));
	}
}
add_action('wp_head', 'twentyseventeen_pingback_header');

/**
 * Display custom color CSS.
 */
function twentyseventeen_colors_css_wrap()
{
	if ('custom' !== get_theme_mod('colorscheme') && !is_customize_preview()) {
		return;
	}

	require_once(get_parent_theme_file_path('/inc/color-patterns.php'));
	$hue = absint(get_theme_mod('colorscheme_hue', 250));
?>
	<style type="text/css" id="custom-theme-colors" <?php if (is_customize_preview()) {
														echo 'data-hue="' . $hue . '"';
													} ?>>
		<?php echo twentyseventeen_custom_colors_css();
		?>
	</style>
<?php }
add_action('wp_head', 'twentyseventeen_colors_css_wrap');

/**
 * Enqueue scripts and styles.
 */
function twentyseventeen_scripts()
{

	// Theme stylesheet.
	wp_enqueue_style('theme-style', get_theme_file_uri('/assets/css/style.css'), array(), filemtime(get_stylesheet_directory() . '/assets/css/style.css'));
	wp_enqueue_script('custom', get_theme_file_uri('/assets/js/app.js'), array('jquery'), filemtime(get_stylesheet_directory() . '/assets/js/app.js'), false);

	if (has_nav_menu('top-menu')) {
		wp_enqueue_script('twentyseventeen-navigation', get_theme_file_uri('/assets/js/navigation.js'), array('jquery'), '1.0', true);
		$twentyseventeen_l10n['expand']   = __('Expand child menu', 'twentyseventeen');
		$twentyseventeen_l10n['collapse'] = __('Collapse child menu', 'twentyseventeen');
		$twentyseventeen_l10n['icon']     = '';
	}
	wp_localize_script('twentyseventeen-skip-link-focus-fix', 'twentyseventeenScreenReaderText', array(@$twentyseventeen_l10n));
}
add_action('wp_enqueue_scripts', 'twentyseventeen_scripts');



/**
 * Add custom image sizes attribute to enhance responsive image functionality
 * for content images.
 *
 * @since Twenty Seventeen 1.0
 *
 * @param string $sizes A source size value for use in a 'sizes' attribute.
 * @param array  $size  Image size. Accepts an array of width and height
 *                      values in pixels (in that order).
 * @return string A source size value for use in a content image 'sizes' attribute.
 */
function twentyseventeen_content_image_sizes_attr($sizes, $size)
{
	$width = $size[0];

	if (740 <= $width) {
		$sizes = '(max-width: 706px) 89vw, (max-width: 767px) 82vw, 740px';
	}

	if (is_active_sidebar('sidebar-1') || is_archive() || is_search() || is_home() || is_page()) {
		if (!(is_page() && 'one-column' === get_theme_mod('page_options')) && 767 <= $width) {
			$sizes = '(max-width: 767px) 89vw, (max-width: 1000px) 54vw, (max-width: 1071px) 543px, 580px';
		}
	}

	return $sizes;
}
add_filter('wp_calculate_image_sizes', 'twentyseventeen_content_image_sizes_attr', 10, 2);

/**
 * Filter the `sizes` value in the header image markup.
 *
 * @since Twenty Seventeen 1.0
 *
 * @param string $html   The HTML image tag markup being filtered.
 * @param object $header The custom header object returned by 'get_custom_header()'.
 * @param array  $attr   Array of the attributes for the image tag.
 * @return string The filtered header image HTML.
 */
function twentyseventeen_header_image_tag($html, $header, $attr)
{
	if (isset($attr['sizes'])) {
		$html = str_replace($attr['sizes'], '100vw', $html);
	}
	return $html;
}
add_filter('get_header_image_tag', 'twentyseventeen_header_image_tag', 10, 3);

/**
 * Use front-page.php when Front page displays is set to a static page.
 *
 * @since Twenty Seventeen 1.0
 *
 * @param string $template front-page.php.
 *
 * @return string The template to be used: blank if is_home() is true (defaults to index.php), else $template.
 */
function twentyseventeen_front_page_template($template)
{
	return is_home() ? '' : $template;
}
add_filter('frontpage_template',  'twentyseventeen_front_page_template');

/**
 * Modifies tag cloud widget arguments to display all tags in the same font size
 * and use list format for better accessibility.
 *
 * @since Twenty Seventeen 1.4
 *
 * @param array $args Arguments for tag cloud widget.
 * @return array The filtered arguments for tag cloud widget.
 */
function twentyseventeen_widget_tag_cloud_args($args)
{
	$args['largest']  = 1;
	$args['smallest'] = 1;
	$args['unit']     = 'em';
	$args['format']   = 'list';

	return $args;
}
add_filter('widget_tag_cloud_args', 'twentyseventeen_widget_tag_cloud_args');

/**
 * Implement the Custom Header feature.
 */
require get_parent_theme_file_path('/inc/custom-header.php');

/**
 * Custom template tags for this theme.
 */
require get_parent_theme_file_path('/inc/template-tags.php');

/**
 * Additional features to allow styling of the templates.
 */
require get_parent_theme_file_path('/inc/template-functions.php');

/**
 * Customizer additions.
 */
require get_parent_theme_file_path('/inc/customizer.php');

/**
 * Populate Excerpts Admin Page.
 */
require get_parent_theme_file_path('/inc/populate-excerpts.php');

/**
 * Implement Category custom Wlaker.
 */
require get_parent_theme_file_path('/inc/class-custom-cat-walker.php');

/********************************************************************/

if (function_exists('acf_add_options_page')) {

	acf_add_options_page(array(
		'page_title' 	=> 'Theme General Settings',
		'menu_title'	=> 'Theme Settings',
		'menu_slug' 	=> 'theme-general-settings',
		'capability'	=> 'edit_posts',
		'redirect'		=> true
	));

	acf_add_options_sub_page(array(
		'page_title' 	=> 'Header Settings',
		'menu_title'	=> 'Header Settings',
		'parent_slug'	=> 'theme-general-settings',
	));
	acf_add_options_sub_page(array(
		'page_title' 	=> 'Footer Settings',
		'menu_title'	=> 'Footer Settings',
		'parent_slug'	=> 'theme-general-settings',
	));
	acf_add_options_sub_page(array(
		'page_title' 	=> '404 Page Settings',
		'menu_title'	=> '404 Page Settings',
		'parent_slug'	=> 'theme-general-settings',
	));
	acf_add_options_sub_page(array(
		'page_title' 	=> 'Career Settings',
		'menu_title'	=> 'Career Settings',
		'parent_slug'	=> 'theme-general-settings',
	));
}

add_filter('big_image_size_threshold', '__return_false');

// Add Shortcode
function pb_custom_shortcode()
{
	return get_the_title();
}
add_shortcode('career-title', 'pb_custom_shortcode');


// Service: custom post type

function capability_post_type() {
	$supports = array(
		'title', 
		'author',
		'comments',
		'revisions',
		'page-attributes', 
	);
	$labels = array(
		'name' => _x('Services', 'plural'),
		'singular_name' => _x('Service', 'singular'),
		'menu_name' => _x('Services', 'admin menu'),
		'name_admin_bar' => _x('Services', 'admin bar'),
		'add_new' => _x('Add New', 'add new'),
		'add_new_item' => __('Add New Service'),
		'new_item' => __('New Service'),
		'edit_item' => __('Edit Service'),
		'view_item' => __('View Service'),
		'all_items' => __('All Services'),
		'search_items' => __('Search Service'),
		'not_found' => __('No Service found.'),
	);
	$args = array(
		'supports' => $supports,
		'labels' => $labels,
		'public' => true,
		'query_var' => true,
		'rewrite' => array('slug' => 'service'),
		'has_archive' => false,
		'hierarchical' => true,
	);
	register_post_type('capability', $args);
}
add_action('init', 'capability_post_type');

// Career: custom post type

function career_post_type() {
	$supports = array(
		'title', 
		'editor',
		'author',
		'comments',
		'revisions',
		'page-attributes', 
	);
	$labels = array(
		'name' => _x('Careers', 'plural'),
		'singular_name' => _x('Career', 'singular'),
		'menu_name' => _x('Careers', 'admin menu'),
		'name_admin_bar' => _x('Careers', 'admin bar'),
		'add_new' => _x('Add New', 'add new'),
		'add_new_item' => __('Add New Career'),
		'new_item' => __('New Career'),
		'edit_item' => __('Edit Career'),
		'view_item' => __('View Career'),
		'all_items' => __('All Careers'),
		'search_items' => __('Search Career'),
		'not_found' => __('No Career found.'),
	);
	$args = array(
		'supports' => $supports,
		'labels' => $labels,
		'public' => true,
		'query_var' => true,
		'rewrite' => array('slug' => 'careers'),
		'has_archive' => false,
		'hierarchical' => true,
	);
	register_post_type('career', $args);
}
add_action('init', 'career_post_type');


// Industry Verticals: custom post type

function industry_post_type() {
	$supports = array(
		'title', 
		'editor',
		'author',
		'comments',
		'revisions',
		'page-attributes', 
	);
	$labels = array(
		'name' => _x('Industry Verticals', 'plural'),
		'singular_name' => _x('Industry Vertical', 'singular'),
		'menu_name' => _x('Industry Verticals', 'admin menu'),
		'name_admin_bar' => _x('Industry Verticals', 'admin bar'),
		'add_new' => _x('Add New', 'add new'),
		'add_new_item' => __('Add New Industry Vertical'),
		'new_item' => __('New Industry Vertical'),
		'edit_item' => __('Edit Industry Vertical'),
		'view_item' => __('View Industry Vertical'),
		'all_items' => __('All Industry Verticals'),
		'search_items' => __('Search Industry Vertical'),
		'not_found' => __('No Industry Vertical found.'),
	);
	$args = array(
		'supports' => $supports,
		'labels' => $labels,
		'public' => true,
		'query_var' => true,
		'rewrite' => array('slug' => 'industry-verticals'),
		'has_archive' => false,
		'hierarchical' => true,
	);
	register_post_type('industry-verticals', $args);
}
add_action('init', 'industry_post_type');

// Team Member: custom post type

function team_post_type() {
	$supports = array(
		'title', 
		'editor',
		'author',
		'comments',
		'revisions',
		'page-attributes', 
	);
	$labels = array(
		'name' => _x('Team Members', 'plural'),
		'singular_name' => _x('Team Member', 'singular'),
		'menu_name' => _x('Team Members', 'admin menu'),
		'name_admin_bar' => _x('Team Members', 'admin bar'),
		'add_new' => _x('Add New', 'add new'),
		'add_new_item' => __('Add New Team Member'),
		'new_item' => __('New Team Member'),
		'edit_item' => __('Edit Team Member'),
		'view_item' => __('View Team Member'),
		'all_items' => __('All Team Members'),
		'search_items' => __('Search Team Member'),
		'not_found' => __('No Industry Team Member found.'),
	);
	$args = array(
		'supports' => $supports,
		'labels' => $labels,
		'public' => true,
		'query_var' => true,
		'rewrite' => array('slug' => 'team'),
		'has_archive' => false,
		'hierarchical' => true,
	);
	register_post_type('team-member', $args);
}
add_action('init', 'team_post_type');


function location_custom_taxonomies() {
  
  register_taxonomy('locations', 'career', array(
	'hierarchical' => true,
	'labels' => array(
      'name' => _x( 'Locations', 'taxonomy general name' ),
      'singular_name' => _x( 'Location', 'taxonomy singular name' ),
      'search_items' =>  __( 'Search Locations' ),
      'all_items' => __( 'All Locations' ),
      'parent_item' => __( 'Parent Location' ),
      'parent_item_colon' => __( 'Parent Location:' ),
      'edit_item' => __( 'Edit Location' ),
      'update_item' => __( 'Update Location' ),
      'add_new_item' => __( 'Add New Location' ),
      'new_item_name' => __( 'New Location Name' ),
      'menu_name' => __( 'Locations' ),
    ),
    'rewrite' => array(
      'slug' => 'locations',
      'with_front' => false,
      'hierarchical' => true
    ),
  ));
}
add_action( 'init', 'location_custom_taxonomies', 0 );

/**
 * Adds custom rewrite rules for the "posts" post type.
 * Prefixes URL with "insights".
 *
 * @return void
 */
function insights_custom_rewrite_rules() {
    add_rewrite_rule( 'insights/([^/]+)/?$', 'index.php?post_type=post&name=$matches[1]', 'top' );
    add_rewrite_rule( 'insights/([^/]+)/page/([0-9]+)/?$', 'index.php?post_type=post&name=$matches[1]&paged=$matches[2]', 'top' );
}
add_action( 'init', 'insights_custom_rewrite_rules' );

/**
 * Changes the post link to use "insights" prefix.
 *
 * @param string $permalink The original post link.
 * @param WP_Post $post The post object.
 * @param string $leavename The leavename.
 * @return string The modified post link.
 */
function insights_change_post_link( $permalink, $post, $leavename ) {
	if ( get_post_type( $post ) == 'post' ) {     
		return "/insights" . $permalink;   
	}   
	
	return $permalink; 
}
add_filter( 'pre_post_link', 'insights_change_post_link', 10, 3 );

/**
 * Redirects the current post to the 'insights' URL if its accessed by original URL.
 *
 * @return void
 */
function insights_post_redirect() {
    global $post;

    if ( is_singular( 'post' ) && !is_admin() ) {
        $current_url = $_SERVER['REQUEST_URI'];
        $new_url = home_url( '/insights/' . $post->post_name );

        if ( strpos( $current_url, '/insights/' ) === false ) {
            wp_redirect( $new_url, 301 );
            exit;
        }
    }
}
add_action( 'template_redirect', 'insights_post_redirect' );


/**
 * Modifies the category link based on the parent category.
 *
 * @param string $category_link The original category link.
 * @param int    $category_id   The ID of the category.
 * @return string The modified category link.
 */
function custom_category_link( string $category_link, int $category_id ): string {
    $category = get_category( $category_id );

    if ( $category->parent > 0 ) {
        $parent_category = get_category( $category->parent );

        if ( 'authors' === $parent_category->slug ) {
            $new_category_link = get_page_url_by_title( $category->name, 'team-member' );

			if ( $new_category_link ) {
				return $new_category_link;
			}
        }
    }

    return $category_link;
}
add_filter('category_link', 'custom_category_link', 10, 2);


/**
 * Get the page URL based on its title and post type using WP_Query.
 *
 * @param string $page_title The title of the page.
 * @param string $post_type The post type of the page.
 * @return string|false The URL of the page or false if not found.
 */
function get_page_url_by_title( $page_title, $post_type ) {
    $page_query = new WP_Query( array(
        'post_type'      => $post_type,
        'posts_per_page' => 1,
        'title'          => $page_title,
    ) );

    if ( $page_query->have_posts() ) {
        $page_query->the_post();
        $page_url = get_permalink();
        wp_reset_postdata();
        return $page_url;
    }

    return false;
}


function handle_insights_authors_updates( $post_id ) {
	$post = get_post( $post_id );
	if ( ! in_array( $post->post_type, [ 'team-member', 'post' ], true ) ) {
		return;
	}

	if ( 'post' === $post->post_type ) {
		$authors = get_field( 'blog_team_section_team', $post_id );
		if ( empty( $authors ) ) {
			return;
		}

		$author_names =[];
		foreach ( $authors as $author ) {
			$author_post = get_post( $author );
			$author_names[] = $author_post->post_title;
		}
		update_authors( $post_id, $author_names );
		update_authors( $post_id, $author_names );
		update_authors( $post_id, $author_names );
		update_authors( $post_id, $author_names );
		update_authors( $post_id, $author_names );
	}

	if ( 'team-member' === $post->post_type ) {
		$related_insights = get_field( 'related_insights', $post_id );
		if ( empty( $related_insights ) ) {
			return;
		}

		update_related_posts( $post->post_title, $related_insights );
	}
}
add_action( 'acf/save_post', 'handle_insights_authors_updates', 15 );

function update_related_posts( $author, $posts ) {
	if ( empty( $posts ) ) {
		return;
	}

	$posts = array_column( $posts, 'ID' );

	$author_term_id = get_term_by( 'name', $author, 'category' )->term_id;
	if ( empty( $author_term_id ) ) {
		$authors_cat_id = get_term_by('name', 'Authors', 'category')->term_id;
		$new_term = wp_insert_term(
			$author,
			'category',
			array(
				'parent' => $authors_cat_id,
			)
		);

		if ( ! is_wp_error( $new_term ) ) {
			$author_term_id = $new_term['term_id'];
		}
	}

	if ( empty( $author_term_id ) ) {
		return;
	}

	$saved_posts = get_posts( [
		'post_type' => 'post',
		'posts_per_page' => -1,
		'category' => $author_term_id
	] );

	$posts_to_set = array_diff( $posts, array_column( $saved_posts, 'ID' ) );
	$posts_to_unset = array_diff( array_column( $saved_posts, 'ID' ), $posts );

	foreach ( $posts_to_unset as $post_id ) {
		wp_remove_object_terms( $post_id, $author_term_id, 'category' );
	}

	foreach ( $posts_to_set as $post_id ) {
		wp_set_post_terms( $post_id, $author_term_id, 'category', true );
	}
}

function update_authors( $post_id, $authors = [] ) {
	$authors_cat_id = get_term_by('name', 'Authors', 'category')->term_id;
	if ( empty( $authors_cat_id ) ) {
		return;
	}

	$post_terms = array_filter( get_the_terms( $post_id, 'category' ), function( $term ) use ( $authors_cat_id ) {
		return $term->parent === $authors_cat_id;
	} );
	$saved_authors = array_combine( array_column( $post_terms, 'term_id' ), array_column( $post_terms, 'name' ) );

	$authors_to_unset = array_intersect( $saved_authors, array_diff( array_values( $saved_authors ), $authors ) );
	$authors_to_set = array_diff( $authors, array_values( $saved_authors ) );

	foreach ( array_keys( $authors_to_unset ) as $term_id ) {
		wp_remove_object_terms( $post_id, $term_id, 'category' );
	}

	foreach ( $authors_to_set as $author ) {
		$term_id = get_term_by('name', $author, 'category')->term_id;
		if ( empty( $term_id ) ) {	
			$new_term = wp_insert_term(
				$author,
				'category',
				array(
					'parent' => $authors_cat_id,
				)
			);

			if ( ! is_wp_error( $new_term ) ) {
				$term_id = $new_term['term_id'];
			}
		}
		wp_set_post_terms( $post_id, $term_id, 'category', true );
	}
}
