<?php

// ССЫЛКА РЕЙТИНГ ОТЗЫВОВ НА СТРАНИЦЕ ОДНОГО ТОВАРА ВВЕРХУ ГДЕ ПОКАЗЫВАЮТСЯ ЗВЁЗДЫ В СКОБОЧКАХ НАПИСАННО СКОЛЬКО ОТЗЫВОВ. еСЛИ НЕ НАДО ТО УДАЛЯЕМ ЭТО ТО ЕСТЬ УДАЛЯЕМ САМУ ССЫЛКУ ЧТО БЫ НЕ ПЕРЕХОДИЛО УДАЛЯЕМ ТЕГ A <a href="#reviews" class="woocommerce-review-link" rel="nofollow">(<?php printf( _n( '%s customer review', '%s customer reviews', $review_count, 'woocommerce' ), '<span class="count">' . esc_html( $review_count ) . '</span>' ); </a>


if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

global $product;

if ( ! wc_review_ratings_enabled() ) {
	return;
}

$rating_count = $product->get_rating_count();
$review_count = $product->get_review_count();
$average      = $product->get_average_rating();

if ( $rating_count > 0 ) : ?>

	<div class="woocommerce-product-rating">
		<?php echo wc_get_rating_html( $average, $rating_count ); // WPCS: XSS ok. ?>
		<?php if ( comments_open() ) : ?>
			<?php //phpcs:disable ?>
			(<?php printf( _n( '%s customer review', '%s customer reviews', $review_count, 'woocommerce' ), '<span class="count">' . esc_html( $review_count ) . '</span>' ); ?>)
			<?php // phpcs:enable ?>
		<?php endif ?>
	</div>

<?php endif; ?>
