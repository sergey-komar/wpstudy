<?php


function woostudy() {

    load_textdomain('woostudy', get_template_directory_uri() . '/languages');//переводы

    add_theme_support('title-tag');
    add_theme_support('custom-logo');
    add_theme_support('post-thumbnails');
    add_theme_support('woocommerce');//ВКЛЮЧАЕМ ПОДДЕРЖКУ woocomerce
    add_theme_support( 'wc-product-gallery-zoom' );
    add_theme_support( 'wc-product-gallery-lightbox' );
    add_theme_support( 'wc-product-gallery-slider' );


    register_nav_menus(
        array(
            'menu-1' => __('Top menu', 'woostudy'),
            'menu-2' => __('Categorys menu', 'woostudy'),
            'menu-3' => __('Navbar menu', 'woostudy')
        )
        );
}
add_action('after_setup_theme', 'woostudy');


add_action('wp_head', function() {
    echo '<link rel="preconnect" href="https://fonts.gstatic.com">';
}, 5);

function woostude_scripts() {
    wp_enqueue_style('woostudy-google-fonts', 'https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap');
    wp_enqueue_style('woostudy-font-awesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css');
    wp_enqueue_style('woostudy-animate', get_template_directory_uri() . '/assets/lib/animate/animate.min.css', [], '2023', 'all');
    wp_enqueue_style('woostudy-owlcarousel', get_template_directory_uri() . '/assets/lib/owlcarousel/assets/owl.carousel.min.css', [], '2023', 'all');
    wp_enqueue_style('woostudy-main', get_template_directory_uri() . '/assets/css/style.min.css', [], '2023', 'all');
    wp_enqueue_style('woostudy-custom', get_template_directory_uri() . '/assets/css/custom.css', [], '2023', 'all');

// ПОДКЛЮЧАЕМ jquery КОТОРЫЙ УСТАНОВЛЕН УЖЕ В WORDPRESS
    wp_enqueue_script('jquery');


    wp_enqueue_script('woostudy-bootstrap', 'https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js', [], 2023, true);
    wp_enqueue_script('woostudy-easing', get_template_directory_uri() . '/assets/lib/easing/easing.min.js', [], 2023, true);
    wp_enqueue_script('woostudy-carousel', get_template_directory_uri() . '/assets/lib/owlcarousel/owl.carousel.min.js', [], 2023, true);
    wp_enqueue_script('woostudy-js', get_template_directory_uri() . '/assets/js/main.js', [], 2023, true);
}
add_action('wp_enqueue_scripts', 'woostude_scripts');



require_once get_template_directory() . '/inc/woocommerce-hooks.php';
require_once get_template_directory() . '/inc/class-woostudy-menu-categorys.php';
require_once get_template_directory() . '/inc/class-woostudy-menu-navbar.php';

function debug( $data ) {
	echo '<pre>' . print_r( $data, 1 ) . '</pre>';
}



// САЙДБАР
function woostudy_widgets_init() {
	register_sidebar(
		array(
			'name' => esc_html__( 'Sidebar', 'woostudy' ),
			'id' => 'sidebar-1',
			'description' => esc_html__( 'Add widgets here.', 'woostudy' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget' => '</section>',
		)
	);
}
add_action( 'widgets_init', 'woostudy_widgets_init' );