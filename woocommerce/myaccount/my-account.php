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

<div class="container-fluid">
	<div class="row px-xl-5">

		<div class="col-md-3">
			<div class="bg-light p-30 mb-5 h-100">
				<?php do_action( 'woocommerce_account_navigation' ); ?>
			</div><!--bg-light p-30 mb-5 -->
		</div>

		<div class="col-md-9">
			<div class="bg-light p-30 mb-5 h-100">
				<?php do_action( 'woocommerce_account_content' );?>
			</div><!--bg-light p-30 mb-5 -->
		
		</div>
	</div>
</div>



