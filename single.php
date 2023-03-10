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

$currentID = get_the_ID();

$quotes = array(
    'post_type'			  => 'verhalen',
    'posts_per_page'      => 3,
    'post__not_in'        => array( $currentID ),
    'orderby'             => 'rand',
    'suppress_filters'    => true
);

$context['quotes'] = Timber::get_posts($quotes);

if ( post_password_required( $timber_post->ID ) ) {
	Timber::render( 'single-password.twig', $context );
} else {
	Timber::render( array( 'single-' . $timber_post->ID . '.twig', 'single-' . $timber_post->post_type . '.twig', 'single-' . $timber_post->slug . '.twig', 'single.twig' ), $context );
}
