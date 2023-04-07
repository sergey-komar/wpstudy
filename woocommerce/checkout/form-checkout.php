<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
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


 <!-- If checkout registration is disabled and not logged in, the user cannot checkout. -->
<?php if ( ! $checkout->is_registration_enabled() && $checkout->is_registration_required() && ! is_user_logged_in() ):?>
	<div class="container-fluid">
		<div class="row px-xl-5">
			<div class="col-12">
			<?php
			echo esc_html( apply_filters( 'woocommerce_checkout_must_be_logged_in_message', __( 'You must be logged in to checkout.', 'woocommerce' ) ) );
			?>
			</div>
		</div>
	</div>
<?php return;?>
<?php endif;?>
<div class="container-fluid">
		<div class="row px-xl-5">
			<div class="col-12">
			<?php do_action( 'woocommerce_before_checkout_form', $checkout );?>
			</div><!--col-12 -->
		</div><!--row px-xl-5 -->

	<form name="checkout" method="post" class="checkout woocommerce-checkout" action="<?php echo esc_url( wc_get_checkout_url() ); ?>" enctype="multipart/form-data">
		<div class="row px-xl-5">
		<?php if ( $checkout->get_checkout_fields() ) : ?>
			<div class="col-lg-8">
				<?php do_action( 'woocommerce_checkout_before_customer_details' ); ?>

			<div class="bg-light p-30 mt-5">
				<?php do_action( 'woocommerce_checkout_billing' ); ?>

				<?php do_action( 'woocommerce_checkout_shipping' ); ?>
			</div><!--bg-light p-30 mb-5 -->

			<?php do_action( 'woocommerce_checkout_after_customer_details' ); ?>
			</div><!--col-lg-8 -->
		<?php endif;?>

		
			<div class="col-lg-4">
				<?php do_action( 'woocommerce_checkout_before_order_review_heading' ); ?>

				<?php do_action( 'woocommerce_checkout_before_order_review' ); ?>

				<div class="bg-light p-30 mt-5">
					<?php do_action( 'woocommerce_checkout_order_review' ); ?>
				</div><!--bg-light p-30 mb-5 -->
				

				<?php do_action( 'woocommerce_checkout_after_order_review' ); ?>
			</div><!--col-lg-4-->

		</div><!--row px-xl-5 -->
	</form>
	<?php do_action( 'woocommerce_after_checkout_form', $checkout ); ?>
</div><!--container-fluid -->



<?php
return;
do_action( 'woocommerce_before_checkout_form', $checkout );

// If checkout registration is disabled and not logged in, the user cannot checkout.
if ( ! $checkout->is_registration_enabled() && $checkout->is_registration_required() && ! is_user_logged_in() ) {
	echo esc_html( apply_filters( 'woocommerce_checkout_must_be_logged_in_message', __( 'You must be logged in to checkout.', 'woocommerce' ) ) );
	return;
}

?>

<form name="checkout" method="post" class="checkout woocommerce-checkout" action="<?php echo esc_url( wc_get_checkout_url() ); ?>" enctype="multipart/form-data">

	<?php if ( $checkout->get_checkout_fields() ) : ?>

		<?php do_action( 'woocommerce_checkout_before_customer_details' ); ?>

		<div class="col2-set" id="customer_details">
			<div class="col-1">
				<?php do_action( 'woocommerce_checkout_billing' ); ?>
			</div>

			<div class="col-2">
				<?php do_action( 'woocommerce_checkout_shipping' ); ?>
			</div>
		</div>

		<?php do_action( 'woocommerce_checkout_after_customer_details' ); ?>

	<?php endif; ?>

	
	<?php do_action( 'woocommerce_checkout_before_order_review_heading' ); ?>
	
	<h3 id="order_review_heading"><?php esc_html_e( 'Your order', 'woocommerce' ); ?></h3>
	
	<?php do_action( 'woocommerce_checkout_before_order_review' ); ?>

	<div id="order_review" class="woocommerce-checkout-review-order">
		<?php do_action( 'woocommerce_checkout_order_review' ); ?>
	</div>

	<?php do_action( 'woocommerce_checkout_after_order_review' ); ?>

</form>

<?php do_action( 'woocommerce_after_checkout_form', $checkout ); ?>
