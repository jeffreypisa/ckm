<?php 
function custom_query_vars_filter($vars) {
	$vars[] = 'search_type';
	return $vars;
}
add_filter( 'query_vars', 'custom_query_vars_filter' );