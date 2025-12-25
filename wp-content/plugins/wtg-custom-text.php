<?php
/*
/*
Plugin Name: WTG custom text
Description: replaces the default text widget
Author: Adam Faulkner
Version: 1.0
*/


class Wtg_custom_text extends WP_Widget
{	
	function __construct() {parent::__construct ('Wtg_custom_text', 'WTG custom text', array ('description' => 'replaces the default text widget',));}
	
	public function widget( $args, $instance )
	{
		extract ($args);
		$title =apply_filters ('widget_title', $instance['title']); 
		$text = $instance['custom-text'];
        echo $before_widget;
        echo '<div class="col-md-4 col-sm-4 about tablet_hide">';
        echo '<h3>'.$title.'</h3>
            <p>'.$text.'</p>';
        echo '</div>';
		echo $after_widget;
	}
	
	public function form ($instance) 
	{
		if ( $instance )
		{ 
			$title = $instance['title'];
			$text = $instance['text'];
		}
        echo '<p>
                <h2>Section Title and See more Link</h3>
                <h4>Title</h4>
                <input type="text" id="'.$this->get_field_id('title').'" name="'.$this->get_field_name( 'title' ).'" type="text" value="'.esc_attr( $title ).'" /><br/>
                
                <h4>Text</h4>
                <textarea type="text" id="'.$this->get_field_id('custom-text').'" name="'.$this->get_field_name( 'custom-text' ).'" />'.esc_textarea( $instance['custom-text'] ).'</textarea><br/>
            </p>';
}

public function update( $new_instance, $old_instance ) 
{
	$instance = $old_instance;
	$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
	$instance['custom-text']= $new_instance['custom-text'];
	return $instance;
}

} 
function register_custom_text() { register_widget( 'Wtg_custom_text' ); }
add_action( 'widgets_init', 'register_custom_text' );	
