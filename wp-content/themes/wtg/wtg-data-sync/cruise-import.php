<?php

global $_SERVER;

$POSTTYPE = 'guides';
$GUIDETYPE = 'cruise';
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


foreach ($wtgArray as $wtgID => $wtgLang){
    //switch_to_blog( (int)$wtgID );
    
    $blog_title = get_bloginfo();
    echo 'The blog is'.$blog_title;
    //$blog_title ='test';
    
    $file = "/var/www/columbus-xml/source-data/cruises-full-en.xml";
    
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
    $elements = $xp->query('//Cruise');
    
    //var_dump($nodes);
    $i=0;
    if (!is_null($elements)) {
        foreach ($elements as $element)
        {
            $title = $element->getAttribute('title');
            $nid = $element->getAttribute('nid');
            
            echo "Title: $title | nid: $nid\n";
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
    
            $wpID = $match->ID;
            $guideTerms = get_the_terms($wpID,'wtg_guide_type');
            $guideType = $guideTerms[0]->slug;
            if ($guideType == 'cruise' ) {echo $title.' Cruise found ';update_post_meta($wpID,'guide_legacy_id',$nid);}
                       
        } // End foreach

    } // End IF
} // End Function

?>