<?php
if (!defined('ABSPATH')) exit;

class HC_Shop_Seeder {
  public static function seed_products() {
    if (get_posts(['post_type' => 'hc_product', 'numberposts' => 1])) {
      return;
    }

    $theme_img = get_theme_file_uri('/assets/img/');
    $items = [
      ['id' => 'r1', 'title' => 'Dual‑Band WiFi Router AC1200', 'cat' => 'networking', 'meta' => 'Imported • 2.4/5GHz • 4 antennas', 'price' => 5499, 'badge' => 'Hot', 'img' => 'Router.jpg'],
      ['id' => 'l1', 'title' => 'Laptop 14" i5 (Refurb)', 'cat' => 'laptops', 'meta' => '8GB RAM • 256GB SSD • Warranty', 'price' => 68999, 'badge' => 'Deal', 'img' => 'Laptop.jpg'],
      ['id' => 'm1', 'title' => 'Monitor 24" IPS 75Hz', 'cat' => 'monitors', 'meta' => 'Full HD • HDMI • Slim bezel', 'price' => 27999, 'badge' => 'New', 'img' => 'Monitor.jpg'],
      ['id' => 'a1', 'title' => 'Power Gaming Mouse RGB', 'cat' => 'accessories', 'meta' => 'Adjustable DPI • Braided cable', 'price' => 1999, 'badge' => 'Top', 'img' => 'Power Gaming Mouse.jpg'],
      ['id' => 'a2', 'title' => 'USB‑C Hub 6‑in‑1', 'cat' => 'accessories', 'meta' => 'HDMI • USB 3.0 • Ethernet', 'price' => 2999, 'badge' => 'Pro', 'img' => 'UtechSmart USB C Hub, USB C Ethernet Multiport Adapter, 6 In 1 USB C.jpg'],
      ['id' => 'r2', 'title' => 'WiFi Repeater 300Mbps', 'cat' => 'networking', 'meta' => 'WPS • Coverage extender', 'price' => 2199, 'badge' => 'Value', 'img' => 'Repetidor WIFI .jpg'],
    ];

    $cats = ['laptops', 'monitors', 'networking', 'accessories'];
    foreach ($cats as $cat) {
      if (!term_exists($cat, 'hc_product_cat')) {
        wp_insert_term(ucfirst($cat), 'hc_product_cat', ['slug' => $cat]);
      }
    }

    foreach ($items as $i => $item) {
      $post_id = wp_insert_post([
        'post_type' => 'hc_product',
        'post_status' => 'publish',
        'post_title' => $item['title'],
        'menu_order' => $i,
      ]);
      if (is_wp_error($post_id)) continue;

      update_post_meta($post_id, '_hc_product_id', $item['id']);
      update_post_meta($post_id, '_hc_price', $item['price']);
      update_post_meta($post_id, '_hc_badge', $item['badge']);
      update_post_meta($post_id, '_hc_meta', $item['meta']);
      update_post_meta($post_id, '_hc_image_url', $theme_img . rawurlencode($item['img']));

      wp_set_object_terms($post_id, $item['cat'], 'hc_product_cat');
    }
  }

  public static function seed_pages() {
    $pages = [
      ['title' => 'Home', 'slug' => 'home', 'template' => ''],
      ['title' => 'Promotions', 'slug' => 'promotions', 'template' => 'page-templates/template-promotions.php'],
      ['title' => 'Contact Us', 'slug' => 'contact', 'template' => 'page-templates/template-contact.php'],
      ['title' => 'Delivery & Return', 'slug' => 'delivery-return', 'template' => 'page-templates/template-delivery-return.php'],
      ['title' => 'Cart', 'slug' => 'cart', 'template' => 'page-templates/template-cart.php'],
      ['title' => 'Product', 'slug' => 'product', 'template' => 'page-templates/template-product.php'],
      ['title' => 'Checkout Delivery', 'slug' => 'checkout-delivery', 'template' => 'page-templates/template-checkout-delivery.php'],
      ['title' => 'Checkout Review', 'slug' => 'checkout-review', 'template' => 'page-templates/template-checkout-review.php'],
      ['title' => 'Checkout Payment', 'slug' => 'checkout-payment', 'template' => 'page-templates/template-checkout-payment.php'],
      ['title' => 'Order Success', 'slug' => 'order-success', 'template' => 'page-templates/template-order-success.php'],
    ];

    $home_id = 0;
    foreach ($pages as $page) {
      $existing = get_page_by_path($page['slug']);
      if ($existing) {
        if ($page['slug'] === 'home') $home_id = $existing->ID;
        continue;
      }

      $id = wp_insert_post([
        'post_type' => 'page',
        'post_status' => 'publish',
        'post_title' => $page['title'],
        'post_name' => $page['slug'],
      ]);
      if (is_wp_error($id)) continue;

      if ($page['template']) {
        update_post_meta($id, '_wp_page_template', $page['template']);
      }
      if ($page['slug'] === 'home') $home_id = $id;
    }

    if ($home_id) {
      update_option('show_on_front', 'page');
      update_option('page_on_front', $home_id);
    }

    $menu_name = 'Primary Menu';
    $menu = wp_get_nav_menu_object($menu_name);
    if (!$menu) {
      $menu_id = wp_create_nav_menu($menu_name);
      $links = ['home', 'promotions', 'contact', 'delivery-return'];
      foreach ($links as $slug) {
        $p = get_page_by_path($slug);
        if ($p) {
          wp_update_nav_menu_item($menu_id, 0, [
            'menu-item-title' => get_the_title($p),
            'menu-item-object' => 'page',
            'menu-item-object-id' => $p->ID,
            'menu-item-type' => 'post_type',
            'menu-item-status' => 'publish',
          ]);
        }
      }
      $locations = get_theme_mod('nav_menu_locations', []);
      $locations['primary'] = $menu_id;
      set_theme_mod('nav_menu_locations', $locations);
    }
  }
}
