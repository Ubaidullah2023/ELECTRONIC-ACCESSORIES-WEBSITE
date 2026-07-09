<?php
/**
 * Template Name: Order Success
 */
if (!defined('ABSPATH')) exit;
get_header();
?>

<section class="section">
  <div class="card success-card">
    <h1>Thank you for your purchase!</h1>
    <p class="muted">Your order has been placed successfully.</p>
    <a class="btn btn-primary" href="<?php echo esc_url(home_url('/')); ?>">Continue Shopping</a>
  </div>
</section>

<?php get_footer(); ?>
