<?php
/**
 * Plugin Name: WTG Meta
 * Description: Creates options menu allowing the user to change META titles and descriptions.
 * Version: 1.0
 * Author: Adam Faulkner
 */


// Hook for adding admin menus
add_action('admin_menu', 'mt_add_pages');
add_action('admin_init', 'wtg_meta_default_admin_init');
add_action('admin_init', 'wtg_meta_titles_admin_init');
add_action('admin_init', 'wtg_meta_descs_admin_init');

function mt_add_pages() {
    
    // Add a new top-level menu (ill-advised):
    add_menu_page(__('WTG Meta Data','wtg-meta'), __('WTG Meta','wtg-meta'), 'manage_options', 'wtg-meta-handle', 'wtg_meta_page' );

    // Add a submenu to the custom top-level menu:
    add_submenu_page('wtg-meta-handle', __('Guides - Meta Titles','wtg-meta'), __('Guides - Meta Titles','wtg-meta'), 'manage_options', 'wtg-guides-titles-page', 'wtg_meta_guides_titles_page');

    // Add a second submenu to the custom top-level menu:
    add_submenu_page('wtg-meta-handle', __('Guides - Meta Descriptions','wtg-meta'), __('Guides - Meta Descriptions','wtg-meta'), 'manage_options', 'wtg-guides-descriptions-page', 'wtg_meta_guides_desc_page');
}

function wtg_meta_default_admin_init()
{
	register_setting( 'wtg_meta_default_options', 'wtg_meta_default_options', 'wtg_meta_default_options_validate' );
	add_settings_section('wtg_meta_default_main', 'WTG Meta Default', 'wtg_meta_default_section_text', 'wtg_meta_default');
		add_settings_field('wtg_meta_default_title_string', 'WTG Meta Title', 'wtg_meta_default_title_setting_string', 'wtg_meta_default', 'wtg_meta_default_main');
		add_settings_field('wtg_meta_default_desc_string', 'WTG Meta Description', 'wtg_meta_default_setting_string', 'wtg_meta_default', 'wtg_meta_default_main');
		add_settings_field('wtg_meta_default_h1_string', 'WTG H1', 'wtg_meta_default_h1_setting_string', 'wtg_meta_default', 'wtg_meta_default_main');

}

function wtg_meta_titles_admin_init()
{
	register_setting( 'wtg_meta_titles_options', 'wtg_meta_titles_options', 'wtg_meta_titles_options_validate' );
	
	add_settings_section('wtg_meta_titles_regions', 'WTG Meta - Region titles', 'wtg_meta_titles_regions_section_text', 'wtg_meta_titles');
		//default
		add_settings_field('wtg_meta_region_default_title_string', 'Guides - default title', 'wtg_meta_region_default_title_string', 'wtg_meta_titles', 'wtg_meta_titles_regions');
		//history lang
		add_settings_field('wtg_meta_region_history_lang_title_string', 'Region - history language and culture title', 'wtg_meta_region_history_lang_title_string', 'wtg_meta_titles', 'wtg_meta_titles_regions');
		//weather and geography
		add_settings_field('wtg_meta_region_weather_geo_lang_title_string', 'Region - weather and geography title', 'wtg_meta_region_weather_geo_title_string', 'wtg_meta_titles', 'wtg_meta_titles_regions');
		//business
		add_settings_field('wtg_meta_region_business_title_string', 'Region - Doing Business & staying in title', 'wtg_meta_region_business_title_string', 'wtg_meta_titles', 'wtg_meta_titles_regions');
		//Travel to
		add_settings_field('wtg_meta_region_travel_to_title_string', 'Region - Doing Travel To in title', 'wtg_meta_region_travel_to_title_string', 'wtg_meta_titles', 'wtg_meta_titles_regions');
		//where to stay
		add_settings_field('wtg_meta_region_where_stay_title_string', 'Region - Doing Where to stay in title', 'wtg_meta_region_where_stay_title_string', 'wtg_meta_titles', 'wtg_meta_titles_regions');
		//Passport and Visa
		add_settings_field('wtg_meta_region_pass_visa_title_string', 'Region - Passport and Visa title', 'wtg_meta_region_pass_visa_title_string', 'wtg_meta_titles', 'wtg_meta_titles_regions');
		//Health
		add_settings_field('wtg_meta_region_health_title_string', 'Region - Health title', 'wtg_meta_region_health_title_string', 'wtg_meta_titles', 'wtg_meta_titles_regions');
		//Public holidays
		add_settings_field('wtg_meta_region_pub_hols_title_string', 'Region - Public Holidays title', 'wtg_meta_region_pub_hols_title_string', 'wtg_meta_titles', 'wtg_meta_titles_regions');
		//Money and Duty free
		add_settings_field('wtg_meta_region_money_duty_title_string', 'Region - Money and duty free title', 'wtg_meta_region_money_duty_title_string', 'wtg_meta_titles', 'wtg_meta_titles_regions');
		//Things to see
		add_settings_field('wtg_meta_region_things_see_title_string', 'Region - Things to see and do title', 'wtg_meta_region_things_see_title_string', 'wtg_meta_titles', 'wtg_meta_titles_regions');
		//Shopping and Nightlife
		add_settings_field('wtg_meta_region_nightlife_title_string', 'Region - Shopping and Nightlife title', 'wtg_meta_region_nightlife_title_string', 'wtg_meta_titles', 'wtg_meta_titles_regions');
		//Food & Drink
		add_settings_field('wtg_meta_region_food_title_string', 'Region - Food & Drink title', 'wtg_meta_region_food_title_string', 'wtg_meta_titles', 'wtg_meta_titles_regions');
		//GEtting Around
		add_settings_field('wtg_meta_region_travel_by_title_string', 'Region - Getting Around title', 'wtg_meta_region_travel_by_title_string', 'wtg_meta_titles', 'wtg_meta_titles_regions');
		//Events
		add_settings_field('wtg_meta_region_events_title_string', 'Region - Events', 'wtg_meta_region_events_title_string', 'wtg_meta_titles', 'wtg_meta_titles_regions');
		
		
	add_settings_section('wtg_meta_titles_cities', 'WTG Meta - City titles', 'wtg_meta_titles_cities_section_text', 'wtg_meta_titles');
		//history
		add_settings_field('wtg_meta_city_history_title_string', 'City - history title', 'wtg_meta_city_history_title_string', 'wtg_meta_titles', 'wtg_meta_titles_cities');
		//weather and geography
		add_settings_field('wtg_meta_city_weather_title_string', 'City - weather title', 'wtg_meta_city_weather_title_string', 'wtg_meta_titles', 'wtg_meta_titles_cities');
		//GEtting Around
		add_settings_field('wtg_meta_city_travel_by_title_string', 'City - Getting Around title', 'wtg_meta_city_travel_by_title_string', 'wtg_meta_titles', 'wtg_meta_titles_cities');
		//Things to see
		add_settings_field('wtg_meta_city_things_see_title_string', 'City - Things to see  title', 'wtg_meta_city_things_see_title_string', 'wtg_meta_titles', 'wtg_meta_titles_cities');
		//Tours and Excursion
		add_settings_field('wtg_meta_city_tours_title_string', 'City - Tours and Excursion', 'wtg_meta_city_tours_title_string', 'wtg_meta_titles', 'wtg_meta_titles_cities');
		//Things to do
		add_settings_field('wtg_meta_city_things_do_title_string', 'City - Things to Do', 'wtg_meta_city_things_do_title_string', 'wtg_meta_titles', 'wtg_meta_titles_cities');
		//Shopping
		add_settings_field('wtg_meta_city_shopping_title_string', 'City - Shopping', 'wtg_meta_city_shopping_title_string', 'wtg_meta_titles', 'wtg_meta_titles_cities');
		//Restaurants
		add_settings_field('wtg_meta_city_restaurants_title_string', 'City - Restaurants', 'wtg_meta_city_restaurants_title_string', 'wtg_meta_titles', 'wtg_meta_titles_cities');
		//Nightlife
		add_settings_field('wtg_meta_city_nightlife_title_string', 'City - Nightlife', 'wtg_meta_city_nightlife_title_string', 'wtg_meta_titles', 'wtg_meta_titles_cities');
		//Events
		add_settings_field('wtg_meta_city_events_title_string', 'City - Events', 'wtg_meta_city_events_title_string', 'wtg_meta_titles', 'wtg_meta_titles_cities');
		//Travel To
		add_settings_field('wtg_meta_city_travel_to_title_string', 'City - Travel to', 'wtg_meta_city_travel_to_title_string', 'wtg_meta_titles', 'wtg_meta_titles_cities');
		//Hotels
		add_settings_field('wtg_meta_city_hotels_title_string', 'City - Hotels', 'wtg_meta_city_hotels_title_string', 'wtg_meta_titles', 'wtg_meta_titles_cities');

	add_settings_section('wtg_meta_titles_ski', 'WTG Meta - Ski titles', 'wtg_meta_titles_ski_section_text', 'wtg_meta_titles');
		//Ski apres
		add_settings_field('wtg_meta_city_history_title_string', 'Ski - Apres', 'wtg_meta_ski_apres_title_string', 'wtg_meta_titles', 'wtg_meta_titles_ski');
	
		
		
		}
		
		
function wtg_meta_descs_admin_init()
{
	register_setting( 'wtg_meta_descs_options', 'wtg_meta_descs_options', 'wtg_meta_descs_options_validate' );
	
	add_settings_section('wtg_meta_descs_regions', 'WTG Meta - Region descs', 'wtg_meta_descs_regions_section_text', 'wtg_meta_descs');
		//default
		add_settings_field('wtg_meta_region_default_desc_string', 'Guides - default desc', 'wtg_meta_region_default_desc_string', 'wtg_meta_descs', 'wtg_meta_descs_regions');
		//history lang
		add_settings_field('wtg_meta_region_history_lang_desc_string', 'Region - history language and culture desc', 'wtg_meta_region_history_lang_desc_string', 'wtg_meta_descs', 'wtg_meta_descs_regions');
		//weather and geography
		add_settings_field('wtg_meta_region_weather_geo_lang_desc_string', 'Region - weather and geography desc', 'wtg_meta_region_weather_geo_desc_string', 'wtg_meta_descs', 'wtg_meta_descs_regions');
		//business
		add_settings_field('wtg_meta_region_business_desc_string', 'Region - Doing Business & staying in desc', 'wtg_meta_region_business_desc_string', 'wtg_meta_descs', 'wtg_meta_descs_regions');
		//Travel to
		add_settings_field('wtg_meta_region_travel_to_desc_string', 'Region - Doing Travel To in desc', 'wtg_meta_region_travel_to_desc_string', 'wtg_meta_descs', 'wtg_meta_descs_regions');
		//where to stay
		add_settings_field('wtg_meta_region_where_stay_desc_string', 'Region - Doing Where to stay in desc', 'wtg_meta_region_where_stay_desc_string', 'wtg_meta_descs', 'wtg_meta_descs_regions');
		//Passport and Visa
		add_settings_field('wtg_meta_region_pass_visa_desc_string', 'Region - Passport and Visa desc', 'wtg_meta_region_pass_visa_desc_string', 'wtg_meta_descs', 'wtg_meta_descs_regions');
		//Health
		add_settings_field('wtg_meta_region_health_desc_string', 'Region - Health desc', 'wtg_meta_region_health_desc_string', 'wtg_meta_descs', 'wtg_meta_descs_regions');
		//Public holidays
		add_settings_field('wtg_meta_region_pub_hols_desc_string', 'Region - Public Holidays desc', 'wtg_meta_region_pub_hols_desc_string', 'wtg_meta_descs', 'wtg_meta_descs_regions');
		//Money and Duty free
		add_settings_field('wtg_meta_region_money_duty_desc_string', 'Region - Money and duty free desc', 'wtg_meta_region_money_duty_desc_string', 'wtg_meta_descs', 'wtg_meta_descs_regions');
		//Things to see
		add_settings_field('wtg_meta_region_things_see_desc_string', 'Region - Things to see and do desc', 'wtg_meta_region_things_see_desc_string', 'wtg_meta_descs', 'wtg_meta_descs_regions');
		//Shopping and Nightlife
		add_settings_field('wtg_meta_region_nightlife_desc_string', 'Region - Shopping and Nightlife desc', 'wtg_meta_region_nightlife_desc_string', 'wtg_meta_descs', 'wtg_meta_descs_regions');
		//Food & Drink
		add_settings_field('wtg_meta_region_food_desc_string', 'Region - Food & Drink desc', 'wtg_meta_region_food_desc_string', 'wtg_meta_descs', 'wtg_meta_descs_regions');
		//GEtting Around
		add_settings_field('wtg_meta_region_travel_by_desc_string', 'Region - Getting Around desc', 'wtg_meta_region_travel_by_desc_string', 'wtg_meta_descs', 'wtg_meta_descs_regions');
		//Events
		add_settings_field('wtg_meta_region_events_desc_string', 'Region - Events', 'wtg_meta_region_events_desc_string', 'wtg_meta_descs', 'wtg_meta_descs_regions');
		
		
	add_settings_section('wtg_meta_descs_cities', 'WTG Meta - City descs', 'wtg_meta_descs_cities_section_text', 'wtg_meta_descs');
		//history
		add_settings_field('wtg_meta_city_history_desc_string', 'City - history desc', 'wtg_meta_city_history_desc_string', 'wtg_meta_descs', 'wtg_meta_descs_cities');
		//weather and geography
		add_settings_field('wtg_meta_city_weather_desc_string', 'City - weather desc', 'wtg_meta_city_weather_desc_string', 'wtg_meta_descs', 'wtg_meta_descs_cities');
		//GEtting Around
		add_settings_field('wtg_meta_city_travel_by_desc_string', 'City - Getting Around desc', 'wtg_meta_city_travel_by_desc_string', 'wtg_meta_descs', 'wtg_meta_descs_cities');
		//Things to see
		add_settings_field('wtg_meta_city_things_see_desc_string', 'City - Things to see and do desc', 'wtg_meta_city_things_see_desc_string', 'wtg_meta_descs', 'wtg_meta_descs_cities');
		//Tours and Excursion
		add_settings_field('wtg_meta_city_tours_desc_string', 'City - Tours and Excursion', 'wtg_meta_city_tours_desc_string', 'wtg_meta_descs', 'wtg_meta_descs_cities');
		//Things to do
		add_settings_field('wtg_meta_city_things_do_desc_string', 'City - Things to Do', 'wtg_meta_city_things_do_desc_string', 'wtg_meta_descs', 'wtg_meta_descs_cities');
		//Shopping
		add_settings_field('wtg_meta_city_shopping_desc_string', 'City - Shopping', 'wtg_meta_city_shopping_desc_string', 'wtg_meta_descs', 'wtg_meta_descs_cities');
		//Restaurants
		add_settings_field('wtg_meta_city_restaurants_desc_string', 'City - Restaurants', 'wtg_meta_city_restaurants_desc_string', 'wtg_meta_descs', 'wtg_meta_descs_cities');
		//Nightlife
		add_settings_field('wtg_meta_city_nightlife_desc_string', 'City - Nightlife', 'wtg_meta_city_nightlife_desc_string', 'wtg_meta_descs', 'wtg_meta_descs_cities');
		//Events
		add_settings_field('wtg_meta_city_events_desc_string', 'City - Events', 'wtg_meta_city_events_desc_string', 'wtg_meta_descs', 'wtg_meta_descs_cities');
		//Travel To
		add_settings_field('wtg_meta_city_travel_to_desc_string', 'City - Travel to', 'wtg_meta_city_travel_to_desc_string', 'wtg_meta_descs', 'wtg_meta_descs_cities');
		//Hotels
		add_settings_field('wtg_meta_city_hotels_desc_string', 'City - Hotels', 'wtg_meta_city_hotels_desc_string', 'wtg_meta_descs', 'wtg_meta_descs_cities');

	add_settings_section('wtg_meta_descs_ski', 'WTG Meta - Ski descs', 'wtg_meta_descs_ski_section_text', 'wtg_meta_descs');
		//Ski apres
		add_settings_field('wtg_meta_city_history_desc_string', 'Ski - Apres', 'wtg_meta_ski_apres_desc_string', 'wtg_meta_descs', 'wtg_meta_descs_ski');
	
		
		
		}

//WTG Meta - Pages
	//Default meta data page
	function wtg_meta_page()
	{
		echo "<h1>" . __( 'WTG Meta', 'wtg-meta' ) . "</h1>";
		echo "Here you can manage the Meta Description for the site.<br/>
		This is a backup, as i am not 100% sure if yoast takes precidenence over this code for the non-guide pages.";

		?>
		<div>
			<form action="options.php" method="post">
				<?php settings_fields('wtg_meta_default_options'); ?>
				<?php do_settings_sections('wtg_meta_default'); ?>
				 
				<input name="Submit" type="submit" value="<?php esc_attr_e('Save Changes'); ?>" />
			</form>
		</div>
		 
		<?php
		
	}
	
	//guides meta - titles
	function wtg_meta_guides_titles_page()
	{
		echo "<h1>" . __( 'Guides - Meta Titles', 'wtg-meta' ) . "</h1>";
		echo "Here you can manage the Meta Titles for guides<br/>
		Yoast is incapable of managing the meta titles for Guides and their sections,<br/>
		as these pages have been created programatically rather than using wordpress CMS.<br/>
		This plugin aims to solve this problem, and does so by modifying 'header.php' with the values set here.<br/><br/>";
		echo "save buttons are everywhere, they all do the same thing.";
		
		?>
			<div>
				<form action="options.php" method="post">
					
					<?php settings_fields('wtg_meta_titles_options'); ?>
					<?php do_settings_sections('wtg_meta_titles'); ?>
					<input name="Submit" type="submit" value="<?php esc_attr_e('Save Changes'); ?>" />
				</form>
			</div>
			 
		<?php
		
	}
	
	function wtg_meta_guides_desc_page() {
		echo "<h1>" . __( 'Guides - Meta Descriptions', 'wtg-meta' ) . "</h1>";
		echo "Here you can manage the Meta Descriptions for guides<br/>
		Yoast is incapable of managing the meta descriptions for Guides and their sections,<br/>
		as these pages have been created programatically rather than using wordpress CMS.<br/>
		This plugin aims to solve this problem, and does so by modifying 'header.php' with the values set here.<br/><br/>";
		echo "save buttons are everywhere, they all do the same thing.";
		
		?>
			<div>
				<form action="options.php" method="post">
					
					<?php settings_fields('wtg_meta_descs_options'); ?>
					<?php do_settings_sections('wtg_meta_descs'); ?>
					<input name="Submit" type="submit" value="<?php esc_attr_e('Save Changes'); ?>" />
				</form>
			</div>
			 
		<?php
		
	}
	
	
//Sections
	function wtg_meta_default_section_text() {
		echo '<p>Edit the Meta Data here.</p>';
		
	}
	
	// Region titles
	function wtg_meta_titles_regions_section_text() {
		echo '<p>Edit the Meta titles for regions here.<br/> Use"%guide%" to reference the stored guide name.</p>';
		?><input name="Submit" type="submit" value="<?php esc_attr_e('Save Changes'); ?>" /><?php
	}
	
	// City titles
	function wtg_meta_titles_cities_section_text() {
		echo '<p>Edit the Meta titles for Cities here.<br/> Use"%guide%" to reference the stored guide name.</p>';
		?><input name="Submit" type="submit" value="<?php esc_attr_e('Save Changes'); ?>" /><?php
	}
	
	// Region descs
	function wtg_meta_descs_regions_section_text() {
		echo '<p>Edit the Meta descriptions for regions here.<br/> Use"%guide%" to reference the stored guide name.</p>';
		?><input name="Submit" type="submit" value="<?php esc_attr_e('Save Changes'); ?>" /><?php
	}
	
	// City descs
	function wtg_meta_descs_cities_section_text() {
		echo '<p>Edit the Meta descriptions for Cities here.<br/> Use"%guide%" to reference the stored guide name.</p>';
		?><input name="Submit" type="submit" value="<?php esc_attr_e('Save Changes'); ?>" /><?php
	}
	
	
	
//input fields titles
	//default pages - yoast overrides
		// default meta home page and other
		function wtg_meta_default_setting_string() {
			$options = get_option('wtg_meta_default_options');
			echo "<input id='wtg_meta_default_title_string' name='wtg_meta_default_options[site_description]' size='120 type='text' value='{$options['site_description']}' />";
		}
		function wtg_meta_default_title_setting_string() {
			$options = get_option('wtg_meta_default_options');
			echo "<input id='wtg_meta_default_desc_string' name='wtg_meta_default_options[site_title]' size='120 type='text' value='{$options['site_title']}' />";
		}
		function wtg_meta_default_h1_setting_string() {
			$options = get_option('wtg_meta_default_options');
			echo "<input id='wtg_meta_h1_string' name='wtg_meta_default_options[site_h1]' size='120 type='text' value='{$options['site_h1']}' />";
		}
		
	//regions
		// default region title
		function wtg_meta_region_default_title_string()
		{
			$options = get_option('wtg_meta_titles_options');
			echo "<input id='wtg_meta_region_default_title_string' name='wtg_meta_titles_options[region_default_title]' size='120 type='text' value='{$options['region_default_title']}' />";
		}
		// history language and culture
		function wtg_meta_region_history_lang_title_string()
		{
			$options = get_option('wtg_meta_titles_options');
			echo "<input id='wtg_meta_region_history_lang_title_string' name='wtg_meta_titles_options[region_history_lang_title]' size='120 type='text' value='{$options['region_history_lang_title']}' />";
		}
		// weather and geography
		function wtg_meta_region_weather_geo_title_string()
		{
			$options = get_option('wtg_meta_titles_options');
			echo "<input id='wtg_meta_region_weather_geo_title_string' name='wtg_meta_titles_options[region_weather_geo_title]' size='120 type='text' value='{$options['region_weather_geo_title']}' />";
		}
		// doing business and staying in touch
		function wtg_meta_region_business_title_string()
		{
			$options = get_option('wtg_meta_titles_options');
			echo "<input id='wtg_meta_region_business_title_string' name='wtg_meta_titles_options[region_business_title]' size='120 type='text' value='{$options['region_business_title']}' />";
		}
		// Travel to
		function wtg_meta_region_travel_to_title_string()
		{
			$options = get_option('wtg_meta_titles_options');
			echo "<input id='wtg_meta_region_travel_to_title_string' name='wtg_meta_titles_options[region_travel_to_title]' size='120 type='text' value='{$options['region_travel_to_title']}' />";
		}
		// Where to stay
		function wtg_meta_region_where_stay_title_string()
		{
			$options = get_option('wtg_meta_titles_options');
			echo "<input id='wtg_meta_region_where_stay_title_string' name='wtg_meta_titles_options[region_where_stay_title]' size='120 type='text' value='{$options['region_where_stay_title']}' />";
		}
		// Passport Visa
		function wtg_meta_region_pass_visa_title_string()
		{
			$options = get_option('wtg_meta_titles_options');
			echo "<input id='wtg_meta_region_pass_visa_title_string' name='wtg_meta_titles_options[region_pass_visa_title]' size='120 type='text' value='{$options['region_pass_visa_title']}' />";
		}
		// Health
		function wtg_meta_region_health_title_string()
		{
			$options = get_option('wtg_meta_titles_options');
			echo "<input id='wtg_meta_region_health_title_string' name='wtg_meta_titles_options[region_health_title]' size='120 type='text' value='{$options['region_health_title']}' />";
		}
		// Public Holidays
		function wtg_meta_region_pub_hols_title_string()
		{
			$options = get_option('wtg_meta_titles_options');
			echo "<input id='wtg_meta_region_pub_hols_title_string' name='wtg_meta_titles_options[region_pub_hols_title]' size='120 type='text' value='{$options['region_pub_hols_title']}' />";
		}
		// Money Duty free
		function wtg_meta_region_money_duty_title_string()
		{
			$options = get_option('wtg_meta_titles_options');
			echo "<input id='wtg_meta_region_money_duty_title_string' name='wtg_meta_titles_options[region_money_duty_title]' size='120 type='text' value='{$options['region_money_duty_title']}' />";
		}
		// Things to see
		function wtg_meta_region_things_see_title_string()
		{
			$options = get_option('wtg_meta_titles_options');
			echo "<input id='wtg_meta_region_things_see_title_string' name='wtg_meta_titles_options[region_things_see_title]' size='120 type='text' value='{$options['region_things_see_title']}' />";
		}
		// Shopping and Nightlife
		function wtg_meta_region_nightlife_title_string()
		{
			$options = get_option('wtg_meta_titles_options');
			echo "<input id='wtg_meta_region_nightlife_title_string' name='wtg_meta_titles_options[region_nightlife_title]' size='120 type='text' value='{$options['region_nightlife_title']}' />";
		}
		// Food & Drink
		function wtg_meta_region_food_title_string()
		{
			$options = get_option('wtg_meta_titles_options');
			echo "<input id='wtg_meta_region_food_title_string' name='wtg_meta_titles_options[region_food_title]' size='120 type='text' value='{$options['region_food_title']}' />";
		}
		// Getting Around
		function wtg_meta_region_travel_by_title_string()
		{
			$options = get_option('wtg_meta_titles_options');
			echo "<input id='wtg_meta_region_travel_by_title_string' name='wtg_meta_titles_options[region_travel_by_title]' size='120 type='text' value='{$options['region_travel_by_title']}' />";
		}
		// Events
		function wtg_meta_region_events_title_string()
		{
			$options = get_option('wtg_meta_titles_options');
			echo "<input id='wtg_meta_region_events_title_string' name='wtg_meta_titles_options[region_events_title]' size='120 type='text' value='{$options['region_events_title']}' />";
		}
		
	//cities
		// History
		function wtg_meta_city_history_title_string()
		{
			$options = get_option('wtg_meta_titles_options');
			echo "<input id='wtg_meta_city_history_title_string' name='wtg_meta_titles_options[city_history_title]' size='120 type='text' value='{$options['city_history_title']}' />";
		}
		// Weather
		function wtg_meta_city_weather_title_string()
		{
			$options = get_option('wtg_meta_titles_options');
			echo "<input id='wtg_meta_city_weather_title_string' name='wtg_meta_titles_options[city_weather_title]' size='120 type='text' value='{$options['city_weather_title']}' />";
		}
		// Getting around
		function wtg_meta_city_travel_by_title_string()
		{
			$options = get_option('wtg_meta_titles_options');
			echo "<input id='wtg_meta_city_travel_by_title_string' name='wtg_meta_titles_options[city_travel_by_title]' size='120 type='text' value='{$options['city_travel_by_title']}' />";
		}
		// Things to see
		function wtg_meta_city_things_see_title_string()
		{
			$options = get_option('wtg_meta_titles_options');
			echo "<input id='wtg_meta_city_things_see_title_string' name='wtg_meta_titles_options[city_things_see_title]' size='120 type='text' value='{$options['city_things_see_title']}' />";
		}
		// Tours and excursions
		function wtg_meta_city_tours_title_string()
		{
			$options = get_option('wtg_meta_titles_options');
			echo "<input id='wtg_meta_city_tours_title_string' name='wtg_meta_titles_options[city_tours_title]' size='120 type='text' value='{$options['city_tours_title']}' />";
		}
		// Things to do
		function wtg_meta_city_things_do_title_string()
		{
			$options = get_option('wtg_meta_titles_options');
			echo "<input id='wtg_meta_city_things_do_title_string' name='wtg_meta_titles_options[city_things_do_title]' size='120 type='text' value='{$options['city_things_do_title']}' />";
		}
		// Restaurants
		function wtg_meta_city_restaurants_title_string()
		{
			$options = get_option('wtg_meta_titles_options');
			echo "<input id='wtg_meta_city_restaurants_title_string' name='wtg_meta_titles_options[city_restaurants_title]' size='120 type='text' value='{$options['city_restaurants_title']}' />";
		}
		// Shopping
		function wtg_meta_city_shopping_title_string()
		{
			$options = get_option('wtg_meta_titles_options');
			echo "<input id='wtg_meta_city_shopping_title_string' name='wtg_meta_titles_options[city_shopping_title]' size='120 type='text' value='{$options['city_shopping_title']}' />";
		}
		// Nightlife
		function wtg_meta_city_nightlife_title_string()
		{
			$options = get_option('wtg_meta_titles_options');
			echo "<input id='wtg_meta_city_nightlife_title_string' name='wtg_meta_titles_options[city_nightlife_title]' size='120 type='text' value='{$options['city_nightlife_title']}' />";
		}
		// Events
		function wtg_meta_city_events_title_string()
		{
			$options = get_option('wtg_meta_titles_options');
			echo "<input id='wtg_meta_city_events_title_string' name='wtg_meta_titles_options[city_events_title]' size='120 type='text' value='{$options['city_events_title']}' />";
		}
		// Travel To
		function wtg_meta_city_travel_to_title_string()
		{
			$options = get_option('wtg_meta_titles_options');
			echo "<input id='wtg_meta_city_travel_to_title_string' name='wtg_meta_titles_options[city_travel_to_title]' size='120 type='text' value='{$options['city_travel_to_title']}' />";
		}
		// Hotels
		function wtg_meta_city_hotels_title_string()
		{
			$options = get_option('wtg_meta_titles_options');
			echo "<input id='wtg_meta_city_hotels_title_string' name='wtg_meta_titles_options[city_hotels_title]' size='120 type='text' value='{$options['city_hotels_title']}' />";
		}
	//Ski
		// apres
		function wtg_meta_ski_apres_title_string()
		{
			$options = get_option('wtg_meta_titles_options');
			echo "<input id='wtg_meta_ski_apres_title_string' name='wtg_meta_titles_options[ski_apres_title]' size='120 type='text' value='{$options['ski_apres_title']}' />";
		}
		
		
//Descriptions

	// default region desc
		function wtg_meta_region_default_desc_string()
		{
			$options = get_option('wtg_meta_descs_options');
			echo "<input id='wtg_meta_region_default_desc_string' name='wtg_meta_descs_options[region_default_desc]' size='120 type='text' value='{$options['region_default_desc']}' />";
		}
		// history language and culture
		function wtg_meta_region_history_lang_desc_string()
		{
			$options = get_option('wtg_meta_descs_options');
			echo "<input id='wtg_meta_region_history_lang_desc_string' name='wtg_meta_descs_options[region_history_lang_desc]' size='120 type='text' value='{$options['region_history_lang_desc']}' />";
		}
		// weather and geography
		function wtg_meta_region_weather_geo_desc_string()
		{
			$options = get_option('wtg_meta_descs_options');
			echo "<input id='wtg_meta_region_weather_geo_desc_string' name='wtg_meta_descs_options[region_weather_geo_desc]' size='120 type='text' value='{$options['region_weather_geo_desc']}' />";
		}
		// doing business and staying in touch
		function wtg_meta_region_business_desc_string()
		{
			$options = get_option('wtg_meta_descs_options');
			echo "<input id='wtg_meta_region_business_desc_string' name='wtg_meta_descs_options[region_business_desc]' size='120 type='text' value='{$options['region_business_desc']}' />";
		}
		// Travel to
		function wtg_meta_region_travel_to_desc_string()
		{
			$options = get_option('wtg_meta_descs_options');
			echo "<input id='wtg_meta_region_travel_to_desc_string' name='wtg_meta_descs_options[region_travel_to_desc]' size='120 type='text' value='{$options['region_travel_to_desc']}' />";
		}
		// Where to stay
		function wtg_meta_region_where_stay_desc_string()
		{
			$options = get_option('wtg_meta_descs_options');
			echo "<input id='wtg_meta_region_where_stay_desc_string' name='wtg_meta_descs_options[region_where_stay_desc]' size='120 type='text' value='{$options['region_where_stay_desc']}' />";
		}
		// Passport Visa
		function wtg_meta_region_pass_visa_desc_string()
		{
			$options = get_option('wtg_meta_descs_options');
			echo "<input id='wtg_meta_region_pass_visa_desc_string' name='wtg_meta_descs_options[region_pass_visa_desc]' size='120 type='text' value='{$options['region_pass_visa_desc']}' />";
		}
		// Health
		function wtg_meta_region_health_desc_string()
		{
			$options = get_option('wtg_meta_descs_options');
			echo "<input id='wtg_meta_region_health_desc_string' name='wtg_meta_descs_options[region_health_desc]' size='120 type='text' value='{$options['region_health_desc']}' />";
		}
		// Public Holidays
		function wtg_meta_region_pub_hols_desc_string()
		{
			$options = get_option('wtg_meta_descs_options');
			echo "<input id='wtg_meta_region_pub_hols_desc_string' name='wtg_meta_descs_options[region_pub_hols_desc]' size='120 type='text' value='{$options['region_pub_hols_desc']}' />";
		}
		// Money Duty free
		function wtg_meta_region_money_duty_desc_string()
		{
			$options = get_option('wtg_meta_descs_options');
			echo "<input id='wtg_meta_region_money_duty_desc_string' name='wtg_meta_descs_options[region_money_duty_desc]' size='120 type='text' value='{$options['region_money_duty_desc']}' />";
		}
		// Things to see
		function wtg_meta_region_things_see_desc_string()
		{
			$options = get_option('wtg_meta_descs_options');
			echo "<input id='wtg_meta_region_things_see_desc_string' name='wtg_meta_descs_options[region_things_see_desc]' size='120 type='text' value='{$options['region_things_see_desc']}' />";
		}
		// Shopping and Nightlife
		function wtg_meta_region_nightlife_desc_string()
		{
			$options = get_option('wtg_meta_descs_options');
			echo "<input id='wtg_meta_region_nightlife_desc_string' name='wtg_meta_descs_options[region_nightlife_desc]' size='120 type='text' value='{$options['region_nightlife_desc']}' />";
		}
		// Food & Drink
		function wtg_meta_region_food_desc_string()
		{
			$options = get_option('wtg_meta_descs_options');
			echo "<input id='wtg_meta_region_food_desc_string' name='wtg_meta_descs_options[region_food_desc]' size='120 type='text' value='{$options['region_food_desc']}' />";
		}
		// Getting Around
		function wtg_meta_region_travel_by_desc_string()
		{
			$options = get_option('wtg_meta_descs_options');
			echo "<input id='wtg_meta_region_travel_by_desc_string' name='wtg_meta_descs_options[region_travel_by_desc]' size='120 type='text' value='{$options['region_travel_by_desc']}' />";
		}
		// Events
		function wtg_meta_region_events_desc_string()
		{
			$options = get_option('wtg_meta_descs_options');
			echo "<input id='wtg_meta_region_events_desc_string' name='wtg_meta_descs_options[region_events_desc]' size='120 type='text' value='{$options['region_events_desc']}' />";
		}
		
	//cities
		// History
		function wtg_meta_city_history_desc_string()
		{
			$options = get_option('wtg_meta_descs_options');
			echo "<input id='wtg_meta_city_history_desc_string' name='wtg_meta_descs_options[city_history_desc]' size='120 type='text' value='{$options['city_history_desc']}' />";
		}
		// Weather
		function wtg_meta_city_weather_desc_string()
		{
			$options = get_option('wtg_meta_descs_options');
			echo "<input id='wtg_meta_city_weather_desc_string' name='wtg_meta_descs_options[city_weather_desc]' size='120 type='text' value='{$options['city_weather_desc']}' />";
		}
		// Getting around
		function wtg_meta_city_travel_by_desc_string()
		{
			$options = get_option('wtg_meta_descs_options');
			echo "<input id='wtg_meta_city_travel_by_desc_string' name='wtg_meta_descs_options[city_travel_by_desc]' size='120 type='text' value='{$options['city_travel_by_desc']}' />";
		}
		// Things to see
		function wtg_meta_city_things_see_desc_string()
		{
			$options = get_option('wtg_meta_descs_options');
			echo "<input id='wtg_meta_city_things_see_desc_string' name='wtg_meta_descs_options[city_things_see_desc]' size='120 type='text' value='{$options['city_things_see_desc']}' />";
		}
		// Tours and excursions
		function wtg_meta_city_tours_desc_string()
		{
			$options = get_option('wtg_meta_descs_options');
			echo "<input id='wtg_meta_city_tours_desc_string' name='wtg_meta_descs_options[city_tours_desc]' size='300 type='text' value='{$options['city_tours_desc']}' />";
		}
		// Things to do
		function wtg_meta_city_things_do_desc_string()
		{
			$options = get_option('wtg_meta_descs_options');
			echo "<input id='wtg_meta_city_things_do_desc_string' name='wtg_meta_descs_options[city_things_do_desc]' size='120 type='text' value='{$options['city_things_do_desc']}' />";
		}
		// Restaurants
		function wtg_meta_city_restaurants_desc_string()
		{
			$options = get_option('wtg_meta_descs_options');
			echo "<input id='wtg_meta_city_restaurants_desc_string' name='wtg_meta_descs_options[city_restaurants_desc]' size='120 type='text' value='{$options['city_restaurants_desc']}' />";
		}
		// Shopping
		function wtg_meta_city_shopping_desc_string()
		{
			$options = get_option('wtg_meta_descs_options');
			echo "<input id='wtg_meta_city_shopping_desc_string' name='wtg_meta_descs_options[city_shopping_desc]' size='120 type='text' value='{$options['city_shopping_desc']}' />";
		}
		// Nightlife
		function wtg_meta_city_nightlife_desc_string()
		{
			$options = get_option('wtg_meta_descs_options');
			echo "<input id='wtg_meta_city_nightlife_desc_string' name='wtg_meta_descs_options[city_nightlife_desc]' size='120 type='text' value='{$options['city_nightlife_desc']}' />";
		}
		// Events
		function wtg_meta_city_events_desc_string()
		{
			$options = get_option('wtg_meta_descs_options');
			echo "<input id='wtg_meta_city_events_desc_string' name='wtg_meta_descs_options[city_events_desc]' size='120 type='text' value='{$options['city_events_desc']}' />";
		}
		// Travel To
		function wtg_meta_city_travel_to_desc_string()
		{
			$options = get_option('wtg_meta_descs_options');
			echo "<input id='wtg_meta_city_travel_to_desc_string' name='wtg_meta_descs_options[city_travel_to_desc]' size='120 type='text' value='{$options['city_travel_to_desc']}' />";
		}
		// Hotels
		function wtg_meta_city_hotels_desc_string()
		{
			$options = get_option('wtg_meta_descs_options');
			echo "<input id='wtg_meta_city_hotels_desc_string' name='wtg_meta_descs_options[city_hotels_desc]' size='120 type='text' value='{$options['city_hotels_desc']}' />";
		}
	//Ski
		// apres
		function wtg_meta_ski_apres_desc_string()
		{
			$options = get_option('wtg_meta_descs_options');
			echo "<input id='wtg_meta_ski_apres_desc_string' name='wtg_meta_descs_options[ski_apres_desc]' size='120 type='text' value='{$options['ski_apres_desc']}' />";
		}
	
	
	
// validation functions
	function wtg_meta_default_options_validate($input) {
		$options = get_option('wtg_meta_default_options');
		$options['site_description'] = trim($input['site_description']);
		$options['site_title'] = trim($input['site_title']);
		$options['site_h1'] = trim($input['site_h1']);
		//if(!preg_match('/^[a-z0-9]{32}$/i', $options['site_description'])) {
		//$options['site_description'] = '';
		//}
		return $options;
	}

	function wtg_meta_titles_options_validate($input) {
		$options = $input;
		
		
		//$options = get_option('wtg_meta_titles_options');
		//$options['region_default_title'] = trim($input['region_default_title']);
		//$options['site_description'] = trim($input['site_description']);
		//if(!preg_match('/^[a-z0-9]{32}$/i', $options['site_description'])) {
		//$options['site_description'] = '';
		//}
		return $options;
	}
	
	function wtg_meta_descs_options_validate($input) {
		$options = $input;
		
		
		//$options = get_option('wtg_meta_titles_options');
		//$options['region_default_title'] = trim($input['region_default_title']);
		//$options['site_description'] = trim($input['site_description']);
		//if(!preg_match('/^[a-z0-9]{32}$/i', $options['site_description'])) {
		//$options['site_description'] = '';
		//}
		return $options;
	}
	

?>