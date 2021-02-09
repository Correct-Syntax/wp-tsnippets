<?php
/**
 * WP T'Snippets - (C) 2021 Noah Rahm, Licensed under GPLv2.0
 *
 * Responsive images in wordpress with boostrap v4 or v5
 *
 * @link https://github.com/Correct-Syntax/wp-tsnippets
 */


function bootstrap_responsive_images( $html ){
    $classes = 'img-fluid'; // Classes separated by spaces, e.g. 'img image-link'

    if ( preg_match('/<img.*? class="/', $html) ) {
        $html = preg_replace('/(<img.*? class=".*?)(".*?\/>)/', '$1 ' . $classes . ' $2', $html);
    } else {
        $html = preg_replace('/(<img.*?)(\/>)/', '$1 class="' . $classes . '" $2', $html);
    }
    // Remove dimensions from images since we don't need it!
    $html = preg_replace( '/(width|height)=\"\d*\"\s/', "", $html );
    return $html;
}
add_filter( 'the_content', 'bootstrap_responsive_images', 10 );
add_filter( 'post_thumbnail_html', 'bootstrap_responsive_images', 10 );