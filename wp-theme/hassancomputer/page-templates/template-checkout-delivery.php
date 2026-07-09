<?php
/**
 * Template Name: Checkout Delivery
 */
if (!defined('ABSPATH')) exit;
get_header();
?>

<section class="section">
  <div class="co-delivery-grid">
    <div class="card">
      <h1 class="h3">Delivery Information</h1>
      <form class="form-grid" data-delivery-form>
        <div class="field"><label>Full Name *</label><input name="fullName" required /></div>
        <div class="field"><label>Phone Number *</label><input name="phone" required /></div>
        <div class="field"><label>Province *</label><input name="province" required /></div>
        <div class="field"><label>City *</label><input name="city" required /></div>
        <div class="field field-full"><label>Address *</label><input name="address" required /></div>
        <div class="field"><label>Area</label><input name="area" /></div>
        <div class="field"><label>Landmark</label><input name="landmark" /></div>
        <div class="field field-full"><button class="btn btn-primary" type="submit">Save</button></div>
      </form>
    </div>
    <aside class="card">
      <h2 class="h3">Order Summary</h2>
      <div class="summary-row"><span class="muted">Items Total</span><strong data-delivery-item-total>Rs 0</strong></div>
      <div class="summary-row"><span class="muted">Delivery Fee</span><strong data-delivery-shipping>Rs 0</strong></div>
      <div class="summary-row summary-total"><span>Total</span><strong data-delivery-total>Rs 0</strong></div>
    </aside>
  </div>
</section>

<?php get_footer(); ?>
