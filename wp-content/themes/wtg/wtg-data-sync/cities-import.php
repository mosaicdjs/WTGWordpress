<?php

global $_SERVER;

$POSTTYPE = 'guides';
$GUIDETYPE = 'city';
$INSERTNEW = false;

$_SERVER['HTTP_HOST'] = 'www.worldtravelguide.net';
$_SERVER['REQUEST_URI'] = '/';

require_once('../../../../wp-load.php');

$wtgArray = array(
    '1' => 'en',//World Travel Guide
    //'2' => 'en',
    //'3' => 'de',//World of Foood and Drink
    //'4' => 'en',//Der Reise Fuehrer
    //'5' => 'en',//Spainish
    //'6' => 'de',//Der Reise Fuehrer Dev
);


foreach ($wtgArray as $wtgID => $wtgLang){
    //switch_to_blog( (int)$wtgID );
    
    $blog_title = get_bloginfo();
    echo 'The blog is'.$blog_title;
    //$blog_title ='test';
    
    $file = "/var/www/columbus-xml/filtered/cities-full-en.xml";
    
    $debugString = "";
    $debugString .= "Current site: $blog_title\n";
    $debugString .= "Blog ID: $wtgID\n";
    $debugString .= "Blog Lang: $wtgLang\n";
    $debugString .= "Import File: $file\n\n";

    echo($debugString);

    $xml = new DOMDocument();
    $xml->preserveWhiteSpace = FALSE;
    $xml->load($file);
    
    $xp    = new DOMXPath($xml);
    $elements = $xp->query('//City[@*]');
    
    //var_dump($nodes);
    $i=0;
    if (!is_null($elements)) {
        foreach ($elements as $element) {
            $title = $element->getAttribute('title');
            $nid = $element->getAttribute('nid');
            
            echo "Title: $title | nid: $nid\n";
            $match;
            
            switch($nid){
                case 854997://singapore
                    $match = get_post(5590);
                    break;
                case 861079://hong kong city
                    $match = get_post(5589);
                    break;
                case 855027://singapur
                    $match = get_post(12907);
                default:
                    $match = get_page_by_title($title, OBJECT, 'guides');
                    break;
            }
    
            $wpID = $match->ID;
            $guideTerms = get_the_terms($wpID,'wtg_guide_type');
            $guideType = $guideTerms[0]->slug;
            
            
            //var_dump($match);
            // echo '<br/>';
            if($guideType == 'city'){
                if($nid != '2834512'){ //why the fuck is a french city translation in the engish export files??
 //                   echo "true: $guideType";
                    //update_field($selector, $value, $post_id);
                    update_post_meta($wpID,'guide_legacy_id',$nid);
                    
                    $city_Doc = new DOMDocument();
                    $cloned = $element->cloneNode(TRUE);
                    $city_Doc->appendChild($city_Doc->importNode($cloned, True));
                    $citypath = new DOMXPath($city_Doc);
                    
                    //city Overview
                    $content_tag = $citypath->query("//Content/Overview/Overview");
                    $content = trim($content_tag->item(0)->nodeValue);
                    update_field('city_overview', $content, $wpID);
                                   $trimmedExcerpt = substr($content, 0, 319);
                //echo 'first trim is <br />'.$trimmedExcerpt;
                $endOfString = strrpos ( $trimmedExcerpt, '.', 0 );
                $endOfStringsemi = strrpos ( $trimmedExcerpt, ';', 0 );
                if ($endOfStringsemi > $endOfString) {$endOfString = $endOfStringsemi; }
                $trimmedExcerpt = substr($trimmedExcerpt, 0, $endOfString+1);
                // echo '<br />The trimmed excerpt is'.$trimmedExcerpt;  
                
                 $my_post = array(
                    'ID'           => $wpID,
                    'post_excerpt' => $trimmedExcerpt,
                );

                 
                // Update the post into the database
                wp_update_post( $my_post, true );
                 // echo '<br />Updated excerpt';  
            if (is_wp_error($wpID)) {
            	$errors = $wpID->get_error_messages();
            	foreach ($errors as $error) {
    		// echo $error;
           	}
            }
                    
                    //echo $content.'<br/><br/>';
                    
                    // Exchange rates
                    $exchangeRates = $citypath->query("//Content/General/ExchangeRates/ExchangeRate");
                    if (!is_null($exchangeRates)) {
                        $exID = 1;
                        foreach($exchangeRates as $exchangeRate){
                            $ex_Doc = new DOMDocument();
                            $ex_clone = $exchangeRate->cloneNode(TRUE);
                            $ex_Doc->appendChild($ex_Doc->importNode($ex_clone, TRUE));
                            $expath = new DOMXPath($ex_Doc);
    
                            //Currency symbol
                            $cursymbol_tag = $expath->query("//CurrencySymbol");
                            $cursymbol = trim($cursymbol_tag->item(0)->nodeValue);
                            //rate
                            $rate_tag = $expath->query("//Rate");
                            $rate = trim($rate_tag->item(0)->nodeValue);
                            //echo "$rate <br/>";
                            
                            //date updated
                            $date_updated_tag = $expath->query("///DateUpdated");
                            $date_updated = trim($date_updated_tag->item(0)->nodeValue);
                            //source
                            $source_tag = $expath->query("//Source");
                            $source = trim($source_tag->item(0)->nodeValue);
                            //from currency
                            $fcurrency_tag = $expath->query("//FromCurrency");
                            $fcurrency = trim($fcurrency_tag->item(0)->nodeValue);
                            //to currenct
                            $tcurrency_tag = $expath->query("//ToCurrency");
                            $tcurrency = trim($tcurrency_tag->item(0)->nodeValue);
                            
                            
                            $repeater = get_post_meta($wpID, 'city_exchangerates', true);
    
                            //If there are no rows yet just set to 1, otherwise +1
                            $new_repeater_count = ( !$repeater ? 1 : $repeater + 1 );
                            //update_post_meta($wpID, 'city_exchangerates', $new_repeater_count);
                            
                            update_sub_field(array('city_exchangerates',$exID,'source'), $source, $wpID);
                            update_sub_field(array('city_exchangerates',$exID,'currencysymbol'), $cursymbol, $wpID);
                            update_sub_field(array('city_exchangerates',$exID,'fromcurrency'), $fcurrency, $wpID);
                            update_sub_field(array('city_exchangerates',$exID,'dateupdated'), $date_updated, $wpID);
                            update_sub_field(array('city_exchangerates',$exID,'rate'), $rate, $wpID);
                            update_sub_field(array('city_exchangerates',$exID,'tocurrency'), $tcurrency, $wpID);
                                    
                            
                            
                            $exID=$exID+1;
                        }
                    }
                    
                    
                    
                    //timezone
                    //city list
                    $city_list_tag = $citypath->query("//Content/General/TimeZone/TimeZone/CityListValue");
                    $city_list = trim($city_list_tag->item(0)->nodeValue);
                    //stdtznamevalue
                    $stdtznamevalue_tag = $citypath->query("//Content/General/TimeZone/TimeZone/StdTzNameValue");
                    $stdtznamevalue = trim($content_tag->item(0)->nodeValue);
                    //regionnamevalue
                    $regionnamevalue_tag = $citypath->query("//Content/General/TimeZone/TimeZone/RegionNameValue");
                    $regionnamevalue = trim($stdtznamevalue_tag->item(0)->nodeValue);
                    //language
                    $language_tag = $citypath->query("//Content/General/TimeZone/TimeZone/Language");
                    $language = trim($language_tag->item(0)->nodeValue);
                    //stdbiasvalue
                    $stdbiasvalue_tag = $citypath->query("//Content/General/TimeZone/TimeZone/StandardBiasValue");
                    $stdbiasvalue = trim($stdbiasvalue_tag->item(0)->nodeValue);
                    
                    $stdbiasSecsvalue_tag = $citypath->query("//Content/General/TimeZone/TimeZone/StdBiasSecsValue");
                    $stdbiasSecsvalue = trim($stdbiasSecsvalue_tag->item(0)->nodeValue);
                    //stdabbrvalue
                    $stdabbrvalue_tag = $citypath->query("//Content/General/TimeZone/TimeZone/StdTzAbbrValue");
                    $stdabbrvalue = trim($stdabbrvalue_tag->item(0)->nodeValue);
                    //countrynamevalue
                    $tcountryname_tag = $citypath->query("//Content/General/TimeZone/TimeZone/CountryNameValue");
                    $tcountryname = trim($tcountryname_tag->item(0)->nodeValue);
                    //description
                    $tdescription_tag = $citypath->query("//Content/General/TimeZone/TimeZone/Description");
                    $tdescription = trim($tdescription_tag->item(0)->nodeValue);
                    
                    $thisYearUtcStartValue_tag = $citypath->query("//Content/General/TimeZone/TimeZone/ThisYearUtcStartValue");
                    $thisYearUtcStartValue = trim($thisYearUtcStartValue_tag->item(0)->nodeValue);
                    
                    $thisYearUtcEndValue_tag = $citypath->query("//Content/General/TimeZone/TimeZone/ThisYearUtcEndValue");
                    $thisYearUtcEndValue = trim($thisYearUtcEndValue_tag->item(0)->nodeValue);
                    
                    $dstBiasValue_tag = $citypath->query("//Content/General/TimeZone/TimeZone/DstBiasValue");
                    $dstBiasValue = trim($dstBiasValue_tag->item(0)->nodeValue);
                    
                    $dstBiasSecsValue_tag = $citypath->query("//Content/General/TimeZone/TimeZone/DstBiasSecsValue");
                    $dstBiasSecsValue = trim($dstBiasSecsValue_tag->item(0)->nodeValue);
                    //$repeater = get_post_meta($wpID, 'city_timezone', true);
    
                    //If there are no rows yet just set to 1, otherwise +1
                    //$new_repeater_count = ( !$repeater ? 1 : $repeater + 1 );
                    //update_post_meta($wpID, 'city_timezone', $new_repeater_count);
                    
                    $ctz1 = 'city_timezone_0_citylistvalue';
                    $ctz2 = 'city_timezone_0_stdtznamevalue';
                    $ctz3 = 'city_timezone_0_region_name_value';
                    $ctz4 = 'city_timezone_0_language';
                    $ctz5 = 'city_timezone_0_standardbiasvalue';
                    $ctz6 = 'city_timezone_0_stdbiassecvalue';
                    $ctz7 = 'city_timezone_0_stdtzabbrvalue';
                    $ctz8 = 'city_timezone_0_countrynamevalue';
                    $ctz9 = 'city_timezone_0_description';
                    $ctz10 = 'city_timezone_0_thisyearutcstartvalue';
                    $ctz11 = 'city_timezone_0_thisyearutcendvalue';
                    $ctz12 = 'dstbiasvalue';
                    $ctz13 = 'dstbiassecsvalue';
                    
                    update_post_meta($wpID,$ctz1,$city_list);
                    update_post_meta($wpID,$ctz2,$stdtznamevalue);
                    update_post_meta($wpID,$ctz3,$regionnamevalue);
                    update_post_meta($wpID,$ctz4,$language);
                    update_post_meta($wpID,$ctz5,$stdbiasvalue);
                    update_post_meta($wpID,$ctz6,$stdbiasSecsvalue);
                    update_post_meta($wpID,$ctz7,$stdabbrvalue);
                    update_post_meta($wpID,$ctz8,$tcountryname);
                    update_post_meta($wpID,$ctz9,$tdescription);
                    update_post_meta($wpID,$ctz10,$thisYearUtcStartValue);
                    update_post_meta($wpID,$ctz11,$thisYearUtcEndValue);
                    delete_post_meta($wpID, $ctz12);
                    update_post_meta($wpID,$ctz12,$dstBiasValue);
                    delete_post_meta($wpID, $ctz13);
                    update_post_meta($wpID, $ctz13, $dstBiasSecsValue);
                    $true = true;              
        
                    
                    echo '<br /> dstBiasValue '.$dstBiasValueSec;
                    echo '<br /> updated to '.get_post_meta($wpID,$ctz13,$true);
                        
                    /*     
                    update_sub_field(array('city_timezone',1,'citylistvalue'), $city_list, $wpID);
                    update_sub_field(array('city_timezone',1,'stdtznamevalue'), $stdtznamevalue, $wpID);
                    update_sub_field(array('city_timezone',1,'region_name_value'), $regionnamevalue, $wpID);
                    update_sub_field(array('city_timezone',1,'language'), $language, $wpID);
                    update_sub_field(array('city_timezone',1,'standardbiasvalue'), $stdbiasvalue, $wpID);
                    update_sub_field(array('city_timezone',1,'stdbiassecvalue'), $stdbiasSecsvalue, $wpID);
                    update_sub_field(array('city_timezone',1,'stdtzabbrvalue'), $stdabbrvalue, $wpID);
                    update_sub_field(array('city_timezone',1,'countrynamevalue'), $tcountryname, $wpID);
                    update_sub_field(array('city_timezone',1,'description'), $tdescription, $wpID);
                            
                    */
                    
                    
                    
                    //flights
                    $flightsintro_tag = $citypath->query("//Content/Flights/Intro");
                    $flightsintro = trim($flightsintro_tag->item(0)->nodeValue);
                    update_field('city_flights_intro', $flightsintro, $wpID);
                    
                    $flightstimes_tag = $citypath->query("//Content/Flights/Times");
                    $flightstimes = trim($flightstimes_tag->item(0)->nodeValue);
                    update_field('city_flights_times', $flightstimes, $wpID);
                    
                    //rail
                    $rail_services_tag = $citypath->query("//Content/Rail/Services");
                    $rail_services = trim($rail_services_tag->item(0)->nodeValue);
                    update_field('rail_services', $rail_services, $wpID);
                    
                    $rail_operators_tag = $citypath->query("//Content/Rail/Operators");
                    $rail_operators = trim($rail_operators_tag->item(0)->nodeValue);
                    update_field('rail_operators', $rail_operators, $wpID);
                    
                    $rail_journeytimes_tag = $citypath->query("//Content/Rail/JourneyTimes");
                    $rail_journeytimes = trim($rail_journeytimes_tag->item(0)->nodeValue);
                    update_field('rail_journey_times', $rail_journeytimes, $wpID);
                    
                    //road
                    $road_summary_tag = $citypath->query("//Content/Road/Summary");
                    $road_summary = trim($road_summary_tag->item(0)->nodeValue);
                    update_field('road_summary', $road_summary, $wpID);
                    
                    $road_emergency_tag = $citypath->query("//Content/Road/Emergency");
                    $road_emergency = trim($road_emergency_tag->item(0)->nodeValue);
                    update_field('road_emergency', $road_emergency, $wpID);
                    
                    $road_routes_tag = $citypath->query("//Content/Road/Routes");
                    $road_routes = trim($road_routes_tag->item(0)->nodeValue);
                    update_field('road_routes', $road_routes, $wpID);
                    
                    $road_coaches_tag = $citypath->query("//Content/Road/Coaches");
                    $road_coaches = trim($road_coaches_tag->item(0)->nodeValue);
                    update_field('road_coaches', $road_coaches, $wpID);
                    
                    $road_driving_tag = $citypath->query("//Content/Road/Driving");
                    $road_driving = trim($road_driving_tag->item(0)->nodeValue);
                    update_field('road_driving_times', $road_driving, $wpID);
                    
                    $road_ttCity_tag = $citypath->query("//Content/Road/TimeToCity");
                    $road_ttCity = trim($road_ttCity_tag->item(0)->nodeValue);
                    update_field('road_time_to_city', $road_ttCity, $wpID);
                    
                    //water
                    $water_intro_tag = $citypath->query("//Content/Water/Intro");
                    $water_intro = trim($water_intro_tag->item(0)->nodeValue);
                    update_field('water_intro', $water_intro, $wpID);
                    
                    $water_ferry_tag = $citypath->query("//Content/Water/Ferry");
                    $water_ferry = trim($water_ferry_tag->item(0)->nodeValue);
                    update_field('water_ferry', $water_ferry, $wpID);
                    
                    $water_city_tag = $citypath->query("//Content/Water/TimeToCity");
                    $water_city = trim($water_city_tag->item(0)->nodeValue);
                    update_field('water_to_the_city', $water_city, $wpID);
                    
                    $nearestp_tag = $citypath->query("//Content/Water/NearestPort");
                    $nearestp = trim($nearestp_tag->item(0)->nodeValue);
                    update_field('water_nearest_port', $nearestp, $wpID);
                    
                    $transfer_tag = $citypath->query("//Content/Water/Transfer");
                    $transfer = trim($transfer_tag->item(0)->nodeValue);
                    update_field('water_transfer', $transfer, $wpID);
                    //echo "$transfer <br/><br/>";
                    
                    $transfer_dist_tag = $citypath->query("//Content/Water/TransferDistance");
                    $transfer_dist = trim($transfer_dist_tag->item(0)->nodeValue);
                    update_field('water_transfer_dist', $transfer_dist, $wpID);
                    
                    $transfer_time_tag = $citypath->query("//Content/Water/TransferTime");
                    $transfer_time = trim($transfer_time_tag->item(0)->nodeValue);
                    update_field('water_transfer_time', $transfer_time, $wpID);
                    
                    //getting around
                    $getting_around_public_transport_tag = $citypath->query("//Content/GettingAround/PublicTransport");
                    $getting_around_public_transport = trim($getting_around_public_transport_tag->item(0)->nodeValue);
                    update_field('getting_around_public_transport', $getting_around_public_transport, $wpID);
                    
                    $getting_around_taxis_tag = $citypath->query("//Content/GettingAround/Taxis");
                    $getting_around_taxis = trim($getting_around_taxis_tag->item(0)->nodeValue);
                    update_field('getting_around_taxis', $getting_around_taxis, $wpID);
                    
                    $getting_around_driving_tag = $citypath->query("//Content/GettingAround/Driving");
                    $getting_around_driving = trim($getting_around_driving_tag->item(0)->nodeValue);
                    update_field('getting_around_driving', $getting_around_driving, $wpID);
                    
                    $getting_around_car_hire_tag = $citypath->query("//Content/GettingAround/CarHire");
                    $getting_around_car_hire = trim($getting_around_car_hire_tag->item(0)->nodeValue);
                    update_field('getting_around_car_hire', $getting_around_car_hire, $wpID);
                    
                    $getting_around_bicycle_hire_tag = $citypath->query("//Content/GettingAround/BikeHire");
                    $getting_around_bicycle_hire = trim($getting_around_bicycle_hire_tag->item(0)->nodeValue);
                    update_field('getting_around_bicycle_hire', $getting_around_bicycle_hire, $wpID);
                    
                    //sightseeing
                    $tourist_passes_tag = $citypath->query("//Content/Sightseeing/TouristPasses");
                    $tourist_passes = trim($tourist_passes_tag->item(0)->nodeValue);
                    update_field('city_tourist_passes', $tourist_passes, $wpID);
                    
                    $city_tourist_information_centres = $citypath->query("//Content/Sightseeing/TouristInformationCentres/Centre");
                    if (!is_null($city_tourist_information_centres)) {
                        $ctID = 1;
                        $repeater = get_post_meta($wpID, 'city_tourist_information_centres', true);
    
                    //If there are no rows yet just set to 1, otherwise +1
                    $new_repeater_count = ( !$repeater ? 1 : $repeater + 1 );
                    update_post_meta($wpID, 'city_tourist_information_centres', $new_repeater_count);
                        foreach($city_tourist_information_centres as $centre){
                            $c_Doc = new DOMDocument();
                            $c_clone = $centre->cloneNode(TRUE);
                            $c_Doc->appendChild($c_Doc->importNode($c_clone, TRUE));
                            $cpath = new DOMXPath($c_Doc);
                            
                            $centreTitle = $centre->getAttribute('title');
                            
                            //Telephone
                            $cTelephone_tag = $cpath->query("//Telephone");
                            $ctelephone = $cTelephone_tag->item(0)->nodeValue;
                            
                            //Website
                            $cWebsite_tag = $cpath->query("//Website");
                            $cwebsite = trim($cWebsite_tag->item(0)->nodeValue);
                            
                            //Opening Times
                            $cOpening_tag = $cpath->query("//OpeningTimes");
                            $cOpening = trim($cOpening_tag->item(0)->nodeValue);
                            
                            //Body
                            $cBody_tag = $cpath->query("//Body");
                            $cbody = trim($cBody_tag->item(0)->nodeValue);
                            
                            //Address 1
                            $cAddress1_tag = $cpath->query("//Address/Address1");
                            $cAddress1 = trim($cAddress1_tag->item(0)->nodeValue);
                            
                            //Address 2
                            $cAddress2_tag = $cpath->query("//Address/Address2");
                            $cAddress2 = trim($cAddress2_tag->item(0)->nodeValue);
                            
                            //City
                            $cCity_tag = $cpath->query("//Address/City");
                            $cCity = trim($cCity_tag->item(0)->nodeValue);
                            
                            $cCountry_tag = $cpath->query("//Address/Country");
                            $cCountry = trim($cCountry_tag->item(0)->nodeValue);
                            
                            //Postcode
                            $cPostcode_tag = $cpath->query("//Address/Postcode");
                            $cPostcode = trim($cPostcode_tag->item(0)->nodeValue);
                            
                            //Latitude
                            $cLat_tag = $cpath->query("//Address/Latitude");
                            $cLat = trim($cLat_tag->item(0)->nodeValue);
                            
                            //Longitude
                            $cLong_tag = $cpath->query("//Address/Longitude");
                            $cLong = trim($cLong_tag->item(0)->nodeValue);
                            
                             $repeater = get_post_meta($wpID, 'city_tourist_information_centres', true);
    
                            //If there are no rows yet just set to 1, otherwise +1
                            $new_repeater_count = ( !$repeater ? 1 : $repeater + 1 );
                            //update_post_meta($wpID, 'city_tourist_information_centres', $new_repeater_count);
                                    
                            update_sub_field(array('city_tourist_information_centres',$ctID,'tourist_centre_name'), $centreTitle, $wpID);
                            update_sub_field(array('city_tourist_information_centres',$ctID,'tourist_centre_body'), $cbody, $wpID);
                            update_sub_field(array('city_tourist_information_centres',$ctID,'tourist_centre_website'), $cwebsite, $wpID);
                            update_sub_field(array('city_tourist_information_centres',$ctID,'tourist_centre_telephone'), $ctelephone, $wpID);
                            update_sub_field(array('city_tourist_information_centres',$ctID,'tourist_centre_opening_times'), $cOpening, $wpID);
                            //update_sub_field(array('city_tourist_information_centres',$ctID,'toursit_centre_passes'), $tcurrency, $wpID);
                                    
                                    
                            update_sub_field(array('city_tourist_information_centres',$ctID,'tourist_centre_thoroughfare'),$cAddress1, $wpID);
                            update_sub_field(array('city_tourist_information_centres',$ctID,'tourist_centre_neighborhood'),$cAddress2, $wpID);
                            update_sub_field(array('city_tourist_information_centres',$ctID,'tourist_centre_locality'),$cCity, $wpID);
                            update_sub_field(array('city_tourist_information_centres',$ctID,'tourist_centre_country'),$cCountry, $wpID);
                            update_sub_field(array('city_tourist_information_centres',$ctID,'postcode'),$cPostcode, $wpID);
                            update_sub_field(array('city_tourist_information_centres',$ctID,'latitude'),$cLat, $wpID);
                            update_sub_field(array('city_tourist_information_centres',$ctID,'longitude'),$cLong, $wpID);
                        
                            $ctID=$ctID+1;
                            
                        }
                    }
                    
                    //attractions
                    $attractions = $citypath->query("//Content/Attractions/CityAttractions/Attraction");
                    if (!is_null($attractions)) {
                        $atID = 1;
                        $repeater = get_post_meta($wpID, 'attraction', true);
    
                    //If there are no rows yet just set to 1, otherwise +1
                    $new_repeater_count = ( !$repeater ? 1 : $repeater + 1 );
                    update_post_meta($wpID, 'attraction', $new_repeater_count);
                        foreach($attractions as $attraction){
                            $a_Doc = new DOMDocument();
                            $a_clone = $attraction->cloneNode(TRUE);
                            $a_Doc->appendChild($a_Doc->importNode($a_clone, TRUE));
                            $apath = new DOMXPath($a_Doc);
                            
                            $aTitle = $attraction->getAttribute('title');
                            
                            //Telephone
                            $aTelephone_tag = $apath->query("//Telephone");
                            $aTelephone = trim($aTelephone_tag->item(0)->nodeValue);
                            
                            //Website
                            $aWebsite_tag = $apath->query("//Website");
                            $aWebsite = trim($aWebsite_tag->item(0)->nodeValue);
                            
                            //Opening Times
                            $aOpening_tag = $apath->query("//OpeningTimes");
                            $aOpening = trim($aOpening_tag->item(0)->nodeValue);
                            
                            //Body
                            $aBody_tag = $apath->query("//Body");
                            $aBody = trim($aBody_tag->item(0)->nodeValue);
                            
                            //Fees
                            $aFees_tag = $apath->query("//AdmissionFees");
                            $aFees = trim($aFees_tag->item(0)->nodeValue);
                            
                            //Unesco
                            $aUnesco_tag = $apath->query("//Unesco");
                            $aUnesco = trim($aUnesco_tag->item(0)->nodeValue);
                            
                            //Disabled Access
                            $aDisabledAccess_tag = $apath->query("//DisabledAccess");
                            $aDisabledAccess = trim($aDisabledAccess_tag->item(0)->nodeValue);
                            
                            //Address 1
                            $aAddress1_tag = $apath->query("//Address/Address1");
                            $aAddress1 = trim($aAddress1_tag->item(0)->nodeValue);
                            
                            //Address 2
                            $aAddress2_tag = $apath->query("//Address/Address2");
                            $aAddress2 = trim($aAddress2_tag->item(0)->nodeValue);
                            
                            //City
                            $aCity_tag = $apath->query("//Address/City");
                            $aCity = trim($aCity_tag->item(0)->nodeValue);
                            
                            //Postcode
                            $aPostcode_tag = $apath->query("//Address/Postcode");
                            $aPostcode = trim($aPostcode_tag->item(0)->nodeValue);
                            
                            //Latitude
                            $aLatitude_tag = $apath->query("//Address/Latitude");
                            $aLatitude = trim($aLatitude_tag->item(0)->nodeValue);
                            
                            //Longitude
                            $aLongitude_tag = $apath->query("//Address/Longitude");
                            $aLongitude = trim($aLongitude_tag->item(0)->nodeValue);
                            
                            
                            $repeater = get_post_meta($wpID, 'attraction', true);
    
                            //If there are no rows yet just set to 1, otherwise +1
                            $new_repeater_count = ( !$repeater ? 1 : $repeater + 1 );
                            //update_post_meta($wpID, 'attraction', $new_repeater_count);
     
                            update_sub_field(array('attraction',$atID,'title'), $aTitle, $wpID);
                            update_sub_field(array('attraction',$atID,'body'), $aBody, $wpID);
                            update_sub_field(array('attraction',$atID,'opening_times'), $aOpening, $wpID);
                            update_sub_field(array('attraction',$atID,'admission_fees'), $aFees, $wpID);
                            update_sub_field(array('attraction',$atID,'disabled_access'), $aDisabledAccess, $wpID);
                            update_sub_field(array('attraction',$atID,'unesco'), $aUnesco, $wpID);
                            update_sub_field(array('attraction',$atID,'website'), $aWebsite, $wpID);
                                    
                            update_sub_field(array('attraction',$atID,'address1'),$aAddress1, $wpID);
                            update_sub_field(array('attraction',$atID,'address2'),$aAddress2, $wpID);
                            update_sub_field(array('attraction',$atID,'city'),$aCity, $wpID);
                            update_sub_field(array('attraction',$atID,'postcode'),$aPostcode, $wpID);
                            update_sub_field(array('attraction',$atID,'latitude'),$aLatitude, $wpID);
                            update_sub_field(array('attraction',$atID,'longitude'),$aLongitude, $wpID);
    
                            $atID=$atID+1;
                        }
                    }
                    
                    //tours
                    $tours = $citypath->query("//Content/Tours/Tour");
                    if (!is_null($tours)) {
                        $tID = 1;
                        $repeater = get_post_meta($wpID, 'city_tours', true);
    
                    //If there are no rows yet just set to 1, otherwise +1
                    $new_repeater_count = ( !$repeater ? 1 : $repeater + 1 );
                    update_post_meta($wpID, 'city_tours', $new_repeater_count);
                        foreach($tours as $tour){
                            $t_Doc = new DOMDocument();
                            $t_clone = $tour->cloneNode(TRUE);
                            $t_Doc->appendChild($t_Doc->importNode($t_clone, TRUE));
                            $tpath = new DOMXPath($t_Doc);
                            
                            $tourTitle = $tour->getAttribute('title');
                            
                            //Telephone
                            $tTelephone_tag = $tpath->query("//Content/General/Telephone");
                            $tTelephone = trim($tTelephone_tag->item(0)->nodeValue);
                            
                            //Website
                            $tWebsite_tag = $tpath->query("//Content/General/Website");
                            $tWebsite = trim($tWebsite_tag->item(0)->nodeValue);
                            
                            //Body
                            $tBody_tag = $tpath->query("//Content/General/Body");
                            $tBody = trim($tBody_tag->item(0)->nodeValue);
         
                            $repeater = get_post_meta($wpID, 'city_tours', true);
    
                            //If there are no rows yet just set to 1, otherwise +1
                            $new_repeater_count = ( !$repeater ? 1 : $repeater + 1 );
                            //update_post_meta($wpID, 'city_tours', $new_repeater_count);
                            
                            update_sub_field(array('city_tours',$tID,'title'), $tourTitle, $wpID);
                            update_sub_field(array('city_tours',$tID,'body'), $tBody, $wpID);
                            update_sub_field(array('city_tours',$tID,'telephone'), $tTelephone, $wpID);
                            update_sub_field(array('city_tours',$tID,'website'), $tWebsite, $wpID);
    
                            $tID++;
                        }
                    }
                    
                    //excursions
                    $excursions = $citypath->query("//Content/Excursions/Excursion");
                    if (!is_null($excursions)) {
                        $excID = 1;
                        $repeater = get_post_meta($wpID, 'city_excursion', true);
    
                    //If there are no rows yet just set to 1, otherwise +1
                    $new_repeater_count = ( !$repeater ? 1 : $repeater + 1 );
                    update_post_meta($wpID, 'city_excursion', $new_repeater_count);
                        foreach($excursions as $excursion){
                            $e_Doc = new DOMDocument();
                            $e_clone = $excursion->cloneNode(TRUE);
                            $e_Doc->appendChild($e_Doc->importNode($e_clone, TRUE));
                            $epath = new DOMXPath($e_Doc);
                            
                            $excursionTitle = $excursion->getAttribute('title');
                            
                            //Telephone
                            $eTelephone_tag = $epath->query("//Content/General/Telephone");
                            $eTelephone = trim($eTelephone_tag->item(0)->nodeValue);
                            
                            //Website
                            $eWebsite_tag = $epath->query("//Content/General/Website");
                            $eWebsite = trim($eWebsite_tag->item(0)->nodeValue);
                            
                            //Body
                            $eBody_tag = $epath->query("//Content/General/Body");
                            $eBody = trim($eBody_tag->item(0)->nodeValue);
                            
                            $repeater = get_post_meta($wpID, 'city_excursion', true);
    
                            //If there are no rows yet just set to 1, otherwise +1
                            $new_repeater_count = ( !$repeater ? 1 : $repeater + 1 );
                            //update_post_meta($wpID, 'city_excursion', $new_repeater_count);
           
                            update_sub_field(array('city_excursion',$excID,'title'), $excursionTitle, $wpID);
                            update_sub_field(array('city_excursion',$excID,'body'), $eBody, $wpID);
                            update_sub_field(array('city_excursion',$excID,'telephone'), $eTelephone, $wpID);
                            update_sub_field(array('city_excursion',$excID,'website'), $eWebsite, $wpID);
    
                            $excID=$excID+1;
                        }
                    }
                    
                    //shopping
                    $city_shopping_introduction_tag = $citypath->query("//Content/Shopping/Introduction");
                    $city_shopping_introduction = trim($city_shopping_introduction_tag->item(0)->nodeValue);
                    update_field('city_shopping_introduction', $city_shopping_introduction, $wpID);
                    //echo $city_shopping_introduction.'<br/><br/>';
                    
                    $city_shopping_key_areas_tag = $citypath->query("//Content/Shopping/KeyAreas");
                    $city_shopping_key_areas = trim($city_shopping_key_areas_tag->item(0)->nodeValue);
                    update_field('city_shopping_key_areas', $city_shopping_key_areas, $wpID);
                    //echo $city_shopping_key_areas.'<br/><br/>';
                    
                    $city_shopping_markets_tag = $citypath->query("//Content/Shopping/Markets");
                    $city_shopping_markets = trim($city_shopping_markets_tag->item(0)->nodeValue);
                    update_field('city_shopping_markets', $city_shopping_markets, $wpID);
                    //echo $city_shopping_markets.'<br/><br/>';
                    
                    $city_shopping_centres_tag = $citypath->query("//Content/Shopping/ShoppingCentres");
                    $city_shopping_centres = trim($city_shopping_centres_tag->item(0)->nodeValue);
                    update_field('city_shopping_centres', $city_shopping_centres, $wpID);
                    //echo $city_shopping_centres.'<br/><br/>';
                    
                    $city_shopping_times_tag = $citypath->query("//Content/Shopping/Times");
                    $city_shopping_times = trim($city_shopping_times_tag->item(0)->nodeValue);
                    update_field('city_shopping_times', $city_shopping_times, $wpID);
                    //echo $city_shopping_times.'<br/><br/>';
                    
                    $city_shopping_souvenirs_tag = $citypath->query("//Content/Shopping/Souvenirs");
                    $city_shopping_souvenirs = trim($city_shopping_souvenirs_tag->item(0)->nodeValue);
                    update_field('city_shopping_souvenirs', $city_shopping_souvenirs, $wpID);
                    //echo $city_shopping_souvenirs.'<br/><br/>';
                    
                    $city_shopping_taxinfo_tag = $citypath->query("//Content/Shopping/TaxInfo");
                    $city_shopping_taxinfo = trim($city_shopping_taxinfo_tag->item(0)->nodeValue);
                    update_field('city_shopping_taxinfo', $city_shopping_taxinfo, $wpID);
                    //echo $city_shopping_taxinfo.'<br/><br/>';
                    
                    //nightlife
                    $city_nightlife_tag = $citypath->query("//Content/Nightlife/Nightlife");
                    $city_nightlife = trim($city_nightlife_tag->item(0)->nodeValue);
                    update_field('city_nightlife', $city_nightlife, $wpID);
                    
                    $city_nightlife_items = $citypath->query("//Content/Nightlife/CityNightlifeItem");
                    if (!is_null($city_nightlife_items)) {
                        $niID = 1;
                      //  $repeater = get_post_meta($wpID, 'city_nightlife_item', true);
    
                    //If there are no rows yet just set to 1, otherwise +1
                    //$new_repeater_count = ( !$repeater ? 1 : $repeater + 1 );
                    //update_post_meta($wpID, 'city_nightlife_item', $new_repeater_count);
                        foreach($city_nightlife_items as $nightlife_item){
                            $n_Doc = new DOMDocument();
                            $n_clone = $nightlife_item->cloneNode(TRUE);
                            $n_Doc->appendChild($n_Doc->importNode($n_clone, TRUE));
                            $npath = new DOMXPath($n_Doc);
                            
                            $itemTitle = $nightlife_item->getAttribute('title');
                            
                            //Tax
                            $nTax_tag = $npath->query("//Content/General/Taxonomy/CityNightlifeItems");
                            $nTax = trim($nTax_tag->item(0)->nodeValue);
                            
                            //Telephone
                            $nTelephone_tag = $npath->query("//Content/General/Telephone");
                            $nTelephone = trim($nTelephone_tag->item(0)->nodeValue);
                            
                            //Website
                            $nWebsite_tag = $npath->query("//Content/General/Website");
                            $nWebsite = trim($nWebsite_tag->item(0)->nodeValue);
                            
                            //Body
                            $nBody_tag = $npath->query("//Content/General/Body");
                            $nBody = trim($nBody_tag->item(0)->nodeValue);
                            
                            //address 1
                            $nAddress1_tag = $npath->query("//Content/General/Address/Address1");
                            $nAddress1 = trim($nAddress1_tag->item(0)->nodeValue);
                            
                            //Address 2
                            $nAddress2_tag = $npath->query("//Content/General/Address/Address2");
                            $nAddress2 = trim($nAddress2_tag->item(0)->nodeValue);
                            
                            //City
                            $nCity_tag = $npath->query("//Content/General/Address/City");
                            $nCity = trim($nCity_tag->item(0)->nodeValue);
                            
                            //Postcode
                            $nPostcode_tag = $npath->query("//Content/General/Address/Postcode");
                            $nPostcode = trim($nPostcode_tag->item(0)->nodeValue);
                            
                            //Latitude
                            $nLatitude_tag = $npath->query("//Content/General/Address/Latitude");
                            $nLatitude = trim($nLatitude_tag->item(0)->nodeValue);
                            
                            //Longitude
                            $nLongitude_tag = $npath->query("//Content/General/Address/Longitude");
                            $nLongitude = trim($nLongitude_tag->item(0)->nodeValue);
                            
                            //$repeater = get_post_meta($wpID, 'city_nightlife_item', true);
    
                            //If there are no rows yet just set to 1, otherwise +1
                            //$new_repeater_count = ( !$repeater ? 1 : $repeater + 1 );
                            //update_post_meta($wpID, 'city_nightlife_item', $new_repeater_count);
           
                            $n1 = 'city_nightlife_item_'.$niID.'_title';
                            $n2 = 'city_nightlife_item_'.$niID.'_body';
                            $n3 = 'city_nightlife_item_'.$niID.'_type';
                            $n4 = 'city_nightlife_item_'.$niID.'_website';
                            $n5 = 'city_nightlife_item_'.$niID.'_telephone';
                            $n6 = 'city_nightlife_item_'.$niID.'_website';
                            $n7 = 'city_nightlife_item_'.$niID.'_thoroughfare';
                            $n8 = 'city_nightlife_item_'.$niID.'_neighborhood';
                            $n9 = 'city_nightlife_item_'.$niID.'_locality';
                            $n10 = 'city_nightlife_item_'.$niID.'_postcode';
           
                            update_post_meta($wpID,$n1,$itemTitle);
                            update_post_meta($wpID,$n2,$nBody);
                            update_post_meta($wpID,$n3,$nTax);
                            update_post_meta($wpID,$n4,$nWebsite);
                            update_post_meta($wpID,$n5,$nTelephone);
                            update_post_meta($wpID,$n6,$nWebsite);
                            update_post_meta($wpID,$n7,$nAddress1);
                            update_post_meta($wpID,$n8,$nAddress2);
                            update_post_meta($wpID,$n9,$nCity);
                            update_post_meta($wpID,$n10,$nPostcode);
           
                            //update_sub_field(array('city_nightlife_item',$niID,'title'), $itemTitle, $wpID);
                            //update_sub_field(array('city_nightlife_item',$niID,'body'), $nBody, $wpID);
                            //update_sub_field(array('city_nightlife_item',$niID,'type'), $nTax, $wpID);
                            //update_sub_field(array('city_nightlife_item',$niID,'website'), $nWebsite, $wpID);
                            //update_sub_field(array('city_nightlife_item',$niID,'telephone'), $nTelephone, $wpID);
                            //update_sub_field(array('city_nightlife_item',$niID,'website'), $nWebsite, $wpID);
                            //update_sub_field(array('city_nightlife_item',$niID,'thoroughfare'), $nAddress1, $wpID);
                            //update_sub_field(array('city_nightlife_item',$niID,'neighborhood'), $nAddress2, $wpID);
                            //update_sub_field(array('city_nightlife_item',$niID,'locality'), $nCity, $wpID);
                            //update_sub_field(array('city_nightlife_item',$niID,'postcode'), $nPostcode, $wpID);
                            //update_sub_field(array('city_nightlife_item',$niID,'latitude'), $nLatitude, $wpID);
                            //update_sub_field(array('city_nightlife_item',$niID,'longitude'), $nLongitude, $wpID);
    
                            $niID=$niID+1;
                            
                            
                        }
                    }
                    ////// repeater
                    
                    //events
                    $city_events_intro_tag = $citypath->query("//Content/Events/EventIntro");
                    $city_events_intro = trim($city_events_intro_tag->item(0)->nodeValue);
                    update_field('city_events_intro', $city_events_intro, $wpID);
                    
                    $city_events_body_tag = $citypath->query("//Content/Events/EventBody");
                    $city_events_body = trim($city_events_body_tag->item(0)->nodeValue);
                    update_field('city_events_body', $city_events_body, $wpID);
                    
                    $city_events_items = $citypath->query("//Content/Events/CityEvents/Event");
                    if (!is_null($city_events_items)) {
                        $cevID = 1;
                        $repeater = get_post_meta($wpID, 'city_events_item', true);
    
                    //If there are no rows yet just set to 1, otherwise +1
                    $new_repeater_count = ( !$repeater ? 1 : $repeater + 1 );
                    update_post_meta($wpID, 'city_events_item', $new_repeater_count);
                        foreach($city_events_items as $events_item){
                            $ev_Doc = new DOMDocument();
                            $ev_clone = $events_item->cloneNode(TRUE);
                            $ev_Doc->appendChild($ev_Doc->importNode($ev_clone, TRUE));
                            $evpath = new DOMXPath($ev_Doc);
                            
                            $eventTitle = $events_item->getAttribute('title');
                            
                            //From date
                            $eFromDate_tag = $evpath->query("//FromDate");
                            $eFromDate = trim($eFromDate_tag->item(0)->nodeValue);
                            
                            //To date
                            $eToDate_tag = $evpath->query("//ToDate");
                            $eToDate = trim($eToDate_tag->item(0)->nodeValue);
                            
                            //Date TBC
                            $eTBC_tag = $evpath->query("//DateTbc");
                            $eTBC = trim($eTBC_tag->item(0)->nodeValue);
                            
                            //Body
                            $eBody_tag = $evpath->query("//Body");
                            $eBody = trim($eBody_tag->item(0)->nodeValue);
                            
                            //Venue name
                            $eVenue_tag = $evpath->query("//VenueName");
                            $eVenue = trim($eVenue_tag->item(0)->nodeValue);
                            
                            //importance
                            $eImportance_tag = $evpath->query("//Importance");
                            $eImportance = trim($eImportance_tag->item(0)->nodeValue);
                            
                            //event cost
                            $eCost_tag = $evpath->query("//EventCost");
                            $eCost = trim($eCost_tag->item(0)->nodeValue);
                            
                            //website
                            $eWebsite_tag = $evpath->query("//Website");
                            $eWebsite = trim($eWebsite_tag->item(0)->nodeValue);
                            
                            //Address 1
                            $eAddress1_tag = $evpath->query("//Address/Address1");
                            $eAddress1 = trim($eAddress1_tag->item(0)->nodeValue);
                            
                            //Address 2
                            $eAddress2_tag = $evpath->query("//Address/Address2");
                            $eAddress2 = trim($eAddress2_tag->item(0)->nodeValue);
                            
                            //City
                            $eCity_tag = $evpath->query("//Address/City");
                            $eCity = trim($eCity_tag->item(0)->nodeValue);
                            
                            //Postcode
                            $ePostcode_tag = $evpath->query("//Address/Postcode");
                            $ePostcode = trim($ePostcode_tag->item(0)->nodeValue);
                            
                            //Latitude
                            $eLatitude_tag = $evpath->query("//Address/Latitude");
                            $eLatitude = trim($eLatitude_tag->item(0)->nodeValue);
                            
                            //Longitude
                            $eLongitude_tag = $evpath->query("//Address/Longitude");
                            $eLongitude = trim($eLongitude_tag->item(0)->nodeValue);
                            
                            $repeater = get_post_meta($wpID, 'city_events_item', true);
    
                            //If there are no rows yet just set to 1, otherwise +1
                            $new_repeater_count = ( !$repeater ? 1 : $repeater + 1 );
                            //update_post_meta($wpID, 'city_events_item', $new_repeater_count);
        
                            update_sub_field(array('city_events_item',$cevID,'title'), $eventTitle, $wpID);
                            update_sub_field(array('city_events_item',$cevID,'from_date'), $eFromDate, $wpID);
                            update_sub_field(array('city_events_item',$cevID,'to_date'), $eToDate, $wpID);
                            update_sub_field(array('city_events_item',$cevID,'date_tbc'), $eTBC, $wpID);
                            update_sub_field(array('city_events_item',$cevID,'body'), $eBody, $wpID);
                            update_sub_field(array('city_events_item',$cevID,'venue_name'), $eVenue, $wpID);
                            update_sub_field(array('city_events_item',$cevID,'importance'), $eImportance, $wpID);
                            update_sub_field(array('city_events_item',$cevID,'event_cost'), $eCost, $wpID);
                            update_sub_field(array('city_events_item',$cevID,'website'), $eWebsite, $wpID);
       
                            update_sub_field(array('city_events_item',$cevID,'address1'), $eAddress1, $wpID);
                            update_sub_field(array('city_events_item',$cevID,'address2'), $eAddress2, $wpID);
                            update_sub_field(array('city_events_item',$cevID,'city'), $eCity, $wpID);
                            update_sub_field(array('city_events_item',$cevID,'postcode'), $ePostcode, $wpID);
                            update_sub_field(array('city_events_item',$cevID,'latitude'), $eLatitude, $wpID);
                            update_sub_field(array('city_events_item',$cevID,'longitude'), $eLongitude, $wpID);
                            
                            $cevID = $cevID +1;
                        }
                    }
                    ////// repeater
                    
                    //activity
                    $activities = $citypath->query("//Content/Activities/Activity");
                    if (!is_null($activities)) {
                        $actID = 1;
                        $repeater = get_post_meta($wpID, 'activity', true);
    
                    //If there are no rows yet just set to 1, otherwise +1
                    $new_repeater_count = ( !$repeater ? 1 : $repeater + 1 );
                    update_post_meta($wpID, 'activity', $new_repeater_count);
                        foreach($activities as $activity){
                            $act_Doc = new DOMDocument();
                            $act_clone = $activity->cloneNode(TRUE);
                            $act_Doc->appendChild($act_Doc->importNode($act_clone, TRUE));
                            $actpath = new DOMXPath($act_Doc);
                            
                            $actTitle = $activity->getAttribute('title');
                            
                            //Body
                            $actBody_tag = $actpath->query("//Content/General/Body");
                            $actBody = trim($actBody_tag->item(0)->nodeValue);
                            
                            $repeater = get_post_meta($wpID, 'activity', true);
    
                            //If there are no rows yet just set to 1, otherwise +1
                            $new_repeater_count = ( !$repeater ? 1 : $repeater + 1 );
                            //update_post_meta($wpID, 'activity', $new_repeater_count);
      
                            update_sub_field(array('activity',$actID,'title'), $actTitle, $wpID);
                            update_sub_field(array('activity',$actID,'body'), $actBody, $wpID);
                                    
                            $actID=$actID+1;
                            
                            
                        }
                    }
                    
                    //restaurants
                    $city_restuarants = $citypath->query("//Content/Restaurants/Restaurant");
                    if (!is_null($city_restuarants)) {
                        $crID = 0;
                        $repeater = get_post_meta($wpID, 'city_restaurant_item', true);
    
                    //If there are no rows yet just set to 1, otherwise +1
                    $new_repeater_count = ( !$repeater ? 1 : $repeater + 1 );
                    update_post_meta($wpID, 'city_restaurant_item', $new_repeater_count);
                        foreach($city_restuarants as $city_restuarant){
                            $cr_Doc = new DOMDocument();
                            $cr_clone = $city_restuarant->cloneNode(TRUE);
                            $cr_Doc->appendChild($cr_Doc->importNode($cr_clone, TRUE));
                            $crpath = new DOMXPath($cr_Doc);
                            
                            $crTitle = $city_restuarant->getAttribute('title');
//                            echo $crTitle.'<br/><br/>';
                            //Tax
                            $crType_tag = $crpath->query("//Content/General/Taxonomy/RestaurantType");
                            $crType = trim($crType_tag->item(0)->nodeValue);
                            
                            //Cuisine
                            $crCuisine_tag = $crpath->query("//Content/General/Cuisine");
                            $crCuisine = trim($crCuisine_tag->item(0)->nodeValue);
                            
                            //Website
                            $crWebsite_tag = $crpath->query("//Content/General/Website");
                            $crWebsite = trim($crWebsite_tag->item(0)->nodeValue);
                            
                            //Telephone
                            $crTele_tag = $crpath->query("//Content/General/Telephone");
                            $crTele = trim($crTele_tag->item(0)->nodeValue);
                            
                            //Body
                            $crBody_tag = $crpath->query("//Content/General/Body");
                            $crBody = trim($crBody_tag->item(0)->nodeValue);
                            
                            //address 1
                            $crAddress1_tag = $crpath->query("//Content/General/Address/Address1");
                            $crAddress1 = trim($crAddress1_tag->item(0)->nodeValue);
                            
                            //Address 2
                            $crAddress2_tag = $crpath->query("//Content/General/Address/Address2");
                            $crAddress2 = trim($crAddress2_tag->item(0)->nodeValue);
                            
                            //City
                            $crCity_tag = $crpath->query("//Content/General/Address/City");
                            $crCity = trim($crCity_tag->item(0)->nodeValue);
                            
                            //Postcode
                            $crPostcode_tag = $crpath->query("//Content/General/Address/Postcode");
                            $crPostcode = trim($crPostcode_tag->item(0)->nodeValue);
                            
                            //Latitude
                            $crLatitude_tag = $crpath->query("//Content/General/Address/Latitude");
                            $crLatitude = trim($crLatitude_tag->item(0)->nodeValue);
                            
                            //Longitude
                            $crLongitude_tag = $crpath->query("//Content/General/Address/Longitude");
                            $crLongitude = trim($crLongitude_tag->item(0)->nodeValue);
                            
                            $repeater = get_post_meta($wpID, 'city_restaurant_item', true);
    
                            //If there are no rows yet just set to 1, otherwise +1
                            $new_repeater_count = ( !$repeater ? 1 : $repeater + 1 );
                            //update_post_meta($wpID, 'city_restaurant_item', $new_repeater_count);
          
                            
                            $cr1 = 'city_restaurant_item_'.$crID.'_title';
                            $cr2 = 'city_restaurant_item_'.$crID.'_body';
                            $cr3 = 'city_restaurant_item_'.$crID.'_telephone';
                            $cr4 = 'city_restaurant_item_'.$crID.'_website';
                            $cr5 = 'city_restaurant_item_'.$crID.'_restaurant_type';
                            $cr6 = 'city_restaurant_item_'.$crID.'_restaurant_cuisine';
                            
                            $cr7 = 'city_restaurant_item_'.$crID.'_address1';
                            $cr8 = 'city_restaurant_item_'.$crID.'_address2';
                            $cr9 = 'city_restaurant_item_'.$crID.'_city';
                            $cr10 = 'city_restaurant_item_'.$crID.'_postcode';
                            $cr11 = 'city_restaurant_item_'.$crID.'_longitude';
                            $cr12 = 'city_restaurant_item_'.$crID.'_latitude';
                            
                            update_post_meta($wpID,$cr1,$crTitle);
                            update_post_meta($wpID,$cr2,$crBody);
                            update_post_meta($wpID,$cr3,$crTele);
                            update_post_meta($wpID,$cr4,$crWebsite);
                            update_post_meta($wpID,$cr5,$crType);
                            update_post_meta($wpID,$cr6,$crCuisine);
                            
                            update_post_meta($wpID,$cr7,$crAddress1);
                            update_post_meta($wpID,$cr8,$crAddress2);
                            update_post_meta($wpID,$cr9,$crCity);
                            update_post_meta($wpID,$cr10,$crPostcode);
                            update_post_meta($wpID,$cr11,$crLatitude);
                            update_post_meta($wpID,$cr12,$crLatitude);
                            
                            
                            //update_sub_field(array('city_restaurant_item',$crID,'title'), $crTitle, $wpID);
                            //update_sub_field(array('city_restaurant_item',$crID,'body'), $crBody, $wpID);
                            //update_sub_field(array('city_restaurant_item',$crID,'telephone'), $crTele, $wpID);
                            //update_sub_field(array('city_restaurant_item',$crID,'website'), $crWebsite, $wpID);
                            //update_sub_field(array('city_restaurant_item',$crID,'restaurant_type'), $crType, $wpID);
                            //update_sub_field('resaurant_cuisine', $eVenue, $wpID);
                            //update_sub_field(array('city_restaurant_item',$crID,'resaurant_cuisine'), $crCuisine, $wpID);
                            
          
                            //update_sub_field(array('city_restaurant_item',$crID,'address1'), $crAddress1, $wpID);
                            //update_sub_field(array('city_restaurant_item',$crID,'address2'), $crAddress2, $wpID);
                            //update_sub_field(array('city_restaurant_item',$crID,'city'), $eCity, $wpID);
                            //update_sub_field(array('city_restaurant_item',$crID,'postcode'), $crPostcode, $wpID);
                            //update_sub_field(array('city_restaurant_item',$crID,'latitude'), $crLatitude, $wpID);
                            //update_sub_field(array('city_restaurant_item',$crID,'longitude'), $crLongitude, $wpID);
    
                            $crID = $crID+1;
                        }
                    }
                    
                    
                    $city_restaurants_tag = $citypath->query("//Content/Restaurants/Restaurants");
                    $city_restaurants_text = trim($city_restaurants_tag->item(0)->nodeValue);
                    update_field('city_restuarants', $city_restaurants_text, $wpID);
                    ////// repeater
                    
                    //hotels
                    $city_hotels_tag = $citypath->query("//Content/Accommodation/Hotels");
                    $city_hotels = trim($city_hotels_tag->item(0)->nodeValue);
                    update_field('city_hotels', $city_hotels, $wpID);
                    
                    $city_hotels_items = $citypath->query("//Content/Accommodation/Hotel");
                    if (!is_null($city_hotels_items)) {
                        $chID = 1;
                        $repeater = get_post_meta($wpID, 'city_hotel_item', true);
    
                    //If there are no rows yet just set to 1, otherwise +1
                    $new_repeater_count = ( !$repeater ? 1 : $repeater + 1 );
                    update_post_meta($wpID, 'city_hotel_item', $new_repeater_count);
                        foreach($city_hotels_items as $city_hotel){
                            $ch_Doc = new DOMDocument();
                            $ch_clone = $city_hotel->cloneNode(TRUE);
                            $ch_Doc->appendChild($ch_Doc->importNode($ch_clone, TRUE));
                            $chpath = new DOMXPath($ch_Doc);
                            
                            $chTitle = $city_hotel->getAttribute('title');
                            
                            //Tax
                            $chType_tag = $chpath->query("//Content/General/Taxonomy/HotelType");
                            $chType = trim($chType_tag->item(0)->nodeValue);
                            
                            //Website
                            $chWebsite_tag = $chpath->query("//Content/General/Website");
                            $chWebsite = trim($chWebsite_tag->item(0)->nodeValue);
                            
                            $chTelephone_tag = $chpath->query("//Content/General/Telephone");
                            $chTelephone = trim($chTelephone_tag->item(0)->nodeValue);
                            
                            //Body
                            $chBody_tag = $chpath->query("//Content/General/Body");
                            $chBody = trim($chBody_tag->item(0)->nodeValue);
                            
                            //address 1
                            $chAddress1_tag = $chpath->query("//Content/General/Address/Address1");
                            $chAddress1 = trim($chAddress1_tag->item(0)->nodeValue);
                            
                            //Address 2
                            $chAddress2_tag = $chpath->query("//Content/General/Address/Address2");
                            $chAddress2 = trim($chAddress2_tag->item(0)->nodeValue);
                            
                            //City
                            $chCity_tag = $chpath->query("//Content/General/Address/City");
                            $chCity = trim($chCity_tag->item(0)->nodeValue);
                            
                            //Postcode
                            $chPostcode_tag = $chpath->query("//Content/General/Address/Postcode");
                            $chPostcode = trim($chPostcode_tag->item(0)->nodeValue);
                            
                            //Latitude
                            $chLatitude_tag = $chpath->query("//Content/General/Address/Latitude");
                            $chLatitude = trim($chLatitude_tag->item(0)->nodeValue);
                            
                            //Longitude
                            $chLongitude_tag = $chpath->query("//Content/General/Address/Longitude");
                            $chLongitude = trim($chLongitude_tag->item(0)->nodeValue);
                            
                            $repeater = get_post_meta($wpID, 'city_hotel_item', true);
    
                            //If there are no rows yet just set to 1, otherwise +1
                            $new_repeater_count = ( !$repeater ? 1 : $repeater + 1 );
                            //update_post_meta($wpID, 'city_hotel_item', $new_repeater_count);
                                    
                            update_sub_field(array('city_hotel_item',$chID,'hotel_name'), $chTitle, $wpID);
                            update_sub_field(array('city_hotel_item',$chID,'hotel_body'), $chBody, $wpID);
                            update_sub_field(array('city_hotel_item',$chID,'category'), $chType, $wpID);
                            update_sub_field(array('city_hotel_item',$chID,'website'), $chWebsite, $wpID);
                            update_sub_field(array('city_hotel_item',$chID,'telephone'), $chTelephone, $wpID);
                                  
                            update_sub_field(array('city_hotel_item',$chID,'thoroughfare'), $chAddress1, $wpID);
                            update_sub_field(array('city_hotel_item',$chID,'neighborhood'), $chAddress2, $wpID);
                            update_sub_field(array('city_hotel_item',$chID,'locality'), $chCity, $wpID);
                            update_sub_field(array('city_hotel_item',$chID,'postcode'), $chPostcode, $wpID);
                            update_sub_field(array('city_hotel_item',$chID,'latitude'), $chLatitude, $wpID);
                            update_sub_field(array('city_hotel_item',$chID,'longitude'), $chLongitude, $wpID);
    
                            $chID= $chID+1;
                        }
                    }
                    ////// repeater
                    
                    //History
                    $city_hitsory_tag = $citypath->query("//Content/History/History");
                    $city_hitsory = trim($city_hitsory_tag->item(0)->nodeValue);
                    update_field('city_history', $city_hitsory, $wpID);
                    
                    //Weather
                    $city_weather_tag = $citypath->query("//Content/Weather/BestTimeToVisit");
                    $city_weather = trim($city_weather_tag->item(0)->nodeValue);
                    update_field('city_best_time_to_visit', $city_weather, $wpID);
                    
                    $city_forecastID_tag = $citypath->query("//Content/Weather/Forecast7day/Forecast[1]/LocationId");
                    $city_forecastID = trim($city_forecastID_tag->item(0)->nodeValue);
                    update_field('7_day_id', $city_forecastID, $wpID);
                    
                    /*
                    $city_weather_forecasts = $citypath->query("//Content/Weather/Forecast7day/Forecast");
                    if (!is_null($city_weather_forecasts)) {
                        $forID = 1;
                        $repeater = get_post_meta($wpID, 'forecast', true);
    
                    //If there are no rows yet just set to 1, otherwise +1
                    $new_repeater_count = ( !$repeater ? 1 : $repeater + 1 );
                    update_post_meta($wpID, 'forecast', $new_repeater_count);
                        foreach($city_weather_forecasts as $forecast){
                            $f_Doc = new DOMDocument();
                            $f_clone = $forecast->cloneNode(TRUE);
                            $f_Doc->appendChild($f_Doc->importNode($f_clone, TRUE));
                            $fpath = new DOMXPath($f_Doc);
            
                            //wind speed kph
                            $windkph_tag = $fpath->query("//WindSpeedKph");
                            $windkph = trim($windkph_tag->item(0)->nodeValue);
                            
                            //wind speed mph
                            $windmph_tag = $fpath->query("//WindSpeedMph");
                            $windmph = trim($windmph_tag->item(0)->nodeValue);
                            
                            //visibility
                            $visibility_tag = $fpath->query("//Visibility");
                            $visibility = trim($visibility_tag->item(0)->nodeValue);
                            
                            //humidity
                            $humidity_tag = $fpath->query("//Humidity");
                            $humidity = trim($humidity_tag->item(0)->nodeValue);
                            
                            //wind direction
                            $winddir_tag = $fpath->query("//WindDir");
                            $winddir = trim($winddir_tag->item(0)->nodeValue);
                            
                            //day
                            $fday_tag = $fpath->query("//Day");
                            $fday = trim($fday_tag->item(0)->nodeValue);
                            
                            //precipitation
                            $precipitation_tag = $fpath->query("//Precipitation");
                            $precipitation = trim($precipitation_tag->item(0)->nodeValue);
                            
                            //country
                            $fcountry_tag = $fpath->query("//Country");
                            $fcountry = trim($fcountry_tag->item(0)->nodeValue);
                            
                            //Name
                            $fname_tag = $fpath->query("//Name");
                            $fname = trim($fname_tag->item(0)->nodeValue);
                            
                            //overheadFrench
                            $overheadFrench_tag = $fpath->query("//OverheadFrench");
                            $overheadFrench = trim($overheadFrench_tag->item(0)->nodeValue);
                            
                            //cloudCover
                            $cloudCover_tag = $fpath->query("//CloudCover");
                            $cloudCover = trim($cloudCover_tag->item(0)->nodeValue);
                            
                            //LocationId
                            $location_tag = $fpath->query("//LocationId");
                            $location = trim($location_tag->item(0)->nodeValue);
                            
                            //overheadIcon
                            $overheadIcon_tag = $fpath->query("//OverheadIcon");
                            $overheadIcon = trim($overheadIcon_tag->item(0)->nodeValue);
                            
                            //updatedAt
                            $updatedAt_tag = $fpath->query("//UpdatedAt");
                            $updatedAt = trim($updatedAt_tag->item(0)->nodeValue);
                            
                            //nightMin
                            $nightMin_tag = $fpath->query("//NightMin");
                            $nightMin = trim($nightMin_tag->item(0)->nodeValue);
                            
                            //overhead
                            $overhead_tag = $fpath->query("//Overhead");
                            $overhead = trim($overhead_tag->item(0)->nodeValue);
                            
                            //Date
                            $fDate_tag = $fpath->query("//Date");
                            $fDate = trim($fDate_tag->item(0)->nodeValue);
                            
                            //overheadGerman
                            $overheadGerman_tag = $fpath->query("//OverheadGerman");
                            $overheadGerman = trim($overheadGerman_tag->item(0)->nodeValue);
                            
                            //Pressure
                            $pressure_tag = $fpath->query("//Pressure");
                            $pressure = trim($pressure_tag->item(0)->nodeValue);
                            
                            //Id
                            $fID_tag = $fpath->query("//Id");
                            $fID = trim($fID_tag->item(0)->nodeValue);
            
                            //DayMax
                            $dayMax_tag = $fpath->query("//DayMax");
                            $dayMax = trim($dayMax_tag->item(0)->nodeValue);
                            
                            $updatedAt_tag = $fpath->query("//UpdatedAt");
                            $updatedAt = trim($updatedAt_tag->item(0)->nodeValue);
                            
                            $repeater = get_post_meta($wpID, 'forecast', true);
    
                            //If there are no rows yet just set to 1, otherwise +1
                            $new_repeater_count = ( !$repeater ? 1 : $repeater + 1 );
                            //update_post_meta($wpID, 'forecast', $new_repeater_count);
                            
                            update_sub_field(array('forecast',$forID,'pressure'), $pressure, $wpID);
                            update_sub_field(array('forecast',$forID,'visibility'), $visibility, $wpID);
                            update_sub_field(array('forecast',$forID,'cloudcover'), $cloudCover, $wpID);
                            update_sub_field(array('forecast',$forID,'date'), $fDate, $wpID);
                            
                            update_sub_field(array('forecast',$forID,'precipitation'), $precipitation, $wpID);
                            update_sub_field(array('forecast',$forID,'windspeedkph'), $windkph, $wpID);
                            update_sub_field(array('forecast',$forID,'overheadfrench'), $overheadFrench, $wpID);
                            update_sub_field(array('forecast',$forID,'overhead'), $overhead, $wpID);
                            update_sub_field(array('forecast',$forID,'day'), $fday, $wpID);
                            
                            update_sub_field(array('forecast',$forID,'windspeedmph'), $windmph, $wpID);
                            update_sub_field(array('forecast',$forID,'forecast_id'), $fID, $wpID);
                            update_sub_field(array('forecast',$forID,'humidity'), $humidity, $wpID);
                            update_sub_field(array('forecast',$forID,'overheadgerman'), $overheadGerman, $wpID);
                            update_sub_field(array('forecast',$forID,'forecast_country'), $fcountry, $wpID);
                            
                            update_sub_field(array('forecast',$forID,'nightmin'), $nightMin, $wpID);
                            update_sub_field(array('forecast',$forID,'forecast_name'), $fname, $wpID);
                            update_sub_field(array('forecast',$forID,'location_id'), $location, $wpID);
                            update_sub_field(array('forecast',$forID,'overhead_icon'), $overheadIcon, $wpID);
                            update_sub_field(array('forecast',$forID,'daymax'), $dayMax, $wpID);
                            
                            update_sub_field(array('forecast',$forID,'updated_at'), $updatedAt, $wpID);
                            update_sub_field(array('forecast',$forID,'wind_dir'), $winddir, $wpID);
         
                            $forID= $forID+1;
                        }
                    }*/
    
                    $i++;
                }
            }else {
                echo "false: post does not exist \n";
                if($INSERTNEW){
                    $postStat = 'publish';
                    $postContent = ' ';
                    echo "INSERTING:- post_title: $title | post_type: $POSTTYPE | post_status: $postStat | post_content: $postContent\n";
                    $insertID = wp_insert_post(array(
                                               'post_title'=>$title,
                                               'post_type'=>$POSTTYPE,
                                               'post_status'=>$postStat,
                                               'post_content'=>$postContent,
                                               
                                               ));
                    $placesNode = $element->parentNode;
                
                    $continentNode = $placesNode->parentNode;
                    
                    $continent = $continentNode->getAttribute('title');
                    
                    wp_set_object_terms($insertID,$continent,'wtg_continent',true);
                    
                    wp_set_object_terms($insertID,$GUIDETYPE,'wtg_guide_type',true);
                    if($insertID){
                        echo "Inserted!";
                        $i++;
                    } else {
                        echo "Failed!";
                    }
                    
                } else {
                    echo "Skipping INSERT of Title: $title | nid: $nid \n";
                }
                
            }
            echo "\n\n";
                
                //$i++;
        }
    }

    if($INSERTNEW){
        echo "Total Added: $i\n";
        echo "Run again for content\n";
    } else {
        if($i ==0){
            echo "$i Inserted or $i Found.\nNothing done.\n";
        } else {
            echo "Total: $i\n";
        }
        
    }
}

?>