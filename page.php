<?php get_header();
$is_account = function_exists('is_account_page') && is_account_page();
?>
<?php
echo woocommerce_breadcrumb();
?>
<main class="<?php echo get_post_field('post_name', get_post()); ?>-page <?php echo $is_account ? '' : 'container section-margin section-padding bg-white'; ?>">

  <?php if (!$is_account) : ?>
    <section class="title-box">
      <h1 class="title-main"><?php the_title(); ?></h1>
      <!-- .title-main end-->
      <p class="title-sub-title"></p>
      <!-- .title-sub-title end-->
    </section>
    <!-- .title-box end-->
  <?php endif; ?>

  <?php while (have_posts()): the_post();
    the_content();
  endwhile; ?>
</main><!-- end-->
<?php
get_sidebar();
get_footer(); ?>