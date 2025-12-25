<?php

/*
* Template Name: Old DB maintenance
*/
get_header();
//wtg_corrected_airportby_AZ_static();
//update_cruises();
//wtg_region_redirects();
//wtg_city_redirects();
//wtg_airport_redirects();
//city_timezones();
//update_regions();
//update_cities();
//fco_regions();
update_airports();
//wtg_airport_maps();
// update_beaches();
// update_ski_resorts();
//list_out_airports();
//get_data();
//get_airports_with_code();
//xml_airport_destinations();
//xml_region_destinations();
//xml_city_destinations();

get_footer();

function fco_regions()
{

							$aargs = array(
							'post_type'             => 'guides',
							'posts_per_page' 		=> -1,
							'order' 		=> 'ASC',
							'orderby'       => 'title',
							'tax_query'             => array(
								array(
											  'taxonomy' => 'wtg_guide_type',
											  'field'    => 'slug',
											  'terms'    => 'region',
											 
								),
							),
						);
							
						$postsQuery = new WP_Query($aargs);
						$count = 0;
						if($postsQuery->have_posts()):
							while ($postsQuery->have_posts()):$postsQuery->the_post();
								$title = get_the_title();
								$region = strtolower($title);
								$region = str_replace(" ", "-", $region);
								switch ($region)
{
case 'alabama'          :
case 'alaska'           :
case 'arizona'          :
case 'arkansas'         :
case 'california'       :
case 'colorado'         :
case 'connecticut'      :
case 'delaware'         :
case 'florida'          : 
case 'washington-state' :
case 'west-virginia'    :
case 'wisconsin'        :
case 'wyoming'          :
case 'american-samoa'   :
case 'vermont'          :
case 'virginia'         :
case 'united-states-of-america' :
case 'us-virgin-islands':
case 'guam'             :
case 'georgia-(usa)'    :
case 'hawaii'           :
case 'iowa'             :
case 'idaho'            :
case 'illinois'         :
case 'indiana'          :
case 'kansas'           :
case 'kentucky'         :
case 'louisiana'        :
case 'maine'            :
case 'maryland'         :
case 'massachusetts'    :
case 'new-hampshire'    :
case 'new-jersey'       :
case 'new-mexico'       :
case 'michigan'         :
case 'minnesota'        :
case 'mississippi'      :
case 'missouri'         :
case 'montana'          :
case 'nebraska'         :
case 'nevada'           :
case 'new-york-state'   :
case 'north-carolina'   :
case 'north-dakota'     :
case 'ohio'             :
case 'oklahoma'         :
case 'oregon'           :
case 'pennsylvania'     :
case 'rhode-island'     :
case 'texas'            :
case 'tennessee'        :
case 'utah'             :
case 'northern-mariana-islands' :
case 'south-carolina'   :
case 'south-dakota'     :
case 'puerto-rico'      :
    $region = 'usa';
break;

case 'alberta'          :
case 'british-columbia' :
case 'yukon-territory'  :
case 'manitoba'         :
case 'new-brunswick'    :
case 'newfoundland-and-labrador' :
case 'nunavut' :
case 'ontario' :
case 'prince-edward-island' :
case 'quebec' :
case 'northwest-territories' :
case 'nova-scotia'  :
case 'saskatchewan' :  
    $region = 'canada';
break;

case 'antarctica' : 
    $region = 'antarctica-british-antarctic-territory';
break; 

case 'azores':
case 'madeira':
    $region = 'portugal';
break;

case 'balearic-islands' :
case 'canary-islands' :
case 'ibiza' :
case 'lanzarote' :
case 'gran-canaria' :
case 'mallorca' :
case 'menorca' :
case 'tenerife' :
    $region = 'spain';
break;

case 'bonaire'  :
case 'saba'     :
case 'st-eustatius' :
    $region = 'netherlands';
break;

case 'united-kingdom' :
case 'channel-islands' :
case 'guernsey' :
case 'isle-of-man' :
case 'jersey' :
case 'wales' :
case 'northern-ireland' :
case 'scotland' :
case 'sark-&-herm' :
case 'alderney'   :
case 'england'    :
    $region = 'uk';
break;

case 'cook-islands' :
case 'niue' :
    $region = 'cook-islands-tokelau-and-niue';
break;

case 'curaçao'  :
    $region = 'curacao';
break;

case 'democratic-republic-of-congo' :
    $region = 'congo';
break;

case 'east-timor':
    $region = 'timor-leste';
break;

case 'federated-states-of-micronesia' :
    $region = 'micronesia';
break;

case 'french-overseas-possessions' :
    $region = 'france';
break;

case 'gambia' :
    $region = 'the-gambia';
break;

case 'ivory-coast' :
    $region = 'cote-d-ivoire';
break;

case 'australian-capital-territory' :
case 'new-south-wales' :
case 'northern-territory' :
case 'queensland' :
case 'tasmania' :
case 'victoria' :
case 'western-australia' :
case 'south-australia' :
    $region = 'australia';
break;



case 'pacific-islands-of-micronesia' :
    $region = 'micronesia';
break;

case 'palestinian-national-authority' :
    $region ='the-occupied-palestinian-territories' ;
break;

case 'republic-of-congo' :
    $region ='congo';
break;

case 'são-tomé-e-príncipe' :
    $region = 'sao-tome-and-principe';
break;

case 'surinam' : 
    $region = 'suriname';
break;

case 'syrian-arab-republic' :
    $region = 'syria';
break;


case 'tahiti-and-her-islands':
    $region = 'france';
break;

case 'tibet'    :
    $region = 'china';
break;

case 'macau'    :
    $region = 'macao';
break;

case 'vatican-city' :
    $region = 'italy';
break;

case 'greenland'    :
    $region = 'denmark';
break;

default:
    $region = $region;
break;
}
								$json = file_get_contents('https://www.gov.uk/api/content/foreign-travel-advice/'.$region);
								//            var_dump ($json);
											$obj = json_decode($json);
											$details = $obj->details;
											$parts = $details->parts;
											//var_dump($;
											$data = '';
											foreach ($parts as $part)
											{ /*echo ($part->body)*/; $data .= $part->body; }
											if (strlen($data) == 0) echo $title.' is empty<br />';
							
							endwhile;
						endif;

}
/*
function xml_airport_destinations()
{
	$aargs = array(
		'post_type'             => 'guides',
		'posts_per_page' 		=> -1,
		'order' 		=> 'ASC',
		'orderby'       => 'title',
		'tax_query'             => array(
			array(
						  'taxonomy' => 'wtg_guide_type',
						  'field'    => 'slug',
						  'terms'    => 'airport',
			),
		),
	);
		

	echo '<h1> These are the NIDS!</h1>';
	$postsQuery = new WP_Query($aargs);
	if($postsQuery->have_posts()):
		while ($postsQuery->have_posts()):
			$postsQuery->the_post();								
			$pID = get_the_ID();
			echo '<br /><span><</span>Destination title="'.get_the_title().'"<span>></span>'.get_field('guide_legacy_id', $pID).'<span><</span>/Destination<span>></span>';
		endwhile;
	endif;

}

function xml_region_destinations()
{

	$aargs = array(
		'post_type'             => 'guides',
		'posts_per_page' 		=> -1,
		'order' 		=> 'ASC',
		'orderby'       => 'title',
		'tax_query'             => array(
			array(
						  'taxonomy' => 'wtg_guide_type',
						  'field'    => 'slug',
						  'terms'    => 'region',
			),
		),
	);
		

	echo '<h1> These are the NIDS!</h1>';
	$postsQuery = new WP_Query($aargs);
	if($postsQuery->have_posts()):
		while ($postsQuery->have_posts()):
			$postsQuery->the_post();								
			$pID = get_the_ID();
			echo '<br /><span><</span>Destination title="'.get_the_title().'"<span>></span>'.get_field('guide_legacy_id', $pID).'<span><</span>/Destination<span>></span>';
		endwhile;
	endif;

	
}

function xml_city_destinations()
{

	$aargs = array(
		'post_type'             => 'guides',
		'posts_per_page' 		=> -1,
		'order' 		=> 'ASC',
		'orderby'       => 'title',
		'tax_query'             => array(
			array(
						  'taxonomy' => 'wtg_guide_type',
						  'field'    => 'slug',
						  'terms'    => 'city',
			),
		),
	);
		

	echo '<h1> These are the NIDS!</h1>';
	$postsQuery = new WP_Query($aargs);
	if($postsQuery->have_posts()):
		while ($postsQuery->have_posts()):
			$postsQuery->the_post();								
			$pID = get_the_ID();
			echo '<br /><span><</span>Destination title="'.get_the_title().'"<span>></span>'.get_field('guide_legacy_id', $pID).'<span><</span>/Destination<span>></span>';
		endwhile;
	endif;

	
}
function list_out_airports()
{
global $wpdb;
$airports_sql= "SELECT drf_airports.Airport_Title, drf_regions.Title, drf_airports.Airport_Link
FROM drf_airports
INNER JOIN drf_regions
ON drf_airports.WP_Region_ID = drf_regions.WP_ID
ORDER BY Title, Airport_Title ASC
";


$regions_sql = "SELECT drf_regions.Title
FROM drf_regions
ORDER BY Title ASC
";

$airports = $wpdb->get_results($airports_sql);
$regions = $wpdb->get_results($regions_sql);


foreach ($regions as $region)
{

	$hasAirports = false;
	$convertedTitle = remove_accents( $region->Title);
	$firstLetter = substr( $convertedTitle, 0, 1 );
	foreach ($airports as $airport)
	{
				echo '<p>'.$region->Title.' - '.$airport->Title.'</p>';
				if ($region->Title == $airport->Title) 
				{
					if ($hasAirports == false) 	
					{
						echo '<li class="country_title">'.$region->Title.'</li>'; 
						$hasAirports = true;
					}
					echo '<li><a href = "'.$airport->Airport_Link.'">'.$airport->Airport_Title.'</a></li>';
				}		
	}
}

}

function wtg_airport_maps()
{
								$aargs = array(
							'post_type'             => 'guides',
							'posts_per_page' 		=> -1,
							'order' 		=> 'ASC',
							'orderby'       => 'title',
							'tax_query'             => array(
								array(
											  'taxonomy' => 'wtg_guide_type',
											  'field'    => 'slug',
											  'terms'    => 'airport',
											 
								),
							),
						);
							
						$postsQuery = new WP_Query($aargs);
						$count = 0;
						$result = true;
						if($postsQuery->have_posts()):
							while ($postsQuery->have_posts()):
								$postsQuery->the_post();								
								$pID = get_the_ID();
	
	$mapPath = get_post_meta($pID, 'airport_map_filepath', true);
	$mapImage = get_field('airport_map');
	echo '<p>'.get_the_title().': '.$mapPath.' Image URL: '.$mapImage.'</p>';
	endwhile;
	endif;
}


function get_data()
{
global $wpdb;
$regions = $wpdb->get_results( 
	"
	SELECT Title
	FROM wtg_regions
	WHERE 1
	"
);

//foreach ( $regions as $region ) {echo $region->Title;}

$cities = $wpdb->get_results( 

	"
	SELECT Title, Legacy_ID
	FROM wtg_cities
	WHERE 1
	"
);

foreach ( $cities as $city ) { echo $city->Title.$city->Legacy_ID; }


}

function city_timezones()
{
		echo 'city timezones';
							$aargs = array(
							'post_type'             => 'guides',
							'posts_per_page' 		=> -1,
							'order' 		=> 'ASC',
							'orderby'       => 'title',
							'tax_query'             => array(
								array(
											  'taxonomy' => 'wtg_guide_type',
											  'field'    => 'slug',
											  'terms'    => 'city',
											 
								),
							),
						);
							
						$postsQuery = new WP_Query($aargs);
						//$count = 0;
						//$result = $wpdb->query("TRUNCATE wtg_cities");
						//$result = true;
						if($postsQuery->have_posts()):
							while ($postsQuery->have_posts()):
								$postsQuery->the_post();								
								$pID = get_the_ID();
								$pParentID = wp_get_post_parent_id( $pID ); 
								$link = get_the_permalink();
								$title = get_the_title();
								echo '<br />'.$title;
								                 $ctz1 = 'city_timezone_0_citylistvalue';
                    $ctz2 = 'city_timezone_0_stdtznamevalue';
                    $ctz3 = 'city_timezone_0_region_name_value';
                    $ctz4 = 'city_timezone_0_language';
                    $ctz5 = 'city_timezone_0_standardbiasvalue';
                    $ctz6 = 'city_timezone_0_stdbiassecvalue';
                    $ctz7 = 'city_timezone_0_stdtzabbrvalue';
                    $ctz8 = 'city_timezone_0_countrynamevalue';
					$ctz10 = 'city_timezone_0_thisyearutcstartvalue';
                    $ctz11 = 'city_timezone_0_thisyearutcendvalue';
                    $ctz12 = 'city_timezone_0_dstbiasvalue';
					$ctz13 = 'dstbiassecsvalue';
					
                    //$ctz9 = 'city_timezone_0_description';
					$true = true;

								$start = get_post_meta($pID,$ctz10,$true);
								$starts = substr($start, 0, 10);
								$end = substr(get_post_meta($pID,$ctz11,$true),0,10);
								echo '<br />DST standard Sec bias value '.get_post_meta($pID,$ctz13,$true);
								echo '<br />This year UTC start value'.$starts;
								echo '<br />This year UTC end value'.$end;
								$date = date('Y-m-d');
								echo 'current date is'.$date;
								if ($date > $starts && $date < $end) {echo '<br />apply dst';}
								
								
//								echo '<br />'.get_post_meta($pID,$ctz9,$true).'<br />';
							endwhile;
						endif;
}

function update_regions()
{
	global $wpdb;

							$aargs = array(
							'post_type'             => 'guides',
							'posts_per_page' 		=> -1,
							'order' 		=> 'ASC',
							'orderby'       => 'title',
							'tax_query'             => array(
								array(
											  'taxonomy' => 'wtg_guide_type',
											  'field'    => 'slug',
											  'terms'    => 'region',
											 
								),
							),
						);
							
						$postsQuery = new WP_Query($aargs);
						$count = 0;
						$result = $wpdb->query("TRUNCATE wtg_regions"); 			
						if($postsQuery->have_posts() && $result):
							while ($postsQuery->have_posts()):$postsQuery->the_post();
								$pID = get_the_ID();
								$link = get_the_permalink();
								$title = get_the_title();
								$terms = get_the_terms($pdID, 'wtg_continent');
								foreach ($terms as $term) { $termID = $term->term_id;}
								$legacyID = get_field('guide_legacy_id');
								$legactContinent = 0;
								$result =
								$wpdb->insert( 'wtg_regions', array('WP_ID' => $pID, 'Legacy_ID' => $legacyID, 'WP_Continent' => $termID , 'Legacy_Continent'=> 1, 'Title' => $title, 'Link' => $link),
											  array('%d','%d','%d','%d','%s','%s'));
								echo $result;
							endwhile;
						endif;

}

function update_cities()
{
	global $wpdb;

							$aargs = array(
							'post_type'             => 'guides',
							'posts_per_page' 		=> -1,
							'order' 		=> 'ASC',
							'orderby'       => 'title',
							'tax_query'             => array(
								array(
											  'taxonomy' => 'wtg_guide_type',
											  'field'    => 'slug',
											  'terms'    => 'city',
											 
								),
							),
						);
							
						$postsQuery = new WP_Query($aargs);
						$count = 0;
						$result = $wpdb->query("TRUNCATE wtg_cities");
						$result = true;
						if($postsQuery->have_posts() && $result):
							while ($postsQuery->have_posts()):
								$postsQuery->the_post();								
								$pID = get_the_ID();
								$pParentID = wp_get_post_parent_id( $pID ); 
								$link = get_the_permalink();
								$title = get_the_title();
								echo $title;
								$terms = get_the_terms($pdID, 'wtg_continent');								
								foreach ($terms as $term) { $termID = $term->term_id;}
								$legacyID = get_field('guide_legacy_id');
								$legactContinent = 0;
								$result = 
								$wpdb->insert( 'wtg_cities', array('WP_ID' => $pID, 'Legacy_ID' => $legacyID, 'WP_Continent' => $termID , 'WP_Region_ID' => $pParentID, 'City_Title' => $title, 'City_Link' => $link),
											  array('%d','%d','%d','%d','%s','%s'));
								echo $result;
							endwhile;
						endif;

}


function update_beaches()
{
	global $wpdb;

	$wpdb->show_errors();
							$aargs = array(
							'post_type'             => 'guides',
							'posts_per_page' 		=> -1,
							'order' 		=> 'ASC',
							'orderby'       => 'title',
							'tax_query'             => array(
								array(
											  'taxonomy' => 'wtg_guide_type',
											  'field'    => 'slug',
											  'terms'    => 'beach-resort',
											 
								),
							),
						);
							
						$postsQuery = new WP_Query($aargs);
						$count = 0;
						$result = $wpdb->query("TRUNCATE wtg_beaches");
						$result = true;
						if($postsQuery->have_posts() && $result):
							while ($postsQuery->have_posts()):
								$postsQuery->the_post();								
								$pID = get_the_ID();
								$parents = get_post_ancestors( $pID );
								echo sizeof($parents);
								if (sizeof($parents) == 1)
								{
									echo '<br />array size is 1';
									$regionID = $parents[0];
								}
								else
								{
									$regionID = $parents[1];
									$termsParent = get_the_terms($regionID, 'wtg_guide_type');
									foreach ($termsParent as $termParent) {$termParentSlug = $termParent->slug;}

									if ($termParentSlug == 'city')
									{
										$cityID = $parents[0];
										$regionID = $parents[1];
									}
									else
									{
										echo '<br />setting region to '.$parents[0].' the root is '.$parents[1];
										$regionID = $parents[0];
									}
								}
								echo '<br /> The Region ID is '.$regionID;
								$link = get_the_permalink();
								$title = get_the_title();
								echo $title;
								$terms = get_the_terms($pdID, 'wtg_continent');								
								foreach ($terms as $term) { $termID = $term->term_id;}
								$legacyID = get_field('guide_legacy_id');
								echo '<br />'.$title.' '.$link.' legacy ID'.$legacyID.' WPID:'.$pID.' Term ID'.$termID.' Region ID'.$pParentID;
								$legactContinent = 0;
//								$result = 
//								$wpdb->insert( 'wtg_beaches', array('WP_ID' => $pID, 'Legacy_ID' => $legacyID, 'WP_Continent' => $termID , 'WP_Region_ID' => $pParentID, 'Beach_Title' => $title, 'Beach_Link' => $link),
//											  array('%d','%d','%d','%d','%s','%s'));
//								echo '<br />The insert result is '.$result; 
								if (!$legacyID) $legacyID = 1;
								$result = 
								$wpdb->insert( 'wtg_beaches', array('WP_ID' => $pID, 'Legacy_ID' => $legacyID, 'WP_Continent' => $termID , 'WP_Region_ID' => $regionID, 'Beach_Title' => $title, 'Beach_Link' => $link),
											  array('%d','%d','%d','%d','%s','%s'));
								echo '<br />The insert result is '.$result;
								
								// $wpdb->print_error();
								
							endwhile;
						endif;

}

function update_ski_resorts()
{
	global $wpdb;

							$aargs = array(
							'post_type'             => 'guides',
							'posts_per_page' 		=> -1,
							'order' 		=> 'ASC',
							'orderby'       => 'title',
							'tax_query'             => array(
								array(
											  'taxonomy' => 'wtg_guide_type',
											  'field'    => 'slug',
											  'terms'    => 'ski-resort',
											 
								),
							),
						);
							
						$postsQuery = new WP_Query($aargs);
						$count = 0;
						$result = $wpdb->query("TRUNCATE wtg_ski_resorts");
						$result = true;
						if($postsQuery->have_posts() && $result):
							while ($postsQuery->have_posts()):
								$postsQuery->the_post();								
								$pID = get_the_ID();
								$pParentID = wp_get_post_parent_id( $pID ); 
								$link = get_the_permalink();
								$title = get_the_title();
								// echo $title.' '.$link;
								$terms = get_the_terms($pdID, 'wtg_continent');								
								foreach ($terms as $term) { $termID = $term->term_id;}
								$legacyID = get_field('guide_legacy_id');
								$legactContinent = 0;
								echo '<br />'.$termID.', '.$pParentID.', '.$title.', '.$link;
								
								$result = 
								$wpdb->insert( 'wtg_ski_resorts', array('WP_ID' => $pID, 'Legacy_ID' => $legacyID, 'WP_Continent' => $termID , 'WP_Region_ID' => $pParentID,
													'ski_resort_title' => $title, 'ski_resort_link' => $link),
											  array('%d','%d','%d','%d','%s','%s'));
								echo $result;
							endwhile;
						endif;

}

function get_airports_with_code()
{
	$aargs = array(
		'post_type'             => 'guides',
		'posts_per_page' 		=> -1,
		'order' 		=> 'ASC',
		'orderby'       => 'title',
		'tax_query'             => array(
			array(
						  'taxonomy' => 'wtg_guide_type',
						  'field'    => 'slug',
						  'terms'    => 'airport',
						 
			),
		),
	);
		
	$postsQuery = new WP_Query($aargs);
	if($postsQuery->have_posts()):
		while ($postsQuery->have_posts()):
			$postsQuery->the_post();								
			$pID = get_the_ID();
			$pParentID = wp_get_post_parent_id( $pID ); 
			$link = get_the_permalink();
			$title = get_the_title();
			$code = get_field('overview_airport_code');
			$legacyID = get_field('guide_legacy_id');
			if ($pParentID)
			{echo ' Airport Code is'.$code.','.$legacyID.','.$title.'<br />';}
		endwhile;
	endif;		
}

function update_airports()
{
	global $wpdb;

							$aargs = array(
							'post_type'             => 'guides',
							'post_status'			=> 'publish',
							'posts_per_page' 		=> -1,
							'order' 		=> 'ASC',
							'orderby'       => 'title',
							'tax_query'             => array(
								array(
											  'taxonomy' => 'wtg_guide_type',
											  'field'    => 'slug',
											  'terms'    => 'airport',
											 
								),
							),
						);
							
						$postsQuery = new WP_Query($aargs);
						$count = 0;
						$result = $wpdb->query("TRUNCATE wtg_airports");
						$result = true;
						if($postsQuery->have_posts()):
							while ($postsQuery->have_posts()):
								$postsQuery->the_post();								
								$pID = get_the_ID();
								$pParentID = wp_get_post_parent_id( $pID ); 
								$link = get_the_permalink();
								$title = get_the_title();
								echo '<br />'.$title;
								$terms = get_the_terms($pdID, 'wtg_continent');								
								foreach ($terms as $term) { $termID = $term->term_id;}
								$termsParent = get_the_terms($pParentID, 'wtg_guide_type');
								foreach ($termsParent as $termParent) {$termParentSlug = $termParent->slug;}
								//echo '<br />the parent of this airport is a '.$termParentSlug;
								if ($termParentSlug == 'city')
								{
									$pGrandParentID = wp_get_post_parent_id( $pParentID );
									$cityID = $pParentID;
									$regionID = $pGrandParentID;
								}
								else
								{
									$cityID = 0;
									$regionID = $pParentID;
								}
								$legacyID = get_field('guide_legacy_id');
								$legactContinent = 0;
							$wpdb->insert( 'wtg_airports', array('WP_ID' => $pID, 'Legacy_ID' => $legacyID, 'WP_Continent' => $termID , 'WP_Region_ID' => $regionID, 'WP_City_ID' => $cityID, 'Airport_Title' => $title, 'Airport_Link' => $link),
											  array('%d','%d','%d','%d','%d','%s','%s'));
								echo $result;
							endwhile;
						endif;

}

function update_cruises()
{
	global $wpdb;

							$aargs = array(
							'post_type'             => 'guides',
							'posts_per_page' 		=> -1,
							'order' 		=> 'ASC',
							'orderby'       => 'title',
							'tax_query'             => array(
								array(
											  'taxonomy' => 'wtg_guide_type',
											  'field'    => 'slug',
											  'terms'    => 'cruise',
											 
								),
							),
						);
							
						$postsQuery = new WP_Query($aargs);
						$count = 0;
//						$result = $wpdb->query("TRUNCATE wtg_airports");
						$result = true;
						if($postsQuery->have_posts() && $result):
							while ($postsQuery->have_posts()):
								$postsQuery->the_post();								
								$pID = get_the_ID();
								$pParentID = wp_get_post_parent_id( $pID ); 
								$link = get_the_permalink();
								$title = get_the_title();
								echo '<br />'.$link;
								$terms = get_the_terms($pdID, 'wtg_continent');								
								foreach ($terms as $term) { $termID = $term->term_id;}
								$termsParent = get_the_terms($pParentID, 'wtg_guide_type');
								foreach ($termsParent as $termParent) {$termParentSlug = $termParent->slug;}
								echo '<br />the parent of this cruise is a '.$termParentSlug;
								if ($termParentSlug == 'city')
								{
									$pGrandParentID = wp_get_post_parent_id( $pParentID );
									$cityID = $pParentID;
									$regionID = $pGrandParentID;
								}
								else
								{
									$cityID = 0;
									$regionID = $pParentID;
								}
								$legacyID = get_field('guide_legacy_id');
								$legactContinent = 0;
								$result = 
								$wpdb->insert( 'wtg_airports', array('WP_ID' => $pID, 'Legacy_ID' => $legacyID, 'WP_Continent' => $termID , 'WP_Region_ID' => $regionID, 'WP_City_ID' => $cityID, 'Title' => $title, 'Link' => $link),
											  array('%d','%d','%d','%d','%d','%s','%s'));
								echo $result; 
							endwhile;
						endif;

}

function cruise_redirects()
{
	global $wpdb;

							$aargs = array(
							'post_type'             => 'guides',
							'posts_per_page' 		=> -1,
							'order' 		=> 'ASC',
							'orderby'       => 'title',
							'tax_query'             => array(
								array(
											  'taxonomy' => 'wtg_guide_type',
											  'field'    => 'slug',
											  'terms'    => 'cruise',
											 
								),
							),
						);
							
						$postsQuery = new WP_Query($aargs);
						$count = 0;
						$result = true;
						if($postsQuery->have_posts()):
							while ($postsQuery->have_posts()):
								$postsQuery->the_post();								
								$pID = get_the_ID();
								$pParentID = wp_get_post_parent_id( $pID ); 
								$link = get_the_permalink();
								$title = get_the_title();
								$slug = basename(get_permalink());
//								echo '<br />'.$link;
	

								echo '<br />RewriteRule ^'.$slug.'([a-zA-Z0-9_-]+)?$ '.$link.'$1 [L,R=302]';
							endwhile;
						endif;

}
function wtg_region_redirects()
{
	global $wpdb;

							$aargs = array(
							'post_type'             => 'guides',
							'posts_per_page' 		=> -1,
							'order' 		=> 'ASC',
							'orderby'       => 'title',
							'tax_query'             => array(
								array(
											  'taxonomy' => 'wtg_guide_type',
											  'field'    => 'slug',
											  'terms'    => 'region',
											 
								),
							),
						);
							
						$postsQuery = new WP_Query($aargs);
						$count = 0;
						$result = true;
						if($postsQuery->have_posts()):
							while ($postsQuery->have_posts()):
								$postsQuery->the_post();								
								$pID = get_the_ID();
								$pParentID = wp_get_post_parent_id( $pID ); 
								$link = get_the_permalink();
								$title = get_the_title();
								$slug = basename(get_permalink());
	    $my_fake_pages = array(
        'history-language-culture' 		=> 'History',
		'weather-climate-geography' 	=> 'History',
		'business-communications' 		=> 'History',
		'pictures' 						=> 'History',
		'travel-by' 					=> 'History',
		'region-hotels' 				=> 'History',
		'things-to-do' 					=> 'History',
		'shopping-nightlife' 			=> 'History',
		'food-and-drink' 				=> 'History',
		'getting-around' 				=> 'History',
		'passport-visa' 				=> 'History',
		'public-holidays' 				=> 'History',
		'health' 						=> 'History',
		'money-duty-free' 				=> 'History',
		'geld-duty-free'				=> 'History',
		'events' 						=> 'History',
		
		'history' 						=> 'History',
		'weather' 						=> 'History',
		//'pictures' 						=> 'History',
		//'videos' 						=> 'History',
		'gettingaround' 				=> 'History',
		'things-to-see' 				=> 'History',
		'tours-excursions' 				=> 'History',
		'things-to-do-0' 				=> 'History',
		'shopping' 						=> 'History',
		'restaurants' 					=> 'History',
		'nightlife' 					=> 'History',
		'city-events' 					=> 'History',
		'travel-to' 					=> 'History',
		'hotels' 					=> 'History',
		
		'apres-ski' 					=> 'History',
		
		'airport-hotels' 				=> 'History',
		
    );

							
								echo '<br />RewriteRule ^'.$slug.'/unternehmungen '.$link.' [L,R=302]';
								echo '<br />RewriteRule ^'.$slug.'/reisemoglichkeiten-vor-ort '.$link.'things-to-do/ [L,R=302]';
								echo '<br />RewriteRule ^'.$slug.'/gesundheit '.$link.'health/ [L,R=302]';
								echo '<br />RewriteRule ^'.$slug.'/nutzliche-informationen '.$link.'things-to-do/ [L,R=302]';
								echo '<br />RewriteRule ^'.$slug.'/events '.$link.'events/ [L,R=302]';
								echo '<br />RewriteRule ^'.$slug.'/essen-trinken '.$link.'food-and-drink/ [L,R=302]';
								echo '<br />RewriteRule ^'.$slug.'/hotels '.$link.'region-hotels/ [L,R=302]';
								echo '<br />RewriteRule ^'.$slug.'/reisepasse-visa '.$link.'passport-visa/ [L,R=302]';
								echo '<br />RewriteRule ^'.$slug.'/feiertage '.$link.'public-holidays/ [L,R=302]';
								echo '<br />RewriteRule ^'.$slug.'/wetter-klima-geographie '.$link.'weather-climate-geography [L,R=302]';
								echo '<br />RewriteRule ^'.$slug.'/bildergalerie '.$link.'pictures/ [L,R=302]';
								echo '<br />RewriteRule ^'.$slug.'/geld-duty-free '.$link.' money-duty-free/ [L,R=302]';
								echo '<br />RewriteRule ^'.$slug.'/geschichte-sprache-kultur '.$link.'history-language-culture/ [L,R=302]';
								echo '<br />RewriteRule ^'.$slug.'/geschaftsreisen-kommunikation '.$link.'business-communications/ [L,R=302]';
								echo '<br />RewriteRule ^'.$slug.'/shopping-nachtleben '.$link.'shopping-nightlife/ [L,R=302]';
								echo '<br />RewriteRule ^'.$slug.'/anreise '.$link.'travel-by/ [L,R=302]';
								echo '<br />RewriteRule ^'.$slug.' '.$link.' [L,R=302]';
//								echo '<br />RewriteRule ^'.$slug.'([a-zA-Z0-9_-]+)?$ '.$link.'$1 [L,R=302]';
							endwhile;
						endif;

}


function wtg_city_redirects()
{
	global $wpdb;

							$aargs = array(
							'post_type'             => 'guides',
							'posts_per_page' 		=> -1,
							'order' 		=> 'ASC',
							'orderby'       => 'title',
							'tax_query'             => array(
								array(
											  'taxonomy' => 'wtg_guide_type',
											  'field'    => 'slug',
											  'terms'    => 'city',
											 
								),
							),
						);
							
						$postsQuery = new WP_Query($aargs);
						$count = 0;
						$result = true;
						if($postsQuery->have_posts()):
							while ($postsQuery->have_posts()):
								$postsQuery->the_post();								
								$pID = get_the_ID();
								$pParentID = wp_get_post_parent_id( $pID ); 
								$link = get_the_permalink();
								$title = get_the_title();
								$slug = basename(get_permalink());
								echo '<br />RewriteRule ^'.$slug.'/wetter '.$link.'weather/ [L,R=302]';
								echo '<br />RewriteRule ^'.$slug.'/events '.$link.'city-events/ [L,R=302]';
								echo '<br />RewriteRule ^'.$slug.'/restaurants '.$link.'restaurants/ [L,R=302]';
								echo '<br />RewriteRule ^'.$slug.'/events '.$link.'events/ [L,R=302]';
								echo '<br />RewriteRule ^'.$slug.'/nachtleben '.$link.'nightlife/ [L,R=302]';
								echo '<br />RewriteRule ^'.$slug.'/stadtverkehr '.$link.'gettingaround/ [L,R=302]';
								echo '<br />RewriteRule ^'.$slug.'/einkaufen '.$link.'shopping/ [L,R=302]';
								echo '<br />RewriteRule ^'.$slug.'/hotels '.$link.'hotels/ [L,R=302]';
								echo '<br />RewriteRule ^'.$slug.'/touren-ausfluge '.$link.'tours-excursions/ [L,R=302]';
								echo '<br />RewriteRule ^'.$slug.'/geschichte '.$link.'history/ [L,R=302]';
								echo '<br />RewriteRule ^'.$slug.'/reisen-nach '.$link.'travel-to/ [L,R=302]';
								echo '<br />RewriteRule ^'.$slug.' '.$link.' [L,R=302]';
								
//								echo '<br />RewriteRule ^'.$slug.'([a-zA-Z0-9_-]+)?$ '.$link.'$1 [L,R=302]';
							endwhile;
						endif;

}

function wtg_airport_redirects()
{
	global $wpdb;

							$aargs = array(
							'post_type'             => 'guides',
							'posts_per_page' 		=> -1,
							'order' 		=> 'ASC',
							'orderby'       => 'title',
							'tax_query'             => array(
								array(
											  'taxonomy' => 'wtg_guide_type',
											  'field'    => 'slug',
											  'terms'    => 'airport',
											 
								),
							),
						);
							
						$postsQuery = new WP_Query($aargs);
						$count = 0;
						$result = true;
						if($postsQuery->have_posts()):
							while ($postsQuery->have_posts()):
								$postsQuery->the_post();								
								$pID = get_the_ID();
								$pParentID = wp_get_post_parent_id( $pID );
								if ($pParentID) { $pParentID1  = wp_get_post_parent_id( $pParentID ); }
								if ($pParentID1) { $pParentID2  = wp_get_post_parent_id( $pParentID1 ); $pParentID = $pParentID1;}
								if ($pParentID2) { $pParentID3  = wp_get_post_parent_id( $pParentID2 ); $pParentID = $pParentID2;}
								if ($pParentID3) {$pParentID = $parentID3;}
								$link = get_the_permalink();
								$title = get_the_title();
								$slug = basename(get_permalink());
								$region = basename(get_permalink($pParentID));
								echo '<br />RewriteRule '.$region.'/'.$slug.' '.$link.' [L,R=302]';
							endwhile;
						endif;

}

?>
