<?php
if (!defined('ABSPATH')) exit;

class HC_Shop_Ajax {
  public static function register() {
    add_action('wp_ajax_hc_place_order', [__CLASS__, 'place_order']);
    add_action('wp_ajax_nopriv_hc_place_order', [__CLASS__, 'place_order']);
  }

  public static function place_order() {
    check_ajax_referer('hc_nonce', 'nonce');

    $payload = isset($_POST['order']) ? json_decode(wp_unslash($_POST['order']), true) : null;
    if (!is_array($payload)) {
      wp_send_json_error(['message' => 'Invalid order data.']);
    }

    $delivery = $payload['delivery'] ?? [];
    $items = $payload['items'] ?? [];
    $payment = sanitize_text_field($payload['payment'] ?? 'cod');
    $total = (int) ($payload['total'] ?? 0);

    $name = sanitize_text_field($delivery['fullName'] ?? 'Customer');
    $phone = sanitize_text_field($delivery['phone'] ?? '');

    $order_id = wp_insert_post([
      'post_type' => 'hc_order',
      'post_status' => 'publish',
      'post_title' => sprintf('Order — %s — %s', $name, current_time('Y-m-d H:i')),
    ]);

    if (is_wp_error($order_id)) {
      wp_send_json_error(['message' => 'Could not save order.']);
    }

    update_post_meta($order_id, '_hc_delivery', $delivery);
    update_post_meta($order_id, '_hc_items', $items);
    update_post_meta($order_id, '_hc_payment', $payment);
    update_post_meta($order_id, '_hc_total', $total);

    $admin_email = get_option('admin_email');
    $body = "New order #{$order_id}\n\nCustomer: {$name}\nPhone: {$phone}\nPayment: {$payment}\nTotal: PKR {$total}\n\nItems:\n" . wp_json_encode($items, JSON_PRETTY_PRINT);
    wp_mail($admin_email, 'New Hassan Computer order', $body);

    wp_send_json_success(['orderId' => $order_id, 'message' => 'Order placed successfully.']);
  }
}
