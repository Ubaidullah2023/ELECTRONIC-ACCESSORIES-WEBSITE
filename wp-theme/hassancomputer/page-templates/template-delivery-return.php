<?php
/**
 * Template Name: Delivery & Return
 */
if (!defined('ABSPATH')) exit;
get_header();
?>

<section class="policy-hero">
  <div class="policy-hero-content">
    <h1>Delivery &amp; Return</h1>
    <p class="muted">Clear policies build trust. Mobile-friendly delivery and return information.</p>
  </div>
  <div class="policy-hero-art" aria-hidden="true">
    <div class="box"></div><div class="box box2"></div><div class="box box3"></div>
  </div>
</section>

<section class="section">
  <div class="steps">
    <div class="step"><div class="step-ico">🧾</div><div><div class="step-title">Order placed</div><div class="muted">We confirm via WhatsApp / email.</div></div></div>
    <div class="step"><div class="step-ico">📦</div><div><div class="step-title">Packed</div><div class="muted">Secure packing with invoice.</div></div></div>
    <div class="step"><div class="step-ico">🚚</div><div><div class="step-title">Shipped</div><div class="muted">Tracking shared when available.</div></div></div>
    <div class="step"><div class="step-ico">✅</div><div><div class="step-title">Delivered</div><div class="muted">Check product on delivery.</div></div></div>
  </div>
</section>

<section class="section">
  <div class="policy-grid">
    <article class="card">
      <h2 class="h3">Shipping</h2>
      <ul class="policy-list">
        <li>Same-day dispatch for in-stock items (cutoff depends on courier pickup).</li>
        <li>Delivery time typically 1–3 working days (city dependent).</li>
        <li>Remote areas may take longer.</li>
      </ul>
    </article>
    <article class="card">
      <h2 class="h3">Return / Exchange policy</h2>
      <ul class="policy-list">
        <li>Returns accepted for damaged / wrong items (report within 24 hours).</li>
        <li>Items must be in original condition with packaging and invoice.</li>
        <li>Some categories may be non-returnable (e.g., software / opened consumables).</li>
      </ul>
    </article>
    <article class="card">
      <h2 class="h3">Warranty</h2>
      <ul class="policy-list">
        <li>Warranty varies by product/brand (check product page or invoice).</li>
        <li>Physical damage and power issues are typically not covered.</li>
      </ul>
    </article>
    <article class="card">
      <h2 class="h3">FAQ</h2>
      <details class="faq" open>
        <summary>Can I change my order?</summary>
        <p class="muted">Yes, if it hasn't shipped yet. Message us on WhatsApp quickly.</p>
      </details>
      <details class="faq">
        <summary>How do I track my delivery?</summary>
        <p class="muted">When shipped, we share a tracking ID (if courier supports tracking).</p>
      </details>
      <details class="faq">
        <summary>What if my product arrives damaged?</summary>
        <p class="muted">Report within 24 hours with images/video of unboxing so we can help immediately.</p>
      </details>
    </article>
  </div>
</section>

<section class="section">
  <div class="card card-soft">
    <h2 class="h3">Still have questions?</h2>
    <p class="muted">We respond fastest on WhatsApp (messages only).</p>
    <div class="stack">
      <a class="btn btn-primary" href="<?php echo esc_url(hc_page_url('contact')); ?>">Contact support</a>
      <a class="btn btn-ghost" href="<?php echo esc_url(home_url('/#products')); ?>">Back to shopping</a>
    </div>
  </div>
</section>

<?php get_footer(); ?>
