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


// Blockquote style

add_action('admin_head', 'admin_styles');

function admin_styles() {
	?>
	<style>
		.mce-edit-area blockquote{
			border-left: 4px solid #000;
		}
	</style>
	<?php
}
 
remove_filter( 'posts_request', 'relevanssi_prevent_default_request' ); 
remove_filter( 'posts_pre_query', 'relevanssi_query', 99 );

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

add_filter( 'pll_admin_languages_filter', function ( $adminBarLanguages ) {
	global $pagenow;
	if ( $pagenow === 'admin.php' && isset( $_GET['page'] ) && $_GET['page'] === 'acf-options' ) {
		unset( $adminBarLanguages[0] );
	}

	return $adminBarLanguages;
} );

// Character fix
remove_filter('the_content', 'wptexturize');
remove_filter('the_excerpt', 'wptexturize');