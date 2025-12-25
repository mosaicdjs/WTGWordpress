<?php

$file = "/var/www/columbus-xml/source-data/cities-full-en.xml";
$xml = new DOMDocument();
$xml->preserveWhiteSpace = FALSE;
$xml->load($file);    
$xp = new DOMXPath($xml);
$elements = $xp->query('//City');
$i=0;
if (!is_null($elements)) 
{
    foreach ($elements as $element)
    {
        $title = $element->getAttribute('title');
        if ($title)
        {    
            $hotelCount = 0;
            $restaurantCount = 0;
            $nightlifeCount = 0;
            $attractionCount = 0;

            $city_Doc = new DOMDocument();
            $cloned = $element->cloneNode(TRUE);
            $city_Doc->appendChild($city_Doc->importNode($cloned, True));
            $citypath = new DOMXPath($city_Doc);

            $city_hotels_tag = $citypath->query("//Content/Accommodation/Hotels");
            $city_hotels_items = $citypath->query("//Content/Accommodation/Hotel");
            if (!is_null($city_hotels_items)) { foreach($city_hotels_items as $city_hotel) { $hotelCount++; } } 

            $city_restaurants_tag = $citypath->query("//Content/Restaurants/Restaurants");
            $city_restaurants_items = $citypath->query("//Content/Restaurants/Restaurant");
            if (!is_null($city_restaurants_items)) { foreach($city_restaurants_items as $city_restaurant) { $restaurantCount++; } } 

            $city_nightlife_tag = $citypath->query("//Content/Nightlife/Nightlife");
            $city_nightlife_items = $citypath->query("//Content/Nightlife/CityNightlifeItem");
            if (!is_null($city_nightlife_items)) {foreach($city_nightlife_items as $city_nightlifeitem){ $nightlifeCount++; } } 

            $attractions = $citypath->query("//Content/Attractions/CityAttractions/Attraction");
            if (!is_null($attractions)) { foreach($attractions as $attraction) { $attractionCount++; } }                

            echo $title.','.$hotelCount.','.$restaurantCount.','.$nightlifeCount.','.$attractionCount."\n";
        }
    }
} 
//    echo ' Total Hotels is: '.$hotelCount.' Total Restaurants is: '.$restaurantCount;
?>