<?php
	
// hook into the init action and call create_book_taxonomies when it fires
add_action( 'init', 'create_dossier_tax', 0 );

function create_dossier_tax() {

	$labels = array(
		'name'              => _x( 'Dossiers', 'taxonomy general name' ),
		'singular_name'     => _x( 'Dossier', 'taxonomy singular name' ),
		'search_items'      => __( 'Zoek dossier' ),
		'all_items'         => __( 'Alle dossiers' ),
		'parent_item'       => __( 'Parent dossier' ),
		'parent_item_colon' => __( 'Parent dossier' ),
		'edit_item'         => __( 'Bewerk dossier' ),
		'update_item'       => __( 'Update dossier' ),
		'add_new_item'      => __( 'Nieuwe dossier toevoegen' ),
		'new_item_name'     => __( 'Naam nieuwe dossier' ),
		'menu_name'         => __( 'Dossiers' ),
	);

	$args = array(
		'hierarchical'      => true,
		'labels'            => $labels,
		'show_ui'           => true,
		'show_admin_column' => true,
		'show_in_rest' 			=> true,
		'query_var'         => true,
		'public' => true,
		'rewrite' 			=> array('slug' => 'dossiers')
	);

  register_taxonomy('dossier_categorie', array('dossiers'), $args);

}

add_action('init', 'register_dossier_tags');
function register_dossier_tags() {
	$args = array( 
		'hierarchical' => true,
		'label' => 'Tags',
		'public' => true,
		'rewrite' 					=> array('slug' => 'dossiers-tag', 'with_front' => false )
	);
	register_taxonomy( 'dossier_tags', array( 'dossiers' ), $args );
}



// Set dossiers structure Werk

function wpa_dossier_permalinks( $post_link, $post ){
	if ( is_object( $post ) && $post->post_type == 'dossiers' ){
		$terms = wp_get_object_terms( $post->ID, 'dossier_categorie' );
		if( $terms ){
			return str_replace( '%dossier_categorie%' , $terms[0]->slug , $post_link );
		}
	}
	return $post_link;
}
add_filter( 'post_type_link', 'wpa_dossier_permalinks', 1, 2 );