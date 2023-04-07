<?php
// КНОПКА В КОРЗИНЕ ГДЕ СПОСОБЫ ДОСТАВКИ И ПОДИТОГ

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}
?>

<a href="<?php echo esc_url( wc_get_checkout_url() ); ?>" class="checkout-button button alt wc-forward btn btn-block btn-primary font-weight-bold my-3 py-3<?php echo esc_attr( wc_wp_theme_get_element_class_name( 'button' ) ? ' ' . wc_wp_theme_get_element_class_name( 'button' ) : '' ); ?>">
	<?php esc_html_e( 'Proceed to checkout', 'woocommerce' ); ?>
</a>
