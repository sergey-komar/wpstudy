<?php

//  ЦЕНА В КАРТОЧКЕ ТОВАРА
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}


global $product;
?>

<?php if ( $price_html = $product->get_price_html() ) : ?>
    <div class="d-flex align-items-center justify-content-center mt-2">
        <span class="price"><?php echo $price_html; ?></span>
    </div>
<?php endif; ?>
