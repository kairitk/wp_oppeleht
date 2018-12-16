<?php
/**
 * The template for displaying Archive pages.
 *
 *
 * @package Soho Lite
 */

get_header(); ?>

<div class="contentwrapper">
  <button class="collapse"><span class="genericon genericon-previous"></span></button>
  <div id="content">
    <div id="contentinner">
      <?php
						the_archive_title( '<h1 class="entry-title">', '</h1>' );
						the_archive_description( '<div class="taxonomy-description">', '</div>' );
					?>
      <?php if (have_posts()) : ?>
      <?php while (have_posts()) : the_post(); ?>
      <?php get_template_part( 'content', get_post_format() ); ?>
      <?php endwhile; ?>
      <?php the_posts_pagination(); ?>
      <?php else : ?>
      <h2 class="center">
        <?php esc_html_e( 'Not Found', 'soho-lite' ); ?>
      </h2>
      <?php endif; ?>
    </div>
  </div>
</div>
<?php get_footer(); ?>
