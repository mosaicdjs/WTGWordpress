<?php
/**
 * Plugin Name: WTG fake sub Pages
 * Description: Creates fake sub pages for the custom post type guides.
 * Version: 1.0
 * Author: Adam Faulkner
 */

 
// Fake pages' permalinks and titles
    $my_fake_pages = array(
        'history-language-culture' 		=> 'History',
		'weather-climate-geography' 	=> 'History',
		'business-communications' 		=> 'History',
		'pictures' 						=> 'History',
		'image-gallery'					=> 'History',
		'travel-by' 					=> 'History',
		'region-hotels' 				=> 'History',
		'things-to-do' 					=> 'History',
		'shopping-nightlife' 			=> 'History',
		'food-and-drink' 				=> 'History',
		'getting-around' 				=> 'History',
		'passport-visa' 				=> 'History',
		'public-holidays' 				=> 'History',
		'health' 						=> 'History',
		'money-duty-free' 				=> 'History',
		'geld-duty-free'				=> 'History',
		'events' 						=> 'History',
		'history' 						=> 'History',
		'weather' 						=> 'History',
		'pictures' 						=> 'History',
		'videos' 						=> 'History',
		'gettingaround' 				=> 'History',
		'things-to-see' 				=> 'History',
		'tours-excursions' 				=> 'History',
		'things-to-do-0' 				=> 'History',
		'shopping' 						=> 'History',
		'restaurants' 					=> 'History',
		'nightlife' 					=> 'History',
		'city-events' 					=> 'History',
		'travel-to' 					=> 'History',
		'hotels' 						=> 'History',
		'hotel-listings'				=> 'History',
		'restaurant-listings'			=>	'History',
		'attraction-listings'			=>	'History',
		'nightlife-listings'			=>	'History',
		'city-attractions'				=> 'History',
		'apres-ski' 					=> 'History',
		'pictures' 						=> 'History',
		'airport-hotels' 				=> 'History',
		
    );
     
    add_filter('rewrite_rules_array', 'fsp_insertrules');
    add_filter('query_vars', 'fsp_insertqv');
     
    // Adding fake pages' rewrite rules
    function fsp_insertrules($rules)
    {
        global $my_fake_pages;
		$newrules = array();
		foreach ($my_fake_pages as $slug => $title){

			$newrules['guides/([^/]+)/([^/]+)/([^/]+)/([^/]+)/([^/]+)/' . $slug . '/?$'] = 'index.php?wtg_continent=$matches[1]&guides=$matches[2]/$matches[3]/$matches[4]/$matches[5]&fpage=' . $slug;
			$newrules['guides/([^/]+)/([^/]+)/([^/]+)/([^/]+)/' . $slug . '/?$'] = 'index.php?wtg_continent=$matches[1]&guides=$matches[2]/$matches[3]/$matches[4]&fpage=' . $slug;
			$newrules['guides/([^/]+)/([^/]+)/([^/]+)/' . $slug . '/?$'] = 'index.php?wtg_continent=$matches[1]&guides=$matches[2]/$matches[3]&fpage=' . $slug;
			$newrules['guides/([^/]+)/([^/]+)/' . $slug . '/?$'] = 'index.php?wtg_continent=$matches[1]&guides=$matches[2]&fpage=' . $slug;
			
		}
        return $newrules + $rules;
    }
    // Tell WordPress to accept our custom query variable
    function fsp_insertqv($vars)
    {
        array_push($vars, 'fpage');
        return $vars;
    }

    // Remove WordPress's default canonical handling function
	
    remove_filter('wp_head', 'rel_canonical');
    add_filter('wp_head', 'fsp_rel_canonical');
    function fsp_rel_canonical()
    {
        global $wp_the_query;
     
		$current_fp = get_query_var('fpage');
        if (!is_singular())
            return;
     
        if (!$id = $wp_the_query->get_queried_object_id())
            return;
     
        $link = trailingslashit(get_permalink($id));
     
        // Make sure fake pages' permalinks are canonical
        if (!empty($current_fp))
            $link .= user_trailingslashit($current_fp);
     
        echo '<link rel="canonical" href="'.$link.'" />';
    }

	
	
/* Yoast Canonical Removal from Guide pages */
add_filter( 'wpseo_canonical', 'wpseo_canonical_exclude' );

function wpseo_canonical_exclude( $canonical ) {
	global $post;
	if (is_singular('guides')) {
		$canonical = false;
    }
	return $canonical;
}
