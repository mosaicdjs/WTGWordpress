<?php
/*
/*
Plugin Name: WTG Feature Types
Description: Displays all the feature types associated with the feature post type and links to their appropriate archive pages
Author: Adam Faulkner
Version: 1.0
*/

class Feature_Types_widget extends WP_Widget {	
	
/* Register the widget */
	
function __construct()
{
	parent::__construct ('Feature_Types_widget', 'Feature Types', array ('description' => 'Displays a set of articles selected by the editorial team. 1 Row'));
}

/* Front end display -- $args: Widget arguments -- $instance: - saved values */	
	
public function widget( $args, $instance )
{
	extract ($args);
	$num_rows = $instance['num_rows'];
    $num_ads = $instance['num_ads'];
	
	$box1Caption    = $instance[ 'b1Caption' ];
    $box1Teaser     = $instance[ 'b1Teaser' ];
    $box1Link       = $instance[ 'b1Link' ];
    $box1Image      = $instance[ 'b1ImageID' ];
    $box1ImageURL = wp_get_attachment_url( $box1Image);
    
    $box2Caption    = $instance[ 'b2Caption' ];
    $box2Teaser     = $instance[ 'b2Teaser' ];
    $box2Link       = $instance[ 'b2Link' ];
    $box2Image      = $instance[ 'b2ImageID' ];
    $box2ImageURL = wp_get_attachment_url( $box2Image);

    $box3Caption    = $instance[ 'b3Caption' ];
    $box3Teaser     = $instance[ 'b3Teaser' ];
    $box3Link       = $instance[ 'b3Link' ];
    $box3Image      = $instance[ 'b3ImageID' ];
    $box3ImageURL = wp_get_attachment_url( $box3Image);
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
	
	echo '<div class="row">
            <h2><i class="icon icon_1"></i>Other Sections</h2>
           <a href="'.str_replace( '%wtg_feature_type%/', '' , get_post_type_archive_link('features') ).'" class="seemore">SEE MORE</a>
        </div>';
		
	echo '<div class="row box_item">';
	
	$terms = get_terms( array(
		'taxonomy' => 'wtg_feature_type',
		'hide_empty' => false,
	) );
	
	$termCount = count($terms);
	
	//var_dump($terms);
	
	$termIDS = array();
	$typeMax = 0;
	$typecount = 0;
	
	switch ($num_rows) {
		case 1 :
			$typeMax = 2;
		case 2 :
			$typeMax = 5;
		default:
			$typeMax = 2;
	}
	

	foreach($terms as $term){
		
		$turl = get_post_type_archive_link('features');
		$url = str_replace( '%wtg_feature_type%/', '' , $turl );
		$termImageURL = wp_get_attachment_url(get_option('wtg_feature_type_'.$term->term_id.'_feature_type_image'));
		$termCaption = $term->name;
		$termTeaser = $term->description;
		//echo $typecount.'-'.$typeMax;
		if($typecount < $typeMax){
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
		$typecount++;
		}
		
		
		
		//echo '</div>';
	}
	
	if ($num_ads == 2){
		if ($box1Caption!='' || $box1ImageURL != '') {
    $html .= '<div class="col-sm-4 col-lg-4 col-md-4">
                <a href="'.$box1Link.'"><img src="'.$box1ImageURL.'" alt="" class="img-responsive">
                </a>
                <div class="caption">
                    <h4><a href="'.$box1Link.'">'.$box1Caption.'</a></h4>
                    <p>'.$box1Teaser.'</p>
                 </div>
            </div>';            
    } else {
        $html .= '<div class="col-sm-4 col-lg-4 col-md-4">
                    <img alt="advertisement" src="http://dummyimage.com/300x250/909090/fff" class="img-responsive element-center ">
                </div>';
               
    }
	}
	
	$html .= '</div>';
	echo $html;
	//echo $termCount;
}
 
// Widget Backend 
public function form( $instance ) 
{
    $num_rows = $instance['num_rows'];
    $num_ads = $instance['num_ads'];
    
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
				<label for="<?php echo $this->get_field_id( 'num_ads' ); ?>"><?php _e( 'Max adverts:' ); ?></label>
				<select id="<?php echo $this->get_field_id( 'num_ads' ); ?>" name="<?php echo $this->get_field_name( 'num_ads' ); ?>">
					<option value="0"><?php _e( '&mdash; Select Number of adverts &mdash;' ); ?></option>
					<option value="1" <?php selected( $num_ads, 1 ); ?>>0 adverts</option>
                    <option value="2" <?php selected( $num_ads, 2 ); ?>>1 adverts</option>
                    <option value="3" <?php selected( $num_ads, 3 ); ?>>2 adverts</option>
                    <option value="4" <?php selected( $num_ads, 4 ); ?>>3 adverts</option>
				</select>
			</p>
            
    <?php
    
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
    
    
    
    

}
	
// Updating widget replacing old instances with new
    public function update( $new_instance, $old_instance ) 
    {
    $instance = $old_instance;
	
	$instance['num_rows']  = strip_tags( $new_instance['num_rows'] );
	$instance['num_ads']  = strip_tags( $new_instance['num_ads'] );
    
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
function load_feature_types_widget() {register_widget( 'Feature_Types_widget' );}
add_action( 'widgets_init', 'load_feature_types_widget' );	