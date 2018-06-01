<?php



// Bootstrap pagination for split posts / split pages

// Copied and modified from: https://gist.github.com/ebinnion/7635465



add_filter('wp_link_pages', 'b4st_wp_link_pages');



function b4st_wp_link_pages($wp_links){

	global $post;



	// Generate current page base url without pagination

	$post_base = trailingslashit( get_site_url(null, $post->post_name) );

	$wp_links = trim(str_replace(array('<p class="page-links">Pages: ', '</p>'), '', $wp_links));



	// Get out of here ASAP if there is no paging

  if ( empty($wp_links) )

		return '';

    // Split at spaces

    $splits = explode(' ', $wp_links );

    $links = array();

    $current_page = 1;



  // Since links are now split up such that <a and href='.+' are seperate, loop over split array and correct the links

	foreach( $splits as $key => $split ){

		if( is_numeric($split) ) {

			$links[] = $split;

			$current_page = $split;

		} else if ( strpos($split, 'href') === false ) {

			$links[] = $split . ' ' . $splits[$key + 1];

		}

	}

	$num_pages = count($links);



	// Output pagination

	$output = '';



  // Page status

  $output .= '<br><hr>';

  $output .= '<p class="text-muted"><big><em>Page ' . $current_page . ' of ' . $num_pages . '</em></big></p>';



  // Start the pagination list

	$output .= '<ul class="pagination">';



  // Fastbackward to first page in series

	if ( $current_page > 2 )

	$output .= '<li class="page-item"><a class="page-link" href="' . $post_base . '"><i class="fas fa-angle-double-left"></i></a></li>';



  // Backward to previous page in series

	if ( $current_page > 1 )

		$output .= '<li class="page-item"><a class="page-link" href="' . $post_base . ($current_page - 1) . '"><i class="fas fa-angle-left"></i></a></li>';



  // Loop through links to each page in series

  foreach( $links as $key => $link ) {

    $temp_key = $key + 1;

    if ( $current_page == $temp_key )

      $output .= '<li  class="page-item active"><a class="page-link" href="' . $post_base . $temp_key . '">' . $temp_key . '</a></li>';

    else

      $output .= '<li  class="page-item"><a class="page-link" href="' . $post_base . $temp_key . '">' . $temp_key . '</a></li>';

	}



  // Forward to next page in series

	if ( $current_page < $num_pages )

		$output .= '<li class="page-item"><a class="page-link" href="' . $post_base . ($current_page + 1) . '"><i class="fas fa-angle-right"></i></a></li>';



  // Fastforward to last page in series

  if ( $current_page < ($num_pages - 1) )

    $output .= '<li class="page-item"><a class="page-link" href="' . $post_base . $num_pages . '"><i class="fas fa-angle-double-right"></i></a></li>';



  // Complete the pagination list

	$output .= '</ul>';

	return $output;

}
