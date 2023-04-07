<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Filter tabs and allow third parties to add their own.
 *
 * Each tab is an array containing title, callback and priority.
 *
 * @see woocommerce_default_product_tabs()
 */
$product_tabs = apply_filters( 'woocommerce_product_tabs', array() );
?>
<?php if ( ! empty( $product_tabs ) ) : ?>
<div class="nav nav-tabs mb-4">
	<?php $i=0; foreach ( $product_tabs as $key => $product_tab ) : ?>
	<a class="nav-item nav-link text-dark <?php if(! $i) echo 'active'?> " data-toggle="tab" href="#tab-pane-<?php echo esc_attr( $key ); ?>">
	
	<?php echo wp_kses_post( apply_filters( 'woocommerce_product_' . $key . '_tab_title', $product_tab['title'], $key ) ); ?>
	</a>
	<?php $i++; endforeach;?>
</div>
<div class="tab-content">
	<?php $i=0; foreach ( $product_tabs as $key => $product_tab ) : ?>
	<div class="tab-pane fade <?php if(! $i) echo'show active';?> " id="tab-pane-<?php echo esc_attr( $key ); ?>">
		<?php
		if ( isset( $product_tab['callback'] ) ) {
			call_user_func( $product_tab['callback'], $key, $product_tab );
		}
		?>
	</div>
	<?php $i++; endforeach; ?>

</div>
<?php endif;?>
<?php do_action( 'woocommerce_product_after_tabs' ); ?>


