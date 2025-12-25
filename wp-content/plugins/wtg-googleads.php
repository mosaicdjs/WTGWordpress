<?php
/**
 * Plugin Name: WTG Google Ads
 * Description: Creates options menu allowing the user to manage google advert scripts.
 * Version: 1.0
 * Author: Adam Faulkner
 */


// Hook for adding admin menus
add_action('admin_menu', 'wtg_google_ad_pages');
add_action('admin_init', 'wtg_google_ads_default_admin_init');

function wtg_google_ad_pages()
{
    // Add a new top-level menu (ill-advised):
    add_menu_page(__('WTG Google','wtg-google'), __('WTG Google','wtg-google'), 'manage_options', 'wtg-google-handle', 'wtg_google_page' );

}


function wtg_google_ads_default_admin_init()
{
	register_setting( 'wtg_google_ads_options', 'wtg_google_ads_options', 'wtg_google_ads_options_validate' );
	
    add_settings_section('wtg_google_ads_header_main', 'WTG Google Ads Header', 'wtg_google_ads_header_section_text', 'wtg_google_ads_header');
        add_settings_field('wtg_google_ads_header_string', 'Google Ads header', 'wtg_google_ads_header_setting_string', 'wtg_google_ads_header', 'wtg_google_ads_header_main');
		add_settings_field('wtg_google_analytics_string', 'Google Analytics', 'wtg_google_analytics_setting_string', 'wtg_google_ads_header', 'wtg_google_ads_header_main');
		add_settings_field('wtg_google_footer_string', 'Ads Footer', 'wtg_google_footer_setting_string', 'wtg_google_ads_header', 'wtg_google_ads_header_main');
	
    add_settings_section('wtg_google_ads_region_main', 'WTG Google Ad Regions', 'wtg_google_ads_regions_section_text', 'wtg_google_ads_regions');
        
        //leaderboard
        add_settings_field('wtg_google_ads_leaderboard_string', 'Google Ads Leaderboard', 'wtg_google_ads_leaderboard_setting_string', 'wtg_google_ads_regions', 'wtg_google_ads_region_main');
        //leaderboard footer
        add_settings_field('wtg_google_ads_leaderboard_footer_string', 'Google Ads Leaderboard Footer', 'wtg_google_ads_leaderboard_footer_setting_string', 'wtg_google_ads_regions', 'wtg_google_ads_region_main');

        //MPU 1
        add_settings_field('wtg_google_ads_mpu1_string', 'Google Ads MPU1', 'wtg_google_ads_mpu1_setting_string', 'wtg_google_ads_regions', 'wtg_google_ads_region_main');
        //MPU 2
        add_settings_field('wtg_google_ads_mpu2_string', 'Google Ads MPU2', 'wtg_google_ads_mpu2_setting_string', 'wtg_google_ads_regions', 'wtg_google_ads_region_main');
        //MPU 3
        add_settings_field('wtg_google_ads_mpu3_string', 'Google Ads MPU3', 'wtg_google_ads_mpu3_setting_string', 'wtg_google_ads_regions', 'wtg_google_ads_region_main');
        //MPU 4
        add_settings_field('wtg_google_ads_mpu4_string', 'Google Ads MPU4', 'wtg_google_ads_mpu4_setting_string', 'wtg_google_ads_regions', 'wtg_google_ads_region_main');
        //MPU 5
        add_settings_field('wtg_google_ads_mpu5_string', 'Google Ads MPU5', 'wtg_google_ads_mpu5_setting_string', 'wtg_google_ads_regions', 'wtg_google_ads_region_main');
        //MPU 6
        add_settings_field('wtg_google_ads_mpu6_string', 'Google Ads MPU6', 'wtg_google_ads_mpu6_setting_string', 'wtg_google_ads_regions', 'wtg_google_ads_region_main');
        //MPU 7
        add_settings_field('wtg_google_ads_mpu7_string', 'Google Ads MPU7', 'wtg_google_ads_mpu7_setting_string', 'wtg_google_ads_regions', 'wtg_google_ads_region_main');
}

		
//WTG Meta - Pages
	//Default meta data page
	function wtg_google_page()
	{
		echo "<h1>" . __( 'WTG Google Adverts', 'wtg-google' ) . "</h1>";
		echo "";

		?>
		<div>
			<form action="options.php" method="post">
				<?php settings_fields('wtg_google_ads_options'); ?>
				<?php do_settings_sections('wtg_google_ads_header'); ?>
                <?php do_settings_sections('wtg_google_ads_regions'); ?>
				 
				<input name="Submit" type="submit" value="<?php esc_attr_e('Save Changes'); ?>" />
			</form>
		</div>
		 
		<?php
	}
	
	
	
	
//Sections
	function wtg_google_ads_header_section_text() {
		echo '<p>Edit the header code here.</p>';
		
	}
	
	// Region titles
	function wtg_google_ads_regions_section_text() {
		echo '<p>Edit the code for various google ad regions here.</p>';
		?><input name="Submit" type="submit" value="<?php esc_attr_e('Save Changes'); ?>" /><?php
	}
	
//input fields titles
	//default pages - yoast overrides
		// default meta home page and other
		function wtg_google_ads_header_setting_string() {
			$options = get_option('wtg_google_ads_options');
            echo "<textarea id='plugin_textarea_string' name='wtg_google_ads_options[header_code]' rows='7' cols='100' type='textarea'>{$options['header_code']}</textarea>";
		}
        
		function wtg_google_analytics_setting_string() {
			$options = get_option('wtg_google_ads_options');
            echo "<textarea id='plugin_textarea_string2' name='wtg_google_ads_options[analytics_code]' rows='7' cols='100' type='textarea'>{$options['analytics_code']}</textarea>";
		}
		
		function wtg_google_footer_setting_string() {
			$options = get_option('wtg_google_ads_options');
            echo "<textarea id='wtg_google_footer_string' name='wtg_google_ads_options[footer_code]' rows='7' cols='100' type='textarea'>{$options['footer_code']}</textarea>";
		}
		
        function wtg_google_ads_leaderboard_setting_string() {
			$options = get_option('wtg_google_ads_options');
			echo "<input id='wtg_meta_default_string' name='wtg_google_ads_options[leaderboard]' size='120 type='text' value='{$options['leaderboard']}' />";
		}
        function wtg_google_ads_leaderboard_footer_setting_string() {
			$options = get_option('wtg_google_ads_options');
			echo "<input id='wtg_meta_default_string' name='wtg_google_ads_options[leaderboard_footer]' size='120 type='text' value='{$options['leaderboard_footer']}' />";
		}
        
        function wtg_google_ads_mpu1_setting_string() {
			$options = get_option('wtg_google_ads_options');
			echo "<input id='wtg_meta_default_string' name='wtg_google_ads_options[mpu1_code]' size='120 type='text' value='{$options['mpu1_code']}' />";
		}
        function wtg_google_ads_mpu2_setting_string() {
			$options = get_option('wtg_google_ads_options');
			echo "<input id='wtg_meta_default_string' name='wtg_google_ads_options[mpu2_code]' size='120 type='text' value='{$options['mpu2_code']}' />";
		}
        function wtg_google_ads_mpu3_setting_string() {
			$options = get_option('wtg_google_ads_options');
			echo "<input id='wtg_meta_default_string' name='wtg_google_ads_options[mpu3_code]' size='120 type='text' value='{$options['mpu3_code']}' />";
		}
        function wtg_google_ads_mpu4_setting_string() {
			$options = get_option('wtg_google_ads_options');
			echo "<input id='wtg_meta_default_string' name='wtg_google_ads_options[mpu4_code]' size='120 type='text' value='{$options['mpu4_code']}' />";
		}
        function wtg_google_ads_mpu5_setting_string() {
			$options = get_option('wtg_google_ads_options');
			echo "<input id='wtg_meta_default_string' name='wtg_google_ads_options[mpu5_code]' size='120 type='text' value='{$options['mpu5_code']}' />";
		}
        function wtg_google_ads_mpu6_setting_string() {
			$options = get_option('wtg_google_ads_options');
			echo "<input id='wtg_meta_default_string' name='wtg_google_ads_options[mpu6_code]' size='120 type='text' value='{$options['mpu6_code']}' />";
		}
        function wtg_google_ads_mpu7_setting_string() {
			$options = get_option('wtg_google_ads_options');
			echo "<input id='wtg_meta_default_string' name='wtg_google_ads_options[mpu7_code]' size='120 type='text' value='{$options['mpu7_code']}' />";
		}
        
        

// validation functions
	
	function wtg_google_ads_options_validate($input) {
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