<?php

function wtg_homepage_widgets()
{
	if (is_front_page()) {
		if ( is_active_sidebar( 'homepage-features' ) ) :
			echo '<div class="container box_list">';
				dynamic_sidebar('homepage-features');
			echo '</div>';
		endif;
		if ( is_active_sidebar( 'homepage-ad-container' ) ) :
			echo '<div class="container box_list">';
				dynamic_sidebar('homepage-ad-container');
			echo '</div>';
		endif;
		if ( is_active_sidebar( 'homepage-fandd' ) ) :
			echo '<div class="container box_list">';
				dynamic_sidebar('homepage-fandd');
			echo '</div>';
		endif;
		if ( is_active_sidebar( 'homepage-cityguides' ) ) :
			echo '<div class="container box_list">';
				dynamic_sidebar('homepage-cityguides');
			echo '</div>';
		endif;
		if ( is_active_sidebar( 'homepage-countryguides' ) ) :
			echo '<div class="container box_list">';
				dynamic_sidebar('homepage-countryguides');
			echo '</div>';
		endif;
	} else {
		if ( is_active_sidebar( 'homepage-features' ) ) :
			echo '<div class="container box_list">';
				dynamic_sidebar('homepage-features');
			echo '</div>';
		endif;
	}
}

function wtg_continent_widgets()
{
	if ( is_active_sidebar( 'continent-widgets1' ) ) :
		echo '<div class="container box_list">';
			dynamic_sidebar('continent-widgets1');
		echo '</div>';
	endif;
	
}

function wtg_country_widgets()
{
	if ( is_active_sidebar( 'country-widgets1' ) ) :
		echo '<div class="container box_list">';
			dynamic_sidebar('country-widgets1');
		echo '</div>';
	endif;
	if ( is_active_sidebar( 'country-widgets2' ) ) :
		echo '<div class="container box_list">';
			dynamic_sidebar('country-widgets2');
		echo '</div>';
	endif;
	if ( is_active_sidebar( 'country-widgets3' ) ) :
		echo '<div class="container box_list">';
			dynamic_sidebar('country-widgets3');
		echo '</div>';
	endif;
}

function wtg_city_widgets()
{
	if ( is_active_sidebar( 'city-widgets1' ) ) :
		echo '<div class="container box_list">';
			dynamic_sidebar('city-widgets1');
		echo '</div>';
	endif;
	if ( is_active_sidebar( 'city-widgets2' ) ) :
		echo '<div class="container box_list">';
			dynamic_sidebar('city-widgets2');
		echo '</div>';
	endif;
	if ( is_active_sidebar( 'city-widgets3' ) ) :
		echo '<div class="container box_list">';
			dynamic_sidebar('city-widgets3');
		echo '</div>';
	endif;
}

function wtg_features_widgets()
{
	if ( is_active_sidebar( 'features-widgets1' ) ) :
		echo '<div class="container box_list">';
			dynamic_sidebar('features-widgets1');
		echo '</div>';
	endif;
	if ( is_active_sidebar( 'features-widgets2' ) ) :
		echo '<div class="container box_list">';
			dynamic_sidebar('features-widgets2');
		echo '</div>';
	endif;
	if ( is_active_sidebar( 'features-widgets3' ) ) :
		echo '<div class="container box_list">';
			dynamic_sidebar('features-widgets3');
		echo '</div>';
	endif;
	if ( is_active_sidebar( 'features-widgets4' ) ) :
		echo '<div class="container box_list">';
			dynamic_sidebar('features-widgets4');
		echo '</div>';
	endif;
	if ( is_active_sidebar( 'features-widgets5' ) ) :
		echo '<div class="container box_list">';
			dynamic_sidebar('features-widgets5');
		echo '</div>';
	endif;
/*	if ( is_active_sidebar( 'features-widgets6' ) ) :
		echo '<div class="container box_list">';
			dynamic_sidebar('features-widgets6');
		echo '</div>';
	endif; */
	
}

function wtg_features_widgets_auto()
{
	if ( is_active_sidebar( 'features-widgets6' ) ) :
		echo '<div class="container box_list">';
			dynamic_sidebar('features-widgets6');
		echo '</div>';
	endif;
	
}


function wtg_guides_widgets()
{
	if ( is_active_sidebar( 'guides-widgets1' ) ) :
		echo '<div class="container box_list">';
			dynamic_sidebar('guides-widgets1');
		echo '</div>';
	endif;
	if ( is_active_sidebar( 'guides-widgets2' ) ) :
		echo '<div class="container box_list">';
			dynamic_sidebar('guides-widgets2');
		echo '</div>';
	endif;
}

function wtg_guides_sidebar_widgets()
{
	if ( is_active_sidebar( 'guides-side-widgets1' ) ) :
		echo '<div style="max-height:250px;" style="max-width:300px;">';
			dynamic_sidebar('guides-side-widgets1');
		echo '</div>';
	endif;

}

function wtg_airport_widgets()
{
	if ( is_active_sidebar( 'airport-widgets1' ) ) :
		echo '<div class="container box_list">';
			dynamic_sidebar('airport-widgets1');
		echo '</div>';
	endif;
}

function wtg_beach_widgets()
{
	if ( is_active_sidebar( 'beach-widgets1' ) ) :
		echo '<div class="container box_list">';
			dynamic_sidebar('beach-widgets1');
		echo '</div>';
	endif;
}

function wtg_cruise_widgets()
{
	if ( is_active_sidebar( 'cruise-widgets1' ) ) :
		echo '<div class="container box_list">';
			dynamic_sidebar('cruise-widgets1');
		echo '</div>';
	endif;
}

function wtg_ski_widgets()
{
	if ( is_active_sidebar( 'ski-widgets1' ) ) :
		echo '<div class="container box_list">';
			dynamic_sidebar('ski-widgets1');
		echo '</div>';
	endif;
}

function wtg_passport_widgets()
{
	if ( is_active_sidebar( 'passport-widgets1' ) ) :
		echo '<div class="container box_list">';
			dynamic_sidebar('passport-widgets1');
		echo '</div>';
	endif;
}

function wtg_pubhols_widgets()
{
	if ( is_active_sidebar( 'pubhols-widgets1' ) ) :
		echo '<div class="container box_list">';
			dynamic_sidebar('pubhols-widgets1');
		echo '</div>';
	endif;
}





?>