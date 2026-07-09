<?php
if (!defined('ABSPATH')) exit;

class HC_Shop_Meta_Boxes {
  public static function register() {
    add_action('add_meta_boxes', [__CLASS__, 'add_boxes']);
    add_action('save_post_hc_product', [__CLASS__, 'save_product'], 10, 2);
  }

  public static function add_boxes() {
    add_meta_box('hc_product_details', __('Product Details', 'hassancomputer-shop'), [__CLASS__, 'render_product_box'], 'hc_product', 'normal', 'high');
  }

  public static function render_product_box($post) {
    wp_nonce_field('hc_product_save', 'hc_product_nonce');
    $price = get_post_meta($post->ID, '_hc_price', true);
    $badge = get_post_meta($post->ID, '_hc_badge', true);
    $meta = get_post_meta($post->ID, '_hc_meta', true);
    $pid = get_post_meta($post->ID, '_hc_product_id', true);
    ?>
    <p>
      <label for="hc_product_id"><strong><?php esc_html_e('Product ID (for cart)', 'hassancomputer-shop'); ?></strong></label><br>
      <input type="text" id="hc_product_id" name="hc_product_id" value="<?php echo esc_attr($pid); ?>" class="widefat" placeholder="e.g. r1" />
    </p>
    <p>
      <label for="hc_price"><strong><?php esc_html_e('Price (PKR)', 'hassancomputer-shop'); ?></strong></label><br>
      <input type="number" id="hc_price" name="hc_price" value="<?php echo esc_attr($price); ?>" class="widefat" min="0" step="1" />
    </p>
    <p>
      <label for="hc_badge"><strong><?php esc_html_e('Badge', 'hassancomputer-shop'); ?></strong></label><br>
      <input type="text" id="hc_badge" name="hc_badge" value="<?php echo esc_attr($badge); ?>" class="widefat" placeholder="Hot, Deal, New..." />
    </p>
    <p>
      <label for="hc_meta"><strong><?php esc_html_e('Short meta line', 'hassancomputer-shop'); ?></strong></label><br>
      <input type="text" id="hc_meta" name="hc_meta" value="<?php echo esc_attr($meta); ?>" class="widefat" placeholder="8GB RAM • 256GB SSD" />
    </p>
    <?php
  }

  public static function save_product($post_id, $post) {
    if (!isset($_POST['hc_product_nonce']) || !wp_verify_nonce(sanitize_text_field(wp_unslash($_POST['hc_product_nonce'])), 'hc_product_save')) {
      return;
    }
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) return;
    if (!current_user_can('edit_post', $post_id)) return;

    $fields = [
      'hc_product_id' => '_hc_product_id',
      'hc_price' => '_hc_price',
      'hc_badge' => '_hc_badge',
      'hc_meta' => '_hc_meta',
    ];
    foreach ($fields as $key => $meta_key) {
      if (isset($_POST[$key])) {
        $val = sanitize_text_field(wp_unslash($_POST[$key]));
        if ($key === 'hc_price') $val = (int) $val;
        update_post_meta($post_id, $meta_key, $val);
      }
    }
  }
}
