<?php 
 if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}
acf_form_head();
get_header();
while(have_posts()):the_post();
    $pageID = get_the_ID();
endwhile;

do_action('listing-page');

get_footer();