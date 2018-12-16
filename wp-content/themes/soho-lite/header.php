<?php
/**
 * The Header for our theme.
 *
 *
 * @package Soho Lite
 */
?>
<!DOCTYPE html>
<html class="no-js" <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale = 1.0, maximum-scale=2.0, user-scalable=yes" />
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

	<?php if(has_post_thumbnail()) : ?>
			<div id="maximage"><?php the_post_thumbnail('slideimage') ; ?></div>
	<?php endif; ?>

    <?php if ( has_nav_menu( 'main-menu' ) || has_nav_menu( 'secondary-menu' ) || has_nav_menu( 'social' ) || is_active_sidebar( 'sidebar-1' ) ) : ?>
		<span class="menu-button toggle-menu menu-top"></span>
	<?php endif ?>

	<div class="cbp-spmenu cbp-spmenu-horizontal cbp-spmenu-top">

		<?php if ( has_nav_menu( 'main-menu' ) ) {
    		wp_nav_menu(
				array(
					'theme_location' => 'main-menu', 
					'container_id'   => 'mainmenu',
					'menu_class' 	 => 'mainnav',
					'fallback_cb'	 => false
					)
			);
  		} ?>
  
  		<?php if ( has_nav_menu( 'secondary-menu' ) ) {
    		wp_nav_menu( 
				array( 
					'theme_location' => 'secondary-menu', 
					'container_id'   => 'secondarymenu',
					'menu_class' 	 => 'mainnav',
					'fallback_cb'	 => false
					)
			);
  		} ?>


		<?php if ( has_nav_menu( 'social' ) ) {
			wp_nav_menu(
				array(
					'theme_location'  => 'social',
					'container'       => 'div',
					'container_id'    => 'menu-social',
					'container_class' => 'menu',
					'menu_id'         => 'menu-social-items',
					'menu_class'      => 'menu-items',
					'depth'           => 1,
					'link_before'     => '<span class="screen-reader-text">',
					'link_after'      => '</span>',
					'fallback_cb'     => '',
					)
				);
		} ?>

	</div>
    
    <div id="container">
		<div id="wrapper">
			<div id="header">
  				<div id="headerin">
    				<div id="logo">
                    	<?php the_custom_logo(); ?>
        				<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
        					<h1 class="site-title">
          						<?php bloginfo( 'name' ); ?>
        					</h1>
        				</a>
                        
                        <h2 class="site-description">
          					<?php bloginfo( 'description' ); ?>
        				</h2>
    				</div>

					<?php if ( has_nav_menu( 'main-menu' ) ) {
    					wp_nav_menu( 
						array( 
							'theme_location' => 'main-menu', 
							'container_id'   => 'mainmenu',
							'menu_class' 	 => 'mainnav',
							'fallback_cb'	 => false
						) 
					);
  					} ?>

					<?php if ( has_nav_menu( 'secondary-menu' ) ) {
    				wp_nav_menu( 
						array( 
							'theme_location' => 'secondary-menu', 
							'container_id'   => 'secondarymenu',
							'menu_class' 	 => 'mainnav',
							'fallback_cb'	 => false
						) 
					);
  					} ?>
					
					<?php get_sidebar(); ?>
					
					<?php if ( has_nav_menu( 'social' ) ) {
					wp_nav_menu(
						array(
							'theme_location'  => 'social',
							'container'       => 'div',
							'container_id'    => 'menu-social',
							'container_class' => 'menu',
							'menu_id'         => 'menu-social-items',
							'menu_class'      => 'menu-items',
							'depth'           => 1,
							'link_before'     => '<span class="screen-reader-text">',
							'link_after'      => '</span>',
							'fallback_cb'     => '',
						)
					);
					} ?>
  			</div>
		</div>