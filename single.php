<?php get_header(); ?>
<?php
echo woocommerce_breadcrumb();
?>
<main class="container section-padding section-margin bg-white bd bd-navy radius <?php echo get_post_field('post_name', get_post()); ?>-page">
  <?php while (have_posts()): the_post();
    the_content();
  endwhile; ?>
</main><!-- end-->
<?php
get_sidebar();
get_footer(); ?>