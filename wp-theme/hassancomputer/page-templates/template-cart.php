<?php
/**
 * Template Name: Cart
 */
if (!defined('ABSPATH')) exit;
get_header();
?>

<section class="section">
  <div class="cart-grid">
    <div class="cart-left">
      <div class="cart-head">
        <h1 style="margin:0;">Shopping Cart</h1>
        <button class="btn btn-ghost" type="button" data-cart-clear>Clear</button>
      </div>
      <div class="cart-table card" data-cart-items></div>
    </div>
    <aside class="cart-right">
      <div class="card">
        <h2 class="h3">Order Summary</h2>
        <div class="summary-row"><span class="muted">Subtotal</span><strong data-cart-subtotal>Rs 0</strong></div>
        <div class="summary-row"><span class="muted">Shipping</span><strong data-cart-shipping>Rs 0</strong></div>
        <div class="summary-row summary-total"><span>Total</span><strong data-cart-total>Rs 0</strong></div>
        <div class="coupon">
          <label class="muted" for="coupon">Enter Voucher Code</label>
          <div class="coupon-row">
            <input id="coupon" type="text" placeholder="Voucher code" />
            <button class="btn btn-primary btn-sm" type="button" data-apply-coupon>Apply</button>
          </div>
        </div>
        <button class="btn btn-primary" type="button" style="width:100%;margin-top:12px;" data-checkout>Proceed to Checkout</button>
      </div>
    </aside>
  </div>
</section>

<?php get_footer(); ?>
