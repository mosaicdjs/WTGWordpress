<?php 
/*
 * Template Name: Bakery Page
*/
 if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

get_header();
while(have_posts()):the_post();
    $pageID = get_the_ID();
endwhile;

do_action('bakerypage');

get_footer();

?>
