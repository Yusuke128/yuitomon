<?php get_header(); ?>
<main class="<?php echo get_post_field('post_name', get_post()); ?>-page">
  <?php while (have_posts()): the_post();
    the_content();
  endwhile; ?>
</main><!-- end-->
<?php
get_sidebar();
get_footer(); ?>