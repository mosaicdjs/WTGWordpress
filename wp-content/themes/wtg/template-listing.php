<?php 
/*
* Template Name: Listing Creation Form
*/
get_header('listing');
global $wpdb;
$taxonomyPrice =  'wtg_listing_price';
$taxonomyType = 'wtg_listing_type';
$terms = get_terms('wtg_continent' );
$termsPrice = get_terms( array('taxonomy' => $taxonomyPrice, 'hide_empty' => false));
$termsType = get_terms( array('taxonomy' => $taxonomyType, 'hide_empty' => false));
$user = wp_get_current_user();
$userID = get_current_user_id();
$permalink = get_the_permalink();
$args = array(	
	'echo'       => true,
	'remember'  => true,	
'label_username' => 'Username ',
'label_password' => 'Password ',
'redirect'       => $permalink,
);
echo '
<style> 
	#loginform label {display:block} 
	.listing label {font-weight:normal; padding-left:10px; padding-right:30px;}	
	form.listing {padding-top:40px; padding-bottom:100px}
	

</style>
<section class="section-page-content">
	<div class="container box_list articles  last">
		<div class="row">
			<h2><i class="icon icon_1"></i>'.get_the_title().'</h2>
		</div>
	</div>
	<div class="container">
		<div class="row box_item">';
			if (!is_user_logged_in())
			{
				// User not logged in - display login or register forms

				echo '
				<div class="col-sm-6">'; $results = wp_login_form($args); echo '</div>
				<div class="col-sm-6">'.do_shortcode ( '[contact-form-7 id="16541" title="Listing Registration"]').'</div>';
			}
			else	
			{
				// Display existing Listings

					// Create New Listings
											//** Location and Type of Listing Completed

						//echo 'Submitted value is '.$_POST['submitted'];
					switch ($_POST['submitted'])
					{
						case "":
						case "0":
						wtg_display_existing_listings($userID);
						echo '
						<div class="col-sm-12"><h2 style="text-align:left">Create New Listing</h2></div>
						<form class="listing row" action="'.$permalink.'" method="post">
							<div class="col-sm-6">
								<h3>Listing Type</h3>
								<input type="radio" id="hotel"	name="type" value="Hotel">
								<label for="hotel"> Hotel</label><br />
								<input type="radio" id="restaurant" name="type" value="Restaurant">
								<label for="restaurant"> Restaurant</label><br />
								<input type="radio" id="attraction" name="type" value="Attraction">
								<label for="attraction"> Attraction</label>
								<input type="radio" id="nightlife" name="type" value="Nightlife">
								<label for="attraction"> Bar/Club</label>
								
							</div>	
							<div class="col-sm-6">
								<h3>Geographical Region of listing</h3>';
								$i=0;
								foreach ($terms as $term)
								{
									echo '
									<input type="radio" id="'.$term->slug.'" name="continent" value="'.$term->term_id.'">
									<label for "'.$term->slug.'">' .$term->name.'</label><br />';
								}
								echo '
							</div>	
							<div class="col-xs-4" style="float:right">
								<input type="hidden" name="submitted" value="1">
								<input type="submit" value="Next">
							</div>
						  </form>';
						  break;
							case '1':
							wtg_display_existing_listings($userID);
							$typeOfListing = $_POST['type'];
							$continentID = $_POST['continent'];
							$continentObject = get_term ($continentID, 'wtg_continent');
							$continentName = $continentObject->name;
							echo '
							<div class="col-sm-12"><h2 style="text-align:left">Continue with Listing</h2></div>
							<div class="col-sm-12"><h3 style="text-align:left"><strong>'.$typeOfListing.'</strong>in <strong>'.$continentName.'</strong></h3></div>
							
							<form class="listing row" action="'.$permalink.'" method="post">
								<div class="col-lg-12"><h2 style="text-align:left"></h2></div>';
								$regions_sql = sprintf('
								SELECT wtg_regions.Title, wtg_regions.WP_ID
								FROM wtg_regions
								WHERE wtg_regions.WP_Continent =%s
								ORDER BY Title ASC', $continentID);
								$regions = $wpdb->get_results($regions_sql);
			
								echo '
								<div class="col-sm-4"><label>Select Region</label></div>
								<div class="col-sm-8">
								<select name="regions">';
									foreach ($regions as $region) { echo '<option value="'.$region->WP_ID.'">'.$region->Title.'</option>'; }
								echo '
								</select>
								</div>
								<div style="clear:both; padding-top:20px"></div>
								<div class="col-sm-4"><label for "title">Listing Reference</label></div>
								<div class="col-sm-8" style="padding-bottom:30px"><input style="width:80%" type="text" id="title" name="title"></div>
								<input type="hidden" name="type" value="'.$typeOfListing.'">
								<input type="hidden" name="submitted" value="2">
								<div class="col-xs-4" style="float:right"><input type="submit" value="Next"></div>
							</form>';
							break;

							case '2':
								wtg_display_existing_listings($userID);
								$parentID = $_POST['regions'];
								
								$regions_sql = sprintf('
								SELECT *
								FROM wtg_regions
								WHERE wtg_regions.WP_ID =%s  OR wtg_regions.WP_Parent_ID = %s
								ORDER BY Title ASC', $parentID, $parentID);
								//echo '<br />'.$regions_sql;
								$regions = $wpdb->get_results($regions_sql);
								$typeOfListing = $_POST['type'];
								$title = $_POST['title'];

								$cities_sql = sprintf('	
									SELECT wtg_cities.City_Title, wtg_cities.WP_ID
									FROM wtg_cities	
									WHERE wtg_cities.WP_Parent_Region_ID =%s
									ORDER BY City_Title ASC', $parentID);
								$cities = $wpdb->get_results($cities_sql);		

								$airports_sql = sprintf('
									SELECT wtg_airports.Airport_Title, wtg_airports.WP_ID
									FROM wtg_airports
									WHERE wtg_airports.WP_Parent_Region_ID =%s
									ORDER BY Airport_Title ASC', $parentID);
								$airports = $wpdb->get_results($airports_sql);
							echo '
								<div class="col-sm-12"><h2 style="text-align:left">Continue with Listing</h2></div>
								<div class="col-sm-12"><h3 style="text-align:left"><strong>'.$title.'</strong>:  <strong>'.$typeOfListing.'</strong> in <strong>'.get_the_title($parentID).'</strong></h3></div>
								<form style="padding-top:40px" class="listing row" action="'.$permalink.'" method="post">
									<div class="col-sm-6">
										<p><label>Nearby City/Aiport (if appropriate)</label></p>
										<select name="citiesairports[]" multiple>
											<option value="0">Select Guides</opion>';
											foreach ($regions as $region) { echo '<option value="'.$region->WP_ID.'">'.$region->Title.'</option>'; }
											foreach ($cities as $city) { echo '<option value="'.$city->WP_ID.'">'.$city->City_Title.'</option>'; }
											foreach ($airports as $airport)	{ echo '<option value="'.$airport->WP_ID.'">'.$airport->Airport_Title.'</option>'; }
									echo '
										</select>
										<p></p>
										<p><label>Price range</label></p>
										<select name="price">';
										foreach ($termsPrice as $termPrice) { echo '<option value="'.$termPrice->term_id.'">'.$termPrice->name.'</option>';}
									echo '
										</select>
										<p></p>
										<p><label>Listing display type</label></p>
										<select name="listingdisplaytype">';
										foreach ($termsType as $termType) { echo '<option value="'.$termType->term_id.'">'.$termType->name.'</option>';}
									echo '
										</select>
									</div>
									<div class="col-sm-6">
										<p style="padding-bottom:50px">Here are some wise words that advise users to read the terms of business carefully before confirming listing. etc </p>
										<input type="hidden" name="region" value="'.$parentID.'">
										<input type="hidden" name="title" value="'.$_POST['title'].'">
										<input type="hidden" name="type" value="'.$typeOfListing.'">
										<input type="hidden" name="submitted" value="3">
										<button type="submit" value="Submit">Confirm Listing</button>
									</div>
								</form>';
							break;
		
							case '3' :
							
							$cityOrAirport = $_POST['citiesairports'];
							$region = $_POST['region'];
							$price = $_POST['price'];
							$displayType = $_POST['listingdisplaytype'];
							$title = $_POST['title'];
							$postType = strtolower($_POST['type']);
							$postID = wp_insert_post
							(
								array 	(
									'post_type' => $postType,
									'post_title' => $title,
									'post_status' => 'draft',
									'comment_status' => 'closed',   // if you prefer
									'ping_status' => 'closed',      // if you prefer 
										)
							);
							update_field('listing_city_or_airport', $cityOrAirport, $postID );
							update_field('list_of_guides', $cityOrAirport, $postID );
							update_field('listing_region',$region, $postID );
							wp_set_post_terms( $postID, $price, $taxonomyPrice );
							wp_set_post_terms( $postID, $displayType, $taxonomyType);
							wtg_display_existing_listings($userID);
							echo '
							<form class="listing row">
								<input type="hidden" name="submitted" value="0">
								<button type="submit" value=Submit">Click to Continue</button>
							</form>';	
							break;
							
							default:
							echo ' no idea!';
							break;			
						}

					}
				
echo '</div>';
echo '</div>';
echo '</section>';
get_footer('listing'); 
?>