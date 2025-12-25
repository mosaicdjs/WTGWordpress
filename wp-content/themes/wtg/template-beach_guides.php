<?php 
/*
 * Template Name: Beach Guides
*/
 if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

get_header();
while(have_posts()):the_post();
    $pageID = get_the_ID();
endwhile;

do_action('beachguide-page');

get_footer();

?>