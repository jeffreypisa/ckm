<?php

	add_action('after_setup_theme', 'emonks_register_nav_menus');

	function emonks_register_nav_menus() {
		register_nav_menu('menu_1', __('menu 1'));
		register_nav_menu('menu_2', __('menu 2'));
		register_nav_menu('menu_3', __('menu 3'));
		register_nav_menu('menu_4', __('menu 4'));
		register_nav_menu('footermenu', __('Footermenu'));
	}