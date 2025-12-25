<?php

/*
* Template Name: fota
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

//update_airports();
//wtg_airport_maps();
// update_beaches();
// update_ski_resorts();
//list_out_airports();
//get_data();
//get_airports_with_code();
//xml_airport_destinations();
//xml_region_destinations();
//xml_city_destinations();

wtg_fota('portugal');

get_footer();

function wtg_fota($region)
{
$json = file_get_contents('https://www.gov.uk/api/content/foreign-travel-advice/'.$region);
$obj = json_decode($json);
$details = $obj->details;
$parts = $details->parts;
foreach ($parts as $part)
{ echo ($part->body);}
}



?>