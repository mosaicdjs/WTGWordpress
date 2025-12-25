<?php
/**
 * Plugin Name: FD wines
 * Description: This plugin adds post types for wines, and manages the URL sturctures for parent child relationships this post type can have.
 * Author: Adam Faulkner
 * Author URL: 
 *
 */
class FD_wines 
{  

	static function on_load() {
		add_action( 'init', array( __CLASS__, 'init' ) );
		//add_filter( 'post_type_link', array( __CLASS__, 'guides_permalinks' ), 10, 2 );
		//add_filter( 'term_link', array( __CLASS__,'add_term_parents_to_permalinks'), 10, 2 );
		
		//register_activation_hook( __FILE__, array( __CLASS__, 'activate_activate' ) ); //currently only flushes the permalinks on plugin activation
	}
	
	static function add_guides_permastructure() 
	{
		global $wp_rewrite;
		//$wp_rewrite->add_rewrite_tag('%wtg_continents_qv%', '([^&]+)');
		$wp_rewrite->add_rewrite_tag('%guidename%', '([^/]+)', 'wtg_guides_qv=' );
		//$wp_rewrite->add_rewrite_tag('%subpage%', '([^/]+)', 'fpage=' );
		
		$wp_rewrite->add_permastruct( 'wtg_continent', 'guides/%wtg_continent%');
		$wp_rewrite->add_permastruct( 'guides', 'guides/%wtg_continent%/%guidename%');
		//$wp_rewrite->add_permastruct( 'guides', 'guides/%wtg_continent%/%guidename%/%subpage%');
		
	}

	static function guides_permalinks( $permalink, $post ) 
	{
		if ( $post->post_type !== 'guides' )
			return $permalink;
		$terms = get_the_terms( $post->ID, 'wtg_continent' );
		
		if ( ! $terms )
			return str_replace( '%wtg_continent%/', '', $permalink );
		$post_terms = array();
		foreach ( $terms as $term )
			$post_terms[] = $term->slug;
		return str_replace( '%wtg_continent%', implode( ',', $post_terms ) , $permalink );
	}
	
	static function add_term_parents_to_permalinks( $permalink, $term ) {
		$term_parents = self::get_term_parents( $term );
		$permlink = '';
		foreach ( $term_parents as $term_parent )
			$permlink = str_replace( $term->slug, $term_parent->slug . ',' . $term->slug, $permalink );
		return $permlink;
	}
	
	static function get_term_parents( $term, &$parents = array() ) {
		$parent = get_term( $term->parent, $term->taxonomy );
		
		if ( is_wp_error( $parent ) )
			return $parents;
		
		$parents[] = $parent;
		if ( $parent->parent )
			get_term_parents( $parent, $parents );
		return $parents;
	}

	static function activate_activate() 
	{
		flush_rewrite_rules();
	}
	
	static function init() 
	{
		
		// wines

		register_taxonomy(
			'wtg_wine_award_year',
			'wines',
			array(
				'label' => __( 'Wine Award Year' ),
				'labels'                => array(
					'name'                  => 'Wine Award Year',
					'singular_name'         => 'Add Wine Award Year',
					'add_new'               => 'Add Wine Award Year',
					'add_new_item'          => 'New Wine Award Year',
					'edit_item'             => 'Edit Wine Award Year',
					'new_item'              => 'Add Wine Award Year',
					'view_item'             => 'View Wine Award Year',
					'search_items'          => 'Search Wine Award Year',
					'not_found'             => 'No Wine Award Years found',
					'not_found_in_trash'    => 'No Wine Award Years in trash',
				),
				'rewrite' => array( 'slug' => 'wineawardyear',  ),
				'hierarchical' => true,
			)
		);
		
		
		
		register_taxonomy(
			'wtg_wine_colour',
			'wines',
			array(
				'label' => __( 'Wine Colour' ),
				'labels'                => array(
					'name'                  => 'Wine Colour',
					'singular_name'         => 'Add Wine Colour',
					'add_new'               => 'Add Wine Colour',
					'add_new_item'          => 'New Wine Colour',
					'edit_item'             => 'Edit Wine Colour',
					'new_item'              => 'Add Wine Colour',
					'view_item'             => 'View Wine Colour',
					'search_items'          => 'Search Wine Colours',
					'not_found'             => 'No Wine Awards found',
					'not_found_in_trash'    => 'No Wine Colours in trash',
				),
				'rewrite' => array( 'slug' => 'winecolour',  ),
				'hierarchical' => true,
			)
		);
		
		register_taxonomy(
			'wtg_wine_award',
			'wines',
			array(
				'label' => __( 'Wine Award' ),
				'labels'                => array(
					'name'                  => 'Wine Award',
					'singular_name'         => 'Add Wine Award',
					'add_new'               => 'Add Wine Award',
					'add_new_item'          => 'New Wine Award',
					'edit_item'             => 'Edit Wine Award',
					'new_item'              => 'Add Wine Award',
					'view_item'             => 'View Wine Award',
					'search_items'          => 'Search Wine Awards',
					'not_found'             => 'No Wine Awards found',
					'not_found_in_trash'    => 'No Wine Awards in trash',
				),
				'rewrite' => array( 'slug' => 'wineaward',  ),
				'hierarchical' => true,
			)
		);
		
		register_taxonomy(
			'wtg_wine_subtype',
			'wines',
			array(
				'label' => __( 'Wine Type' ),
				'labels'                => array(
					'name'                  => 'Wine SubType',
					'singular_name'         => 'Add Wine Type',
					'add_new'               => 'Add Wine Type',
					'add_new_item'          => 'New Wine Type',
					'edit_item'             => 'Edit Wine Type',
					'new_item'              => 'Add Wine Type',
					'view_item'             => 'View Wine Type',
					'search_items'          => 'Search Wine Types',
					'not_found'             => 'No Wine Types found',
					'not_found_in_trash'    => 'No Wine Types in trash',
				),
				'rewrite' => array( 'slug' => 'winetype',  ),
				'hierarchical' => true,
			)
		);

		register_taxonomy(
			'wtg_wine_type',
			'wines',
			array(
				'label' => __( 'Grape Variety' ),
				'labels'                => array(
					'name'                  => 'Wine Type',
					'singular_name'         => 'Add Wine Grape',
					'add_new'               => 'Add Wine Grape',
					'add_new_item'          => 'New Wine Grape',
					'edit_item'             => 'Edit Wine Grape',
					'new_item'              => 'Add Wine Grape',
					'view_item'             => 'View Wine Grape',
					'search_items'          => 'Search Wine Grapes',
					'not_found'             => 'No Wine Grapes found',
					'not_found_in_trash'    => 'No Wine Grapes in trash',
				),
				'rewrite' => array( 'slug' => 'winetype',  ),
				'hierarchical' => true,
			)
		);
		
		register_post_type( 'wines', array(
			'labels' => array(
				'name' => _x( 'Wines', 'wines' ),
				'singular_name' => _x( 'Wine', 'wines' ),
				'add_new' => _x( 'Add New', 'wines' ),
				'add_new_item' => _x( 'Add New Wine', 'wines' ),
				'all_items' => _x( 'Wines', 'wines' ),
				'edit_item' => _x( 'Edit Wine', 'wines' ),
				'new_item' => _x( 'New Wine', 'wines' ),
				'view_item' => _x( 'View Wine', 'wines' ),
				'search_items' => _x( 'Search Wines', 'wines' ),
				'not_found' => _x( 'No Wines found', 'wines' ),
				'not_found_in_trash' => _x( 'No Wines found in Trash', 'wines' ),
				'parent_item_colon' => _x( 'Parent Wine', 'wines' ),
				'menu_name' => _x( 'IWSC Wines', 'wines' ),
			),
			  'hierarchical' => true,
			  'supports' => array( 'title', 'page-attributes' ),
			  'public' => true,
			  'show_ui' => true,
			  'menu_icon'=> 'dashicons-admin-site',
			  'show_in_nav_menus' => true,
			  'publicly_queryable' => true,
			  'exclude_from_search' => false,
			  'has_archive' => true,
			  //'query_var' => 'wtg_guides_qv',
			  'can_export' => true,
			  //'rewrite' => array( 'slug' => 'guides/%wtg_continent%', 'with_front' => false ),
			  'capability_type' => 'post',
		));
		
		//wines end
		
		////////////////////////////////////
		
		//spirits
		
		register_post_type( 'spirits', array(
			'labels' => array(
				'name' => _x( 'Spirits', 'spirits' ),
				'singular_name' => _x( 'Spirit', 'spirits' ),
				'add_new' => _x( 'Add New', 'spirits' ),
				'add_new_item' => _x( 'Add New Spirit', 'spirits' ),
				'all_items' => _x( 'Spirits', 'spirits' ),
				'edit_item' => _x( 'Edit Spirit', 'spirits' ),
				'new_item' => _x( 'New Spirit', 'spirits' ),
				'view_item' => _x( 'View Spirit', 'spirits' ),
				'search_items' => _x( 'Search Spirits', 'spirits' ),
				'not_found' => _x( 'No Spirits found', 'spirits' ),
				'not_found_in_trash' => _x( 'No Spirits found in Trash', 'spirits' ),
				'parent_item_colon' => _x( 'Parent Spirit', 'spirits' ),
				'menu_name' => _x( 'IWSC Spirits', 'spirits' ),
			),
			  'hierarchical' => true,
			  'supports' => array( 'title', 'page-attributes' ),
			  'public' => true,
			  'show_ui' => true,
			  'menu_icon'=> 'dashicons-admin-site',
			  'show_in_nav_menus' => true,
			  'publicly_queryable' => true,
			  'exclude_from_search' => false,
			  'has_archive' => true,
			  //'query_var' => 'wtg_guides_qv',
			  'can_export' => true,
			  //'rewrite' => array( 'slug' => 'guides/%wtg_continent%', 'with_front' => false ),
			  'capability_type' => 'post',
		));
		
		register_taxonomy(
			'wtg_spirit_award',
			'spirits',
			array(
				'label' => __( 'Spirit Award' ),
				'labels'                => array(
					'name'                  => 'Spirit Award',
					'singular_name'         => 'Add Spirit Award',
					'add_new'               => 'Add Spirit Award',
					'add_new_item'          => 'New Spirit Award',
					'edit_item'             => 'Edit Spirit Award',
					'new_item'              => 'Add Spirit Award',
					'view_item'             => 'View Spirit Award',
					'search_items'          => 'Search Spirit Awards',
					'not_found'             => 'No Spirit Awards found',
					'not_found_in_trash'    => 'No Spirit Awards in trash',
				),
				'rewrite' => array( 'slug' => 'spiritaward',  ),
				'hierarchical' => true,
			)
		);
		
		register_taxonomy(
			'wtg_spirit_type',
			'spirits',
			array(
				'label' => __( 'Spirit Type' ),
				'labels'                => array(
					'name'                  => 'Spirit Type',
					'singular_name'         => 'Add Spirit Type',
					'add_new'               => 'Add Spirit Type',
					'add_new_item'          => 'New Spirit Type',
					'edit_item'             => 'Edit Spirit Type',
					'new_item'              => 'Add Spirit Type',
					'view_item'             => 'View Spirit Type',
					'search_items'          => 'Search Spirit Types',
					'not_found'             => 'No Spirit Types found',
					'not_found_in_trash'    => 'No Spirit Types in trash',
				),
				'rewrite' => array( 'slug' => 'spirittype',  ),
				'hierarchical' => true,
			)
		);
		
		register_taxonomy(
			'wtg_spirit_award_year',
			'spirits',
			array(
				'label' => __( 'Spirit Award Year' ),
				'labels'                => array(
					'name'                  => 'Spirit Award Year',
					'singular_name'         => 'Add Spirit Award Year',
					'add_new'               => 'Add Spirit Award Year',
					'add_new_item'          => 'New Spirit Award Year',
					'edit_item'             => 'Edit Spirit Award Year',
					'new_item'              => 'Add Spirit Award Year',
					'view_item'             => 'View Spirit Award Year',
					'search_items'          => 'Search Spirit Award Year',
					'not_found'             => 'No Spirit Award Years found',
					'not_found_in_trash'    => 'No Spirit Award Years in trash',
				),
				'rewrite' => array( 'slug' => 'spiritawardyear',  ),
				'hierarchical' => true,
			)
		);
		
		register_taxonomy(
			'wtg_spirit_subtype',
			'spirits',
			array(
				'label' => __( 'Spirit SubType' ),
				'labels'                => array(
					'name'                  => 'Spirit SubType',
					'singular_name'         => 'Add Spirit SubType',
					'add_new'               => 'Add Spirit SubType',
					'add_new_item'          => 'New Spirit SubType',
					'edit_item'             => 'Edit Spirit SubType',
					'new_item'              => 'Add Spirit SubType',
					'view_item'             => 'View Spirit SubType',
					'search_items'          => 'Search Spirit SubTypes',
					'not_found'             => 'No Spirit SubTypes found',
					'not_found_in_trash'    => 'No Spirit SubTypes in trash',
				),
				'rewrite' => array( 'slug' => 'spiritsubtype',  ),
				'hierarchical' => true,
			)
		);
		
		register_taxonomy(
			'wtg_spirit_colour',
			'spirits',
			array(
				'label' => __( 'Spirit Colour' ),
				'labels'                => array(
					'name'                  => 'Spirit Colour',
					'singular_name'         => 'Add Spirit Colour',
					'add_new'               => 'Add Spirit Colour',
					'add_new_item'          => 'New Spirit Colour',
					'edit_item'             => 'Edit Spirit Colour',
					'new_item'              => 'Add Spirit Colour',
					'view_item'             => 'View Spirit Colour',
					'search_items'          => 'Search Spirit Colours',
					'not_found'             => 'No Spirit Colours found',
					'not_found_in_trash'    => 'No Spirit Colours in trash',
				),
				'rewrite' => array( 'slug' => 'spiritcolour',  ),
				'hierarchical' => true,
			)
		);
		
		//spirits end
		
		
	}
	
}


FD_wines::on_load();
