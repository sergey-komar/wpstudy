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
    echo '<a class="h6 text-decoration-none text-truncate" id="myBtn" href="'. $product->get_permalink() .'">' . $product->get_title() . '</a>';
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



//ПРОБУЮ ДОБАВИТЬ КАРТОЧКУ ТОВАРА В МОДАЛЬНОЕ ОКНО ПРИ КЛИКЕ НА ТОВАР 
// add_action('wp_ajax_show_product', 'show_product_callback_wp');
// add_action( 'wp_ajax_nopriv_show_product', 'show_product_callback_wp' );
// function show_product_callback_wp() {
//      $url = $_POST['url'];
//      $product_id = url_to_postid( $url );

//     // product content
//      $content_post = get_post($product_id);
//     $content = $content_post->post_content;
//     $content = apply_filters('the_content', $content);
//     $content = str_replace(']]>', ']]&gt;', $content);

//      $output = "";
// 	$output .= get_the_post_thumbnail( $product_id, 'medium');
//      $output .= $content;
	 
//      echo $output;

	  
//      exit(); 
// }
 
//ПРОБУЮ ДОБАВИТЬ КАРТОЧКУ ТОВАРА В МОДАЛЬНОЕ ОКНО ПРИ КЛИКЕ НА ТОВАР  Это именно для вукомерс и продукта
add_action('wp_ajax_show_product', 'show_product_callback_wp');
add_action( 'wp_ajax_nopriv_show_product', 'show_product_callback_wp' );
function show_product_callback_wp() {
     $url = $_POST['url'];
     $product_id = url_to_postid( $url );

    // product content
	$content_post = wc_get_product($product_id);
	
	$cart_img= get_the_post_thumbnail( $product_id, 'medium');

    echo '<test3>';
	echo '<test>' . $content_post->name . '</test>';
	echo '<test1>' . $content_post->price . '</test1>';
    echo '<test2>' . $cart_img . '</test2>';
	echo '</test3>';

	echo '<test4>' . 111111  . '</test4>';
	  debug($content_post);
     exit(); 
}

 
