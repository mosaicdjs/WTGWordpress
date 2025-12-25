<?php 
/*
* Template Name: Latest Database Refresh
*/
get_header();
echo '<h1>Database Refresh</h1>';
update_regions();
update_cities();
update_airports();
//update_beaches();
//update_ski_resorts();
//update_cruises();
//update_attractions();
get_footer();

