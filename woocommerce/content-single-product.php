<?php
defined( 'ABSPATH' ) || exit;
// КАРТОЧКА ОДНОГО ТОВАРА ВСЯ ИНФОРМАЦИЯ КОТОРАЯ ТАМ // КОНТЕНТ НА В КАРТОЧКЕ НА СТРАНИЦЕ ОТДЕЛЬНОГО ТОВАРА

global $product;
?>

<div class="col-12">
	<?php
	/**
	 * Hook: woocommerce_before_single_product.
	 *
	 * @hooked woocommerce_output_all_notices - 10
	 */
	do_action( 'woocommerce_before_single_product' );
	?>
	
</div><!-- col-12-->
<div id="product-<?php the_ID(); ?>" <?php wc_product_class( 'col-12 product-card', $product ); ?>>
	<div class="row">
		<div class="col-lg-5 mb-30">
			<!-- ВАРИАНТ ТАКОЙ КАК В ВЁРСТКЕ -->
			<!-- <div id="product-carousel" class="carousel slide" data-ride="carousel">
				<div class="carousel-inner bg-light">
					<?php
					$product_img_id = $product->get_image_id();
					if($product_img_id){
						$main_img = wp_get_attachment_image_url($product_img_id, 'full');
					}else{
						$main_img = wc_placeholder_img_src('full');
					}
					$product_img_nulls = $product->get_gallery_image_ids();
					?>

					<div class="carousel-item active">
							<img class="w-100 h-100" src="<?php echo $main_img?>" alt="Image">
					</div>
					<?php if($product_img_nulls) : ?>
					<?php foreach($product_img_nulls as $product_img_id) : ?>
						<div class="carousel-item">
							<img class="w-100 h-100" src="<?php echo wp_get_attachment_image_url($product_img_id, 'full')?>" alt="Image">
						</div>
					<?php endforeach;?>	
					<?php endif;?>
					
					
				</div>
				<a class="carousel-control-prev" href="#product-carousel" data-slide="prev">
					<i class="fa fa-2x fa-angle-left text-dark"></i>
				</a>
				<a class="carousel-control-next" href="#product-carousel" data-slide="next">
					<i class="fa fa-2x fa-angle-right text-dark"></i>
				</a>
			</div> -->
			<!-- ВАРИАНТ ТАКОЙ КАК В ВЁРСТКЕ -->



			<?php
			/**
			 * Hook: woocommerce_before_single_product_summary.
			 *
			 * @hooked woocommerce_show_product_sale_flash - 10
			 * @hooked woocommerce_show_product_images - 20
			 */
			do_action( 'woocommerce_before_single_product_summary' );
			?>

		</div><!-- col-lg-5 mb-30-->

		<div class="col-lg-7 h-auto mb-30">
			<div class="h-100 bg-light p-30 product-card-content">
				<?php woocommerce_show_product_sale_flash();?>
				<?php
				/**
				 * Hook: woocommerce_single_product_summary.
				 *
				 * @hooked woocommerce_template_single_title - 5
				 * @hooked woocommerce_template_single_rating - 10
				 * @hooked woocommerce_template_single_price - 10
				 * @hooked woocommerce_template_single_excerpt - 20
				 * @hooked woocommerce_template_single_add_to_cart - 30
				 * @hooked woocommerce_template_single_meta - 40
				 * @hooked woocommerce_template_single_sharing - 50
				 * @hooked WC_Structured_Data::generate_product_data() - 60
				 */
				do_action( 'woocommerce_single_product_summary' );
				?>
			</div><!-- h-100 bg-light p-30-->
		</div><!-- col-lg-7 h-auto mb-30-->

	</div><!-- row-->

	<div class="row product-additional">
		<div class="col">
			<div class="bg-light p-30">
			<?php
			/**
			 * Hook: woocommerce_after_single_product_summary.
			 *
			 * @hooked woocommerce_output_product_data_tabs - 10
			 * @hooked woocommerce_upsell_display - 15
			 * @hooked woocommerce_output_related_products - 20
			 */
			do_action( 'woocommerce_after_single_product_summary' );
			?>
			</div><!-- bg-light p-30-->
		</div><!-- col-->
	</div><!--row product-additional-->

			<?php woocommerce_upsell_display();?>
</div><!-- id="product"-->
<?php do_action( 'woocommerce_after_single_product' ); ?>

	



