<?php
/*
/*
Plugin Name: WTG Bespoke Display of Image with Link
Plugin URI: http://linnetdigital.com
Description: Displays an accrediation image & link
Author: Linnet
Version: 1.0
Text Domain: Linnet
Author URI: http://linnetdigital.com
*/


class accreditation_social_link extends WP_Widget
{	
	function __construct() {parent::__construct ('accreditation_social_link', 'Linked Images', array ('description' => 'This widget displays an accreditation/social media image & a link',));}
	
	public function widget( $args, $instance )
	{
		extract ($args);
		$title =apply_filters ('widget_title', $instance['title']); 
		$linkURL = $instance['link-url'];
		$imageID = $instance['image_id'];
		echo $before_widget;
		$image = wp_get_attachment_url( $imageID);
		$imageAlt = get_post_meta( $imageID, '_wp_attachment_image_alt', true );
		$imageMeta = wp_prepare_attachment_for_js( $imageID );
					//var_dump($imageMeta);
		$imageAlt = $imageMeta['alt'];
		if ($imageAlt == '') $imageAlt = $imageMeta['caption'];
		if ($imageAlt == '') $imageAlt = $imageMeta['title'];
		$blogID = get_current_blog_id();
		if($blogID ==3){echo '<div>';}
		if ($linkURL) {echo '<a href="'.$linkURL.'"><img alt="'.$imageAlt.'" src="'.$image.'"></a>'; }
		else {echo '<a><img alt="'.$imageAlt.'" src="'.$image.'"></a>';}
		
		echo $after_widget;
	}
	
	public function form ($instance) 
	{
		if ( $instance )
		{ 
			$title = $instance['title'];
			$linkURL = $instance['link-url'];
			$imageID = $instance['image_id'];
		}
echo'	
		<p><input type="text" id="'.$this->get_field_id('title').'" name="'.$this->get_field_name('title').'" value="'.$title.'" placeholder = "Image name"></p>';
		pco_image_field( $this, $instance );
echo'	<p><input type="text" id="'.$this->get_field_id('link-url').'" name="'.$this->get_field_name('link-url').'"  value="'.$linkURL.'" placeholder = "Link URL"></p>';
}

public function update( $new_instance, $old_instance ) 
{
	$instance = $old_instance;
	$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
	$instance['link-url'] = $new_instance['link-url'];
	$instance['image_id']= $new_instance['image_id'];
	return $instance;
}

} 
function register_accreditation() { register_widget( 'accreditation_social_link' ); }
add_action( 'widgets_init', 'register_accreditation' );	
