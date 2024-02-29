<?php

// ПАГИНАЦИЯ НА СТРАНИЦЕ МАГАЗИНА



if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$total   = isset( $total ) ? $total : wc_get_loop_prop( 'total_pages' );
$current = isset( $current ) ? $current : wc_get_loop_prop( 'current_page' );
$base    = isset( $base ) ? $base : esc_url_raw( str_replace( 999999999, '%#%', remove_query_arg( 'add-to-cart', get_pagenum_link( 999999999, false ) ) ) );
$format  = isset( $format ) ? $format : '';

if ( $total <= 1 ) {
	return;
}
?>
<div class="col-12">
	<nav class="woocommerce-pagination">
		<?php
		echo paginate_links(
			apply_filters(
				'woocommerce_pagination_args',
				array( // WPCS: XSS ok.
					'base'      => $base,
					'format'    => $format,
					'add_args'  => false,
					'current'   => max( 1, $current ),
					'total'     => $total,
					'prev_text' => 'Назад',
					'next_text' => 'Вперёд',
					'type'      => 'list',
					'end_size'  => 3,
					'mid_size'  => 3,
				)
			)
		);
		?>
	</nav>
</div>

