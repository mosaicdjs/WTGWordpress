<?php

global $_SERVER;

$POSTTYPE = 'guides';
$GUIDETYPE = 'city';
$INSERTNEW = false;

$_SERVER['HTTP_HOST'] = 'staging.worldtravelguide.net';
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
$hotelCount = 0;

foreach ($wtgArray as $wtgID => $wtgLang){
    //switch_to_blog( (int)$wtgID );
    
    $blog_title = get_bloginfo();
    echo 'The blog is'.$blog_title;
    //$blog_title ='test';
    
    $file = "/var/www/columbus-xml/source-data/cities-full-en.xml";
    
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
    $elements = $xp->query('//City');
    
    //var_dump($nodes);
    $i=0;
    echo "\n Title, Type, Latitude, Longitude, Address1, Address2, City, Postcode, Website,  Telephone,  Description";

    if (!is_null($elements)) {
        foreach ($elements as $element)
        {
            $title = $element->getAttribute('title');
            $nid = $element->getAttribute('nid');
            

            $match;
            
            switch($nid)
            {
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
            $taxonomyPrice =  'wtg_listing_price';
            $taxonomyType = 'wtg_listing_type';    
            $typeID = 39;
            $wpID = $match->ID;
            $guideTerms = get_the_terms($wpID,'wtg_guide_type');
            $guideType = $guideTerms[0]->slug;
            if ($guideType == 'city' ) 
            {
                //echo "Title: $title | nid: $nid\n";
                $city_Doc = new DOMDocument();
                $cloned = $element->cloneNode(TRUE);
                $city_Doc->appendChild($city_Doc->importNode($cloned, True));
                $citypath = new DOMXPath($city_Doc);
            //echo $title.' City found ';
            $city_hotels_tag = $citypath->query("//Content/Accommodation/Hotels");
            $city_hotels_items = $citypath->query("//Content/Accommodation/Hotel");
            if (!is_null($city_hotels_items)) 
            {
                foreach($city_hotels_items as $city_hotel)
                {
                if ($hotelCount < 99999) 
                {
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
                    //$chBody = str_replace(',', ' ', $chBody);
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
                    
                    //echo "\n $chTitle, $chType, $chLatitude, $chLongitude, $chAddress1, $chAddress2, $chCity, $chPostcode, $chWebsite,  $chTelephone,  $chBody";

/*                        $listingID = wp_insert_post
                        (
                            array 	(
                            'post_type' => 'hotel',
                            'post_title' => $chTitle,
                            'post_status' => 'draft',
                            'comment_status' => 'closed',   // if you prefer
                            'ping_status' => 'closed',      // if you prefer 
                                )
                        );
                        switch ($chType)
                        {
                            case 'Cheap' :
                                $listingPriceID= 40;
                            break;

                            case 'Moderate' :
                                $listingPriceID= 42;
                            break;
                            case 'Luxury' :
                                $listingPriceID= 44;
                            break;
                        } */
                        $hotelCount++;
                        
                        $page = get_page_by_title($chTitle , OBJECT, 'hotel');
                        //$page = get_page_by_title( $chTitle ); //as an e.g.
                        echo "\n".$chTitle.' '.$page->ID;
                        $listingID = $page->ID;
                        //update_field ('type_of_listing', 'City', $listingID );
                        //update_field('listing_city', $wpID, $listingID );
                        //update_field('listing_title', $chTitle, $listingID );
                        //update_field('listing_latitude', $chLatitude, $listingID);
                        //update_field('listing_longitude', $chLongitude, $listingID);
                        //echo "\n Address line 1 is $chAddress2";
                        //update_field('listing_address_line_1', $chAddress2, $listingID);
                        //update_field('listing_address_line_2', $chCity, $listingID);
                        //update_field('listing_address_line_3', $chPostcode, $listingID);
                        //update_field('listing_telephone',$chTelephone,$listingID);
                        //update_field('listing_website',$chWebsite,$listingID);
                        //update_field('listing_price', $listingPriceID, $listingID);
                        update_field('listing_introduction', $chBody, $listingID);   
               
                       // wp_set_post_terms( $listingID, $listingPriceID, $taxonomyPrice );
                       // wp_set_post_terms( $listingID, $typeID, $taxonomyType);
                    }

                }    // End city hotel loop
            } // End city hotels tag

        } // End foreach
        } // End City Found;    
    } // End IF
    echo "\nTotal Hotels ".$hotelCount;
} // End Function

?>