<?php
/**
 * WP T'Snippets - (C) 2021 Noah Rahm, Licensed under GPLv2.0
 *
 * Allow .SVG files to be uploaded from the media library. Please
 * be warned of the security risks of allowing SVG uploads. It is best
 * to run your SVG through a sanitizer (such as http://svg.enshrined.co.uk/)
 * before uploading to the wordpress media library.
 *
 * @link https://github.com/Correct-Syntax/wp-tsnippets
 */


function cc_mime_types( $mimes ) {
	$mimes['svg'] = 'image/svg+xml';
	return $mimes;
}
add_filter( 'upload_mimes', 'cc_mime_types' );