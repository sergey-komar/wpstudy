<?php

// ОТКЛЮЧАЕМ ВСЕ СТИЛИ woocommerce
add_filter( 'woocommerce_enqueue_styles', '__return_empty_array' );

// СПИСОК КАТЕГОРИЙ ТОВАРОВ НА ГЛАВНОЙ СТРАНИЦЕ
remove_action('woocommerce_shop_loop_subcategory_title', 'woocommerce_template_loop_category_title', 10);
add_action('woocommerce_shop_loop_subcategory_title', function($category) {
    echo '<h6>' . esc_html($category->name) . '</h6>';
    echo '<small class="text-body">' . $category->count . __(' Products') . '</small>';
});




// КАРТОЧКА ТОВАРА НА СТРАНИЦЕ ГЛАВНАЯ БЛОК featured
remove_action('woocommerce_before_shop_loop_item', 'woocommerce_template_loop_product_link_open', 10);
remove_action('woocommerce_after_shop_loop_item', 'woocommerce_template_loop_product_link_close', 5);



// НАЗВАНИЕ ТОВАРА В КАРТОЧКЕ ТОВАРА
remove_action('woocommerce_shop_loop_item_title', 'woocommerce_template_loop_product_title');
add_action('woocommerce_shop_loop_item_title', function() {
    // https://woocommerce.github.io/code-reference/classes/WC-Product.html
    global $product;
    echo '<a class="h6 text-decoration-none text-truncate" href="'. $product->get_permalink() .'">' . $product->get_title() . '</a>';
});

// РЕЙТИНГ
remove_action('woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_rating', 5);



// ОБНОВЛЕНИЕ МИНИ КОРЗИНИ ajax
add_filter('woocommerce_add_to_cart_fragments', function($fragments) {

$fragments['.mini-cart-cnt'] = '
    <span class="badge text-secondary border border-secondary rounded-circle mini-cart-cnt"style="padding-bottom: 2px;">' . count(WC()->cart->get_cart()) . '</span>';
    
return $fragments;
});



//СТРАНИЦА МАГАЗИНА
//хлебные крошки
remove_action('woocommerce_before_main_content', 'woocommerce_breadcrumb', 20);
add_filter( 'woocommerce_breadcrumb_defaults', function() {
	return array(
		'delimiter'   => '&nbsp;/&nbsp;',
		'wrap_before' => '<nav class="breadcrumb bg-light mb-30">',
		'wrap_after'  => '</nav>',
		'before'      => '',
		'after'       => '',
		'home'        => __( 'Home', 'woostudy' ),
	);
} );
//УВЕДОМЛЕНИЯ НА АРХИВНОЙ СТРАНИЦЕ
remove_action('woocommerce_before_shop_loop', 'woocommerce_output_all_notices', 10);


// ОТКРЯПЛЯЕМ САЙДБАР НА СТРАНИЦЕ ОДНОГО ТОВАРА
add_action('template_redirect', function() {
	if(is_product()){
		remove_action('woocommerce_sidebar', 'woocommerce_get_sidebar', 10);
	}
});




//СТРАНИЦА ОДНОГО ТОВАРА
remove_action('woocommerce_before_single_product_summary', 'woocommerce_show_product_sale_flash', 10);

remove_action('woocommerce_after_single_product_summary', 'woocommerce_output_related_products', 20);

remove_action('woocommerce_after_single_product_summary', 'woocommerce_upsell_display', 15);


// СТРАНИЦА ОФОРМЛЕНИЯ ЗАКАЗА
// https://woocommerce.com/document/tutorial-customising-checkout-fields-using-actions-and-filters/
// УБИРАЕМ ПОЛЕ КРЫЛО,ПОДЪЕЗД,ЭТАЖ И НАЗВАНИЕ КОМПАНИИ
add_filter( 'woocommerce_default_address_fields' , function ( $fields ) {
	unset( $fields['address_2']);
	unset( $fields['company']);
	return $fields;
	
} );
 
