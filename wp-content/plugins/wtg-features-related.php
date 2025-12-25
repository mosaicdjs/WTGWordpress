<?php
/*
/*
Plugin Name: WTG Related Articles (guides)
Description: Displays all the related article to a guide and allows the user to set the number of rows to display
Author: Adam Faulkner
Version: 1.0
*/

class Related_articles_widget extends WP_Widget {	
	
/* Register the widget */
	
function __construct()
{
	parent::__construct ('Related_articles_widget', 'Related Articles', array ('description' => 'Displays all the related article to a guide and allows the user to set the number of rows to display'));
}

/* Front end display -- $args: Widget arguments -- $instance: - saved values */	
	
public function widget( $args, $instance )
{
	$IMG_CONSTANT = 'large';

	extract ($args);
	$num_rows = $instance['num_rows'];
    $num_ads = $instance['num_ads'];// not yet implemented
   
	/*
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
    
    $pargs = array(
                'post_type'             => 'features',
                'posts_per_page' 		=> -1,
				'orderby'				=> 'post_date',
				'order'					=> 'ASC',
				//'order'					=> 'DESC',
            );
	
    $cID = get_the_ID();//guide id
    
    $postsQuery = new WP_Query($pargs);
	$pIDs = array();

	$index = 0;
	if($postsQuery->have_posts()):
		while ($postsQuery->have_posts()):$postsQuery->the_post();
			$featureID = get_the_ID(); //feature ids
			//array_push($featureIDs, $featureID);
			if ($index < $postLimit){
				$relatedGuides = get_post_meta($featureID, 'related_destinations', true);
				if($relatedGuides) {
					//if(is_array($relatedDests)){
						foreach ($relatedGuides as $related){
							if($related == $cID){
								array_push($pIDs, $featureID);
								//echo $related.'<br/>';
								$index++;
							}
							//array_push($destIDS, $related);

							
						}
						
					//} else {	
						//array_push($destIDS, $relatedDests);
				//	}
					
					
				/*
					if(in_array($cID, $destIDS)){
						array_push($pIDs, $pID);
						$index++;
					}
				*/
				}
			}
		endwhile;
	endif;
	
	/*
	foreach($destIDS as $relatedFeature){
		if($feature == $cID){
			array_push($pIDs, $feature);
		}
	}*/
    
	$html = '';
	/*
	if ( have_rows('additional_features', $cID)):
		$html .= "<div class='row'>
					<h2><i class='icon icon_1'></i>Related Articles</h2>
					<a href='' class='seemore'></a>
				</div>";
		$html .= '<div class="row box_item">';
        while (have_rows('additional_features', $cID)) :the_row();
			$add_title		= get_sub_field('title');
			$add_caption	= get_sub_field('caption');
			$add_url		= get_sub_field('url');
			$add_imageID	= get_sub_field('image');
			$add_imageURL = wp_get_attachment_image_src($add_imageID, $IMG_CONSTANT)[0];
			
			$html .= '<div class="col-sm-4 col-lg-4 col-md-4">
						<a href="'.$add_url.'"><img src="'.$add_imageURL.'" alt="" class="img-responsive">
						</a>
						<div class="caption">
							<h4><a href="'.$add_url.'">'.$add_title.'</a></h4>
							<p>'.$add_caption.'</p>
						</div>
					</div>';
		
		endwhile;
		//$html .= '</div>';
	endif;
	*/
	if($pIDs[0] != ''){
		
		if($html == ''){$html .= "<div class='row'>
					<h2><i class='icon icon_1'></i>Related Articles</h2>
					
				</div>";
		$html .= '<div class="row box_item">';
		}
		
		
		
		foreach($pIDs as $postID){
			$postLink = get_permalink($postID);
			
			$postImageURL = wp_get_attachment_url(get_post_meta($postID, 'main_image', true));
			
			$postTitle = get_the_title($postID);
			$postTeaser = get_post_meta($postID,'teaser_text',true);
			
			$html .= '<div class="col-sm-4 col-lg-4 col-md-4">
						<a href="'.$postLink.'"><img src="'.$postImageURL.'" alt="" class="img-responsive">
						</a>
						<div class="caption">
							<h4><a href="'.$postLink.'">'.$postTitle.'</a></h4>
							<p>'.$postTeaser.'</p>
						</div>
					</div>';
		}
		$html .= '</div>';
	}
    wp_reset_query();
	echo $html;
	//echo $termCount;
}
 
// Widget Backend 
public function form( $instance ) 
{
    $num_rows = $instance['num_rows'];
    $num_ads = $instance['num_ads'];
    //$thePostType = $instance['my_post_type'];
    /*
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
	*/
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
    /*
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
    */
    return $instance;
    }

} // Class widget ends here

// Register and load the widget
function load_Related_articles_widget() {register_widget( 'Related_articles_widget' );}
add_action( 'widgets_init', 'load_Related_articles_widget' );	