<?php
/*
 * 
*/
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

get_header();
while(have_posts()):the_post();
    $pageID = get_the_ID();
endwhile;

//do_action('homepage');
//echo 'it works!<br/>';
$title = get_query_var('wtg_continent');
//echo $title;

//echo '<h2>The continent is '.$title.'</h2>';

do_action('guides-pages');

get_footer();


?>