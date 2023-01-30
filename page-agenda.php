<?php /* Template Name: Agenda */ 

$context = Timber::context();

$timber_post     = new Timber\Post();
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
    
$args_past = array(
    'post_type'			  => 'agenda',
    'posts_per_page'      => -1,
    'order'               => 'DESC',
    'suppress_filters'    => true,
    'orderby'       => 'meta_value_num',
    'meta_key'      => 'datum', //ACF date field
    'meta_query'    => array( array(
        'key' => 'datum', 
        'value' => $today, 
        'compare' => '<', 
        'type' => 'DATE'
    ))
);

$context['past'] = Timber::get_posts($args_past);
        

Timber::render( array( 'page-agenda.twig', 'page.twig' ), $context );