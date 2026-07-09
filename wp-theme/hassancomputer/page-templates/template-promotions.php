<?php
/**
 * Template Name: Promotions
 */
if (!defined('ABSPATH')) exit;
get_header();
?>

<section class="page-head">
  <div>
    <div class="kicker">Limited time offers</div>
    <h1>Promotions</h1>
  </div>
  <div class="promo-hero" aria-label="Promotion banner">
    <div class="promo-copy">
      <div class="promo-date">Weekly deals</div>
      <div class="promo-title">Best prices on IT accessories</div>
      <div class="promo-sub">Stock changes daily</div>
    </div>
  </div>
</section>

<section class="section">
  <div class="card">
    <h2 class="h3">Hot deals &amp; bundle offers</h2>
    <p class="muted">Real discounts, bundles, and limited stock products updated regularly.</p>
    <div class="stack">
      <div class="promo-grid" data-promo-grid></div>
      <a class="btn btn-primary" href="<?php echo esc_url(home_url('/#products')); ?>">Shop featured products</a>
    </div>
  </div>
</section>

<?php get_footer(); ?>
