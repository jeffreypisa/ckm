<?php
/**
 * The template for displaying Archive pages.
 *
 * Used to display archive-type pages if nothing more specific matches a query.
 * For example, puts together date-based pages if no date.php file exists.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * Methods for TimberHelper can be found in the /lib sub-directory
 *
 * @package  WordPress
 * @subpackage  Timber
 * @since   Timber 0.2
 */


$context = Timber::context();
 
 $currentPostType = get_post_type();
 
 $context['title'] = $currentPostType;
 $context['posttype'] = $currentPostType;
 
 $templates = array( 'archive-' . $currentPostType . '.twig', 'archive.twig', 'index.twig' );
 
 // Get posts and shuffle them
 $posts = new Timber\PostQuery();
 $shuffledPosts = $posts->get_posts();
 shuffle( $shuffledPosts );
 $context['posts'] = new Timber\PostQuery( $shuffledPosts );
 
 Timber::render( $templates, $context );