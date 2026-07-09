<?php
if (!defined('ABSPATH')) exit;

class HC_Shop_Activator {
  public static function activate() {
    HC_Shop_Post_Types::register();
    flush_rewrite_rules();

    HC_Shop_Seeder::seed_products();
    HC_Shop_Seeder::seed_pages();

    update_option('hc_shop_activated', HC_SHOP_VERSION);
  }

  public static function deactivate() {
    flush_rewrite_rules();
  }
}
