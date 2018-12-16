<?php
/**
 * The template for displaying the footer.
 *
 *
 * @package Soho Lite
 */
?>
</div>
</div>

<div class="site-info">
	&copy; <?php echo date_i18n(__('Y','soho-lite')); ?>
    <?php bloginfo('name'); ?>
    . <a href="<?php echo esc_url( esc_html__( 'http://wordpress.org/', 'soho-lite' ) ); ?>"> <?php printf( esc_html__( 'Powered by %s.', 'soho-lite' ), 'WordPress' ); ?> </a> <?php printf( esc_html__( 'Theme by %1$s.', 'soho-lite' ), '<a href="http://www.vivathemes.com/" rel="designer">Viva Themes</a>' ); ?>
</div>

<?php wp_footer(); ?>
</body>
</html>