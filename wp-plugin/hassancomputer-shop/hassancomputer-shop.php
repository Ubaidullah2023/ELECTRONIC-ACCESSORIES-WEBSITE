<?php
/**
 * Plugin Name: Hassan Computer Shop
 * Plugin URI: https://example.com/
 * Description: Products, orders, promotions and shop features for Hassan Computer website.
 * Version: 1.0.0
 * Author: Hassan Computer
 * Text Domain: hassancomputer-shop
 * Requires at least: 6.0
 * Requires PHP: 7.4
 */

if (!defined('ABSPATH')) {
  exit;
}

define('HC_SHOP_VERSION', '1.0.0');
define('HC_SHOP_PATH', plugin_dir_path(__FILE__));
define('HC_SHOP_URL', plugin_dir_url(__FILE__));

require_once HC_SHOP_PATH . 'includes/class-post-types.php';
require_once HC_SHOP_PATH . 'includes/class-meta-boxes.php';
require_once HC_SHOP_PATH . 'includes/class-rest-api.php';
require_once HC_SHOP_PATH . 'includes/class-ajax.php';
require_once HC_SHOP_PATH . 'includes/class-admin.php';
require_once HC_SHOP_PATH . 'includes/class-activator.php';
require_once HC_SHOP_PATH . 'includes/class-seeder.php';

function hc_shop_init() {
  HC_Shop_Post_Types::register();
  HC_Shop_Meta_Boxes::register();
  HC_Shop_REST_API::register();
  HC_Shop_Ajax::register();
  HC_Shop_Admin::register();
}
add_action('init', 'hc_shop_init');

register_activation_hook(__FILE__, ['HC_Shop_Activator', 'activate']);
register_deactivation_hook(__FILE__, ['HC_Shop_Activator', 'deactivate']);

/**
 * Get all published products as array for frontend JS.
 */
function hc_shop_get_products() {
  $posts = get_posts([
    'post_type' => 'hc_product',
    'post_status' => 'publish',
    'numberposts' => -1,
    'orderby' => 'menu_order',
    'order' => 'ASC',
  ]);

  $products = [];
  foreach ($posts as $post) {
    $products[] = hc_shop_format_product($post);
  }
  return $products;
}

function hc_shop_format_product($post) {
  $id = get_post_meta($post->ID, '_hc_product_id', true) ?: (string) $post->ID;
  $terms = wp_get_post_terms($post->ID, 'hc_product_cat', ['fields' => 'slugs']);
  $img = get_the_post_thumbnail_url($post->ID, 'medium_large');
  if (!$img) {
    $img = get_post_meta($post->ID, '_hc_image_url', true);
  }

  return [
    'id' => $id,
    'title' => get_the_title($post),
    'category' => !empty($terms[0]) ? $terms[0] : 'accessories',
    'meta' => get_post_meta($post->ID, '_hc_meta', true) ?: '',
    'price' => (int) get_post_meta($post->ID, '_hc_price', true),
    'badge' => get_post_meta($post->ID, '_hc_badge', true) ?: 'New',
    'img' => $img ?: '',
    'url' => get_permalink($post),
    'postId' => $post->ID,
  ];
}

function hc_shop_get_promos() {
  $promos = get_option('hc_promotions', []);
  if (!is_array($promos) || empty($promos)) {
    return [
      ['title' => 'Up to 25% off', 'sub' => 'Smart appliances & accessories'],
      ['title' => 'Bundle deals', 'sub' => 'Router + cables + setup'],
      ['title' => 'Limited stock', 'sub' => 'Imported monitors & laptops'],
    ];
  }
  return $promos;
}

function hc_shop_page_url($slug) {
  $page = get_page_by_path($slug);
  return $page ? get_permalink($page) : home_url('/' . $slug . '/');
}
