<?php
/**
 * Extra functions for this theme.
 *
 * @package Soho Lite
 */

/**
 * Get our wp_nav_menu() fallback, wp_page_menu(), to show a home link.
 *
 * @param array $args Configuration arguments.
 * @return array
 */
function soho_page_menu_args( $args ) {
	if ( ! isset( $args['show_home'] ) )
		$args['show_home'] = true;
	return $args;
}
add_filter( 'wp_page_menu_args', 'soho_page_menu_args' );

function soho_new_excerpt_length($length) {
	return 50;
}
add_filter('excerpt_length', 'soho_new_excerpt_length');

function soho_new_excerpt_more($more) {
	global $post;
	return '<div class="belowpost"><a class="btnmore icon-arrow" href="'.esc_url(get_permalink($post->ID)) . '"><span>'. esc_html__('Read More', 'soho-lite') .'</span></a></div>';
}
add_filter('excerpt_more', 'soho_new_excerpt_more');

/**
* Manages display of archive titles.
*/
function soho_get_the_archive_title( $title ) {
   if ( is_category() ) {
        $title = single_cat_title( '', false );
    } elseif ( is_tag() ) {
        $title = single_tag_title( '', false );
    } elseif ( is_author() ) {
        $title = '<span class="vcard">' . get_the_author() . '</span>';
    } elseif ( is_year() ) {
        $title = get_the_date( _x( 'Y', 'yearly archives date format','soho-lite' ) );
    } elseif ( is_month() ) {
        $title = get_the_date( _x( 'F Y', 'monthly archives date format','soho-lite' ) );
    } elseif ( is_day() ) {
        $title = get_the_date( _x( 'F j, Y', 'daily archives date format','soho-lite' ) );
    } elseif ( is_post_type_archive() ) {
        $title = post_type_archive_title( '', false );
    } elseif ( is_tax() ) {
        $title = single_term_title( '', false );
    } else {
        $title = esc_html__( 'Archives', 'soho-lite' );
    }
    return $title;
};
add_filter( 'get_the_archive_title', 'soho_get_the_archive_title', 10, 1 );

// display custom admin notice
function soho_admin_notice__success() {
    ?>
    <div class="notice notice-success is-dismissible">
        <p><?php esc_html_e( 'Thanks for installing Soho Lite! Want more features?','soho-lite'); ?> <a href="https://www.vivathemes.com/wordpress-theme/soho/" target="blank"><?php esc_html_e( 'Check out the Pro Version  &#8594;','soho-lite'); ?></a></p>
    </div>
    <?php
}
add_action( 'admin_notices', 'soho_admin_notice__success' );