<?php
/**
 * The template for displaying 404 pages (Not Found).
 *
 * @package Soho Lite
 */

get_header(); ?>

<div class="contentwrapper">
  <button class="collapse"><span class="genericon genericon-previous"></span></button>
  <div id="content">
    <div id="contentinner">
      <h1 class="entry-title">
        <?php esc_html_e( 'Oops! That page can&rsquo;t be found', 'soho-lite' ); ?>
      </h1>
      <?php get_search_form(); ?>
    </div>
  </div>
</div>
<?php get_footer(); ?>
