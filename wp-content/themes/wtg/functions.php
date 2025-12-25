<?php
////////////////////////////////////////////////////////////////////
// Theme Information
////////////////////////////////////////////////////////////////////

$themename = "WTG Theme";
$developer_uri = "";
$shortname = "wtg theme";
$version = '0.1';

//wordpress settings
require_once ('includes/set_up.php');

//theme specifics
require_once ('includes/menus_sidebars.php');
require_once ('includes/custom_posts_taxonomies.php');
require_once ('includes/common_functions.php');

//hook it all together
require_once ('includes/hooks.php');

//theme functions
require_once ('includes/theme_functions.php');
	require_once ('includes/theme_functions/widget_regions.php');
	require_once ('includes/theme_functions/guide_functions.php');
	require_once ('includes/theme_functions/feature_functions.php');
	require_once ('includes/theme_functions/guide_menu_functions.php');
	require_once ('includes/theme_functions/guide_filter_menus.php');
	require_once ('includes/theme_functions/wtg_feeds.php');
	require_once ('includes/theme_functions/guide_directories.php');

    
require_once ('includes/shortcodes.php');
require_once ('includes/custom_fields.php'); 


function wpse_excerpt_length( $length ) {
    return 20;
}
add_filter( 'excerpt_length', 'wpse_excerpt_length', 999 );

# Create an administration page for general options like ACF.
if (function_exists('acf_add_options_page')) {

	$option_page = acf_add_options_page(array(
		'page_title' 	=> 'Options',
		'menu_slug' 	=> 'general-options',
		'capability' 	=> 'edit_posts',
		'redirect' 	=> false
	));
}


add_theme_support('woocommerce');

//World travel guide extras
//require_once ('includes/country-demo.php');

function woo_override_checkout_fields( $fields ) { 

/*	$fields['shipping']['shipping_country'] = array(
		'type'      => 'select',
		'label'     => __('Country', 'woocommerce'),
		'options' 	=> array('DE' => 'Germany', 'CH' => 'Switzerland', 'GB' => 'United Kingdom'),
		'required'	=> true
	);
*/	
/*	$fields['billing']['billing_country'] = array(
		'type'      => 'select',
		'label'     => __('Country', 'woocommerce'),
		'options' 	=> array('DE' => 'Germany', 'CH' => 'Switzerland', 'GB' => 'United Kingdom'),
		'required'	=> true
	);
*/

	return $fields; 
} 
add_filter( 'woocommerce_checkout_fields' , 'woo_override_checkout_fields' );

function sv_require_wc_country_field( $fields ) {
    $fields['country']['required'] = true;
    return $fields;
}
//add_filter( 'woocommerce_default_address_fields', 'sv_require_wc_country_field' );


function woocommerce_quantity_input_min_callback( $min, $product ) {

	$min = 1;  

	return $min;

}
add_filter( 'woocommerce_quantity_input_min', 'woocommerce_quantity_input_min_callback', 10, 2 );



/*

* Changing the maximum quantity for all the WooCommerce products

*/



function woocommerce_quantity_input_max_callback( $max, $product ) {

	$max = 30;  

	return $max;

}

add_filter( 'woocommerce_quantity_input_max', 'woocommerce_quantity_input_max_callback', 10, 2 );

add_filter('loop_shop_columns', 'loop_columns');
if (!function_exists('loop_columns')) {
	function loop_columns() {
		return 6; // 6 products per row
	}
}

add_filter('woocommerce_product_related_posts_query', '__return_empty_array', 100);

/**
 * This code should be added to functions.php of your theme
 **/
add_filter('woocommerce_default_catalog_orderby', 'custom_default_catalog_orderby');

function custom_default_catalog_orderby() {
     return 'menu_order'; // Can also use title and price
}
?>
