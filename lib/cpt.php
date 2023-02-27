<?php // Our custom post type function
	function create_posttype() {
		register_post_type( 'dossiers',
		// CPT Options
			array(
				'labels' => array(
					'name'                  => __( 'Artikelen' ),
					'menu_name'             => __( 'Dossiers' ),
					'singular_name'         => __( 'Artikel' ),
					'all_items'             => __( 'Alle artikelen' ),
					'add_new_item'          => __( 'Nieuw artikel toevoegen' ),
					'new_item'              => __( 'Nieuw artikel' ),
					'add_new'               => __( 'Nieuw artikel' ),
					'edit_item'             => __( 'Bewerk artikel' ),
					'update_item'           => __( 'Update artikel' ),
					'view_item'             => __( 'Bekijk artikel' ),
					'search_items'          => __( 'Zoek artikel' ),
				),
				'menu_icon'           		=> 'dashicons-portfolio',
				'public' 					=> true,
				'show_in_rest' 				=> true,
				'has_archive'             	=> false,
				'supports'                	=> array( 'title', 'editor', 'thumbnail', 'custom-fields' ),
				'rewrite' 					=> array( 	'slug' 			=> 'dossiers/%dossier_categorie%', 
				'with_front' 	=> false ),
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
				'supports'                	=> array( 'title', 'editor', 'thumbnail', 'custom-fields' ),
				'rewrite' 					=> array( 'slug' => 'verhalen')
			)
		);
		
		register_post_type( 'onderzoeken',
		// CPT Options
			array(
				'labels' => array(
					'name'                  => __( 'Onderzoeken' ),
					'singular_name'         => __( 'Onderzoek' ),
					'all_items'             => __( 'Alle het onderzoek' ),
					'add_new_item'          => __( 'Nieuw onderzoek toevoegen' ),
					'new_item'              => __( 'Nieuw onderzoek' ),
					'add_new'               => __( 'Nieuw onderzoek' ),
					'edit_item'             => __( 'Bewerk onderzoek' ),
					'update_item'           => __( 'Update onderzoek' ),
					'view_item'             => __( 'Bekijk onderzoek' ),
					'search_items'          => __( 'Zoek onderzoek' ),
				),
				'menu_icon'           		=> 'dashicons-search',
				'public' 					=> true,
				'show_in_rest' 				=> true,
				'has_archive'             	=> true,
				'supports'                	=> array( 'title', 'editor', 'thumbnail', 'custom-fields' ),
				'rewrite' 					=> array( 'slug' => 'onderzoeken')
			)
		);
		
		register_post_type( 'auteurs',
		// CPT Options
			array(
				'labels' => array(
					'name'                  => __( 'Auteurs' ),
					'singular_name'         => __( 'Auteur' ),
					'all_items'             => __( 'Alle auteurs' ),
					'add_new_item'          => __( 'Nieuwe auteur toevoegen' ),
					'new_item'              => __( 'Nieuwe auteur' ),
					'add_new'               => __( 'Nieuwe auteur' ),
					'edit_item'             => __( 'Bewerk auteur' ),
					'update_item'           => __( 'Update auteur' ),
					'view_item'             => __( 'Bekijk auteur' ),
					'search_items'          => __( 'Zoek auteur' ),
				),
				'menu_icon'           		=> 'dashicons-edit-large',
				'public' 					=> true,
				'show_in_rest' 				=> true,
				'has_archive'             	=> false,
				'supports'                	=> array( 'title', 'editor', 'thumbnail' ),
				'rewrite' 					=> array( 'slug' => 'auteurs')
			)
		);
		
		register_post_type( 'team',
		// CPT Options
			array(
				'labels' => array(
					'name'                  => __( 'Team' ),
					'singular_name'         => __( 'Teamlid' ),
					'all_items'             => __( 'Alle teamleden' ),
					'add_new_item'          => __( 'Nieuw teamlid toevoegen' ),
					'new_item'              => __( 'Nieuw teamlid' ),
					'add_new'               => __( 'Nieuw teamlid' ),
					'edit_item'             => __( 'Bewerk teamlid' ),
					'update_item'           => __( 'Update teamlid' ),
					'view_item'             => __( 'Bekijk teamlid' ),
					'search_items'          => __( 'Zoek teamlid' ),
				),
				'menu_icon'           		=> 'dashicons-groups',
				'public' 					=> true,
				'show_in_rest' 				=> true,
				'has_archive'             	=> false,
				'supports'                	=> array( 'title', 'editor', 'thumbnail', 'custom-fields' )
			)
		);
	
					
	}
	// Hooking up our function to theme setup
	add_action( 'init', 'create_posttype' ); 
?>