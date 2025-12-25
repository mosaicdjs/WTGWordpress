<?php

function wtg_test()
{
	echo 'it works!';
}

function wtg_start()
{

echo '	<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-T2RGDBW"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->';

	$options = get_option('wtg_meta_default_options');
	$site_h1 = $options['site_h1'];
	if (is_front_page()) {
		
		if (!empty( $site_h1)) {
			echo '<div class="pagewrap">';
				echo "<h1 class='h1-heading'>$site_h1</h1>";

		} 
		
	} else {
		
	}
	
}

function wtg_end()
{
	echo '</div>';
}

function wtg_logo()
{
?>
<style>header {padding-top:0px; height:180px}	</style>
				<!--<div class="covid" >Due to the impact of COVID-19, you are recommended to check travel restrictions from your government sources and contact local venues to verify any new rules</div> -->
			<div class="container">
				<div class="row hidden-xs">
					<div class="col-md-3 col-sm-3 logo">
						<div><a href="<?php echo get_home_url();?>"style="text-align:center"><span>World Travel Guide</span></a></div>
					</div>
					<div id="div-gpt-ad-1492512001379-7" class="col-md-9 col-sm-9 advert">
						<script defer> googletag.cmd.push(function() { googletag.display('div-gpt-ad-1492512001379-7'); }); </script>
					</div>
					<div style="text-align:right">
					<?php		
/**
 * Place a cart icon with number of items and total cost in the menu bar header.
 *
 * Source: http://wordpress.org/plugins/woocommerce-menu-bar-cart/
 */
/*
		global $woocommerce;
		$viewing_cart = __('View your shopping cart', 'your-theme-slug');
		$start_shopping = __('Start shopping', 'your-theme-slug');
		$cart_url = $woocommerce->cart->get_cart_url();
		$shop_page_url = get_permalink( woocommerce_get_page_id( 'shop' ) );
		$cart_contents_count = $woocommerce->cart->cart_contents_count;
		$cart_contents = sprintf(_n('%d item', '%d items', $cart_contents_count, 'your-theme-slug'), $cart_contents_count);
		$cart_total = $woocommerce->cart->get_cart_total();
		// Uncomment the line below to hide nav menu cart item when there are no items in the cart
		 if ( $cart_contents_count > 0 ) {
				$menu_item = '<a class="wcmenucart-contents" href="'. $cart_url .'" title="'. $viewing_cart .'">';
				$menu_item .= '<span class="dashicons dashicons-cart"></span> ';
			    $menu_item .= $cart_contents.' - '. $cart_total;
			    $menu_item .= '</a></li>';
		 }
		echo $menu_item; */
?>
					</div>
				</div>
				<div class="row hidden-sm hidden-md hidden-lg">
					<div class="col-md-3 col-sm-3 logo">
						<div><a href="<?php echo get_home_url();?>"><span>World Travel Guide</span></a></div>
					</div>
					<div id="div-gpt-ad-1492512001379-11" class="advert" style="width:320px; overflow:hidden; left:0; right:0; margin:auto">
						<script defer> googletag.cmd.push(function() { googletag.display('div-gpt-ad-1492512001379-11'); }); </script>
					</div>
				</div>	

		<div class="row" style="padding-top:20px;" ><div id="ev-ros-970x250" style="width:970px; height:auto; background:#fff; left:0; right:0; margin:auto"></div></div>

			</div>

<?php
}

function wtg_listing_logo()
{
?>	
			<div class="container">
				<div class="row">
					<div class="col-md-3 col-sm-3 logo">
						<div><a href="<?php echo get_home_url();?>"><span>World Travel Guide</span></a></div>
					</div>
					<div class="col-md-6 col-sm-6 box_list" style="padding-top:10px">
						<h3>Columbus Content Solutions</h3>
						<?php if (is_user_logged_in()) { ?> <a href="<?php echo wp_logout_url(get_permalink()); ?>">Logout</a> <?php } ?>
					</div>

				</div>
			</div>	
<?php
}

function wtg_primary_nav()
{
?> 
<nav class="navbar navbar-default">
	<div class="container">
		<!-- Brand and toggle get grouped for better mobile display -->
		<div class="navbar-header">

			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
				<span>CLOSE</span>
			</button>
		</div>

		<!-- Collect the nav links, forms, and other content for toggling -->
		<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1" itemscope itemtype="http://schema.org/SiteNavigationElement">
<?php
/*echo '
<style> 
	nav.navbar ul ul li { list-style: none;}
	nav.navbar ul ul li:before
	{
		content: "";
		display: inline-block;
		height: 15px;
		width: 20px;
		background-image: url("https://development.worldtravelguide.net/wp-content/uploads/2018/08/shu-GEN-Water-1074395291-1440x823.jpg");
	}
</style>'; */
wp_nav_menu( array( 'theme_location' => 'main_menu','menu'=>'main_menu', 'menu_class' => 'nav navbar-nav', 'container'=>false,'fallback_cb' => function() { return ''; }, ) );
wp_nav_menu( array( 'theme_location' => 'partners_menu','menu'=>'partners_menu', 'menu_class' => 'nav navbar-nav navbar-right', 'container'=>false,'fallback_cb' => function() { return ''; }, ) );
if (is_user_logged_in()){
wp_nav_menu( array( 'theme_location' => 'administrators_menu','menu'=>'administrators_menu', 'menu_class' => 'nav navbar-nav', 'container'=>false,'fallback_cb' => function() { return ''; }, ) );
}
?>
		</div>
		<!-- /.navbar-collapse -->
	</div>
	<!-- /.container-fluid -->
</nav>
<?php
}

function wtg_main_carousel()
{
	$postid = get_the_ID();
	if(!is_singular('guides')){
		$carousel_images = get_gallery_attachments($postid, 'home_carousel');/*
		if(is_tax( )){
			$tid = get_queried_object()->term_id;
			echo "id=$tid";
			$continentImage = get_term_meta($tid,'continent_image',true);
			$carousel_images = array();
			array_push($carousel_images,$continentImage);
			display_carousel('myCarousel',$carousel_images,'full',false,false, $postid);
			var_dump($carousel_images);
		} else{
					
		*/
		if(is_tax()){
		//echo 'true';
			$tid = get_queried_object()->term_id;
			$continentImage = get_term_meta($tid,'continent_image',true);
			$carousel_images = array();
			array_push($carousel_images,$continentImage);
			display_carousel('myCarousel',$carousel_images,'full',false,false, $tid);
		}
		else if (is_front_page()) {
			display_carousel('myCarousel',$carousel_images,'full',true,true, $postid);
		} else {
			display_carousel('myCarousel',$carousel_images,'full',false,false, $postid);
		}
		//}
	} else {
		
		$current_fp = get_query_var('fpage');
		$wtgContinent = get_query_var('wtg_continent');
	
		if(!$current_fp){
			
			
		
				$carousel_images = get_gallery_attachments($postid, 'home_carousel');
				display_carousel('myCarousel',$carousel_images,'full',true,false, $postid);
		} 
		
	
	
	}
	
	
	//var_dump($carousel_ImageSrcs);
	
	
}

function wtg_mobile_hero()
{
	$pageID = get_the_ID();
	//echo $postid;
	$imageDetails = false;
	$carousel_images = get_gallery_attachments($pageID, 'home_carousel');
	$imageDetails = wp_get_attachment_image_src( $carousel_images[0], 'full');
	
	//var_dump($carousel_images);
	if (is_front_page()) {
		?>
		
		<div class="mobile_hero_image">
            <?php if ($imageDetails[0] != ''){?><img src="<?php echo $imageDetails [0]; ?>" alt=""><?php }?>
            <div class="hero_info">
             <h3><?php echo get_post_meta($pageID,'welcome_text',true);?></h3>   
             <form class="search_carousel" action="<?php echo get_bloginfo('url');?>" method="get">
                    <div class="form-group">
                        <input type="text" name="s" class="form-control" placeholder="<?php echo get_post_meta($pageID,'search_bar_text',true); ?>">
                    </div>
                    <button type="submit" class="btn btn-link">
                        <img alt="" src="<?php echo get_template_directory_uri(); ?>/images/search_icon_large.png">
                    </button>
                </form>
            </div>
        </div>
		
		<?php
	} 
	else 
	{

		if ($imageDetails[0] != NULL) 
		{
			//var_dump ($imageDetails[0]);
		?>
		<div class="mobile_hero_image">
            <img src="<?php echo $imageDetails [0]; ?>" alt="">
            <div class="hero_info">
             <h3><?php echo get_post_meta($pageID,'welcome_text',true);?></h3>   
             <p><?php echo get_post_meta($pageID,'search_bar_text',true); ?></p>
            </div>
        </div>
		
		<?php
		}
	}
	
}

function wtg_followus()
{
	
	//if (is_active_sidebar('followUs')) :
		echo '<div class="followus">';
			dynamic_sidebar('followUs');
			$postID = get_the_ID();

			if(is_tax())
			{
				echo '<a href = "'.get_site_url().'">'.get_bloginfo('name').'</a>';
				echo ' > <a href="'.get_site_url().'/guides/">Guides</a>';			
				$taxonomy = get_queried_object();
				echo ' > '.$taxonomy->name;
			}
			elseif (get_post_type($postID) == 'guides')
			{
				$term_list = wp_get_post_terms($postID, 'wtg_continent');
				foreach ($term_list as $term)
				{
					$termLink = $term->slug;
					$termName = $term->name;
				}
				echo '<a href = "'.get_site_url().'">'.get_bloginfo('name').'</a>';
				echo ' > <a href="'.get_site_url().'/guides/">Guides</a>';			
				echo ' > <a href="'.get_site_url().'/guides/'.$termLink.'/">'.$termName.'</a>';
				$ancestors = get_ancestors($postID, 'page', 'post_type');
				$ancestors = array_reverse($ancestors);
				foreach ($ancestors as $ancestor)
				{
					echo ' > <a href="'.get_the_permalink($ancestor).'">'.get_the_title($ancestor).'</a>';
				}
				echo ' > '.get_the_title();
			}
			elseif (get_post_type($postID == 'page') && !is_front_page())
			{
					echo '<a href = "'.get_site_url().'">'.get_bloginfo('name').'</a>';
					echo ' > '.get_the_title();
			}
			else
			{
			}
	
			
		echo '</div>';
	//endif;
}

function wtg_breadcrumbs()
{
			$postID = get_the_ID();

			if(is_tax())
			{
				echo '<a href = "'.get_site_url().'">'.get_bloginfo('name').'</a>';
				echo ' > <a href="'.get_site_url().'/guides/">Guides</a>';			
				$taxonomy = get_queried_object();
				echo ' > '.$taxonomy->name;
			}
			elseif (get_post_type($postID) == 'guides')
			{
				$term_list = wp_get_post_terms($postID, 'wtg_continent');
				foreach ($term_list as $term)
				{
					$termLink = $term->slug;
					$termName = $term->name;
				}
				echo '<a href = "'.get_site_url().'">'.get_bloginfo('name').'</a>';
				echo ' > <a href="'.get_site_url().'/guides/">Guides</a>';			
				echo ' > <a href="'.get_site_url().'/guides/'.$termLink.'/">'.$termName.'</a>';
				$ancestors = get_ancestors($postID, 'page', 'post_type');
				$ancestors = array_reverse($ancestors);
				foreach ($ancestors as $ancestor)
				{
					echo ' > <a href="'.get_the_permalink($ancestor).'">'.get_the_title($ancestor).'</a>';
				}
				echo ' > '.get_the_title();
			}
			elseif (get_post_type($postID == 'page') && !is_front_page())
			{
					echo '<a href = "'.get_site_url().'">'.get_bloginfo('name').'</a>';
					echo ' > '.get_the_title();
			}
			else
			{
			}
		
}

function wtg_bluebox()
{
	$postid = get_the_ID();
	$blueBoxEnabled = get_post_meta($postid, 'blue_box_enabled', true);
	$blueBoxTitle = '';
	$blueBoxText = '';
	//echo $blueBoxEnabled;
	if ($blueBoxEnabled == 1){
		$blueBoxTitle = get_post_meta($postid, 'blue_box_title', true);
		$blueBoxText = get_post_meta($postid, 'blue_box_text', true);
		echo "<div class='editorial'>
			<div class='container'>
			  <h2>$blueBoxTitle</h2>
			  <p>$blueBoxText</p>
		  </div>
		</div>";
	}
}

function wtg_latest_articles()
{
	$args = array(
        'post_type'             => 'features',
		'posts_per_page' 		=> -1,
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
	
	$first = 0;
	$thefirst = array_shift($articleIDs);
	$firstImageID = get_post_meta($thefirst, 'thumbnail_image',true);
	if (!$firstImageID) {$firstImageID = get_post_meta($thefirst, 'main_image',true);}
	$firstImageDetails = wp_get_attachment_image_src( $firstImageID, 'full');
	$imageMeta = wp_prepare_attachment_for_js( $firstImageID );
					//var_dump($imageMeta);
	$imageAlt1 = $imageMeta['alt'];
	if ($imageAlt1 == '') $imageAlt = $imageMeta['Caption'];
	if ($imageAlt1 == '') $imageAlt = $imageMeta['title'];


	$imageIDs = array();
	foreach ($articleIDs as $aID){
		$iID = get_post_meta($aID, 'thumbnail_image', true);
		if (!$iID) {$iID = get_post_meta($aID, 'main_image', true);}
		array_push($imageIDs,$iID);
	}
	
	echo '<div class="herobox_image">
        <div class="container">
            <div class="row">
                <div class="col-sm-6 no_padding_right">
                    <div class="article_box">

                        <a href="'.get_permalink($thefirst).'">
                            <img alt="'.$imageAlt1.'" src="'.$firstImageDetails[0].'"/>
                            <h4>'.get_the_title($thefirst).'<br/>
                            <span></span>
                            </h4>
                        </a>
                        <div class="colour_mask"></div>
                    </div>
                </div>
                <div class="col-sm-6 small_box padding_left">
                    <div class="row padding_bottom">
                        <div class="col-sm-6 col-xs-6 no_padding_right">
                            <div class="article_box">
                                <a href="'.get_permalink($articleIDs[0]).'">';
										$imageMeta = wp_prepare_attachment_for_js( $imageIDs[0] );
										$imageAlt = $imageMeta['alt'];
										if ($imageAlt == '') $imageAlt = $imageMeta['Caption'];
										if ($imageAlt == '') $imageAlt = $imageMeta['title'];
									echo '	
                                    <img alt="'.$imageAlt.'" src="'.wp_get_attachment_image_src( $imageIDs[0], 'full')[0].'">
                                    <h4>'.get_the_title($articleIDs[0]).'
                                    <span></span>
                                    </h4>
                                </a>
                                <div class="colour_mask"></div>
                            </div>
                        </div>

                        <div class="col-sm-6  col-xs-6 padding_left">
                            <div class="article_box">
                                <a href="'.get_permalink($articleIDs[1]).'">';
										$imageMeta = wp_prepare_attachment_for_js( $imageIDs[1] );
										$imageAlt = $imageMeta['alt'];
										if ($imageAlt == '') $imageAlt = $imageMeta['Caption'];
										if ($imageAlt == '') $imageAlt = $imageMeta['title'];
									echo '	
                                    <img alt="'.$imageAlt.'" src="'.wp_get_attachment_image_src( $imageIDs[1], 'full')[0].'">
                                    <h4>'.get_the_title($articleIDs[1]).'
                                      <span></span>
                                      </h4>
                                </a>
                                <div class="colour_mask"></div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6  col-xs-6 no_padding_right">
                            <div class="article_box">
                                <a href="'.get_permalink($articleIDs[2]).'">';
										$imageMeta = wp_prepare_attachment_for_js( $imageIDs[2] );
										$imageAlt = $imageMeta['alt'];
										if ($imageAlt == '') $imageAlt = $imageMeta['Caption'];
										if ($imageAlt == '') $imageAlt = $imageMeta['title'];
									echo '	
                                    <img alt="'.$imageAlt.'" src="'.wp_get_attachment_image_src( $imageIDs[2], 'full')[0].'">
                                    <h4>'.get_the_title($articleIDs[2]).'
                                      <span></span>
                                      </h4>
                                </a>
                                <div class="colour_mask"></div>
                            </div>
                        </div>
                        <div class="col-sm-6  col-xs-6 padding_left">
                            <div class="article_box">
                                <a href="'.get_permalink($articleIDs[3]).'">';
										$imageMeta = wp_prepare_attachment_for_js( $imageIDs[3] );
										$imageAlt = $imageMeta['alt'];
										if ($imageAlt == '') $imageAlt = $imageMeta['Caption'];
										if ($imageAlt == '') $imageAlt = $imageMeta['title'];
									echo '	
                                    <img alt="'.$imageAlt.'" src="'.wp_get_attachment_image_src( $imageIDs[3], 'full')[0].'">
                                    <h4>'.get_the_title($articleIDs[3]).'
                                      <span></span>
                                      </h4>
                                </a>
                                <div class="colour_mask"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>';
}

function wtg_articlesby_country()
{
	$continents = get_terms( array(
		'taxonomy' => 'wtg_continent',
		'hide_empty' => false,
	) );
	echo '<div class="select_country">
			<div class="container">
				<h3 class="with_arrow">Select your country by continent</h3>
				<i class="icon with_arrow"></i>
				<ul class="nav nav-tabs country_title">
					<li class="options_name"><a data-toggle="tab" href="#">Find your continent</a></li>';
			$count = 0;
			$continentQV = get_query_var('wtg_continent');
			foreach($continents as $continent){
				$active = '';
				if ($continentQV){
					if($continentQV == $continent->slug){
						echo '<li class="active '.$continent->slug.'"><a data-toggle="tab" href="#'.$continent->slug.'">'.$continent->name.'</a></li>';
					} else {
						echo '<li class="'.$continent->slug.'"><a data-toggle="tab" href="#'.$continent->slug.'">'.$continent->name.'</a></li>';
					}
				}else {
					if($count == 0){$active = 'active';}
					echo '<li class="'.$active.' '.$continent->slug.'"><a data-toggle="tab" href="#'.$continent->slug.'">'.$continent->name.'</a></li>';
					$count++;
				}
				
				
			}
			echo '</ul>';
			
	echo '<div class="tab-content">';
			$count2 = 0;
			foreach($continents as $continent){
				$active2 = '';
				if ($continentQV){
					if($continentQV == $continent->slug){
						echo  '<div id="'.$continent->slug.'" class="tab-pane fade in active">';
					} else {
						echo  '<div id="'.$continent->slug.'" class="tab-pane fade in">';
					}
				} else {
					if($count2 == 0){$active2 = 'active';}
					echo  '<div id="'.$continent->slug.'" class="tab-pane fade in '.$active2.'">';
					$count2++;
				}
				
				echo'		<div class="topnav" id="myTopnav">
							<ul class="options_name">
								<li><a href="#">Select your country</a>
								</li>
							</ul>
                     ';
						$cargs = array(
							'post_type'             => 'guides',
							'posts_per_page' 		=> -1,
							'order' 		=> 'ASC',
							'orderby'       => 'title',
							'tax_query'             => array(
								array(
											  'taxonomy' => 'wtg_continent',
											  'field'    => 'slug',
											  'terms'    => $continent->slug,
											 
								),
								array(
											  'taxonomy' => 'wtg_guide_type',
											  'field'    => 'slug',
											  'terms'    => 'region',
											 
								),
							),
						);
						$postsQuery = new WP_Query($cargs);
						$aresults = array();

						if($postsQuery->have_posts()):
							while ($postsQuery->have_posts()):$postsQuery->the_post();
								$pID = get_the_ID();
								array_push($aresults, $pID);
								
							endwhile;
						endif;
						
						
						$aParts = partition($aresults, 4);
						echo '<ul>';
						foreach($aParts[0] as $aPart1){
							$link = get_permalink($aPart1);
							$title = get_the_title($aPart1);
							echo '<li><a href="'.$link.'">'.$title.'</a></li>';
							
						}
						echo '</ul>';
						echo '<ul>';
						foreach($aParts[1] as $aPart2){
							$link = get_permalink($aPart2);
							$title = get_the_title($aPart2);
							echo '<li><a href="'.$link.'">'.$title.'</a></li>';
						}
						echo '</ul>';
						echo '<ul>';
						foreach($aParts[2] as $aPart3){
							$link = get_permalink($aPart3);
							$title = get_the_title($aPart3);
							echo '<li><a href="'.$link.'">'.$title.'</a></li>';
						}
						echo '</ul>';
						echo '<ul>';
						foreach($aParts[3] as $aPart4){
							$link = get_permalink($aPart4);
							$title = get_the_title($aPart4);
							echo '<li><a href="'.$link.'">'.$title.'</a></li>';
						}
						echo '</ul>';
						
						
						
						wp_reset_query();
				echo '<div class="icon">
                            <a href="javascript:void(0);" class="trigger-continent">
                                <img src="'.get_template_directory_uri() .'/images/arrow_down.png">
                            </a>
                        </div>
				</div>
				</div>';
				
			
			}	
			
	echo '</div>';
	echo '</div>';
	echo '</div>';
	
	//var_dump($continents);

}




function wtg_pageheading($postID)
{
	echo '<div class="col-md-12 heading_title">';
        echo '<h1 itemprop="headline">'.get_the_title($postID).'</h1>';
    echo '</div>';
	echo '<div class="col-md-12 heading_date">';
		echo '<span>Published on: '.get_the_date('l, F j, Y',$postID).'</span>';
	echo '</div>';
	
}

function wtg_share_this_unstyled($postID)
{
	$link = get_permalink($postID);
	$title = get_the_title($postID);
	echo '<div class="followus">
                        <h3>SHARE ME</h3>
                        <ul>
                            <li>
                                <a title="Share this article on FaceBook" href="http://www.facebook.com/sharer.php?u='.$link.'&amp;t='.$title.'" title="Share me on Facebook.">
                                    <div class="fb-icon"></div>
                                </a>
                            </li>
                            <li>
                                <a title="Share this article on Twitter" href="http://twitter.com/home/?status='.$title.' - '.$link.'">
                                    <div class="twitter-icon"></div>
                                </a>
                            </li>
							
                            <li>
                                <a title="Share this article on G+" href="https://plus.google.com/share?url='.$link.'">
                                    <div class="gplus-icon"></div>
                                </a>
                            </li>
                            <li>
                                <a title="Pinrest share coming soon!" href="#">
                                    <div class="pinterest-icon"></div>
                                </a>
                            </li>
                            <li>
                                <a title="You can share this on linkedIn here" href="http://www.linkedin.com/shareArticle?mini=true&url='.$link.'&title='.$title.'">
                                    <div class="mail-icon"></div>
                                </a>
                            </li>
							
                        </ul>
                    </div>';
				/**/
//							
				
}





function wtg_share_this($postID)
{
	$link = get_permalink($postID);
	$title = get_the_title($postID);
	echo '<div class="col-sm-4 col-sm-offset-8">
                    <div class="followus">
                        <h3>SHARE ME</h3>
                        <ul>
                            <li>
                                <a title="Share this article on FaceBook" href="http://www.facebook.com/sharer.php?u='.$link.'&amp;t='.$title.'" title="Share me on Facebook.">
                                    <div class="fb-icon"></div>
                                </a>
                            </li>
                            <li>
                                <a title="Share this article on Twitter" href="http://twitter.com/home/?status='.$title.' - '.$link.'">
                                    <div class="twitter-icon"></div>
                                </a>
                            </li>
							
                            <li>
                                <a title="Share this article on G+" href="https://plus.google.com/share?url='.$link.'">
                                    <div class="gplus-icon"></div>
                                </a>
                            </li>
                            <li>
                                <a title="Pinrest share coming soon!" href="#">
                                    <div class="pinterest-icon"></div>
                                </a>
                            </li>
                            <li>
                                <a title="You can share this on linkedIn here" href="http://www.linkedin.com/shareArticle?mini=true&url='.$link.'&title='.$title.'">
                                    <div class="mail-icon"></div>
                                </a>
                            </li>
							
                        </ul>
                    </div>
                </div>';
				/**/
//							
				
}



function wtg_slider()
{
	$postID = get_the_ID();
	$imageIDs = get_gallery_attachments($postID, 'embedded_images');
	$html = '';
	if ($imageIDs[0] != ''){
		foreach($imageIDs as $imageID) {
			$imageSrc = wp_get_attachment_image_src( $imageID, 'full')[0];
			$html .= '<li><img src="'.$imageSrc.'" /></li>';
		}
		
		echo '<div id="slider" class="flexslider">
								<ul class="slides">'.$html.'</ul>
							</div>
							<div id="carousel" class="flexslider">
								<ul class="slides">'.$html.'</ul>
							</div>';
	}
	
}



function wtg_sponsor_guide()
{ ?>
	<style> a.bannerlink:hover {text-decoration:none; opacity:0.5} </style>
<?php
	$postID = get_the_ID();
	// $url = basename (get_the_permalink());
	$url = get_the_permalink();
	$url  = basename($url);
	$sponsorHTML = get_post_meta($postID, 'sponsor_a_guide', true);
	$sponsorHTML = '<a target+"_blank" class="bannerlink" href="https://worldtravelguide.trips.tourradar.com/d/'.$url.'"><h2 style="color:white">
		<img style="width:100%" src="'.get_template_directory_uri().'/images/main-banner1.jpg"></h2></a>';
//$language = get_field('language','options');
	switch ($language)
	{
	case 'en':
		$span1 = 'Your logo here';
		$span2 = 'Sponsor a guide';
		$span3 = 'Contact for rates';
		break;
	case 'de':
		$span1 = 'Platz für Ihr Logo';
		$span2 = 'Sponsern Sie einen Guide';
		$span3 = 'Fragen Sie nach Preisen';
		break;
	}
	if ($sponsorHTML == ''){
/*		echo '<div class="sponsor">
        <div class="container">
            <div class="row">
                <div class="col-md-7 col-xs-7">
                    <h3><span>'.$span1.'</span> '.$span2.'</h3>
                </div>
                <div clas="col-md-5 col-xs-5">
                    <p>'.$span3.': <a href="mailto:adsales@columbustravelmedia.com">adsales@columbustravelmedia.com</a>
                    </p>
                </div>
            </div>

        </div>
    </div>'; */
	} else {
		echo '

            <div class="row">
				<div class="col-lg-12 text-center">'.$sponsorHTML.'</div>

    	</div>';
	}
}

function wtg_revcontent()
{
?>
<div class="container">
	<div id="rcjsload_33717a"></div>
</div>
<script defer type="text/javascript">
(function() {
var referer="";try{if(referer=document.referrer,"undefined"==typeof referer||""==referer)throw"undefined"}catch(exception){referer=document.location.href,(""==referer||"undefined"==typeof referer)&&(referer=document.URL)}referer=referer.substr(0,700);
var rcds = document.getElementById("rcjsload_33717a");
var rcel = document.createElement("script");
rcel.id = 'rc_' + Math.floor(Math.random() * 1000);
rcel.type = 'text/javascript';
rcel.src = "https://trends.revcontent.com/serve.js.php?w=96966&t="+rcel.id+"&c="+(new Date()).getTime()+"&width="+(window.outerWidth || document.documentElement.clientWidth)+"&referer="+referer;
rcel.async = true;
rcds.appendChild(rcel);
})();
</script>

<?php
}

function wtg_taboola()
{	
?>
	<div id="taboola-below-article-thumbnails" class="container"></div>
			<script defer type="text/javascript">
				window._taboola = window._taboola || [];
				_taboola.push({
				mode: 'thumbnails-a',
				container: 'taboola-below-article-thumbnails',
				placement: 'Below Article Thumbnails',
				target_type: 'mix'
			});
</script>
<?php	
}

function wtg_guides_content()
{
	$postid = get_the_ID();
	$guideTerms = get_the_terms($postid,'wtg_guide_type');
	$guideType = $guideTerms[0]->slug;
	
	switch ($guideType) {
		case 'city':
			wtg_city_weather($postid);
			//wtg_city_tiquet($postid);
			break;
		/*
		case 'region':
			//echo 'this is a Region';
			break;
		case 'airport':
			//echo 'this is an Airport';
			break;
		*/
		default :
			break;
	}
	?>
	<div class="container" style="overflow:auto;">
        <div class="row" style="overflow:auto;">
            <div class="col-md-5 col-sm-5 side_bar_left">
				<div class="theiaStickySidebar">
			<?php wtg_guide_left($postid, $guideType);?>
				</div>
			</div>
			<script>
				jQuery(document).ready(function(){
				jQuery('.side_bar_left').theiaStickySidebar({

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
				//jQuery("article p:nth-of-type(2)").addClass("target");
				//jQuery(".target").after ("<span></span>");

				//$script1 = "<div id='sekindo-video-target' style='margin-top:10px;'>	</div>";
				

				//jQuery(".target").after ($script1);
				
				});




			</script>

			<article class="col-md-7 col-sm-7 main_content" itemtype="https://schema.org/CreativeWork" itemscope>
			<?php wtg_sponsor_guide() ?>
			<?php wtg_guide_content($postid);?>
			<div><?php //wtg_sekindo(); ?></div>
			<div id = "mobile_ads" class="hidden-lg hidden-md hidden-sm"> 
				<?php //wtg_sekindo_skyscanner(); ?>
				<?php wtg_hotels_combined_mobile(); ?>
			</div>
			<div id="mobile_google_ads" class="hidden-lg hidden-md hidden-sm"> 	
				<?php wtg_sidebar_google_ads(); ?>
			</div>

			</article>
		</div>
	</div>
	<?php
}

function wtg_city_weather($postID)
{
	$time=strtotime("+1 hour");
	$title = get_the_title($postID);
	//$date = new DateTime();
	//echo $date->getTimestamp();
	
	$now = date("N");
	//echo $now;
	//$tm = localtime($now, TRUE);
	//day_of_week = $tm['tm_wday'];
	$day_of_week = $now -1;
	
	//$day_of_week = date('N', strtotime('Monday'));
	
	$bias = get_post_meta($postID, 'city_timezone_0_stdbiassecvalue', true);

	settype ($bias, "integer");

	$bias = $bias * 1000;
	
	
	$currencySymbol = get_post_meta($postID, 'city_exchangerates_1_currencysymbol', true);
	
	//$todaysForcastString = 'forecast_'.$day_of_week.'_daymax';
	$todaysForcastString = 'forecast_0_daymax';
	
	$forecast = get_post_meta($postID, $todaysForcastString, true);
	//echo $count;
	//print_r(get_field('daymax'));
	
	//$overheadGreyicon_string  = 'forecast_'.$day_of_week.'_overhead_icon';
	$overheadGreyicon_string  = 'forecast_0_overhead_icon';
	
    $overheadGreyicon         = get_post_meta($postID,$overheadGreyicon_string,true);
	$greyWithoutExt = preg_replace('/\\.[^.\\s]{3,4}$/', '', $overheadGreyicon);
	
	?>
	<div class="weather_time">
        <div class="container">
            <div class="row">
                <?php
				//if($forecastArray[1]!=''){?>
			 <?php /* 	<div class="col-md-4 area weather">
                    <div class="wdata">
                        <p><?php echo $title;?> Weather</p>
						            <div class='weatherGreyIcon <?php echo $greyWithoutExt;?>'></div>
                        <p class="number">
                            <span><?php echo $forecast;?>°C</span>
                        </p>
                    </div>
                </div>
        */ ?>
				
                <div class="col-md-4 area weather">
                    <div class="wdata">
                        <p>Local time <?php echo $title;?></p>
                        <p class="number"><span id="time"></span></p>
		
                    </div>
                </div>
				
				<div class="col-md-4 area currency-area">
                    <div class="wdata">
                        <p>Currency <?php //echo $title;?></p>
                        <p class="number"><span><?php echo $currencySymbol;?></span></p>
                    </div>
                </div>
            </div>

        </div>
    </div>
	<?php
	date_default_timezone_set('Europe/London');
	$timeDaySecs = gettimeofday()['sec'];

	?>
	<script defer>
		
		function updateTime() {
			
			var debug = true;
			var timeNow = moment().format();
			var timeInLondon = moment().tz("Europe/London").format('X');
			//var test = timeInLondon.substring(0, timeInLondon.length - 3);
			var id = '<?php echo $postID;?>';
			var epoch = timeInLondon;
			//var bias = '<?php echo get_post_meta($postID,'city_timezone_0_dstbiasvalue',true);?>';
			var bias = '<?php echo get_post_meta($postID,'city_timezone_0_stdbiassecvalue',true);?>';
			var dst = '<?php echo get_post_meta($postID,'dstbiassecsvalue',true);?>';
			varstartdst = '<?php echo get_post_meta($postID,'city_timezone_0_thisyearutcstartvalue',true);?>';
			varenddst = '<?php echo get_post_meta($postID,'city_timezone_0_thisyearutcendvalue',true);?>';
			<?php
			
								$start = get_post_meta($postID,'city_timezone_0_thisyearutcstartvalue',true);
								$starts = substr($start, 0, 10);
								$end = substr(get_post_meta($postID,'city_timezone_0_thisyearutcendvalue',true),0,10);
								//echo '<br />DST standard Sec bias value '.get_post_meta($pID,$ctz13,$true);
								//echo '<br />This year UTC start value'.$starts;
								//echo '<br />This year UTC end value'.$end;
								$date = date('Y-m-d');
								//echo 'current date is'.$date;
								if ($date > $starts && $date < $end)
									{echo 'bias = dst;';
								}
								else
								{
									echo 'bias = bias;';
								}
			
			?>

			if(!bias){
				localTime = epoch;
				
			} else {
				if(bias.startsWith('-')){
				
						nbias = parseInt(bias.slice( 1 ));
						var localTime = Number(epoch)-Number(nbias);
						//console.log('negative bias total: '+localTime);
	
				} else {
						var localTime = Number(epoch)+Number(bias); // apply GMT standard bias for region to GMT. how do you add negative millisecconds?
						//console.log('positive bias total: '+localTime);
				}
			}
			
			var timeThere = Number(localTime);
			var timeHere = Number(epoch);
			
			var hereHours = Math.floor(timeHere/60/60);
			var	hereMins = Math.floor((timeHere - hereHours * 60 * 60) / 60);
				hereOutput = hereHours%24+":"+hereMins;
				
			var	thereHours = Math.floor(timeThere/60/60);
			var	thereMins = Math.floor((timeThere - thereHours * 60 * 60) / 60);
				tMins = thereMins;
				if(thereMins < 10){
					tMins = '0'+thereMins;
				}
				thereOutput = thereHours%24+":"+tMins;
				
				document.getElementById('time').innerHTML= thereOutput;

			if (debug){
				console.log('ID: '+id);
				console.log('Time in London:'+timeInLondon);
				console.log('UnixTime: '+epoch);
				console.log('Bias: '+bias);
				console.log('There Epoch: '+timeThere);
				console.log('here hours: '+ hereHours);
						console.log('here mins: '+ hereMins);
				console.log('there hours: '+ thereHours);
						console.log('there mins: '+ tMins);
				console.log('here Time: '+ hereOutput);
				console.log('there Time: '+ thereOutput);
			}
		}
		
		jQuery(document).ready(function(){
			setTimeout("updateTime()",60000);	
			updateTime();
		});
	</script>
	<?php
}

function wtg_city_tiquet($postID)
{
	$title = get_the_title(); ?>
		<div class="tiquet container" style="margin-bottom:30px"><?php echo do_shortcode('[tiqet-discovery name="'.$title.'"]') ?></div>
	<?php 
}

function wtg_guide_left($postID, $type)
{
	$language = get_field ('language','options');
	wtg_guide_menu($postID, $type);
	
	if($type == 'airport'){
		$host = get_site_url().'/client-assets/';
		$mapPath = get_post_meta($postID, 'airport_map_filepath', true);
		//echo '<h1 style="display:none">'.$mapPath.'</h1>';
		$truePath = str_replace('sites/default/files/','design/airport-maps/',$mapPath);
		//		echo '<h1 style="display:none"> truepath is '.$truePath.'</h1>';
		$removefilenumbersArray = explode(')',$truePath);
		$mapString = $host.$removefilenumbersArray[0].').png';
		//$mapString = $host.$mapPath;
		$mapThumbPath = get_post_meta($postID, 'airport_map_thumbnail_filepath', true);
		$thumbString = $host.$mapThumbPath;
		
		if(empty(get_field('airport_map'))){
			if (!empty($mapPath))
			echo "<div class='guide-map'><h3>Map</h3><a href='$mapString'><img style='height:250px; width:300px;' src='$mapString' /></a></div><div></div>";
		}
		else 
		{
			$mapString = get_field('airport_map');
			if (!empty($mapString)){echo "<div class='guide-map'><h3>Map</h3><a href='$mapString'><img style='height:250px; width:300px;' src='$mapString' /></a></div><div></div>";}
		}
	}
	if ($type == 'region'|| $type == 'city'){ wtg_region_places($postID);}
	//wtg_guides_sidebar_widgets();
	//echo do_shortcode('[fd-link]');
	//echo do_shortcode('[hotel-link]');
	?>
    
    
    <div id="google-desktop-ads" class="hidden-xs">
		<?php wtg_sidebar_google_ads(); ?>
	</div>
	
	<?php
	
	//echo '<img alt="advertisement" src="http://dummyimage.com/300x250/909090/fff" class="img-responsive element-center mobile_hide">';
}



function wtg_pagecontent()
{
    $postid = get_the_ID();
    $thePage = get_post($postid); 
    echo '<section class="section-page-content">';
	echo '<div class="container box_list articles  last">';
        echo '<div class="row">';
            echo '<h1><i class="icon icon_1"></i>'.get_the_title ($postid).'</h1>';
		echo '</div>';
        echo '<div class="row box_item">';
		
            echo apply_filters('the_content',$thePage->post_content);
            echo '<br/>';
			echo '<br/>';
			
            //var_dump($thePage);
		echo '</div>';
    echo '</div>';
    echo '</section>';
    
}

function wtg_listing_content()
{
	
	//echo 'We are looking at a listing of type'.get_the_ID(); ?>
	<!-- The initMap script -->
	<script>
		function initMap()
		{
			var listing = {lat: <?php echo get_field('listing_latitude', $postID); ?>, lng:   <?php echo get_field('listing_longitude', $postID); ?>}
			var map = new google.maps.Map ( document.getElementById('map'), { zoom: 15, center: listing,});
			var marker = new google.maps.Marker({position: listing, map: map,});
		}
	</script>
	<!-- Listing Maps -->

<?php
	$postID = get_the_ID();
	$features = '';
	if( have_rows('listing_features', $postID) )
	{
		// loop through the rows of data
	   while ( have_rows('listing_features') ) 
	   {
		   the_row();
   
		   // display a sub field value
			   $features = $features.'<li>'.get_sub_field('listing_feature').'</li>';
	   }
	}
	$images = '';
	$gallery = '';
	$certificates = '';
	if( have_rows('listing_gallery_images', $postID) )
	{
		while(have_rows('listing_gallery_images', $postID))
		{
			the_row();
			$images = $images.get_sub_field('listing_gallery_image').',';
		}
		$images = rtrim($images,",");
		$gallery = '[vc_gallery interval="0" images="'.$images.'" img_size="listingGallery"]';
	}

	if( have_rows('sustainability_certificates', $postID) )
	{
		while(have_rows('sustainability_certificates', $postID))
		{
			the_row();
			$certificate = get_sub_field('sustainability_certificate');
			$certificateImage = $certificateImage.'<img width="30%" style="margin-right:3%" src="'.$certificate.'">'; 
		}
	}
	echo get_the_title((get_post_meta($postID, 'region_parent', true)));
	echo get_post_meta($postID, 'region_parent', true);
	echo get_field('listing_airport');
	$videoURL = get_field('listing_video_url', $postID);
	$listingMainImage = get_field('listing_main_image', $postID);
	if ($videoURL) {$featuredSpot = '[vc_video link="'.$videoURL.'"]';} else {$featuredSpot = '<img src="'.$listingMainImage.'" width="100%" height="auto">';}
			$content ='
			<p style="padding-left:15px; padding-right:15px;">
				[vc_row gap="20" equal_height="yes"]
					[vc_column width="1/2"]'.$featuredSpot.'[/vc_column]
					[vc_column width="1/2"]
						[vc_row_inner]
							[vc_column_inner]'.$gallery.'[/vc_column_inner]
						[/vc_row_inner]
					[/vc_column]
				[/vc_row]
				
				[vc_row]
					[vc_column]
						[vc_custom_heading text="Welcome to " font_container="tag:h3|text_align:center" use_theme_fonts="yes"]
						[vc_column_text css=".vc_custom_1546602650635{padding-right: 50px !important;padding-left: 50px !important;}"]</p>
							<p style="text-align: center; font-size: 1.2em;">'.get_field('listing_introduction', $postID).'	</p>
						[/vc_column_text]
					[/vc_column]
				[/vc_row]
				
				[vc_row equal_height="yes"]
					[vc_column width="2/3"]
						[vc_custom_heading text="Hotel Description" font_container="tag:h3|text_align:left" use_theme_fonts="yes"]
						[vc_column_text]'.get_field('listing_main_content',$postID).'[/vc_column_text]
					[/vc_column]
					[vc_column width="1/3"]
						[vc_custom_heading text="Hotel Features" font_container="tag:h3|text_align:left" use_theme_fonts="yes"]
						[vc_column_text]
							<ul style="font-size: 16px;">'.$features.'
							</ul>
						[/vc_column_text]
					[/vc_column]
				[/vc_row]
				
				[vc_row css=".vc_custom_1546598072350{padding: 10px !important;background-color: #f4f4f4 !important; min-height:300px}"]
					[vc_column width="2/3"]
						[vc_custom_heading text="Location and Directions" font_container="tag:h3|text_align:left" use_theme_fonts="yes"]
						[vc_column_text]'.get_field('location_and_directions').'[/vc_column_text]
						[vc_row_inner]
							[vc_column_inner width="1/2"]
								[vc_column_text]'
									.get_field('listing_address_line_1',$postID).'<br />'
									.get_field('listing_address_line_2',$postID).'<br />'
									.get_field('listing_address_line_3',$postID).'<br />
											Tel: '.get_field('listing_telephone',$postID).'<br />
									Email: '.get_field('listing_email',$postID).'<br />
									Web: '.get_field('listing_website',$postID).'
								[/vc_column_text]
							[/vc_column_inner]
							[vc_column_inner width="1/2"]
								[vc_column_text]'.$certificateImage.'[/vc_column_text]
							[/vc_column_inner]
						[/vc_row_inner]
					[/vc_column]
					[vc_column width="1/3"]
					[vc_column_text] <div id="map" style="width:95%; height:300px"></div>

					[/vc_column_text]
					[/vc_column]
				[/vc_row]
			[vc_row]
		[vc_column]
		</p>';
			
			echo '<section class="section-page-content" style="padding-left:15px; padding-right:15px">';
			echo '<div class="container box_list articles  last">';
				echo '<div class="row">';
					echo '<h1><i class="icon icon_1"></i>'.get_field('listing_title', $postID).'</h1>';
				echo '</div>';
				echo '<div class="row box_item">';

				$authorID = get_the_author_meta( 'ID' );
				$currentUser = get_current_user_id();

				if (($authorID == $currentUser) ||  current_user_can('administrator'))
				{
					echo '<h1> Edit Listing </h1>';
					acf_form();
					echo '<h1> Listing Preview </h1>';
				}


				echo do_shortcode ($content);

            //echo apply_filters('the_content',$thePage->post_content);
            echo '<br/>';
			echo '<br/>';
			
            //var_dump($thePage);
		echo '</div>';
    echo '</div>';
    echo '</section>';
}

function wtg_bakerycontent()
{
    $postid = get_the_ID();
    $thePage = get_post($postid); 
    echo '<section class="section-page-content">';
	echo '<div class="container box_list articles  last">';
        echo '<div class="row">';
            // echo '<h2><i class="icon icon_1"></i>'.get_the_title($postid).'</h2>';
		echo '</div>';
        echo '<div class="row">';
		
            echo apply_filters('the_content',$thePage->post_content);			
            //var_dump($thePage);
		echo '</div>';
    echo '</div>';
    echo '</section>';
    
}


function wtg_footer_desktop()
{
	?>
	<!-- Footer Desktop-->
    <footer class="" itemscope itemtype="https://schema.org/WPFooter">
        <div class="container">
            <div class="row advertisment">
                <div id="div-gpt-ad-1492512001379-8" class="col-md-12 advert hidden-xs">
					<script defer>
						googletag.cmd.push(function() { googletag.display('div-gpt-ad-1492512001379-8'); });
					</script>
                </div>
            </div>
            <div class="row">
				<?php dynamic_sidebar('footer-top'); ?>
            </div>

            <div class="row">
                <div class="col-md-4 col-sm-5">
                    <?php dynamic_sidebar('footer-bottom-left'); ?>
                </div>
                <div class="col-md-8 col-sm-7 logos">
                    <?php dynamic_sidebar('footer-bottom-right'); ?>
                </div>
            </div>

        </div>

    </footer>
	<?php
}


function wtg_footer_copyright()
{
	?>
	<!-- Copyright -->
    <div class="copyright">

        <div class="container">
            <div class="row">
                <div class="col-md-6 col-sm-6 col-md-push-6 col-sm-push-6">
                    <ul>
                        <li>
                            <a href="https://en-gb.facebook.com/WTGTravelGuide/">
                                <div class="footer-fb-icon"></div>
                            </a>
                        </li>
                        <li>
                            <a href="https://twitter.com/WTGTravelGuide">
                                <div class="footer-twitter-icon"></div>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <div class="footer-googleplus-icon"></div>
                            </a>
                        </li>
                        <li>
                            <a href="https://www.pinterest.com/wtgtravelguide/">
                                <div class="footer-pinterest-icon"></div>
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="col-md-6 col-sm-6 col-md-pull-6 col-sm-pull-6">
                    <p>© Columbus Travel Media Ltd. All rights reserved <?php echo date("Y"); ?></p>
                </div>
            </div>
        </div>

    </div>
	<?php
}

function wtg_touristoffices($postID)
{
    ?><h2>Tourist offices</h2><?php
	$tourist_passes = get_post_meta($postID, 'city_tourist_passes', true);
    $index = 0;
    if ( have_rows('city_tourist_information_centres', $postID)):
        while (have_rows('city_tourist_information_centres', $postID)) :the_row();
            $name = get_sub_field('tourist_centre_name',$postID);
            
            //$body = get_sub_field('tourist_centre_body');
            $postcode = get_sub_field('postcode');
			
			$body_string = 'city_tourist_information_centres_'.$index.'_toursit_centre_body';
            $body       = get_post_meta($postID, $body_string, true);
			
			
            $website_string = 'city_tourist_information_centres_'.$index.'_toursit_centre_website';
            $website       = get_post_meta($postID, $website_string, true);
            $website_tidy = str_replace('http://','',$website);
			
            $tele_string = 'city_tourist_information_centres_'.$index.'_toursit_centre_telephone';
            $tele       = get_post_meta($postID, $tele_string, true);
			
			$opening_string = 'city_tourist_information_centres_'.$index.'_toursit_centre_opening_times';
            $opening       = get_post_meta($postID, $opening_string, true);

            $thoroughfare_string = 'city_tourist_information_centres_'.$index.'_tourist_centre_thoroughfare';
            $toa1      = get_post_meta($postID, $thoroughfare_string, true).', ';
            if(!empty($toa1)){
                $toa1t = $toa1; 
            }
            
            $neighborhood_string = 'city_tourist_information_centres_'.$index.'_tourist_centre_neighborhood';
            $toa2      = get_post_meta($postID, $neighborhood_string, true);
            
            $locality_string = 'city_tourist_information_centres_'.$index.'_tourist_centre_locality';
            $toa3      = get_post_meta($postID, $locality_string, true);
            
            $country_string = 'city_tourist_information_centres_'.$index.'_tourist_centre_country';
            $toa4     = get_post_meta($postID, $country_string, true);
			
			$address = $toa1t.$toa2.', '.$toa3.', '.$toa4;
			
            if(!empty($name)){
				echo '<h4>'.$name.'</h4>';
				
				echo'<b>Address:</b>  '.$postcode.'<br/>';
				 echo'<b>Tel:</b>  '.$tele.'<br/>';
				echo'<b>Opening Hours:</b>  '.$opening;
				echo'<b>Website:</b>  <a href="'.$website.'">'.$website_tidy.'</a><br/>';
				echo $body.'<br/>';
			}
            $index++;
            
            
        endwhile;
    endif;
	if(!empty($tourist_passes)){?>
		<h3>Tourist Passes</h3><?php
		echo $tourist_passes;
	}
}

function wtg_get_child_array($parent_id)
{
    $wchildren = array();
    // grab the posts children
    $posts = get_posts(
				array(
					  'numberposts' => -1,
					  'post_status' => 'publish',
					  'post_type' => 'guides',
					  'post_parent' => $parent_id,
					  'suppress_filters' => false,
					  'orderby'          => 'title',
					  'order'            => 'DESC',
	
				  ));
	
    // now grab the grand children
    foreach( $posts as $wchild ){
        // recursion!! hurrah
        $gchildren = wtg_get_child_array($wchild->ID);
        // merge the grand children into the children array
        if( !empty($gchildren) ) {
            $wchildren = array_merge($wchildren, $gchildren);
        }
    }
    // merge in the direct descendants we found earlier
    $wchildren = array_merge($wchildren,$posts);
    
    return $wchildren;
}



function wtg_return_cities($postid)
{
	$children = wtg_get_child_array($postid);
	$cityIDs = array();
	foreach ($children as $child){
		$childTerms = get_the_terms($child->ID,'wtg_guide_type');
		
		foreach($childTerms as $childTerm){
			if($childTerm->slug == 'city'){
				
				array_push($cityIDs,$child->ID);
			}
		}
	}
	if(!empty($cityIDs)){
		$title = get_the_title($postid);
		echo '<li class="country_title">'.$title.'</li>';
		foreach($cityIDs as $cityID){
				echo '<li><a href="'.get_permalink($cityID).'" class="active">'.get_the_title($cityID).'</a></li>';
		}
	}
	//wp_reset_query();
}

function wtg_return_beaches($postid)
{
	$children = wtg_get_child_array($postid);
	$cityIDs = array();
	foreach ($children as $child){
		$childTerms = get_the_terms($child->ID,'wtg_guide_type');
		foreach($childTerms as $childTerm){
			if($childTerm->slug == 'beach-resort'){
				array_push($cityIDs,$child->ID);
			}
		}
	}
	if(!empty($cityIDs)){
		$title = get_the_title($postid);
		echo '<li class="country_title">'.$title.'</li>';
		foreach($cityIDs as $cityID){
				echo '<li><a href="'.get_permalink($cityID).'" class="active">'.get_the_title($cityID).'</a></li>';
		}
	}
}

function wtg_return_ski($postid)
{
	$children = wtg_get_child_array($postid);
	$cityIDs = array();
	foreach ($children as $child){
		$childTerms = get_the_terms($child->ID,'wtg_guide_type');
		foreach($childTerms as $childTerm){
			if($childTerm->slug == 'ski-resort'){
				array_push($cityIDs,$child->ID);
			}
		}
	}
	if(!empty($cityIDs)){
		$title = get_the_title($postid);
		echo '<li class="country_title">'.$title.'</li>';
		foreach($cityIDs as $cityID){
				echo '<li><a href="'.get_permalink($cityID).'" class="active">'.get_the_title($cityID).'</a></li>';
		}
	}
}

function wtg_return_cruise($postid)
{
	$children = wtg_get_child_array($postid);
	$cityIDs = array();
	foreach ($children as $child){
		$childTerms = get_the_terms($child->ID,'wtg_guide_type');
		foreach($childTerms as $childTerm){
			if($childTerm->slug == 'cruise'){
				array_push($cityIDs,$child->ID);
			}
		}
	}
	if(!empty($cityIDs)){
		$title = get_the_title($postid);
		echo '<li class="country_title">'.$title.'</li>';
		foreach($cityIDs as $cityID){
				echo '<li><a href="'.get_permalink($cityID).'" class="active">'.get_the_title($cityID).'</a></li>';
		}
	}
}

function wtg_return_airport($postid)
{
	$children = wtg_get_child_array($postid);
	$cityIDs = array();
	foreach ($children as $child){
		$childTerms = get_the_terms($child->ID,'wtg_guide_type');
		foreach($childTerms as $childTerm){
			if($childTerm->slug == 'airport'){
				array_push($cityIDs,$child->ID);
			}
		}
	}
	if(!empty($cityIDs)){
		$title = get_the_title($postid);
		echo '<li class="country_title">'.$title.'</li>';
		foreach($cityIDs as $cityID){
				echo '<li><a href="'.get_permalink($cityID).'" class="active">'.get_the_title($cityID).'</a></li>';
		}
	}
}

function wtg_404_content()
{
	$postid = get_the_ID();
    $thePage = get_post($postid);
?>
    <section class="post error404 not-found section-page-content">
		<div class="container box_list articles  last">
			<div class="row">
				<h1><i class="icon icon_1"></i><?php _e('Not Found', 'blankslate'); ?></h1>
			</div>
			<div class="container box_list articles  last">
				<div class="row box_item">
					<p><?php _e('Nothing found for the requested page. Try a search instead?', 'blankslate'); ?></p>
					<?php get_search_form(); ?>
				</div>
			</div>
		</div>
    </section>
<?php
}

function wtg_book_content()
{
	$postid = get_the_ID();
    $thePage = get_post($postid); 
    echo '<section class="section-page-content">';
	echo '<div class="container box_list articles  last">';
        echo '<div class="row">';
            echo '<h1><i class="icon icon_1"></i>'.get_the_title($postid).'</h1>';
		echo '</div>';
        echo '<div class="row box_item">';
            //the_content();
            echo apply_filters('the_content',$thePage->post_content);
            echo '<br/>';
			echo '<br/>';
			
            //var_dump($thePage);
		echo '</div>';
    echo '</div>';
    echo '</section>';
}


function wtg_skyscanner_tools()
{

	echo '
	<script src="https://widgets.skyscanner.net/widget-server/js/loader.js" async></script>
	<style> .skyscanner-widget, #skyscanner-input { padding:20px } input {padding-left:10px;}</style>

	<form id="skyscanner-input" action="#" method="post">
		Flying From: <input type="text" name="origin" id="origin" placeholder = "Flying From" value="'.$_POST['origin'].'"/>
		Flying To: <input type="text" name="destination" placeholder="Flying to" id="destination" value="'.$_POST['destination'].'"/>
		<input type="submit">
	</form>';


	echo '


	<div class="row skyscanner-widget">
		<div class="skyscanner-widget col-md-4 col-sm-6 col-xs-12"
	  		data-skyscanner-widget="InsiderTipsWidget"
  			data-tip-type="month_price"
  			data-origin-name="\''.$_POST['origin'].'\'"
  			data-destination-name="\''.$_POST['destination'].'\'">
		</div>
		<div class="skyscanner-widget col-md-4 col-sm-6 col-xs-12"
  			data-skyscanner-widget="InsiderTipsWidget"
  			data-tip-type="day_price"
  			data-origin-name="\''.$_POST['origin'].'\'"
  			data-destination-name="\''.$_POST['destination'].'\'">
		</div>
		<div class="skyscanner-widget col-md-4 col-sm-6 col-xs-12"
  			data-skyscanner-widget="InsiderTipsWidget"
  			data-tip-type="leadtime"
  			data-origin-name="\''.$_POST['origin'].'\'"
			data-destination-name="\''.$_POST['destination'].'\'">
		</div>
		<div class="skyscanner-widget col-md-4 col-sm-6 col-xs-12"
  			data-skyscanner-widget="InsiderTipsWidget"
  			data-tip-type="day_popularity"
  			data-origin-name="\''.$_POST['origin'].'\'"
  			data-destination-name="\''.$_POST['destination'].'\'">
		</div>
		<div class="skyscanner-widget col-md-6 col-sm-6 col-xs-12"
			data-skyscanner-widget="InsiderTipsWidget"
			data-tip-type="indicative_price"
			data-origin-name="\''.$_POST['origin'].'\'"
			data-destination-name="\''.$_POST['destination'].'\'">
	  	</div>
	</div>';

}

function wtg_just_premium()
{
	?>
	<!-- /4971404/JustPremiumUK -->
<div id='div-gpt-ad-1494347126401-0' style='height:1px; width:1px;'>
<script defer> googletag.cmd.push(function() { googletag.display('div-gpt-ad-1494347126401-0'); }); </script>
</div>

<script defer type="text/javascript">
window._taboola = window._taboola || [];
_taboola.push({flush: true});
_taboola.push({flush: true});
</script>

	<?php
}

function wtg_display_existing_listings($userID)	
{			
	global $post;
	$args = array ('post_type' => array('hotel', 'attraction', 'restaurant'), 'author' =>$userID, 'post_status'=>'any');
	$listings = new WP_Query($args);
	if ($listings->have_posts())
	{
		echo '
		<div class="row" style="margin-left:0px; margin-right:0px;">
		<div class="col-sm-12"><h2 style="text-align:left">Existing Listings</h2></div>
		<div class="col-sm-4"><h3>Reference</h3></div>
		<div class="col-sm-2 hidden-xs"><h3>Price</h3></div>
		<div class="col-sm-2 hidden-xs"><h3>Display</h3></div>
		<div class="col-sm-2 hidden-xs"><h3>Type</h3></div>
		<div class="col-sm-2 hidden-xs"><h3>Status</h3></div>
		</div>
		';
		while ($listings->have_posts())
		{
			$listings->the_post();
			$priceTerms = get_the_terms (get_the_ID(), 'wtg_listing_price');
			foreach ($priceTerms as $priceTerm) {$price = $priceTerm->name;};
			$displayTypeTerms = get_the_terms (get_the_ID(), 'wtg_listing_type');
			foreach ($displayTypeTerms as $displayTypeTerm) {$displayType = $displayTypeTerm->name;};

			echo '
			<div class="row" style="margin-left:0px; margin-right:0px;">
			<div class="col-sm-4"><a style="font-size:13px" href="'.get_the_permalink().'">'.get_the_title().'</a></div>
			<div class="col-sm-2 hidden-xs">'.$price.'</div>
			<div class="col-sm-2 hidden-xs">'.$displayType.'</div>
			<div class="col-sm-2 hidden-xs">'.strtoupper($post->post_type).'</div>
			<div class="col-sm-2 hidden-xs">'.strtoupper($post->post_status).'</div>
			</div>
			';
		}
	}
}

function wtg_hotel_listings()
{
	global $post;
	
	$parentID = get_the_ID();

	$guideTerms = get_the_terms($parentID,'wtg_guide_type');
	$guideType = $guideTerms[0]->slug;
	$parentType = 'listing_city';
	if ($guideType == 'region') $parentType = 'listing_region';
	if ($guideType == 'airport') $parentType = 'listing_airport';
	$postType = 'hotel';
	$postCount = 6;
	//echo 'The parent type is '.$parentType.'  the parent ID is '.$parentID;
	$hotelListings = wtg_get_listings('hotel', $parentType, $parentID, $postCount);
	$restaurantListings = wtg_get_listings('restaurant', $parentType, $parentID, $postCount);
	$attractionListings = wtg_get_listings('attraction', $parentType, $parentID, $postCount);
	$nightlifeListings = wtg_get_listings('nightlife', $parentType, $parentID, $postCount);

	if ($hotelListings)
	{
		echo '
		<div class="container box_list">
			<div class="row">
				<h1><i class="icon icon_1"></i>Featured Hotels</h1>';
//				<a href="'.get_site_url().'/listing-summary-page/?location='.$parentID.'&type=Hotel" class="seemore">SEE MORE</a>				
echo '
			<a href="'.get_permalink($parentID).'hotel-listings" target="_blank" class="seemore">SEE MORE</a>
	</div>
			<div class="row box_item" style="margin-left:0px; margin-right:0px;">'.$hotelListings.'</div>
		</div>';
	}

	if ($restaurantListings)
	{
		echo '
		<div class="container box_list">
			<div class="row">
				<h1><i class="icon icon_1"></i>Featured Restaurants</h1>';
//				<a href="'.get_site_url().'/listing-summary-page/?location='.$parentID.'&type=Restaurant" class="seemore">SEE MORE</a>				
echo '
			<a href="'.get_permalink($parentID).'restaurant-listings" class="seemore">SEE MORE</a>
	</div>
			<div class="row box_item" style="margin-left:0px; margin-right:0px;">'.$restaurantListings.'</div>
		</div>';
	}

	if ($attractionListings)
	{
		echo '
		<div class="container box_list">
			<div class="row">
				<h1><i class="icon icon_1"></i>Featured Attractions</h1>';
//				<a href="'.get_site_url().'/listing-summary-page/?location='.$parentID.'&type=Attraction" class="seemore">SEE MORE</a>				
echo '
			<a href="'.get_permalink($parentID).'attraction-listings" class="seemore">SEE MORE</a>
			</div>
			<div class="row box_item" style="margin-left:0px; margin-right:0px;">'.$attractionListings.'</div>
		</div>';
	}

	if ($nightlifeListings)
	{
		echo '
		<div class="container box_list">
			<div class="row">
				<h1><i class="icon icon_1"></i>Featured Attractions</h1>';
//				<a href="'.get_site_url().'/listing-summary-page/?location='.$parentID.'&type=Attraction" class="seemore">SEE MORE</a>				
echo '
			<a href="'.get_permalink($parentID).'nightlife-listings" class="seemore">SEE MORE</a>
		</div>
			<div class="row box_item">'.$nightlifeListings.'</div>
		</div>';
	}

}

function wtg_get_listings($postType, $parentType, $postID, $postCount)
{
	global $post;
	//echo 'Post type '.$postType.' parent type '.$parentType.' post ID '.$postID,' count '.$postCount;
	$args = array 
	(
		'post_type' => $postType,
		'posts_per_page' => 9, 
		/*'meta_key' => $parentType,
		'meta_value' => $postID, */
		'meta_query' => array(
			'relation' => 'OR',
			array(
				'key' => $parentType,
				'value' =>$postID,
				'compare' => '='
			),
	
			array(
				'key' => 'region_parent',
				'value' => $postID,
				'compare' => '='
			)
			),
		'tax_query' => array(
			array(
				'taxonomy' => 'wtg_listing_type',
				'field'    => 'slug',
				'terms'    => 'featured',
			),
		),		 
	);

	$listingFeatured = new WP_Query($args);
	//echo 'listing count '.$ListingFeatured->post_count;
	//echo $postType;
	//echo 'Parent '.$postID;
	//echo 'Parent Type'.$parentType;

	if ( $listingFeatured->post_count < $postCount)
	{
	$postCount = 6 - $listingFeatured->post_count;
	$args = array 
	(
		'post_type' => $postType,
		'posts_per_page' => $postCount, 
		/*'meta_key' => $parentType,
		'meta_value' => $postID,*/
		'meta_query' => array(
			'relation' => 'OR',
			array(
				'key' => $parentType,
				'value' =>$postID,
				'compare' => '='
			),
	
			array(
				'key' => 'region_parent',
				'value' => $postID,
				'compare' => '='
			)
			),
		'tax_query' => array(
			array(
				'taxonomy' => 'wtg_listing_type',
				'field'    => 'slug',
				'terms'    => 'regular',
			),
		),		 
	);

	$listingStandard = new WP_Query($args);

	$listingFeatured->posts = array_merge ($listingFeatured->posts, $listingStandard->posts);
	$listingFeatured->post_count = count($listingFeatured->posts);
	}

	if ($listingFeatured->have_posts())
	{
			$newRow = true;

			while ($listingFeatured->have_posts())
			{
				$newRow = '';
				if ($countRow == 0) {$newRow =  '	<div class="row box_item">'; }
				$countRow++;
				$listingFeatured->the_post();
				$img = get_field('listing_main_image', $post->ID);
				//if (!$img) $img = get_template_directory_uri().'/images/hotel.png';
				if (!$img) $img = get_template_directory_uri().'/listingImages/i'.$post->ID.'.png';
				$terms = wp_get_post_terms( $query->post->ID, 'listing_type'  );
				foreach ($terms as $term)
				{
					$name = $term->name;
				}
				$permalink = get_permalink($postID).'hotel-listings';
				if ($name == 'Featured') $permalink = get_the_permalink($post->ID);
			$html .= $newRow.'

				<div class="col-sm-4 col-lg-4 col-md-4">
					<div class="listingImage">
					<a href="'.$permalink.'"><div style="width:100%; height:100%; background-position:center; background-size:cover; background-repeat:no-repeat; background-image:url(\''.$img.'\')"></div></a>
					</div>
					<div class="caption">
						<h4><a href="'.$permalink.'">'.get_field('listing_title',$post->ID).'</a></h4>
						<p>'.substr(get_field('listing_introduction', $post->ID), 0, 999).'</p>
					</div>
				</div>';
				if ($countRow == 3) {$html .='</div>'; $countRow = 0 ;};
			};
			if ($countRow > 0) $html .='</div>';
			return $html;
	}
	else
	{
			return false;
	}
}

function db_update($elements)
{
foreach ($elements as $element) 
{
    $title = $element->getAttribute('title');
    $nid = $element->getAttribute('nid');            
    echo "Title: ".$title." | nid: ".$nid."\n";
    $match = get_page_by_title($title, OBJECT, 'guides');
    echo $match->ID;
    $wpID = $match->ID;
    $city_Doc = new DOMDocument();
    $cloned = $element->cloneNode(TRUE);
    $city_Doc->appendChild($city_Doc->importNode($cloned, True));
    $citypath = new DOMXPath($city_Doc);
    $content_tag = $citypath->query("//Content/Overview/Overview");
    $content = trim($content_tag->item(0)->nodeValue);
    $trimmedExcerpt = substr($content, 0, 319);
    $endOfString = strrpos ( $trimmedExcerpt, '.', 0 );
    $endOfStringsemi = strrpos ( $trimmedExcerpt, ';', 0 );
    if ($endOfStringsemi > $endOfString) {$endOfString = $endOfStringsemi; }
    $trimmedExcerpt = substr($trimmedExcerpt, 0, $endOfString+1);
    $trimmedExcerpt = strip_tags ($trimmedExcerpt);      
    $my_post = array( 'ID' => $wpID, 'post_excerpt' => $trimmedExcerpt,);
    wp_update_post( $my_post, true );
    if (is_wp_error($wpID)) 
    { 
        $errors = $wpID->get_error_messages(); 
        foreach ($errors as $error) { echo $error; }; 
    }
    else
    {
        echo "\n $title updated ".$WPID;
    }
    
}
}

function save_listing_parent($id)
{
   /* if($post->post_type != 'hotel' && $post->post_type != 'restaurant' && $post->post_type != 'attraction' ) {
        return;
	} */
	$pParentID = 0;
	if (get_field('show_on_region', $id)) 
	{
		 
/*		$pParentID = wp_get_post_parent_id( $id );
		$termsParent = get_the_terms($pParentID, 'wtg_guide_type');
		foreach ($termsParent as $termParent) {$termParentSlug = $termParent->slug;}
		if ($termParentSlug == 'city') { $pParentID = wp_get_post_parent_id( $pParentID ); }; */
		if (get_field('listing_city')) {$pParentID = wp_get_post_parent_id( get_field('listing_city') ); $number = $pParentID; }
		if (get_field('listing_airport', $id)) 
		{
			
			$pParentID = wp_get_post_parent_id( get_field('listing_airport') );
			$termsParent = get_the_terms($pParentID, 'wtg_guide_type');
			foreach ($termsParent as $termParent) {$termParentSlug = $termParent->slug;}
			if ($termParentSlug == 'city') { $pParentID = wp_get_post_parent_id( $pParentID ); };
			$number = $pParentID;
			
		}
		else
		{
			$number = 2222;
		}

		
		update_post_meta($id, 'region_parent', $number);
	}
}
add_action('save_post', 'save_listing_parent');


function wtg_sekindo_skyscanner()
{
	?>
	<?php /* echo '
	<p class="places_area"><span>Browse our Video Guides</span></p>
	<div id="sekindo-video" style=" margin-top:10px; max-height:300px;">
		<!-- code from sekindo - NVU-Worldtravelguide - Worldtravelguide-NVU-Desktop -->
		<script type="text/javascript" language="javascript" src="https://live.sekindo.com/live/liveView.php?s=92825&cbuster=[CACHE_BUSTER]&pubUrl=[PAGE_URL_ENCODED]&x=300&y=300&vp_content=plembed5ddtwizprmno&vp_template=269"></script>
		<!-- code from sekindo -->
	</div>';
 */ ?>

	<p class="places_area"><span>Book your flights</span></p>
	<style>	.skyscanner-widget {padding: 10px; border-radius: 0px; width:100%; margin-bottom:10px} </style>
	<div data-skyscanner-widget="SearchWidget" data-associate-id="API_B2B_18713_00001" data-params="colour:#2a2466;fontColour:#FFF;buttonColour:#895396;buttonFontColour:#fff;" style="margin-bottom:10px"></div>
	<script defer src="https://widgets.skyscanner.net/widget-server/js/loader.js" async></script>

</div>
<?php
}

function wtg_sekindo()
{
/*	?>
	<p class="places_area" style="width:100%; display:block; margin-top:30px"><span>Browse our Video Guides</span></p>
	<div id="sekindo-video" style="margin-top:10px;">
		<!-- code from sekindo - NVU-Worldtravelguide - Worldtravelguide-NVU-Desktop 
		<script type="text/javascript" language="javascript" src="https://live.primis.tech/live/liveView.php?s=92825&cbuster=[CACHE_BUSTER]&pubUrl=[PAGE_URL_ENCODED]&x=300&y=300&vp_content=plembed5ddtwizprmno&vp_template=269"></script>
		code from sekindo -->
<!-- code from Primis - NVU-Worldtravelguide - Worldtravelguide-NVU-Guide_Pages -->
<script type="text/javascript" language="javascript" src="https://live.primis.tech/live/liveView.php?s=92825&cbuster=[CACHE_BUSTER]&pubUrl=[PAGE_URL_ENCODED]&vp_content=plembed5ddkwtoxgqmv&vp_template=269&subId=[SUBID_ENCODED]"></script>
<!-- code from Primis -->

	</div>

</div>
<?php
*/ }

function wtg_hotels_combined()
{
?>
	<p></p>
	<!--<script src="https://sbhc.portalhc.com/211201/searchbox/459421"></script> -->
<?php
}

function wtg_hotels_combined_mobile()
{?>
	<!-- <div id="hotels-combined-mobile" class="hidden-lg hidden-md hidden-sm">
	<script src="https://sbhc.portalhc.com/211201/searchbox/461947"></script> 
	</div> -->
<?php
}

function wtg_sidebar_google_ads()
{
	?>
			<div id='div-gpt-ad-1492512001379-3' style="margin-top:10px; margin-bottom:20px">
		<script defer>googletag.cmd.push(function() { googletag.display('div-gpt-ad-1492512001379-3'); });
		</script>
		</div>
		<br/>
		
		<div id='div-gpt-ad-1492512001379-9' style="margin-top:10px;">
		<script defer>googletag.cmd.push(function() { googletag.display('div-gpt-ad-1492512001379-9'); });
		</script>
		</div> 
		<div class="hidden-xs" style="width:80%">
		<?php //dynamic_sidebar('edad-widget'); ?>
		</div>

	<?php 
		

}

function wtg_stay22()
{
	$postid = get_the_ID();
	$guideTerms = get_the_terms($postid,'wtg_guide_type');
	$guideType = $guideTerms[0]->slug;
	if ($guideType == 'city')
	{
	$lat = get_field('latitude');
	$long = get_field('longitude');
	echo '
	<div class="stay22 box_list" style="width:90%; left:0; right:0; margin:auto; clear:both">
	<h2 style="text-align:center; padding-top:20px; padding-bottom:50px;"><i class="icon icon_1"></i>Book Accommodation</h2>
	
	<iframe src="https://www.stay22.com/embed/gm?aid=5f919c21daaed000175cb402&lat='.$lat.'&lng='.$long.'&maincolor=2a2466&navimage=https://www.worldtravelguide.net/wp-content/uploads/2020/11/WTG-Logo.jpg" id="stay22-widget" width="100%" height="500" frameborder="0"></iframe>
	</div>';
	}
	if ($guideType == 'region')
	{
		$title=get_the_title($postid);
	echo '
	<div class="stay22 box_list" style="width:90%; left:0; right:0; margin:auto; clear:both">
	<h2 style="text-align:center; padding-top:20px; padding-bottom:50px;"><i class="icon icon_1"></i>Book a Hotel</h2>
	<iframe src="https://www.stay22.com/embed/gm?aid=5f919c21daaed000175cb402&address='.$title.'&maincolor=2a2466&navimage=https://www.worldtravelguide.net/wp-content/uploads/2020/11/WTG-Logo.jpg" id="stay22-widget" width="100%" height="500" frameborder="0"></iframe>
	</div>';
	}
	
}

function wtg_guide_MPU()
{
?>
        <style> .inline-ad iframe {max-width:95%} .inline-add {overflow:hidden; padding-left:0px} </style> 
        <div id='div-gpt-ad-1492512001379-6' style="padding-top:35px; padding-bottom:30px;" class="col-md-6 inline-ad">
		<script defer> googletag.cmd.push(function() { googletag.display('div-gpt-ad-1492512001379-6'); }); </script>
		</div>
        <div style="padding-top:35px; max-height:310px; overflow:hidden" class="col-md-6">
        <?php dynamic_sidebar('edad-widget');?>
        </div>
<?php
}

function create_metadescription($section)
{
/* if( have_rows($section, 'option') ):

	// loop through the rows of data
	$count = -1;
	   while ( have_rows($section, 'option') ) : the_row();
		$count++;
		$titlePosition[$count] = get_sub_field('title_position', 'option');
//		echo '<h2>'.$titlePosition[$count].'</h2>';
		$preVariableWordsSentence[$count] = get_sub_field('pre_variable_words_sentence', 'option');
//		echo '<h2>'.$preVariableWordsSentence[$count].'</h2>';
		if (have_rows ('variable_words', 'option') ) :
			$countWords[$count] = -1;
			while (have_rows('variable_words', 'option')) : the_row();
				$countWords[$count]++;
//				echo '<br />the countwords are '.$countWords[$count]; 
				$variableWord[$count][$countWords[$count]] = get_sub_field('variable_word', 'option');
//				echo '<h3>'.$variableWord[$count][$countWords[$count]].'</h3>';
			endwhile;
		else :
			'Resetting variables';
			$countWords[$count] = 0;
			$variableWord[$count] = '';
		endif;
		$postVariableWordsSentence[$count] = get_sub_field('post_variable_words_sentence', 'option');
//		echo '<h2>'.$postVariableWordsSentence[$count].'</h2>';
	   endwhile;

else :
	
   endif;
//   echo '<br />The countwords are '.$countWords[$count];

$sentenceRand = mt_rand(0, $count);
//echo '<br />The sentence rand is '.$sentenceRand;
$wordRand = mt_rand(0, $countWords[$sentenceRand]);
//echo '<br />The word rand is '.$wordRand;
   if ($titlePosition[$sentenceRand] == 'Start')
   {
		$sentence = get_the_title().' '.$preVariableWordsSentence[$sentenceRand].' '.$variableWord[$sentenceRand][$wordRand].' '.$postVariableWordsSentence[$sentenceRand];
   }
   else
   {
	   $sentence = $preVariableWordsSentence[$sentenceRand].' '.$variableWord[$sentenceRand][$wordRand].' '.$postVariableWordsSentence[$sentenceRand].' '.get_the_title();
   }
  // echo '<h1>'.$sentence.'</h1>';
//$pageDescription = $descsOptions['region_history_lang_desc'];
return $sentence;
*/
}



?>
