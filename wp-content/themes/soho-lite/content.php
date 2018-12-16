<?php
/**
 * The template for displaying posts on index view
 *
 * @package Soho Lite
 */
?>

<div <?php post_class(); ?>>
  <?php the_post_thumbnail('blogthumb'); ?>
  <div class="entry">
    <h2 class="entry-title" id="post-<?php the_ID(); ?>"><a href="<?php the_permalink() ?>" rel="bookmark">
      <?php the_title(); ?>
      </a></h2>
    <div class="postdate"> <?php echo get_the_date(); ?> </div>
    <?php the_excerpt(); ?>
  </div>
</div>
