<?php

get_header();

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}


while(have_posts()):the_post();
    $pageID = get_the_ID();
endwhile;
$fp = get_query_var('fpage');
switch ($fp)
{
    case 'hotel-listings' :
        //echo 'Hotel Listings';
        listings_summary_page('Hotel');
    break;

    case 'restaurant-listings' :
        //echo 'Restaurant Listings';
        listings_summary_page('Restaurant');
    break;

    case 'attraction-listings' :
        //echo 'Attraction Listings';
        listings_summary_page('Attraction');
    break;

    case 'nightlife-listings' :
        //echo 'Nightlife Listings';
        listings_summary_page('Nightlife');
    break;

    default:
    do_action('singleGuides');
    break;
    }    

get_footer();
?>