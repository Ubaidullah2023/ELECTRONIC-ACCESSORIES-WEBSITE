<?php
/**
 * Template Name: Checkout Payment
 */
if (!defined('ABSPATH')) exit;
get_header();
?>

<section class="section" data-payment-root>
  <div class="pay-grid">
    <div class="card">
      <h1 class="h3">Select Payment Method</h1>
      <div class="pay-tabs" data-payment-tabs>
        <button class="pay-tab" data-method="easypaisa" type="button">Easypaisa</button>
        <button class="pay-tab" data-method="jazzcash" type="button">JazzCash</button>
        <button class="pay-tab" data-method="card" type="button">Credit/Debit Card</button>
        <button class="pay-tab" data-method="hbl" type="button">HBL Bank Account</button>
        <button class="pay-tab" data-method="cod" type="button">Cash on Delivery</button>
        <button class="pay-tab" data-method="installment" type="button">Installment</button>
      </div>
      <div class="pay-panes" data-payment-panes>
        <form class="pay-form" data-method-pane="easypaisa">
          <p class="muted">Enter Easypaisa account number for payment.</p>
          <input placeholder="Easypaisa Account Number" required />
          <button class="btn btn-primary" type="submit">Pay Now</button>
        </form>
        <form class="pay-form" data-method-pane="jazzcash" hidden>
          <p class="muted">Enter JazzCash account number for payment.</p>
          <input placeholder="JazzCash Account Number" required />
          <button class="btn btn-primary" type="submit">Pay Now</button>
        </form>
        <form class="pay-form" data-method-pane="card" hidden>
          <p class="muted">Enter card details.</p>
          <input placeholder="Card Number" required />
          <input placeholder="Name on Card" required />
          <div class="pay-two"><input placeholder="MM/YY" required /><input placeholder="CVV" required /></div>
          <button class="btn btn-primary" type="submit">Pay Now</button>
        </form>
        <form class="pay-form" data-method-pane="hbl" hidden>
          <p class="muted">Enter HBL account details.</p>
          <input placeholder="HBL Account Number" required />
          <input placeholder="CNIC Number" required />
          <button class="btn btn-primary" type="submit">Pay Now</button>
        </form>
        <form class="pay-form" data-method-pane="cod" hidden>
          <p class="muted">Cash on delivery selected. Confirm order to continue.</p>
          <button class="btn btn-primary" type="submit">Confirm Order</button>
        </form>
        <form class="pay-form" data-method-pane="installment" hidden>
          <p class="muted">Installment coming soon. Please choose another payment method.</p>
          <button class="btn btn-ghost" type="button">Not Available</button>
        </form>
      </div>
    </div>
    <aside class="card">
      <h2 class="h3">Order Summary</h2>
      <div class="summary-row summary-total"><span>Total Amount</span><strong data-payment-total>Rs 0</strong></div>
    </aside>
  </div>
</section>

<?php get_footer(); ?>
