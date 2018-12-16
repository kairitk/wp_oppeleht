<?php
/**
 * soho functions and definitions
 *
 * @package Soho Lite
 */
function soho_setup() {
	global $content_width;
if ( ! isset( $content_width ) ){
      $content_width = 1000;
}
	load_theme_textdomain( 'soho-lite', get_template_directory() . '/languages' );
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'title-tag' );
	add_theme_support( 'custom-logo');
	add_theme_support( 'customize-selective-refresh-widgets' );
	register_nav_menus( array(
			'main-menu' => esc_html__( 'Primary Menu', 'soho-lite' ),
			'secondary-menu' => esc_html__( 'Secondary Menu', 'soho-lite' ),
			'social' 			=> esc_html__( 'Social', 'soho-lite' )
		) );
	add_theme_support( 'custom-background', array(
		'default-color' => 'eaeaea',
	) );
	add_theme_support( 'post-thumbnails' );
	add_image_size('blogthumb', 900, 400, true);
	add_image_size('slideimage', 2000, 1000, true);
}
add_action( 'after_setup_theme', 'soho_setup' );

/**
 * Register widget area.
 *
 */
function soho_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'soho-lite' ),
		'id'            => 'sidebar-1',
		'description'   => '',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'soho_widgets_init' );

/**
 * Register Open Sans Google fonts for Soho.
 *
 * @return string
 */
function soho_open_sans_font_url() {
	$open_sans_font_url = '';

	/* translators: If there are characters in your language that are not supported
	 * by Open Sans, translate this to 'off'. Do not translate into your own language.
	 */
	if ( 'off' !== _x( 'on', 'Open Sans font: on or off', 'soho-lite' ) ) {
		$subsets = 'latin,latin-ext';

		/* translators: To add an additional Open Sans character subset specific to your language,
		 * translate this to 'greek', 'cyrillic' or 'vietnamese'. Do not translate into your own language.
		 */
		$subset = _x( 'no-subset', 'Open Sans font: add new subset (greek, cyrillic, vietnamese)', 'soho-lite' );

		if ( 'cyrillic' == $subset ) {
			$subsets .= ',cyrillic,cyrillic-ext';
		} elseif ( 'greek' == $subset ) {
			$subsets .= ',greek,greek-ext';
		} elseif ( 'vietnamese' == $subset ) {
			$subsets .= ',vietnamese';
		}

		$query_args = array(
			'family' => urlencode( 'Open Sans:300,400,600,700,800' ),
			'subset' => urlencode( $subsets ),
		);

		$open_sans_font_url = add_query_arg( $query_args, 'https://fonts.googleapis.com/css' );
	}

	return $open_sans_font_url;
}

function soho_scripts_styles() {
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) )
		wp_enqueue_script( 'comment-reply' );

if (!is_admin()) {
wp_enqueue_script( 'soho-menu', get_template_directory_uri() . '/js/tendina.js', array( 'jquery' ), '', true );
wp_enqueue_script( 'soho-jquery-cycle', get_template_directory_uri() . '/js/jquery.cycle.all.js', array( 'jquery' ), '', true );
wp_enqueue_script( 'soho-max-image', get_template_directory_uri() . '/js/jquery.maximage.js', array( 'jquery' ), '', true );
if (!wp_is_mobile()){
wp_enqueue_script( 'soho-scrollbar', get_template_directory_uri() . '/js/scrollbar.js', array( 'jquery' ), '', true );
}
wp_enqueue_script( 'soho-responsive-videos', get_template_directory_uri() . '/js/responsive-videos.js', array( 'jquery' ), '', true );
wp_enqueue_script( 'soho-custom-scripts', get_template_directory_uri() . '/js/customscripts.js', array( 'jquery' ), '', true );
wp_enqueue_style( 'soho-open-sans', soho_open_sans_font_url(), array(), null ); 
wp_enqueue_style( 'genericons', get_template_directory_uri() . '/genericons/genericons.css', array(), '3.0.3' );
wp_enqueue_style( 'soho-style', get_stylesheet_uri());
}
}
add_action( 'wp_enqueue_scripts', 'soho_scripts_styles' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';