<?php
if (!defined('ABSPATH')) exit;
?><!doctype html>
<html <?php language_attributes(); ?>>
  <head>
    <meta charset="<?php bloginfo('charset'); ?>" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <?php wp_head(); ?>
  </head>
  <body <?php body_class(); ?>>
    <?php wp_body_open(); ?>
    <a class="skip-link" href="#main">Skip to content</a>

    <header class="site-header">
      <div class="topbar">
        <button class="icon-btn" type="button" aria-label="Open menu" data-drawer-open>
          <svg viewBox="0 0 24 24" aria-hidden="true">
            <path d="M4 6h16M4 12h16M4 18h16" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" />
          </svg>
        </button>

        <button class="icon-btn" type="button" aria-label="Sign In" data-open-signin>
          <svg viewBox="0 0 24 24" aria-hidden="true">
            <path d="M12 12a4 4 0 1 0-4-4 4 4 0 0 0 4 4Zm-7 9a7 7 0 0 1 14 0" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
          </svg>
        </button>

        <a class="brand" href="<?php echo esc_url(home_url('/')); ?>" aria-label="<?php echo esc_attr(HC_BRAND_NAME); ?> home">
          <span class="brand-mark" aria-hidden="true">
            <img class="brand-logo" src="<?php echo esc_url(hc_asset_uri('img/Zee Solution Hub.png')); ?>" alt="Zee Solution Hub" />
          </span>
          <span class="brand-text">
            <span class="brand-name"><?php echo esc_html(HC_BRAND_NAME); ?></span>
            <span class="brand-tagline">Best quality in lower prices</span>
          </span>
        </a>

        <form class="search" role="search" method="get" action="<?php echo esc_url(home_url('/')); ?>" data-search>
          <label class="sr-only" for="q">Search for products</label>
          <input id="q" name="s" type="search" placeholder="Search for products" value="<?php echo esc_attr(get_search_query()); ?>" autocomplete="off" />
          <button class="icon-btn" type="submit" aria-label="Search">
            <svg viewBox="0 0 24 24" aria-hidden="true">
              <path d="M10.5 18a7.5 7.5 0 1 1 0-15 7.5 7.5 0 0 1 0 15Zm9 3-5.2-5.2" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" />
            </svg>
          </button>
        </form>

        <div class="header-actions">
          <?php echo hc_wa_link(HC_WHATSAPP_E164); ?>
          <button class="pill" type="button" aria-label="Sign In" data-open-signin>
            <span class="pill-title">Sign In</span>
            <span class="pill-sub">Account</span>
          </button>
          <a class="pill" href="tel:<?php echo esc_attr(HC_WHATSAPP_E164); ?>" aria-label="Call <?php echo esc_attr(HC_WHATSAPP_E164); ?>">
            <span class="pill-title">Call</span>
            <span class="pill-sub"><?php echo esc_html(HC_WHATSAPP_E164); ?></span>
          </a>
          <button class="icon-btn" type="button" aria-label="Favorites">
            <svg viewBox="0 0 24 24" aria-hidden="true">
              <path d="M12 21s-7-4.4-9.5-8.7C.4 8.3 3 5 6.6 5c2 0 3.4 1 4.4 2.3C12 6 13.4 5 15.4 5 19 5 21.6 8.3 21.5 12.3 19 16.6 12 21 12 21Z" fill="none" stroke="currentColor" stroke-width="2" stroke-linejoin="round" />
            </svg>
          </button>
          <a class="icon-btn cart-btn" href="<?php echo esc_url(hc_page_url('cart')); ?>" aria-label="Cart">
            <span class="cart-badge" data-cart-count aria-hidden="true">0</span>
            <svg viewBox="0 0 24 24" aria-hidden="true">
              <path d="M6 7h15l-1.5 8H8L6 7Zm0 0-1-3H2" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
              <path d="M9 21a1 1 0 1 0 0-2 1 1 0 0 0 0 2Zm9 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2Z" fill="currentColor" />
            </svg>
          </a>
        </div>
      </div>

      <nav class="nav" aria-label="Primary">
        <div class="nav-inner">
          <?php
          if (has_nav_menu('primary')) {
            wp_nav_menu([
              'theme_location' => 'primary',
              'container' => false,
              'items_wrap' => '%3$s',
              'link_before' => '',
              'link_after' => '',
              'walker' => new HC_Nav_Walker(),
            ]);
          } else {
            ?>
            <a class="<?php echo esc_attr(hc_nav_link_class('home')); ?>" href="<?php echo esc_url(home_url('/')); ?>">Home</a>
            <a class="<?php echo esc_attr(hc_nav_link_class('promotions')); ?>" href="<?php echo esc_url(hc_page_url('promotions')); ?>">Promotions</a>
            <a class="<?php echo esc_attr(hc_nav_link_class('contact')); ?>" href="<?php echo esc_url(hc_page_url('contact')); ?>">Contact Us</a>
            <a class="<?php echo esc_attr(hc_nav_link_class('delivery-return')); ?>" href="<?php echo esc_url(hc_page_url('delivery-return')); ?>">Delivery &amp; Return</a>
            <?php
          }
          ?>
        </div>
      </nav>
    </header>

    <div class="layout<?php echo is_front_page() ? ' layout-no-rail' : ' layout-no-rail'; ?>">
      <main id="main" class="main">
