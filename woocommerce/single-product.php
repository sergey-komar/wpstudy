<?php
// СТРАНИЦА НА КОТОРОЙ КАРТОЧКА ОТДЕЛЬНОГО ТОВАРА 
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

get_header( 'shop' ); 
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

		<?php
			/**
			 * woocommerce_before_main_content hook.
			 *
			 * @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
			 * @hooked woocommerce_breadcrumb - 20
			 */
			do_action( 'woocommerce_before_main_content' );
		?>


		<?php while ( have_posts() ) : ?>
				<?php the_post(); ?>

				<?php wc_get_template_part( 'content', 'single-product' ); ?>

			<?php endwhile; // end of the loop. ?>

		<?php
			/**
			 * woocommerce_after_main_content hook.
			 *
			 * @hooked woocommerce_output_content_wrapper_end - 10 (outputs closing divs for the content)
			 */
			do_action( 'woocommerce_after_main_content' );
		?>


		<?php
				/**
				 * woocommerce_sidebar hook.
				 *
				 * @hooked woocommerce_get_sidebar - 10
				 */
				do_action( 'woocommerce_sidebar' );
		?>


<?php get_footer('shop');?>

