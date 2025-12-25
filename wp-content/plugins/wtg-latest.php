<?php
/*
/*
Plugin Name: WTG Latest
Description: Displays all the latest posts for a given post type and allows the user to set the number of rows to display
Author: Adam Faulkner
Version: 1.0
*/

class Latest_posts_widget extends WP_Widget {	
	
/* Register the widget */
	
function __construct()
{
	parent::__construct ('Latest_posts_widget', 'Latest posts', array ('description' => 'Displays all the latest posts for a given post type and allows the user to set the number of rows to display'));
}

/* Front end display -- $args: Widget arguments -- $instance: - saved values */	
	
public function widget( $args, $instance )
{
	$IMG_CONSTANT = 'large';
	extract ($args);
	$num_rows = $instance['num_rows'];
    $num_ads = $instance['num_ads'];// not yet implemented
    $thePostType = $instance['my_post_type'];
	
	$box1Caption    = $instance[ 'b1Caption' ];
    $box1Teaser     = $instance[ 'b1Teaser' ];
    $box1Link       = $instance[ 'b1Link' ];
    $box1Image      = $instance[ 'b1ImageID' ];
    $box1ImageURL = wp_get_attachment_image_src( $box1Image, $IMG_CONSTANT)[0];
    
    $box2Caption    = $instance[ 'b2Caption' ];
    $box2Teaser     = $instance[ 'b2Teaser' ];
    $box2Link       = $instance[ 'b2Link' ];
    $box2Image      = $instance[ 'b2ImageID' ];
    $box2ImageURL = wp_get_attachment_image_src( $box2Image, $IMG_CONSTANT)[0];

    $box3Caption    = $instance[ 'b3Caption' ];
    $box3Teaser     = $instance[ 'b3Teaser' ];
    $box3Link       = $instance[ 'b3Link' ];
    $box3Image      = $instance[ 'b3ImageID' ];
    $box3ImageURL = wp_get_attachment_image_src( $box3Image, $IMG_CONSTANT)[0];
    /*
    $html = '<div class="row box_item">
                <div class="col-sm-4 col-lg-4 col-md-4">
                    <a href="'.$box1Link.'"><img src="'.$box1ImageURL.'" alt="" class="img-responsive">
                    </a>
                    <div class="caption">
                        <h4><a href="'.$box1Link.'">'.$box1Caption.'</a></h4>
                        <p>'.$box1Teaser.'</p>
                    </div>
                </div>
                
                <div class="col-sm-4 col-lg-4 col-md-4">
                    <a href="'.$box2Link.'"><img src="'.$box2ImageURL.'" alt="" class="img-responsive">
                    </a>
                    <div class="caption">
                        <h4><a href="'.$box2Link.'">'.$box2Caption.'</a></h4>
                        <p>'.$box2Teaser.'</p>
                    </div>
                </div>';
    if ($box3Caption!='' || $box3ImageURL != '') {
    $html .= '<div class="col-sm-4 col-lg-4 col-md-4">
                <a href="'.$box3Link.'"><img src="'.$box3ImageURL.'" alt="" class="img-responsive">
                </a>
                <div class="caption">
                    <h4><a href="'.$box3Link.'">'.$box3Caption.'</a></h4>
                    <p>'.$box3Teaser.'</p>
                 </div>
            </div>';            
    } else {
        $html .= '<div class="col-sm-4 col-lg-4 col-md-4">
                    <img alt="advertisement" src="http://dummyimage.com/300x250/909090/fff" class="img-responsive element-center ">
                </div>';
               
    }
    $html .= '</div>';
        
    echo $html;
    */
    $postLimit = 0;
    $pargs = array();
    
    switch ($num_rows){
        case 1 :
            $postLimit = 3;
            break;
        case 2 :
            $postLimit = 6;
            break;
        case 3 :
            $postLimit = 9;
            break;
    }
    
    switch($thePostType){
		
		
        case 'features':
            $pargs = array(
                'post_type'             => 'features',
                'posts_per_page' 		=> 9,
				'orderby'     => 'modified',
				'order'       => 'DESC',
            );
            break;
		
        case 'continent':
			$continent = get_query_var('wtg_continent');
            $pargs = array(
                'post_type'             => 'guides',
                'posts_per_page' 		=> 9,
				'orderby'     => 'modified',
				'order'       => 'DESC',
				'tax_query'             => array(
					'relation' => 'AND',
                    array(
                                  'taxonomy' => 'wtg_continent',
                                  'field'    => 'slug',
                                  'terms'    => $continent,
                    ),
                    array(
                                  'taxonomy' => 'wtg_guide_type',
                                  'field'    => 'slug',
                                  'terms'    => 'region',
                    ),

                ),
            );
            break;
		
        case 'cities':
            $pargs = array(
                'post_type'             => 'guides',
                'posts_per_page' 		=> 9,
				'orderby'     => 'modified',
				'order'       => 'DESC',
                'tax_query'             => array(
                    array(
                                  'taxonomy' => 'wtg_guide_type',
                                  'field'    => 'slug',
                                  'terms'    => 'city',

                    ),
                ),
            );
            break;
        
        case 'regions':
		case 'pubhols':
		case 'passvisa':
            $pargs = array(
                'post_type'             => 'guides',
                'posts_per_page' 		=> 9,
				'orderby'     => 'modified',
				'order'       => 'DESC',
                'tax_query'             => array(
                   array(
                                  'taxonomy' => 'wtg_guide_type',
                                  'field'    => 'slug',
                                  'terms'    => 'region',

                   ),
                ),
            );
            break;
		case 'airports':
            $pargs = array(
                'post_type'             => 'guides',
                'posts_per_page' 		=> 9,
				'orderby'     => 'modified',
				'order'       => 'DESC',
                'tax_query'             => array(
                   array(
                                  'taxonomy' => 'wtg_guide_type',
                                  'field'    => 'slug',
                                  'terms'    => 'airport',
   
                   ),
                ),
            );
            break;
		case 'beaches':
            $pargs = array(
                'post_type'             => 'guides',
                'posts_per_page' 		=> 9,
				'orderby'     => 'modified',
				'order'       => 'DESC',
                'tax_query'             => array(
                   array(
                                  'taxonomy' => 'wtg_guide_type',
                                  'field'    => 'slug',
                                  'terms'    => 'beach-resort',
  
                   ),
                ),
            );
            break;
		case 'ski':
            $pargs = array(
                'post_type'             => 'guides',
                'posts_per_page' 		=> 9,
				'orderby'     => 'modified',
				'order'       => 'DESC',
                'tax_query'             => array(
                   array(
                                  'taxonomy' => 'wtg_guide_type',
                                  'field'    => 'slug',
                                  'terms'    => 'ski-resort',
         
                   ),
                ),
            );
            break;
        case 'cruises':
            $pargs = array(
                'post_type'             => 'guides',
                'posts_per_page' 		=> 9,
				'orderby'     => 'modified',
				'order'       => 'DESC',
                'tax_query'             => array(
                   array(
                                  'taxonomy' => 'wtg_guide_type',
                                  'field'    => 'slug',
                                  'terms'    => 'cruise',
								  
                                  
                   ),
                ),
            );
            break;
    }
    
    $postsQuery = new WP_Query($pargs);
	$pIDs = array();
	
	$index = 0;
	if($postsQuery->have_posts()):
		while ($postsQuery->have_posts()):$postsQuery->the_post();
			$pID = get_the_ID();
			if ($index < $postLimit){
				array_push($pIDs, $pID);
				$index++;
			}
			
		endwhile;
	endif;
    
	//var_dump($pIDs);
	$html = '';
	$index = 1;
	$html .= '<div class="row box_item">';
	
	foreach($pIDs as $postID){
		$guideType = '';
		$guideTerms = get_the_terms($postID,'wtg_guide_type');
		$guideType = $guideTerms[0]->slug;
		$postLink = get_permalink($postID);
//		echo 'the guide type is '.$guideType;		
		if($thePostType == 'passvisa'){
			$postLink = get_permalink($postID).'passport-visa';
		} else
			if($thePostType == 'pubhols'){
				$postLink = get_permalink($postID).'public-holidays';
			}
		if($guideType){
			switch($guideType){
				
				case 'regions':
				case 'region':
					$postTeasertext = get_post_meta($postID, 'precis', true);
					$firstID = get_gallery_attachments($postID,'home_carousel')[0];
					$postImageURL = wp_get_attachment_image_src($firstID, $IMG_CONSTANT)[0];
					$imageMeta = wp_prepare_attachment_for_js( $firstID );
					$imageAlt = $imageMeta['alt'];
					if ($imageAlt == '') $imageAlt = $imageMeta['Caption'];
					if ($imageAlt == '') $imageAlt = $imageMeta['title'];
					$altText = get_the_title($postID).' - '.$imageAlt;	

					
					break;
				case 'cities':
				case 'city':
					$postTeasertext = get_post_meta($postID, 'city_overview', true);
					$firstID = get_gallery_attachments($postID,'home_carousel')[0];
					$postImageURL = wp_get_attachment_image_src($firstID, $IMG_CONSTANT)[0];
					$imageMeta = wp_prepare_attachment_for_js( $firstID );
					$imageAlt = $imageMeta['alt'];
					if ($imageAlt == '') $imageAlt = $imageMeta['Caption'];
					if ($imageAlt == '') $imageAlt = $imageMeta['title'];
					$altText = get_the_title($postID).' - '.$imageAlt;	

					break;
				case 'airports':
				case 'airport':
					$postImageURL = get_template_directory_uri().'/images/airports.jpg';
			}
		} else {
			$postImageURL = wp_get_attachment_image_src(get_post_meta($postID, 'main_image', true), $IMG_CONSTANT)[0];
			$postTeasertext = get_post_meta($postID, 'teaser_text', true);
		}
		
        $postTitle = get_the_title($postID);
        if (!$postTeasertext) $postTeasertext = get_the_excerpt($postID);         
		$postTeaser = (strlen($postTeasertext) > 160) ? substr($postTeasertext, 0, 160) . '...' : $postTeasertext;
        
        $html .= '<div class="col-sm-4 col-lg-4 col-md-4">
                    <a href="'.$postLink.'"><img src="'.$postImageURL.'" alt="'.$altText.'" class="img-responsive">
                    </a>
                    <div class="caption">
                        <h4><a href="'.$postLink.'">'.$postTitle.'</a></h4>
                
                        <p>'.$postTeaser.'</p>
                    </div>
                </div>';
				
				
		if($index > 2){
			if($index %3 ==0){
				$html .= "</div><div class='row box_item'>";
			}
		}
		$index++;
    }
	$html .= '</div>';
    wp_reset_query();
	echo $html;
	//echo $termCount;
}
 
// Widget Backend 
public function form( $instance ) 
{
    $num_rows = $instance['num_rows'];
    $num_ads = $instance['num_ads'];
    $thePostType = $instance['my_post_type'];
    
    $box1Caption    = $instance[ 'b1Caption' ];
    $box1Teaser     = $instance[ 'b1Teaser' ];
    $box1Link       = $instance[ 'b1Link' ];
    $box1Image      = $instance[ 'b1ImageID' ];
    
    $box2Caption    = $instance[ 'b2Caption' ];
    $box2Teaser     = $instance[ 'b2Teaser' ];
    $box2Link       = $instance[ 'b2Link' ];
    $box2Image      = $instance[ 'b2ImageID' ];

    $box1ImageArgs  = array('field'=>'b1ImageID');
    $box2ImageArgs  = array('field'=>'b2ImageID');
    ?>
            <p>
				<label for="<?php echo $this->get_field_id( 'num_rows' ); ?>"><?php _e( 'Max rows:' ); ?></label>
				<select id="<?php echo $this->get_field_id( 'num_rows' ); ?>" name="<?php echo $this->get_field_name( 'num_rows' ); ?>">
					<option value="0"><?php _e( '&mdash; Select Rows &mdash;' ); ?></option>
					<option value="1" <?php selected( $num_rows, 1 ); ?>>1 Rows</option>
                    <option value="2" <?php selected( $num_rows, 2 ); ?>>2 Rows</option>
                    <option value="3" <?php selected( $num_rows, 3 ); ?>>3 Rows</option>
				</select>
			</p>
            
            <p>
				<label for="<?php echo $this->get_field_id( 'my_post_type' ); ?>"><?php _e( 'Post type:' ); ?></label>
				<select id="<?php echo $this->get_field_id( 'my_post_type' ); ?>" name="<?php echo $this->get_field_name( 'my_post_type' ); ?>">
					<option value="0"><?php _e( '&mdash; Select Post type &mdash;' ); ?></option>
                    <option value="features" <?php selected( $thePostType, 'features' ); ?>>Features</option>
					<option value="continent" <?php selected( $thePostType, 'continent' ); ?>>Continent</option>
					<option value="cities" <?php selected( $thePostType, 'cities' ); ?>>Cities</option>
                    <option value="regions" <?php selected( $thePostType, 'regions' ); ?>>Regions</option>
					<option value="airports" <?php selected( $thePostType, 'airports' ); ?>>Airports</option>
					<option value="beaches" <?php selected( $thePostType, 'beaches' ); ?>>Beaches</option>
					<option value="cruises" <?php selected( $thePostType, 'cruises' ); ?>>Cruises</option>
					<option value="ski" <?php selected( $thePostType, 'ski' ); ?>>Ski</option>
					<option value="passvisa" <?php selected( $thePostType, 'passvisa' ); ?>>Passport&Visa</option>
					<option value="pubhols" <?php selected( $thePostType, 'pubhols' ); ?>>Public Holidays</option>
				</select>
			</p>
            
    <?php
    /*
    if (isset($num_rows)){
         switch($num_rows){
            case 1 :
                if (isset($num_ads)){
                    switch($num_ads){
                        case 2: 
                            echo '<p>
                                    <h2>Box 1</h3>
                                    <h4>Box 1 Caption</h4>
                                    <input type="text" id="'.$this->get_field_id('b1Caption').'" name="'.$this->get_field_name( 'b1Caption' ).'" type="text" value="'.esc_attr( $box1Caption ).'" /><br/>
                                    
                                    <h4>Box 1 Teaser</h4>
                                    <input type="text" id="'.$this->get_field_id('b1Teaser').'" name="'.$this->get_field_name( 'b1Teaser' ).'" type="text" value="'.esc_attr( $box1Teaser ).'" /><br/>
                                    
                                    <h4>Box 1 Link</h4>
                                    <input type="text" id="'.$this->get_field_id('b1Link').'" name="'.$this->get_field_name( 'b1Link' ).'" type="text" value="'.esc_attr( $box1Link ).'" /><br/>
                                    
                                    <h4>Box 1 Image</h4>';
                                    pco_image_field( $this, $instance, $box1ImageArgs );
                            echo '</p>';
                            break;
                        default:
                            break;
                    }
                }
                break;
            case 2 :
                if (isset($num_ads)){
                    switch ($num_ads) {
                        case 2: 
                            echo '<p>
                                    <h2>Box 1</h3>
                                    <h4>Box 1 Caption</h4>
                                    <input type="text" id="'.$this->get_field_id('b1Caption').'" name="'.$this->get_field_name( 'b1Caption' ).'" type="text" value="'.esc_attr( $box1Caption ).'" /><br/>
                                    
                                    <h4>Box 1 Teaser</h4>
                                    <input type="text" id="'.$this->get_field_id('b1Teaser').'" name="'.$this->get_field_name( 'b1Teaser' ).'" type="text" value="'.esc_attr( $box1Teaser ).'" /><br/>
                                    
                                    <h4>Box 1 Link</h4>
                                    <input type="text" id="'.$this->get_field_id('b1Link').'" name="'.$this->get_field_name( 'b1Link' ).'" type="text" value="'.esc_attr( $box1Link ).'" /><br/>
                                    
                                    <h4>Box 1 Image</h4>';
                                    pco_image_field( $this, $instance, $box1ImageArgs );
                            echo '</p>';
                            break;
                        case 3:
                             echo '<p>
                                    <h2>Box 1</h3>
                                    <h4>Box 1 Caption</h4>
                                    <input type="text" id="'.$this->get_field_id('b1Caption').'" name="'.$this->get_field_name( 'b1Caption' ).'" type="text" value="'.esc_attr( $box1Caption ).'" /><br/>
                                    
                                    <h4>Box 1 Teaser</h4>
                                    <input type="text" id="'.$this->get_field_id('b1Teaser').'" name="'.$this->get_field_name( 'b1Teaser' ).'" type="text" value="'.esc_attr( $box1Teaser ).'" /><br/>
                                    
                                    <h4>Box 1 Link</h4>
                                    <input type="text" id="'.$this->get_field_id('b1Link').'" name="'.$this->get_field_name( 'b1Link' ).'" type="text" value="'.esc_attr( $box1Link ).'" /><br/>
                                    
                                    <h4>Box 1 Image</h4>';
                                    pco_image_field( $this, $instance, $box1ImageArgs );
                            echo '</p>';
                            echo '<p>
                                    <h2>Box 2</h3>
                                    <h4>Box 2 Caption</h4>
                                    <input type="text" id="'.$this->get_field_id('b2Caption').'" name="'.$this->get_field_name( 'b2Caption' ).'" type="text" value="'.esc_attr( $box2Caption ).'" /><br/>
                                    
                                    <h4>Box 2 Teaser</h4>
                                    <input type="text" id="'.$this->get_field_id('b2Teaser').'" name="'.$this->get_field_name( 'b2Teaser' ).'" type="text" value="'.esc_attr( $box2Teaser ).'" /><br/>
                                    
                                    <h4>Box 2 Link</h4>
                                    <input type="text" id="'.$this->get_field_id('b2Link').'" name="'.$this->get_field_name( 'b2Link' ).'" type="text" value="'.esc_attr( $box2Link ).'" /><br/>
                                    
                                    <h4>Box 2 Image</h4>';
                                    pco_image_field( $this, $instance, $box2ImageArgs );
                            echo '</p>';
                        default:
                            break;
                    }
                }
         }
         
         
         
         
    } else {
        
    }
    */
    
    
    

}
	
// Updating widget replacing old instances with new
    public function update( $new_instance, $old_instance ) 
    {
    $instance = $old_instance;
	
	$instance['num_rows']  = strip_tags( $new_instance['num_rows'] );
	$instance['num_ads']  = strip_tags( $new_instance['num_ads'] );
    $instance['my_post_type']  = strip_tags( $new_instance['my_post_type'] );
    
    $instance[ 'b1Caption' ]    = strip_tags( $new_instance['b1Caption'] );
    $instance[ 'b1Teaser' ]     = strip_tags( $new_instance['b1Teaser'] );
    $instance[ 'b1Link' ]       = strip_tags( $new_instance['b1Link'] );
    $instance[ 'b1ImageID' ]    = strip_tags( $new_instance['b1ImageID'] );
        
    $instance[ 'b2Caption' ]    = strip_tags( $new_instance['b2Caption'] );
    $instance[ 'b2Teaser' ]     = strip_tags( $new_instance['b2Teaser'] );
    $instance[ 'b2Link' ]       = strip_tags( $new_instance['b2Link'] );
    $instance[ 'b2ImageID' ]    = strip_tags( $new_instance['b2ImageID'] );
    
    $instance[ 'b3Caption' ]    = strip_tags( $new_instance['b3Caption'] );
    $instance[ 'b3Teaser' ]     = strip_tags( $new_instance['b3Teaser'] );
    $instance[ 'b3Link' ]       = strip_tags( $new_instance['b3Link'] );
    $instance[ 'b3ImageID' ]      = strip_tags( $new_instance['b3ImageID'] );
    
    return $instance;
    }

} // Class widget ends here

// Register and load the widget
function load_latest_posts_widget() {register_widget( 'Latest_posts_widget' );}
add_action( 'widgets_init', 'load_latest_posts_widget' );	