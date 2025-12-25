<?php
/*
/*
Plugin Name: Section title and See more
Description: Displays a section title and see more link
Author: Adam Faulkner
Version: 1.0
*/


class Wtg_section_link extends WP_Widget
{	
	function __construct() {parent::__construct ('Wtg_section_link', 'Section title and See more', array ('description' => 'Displays a section title and see more link',));}
	
	public function widget( $args, $instance )
	{
		extract ($args);
		$title =apply_filters ('widget_title', $instance['title']); 
		$urlStr = $instance['linkURL'];
		$text = $instance['text'];
		$linkURL = '';
		
		$parsed = parse_url($urlStr);
		if (empty($parsed['scheme'])) {
			$linkURL = get_home_url().'/'. ltrim($urlStr, '/');
		} else{
			$linkURL = $urlStr;
		}
		
		
        
        echo '<div class="row">
            <h2><i class="icon icon_1"></i>'.$title.'</h2>';
           if($text != '') {echo '<a href="'.$linkURL.'" class="seemore">'.$text.'</a>';}
        echo'</div>';
		
	}
	
	public function form ($instance) 
	{
		if ( $instance )
		{ 
			$title = $instance['title'];
			$linkURL = $instance['linkURL'];
			$text = $instance['text'];
		}
        echo '<p>
                <h2>Section Title and See more Link</h3>
                <h4>Title</h4>
                <input type="text" id="'.$this->get_field_id('title').'" name="'.$this->get_field_name( 'title' ).'" type="text" value="'.esc_attr( $title ).'" /><br/>
                
                <h4>Link</h4>
                <input type="text" id="'.$this->get_field_id('linkURL').'" name="'.$this->get_field_name( 'linkURL' ).'" type="text" value="'.esc_attr( $linkURL ).'" /><br/>
                
                <h4>See More text</h4>
                <input type="text" id="'.$this->get_field_id('text').'" name="'.$this->get_field_name( 'text' ).'" type="text" value="'.esc_attr( $text ).'" /><br/>
            </p>';
}

public function update( $new_instance, $old_instance ) 
{
	$instance = $old_instance;
	$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
	$instance['linkURL'] = $new_instance['linkURL'];
	$instance['text']= $new_instance['text'];
	return $instance;
}

} 
function register_section_link() { register_widget( 'Wtg_section_link' ); }
add_action( 'widgets_init', 'register_section_link' );	
