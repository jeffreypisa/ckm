<?php

// hide flexible field stroken

function acf_admin_head_layout() {

	if( function_exists("get_field") ) {
		
		include 'modules/achtergrond.php';
		include 'modules/banner.php';
		include 'modules/content.php';
		include 'modules/afbeelding.php';
		include 'modules/cta.php';
		include 'modules/logos.php';
		include 'modules/instellingen.php';
		
		/* Remove borders on li since we not removing li's  */
		if( get_field('dev_mode', 'options') ) {}
		
		else {
			?>
			<style>
				.acf-tab-button[data-key="field_639088d9e29ba"],
				.acf-tab-button[data-key="field_6388ca86924da"],
				.acf-tab-button[data-key="field_638c6bca91b74"] {
					display: none;
				}
			</style>
			<?php
		}
	}
}
add_action('acf/input/admin_head', 'acf_admin_head_layout');