<?php
/**
 * Hassan Computer theme functions.
 */

if (!defined('ABSPATH')) {
  exit;
}

define('HC_WHATSAPP_E164', '+923265035398');
define('HC_WHATSAPP_WA', '923265035398');
define('HC_LOCATION_TEXT', 'Punjab, Pakistan');
define('HC_CONTACT_EMAIL', 'ubaidullah8042003@gmail.com');
define('HC_BRAND_NAME', 'ELECTRONIC ACCESSORIES WEBSITE');

function hc_theme_setup() {
  add_theme_support('title-tag');
  add_theme_support('post-thumbnails');
  add_theme_support('html5', ['search-form', 'comment-form', 'comment-list', 'gallery', 'caption', 'style', 'script']);
  register_nav_menus([
    'primary' => __('Primary Menu', 'hassancomputer'),
  ]);
}
add_action('after_setup_theme', 'hc_theme_setup');

function hc_asset_uri($path) {
  return get_theme_file_uri('/assets/' . ltrim($path, '/'));
}

function hc_page_url($slug) {
  if (function_exists('hc_shop_page_url')) {
    return hc_shop_page_url($slug);
  }
  $page = get_page_by_path($slug);
  return $page ? get_permalink($page) : home_url('/' . $slug . '/');
}

function hc_get_products_for_js() {
  if (function_exists('hc_shop_get_products')) {
    $products = hc_shop_get_products();
    if (!empty($products)) {
      return $products;
    }
  }
  $base = hc_asset_uri('img/');
  return [
    ['id' => 'r1', 'title' => 'Dual‑Band WiFi Router AC1200', 'category' => 'networking', 'meta' => 'Imported • 2.4/5GHz • 4 antennas', 'price' => 5499, 'badge' => 'Hot', 'img' => $base . rawurlencode('Router.jpg')],
    ['id' => 'l1', 'title' => 'Laptop 14" i5 (Refurb)', 'category' => 'laptops', 'meta' => '8GB RAM • 256GB SSD • Warranty', 'price' => 68999, 'badge' => 'Deal', 'img' => $base . rawurlencode('Laptop.jpg')],
    ['id' => 'm1', 'title' => 'Monitor 24" IPS 75Hz', 'category' => 'monitors', 'meta' => 'Full HD • HDMI • Slim bezel', 'price' => 27999, 'badge' => 'New', 'img' => $base . rawurlencode('Monitor.jpg')],
    ['id' => 'a1', 'title' => 'Power Gaming Mouse RGB', 'category' => 'accessories', 'meta' => 'Adjustable DPI • Braided cable', 'price' => 1999, 'badge' => 'Top', 'img' => $base . rawurlencode('Power Gaming Mouse.jpg')],
    ['id' => 'a2', 'title' => 'USB‑C Hub 6‑in‑1', 'category' => 'accessories', 'meta' => 'HDMI • USB 3.0 • Ethernet', 'price' => 2999, 'badge' => 'Pro', 'img' => $base . rawurlencode('UtechSmart USB C Hub, USB C Ethernet Multiport Adapter, 6 In 1 USB C.jpg')],
    ['id' => 'r2', 'title' => 'WiFi Repeater 300Mbps', 'category' => 'networking', 'meta' => 'WPS • Coverage extender', 'price' => 2199, 'badge' => 'Value', 'img' => $base . rawurlencode('Repetidor WIFI .jpg')],
  ];
}

function hc_get_promos_for_js() {
  if (function_exists('hc_shop_get_promos')) {
    return hc_shop_get_promos();
  }
  return [
    ['title' => 'Up to 25% off', 'sub' => 'Smart appliances & accessories'],
    ['title' => 'Bundle deals', 'sub' => 'Router + cables + setup'],
    ['title' => 'Limited stock', 'sub' => 'Imported monitors & laptops'],
  ];
}

function hc_enqueue_assets() {
  $ver = wp_get_theme()->get('Version');

  wp_enqueue_style('hc-google-fonts', 'https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap', [], null);
  wp_enqueue_style('hc-assets', hc_asset_uri('styles.css'), [], $ver);
  wp_enqueue_script('hc-app', hc_asset_uri('app.js'), [], $ver, true);

  wp_localize_script('hc-app', 'HC_DATA', [
    'ajaxUrl' => admin_url('admin-ajax.php'),
    'nonce' => wp_create_nonce('hc_nonce'),
    'whatsappWa' => HC_WHATSAPP_WA,
    'products' => hc_get_products_for_js(),
    'promos' => hc_get_promos_for_js(),
    'urls' => [
      'home' => home_url('/'),
      'products' => home_url('/#products'),
      'promotions' => hc_page_url('promotions'),
      'contact' => hc_page_url('contact'),
      'deliveryReturn' => hc_page_url('delivery-return'),
      'cart' => hc_page_url('cart'),
      'product' => hc_page_url('product'),
      'checkoutDelivery' => hc_page_url('checkout-delivery'),
      'checkoutReview' => hc_page_url('checkout-review'),
      'checkoutPayment' => hc_page_url('checkout-payment'),
      'orderSuccess' => hc_page_url('order-success'),
      'login' => wp_login_url(home_url('/')),
      'register' => wp_registration_url(),
    ],
    'img' => [
      'logo' => hc_asset_uri('img/Zee Solution Hub.png'),
      'facebook' => hc_asset_uri('img/facebook.png'),
      'instagram' => hc_asset_uri('img/instagram.png'),
      'linkedin' => hc_asset_uri('img/linkedin.png'),
    ],
  ]);
}
add_action('wp_enqueue_scripts', 'hc_enqueue_assets');

function hc_wa_link($text = '+923265035398') {
  $url = 'https://wa.me/' . HC_WHATSAPP_WA;
  return '<a class="pill" href="' . esc_url($url) . '" target="_blank" rel="noopener" aria-label="WhatsApp">' .
    '<span class="pill-title">WhatsApp</span><span class="pill-sub">' . esc_html($text) . '</span></a>';
}

function hc_handle_contact_post() {
  if ($_SERVER['REQUEST_METHOD'] !== 'POST') return null;
  if (!isset($_POST['hc_action']) || $_POST['hc_action'] !== 'contact') return null;
  if (!isset($_POST['hc_nonce']) || !wp_verify_nonce(sanitize_text_field(wp_unslash($_POST['hc_nonce'])), 'hc_contact')) {
    return ['ok' => false, 'message' => 'Security check failed. Please refresh and try again.'];
  }

  $first = sanitize_text_field(wp_unslash($_POST['firstName'] ?? ''));
  $last = sanitize_text_field(wp_unslash($_POST['lastName'] ?? ''));
  $email = sanitize_email(wp_unslash($_POST['email'] ?? ''));
  $message = sanitize_textarea_field(wp_unslash($_POST['message'] ?? ''));

  if ($first === '' || $email === '' || $message === '') {
    return ['ok' => false, 'message' => 'Please fill the required fields.'];
  }

  $to = HC_CONTACT_EMAIL;
  $subject = 'New message from Hassan Computer website';
  $body = "Name: {$first} {$last}\nEmail: {$email}\n\nMessage:\n{$message}\n";
  $headers = [
    'Content-Type: text/plain; charset=UTF-8',
    'Reply-To: ' . $email,
  ];

  $sent = wp_mail($to, $subject, $body, $headers);
  return $sent
    ? ['ok' => true, 'message' => 'Message sent successfully. We will reply soon.']
    : ['ok' => false, 'message' => 'Could not send message right now. Please try again later.'];
}

function hc_ajax_subscribe() {
  check_ajax_referer('hc_nonce', 'nonce');

  $email = sanitize_email(wp_unslash($_POST['email'] ?? ''));
  if (!$email || !is_email($email)) {
    wp_send_json_error(['message' => 'Please enter a valid email.']);
  }

  $list = get_option('hc_newsletter_emails', []);
  if (!is_array($list)) $list = [];

  $email_lc = strtolower($email);
  if (!in_array($email_lc, $list, true)) {
    $list[] = $email_lc;
    update_option('hc_newsletter_emails', $list, false);
  }

  wp_send_json_success(['message' => 'Subscribed successfully.']);
}
add_action('wp_ajax_hc_subscribe', 'hc_ajax_subscribe');
add_action('wp_ajax_nopriv_hc_subscribe', 'hc_ajax_subscribe');

function hc_nav_link_class($slug) {
  $page = get_page_by_path($slug);
  if ($page && is_page($page->ID)) {
    return 'nav-link is-active';
  }
  if ($slug === 'home' && is_front_page()) {
    return 'nav-link is-active';
  }
  return 'nav-link';
}

function hc_register_page_templates($templates) {
  $dir = 'page-templates/';
  $map = [
    'template-contact.php' => 'Contact Us',
    'template-promotions.php' => 'Promotions',
    'template-delivery-return.php' => 'Delivery & Return',
    'template-cart.php' => 'Cart',
    'template-product.php' => 'Product Detail',
    'template-checkout-delivery.php' => 'Checkout Delivery',
    'template-checkout-review.php' => 'Checkout Review',
    'template-checkout-payment.php' => 'Checkout Payment',
    'template-order-success.php' => 'Order Success',
  ];
  foreach ($map as $file => $label) {
    $templates[$dir . $file] = $label;
  }
  return $templates;
}
add_filter('theme_page_templates', 'hc_register_page_templates');

class HC_Nav_Walker extends Walker_Nav_Menu {
  public function start_el(&$output, $item, $depth = 0, $args = null, $id = 0) {
    $classes = in_array('current-menu-item', $item->classes, true) ? 'nav-link is-active' : 'nav-link';
    $output .= '<a class="' . esc_attr($classes) . '" href="' . esc_url($item->url) . '">' . esc_html($item->title) . '</a>';
  }
  public function end_el(&$output, $item, $depth = 0, $args = null) {}
}
