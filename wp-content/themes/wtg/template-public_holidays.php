<?php 
/*
 * Template Name: Public Holidays
*/
 if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

get_header();
while(have_posts()):the_post();
    $pageID = get_the_ID();
endwhile;

do_action('publichols-page');

get_footer();

?>