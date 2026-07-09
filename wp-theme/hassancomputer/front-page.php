<?php
if (!defined('ABSPATH')) exit;
get_header();
$img = hc_asset_uri('img/');
?>

<section class="hero-slideshow" data-hero-slideshow aria-label="Featured slideshow">
  <button class="hero-arrow hero-arrow-left" type="button" aria-label="Previous slide" data-slide-prev>‹</button>
  <div class="hero-slides">
    <article class="hero hero-store hero-slide is-active">
      <div class="hero-content">
        <p class="kicker">Imported Stock • Genuine Products</p>
        <h1>Best quality IT products at lower prices</h1>
        <p class="hero-sub">Shop laptops, monitors, WiFi routers, gaming mice and accessories. Quality checked imported stock with fast delivery across Punjab.</p>
        <div class="hero-actions">
          <a class="btn btn-primary" href="#products">Shop now</a>
          <a class="btn btn-ghost" href="https://wa.me/<?php echo esc_attr(HC_WHATSAPP_WA); ?>" target="_blank" rel="noopener">Ask on WhatsApp</a>
        </div>
        <div class="hero-points"><span>Quality checked</span><span>Imported products</span><span>Fast delivery</span></div>
      </div>
      <div class="hero-visual">
        <div class="hero-panel hero-panel-image">
          <div class="hero-panel-tag">Featured</div>
          <img class="hero-img" src="<?php echo esc_url($img . rawurlencode('Router.jpg')); ?>" alt="WiFi Router" />
        </div>
      </div>
    </article>
    <article class="hero hero-store hero-slide">
      <div class="hero-content">
        <p class="kicker">7.7 Super Savings</p>
        <h1>Mega deals up to 80% off</h1>
        <p class="hero-sub">Best price offers on monitors, accessories and networking products. Limited stock, fast checkout.</p>
        <div class="hero-actions">
          <a class="btn btn-primary" href="#products">Shop now</a>
          <a class="btn btn-ghost" href="<?php echo esc_url(hc_page_url('promotions')); ?>">View promotions</a>
        </div>
        <div class="hero-points"><span>Seasonal discounts</span><span>Top categories</span><span>Best sellers</span></div>
      </div>
      <div class="hero-visual">
        <div class="hero-panel hero-panel-image">
          <div class="hero-panel-tag">Sale</div>
          <img class="hero-img" src="<?php echo esc_url($img . rawurlencode('Monitor.jpg')); ?>" alt="Promotion products" />
        </div>
      </div>
    </article>
    <article class="hero hero-store hero-slide">
      <div class="hero-content">
        <p class="kicker">Cables &amp; Adapters</p>
        <h1>Genuine cables. No signal loss.</h1>
        <p class="hero-sub">Durable adapters and accessories for office and gaming setup. Imported quality products.</p>
        <div class="hero-actions">
          <a class="btn btn-primary" href="#products">Explore collection</a>
          <a class="btn btn-ghost" href="<?php echo esc_url(hc_page_url('contact')); ?>">Talk to us</a>
        </div>
        <div class="hero-points"><span>Original quality</span><span>Trusted sourcing</span><span>Quick support</span></div>
      </div>
      <div class="hero-visual">
        <div class="hero-panel hero-panel-image">
          <div class="hero-panel-tag">New Arrival</div>
          <img class="hero-img" src="<?php echo esc_url($img . rawurlencode('UtechSmart USB C Hub, USB C Ethernet Multiport Adapter, 6 In 1 USB C.jpg')); ?>" alt="Cables and adapters" />
        </div>
      </div>
    </article>
  </div>
  <button class="hero-arrow hero-arrow-right" type="button" aria-label="Next slide" data-slide-next>›</button>
</section>

<section id="categories" class="section">
  <div class="section-head">
    <h2>Shop by Category</h2>
    <a class="link" href="#products">View products</a>
  </div>
  <div class="category-showcase">
    <article class="category-card">
      <img class="category-thumb" src="<?php echo esc_url($img . rawurlencode('Laptop.jpg')); ?>" alt="Laptops" loading="lazy" />
      <h3>Laptops</h3>
      <p>Business, student and imported refurbished machines.</p>
    </article>
    <article class="category-card">
      <img class="category-thumb" src="<?php echo esc_url($img . rawurlencode('Monitor.jpg')); ?>" alt="Monitors" loading="lazy" />
      <h3>Monitors</h3>
      <p>Office, gaming and dual-screen workstation options.</p>
    </article>
    <article class="category-card">
      <img class="category-thumb" src="<?php echo esc_url($img . rawurlencode('Router.jpg')); ?>" alt="Networking" loading="lazy" />
      <h3>Networking</h3>
      <p>Routers, repeaters and smart connectivity devices.</p>
    </article>
    <article class="category-card">
      <img class="category-thumb" src="<?php echo esc_url($img . rawurlencode('Power Gaming Mouse.jpg')); ?>" alt="Accessories" loading="lazy" />
      <h3>Accessories</h3>
      <p>Mice, keyboards, hubs, adapters and daily-use gear.</p>
    </article>
  </div>
</section>

<section class="section">
  <div class="trust-strip">
    <div class="trust-item"><strong>100%</strong><span>Quality checked products</span></div>
    <div class="trust-item"><strong>Fast</strong><span>Support on WhatsApp</span></div>
    <div class="trust-item"><strong>Best Price</strong><span>Lower prices in local market</span></div>
    <div class="trust-item"><strong>A-Grade</strong><span>Imported IT products</span></div>
  </div>
</section>

<section id="products" class="section">
  <div class="section-head">
    <h2>Featured Products</h2>
    <p class="muted">Hand-picked deals on imported laptops, monitors and accessories.</p>
  </div>
  <div class="chips" data-chips>
    <button class="chip is-active" type="button" data-chip="all">All</button>
    <button class="chip" type="button" data-chip="laptops">Laptops</button>
    <button class="chip" type="button" data-chip="monitors">Monitors</button>
    <button class="chip" type="button" data-chip="networking">Networking</button>
    <button class="chip" type="button" data-chip="accessories">Accessories</button>
  </div>
  <div class="grid product-grid-enhanced" data-product-grid aria-live="polite"></div>
</section>

<section class="section">
  <div class="feature-band">
    <article class="feature-story feature-story-large">
      <div class="feature-overlay">
        <span class="feature-label">Featured Collection</span>
        <h3>Build your complete desk setup</h3>
        <p>Monitors, keyboards, mice and hubs selected for productivity and gaming.</p>
        <a class="btn btn-primary" href="#products">Explore collection</a>
      </div>
    </article>
    <div class="feature-stack">
      <article class="mini-feature mini-feature-blue">
        <span class="feature-label">Promotion</span>
        <h3>Imported laptops in fresh stock</h3>
        <p>Ideal for students, office work and resale.</p>
      </article>
      <article class="mini-feature mini-feature-light">
        <span class="feature-label">Support</span>
        <h3>Need help choosing a product?</h3>
        <p>Send budget and requirement, we will suggest the best option.</p>
        <a class="link" href="<?php echo esc_url(hc_page_url('contact')); ?>">Talk to us</a>
      </article>
    </div>
  </div>
</section>

<section class="section">
  <div class="section-head">
    <h2>Latest Articles</h2>
    <a class="link" href="<?php echo esc_url(hc_page_url('promotions')); ?>">Read more</a>
  </div>
  <div class="article-grid">
    <article class="article-card">
      <span class="article-tag">Guide</span>
      <h3>How to choose the right WiFi router for home and office</h3>
      <p>Coverage, speed, bands and setup tips explained simply.</p>
    </article>
    <article class="article-card">
      <span class="article-tag">Tips</span>
      <h3>What to check before buying a used or refurbished laptop</h3>
      <p>Battery, display, keyboard and SSD health checklist.</p>
    </article>
    <article class="article-card">
      <span class="article-tag">Setup</span>
      <h3>Best monitor sizes for office work, design and gaming</h3>
      <p>Quick size recommendations for every type of user.</p>
    </article>
  </div>
</section>

<section class="section">
  <div class="split split-home">
    <div class="card card-soft">
      <h3>Why shop with us?</h3>
      <ul class="ticks">
        <li>Supplying A-Grade IT products</li>
        <li>UK &amp; USA imported stock</li>
        <li>Quality checked products</li>
        <li>Best prices in Pakistan</li>
      </ul>
    </div>
    <div class="card newsletter-card">
      <h3>Stay updated with new arrivals</h3>
      <p class="muted">Join our updates for fresh stock, promotions and special imported deals.</p>
      <form class="newsletter-form" data-subscribe>
        <label class="sr-only" for="newsletterEmail">Email</label>
        <input id="newsletterEmail" type="email" placeholder="Enter your email address" required />
        <button class="btn btn-primary" type="submit">Subscribe</button>
      </form>
    </div>
  </div>
</section>

<?php get_footer(); ?>
