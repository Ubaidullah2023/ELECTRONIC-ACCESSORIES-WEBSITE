<?php
if (!defined('ABSPATH')) exit;

get_header();
?>

<?php if (have_posts()): ?>
  <?php while (have_posts()): the_post(); ?>
    <article <?php post_class('card'); ?>>
      <h1><?php the_title(); ?></h1>
      <div class="muted"><?php echo esc_html(get_the_date()); ?></div>
      <div style="margin-top:12px"><?php the_content(); ?></div>
    </article>
  <?php endwhile; ?>
<?php else: ?>
  <div class="card">
    <h1>Nothing found</h1>
    <p class="muted">Try searching for products or content.</p>
  </div>
<?php endif; ?>

<?php
get_footer();
?>

