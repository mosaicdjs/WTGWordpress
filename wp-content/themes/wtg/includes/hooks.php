<?php
/*
* @author Adam Faulkner
*/
///////////////////////
//INTRODUCTION
///////////////////////
/*,
This file, and only this file, is an attempt at a "literate programming" document.
This file governs the layout of the site, by calling functions held elsewhere within the system.
I have tried to add comments where possible. So, in essence, this file is the README for the entire site.

The previous site was drupal based, with no comments.
Even still the guides data should still come from drupal!
This data from Drupal feeds this site and other systems with content.
This Site accepts XML data from the drupal system, and presents it in a usable (Wordpress) manner.
 
If you want to see how this site was put together:

		START HERE!!

//mini tutorial
Appropriate hooks need to be added to each template file.
Using these hooks, functions can be called and a weight assigned to them.
This enables you to re-order various block elements about a page, or remove them entirely.
This also enables blocks containing html, and php to be re-used on different/ multiple pages within this theme.

	To create a new hook call:
		do_action('<hook-name>');
	in the appropriate location.
	
	Then call:
		add_action();
	and associate it with this newly created 'hook', with other parameters as appropriate.
		add_action('<hook-name>','<function>', <weight>);
    
//Debuging the code:
With the WP_DEBUG flag set to true, wordpress will now tell you that you are missing the function you have just called from this file.
This warning message should also apear in the location you set with weight.
This was very handy while developing this theme.

//Note
For neatness, the functions that are called by this file reside in theme_functions.php.
i have tried to split out this 'theme_functions' file into sections of code.
If you see a folder in <theme-folder>/includes called "theme_functions", then i have succeed in this task...
... A README.txt, with line numbers, will also be placed in this directory..
	for all the eejits who can't search for a function themselves.


*/

///////////////////////
//The Code:
///////////////////////

add_action( 'init', 'wtg_structure' );

function wtg_structure() 
{
	// Header
	add_action ('wtg_after_body', 'wtg_just_premium', 10);
    add_action ('wtg_header', 'wtg_logo', 10);
	add_action ('wtg_header', 'wtg_primary_nav', 20);	
	add_action ('listing_header', 'wtg_listing_logo', 10); // Special header for listing page.

	//Footer
	add_action ('basetheme_footer', 'wtg_footer_desktop', 10);
    add_action ('basetheme_footer', 'wtg_footer_copyright', 20);
	add_action ('listing_footer', 'wtg_footer_copyright', 20); // Special footer for listing page
    add_action ('wtg_after_body', 'wtg_start', 10);
    add_action ('wtg_before_body_end', 'wtg_end', 10);
    add_action ('wtg_before_body_end', 'wtg_just_premium', 30);
	
	//default page 
    add_action('defaultpage','wtg_pagecontent',20);
    add_action('defaultpage','wtg_homepage_widgets',40 );
	//add_action('defaultpage','wtg_features_widgets',40);// Features widgets
	
	add_action('bookshop', 'wtg_pagecontent',20);
	
	//bakery page
    add_action('bakerypage','wtg_bakerycontent',20);
	add_action('bakerypage','wtg_features_widgets',40);
	//add_action('bakerypage', 'wtg_homepage_widgets',40 );
	//add_action('bakerypage', 'wtg_taboola',50);

	//homepage 
    add_action('homepage', 'wtg_main_carousel',10);
    add_action('homepage', 'wtg_mobile_hero',10);
    add_action('homepage', 'wtg_followus',20);
    add_action('homepage', 'wtg_bluebox', 30);
	add_action('homepage', 'wtg_homepage_widgets',40 );
	// widget function returns 3 wiget regions these are set up in menus_sidebars.php
    
    
//features-home hooks
    add_action('features-page','wtg_latest_articles',10);
	add_action('features-page', 'wtg_features_widgets_auto',30);

	//    add_action('features-page','wtg_features_widgets',30);// widget function returns 3 wiget regions these are set up in menus_sidebars.php
    //add_action('features-page','wtg_articlesby_country_static',20);// function returns raw html, no wordpress magic.. yet.
    //add_action('features-page','wtg_articlesby_country',20);// replace the static function with this
	add_action('features-page-auto', 'wtg_latest_articles',30);
	add_action('features-page-auto', 'wtg_features_widgets_auto',30);
	
	//single guide pages - ingnoring guide type, these hooks serve all guides.
	add_action('singleGuides', 'wtg_main_carousel', 10);
	add_action('singleGuides', 'wtg_mobile_hero',10);
    add_action('singleGuides', 'wtg_followus',20);
    //add_action('singleGuides', 'wtg_sponsor_guide',30);
    add_action('singleGuides','wtg_guides_content',40);
	add_action('singleGuides','wtg_guides_widgets',50);
	//add_action('singleGuides','wtg_homepage_listings',50);
	add_action('singleGuides', 'wtg_stay22',55);
	add_action('singleGuides','wtg_hotel_listings',60);
	//add_action('singleGuides', 'wtg_revcontent',60);
	add_action('singleGuides', 'wtg_taboola',60);

	//feature
	add_action('singleFeatures', 'wtg_article_title_image_share', 10);
	add_action('singleFeatures', 'wtg_article_content', 20);
	add_action('singleFeaturesNew', 'wtg_article_title_image_share_new',10);
	add_action('singleFeaturesNew', 'wtg_article_content_new',20);
	add_action('singleFeaturesNew', 'wtg_taboola',30);
	add_action('singleFeatures', 'wtg_taboola',30);
	//add_action('singleFeaturesNew', 'wtg_revcontent',30);
	//add_action('singleFeatures', 'wtg_revcontent',30);

//Guides Pages
	/*
	links to pages that are specific to a particular query.
	not listed alphabetically because i'm dyslexic and i built this site; i make the ruels!!!
	
	Based on traffic to the site, these sections have the potential to be managed and promoted effectively.
	New versions of these pages could be created to accomodate for weather... or any other guide section.
	The beef of this code is in how i have written the "country by", "Ski by" functions.
	Thankfully these all have their own file... I would have loved to have written a fucntion that accounted for each type, but... That's devleopment.
	
	*/
	//Beach guides
	add_action('beachguide-page','wtg_main_carousel',10);
	add_action('beachguide-page', 'wtg_mobile_hero',10);
	// add_action('beachguide-page','wtg_beaches_AZ_html',20);
	add_action('beachguide-page','wtg_beachby_AZ_static',20);
	add_action('beachguide-page','wtg_beach_widgets',30);
	
	//Ski guides
	add_action('skiguide-page','wtg_main_carousel',10);
	add_action('skiguide-page', 'wtg_mobile_hero',10);
	add_action('skiguide-page','wtg_skiby_AZ_static',20);
	add_action('skiguide-page','wtg_ski_widgets',30);
	
	//Cruise guides
	add_action('cruiseguide-page','wtg_main_carousel',10);
	add_action('cruiseguide-page', 'wtg_mobile_hero',10);
	add_action('cruiseguide-page','wtg_cruiseby_AZ_static',20);
	add_action('cruiseguide-page','wtg_cruise_widgets',30);
	
	//Airport guides
	add_action('airportguide-page','wtg_main_carousel',10);
	add_action('airportguide-page', 'wtg_mobile_hero',10);
    add_action('airportguide-page','wtg_airportby_AZ_static',20);
	add_action('airportguide-page','wtg_airport_widgets',30);
	
	//Country guides
    add_action('countryguide-page','wtg_main_carousel',10);
    add_action('countryguide-page', 'wtg_mobile_hero',10);
	add_action('countryguide-page','wtg_countryby_contient_db',20);
	add_action('countryguide-page','wtg_country_widgets',30);
	
		//Continent guides
		add_action('guides-pages','wtg_main_carousel',10);
		add_action('guides-pages', 'wtg_mobile_hero',10);
		add_action('guides-pages','wtg_countryby_contient_db',20);
		add_action('guides-pages','wtg_country_widgets',30);
    
    //City guides
    add_action('cityguide-page','wtg_main_carousel',10);
    add_action('cityguide-page', 'wtg_mobile_hero',10);
    add_action('cityguide-page','wtg_cityby_AZ_static',20);
    add_action('cityguide-page','wtg_city_widgets',30);
    
	//Passport & Visa guides
	add_action('passvisa-page','wtg_main_carousel',10);
	add_action('passvisa-page', 'wtg_mobile_hero',10);
	add_action('passvisa-page','wtg_passvisaby_continent',20);
	add_action('passvisa-page','wtg_passport_widgets',30);
	
	//Public Holidays guides
	add_action('publichols-page','wtg_main_carousel',10);
	add_action('publichols-page', 'wtg_mobile_hero',10);
	add_action('publichols-page','wtg_publicholsby_continent',20);
	add_action('publichols-page','wtg_pubhols_widgets',30);

	//Listing Pages (Hotels, Restaurants, Attractions)
	add_action('listing-page','wtg_listing_content',20);
    add_action('listing-page', 'wtg_homepage_widgets',40 );// why not add the home page widgets to these pages?? because we can!!

    add_action('404-page', 'wtg_404_content');
    
	add_action('singleBooks', 'wtg_book_content');
	add_action('skyscanner-page', 'wtg_skyscanner_tools');
}


?>
