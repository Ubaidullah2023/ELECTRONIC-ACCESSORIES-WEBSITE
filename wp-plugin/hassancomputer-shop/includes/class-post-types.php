<?php
if (!defined('ABSPATH')) exit;

class HC_Shop_Post_Types {
  public static function register() {
    register_post_type('hc_product', [
      'labels' => [
        'name' => __('Products', 'hassancomputer-shop'),
        'singular_name' => __('Product', 'hassancomputer-shop'),
        'add_new_item' => __('Add New Product', 'hassancomputer-shop'),
        'edit_item' => __('Edit Product', 'hassancomputer-shop'),
      ],
      'public' => true,
      'has_archive' => true,
      'rewrite' => ['slug' => 'products'],
      'menu_icon' => 'dashicons-cart',
      'supports' => ['title', 'editor', 'thumbnail', 'excerpt', 'page-attributes'],
      'show_in_rest' => true,
    ]);

    register_taxonomy('hc_product_cat', 'hc_product', [
      'labels' => [
        'name' => __('Product Categories', 'hassancomputer-shop'),
        'singular_name' => __('Product Category', 'hassancomputer-shop'),
      ],
      'public' => true,
      'hierarchical' => true,
      'rewrite' => ['slug' => 'product-category'],
      'show_in_rest' => true,
    ]);

    register_post_type('hc_order', [
      'labels' => [
        'name' => __('Orders', 'hassancomputer-shop'),
        'singular_name' => __('Order', 'hassancomputer-shop'),
      ],
      'public' => false,
      'show_ui' => true,
      'show_in_menu' => 'edit.php?post_type=hc_product',
      'menu_icon' => 'dashicons-clipboard',
      'supports' => ['title'],
      'capability_type' => 'post',
    ]);
  }
}
