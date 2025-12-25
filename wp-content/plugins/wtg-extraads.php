<?php
/*
/*
Plugin Name: WTG Extra Ads
Description: widget to add thirdparty codes 
Author: Adam Faulkner
Version: 1.0
*/


class Wtg_extra_ads extends WP_Widget
{	
	function __construct() {parent::__construct ('Wtg_extra_ads', 'WTG Extra Ads', array ('description' => 'widget to add thirdparty codes ',));}
	
	public function widget( $args, $instance )
	{
		extract ($args);
		$ad_ids = $instance['ad_ids'];
		$third_party_code = $instance['third_party_code'];
        echo $before_widget;
        
        $location_ids = explode(",", $ad_ids);
        
        $destid = get_the_ID();
        //echo $destid;

        foreach($location_ids as $loc_id){
            if($loc_id == $destid){
                echo $third_party_code;
            }
        }
        
		echo $after_widget;
	}
	
	public function form ($instance) 
	{
		if ( $instance )
		{ 
			$ad_ids = $instance['ad_ids'];
			$third_party_code = $instance['third_party_code'];
		}
        echo '<p>
                <h2>Thirdparty code and Destinations ID</h3>
                <h4>Destination IDs</h4>
                destination ids separated by a comma. e.g. "111,222,333"
                <input type="text" id="'.$this->get_field_id('ad_ids').'" name="'.$this->get_field_name( 'ad_ids' ).'" type="text" value="'.esc_attr( $ad_ids ).'" /><br/>
                
                <h4>Third Party Code</h4>
                <textarea type="text" id="'.$this->get_field_id('third_party_code').'" name="'.$this->get_field_name( 'third_party_code' ).'" />'.esc_textarea( $instance['third_party_code'] ).'</textarea><br/>
            </p>';
    }

    public function update( $new_instance, $old_instance ) 
    {
        $instance = $old_instance;
        $instance['ad_ids'] = ( ! empty( $new_instance['ad_ids'] ) ) ? strip_tags( $new_instance['ad_ids'] ) : '';
        $instance['third_party_code']= $new_instance['third_party_code'];
        return $instance;
    }

} 
function register_wtg_extra_ads() { register_widget( 'Wtg_extra_ads' ); }
add_action( 'widgets_init', 'register_wtg_extra_ads' );	
