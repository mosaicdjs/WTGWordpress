<?php get_header();
/*
 * echo
'
<div class="container-fluid">
	<div class="row">
		<div style="width:auto; border-bottom:1px solid #FFF; float:right; margin-right:40px;">
';
			$args = array('orderby' => 'name', 'order' => 'ASC' );
			$categories = get_categories($args);
			foreach($categories as $category) { echo '<a style="display:inline-block; padding-left:10px; padding-right:10px" href="' . get_category_link( $category->term_id ) . '" >'. $category->name.'</a> ';}
echo
'			
		</div>
	</div>
*/
echo
'
	<div class="row">
';
		while (have_posts ()) :
			the_post();
			$imageArray = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'galleryThumb' );
			if (!$imageArray) $imageArray[0] = get_template_directory_uri().'/img/placeholder.png';
echo
'
			<a href="'.get_the_permalink().'">
				<div class="col-md-4 col-sm-6 gallery-image">
					<img src="'.$imageArray[0].'" class="img-responsive">
					<div class="summary-overlay">
						<div class="summary-inner-overlay overlayBorder">
							<div class="blog-summary-title">'.$post->post_title.'</div>
							<div class="summary-spacer"></div>
						</div><!-- summary inner overlay -->
					</div> <!-- summary overlay -->
				</div>
			</a>	
'; 
		endwhile;
echo
'
	</div> <!-- row -->
</div> <!--container -->
';
get_footer();

?>