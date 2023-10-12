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

if (isset($_GET['search']) && !empty($_GET['search'])) {
    $args['s'] = sanitize_text_field($_GET['search']);
}

if (isset($_GET['page']) && is_numeric($_GET['page'])) {
    $args['paged'] = intval($_GET['page']);
    $context['posts'] = new Timber\PostQuery( $args );
    Timber::render( 'ajax-posts.twig', $context );
    exit;
}

$args = array(
    'post_type' => 'dossiers',
    'posts_per_page' => '-1',  // Overweeg dit te wijzigen naar een specifiek aantal of gebruik paginering
    'tax_query' => array(
        array(
            'taxonomy' => 'dossier_onderzoek',
            'field'    => 'slug',
            'terms'    => $context['term']->slug,
        ),
    ),
    'meta_query' => array(
        'mee_bezig_order' => array(
            'key' => 'mee_bezig',
            'compare' => 'EXISTS'
        )
    ),
    'orderby' => array(
        'mee_bezig_order' => 'DESC',
        'date' => 'DESC'
    )
);

$context['posts'] = new Timber\PostQuery( $args );

Timber::render( 'taxonomy-dossier_onderzoek.twig', $context );
?>
