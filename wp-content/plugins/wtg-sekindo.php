<?php
/*
/*
Plugin Name: WTG Sekindo
Description: Displays Videos
Author: David Sherratt
Version: 1.0
*/


class wtg_sekindo extends WP_Widget
{	
	function __construct() {parent::__construct ('wtg_sekindo', 'Sekindo Video Widget', array ('description' => 'Displays Sekindo Videos when placed into a widget area',));}
	
	public function widget( $args, $instance )
	{
		extract ($args);
echo '	    		<div id="sekindo-video" style="max-height:300px; margin=top:10px; width:300px; left:0; right:0; margin:auto;">
<script type="text/javascript" language="javascript" 
src="https://live.sekindo.com/live/liveView.php?s=92825&cbuster=[CACHE_BUSTER]&pubUrl=[PAGE_URL_ENCODED]&x=300&y=300&vp_content=plembed5ddtwizpmno&vp_template=269">
</script>

        </div>';
}
	public function form ($instance) 
	{
	}
	public function update( $new_instance, $old_instance ) 
	{
		return $instance;
	}

} 
function register_sekindo() { register_widget( 'wtg_sekindo' ); }
add_action( 'widgets_init', 'register_sekindo' );	
