<?php
/**
 *
 * @package Soho Lite
 */

/**
 * Setup the WordPress core custom header feature.
 */
function soho_custom_header_setup() {
	add_theme_support( 'custom-header', apply_filters( 'soho_custom_header_args', array(
		'width'         => 2000,
		'height'        => 700,
		'uploads'       => true,
		'default-text-color'     => '303030',
		'wp-head-callback'       => 'soho_header_style',
	) ) );
}
add_action( 'after_setup_theme', 'soho_custom_header_setup' );

if ( ! function_exists( 'soho_header_style' ) ) :
        function soho_header_style() {
                wp_enqueue_style( 'soho-style', get_stylesheet_uri() );
                $header_text_color = get_header_textcolor();
                $position = "absolute";
                $clip ="rect(1px, 1px, 1px, 1px)";
                if ( ! display_header_text() ) {
                        $custom_css = '.site-title, .site-description {
                                position: '.$position.';
                                clip: '.$clip.'; 
                        }';
                } else{

                        $custom_css = 'h1.site-title, h2.site-description  {
                                color: #' . $header_text_color . ';                     
                        }';
                }
                wp_add_inline_style( 'soho-style', $custom_css );
        }
        add_action( 'wp_enqueue_scripts', 'soho_header_style' );

endif;