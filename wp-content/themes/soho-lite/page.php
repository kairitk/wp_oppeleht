<?php
/**
 * The template for displaying all pages.
 *
 * @package Soho Lite
 */

get_header(); ?>

<div class="contentwrapper">
  <button class="collapse"><span class="genericon genericon-previous"></span></button>
  <div id="content">
    <div id="contentinner">
      <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
      <div class="post" id="post-<?php the_ID(); ?>">
        <h1 class="entry-title">
          <?php the_title(); ?>
        </h1>
        <div class="entry">
          <?php the_content(); ?>
          <?php wp_link_pages(array('before' => '<p><strong>'. esc_html__( 'Pages:', 'soho-lite' ) .'</strong> ', 'after' => '</p>', 'next_or_number' => 'number')); ?>
          <?php comments_template(); ?>
        </div>
      </div>
      <?php endwhile; endif; ?>
    </div>
  </div>
</div>
<?php get_footer(); ?>
