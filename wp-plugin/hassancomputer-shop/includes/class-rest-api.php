<?php
if (!defined('ABSPATH')) exit;

class HC_Shop_REST_API {
  public static function register() {
    add_action('rest_api_init', [__CLASS__, 'routes']);
  }

  public static function routes() {
    register_rest_route('hassancomputer/v1', '/products', [
      'methods' => 'GET',
      'callback' => function () {
        return rest_ensure_response(hc_shop_get_products());
      },
      'permission_callback' => '__return_true',
    ]);
  }
}
