<?php
/**
 * Plugin Name: WTG Guides plugin
 * Description: This plugin adds post types for guides, and manages the URL sturctures for parent child relationships these guides can have. It must be placed in the 'mu-plugins' folder.
 * Author: Adam Faulkner
 * Author URL: 
 *
 */
class Guides_and_Relationships 
{  

	static function on_load() {
		add_action( 'init', array( __CLASS__, 'init' ) );
		add_filter( 'post_type_link', array( __CLASS__, 'guides_permalinks' ), 10, 2 );
		add_filter( 'term_link', array( __CLASS__,'add_term_parents_to_permalinks'), 10, 2 );
		
		register_activation_hook( __FILE__, array( __CLASS__, 'activate_activate' ) ); //currently only flushes the permalinks on plugin activation
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
		
		register_taxonomy(
			'wtg_continent',
			'guides',
			array(
				'label' => __( 'Continent' ),
				'labels'                => array(
					'name'                  => 'Continents',
					'singular_name'         => 'Add Continent',
					'add_new'               => 'Add Continent',
					'add_new_item'          => 'New Continent',
					'edit_item'             => 'Edit Continent',
					'new_item'              => 'Add Continent',
					'view_item'             => 'View Continent',
					'search_items'          => 'Search Continents',
					'not_found'             => 'No Continents found',
					'not_found_in_trash'    => 'No Continents in trash',
				),
				'rewrite' => array( 'slug' => 'guides',  ),
				'hierarchical' => true,
			)
		);
		
		register_taxonomy(
			'wtg_guide_type',
			'guides',
			array(
				'label' => __( 'Guide Type' ),
				'labels'                => array(
					'name'                  => 'Guide Type',
					'singular_name'         => 'Add Guide Type',
					'add_new'               => 'Add Guide Type',
					'add_new_item'          => 'New Guide Type',
					'edit_item'             => 'Edit Guide Type',
					'new_item'              => 'Add Guide Type',
					'view_item'             => 'View Guide Type',
					'search_items'          => 'Search Guide Types',
					'not_found'             => 'No Guide Types found',
					'not_found_in_trash'    => 'No Guide Types in trash',
				),
				'rewrite' => array( 'slug' => 'guidetype',  ),
				'hierarchical' => true,
			)
		);
		
		register_post_type( 'guides', array(
			'labels' => array(
				'name' => _x( 'Guides', 'guides' ),
				'singular_name' => _x( 'Guide', 'guides' ),
				'add_new' => _x( 'Add New', 'guides' ),
				'add_new_item' => _x( 'Add New Guide', 'guides' ),
				'all_items' => _x( 'Guides', 'guides' ),
				'edit_item' => _x( 'Edit Guide', 'guides' ),
				'new_item' => _x( 'New Guide', 'guides' ),
				'view_item' => _x( 'View Guide', 'guides' ),
				'search_items' => _x( 'Search Guides', 'guides' ),
				'not_found' => _x( 'No Guides found', 'guides' ),
				'not_found_in_trash' => _x( 'No Guides found in Trash', 'guides' ),
				'parent_item_colon' => _x( 'Parent Guide', 'guides' ),
				'menu_name' => _x( 'Guides', 'guides' ),
			),
			  'hierarchical' => true,
			  'supports' => array( 'title', 'page-attributes', 'excerpt', ),
			  'public' => true,
			  'show_ui' => true,
			  'menu_icon'=> 'dashicons-location',
			  'show_in_nav_menus' => true,
			  'publicly_queryable' => true,
			  'exclude_from_search' => false,
			  'has_archive' => true,
			  //'query_var' => 'wtg_guides_qv',
			  'can_export' => true,
			  'rewrite' => array( 'slug' => 'guides/%wtg_continent%', 'with_front' => false ),
			  'capability_type' => 'post',
			  'capabilities' => array(
				'edit_post' => 'edit_guide',
				'edit_posts' => 'edit_guides',
				'edit_others_posts' => 'edit_other_guides',
				'publish_posts' => 'publish_guides',
				'read_post' => 'read_guides',
				'read_private_posts' => 'read_private_guides',
				'delete_post' => 'delete_guides'
			),
			'map_meta_cap' => true
		));
		
	}
	
}

Guides_and_Relationships::on_load();
