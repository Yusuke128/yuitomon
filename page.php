<?php get_header(); ?>
<main class="page">
  <?php while (have_posts()): the_post();
    the_content();
  endwhile; ?>
</main><!-- .page end-->
<?php get_footer(); ?>