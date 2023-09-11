<?php
/**
* Template Name: Dossiers
*
* @package WordPress
* @subpackage Twenty_Fourteen
* @since Twenty Fourteen 1.0
*/

$context = Timber::context();

$timber_post     = new Timber\Post();
$context['post'] = $timber_post;

$context['terms'] = get_terms( array(
     'taxonomy'   => 'dossier_categorie',
     'hide_empty' => false,
) );

foreach ( $context['terms'] as &$term ) {
     $term->fields = get_fields( 'term_' . $term->term_id );
     $term->link = get_term_link( $term );
}

Timber::render( 'archive-dossiers.twig', $context );