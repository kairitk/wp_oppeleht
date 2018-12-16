<?php
/**
 * The main template file.
 *
 *
 * @package Soho Lite
 */

get_header(); ?>

<div class="contentwrapper">
  <button class="collapse"><span class="genericon genericon-previous"></span></button>
  <div id="content">
    <div id="contentinner">
      <?php if (have_posts()) : ?>
      <?php while (have_posts()) : the_post(); ?>
      <?php get_template_part( 'content', get_post_format() ); ?>
      <?php endwhile; ?>
      <?php the_posts_pagination(); ?>
      <?php else : ?>
      <p class="center">
        <?php esc_html_e( 'You don&#39;t have any posts yet.', 'soho-lite' ); ?>
      </p>
      <?php endif; ?>
    </div>
  </div>
</div>
<?php get_footer(); ?>
