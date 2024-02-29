<?php


if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( $upsells ) : ?>

	<row class="up-sells upsells products row mt-5">
		<?php
		$heading = apply_filters( 'woocommerce_product_upsells_products_heading', __( 'You may also like&hellip;', 'woocommerce' ) );

		if ( $heading ) :
			?>
			<div class="col-12">
				<h2 class="section-title position-relative text-uppercase  mb-4"><span class="bg-secondary pr-3"><?php echo esc_html( $heading ); ?></span></h2>
			</div>
			
		<?php endif; ?>

		<?php //woocommerce_product_loop_start(); ?>

	<div class="col-12">
		<div class="owl-carousel related-carousel">
			<?php foreach ( $upsells as $upsell ) : ?>

				<?php
				$post_object = get_post( $upsell->get_id() );

				setup_postdata( $GLOBALS['post'] =& $post_object ); // phpcs:ignore WordPress.WP.GlobalVariablesOverride.Prohibited, Squiz.PHP.DisallowMultipleAssignments.Found

				wc_get_template_part( 'content', 'product-upsells' );
				?>

			<?php endforeach; ?>
		</div><!-- owl-carousel related-carousel-->
	</div><!-- col-12-->

		<?php //woocommerce_product_loop_end(); ?>

	</row>

	<?php
endif;

wp_reset_postdata();
