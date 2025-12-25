<?php
add_action( 'after_setup_theme', 'theme_setup' );
function theme_setup()
{



	function vc_remove_wp_ver_css_js( $src ) {
			if ( strpos( $src, 'ver=' ) )
				$src = remove_query_arg( 'ver', $src );
			return $src;
		}
		add_filter( 'style_loader_src', 'vc_remove_wp_ver_css_js', 9999 );
		add_filter( 'script_loader_src', 'vc_remove_wp_ver_css_js', 9999 );
	
	
	add_image_size ('latest-article-thumb',133,74,true);
	//disable json API
	add_filter('json_enabled', '__return_false');
	add_filter('json_jsonp_enabled', '__return_false');
	
	remove_action('wp_head', 'wp_generator');
	
	if (defined('WPSEO_VERSION')){
		add_action('get_header',function (){
			ob_start(function ($o){
				return preg_replace('/^<!--.*?[Y]oast.*?-->$/mi','',$o);
			});
		});
		add_action('wp_head',function (){ ob_end_flush(); }, 999);
	}
	
	//disable xml-rpc
	add_filter('xmlrpc_enabled', '__return_false');
	
	//add_filter('show_admin_bar', '__return_false');// disable that stupid wordpress bar on your site.
	function remove_menus()
	{
	//  remove_menu_page( 'index.php' );                  //Dashboard
		remove_menu_page( 'edit.php' );                   //Posts
	//	remove_menu_page( 'upload.php' );                 //Media
	//  remove_menu_page( 'edit.php?post_type=page' );    //Pages
		remove_menu_page( 'edit-comments.php' );          //Comments
	//  remove_menu_page( 'themes.php' );                 //Appearance
	//  remove_menu_page( 'plugins.php' );                //Plugins
	//  remove_menu_page( 'users.php' );                  //Users
	//  remove_menu_page( 'tools.php' );                  //Tools
	//  remove_menu_page( 'options-general.php' );        //Settings  
	}
	add_action( 'admin_menu', 'remove_menus' );

	// Cut down items on the admin back end

	function remove_admin_bar_links()
	{
		global $wp_admin_bar;
		$wp_admin_bar->remove_menu('wp-logo');          // Remove the WordPress logo
		$wp_admin_bar->remove_menu('about');            // Remove the about WordPress link
		$wp_admin_bar->remove_menu('wporg');            // Remove the WordPress.org link
		$wp_admin_bar->remove_menu('documentation');    // Remove the WordPress documentation link
		$wp_admin_bar->remove_menu('support-forums');   // Remove the support forums link
		$wp_admin_bar->remove_menu('feedback');         // Remove the feedback link
	//  $wp_admin_bar->remove_menu('site-name');        // Remove the site name menu
	//  $wp_admin_bar->remove_menu('view-site');        // Remove the view site link
	  $wp_admin_bar->remove_menu('updates');          // Remove the updates link
		$wp_admin_bar->remove_menu('comments');         // Remove the comments link
		$wp_admin_bar->remove_menu('new-content');      // Remove the content link
		$wp_admin_bar->remove_menu('w3tc');             // If you use w3 total cache remove the performance link
	//  $wp_admin_bar->remove_menu('my-account');       // Remove the user details tab
	}
	add_action( 'wp_before_admin_bar_render', 'remove_admin_bar_links' );
	
	remove_action( 'welcome_panel', 'wp_welcome_panel' );
 
	function remove_dashboard_meta()
	{
        remove_meta_box( 'dashboard_incoming_links', 'dashboard', 'normal' );
    //    remove_meta_box( 'dashboard_plugins', 'dashboard', 'normal' );
        remove_meta_box( 'dashboard_primary', 'dashboard', 'side' );
        remove_meta_box( 'dashboard_secondary', 'dashboard', 'normal' );
        remove_meta_box( 'dashboard_quick_press', 'dashboard', 'side' );
        remove_meta_box( 'dashboard_recent_drafts', 'dashboard', 'side' );
        remove_meta_box( 'dashboard_recent_comments', 'dashboard', 'normal' );
        remove_meta_box( 'dashboard_right_now', 'dashboard', 'normal' );
        remove_meta_box( 'dashboard_activity', 'dashboard', 'normal');//since 3.8
	}
	add_action( 'admin_init', 'remove_dashboard_meta' );
	
	/*Language Files */
	load_theme_textdomain( 'wtg', get_template_directory() . '/languages' ); 

	/* Featured Images */
	add_theme_support( 'post-thumbnails', array ('page','post', 'image_gallery', 'video' ));
	add_image_size ('blog-thumb', 235, 175, true);
	add_image_size ('galleryImage',1920,1080,true);
	add_image_size ('galleryThumb', 610,405,true);
	add_image_size ('listingGallery', 560,313,false);
	//add_action('_admin_menu', 'remove_editor_menu', 1);
}

////////////////////////////////////////////////////////////////////
// Enqueue Styles (normal style.css and bootstrap.css)
////////////////////////////////////////////////////////////////////
function theme_stylesheets()
{
		
		//wp_register_style('google-fonts', 'https://fonts.googleapis.com/css?family=Josefin+Sans:300,300i,400,400i,600,600i,700,700i&subset=latin-ext', array(), '1', 'all' );
		//wp_enqueue_style( 'google-fonts');
		wp_register_style('bootstrap.css', get_template_directory_uri() . '/css/bootstrap.min.css', array(), '1', 'all' );
		wp_enqueue_style( 'bootstrap.css');
       	wp_enqueue_style( 'stylesheet', get_stylesheet_uri(), array(), '1', 'all' );
//		wp_register_style('flexslider-css', get_template_directory_uri() . '/css/flexslider.css', array(), '1', 'all' );
//		wp_enqueue_style( 'flexslider-css');
		wp_register_style('lean-css', get_template_directory_uri() . '/css/lean-slider.css', array(), '1', 'all' );
		wp_enqueue_style( 'lean-css');
		wp_register_style('wtg-weather-css', get_template_directory_uri() . '/css/wtg-weather.css', array(), '1', 'all' );
		wp_enqueue_style( 'wtg-weather-css');
}
add_action('wp_enqueue_scripts', 'theme_stylesheets');

//Editor Style
//add_editor_style('css/editor-style.css');

add_action( 'wp_enqueue_scripts', 'theme_load_scripts' );
function theme_load_scripts() 
{
	wp_enqueue_script('bootstrap-js',get_template_directory_uri() . '/js/bootstrap.min.js',array('jquery'),1,true);
	wp_enqueue_script('tabs-js',get_template_directory_uri() . '/js/tabs_custom.js',array('jquery'),1,true);
	wp_enqueue_script('flex-js',get_template_directory_uri() . '/js/jquery.flexslider.min.js',array('jquery'),1,true);
	wp_enqueue_script('thumb-js',get_template_directory_uri() . '/js/slider_thumb_custom.js',array('jquery'),1,true);
	wp_enqueue_script('sticky-js',get_template_directory_uri() . '/js/jquery.sticky.js',array('jquery'),1,true);
	wp_enqueue_script('wtg-extras-js',get_template_directory_uri() . '/js/wtg_extras.js',array('jquery'),1,true);
	wp_enqueue_script('theia-js',get_template_directory_uri() . '/js/theia-sticky-sidebar.js',array('jquery'),1,true);
	wp_enqueue_script('moment-js',get_template_directory_uri() . '/js/moment.js',array('jquery'),1,true);
	wp_enqueue_script('timezone-js',get_template_directory_uri() . '/js/moment-timezonedata.js',array('jquery'),1,true);
	
	
	//wp_enqueue_script('canvas-js',get_template_directory_uri() . '/js/offcanvas.js',array('jquery'),1,true);
	wp_localize_script('tabs-js', 'WPURLS', array( 'siteurl' => get_option('siteurl') ));
	wp_localize_script('tabs-js', 'WPURLS', array( 'themeurl' => get_template_directory_uri() ));
}

////////////////////////////////////////////////////////////////////
// Register Custom Navigation Walker include custom menu widget to use walkerclass
////////////////////////////////////////////////////////////////////

//require_once('lib/wp_bootstrap_navwalker.php');
//require_once('lib/bootstrap-custom-menu-widget.php');


if (stripos(get_option('siteurl'), 'https://') === 0) {
    $_SERVER['HTTPS'] = 'on';
}


////////////////////////////////////////////////////////////////////
// Relevanssi tweaks
////////////////////////////////////////////////////////////////////

//sort by date descending
//add_filter('relevanssi_modify_wp_query', 'rlv_asc_date');
function rlv_asc_date($query) {
    $query->set('orderby', 'post_date');
    $query->set('order', 'desc');
    return $query;
}

// i want guide results to be returned first!
add_filter('relevanssi_hits_filter', 'separate_result_types');
function separate_result_types($hits) {
    $types = array();
    $types['guides'] = array();
    $types['features'] = array();
    $types['post'] = array();
    $types['page'] = array();
 
    // Split the post types in array $types
    if (!empty($hits)) {
        foreach ($hits[0] as $hit) {
            if (!is_array($types[$hit->post_type])) $types[$hit->post_type] = array();                        
            array_push($types[$hit->post_type], $hit);
        }
    }
 
    // Merge back to $hits in the desired order
    $hits[0] = array_merge($types['guides'], $types['features'], $types['post'], $types['page']);
    return $hits;
}




// Async load
function ikreativ_async_scripts($url)
{
    if ( strpos( $url, '#asyncload') === false )
        return $url;
    else if ( is_admin() )
        return str_replace( '#asyncload', '', $url );
    else
	return str_replace( '#asyncload', '', $url )."' async='async"; 
    }
//add_filter( 'clean_url', 'ikreativ_async_scripts', 11, 1 );

function add_async_attribute($tag, $handle) {
    //if ( 'my-js-handle' !== $handle )
      //  return $tag;
    return str_replace( ' src', ' defer src', $tag );
}

//add_filter('script_loader_tag', 'add_async_attribute', 10, 2);

function add_defer_css_attribute($tag, $handle) {
    //if ( 'my-js-handle' !== $handle )
      //  return $tag;
    return str_replace( ' href', ' defer href', $tag );
}

//add_filter('style_loader_tag', 'add_defer_css_attribute', 10, 2);

add_filter('relevanssi_modify_wp_query', 'rlv_meta_fix', 99);
function rlv_meta_fix($q) {
	$q->set('meta_query', '');
	return $q;
}

// Lister user role
$result = add_role( 'lister', __(

	'Listing Creator' ),
	
	array(
	
	'read' => true, // true allows this capability
	'edit_posts' => true, // Allows user to edit their own posts
	'edit_pages' => false, // Allows user to edit pages
	'edit_others_posts' => false, // Allows user to edit others posts not just their own
	'create_posts' => true, // Allows user to create new posts
	'manage_categories' => false, // Allows user to manage post categories
	'publish_posts' => false, // Allows the user to publish, otherwise posts stays in draft mode
	'edit_themes' => false, // false denies this capability. User can’t edit your theme
	'install_plugins' => false, // User cant add new plugins
	'update_plugin' => false, // User can’t update any plugins
	'update_core' => false // user cant perform core updates
	
	)
	
	);

	function wpse66094_no_admin_access() {
		global $current_user;
		$user_roles = $current_user->roles;
		$user_role = array_shift($user_roles);
		if($user_role === 'lister'){
			exit( wp_redirect('https://www.worldtravelguide.net/listing-management' ) );
		}
	 }
	
	//add_action( 'admin_init', 'wpse66094_no_admin_access', 100 );

?>
