<?php
/**
 * The Template for displaying all single posts.
 *
 * @package Soho Lite
 */

get_header(); ?>

<div class="contentwrapper">
  <button class="collapse"><span class="genericon genericon-previous"></span></button>
  <div id="content">
    <div id="contentinner">
      <?php while ( have_posts() ) : the_post(); ?>
      <div <?php post_class(); ?>>
        <h1 class="entry-title">
          <?php the_title(); ?>
        </h1>
        <div class="postdate"> <?php echo get_the_date(); ?> </div>
        <div class="entry">
          <?php the_content(); ?>
          <?php echo get_the_tag_list('<p class="singletags">',' ','</p>'); ?>
          <?php wp_link_pages(array('before' => '<p><strong>'. esc_html__( 'Pages:', 'soho-lite' ) .'</strong> ', 'after' => '</p>', 'next_or_number' => 'number')); ?>
          <?php the_post_navigation(); ?>
          <?php comments_template(); ?>
        </div>
      </div>
      <?php endwhile; // end of the loop. ?>
    </div>
  </div>
</div>
<?php get_footer(); ?>
