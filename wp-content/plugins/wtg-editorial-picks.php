<?php
/*
/*
Plugin Name: WTG Editorial Picks
Description: Displays a set of articles selected by the editorial team
Author: Adam Faulkner
Version: 1.0
*/

class Editorial_picks_widget extends WP_Widget {	
	
/* Register the widget */
	
function __construct()
{
	parent::__construct ('Editorial_picks_widget', 'Editorial Picks Row', array ('description' => 'Displays a set of articles selected by the editorial team. 1 Row'));
}

/* Front end display -- $args: Widget arguments -- $instance: - saved values */	
	
public function widget( $args, $instance )
{
	
	$IMG_CONSTANT = 'medium';
	extract ($args);
	$box1Caption    = $instance[ 'b1Caption' ];
    $box1Teaser     = $instance[ 'b1Teaser' ];
    $box1Link       = $instance[ 'b1Link' ];
    $box1Image      = $instance[ 'b1ImageID' ];
    $box1ImageURL = wp_get_attachment_image_src( $box1Image, $IMG_CONSTANT)[0];
	$imageMeta = wp_prepare_attachment_for_js( $box1Image );
	$imageAlt1 = $imageMeta['alt'];
	if ($imageAlt1 == '') $imageAlt = $imageMeta['Caption'];
	if ($imageAlt1 == '') $imageAlt = $imageMeta['title'];
	
	
	$match1 = get_page_by_title($box1Caption, OBJECT, 'features');
	$id1= $match1->ID;
	if(empty($box1Link)){
		$box1Link = get_permalink($id1);
	}
	if(empty($box1Teaser)){
		$box1Teaser = get_post_meta($id1,'teaser_text',true);
	}
    
    $box2Caption    = $instance[ 'b2Caption' ];
    $box2Teaser     = $instance[ 'b2Teaser' ];
    $box2Link       = $instance[ 'b2Link' ];
    $box2Image      = $instance[ 'b2ImageID' ];
    $box2ImageURL = wp_get_attachment_image_src( $box2Image, $IMG_CONSTANT)[0];
	$imageMeta = wp_prepare_attachment_for_js( $box2Image );
	$imageAlt2 = $imageMeta['alt'];
	if ($imageAlt2 == '') $imageAlt = $imageMeta['Caption'];
	if ($imageAlt2 == '') $imageAlt = $imageMeta['title'];
	

	$match2 = get_page_by_title($box2Caption, OBJECT, 'features');
	$id2= $match2->ID;
	if(empty($box2Link)){
		$box2Link = get_permalink($id2);
    }
    
	if(empty($box2Teaser)){
		$box2Teaser = get_post_meta($id2,'teaser_text',true);
	}

    $box3Caption    = $instance[ 'b3Caption' ];
    $box3Teaser     = $instance[ 'b3Teaser' ];
    $box3Link       = $instance[ 'b3Link' ];
    $box3Image      = $instance[ 'b3ImageID' ];
    $box3ImageURL = wp_get_attachment_image_src( $box3Image, $IMG_CONSTANT)[0];
	$mpuValue = $instance['MPUvalue'];
	$imageMeta = wp_prepare_attachment_for_js( $box3Image );
	$imageAlt3 = $imageMeta['alt'];
	if ($imageAlt3 == '') $imageAlt = $imageMeta['Caption'];
	if ($imageAlt3 == '') $imageAlt = $imageMeta['title'];
	

	$match3 = get_page_by_title($box3Caption, OBJECT, 'features');
	$id3= $match3->ID;
	if(empty($box3Link)){
		$box3Link = get_permalink($id3);
	}
	if(empty($box3Teaser)){
		$box3Teaser = get_post_meta($id3,'teaser_text',true);
	}
    
    $html = '<div class="row box_item">
                <div class="col-sm-4 col-lg-4 col-md-4">
                    <a href="'.$box1Link.'"><img src="'.$box1ImageURL.'" alt="'.$imageAlt1.'" class="img-responsive">
                    </a>
                    <div class="caption">
                        <h4><a href="'.$box1Link.'">'.$box1Caption.'</a></h4>
                        <p>'.$box1Teaser.'</p>
                    </div>
                </div>
                
                <div class="col-sm-4 col-lg-4 col-md-4">
                    <a href="'.$box2Link.'"><img src="'.$box2ImageURL.'" alt="'.$imageAlt2.'" class="img-responsive">
                    </a>
                    <div class="caption">
                        <h4><a href="'.$box2Link.'">'.$box2Caption.'</a></h4>
                        <p>'.$box2Teaser.'</p>
                    </div>
                </div>';
    if ($box3Caption!='' || $box3ImageURL != '') {
    $html .= '<div class="col-sm-4 col-lg-4 col-md-4">
                <a href="'.$box3Link.'"><img src="'.$box3ImageURL.'" alt="'.$imageAlt3.'" class="img-responsive">
                </a>
                <div class="caption">
                    <h4><a href="'.$box3Link.'">'.$box3Caption.'</a></h4>
                    <p>'.$box3Teaser.'</p>
                 </div>
            </div>';            
    } else {
		switch ($mpuValue){
			case 1:
				$html .= "<div id='div-gpt-ad-1492512001379-3' class='col-sm-4 col-lg-4 col-md-4' style='height:250px; width:300px;'>
<script>
googletag.cmd.push(function() { googletag.display('div-gpt-ad-1492512001379-3'); });
</script>
</div>";
				break;
			case 2:
				$html .= "<div id='div-gpt-ad-1492512001379-4' class='col-sm-4 col-lg-4 col-md-4' style='height:250px; width:300px;'>
<script>
googletag.cmd.push(function() { googletag.display('div-gpt-ad-1492512001379-4'); });
</script>
</div>";
				break;
			case 3:
				$html .= "<div id='div-gpt-ad-1492512001379-5' class='col-sm-4 col-lg-4 col-md-4' style='height:250px; width:300px;'>
<script>
googletag.cmd.push(function() { googletag.display('div-gpt-ad-1492512001379-5'); });
</script>
</div>";
				break;
			case 4:
				$html .= "<div id='div-gpt-ad-1492512001379-6' class='col-sm-4 col-lg-4 col-md-4' style='height:250px; width:300px;'>
<script>
googletag.cmd.push(function() { googletag.display('div-gpt-ad-1492512001379-6'); });
</script>
</div>";
				break;
			case 5:
				$html .= "<div id='div-gpt-ad-1492512001379-0' class='col-sm-4 col-lg-4 col-md-4' style='height:250px; width:300px;'>
<script>
googletag.cmd.push(function() { googletag.display('div-gpt-ad-1492512001379-0'); });
</script>
</div>";
				break;
			case 6:
				$html .= "<div id='div-gpt-ad-1492512001379-1' class='col-sm-4 col-lg-4 col-md-4' style='height:250px; width:300px;'>
<script>
googletag.cmd.push(function() { googletag.display('div-gpt-ad-1492512001379-1'); });
</script>
</div>";
				break;
			case 7:
				$html .= "<div id='div-gpt-ad-1492512001379-2' class='col-sm-4 col-lg-4 col-md-4' style='height:250px; width:300px;'>
<script>
googletag.cmd.push(function() { googletag.display('div-gpt-ad-1492512001379-2'); });
</script>
</div>";
				break;
			default:
				$html .= '<div class="col-sm-4 col-lg-4 col-md-4">
                    <img alt="advertisement" src="http://dummyimage.com/300x250/909090/fff" class="img-responsive element-center ">
                </div>';
				break;
		}
		
		
        
               
    }
    $html .= '</div>';
        
    echo $html;
}
 
// Widget Backend 
public function form( $instance ) 
{
    $box1Caption    = $instance[ 'b1Caption' ];
    $box1Teaser     = $instance[ 'b1Teaser' ];
    $box1Link       = $instance[ 'b1Link' ];
    $box1Image      = $instance[ 'b1ImageID' ];
    
    $box2Caption    = $instance[ 'b2Caption' ];
    $box2Teaser     = $instance[ 'b2Teaser' ];
    $box2Link       = $instance[ 'b2Link' ];
    $box2Image      = $instance[ 'b2ImageID' ];

    $box3Caption    = $instance[ 'b3Caption' ];
    $box3Teaser     = $instance[ 'b3Teaser' ];
    $box3Link       = $instance[ 'b3Link' ];
    $box3Image      = $instance[ 'b3ImageID' ];
	$mpuValue		= $instance['MPUvalue'];
    
    $box1ImageArgs  = array('field'=>'b1ImageID');
    $box2ImageArgs  = array('field'=>'b2ImageID');
    $box3ImageArgs  = array('field'=>'b3ImageID');
    
    
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
    
    echo '<p>
            <h2>Box 3</h3>
            if none of the fields are filled in this box defaults to display an MPU box.
            <h4>Box 3 Caption</h4>
            <input type="text" id="'.$this->get_field_id('b3Caption').'" name="'.$this->get_field_name( 'b3Caption' ).'" value="'.esc_attr( $box3Caption ).'" /><br/>
            
            <h4>Box 3 Teaser</h4>
            <input type="text" id="'.$this->get_field_id('b3Teaser').'" name="'.$this->get_field_name( 'b3Teaser' ).'" value="'.esc_attr( $box3Teaser ).'" /><br/>
            
            <h4>Box 3 Link</h4>
            <input type="text" id="'.$this->get_field_id('b3Link').'" name="'.$this->get_field_name( 'b3Link' ).'" value="'.esc_attr( $box3Link ).'" /><br/>
            
            <h4>Box 3 Image</h4>';
            pco_image_field( $this, $instance, $box3ImageArgs );
	echo   '<h4>MPU value</h4>';
	echo 'enter a number 1-7
	<input type="number" min="1" max="7" id="'.$this->get_field_id('MPUvalue').'" name="'.$this->get_field_name( 'MPUvalue' ).'" value="'.esc_attr( $mpuValue ).'" /><br/>
            ';
	
    echo '</p>';

}
	
// Updating widget replacing old instances with new
public function update( $new_instance, $old_instance ) 
{
$instance = $old_instance;

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
$instance[ 'MPUvalue' ]      = strip_tags( $new_instance['MPUvalue'] );

return $instance;
}

} // Class socialwidget ends here

// Register and load the widget
function load_editorial_picks_widget() {register_widget( 'Editorial_picks_widget' );}
add_action( 'widgets_init', 'load_editorial_picks_widget' );	