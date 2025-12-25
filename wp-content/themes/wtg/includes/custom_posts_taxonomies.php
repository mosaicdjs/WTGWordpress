<?php
/*
menu_position is
5 - below Posts
10 - below Media
15 - below Links
20 - below Pages
25 - below comments
60 - below first separator
65 - below Plugins
70 - below Users
75 - below Tools
80 - below Settings
100 - below second separator 
*/

// CUSTOM POST TYPES // TAXONOMIES // PARENTS AND META BOXES //

// POST TYPE Features

function nightlife_register() {

	register_post_type( 'nightlife', array(
		'labels' => array(
			'name' => _x( 'Bars/Clubs', 'Bars/Clubs' ),
			'singular_name' => _x( 'Bar/Club', 'Bars/Clubs' ),
			'add_new' => _x( 'Add New', 'Bar/Club' ),
			'add_new_item' => _x( 'Add New Bar/Club', 'Bars/Clubs' ),
			'all_items' => _x( 'Bars/Clubs', 'Bars/Clubs' ),
			'edit_item' => _x( 'Edit Bar/Club', 'Bars/Clubs' ),
			'new_item' => _x( 'New Bar/Club', 'Bars/Clubs' ),
			'view_item' => _x( 'View Bar/Club', 'Bars/Clubs' ),
			'search_items' => _x( 'Search Bars/Clubs', 'Bars/Clubs' ),
			'not_found' => _x( 'No Bars/Clubs found', 'Bars/Clubs' ),
			'not_found_in_trash' => _x( 'No Bars/Clubs found in Trash', 'Bars/Clubs' ),
			'parent_item_colon' => _x( 'Parent Nightlife item', 'Bars/Clubs' ),
			'menu_name' => _x( 'Bars/Clubs', 'Bars/Clubs' ),
		),
		  'hierarchical' => true,
		  'supports' => array( 'title', 'page-attributes' ),
		  'public' => true,
		  'show_ui' => true,
		  'menu_icon'=> 'dashicons-building',
		  'show_in_nav_menus' => true,
		  'publicly_queryable' => true,
		  'exclude_from_search' => false,
		  'has_archive' => true,
		  //'query_var' => 'wtg_guides_qv',
		  'supports' 				=> array( 'title', 'thumbnail', 'page-attributes', 'thumbnail', 'excerpt'),
          'rewrite'               => array( 'slug' => 'nightlife', 'with_front' => true ),
		  'can_export' => true,
		  'capability_type' => 'post',
	));
}
add_action('init', 'nightlife_register');


function hotels_register() {

	register_post_type( 'hotel', array(
		'labels' => array(
			'name' => _x( 'Hotels', 'Hotels' ),
			'singular_name' => _x( 'Hotel', 'Hotels' ),
			'add_new' => _x( 'Add New', 'Hotels' ),
			'add_new_item' => _x( 'Add New Hotel', 'Hotels' ),
			'all_items' => _x( 'Hotels', 'Hotels' ),
			'edit_item' => _x( 'Edit Hotel', 'Hotels' ),
			'new_item' => _x( 'New Hotel', 'Hotels' ),
			'view_item' => _x( 'View Hotel', 'Hotels' ),
			'search_items' => _x( 'Search Hotels', 'Hotels' ),
			'not_found' => _x( 'No Hotels found', 'Hotels' ),
			'not_found_in_trash' => _x( 'No Hotels found in Trash', 'Hotels' ),
			'parent_item_colon' => _x( 'Parent Hotel', 'Hotels' ),
			'menu_name' => _x( 'Hotels', 'Hotels' ),
		),
		  'hierarchical' => true,
		  'supports' => array( 'title', 'page-attributes' ),
		  'public' => true,
		  'show_ui' => true,
		  'menu_icon'=> 'dashicons-building',
		  'show_in_nav_menus' => true,
		  'publicly_queryable' => true,
		  'exclude_from_search' => false,
		  'has_archive' => true,
		  //'query_var' => 'wtg_guides_qv',
		  'supports' 				=> array( 'title', 'thumbnail', 'page-attributes', 'thumbnail', 'excerpt'),
          'rewrite'               => array( 'slug' => 'hotel', 'with_front' => true ),
		  'can_export' => true,
		  'capability_type' => 'post',
	));
}
add_action('init', 'hotels_register');


function restaurants_register() {

	register_post_type( 'restaurant', array(
		'labels' => array(
			'name' => _x( 'Restaurants', 'Restaurants' ),
			'singular_name' => _x( 'Restaurant', 'Restaurants' ),
			'add_new' => _x( 'Add New', 'Restaurants' ),
			'add_new_item' => _x( 'Add New Restaurant', 'Restaurants' ),
			'all_items' => _x( 'Restaurants', 'Restaurants' ),
			'edit_item' => _x( 'Edit Restaurant', 'Restaurants' ),
			'new_item' => _x( 'New Restaurant', 'Restaurants' ),
			'view_item' => _x( 'View Restaurant', 'Restaurants' ),
			'search_items' => _x( 'Search Restaurants', 'Restaurants' ),
			'not_found' => _x( 'No Restaurants found', 'Restaurants' ),
			'not_found_in_trash' => _x( 'No Restaurants found in Trash', 'Restaurants' ),
			'parent_item_colon' => _x( 'Parent Restaurant', 'Restaurants' ),
			'menu_name' => _x( 'Restaurants', 'Restaurants' ),
		),
		  'hierarchical' => true,
		  'supports' => array( 'title', 'page-attributes' ),
		  'public' => true,
		  'show_ui' => true,
		  'menu_icon'=> 'dashicons-store',
		  'show_in_nav_menus' => true,
		  'publicly_queryable' => true,
		  'exclude_from_search' => false,
		  'has_archive' => true,
		  //'query_var' => 'wtg_guides_qv',
		  'supports' 				=> array( 'title', 'thumbnail', 'page-attributes', 'thumbnail', 'excerpt'),
          'rewrite'               => array( 'slug' => 'restaurant', 'with_front' => true ),
		  'can_export' => true,
		  'capability_type' => 'post',
	));
}
add_action('init', 'restaurants_register');

function attractions_register() {

	register_post_type( 'attraction', array(
		'labels' => array(
			'name' => _x( 'Attractions', 'Attractions' ),
			'singular_name' => _x( 'Attraction', 'Attractions' ),
			'add_new' => _x( 'Add New', 'Attractions' ),
			'add_new_item' => _x( 'Add New Attraction', 'Attractions' ),
			'all_items' => _x( 'Attractions', 'Attractions' ),
			'edit_item' => _x( 'Edit Attraction', 'Attractions' ),
			'new_item' => _x( 'New Attraction', 'Attractions' ),
			'view_item' => _x( 'View Attraction', 'Attractions' ),
			'search_items' => _x( 'Search Attractions', 'Attractions' ),
			'not_found' => _x( 'No Attractions found', 'Attractions' ),
			'not_found_in_trash' => _x( 'No Attractions found in Trash', 'Attractions' ),
			'parent_item_colon' => _x( 'Parent Attraction', 'Attractions' ),
			'menu_name' => _x( 'Attractions', 'Attractions' ),
		),
		  'hierarchical' => true,
		  'supports' => array( 'title', 'page-attributes' ),
		  'public' => true,
		  'show_ui' => true,
		  'menu_icon'=> 'dashicons-location-alt',
		  'show_in_nav_menus' => true,
		  'publicly_queryable' => true,
		  'exclude_from_search' => false,
		  'has_archive' => true,
		  //'query_var' => 'wtg_guides_qv',
		  'supports' 				=> array( 'title', 'thumbnail', 'page-attributes', 'thumbnail', 'excerpt'),
          'rewrite'               => array( 'slug' => 'attraction', 'with_front' => true ),
		  'can_export' => true,
		  'capability_type' => 'post',
	));
}
add_action('init', 'attractions_register');

function books_register() {

	register_post_type( 'books', array(
		'labels' => array(
			'name' => _x( 'Books', 'books' ),
			'singular_name' => _x( 'Book', 'books' ),
			'add_new' => _x( 'Add New', 'books' ),
			'add_new_item' => _x( 'Add New Book', 'books' ),
			'all_items' => _x( 'Books', 'books' ),
			'edit_item' => _x( 'Edit Book', 'books' ),
			'new_item' => _x( 'New Book', 'books' ),
			'view_item' => _x( 'View Book', 'books' ),
			'search_items' => _x( 'Search Books', 'books' ),
			'not_found' => _x( 'No Books found', 'books' ),
			'not_found_in_trash' => _x( 'No Books found in Trash', 'books' ),
			'parent_item_colon' => _x( 'Parent Book', 'books' ),
			'menu_name' => _x( 'Books', 'books' ),
		),
		  'hierarchical' => true,
		  'supports' => array( 'title', 'page-attributes' ),
		  'public' => true,
		  'show_ui' => true,
		  'menu_icon'=> 'dashicons-book-alt',
		  'show_in_nav_menus' => true,
		  'publicly_queryable' => true,
		  'exclude_from_search' => false,
		  'has_archive' => true,
		  //'query_var' => 'wtg_guides_qv',
		  'supports' 				=> array( 'title', 'thumbnail', 'page-attributes', 'editor', 'thumbnail', 'excerpt'),
          'rewrite'               => array( 'slug' => 'atlas', 'with_front' => true ),
		  'can_export' => true,
		  'capability_type' => 'post',
	));
}

function taxonomy_slug_rewrite($wp_rewrite) {
    $rules = array();
    // get all custom taxonomies
	$taxonomies = get_taxonomies(array('_builtin' => false), 'objects');
	
    // get all custom post types
    $post_types = get_post_types(array('public' => true, '_builtin' => false), 'objects');
    
	foreach ($post_types as $post_type) 
	{

		foreach ($taxonomies as $taxonomy) 
		{
	    
            // go through all post types which this taxonomy is assigned to
			foreach ($taxonomy->object_type as $object_type) 
			{
                
                // check if taxonomy is registered for this custom type
				if ($object_type == $post_type->rewrite['slug']) 
				{
		    
                    // get category objects
                    $terms = get_categories(array('type' => $object_type, 'taxonomy' => $taxonomy->name, 'hide_empty' => 0));
		    
                    // make rules
                    foreach ($terms as $term) {
                        $rules[$object_type . '/' . $term->slug . '/?$'] = 'index.php?' . $term->taxonomy . '=' . $term->slug;
                    }
                }
            }
		}	
    }
    // merge with global rules
    $wp_rewrite->rules = $rules + $wp_rewrite->rules;
}
add_filter('generate_rewrite_rules', 'taxonomy_slug_rewrite');



function register_listing_type_taxonomy()
{
register_taxonomy
(
	'wtg_listing_type',
	array('hotel','restaurant', 'attraction', 'nightlife'),
	array(
		'label' => __( 'Listing Type' ),
		'labels'                => array(
			'name'                  => 'Listing Type',
			'singular_name'         => 'Add Listing Type',
			'add_new'               => 'Add Listing Type',
			'add_new_item'          => 'New Listing Type',
			'edit_item'             => 'Edit Listing Type',
			'new_item'              => 'Add Listing Type',
			'view_item'             => 'View Listing Type',
			'search_items'          => 'Search Listing Type',
			'not_found'             => 'No Listing Types found',
			'not_found_in_trash'    => 'No Listing Types in trash',
		),
		'hierarchical' => true,
	)
);
}
add_action('init', 'register_listing_type_taxonomy');

function register_listing_price_taxonomy()
{
register_taxonomy
(
	'wtg_listing_price',
	array('hotel','restaurant', 'attraction', 'nightlife'),
	array(
		'label' => __( 'Listing Price' ),
		'labels'                => array(
			'name'                  => 'Listing Price',
			'singular_name'         => 'Add Listing Price',
			'add_new'               => 'Add Listing Price',
			'add_new_item'          => 'New Listing Price',
			'edit_item'             => 'Edit Listing Price',
			'new_item'              => 'Add Listing Price',
			'view_item'             => 'View Listing Price',
			'search_items'          => 'Search Listing Price',
			'not_found'             => 'No Listing Prices found',
			'not_found_in_trash'    => 'No Listing Prices in trash',
		),
		'hierarchical' => true,
	)
);
}
add_action('init', 'register_listing_price_taxonomy');

add_action('init', 'books_register');



add_filter( 'posts_results', 'cache_meta_data', 9999, 2 );
function cache_meta_data( $posts, $object ) {
    $posts_to_cache = array();
    // this usually makes only sense when we have a bunch of posts
    if ( empty( $posts ) || is_wp_error( $posts ) || is_single() || is_page() || count( $posts ) < 3 )
        return $posts;
         
    foreach( $posts as $post ) {
        if ( isset( $post->ID ) && isset( $post->post_type ) ) {
            $posts_to_cache[$post->ID] = 1;
        }
    }
     
    if ( empty( $posts_to_cache ) )
        return $posts;
 
    update_meta_cache( 'post', array_keys( $posts_to_cache ) );
    unset( $posts_to_cache );
 
    return $posts;
}



?>
