<?php
/**
 * Template Name: Contact Us
 */
if (!defined('ABSPATH')) exit;
get_header();
$result = hc_handle_contact_post();
?>

<section class="page-head">
  <div>
    <div class="kicker">Electronic Accessories Website, Ichhra Lahore</div>
    <h1>Contact Us</h1>
  </div>
  <div class="badge-row">
    <span class="badge">4.7 ★ (138)</span>
    <span class="badge">Open now</span>
  </div>
</section>

<section class="section">
  <div class="map-wrap card">
    <iframe title="Electronic Accessories Website location" loading="lazy" referrerpolicy="no-referrer-when-downgrade" src="https://www.google.com/maps?q=Hassan%20Computer%20Ichhra%20Lahore&output=embed"></iframe>
  </div>
</section>

<section class="section">
  <div class="contact-grid">
    <form class="card" method="post" action="">
      <?php wp_nonce_field('hc_contact', 'hc_nonce'); ?>
      <input type="hidden" name="hc_action" value="contact" />
      <div class="section-head">
        <h2>Get in Touch</h2>
        <p class="muted">Send us a message and we will reply soon.</p>
        <?php if ($result): ?>
          <p class="<?php echo $result['ok'] ? 'muted' : ''; ?>" style="color:<?php echo $result['ok'] ? '#0a7a3f' : '#b42318'; ?>">
            <?php echo esc_html($result['message']); ?>
          </p>
        <?php endif; ?>
      </div>
      <div class="form-grid">
        <div class="field">
          <label for="firstName">First name</label>
          <input id="firstName" name="firstName" type="text" autocomplete="given-name" required />
        </div>
        <div class="field">
          <label for="lastName">Last name</label>
          <input id="lastName" name="lastName" type="text" autocomplete="family-name" />
        </div>
        <div class="field field-full">
          <label for="email">Email</label>
          <input id="email" name="email" type="email" autocomplete="email" required />
        </div>
        <div class="field field-full">
          <label for="message">Your message</label>
          <textarea id="message" name="message" rows="6" required></textarea>
        </div>
      </div>
      <button class="btn btn-primary" type="submit">Send Message</button>
    </form>

    <aside class="card card-soft">
      <div class="section-head">
        <h2>Need a Help?</h2>
        <p class="muted">Quick contact options.</p>
      </div>
      <div class="help-list">
        <a class="help-item" href="tel:<?php echo esc_attr(HC_WHATSAPP_E164); ?>">
          <span class="help-ico" aria-hidden="true">☎</span>
          <span><span class="help-title">Call</span><span class="help-sub"><?php echo esc_html(HC_WHATSAPP_E164); ?></span></span>
        </a>
        <a class="help-item" href="https://wa.me/<?php echo esc_attr(HC_WHATSAPP_WA); ?>" target="_blank" rel="noopener">
          <span class="help-ico" aria-hidden="true">💬</span>
          <span><span class="help-title">WhatsApp</span><span class="help-sub"><?php echo esc_html(HC_WHATSAPP_E164); ?></span></span>
        </a>
        <a class="help-item" href="mailto:<?php echo esc_attr(HC_CONTACT_EMAIL); ?>">
          <span class="help-ico" aria-hidden="true">✉</span>
          <span><span class="help-title">Email</span><span class="help-sub"><?php echo esc_html(HC_CONTACT_EMAIL); ?></span></span>
        </a>
      </div>
      <div class="subscribe">
        <div class="footer-title">Subscribe us</div>
        <form class="sub-form" data-subscribe>
          <label class="sr-only" for="subEmail">Email</label>
          <input id="subEmail" type="email" placeholder="Email address" required />
          <button class="btn btn-ghost" type="submit">Subscribe</button>
        </form>
      </div>
    </aside>
  </div>
</section>

<?php get_footer(); ?>
