<?php


/*
	function to grab image ids from a wysiwyg editorbased on the field's name.
	if you don't want to use the WP default 'content', you can provide this function with your own unique field name.
	@param postID - int - the id of the post
	@param filename - string - the name of the field set up in the advanced custom fields plugin
	@return - an array of image ids unique to a post.
*/
function get_gallery_attachments($postID, $fieldname)
{
	$images_id = array();
	if ($fieldname == 'content') {$field = get_the_content ($postID);} else {$field = get_post_meta ($postID, $fieldname, true);}
	preg_match('/\[gallery.*ids=.(.*).\]/', $field, $ids);
	$i=1;
	if (!empty($ids)) 
	{
		$images_id = explode(",", $ids[$i]);
		return $images_id;
	}
	else
	{
		return false;
	}
}	


/*
	function to strip apart the components of an image object based on an image ID.
*/
function wtg_get_attachment( $attachment_id )
{
	$attachment = get_post( $attachment_id );
	return array(
		'alt' => get_post_meta( $attachment->ID, '_wp_attachment_image_alt', true ),
		'caption' => $attachment->post_excerpt,
		'description' => $attachment->post_content,
		'href' => get_permalink( $attachment->ID ),
		'src' => $attachment->guid,
		'title' => $attachment->post_title
	);
}


/*
	simplifing the word press do_shortcode() function, to make it more humanly readable.
	to be used heavily within the theme because we love shortcodes!!
	attributes are parsed to do_that_shortcode() as an array rather than included in a string as per do_shortcode()
*/
function do_that_shortcode( $tag, array $atts = array(), $content = null ) {

	global $shortcode_tags;

	if ( ! isset( $shortcode_tags[ $tag ] ) ) {
		return false;
	}

	return call_user_func( $shortcode_tags[ $tag ], $atts, $content, $tag );
}


/*
	function to display a bootstrap carousel, typically used in conjunction with get_gallery_attachments().
	
	note: the styling can be modified, and should be in your style.css file :P
	
	@param carouselID - string - the unique id for your carousel, enables multiple carousels on one page.
	@param imageIDs - array - an array of image ids geterated from get_gallery_attachments() or other.
	@param size - string - the size of image to be dispalyed usually 'full' but can be thumbnail, medium, large.
	@param indicators - boolean - whether or not you want carousle indicators to be displayed
	@param search - boolean - if true displays a search box
	@param pageID - the id for the page
	@return - a functioning bootstrap carousel. easy peasy.
*/
function display_carousel ($carouselID, $imageIDs, $size, $indicators, $search, $pageID)
{
	//var_dump($imageIDs);
	if($imageIDs[0] != ''){
	// Preload Images
	foreach ($imageIDs as $imageID)
	{
		// echo '<img style="display:none" src="'.$imageURL.'" width="100%" alt="Image 01">';
	};
	$first = true;
	echo '
		<div id="'.$carouselID.'" class="carousel slide" data-ride="carousel" >
			<div class="carousel-inner" role="listbox">';
				if ($search == true) {
					
/*					echo '<div class="main_home_search">
								<form class="search_carousel" action="'.get_bloginfo('url').'" method="get">
									<div class="form-group">
										<input type="text" name="s" class="form-control" placeholder="'.get_post_meta($pageID,'search_bar_text',true).'">
									</div>
									<button type="submit" class="btn btn-link">
										<img alt="" src="'.get_template_directory_uri().'/images/search_icon_large.png">
									</button>
								</form>
							</div>'; */
				} 
				$imageIndex=0;
				foreach ($imageIDs as $imageID)
				{
					$imageDetails = wp_get_attachment_image_src( $imageID, $size);
					$imageURLs[$imageIndex] = $imageDetails [0];
					$imageMeta = wp_prepare_attachment_for_js( $imageID );
					//var_dump($imageMeta);
					$imageAlt = $imageMeta['alt'];
					if ($imageAlt == '') $imageAlt = $imageMeta['Caption'];
					if ($imageAlt == '') $imageAlt = $imageMeta['title'];
					$altText[$imageIndex] = get_the_title($pageID).' - '.$imageAlt;	
					if ($first) {$active = 'active'; $first=false;} else {$active = '';};
					if($search == false){ $withsearch = '';} else {$withsearch= 'with_search';}
					echo '
					<div class="item '.$active.'" >
					<img src="'.$imageURLs[$imageIndex].'" alt="'.$altText[$imageIndex].'">
						<div class="carousel-caption '.$withsearch.'">';
							if(is_archive()){
								$ttid = get_queried_object()->term_id;
								$term = get_term($ttid);
								echo '<h3>'.$term->name.'</h3>';
							}else{
								echo '<h3>'.get_post_meta($pageID,'welcome_text',true).'</h3>';
							}
							
							if($search == false){
								if(is_tax()){
									echo '<p>'.term_description($pageID,'wtg_continent').'</p>';
								} else{
								echo '<p>'.get_post_meta($pageID,'search_bar_text',true).'</p>';
								}
							}

							echo '<div class="main_home_search" style="position:absolute; bottom:auto;">
								<form class="search_carousel" action="'.get_bloginfo('url').'" method="get">
									<div class="form-group">
										<input type="text" name="s" class="form-control" placeholder="Where would you like to go ?      './*get_post_meta($pageID,'search_bar_text',true).*/'">
									</div>
									<button type="submit" class="btn btn-link">
										<img alt="" src="'.get_template_directory_uri().'/images/search_icon_large.png">
									</button>
								</form>
							</div>';

						echo '</div>
					</div>';
					$imageIndex++;
				} // finished image loop
echo
'
			</div>
';
			if ($indicators==true && $imageIndex > 1){
				$indicatorIndex = 0;
				echo '<ol class="carousel-indicators">';
				foreach ($imageIDs as $imageID)
				{
					echo '<li class="" data-slide-to="'.$indicatorIndex.'" data-target="#'.$carouselID.'"></li>';
					$indicatorIndex++;
					
				}
				//if (is_single()){ echo '<a href="#" class="seegallery" data-toggle="modal" data-target=".gallery">SEE GALLERY</a>';}
				echo '</ol>';
				
				echo
'
<a class="left carousel-control" href="#'.$carouselID.'" role="button" data-slide="prev">
				<div class="carousel-left-nav"></div>
				<span class="sr-only">Previous</span>
			</a>
			<a class="right carousel-control" href="#'.$carouselID.'" role="button" data-slide="next">
				<div class="carousel-right-nav"></div>
				<span class="sr-only">Next</span>
			</a>
		
';
			}
echo '</div>';
	}
}


function partition(Array $list, $p) {
    $listlen = count($list);
    $partlen = floor($listlen / $p);
    $partrem = $listlen % $p;
    $partition = array();
    $mark = 0;
    for($px = 0; $px < $p; $px ++) {
        $incr = ($px < $partrem) ? $partlen + 1 : $partlen;
        $partition[$px] = array_slice($list, $mark, $incr);
        $mark += $incr;
    }
    return $partition;
}

?>
