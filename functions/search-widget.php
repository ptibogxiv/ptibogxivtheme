<?php

function ptibogxivtheme_search_form( $form ) {
$form = '<form role="search" method="get" id="searchform" action="' . home_url('/') . '" ><div class="input-group"><input type="text" class="form-control" name="s" id="s" placeholder="' . esc_attr__('Your search', 'ptibogxivtheme') . '" aria-label="Search for..." aria-describedby="search-widget">
<button class="btn btn-primary" type="submit" id="searchsubmit" ><i class="fas fa-search"></i></button></div></form>';
return $form;
}
add_filter( 'get_search_form', 'ptibogxivtheme_search_form' );
