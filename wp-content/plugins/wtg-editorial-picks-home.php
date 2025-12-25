<?php
/*
/*
Plugin Name: WTG Editorial Picks Home Page
Description: Displays articles 6-15 from a chronologica
Author: David Sherratt
Version: 1.0
*/

class Editorial_picks_widget_home extends WP_Widget {	
	
/* Register the widget */
	
function __construct()
{
	parent::__construct ('Editorial_picks_widget_home', 'Editorial Picks Home', array ('description' => 'Displays lastest articles on the home page'));
}

/* Front end display -- $args: Widget arguments -- $instance: - saved values */	
	
public function widget( $args, $instance )
{
	/* echo '<div class="row">
	<h2><i class="icon icon_1"></i>Travel Features</h2>
   <a href="/features/feature/" class="seemore">SEE MORE</a>
   </div>'; */

    $args = array(
        'post_type'             => 'features',
		'posts_per_page' 		=> 20,
	);
	
	$articlesQuery = new WP_Query($args);
	$articleIDs = array();
	
	$index = 0;
	if($articlesQuery->have_posts()):
		while ($articlesQuery->have_posts()):$articlesQuery->the_post();
			$aID = get_the_ID();

			if (get_post_meta($aID,'featured',true) == 1) {
				$articleIDs[$index] = $aID;
				$index++;

			}
			
		endwhile;
	endif;
	
	wp_reset_query();
	

	$imageIDs = array();
	$articleIndex = 0;
	$row = 1;
	for ($row = 1; $row <= 2; $row++)
	{
		echo '<div class="row box_item">';
	
		$articleID = $articleIDs[$articleIndex]; 
		$iID = get_post_meta($articleID, 'thumbnail_image', true);
		if (!$iID) {$iID = get_post_meta($articleID, 'main_image', true);}
        $ImageDetails = wp_get_attachment_image_src( $iID, 'full');
        $imageMeta = wp_prepare_attachment_for_js( $iID );
                        //var_dump($imageMeta);
        $imageAlt1 = $imageMeta['alt'];
        if ($imageAlt1 == '') $imageAlt = $imageMeta['Caption'];
        if ($imageAlt1 == '') $imageAlt = $imageMeta['title'];
        echo 
		'
		<div class="col-sm-4 col-lg-4 col-md-4">
	        <a href="'.get_the_permalink($articleID).'"><img src="'.$ImageDetails[0].'" alt="'.$imageAlt1.'" class="img-responsive"></a>
        	<div class="caption">
            	<h4><a href="'.get_the_permalink($articleID).'">'.get_the_title($articleID).'</a></h4>
            	<p>'.get_post_meta($articleID,'teaser_text',true).'</p>
        	</div>
    	</div>'; // end column

		$articleIndex++;
		$articleID = $articleIDs[$articleIndex]; 
		$iID = get_post_meta($articleID, 'thumbnail_image', true);
		if (!$iID) {$iID = get_post_meta($articleID, 'main_image', true);}
        $ImageDetails = wp_get_attachment_image_src( $iID, 'full');
        $imageMeta = wp_prepare_attachment_for_js( $iID );
                        //var_dump($imageMeta);
        $imageAlt1 = $imageMeta['alt'];
        if ($imageAlt1 == '') $imageAlt = $imageMeta['Caption'];
        if ($imageAlt1 == '') $imageAlt = $imageMeta['title'];


		echo 
		'
		<div class="col-sm-4 col-lg-4 col-md-4">
	        <a href="'.get_the_permalink($articleID).'"><img src="'.$ImageDetails[0].'" alt="'.$imageAlt1.'" class="img-responsive"></a>
        	<div class="caption">
            	<h4><a href="'.get_the_permalink($articleID).'">'.get_the_title($articleID).'</a></h4>
            	<p>'.get_post_meta($articleID,'teaser_text',true).'</p>
        	</div>
    	</div>'; // end column

		$articleIndex++;
		$articleID = $articleIDs[$articleIndex]; 
		$iID = get_post_meta($articleID, 'thumbnail_image', true);
		if (!$iID) {$iID = get_post_meta($articleID, 'main_image', true);}
        $ImageDetails = wp_get_attachment_image_src( $iID, 'full');
        $imageMeta = wp_prepare_attachment_for_js( $iID );
                        //var_dump($imageMeta);
        $imageAlt1 = $imageMeta['alt'];
        if ($imageAlt1 == '') $imageAlt = $imageMeta['Caption'];
        if ($imageAlt1 == '') $imageAlt = $imageMeta['title'];

		echo 
		'
		<div class="col-sm-4 col-lg-4 col-md-4">
	        <a href="'.get_the_permalink($articleID).'"><img src="'.$ImageDetails[0].'" alt="'.$imageAlt1.'" class="img-responsive"></a>
        	<div class="caption">
            	<h4><a href="'.get_the_permalink($articleID).'">'.get_the_title($articleID).'</a></h4>
            	<p>'.get_post_meta($articleID,'teaser_text',true).'</p>
        	</div>
    	</div>'; // end column
		$articleIndex++;



		echo '</div>'; // end row

	}

} // Function widget end

} // Class socialwidget ends here

// Register and load the widget
function load_editorial_picks_widget_home() 
{	
	register_widget( 'Editorial_picks_widget_home' );
}
add_action( 'widgets_init', 'load_editorial_picks_widget_home' );	