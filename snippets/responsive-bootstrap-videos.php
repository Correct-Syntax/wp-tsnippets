<?php
/**
 * WP T'Snippets - (C) 2021 Noah Rahm, Licensed under GPLv2.0
 *
 * Responsive videos in wordpress with boostrap v4 or v5
 *
 * @link https://github.com/Correct-Syntax/wp-tsnippets
 */


function bootstrap_resonsive_video( $output ) {
	preg_match( '@src="([^"]+)"@' , $output, $match );
	$src = array_pop($match);
	$src = preg_replace('/\?.*/', '', $src);

	$output = str_replace( "<video", "<video muted", $output );
	$output = str_replace( "controls=", "data-controls=", $output );

	$str = preg_replace('/\<[\/]{0,1}div[^\>]*\>/i', '', $output);
	$wrap = "<div class='embed-responsive'>".$str."</div>";

	$output = $wrap;
	return $output;
}

add_filter( 'wp_video_shortcode', 'bootstrap_resonsive_video' );