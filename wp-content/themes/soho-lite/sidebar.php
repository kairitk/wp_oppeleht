<?php
/**
 * The sidebar containing the main widget area.
 *
 * @package Soho Lite
 */

if ( ! is_active_sidebar( 'sidebar-1' ) ) {
	return;
}
?>

<div id="leftbar">
	<?php dynamic_sidebar( 'sidebar-1' ); ?>
</div>