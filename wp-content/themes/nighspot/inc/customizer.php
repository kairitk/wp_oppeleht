<?php
/**
 * Nighspot Theme Customizer
 *
 * @package Nighspot
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function nightspot_customize_register( $wp_customize ) {
	
function nightspot_sanitize_checkbox( $checked ) {
	// Boolean check.
	return ( ( isset( $checked ) && true == $checked ) ? true : false );
}
	
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
		
	$wp_customize->add_setting('color_scheme', array(
		'default' => '#ff0078',
		'sanitize_callback'	=> 'sanitize_hex_color',
	));
	
	$wp_customize->add_control(
		new WP_Customize_Color_Control($wp_customize,'color_scheme',array(
			'label' => __('Color Scheme','nightspot'),
			'description'	=> __('Select color from here.','nightspot'),
			'section' => 'colors',
			'settings' => 'color_scheme'
		))
	);

	
	$wp_customize->add_setting('headerbg-color', array(
		'default' => '#000000',
		'sanitize_callback'	=> 'sanitize_hex_color',
	));
	
	$wp_customize->add_control(
		new WP_Customize_Color_Control($wp_customize,'headerbg-color',array(
			'description'	=> __('Select background color for header.','nightspot'),
			'section' => 'colors',
			'settings' => 'headerbg-color'
		))
	);
	
	$wp_customize->add_setting('topbar-color', array(
		'default' => '#000000',
		'sanitize_callback'	=> 'sanitize_hex_color',
	));
	
	$wp_customize->add_control(
		new WP_Customize_Color_Control($wp_customize,'topbar-color',array(
			'description'	=> __('Select background color for topbar.','nightspot'),
			'section' => 'colors',
			'settings' => 'topbar-color'
		))
	);
	
	$wp_customize->add_setting('footer-color', array(
		'default' => '#2b2b2b',
		'sanitize_callback'	=> 'sanitize_hex_color',
	));
	
	$wp_customize->add_control(
		new WP_Customize_Color_Control($wp_customize,'footer-color',array(
			'description'	=> __('Select background color for footer.','nightspot'),
			'section' => 'colors',
			'settings' => 'footer-color'
		))
	);
	
	
	// Slider Section Start		
	$wp_customize->add_section(
        'slider_section',
        array(
            'title' => __('Slider Settings', 'nightspot'),
            'priority' => null,
			'description'	=> __('Recommended image size (1420x567). Slider will work only when you select the static front page.','nightspot'),	
        )
    );
	
	$wp_customize->add_setting('page-setting7',array(
			'default' => '0',
			'capability' => 'edit_theme_options',
			'sanitize_callback'	=> 'absint'
	));
	
	$wp_customize->add_control('page-setting7',array(
			'type'	=> 'dropdown-pages',
			'label'	=> __('Select page for slide one:','nightspot'),
			'section'	=> 'slider_section'
	));	
	
	$wp_customize->add_setting('page-setting8',array(
			'default' => '0',
			'capability' => 'edit_theme_options',	
			'sanitize_callback'	=> 'absint'
	));
	
	$wp_customize->add_control('page-setting8',array(
			'type'	=> 'dropdown-pages',
			'label'	=> __('Select page for slide two:','nightspot'),
			'section'	=> 'slider_section'
	));	
	
	$wp_customize->add_setting('page-setting9',array(
			'default' => '0',
			'capability' => 'edit_theme_options',	
			'sanitize_callback'	=> 'absint'
	));
	
	$wp_customize->add_control('page-setting9',array(
			'type'	=> 'dropdown-pages',
			'label'	=> __('Select page for slide three:','nightspot'),
			'section'	=> 'slider_section'
	));
	
	$wp_customize->add_setting('hide_slider',array(
			'default' => true,
			'sanitize_callback' => 'nightspot_sanitize_checkbox',
			'capability' => 'edit_theme_options',
	));	 

	$wp_customize->add_control( 'hide_slider', array(
		   'settings' => 'hide_slider',
    	   'section'   => 'slider_section',
    	   'label'     => __('Check this to hide slider.','nightspot'),
    	   'type'      => 'checkbox'
     ));	
	
	// Slider Section End
	 
	 // Contact Section

	$wp_customize->add_section(
        'contact_section',
        array(
            'title' => __('Topbar', 'nightspot'),
            'priority' => null,
			'description'	=> __('Add your contact info here.','nightspot'),	
        )
    );
	
	$wp_customize->add_setting('phone-txt',array(
			'sanitize_callback'	=> 'sanitize_text_field'
	));
	
	$wp_customize->add_control('phone-txt',array(
			'type'	=> 'text',
			'label'	=> __('Add phone number here.','nightspot'),
			'section'	=> 'contact_section'
	));	
	
	$wp_customize->add_setting('hour-txt',array(
			'sanitize_callback'	=> 'sanitize_text_field'
	));
	
	$wp_customize->add_control('hour-txt',array(
			'type'	=> 'text',
			'label'	=> __('Add opening hours here.','nightspot'),
			'section'	=> 'contact_section'
	));
	
	
}
add_action( 'customize_register', 'nightspot_customize_register' );	

function nightspot_css(){
		?>
        <style>
				a, 
				.tm_client strong,
				.postmeta a:hover,
				#sidebar ul li a:hover,
				.blog-post h3.entry-title{
					color:<?php echo esc_attr(get_theme_mod('color_scheme','#ff0078')); ?>;
				}
				a.blog-more:hover,
				.nav-links .current, 
				.nav-links a:hover,
				#commentform input#submit,
				input.search-submit,
				.nivo-controlNav a.active,
				.blog-date .date,
				.section-box .sec-left a,
				#slider .top-bar .slide-button:hover,
				a.read-more:hover,
				#slider .top-bar .slide-button{
					background-color:<?php echo esc_attr(get_theme_mod('color_scheme','#ff0078')); ?>;
				}
				#header,
				.main-nav ul li:hover ul{
					background-color:<?php echo esc_attr(get_theme_mod('headerbg-color','#000000')); ?>;
				}
				#topbar{
					background-color: <?php echo esc_attr(get_theme_mod('topbar-color','#000000')); ?>;
				}
				.main-nav ul li.current_page_item a,
				.main-nav ul li a:hover{
					color:<?php echo esc_attr(get_theme_mod('color_scheme','#ff0078')); ?>;
				}
				.copyright-wrapper{
					background-color:<?php echo esc_attr(get_theme_mod('footer-color','#2b2b2b')); ?>;
				}
		</style>
	<?php }
add_action('wp_head','nightspot_css');

function nightspot_customize_preview_js() {
	wp_enqueue_script( 'nightspot-customize-preview', get_template_directory_uri() . '/js/customize-preview.js', array( 'customize-preview' ), '20141216', true );
}
add_action( 'customize_preview_init', 'nightspot_customize_preview_js' );