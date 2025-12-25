<?php

$hotelCount = 0;
$file = "/var/www/columbus-xml/source-data/airports-full-en.xml";   
$xml = new DOMDocument();
$xml->preserveWhiteSpace = FALSE;
$xml->load($file);  
$xp = new DOMXPath($xml);
$elements = $xp->query('//Airport');
$i=0;
if (!is_null($elements)) 
{
    foreach ($elements as $element)
    {
        $title = $element->getAttribute('title');
        $hotelCount = 0;
        $city_Doc = new DOMDocument();
        $cloned = $element->cloneNode(TRUE);
        $city_Doc->appendChild($city_Doc->importNode($cloned, True));
        $citypath = new DOMXPath($city_Doc);
        $city_hotels_tag = $citypath->query("//Content/Hotels/Hotels");
        $city_hotels_items = $citypath->query("//Content/Hotels/Hotel");
        if (!is_null($city_hotels_items)) { foreach($city_hotels_items as $city_hotel) { $hotelCount++; } } 
        echo $title.','.$hotelCount."\n";
    } 
}
    echo "\nTotal Hotels ".$hotelCount;
?>