<?php

function wtg_guide_menu($postid, $guideType)
{
	switch ($guideType) {
		case 'region' :
			wtg_guide_menu_region($postid);
			break;
		case 'city' :
			wtg_guide_menu_city($postid);
			break;
		case 'airport' :
			wtg_guide_menu_airport($postid);
			break;
		case 'ski-resort' :
			wtg_guide_menu_ski($postid);
			break;
		case 'beach-resort' :
			wtg_guide_menu_beach($postid);
			break;
		case 'cruise' :
			wtg_guide_menu_cruise($postid);
			break;
		default:
			break;
	}
}


function wtg_guide_menu_region($postID)
{
	/*
	 * This menu is hard coded. :( 
	 * there has to be a better way of doing this??
	 * 
	 * you could posibly rearrange the data so that each guide post has multiple catagory posts associated with it,
	 * but this would make the database huge!! The overnight cron would also have to populate multiple posts for one guide.
	 *
	 * The resulting subpage accepts a query var which is used to establish that subpage's content.
	 * Can't think of a better way, given the data.. so, meh.. the simplest answer is more likely to be the best... even if it's more code
	 * 
	 */
	$current_fp = get_query_var('fpage');
	$active = '';
	$expanded = 'false';
	$colapsed = 'collapsed';
	$in = '';
	$parentID = wp_get_post_parent_id($postID);
	
	
	if(empty($current_fp)){
		$active = 'active';
		$expanded = 'true';
		$colapsed = '';
		$in = 'in';
	}
	
	
	echo '<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">';
		echo'<div class="panel panel-default">
				<div class="panel-heading" role="tab" id="headingOne">
					<h4 class="panel-title">
					  <a role="button" data-toggle="collapse" data-parent="#accordion" class="'.$colapsed.'" href="#collapseOne" aria-expanded="'.$expanded.'" aria-controls="collapseOne">
						Introducing '.get_the_title($postID).'</a>
					</h4>
				</div>
				<div id="collapseOne" class="panel-collapse collapse '.$in.'" role="tabpanel" aria-labelledby="headingOne">
					<div class="panel-body">
						<ul>
							<li><a href="'.get_permalink($postID).'" class="'.$active.'">About '.get_the_title($postID).'</a>
							</li>						
							<!-- <li><a href="'.get_permalink($postID).'pictures" class="pictures">Images of '.get_the_title($postID).'</a> 
							</li> -->
							<li><a href="'.get_permalink($postID).'history-language-culture" class="history-language-culture">History, language & culture</a>
							</li>
							<li><a href="'.get_permalink($postID).'weather-climate-geography" class="weather-climate-geography">Weather & geography</a>
							</li>';
						
						switch($parentID){
							case 0:
								echo'<li><a href="'.get_permalink($postID).'business-communications" class="business-communications">Doing business & staying in touch</a>
								</li>';
								break;
							case 1232://spain parent
								echo'<li><a href="'.get_permalink($postID).'business-communications" class="business-communications">Doing business & staying in touch</a>
								</li>';
								break;
							case 1233://spain parent
								echo'<li><a href="'.get_permalink($postID).'business-communications" class="business-communications">Doing business & staying in touch</a>
								</li>';
								break;
							default:
								
								break;
						}
					echo'</ul>
					</div>
				</div>
			</div>';
			//echo $postParentID;
		echo '<div class="panel panel-default">
				<div class="panel-heading" role="tab" id="headingTwo">
					<h4 class="panel-title">
					  <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
						Plan your trip
					  </a>
					</h4>
				</div>
				<div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
					<div class="panel-body">
						<ul>
							<li><a href="'.get_permalink($postID).'travel-by" class="travel-by">Travel to  '.get_the_title($postID).'</a>
							</li>';
							echo'<li><a href="'.get_permalink($postID).'region-hotels" class="region-hotels">Where to stay</a>
									</li>';
						echo'</ul>
					</div>
				</div>
			</div>';
		
		echo '<div class="panel panel-default">
				<div class="panel-heading" role="tab" id="headingFour">
					<h4 class="panel-title">
					  <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseFour" aria-expanded="false" aria-controls="collapseThree">
						While you’re there
					  </a>
					</h4>
				</div>
				<div id="collapseFour" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingFour">
					<div class="panel-body">
						<ul>
							<li><a href="'.get_permalink($postID).'things-to-do" class="things-to-do">Things to see & do</a>
							</li>
							<li><a href="'.get_permalink($postID).'shopping-nightlife" class="shopping-nightlife">Shopping & nightlife</a>
							</li>
							<li><a href="'.get_permalink($postID).'food-and-drink" class="food-and-drink">Food & drink</a>
							</li>';
							if(get_field('show_public_holidays'))
							{
								echo '<li><a href="'.get_permalink($postID).'public-holidays" class="public-holidays">Public Holidays</a></li>';
							}	
							if($parentID==5666){
							
							} else {/*
								echo'<li><a href="'.get_permalink($postID).'getting-around" class="getting-around">Getting around</a>
							</li>
							<li><a href="'.get_permalink($postID).'events" class="events">Events</a>
							</li>';*/
							
								echo'<li><a href="'.get_permalink($postID).'getting-around" class="getting-around">Getting around</a>
							</li>';
							}
						echo '</ul>
					</div>
				</div>
			</div>';
		
		if($parentID==0){
			
			echo '<div class="panel panel-default">
				<div class="panel-heading" role="tab" id="headingThree">
					<h4 class="panel-title">
					  <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
						Before you go
					  </a>
					</h4>
				</div>
				<div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
					<div class="panel-body">
						<ul>
							<li><a href="'.get_permalink($postID).'passport-visa" class="passport-visa">Passport & visa</a>
							</li>
							<li><a href="'.get_permalink($postID).'health" class="health">Health</a>
							</li>
							<li><a href="'.get_permalink($postID).'public-holidays" class="public-holidays">Public Holidays</a>
							</li>';
						echo'<li><a href="'.get_permalink($postID).'money-duty-free" class="money-duty-free">Money & duty free</a>
							</li>';
						echo'</ul>
					</div>
				</div>
			</div>';
		} else {
						
			if (get_field('show_public_holidays'))
			{ /*
			echo '<div class="panel panel-default">
				<div class="panel-heading" role="tab" id="headingThree">
					<h4 class="panel-title">
					  <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
						Before you go
					  </a>
					</h4>
				</div>
				<div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
					<div class="panel-body">
						<ul>
							<li><a href="'.get_permalink($postID).'public-holidays" class="public-holidays">Public Holidays</a>
							</li>';
						echo'</ul>
					</div>
				</div>
			</div>'; */
			}
			
			$parentParentID = wp_get_post_parent_id($parentID);
			//echo "my ID: $postID<br/>parent ID: $parentID<br/>grendParent ID: $parentParentID";
			
			if(!$parentParentID) {
				
				
				
				echo '<div class="panel panel-default">
					<div class="panel-heading" role="tab" id="headingThree">
						<h4 class="panel-title">
						  <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
							'.get_the_title($parentID).': Key Info
						  </a>
						</h4>
					</div>
					<div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
						<div class="panel-body">
							<ul>
								<li><a href="'.get_permalink($parentID).'passport-visa" class="passport-visa">Passport & visa</a>
								</li>
								<li><a href="'.get_permalink($parentID).'health" class="health">Health</a>
								</li>
								<li><a href="'.get_permalink($parentID).'public-holidays" class="public-holidays">Public Holidays</a>
								</li>
								<li><a href="'.get_permalink($parentID).'money-duty-free" class="money-duty-free">Money & duty free</a>
								</li>
											
							</ul>
						</div>
					</div>
				</div>';
			
			} else {
				echo '<div class="panel panel-default">
					<div class="panel-heading" role="tab" id="headingThree">
						<h4 class="panel-title">
						  <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
							'.get_the_title($parentParentID).': Key Info
						  </a>
						</h4>
					</div>
					<div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
						<div class="panel-body">
							<ul>
								<li><a href="'.get_permalink($parentParentID).'passport-visa" class="passport-visa">Passport & visa</a>
								</li>
								<li><a href="'.get_permalink($parentParentID).'health" class="health">Health</a>
								</li>
								<li><a href="'.get_permalink($parentParentID).'public-holidays" class="public-holidays">Public Holidays</a>
								</li>
								<li><a href="'.get_permalink($parentParentID).'money-duty-free" class="money-duty-free">Money & duty free</a>
								</li>
							</ul>
						</div>
					</div>
				</div>';
			
			
			}
			
			
		} ?>

<?php /*

		<p class="places_area"><span>Browse our Video Guides</span></p>

		    		<div id="sekindo-video" style=" margin=top:10px;">
        <!-- code from sekindo - NVU-Worldtravelguide - Worldtravelguide-NVU-Desktop -->
<script type="text/javascript" language="javascript" src="https://live.sekindo.com/live/liveView.php?s=92825&cbuster=[CACHE_BUSTER]&pubUrl=[PAGE_URL_ENCODED]&x=300&y=300&vp_content=plembed5ddtwizprmno&vp_template=269"></script>
<!-- code from sekindo -->
        </div>


		<p class="places_area"><span>Book your flights</span></p>
		<style>
		.skyscanner-widget {padding: 10px; border-radius: 10px; width:100%;}
		</style>
		<div data-skyscanner-widget="SearchWidget" data-associate-id="API_B2B_18713_00001" data-params="colour:#2a2466;fontColour:#FFF;buttonColour:#895396;buttonFontColour:#fff;"></div>
		<script src="https://widgets.skyscanner.net/widget-server/js/loader.js" async></script>


		<script src="https://sbhc.portalhc.com/211201/searchbox/459419"></script>

		</div> */ ?>

		
		<div id = "desktop_ads" class="hidden-xs"> 
			<?php wtg_sekindo_skyscanner(); ?>
		</div>
		<div id = "hotels-combined-desktop" class="hidden-xs" style="width:90%">
			<?php // wtg_hotels_combined(); ?>
		</div>

		<script>
			var currentFP = '<?php echo $current_fp;?>';
			if(currentFP !== ''){
				var menuItem = jQuery('.'+currentFP);
				menuItem.addClass('active');
				menuItem.parent().parent().parent().parent().addClass('in');
			}
		</script>
		<?php
}


function guide_has_parent($id)
{
	$parentID = wp_get_post_parent_id($id);
	if($parentID != 0){
		return true;
	} else {
		return false;
	}
	//return false;
}


function wtg_guide_menu_city($postID)
{
	$current_fp = get_query_var('fpage');
	$active = '';
	$expanded = 'false';
	$colapsed = 'collapsed';
	$in = '';
	$parentID = 0;
	
	if(empty($current_fp)){
		$active = 'active';
		$expanded = 'true';
		$colapsed = '';
		$in = 'in';
	}
	echo '<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
	
                    <div class="panel panel-default">
                        <div class="panel-heading" role="tab" id="headingOne">
                            <h4 class="panel-title">
                  <a role="button" data-toggle="collapse" data-parent="#accordion" class="'.$colapsed.'" href="#collapseOne" aria-expanded="'.$expanded.'" aria-controls="collapseOne">
                    Introducing '.get_the_title($postID).'
                  </a>
                </h4>
                        </div>
                        <div id="collapseOne" class="panel-collapse collapse '.$in.'" role="tabpanel" aria-labelledby="headingOne">
                            <div class="panel-body">
                                <ul>
                                    <li><a href="'.get_permalink($postID).'" class="'.$active.'">About '.get_the_title($postID).'</a>
                                    </li>
                                    <li><a href="'.get_permalink($postID).'history" class="history">History</a>
                                    </li>
                                    <li><a href="'.get_permalink($postID).'weather" class="weather">Weather / Best time to visit</a>
									</li>						
									<!-- <li><a href="'.get_permalink($postID).'pictures" class="pictures">Images of '.get_the_title($postID).'</a>
									</li> -->
                                </ul>
                            </div>
                        </div>
                    </div>
					
                    <div class="panel panel-default">
                        <div class="panel-heading" role="tab" id="headingTwo">
                            <h4 class="panel-title">
                  <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                    While you’re there
                  </a>
                </h4>
                        </div>
                        <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                            <div class="panel-body">
                                <ul>
                                    <li><a href="'.get_permalink($postID).'gettingaround" class="gettingaround">Getting around</a>
                                    </li>
									<li><a href="'.get_permalink($postID).'city-attractions" class="city-attractions">Attractions, tours and tickets</a>
                                    </li>
									<li><a href="'.get_permalink($postID).'things-to-see" class="things-to-see">Things to see</a>
                                    </li>
									<li><a href="'.get_permalink($postID).'things-to-do-0" class="things-to-do-0">Things to do</a>
                                    </li>
									<li><a href="'.get_permalink($postID).'tours-excursions" class="tours-excursions">Excursions</a>
                                    </li>
									<li><a href="'.get_permalink($postID).'shopping" class="shopping">Shopping</a>
                                    </li>
									<li><a href="'.get_permalink($postID).'restaurants" class="restaurants">Restaurants</a>
                                    </li>
									<li><a href="'.get_permalink($postID).'nightlife" class="nightlife">Nightlife</a>
                                    </li>
									<li><a href="'.get_permalink($postID).'city-events" class="city-events">Events</a>
                                    </li>

                                </ul>
                            </div>
                        </div>
                    </div>
					
                    <div class="panel panel-default">
                        <div class="panel-heading" role="tab" id="headingThree">
                            <h4 class="panel-title">
                  <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                    Plan your trip
                  </a>
                </h4>
                        </div>
                        <div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
                            <div class="panel-body">
                                <ul>
                                    <li><a href="'.get_permalink($postID).'travel-to" class="travel-to">Travel to '.get_the_title($postID).'</a>
                                    </li>
                                    <li><a href="'.get_permalink($postID).'hotels" class="hotels">Hotels</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
					</div>
					
					
					
					<div class="panel panel-default">
                        <div class="panel-heading" role="tab" id="headingFour">
                            <h4 class="panel-title">
                  <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                    ';
					// hacky way of getting the parent ID without using recursion
					if (guide_has_parent($postID)){
						$parent1 = wp_get_post_parent_id($postID);
						if(guide_has_parent($parent1)){
							$parent2 = wp_get_post_parent_id($parent1);
							if(guide_has_parent($parent2)){
								$parent3 = wp_get_post_parent_id($parent2);
								if(guide_has_parent($parent3)){
									$parent4 = wp_get_post_parent_id($parent3);
									if(guide_has_parent($parent4)){
										$parent5 = wp_get_post_parent_id($parent4);
										$parentID = $parent5;
									}else{
										$parentID = $parent4;
									}
								} else {
									$parentID = $parent3;
								}
							} else {
								$parentID = $parent2;
							}
						} else {
							$parentID = $parent1;
						}
					}
						$titleTing = get_the_title($parentID);
						echo "$titleTing Information";
					
                  echo '</a>
                </h4>
                        </div>
                        <div id="collapseFour" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingFour">
                            <div class="panel-body">
                                <ul>';
								
								
									
									echo '
									<li><a href="'.get_permalink($parentID).'" class="about-country">About '.get_the_title($parentID).'</a>
									</li>
									<li><a href="'.get_permalink($parentID).'passport-visa" class="passport-visa">Passport & visa</a>
									</li>
									<li><a href="'.get_permalink($parentID).'health" class="health">Health</a>
									</li>
									<li><a href="'.get_permalink($parentID).'public-holidays" class="public-holidays">Public Holidays</a>
									</li>
									<li><a href="'.get_permalink($parentID).'money-duty-free" class="money-duty-free">Money & duty free</a>
									</li>
                                    <li><a href="'.get_permalink($parentID).'food-and-drink" class="food-and-drink">Food & drink</a>
									</li>';
								
								
                                 echo '</ul>
                            </div>
                        </div>
                    </div>';

/*
					
					<p class="places_area"><span>Browse our Video Guides</span></p>

		    		<div id="sekindo-video" style=" margin=top:10px;">
        <!-- code from sekindo - NVU-Worldtravelguide - Worldtravelguide-NVU-Desktop -->
<script type="text/javascript" language="javascript" src="https://live.sekindo.com/live/liveView.php?s=92825&cbuster=[CACHE_BUSTER]&pubUrl=[PAGE_URL_ENCODED]&x=300&y=300&vp_content=plembed5ddtwizprmno&vp_template=269"></script>
<!-- code from sekindo -->
        </div>

					<p class="places_area"><span>Book your flight</span></p>
					<style>
					.skyscanner-widget {padding: 10px; border-radius: 10px; width:100%;}
					</style>
					<div data-skyscanner-widget="SearchWidget" data-associate-id="API_B2B_18713_00001" data-params="colour:#2a2466;fontColour:#FFF;buttonColour:#895396;buttonFontColour:#fff;"></div>
					<script src="https://widgets.skyscanner.net/widget-server/js/loader.js" async></script>
					
								</div>=
								
								<script src="https://sbhc.portalhc.com/211201/searchbox/459419"></script>'; */
								?>

				
		<div id = "desktop_ads" class="hidden-xs"> 
		<?php wtg_sekindo_skyscanner(); ?>
</div>
	<div id = "hotels-combined-desktop" class="hidden-xs" style="width:90%">
	<?php // wtg_hotels_combined(); ?>
	</div> 
		<script>
			var currentFP = '<?php echo $current_fp;?>';
			if(currentFP !== ''){
				var menuItem = jQuery('.'+currentFP);
				menuItem.addClass('active');
				menuItem.parent().parent().parent().parent().addClass('in');
			}
		</script>
		<?php
}


function wtg_guide_menu_airport($postID)
{
	$current_fp = get_query_var('fpage');
	$active = '';

	if(empty($current_fp)){
		$active = 'active';
	}
	echo '<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                    <div class="panel panel-default">
                        <div class="panel-heading" role="tab" id="headingOne">
                            <h4 class="panel-title">
                  <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                    Introducing '.get_the_title($postID).'
                  </a>
							</h4>
                        </div>
                        <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                            <div class="panel-body">
                                <ul>
                                    <li><a href="'.get_permalink($postID).'" class="'.$active.'">About '.get_the_title($postID).'</a>
                                    </li>
                                    <li><a href="'.get_permalink($postID).'airport-hotels" class="airport-hotels">Hotels</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
					</div>
	
					<p class="places_area"><span>Book your flight</span></p>
					<style>
					.skyscanner-widget {padding: 10px; border-radius: 10px; width:100%; }
					</style>
					<div data-skyscanner-widget="SearchWidget" data-associate-id="API_B2B_18713_00001" data-origin-geo-lookup="true" data-destination-name="\''.get_field('overview_airport_code').'\'" data-params="colour:#2a2466;fontColour:#FFF;buttonColour:#895396;buttonFontColour:#fff;"></div>
					<script src="https://widgets.skyscanner.net/widget-server/js/loader.js" async></script>
								</div>
								
								<script src="https://sbhc.portalhc.com/211201/searchbox/459419"></script>
								
								';
	?>
		<script>
			var currentFP = '<?php echo $current_fp;?>';
			if(currentFP !== ''){
				var menuItem = jQuery('.'+currentFP);
				menuItem.addClass('active');
			}
		</script>
		<?php
}


function wtg_guide_menu_ski($postID)
{
	$current_fp = get_query_var('fpage');
	$active = '';
	
	if(empty($current_fp)){
		$active = 'active';
		
	}
	echo '<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                    <div class="panel panel-default">
                        <div class="panel-heading" role="tab" id="headingOne">
                            <h4 class="panel-title">
                  <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                    Introducing '.get_the_title($postID).'
                  </a>
							</h4>
                        </div>
                        <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                            <div class="panel-body">
                                <ul>
                                    <li><a href="'.get_permalink($postID).'" class="'.$active.'">About '.get_the_title($postID).'</a>
                                    </li>
                                    <li><a href="'.get_permalink($postID).'apres-ski" class="apres-ski">Resort information</a>
                                    </li>
                                    <!-- <li><a href="'.get_permalink($postID).'pictures" class="pictures">Images of '.get_the_title($postID).'</a>
                                    </li> -->

								</ul>
                            </div>
                        </div>
                    </div>
                </div>';
	?>
		<script>
			var currentFP = '<?php echo $current_fp;?>';
			if(currentFP !== ''){
				var menuItem = jQuery('.'+currentFP);
				menuItem.addClass('active');
				
			}
		</script>
		<?php
}



function wtg_guide_menu_cruise($postID)
{
	
	echo '<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                    <div class="panel panel-default">
                        <div class="panel-heading" role="tab" id="headingOne">
                            <h4 class="panel-title">
                  <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                    Introducing '.get_the_title($postID).'
                  </a>
							</h4>
                        </div>
                        <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                            <div class="panel-body">
                                <ul>
                                    <li><a href="'.get_permalink($postID).'" class="'.$active.'">About '.get_the_title($postID).'</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>';
		
}

function wtg_guide_menu_beach($postID)
{
	
	echo '<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                    <div class="panel panel-default">
                        <div class="panel-heading" role="tab" id="headingOne">
                            <h4 class="panel-title">
                  <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                    Introducing '.get_the_title($postID).'
                  </a>
							</h4>
                        </div>
                        <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                            <div class="panel-body">
                                <ul>
                                    <li><a href="'.get_permalink($postID).'" class="active">About '.get_the_title($postID).'</a>
                                    </li>
									<!-- <li><a href="'.get_permalink($postID).'pictures" class="pictures">Images of '.get_the_title($postID).'</a>
                                    </li> -->
                            </div>
                        </div>
                    </div>
                </div>';
		
		
}

function wtg_region_places($postid)
{
	$title = get_the_title($postid);
	
	$args = array(
	'sort_order' => 'asc',
	'sort_column' => 'post_title',
	'child_of' => $postid,
	'post_type' => 'guides',
	'hierarchical' => 0,
	);
	$children1 = get_pages( $args );
	

	
echo '<div style="display:none"> the IDs';

$guideTitles = array();
foreach ($children1 as $child)
 {
	 array_push($guideTitles, $child->post_title);
 }
	 
sort($guideTitles);
$guideIds = array();
foreach ($guideTitles as $guideTitle)
{
	$pagearray = get_page_by_title( $guideTitle,OBJECT,'guides' );
	array_push($guideIds, $pagearray->ID);
	echo $pagearray->ID, $guideTitle.'<br />';
}


echo '</div>';
	
	$regionIDs = array();
	$cityIDs = array();
	$airportIDs = array();
	$skiIDs = array();
	$beachIDs = array();
	$cruiseIDs = array();
	
	
	
	foreach ($guideIds as $guideId){
		$childTerms = get_the_terms($guideId,'wtg_guide_type');
		foreach($childTerms as $childTerm){
			//echo $childTerm->slug;
			switch($childTerm->slug){
				case 'region':
					array_push($regionIDs,$guideId);
					break;
				case 'city':
					array_push($cityIDs,$guideId);
					break;
				case 'airport':
					array_push($airportIDs,$guideId);
					break;
				case 'ski-resort':
					array_push($skiIDs,$guideId);
					break;
				case 'beach-resort':
					array_push($beachIDs,$guideId);
					break;
				case 'cruise':
					array_push($cruiseIDs,$guideId);
					break;
			}
		}
	}
	
	echo '<div class="places_area">';
				$language = get_field ('language','options');
				switch ($language)
				{
					case 'en':
						$places = 'Places in';
						$region = 'Regions';
						if (get_the_title() == 'Japan') $region = 'Prefectures';
						$cities = 'Cities';
						$airports = 'Airports';
					break;
				
					case 'de':
						$places = 'Orte in';
						$region = 'Länderführer';
						$cities = 'Städte';
						$airports ='Flughäfen';
					break;
				}

            if(!empty($regionIDs)||!empty($cityIDs)||!empty($airportIDs)||!empty($skiIDs)||!empty($beachIDs)||!empty($cruiseIDs)){
				echo '<span>'.$places.' '.$title.'</span>

                    <div class="panel-group" id="places_in" role="tablist" aria-multiselectable="true">
                        ';
				//var_dump($regionIDs);echo '<br/><br/>';
				//var_dump($cityIDs);echo '<br/><br/>';
				//var_dump($airportIDs);echo '<br/><br/>';
				//var_dump($skiIDs);echo '<br/><br/>';
				//var_dump($beachIDs);echo '<br/><br/>';
				//var_dump($cruiseIDs);echo '<br/><br/>';
				
					if(!empty($regionIDs)){
						
						echo '
							<div class="panel panel-default">
								<div class="panel-heading" role="tab" id="headone">
									<h4 class="panel-title">
									<a class="collapsed" role="button" data-toggle="collapse" data-parent="#places_in" href="#placeone" aria-expanded="false" aria-controls="placeone">
									  '.$region.'
									</a>
									</h4>
								</div>
								<div id="placeone" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headone">
									<div class="panel-body">
											<ul>
								';
								foreach($regionIDs as $regionID){
										echo '<li><a href="'.get_permalink($regionID).'" class="active">'.get_the_title($regionID).'</a></li>';
								}
									echo '</ul>
									</div>
								</div>
							</div>';
					}
					if(!empty($cityIDs)){
						
						$num = 'two';
						echo '
							<div class="panel panel-default">
								<div class="panel-heading" role="tab" id="head'.$num.'">
									<h4 class="panel-title">
									<a class="collapsed" role="button" data-toggle="collapse" data-parent="#places_in" href="#place'.$num.'" aria-expanded="false" aria-controls="place'.$num.'">
									  '.$cities.'
									</a>
									</h4>
								</div>
								<div id="place'.$num.'" class="panel-collapse collapse" role="tabpanel" aria-labelledby="head'.$num.'">
									<div class="panel-body">
											<ul>
								';
								foreach($cityIDs as $cityID){
										echo '<li><a href="'.get_permalink($cityID).'" class="active">'.get_the_title($cityID).'</a></li>';
								}
									echo '</ul>
									</div>
								</div>
							</div>';
					}
					if(!empty($airportIDs)){
						
						$num = 'three';
						echo '
							<div class="panel panel-default">
								<div class="panel-heading" role="tab" id="head'.$num.'">
									<h4 class="panel-title">
									<a class="collapsed" role="button" data-toggle="collapse" data-parent="#places_in" href="#place'.$num.'" aria-expanded="false" aria-controls="place'.$num.'">
									  '.$airports.'
									</a>
									</h4>
								</div>
								<div id="place'.$num.'" class="panel-collapse collapse" role="tabpanel" aria-labelledby="head'.$num.'">
									<div class="panel-body">
											<ul>
								';
								foreach($airportIDs as $airportID){
										echo '<li><a href="'.get_permalink($airportID).'" class="active">'.get_the_title($airportID).'</a></li>';
								}
									echo '</ul>
									</div>
								</div>
							</div>';
					}
					if(!empty($skiIDs)){
						
						$num = 'four';
						echo '
							<div class="panel panel-default">
								<div class="panel-heading" role="tab" id="head'.$num.'">
									<h4 class="panel-title">
									<a class="collapsed" role="button" data-toggle="collapse" data-parent="#places_in" href="#place'.$num.'" aria-expanded="false" aria-controls="place'.$num.'">
									  Ski Resorts
									</a>
									</h4>
								</div>
								<div id="place'.$num.'" class="panel-collapse collapse" role="tabpanel" aria-labelledby="head'.$num.'">
									<div class="panel-body">
											<ul>
								';
								foreach($skiIDs as $skiID){
										echo '<li><a href="'.get_permalink($skiID).'" class="active">'.get_the_title($skiID).'</a></li>';
								}
									echo '</ul>
									</div>
								</div>
							</div>';
					}
					if(!empty($beachIDs)){
						
						$num = 'five';
						echo '
							<div class="panel panel-default">
								<div class="panel-heading" role="tab" id="head'.$num.'">
									<h4 class="panel-title">
									<a class="collapsed" role="button" data-toggle="collapse" data-parent="#places_in" href="#place'.$num.'" aria-expanded="false" aria-controls="place'.$num.'">
									  Beaches
									</a>
									</h4>
								</div>
								<div id="place'.$num.'" class="panel-collapse collapse" role="tabpanel" aria-labelledby="head'.$num.'">
									<div class="panel-body">
											<ul>
								';
								foreach($beachIDs as $beachID){
										echo '<li><a href="'.get_permalink($beachID).'" class="active">'.get_the_title($beachID).'</a></li>';
								}
									echo '</ul>
									</div>
								</div>
							</div>';
					}
					if(!empty($cruiseIDs)){
						
						$num = 'six';
						echo '
							<div class="panel panel-default">
								<div class="panel-heading" role="tab" id="head'.$num.'">
									<h4 class="panel-title">
									<a class="collapsed" role="button" data-toggle="collapse" data-parent="#places_in" href="#place'.$num.'" aria-expanded="false" aria-controls="place'.$num.'">
									  Cruise Locations
									</a>
									</h4>
								</div>
								<div id="place'.$num.'" class="panel-collapse collapse" role="tabpanel" aria-labelledby="head'.$num.'">
									<div class="panel-body">
											<ul>
								';
								foreach($cruiseIDs as $cruiseID){
										echo '<li><a href="'.get_permalink($cruiseID).'" class="active">'.get_the_title($cruiseID).'</a></li>';
								}
									echo '</ul>
									</div>
								</div>
							</div>';
					}
					
					echo '</div>';
			}	
				echo'</div>';

}

function rr_404_my_event() {
  global $post;
  if ( is_singular( 'guides' ) ) {
    global $wp_query;
    $wp_query->set_404();
    status_header(404);
  }
}


?>
