<?php /* Template Name: Words */ 

$context = Timber::context();

$timber_post     = new Timber\Post();
$context['post'] = $timber_post;

$today = date('Ymd');

$args_upcoming = array(
    'post_type'			  => 'words',
    'posts_per_page'      => -1,
    'order'               => 'DESC',
    'suppress_filters'    => true,
    'orderby'       => 'meta_value_num',
    'meta_key'      => 'datum'
);

$context['posts'] = Timber::get_posts($args_upcoming);

Timber::render( array( 'page-words.twig', 'page.twig' ), $context );