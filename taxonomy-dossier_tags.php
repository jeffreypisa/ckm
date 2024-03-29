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

$context = Timber::get_context();
 
$context['term'] = new TimberTerm();

$args = array(
    'post_type' => 'dossiers',
    'orderby' => 'date', // Hier voeg je de orderby parameter toe
    'order' => 'DESC', // Hier voeg je de order parameter toe
    'tax_query' => array(
        array(
            'taxonomy' => 'dossier_tags',
            'field'    => 'slug',
            'terms'    => $context['term']->slug,
        ),
    ),
);

$context['posts'] = new Timber\PostQuery( $args );

Timber::render( 'taxonomy-dossier_tags.twig', $context );