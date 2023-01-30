<?php


function post_remove ()      //creating functions post_remove for removing menu item
{ 
   remove_menu_page('edit.php');
}

add_action('admin_menu', 'post_remove');   //adding action for triggering function call


function remove_h1_from_heading($args) {
	// Just omit h1 from the list
	$args['block_formats'] = 'Paragraph=p;Heading 2=h2;Heading 3=h3;Heading 4=h4;Heading 5=h5;Heading 6=h6;Pre=pre';
	return $args;
}
add_filter('tiny_mce_before_init', 'remove_h1_from_heading' );


// hide comments

// Removes from admin menu
add_action( 'admin_menu', 'my_remove_admin_menus' );
function my_remove_admin_menus() {
	remove_menu_page( 'edit-comments.php' );
}
// Removes from post and pages
add_action('init', 'remove_comment_support', 100);

function remove_comment_support() {
	remove_post_type_support( 'post', 'comments' );
	remove_post_type_support( 'page', 'comments' );
}
// Removes from admin bar
function mytheme_admin_bar_render() {
	global $wp_admin_bar;
	$wp_admin_bar->remove_menu('comments');
}
add_action( 'wp_before_admin_bar_render', 'mytheme_admin_bar_render' );

/*
* Add columns to agenda post list
*/
function my_manage_agenda_columns( $columns )
{
	// save date to the variable
	$date = $columns['date'];
	// unset the 'date' column
	unset( $columns['date'] ); 
	// unset any column when necessary
	// unset( $columns['comments'] );

	// add your column as new array element and give it table header text
	$columns['datum'] = __('Datum');

	$columns['date'] = $date; // set the 'date' column again, after the custom column

	return $columns;
}

function my_set_sortable_columns( $columns )
{
	$columns['datum'] = 'datum';
	return $columns;
}

function my_populate_custom_columns( $column, $post_id )
{
	switch ( $column ) {
		case 'datum':
			$original_date = get_post_meta($post_id, 'datum', true);
			$timestamp = strtotime($original_date);
			$new_date = date("d M Y", $timestamp);
			echo $new_date;
			
			break;
		case 'MAYBE_ANOTHER_CUSTOM_COLUMN':
			// additional code
			break;
	}
}

function my_sort_custom_column_query( $query )
{
	$orderby = $query->get( 'orderby' );

	if ( 'datum' == $orderby ) {

		$meta_query = array(
			'relation' => 'OR',
			array(
				'key' => 'datum',
				'compare' => 'NOT EXISTS', // see note above
			),
			array(
				'key' => 'datum',
			),
		);

		$query->set( 'meta_query', $meta_query );
		$query->set( 'orderby', 'meta_value' );
	}
}

global $pagenow;

if ( is_admin() && 'edit.php' == $pagenow && 'agenda' == $_GET['post_type'] ) {

	// manage colunms
	add_filter( 'manage_agenda_posts_columns', 'my_manage_agenda_columns' );

	// make columns sortable
	add_filter( 'manage_edit-agenda_sortable_columns', 'my_set_sortable_columns' );

	// populate column cells
	add_action( 'manage_agenda_posts_custom_column', 'my_populate_custom_columns', 10, 2 );

	// set query to sort
	add_action( 'pre_get_posts', 'my_sort_custom_column_query' );
}