<?php // Our custom post type function
  
  
function create_posttype() {
	register_post_type( 'dossiers',
	// CPT Options
		array(
			'labels' => array(
				'name'                  => __( 'Dossiers' ),
				'singular_name'         => __( 'Dossier' ),
				'all_items'             => __( 'Alle dossiers' ),
				'add_new_item'          => __( 'Nieuw dossier toevoegen' ),
				'new_item'              => __( 'Nieuw dossier' ),
				'add_new'               => __( 'Nieuw dossier' ),
				'edit_item'             => __( 'Bewerk dossier' ),
				'update_item'           => __( 'Update dossier' ),
				'view_item'             => __( 'Bekijk dossier' ),
				'search_items'          => __( 'Zoek dossier' ),
			),
			'menu_icon'           		=> 'dashicons-portfolio',
			'public' 					=> true,
			'show_in_rest' 				=> true,
			'has_archive'             	=> true,
			'supports'                	=> array( 'title', 'editor', 'thumbnail' ),
			'rewrite' 					=> array( 'slug' => 'dossiers')
		)
	);
	
	register_post_type( 'verhalen',
	// CPT Options
		array(
			'labels' => array(
				'name'                  => __( 'Verhalen' ),
				'singular_name'         => __( 'Verhaal' ),
				'all_items'             => __( 'Alle verhalen' ),
				'add_new_item'          => __( 'Nieuw verhaal toevoegen' ),
				'new_item'              => __( 'Nieuw verhaal' ),
				'add_new'               => __( 'Nieuw verhaal' ),
				'edit_item'             => __( 'Bewerk verhaal' ),
				'update_item'           => __( 'Update verhaal' ),
				'view_item'             => __( 'Bekijk verhaal' ),
				'search_items'          => __( 'Zoek verhaal' ),
			),
			'menu_icon'           		=> 'dashicons-megaphone',
			'public' 					=> true,
			'show_in_rest' 				=> true,
			'has_archive'             	=> true,
			'supports'                	=> array( 'title', 'editor', 'thumbnail' ),
			'rewrite' 					=> array( 'slug' => 'verhalen')
		)
	);

				
}
// Hooking up our function to theme setup
add_action( 'init', 'create_posttype' ); 

?>