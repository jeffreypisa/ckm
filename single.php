<?php
/**
 * The Template for displaying all single posts
 *
 * Methods for TimberHelper can be found in the /lib sub-directory
 *
 * @package  WordPress
 * @subpackage  Timber
 * @since    Timber 0.1
 */

$context         = Timber::context();
$timber_post     = Timber::get_post();
$context['post'] = $timber_post;

$today = date('Ymd');
    
$args_upcoming = array(
    'post_type'			  => 'agenda',
    'posts_per_page'      => -1,
    'order'               => 'ASC',
    'suppress_filters'    => true,
    'orderby'       => 'meta_value_num',
    'meta_key'      => 'datum', //ACF date field
    'meta_query'    => array( array(
        'key' => 'datum', 
        'value' => $today, 
        'compare' => '>=', 
        'type' => 'DATE'
    ))
);

$context['upcoming'] = Timber::get_posts($args_upcoming);    

if ( post_password_required( $timber_post->ID ) ) {
	Timber::render( 'single-password.twig', $context );
} else {
	Timber::render( array( 'single-' . $timber_post->ID . '.twig', 'single-' . $timber_post->post_type . '.twig', 'single-' . $timber_post->slug . '.twig', 'single.twig' ), $context );
}
