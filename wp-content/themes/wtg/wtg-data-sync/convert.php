<?php

$langsArray = array(
    '1' => 'en',//World Travel Guide
    //'2' => 'en',
    //'3' => 'de',//World of Foood and Drink
    //'4' => 'en',//Der Reise Fuehrer
    //'5' => 'en',//Spainish
    '6' => 'de',//Der Reise Fuehrer Dev
);


foreach($langsArray as $key => $lang)
{
	$region_source_xml = 'regions-full-'.$lang.'.xml';
	$region_destination = 'filtered/'.$region_source_xml;
	
	echo ' Processing '.$region_source_xml.' to '.$region_destination;
	
	$region_xml = simplexml_load_file('source-data/'.$region_source_xml);
	
	$regionsearches = ['href="/i/'];
	$regionreplacements = ['class="internal" href="/'];
	
//	echo 'the new XML is'.$newRegionXmLA;
	$newRegionXml = simplexml_load_string( str_replace( $regionsearches, $regionreplacements, $region_xml->asXml() ),'SimpleXMLElement', LIBXML_COMPACT | LIBXML_PARSEHUGE );
	$newRegionXml->asXml($region_destination);
	
	
	$city_source_xml = 'cities-full-'.$lang.'.xml';
	$city_destination = 'filtered/'.$city_source_xml;
	$city_xml = simplexml_load_file('source-data/'.$city_source_xml);
	
	$citysearches = ['href="/i/'];
	$cityreplacements = ['class="internal" href="/'];
	
	$newCityXml = simplexml_load_string( str_replace( $citysearches, $cityreplacements, $city_xml->asXml() ),'SimpleXMLElement', LIBXML_COMPACT | LIBXML_PARSEHUGE );
	$newCityXml->asXml($city_destination);
	
	
	$airport_source_xml = 'airports-full-'.$lang.'.xml';
	$airport_destination = 'filtered/'.$airport_source_xml;
	$airport_xml = simplexml_load_file('source-data/'.$airport_source_xml);
	
	$airportsearches = ['href="/i/'];
	$airportreplacements = ['class="internal" href="/'];
	
	$newAirportXml = simplexml_load_string( str_replace( $airportsearches, $airportreplacements, $airport_xml->asXml() ),'SimpleXMLElement', LIBXML_COMPACT | LIBXML_PARSEHUGE );
	$newAirportXml->asXml($airport_destination);
}







?>
