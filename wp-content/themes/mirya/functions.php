<?php

if (!function_exists('mirya_setup')) {

	function mirya_setup()
	{

		// Enable support for Title Tag
		add_theme_support('title-tag');

		// Enable support for Post Thumbnails on posts and pages
		add_theme_support('post-thumbnails');

		// This theme uses wp_nav_menu() in one location
		register_nav_menus(array(
			'navigation-menu' => 'Navigation Menu',
		));

		// Enable support for custom logo
		add_theme_support('custom-logo', array(

			'width'        => 80,
			'height'       => 50,
			'flex-width'   => true,
			'flex-height'  => true

		));

		if (!isset($content_width)) {
			$content_width = 1200;
		}

		add_theme_support('automatic-feed-links');
	}
}

add_action('after_setup_theme', 'mirya_setup');

// Register Fonts
function mirya_fonts_url()
{
	$font_url = '';

	if ('off' !== _x('on', 'Google font: on or off', 'mirya')) {
		$font_url = add_query_arg('family', urlencode('Open Sans|Raleway:100,200,200i,300,300i,400,400i,500,600,600i,700,700i,800,800i,900,900i&display=swap'), "//fonts.googleapis.com/css");
	}

	return $font_url;
}

function mirya_scripts()
{
	// Bootstrap css
	wp_enqueue_style('bootstrapcss', get_template_directory_uri() . '/css/bootstrap.min.css');

	// FontAwesome css
	wp_enqueue_style('fontawesomecss', get_template_directory_uri() . '/css/font-awesome.css');
	wp_enqueue_style('fontscss', get_template_directory_uri() . '/css/fonts.css');

	// Magnific Popup Css
	wp_enqueue_style('magnificpopupcss', get_template_directory_uri() . '/css/magnific-popup.css');

	// Owl Carousel Css
	wp_enqueue_style('owlcarouselcss', get_template_directory_uri() . '/css/owl.carousel.min.css');

	// Main Style css
	wp_enqueue_style('homepages', get_template_directory_uri() . '/css/homepages.css');

	//Google Fonts
	wp_enqueue_style('miryafonts', mirya_fonts_url(), array(), '1.0.0');

	// Popper Js
	wp_enqueue_script('popperjs', get_template_directory_uri() . '/js/popper.min.js', array(), false, true);

	// Bootstrap Js
	wp_enqueue_script('bootstrapjs', get_template_directory_uri() . '/js/bootstrap.min.js', array('jquery'), false, true);

	// Typed Js
	wp_enqueue_script('typedjs', get_template_directory_uri() . '/js/typed.js');

	// Isotope Js
	wp_enqueue_script('isotopejs', get_template_directory_uri() . '/js/isotope.pkgd.min.js', array(), false, true);

	// Magnific Popup JS
	wp_enqueue_script('magnificpopupjs', get_template_directory_uri() . '/js/jquery.magnific-popup.js', array(), false, true);
	wp_enqueue_script('popupjs', get_template_directory_uri() . '/js/maginficpopup.js', array(), false, true);

	// Owl Carousel Js
	wp_enqueue_script('owlcarouseljs', get_template_directory_uri() . '/js/owl.carousel.min.js', array(), false, true);

	// Counter Js
	wp_enqueue_script('counter', get_template_directory_uri() . '/js/jquery.countTo.min.js', array(), false, true);

	// Main Js
	wp_enqueue_script('mainjs', get_template_directory_uri() . '/js/custom.js', array(), false, true);

	if (is_front_page() || is_page('about') || is_page('resume')) {
		// Progress Js
		wp_enqueue_script('progress', get_template_directory_uri() . '/js/progress.js', array(), false, true);
	}

	// Html5shiv Js
	wp_enqueue_script('html5shiv', get_template_directory_uri() . '/js/html5shiv.min.js');
	wp_script_add_data('html5shiv', 'conditional', 'lt IE 9');
	// Respond Js
	wp_enqueue_script('respond', get_template_directory_uri() . '/js/respond.min.js');
	wp_script_add_data('respond', 'conditional', 'lt IE 9');

	if (is_singular()) {
		wp_enqueue_script('comment-reply');
	}
}

add_action('wp_enqueue_scripts', 'mirya_scripts');

add_action('customize_preview_init', 'cd_customizer');
function cd_customizer()
{
	wp_enqueue_script(
		'cd_customizer',
		get_template_directory_uri() . '/js/customizer.js',
		array('jquery', 'customize-preview'),
		'',
		true
	);
}

function mirya_extend_excerpt_length($length)
{
	if (is_archive()) {
		return 20;
	}
	return 30;
}

add_filter('excerpt_length', 'mirya_extend_excerpt_length');


function mirya_excerpt_change_dots($more)
{
	return ' ...';
}

add_filter('excerpt_more', 'mirya_excerpt_change_dots');

// Register Sidebar
function mirya_sidebar()
{

	register_sidebar(array(

		'name'           => 'Blog Sidebar',
		'id'             => 'blog-sidebar',
		'description'   => esc_html__('Add widgets here.', 'mirya'),
		'class'          => '',
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h6 class="widget-title">',
		'after_title'   => '</h6>'

	));
}

add_action('widgets_init', 'mirya_sidebar');


function mirya_menu()
{

	wp_nav_menu(array(

		'theme_location' => 'navigation-menu',
		'menu_class'     => 'nav navbar-nav navbar-right',
		'container'      =>  false,
		'depth'          => 2,

	));
}

function numbering_pagination()
{

	global $wp_query;

	$all_pages = $wp_query->max_num_pages;

	$current_page = max(1, get_query_var('paged'));

	if ($all_pages > 1) {

		return paginate_links(array(

			'base'      => get_pagenum_link() . '%_%',
			'format'    => 'page/%#%',
			'current'   => $current_page,
			'mid_size'  => 3,
			'end_size'  => 1,
			'prev_text' => '<span class="fa fa-angle-left"></span>',
			'next_text' => '<span class="fa fa-angle-right"></span>'
		));
	}
}

// Remove attribute title
add_filter('the_author_posts_link', 'opt_remove_title_attr');
function opt_remove_title_attr($return)
{
	return preg_replace('` title="(.+)"`', '', $return);
}

require_once get_template_directory() . '/inc/class-tgm-plugin-activation.php';
require_once get_template_directory() . '/inc/required-plugins.php';
require_once get_template_directory() . '/inc/demo-import.php';


// Customize Appearance Options
function mirya_customize_register($wp_customize)
{

	// Footer Section

	$wp_customize->add_section(
		'wp_footer',
		array(
			'title' => __('Footer', 'mirya'),
			'priority' => 117
		)
	);

	$wp_customize->add_setting(
		'wp_footer_copyright',
		array(
			'default' => '',
			'sanitize_callback' => 'wp_kses_post',
			'transport' => 'postMessage',
		)
	);

	$wp_customize->add_control(
		'wp_footer_copyright_control',
		array(
			'label' => __('Copyright Text', 'mirya'),
			'section' => 'wp_footer',
			'settings' =>  'wp_footer_copyright',
			'priority' => 10,
			'type' => 'textarea',
		)
	);
}

add_action('customize_register', 'mirya_customize_register');

add_action('wp_enqueue_scripts', 'btn_wp');
function btn_wp()
{
	wp_enqueue_script(
		'btn-wp', // name your script so that you can attach other scripts and de-register, etc.
		get_template_directory_uri() . '/js/whatsapp.js', // this is the location of your script file
		array('jquery') // this array lists the scripts upon which your script depends
	);
}
