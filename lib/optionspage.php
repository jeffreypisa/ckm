<?php
  
  if( function_exists('acf_add_options_page') ) {
  	
  	$websiteopties = array(
	
    	/* (string) The title displayed on the options page. Required. */
    	'page_title' => 'Options',
    	
    	/* (string) The title displayed in the wp-admin sidebar. Defaults to page_title */
    	'menu_title' => 'Thema Opties',
    	
    	/* (string) The URL slug used to uniquely identify this options page. 
    	Defaults to a url friendly version of menu_title */
    	'menu_slug' => 'acf-options-thema-opties',
    	
    	/* (string) The icon class for this menu. Defaults to default WordPress gear.
    	Read more about dashicons here: https://developer.wordpress.org/resource/dashicons/ */
    	'icon_url' => 'dashicons-desktop',
    	
    	/* (boolean) If set to true, this options page will redirect to the first child page (if a child page exists). 
    	If set to false, this parent page will appear alongside any child pages. Defaults to true */
    	'redirect' => true,
    	
    	/* (int|string) The '$post_id' to save/load data to/from. Can be set to a numeric post ID (123), or a string ('user_2'). 
    	Defaults to 'options'. Added in v5.2.7 */
    	'post_id' => 'options',
    			
    );
    
  	acf_add_options_page($websiteopties);
    
    acf_add_options_sub_page(array(
        'page_title'    => 'Huisstijl',
        'menu_title'    => 'Huisstijl',
        'parent_slug'   => 'acf-options-thema-opties',
    ));
    
    acf_add_options_sub_page(array(
        'page_title'    => 'Header',
        'menu_title'    => 'Header',
        'parent_slug'   => 'acf-options-thema-opties',
    ));
    
    acf_add_options_sub_page(array(
        'page_title'    => 'Footer',
        'menu_title'    => 'Footer',
        'parent_slug'   => 'acf-options-thema-opties',
    ));
    
    acf_add_options_sub_page(array(
        'page_title'    => 'Sociale Media',
        'menu_title'    => 'Sociale Media',
        'parent_slug'   => 'acf-options-thema-opties',
    ));
    
    acf_add_options_sub_page(array(
        'page_title'    => 'Donatie',
        'menu_title'    => 'Donatie',
        'parent_slug'   => 'acf-options-thema-opties',
    ));
    
    acf_add_options_sub_page(array(
        'page_title'    => 'Navigatie',
        'menu_title'    => 'Navigatie',
        'parent_slug'   => 'acf-options-thema-opties',
    ));
    
    acf_add_options_sub_page(array(
        'page_title'    => 'Zoeken',
        'menu_title'    => 'Zoeken',
        'parent_slug'   => 'acf-options-thema-opties',
    ));
    
    acf_add_options_sub_page(array(
        'page_title'    => 'Berichttype',
        'menu_title'    => 'Berichttype',
        'parent_slug'   => 'acf-options-thema-opties',
    ));

  	add_filter( 'timber_context', 'mytheme_timber_context'  );
  
    function mytheme_timber_context( $context ) {
        $context['options'] = get_fields('option');
        $context['themeurl'] = get_template_directory_uri();
        return $context;
    }
  	
  }