<?php
/**
 * WP T'Snippets - (C) 2021 Noah Rahm, Licensed under GPLv2.0
 *
 * Customize the archive template <title>. This function preserves
 * the site name and title separator as well.
 *
 * @link https://github.com/Correct-Syntax/wp-tsnippets
 */


function page_archive_title( $title ) {

    $site_name = get_bloginfo();
    $sep = apply_filters( 'document_title_separator', '|' );
    $sep = str_pad( $sep, 30, " ", STR_PAD_BOTH );

    // Add this for each post type you need the title changed for
    if(is_post_type_archive('my_post_type'))
        return 'My Desired Title'.$sep.$site_name;

    return $title;
}

// Raise priority above other plugins/themes that
// have effect on the title with 900 (the default is 10).
add_filter( 'wp_title', 'page_archive_title', 900 );
add_filter( 'get_the_archive_title', 'page_archive_title', 900 );