<?php
/**
 * The template for displaying Search Results pages.
 *
 * @package Soho Lite
 */

get_header(); ?>

<div class="contentwrapper">
  <button class="collapse"><span class="genericon genericon-previous"></span></button>
  <div id="content">
    <div id="contentinner">
      <h1 class="entry-title"><?php printf( esc_html__( 'Search Results for: %s', 'soho-lite' ), '<span>' . get_search_query() . '</span>' ); ?></h1>
      <?php if (have_posts()) : ?>
      <?php while (have_posts()) : the_post(); ?>
      <?php get_template_part( 'content', get_post_format() ); ?>
      <?php endwhile; ?>
      <?php the_posts_pagination(); ?>
      <?php else : ?>
      <h2 class="center">
        <?php esc_html_e( 'No Post Found', 'soho-lite' ); ?>
      </h2>
      <?php get_search_form(); ?>
      <?php endif; ?>
    </div>
  </div>
</div>
<?php get_footer(); ?>
