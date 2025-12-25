<?php
/*
 * Template Name: Feature Types
 * 
*/

 if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

get_header();
while(have_posts()):the_post();
    $pageID = get_the_ID();
endwhile;

//do_action('cityguide-page');
echo '<div class="container box_list articles  last">';
?>


<?php

$featureType = get_query_var('wtg_feature_type');
//echo $featureType;

if (!$featureType) {
   ?>
   <div class="row">
		<h2><i class="icon icon_6"></i>Feature Sections</h2>
	</div>
   
   <?php
   
   
   $terms = get_terms( array(
		'taxonomy' => 'wtg_feature_type',
		'hide_empty' => false,
	) );
	
	$termCount = count($terms);
	
	
	
	$termIDS = array();
	$count = 0;
	echo '<div class="row box_item">';
	foreach($terms as $term){
		if ($count % 3 == 0){
				echo '</div>';
				echo '<div class="row box_item">';
			}
		$url = str_replace( '%wtg_feature_type%/', '' , get_post_type_archive_link('features') );
		$termImageURL = wp_get_attachment_url(get_option('wtg_feature_type_'.$term->term_id.'_feature_type_image'));
		$termCaption = $term->name;
		$termTeaser = $term->description;
		
		echo '<div class="col-sm-4 col-lg-4 col-md-4">';
		//echo $url;
		
		
		//$url = add_query_arg( 'wtg_feature_type',  $term->slug, $url );
       
		echo '<a href="'.$url.$term->slug.'/">
                    <img src="'.$termImageURL.'" alt="" class="img-responsive element-center">
                    </a>
                    <div class="caption">
                        <h4>';
		
		
		echo 
						'<a href="'.$url.$term->slug.'/">'.$term->name.'</a></h4>
                        <p>'.$termTeaser.'</p>
                    </div>
                </div>';
		$count++;
		
	}
} else {
   ?>
   <div class="row">
		<h2><i class="icon icon_6"></i><?php echo $featureType?> Features</h2>
	</div>
   
   <?php
   
   $fargs = array(
	  'post_type'             => 'features',
	  'posts_per_page' 		=> -1,
	  'tax_query'             => array(
		  array(
						'taxonomy' => 'wtg_feature_type',
						'field'    => 'slug',
						'terms'    => $featureType,
					   
		  ),
	  ),
  );
   $postsQuery = new WP_Query($fargs);
   $pIDs = array();
   

   if($postsQuery->have_posts()):
	   while ($postsQuery->have_posts()):$postsQuery->the_post();
		   $pID = get_the_ID();
		   array_push($pIDs, $pID);
	   endwhile;
   endif;
   
   //var_dump($pIDs);
   $html = '<div class="row box_item">';
   $count = 0;
   foreach($pIDs as $postID){
		if ($count % 3 == 0){
			   $html .= '</div>';
			   $html .= '<div class="row box_item">';
		   }  
	 
	   $postLink = get_permalink($postID);
		$postImageURL = wp_get_attachment_url(get_post_meta($postID, 'main_image', true));
	   
	   $postTitle = get_the_title($postID);
	   $postTeaser = 'test';
	   
	   $html .= '<div class="col-sm-4 col-lg-4 col-md-4">
				   <a href="'.$postLink.'"><img src="'.$postImageURL.'" alt="" class="img-responsive">
				   </a>
				   <div class="caption">
					   <h4><a href="'.$postLink.'">'.$postTitle.'</a></h4>
					   <p>'.$postTeaser.'</p>
				   </div>
			   </div>';
		$count++;
   }
   $html .= '</div>';
   wp_reset_query();
   echo $html;
   
   
}

get_footer();

?>