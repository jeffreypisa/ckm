<?php
 
add_filter('acf/settings/save_json', 'my_acf_json_save_point');
 
function my_acf_json_save_point( $path ) {
    
    // update path
    $path = get_stylesheet_directory() . '/acf-json';
    
    // return
    return $path;
    
}


add_filter('acf/fields/flexible_content/layout_title/name=stroken', 'my_acf_fields_flexible_content_layout_title', 10, 4);
function my_acf_fields_flexible_content_layout_title( $title, $field, $layout, $i ) {

	$oldtitle = $title;
	
	// load text sub field
	if( $text = get_sub_field('titel') ) {
		$title = '';
		$title .= '<strong>' . $oldtitle . ' </strong> | ' . $text;
	} elseif( $text = get_sub_field('lead') ) {
		$title = '';
		$title .= '<strong>' . $oldtitle . ' </strong> | ' . $text;	
	} else {
		$title = '';
		$title .= '<strong>' . $oldtitle . ' </strong>';	
	}
	return $title;
}



add_filter('acf/load_field/name=select_post_type', 'yourprefix_acf_load_post_types');
/*
 *  Load Select Field `select_post_type` populated with the value and labels of the singular 
 *  name of all public post types
 */
function yourprefix_acf_load_post_types( $field ) {

	$choices = get_post_types( array( 'show_in_nav_menus' => true ), 'objects' );

	foreach ( $choices as $post_type ) :
		$field['choices'][$post_type->name] = $post_type->labels->name;
	endforeach;
	return $field;
}