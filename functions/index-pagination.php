<?php

// Bootstrap pagination for index and category pages

// Correction et amélioration de la fonction de pagination
if ( ! function_exists( 'ptibogxivtheme_pagination' ) ) {

	function ptibogxivtheme_pagination() {

		global $wp_query;

		$big = 999999999; // Nombre improbable pour remplacer dans les liens

		// Générer les liens de pagination
		$paginate_links = paginate_links( array(
			'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link($big) ) ),
			'format' => '?paged=%#%',
			'current' => max( 1, get_query_var('paged') ),
			'total' => $wp_query->max_num_pages,
			'mid_size' => 2,
			'prev_next' => true,
			'prev_text' => __('<i class="fas fa-angle-left"></i> Newer', 'ptibogxivtheme'),
			'next_text' => __('Older <i class="fas fa-angle-right"></i>', 'ptibogxivtheme'),
			'type' => 'array'
		) );

		// Vérifier si des liens de pagination existent
		if ( $paginate_links ) {
			echo '<nav aria-label="Page navigation example">';
			echo '<ul class="pagination justify-content-center">';

			foreach ( $paginate_links as $link ) {
				if ( strpos( $link, 'current' ) !== false ) {
					echo '<li class="page-item active" aria-current="page">' . str_replace( 'page-numbers', 'page-link', $link ) . '</li>';
				} elseif ( strpos( $link, 'dots' ) !== false ) {
					echo '<li class="page-item disabled"><span class="page-link">' . $link . '</span></li>';
				} else {
					echo '<li class="page-item">' . str_replace( 'page-numbers', 'page-link', $link ) . '</li>';
				}
			}

			echo '</ul>';
			echo '</nav>';
		}
	}
}