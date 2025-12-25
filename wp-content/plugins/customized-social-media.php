<?php
/*
/*
Plugin Name: Custom Social Media
Description: Displays social media buttons
Author: Adam Faulkner
Version: 1.0
*/

class social_widget extends WP_Widget {	
	
/* Register the widget */
	
function __construct()
{
	parent::__construct ('social_widget', 'Custom Social Media', array ('description' => 'Social Media Links'));
}

/* Front end display -- $args: Widget arguments -- $instance: - saved values */	
	
public function widget( $args, $instance )
{
	extract ($args);
	$title = $instance['title'];
	$instagram =$instance['instagram'];
	$twitter =$instance['twitter'];
	$pintrest =$instance['pintrest'];
	$facebook =$instance['facebook'];
	$linkedin =$instance['linkedin'];
	echo '<div class="container">';
		echo '<h3>'.$title.'</h3>';
		echo '<ul class="social-icons">';
			if($instagram!=''){echo '<li><a href="'.$instagram.'" target="_blank"><div class="fb-icon"></div></a></li>';}
			if($twitter!=''){echo '<li><a href="'.$twitter.'" target="_blank"><div class="twitter-icon"></div></a></li>';}
			if($pintrest!=''){echo '<li><a href="'.$pintrest.'" target="_blank"><div class="gplus-icon"></div></a></li>';}
			if($facebook!=''){echo '<li><a href="'.$facebook.'" target="_blank"><div class="pinterest-icon"></div></a></li>';}
			if($linkedin!=''){echo '<li><a href="'.$linkedin.'" target="_blank"><div class="mail-icon"></div></a></li>';}
		echo '</ul>';
	echo '</div>';
}
 
// Widget Backend 
public function form( $instance ) 
{
$title = $instance[ 'title' ];
$instagram = $instance[ 'instagram' ]; 
$twitter = $instance[ 'twitter' ];
$pintrest = $instance[ 'pintrest' ];
$facebook = $instance[ 'facebook' ];
$linkedin =$instance['linkedin'];

echo
'<p>Title <br />
	<input type="text" id="'.$this->get_field_id( 'title' ).'" name="'.$this->get_field_name( 'title' ).'" type="text" value="'.esc_attr( $title ).'" />
</p>';
echo
'<p>Facebook URL <br />
	<input type="text" id="'.$this->get_field_id( 'instagram' ).'" name="'.$this->get_field_name( 'instagram' ).'" type="text" value="'.esc_attr( $instagram ).'" />
</p>';
echo
'<p>Twitter URL <br />
	<input type="text" id="'.$this->get_field_id( 'twitter' ).'" name="'.$this->get_field_name( 'twitter' ).'" type="text" value="'.esc_attr( $twitter ).'" />
</p>';
echo
'<p>Google+ URL <br />
	<input type="text" id="'.$this->get_field_id( 'pintrest' ).'" name="'.$this->get_field_name( 'pintrest' ).'" type="text" value="'.esc_attr( $pintrest ).'" />
</p>';
echo
'<p>Pintrest URL <br />
	<input type="text" id="'.$this->get_field_id( 'facebook' ).'" name="'.$this->get_field_name( 'facebook' ).'" type="text" value="'.esc_attr( $facebook ).'" />
</p>';
echo
'<p>mail URL <br />
	<input type="text" id="'.$this->get_field_id( 'linkedin' ).'" name="'.$this->get_field_name( 'linkedin' ).'" type="text" value="'.esc_attr( $linkedin ).'" />
</p>';

}
	
// Updating widget replacing old instances with new
public function update( $new_instance, $old_instance ) 
{
$instance = $old_instance;
$instance['title'] = strip_tags( $new_instance['title'] );
$instance['facebook'] = strip_tags( $new_instance['facebook'] );
$instance['pintrest'] = strip_tags( $new_instance['pintrest'] ); 
$instance['twitter'] = strip_tags( $new_instance['twitter'] ); 
$instance['instagram'] = strip_tags( $new_instance['instagram'] );
$instance['linkedin'] = strip_tags( $new_instance['linkedin'] ); 
return $instance;
}

} // Class socialwidget ends here

// Register and load the widget
function social_load_widget() {register_widget( 'social_widget' );}
add_action( 'widgets_init', 'social_load_widget' );	