<?php get_header(); ?>
<div class="container box_list articles  last">
	
	<?php if ( have_posts() ) : ?>
	<div class="row">
		<h2><i class="icon icon_6"></i><?php printf( __( 'Search Results for: "%s"', 'blankslate' ), '<span>' . get_search_query()  . '</span>' ); ?></h2>
	</div>
		<?php
		
		//$sIDs = array();
		$cityIDs = array();
		$countryIDs = array();
		$airportIDs = array();
		$beachIDs = array();
		$skiIDs = array();
		$cruiseIDs = array();
		$featuresIDs = array();
		
		while ( have_posts() ) : the_post();
			$sid = get_the_ID();
			//array_push($sIDs, $sid);
			$postType = get_post_type($sid);
			
			if($postType == 'features'){
				array_push($featuresIDs, $sid);
			} else {
				$guideTerms = get_the_terms($sid,'wtg_guide_type');
				$guideType = $guideTerms[0]->slug;
				switch($guideType){
					case 'city':
						array_push($cityIDs, $sid);
						break;
					case 'region':
						array_push($countryIDs, $sid);
						break;
					case 'airport':
						array_push($airportIDs, $sid);
						break;
					case 'beach-resort':
						array_push($beachIDs, $sid);
						break;
					case 'ski-resort':
						array_push($skiIDs, $sid);
						break;
					case 'cruise':
						array_push($cruiseIDs, $sid);
						break;
				}
			}
		endwhile;
		
		
		////////////////////////
		// City
		if($cityIDs[0] != ''){
			echo '<div class="container box_list">';
				echo '<div class="row"><h2><i class="icon icon_1"></i>Cities</h2><div>';
				$cityCount = 0;
				$guideTypeString = 'City';
				echo '<div class="row box_item">';
				foreach ($cityIDs as $cityID){
					if ($cityCount % 3 == 0){
						echo '</div>';
						echo '<div class="row box_item">';
					}
					$imageURL = '';
					$link = get_permalink($cityID);
					$title = get_the_title($cityID);
					$firstID = get_gallery_attachments($cityID,'home_carousel')[0];
					$imageURL = wp_get_attachment_image_src($firstID, 'large')[0];
					
					echo '<div class="col-sm-4 col-lg-4 col-md-4 mobile_full">
							<div class="group_elements">
								<a href="'.$link.'"><img src="'.$imageURL.'" alt="" class="img-responsive"></a>
								<h4><a href="'.$link.'">'.$title.'</a></h4>'.$guideTypeString.'
							</div>
						</div>';
		
					$count++;
					
				}
				echo '</div>';
			echo '</div>';
		}
		
		//////////////////////
		// Region
		if($countryIDs[0] != ''){
			echo '<div class="container box_list">';
				echo '<div class="row"><h2><i class="icon icon_1"></i>Country/ State/ Region</h2><div>';
				$countryCount = 0;
				$guideTypeString = 'Country/ State/ Region';
				echo '<div class="row box_item">';
				foreach ($countryIDs as $countryID){
					if ($countryCount % 3 == 0){
						echo '</div>';
						echo '<div class="row box_item">';
					}
					$imageURL = '';
					$link = get_permalink($countryID);
					$title = get_the_title($countryID);
					$firstID = get_gallery_attachments($countryID,'home_carousel')[0];
					$imageURL = wp_get_attachment_image_src($firstID, 'large')[0];
					
					echo '<div class="col-sm-4 col-lg-4 col-md-4 mobile_full">
							<div class="group_elements">
								<a href="'.$link.'"><img src="'.$imageURL.'" alt="" class="img-responsive"></a>
								<h4><a href="'.$link.'">'.$title.'</a></h4>'.$guideTypeString.'
							</div>
						</div>';
		
					$countryCount++;
					
				}
				echo '</div>';
			echo '</div>';
		}
		
		//////////////////////
		// Airport
		if($airportIDs[0] != ''){
			echo '<div class="container box_list">';
				echo '<div class="row"><h2><i class="icon icon_1"></i>Airports</h2><div>';
				$airportCount = 0;
				$guideTypeString = 'Airport';
				echo '<div class="row box_item">';
				foreach ($airportIDs as $airportID){
					if ($airportCount % 3 == 0){
						echo '</div>';
						echo '<div class="row box_item">';
					}
					$imageURL = '';
					$link = get_permalink($airportID);
					$title = get_the_title($airportID);
					$firstID = get_gallery_attachments($airportID,'home_carousel')[0];
					$imageURL = get_template_directory_uri().'/images/airports.jpg';
					
					echo '<div class="col-sm-4 col-lg-4 col-md-4 mobile_full">
							<div class="group_elements">
								<a href="'.$link.'"><img src="'.$imageURL.'" alt="" class="img-responsive"></a>
								<h4><a href="'.$link.'">'.$title.'</a></h4>'.$guideTypeString.'
							</div>
						</div>';
		
					$airportCount++;
					
				}
				echo '</div>';
			echo '</div>';
		}
		
		//////////////////////
		// Beaches
		if($beachIDs[0] != ''){
			echo '<div class="container box_list">';
				echo '<div class="row"><h2><i class="icon icon_1"></i>Beach Resorts</h2><div>';
				$beachCount = 0;
				$guideTypeString = 'Beach Resort';
				echo '<div class="row box_item">';
				foreach ($beachIDs as $beachID){
					if ($beachCount % 3 == 0){
						echo '</div>';
						echo '<div class="row box_item">';
					}
					$imageURL = '';
					$link = get_permalink($beachID);
					$title = get_the_title($beachID);
					$firstID = get_gallery_attachments($beachID,'home_carousel')[0];
					$imageURL = get_template_directory_uri().'/images/defaults/beach.jpg';
					
					echo '<div class="col-sm-4 col-lg-4 col-md-4 mobile_full">
							<div class="group_elements">
								<a href="'.$link.'"><img src="'.$imageURL.'" alt="" class="img-responsive"></a>
								<h4><a href="'.$link.'">'.$title.'</a></h4>'.$guideTypeString.'
							</div>
						</div>';
		
					$beachCount++;
					
				}
				echo '</div>';
			echo '</div>';
		}
		
		//////////////////////
		// Ski resorts
		if($skiIDs[0] != ''){
			echo '<div class="container box_list">';
				echo '<div class="row"><h2><i class="icon icon_1"></i>Ski resorts</h2><div>';
				$skiCount = 0;
				$guideTypeString = 'Ski Resort';
				echo '<div class="row box_item">';
				foreach ($skiIDs as $skiID){
					if ($skiCount % 3 == 0){
						echo '</div>';
						echo '<div class="row box_item">';
					}
					$imageURL = '';
					$link = get_permalink($skiID);
					$title = get_the_title($skiID);
					$firstID = get_gallery_attachments($skiID,'home_carousel')[0];
					$imageURL = get_template_directory_uri().'/images/defaults/ski.jpg';
					
					echo '<div class="col-sm-4 col-lg-4 col-md-4 mobile_full">
							<div class="group_elements">
								<a href="'.$link.'"><img src="'.$imageURL.'" alt="" class="img-responsive"></a>
								<h4><a href="'.$link.'">'.$title.'</a></h4>'.$guideTypeString.'
							</div>
						</div>';
		
					$skiCount++;
					
				}
				echo '</div>';
			echo '</div>';
		}
		
		//////////////////////
		// Cruise
		if($cruiseIDs[0] != ''){
			echo '<div class="container box_list">';
				echo '<div class="row"><h2><i class="icon icon_1"></i>Cruises</h2><div>';
				$cruiseCount = 0;
				$guideTypeString = 'Cruise';
				echo '<div class="row box_item">';
				foreach ($cruiseIDs as $cruiseID){
					if ($cruiseCount % 3 == 0){
						echo '</div>';
						echo '<div class="row box_item">';
					}
					$imageURL = '';
					$link = get_permalink($cruiseID);
					$title = get_the_title($cruiseID);
					$firstID = get_gallery_attachments($cruiseID,'home_carousel')[0];
					$imageURL = get_template_directory_uri().'/images/defaults/cruise.jpg';
					
					echo '<div class="col-sm-4 col-lg-4 col-md-4 mobile_full">
							<div class="group_elements">
								<a href="'.$link.'"><img src="'.$imageURL.'" alt="" class="img-responsive"></a>
								<h4><a href="'.$link.'">'.$title.'</a></h4>'.$guideTypeString.'
							</div>
						</div>';
		
					$cruiseCount++;
					
				}
				echo '</div>';
			echo '</div>';
		}
		
		//////////////////////
		// Features
		if($featuresIDs[0] != ''){
			echo '<div class="container box_list">';
				echo '<div class="row"><h2><i class="icon icon_1"></i>Features</h2><div>';
				$featureCount = 0;
				$guideTypeString = 'Feature';
				echo '<div class="row box_item">';
				foreach ($featuresIDs as $featuresID){
					if ($featureCount % 3 == 0){
						echo '</div>';
						echo '<div class="row box_item">';
					}
					$link = get_permalink($featuresID);
					$title = get_the_title($featuresID);
					$imageURL = wp_get_attachment_image_src(get_post_meta($featuresID, 'main_image', true),'large')[0];
					if (empty($imageURL)){
						$imageURL = get_template_directory_uri().'/images/features.jpg';
					}
					
					echo '<div class="col-sm-4 col-lg-4 col-md-4 mobile_full">
							<div class="group_elements">
								<a href="'.$link.'"><img src="'.$imageURL.'" alt="" class="img-responsive"></a>
								<h4><a href="'.$link.'">'.$title.'</a></h4>'.$guideTypeString.'
							</div>
						</div>';
		
					$featureCount++;
					
				}
				echo '</div>';
			echo '</div>';
		}
		
		
		
		/*
		$count = 0;
		echo '<div class="row box_item">';
		//sort($sIDs);
		foreach ($sIDs as $sID){
			
			if ($count % 3 == 0){
				echo '</div>';
				echo '<div class="row box_item">';
			}
			
			
			$imageURL = '';
			$link = get_permalink($sID);
			$title = get_the_title($sID);
			$postType = get_post_type($sID);
			$guideTerms = get_the_terms($sID,'wtg_guide_type');
			$guideType = $guideTerms[0]->slug;
			$guideTypeString = ucfirst($guideType);

			
			if($postType == 'features'){
				$imageURL = wp_get_attachment_image_src(get_post_meta($sID, 'main_image', true),'large')[0];
				if (empty($imageURL)){
					$imageURL = get_template_directory_uri().'/images/features.jpg';
					$guideType = 'Feature';
				}
				
			} else {
				$guideTerms = get_the_terms($sID,'wtg_guide_type');
				$guideType = $guideTerms[0]->slug;
				$firstID = get_gallery_attachments($sID,'home_carousel')[0];
				$imageURL = wp_get_attachment_image_src($firstID, 'large')[0];
				if (empty($imageURL)){
					switch($guideType){
						case 'airport':
							$imageURL = get_template_directory_uri().'/images/airports.jpg';
							break;
					}
				}
				switch($guideType){
					case 'region':
						$guideTypeString = 'Country/ State/ Region';
						break;
				}
			}

		
		
			echo '<div class="col-sm-4 col-lg-4 col-md-4 mobile_full">
					<div class="group_elements">
						<a href="'.$link.'"><img src="'.$imageURL.'" alt="" class="img-responsive"></a>
						<h4><a href="'.$link.'">'.$title.'</a></h4>'.ucfirst($guideTypeString).'
					</div>
				</div>';

			$count++;
		}
		echo '</div>';
			
			
		
				
		*/
	
	
	


?>





<?php //get_template_part( 'nav', 'above' ); ?>


<?php //get_template_part( 'nav', 'below' ); ?>
<?php else : ?>




<div id="post-0" class="post no-results not-found">
<h2 class="entry-title"><?php _e( 'Nothing Found', 'blankslate' ) ?></h2>
<div class="entry-content">
<p><?php _e( 'Sorry, nothing matched your search. Please try again.', 'blankslate' ); ?></p>
<?php get_search_form(); ?>
</div>
</div>







<?php endif; ?>

</div>


<?php get_footer(); ?>