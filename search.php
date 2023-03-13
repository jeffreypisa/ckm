<?php
/**
 * Search results page
 *
 * Methods for TimberHelper can be found in the /lib sub-directory
 *
 * @package  WordPress
 * @subpackage  Timber
 * @since   Timber 0.1
 */

// Set the Twig template files to use for rendering the search results page
 $templates = array( 'search.twig', 'archive.twig', 'index.twig' );
 
 // Get the current search query
 $search_query = get_search_query();
 
 // Set the context for Timber to use in rendering the search results page
 $context = Timber::get_context();
 $context['searchquery'] = $search_query;
 $context['title'] = "Search results for '". $search_query ."'";
 
 // Use a custom WP_Query to fetch search results from all post types
 $search_results = new WP_Query( array(
     's'              => $search_query,
     'post_type'      => array( 'dossiers', 'verhalen', 'onderzoeken', 'team' ),
 ) );
 
 // Check if there are any search results for the post types
 if ( $search_results->have_posts() ) {
     // Add the search results to the context
     $context['posts'] = Timber::get_posts( $search_results );
 } else {
     // If there are no search results for the post types, perform a separate search for the custom taxonomies
     $custom_taxonomy_results = new WP_Query( array(
         's'              => $search_query,
         'post_type'      => array( 'dossiers', 'verhalen', 'onderzoeken', 'team' ),
         'tax_query'      => array(
             'relation' => 'OR',
             array(
                 'taxonomy' => 'dossier_categorie', // Replace with the slug of your custom category taxonomy
                 'field'    => 'name',
                 'terms'    => $search_query,
             ),
             array(
                 'taxonomy' => 'dossier_tag', // Replace with the slug of your custom tag taxonomy
                 'field'    => 'name',
                 'terms'    => $search_query,
             ),
         ),
     ) );
 
     // Add the search results to the context
     $context['posts'] = Timber::get_posts( $custom_taxonomy_results );
 }
 
 // Render the search results page using the chosen template files and context
 Timber::render( $templates, $context );;