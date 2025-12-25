<?php 
/*
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
$featureObject = get_queried_object();
$featureType = $featureObject->slug;
//var_dump(get_queried_object());
//echo $featureType;
echo '<div class="container box_list articles  last">';
?>
   <div class="row">
		<h2><i class="icon icon_6"></i><?php echo $featureObject->name?></h2>
	</div>
   
   <?php
   
   $fargs = array(
	  'post_type'             => 'features',
	  'posts_per_page' 		=> -1,
	  'orderby'				=> 'date',
	  'order' 				=> 'DESC',
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
	   $postTeaser = get_post_meta($postID, 'teaser_text', true);
	   
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


get_footer();

?>