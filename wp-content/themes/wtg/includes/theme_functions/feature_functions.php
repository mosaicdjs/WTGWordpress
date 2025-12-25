<?php

function wtg_article_title_image_share_new()
{
	$postid = get_the_ID(); ?>
    <style>
	

	.feature_heading_date
	{
	}
	
	.feature_heading_title h1 
	{
    font-size: 2.8rem;
    font-weight: 300;
    color: #2a2466;
    margin: 0px;
	padding-top:30px;
	width:auto;
	line-height:1.1;
	}

	</style>
	<div>
			<?php wtg_article_image_new($postid); ?>
	</div>
	
    <div class="container">
	    <div class="row">
	        <div class="col-sm-12">
	            <?php wtg_share_this_unstyled($postid); ?>
            </div>

        	<div class = "col-sm-12" >

    			<div class="feature_heading_title" style="text-align:center">
    	    		<h1 class="newfeature" itemprop="headline"><?php echo get_the_title($postid) ?></h1>
    			</div>
<?php /*
				<div class="feature_heading_date">
					<span>Published on: <?php echo get_the_date('l, F j, Y',$postid) ?></span>
				</div> */ ?>
            </div>
		</div>
    </div>

<?php 
} 

function wtg_article_title_image_share()
{
	
	$postid = get_the_ID();
	$wide = '';
		echo'
		<div class="container">
			<div class="row group_elements_editorial">';
				wtg_pageheading($postid);
				wtg_article_image($postid);
				wtg_share_this($postid);
		echo '
			</div>';
}

function wtg_article_image_new($postID)
{
	$iString = 'http://aws-cdn.worldtravelguide.net/';
	$isrc = '';
	$imageID = get_post_meta($postID, 'main_image', true);
	$imageDetails = wp_get_attachment_image_src( $imageID, 'full');
	$imageURL = $imageDetails [0];
	$imageMeta = wp_prepare_attachment_for_js( $imageID );
					//var_dump($imageMeta);
	$imageAlt = $imageMeta['alt'];
	if ($imageAlt == '') $imageAlt = $imageMeta['Caption'];
	if ($imageAlt == '') $imageAlt = $imageMeta['title'];
	$altText = get_the_title($postID).' - '.$imageAlt;	

    if ($imageID)
	{	echo'
		<div class="image_area" style=margin-top:-30px; text-align:center;">
            <img itemprop="image" alt="'.$altText.'" src="'.$imageURL.'" class="img-responsive" width="100%">
    	</div>';
	}
}

function wtg_article_content_new()
{?>
	<style> 

	
		body { font-size:62.5%; }

	.editorial_article .article_content 
	{
		padding-bottom:4rem; 
		max-width:50rem; 
		margin-top:50px;
		font-size:1.1rem;
		line-height:auto;
		left:0; right:0; margin:auto} 
	
	.editorial_article .article_content p
	{
		margin-bottom:1rem;
		padding-left:15px;
		padding-right:15px;
	}
	
	.editorial_article .article_content h2
	{
		margin-bottom:1rem;
		margin-top:2rem;
		padding-left:15px;
	}
	
	
	.centre-ad
	{
		text-align:center;
	}
	
	.editorial_article .article_content p.highlight
	{
		font-size:1.2rem;
		color:#2a2466;
		line-height:auto;
		margin-bottom:2rem;
		text-align:center;
		padding-left:15px;
		padding-right:15px;
	}
	
	
	
	.inline-image-container
	{
		margin-left:-15%;
		width:130%;
		padding-top:4rem;
		padding-bottom:4rem;
	}
	
	@media screen and (max-width: 960px) 
	{
		.inline-image-container
		{
			margin-left:0%;
			width:100%;
		}
	}
	
	.inline-image-container p
	{
		background-color:#2a2466;
		color:white;
		padding:5px;
	}

	
	.article_content img {width:100%}
	
	
    
    </style>

<?php
	$postID = get_the_ID();
	$content_post = get_post($postID);
	
	$standfirst = '<p class="highlight">'.get_post_meta($postID, 'stand_first_text', true).'</p>';
	
	$content = $content_post->post_content;
	$content = apply_filters('the_content', $content);
	$content = str_replace(']]>', ']]&gt;', $content);
	
	echo '<div>
                <div class="article-content">
                    <div class="article_content" itemprop="text">';
					echo wp_specialchars_decode($standfirst);
					$removedSpecialCharactersContent =  wp_specialchars_decode($content);
					$modifiedGuideContent = explode ("<p>", $removedSpecialCharactersContent);
                    $guide_content = implode($modifiedGuideContent, "<p>");
                    print $guide_content;



/*echo '					    <div style="width:700px; max-width:100%; left:0; right:0; margin:auto; margin-bottom:50px">
<!-- code from sekindo - NVU-Worldtravelguide - NVU-Mobile-Worldtravelguide -->
<script type="text/javascript" language="javascript" src="https://live.sekindo.com/live/liveView.php?s=94239&cbuster=[CACHE_BUSTER]&pubUrl=[PAGE_URL_ENCODED]&x=700&y=450&vp_content=plembed5ddtwizprmno&vp_template=269"></script>
<!-- code from sekindo -->

    </div>';*/


					
echo '			</div>
				</div>';

		echo '</div>';

	wtg_article_footer();	
}

function wtg_article_footer()
{ ?>

	<div class="container">
    <div class="row" style="border:1px solid black; padding-top:10px; padding-bottom:10px; margin-bottom:20px;">
    
    <p style="padding-left:15px;">Advertisement</p>
		<div class="col-md-4 centre-ad">
			<!-- /4971404/MPU -->
			<div id="div-gpt-ad-1492512001379-9">
				<script>
					googletag.cmd.push(function() { googletag.display('div-gpt-ad-1492512001379-9'); });
				</script>
			</div>
		</div>
		<div class="col-md-4 centre-ad">
			<!-- /4971404/MPU -->
			<div id="div-gpt-ad-1492512001379-6">
				<script>
					googletag.cmd.push(function() { googletag.display('div-gpt-ad-1492512001379-6'); });
				</script>
			</div>
		</div>
		<div class="col-md-4 centre-ad">
			<!-- /4971404/MPU -->
			<div id="div-gpt-ad-1492512001379-3">
				<script>
					googletag.cmd.push(function() { googletag.display('div-gpt-ad-1492512001379-3'); });
				</script>
			</div>
		</div>
	</div>
</div>

<style>
.feature-row
{
	margin-bottom:40px; 
	border-top:1px solid #2a2466; 
	padding-top:40px;
}
</style>
<?php

echo '<h2 style="text-align:center; padding-bottom:4rem; padding-top:4rem;">Latest Articles</h2>';
	$postLimit = 6;
	$pargs = array(
		'post_type'             => 'features',
		'posts_per_page' 		=> $postLimit,
	);
	
	$postsQuery = new WP_Query($pargs);
	$pIDs = array();
	$i=0;
	if($postsQuery->have_posts()):
		while ($postsQuery->have_posts()):$postsQuery->the_post();
        if ($i == 0) { $style="border-top:0px"; $i=1; }else{$style="";}
		$postID = get_the_ID();
		$postLink = get_permalink($postID);
		$imageID = get_post_meta($postID, 'main_image', true);
        $postImageObject = wtg_get_attachment($imageID);
        $postImageLinkSrc = wp_get_attachment_image_src($imageID,'medium');
		$postImageLink = $postImageLinkSrc[0];
		//var_dump($postImageObject);
		//echo $postImageLink;
        $postTitle = get_the_title($postID);
        $postTeaser = 'test';
        $postTeaser = get_post_meta($postID, 'stand_first_text', true);
		$vanillaTeaser = preg_replace('/(<[^>]+) style=".*?"/i', '$1', $postTeaser);
		$strippedTeaser = strip_tags($vanillaTeaser);
        $html .= '
		<div class="container">
		<div class="row feature-row" style="'.$style.'">
			<div class="col-sm-4">
            	<a href="'.$postLink.'"><img style="width:100%" src="'.$postImageLink.'" alt="'.$postImageObject['alt'].'" ></a>
			</div>
            <div class="col-sm-7">
				 <a href="'.$postLink.'"><h3>'.$postTitle.'</h3></a>
				 <p>'.$strippedTeaser.'</p>
			</div>	 
				 
         </div>
		 </div>';


		endwhile;
	endif;

	echo $html;

}


function wtg_article_image($postID)
{
	$iString = 'http://aws-cdn.worldtravelguide.net/';
	$isrc = '';
	$imageID = get_post_meta($postID, 'main_image', true);
	$featureType = get_field('newstyle_feature', $postid);
	if ($featureType) {$width = 'width="100%"';}
	if ($imageID == ''){
		/*
		if ( have_rows('region_image', $postID)){
			while (have_rows('region_image', $postID)) :the_row();
				if ( have_rows('otherimage', $postID)):
					while (have_rows('otherimage', $postID)) :the_row();
						$isrc = get_sub_field('filepath',$postID);
					endwhile;
				endif;
			
			endwhile;
		}
		$imageURL = $iString.$isrc;*/
	} else {
		$imageDetails = wp_get_attachment_image_src( $imageID, 'full');
		$imageURL = $imageDetails [0];
			$imageMeta = wp_prepare_attachment_for_js( $imageID );
					//var_dump($imageMeta);
	$imageAlt = $imageMeta['alt'];
	if ($imageAlt == '') $imageAlt = $imageMeta['Caption'];
	if ($imageAlt == '') $imageAlt = $imageMeta['title'];
	$altText = get_the_title($postID).' - '.$imageAlt;	
	}
	
    echo '<div class="col-md-12 image_area">
            <img itemprop="image" alt="'.$altText.'" src="'.$imageURL.'" class="img-responsive" '.$width.'>
        </div>';
	//var_dump($imageDetails);
	$pageURL = get_page_by_title('features');
	//var_dump($pageURL);
}

function wtg_article_sidebar()
{
	$postLimit = 6;
	$pargs = array(
		'post_type'             => 'features',
		'posts_per_page' 		=> $postLimit,
	);
	
	$postsQuery = new WP_Query($pargs);
	$pIDs = array();

	if($postsQuery->have_posts()):
		while ($postsQuery->have_posts()):$postsQuery->the_post();
			$pID = get_the_ID();
			array_push($pIDs, $pID);
		endwhile;
	endif;
    
	//var_dump($pIDs);
	$html = '';
	foreach($pIDs as $postID){
        $postLink = get_permalink($postID);
		$imageID = get_post_meta($postID, 'main_image', true);
        $postImageObject = wtg_get_attachment($imageID);
        $postImageLinkSrc = wp_get_attachment_image_src($imageID,'latest-article-thumb');
		$postImageLink = $postImageLinkSrc[0];
			$imageMeta = wp_prepare_attachment_for_js( $imageID );
					//var_dump($imageMeta);
			$imageAlt = $imageMeta['alt'];
		if ($imageAlt == '') $imageAlt = $imageMeta['Caption'];
		if ($imageAlt == '') $imageAlt = $imageMeta['title'];
		$altText = get_the_title($postID).' - '.$imageAlt;	

		//var_dump($postImageObject);
		//echo $postImageLink;
        $postTitle = get_the_title($postID);
        $postTeaser = 'test';
        
        $html .= '<div class="article">
                    <a href="'.$postLink.'"><img src="'.$postImageLink.'" alt="'.$altText.'" >
                    </a>
                    <a href="'.$postLink.'">'.$postTitle.'</a>
                </div>';
    }
    wp_reset_query();
	//echo $html;
	
	echo '<div class="col-sm-4 right_col" id="sticker">
	<!-- /4971404/MPU -->
					<div id="div-gpt-ad-1492512001379-9">';?>
					<script>
						googletag.cmd.push(function() { googletag.display('div-gpt-ad-1492512001379-9'); });
					</script>
				<?php echo '</div>
	</div><br/>';
	echo '<div class="col-sm-4 right_col" id="sticker">
	<!-- /4971404/MPU -->
					<div id="div-gpt-ad-1492512001379-6">';?>
					<script>
						googletag.cmd.push(function() { googletag.display('div-gpt-ad-1492512001379-6'); });
					</script>
				<?php echo '</div>
	</div><br/>';
	echo '<div class="col-sm-4 right_col" id="sticker">
	<!-- /4971404/MPU -->
					<div id="div-gpt-ad-1492512001379-3">';?>
					<script>
						googletag.cmd.push(function() { googletag.display('div-gpt-ad-1492512001379-3'); });
					</script>
				<?php echo '</div>
	</div>';
	/*
	echo "<!-- /4971404/MPU-9 -->
<div id='div-gpt-ad-1511347496616-0' style='height:600px; width:300px;'>
<script>
googletag.cmd.push(function() { googletag.display('div-gpt-ad-1511347496616-0'); });
</script>
</div>";
	*/
	echo '<div class="col-sm-4 right_col right_sidebar" id="sticker">
			<div class="theiaStickySidebar">
                    

                    <div class="related_articles">
                        <h4>LATEST ARTICLES</h4>'.$html.'

                    </div>
					<div style="height:835px;text-align:right;">';
wtg_guides_sidebar_widgets();

        echo '</div></div></div>';
				
	/*?>
    
	
	<script>
		jQuery(document).ready(function(){
				jQuery('.right_sidebar').theiaStickySidebar({

					// container element
					'containerSelector': '',
				  
					// top/bottom margiin in pixels
					'additionalMarginTop': 0,
					'additionalMarginBottom': 0,
				  
					// auto up<a href="https://www.jqueryscript.net/time-clock/">date</a> height on window resize
					'updateSidebarHeight': true,
				  
					// disable the plugin when the screen size is smaller than...
					'minWidth': 0,
				  
					// disable the plugin on responsive layouts
					'disableOn<a href="https://www.jqueryscript.net/tags.php?/Responsive/">Responsive</a>Layouts': true,
				  
					// or 'stick-to-top', 'stick-to-bottom'
					'sidebarBehavior': 'modern',
				  
					// or 'absolute'
					'defaultPosition': 'relative',
				  
					// namespace
					'namespace': 'TSS'
					
				});
				});
	</script>
	<?php */

}

function wtg_article_content()
{
	$postID = get_the_ID();
	$content_post = get_post($postID);
//	$feature_type = get_field();
	
	$standfirst = '<p class="large">'.get_post_meta($postID, 'stand_first_text', true).'</p>';
	
	$content = $content_post->post_content;
	$content = apply_filters('the_content', $content);
	$content = str_replace(']]>', ']]&gt;', $content);
	
	echo '<div class="row">
                <div class="col-sm-7 col-sm-offset-1 no_left_right">

                    <div class="article_content" itemprop="text">';
					echo wp_specialchars_decode($standfirst);
					$removedSpecialCharactersContent =  wp_specialchars_decode($content);
					$modifiedGuideContent = explode ("<p>", $removedSpecialCharactersContent);
                    $guide_content = implode("<p>", $modifiedGuideContent );
                    print $guide_content;
					//wtg_slider();
	echo '								</div>';		

	
					
	echo '			</div>';		
				wtg_article_sidebar();
		echo '</div>';
	
}




?>