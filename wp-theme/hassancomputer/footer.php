<?php
if (!defined('ABSPATH')) exit;
?>
        <footer class="footer">
          <div class="footer-grid">
            <div>
              <div class="footer-brand">
                <span class="brand-mark" aria-hidden="true">
                  <img class="brand-logo" src="<?php echo esc_url(hc_asset_uri('img/Zee Solution Hub.png')); ?>" alt="Zee Solution Hub" />
                </span>
                <div>
                  <div class="brand-name">Electronic Accessories Website</div>
                  <div class="muted">Best quality in lower prices</div>
                </div>
              </div>
              <div class="social">
                <a href="#" aria-label="Facebook" title="Facebook">
                  <img src="<?php echo esc_url(hc_asset_uri('img/facebook.png')); ?>" alt="Facebook" />
                </a>
                <a href="#" aria-label="Instagram" title="Instagram">
                  <img src="<?php echo esc_url(hc_asset_uri('img/instagram.png')); ?>" alt="Instagram" />
                </a>
                <a href="#" aria-label="LinkedIn" title="LinkedIn">
                  <img src="<?php echo esc_url(hc_asset_uri('img/linkedin.png')); ?>" alt="LinkedIn" />
                </a>
              </div>
            </div>
            <div>
              <div class="footer-title">Categories</div>
              <a href="<?php echo esc_url(home_url('/#products')); ?>">Laptops</a>
              <a href="<?php echo esc_url(home_url('/#products')); ?>">Monitors</a>
              <a href="<?php echo esc_url(home_url('/#products')); ?>">Webcam</a>
              <a href="<?php echo esc_url(home_url('/#products')); ?>">Cables &amp; Adapters</a>
              <a href="<?php echo esc_url(home_url('/#products')); ?>">WiFi Routers</a>
            </div>
            <div>
              <div class="footer-title">Useful Links</div>
              <a href="<?php echo esc_url(hc_page_url('promotions')); ?>">Promotions</a>
              <a href="<?php echo esc_url(hc_page_url('delivery-return')); ?>">Delivery &amp; Return</a>
              <a href="<?php echo esc_url(hc_page_url('contact')); ?>">Contact Us</a>
            </div>
            <div>
              <div class="footer-title">Contact details</div>
              <div class="muted"><?php echo esc_html(HC_WHATSAPP_E164); ?></div>
              <div class="muted"><?php echo esc_html(HC_CONTACT_EMAIL); ?></div>
              <div class="muted"><?php echo esc_html(HC_LOCATION_TEXT); ?></div>
            </div>
          </div>
          <div class="footer-bottom">© <span data-year></span> Electronic Accessories Website. All rights reserved.</div>
        </footer>
      </main>
    </div>

    <div class="drawer" data-drawer aria-hidden="true">
      <div class="drawer-backdrop" data-drawer-close></div>
      <div class="drawer-panel" role="dialog" aria-label="Navigation menu">
        <div class="drawer-head">
          <div class="drawer-title">Menu</div>
          <button class="icon-btn" type="button" aria-label="Close menu" data-drawer-close>
            <svg viewBox="0 0 24 24" aria-hidden="true">
              <path d="M6 6l12 12M18 6 6 18" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" />
            </svg>
          </button>
        </div>
        <div class="drawer-links">
          <a href="<?php echo esc_url(home_url('/')); ?>">Home</a>
          <a href="<?php echo esc_url(hc_page_url('promotions')); ?>">Promotions</a>
          <a href="<?php echo esc_url(hc_page_url('contact')); ?>">Contact Us</a>
          <a href="<?php echo esc_url(hc_page_url('delivery-return')); ?>">Delivery &amp; Return</a>
          <button class="drawer-btn" type="button" data-open-signin>Sign In</button>
        </div>
        <div class="drawer-meta">
          <div class="muted">WhatsApp only message</div>
          <div class="muted"><?php echo esc_html(HC_WHATSAPP_E164); ?></div>
        </div>
      </div>
    </div>

    <?php get_template_part('template-parts/signin-modal'); ?>

    <a class="chat-fab" href="<?php echo esc_url('https://wa.me/' . HC_WHATSAPP_WA); ?>" target="_blank" rel="noopener" aria-label="Chat on WhatsApp">WhatsApp</a>

    <div class="toast" data-toast role="status" aria-live="polite" aria-atomic="true"></div>
    <?php wp_footer(); ?>
  </body>
</html>
