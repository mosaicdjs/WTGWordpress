<?php
/**
 * Plugin Name: WTG function plugin
 * Description: This plugin adds a set of helper function for displaying content in the custom post type added by WTGguides and WTGfeatures. It must be placed in the 'mu-plugins' folder.
 * Author: Adam Faulkner
 * Author URL: 
 *
 */

////////////////////////////////
// register advanced custom fields
// regions
//include_once('WTG-custom-fields/regions.php');

////////////////////////////////
// helper functions
class Features_And_Feature_Types 
{  

	static function on_load() {
		add_action( 'init', array( __CLASS__, 'init' ) );
		
		add_filter( 'post_type_link', array( __CLASS__, 'features_permalinks' ), 10, 2 );
		//add_filter( 'term_link', array( __CLASS__,'add_feature_parents_to_permalinks'), 10, 2 );
	}
	
	static function features_permalinks( $permalink, $post ) 
	{
		if ( $post->post_type !== 'features' )
			return $permalink;
		$terms = get_the_terms( $post->ID, 'wtg_feature_type' );
		
		if ( ! $terms )
			return str_replace( '%wtg_feature_type%/', '', $permalink );
		$post_terms = array();
		foreach ( $terms as $term )
			$post_terms[] = $term->slug;
		return str_replace( '%wtg_feature_type%', implode( ',', $post_terms ) , $permalink );
	}
	/*
	static function add_feature_parents_to_permalinks( $permalink, $term ) {
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
	}*/
	
	static function init() 
	{
		
		register_taxonomy(
			'wtg_feature_type',
			'features',
			array(
				'label' => __( 'Feature Type' ),
				'labels'                => array(
					'name'                  => 'Feature Type',
					'singular_name'         => 'Add Feature Type',
					'add_new'               => 'Add Feature Type',
					'add_new_item'          => 'New Feature Type',
					'edit_item'             => 'Edit Feature Type',
					'new_item'              => 'Add Feature Type',
					'view_item'             => 'View Feature Type',
					'search_items'          => 'Search Feature Types',
					'not_found'             => 'No Feature Types found',
					'not_found_in_trash'    => 'No Feature Types in trash',
				),
				'rewrite' => array( 'slug' => 'features',  ),
				'hierarchical' => true,
				'query_var' 	=> 'wtg_feature_type',
			)
		);
		
        register_post_type( 'Features',
            array(
                'labels'                => array(
                'name'                  => 'Features',
                'singular_name'         => 'Add Feature',
                'add_new'               => 'Add Feature',
                'add_new_item'          => 'New Feature',
                'edit_item'             => 'Edit Feature',
                'new_item'              => 'Add Feature',
                'view_item'             => 'View Feature',
                'search_items'          => 'Search Features',
                'not_found'             => 'No Features found',
                'not_found_in_trash'    => 'No Features in trash',
                    ),
                'public'                => true,
                'publicly_queryable'    => true,
                'show_ui'               => true,
                'capability_type'		=> 'post',
                'menu_icon'				=> 'dashicons-welcome-write-blog',
                'query_var'             => true,
                'permalink_epmask'      => true,
                'menu_position'         => 20,
                'show_in_menu'          => true,
                'supports' 				=> array( 'title', 'thumbnail', 'page-attributes', 'editor', 'thumbnail', 'revisions'),
                'rewrite'               => array( 'slug' => 'features/%wtg_feature_type%', 'with_front' => true ),
                'has_archive'           => true,
				'taxonomies' 			=> array('wtg_feature_type'),
				'capabilities' => array(
					'edit_post' => 'edit_feature',
					'edit_posts' => 'edit_features',
					'edit_others_posts' => 'edit_other_features',
					'publish_posts' => 'publish_features',
					'read_post' => 'read_features',
					'read_private_posts' => 'read_private_features',
					'delete_post' => 'delete_features'
				),
				'map_meta_cap' => true
            )
        );
		
	}
	
}

Features_And_Feature_Types::on_load();

add_filter('wp_head', 'features_canonical');
function features_canonical()
{
	$featureType = get_queried_object()->term_id;
	
	if (!is_archive())
		 return;
        // Make sure fake pages' permalinks are canonical
	if (!$id = get_queried_object()->term_id);
        return;
     
    $link = trailingslashit(get_permalink($id));
	
	if (!empty($featureType))
		$link .= user_trailingslashit($featureType);
 
	echo '<link rel="canonical" href="'.$link.'" />';

}
