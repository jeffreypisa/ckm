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

$templates = array( 'archive-words.twig', 'index.twig' );

$context = Timber::context();

$currentPostType = get_post_type();

$context['title'] = $currentPostType;
$context['posttype'] = $currentPostType;

$args_upcoming = array(
    'post_type'			  => 'words',
    'posts_per_page'      => -1,
    'order'               => 'DESC',
    'suppress_filters'    => true,
    'orderby'       => 'meta_value_num',
    'meta_key'      => 'datum'
);

$context['posts'] = Timber::get_posts($args_upcoming);

Timber::render( $templates, $context );