<?php


/**
 * Patch Set B: guide menu context + provider/renderer separation.
 * Keep hook/markup contracts stable while reducing inline scripting and duplicative state handling.
 */
if (!function_exists('wtg_get_guide_context')) {
	function wtg_get_guide_context($post_id, $guide_type = '') {
		return array(
			'post_id'   => (int) $post_id,
			'guide_type'=> (string) $guide_type,
			'fpage'     => function_exists('wtg_sanitize_fpage') ? wtg_sanitize_fpage() : '',
			'permalink' => wtg_esc_url(get_permalink($post_id)),
			'title'     => wtg_esc_html(get_the_title($post_id)),
		);
	}
}

if (!function_exists('wtg_build_menu_items')) {
	/**
	 * Build a simple list of menu items for the left guide menu.
	 *
	 * @param array $ctx Context from wtg_get_guide_context()
	 * @param array $items Each item: ['path' => 'history', 'label' => 'History', 'class' => 'history']
	 *                    If 'path' is empty, base permalink is used.
	 */
	function wtg_build_menu_items(array $ctx, array $items) {
		$built = array();
		$fpage = isset($ctx['fpage']) ? (string) $ctx['fpage'] : '';
		$base  = isset($ctx['permalink']) ? (string) $ctx['permalink'] : '';
		foreach ($items as $it) {
			$path  = isset($it['path']) ? (string) $it['path'] : '';
			$label = isset($it['label']) ? (string) $it['label'] : '';
			$class = isset($it['class']) ? (string) $it['class'] : '';
			$url   = $base . ($path !== '' ? $path : '');
			$active = ($path === '' && $fpage === '') || ($class !== '' && $class === $fpage);
			$built[] = array(
				'url'    => wtg_esc_url($url),
				'label'  => $label, // label escaped at render time for flexibility
				'class'  => $class,
				'active' => $active,
			);
		}
		return $built;
	}
}

if (!function_exists('wtg_render_accordion_menu')) {
	/**
	 * Render a single-panel Bootstrap accordion menu with a UL.
	 */
	function wtg_render_accordion_menu($heading, array $items, $accordion_id = null, $collapse_id = null) {
		// Ensure IDs are unique per rendered menu instance to avoid Bootstrap collapse collisions.
		static $wtg_acc_i = 0;
		$wtg_acc_i++;

		if (empty($accordion_id)) {
			$accordion_id = 'wtg-accordion-' . $wtg_acc_i;
		}
		if (empty($collapse_id)) {
			$collapse_id = 'wtg-collapse-' . $wtg_acc_i;
		}
		$heading_id = 'wtg-heading-' . $wtg_acc_i;

		$accordion_id = preg_replace('/[^a-zA-Z0-9_-]/', '', (string) $accordion_id);
		$collapse_id  = preg_replace('/[^a-zA-Z0-9_-]/', '', (string) $collapse_id);
		$heading_id   = preg_replace('/[^a-zA-Z0-9_-]/', '', (string) $heading_id);

		echo '<div class="panel-group" id="' . esc_attr($accordion_id) . '" role="tablist" aria-multiselectable="true">';
		echo '<div class="panel panel-default">';
		echo '<div class="panel-heading" role="tab" id="' . esc_attr($heading_id) . '">';
		echo '<h4 class="panel-title">';
		echo '<a role="button" data-toggle="collapse" data-parent="#' . esc_attr($accordion_id) . '" href="#' . esc_attr($collapse_id) . '" aria-expanded="true" aria-controls="' . esc_attr($collapse_id) . '">';
		echo wtg_esc_html($heading);
		echo '</a>';
		echo '</h4>';
		echo '</div>';
		echo '<div id="' . esc_attr($collapse_id) . '" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="' . esc_attr($heading_id) . '">';
		echo '<div class="panel-body"><ul>';

		foreach ($items as $it) {
			$url    = isset($it['url']) ? $it['url'] : '';
			$label  = isset($it['label']) ? $it['label'] : '';
			$class  = isset($it['class']) ? $it['class'] : '';
			$active = !empty($it['active']) ? ' active' : '';
			echo '<li><a href="' . wtg_esc_url($url) . '" class="' . esc_attr($class . $active) . '">' . wtg_esc_html($label) . '</a></li>';
		}

		echo '</ul></div></div></div></div>';
	}
}


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
	$current_fp = wtg_sanitize_fpage();
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
						Introducing '.wtg_esc_html(get_the_title($postID)).'</a>
					</h4>
				</div>
				<div id="collapseOne" class="panel-collapse collapse '.$in.'" role="tabpanel" aria-labelledby="headingOne">
					<div class="panel-body">
						<ul>
							<li><a href="'.wtg_esc_url(get_permalink($postID)).'" class="'.$active.'">About '.wtg_esc_html(get_the_title($postID)).'</a>
							</li>						
							<!-- <li><a href="'.get_permalink($postID).'pictures" class="pictures">Images of '.wtg_esc_html(get_the_title($postID)).'</a> 
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
							<li><a href="'.get_permalink($postID).'travel-by" class="travel-by">Travel to  '.wtg_esc_html(get_the_title($postID)).'</a>
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
							'.wtg_esc_html(get_the_title($parentID)).': Key Info
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
							'.wtg_esc_html(get_the_title($parentParentID)).': Key Info
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
	$current_fp = wtg_sanitize_fpage();
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
                    Introducing '.wtg_esc_html(get_the_title($postID)).'
                  </a>
                </h4>
                        </div>
                        <div id="collapseOne" class="panel-collapse collapse '.$in.'" role="tabpanel" aria-labelledby="headingOne">
                            <div class="panel-body">
                                <ul>
                                    <li><a href="'.wtg_esc_url(get_permalink($postID)).'" class="'.$active.'">About '.wtg_esc_html(get_the_title($postID)).'</a>
                                    </li>
                                    <li><a href="'.get_permalink($postID).'history" class="history">History</a>
                                    </li>
                                    <li><a href="'.get_permalink($postID).'weather" class="weather">Weather / Best time to visit</a>
									</li>						
									<!-- <li><a href="'.get_permalink($postID).'pictures" class="pictures">Images of '.wtg_esc_html(get_the_title($postID)).'</a>
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
                                    <li><a href="'.get_permalink($postID).'travel-to" class="travel-to">Travel to '.wtg_esc_html(get_the_title($postID)).'</a>
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
									<li><a href="'.wtg_esc_url(get_permalink($parentID)).'" class="about-country">About '.wtg_esc_html(get_the_title($parentID)).'</a>
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
	$current_fp = wtg_sanitize_fpage();
	$active = '';

	if(empty($current_fp)){
		$active = 'active';
	}
	echo '<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                    <div class="panel panel-default">
                        <div class="panel-heading" role="tab" id="headingOne">
                            <h4 class="panel-title">
                  <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                    Introducing '.wtg_esc_html(get_the_title($postID)).'
                  </a>
							</h4>
                        </div>
                        <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                            <div class="panel-body">
                                <ul>
                                    <li><a href="'.wtg_esc_url(get_permalink($postID)).'" class="'.$active.'">About '.wtg_esc_html(get_the_title($postID)).'</a>
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
	$current_fp = wtg_sanitize_fpage();
	$active = '';
	
	if(empty($current_fp)){
		$active = 'active';
		
	}
	echo '<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                    <div class="panel panel-default">
                        <div class="panel-heading" role="tab" id="headingOne">
                            <h4 class="panel-title">
                  <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                    Introducing '.wtg_esc_html(get_the_title($postID)).'
                  </a>
							</h4>
                        </div>
                        <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                            <div class="panel-body">
                                <ul>
                                    <li><a href="'.wtg_esc_url(get_permalink($postID)).'" class="'.$active.'">About '.wtg_esc_html(get_the_title($postID)).'</a>
                                    </li>
                                    <li><a href="'.get_permalink($postID).'apres-ski" class="apres-ski">Resort information</a>
                                    </li>
                                    <!-- <li><a href="'.get_permalink($postID).'pictures" class="pictures">Images of '.wtg_esc_html(get_the_title($postID)).'</a>
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
                    Introducing '.wtg_esc_html(get_the_title($postID)).'
                  </a>
							</h4>
                        </div>
                        <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                            <div class="panel-body">
                                <ul>
                                    <li><a href="'.wtg_esc_url(get_permalink($postID)).'" class="'.$active.'">About '.wtg_esc_html(get_the_title($postID)).'</a>
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
                    Introducing '.wtg_esc_html(get_the_title($postID)).'
                  </a>
							</h4>
                        </div>
                        <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                            <div class="panel-body">
                                <ul>
                                    <li><a href="'.wtg_esc_url(get_permalink($postID)).'" class="active">About '.wtg_esc_html(get_the_title($postID)).'</a>
                                    </li>
									<!-- <li><a href="'.get_permalink($postID).'pictures" class="pictures">Images of '.wtg_esc_html(get_the_title($postID)).'</a>
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
										echo '<li><a href="'.wtg_esc_url(get_permalink($regionID)).'" class="active">'.wtg_esc_html(get_the_title($regionID)).'</a></li>';
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
										echo '<li><a href="'.wtg_esc_url(get_permalink($cityID)).'" class="active">'.wtg_esc_html(get_the_title($cityID)).'</a></li>';
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
										echo '<li><a href="'.wtg_esc_url(get_permalink($airportID)).'" class="active">'.wtg_esc_html(get_the_title($airportID)).'</a></li>';
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
										echo '<li><a href="'.wtg_esc_url(get_permalink($skiID)).'" class="active">'.wtg_esc_html(get_the_title($skiID)).'</a></li>';
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
										echo '<li><a href="'.wtg_esc_url(get_permalink($beachID)).'" class="active">'.wtg_esc_html(get_the_title($beachID)).'</a></li>';
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
										echo '<li><a href="'.wtg_esc_url(get_permalink($cruiseID)).'" class="active">'.wtg_esc_html(get_the_title($cruiseID)).'</a></li>';
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
