<?php
if (!defined('ABSPATH')) exit;

class HC_Shop_Admin {
  public static function register() {
    add_action('admin_menu', [__CLASS__, 'menu']);
    add_action('add_meta_boxes', [__CLASS__, 'order_box']);
  }

  public static function menu() {
    add_submenu_page(
      'edit.php?post_type=hc_product',
      __('Newsletter', 'hassancomputer-shop'),
      __('Newsletter', 'hassancomputer-shop'),
      'manage_options',
      'hc-newsletter',
      [__CLASS__, 'newsletter_page']
    );
  }

  public static function newsletter_page() {
    $list = get_option('hc_newsletter_emails', []);
    if (!is_array($list)) $list = [];
    ?>
    <div class="wrap">
      <h1><?php esc_html_e('Newsletter Subscribers', 'hassancomputer-shop'); ?></h1>
      <?php if (empty($list)): ?>
        <p><?php esc_html_e('No subscribers yet.', 'hassancomputer-shop'); ?></p>
      <?php else: ?>
        <ul>
          <?php foreach ($list as $email): ?>
            <li><?php echo esc_html($email); ?></li>
          <?php endforeach; ?>
        </ul>
      <?php endif; ?>
    </div>
    <?php
  }

  public static function order_box() {
    add_meta_box('hc_order_details', __('Order Details', 'hassancomputer-shop'), [__CLASS__, 'render_order_box'], 'hc_order', 'normal', 'high');
  }

  public static function render_order_box($post) {
    $delivery = get_post_meta($post->ID, '_hc_delivery', true);
    $items = get_post_meta($post->ID, '_hc_items', true);
    $payment = get_post_meta($post->ID, '_hc_payment', true);
    $total = get_post_meta($post->ID, '_hc_total', true);
    echo '<p><strong>Payment:</strong> ' . esc_html($payment) . '</p>';
    echo '<p><strong>Total:</strong> PKR ' . esc_html($total) . '</p>';
    echo '<h4>Delivery</h4><pre>' . esc_html(wp_json_encode($delivery, JSON_PRETTY_PRINT)) . '</pre>';
    echo '<h4>Items</h4><pre>' . esc_html(wp_json_encode($items, JSON_PRETTY_PRINT)) . '</pre>';
  }
}
