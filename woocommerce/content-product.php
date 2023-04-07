<?php


// КАРТОЧКА ТОВАРА КАРТОЧКА ТОВАРА КАРТОЧКА ТОВАРА КАРТОЧКА ТОВАРА
// https://woocommerce.com/document/conditional-tags/


defined( 'ABSPATH' ) || exit;

global $product;

// Ensure visibility.
if ( empty( $product ) || ! $product->is_visible() ) {
	return;
}
?>

<!-- ПРОВЕРЯЕМ ГЛАВНАЯ ЭТО СТРАНИЦА ИЛИ НЕТ ЕСЛИ НЕТ ТО ДОБАВЛЯЕМ ДРУГИЕ КЛАССЫ -->
<?php $product_class = is_front_page() ? 'col-lg-3 col-md-4 col-sm-6 pb-1 category-list' : 'col-lg-4 col-md-6 col-sm-6 pb-1'?>

<!-- ПЕРВЫМ АГРУМЕНТОМ ПЕРЕДАЁМ СВОИ КЛАССЫ -->
<div <?php wc_product_class( $product_class, $product ); ?>>
	<div class="product-item bg-light mb-4">
		<?php
		/**
		 * Hook: woocommerce_before_shop_loop_item.
		 *
		 * @hooked woocommerce_template_loop_product_link_open - 10
		 */
		do_action( 'woocommerce_before_shop_loop_item' );
		?>

		<div class="product-img position-relative overflow-hidden">
			<?php
			/**
			 * Hook: woocommerce_before_shop_loop_item_title.
			 *
			 * @hooked woocommerce_show_product_loop_sale_flash - 10
			 * @hooked woocommerce_template_loop_product_thumbnail - 10
			 */
			do_action( 'woocommerce_before_shop_loop_item_title' );
			?>
		</div><!--product-img position-relative overflow-hidden -->

		<div class="text-center py-4">
			<?php
			/**
			 * Hook: woocommerce_shop_loop_item_title.
			 *
			 * @hooked woocommerce_template_loop_product_title - 10
			 */
			do_action( 'woocommerce_shop_loop_item_title' );



			// ВЫЗЫВАЕМ РЕЙТИНГ
			echo '<div class="woostudy-rating">';
			woocommerce_template_loop_rating();
			//ДОБАВЛЯЕМ ЦИФРУ РЯДОМ СО ЗВЁЗДОЧКАМИ КОТОРАЯ ПОКАЗЫВАЕТ КОЛ-ВО ОЦЕНОК РЕЙТИНГА
			if($rating_cnt = $product->get_rating_count()){
				echo'<span class="woostudy-rating-count"><small>('. $rating_cnt .')</small></span>';
			}
			echo '</div>';
			/**
			 * Hook: woocommerce_after_shop_loop_item_title.
			 *
			 * @hooked woocommerce_template_loop_rating - 5
			 * @hooked woocommerce_template_loop_price - 10
			 */
			do_action( 'woocommerce_after_shop_loop_item_title' );

			/**
			 * Hook: woocommerce_after_shop_loop_item.
			 *
			 * @hooked woocommerce_template_loop_product_link_close - 5
			 * @hooked woocommerce_template_loop_add_to_cart - 10
			 */
			do_action( 'woocommerce_after_shop_loop_item' );
			?>
		</div><!--text-center py-4 -->
	</div> <!--product-item bg-light mb-4 -->
</div> <!-- col-lg-3 col-md-4 col-sm-6 pb-1 -->
