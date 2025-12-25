<?php

function wtg_guide_content($postid)
{

    $language = 'en';

    $title = get_the_title($postid);
    $regionPageCategories = array 
    (
        'Intro' => 'Introducing '.$title,
        'Plan'  => 'Introducing '.$title,
        'There' => 'While you\'re there',
        'Info'  => 'Key Information',
    );

    $pages = array 
    (
    'region' => array 
    (
        'default'                   =>  array(  'xml' => 'region-overview.xsl',      'menu' => 'Overview',                          'menu-category' => 'Introducing '.$title),
        'pictures'                  =>  array(  'xml' => 'region-gallery.xsl',       'menu' => 'Image Gallery',                     'menu-category' => 'Introducing '.$title),
        'history-language-culture'  =>  array(  'xml' => 'region-histlang.xsl',      'menu' => 'History, Language & Culture',       'menu-category' => 'Introducing '.$title),
        'weather-climate-geography' =>  array(  'xml' => 'region-weather.xsl',       'menu' => 'Weather & Geography',               'menu-category' => 'Introducing '.$title),
        'business-communications'   =>  array(  'xml' => 'region-business.xsl',      'menu' => 'Doing business & staying in touch', 'menu-category' => 'Introducing '.$title),

        'travel-by'                 =>  array(  'xml' => 'region-travelto.xsl',      'menu' => 'Travelling to '.$title,             'menu-category' => 'Plan your trip'),
        'region-hotels'             =>  array(  'xml' => 'region-wherestay.xsl',         'menu' => 'Where to stay',                     'menu-category' => 'Plan your trip'),

        'things-to-do'              =>  array(  'xml' => 'region-thingsdo.xsl',      'menu' => 'Things to see and do',              'menu-category' => 'While you\'re there'),
        'shopping-nightlife'        =>  array(  'xml' => 'region-shopnight.xsl',     'menu' => 'Shopping & Nightlife',              'menu-category' => 'While you\'re there'),
        'food-and-drink'            =>  array(  'xml' => 'region-fooddrink.xsl',     'menu' => 'Food & drink',                      'menu-category' => 'While you\'re there'),
        'getting-around'            =>  array(  'xml' => 'region-gettingaround.xsl', 'menu' => 'Getting around',                    'menu-category' => 'While you\'re there'),

        'passport-visa'             =>  array(  'xml' => 'region-passvisa.xsl',      'menu' => 'Passport & Visa',                   'menu-category' => 'Key Information'),
        'health'                    =>  array(  'xml' => 'region-health.xsl',        'menu' => 'Health',                            'menu-category' => 'Key Information'),
        'public-holidays'           =>  array(  'xml' => 'region-pubhols.xsl',       'menu' => 'Public Holidays',                   'menu-category' => 'Key Information'),
        'money-duty-free'           =>  array(  'xml' => 'region-money.xsl',         'menu' => 'Money & duty free',                 'menu-category' => 'Key Information'),
    ),
    'city' => array
    (
        'default'                   =>  array(  'xml' => 'city-overview.xsl',        'menu' => 'About '.$title,                     'menu-category' => 'Introducing '.$title),
        'history'                   =>  array(  'xml' => 'city-history.xsl',         'menu' => 'History',                           'menu-category' => 'Introducing '.$title),    
        'weather'                   =>  array(  'xml' => 'city-weather.xsl',         'menu' => 'Weather / Best time to visit',      'menu-category' => 'Introducing '.$title),
        'pictures'                  =>  array(  'xml' => 'city-gallery.xsl',         'menu' => 'Image gallery',                     'menu-category' => 'Introducing '.$title),

        'gettingaround'             =>  array(  'xml' => 'city-gettingaround.xsl',   'menu' => 'Getting around',                    'menu-category' => 'While you\'re there'),
        'things-to-see'             =>  array(  'xml' => 'city-thingssee.xsl',       'menu' => 'Things to see',                     'menu-category' => 'While you\'re there'),
        'tours-excursions'          =>  array(  'xml' => 'city-tours.xsl',           'menu' => 'Tours & excursions',                'menu-category' => 'While you\'re there'),
        'things-to-do-0'            =>  array(  'xml' => 'city-thingsdo.xsl',        'menu' => 'Things to do',                      'menu-category' => 'While you\'re there'),
        'shopping'                  =>  array(  'xml' => 'city-shopping.xsl',        'menu' => 'Shopping',                          'menu-category' => 'While you\'re there'),
        'restaurants'               =>  array(  'xml' => 'city-restaurants.xsl',     'menu' => 'Restaurants',                       'menu-category' => 'While you\'re there'),
        'nightlife'                 =>  array(  'xml' => 'city-nightlife.xsl',       'menu' => 'Nightlife',                         'menu-category' => 'While you\'re there'),
        'city-events'               =>  array(  'xml' => 'city-events.xsl',          'menu' => 'Events',                            'menu-category' => 'While you\'re there'),

        'travel-to'                 =>  array(  'xml' => 'city-gettingthere.xsl',    'menu' => 'Travel to '.$title,                 'menu-category' => 'Plan your trip'),
        'hotels'                    =>  array(  'xml' => 'city-hotels.xsl',          'menu' => 'Hotels',                            'menu-category' => 'Plan your trip'),
    ),

    'airport' => array
    (
        'default'                   =>  array(  'xml' => 'airport-overview.xsl',        'menu' => 'About '.$title,                     'menu-category' => 'Introducing '.$title),
        'airport-hotels'            =>  array(  'xml' => 'airport-hotels.xsl',      'menu' => 'Hotels',                            'menu-category' => 'Introducing '.$title),
    ),

    'ski-resort' => array
    (
        'default'                   =>  array(  'xml' => 'ski-overview.xsl',        'menu' => 'About '.$title,                     'menu-category' => 'Introducing '.$title),
        'apres-ski'                 =>  array(  'xml' => 'ski-resortinfo.xsl',      'menu' => 'Resort Information',                'menu-category' => 'Introducing '.$title),
        'pictures'                  =>  array(  'xml' => 'ski-gallery.xsl',         'menu' => 'Images of '.$title,                 'menu-category' => 'Introducing '.$title),
    ),

    'beach-resort' => array
    (
        'default'                   =>  array(  'xml' => 'beach-overview.xsl',      'menu' => 'About '.$title,                     'menu-category' => 'Introducing '.$title),
        'pictures'                  =>  array(  'xml' => 'beach-gallery.xsl',       'menu' => 'Images of '.$title,                 'menu-category' => 'Introducing '.$title),
    ),
    'cruise' => array
    (
        'default'                   =>  array(  'xml' => 'cruise-overview.xsl',      'menu' => 'About '.$title,                     'menu-category' => 'Introducing '.$title),
    ),

    );

 /*   foreach ($pages['region'] as $key => $page)
    {
        echo $key.' '.$page['xml']; 
    }
*/

    $legacy_id = get_post_meta($postid,'guide_legacy_id',true);
if (get_the_title($postid) == 'Slovenia') { /*echo 'Slovenia: '.$legacy_id;*/ }
    $language = get_field('language','options');
    $guideTerms = get_the_terms($postid,'wtg_guide_type');
    $guideType = $guideTerms[0]->slug;
    $fp = get_query_var('fpage');
    if (!$fp) $fp='default';
    
    switch ($fp)
    {
        case 'hotel-listings' :
            echo 'Hotel Listings';
        break;

        case 'restaurant-listings' :
            echo 'Restaurant Listings';
        break;

        case 'attraction-listings' :
            echo 'Attraction Listings';
        break;

        case 'nightlife-listings' :
            echo 'Nightlife Listings';
        break;

        case 'city-attractions':
            echo '<h1>Top tickets in '.get_the_title().'</h1>';
            $scriptURL = get_field('viator_script_url', 'options');
            switch (get_field('new_viator_url', 'options')) {

    

                case false:

                    $widgetURL = get_field('widget_url');
                    if ($widgetURL) {
                        echo '<div data-vi-partner-id="P00039174" data-vi-language="en" data-vi-currency="GBP" data-vi-partner-type="AFFILIATE" data-vi-url="https://www.viator.com/en=GB/' . $widgetURL . '" data-vi-total-products="12"></div>';
                        echo '<script async src="'.$scriptURL.'"></script>';
                    } else {
                        echo '<h2>Coming Soon</h2>';
                    }
                break;

                case true:
                    $completeDiv = get_field('complete_div');
                    $newWidgetURL = get_field('new_widget_url');


                    if ($completeDiv)
                    {
                        echo $completeDiv;
                        echo '<script async src="'.$scriptURL.'"></script>';

                    } else {
                        if ($newWidgetURL) {
                            echo '<div data-vi-partner-id="P00039174" data-vi-language="en" data-vi-currency="GBP" data-vi-partner-type="AFFILIATE" data-vi-url="https://www.viator.com/' . $newWidgetURL . '" data-vi-total-products="12"></div>';
                            echo '<script async src="'.$scriptURL.'"></script>';
                        } else {
                            echo '<h2>Coming Soon</h2>';
                        }
                    }
                break;
                }
            break;

        default: 
            switch ($guideType)
            {
            case 'region' :
                $xmlpath = '/var/www/columbus-xml/filtered/regions-full-'.$language.'.xml';
                $xslpath = get_theme_file_path().'/wtg-data-sync/templates-'.$language.'/region/'.$pages['region'][$fp]['xml'];
                $guideRoot = '//Region';
            break;

            case 'city' :
                $xmlpath = '/var/www/columbus-xml/filtered/cities-full-'.$language.'.xml';
                $xslpath = get_theme_file_path().'/wtg-data-sync/templates-'.$language.'/city/'.$pages['city'][$fp]['xml'];
                $guideRoot = '//City';
            break;

            case 'airport' :
                $xmlpath = '/var/www/columbus-xml/filtered/airports-full-'.$language.'.xml';
                $xslpath = get_theme_file_path().'/wtg-data-sync/templates-'.$language.'/airport/'.$pages['airport'][$fp]['xml'];
                $guideRoot = '//Airport';
        
            break;

    	    case 'ski-resort':
                $xmlpath = '/var/www/columbus-xml/source-data/ski_resorts-full-'.$language.'.xml';
                $xslpath = get_theme_file_path().'/wtg-data-sync/templates-'.$language.'/ski/'.$pages['ski-resort'][$fp]['xml'];
                $guideRoot = '//SkiResort';
		    break;

            case 'beach-resort':
                $xmlpath = '/var/www/columbus-xml/source-data/beach_resorts-full-'.$language.'.xml';
                $xslpath = get_theme_file_path().'/wtg-data-sync/templates-'.$language.'/beach/'.$pages['beach-resort'][$fp]['xml'];
                $guideRoot = '//BeachResort';
	    	break;
	
	        case 'cruise':
                $xmlpath = '/var/www/columbus-xml/source-data/cruises-full-'.$language.'.xml';
                $xslpath = get_theme_file_path().'/wtg-data-sync/templates-'.$language.'/cruise/'.$pages['cruise'][$fp]['xml'];
                $guideRoot = '//Cruise';
			//echo $xmlpath.' '.$xslpath.' ';
            break;
            
            }
       

        $dom = new DOMDocument;
        $dom->load($xmlpath);

    	$xsl = new DOMDocument;
	    $xsl->load($xslpath);
	    $xslt   = new XSLTProcessor();
	    $xslt->importStylesheet($xsl);
	    $xp     = new DOMXPath($dom);
        $elements = $xp->query($guideRoot);

    
        ?>


        <?php
    //if ($fp == 'city-events') echo 'City events';

        if (!is_null($elements)) 
        {
            //if ($fp == 'city-events') echo 'City events';
		    //echo 'we have elements';
            foreach ($elements as $element) 
            {
                $title = $element->getAttribute('title');
                $nid = $element->getAttribute('nid');
                //if (get_the_title($postid) == 'Slovenia' ) { echo '<br />'.$title.' '. $nid; }
                if($legacy_id == $nid)
                {
                    if (($guideType == 'airport'))
                    {
                     //   echo 'the title is '.$title;
                    }
            	    $region_Doc = new DOMDocument();
                    $cloned = $element->cloneNode(TRUE);
                    $region_Doc->appendChild($region_Doc->importNode($cloned, True));
                    $regionpath = new DOMXPath($region_Doc);

                    //print $xslt->transformToXML($region_Doc);
                    
                    $guideContent = $xslt->transformToXML($region_Doc);
                    $modifiedGuideContent = explode ("<p>", $guideContent);
                    $modifiedGuideContent[2].= '<!-- code from Primis - NVU-Worldtravelguide - Worldtravelguide-NVU-Guide_Pages -->
                    <script type="text/javascript" language="javascript" src="https://live.sekindo.com/live/liveView.php?s=92825&cbuster=[CACHE_BUSTER]&pubUrl=[PAGE_URL_ENCODED]&subId=[SUBID_ENCODED]&vp_content=plembed5ddwkiryvqxs"></script>
                    <!-- code from Primis -->'; 
                    $guide_content = implode("<p>", $modifiedGuideContent); 
                    print $guide_content;
			    }
		    }
        }
      
        break;
    }
    
    if ($fp == 'default' && $guideType == 'region')
    {
        //echo '<h1>Default</h1>';
        echo '<div class="travel_advice">
        <div class="advice-icon"></div>
        <h4>Travel Advice</h4>';
 
        $region = strtolower(get_the_title());
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
        //echo 'Travel Advice for :'.$region;
        $json = file_get_contents('https://www.gov.uk/api/content/foreign-travel-advice/'.$region);
        $obj = json_decode($json);
        $details = $obj->details;
        $parts = $details->parts;
        foreach ($parts as $part){ 
        $content = $part->body;
        $content = str_replace ('href="/', 'href="https://gov.uk/', $content);
        echo $content;

        
        
        
        }
        echo '</div>';
    }


    if (($guideType == 'city'))  {
        
        
    if ($fp == 'weather')
    {
        echo '<span style="display:none"> Guidetype and fp'.$guideType.' '.$fp.'</span>'; wtg_cforecast_table($postid);
    }
    }
    wtg_guide_MPU();
}

function wtg_cruise_landing($postid)
{
	$intro = apply_filters('the_content', get_post_meta($postid, 'cruise_overview',true));
	$sight = apply_filters('the_content', get_post_meta($postid, 'cruise_sightseeing',true));
	$info = apply_filters('the_content', get_post_meta($postid, 'cruise_tourism_info_centers',true));
	$shop = apply_filters('the_content', get_post_meta($postid, 'cruise_shopping',true));
	$rest = apply_filters('the_content', get_post_meta($postid, 'cruise_restaurants',true));
	$when = apply_filters('the_content', get_post_meta($postid, 'cruise_whentogo',true));
	$near = apply_filters('the_content', get_post_meta($postid, 'cruise_nearestdestination',true));
	$transfer = apply_filters('the_content', get_post_meta($postid, 'cruise_transferdistance',true));
	$ttime = apply_filters('the_content', get_post_meta($postid, 'cruise_transfertime',true));
	

	?>
	<h1 itemprop="headline">About <?php echo get_the_title($postid);?></h1>
	<div itemprop="text">
	<?php echo $intro;?>
	<h3>Sightseeing:</h3>
	<?php echo $sight;?>
	<h3>Tourist information:</h3>
	<?php echo $info;?>
	<h3>Shopping introduction:</h3>
	<?php echo $shop;?>
	<h3>Restaurants:</h3>
	<?php echo $rest;?>
	<h3>When to go:</h3>
	<?php echo $when;?>
	<h3>Nearest destination:</h3>
	<?php echo $near;?>
	<h3>Transfer distance:</h3>
	<?php echo $transfer;?>
	<h3>Transfer time:</h3>
	<?php echo $ttime;?>
	</div>
<?php
}


function wtg_latest_articles_new()
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
	$firstImageID = get_post_meta($thefirst, 'main_image',true);
	$firstImageDetails = wp_get_attachment_image_src( $firstImageID, 'full');

	$imageIDs = array();
	foreach ($articleIDs as $aID){
		$iID = get_post_meta($aID, 'main_image', true);
		array_push($imageIDs,$iID);
	}
	
	echo '<div class="herobox_image">
        <div class="container">
            <div class="row">
                <div class="col-sm-6 no_padding_right">
                    <div class="article_box">

                        <a href="'.get_permalink($thefirst).'">
                            <img alt="email" src="'.$firstImageDetails[0].'"/>
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
                                <a href="'.get_permalink($articleIDs[0]).'">
                                    <img alt="email" src="'.wp_get_attachment_image_src( $imageIDs[0], 'full')[0].'">
                                    <h4>'.get_the_title($articleIDs[0]).'
                                    <span></span>
                                    </h4>
                                </a>
                                <div class="colour_mask"></div>
                            </div>
                        </div>

                        <div class="col-sm-6  col-xs-6 padding_left">
                            <div class="article_box">
                                <a href="'.get_permalink($articleIDs[1]).'">
                                    <img alt="email" src="'.wp_get_attachment_image_src( $imageIDs[1], 'full')[0].'">
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
                                <a href="'.get_permalink($articleIDs[2]).'">
                                    <img alt="email" src="'.wp_get_attachment_image_src( $imageIDs[2], 'full')[0].'">
                                    <h4>'.get_the_title($articleIDs[2]).'
                                      <span></span>
                                      </h4>
                                </a>
                                <div class="colour_mask"></div>
                            </div>
                        </div>
                        <div class="col-sm-6  col-xs-6 padding_left">
                            <div class="article_box">
                                <a href="'.get_permalink($articleIDs[3]).'">
                                    <img alt="email" src="'.wp_get_attachment_image_src( $imageIDs[3], 'full')[0].'">
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

function listings_summary_page($pageType)
{

$currentPageID= get_the_ID();
$postIDLocation = $_GET['location'];
$postIDLocation = $currentPageID;
//$pageType = $_GET['type'];
$price = $_GET['price'];
$guideTerms = get_the_terms($postIDLocation,'wtg_guide_type');
$guideType = $guideTerms[0]->slug;
$parentType = 'listing_city';
if ($guideType == 'region') $parentType = 'listing_region';
if ($guideType == 'airport') $parentType = 'listing_airport';
$postType = strtolower($pageType);
$carousel_images = get_gallery_attachments($postID, 'home_carousel');
//echo '<h1>'.$parentType.' '.$postType.' Guide type - '.$guideType.'</h1>';
/*$args = array 
    (
        'post_type' => $postType,
        'posts_per_page' => 9, 
        'meta_key' => $parentType,
        'meta_value' => $postID,
    ); */
    $args = array(
        'post_type' => $postType,
        'posts_per_page' => 9, 
        'meta_query' => array(
            'relation' => 'OR',
            array(
                'key' => $parentType,
                'value' => $postIDLocation,
                'compare' => '='
            ),
    
            array(
                'key' => 'region_parent',
                'value' => $postIDLocation,
                'compare' => '='
            )
        )
    );

$listings = new WP_Query($args);
?>
<style> #map { height: 500px; width: 100%; left:0; right:0; margin:auto; }</style>
<script>
    function initMap() 
    {
    // The map
    var image = 'https://developers.google.com/maps/documentation/javascript/examples/full/images/beachflag.png';
    var map = new google.maps.Map( document.getElementById('map'), { zoom: 0, zoomControl: false });
    var infoWindow = new google.maps.InfoWindow;
    var latlngbounds = new google.maps.LatLngBounds();
    <?php
    $i = 0;
    while ($listings->have_posts())
    { 
        $i++;
        $listings->the_post();
        $postID = get_the_ID();
        $name = 'listing'.$postID;   
        $listingTitle = get_field('listing_title',$postID);
        $listingTitle = preg_replace("/[^a-zA-Z0-9\s]/", "", $listingTitle);  
        $marker = 'marker'.$postID;        
        $latitude = get_field('listing_latitude', $postID);
        $longitude = get_field('listing_longitude', $postID);
        //if ($i > 1) $latitude = false;
        if ($latitude && $longitude)
        {
        $infoWinContentName = 'infowincontent'.$postID;
        $infoWinContent = '<h3>'.$listingTitle.'</h3>';
        echo "var label = '';";
        echo "var ".$name." = {lat: ".$latitude.", lng: ".$longitude."};";
        echo 'var '.$marker.' = new google.maps.Marker({position: '.$name.', map: map, label: label, icon: image });';
	    echo "latlngbounds.extend(".$name.");";
        echo 'var '.$infoWinContentName.' = ';
        echo '\''.$infoWinContent.'\';';    
        echo $marker.".addListener('click', function() {infoWindow.setContent(".$infoWinContentName."); infoWindow.open(map, ".$marker."); });";
        }
    }
    ?>
    map.fitBounds(latlngbounds);
    }
    </script>
      <!--Load the API from the specified URL
      * The async attribute allows the browser to render the page while the API loads
      * The key parameter will contain your own API key (which is not needed for this tutorial)
      * The callback parameter executes the initMap() function
      -->
<?php   
$args = array 
    (
        'post_type' => $postType,
        'posts_per_page' => 9, 
/*        'meta_key' => $parentType,
        'meta_value' => $postIDLocation, */
        'meta_query' => array(
            'relation' => 'OR',
            array(
                'key' => $parentType,
                'value' =>$postIDLocation,
                'compare' => '='
            ),
    
            array(
                'key' => 'region_parent',
                'value' => $postIDLocation,
                'compare' => '='
            )
            ),
        'tax_query' => array(
          array
            (
            'taxonomy' => 'wtg_listing_type',
            'field'    => 'slug',
            'terms'    => 'featured',
            ),
    ),	   
    );


$listingFeatured = new WP_Query($args);


if (!$price)
{
$args = array 
(
    'post_type' => $postType,
    'posts_per_page' => -1, 
    /*'meta_key' => $parentType,
    'meta_value' => $postIDLocation, */
    'meta_query' => array(
        'relation' => 'OR',
        array(
            'key' => $parentType,
            'value' =>$postIDLocation,
            'compare' => '='
        ),

        array(
            'key' => 'region_parent',
            'value' => $postIDLocation,
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
}
else
{
$args = array 
(
    'post_type' => $postType,
    'posts_per_page' => -1, 
    /*'meta_key' => $parentType,
    'meta_value' => $postIDLocation, */
    'meta_query' => array(
        'relation' => 'OR',
        array(
            'key' => $parentType,
            'value' =>$postIDLocation,
            'compare' => '='
        ),

        array(
            'key' => 'region_parent',
            'value' => $postIDLocation,
            'compare' => '='
        )
        ),
    'tax_query' => array
    (
      array
        (
        'taxonomy' => 'wtg_listing_type',
        'field'    => 'slug',
        'terms'    => 'regular',
        ),
        array
        (
            'taxonomy' => 'wtg_listing_price',
            'field'    => 'name',
            'terms'    => $price,
        )
    ),	
);
}

$listingStandard = new WP_Query($args);
$content = '[vc_single_image image="'.$carousel_images[0].'" img_size="full"]';
echo '
<div class="container box_list articles">';
echo '<h2><i class="icon icon_1"></i>'.$pageType.' Directory</h2>'; 

    //echo do_shortcode($content);
    echo '<div id="map"></div>';
    if ($listingFeatured->have_posts())
    {
        echo'
        <div class="row"><div class="col-sm-12"><h2>Our Featured '.$pageType.'s in '.get_the_title($postIDLocation).'</h2></div></div>
        <div class="row box_item" style="display: -webkit-box; display: -webkit-flex; display: -ms-flexbox; display:flex">';
            while($listingFeatured->have_posts())
            {
                $listingFeatured->the_post();
                $postIDfeature= get_the_ID();
                $prices = get_the_terms($postIDfeature, 'wtg_listing_price');
                $price = $prices[0]->name;
            echo '
            <div class="col-md-4 col-sm-6">
                <a href="'.get_the_permalink().'"><img src="'.get_field('listing_main_image', $post->ID).'" alt="" class="img-responsive"></a>
                <div class="col-sm-12 caption">
                    <h2 style="color:#1e73be; text-align:center;">'.get_field('listing_title', $post->ID).'</h2>
                    <p style="text-align: center;"><strong>Price: '.$price.'</strong></p>
                    <p>'.get_field('listing_introduction', $post->ID).'</p>
                </div>
                <div class="col-sm-12" style="padding-bottom:70px">
                    <p>'.get_field('listing_address_line_1', $post->ID).',<br />
                    '.get_field('listing_address_line_2', $post->ID).' '.get_field('listing_address_line_3', $post->ID).'</p>
                    <p>Tel:   '.get_field('listing_telephone', $post->ID).'<br />
                    Email: '.get_field('listing_email', $post->ID).'<br />
                    Web: '.get_field('listing_website', $post->ID).'</p>
                </div>
                <div style="position:absolute; width: calc(100% - 30px); bottom: 0; left:0; right:0; margin:auto; text-align:center;"> 
                    <a href="'.get_the_permalink($post->ID).'"><button style="width:100%; background-color:#58b9da; color: #fff; padding-top:18px; padding-bottom:18px">More Information</button></a>
                </div>
            </div>';
        }
        echo '
    </div>';
    }

        echo '
        <div class="row">
            <div class="col-sm-12">
                <h2>'.$pageType.'s in '.get_the_title($postIDLocation).' to consider</h2>
                <div class="row" style="background-color:#e6e3ed; padding-top:25px; padding-bottom:25px; margin-bottom:25px">
                    <div class="col-sm-12"><strong>Filter By Price:</strong> 
                        <a href="'.get_the_permalink($postIDLocation).'/'.$postType.'-listings/?price=Cheap">Cheap</a> - 
                        <a href="'.get_the_permalink($postIDLocation).'/'.$postType.'-listings/?price=Moderate">Moderate</a> - 
                        <a href="'.get_the_permalink($postIDLocation).'/'.$postType.'-listings/?price=Luxury">Luxury</a>
                    </div>
                </div>
            </div>
        </div>';
    if ($listingStandard->have_posts())
    {
        while ($listingStandard->have_posts())
        {
            $listingStandard->the_post();
            $postIDStandard= get_the_ID();
            $prices = get_the_terms($postIDStandard, 'wtg_listing_price');
            $price = $prices[0]->name;
            $img = get_field('listing_main_image', $post->ID);
            if (!$img) $img = get_template_directory_uri().'/listingImages/i'.$postIDStandard.'.png';
            echo '
            <style> .listingImage {padding-bottom:10px} </style>
            <div class="row box_item" style="margin-bottom:25px; padding-top:10px; border:1px solid #1e73be;">
            <div class="col-sm-4 listingImage"><div style="width:100%; height:100%; background-position:center; background-size:cover; background-repeat:no-repeat; background-image:url(\''.$img.'\')"></div></div> 
                     <!-- [vc_btn title="Vist Hotel" align="center"] -->
                <div class="col-sm-8">
                    <h3>'.get_field('listing_title', $post->ID).'</h3>
                    <p>'.get_field('listing_introduction', $post->ID).'</p>
                     <div class="row">
                        <div class="col-sm-4">
                          <p>'.get_field('listing_address_line_1', $post->ID).',<br />
                            '.get_field('listing_address_line_2', $post->ID).',<br /> 
                            '.get_field('listing_address_line_3', $post->ID).'<br /></p>
                        </div>
                        <div class="col-sm-5">
                         <p>Tel:   '.get_field('listing_telephone', $post->ID).'<br />
                            Email: '.get_field('listing_email', $post->ID).'<br />
                            Web: <a href="'.get_field('listing_website', $post->ID).'"><span style="font-size:13px">'.get_field('listing_website', $post->ID).'</span></a><br /></p>
                        </div>
                        <div class="col-sm-3">
                            <p style="text-align: center;"><strong>Price: '.$price.'</strong></p>
                            <div style="text-align: center;">
                                <a href="'.get_field('listing_website', $post->ID).'"><button style="background-color:#f7be68; color:#FFF; font-size:14px; padding-top:8px; padding-bottom:8px; padding-left:20px; padding-right:20px">Visit Hotel</button></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>';

        }
    }
    else
    {
        if ($price) {echo ' No listings in the '.$price.' price range';} else {echo 'No listings';}
    }
}

    function get_posts_children($parent_id)
    {
        $children = array();
        // grab the posts children
        $posts = get_posts( array( 'numberposts' => -1, 'post_status' => 'publish', 'post_type' => 'guide', 'post_parent' => $parent_id, 'suppress_filters' => false ));
        // now grab the grand children
        foreach( $posts as $child ){
            // recursion!! hurrah
            $gchildren = get_posts_children($child->ID);
            // merge the grand children into the children array
            if( !empty($gchildren) ) {
                $children = array_merge($children, $gchildren);
            }
        }
        // merge in the direct descendants we found earlier
        $children = array_merge($children,$posts);
        return $children;
    }


    function wtg_cforecast_table($postID)
{
    
    echo '<span style="display:none">wtg_cforecast_table</span>';
    //$forecastArray = array();
	//$count = 0
   $locationID = get_post_meta($postID,'7_day_id',true);
    //echo "location ID: $locationID";
	//if ( have_rows('forecast', $postID)):
    if (get_post_meta($postID,'forecast_0_pressure',true) != ''):
     ?>
    <table class="views-table cols-9" style="padding-top:30px">
        <thead>
            <tr>
                <th class="views-field views-field-date"></th>
                <th class="views-field views-field-overhead-icon">Weather (day)</th>
                <th class="views-field views-field-overhead"></th>
                <th class="views-field views-field-night-min">Temp (max day)</th>
                <th class="views-field views-field-precipitation">Rain (mm) </th>
                <th class="views-field views-field-wind-dir">Wind (mph) </th>
                <th class="views-field views-field-visibility">Humidity Pressure Visibility </th>
            </tr>
        </thead>
        <tbody>
    <?php
        //$day_array = array('0','2','4','8','10','12','14');
        //$night_array = array('1','3','5','7','9','11','13');
        
        $max = 7;
        for($i1 = 0; $i1< $max; $i1++){
            //if ($i1%2==0){

                $i = (string) $i1;
                $pressure_string = 'forecast_'.$i.'_pressure';
                $pressure       = get_post_meta($postID,$pressure_string,true);
                
                $visibility_string  = 'forecast_'.$i.'_visibility';
                $visibility         = get_post_meta($postID,$visibility_string,true);
                
                $cloudcover_string  = 'forecast_'.$i.'_cloudcover';
                $cloudcover         = get_post_meta($postID,$cloudcover_string,true);
                
                $date_string        = 'forecast_'.$i.'_date';
                $date               = get_post_meta($postID,$date_string,true);
                
                $precipitation_string  = 'forecast_'.$i.'_precipitation';
                $precipitation         = get_post_meta($postID,$precipitation_string,true);
                
                $windspeedkph_string  = 'forecast_'.$i.'_windspeedkph';
                $windspeedkph         = get_post_meta($postID,$windspeedkph_string,true);
                
                $overhead_string  = 'forecast_'.$i.'_overhead';
                $overhead         = get_post_meta($postID,$overhead_string,true);
                
                $day_string  = 'forecast_'.$i.'_day';
                $day         = get_post_meta($postID,$day_string,true);
                
                $windspeedmph_string  = 'forecast_'.$i.'_windspeedmph';
                $windspeedmph         = get_post_meta($postID,$windspeedmph_string,true);
                
                $forecastid_string  = 'forecast_'.$i.'_forecastid';
                $forecastid         = get_post_meta($postID,$forecastid_string,true);
                
                $humidity_string  = 'forecast_'.$i.'_humidity';
                $humidity         = get_post_meta($postID,$humidity_string,true);
                
                //$nightmin_string  = 'forecast_'.$day.'_pressure';
                //$nightmin         = get_post_meta($postID,$nightmin_string,true);
                
                $forecastname_string  = 'forecast_'.$i.'_forecastname';
                $forecastname         = get_post_meta($postID,$forecastname_string,true);
                
                $locationid_string  = 'forecast_'.$i.'_locationid';
                $locationid         = get_post_meta($postID,$locationid_string,true);
                
                $overheadicon_string  = 'forecast_'.$i.'_overhead_icon';
                $overheadicon         = get_post_meta($postID,$overheadicon_string,true);
                //echo $overheadicon_string;
                
                $daymax_string  = 'forecast_'.$i.'_daymax';
                $daymax         = get_post_meta($postID,$daymax_string,true);
    
                $winddir_string  = 'forecast_'.$i.'_wind_dir';
                $winddir         = get_post_meta($postID,$winddir_string,true);
                
                $withoutExt = preg_replace('/\\.[^.\\s]{3,4}$/', '', $overheadicon);
                
                $tDate = '';
                $ttDate='';
                if(!empty($date)){
                    $date_elements = explode("/", $date );
                    $date_format = $date_elements[2].'-'.$date_elements[1].'-'.$date_elements[0];
                    $tDate=date_create($date_format);
                    $ttDate =  date_format($tDate,'l');
                    //$tDate = getWeekday($date);
                }
                //$tDate = date('l d F', $date);
    
                    //if(strstr($date, '/')){
                        echo "<tr class='odd views-row-first'>
                            <td class='views-field views-field-date'>$ttDate</td>
                            
                            <td class='views-field views-field-overhead-icon'>
                                <div class='weatherIconWithDescription'>
                                    <div class='weatherIconWrapper'>
                                        <div class='weatherIcon $withoutExt'>$withoutExt</div>
                                    </div>
                                </div>
                            </td>
                            
                            <td class='views-field views-field-overhead'>
                              <span class='textWeatherDescription'>$overhead</span>
                            </td>
                            
                            <td class='views-field views-field-night-min'>
                      
                                <div class='tempNoIcon'>
                                    <div class='tempUnit digit_0'>$daymax</div>
                                    <div class='tempDegrees'>°C</div>
                                </div>
                            </td>
                            
                            <td class='views-field views-field-precipitation'>$precipitation </td>
                            
                            <td class='views-field views-field-wind-dir'>
                                <div class='windDirectionIcon wind-dir-$winddir'>
                                    <div class='windSpeedIcon wind-speed-3'>$windspeedmph</div>
                                </div>
                      
                                <div class='windDirectionText'>$winddir</div>
                            </td>
                            
                            <td class='views-field views-field-visibility'>$cloudcover%<br>$pressure mb<br>$visibility</td>
                        </tr>";
            
        }
		//while (have_rows('forecast', $postID)) :the_row();
			//$daymax = get_sub_field('daymax');
			//if($daymax!=''){
                
                /*
				$pressure       = get_sub_field('pressure');
                $visibility     = get_sub_field('visibility');
                $cloudcover     = get_sub_field('cloudcover');
                $date           = get_sub_field('date');
                $precipitation  = get_sub_field('precipitation');
                $windspeedkph   = get_sub_field('windspeedkph');
                $overhead       = get_sub_field('overhead');
                $day            = get_sub_field('day');
                $windspeedmph   = get_sub_field('windspeedmph');
                $forecastid     = get_sub_field('forecast_id');
                $humidity       = get_sub_field('humidity');
                $nightmin       = get_sub_field('nightmin');
                $forecastname   = get_sub_field('forecast_name');
                $locationid     = get_sub_field('location_id');
                $overheadicon   = get_sub_field('overhead_icon');
                $daymax         = get_sub_field('daymax');
                $updatedate      = get_sub_field('updated_at');
                $winddir        = get_sub_field('wind_dir');
                */
                /*
                $withoutExt = preg_replace('/\\.[^.\\s]{3,4}$/', '', $overheadicon);

                //if(strstr($date, '/')){
                    echo "<tr class='odd views-row-first'>
                        <td class='views-field views-field-date'>$date</td>
                        
                        <td class='views-field views-field-overhead-icon'>
                            <div class='weatherIconWithDescription'>
                                <div class='weatherIconWrapper'>
                                    <div class='weatherIcon $withoutExt'>$withoutExt</div>
                                </div>
                            </div>
                        </td>
                        
                        <td class='views-field views-field-overhead'>
                          <span class='textWeatherDescription'>$overhead</span>
                        </td>
                        
                        <td class='views-field views-field-night-min'>
                  
                            <div class='tempNoIcon'>
                                <div class='tempUnit digit_0'>$daymax</div>
                                <div class='tempDegrees'>°C</div>
                            </div>
                        </td>
                        
                        <td class='views-field views-field-precipitation'>$precipitation </td>
                        
                        <td class='views-field views-field-wind-dir'>
                            <div class='windDirectionIcon wind-dir-$winddir'>
                                <div class='windSpeedIcon wind-speed-3'>$windspeedmph</div>
                            </div>
                  
                            <div class='windDirectionText'>$winddir</div>
                        </td>
                        
                        <td class='views-field views-field-visibility'>$cloudcover%<br>$pressure mb<br>$visibility</td>
                    </tr>";
                //}
                */
                
                
                
			//}
			//$count++;
		//endwhile;
    ?>
        </tbody>
      </table>

<div class="cityWeatherHelpRow">
    <div class="cityWeatherLastUpdated">
          <span class="toggleArrowRight"></span>
          <?php
            $updatedate_string  = 'forecast_0_updated_at';
            $updatedate         = get_post_meta($postID,$updatedate_string,true);
            $updated = date('Y-m-d H:i:s',$updatedate);
          ?>
          
    </div>
    <span class="cityWeatherHelpButton weatherHelpClosed">View help </span>
    <span class="cityWeatherHelpButton weatherHelpOpen weatherHelpClose">Close help </span>
</div>
<div id="city-weather-help">

    <div>
        <strong>Last updated:</strong> <?php echo $updated;?><br/>
        We update the weather data for <?php echo $title;?> from our weather partner every four hours.
        The time the last update was received is detailed here. </div>
    
    <div>Actual <strong>Forecast Location:</strong> We have 830+ weather locations on the worldtravelguide.net website.
    Where no exact location is available we have used the nearest appropriate forecast point. </div>
    
    <div><strong>Symbols</strong> indicate the predominant weather for the day in question,
    calculated based on a weighting of different types of weather.
    So if a day is forecast to be sunny with the possibility of a brief shower,
    then we will see a sunny or partly cloudy symbol rather than a rain cloud.</div>
    
    <div>The maximum <strong>temperature</strong> is the highest temperature forecast between dawn and dusk,
    and the minimum temperature is the lowest temperature expected from dusk on the day
    in question to dawn the next day.
    The temperature is in &deg;C, or Celsius. </div>
    
    <div><strong>Wind speed and direction</strong> are the conditions expected at midday.
    Wind direction is based on a 16 point compass. W, SW, SSW, etc.
    The wind direction states where the wind originates.
    Wind speed is listed in MPH or miles per hour. </div>
    
    <div><strong>Humidity</strong> levels indicates how much water vapour the air
    contains compared to the maximum it could contain at that temperature.
    As a general guide: </div>

    <ul>
        <li>0 to 30 is very low </li>
        <li>31 to 50 is low </li>
        <li>51 to 70 is moderate to low </li>
        <li>71 to 80 is moderate </li>
        <li>81 to 90 is moderate to high</li>
        <li>91 to 100 is high</li>
    </ul>
    <div>Pressure is measured in millibars (mb) </div>

    <div><strong>Visibility</strong> based on whether the human eye can see the following distances: </div>
    <ul>
        <li>Very poor - less than 1km </li>
        <li>Poor - between 1km and 4km </li>
        <li>Moderate - between 4km and 10km </li>
        <li>Good - between 10km and 20km </li>
        <li>Very good - between 20km and 40km </li>
        <li>Excellent - more than 40km</li>
    </ul>
    
    <div class="cityWeatherHelpButton weatherHelpClose">Close<span class="toggleArrowUp"></span>
    </div>

</div>
<script>
    (function( $ ){
        $('#city-weather-help').hide();
        $('.cityWeatherHelpButton.weatherHelpOpen').hide();
        
        $('.cityWeatherHelpButton.weatherHelpClosed').click(function(){
            $('#city-weather-help').show();
            $('.cityWeatherHelpButton.weatherHelpOpen').show();
            $('.cityWeatherHelpButton.weatherHelpClosed').hide();
            
            $('.cityWeatherHelpButton.weatherHelpClose').click(function(){
                $('#city-weather-help').hide();
                $('.cityWeatherHelpButton.weatherHelpOpen').hide();
                $('.cityWeatherHelpButton.weatherHelpClosed').show();
            });
        });
        
        
    })( jQuery );
</script>

    <?php
	endif;
    ?>
    
    
    
    <?php
    function getWeekday($date) {
        return date('l', $date);
    }
    
}
?>