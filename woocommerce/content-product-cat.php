<?php

// КАТЕГОРИИ НА ГЛАВНОЙ СТРАНИЦЕ
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>




<!-- ПЕРВЫМ АГРУМЕНТОМ ПЕРЕДАЁМ СВОИ КЛАССЫ -->
<div <?php wc_product_cat_class( 'col-lg-3 col-md-4 col-sm-6 pb-1 category-list', $category ); ?>>
			<?php
			/**
			 * The woocommerce_before_subcategory hook.
			 *
			 * @hooked woocommerce_template_loop_category_link_open - 10
			 */
			do_action( 'woocommerce_before_subcategory', $category );
			?>
	<div class="cat-item d-flex align-items-center mb-4">
		<div class="overflow-hidden" style="width: 100px; height: 100px;">
			<?php

			/**
			 * The woocommerce_before_subcategory_title hook.
			 *
			 * @hooked woocommerce_subcategory_thumbnail - 10
			 */
			do_action( 'woocommerce_before_subcategory_title', $category );
			?>
		</div><!-- overflow-hidden  -->

		
		<div class="flex-fill pl-3">
			<?php
			/**
			 * The woocommerce_shop_loop_subcategory_title hook.
			 *
			 * @hooked woocommerce_template_loop_category_title - 10
			 */
			do_action( 'woocommerce_shop_loop_subcategory_title', $category );
			?>
			
			 
		</div><!-- flex-fill pl-3  -->

			<?php
			/**
			 * The woocommerce_after_subcategory_title hook.
			 */
			do_action( 'woocommerce_after_subcategory_title', $category );
			?>

	</div>	<!-- col-lg-3 col-md-4 col-sm-6 pb-1  -->


	<?php
	/**
	 * The woocommerce_after_subcategory hook.
	 *
	 * @hooked woocommerce_template_loop_category_link_close - 10
	 */
	do_action( 'woocommerce_after_subcategory', $category );
	?>
</div>
