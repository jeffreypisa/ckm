<?php

// Set Session
function session_init() {
	if (!session_id()) {
		session_start();
	}
}
add_action( 'init', 'session_init' );

add_action( 'init', 'set_session');

function set_session() {
	$kleur = '';
	
	if ( ! isset( $_SESSION['kleur'] ) ) {
			
		// Get the repeater field
		$repeater = get_field( 'kleuren_palette', 'options' );

		shuffle( $repeater );
		$random_slice = array_slice( $repeater, 0, 1 );
		
		foreach( $random_slice as $subfield ) {
			$kleur = $subfield['kleur'];
		}
		
		$_SESSION["kleur"] = $kleur;
		
	} else {
		
		$kleur = $_SESSION["kleur"];
		
	}
	
	// Add active state branche to timber
	
	add_filter( 'timber/context', function ( $context ) {
		
		$kleur = $_SESSION["kleur"];
		
		$context['kleur'] = $kleur;	
		return $context;
	
	} );

}