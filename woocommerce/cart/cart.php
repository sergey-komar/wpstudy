<?php
defined( 'ABSPATH' ) || exit;
?>
<!-- Breadcrumb Start -->
<div class="container-fluid">
	<div class="row px-xl-5">
		<div class="col-12">
			<!-- <nav class="breadcrumb bg-light mb-30">
				<a class="breadcrumb-item text-dark" href="#">Home</a>
				<a class="breadcrumb-item text-dark" href="#">Shop</a>
				<span class="breadcrumb-item active">Shop List</span>
			</nav> -->
			<?php woocommerce_breadcrumb();?>
		</div>
	</div>
</div>
<!-- Breadcrumb End -->

 <!-- Cart Start -->
 <div class="container-fluid">
	<div class="row px-xl-5">

	<div class="col-12">
		<?php do_action( 'woocommerce_before_cart' ); ?>
	</div>
		<div class="col-lg-8 table-responsive mb-5">

		<form class="woocommerce-cart-form" action="<?php echo esc_url( wc_get_cart_url() ); ?>" method="post">
			<?php do_action( 'woocommerce_before_cart_table' ); ?>

			<table class="shop_table shop_table_responsive cart woocommerce-cart-form__contents table table-light table-borderless table-hover text-center mb-0">
				<thead class="thead-dark">
					<tr>
						<th><?php esc_html_e( 'Product', 'woocommerce' ); ?></th>
						<th><?php esc_html_e( 'Price', 'woocommerce' ); ?></th>
						<th><?php esc_html_e( 'Quantity', 'woocommerce' ); ?></th>
						<th><?php esc_html_e( 'Subtotal', 'woocommerce' ); ?></th>
						<th><?php esc_html_e( 'Remove item', 'woocommerce' ); ?></th>
					</tr>
				</thead>
				<tbody class="align-middle">
				<?php do_action( 'woocommerce_before_cart_contents' ); ?>


				<?php
			foreach ( WC()->cart->get_cart() as $cart_item_key => $cart_item ) {
				$_product   = apply_filters( 'woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key );
				$product_id = apply_filters( 'woocommerce_cart_item_product_id', $cart_item['product_id'], $cart_item, $cart_item_key );

				if ( $_product && $_product->exists() && $cart_item['quantity'] > 0 && apply_filters( 'woocommerce_cart_item_visible', true, $cart_item, $cart_item_key ) ) {
					$product_permalink = apply_filters( 'woocommerce_cart_item_permalink', $_product->is_visible() ? $_product->get_permalink( $cart_item ) : '', $cart_item, $cart_item_key );
					?>
					<tr class="woocommerce-cart-form__cart-item <?php echo esc_attr( apply_filters( 'woocommerce_cart_item_class', 'cart_item', $cart_item, $cart_item_key ) ); ?>">

					<!-- НАЗВАНИЕ И ИЗОБРАЖЕНИЕ -->
						<td class="align-middle product-name card-product-thumb" data-title="<?php esc_attr_e( 'Product', 'woocommerce' ); ?>">
						<?php
						$thumbnail = apply_filters( 'woocommerce_cart_item_thumbnail', $_product->get_image(), $cart_item, $cart_item_key );

						if ( ! $product_permalink ) {
							echo $thumbnail; // PHPCS: XSS ok.
						} else {
							printf( '<a href="%s">%s</a>', esc_url( $product_permalink ), $thumbnail ); // PHPCS: XSS ok.
						}
						?>
						<!-- <img src="img/product-1.jpg" alt="" style="width: 50px;"> Product Name-->
						<?php
						if ( ! $product_permalink ) {
							echo wp_kses_post( apply_filters( 'woocommerce_cart_item_name', $_product->get_name(), $cart_item, $cart_item_key ) . '&nbsp;' );
						} else {
							echo wp_kses_post( apply_filters( 'woocommerce_cart_item_name', sprintf( '<a href="%s">%s</a>', esc_url( $product_permalink ), $_product->get_name() ), $cart_item, $cart_item_key ) );
						}

						do_action( 'woocommerce_after_cart_item_name', $cart_item, $cart_item_key );

						// Meta data.
						echo wc_get_formatted_cart_item_data( $cart_item ); // PHPCS: XSS ok.

						// Backorder notification.
						if ( $_product->backorders_require_notification() && $_product->is_on_backorder( $cart_item['quantity'] ) ) {
							echo wp_kses_post( apply_filters( 'woocommerce_cart_item_backorder_notification', '<p class="backorder_notification">' . esc_html__( 'Available on backorder', 'woocommerce' ) . '</p>', $product_id ) );
						}
						?>
						</td> 
						<!-- НАЗВАНИЕ И ИЗОБРАЖЕНИЕ -->


						<!-- ЦЕНА -->
						<td class="product-price align-middle" data-title="<?php esc_attr_e( 'Price', 'woocommerce' ); ?>">
							<?php
								echo apply_filters( 'woocommerce_cart_item_price', WC()->cart->get_product_price( $_product ), $cart_item, $cart_item_key ); // PHPCS: XSS ok.
							?>
							<!-- $150 -->
						</td>
						<!-- ЦЕНА -->

						<!-- ДОБАВЛЕНИЕ + И - -->
						<td class="product-quantity align-middle"  data-title="<?php esc_attr_e( 'Quantity', 'woocommerce' ); ?>">
							<div class="input-group quantity mx-auto" style="width: 200px;">
								<!-- <div class="input-group-btn">
									<button class="btn btn-sm btn-primary btn-minus" >
									<i class="fa fa-minus"></i>
									</button>
								</div> -->
								<!-- <input type="text" class="form-control form-control-sm bg-secondary border-0 text-center" value="1"> -->
								<?php
								if ( $_product->is_sold_individually() ) {
									$min_quantity = 1;
									$max_quantity = 1;
								} else {
									$min_quantity = 0;
									$max_quantity = $_product->get_max_purchase_quantity();
								}

								$product_quantity = woocommerce_quantity_input(
									array(
										'input_name'   => "cart[{$cart_item_key}][qty]",
										'input_value'  => $cart_item['quantity'],
										'max_value'    => $max_quantity,
										'min_value'    => $min_quantity,
										'product_name' => $_product->get_name(),
									),
									$_product,
									false
								);

								echo apply_filters( 'woocommerce_cart_item_quantity', $product_quantity, $cart_item_key, $cart_item ); // PHPCS: XSS ok.
								?>
								<!-- <div class="input-group-btn">
									<button class="btn btn-sm btn-primary btn-plus">
										<i class="fa fa-plus"></i>
									</button>
								</div> -->
							</div>
						</td>
						<!-- ДОБАВЛЕНИЕ + И - -->


						<!-- ПОДИТОГ -->
						<td class="product-subtotal align-middle" data-title="<?php esc_attr_e( 'Subtotal', 'woocommerce' ); ?>">
							<?php
								echo apply_filters( 'woocommerce_cart_item_subtotal', WC()->cart->get_product_subtotal( $_product, $cart_item['quantity'] ), $cart_item, $cart_item_key ); // PHPCS: XSS ok.
							?>
							<!-- $150 -->
						</td>
						<!-- ПОДИТОГ -->


						<!--  УДАЛИТЬ ТОВАР-->
						<!-- <td class="align-middle"><button class="btn btn-sm btn-danger"><i class="fa fa-times"></i></button>
						</td> -->
						<td class="product-remove align-middle">
							<?php
								echo apply_filters( // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
									'woocommerce_cart_item_remove_link',
									sprintf(
										'<a href="%s" class="remove btn btn-sm btn-danger" aria-label="%s" data-product_id="%s" data-product_sku="%s"><i class="fa fa-times"></i></a>',
										esc_url( wc_get_cart_remove_url( $cart_item_key ) ),
										esc_html__( 'Remove this item', 'woocommerce' ),
										esc_attr( $product_id ),
										esc_attr( $_product->get_sku() )
									),
									$cart_item_key
								);
							?>
						</td>
						<!--  УДАЛИТЬ ТОВАР-->
					</tr>
				<?php
					}
				}
				?>

				<?php do_action( 'woocommerce_cart_contents' ); ?>
				<?php do_action( 'woocommerce_after_cart_contents' ); ?>
				</tbody>
			</table>

			<!-- КУПОНЫ -->
			<tr>
				<td colspan="6" class="actions">

					<?php if ( wc_coupons_enabled() ) { ?>
						<div class="coupon bg-light p-30 mt-5">
							<label for="coupon_code" class="screen-reader-text"><?php esc_html_e( 'Coupon:', 'woocommerce' ); ?></label> <input type="text" name="coupon_code" class="input-text" id="coupon_code" value="" placeholder="<?php esc_attr_e( 'Coupon code', 'woocommerce' ); ?>" /> <button type="submit" class="button<?php echo esc_attr( wc_wp_theme_get_element_class_name( 'button' ) ? ' ' . wc_wp_theme_get_element_class_name( 'button' ) : '' ); ?>" name="apply_coupon" value="<?php esc_attr_e( 'Apply coupon', 'woocommerce' ); ?>"><?php esc_attr_e( 'Apply coupon', 'woocommerce' ); ?></button>
							<?php do_action( 'woocommerce_cart_coupon' ); ?>
						</div>
					<?php } ?>
				<!-- КУПОНЫ -->

				
				</td>
			</tr>

			<!-- КНОПКА ОБНОВЛЕНИЯ В КОРЗИНЕ -->
			<button type="submit" class="button<?php echo esc_attr( wc_wp_theme_get_element_class_name( 'button' ) ? ' ' . wc_wp_theme_get_element_class_name( 'button' ) : '' ); ?>" name="update_cart" value="<?php esc_attr_e( 'Update cart', 'woocommerce' ); ?>"><?php esc_html_e( 'Update cart', 'woocommerce' ); ?></button>

			<?php do_action( 'woocommerce_cart_actions' ); ?>

			<?php wp_nonce_field( 'woocommerce-cart', 'woocommerce-cart-nonce' ); ?>
						
			<?php do_action( 'woocommerce_after_cart_table' ); ?>
		</form>
		</div><!-- col-lg-8-->


		<div class="col-lg-4">
			
			<?php do_action( 'woocommerce_before_cart_collaterals' );?>
			<?php
				/**
				 * Cart collaterals hook.
				 *
				 * @hooked woocommerce_cross_sell_display
				 * @hooked woocommerce_cart_totals - 10
				 */
				do_action( 'woocommerce_cart_collaterals' );
			?>
		</div><!-- col-lg-4-->
	</div>
</div>
<!-- Cart End -->
<?php do_action( 'woocommerce_after_cart' ); ?>
