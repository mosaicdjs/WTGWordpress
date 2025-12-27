<?php

function wtg_cityby_AZ_static()
{
	global $wpdb;
	
	$language = get_field ('language','options');
	switch ($language)
{
	case 'en':
		$findYourCity = 'Find your city from the list of countries below';
		$findYourCountry = 'Find your country';
		$selectYourCity = 'Select your city';
		$selectYourCountry = 'Select your country';
		break;

	case 'de':
		$findYourCity = 'Finden Sie Ihre Stadt über die Länderliste.';
		$findYourCountry = 'Wählen Sie ein Land aus';
		$selectYourCity = 'Wählen Sie eine Stadt aus';
		$selectYourCountry ='Wählen Sie ein Land aus';
		break;
}

	echo '
	<style>
		ul.menu-columns 
		{
/*    		-webkit-column-count: 4; 
    		-moz-column-count: 4; 
    		column-count: 4; */
			width:100%;
			float:none;
			text-align:center;
			
		}
		
		.responsive-tabs.nav-tabs > li:last-of-type
		{
			float:left;
		}
		
		ul.menu-columns li.country_title
		{
			color: #5d5d5d;
			font-size: 18px;
			margin-top: 25px;
			display: block;
			font-weight: bold;
			break-after: avoid-column;
		}
		
		ul.menu-columns li.country_title:first-child
		{
			margin-top: 0px;
		}
		
		ul.menu-columns li
		{
			margin-bottom: 2px;
		}
		
		@media (max-width: 767px)
		{
			.tab-content .topnav ul li 
			{
				width:100%;
				float:none;
				margin-top:0px;
			}
		}

		
	</style>';


$cities_sql= "SELECT wtg_cities.City_Title, wtg_regions.Title, wtg_cities.City_Link
FROM wtg_cities
INNER JOIN wtg_regions
ON wtg_cities.WP_Region_ID = wtg_regions.WP_ID
ORDER BY Title, City_Title ASC
";


$regions_sql = "
SELECT wtg_regions.Title
FROM wtg_regions
ORDER BY Title ASC
";

$cities = $wpdb->get_results($cities_sql);
$regions = $wpdb->get_results($regions_sql);
	
	echo '<div class="select_country">
        <div class="container">
            <h3 class="with_arrow">'.$findYourCity.'</h3>
            <i class="icon with_arrow"></i>
            <ul class="nav nav-tabs a-z">
                <li class="options_name"><a data-toggle="tab" href="#">'.$findYourCountry.'</a>
                </li>
                <li class="active"><a data-toggle="tab" href="#a-d">A—D</a>
                </li>
                <li><a data-toggle="tab" href="#e-h">E—H</a>
                </li>
                <li><a data-toggle="tab" href="#i-l">I—L</a>
                </li>
                <li><a data-toggle="tab" href="#m-p">M—P</a>
                </li>
                <li><a data-toggle="tab" href="#q-t">Q—T</a>
                </li>
                <li><a data-toggle="tab" href="#u-x">U—X</a>
                </li>
                <li><a data-toggle="tab" href="#y-z">Y—Z</a>
                </li>
            </ul>

            <div class="tab-content">
                <div id="a-d" class="tab-pane fade in active">
                    <div class="topnav" id="myTopnav">
                        <ul class="options_name">
                            <li><a href="#">'.$selectYourCity.'</a>
                            </li>
                        </ul>
						<div class="col-sm-3"><ul class="menu-columns">';
								wtg_get_cities('A', 'B', $regions, $cities);
						echo 
						'</ul></div>
						<div  class="col-sm-3"><ul class="menu-columns">';
								wtg_get_cities('B', 'C', $regions, $cities);
						echo 
						'</ul></div>
						<div  class="col-sm-3"><ul class="menu-columns">';
								wtg_get_cities('C', 'D', $regions, $cities);
						echo 
						'</ul></div>';
						echo
						'<div  class="col-sm-3"><ul class="menu-columns">';
								wtg_get_cities('D', 'E', $regions, $cities);
						echo 
						'</ul></div>';
							
												
						
                echo        '<div class="icon">
                            <a href="javascript:void(0);" class="trigger-continent">
                                <img src="'.get_template_directory_uri() .'/images/arrow_down.png">
                            </a>
                        </div>
                    </div>
                </div>
                <div id="e-h" class="tab-pane fade">
                    <div class="topnav" id="myTopnav">
                        <ul class="options_name">
                            <li><a href="#">'.$selectYourCity.'</a>
                            </li>
                        </ul>';
						echo'
							<div class="col-sm-3"><ul class="menu-columns">';
								wtg_get_cities('E', 'F', $regions, $cities);
						echo 
						'</ul></div>
						<div  class="col-sm-3"><ul class="menu-columns">';
								wtg_get_cities('F', 'G', $regions, $cities);
						echo 
						'</ul></div>
						<div  class="col-sm-3"><ul class="menu-columns">';
								wtg_get_cities('G', 'H', $regions, $cities);
						echo 
						'</ul></div>';
						echo
						'<div  class="col-sm-3"><ul class="menu-columns">';
								wtg_get_cities('H', 'I', $regions, $cities);
						echo 
						'</ul></div>';
			
                        
						
                        echo'<div class="icon">
                            <a href="javascript:void(0);" class="trigger-continent">
                                <img src="'.get_template_directory_uri() .'/images/arrow_down.png">
                            </a>
                        </div>
                    </div>
                </div>
                <div id="i-l" class="tab-pane fade">
                    <div class="topnav" id="myTopnav">
                        <ul class="options_name">
                            <li><a href="#">'.$selectYourCity.'</a>
                            </li>
                        </ul>';
						echo '
						<div class="col-sm-3"><ul class="menu-columns">';
								wtg_get_cities('I', 'J', $regions, $cities);
						echo 
						'</ul></div>
						<div  class="col-sm-3"><ul class="menu-columns">';
								wtg_get_cities('J', 'K', $regions, $cities);
						echo 
						'</ul></div>
						<div  class="col-sm-3"><ul class="menu-columns">';
								wtg_get_cities('K', 'L', $regions, $cities);
						echo 
						'</ul></div>';
						echo
						'<div  class="col-sm-3"><ul class="menu-columns">';
								wtg_get_cities('L', 'M', $regions, $cities);
						echo 
						'</ul></div>';


                        echo'<div class="icon">
                            <a href="javascript:void(0);" class="trigger-continent">
                                <img src="'.get_template_directory_uri() .'/images/arrow_down.png">
                            </a>
                        </div>
                    </div>
                </div>
                <div id="m-p" class="tab-pane fade">
                    <div class="topnav" id="myTopnav">
                        <ul class="options_name">
                            <li><a href="#">'.$selectYourCity.'</a>
                            </li>
                        </ul>';
						echo '
						<div class="col-sm-3"><ul class="menu-columns">';
								wtg_get_cities('M', 'N', $regions, $cities);
						echo 
						'</ul></div>
						<div  class="col-sm-3"><ul class="menu-columns">';
								wtg_get_cities('N', 'O', $regions, $cities);
						echo 
						'</ul></div>
						<div  class="col-sm-3"><ul class="menu-columns">';
								wtg_get_cities('O', 'P', $regions, $cities);
						echo 
						'</ul></div>';
						echo
						'<div  class="col-sm-3"><ul class="menu-columns">';
								wtg_get_cities('P', 'Q', $regions, $cities);
						echo 
						'</ul></div>';

						
                        echo'<div class="icon">
                            <a href="javascript:void(0);" class="trigger-continent">
                                <img src="'.get_template_directory_uri() .'/images/arrow_down.png">
                            </a>
                        </div>
                    </div>
                </div>

                <div id="q-t" class="tab-pane fade">
                    <div class="topnav" id="myTopnav">
                        <ul class="options_name">
                            <li><a href="#">'.$selectYourCity.'</a>
                            </li>
                        </ul>';						
						echo '
						<div class="col-sm-3"><ul class="menu-columns">';
								wtg_get_cities('Q', 'R', $regions, $cities);
						echo 
						'</ul></div>
						<div  class="col-sm-3"><ul class="menu-columns">';
								wtg_get_cities('R', 'S', $regions, $cities);
						echo 
						'</ul></div>
						<div  class="col-sm-3"><ul class="menu-columns">';
								wtg_get_cities('S', 'T', $regions, $cities);
						echo 
						'</ul></div>';
						echo
						'<div  class="col-sm-3"><ul class="menu-columns">';
								wtg_get_cities('T', 'U', $regions, $cities);
						echo 
						'</ul></div>';

					
                        echo'<div class="icon">
                            <a href="javascript:void(0);" class="trigger-continent">
                                <img src="'.get_template_directory_uri() .'/images/arrow_down.png">
                            </a>
                        </div>
                    </div>
                </div>

                <div id="u-x" class="tab-pane fade">
                    <div class="topnav" id="myTopnav">
                        <ul class="options_name">
                            <li><a href="#">'.$selectYourCountry.'</a>
                            </li>
                        </ul>';
						
						echo '
						<div class="col-sm-3"><ul class="menu-columns">';
								wtg_get_cities('U', 'V', $regions, $cities);
						echo 
						'</ul></div>
						<div  class="col-sm-3"><ul class="menu-columns">';
								wtg_get_cities('V', 'W', $regions, $cities);
						echo 
						'</ul></div>
						<div  class="col-sm-3"><ul class="menu-columns">';
								wtg_get_cities('W', 'X', $regions, $cities);
						echo 
						'</ul></div>';
						echo
						'<div  class="col-sm-3"><ul class="menu-columns">';
								wtg_get_cities('X', 'Y', $regions, $cities);
						echo 
						'</ul></div>';

					
                        echo'<div class="icon">
                            <a href="javascript:void(0);" class="trigger-continent">
                                <img src="'.get_template_directory_uri() .'/images/arrow_down.png">
                            </a>
                        </div>
                    </div>
                </div>

                <div id="y-z" class="tab-pane fade">
                    <div class="topnav" id="myTopnav">
                        <ul class="options_name">
                            <li><a href="#">'.$selectYourCountry.'</a>
                            </li>
                        </ul>';
						
						echo '
						<div class="col-sm-3"><ul class="menu-columns">';
								wtg_get_cities('Y', 'Z', $regions, $cities);
						echo 
						'</ul></div>
						<div  class="col-sm-3"><ul class="menu-columns">';
								wtg_get_cities('Z', 'Z', $regions, $cities);
						echo 
						'</ul></div>';

				
						
                        echo'<div class="icon">
                            <a href="javascript:void(0);" class="trigger-continent">
                                <img src="'.get_template_directory_uri() .'/images/arrow_down.png">
                            </a>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>';
}

function wtg_get_cities($start, $end, $regions, $cities)
{
	
	
	foreach ($regions as $region)
	{
		$hasCities = false;
		$firstLetter = substr( $region->Title, 0, 1 );

		foreach ($cities as $city)
		{
			if ($firstLetter >= $start && $firstLetter < $end )
			{
					//echo '<br />'.$region->Title.':'.$city->Title;
					if ($region->Title == $city->Title) 
					{
						if ($hasCities == false) 	
						{
							echo '<li class="country_title">'.$region->Title.'</li>'; 
							$hasCities = true;
						}
						echo '<li class="city-title"><a href = "'.$city->City_Link.'">'.$city->City_Title.'</a></li>';
					}		
			}
			if ($firstLetter == $end) break;
		}
	}
}


function wtg_airportby_AZ_static()
{
	global $wpdb;
	
	$airportGuides = 'A-Z Airport guides';
	$language = get_field('language','options');
		switch ($language)
{
	case 'en':
		$airportGuides = 'A-Z Airport guides';
		$findYourCountry = 'Find your country';
		$selectYourCity = 'Select your city';
		$selectYourCountry = 'Select your country';
		break;

	case 'de':
		$airportGuides = 'Flughäfen von A-Z';
		$findYourCountry = 'Wählen Sie ein Land aus';
		$selectYourCity = 'Wählen Sie eine Stadt aus';
		$selectYourCountry ='Wählen Sie ein Land aus';
		break;
}

	echo '
	<style>
		ul.menu-columns 
		{
			width:100%;
			float:none;
			text-align:center;
			
		}
		
		ul.menu-columns li.country_title
		{
			color: #5d5d5d;
			font-size: 18px;
			margin-top: 25px;
			display: block;
			font-weight: bold;
			break-after: avoid-column;
		}
		
		ul.menu-columns li.country_title:first-child
		{
			margin-top: 0px;
		}
		
		ul.menu-columns li
		{
			margin-bottom: 2px;
		}
		
		.topnav ul li a 
		{
			font-size:15px;
		}
		
		.responsive-tabs.nav-tabs > li:last-of-type
		{
			float:left;
		}

		@media (max-width: 767px)
		{
			.tab-content .topnav ul li 
			{
				width:100%;
				float:none;
				margin-top:0px;
			}
		}
	</style>';



$airports_sql= "SELECT wtg_airports.Airport_Title, wtg_regions.Title, wtg_airports.Airport_Link
FROM wtg_airports
INNER JOIN wtg_regions
ON wtg_airports.WP_Region_ID = wtg_regions.WP_ID
ORDER BY Title, Airport_Title ASC
";


$regions_sql = "SELECT wtg_regions.Title
FROM wtg_regions
ORDER BY Title ASC
";

$airports = $wpdb->get_results($airports_sql);
$regions = $wpdb->get_results($regions_sql);

// var_dump($airports);


	echo '<div class="select_country">
        <div class="container">
            <h3 class="with_arrow">'.$airportGuides.'</h3>
            <i class="icon with_arrow"></i>
            <ul class="nav nav-tabs a-z">
                <li class="options_name"><a data-toggle="tab" href="#">'.$findYourCountry.'</a>
                </li>
                <li class="active"><a data-toggle="tab" href="#a-c">A—C</a>
                </li>
                <li><a data-toggle="tab" href="#d-f">D—F</a>
                </li>
                <li><a data-toggle="tab" href="#g-i">G—I</a>
                </li>
                <li><a data-toggle="tab" href="#j-l">J—L</a>
                </li>
                <li><a data-toggle="tab" href="#m-o">M—O</a>
                </li>
                <li><a data-toggle="tab" href="#p-r">P—R</a>
                </li>
                <li><a data-toggle="tab" href="#s-u">S—U</a>
                </li>
                <li><a data-toggle="tab" href="#v-x">V—X</a>
                </li>
                <li><a data-toggle="tab" href="#y-z">Y—Z</a>
				</li>
				</ul>

            <div class="tab-content">
                <div id="a-c" class="tab-pane fade in active">
				
                    <div class="topnav" id="myTopnav">
                        <ul class="options_name">
                            <li><a href="#">'.$selectYourCity.'</a>
                            </li>
                        </ul>';
						
						echo'
						<div class="col-sm-4"><ul class="menu-columns">';
								wtg_get_airports('A', 'B', $regions, $airports);
						echo 
						'</ul></div>
						<div  class="col-sm-4"><ul class="menu-columns">';
								wtg_get_airports('B', 'C', $regions, $airports);
						echo 
						'</ul></div>
						<div  class="col-sm-4"><ul class="menu-columns">';
								wtg_get_airports('C', 'D', $regions, $airports);
						echo 
						'</ul></div>';
						echo '	
						</div>
                </div>
                <div id="d-f" class="tab-pane fade">
                    <div class="topnav" id="myTopnav">
                        <ul class="options_name">
                            <li><a href="#">'.$selectYourCity.'</a>
                            </li>
                        </ul>';
						echo'
						<div class="col-sm-4"><ul class="menu-columns">';
								wtg_get_airports('D', 'E', $regions, $airports);
						echo 
						'</ul></div>
						<div  class="col-sm-4"><ul class="menu-columns">';
								wtg_get_airports('E', 'F', $regions, $airports);
						echo 
						'</ul></div>
						<div  class="col-sm-4"><ul class="menu-columns">';
								wtg_get_airports('F', 'G', $regions, $airports);
						echo 
						'</ul></div>';
					echo '	
                    </div>
                </div>
                <div id="g-i" class="tab-pane fade">
                    <div class="topnav" id="myTopnav">
                        <ul class="options_name">
                            <li><a href="#">'.$selectYourCity.'</a>
                            </li>
                        </ul>';
						echo'
						<div class="col-sm-4"><ul class="menu-columns">';
								wtg_get_airports('G', 'H', $regions, $airports);
						echo 
						'</ul></div>
						<div  class="col-sm-4"><ul class="menu-columns">';
								wtg_get_airports('H', 'I', $regions, $airports);
						echo 
						'</ul></div>
						<div  class="col-sm-4"><ul class="menu-columns">';
								wtg_get_airports('I', 'J', $regions, $airports);
						echo 
						'</ul></div>';


                        echo'<div class="icon">
                            <a href="javascript:void(0);" class="trigger-continent">
                                <img src="'.get_template_directory_uri() .'/images/arrow_down.png">
                            </a>
                        </div>
                    </div>
                </div>
                <div id="j-l" class="tab-pane fade">
                    <div class="topnav" id="myTopnav">
                        <ul class="options_name">
                            <li><a href="#">'.$selectYourCity.'</a>
                            </li>
                        </ul>';
						echo'
						<div class="col-sm-4"><ul class="menu-columns">';
								wtg_get_airports('J', 'K', $regions, $airports);
						echo 
						'</ul></div>
						<div  class="col-sm-4"><ul class="menu-columns">';
								wtg_get_airports('K', 'L', $regions, $airports);
						echo 
						'</ul></div>
						<div  class="col-sm-4"><ul class="menu-columns">';
								wtg_get_airports('L', 'M', $regions, $airports);
						echo 
						'</ul></div>';


                        echo'<div class="icon">
                            <a href="javascript:void(0);" class="trigger-continent">
                                <img src="'.get_template_directory_uri() .'/images/arrow_down.png">
                            </a>
                        </div>
                    </div>
                </div>

                <div id="m-o" class="tab-pane fade">
                    <div class="topnav" id="myTopnav">
                        <ul class="options_name">
                            <li><a href="#">'.$selectYourCity.'</a>
                            </li>
                        </ul>';
						echo'
						<div class="col-sm-4"><ul class="menu-columns">';
								wtg_get_airports('M', 'N', $regions, $airports);
						echo 
						'</ul></div>
						<div  class="col-sm-4"><ul class="menu-columns">';
								wtg_get_airports('N', 'O', $regions, $airports);
						echo 
						'</ul></div>
						<div  class="col-sm-4"><ul class="menu-columns">';
								wtg_get_airports('O', 'P', $regions, $airports);
						echo 
						'</ul></div>';
                        echo'<div class="icon">
                            <a href="javascript:void(0);" class="trigger-continent">
                                <img src="'.get_template_directory_uri() .'/images/arrow_down.png">
                            </a>
                        </div>
                    </div>
                </div>

                <div id="p-r" class="tab-pane fade">
                    <div class="topnav" id="myTopnav">
                        <ul class="options_name">
                            <li><a href="#">Select your country</a>
                            </li>
                        </ul>';
						echo'
						<div class="col-sm-4"><ul class="menu-columns">';
								wtg_get_airports('P', 'Q', $regions, $airports);
						echo 
						'</ul></div>
						<div  class="col-sm-4"><ul class="menu-columns">';
								wtg_get_airports('Q', 'R', $regions, $airports);
						echo 
						'</ul></div>
						<div  class="col-sm-4"><ul class="menu-columns">';
								wtg_get_airports('R', 'S', $regions, $airports);
						echo 
						'</ul></div>';

                        echo'<div class="icon">
                            <a href="javascript:void(0);" class="trigger-continent">
                                <img src="'.get_template_directory_uri() .'/images/arrow_down.png">
                            </a>
                        </div>
                    </div>
                </div>

                <div id="s-u" class="tab-pane fade">
                    <div class="topnav" id="myTopnav">
                        <ul class="options_name">
                            <li><a href="#">'.$selectYourCountry.'</a>
                            </li>
						</ul>';
						echo'
						<div class="col-sm-4"><ul class="menu-columns">';
								wtg_get_airports('S', 'T', $regions, $airports);
						echo 
						'</ul></div>';
						echo' 
						<div  class="col-sm-4"><ul class="menu-columns">';
								wtg_get_airports('T', 'U', $regions, $airports);
						echo 
						'</ul></div>
						<div  class="col-sm-4"><ul class="menu-columns">';
								wtg_get_airports('U', 'V', $regions, $airports);
						echo 
						'</ul></div>';                        
						echo'<div class="icon">
						<a href="javascript:void(0);" class="trigger-continent">
                                <img src="'.get_template_directory_uri() .'/images/arrow_down.png">
                            </a>
                        </div>
                    </div>
                </div>

                <div id="v-x" class="tab-pane fade">
                    <div class="topnav" id="myTopnav">
                        <ul class="options_name">
                            <li><a href="#">'.$selectYourCountry.'</a>
                            </li>
                        </ul>';
						echo'
						<div class="col-sm-4"><ul class="menu-columns">';
								wtg_get_airports('V', 'W', $regions, $airports);
						echo 
						'</ul></div>
						<div  class="col-sm-4"><ul class="menu-columns">';
								wtg_get_airports('W', 'X', $regions, $airports);
						echo 
						'</ul></div>
						<div  class="col-sm-4"><ul class="menu-columns">';
								wtg_get_airports('X', 'Y', $regions, $airports);
						echo 
						'</ul></div>                        
						<div  class="col-sm-4"><ul class="menu-columns">';
								wtg_get_airports('Y', 'Z', $regions, $airports);
						echo 
						'</ul></div>';                        
					
                        echo'<div class="icon">
                            <a href="javascript:void(0);" class="trigger-continent">
                                <img src="'.get_template_directory_uri() .'/images/arrow_down.png">
                            </a>
                        </div>
                    </div>
                </div>
                <div id="y-z" class="tab-pane fade">
                    <div class="topnav" id="myTopnav">
                        <ul class="options_name">
                            <li><a href="#">'.$selectYourCountry.'</a>
                            </li>
                        </ul>';
						'</ul></div>                        
						<div  class="col-sm-4"><ul class="menu-columns">';
								wtg_get_airports('Y', 'Z', $regions, $airports);
						echo 
						'</ul></div>';                        
					
                        echo'<div class="icon">
                            <a href="javascript:void(0);" class="trigger-continent">
                                <img src="'.get_template_directory_uri() .'/images/arrow_down.png">
                            </a>
                        </div>
                    </div>
                </div>


            </div>
        </div>
    </div>';
}


function wtg_get_airports($start, $end, $regions, $airports)
{

	
	foreach ($regions as $region)
	{
		$hasAirports = false;
		$firstLetter = substr( $region->Title, 0, 1 );
		foreach ($airports as $airport)
		{
			if ($firstLetter >= $start && $firstLetter < $end )
			{
					if ($region->Title == $airport->Title) 
					{
						if ($hasAirports == false) 	
						{
							echo '<li class="country_title">'.$region->Title.'</li>'; 
							$hasAirports = true;
						}
						echo '<li><a href = "'.$airport->Airport_Link.'">'.$airport->Airport_Title.'</a></li>';
					}		
			}
		}
	}
}

function wtg_beaches_AZ_html()
{
	?>
	
	<div class="select_country">
        <div class="container">
            <h3 class="with_arrow">A—Z Beach resorts</h3>
            <i class="icon with_arrow"></i>
            <ul class="nav nav-tabs a-z">
                <li class="options_name"><a data-toggle="tab" href="#">Find your country</a>
                </li>
                <li class="active"><a data-toggle="tab" href="#a-c">A—C</a>
                </li>
                <li><a data-toggle="tab" href="#d-f">D—F</a>
                </li>
                <li><a data-toggle="tab" href="#g-i">G—I</a>
                </li>
                <li><a data-toggle="tab" href="#j-l">J—L</a>
                </li>
                <li><a data-toggle="tab" href="#m-o">M—O</a>
                </li>
                <li><a data-toggle="tab" href="#p-s">P—S</a>
                </li>
                <li><a data-toggle="tab" href="#t-v">T—V</a>
                </li>
                <li><a data-toggle="tab" href="#w-z">W—Z</a>
                </li>
            </ul>

            <div class="tab-content">
                <div id="a-c" class="tab-pane fade in active">
                    <div class="topnav" id="myTopnav">
                        <ul class="options_name">
                            <li><a href="#"><?php echo $selectYourCity; ?></a>
							
                            </li>
                        </ul><ul><li class="country_title">Antigua and Barbuda</li><li><a href="<?php echo get_site_url(); ?>/guides/caribbean/antigua-and-barbuda/jolly-beach/" class="active">Jolly Beach</a></li><li><a href="<?php echo get_site_url(); ?>/guides/caribbean/antigua-and-barbuda/dickenson-bay-beaches/" class="active">Dickenson Bay beaches</a></li><li class="country_title">Aruba</li><li><a href="<?php echo get_site_url(); ?>/guides/caribbean/aruba/aruba-beaches/" class="active">Aruba beaches</a></li></ul><ul><li class="country_title">Australia</li><li><a href="<?php echo get_site_url(); ?>/guides/oceania/australia/new-south-wales/bondi-beach/" class="active">Bondi Beach</a></li><li><a href="<?php echo get_site_url(); ?>/guides/oceania/australia/queensland/surfers-paradise/" class="active">Surfers Paradise</a></li><li><a href="<?php echo get_site_url(); ?>/guides/oceania/australia/queensland/noosa-beaches/" class="active">Noosa beaches</a></li><li><a href="<?php echo get_site_url(); ?>/guides/oceania/australia/queensland/coolangatta-beaches/" class="active">Coolangatta beaches</a></li><li><a href="<?php echo get_site_url(); ?>/guides/oceania/australia/queensland/mooloolaba-beaches/" class="active">Mooloolaba beaches</a></li><li><a href="<?php echo get_site_url(); ?>/guides/oceania/australia/queensland/bundaberg-beaches/" class="active">Bundaberg beaches</a></li><li class="country_title">Balearic Islands</li><li><a href="<?php echo get_site_url(); ?>/guides/europe/spain/balearic-islands/son-bou-beach/" class="active">Son Bou Beach</a></li><li><a href="<?php echo get_site_url(); ?>/guides/europe/spain/balearic-islands/puerto-de-alcdia-beach/" class="active">Puerto de Alc&#xFA;dia Beach</a></li><li class="country_title">Barbados</li><li><a href="<?php echo get_site_url(); ?>/guides/caribbean/barbados/st-lawrence-gap/" class="active">St Lawrence Gap</a></li><li><a href="<?php echo get_site_url(); ?>/guides/caribbean/barbados/beaches-in-st-peter/" class="active">Beaches in St Peter</a></li></ul><ul><li class="country_title">Brazil</li><li><a href="<?php echo get_site_url(); ?>/guides/south-america/brazil/natal-beaches/" class="active">Natal beaches</a></li><li><a href="<?php echo get_site_url(); ?>/guides/south-america/brazil/copacabana-beaches/" class="active">Copacabana beaches</a></li><li class="country_title">Bulgaria</li><li><a href="<?php echo get_site_url(); ?>/guides/europe/bulgaria/bourgas-beach/" class="active">Bourgas Beach</a></li><li><a href="<?php echo get_site_url(); ?>/guides/europe/bulgaria/sunny-beach/" class="active">Sunny Beach</a></li><li class="country_title">Canary Islands</li><li><a href="<?php echo get_site_url(); ?>/guides/europe/spain/canary-islands/puerto-de-la-cruz-beaches/" class="active">Puerto de la Cruz beaches</a></li><li><a href="<?php echo get_site_url(); ?>/guides/europe/spain/canary-islands/maspalomas-beach/" class="active">Maspalomas Beach</a></li><li><a href="<?php echo get_site_url(); ?>/guides/europe/spain/canary-islands/puerto-del-carmen-beaches/" class="active">Puerto del Carmen beaches</a></li></ul><ul><li class="country_title">Channel Islands</li><li><a href="<?php echo get_site_url(); ?>/guides/europe/united-kingdom/channel-islands/jersey-beaches/" class="active">Jersey beaches</a></li><li class="country_title">Croatia</li><li><a href="<?php echo get_site_url(); ?>/guides/europe/croatia/split-beaches/" class="active">Split beaches</a></li><li><a href="<?php echo get_site_url(); ?>/guides/europe/croatia/pula-beaches/" class="active">Pula beaches</a></li><li class="country_title">Cyprus</li><li><a href="<?php echo get_site_url(); ?>/guides/europe/cyprus/protaras-beaches/" class="active">Protaras beaches</a></li><li><a href="<?php echo get_site_url(); ?>/guides/europe/cyprus/ayia-napa-beaches/" class="active">Ayia Napa beaches</a></li></ul><div class="icon">
                            <a href="javascript:void(0);" class="trigger-continent">
                                <img src="<?php echo get_site_url(); ?>/wp-content/themes/wtg/images/arrow_down.png">
                            </a>
                        </div>
                    </div>
                </div>
                <div id="d-f" class="tab-pane fade">
                    <div class="topnav" id="myTopnav">
                        <ul class="options_name">
                            <li><a href="#"><?php echo $selectYourCity; ?></a>
                            </li>
                        </ul><ul><li class="country_title">Dominican Republic</li><li><a href="<?php echo get_site_url(); ?>/guides/caribbean/dominican-republic/punta-cana-beaches/" class="active">Punta Cana beaches</a></li><li><a href="<?php echo get_site_url(); ?>/guides/caribbean/dominican-republic/puerto-plata-beaches/" class="active">Puerto Plata beaches</a></li></ul><ul><li class="country_title">Egypt</li><li><a href="<?php echo get_site_url(); ?>/guides/africa/egypt/hurghada-beaches/" class="active">Hurghada beaches</a></li><li class="country_title">England</li><li><a href="<?php echo get_site_url(); ?>/guides/europe/united-kingdom/england/blackpool-beaches-lancashire/" class="active">Blackpool beaches, Lancashire</a></li><li><a href="<?php echo get_site_url(); ?>/guides/europe/united-kingdom/england/eastbourne-beaches-sussex/" class="active">Eastbourne beaches, Sussex</a></li><li><a href="<?php echo get_site_url(); ?>/guides/europe/united-kingdom/england/beaches-in-camber-sands-sussex/" class="active">Beaches in Camber Sands, Sussex</a></li><li><a href="<?php echo get_site_url(); ?>/guides/europe/united-kingdom/england/brighton-beaches-sussex/" class="active">Brighton beaches, Sussex</a></li><li><a href="<?php echo get_site_url(); ?>/guides/europe/united-kingdom/england/aldeburgh-beaches-suffolk/" class="active">Aldeburgh beaches, Suffolk</a></li><li><a href="<?php echo get_site_url(); ?>/guides/europe/united-kingdom/england/st-ives-beaches-cornwall/" class="active">St Ives beaches, Cornwall</a></li><li><a href="<?php echo get_site_url(); ?>/guides/europe/united-kingdom/england/croyde-beaches-devon/" class="active">Croyde beaches, Devon</a></li><li><a href="<?php echo get_site_url(); ?>/guides/europe/united-kingdom/england/essex-beaches/" class="active">Essex beaches</a></li><li><a href="<?php echo get_site_url(); ?>/guides/europe/united-kingdom/england/ramsgate-beaches-kent/" class="active">Ramsgate beaches, Kent</a></li><li><a href="<?php echo get_site_url(); ?>/guides/europe/united-kingdom/england/brancaster-staithe-beaches-norfolk/" class="active">Brancaster Staithe beaches, Norfolk</a></li><li><a href="<?php echo get_site_url(); ?>/guides/europe/united-kingdom/england/southwold-beaches-suffolk/" class="active">Southwold beaches, Suffolk</a></li><li><a href="<?php echo get_site_url(); ?>/guides/europe/united-kingdom/england/beaches-in-cowes-isle-of-wight/" class="active">Beaches in Cowes, Isle of Wight</a></li><li><a href="<?php echo get_site_url(); ?>/guides/europe/united-kingdom/england/bournemouth-beaches-dorset/" class="active">Bournemouth beaches, Dorset</a></li><li><a href="<?php echo get_site_url(); ?>/guides/europe/united-kingdom/england/beaches-in-the-scilly-isles-cornwall/" class="active">Beaches in the Scilly Isles, Cornwall</a></li></ul><ul></ul><ul><li class="country_title">Florida</li><li><a href="<?php echo get_site_url(); ?>/guides/north-america/united-states-of-america/florida/key-west-beaches/" class="active">Key West beaches</a></li><li><a href="<?php echo get_site_url(); ?>/guides/north-america/united-states-of-america/florida/st-pete-beach/" class="active">St Pete Beach</a></li><li><a href="<?php echo get_site_url(); ?>/guides/north-america/united-states-of-america/florida/south-beach/" class="active">South Beach</a></li><li><a href="<?php echo get_site_url(); ?>/guides/north-america/united-states-of-america/florida/marco-island-beaches/" class="active">Marco Island beaches</a></li><li><a href="<?php echo get_site_url(); ?>/guides/north-america/united-states-of-america/florida/naples-beaches/" class="active">Naples beaches</a></li><li><a href="<?php echo get_site_url(); ?>/guides/north-america/united-states-of-america/florida/st-petersburg-beaches/" class="active">St Petersburg beaches</a></li><li class="country_title">France</li><li><a href="<?php echo get_site_url(); ?>/guides/europe/france/antibes-and-juan-les-pins-beaches/" class="active">Antibes and Juan les Pins beaches</a></li><li><a href="<?php echo get_site_url(); ?>/guides/europe/france/corsica-beaches/" class="active">Corsica beaches</a></li><li><a href="<?php echo get_site_url(); ?>/guides/europe/france/st-tropez-beaches/" class="active">St Tropez beaches</a></li><li><a href="<?php echo get_site_url(); ?>/guides/europe/france/st-raphael-beaches/" class="active">St Raphael beaches</a></li><li><a href="<?php echo get_site_url(); ?>/guides/europe/france/st-malo-beaches/" class="active">St Malo beaches</a></li><li><a href="<?php echo get_site_url(); ?>/guides/europe/france/ile-de-r-beaches/" class="active">Ile de R&#xE9; beaches</a></li><li><a href="<?php echo get_site_url(); ?>/guides/europe/france/biarritz-beaches/" class="active">Biarritz beaches</a></li><li><a href="<?php echo get_site_url(); ?>/guides/europe/france/bandol-beaches/" class="active">Bandol beaches</a></li><li><a href="<?php echo get_site_url(); ?>/guides/europe/france/dinard-beaches/" class="active">Dinard beaches</a></li><li><a href="<?php echo get_site_url(); ?>/guides/europe/france/arcachon-beaches/" class="active">Arcachon beaches</a></li><li><a href="<?php echo get_site_url(); ?>/guides/europe/france/nice-beaches/" class="active">Nice beaches</a></li><li><a href="<?php echo get_site_url(); ?>/guides/europe/france/deauville-beaches/" class="active">Deauville beaches</a></li><li><a href="<?php echo get_site_url(); ?>/guides/europe/france/hyeres-beaches/" class="active">Hy&#xE8;res beaches</a></li></ul><div class="icon">
                            <a href="javascript:void(0);" class="trigger-continent">
                                <img src="<?php echo get_site_url(); ?>/wp-content/themes/wtg/images/arrow_down.png">
                            </a>
                        </div>
                    </div>
                </div>
                <div id="g-i" class="tab-pane fade">
                    <div class="topnav" id="myTopnav">
                        <ul class="options_name">
                            <li><a href="#"><?php echo $selectYourCity; ?></a>
                            </li>
                        </ul><ul><li class="country_title">Gambia</li><li><a href="<?php echo get_site_url(); ?>/guides/africa/gambia/bakau-beaches/" class="active">Bakau beaches</a></li><li><a href="<?php echo get_site_url(); ?>/guides/africa/gambia/kololi-beaches/" class="active">Kololi beaches</a></li><li><a href="<?php echo get_site_url(); ?>/guides/africa/gambia/banjul/" class="active">Banjul</a></li><li class="country_title">Greece</li><li><a href="<?php echo get_site_url(); ?>/guides/europe/greece/kalymnos-beaches/" class="active">Kalymnos beaches</a></li><li><a href="<?php echo get_site_url(); ?>/guides/europe/greece/agios-gordios-beach/" class="active">Agios Gordios Beach</a></li><li><a href="<?php echo get_site_url(); ?>/guides/europe/greece/elounda-beaches/" class="active">Elounda beaches</a></li><li><a href="<?php echo get_site_url(); ?>/guides/europe/greece/agios-nikolaos-beaches/" class="active">Agios Nikolaos beaches</a></li><li><a href="<?php echo get_site_url(); ?>/guides/europe/greece/kavos-beach/" class="active">Kavos Beach</a></li><li><a href="<?php echo get_site_url(); ?>/guides/europe/greece/ipsos-beach/" class="active">Ipsos Beach</a></li><li><a href="<?php echo get_site_url(); ?>/guides/europe/greece/kassiopi-beaches/" class="active">Kassiopi beaches</a></li><li><a href="<?php echo get_site_url(); ?>/guides/europe/greece/dassia-beach/" class="active">Dassia Beach</a></li><li><a href="<?php echo get_site_url(); ?>/guides/europe/greece/thassos-beaches/" class="active">Thassos beaches</a></li><li><a href="<?php echo get_site_url(); ?>/guides/europe/greece/ixia-beach/" class="active">Ixia Beach</a></li><li><a href="<?php echo get_site_url(); ?>/guides/europe/greece/mykonos-town-beaches/" class="active">Mykonos Town beaches</a></li><li><a href="<?php echo get_site_url(); ?>/guides/europe/greece/afandou-beach/" class="active">Afandou Beach</a></li><li><a href="<?php echo get_site_url(); ?>/guides/europe/greece/kefalonia-beaches/" class="active">Kefalonia beaches</a></li></ul><ul></ul><ul><li class="country_title">India</li><li><a href="<?php echo get_site_url(); ?>/guides/asia/india/kerala-beaches/" class="active">Kerala beaches</a></li><li><a href="<?php echo get_site_url(); ?>/guides/asia/india/goa-beaches/" class="active">Goa beaches</a></li></ul><ul><li class="country_title">Indonesia</li><li><a href="<?php echo get_site_url(); ?>/guides/asia/indonesia/beaches-in-bali/" class="active">Beaches in Bali</a></li><li class="country_title">Ireland</li><li><a href="<?php echo get_site_url(); ?>/guides/europe/united-kingdom/ireland/buncrana-beaches/" class="active">Buncrana beaches</a></li><li><a href="<?php echo get_site_url(); ?>/guides/europe/united-kingdom/ireland/curracloe-beaches/" class="active">Curracloe beaches</a></li><li class="country_title">Italy</li><li><a href="<?php echo get_site_url(); ?>/guides/europe/italy/bardolino-beaches/" class="active">Bardolino beaches</a></li><li><a href="<?php echo get_site_url(); ?>/guides/europe/italy/aeolian-islands-beaches/" class="active">Aeolian Islands beaches</a></li><li><a href="<?php echo get_site_url(); ?>/guides/europe/italy/sorrento-beaches/" class="active">Sorrento beaches</a></li><li><a href="<?php echo get_site_url(); ?>/guides/europe/italy/portofino-and-paraggi-beach/" class="active">Portofino and Paraggi Beach</a></li><li><a href="<?php echo get_site_url(); ?>/guides/europe/italy/taormina-beaches/" class="active">Taormina beaches</a></li><li><a href="<?php echo get_site_url(); ?>/guides/europe/italy/rimini-beaches/" class="active">Rimini beaches</a></li><li><a href="<?php echo get_site_url(); ?>/guides/europe/italy/amalfi-beaches/" class="active">Amalfi beaches</a></li><li><a href="<?php echo get_site_url(); ?>/guides/europe/italy/isle-of-ischia-beaches/" class="active">Isle of Ischia beaches</a></li><li><a href="<?php echo get_site_url(); ?>/guides/europe/italy/alghero-beaches/" class="active">Alghero beaches</a></li></ul><div class="icon">
                            <a href="javascript:void(0);" class="trigger-continent">
                                <img src="<?php echo get_site_url(); ?>/wp-content/themes/wtg/images/arrow_down.png">
                            </a>
                        </div>
                    </div>
                </div>
                <div id="j-l" class="tab-pane fade">
                    <div class="topnav" id="myTopnav">
                        <ul class="options_name">
                            <li><a href="#"><?php echo $selectYourCity; ?></a>
                            </li>
                        </ul><ul><li class="country_title">Jamaica</li><li><a href="<?php echo get_site_url(); ?>/guides/caribbean/jamaica/ocho-rios-beaches/" class="active">Ocho Rios beaches</a></li><li><a href="<?php echo get_site_url(); ?>/guides/caribbean/jamaica/negril-beaches/" class="active">Negril beaches</a></li><li><a href="<?php echo get_site_url(); ?>/guides/caribbean/jamaica/montego-bay-beaches/" class="active">Montego Bay beaches</a></li></ul><ul><li class="country_title">Kenya</li><li><a href="<?php echo get_site_url(); ?>/guides/africa/kenya/mombasa-beaches/" class="active">Mombasa beaches</a></li><li><a href="<?php echo get_site_url(); ?>/guides/africa/kenya/diani-beach/" class="active">Diani Beach</a></li><li><a href="<?php echo get_site_url(); ?>/guides/africa/kenya/bamburi-beach/" class="active">Bamburi Beach</a></li></ul><ul></ul><ul></ul><div class="icon">
                            <a href="javascript:void(0);" class="trigger-continent">
                                <img src="<?php echo get_site_url(); ?>/wp-content/themes/wtg/images/arrow_down.png">
                            </a>
                        </div>
                    </div>
                </div>

                <div id="m-o" class="tab-pane fade">
                    <div class="topnav" id="myTopnav">
                        <ul class="options_name">
                            <li><a href="#"><?php echo $selectYourCity; ?></a>
                            </li>
                        </ul><ul><li class="country_title">Malta</li><li><a href="<?php echo get_site_url(); ?>/guides/europe/malta/st-julians-beaches/" class="active">St Julian&#8217;s beaches</a></li></ul><ul><li class="country_title">Mauritius</li><li><a href="<?php echo get_site_url(); ?>/guides/africa/mauritius/mauritius-beaches/" class="active">Mauritius beaches</a></li><li class="country_title">Mexico</li><li><a href="<?php echo get_site_url(); ?>/guides/north-america/mexico/acapulco-beaches/" class="active">Acapulco beaches</a></li><li><a href="<?php echo get_site_url(); ?>/guides/north-america/mexico/puerto-vallarta-beaches/" class="active">Puerto Vallarta beaches</a></li><li><a href="<?php echo get_site_url(); ?>/guides/north-america/mexico/cozumel-beaches/" class="active">Cozumel beaches</a></li><li class="country_title">Morocco</li><li><a href="<?php echo get_site_url(); ?>/guides/africa/morocco/essaouira-beaches/" class="active">Essaouira beaches</a></li><li><a href="<?php echo get_site_url(); ?>/guides/africa/morocco/agadir-beaches/" class="active">Agadir beaches</a></li></ul><ul><li class="country_title">New South Wales</li><li><a href="<?php echo get_site_url(); ?>/guides/oceania/australia/new-south-wales/bondi-beach/" class="active">Bondi Beach</a></li></ul><ul><li class="country_title">Northern Ireland</li><li><a href="<?php echo get_site_url(); ?>/guides/europe/united-kingdom/northern-ireland/bangor-beaches/" class="active">Bangor beaches</a></li><li><a href="<?php echo get_site_url(); ?>/guides/europe/united-kingdom/northern-ireland/portrush-beaches/" class="active">Portrush beaches</a></li><li><a href="<?php echo get_site_url(); ?>/guides/europe/united-kingdom/northern-ireland/newcastle-beaches/" class="active">Newcastle beaches</a></li><li><a href="<?php echo get_site_url(); ?>/guides/europe/united-kingdom/northern-ireland/ballycastle-beaches/" class="active">Ballycastle beaches</a></li><li class="country_title">Oman</li><li><a href="<?php echo get_site_url(); ?>/guides/middle-east/oman/oman-beaches/" class="active">Oman beaches</a></li></ul><div class="icon">
                            <a href="javascript:void(0);" class="trigger-continent">
                                <img src="<?php echo get_site_url(); ?>/wp-content/themes/wtg/images/arrow_down.png">
                            </a>
                        </div>
                    </div>
                </div>

                <div id="p-s" class="tab-pane fade">
                    <div class="topnav" id="myTopnav">
                        <ul class="options_name">
                            <li><a href="#">Select your country</a>
                            </li>
                        </ul><ul><li class="country_title">Portugal</li><li><a href="<?php echo get_site_url(); ?>/guides/europe/portugal/alvor-beaches/" class="active">Alvor beaches</a></li><li><a href="<?php echo get_site_url(); ?>/guides/europe/portugal/estoril-beaches/" class="active">Estoril beaches</a></li><li><a href="<?php echo get_site_url(); ?>/guides/europe/portugal/porto-santo-beaches/" class="active">Porto Santo beaches</a></li><li><a href="<?php echo get_site_url(); ?>/guides/europe/portugal/albufeira-beaches/" class="active">Albufeira beaches</a></li><li class="country_title">Puerto Rico</li><li><a href="<?php echo get_site_url(); ?>/guides/caribbean/puerto-rico/puerto-rico-beaches/" class="active">Puerto Rico beaches</a></li><li class="country_title">Qatar</li><li><a href="<?php echo get_site_url(); ?>/guides/middle-east/qatar/qatar-beaches/" class="active">Qatar beaches</a></li></ul><ul><li class="country_title">Queensland</li><li><a href="<?php echo get_site_url(); ?>/guides/oceania/australia/queensland/surfers-paradise/" class="active">Surfers Paradise</a></li><li><a href="<?php echo get_site_url(); ?>/guides/oceania/australia/queensland/noosa-beaches/" class="active">Noosa beaches</a></li><li><a href="<?php echo get_site_url(); ?>/guides/oceania/australia/queensland/coolangatta-beaches/" class="active">Coolangatta beaches</a></li><li><a href="<?php echo get_site_url(); ?>/guides/oceania/australia/queensland/mooloolaba-beaches/" class="active">Mooloolaba beaches</a></li><li><a href="<?php echo get_site_url(); ?>/guides/oceania/australia/queensland/bundaberg-beaches/" class="active">Bundaberg beaches</a></li></ul><ul><li class="country_title">Scotland</li><li><a href="<?php echo get_site_url(); ?>/guides/europe/united-kingdom/scotland/isle-of-colonsay-beaches/" class="active">Isle of Colonsay beaches</a></li><li class="country_title">South Africa</li><li><a href="<?php echo get_site_url(); ?>/guides/africa/south-africa/knysna-beaches/" class="active">Knysna beaches</a></li></ul><ul><li class="country_title">Spain</li><li><a href="<?php echo get_site_url(); ?>/guides/europe/spain/balearic-islands/son-bou-beach/" class="active">Son Bou Beach</a></li><li><a href="<?php echo get_site_url(); ?>/guides/europe/spain/balearic-islands/puerto-de-alcdia-beach/" class="active">Puerto de Alc&#xFA;dia Beach</a></li><li><a href="<?php echo get_site_url(); ?>/guides/europe/spain/canary-islands/puerto-de-la-cruz-beaches/" class="active">Puerto de la Cruz beaches</a></li><li><a href="<?php echo get_site_url(); ?>/guides/europe/spain/canary-islands/maspalomas-beach/" class="active">Maspalomas Beach</a></li><li><a href="<?php echo get_site_url(); ?>/guides/europe/spain/canary-islands/puerto-del-carmen-beaches/" class="active">Puerto del Carmen beaches</a></li><li><a href="<?php echo get_site_url(); ?>/guides/europe/spain/costa-teguise-beaches/" class="active">Costa Teguise beaches</a></li><li><a href="<?php echo get_site_url(); ?>/guides/europe/spain/corralejo-beaches/" class="active">Corralejo beaches</a></li><li><a href="<?php echo get_site_url(); ?>/guides/europe/spain/roquetas-de-mar-beach/" class="active">Roquetas de Mar Beach</a></li><li><a href="<?php echo get_site_url(); ?>/guides/europe/spain/benidorm-beaches/" class="active">Benidorm beaches</a></li><li><a href="<?php echo get_site_url(); ?>/guides/europe/spain/marbella-beaches/" class="active">Marbella beaches</a></li><li class="country_title">Sri Lanka</li><li><a href="<?php echo get_site_url(); ?>/guides/asia/sri-lanka/negombo-beaches/" class="active">Negombo beaches</a></li><li class="country_title">St Lucia</li><li><a href="<?php echo get_site_url(); ?>/guides/caribbean/st-lucia/st-lucia-beaches/" class="active">St Lucia beaches</a></li><li class="country_title">St Vincent and the Grenadines</li><li><a href="<?php echo get_site_url(); ?>/guides/caribbean/st-vincent-and-the-grenadines/st-vincent-and-the-grenadines-beaches/" class="active">St Vincent and the Grenadines beaches</a></li></ul><div class="icon">
                            <a href="javascript:void(0);" class="trigger-continent">
                                <img src="<?php echo get_site_url(); ?>/wp-content/themes/wtg/images/arrow_down.png">
                            </a>
                        </div>
                    </div>
                </div>

                <div id="t-v" class="tab-pane fade">
                    <div class="topnav" id="myTopnav">
                        <ul class="options_name">
                            <li><a href="#">Select your country</a>
                            </li>
                        </ul><ul><li class="country_title">Thailand</li><li><a href="<?php echo get_site_url(); ?>/guides/asia/thailand/koh-samui-beaches/" class="active">Koh Samui beaches</a></li><li><a href="<?php echo get_site_url(); ?>/guides/asia/thailand/ko-phi-phi-beaches/" class="active">Ko Phi Phi beaches</a></li><li><a href="<?php echo get_site_url(); ?>/guides/asia/thailand/hua-hin-beaches/" class="active">Hua Hin beaches</a></li></ul><ul><li class="country_title">Tunisia</li><li><a href="<?php echo get_site_url(); ?>/guides/africa/tunisia/sousse-beaches/" class="active">Sousse beaches</a></li><li><a href="<?php echo get_site_url(); ?>/guides/africa/tunisia/port-el-kantaoui-beaches/" class="active">Port el-Kantaoui beaches</a></li><li><a href="<?php echo get_site_url(); ?>/guides/africa/tunisia/djerba-beaches/" class="active">Djerba beaches</a></li><li class="country_title">Turkey</li><li><a href="<?php echo get_site_url(); ?>/guides/europe/turkey/bodrum-beaches/" class="active">Bodrum beaches</a></li><li><a href="<?php echo get_site_url(); ?>/guides/europe/turkey/oludeniz-beaches/" class="active">Oludeniz beaches</a></li><li><a href="<?php echo get_site_url(); ?>/guides/europe/turkey/marmaris-and-icmeler-beaches/" class="active">Marmaris and Icmeler beaches</a></li><li><a href="<?php echo get_site_url(); ?>/guides/europe/turkey/antalya-beaches/" class="active">Antalya beaches</a></li><li><a href="<?php echo get_site_url(); ?>/guides/europe/turkey/belek-beach/" class="active">Belek Beach</a></li><li class="country_title">Turks and Caicos Islands</li><li><a href="<?php echo get_site_url(); ?>/guides/caribbean/turks-and-caicos-islands/providenciales-beaches/" class="active">Providenciales beaches</a></li></ul><ul><li class="country_title">United Arab Emirates</li><li><a href="<?php echo get_site_url(); ?>/guides/middle-east/united-arab-emirates/ras-al-khaimah-beaches/" class="active">Ras Al Khaimah beaches</a></li><li><a href="<?php echo get_site_url(); ?>/guides/middle-east/united-arab-emirates/abu-dhabi-beaches/" class="active">Abu Dhabi beaches</a></li><li><a href="<?php echo get_site_url(); ?>/guides/middle-east/united-arab-emirates/dubai-beaches/" class="active">Dubai beaches</a></li><li class="country_title">United Kingdom</li><li><a href="<?php echo get_site_url(); ?>/guides/europe/united-kingdom/scotland/isle-of-colonsay-beaches/" class="active">Isle of Colonsay beaches</a></li><li><a href="<?php echo get_site_url(); ?>/guides/europe/united-kingdom/wales/beaches-in-st-davids/" class="active">Beaches in St Davids</a></li><li><a href="<?php echo get_site_url(); ?>/guides/europe/united-kingdom/northern-ireland/bangor-beaches/" class="active">Bangor beaches</a></li><li><a href="<?php echo get_site_url(); ?>/guides/europe/united-kingdom/northern-ireland/portrush-beaches/" class="active">Portrush beaches</a></li><li><a href="<?php echo get_site_url(); ?>/guides/europe/united-kingdom/northern-ireland/newcastle-beaches/" class="active">Newcastle beaches</a></li><li><a href="<?php echo get_site_url(); ?>/guides/europe/united-kingdom/northern-ireland/ballycastle-beaches/" class="active">Ballycastle beaches</a></li><li><a href="<?php echo get_site_url(); ?>/guides/europe/united-kingdom/england/blackpool-beaches-lancashire/" class="active">Blackpool beaches, Lancashire</a></li><li><a href="<?php echo get_site_url(); ?>/guides/europe/united-kingdom/england/eastbourne-beaches-sussex/" class="active">Eastbourne beaches, Sussex</a></li><li><a href="<?php echo get_site_url(); ?>/guides/europe/united-kingdom/england/beaches-in-camber-sands-sussex/" class="active">Beaches in Camber Sands, Sussex</a></li><li><a href="<?php echo get_site_url(); ?>/guides/europe/united-kingdom/england/brighton-beaches-sussex/" class="active">Brighton beaches, Sussex</a></li><li><a href="<?php echo get_site_url(); ?>/guides/europe/united-kingdom/england/aldeburgh-beaches-suffolk/" class="active">Aldeburgh beaches, Suffolk</a></li><li><a href="<?php echo get_site_url(); ?>/guides/europe/united-kingdom/england/st-ives-beaches-cornwall/" class="active">St Ives beaches, Cornwall</a></li><li><a href="<?php echo get_site_url(); ?>/guides/europe/united-kingdom/england/croyde-beaches-devon/" class="active">Croyde beaches, Devon</a></li><li><a href="<?php echo get_site_url(); ?>/guides/europe/united-kingdom/england/essex-beaches/" class="active">Essex beaches</a></li><li><a href="<?php echo get_site_url(); ?>/guides/europe/united-kingdom/england/ramsgate-beaches-kent/" class="active">Ramsgate beaches, Kent</a></li><li><a href="<?php echo get_site_url(); ?>/guides/europe/united-kingdom/england/brancaster-staithe-beaches-norfolk/" class="active">Brancaster Staithe beaches, Norfolk</a></li><li><a href="<?php echo get_site_url(); ?>/guides/europe/united-kingdom/england/southwold-beaches-suffolk/" class="active">Southwold beaches, Suffolk</a></li><li><a href="<?php echo get_site_url(); ?>/guides/europe/united-kingdom/england/beaches-in-cowes-isle-of-wight/" class="active">Beaches in Cowes, Isle of Wight</a></li><li><a href="<?php echo get_site_url(); ?>/guides/europe/united-kingdom/england/bournemouth-beaches-dorset/" class="active">Bournemouth beaches, Dorset</a></li><li><a href="<?php echo get_site_url(); ?>/guides/europe/united-kingdom/england/beaches-in-the-scilly-isles-cornwall/" class="active">Beaches in the Scilly Isles, Cornwall</a></li><li><a href="<?php echo get_site_url(); ?>/guides/europe/united-kingdom/channel-islands/jersey-beaches/" class="active">Jersey beaches</a></li><li><a href="<?php echo get_site_url(); ?>/guides/europe/united-kingdom/ireland/buncrana-beaches/" class="active">Buncrana beaches</a></li><li><a href="<?php echo get_site_url(); ?>/guides/europe/united-kingdom/ireland/curracloe-beaches/" class="active">Curracloe beaches</a></li><li class="country_title">United States of America</li><li><a href="<?php echo get_site_url(); ?>/guides/north-america/united-states-of-america/florida/key-west-beaches/" class="active">Key West beaches</a></li><li><a href="<?php echo get_site_url(); ?>/guides/north-america/united-states-of-america/florida/st-pete-beach/" class="active">St Pete Beach</a></li><li><a href="<?php echo get_site_url(); ?>/guides/north-america/united-states-of-america/florida/south-beach/" class="active">South Beach</a></li><li><a href="<?php echo get_site_url(); ?>/guides/north-america/united-states-of-america/florida/marco-island-beaches/" class="active">Marco Island beaches</a></li><li><a href="<?php echo get_site_url(); ?>/guides/north-america/united-states-of-america/florida/naples-beaches/" class="active">Naples beaches</a></li><li><a href="<?php echo get_site_url(); ?>/guides/north-america/united-states-of-america/florida/st-petersburg-beaches/" class="active">St Petersburg beaches</a></li><li class="country_title">Uruguay</li><li><a href="<?php echo get_site_url(); ?>/guides/south-america/uruguay/punta-del-este-beaches/" class="active">Punta del Este beaches</a></li></ul><ul><li class="country_title">Vietnam</li><li><a href="<?php echo get_site_url(); ?>/guides/asia/vietnam/nha-trang-beaches/" class="active">Nha Trang beaches</a></li></ul><div class="icon">
                            <a href="javascript:void(0);" class="trigger-continent">
                                <img src="<?php echo get_site_url(); ?>/wp-content/themes/wtg/images/arrow_down.png">
                            </a>
                        </div>
                    </div>
                </div>

                <div id="w-z" class="tab-pane fade">
                    <div class="topnav" id="myTopnav">
                        <ul class="options_name">
                            <li><a href="#">Select your country</a>
                            </li>
                        </ul><ul><li class="country_title">Wales</li><li><a href="<?php echo get_site_url(); ?>/guides/europe/united-kingdom/wales/beaches-in-st-davids/" class="active">Beaches in St Davids</a></li></ul><ul></ul><ul></ul><ul></ul><div class="icon">
                            <a href="javascript:void(0);" class="trigger-continent">
                                <img src="<?php echo get_site_url(); ?>/wp-content/themes/wtg/images/arrow_down.png">
                            </a>
                        </div>
                    </div>
                </div>


            </div>
        </div>



    </div>
	
	<?php
}


function wtg_beachby_AZ_static()
{
	/*
	
	$language = get_field('language','options');
switch ($language)
{
	case 'en':
		$beachGuides = 'A-Z Airport guides';
		$findYourCountry = 'Find your country';
		$selectYourCity = 'Select your city';
		$selectYourCountry = 'Select your country';
		break;

	case 'de':
		$beachGuides = 'Strände von A-Z';
		$findYourCountry = 'Wählen Sie ein Land aus';
		$selectYourCity = 'Wählen Sie eine Stadt aus';
		$selectYourCountry ='Wählen Sie ein Land aus';
		break;
}

	echo '<div class="select_country">
        <div class="container">
            <h3 class="with_arrow">'.$beachGuides.'</h3>
            <i class="icon with_arrow"></i>
            <ul class="nav nav-tabs a-z">
                <li class="options_name"><a data-toggle="tab" href="#">'.$findYourCountry.'</a>
                </li>
                <li class="active"><a data-toggle="tab" href="#a-c">A—C</a>
                </li>
                <li><a data-toggle="tab" href="#d-f">D—F</a>
                </li>
                <li><a data-toggle="tab" href="#g-i">G—I</a>
                </li>
                <li><a data-toggle="tab" href="#j-l">J—L</a>
                </li>
                <li><a data-toggle="tab" href="#m-o">M—O</a>
                </li>
                <li><a data-toggle="tab" href="#p-s">P—S</a>
                </li>
                <li><a data-toggle="tab" href="#t-v">T—V</a>
                </li>
                <li><a data-toggle="tab" href="#w-z">W—Z</a>
                </li>
            </ul>

            <div class="tab-content">
                <div id="a-c" class="tab-pane fade in active">
                    <div class="topnav" id="myTopnav">
                        <ul class="options_name">
                            <li><a href="#">'.$selectYourCity.'</a>
                            </li>
                        </ul>';
						
						$aargs = array(
							'post_type'             => 'guides',
							'posts_per_page' 		=> -1,
							'order' 		=> 'ASC',
							'orderby'       => 'title',
							'tax_query'             => array(
								array(
											  'taxonomy' => 'wtg_guide_type',
											  'field'    => 'slug',
											  'terms'    => 'region',
											 
								),
							),
						);
						$aresults = array();
						$postsQuery = new WP_Query($aargs);
						
						if($postsQuery->have_posts()):
							while ($postsQuery->have_posts()):$postsQuery->the_post();
								$pID = get_the_ID();
								$link = wtg_esc_url(get_permalink($pID));
								$title = get_the_title($pID);
								if (substr( $title, 0, 1 ) === "A"){
									array_push($aresults, $pID);
									//echo '<li class="country_title">'.$title.'</li>';
								} else if(substr( $title, 0, 1 ) === "B"){
									array_push($aresults, $pID);
									//echo '<li class="country_title">'.$title.'</li>';
								} else if(substr( $title, 0, 1 ) === "C"){
									array_push($aresults, $pID);
									//echo '<li class="country_title">'.$title.'</li>';
								}
								
								
							endwhile;
						endif;
						$aParts = partition($aresults, 4);
						echo '<ul>';
						foreach($aParts[0] as $aPart1){
							$link = wtg_esc_url(get_permalink($aPart1));
							//$title = get_the_title($aPart1);
							//echo '<li class="country_title">'.$title.'</li>';
							
							wtg_return_beaches($aPart1);
							
						}
						echo '</ul>';
						echo '<ul>';
						foreach($aParts[1] as $aPart2){
							$link = wtg_esc_url(get_permalink($aPart2));
							//$title = get_the_title($aPart2);
							//echo '<li class="country_title">'.$title.'</li>';
							wtg_return_beaches($aPart2);
						}
						echo '</ul>';
						echo '<ul>';
						foreach($aParts[2] as $aPart3){
							$link = wtg_esc_url(get_permalink($aPart3));
							//$title = get_the_title($aPart3);
							//echo '<li class="country_title">'.$title.'</li>';
							wtg_return_beaches($aPart3);
						}
						echo '</ul>';
						echo '<ul>';
						foreach($aParts[3] as $aPart4){
							$link = wtg_esc_url(get_permalink($aPart4));
							//$title = get_the_title($aPart4);
							//echo '<li class="country_title">'.$title.'</li>';
							wtg_return_beaches($aPart4);
						}
						echo '</ul>';
						
						
						wp_reset_query();
						
                echo        '<div class="icon">
                            <a href="javascript:void(0);" class="trigger-continent">
                                <img src="'.get_template_directory_uri() .'/images/arrow_down.png">
                            </a>
                        </div>
                    </div>
                </div>
                <div id="d-f" class="tab-pane fade">
                    <div class="topnav" id="myTopnav">
                        <ul class="options_name">
                            <li><a href="#">'.$selectYourCity.'</a>
                            </li>
                        </ul>';
						$dresults = array();
                        $dargs = array(
							'post_type'             => 'guides',
							'posts_per_page' 		=> -1,
							'order' 		=> 'ASC',
							'orderby'       => 'title',
							'tax_query'             => array(
								array(
											  'taxonomy' => 'wtg_guide_type',
											  'field'    => 'slug',
											  'terms'    => 'region',
											 
								),
							),
						);
						$postsQuery = new WP_Query($dargs);
						if($postsQuery->have_posts()):
							while ($postsQuery->have_posts()):$postsQuery->the_post();
								$pID = get_the_ID();
								$link = wtg_esc_url(get_permalink($pID));
								$title = get_the_title($pID);
								if (substr( $title, 0, 1 ) === "D"){
									//echo '<li class="country_title">'.$title.'</li>';
									array_push($dresults, $pID);
								} else if(substr( $title, 0, 1 ) === "E"){
									//echo '<li class="country_title">'.$title.'</li>';
									array_push($dresults, $pID);
								} else if(substr( $title, 0, 1 ) === "F"){
									//echo '<li class="country_title">'.$title.'</li>';
									array_push($dresults, $pID);
								}
								
								
							endwhile;
						endif;
						
						$dParts = partition($dresults, 4);
						echo '<ul>';
						foreach($dParts[0] as $aPart1){
							$link = wtg_esc_url(get_permalink($aPart1));
							//$title = get_the_title($aPart1);
							//echo '<li class="country_title">'.$title.'</li>';
							wtg_return_beaches($aPart1);
						}
						echo '</ul>';
						echo '<ul>';
						foreach($dParts[1] as $aPart2){
							$link = wtg_esc_url(get_permalink($aPart2));
							//$title = get_the_title($aPart2);
							//echo '<li class="country_title">'.$title.'</li>';
							wtg_return_beaches($aPart2);
						}
						echo '</ul>';
						echo '<ul>';
						foreach($dParts[2] as $aPart3){
							$link = wtg_esc_url(get_permalink($aPart3));
							//$title = get_the_title($aPart3);
							//echo '<li class="country_title">'.$title.'</li>';
							wtg_return_beaches($aPart3);
						}
						echo '</ul>';
						echo '<ul>';
						foreach($dParts[3] as $aPart4){
							$link = wtg_esc_url(get_permalink($aPart4));
							//$title = get_the_title($aPart4);
							//echo '<li class="country_title">'.$title.'</li>';
							wtg_return_beaches($aPart4);
						}
						echo '</ul>';
						
						
						
						wp_reset_query();
                        echo'<div class="icon">
                            <a href="javascript:void(0);" class="trigger-continent">
                                <img src="'.get_template_directory_uri() .'/images/arrow_down.png">
                            </a>
                        </div>
                    </div>
                </div>
                <div id="g-i" class="tab-pane fade">
                    <div class="topnav" id="myTopnav">
                        <ul class="options_name">
                            <li><a href="#">'.$selectYourCity.'</a>
                            </li>
                        </ul>';
						$gresults = array();
                        $gargs = array(
							'post_type'             => 'guides',
							'posts_per_page' 		=> -1,
							'order' 		=> 'ASC',
							'orderby'       => 'title',
							'tax_query'             => array(
								array(
											  'taxonomy' => 'wtg_guide_type',
											  'field'    => 'slug',
											  'terms'    => 'region',
											 
								),
							),
						);
						$postsQuery = new WP_Query($gargs);
						if($postsQuery->have_posts()):
							while ($postsQuery->have_posts()):$postsQuery->the_post();
								$pID = get_the_ID();
								$link = wtg_esc_url(get_permalink($pID));
								$title = get_the_title($pID);
								if (substr( $title, 0, 1 ) === "G"){
									//echo '<li class="country_title">'.$title.'</li>';
									array_push($gresults, $pID);
								} else if(substr( $title, 0, 1 ) === "H"){
									//echo '<li class="country_title">'.$title.'</li>';
									array_push($gresults, $pID);
								} else if(substr( $title, 0, 1 ) === "I"){
									//echo '<li class="country_title">'.$title.'</li>';
									array_push($gresults, $pID);
								}
								
								
							endwhile;
						endif;
						
						$gParts = partition($gresults, 4);
						echo '<ul>';
						foreach($gParts[0] as $aPart1){
							$link = wtg_esc_url(get_permalink($aPart1));
							//$title = get_the_title($aPart1);
							//echo '<li class="country_title">'.$title.'</li>';
							wtg_return_beaches($aPart1);
						}
						echo '</ul>';
						echo '<ul>';
						foreach($gParts[1] as $aPart2){
							$link = wtg_esc_url(get_permalink($aPart2));
							//$title = get_the_title($aPart2);
							//echo '<li class="country_title">'.$title.'</li>';
							wtg_return_beaches($aPart2);
						}
						echo '</ul>';
						echo '<ul>';
						foreach($gParts[2] as $aPart3){
							$link = wtg_esc_url(get_permalink($aPart3));
							//$title = get_the_title($aPart3);
							//echo '<li class="country_title">'.$title.'</li>';
							wtg_return_beaches($aPart3);
						}
						echo '</ul>';
						echo '<ul>';
						foreach($gParts[3] as $aPart4){
							$link = wtg_esc_url(get_permalink($aPart4));
							//$title = get_the_title($aPart4);
							//echo '<li class="country_title">'.$title.'</li>';
							wtg_return_beaches($aPart4);
						}
						echo '</ul>';
						
						
						
						wp_reset_query();
                        echo'<div class="icon">
                            <a href="javascript:void(0);" class="trigger-continent">
                                <img src="'.get_template_directory_uri() .'/images/arrow_down.png">
                            </a>
                        </div>
                    </div>
                </div>
                <div id="j-l" class="tab-pane fade">
                    <div class="topnav" id="myTopnav">
                        <ul class="options_name">
                            <li><a href="#">'.$selectYourCity.'</a>
                            </li>
                        </ul>';
						$jresults = array();
                        $jargs = array(
							'post_type'             => 'guides',
							'posts_per_page' 		=> -1,
							'order' 		=> 'ASC',
							'orderby'       => 'title',
							'tax_query'             => array(
								array(
											  'taxonomy' => 'wtg_guide_type',
											  'field'    => 'slug',
											  'terms'    => 'region',
											 
								),
							),
						);
						$postsQuery = new WP_Query($jargs);
						echo '<ul>';
						if($postsQuery->have_posts()):
							while ($postsQuery->have_posts()):$postsQuery->the_post();
								$pID = get_the_ID();
								$link = wtg_esc_url(get_permalink($pID));
								$title = get_the_title($pID);
								if (substr( $title, 0, 1 ) === "J"){
									//echo '<li class="country_title">'.$title.'</li>';
									array_push($jresults, $pID);
								} else if(substr( $title, 0, 1 ) === "K"){
									//echo '<li class="country_title">'.$title.'</li>';
									array_push($jresults, $pID);
								} else if(substr( $title, 0, 1 ) === "L"){
									//echo '<li class="country_title">'.$title.'</li>';
									array_push($jresults, $pID);
								}
								
								
							endwhile;
						endif;
						
						$jParts = partition($jresults, 4);
						foreach($jParts[0] as $aPart1){
							$link = wtg_esc_url(get_permalink($aPart1));
							//$title = get_the_title($aPart1);
							//echo '<li class="country_title">'.$title.'</li>';
							wtg_return_beaches($aPart1);
						}
						echo '</ul>';
						echo '<ul>';
						foreach($jParts[1] as $aPart2){
							$link = wtg_esc_url(get_permalink($aPart2));
							//$title = get_the_title($aPart2);
							//echo '<li class="country_title">'.$title.'</li>';
							wtg_return_beaches($aPart2);
						}
						echo '</ul>';
						echo '<ul>';
						foreach($jParts[2] as $aPart3){
							$link = wtg_esc_url(get_permalink($aPart3));
							//$title = get_the_title($aPart3);
							//echo '<li class="country_title">'.$title.'</li>';
							wtg_return_beaches($aPart3);
						}
						echo '</ul>';
						echo '<ul>';
						foreach($jParts[3] as $aPart4){
							$link = wtg_esc_url(get_permalink($aPart4));
							//$title = get_the_title($aPart4);
							//echo '<li class="country_title">'.$title.'</li>';
							wtg_return_beaches($aPart4);
						}
						echo '</ul>';
						
						
						
						wp_reset_query();
                        echo'<div class="icon">
                            <a href="javascript:void(0);" class="trigger-continent">
                                <img src="'.get_template_directory_uri() .'/images/arrow_down.png">
                            </a>
                        </div>
                    </div>
                </div>

                <div id="m-o" class="tab-pane fade">
                    <div class="topnav" id="myTopnav">
                        <ul class="options_name">
                            <li><a href="#">'.$selectYourCity.'</a>
                            </li>
                        </ul>';
						$mresults = array();
                        $margs = array(
							'post_type'             => 'guides',
							'posts_per_page' 		=> -1,
							'order' 		=> 'ASC',
							'orderby'       => 'title',
							'tax_query'             => array(
								array(
											  'taxonomy' => 'wtg_guide_type',
											  'field'    => 'slug',
											  'terms'    => 'region',
											 
								),
							),
						);
						$postsQuery = new WP_Query($margs);
						if($postsQuery->have_posts()):
							while ($postsQuery->have_posts()):$postsQuery->the_post();
								$pID = get_the_ID();
								$link = wtg_esc_url(get_permalink($pID));
								$title = get_the_title($pID);
								if (substr( $title, 0, 1 ) === "M"){
									//echo '<li class="country_title">'.$title.'</li>';
									array_push($mresults, $pID);
								} else if(substr( $title, 0, 1 ) === "N"){
									//echo '<li class="country_title">'.$title.'</li>';
									array_push($mresults, $pID);
								} else if(substr( $title, 0, 1 ) === "O"){
									//echo '<li class="country_title">'.$title.'</li>';
									array_push($mresults, $pID);
								}
								
								
							endwhile;
						endif;
						
						$mParts = partition($mresults, 4);
						echo '<ul>';
						foreach($mParts[0] as $aPart1){
							$link = wtg_esc_url(get_permalink($aPart1));
							//$title = get_the_title($aPart1);
							//echo '<li class="country_title">'.$title.'</li>';
							wtg_return_beaches($aPart1);
						}
						echo '</ul>';
						echo '<ul>';
						foreach($mParts[1] as $aPart2){
							$link = wtg_esc_url(get_permalink($aPart2));
							//$title = get_the_title($aPart2);
							//echo '<li class="country_title">'.$title.'</li>';
							wtg_return_beaches($aPart2);
						}
						echo '</ul>';
						echo '<ul>';
						foreach($mParts[2] as $aPart3){
							$link = wtg_esc_url(get_permalink($aPart3));
							//$title = get_the_title($aPart3);
							//echo '<li class="country_title">'.$title.'</li>';
							wtg_return_beaches($aPart3);
						}
						echo '</ul>';
						echo '<ul>';
						foreach($mParts[3] as $aPart4){
							$link = wtg_esc_url(get_permalink($aPart4));
							//$title = get_the_title($aPart4);
							//echo '<li class="country_title">'.$title.'</li>';
							wtg_return_beaches($aPart4);
						}
						echo '</ul>';
						
						
						
						wp_reset_query();
                        echo'<div class="icon">
                            <a href="javascript:void(0);" class="trigger-continent">
                                <img src="'.get_template_directory_uri() .'/images/arrow_down.png">
                            </a>
                        </div>
                    </div>
                </div>

                <div id="p-s" class="tab-pane fade">
                    <div class="topnav" id="myTopnav">
                        <ul class="options_name">
                            <li><a href="#">'.$selectYourCountry.'</a>
                            </li>
                        </ul>';
						$presults = array();
                        $pargs = array(
							'post_type'             => 'guides',
							'posts_per_page' 		=> -1,
							'order' 		=> 'ASC',
							'orderby'       => 'title',
							'tax_query'             => array(
								array(
											  'taxonomy' => 'wtg_guide_type',
											  'field'    => 'slug',
											  'terms'    => 'region',
											 
								),
							),
						);
						$postsQuery = new WP_Query($pargs);
				
						if($postsQuery->have_posts()):
							while ($postsQuery->have_posts()):$postsQuery->the_post();
								$pID = get_the_ID();
								$link = wtg_esc_url(get_permalink($pID));
								$title = get_the_title($pID);
								if (substr( $title, 0, 1 ) === "P"){
									//echo '<li class="country_title">'.$title.'</li>';
									array_push($presults, $pID);
								} else if(substr( $title, 0, 1 ) === "Q"){
									//echo '<li class="country_title">'.$title.'</li>';
									array_push($presults, $pID);
								} else if(substr( $title, 0, 1 ) === "R"){
									//echo '<li class="country_title">'.$title.'</li>';
									array_push($presults, $pID);
								} else if(substr( $title, 0, 1 ) === "S"){
									//echo '<li class="country_title">'.$title.'</li>';
									array_push($presults, $pID);
								}
								
								
							endwhile;
						endif;
						
						$pParts = partition($presults, 4);
						echo '<ul>';
						foreach($pParts[0] as $aPart1){
							$link = wtg_esc_url(get_permalink($aPart1));
							//$title = get_the_title($aPart1);
							//echo '<li class="country_title">'.$title.'</li>';
							wtg_return_beaches($aPart1);
						}
						echo '</ul>';
						echo '<ul>';
						foreach($pParts[1] as $aPart2){
							$link = wtg_esc_url(get_permalink($aPart2));
							//$title = get_the_title($aPart2);
							//echo '<li class="country_title">'.$title.'</li>';
							wtg_return_beaches($aPart2);
						}
						echo '</ul>';
						echo '<ul>';
						foreach($pParts[2] as $aPart3){
							$link = wtg_esc_url(get_permalink($aPart3));
							//$title = get_the_title($aPart3);
							//echo '<li class="country_title">'.$title.'</li>';
							wtg_return_beaches($aPart3);
						}
						echo '</ul>';
						echo '<ul>';
						foreach($pParts[3] as $aPart4){
							$link = wtg_esc_url(get_permalink($aPart4));
							//$title = get_the_title($aPart4);
							//echo '<li class="country_title">'.$title.'</li>';
							wtg_return_beaches($aPart4);
						}
						echo '</ul>';
						
						
						
						wp_reset_query();
                        echo'<div class="icon">
                            <a href="javascript:void(0);" class="trigger-continent">
                                <img src="'.get_template_directory_uri() .'/images/arrow_down.png">
                            </a>
                        </div>
                    </div>
                </div>

                <div id="t-v" class="tab-pane fade">
                    <div class="topnav" id="myTopnav">
                        <ul class="options_name">
                            <li><a href="#">'.$selectYourCountry.'</a>
                            </li>
                        </ul>';
						$tresults = array();
                        $targs = array(
							'post_type'             => 'guides',
							'posts_per_page' 		=> -1,
							'order' 		=> 'ASC',
							'orderby'       => 'title',
							'tax_query'             => array(
								array(
											  'taxonomy' => 'wtg_guide_type',
											  'field'    => 'slug',
											  'terms'    => 'region',
											 
								),
							),
						);
						$postsQuery = new WP_Query($targs);
			
						if($postsQuery->have_posts()):
							while ($postsQuery->have_posts()):$postsQuery->the_post();
								$pID = get_the_ID();
								$link = wtg_esc_url(get_permalink($pID));
								$title = get_the_title($pID);
								if (substr( $title, 0, 1 ) === "T"){
									//echo '<li class="country_title">'.$title.'</li>';
									array_push($tresults, $pID);
								} else if(substr( $title, 0, 1 ) === "U"){
									//echo '<li class="country_title">'.$title.'</li>';
									array_push($tresults, $pID);
								} else if(substr( $title, 0, 1 ) === "V"){
									//echo '<li class="country_title">'.$title.'</li>';
									array_push($tresults, $pID);
								} 
								
								
							endwhile;
						endif;
						
						$tParts = partition($tresults, 4);
						echo '<ul>';
						foreach($tParts[0] as $aPart1){
							$link = wtg_esc_url(get_permalink($aPart1));
							//$title = get_the_title($aPart1);
							//echo '<li class="country_title">'.$title.'</li>';
							wtg_return_beaches($aPart1);
						}
						echo '</ul>';
						echo '<ul>';
						foreach($tParts[1] as $aPart2){
							$link = wtg_esc_url(get_permalink($aPart2));
							//$title = get_the_title($aPart2);
							//echo '<li class="country_title">'.$title.'</li>';
							wtg_return_beaches($aPart2);
						}
						echo '</ul>';
						echo '<ul>';
						foreach($tParts[2] as $aPart3){
							$link = wtg_esc_url(get_permalink($aPart3));
							//$title = get_the_title($aPart3);
							//echo '<li class="country_title">'.$title.'</li>';
							wtg_return_beaches($aPart3);
						}
						echo '</ul>';
						echo '<ul>';
						foreach($tParts[3] as $aPart4){
							$link = wtg_esc_url(get_permalink($aPart4));
							//$title = get_the_title($aPart4);
							//echo '<li class="country_title">'.$title.'</li>';
							wtg_return_beaches($aPart4);
						}
						echo '</ul>';
						
						
						
						wp_reset_query();
                        echo'<div class="icon">
                            <a href="javascript:void(0);" class="trigger-continent">
                                <img src="'.get_template_directory_uri() .'/images/arrow_down.png">
                            </a>
                        </div>
                    </div>
                </div>

                <div id="w-z" class="tab-pane fade">
                    <div class="topnav" id="myTopnav">
                        <ul class="options_name">
                            <li><a href="#">'.$selectYourCountry.'</a>
                            </li>
                        </ul>';
						$wresults = array();
                        $wargs = array(
							'post_type'             => 'guides',
							'posts_per_page' 		=> -1,
							'order' 		=> 'ASC',
							'orderby'       => 'title',
							'tax_query'             => array(
								array(
											  'taxonomy' => 'wtg_guide_type',
											  'field'    => 'slug',
											  'terms'    => 'region',
											 
								),
							),
						);
						$postsQuery = new WP_Query($wargs);
			
						if($postsQuery->have_posts()):
							while ($postsQuery->have_posts()):$postsQuery->the_post();
								$pID = get_the_ID();
								$link = wtg_esc_url(get_permalink($pID));
								$title = get_the_title($pID);
								if (substr( $title, 0, 1 ) === "W"){
									//echo '<li class="country_title">'.$title.'</li>';
									array_push($wresults, $pID);
								} else if(substr( $title, 0, 1 ) === "X"){
									//echo '<li class="country_title">'.$title.'</li>';
									array_push($wresults, $pID);
								} else if(substr( $title, 0, 1 ) === "Y"){
									//echo '<li class="country_title">'.$title.'</li>';
									array_push($wresults, $pID);
								} else if(substr( $title, 0, 1 ) === "Z"){
									//echo '<li class="country_title">'.$title.'</li>';
									array_push($wresults, $pID);
								}
								
								
							endwhile;
						endif;
						
						$wParts = partition($wresults, 4);
						echo '<ul>';
						foreach($wParts[0] as $aPart1){
							$link = wtg_esc_url(get_permalink($aPart1));
							//$title = get_the_title($aPart1);
							//echo '<li class="country_title">'.$title.'</li>';
							wtg_return_beaches($aPart1);
						}
						echo '</ul>';
						echo '<ul>';
						foreach($wParts[1] as $aPart2){
							$link = wtg_esc_url(get_permalink($aPart2));
							//$title = get_the_title($aPart2);
							//echo '<li class="country_title">'.$title.'</li>';
							wtg_return_beaches($aPart2);
						}
						echo '</ul>';
						echo '<ul>';
						foreach($wParts[2] as $aPart3){
							$link = wtg_esc_url(get_permalink($aPart3));
							//$title = get_the_title($aPart3);
							//echo '<li class="country_title">'.$title.'</li>';
							wtg_return_beaches($aPart3);
						}
						echo '</ul>';
						echo '<ul>';
						foreach($wParts[3] as $aPart4){
							$link = wtg_esc_url(get_permalink($aPart4));
							//$title = get_the_title($aPart4);
							//echo '<li class="country_title">'.$title.'</li>';
							wtg_return_beaches($aPart4);
						}
						echo '</ul>';
						
						
						
						wp_reset_query();
                        echo'<div class="icon">
                            <a href="javascript:void(0);" class="trigger-continent">
                                <img src="'.get_template_directory_uri() .'/images/arrow_down.png">
                            </a>
                        </div>
                    </div>
                </div>


            </div>
        </div>



    </div>'; */
	
		global $wpdb;
	
	$airportGuides = 'A-Z Airport guides';
	$language = get_field('language','options');
		switch ($language)
{
	case 'en':
		$airportGuides = 'A-Z Beach guides';
		$findYourCountry = 'Find your country';
		$selectYourCity = 'Select your city';
		$selectYourCountry = 'Select your country';
		break;

	case 'de':
		$airportGuides = 'Stade von A-Z';
		$findYourCountry = 'Wählen Sie ein Land aus';
		$selectYourCity = 'Wählen Sie eine Stadt aus';
		$selectYourCountry ='Wählen Sie ein Land aus';
		break;
}

	echo '
	<style>
		ul.menu-columns 
		{
			width:100%;
			float:none;
			text-align:center;
			
		}
		
		ul.menu-columns li.country_title
		{
			color: #5d5d5d;
			font-size: 18px;
			margin-top: 25px;
			display: block;
			font-weight: bold;
			break-after: avoid-column;
		}
		
		ul.menu-columns li.country_title:first-child
		{
			margin-top: 0px;
		}
		
		ul.menu-columns li
		{
			margin-bottom: 2px;
		}
		
		.topnav ul li a 
		{
			font-size:15px;
		}
		
		.responsive-tabs.nav-tabs > li:last-of-type
		{
			float:left;
		}

		@media (max-width: 767px)
		{
			.tab-content .topnav ul li 
			{
				width:100%;
				float:none;
				margin-top:0px;
			}
		}
	</style>';



$beaches_sql= "SELECT wtg_beaches.Beach_Title, wtg_regions.Title, wtg_beaches.Beach_Link
FROM wtg_beaches
INNER JOIN wtg_regions
ON wtg_beaches.WP_Region_ID = wtg_regions.WP_ID
ORDER BY Title, Beach_Title ASC
";


$regions_sql = "SELECT wtg_regions.Title
FROM wtg_regions
ORDER BY Title ASC
";

$beaches = $wpdb->get_results($beaches_sql);
$regions = $wpdb->get_results($regions_sql);

// var_dump($beaches);


	echo '<div class="select_country">
        <div class="container">
            <h3 class="with_arrow">'.$airportGuides.'</h3>
            <i class="icon with_arrow"></i>
            <ul class="nav nav-tabs a-z">
                <li class="options_name"><a data-toggle="tab" href="#">'.$findYourCountry.'</a>
                </li>
                <li class="active"><a data-toggle="tab" href="#a-c">A—C</a>
                </li>
                <li><a data-toggle="tab" href="#d-f">D—F</a>
                </li>
                <li><a data-toggle="tab" href="#g-i">G—I</a>
                </li>
                <li><a data-toggle="tab" href="#j-l">J—L</a>
                </li>
                <li><a data-toggle="tab" href="#m-o">M—O</a>
                </li>
                <li><a data-toggle="tab" href="#p-r">P—R</a>
                </li>
                <li><a data-toggle="tab" href="#s-u">S—U</a>
                </li>
                <li><a data-toggle="tab" href="#v-z">V—Z</a>
                </li>
            </ul>

            <div class="tab-content">
                <div id="a-c" class="tab-pane fade in active">
				
                    <div class="topnav" id="myTopnav">
                        <ul class="options_name">
                            <li><a href="#">'.$selectYourCity.'</a>
                            </li>
                        </ul>';
						
						echo'
						<div class="col-sm-4"><ul class="menu-columns">';
								wtg_get_beaches('A', $regions, $beaches);
						echo 
						'</ul></div>
						<div  class="col-sm-4"><ul class="menu-columns">';
								wtg_get_beaches('B', $regions, $beaches);
						echo 
						'</ul></div>
						<div  class="col-sm-4"><ul class="menu-columns">';
								wtg_get_beaches('C', $regions, $beaches);
						echo 
						'</ul></div>';
						echo '	
						</div>
                </div>
                <div id="d-f" class="tab-pane fade">
                    <div class="topnav" id="myTopnav">
                        <ul class="options_name">
                            <li><a href="#">'.$selectYourCity.'</a>
                            </li>
                        </ul>';
						echo'
						<div class="col-sm-4"><ul class="menu-columns">';
								wtg_get_beaches('D', $regions, $beaches);
						echo 
						'</ul></div>
						<div  class="col-sm-4"><ul class="menu-columns">';
								wtg_get_beaches('E', $regions, $beaches);
						echo 
						'</ul></div>
						<div  class="col-sm-4"><ul class="menu-columns">';
								wtg_get_beaches('F', $regions, $beaches);
						echo 
						'</ul></div>';
					echo '	
                    </div>
                </div>
                <div id="g-i" class="tab-pane fade">
                    <div class="topnav" id="myTopnav">
                        <ul class="options_name">
                            <li><a href="#">'.$selectYourCity.'</a>
                            </li>
                        </ul>';
						echo'
						<div class="col-sm-4"><ul class="menu-columns">';
								wtg_get_beaches('G', $regions, $beaches);
						echo 
						'</ul></div>
						<div  class="col-sm-4"><ul class="menu-columns">';
								wtg_get_beaches('H', $regions, $beaches);
						echo 
						'</ul></div>
						<div  class="col-sm-4"><ul class="menu-columns">';
								wtg_get_beaches('I', $regions, $beaches);
						echo 
						'</ul></div>';


                        echo'<div class="icon">
                            <a href="javascript:void(0);" class="trigger-continent">
                                <img src="'.get_template_directory_uri() .'/images/arrow_down.png">
                            </a>
                        </div>
                    </div>
                </div>
                <div id="j-l" class="tab-pane fade">
                    <div class="topnav" id="myTopnav">
                        <ul class="options_name">
                            <li><a href="#">'.$selectYourCity.'</a>
                            </li>
                        </ul>';
						echo'
						<div class="col-sm-4"><ul class="menu-columns">';
								wtg_get_beaches('J', $regions, $beaches);
						echo 
						'</ul></div>
						<div  class="col-sm-4"><ul class="menu-columns">';
								wtg_get_beaches('K', $regions, $beaches);
						echo 
						'</ul></div>
						<div  class="col-sm-4"><ul class="menu-columns">';
								wtg_get_beaches('L', $regions, $beaches);
						echo 
						'</ul></div>';


                        echo'<div class="icon">
                            <a href="javascript:void(0);" class="trigger-continent">
                                <img src="'.get_template_directory_uri() .'/images/arrow_down.png">
                            </a>
                        </div>
                    </div>
                </div>

                <div id="m-o" class="tab-pane fade">
                    <div class="topnav" id="myTopnav">
                        <ul class="options_name">
                            <li><a href="#">'.$selectYourCity.'</a>
                            </li>
                        </ul>';
						echo'
						<div class="col-sm-4"><ul class="menu-columns">';
								wtg_get_beaches('M', $regions, $beaches);
						echo 
						'</ul></div>
						<div  class="col-sm-4"><ul class="menu-columns">';
								wtg_get_beaches('N', $regions, $beaches);
						echo 
						'</ul></div>
						<div  class="col-sm-4"><ul class="menu-columns">';
								wtg_get_beaches('O', $regions, $beaches);
						echo 
						'</ul></div>';
                        echo'<div class="icon">
                            <a href="javascript:void(0);" class="trigger-continent">
                                <img src="'.get_template_directory_uri() .'/images/arrow_down.png">
                            </a>
                        </div>
                    </div>
                </div>

                <div id="p-r" class="tab-pane fade">
                    <div class="topnav" id="myTopnav">
                        <ul class="options_name">
                            <li><a href="#">Select your country</a>
                            </li>
                        </ul>';
						echo'
						<div class="col-sm-4"><ul class="menu-columns">';
								wtg_get_beaches('P', $regions, $beaches);
						echo 
						'</ul></div>
						<div  class="col-sm-4"><ul class="menu-columns">';
								wtg_get_beaches('Q', $regions, $beaches);

						echo 
						'</ul></div>
						<div  class="col-sm-4"><ul class="menu-columns">';
								wtg_get_beaches('R', $regions, $beaches);
						echo 
						'</ul></div>';
                        echo'<div class="icon">
                            <a href="javascript:void(0);" class="trigger-continent">
                                <img src="'.get_template_directory_uri() .'/images/arrow_down.png">
                            </a>
                        </div>
                    </div>
                </div>

                <div id="s-u" class="tab-pane fade">
                    <div class="topnav" id="myTopnav">
                        <ul class="options_name">
                            <li><a href="#">'.$selectYourCountry.'</a>
                            </li>
                        </ul>';
 
						echo'
						<div class="col-sm-4"><ul class="menu-columns">';
								wtg_get_beaches('S', $regions, $beaches);
						echo 
						'</ul></div>
						<div  class="col-sm-4"><ul class="menu-columns">';
								wtg_get_beaches('T', $regions, $beaches);
						echo 
						'</ul></div>
						<div  class="col-sm-4"><ul class="menu-columns">';
								wtg_get_beaches('U', $regions, $beaches);
						echo 
						'</ul></div>';                        
						echo'<div class="icon">
                            <a href="javascript:void(0);" class="trigger-continent">
                                <img src="'.get_template_directory_uri() .'/images/arrow_down.png">
                            </a>
                        </div>
                    </div>
                </div>

                <div id="v-z" class="tab-pane fade">
                    <div class="topnav" id="myTopnav">
                        <ul class="options_name">
                            <li><a href="#">'.$selectYourCountry.'</a>
                            </li>
                        </ul>';
						echo'
						<div class="col-sm-4"><ul class="menu-columns">';
								wtg_get_beaches('W', $regions, $beaches);
						echo 
						'</ul></div>
						<div  class="col-sm-4"><ul class="menu-columns">';
								wtg_get_beaches('X', $regions, $beaches);
						echo 
						'</ul></div>
						<div  class="col-sm-4"><ul class="menu-columns">';
								wtg_get_beaches('Y', $regions, $beaches);
								wtg_get_beaches('Z', $regions, $beaches);
						echo 
						'</ul></div>';                        
					
                        echo'<div class="icon">
                            <a href="javascript:void(0);" class="trigger-continent">
                                <img src="'.get_template_directory_uri() .'/images/arrow_down.png">
                            </a>
                        </div>
                    </div>
                </div>


            </div>
        </div>
    </div>';
	
}

function wtg_get_beaches($start, $regions, $beaches)
{

	
	foreach ($regions as $region)
	{
		$hasBeaches = false;
		$firstLetter = substr( $region->Title, 0, 1 );
		foreach ($beaches as $beach)
		{
			if ($firstLetter == $start )
			{
					if ($region->Title == $beach->Title) 
					{
						if ($hasBeaches == false) 	
						{
							echo '<li class="country_title">'.$region->Title.'</li>'; 
							$hasBeaches = true;
						}
						echo '<li><a href = "'.$beach->Beach_Link.'">'.$beach->Beach_Title.'</a></li>';
					}		
			}
		}
	}
}



function wtg_cruiseby_AZ_static()
{
	
		$language = get_field ('language','options');
		switch ($language)
{
	case 'en':
		$findYourCity = 'Find your city from the list of countries below';
		$findYourCountry = 'Find your country';
		$selectYourCity = 'Select your city';
		$selectYourCountry = 'Select your country';
		break;

	case 'de':
		$findYourCity = 'Finden Sie Ihre Stadt über die Länderliste.';
		$findYourCountry = 'Wählen Sie ein Land aus';
		$selectYourCity = 'Wählen Sie eine Stadt aus';
		$selectYourCountry ='Wählen Sie ein Land aus';
		break;
}

	echo '<div class="select_country">
        <div class="container">
            <h3 class="with_arrow">A—Z Cruise guides</h3>
            <i class="icon with_arrow"></i>
            <ul class="nav nav-tabs a-z">
                <li class="options_name"><a data-toggle="tab" href="#">Find your country</a>
                </li>
                <li class="active"><a data-toggle="tab" href="#a-c">A—C</a>
                </li>
                <li><a data-toggle="tab" href="#d-f">D—F</a>
                </li>
                <li><a data-toggle="tab" href="#g-i">G—I</a>
                </li>
                <li><a data-toggle="tab" href="#j-l">J—L</a>
                </li>
                <li><a data-toggle="tab" href="#m-o">M—O</a>
                </li>
                <li><a data-toggle="tab" href="#p-s">P—S</a>
                </li>
                <li><a data-toggle="tab" href="#t-v">T—V</a>
                </li>
                <li><a data-toggle="tab" href="#w-z">W—Z</a>
                </li>
            </ul>

            <div class="tab-content">
                <div id="a-c" class="tab-pane fade in active">
                    <div class="topnav" id="myTopnav">
                        <ul class="options_name">
                            <li><a href="#">'.$selectYourCity.'</a>
                            </li>
                        </ul>';
						
						$aargs = array(
							'post_type'             => 'guides',
							'posts_per_page' 		=> -1,
							'order' 		=> 'ASC',
							'orderby'       => 'title',
							'tax_query'             => array(
								array(
											  'taxonomy' => 'wtg_guide_type',
											  'field'    => 'slug',
											  'terms'    => 'region',
											 
								),
							),
						);
						$aresults = array();
						$postsQuery = new WP_Query($aargs);
						
						if($postsQuery->have_posts()):
							while ($postsQuery->have_posts()):$postsQuery->the_post();
								$pID = get_the_ID();
								$link = wtg_esc_url(get_permalink($pID));
								$title = get_the_title($pID);
								if (substr( $title, 0, 1 ) === "A"){
									array_push($aresults, $pID);
									//echo '<li class="country_title">'.$title.'</li>';
								} else if(substr( $title, 0, 1 ) === "B"){
									array_push($aresults, $pID);
									//echo '<li class="country_title">'.$title.'</li>';
								} else if(substr( $title, 0, 1 ) === "C"){
									array_push($aresults, $pID);
									//echo '<li class="country_title">'.$title.'</li>';
								}
								
								
							endwhile;
						endif;
						$aParts = partition($aresults, 4);
						echo '<ul>';
						foreach($aParts[0] as $aPart1){
							$link = wtg_esc_url(get_permalink($aPart1));
							//$title = get_the_title($aPart1);
							//echo '<li class="country_title">'.$title.'</li>';
							
							wtg_return_cruise($aPart1);
							
						}
						echo '</ul>';
						echo '<ul>';
						foreach($aParts[1] as $aPart2){
							$link = wtg_esc_url(get_permalink($aPart2));
							//$title = get_the_title($aPart2);
							//echo '<li class="country_title">'.$title.'</li>';
							wtg_return_cruise($aPart2);
						}
						echo '</ul>';
						echo '<ul>';
						foreach($aParts[2] as $aPart3){
							$link = wtg_esc_url(get_permalink($aPart3));
							//$title = get_the_title($aPart3);
							//echo '<li class="country_title">'.$title.'</li>';
							wtg_return_cruise($aPart3);
						}
						echo '</ul>';
						echo '<ul>';
						foreach($aParts[3] as $aPart4){
							$link = wtg_esc_url(get_permalink($aPart4));
							//$title = get_the_title($aPart4);
							//echo '<li class="country_title">'.$title.'</li>';
							wtg_return_cruise($aPart4);
						}
						echo '</ul>';
						
						
						wp_reset_query();
						
                echo        '<div class="icon">
                            <a href="javascript:void(0);" class="trigger-continent">
                                <img src="'.get_template_directory_uri() .'/images/arrow_down.png">
                            </a>
                        </div>
                    </div>
                </div>
                <div id="d-f" class="tab-pane fade">
                    <div class="topnav" id="myTopnav">
                        <ul class="options_name">
                            <li><a href="#">'.$selectYourCity.'</a>
                            </li>
                        </ul>';
						$dresults = array();
                        $dargs = array(
							'post_type'             => 'guides',
							'posts_per_page' 		=> -1,
							'order' 		=> 'ASC',
							'orderby'       => 'title',
							'tax_query'             => array(
								array(
											  'taxonomy' => 'wtg_guide_type',
											  'field'    => 'slug',
											  'terms'    => 'region',
											 
								),
							),
						);
						$postsQuery = new WP_Query($dargs);
						if($postsQuery->have_posts()):
							while ($postsQuery->have_posts()):$postsQuery->the_post();
								$pID = get_the_ID();
								$link = wtg_esc_url(get_permalink($pID));
								$title = get_the_title($pID);
								if (substr( $title, 0, 1 ) === "D"){
									//echo '<li class="country_title">'.$title.'</li>';
									array_push($dresults, $pID);
								} else if(substr( $title, 0, 1 ) === "E"){
									//echo '<li class="country_title">'.$title.'</li>';
									array_push($dresults, $pID);
								} else if(substr( $title, 0, 1 ) === "F"){
									//echo '<li class="country_title">'.$title.'</li>';
									array_push($dresults, $pID);
								}
								
								
							endwhile;
						endif;
						
						$dParts = partition($dresults, 4);
						echo '<ul>';
						foreach($dParts[0] as $aPart1){
							$link = wtg_esc_url(get_permalink($aPart1));
							//$title = get_the_title($aPart1);
							//echo '<li class="country_title">'.$title.'</li>';
							wtg_return_cruise($aPart1);
						}
						echo '</ul>';
						echo '<ul>';
						foreach($dParts[1] as $aPart2){
							$link = wtg_esc_url(get_permalink($aPart2));
							//$title = get_the_title($aPart2);
							//echo '<li class="country_title">'.$title.'</li>';
							wtg_return_cruise($aPart2);
						}
						echo '</ul>';
						echo '<ul>';
						foreach($dParts[2] as $aPart3){
							$link = wtg_esc_url(get_permalink($aPart3));
							//$title = get_the_title($aPart3);
							//echo '<li class="country_title">'.$title.'</li>';
							wtg_return_cruise($aPart3);
						}
						echo '</ul>';
						echo '<ul>';
						foreach($dParts[3] as $aPart4){
							$link = wtg_esc_url(get_permalink($aPart4));
							//$title = get_the_title($aPart4);
							//echo '<li class="country_title">'.$title.'</li>';
							wtg_return_cruise($aPart4);
						}
						echo '</ul>';
						
						
						
						wp_reset_query();
                        echo'<div class="icon">
                            <a href="javascript:void(0);" class="trigger-continent">
                                <img src="'.get_template_directory_uri() .'/images/arrow_down.png">
                            </a>
                        </div>
                    </div>
                </div>
                <div id="g-i" class="tab-pane fade">
                    <div class="topnav" id="myTopnav">
                        <ul class="options_name">
                            <li><a href="#">'.$selectYourCity.'</a>
                            </li>
                        </ul>';
						$gresults = array();
                        $gargs = array(
							'post_type'             => 'guides',
							'posts_per_page' 		=> -1,
							'order' 		=> 'ASC',
							'orderby'       => 'title',
							'tax_query'             => array(
								array(
											  'taxonomy' => 'wtg_guide_type',
											  'field'    => 'slug',
											  'terms'    => 'region',
											 
								),
							),
						);
						$postsQuery = new WP_Query($gargs);
						if($postsQuery->have_posts()):
							while ($postsQuery->have_posts()):$postsQuery->the_post();
								$pID = get_the_ID();
								$link = wtg_esc_url(get_permalink($pID));
								$title = get_the_title($pID);
								if (substr( $title, 0, 1 ) === "G"){
									//echo '<li class="country_title">'.$title.'</li>';
									array_push($gresults, $pID);
								} else if(substr( $title, 0, 1 ) === "H"){
									//echo '<li class="country_title">'.$title.'</li>';
									array_push($gresults, $pID);
								} else if(substr( $title, 0, 1 ) === "I"){
									//echo '<li class="country_title">'.$title.'</li>';
									array_push($gresults, $pID);
								}
								
								
							endwhile;
						endif;
						
						$gParts = partition($gresults, 4);
						echo '<ul>';
						foreach($gParts[0] as $aPart1){
							$link = wtg_esc_url(get_permalink($aPart1));
							//$title = get_the_title($aPart1);
							//echo '<li class="country_title">'.$title.'</li>';
							wtg_return_cruise($aPart1);
						}
						echo '</ul>';
						echo '<ul>';
						foreach($gParts[1] as $aPart2){
							$link = wtg_esc_url(get_permalink($aPart2));
							//$title = get_the_title($aPart2);
							//echo '<li class="country_title">'.$title.'</li>';
							wtg_return_cruise($aPart2);
						}
						echo '</ul>';
						echo '<ul>';
						foreach($gParts[2] as $aPart3){
							$link = wtg_esc_url(get_permalink($aPart3));
							//$title = get_the_title($aPart3);
							//echo '<li class="country_title">'.$title.'</li>';
							wtg_return_cruise($aPart3);
						}
						echo '</ul>';
						echo '<ul>';
						foreach($gParts[3] as $aPart4){
							$link = wtg_esc_url(get_permalink($aPart4));
							//$title = get_the_title($aPart4);
							//echo '<li class="country_title">'.$title.'</li>';
							wtg_return_cruise($aPart4);
						}
						echo '</ul>';
						
						
						
						wp_reset_query();
                        echo'<div class="icon">
                            <a href="javascript:void(0);" class="trigger-continent">
                                <img src="'.get_template_directory_uri() .'/images/arrow_down.png">
                            </a>
                        </div>
                    </div>
                </div>
                <div id="j-l" class="tab-pane fade">
                    <div class="topnav" id="myTopnav">
                        <ul class="options_name">
                            <li><a href="#">'.$selectYourCity.'</a>
                            </li>
                        </ul>';
						$jresults = array();
                        $jargs = array(
							'post_type'             => 'guides',
							'posts_per_page' 		=> -1,
							'order' 		=> 'ASC',
							'orderby'       => 'title',
							'tax_query'             => array(
								array(
											  'taxonomy' => 'wtg_guide_type',
											  'field'    => 'slug',
											  'terms'    => 'region',
											 
								),
							),
						);
						$postsQuery = new WP_Query($jargs);
						echo '<ul>';
						if($postsQuery->have_posts()):
							while ($postsQuery->have_posts()):$postsQuery->the_post();
								$pID = get_the_ID();
								$link = wtg_esc_url(get_permalink($pID));
								$title = get_the_title($pID);
								if (substr( $title, 0, 1 ) === "J"){
									//echo '<li class="country_title">'.$title.'</li>';
									array_push($jresults, $pID);
								} else if(substr( $title, 0, 1 ) === "K"){
									//echo '<li class="country_title">'.$title.'</li>';
									array_push($jresults, $pID);
								} else if(substr( $title, 0, 1 ) === "L"){
									//echo '<li class="country_title">'.$title.'</li>';
									array_push($jresults, $pID);
								}
								
								
							endwhile;
						endif;
						
						$jParts = partition($jresults, 4);
						foreach($jParts[0] as $aPart1){
							$link = wtg_esc_url(get_permalink($aPart1));
							//$title = get_the_title($aPart1);
							//echo '<li class="country_title">'.$title.'</li>';
							wtg_return_cruise($aPart1);
						}
						echo '</ul>';
						echo '<ul>';
						foreach($jParts[1] as $aPart2){
							$link = wtg_esc_url(get_permalink($aPart2));
							//$title = get_the_title($aPart2);
							//echo '<li class="country_title">'.$title.'</li>';
							wtg_return_cruise($aPart2);
						}
						echo '</ul>';
						echo '<ul>';
						foreach($jParts[2] as $aPart3){
							$link = wtg_esc_url(get_permalink($aPart3));
							//$title = get_the_title($aPart3);
							//echo '<li class="country_title">'.$title.'</li>';
							wtg_return_cruise($aPart3);
						}
						echo '</ul>';
						echo '<ul>';
						foreach($jParts[3] as $aPart4){
							$link = wtg_esc_url(get_permalink($aPart4));
							//$title = get_the_title($aPart4);
							//echo '<li class="country_title">'.$title.'</li>';
							wtg_return_cruise($aPart4);
						}
						echo '</ul>';
						
						
						
						wp_reset_query();
                        echo'<div class="icon">
                            <a href="javascript:void(0);" class="trigger-continent">
                                <img src="'.get_template_directory_uri() .'/images/arrow_down.png">
                            </a>
                        </div>
                    </div>
                </div>

                <div id="m-o" class="tab-pane fade">
                    <div class="topnav" id="myTopnav">
                        <ul class="options_name">
                            <li><a href="#">'.$selectYourCity.'</a>
                            </li>
                        </ul>';
						$mresults = array();
                        $margs = array(
							'post_type'             => 'guides',
							'posts_per_page' 		=> -1,
							'order' 		=> 'ASC',
							'orderby'       => 'title',
							'tax_query'             => array(
								array(
											  'taxonomy' => 'wtg_guide_type',
											  'field'    => 'slug',
											  'terms'    => 'region',
											 
								),
							),
						);
						$postsQuery = new WP_Query($margs);
						if($postsQuery->have_posts()):
							while ($postsQuery->have_posts()):$postsQuery->the_post();
								$pID = get_the_ID();
								$link = wtg_esc_url(get_permalink($pID));
								$title = get_the_title($pID);
								if (substr( $title, 0, 1 ) === "M"){
									//echo '<li class="country_title">'.$title.'</li>';
									array_push($mresults, $pID);
								} else if(substr( $title, 0, 1 ) === "N"){
									//echo '<li class="country_title">'.$title.'</li>';
									array_push($mresults, $pID);
								} else if(substr( $title, 0, 1 ) === "O"){
									//echo '<li class="country_title">'.$title.'</li>';
									array_push($mresults, $pID);
								}
								
								
							endwhile;
						endif;
						
						$mParts = partition($mresults, 4);
						echo '<ul>';
						foreach($mParts[0] as $aPart1){
							$link = wtg_esc_url(get_permalink($aPart1));
							//$title = get_the_title($aPart1);
							//echo '<li class="country_title">'.$title.'</li>';
							wtg_return_cruise($aPart1);
						}
						echo '</ul>';
						echo '<ul>';
						foreach($mParts[1] as $aPart2){
							$link = wtg_esc_url(get_permalink($aPart2));
							//$title = get_the_title($aPart2);
							//echo '<li class="country_title">'.$title.'</li>';
							wtg_return_cruise($aPart2);
						}
						echo '</ul>';
						echo '<ul>';
						foreach($mParts[2] as $aPart3){
							$link = wtg_esc_url(get_permalink($aPart3));
							//$title = get_the_title($aPart3);
							//echo '<li class="country_title">'.$title.'</li>';
							wtg_return_cruise($aPart3);
						}
						echo '</ul>';
						echo '<ul>';
						foreach($mParts[3] as $aPart4){
							$link = wtg_esc_url(get_permalink($aPart4));
							//$title = get_the_title($aPart4);
							//echo '<li class="country_title">'.$title.'</li>';
							wtg_return_cruise($aPart4);
						}
						echo '</ul>';
						
						
						
						wp_reset_query();
                        echo'<div class="icon">
                            <a href="javascript:void(0);" class="trigger-continent">
                                <img src="'.get_template_directory_uri() .'/images/arrow_down.png">
                            </a>
                        </div>
                    </div>
                </div>

                <div id="p-s" class="tab-pane fade">
                    <div class="topnav" id="myTopnav">
                        <ul class="options_name">
                            <li><a href="#">'.$selectYourCountry.'</a>
                            </li>
                        </ul>';
						$presults = array();
                        $pargs = array(
							'post_type'             => 'guides',
							'posts_per_page' 		=> -1,
							'order' 		=> 'ASC',
							'orderby'       => 'title',
							'tax_query'             => array(
								array(
											  'taxonomy' => 'wtg_guide_type',
											  'field'    => 'slug',
											  'terms'    => 'region',
											 
								),
							),
						);
						$postsQuery = new WP_Query($pargs);
				
						if($postsQuery->have_posts()):
							while ($postsQuery->have_posts()):$postsQuery->the_post();
								$pID = get_the_ID();
								$link = wtg_esc_url(get_permalink($pID));
								$title = get_the_title($pID);
								if (substr( $title, 0, 1 ) === "P"){
									//echo '<li class="country_title">'.$title.'</li>';
									array_push($presults, $pID);
								} else if(substr( $title, 0, 1 ) === "Q"){
									//echo '<li class="country_title">'.$title.'</li>';
									array_push($presults, $pID);
								} else if(substr( $title, 0, 1 ) === "R"){
									//echo '<li class="country_title">'.$title.'</li>';
									array_push($presults, $pID);
								} else if(substr( $title, 0, 1 ) === "S"){
									//echo '<li class="country_title">'.$title.'</li>';
									array_push($presults, $pID);
								}
								
								
							endwhile;
						endif;
						
						$pParts = partition($presults, 4);
						echo '<ul>';
						foreach($pParts[0] as $aPart1){
							$link = wtg_esc_url(get_permalink($aPart1));
							//$title = get_the_title($aPart1);
							//echo '<li class="country_title">'.$title.'</li>';
							wtg_return_cruise($aPart1);
						}
						echo '</ul>';
						echo '<ul>';
						foreach($pParts[1] as $aPart2){
							$link = wtg_esc_url(get_permalink($aPart2));
							//$title = get_the_title($aPart2);
							//echo '<li class="country_title">'.$title.'</li>';
							wtg_return_cruise($aPart2);
						}
						echo '</ul>';
						echo '<ul>';
						foreach($pParts[2] as $aPart3){
							$link = wtg_esc_url(get_permalink($aPart3));
							//$title = get_the_title($aPart3);
							//echo '<li class="country_title">'.$title.'</li>';
							wtg_return_cruise($aPart3);
						}
						echo '</ul>';
						echo '<ul>';
						foreach($pParts[3] as $aPart4){
							$link = wtg_esc_url(get_permalink($aPart4));
							//$title = get_the_title($aPart4);
							//echo '<li class="country_title">'.$title.'</li>';
							wtg_return_cruise($aPart4);
						}
						echo '</ul>';
						
						
						
						wp_reset_query();
                        echo'<div class="icon">
                            <a href="javascript:void(0);" class="trigger-continent">
                                <img src="'.get_template_directory_uri() .'/images/arrow_down.png">
                            </a>
                        </div>
                    </div>
                </div>

                <div id="t-v" class="tab-pane fade">
                    <div class="topnav" id="myTopnav">
                        <ul class="options_name">
                            <li><a href="#">'.$selectYourCountry.'</a>
                            </li>
                        </ul>';
						$tresults = array();
                        $targs = array(
							'post_type'             => 'guides',
							'posts_per_page' 		=> -1,
							'order' 		=> 'ASC',
							'orderby'       => 'title',
							'tax_query'             => array(
								array(
											  'taxonomy' => 'wtg_guide_type',
											  'field'    => 'slug',
											  'terms'    => 'region',
											 
								),
							),
						);
						$postsQuery = new WP_Query($targs);
			
						if($postsQuery->have_posts()):
							while ($postsQuery->have_posts()):$postsQuery->the_post();
								$pID = get_the_ID();
								$link = wtg_esc_url(get_permalink($pID));
								$title = get_the_title($pID);
								if (substr( $title, 0, 1 ) === "T"){
									//echo '<li class="country_title">'.$title.'</li>';
									array_push($tresults, $pID);
								} else if(substr( $title, 0, 1 ) === "U"){
									//echo '<li class="country_title">'.$title.'</li>';
									array_push($tresults, $pID);
								} else if(substr( $title, 0, 1 ) === "V"){
									//echo '<li class="country_title">'.$title.'</li>';
									array_push($tresults, $pID);
								} 
								
								
							endwhile;
						endif;
						
						$tParts = partition($tresults, 4);
						echo '<ul>';
						foreach($tParts[0] as $aPart1){
							$link = wtg_esc_url(get_permalink($aPart1));
							//$title = get_the_title($aPart1);
							//echo '<li class="country_title">'.$title.'</li>';
							wtg_return_cruise($aPart1);
						}
						echo '</ul>';
						echo '<ul>';
						foreach($tParts[1] as $aPart2){
							$link = wtg_esc_url(get_permalink($aPart2));
							//$title = get_the_title($aPart2);
							//echo '<li class="country_title">'.$title.'</li>';
							wtg_return_cruise($aPart2);
						}
						echo '</ul>';
						echo '<ul>';
						foreach($tParts[2] as $aPart3){
							$link = wtg_esc_url(get_permalink($aPart3));
							//$title = get_the_title($aPart3);
							//echo '<li class="country_title">'.$title.'</li>';
							wtg_return_cruise($aPart3);
						}
						echo '</ul>';
						echo '<ul>';
						foreach($tParts[3] as $aPart4){
							$link = wtg_esc_url(get_permalink($aPart4));
							//$title = get_the_title($aPart4);
							//echo '<li class="country_title">'.$title.'</li>';
							wtg_return_cruise($aPart4);
						}
						echo '</ul>';
						
						
						
						wp_reset_query();
                        echo'<div class="icon">
                            <a href="javascript:void(0);" class="trigger-continent">
                                <img src="'.get_template_directory_uri() .'/images/arrow_down.png">
                            </a>
                        </div>
                    </div>
                </div>

                <div id="w-z" class="tab-pane fade">
                    <div class="topnav" id="myTopnav">
                        <ul class="options_name">
                            <li><a href="#">'.$selectYourCountry.'</a>
                            </li>
                        </ul>';
						$wresults = array();
                        $wargs = array(
							'post_type'             => 'guides',
							'posts_per_page' 		=> -1,
							'order' 		=> 'ASC',
							'orderby'       => 'title',
							'tax_query'             => array(
								array(
											  'taxonomy' => 'wtg_guide_type',
											  'field'    => 'slug',
											  'terms'    => 'region',
											 
								),
							),
						);
						$postsQuery = new WP_Query($wargs);
			
						if($postsQuery->have_posts()):
							while ($postsQuery->have_posts()):$postsQuery->the_post();
								$pID = get_the_ID();
								$link = wtg_esc_url(get_permalink($pID));
								$title = get_the_title($pID);
								if (substr( $title, 0, 1 ) === "W"){
									//echo '<li class="country_title">'.$title.'</li>';
									array_push($wresults, $pID);
								} else if(substr( $title, 0, 1 ) === "X"){
									//echo '<li class="country_title">'.$title.'</li>';
									array_push($wresults, $pID);
								} else if(substr( $title, 0, 1 ) === "Y"){
									//echo '<li class="country_title">'.$title.'</li>';
									array_push($wresults, $pID);
								} else if(substr( $title, 0, 1 ) === "Z"){
									//echo '<li class="country_title">'.$title.'</li>';
									array_push($wresults, $pID);
								}
								
								
							endwhile;
						endif;
						
						$wParts = partition($wresults, 4);
						echo '<ul>';
						foreach($wParts[0] as $aPart1){
							$link = wtg_esc_url(get_permalink($aPart1));
							//$title = get_the_title($aPart1);
							//echo '<li class="country_title">'.$title.'</li>';
							wtg_return_cruise($aPart1);
						}
						echo '</ul>';
						echo '<ul>';
						foreach($wParts[1] as $aPart2){
							$link = wtg_esc_url(get_permalink($aPart2));
							//$title = get_the_title($aPart2);
							echo '<li class="country_title">'.$title.'</li>';
							wtg_return_cruise($aPart2);
						}
						echo '</ul>';
						echo '<ul>';
						foreach($wParts[2] as $aPart3){
							$link = wtg_esc_url(get_permalink($aPart3));
							//$title = get_the_title($aPart3);
							//echo '<li class="country_title">'.$title.'</li>';
							wtg_return_cruise($aPart3);
						}
						echo '</ul>';
						echo '<ul>';
						foreach($wParts[3] as $aPart4){
							$link = wtg_esc_url(get_permalink($aPart4));
							//$title = get_the_title($aPart4);
							//echo '<li class="country_title">'.$title.'</li>';
							wtg_return_cruise($aPart4);
						}
						echo '</ul>';
						
						
						
						wp_reset_query();
						$aresults = array();
						$dresults = array();
						$gresults = array();
						$jresults = array();
						$mresults = array();
						$presults = array();
						$tresults = array();
						$wresults = array();
                        echo'<div class="icon">
                            <a href="javascript:void(0);" class="trigger-continent">
                                <img src="'.get_template_directory_uri() .'/images/arrow_down.png">
                            </a>
                        </div>
                    </div>
                </div>


            </div>
        </div>
    </div>';
}

function wtg_skiby_AZ_html()
{
		$language = get_field ('language','options');
		switch ($language)
{
	case 'en':
		$skiResorts = 'A-Z Ski resorts';
		$findYourCity = 'Find your city from the list of countries below';
		$findYourCountry = 'Find your country';
		$selectYourCity = 'Select your city';
		$selectYourCountry = 'Select your country';
		break;

	case 'de':
		$skiResorts = 'Skigebiete von A-Z';
		$findYourCity = 'Finden Sie Ihre Stadt über die Länderliste.';
		$findYourCountry = 'Wählen Sie ein Land aus';
		$selectYourCity = 'Wählen Sie eine Stadt aus';
		$selectYourCountry ='Wählen Sie ein Land aus';
		break;
}

	
	?>
	<div class="select_country">
        <div class="container">
            <h3 class="with_arrow"><?php echo $skiResorts; ?></h3>
            <i class="icon with_arrow"></i>
            <ul class="nav nav-tabs a-z">
                <li class="options_name"><a data-toggle="tab" href="#"><?php echo $findYourCountry; ?></a>
                </li>
                <li class="active"><a data-toggle="tab" href="#a-c">A—C</a>
                </li>
                <li><a data-toggle="tab" href="#d-f">D—F</a>
                </li>
                <li><a data-toggle="tab" href="#g-i">G—I</a>
                </li>
                <li><a data-toggle="tab" href="#j-l">J—L</a>
                </li>
                <li><a data-toggle="tab" href="#m-o">M—O</a>
                </li>
                <li><a data-toggle="tab" href="#p-s">P—S</a>
                </li>
                <li><a data-toggle="tab" href="#t-v">T—V</a>
                </li>
                <li><a data-toggle="tab" href="#w-z">W—Z</a>
                </li>
            </ul>

            <div class="tab-content">
                <div id="a-c" class="tab-pane fade in active">
                    <div class="topnav" id="myTopnav">
                        <ul class="options_name">
                            <li><a href="#"><?php echo $selectYourCity; ?></a>
                            </li>
                        </ul><ul><li class="country_title">Alberta</li><li><a href="<?php echo get_site_url(); ?>/guides/north-america/canada/alberta/jasper/" class="active">Jasper</a></li><li><a href="<?php echo get_site_url(); ?>/guides/north-america/canada/alberta/lake-louise/" class="active">Lake Louise</a></li><li><a href="<?php echo get_site_url(); ?>/guides/north-america/canada/alberta/banff/" class="active">Banff</a></li><li class="country_title">Andorra</li><li><a href="<?php echo get_site_url(); ?>/guides/europe/andorra/arinsal/" class="active">Arinsal</a></li><li><a href="<?php echo get_site_url(); ?>/guides/europe/andorra/soldeu/" class="active">Soldeu</a></li><li class="country_title">Argentina</li><li><a href="<?php echo get_site_url(); ?>/guides/south-america/argentina/catedral/" class="active">Catedral</a></li></ul><ul><li class="country_title">Austria</li><li><a href="<?php echo get_site_url(); ?>/guides/europe/austria/alpbach/" class="active">Alpbach</a></li><li><a href="<?php echo get_site_url(); ?>/guides/europe/austria/lech/" class="active">Lech</a></li><li><a href="<?php echo get_site_url(); ?>/guides/europe/austria/saalbach-hinterglemm/" class="active">Saalbach-Hinterglemm</a></li><li><a href="<?php echo get_site_url(); ?>/guides/europe/austria/seefeld/" class="active">Seefeld</a></li><li><a href="<?php echo get_site_url(); ?>/guides/europe/austria/ellmau/" class="active">Ellmau</a></li><li><a href="<?php echo get_site_url(); ?>/guides/europe/austria/st-anton/" class="active">St Anton</a></li><li><a href="<?php echo get_site_url(); ?>/guides/europe/austria/zell-am-see/" class="active">Zell am See</a></li><li><a href="<?php echo get_site_url(); ?>/guides/europe/austria/mayrhofen/" class="active">Mayrhofen</a></li><li><a href="<?php echo get_site_url(); ?>/guides/europe/austria/bad-gastein/" class="active">Bad Gastein</a></li><li><a href="<?php echo get_site_url(); ?>/guides/europe/austria/obertauern/" class="active">Obertauern</a></li><li><a href="<?php echo get_site_url(); ?>/guides/europe/austria/st-wolfgang/" class="active">St Wolfgang</a></li><li><a href="<?php echo get_site_url(); ?>/guides/europe/austria/innsbruck/" class="active">Innsbruck</a></li><li><a href="<?php echo get_site_url(); ?>/guides/europe/austria/ischgl/" class="active">Ischgl</a></li><li><a href="<?php echo get_site_url(); ?>/guides/europe/austria/obergurgl/" class="active">Obergurgl</a></li><li><a href="<?php echo get_site_url(); ?>/guides/europe/austria/sll/" class="active">S&#xF6;ll</a></li><li><a href="<?php echo get_site_url(); ?>/guides/europe/austria/slden/" class="active">S&#xF6;lden</a></li><li><a href="<?php echo get_site_url(); ?>/guides/europe/austria/kitzbhel/" class="active">Kitzb&#xFC;hel</a></li></ul><ul><li class="country_title">British Columbia</li><li><a href="<?php echo get_site_url(); ?>/guides/north-america/canada/british-columbia/sun-peaks/" class="active">Sun Peaks</a></li><li><a href="<?php echo get_site_url(); ?>/guides/north-america/canada/british-columbia/kicking-horse/" class="active">Kicking Horse</a></li><li><a href="<?php echo get_site_url(); ?>/guides/north-america/canada/british-columbia/big-white/" class="active">Big White</a></li><li><a href="<?php echo get_site_url(); ?>/guides/north-america/canada/british-columbia/fernie/" class="active">Fernie</a></li><li><a href="<?php echo get_site_url(); ?>/guides/north-america/canada/british-columbia/whistler-blackcomb/" class="active">Whistler Blackcomb</a></li><li class="country_title">Bulgaria</li><li><a href="<?php echo get_site_url(); ?>/guides/europe/bulgaria/bansko/" class="active">Bansko</a></li><li><a href="<?php echo get_site_url(); ?>/guides/europe/bulgaria/borovets/" class="active">Borovets</a></li><li><a href="<?php echo get_site_url(); ?>/guides/europe/bulgaria/pamporovo/" class="active">Pamporovo</a></li><li class="country_title">California</li><li><a href="<?php echo get_site_url(); ?>/guides/north-america/united-states-of-america/california/mammoth/" class="active">Mammoth</a></li><li><a href="<?php echo get_site_url(); ?>/guides/north-america/united-states-of-america/california/heavenly/" class="active">Heavenly</a></li><li><a href="<?php echo get_site_url(); ?>/guides/north-america/united-states-of-america/california/squaw-valley/" class="active">Squaw Valley</a></li><li class="country_title">Canada</li><li><a href="<?php echo get_site_url(); ?>/guides/north-america/canada/quebec/tremblant/" class="active">Tremblant</a></li><li><a href="<?php echo get_site_url(); ?>/guides/north-america/canada/alberta/jasper/" class="active">Jasper</a></li><li><a href="<?php echo get_site_url(); ?>/guides/north-america/canada/alberta/lake-louise/" class="active">Lake Louise</a></li><li><a href="<?php echo get_site_url(); ?>/guides/north-america/canada/alberta/banff/" class="active">Banff</a></li><li><a href="<?php echo get_site_url(); ?>/guides/north-america/canada/british-columbia/sun-peaks/" class="active">Sun Peaks</a></li><li><a href="<?php echo get_site_url(); ?>/guides/north-america/canada/british-columbia/kicking-horse/" class="active">Kicking Horse</a></li><li><a href="<?php echo get_site_url(); ?>/guides/north-america/canada/british-columbia/big-white/" class="active">Big White</a></li><li><a href="<?php echo get_site_url(); ?>/guides/north-america/canada/british-columbia/fernie/" class="active">Fernie</a></li><li><a href="<?php echo get_site_url(); ?>/guides/north-america/canada/british-columbia/whistler-blackcomb/" class="active">Whistler Blackcomb</a></li></ul><ul><li class="country_title">Colorado</li><li><a href="<?php echo get_site_url(); ?>/guides/north-america/united-states-of-america/colorado/beaver-creek/" class="active">Beaver Creek</a></li><li><a href="<?php echo get_site_url(); ?>/guides/north-america/united-states-of-america/colorado/copper-mountain/" class="active">Copper Mountain</a></li><li><a href="<?php echo get_site_url(); ?>/guides/north-america/united-states-of-america/colorado/steamboat/" class="active">Steamboat</a></li><li><a href="<?php echo get_site_url(); ?>/guides/north-america/united-states-of-america/colorado/vail/" class="active">Vail</a></li><li><a href="<?php echo get_site_url(); ?>/guides/north-america/united-states-of-america/colorado/aspen/" class="active">Aspen</a></li><li><a href="<?php echo get_site_url(); ?>/guides/north-america/united-states-of-america/colorado/winter-park/" class="active">Winter Park</a></li><li><a href="<?php echo get_site_url(); ?>/guides/north-america/united-states-of-america/colorado/breckenridge/" class="active">Breckenridge</a></li></ul><div class="icon">
                            <a href="javascript:void(0);" class="trigger-continent">
                                <img src="<?php echo get_site_url(); ?>/wp-content/themes/wtg/images/arrow_down.png">
                            </a>
                        </div>
                    </div>
                </div>
                <div id="d-f" class="tab-pane fade">
                    <div class="topnav" id="myTopnav">
                        <ul class="options_name">
                            <li><a href="#"><?php echo $selectYourCity; ?></a>
                            </li>
                        </ul><ul></ul><ul></ul><ul></ul><ul><li class="country_title">France</li><li><a href="<?php echo get_site_url(); ?>/guides/europe/france/valloire/" class="active">Valloire</a></li><li><a href="<?php echo get_site_url(); ?>/guides/europe/france/tignes/" class="active">Tignes</a></li><li><a href="<?php echo get_site_url(); ?>/guides/europe/france/chamonix/" class="active">Chamonix</a></li><li><a href="<?php echo get_site_url(); ?>/guides/europe/france/serre-chevalier/" class="active">Serre Chevalier</a></li><li><a href="<?php echo get_site_url(); ?>/guides/europe/france/val-thorens/" class="active">Val Thorens</a></li><li><a href="<?php echo get_site_url(); ?>/guides/europe/france/flaine/" class="active">Flaine</a></li><li><a href="<?php echo get_site_url(); ?>/guides/europe/france/la-plagne/" class="active">La Plagne</a></li><li><a href="<?php echo get_site_url(); ?>/guides/europe/france/alpe-dhuez/" class="active">Alpe d&#8217;Huez</a></li><li><a href="<?php echo get_site_url(); ?>/guides/europe/france/la-tania/" class="active">La Tania</a></li><li><a href="<?php echo get_site_url(); ?>/guides/europe/france/morzine-avoriaz/" class="active">Morzine-Avoriaz</a></li><li><a href="<?php echo get_site_url(); ?>/guides/europe/france/courchevel/" class="active">Courchevel</a></li><li><a href="<?php echo get_site_url(); ?>/guides/europe/france/les-deux-alpes/" class="active">Les Deux Alpes</a></li><li><a href="<?php echo get_site_url(); ?>/guides/europe/france/les-arcs/" class="active">Les Arcs</a></li><li><a href="<?php echo get_site_url(); ?>/guides/europe/france/valmorel/" class="active">Valmorel</a></li><li><a href="<?php echo get_site_url(); ?>/guides/europe/france/peisey-vallandry/" class="active">Peisey-Vallandry</a></li><li><a href="<?php echo get_site_url(); ?>/guides/europe/france/la-clusaz/" class="active">La Clusaz</a></li><li><a href="<?php echo get_site_url(); ?>/guides/europe/france/les-menuires/" class="active">Les Menuires</a></li><li><a href="<?php echo get_site_url(); ?>/guides/europe/france/risoul/" class="active">Risoul</a></li><li><a href="<?php echo get_site_url(); ?>/guides/europe/france/pas-de-la-casa/" class="active">Pas de la Casa</a></li><li><a href="<?php echo get_site_url(); ?>/guides/europe/france/chamrousse/" class="active">Chamrousse</a></li><li><a href="<?php echo get_site_url(); ?>/guides/europe/france/la-rosiere/" class="active">La Rosiere</a></li><li><a href="<?php echo get_site_url(); ?>/guides/europe/france/les-gets/" class="active">Les Gets</a></li><li><a href="<?php echo get_site_url(); ?>/guides/europe/france/cauterets/" class="active">Cauterets</a></li><li><a href="<?php echo get_site_url(); ?>/guides/europe/france/mribel/" class="active">M&#xE9;ribel</a></li><li><a href="<?php echo get_site_url(); ?>/guides/europe/france/megve/" class="active">Meg&#xE8;ve</a></li><li><a href="<?php echo get_site_url(); ?>/guides/europe/france/montgenvre/" class="active">Montgen&#xE8;vre</a></li><li><a href="<?php echo get_site_url(); ?>/guides/europe/france/samons/" class="active">Samo&#xEB;ns</a></li><li><a href="<?php echo get_site_url(); ?>/guides/europe/france/barges/" class="active">Bar&#xE8;ges</a></li><li><a href="<?php echo get_site_url(); ?>/guides/europe/france/val-disre/" class="active">Val d&#8217;Is&#xE8;re</a></li></ul><div class="icon">
                            <a href="javascript:void(0);" class="trigger-continent">
                                <img src="<?php echo get_site_url(); ?>/wp-content/themes/wtg/images/arrow_down.png">
                            </a>
                        </div>
                    </div>
                </div>
                <div id="g-i" class="tab-pane fade">
                    <div class="topnav" id="myTopnav">
                        <ul class="options_name">
                            <li><a href="#"><?php echo $selectYourCity; ?></a>
                            </li>
                        </ul><ul><li class="country_title">Germany</li><li><a href="<?php echo get_site_url(); ?>/guides/europe/germany/garmisch-partenkirchen/" class="active">Garmisch-Partenkirchen</a></li></ul><ul></ul><ul></ul><ul><li class="country_title">Italy</li><li><a href="<?php echo get_site_url(); ?>/guides/europe/italy/livigno/" class="active">Livigno</a></li><li><a href="<?php echo get_site_url(); ?>/guides/europe/italy/sauze-doulx/" class="active">Sauze d&#8217;Oulx</a></li><li><a href="<?php echo get_site_url(); ?>/guides/europe/italy/sestriere/" class="active">Sestriere</a></li><li><a href="<?php echo get_site_url(); ?>/guides/europe/italy/cervinia/" class="active">Cervinia</a></li><li><a href="<?php echo get_site_url(); ?>/guides/europe/italy/la-thuile/" class="active">La Thuile</a></li><li><a href="<?php echo get_site_url(); ?>/guides/europe/italy/cortina/" class="active">Cortina</a></li><li><a href="<?php echo get_site_url(); ?>/guides/europe/italy/pragelato/" class="active">Pragelato</a></li><li><a href="<?php echo get_site_url(); ?>/guides/europe/italy/bardonecchia/" class="active">Bardonecchia</a></li><li><a href="<?php echo get_site_url(); ?>/guides/europe/italy/courmayeur/" class="active">Courmayeur</a></li></ul><div class="icon">
                            <a href="javascript:void(0);" class="trigger-continent">
                                <img src="<?php echo get_site_url(); ?>/wp-content/themes/wtg/images/arrow_down.png">
                            </a>
                        </div>
                    </div>
                </div>
                <div id="j-l" class="tab-pane fade">
                    <div class="topnav" id="myTopnav">
                        <ul class="options_name">
                            <li><a href="#"><?php echo $selectYourCity; ?></a>
                            </li>
                        </ul><ul><li class="country_title">Japan</li><li><a href="<?php echo get_site_url(); ?>/guides/asia/japan/hakuba/" class="active">Hakuba</a></li><li><a href="<?php echo get_site_url(); ?>/guides/asia/japan/furano/" class="active">Furano</a></li><li><a href="<?php echo get_site_url(); ?>/guides/asia/japan/niseko/" class="active">Niseko</a></li><li><a href="<?php echo get_site_url(); ?>/guides/asia/japan/rusutsu/" class="active">Rusutsu</a></li></ul><ul></ul><ul></ul><ul></ul><div class="icon">
                            <a href="javascript:void(0);" class="trigger-continent">
                                <img src="<?php echo get_site_url(); ?>/wp-content/themes/wtg/images/arrow_down.png">
                            </a>
                        </div>
                    </div>
                </div>

                <div id="m-o" class="tab-pane fade">
                    <div class="topnav" id="myTopnav">
                        <ul class="options_name">
                            <li><a href="#"><?php echo $selectYourCity; ?></a>
                            </li>
                        </ul><ul></ul><ul></ul><ul><li class="country_title">New Zealand</li><li><a href="<?php echo get_site_url(); ?>/guides/oceania/new-zealand/queenstown-ski/" class="active">Queenstown Ski</a></li></ul><ul><li class="country_title">Norway</li><li><a href="<?php echo get_site_url(); ?>/guides/europe/norway/geilo/" class="active">Geilo</a></li><li><a href="<?php echo get_site_url(); ?>/guides/europe/norway/hemsedal/" class="active">Hemsedal</a></li></ul><div class="icon">
                            <a href="javascript:void(0);" class="trigger-continent">
                                <img src="<?php echo get_site_url(); ?>/wp-content/themes/wtg/images/arrow_down.png">
                            </a>
                        </div>
                    </div>
                </div>

                <div id="p-s" class="tab-pane fade">
                    <div class="topnav" id="myTopnav">
                        <ul class="options_name">
                            <li><a href="#">Select your country</a>
                            </li>
                        </ul><ul></ul><ul><li class="country_title">Quebec</li><li><a href="<?php echo get_site_url(); ?>/guides/north-america/canada/quebec/tremblant/" class="active">Tremblant</a></li></ul><ul><li class="country_title">Scotland</li><li><a href="<?php echo get_site_url(); ?>/guides/europe/united-kingdom/scotland/nevis-range/" class="active">Nevis Range</a></li><li><a href="<?php echo get_site_url(); ?>/guides/europe/united-kingdom/scotland/glenshee/" class="active">Glenshee</a></li><li><a href="<?php echo get_site_url(); ?>/guides/europe/united-kingdom/scotland/aviemore/" class="active">Aviemore</a></li><li class="country_title">Slovenia</li><li><a href="<?php echo get_site_url(); ?>/guides/europe/slovenia/bled/" class="active">Bled</a></li><li><a href="<?php echo get_site_url(); ?>/guides/europe/slovenia/kranjska-gora/" class="active">Kranjska Gora</a></li></ul><ul><li class="country_title">Spain</li><li><a href="<?php echo get_site_url(); ?>/guides/europe/spain/sierra-nevada/" class="active">Sierra Nevada</a></li><li><a href="<?php echo get_site_url(); ?>/guides/europe/spain/formigal/" class="active">Formigal</a></li><li class="country_title">Sweden</li><li><a href="<?php echo get_site_url(); ?>/guides/europe/sweden/vemdalen/" class="active">Vemdalen</a></li><li><a href="<?php echo get_site_url(); ?>/guides/europe/sweden/re/" class="active">&#xC5;re</a></li><li><a href="<?php echo get_site_url(); ?>/guides/europe/sweden/riksgrnsen/" class="active">Riksgr&#xE4;nsen</a></li><li class="country_title">Switzerland</li><li><a href="<?php echo get_site_url(); ?>/guides/europe/switzerland/davos/" class="active">Davos</a></li><li><a href="<?php echo get_site_url(); ?>/guides/europe/switzerland/verbier/" class="active">Verbier</a></li><li><a href="<?php echo get_site_url(); ?>/guides/europe/switzerland/villars/" class="active">Villars</a></li><li><a href="<?php echo get_site_url(); ?>/guides/europe/switzerland/saas-fee/" class="active">Saas Fee</a></li><li><a href="<?php echo get_site_url(); ?>/guides/europe/switzerland/zermatt/" class="active">Zermatt</a></li><li><a href="<?php echo get_site_url(); ?>/guides/europe/switzerland/wengen/" class="active">Wengen</a></li><li><a href="<?php echo get_site_url(); ?>/guides/europe/switzerland/st-moritz/" class="active">St Moritz</a></li><li><a href="<?php echo get_site_url(); ?>/guides/europe/switzerland/grindelwald/" class="active">Grindelwald</a></li><li><a href="<?php echo get_site_url(); ?>/guides/europe/switzerland/klosters/" class="active">Klosters</a></li><li><a href="<?php echo get_site_url(); ?>/guides/europe/switzerland/meiringen-hasliberg/" class="active">Meiringen-Hasliberg</a></li><li><a href="<?php echo get_site_url(); ?>/guides/europe/switzerland/engelberg/" class="active">Engelberg</a></li></ul><div class="icon">
                            <a href="javascript:void(0);" class="trigger-continent">
                                <img src="<?php echo get_site_url(); ?>/wp-content/themes/wtg/images/arrow_down.png">
                            </a>
                        </div>
                    </div>
                </div>

                <div id="t-v" class="tab-pane fade">
                    <div class="topnav" id="myTopnav">
                        <ul class="options_name">
                            <li><a href="#">Select your country</a>
                            </li>
                        </ul><ul></ul><ul></ul><ul><li class="country_title">United Kingdom</li><li><a href="<?php echo get_site_url(); ?>/guides/europe/united-kingdom/scotland/nevis-range/" class="active">Nevis Range</a></li><li><a href="<?php echo get_site_url(); ?>/guides/europe/united-kingdom/scotland/glenshee/" class="active">Glenshee</a></li><li><a href="<?php echo get_site_url(); ?>/guides/europe/united-kingdom/scotland/aviemore/" class="active">Aviemore</a></li><li class="country_title">United States of America</li><li><a href="<?php echo get_site_url(); ?>/guides/north-america/united-states-of-america/california/mammoth/" class="active">Mammoth</a></li><li><a href="<?php echo get_site_url(); ?>/guides/north-america/united-states-of-america/california/heavenly/" class="active">Heavenly</a></li><li><a href="<?php echo get_site_url(); ?>/guides/north-america/united-states-of-america/california/squaw-valley/" class="active">Squaw Valley</a></li><li><a href="<?php echo get_site_url(); ?>/guides/north-america/united-states-of-america/wyoming/jackson-hole/" class="active">Jackson Hole</a></li><li><a href="<?php echo get_site_url(); ?>/guides/north-america/united-states-of-america/utah/park-city/" class="active">Park City</a></li><li><a href="<?php echo get_site_url(); ?>/guides/north-america/united-states-of-america/colorado/beaver-creek/" class="active">Beaver Creek</a></li><li><a href="<?php echo get_site_url(); ?>/guides/north-america/united-states-of-america/colorado/copper-mountain/" class="active">Copper Mountain</a></li><li><a href="<?php echo get_site_url(); ?>/guides/north-america/united-states-of-america/colorado/steamboat/" class="active">Steamboat</a></li><li><a href="<?php echo get_site_url(); ?>/guides/north-america/united-states-of-america/colorado/vail/" class="active">Vail</a></li><li><a href="<?php echo get_site_url(); ?>/guides/north-america/united-states-of-america/colorado/aspen/" class="active">Aspen</a></li><li><a href="<?php echo get_site_url(); ?>/guides/north-america/united-states-of-america/colorado/winter-park/" class="active">Winter Park</a></li><li><a href="<?php echo get_site_url(); ?>/guides/north-america/united-states-of-america/colorado/breckenridge/" class="active">Breckenridge</a></li><li><a href="<?php echo get_site_url(); ?>/guides/north-america/united-states-of-america/vermont/stowe/" class="active">Stowe</a></li><li><a href="<?php echo get_site_url(); ?>/guides/north-america/united-states-of-america/vermont/killington/" class="active">Killington</a></li><li class="country_title">Utah</li><li><a href="<?php echo get_site_url(); ?>/guides/north-america/united-states-of-america/utah/park-city/" class="active">Park City</a></li></ul><ul><li class="country_title">Vermont</li><li><a href="<?php echo get_site_url(); ?>/guides/north-america/united-states-of-america/vermont/stowe/" class="active">Stowe</a></li><li><a href="<?php echo get_site_url(); ?>/guides/north-america/united-states-of-america/vermont/killington/" class="active">Killington</a></li></ul><div class="icon">
                            <a href="javascript:void(0);" class="trigger-continent">
                                <img src="<?php echo get_site_url(); ?>/wp-content/themes/wtg/images/arrow_down.png">
                            </a>
                        </div>
                    </div>
                </div>

                <div id="w-z" class="tab-pane fade">
                    <div class="topnav" id="myTopnav">
                        <ul class="options_name">
                            <li><a href="#">Select your country</a>
                            </li>
                        </ul><ul></ul><ul><li class="country_title">Wyoming</li><li><a href="<?php echo get_site_url(); ?>/guides/north-america/united-states-of-america/wyoming/jackson-hole/" class="active">Jackson Hole</a></li></ul><ul></ul><ul></ul><div class="icon">
                            <a href="javascript:void(0);" class="trigger-continent">
                                <img src="<?php echo get_site_url(); ?>/wp-content/themes/wtg/images/arrow_down.png">
                            </a>
                        </div>
                    </div>
                </div>


            </div>
        </div>
	</div>
	
	<?php
}


function wtg_skiby_AZ_static()
{
		$language = get_field ('language','options');
			switch ($language)
{
	case 'en':
		$skiResorts = 'A-Z Ski resorts';
		$findYourCity = 'Find your city from the list of countries below';
		$findYourCountry = 'Find your country';
		$selectYourCity = 'Select your city';
		$selectYourCountry = 'Select your country';
		break;

	case 'de':
		$skiResorts = 'Skigebiete von A-Z';
		$findYourCity = 'Finden Sie Ihre Stadt über die Länderliste.';
		$findYourCountry = 'Wählen Sie ein Land aus';
		$selectYourCity = 'Wählen Sie eine Stadt aus';
		$selectYourCountry ='Wählen Sie ein Land aus';
		break;
}
	echo '<div class="select_country">
        <div class="container">
            <h3 class="with_arrow">'.$skiResorts.'</h3>
            <i class="icon with_arrow"></i>
            <ul class="nav nav-tabs a-z">
                <li class="options_name"><a data-toggle="tab" href="#">'.$findYourCountry.'</a>
                </li>
                <li class="active"><a data-toggle="tab" href="#a-c">A—C</a>
                </li>
                <li><a data-toggle="tab" href="#d-f">D—F</a>
                </li>
                <li><a data-toggle="tab" href="#g-i">G—I</a>
                </li>
                <li><a data-toggle="tab" href="#j-l">J—L</a>
                </li>
                <li><a data-toggle="tab" href="#m-o">M—O</a>
                </li>
                <li><a data-toggle="tab" href="#p-s">P—S</a>
                </li>
                <li><a data-toggle="tab" href="#t-v">T—V</a>
                </li>
                <li><a data-toggle="tab" href="#w-z">W—Z</a>
                </li>
            </ul>

            <div class="tab-content">
                <div id="a-c" class="tab-pane fade in active">
                    <div class="topnav" id="myTopnav">
                        <ul class="options_name">
                            <li><a href="#">'.$selectYourCity.'</a>
                            </li>
                        </ul>';
						
						$aargs = array(
							'post_type'             => 'guides',
							'posts_per_page' 		=> -1,
							'order' 		=> 'ASC',
							'orderby'       => 'title',
							'tax_query'             => array(
								array(
											  'taxonomy' => 'wtg_guide_type',
											  'field'    => 'slug',
											  'terms'    => 'region',
											 
								),
							),
						);
						$aresults = array();
						$postsQuery = new WP_Query($aargs);
						
						if($postsQuery->have_posts()):
							while ($postsQuery->have_posts()):$postsQuery->the_post();
								$pID = get_the_ID();
								$link = wtg_esc_url(get_permalink($pID));
								$title = get_the_title($pID);
								if (substr( $title, 0, 1 ) === "A"){
									array_push($aresults, $pID);
									//echo '<li class="country_title">'.$title.'</li>';
								} else if(substr( $title, 0, 1 ) === "B"){
									array_push($aresults, $pID);
									//echo '<li class="country_title">'.$title.'</li>';
								} else if(substr( $title, 0, 1 ) === "C"){
									array_push($aresults, $pID);
									//echo '<li class="country_title">'.$title.'</li>';
								}
								
								
							endwhile;
						endif;
						$aParts = partition($aresults, 4);
						echo '<ul>';
						foreach($aParts[0] as $aPart1){
							$link = wtg_esc_url(get_permalink($aPart1));
							//$title = get_the_title($aPart1);
							//echo '<li class="country_title">'.$title.'</li>';
							
							wtg_return_ski($aPart1);
							
						}
						echo '</ul>';
						echo '<ul>';
						foreach($aParts[1] as $aPart2){
							$link = wtg_esc_url(get_permalink($aPart2));
							//$title = get_the_title($aPart2);
							//echo '<li class="country_title">'.$title.'</li>';
							wtg_return_ski($aPart2);
						}
						echo '</ul>';
						echo '<ul>';
						foreach($aParts[2] as $aPart3){
							$link = wtg_esc_url(get_permalink($aPart3));
							//$title = get_the_title($aPart3);
							//echo '<li class="country_title">'.$title.'</li>';
							wtg_return_ski($aPart3);
						}
						echo '</ul>';
						echo '<ul>';
						foreach($aParts[3] as $aPart4){
							$link = wtg_esc_url(get_permalink($aPart4));
							//$title = get_the_title($aPart4);
							//echo '<li class="country_title">'.$title.'</li>';
							wtg_return_ski($aPart4);
						}
						echo '</ul>';
						
						
						wp_reset_query();
						
                echo        '<div class="icon">
                            <a href="javascript:void(0);" class="trigger-continent">
                                <img src="'.get_template_directory_uri() .'/images/arrow_down.png">
                            </a>
                        </div>
                    </div>
                </div>
                <div id="d-f" class="tab-pane fade">
                    <div class="topnav" id="myTopnav">
                        <ul class="options_name">
                            <li><a href="#">'.$selectYourCity.'</a>
                            </li>
                        </ul>';
						$dresults = array();
                        $dargs = array(
							'post_type'             => 'guides',
							'posts_per_page' 		=> -1,
							'order' 		=> 'ASC',
							'orderby'       => 'title',
							'tax_query'             => array(
								array(
											  'taxonomy' => 'wtg_guide_type',
											  'field'    => 'slug',
											  'terms'    => 'region',
											 
								),
							),
						);
						$postsQuery = new WP_Query($dargs);
						if($postsQuery->have_posts()):
							while ($postsQuery->have_posts()):$postsQuery->the_post();
								$pID = get_the_ID();
								$link = wtg_esc_url(get_permalink($pID));
								$title = get_the_title($pID);
								if (substr( $title, 0, 1 ) === "D"){
									//echo '<li class="country_title">'.$title.'</li>';
									array_push($dresults, $pID);
								} else if(substr( $title, 0, 1 ) === "E"){
									//echo '<li class="country_title">'.$title.'</li>';
									array_push($dresults, $pID);
								} else if(substr( $title, 0, 1 ) === "F"){
									//echo '<li class="country_title">'.$title.'</li>';
									array_push($dresults, $pID);
								}
								
								
							endwhile;
						endif;
						
						$dParts = partition($dresults, 4);
						echo '<ul>';
						foreach($dParts[0] as $aPart1){
							$link = wtg_esc_url(get_permalink($aPart1));
							//$title = get_the_title($aPart1);
							//echo '<li class="country_title">'.$title.'</li>';
							wtg_return_ski($aPart1);
						}
						echo '</ul>';
						echo '<ul>';
						foreach($dParts[1] as $aPart2){
							$link = wtg_esc_url(get_permalink($aPart2));
							//$title = get_the_title($aPart2);
							//echo '<li class="country_title">'.$title.'</li>';
							wtg_return_ski($aPart2);
						}
						echo '</ul>';
						echo '<ul>';
						foreach($dParts[2] as $aPart3){
							$link = wtg_esc_url(get_permalink($aPart3));
							//$title = get_the_title($aPart3);
							//echo '<li class="country_title">'.$title.'</li>';
							wtg_return_ski($aPart3);
						}
						echo '</ul>';
						echo '<ul>';
						foreach($dParts[3] as $aPart4){
							$link = wtg_esc_url(get_permalink($aPart4));
							//$title = get_the_title($aPart4);
							//echo '<li class="country_title">'.$title.'</li>';
							wtg_return_ski($aPart4);
						}
						echo '</ul>';
						
						
						
						wp_reset_query();
                        echo'<div class="icon">
                            <a href="javascript:void(0);" class="trigger-continent">
                                <img src="'.get_template_directory_uri() .'/images/arrow_down.png">
                            </a>
                        </div>
                    </div>
                </div>
                <div id="g-i" class="tab-pane fade">
                    <div class="topnav" id="myTopnav">
                        <ul class="options_name">
                            <li><a href="#">'.$selectYourCity.'</a>
                            </li>
                        </ul>';
						$gresults = array();
                        $gargs = array(
							'post_type'             => 'guides',
							'posts_per_page' 		=> -1,
							'order' 		=> 'ASC',
							'orderby'       => 'title',
							'tax_query'             => array(
								array(
											  'taxonomy' => 'wtg_guide_type',
											  'field'    => 'slug',
											  'terms'    => 'region',
											 
								),
							),
						);
						$postsQuery = new WP_Query($gargs);
						if($postsQuery->have_posts()):
							while ($postsQuery->have_posts()):$postsQuery->the_post();
								$pID = get_the_ID();
								$link = wtg_esc_url(get_permalink($pID));
								$title = get_the_title($pID);
								if (substr( $title, 0, 1 ) === "G"){
									//echo '<li class="country_title">'.$title.'</li>';
									array_push($gresults, $pID);
								} else if(substr( $title, 0, 1 ) === "H"){
									//echo '<li class="country_title">'.$title.'</li>';
									array_push($gresults, $pID);
								} else if(substr( $title, 0, 1 ) === "I"){
									//echo '<li class="country_title">'.$title.'</li>';
									array_push($gresults, $pID);
								}
								
								
							endwhile;
						endif;
						
						$gParts = partition($gresults, 4);
						echo '<ul>';
						foreach($gParts[0] as $aPart1){
							$link = wtg_esc_url(get_permalink($aPart1));
							//$title = get_the_title($aPart1);
							//echo '<li class="country_title">'.$title.'</li>';
							wtg_return_ski($aPart1);
						}
						echo '</ul>';
						echo '<ul>';
						foreach($gParts[1] as $aPart2){
							$link = wtg_esc_url(get_permalink($aPart2));
							//$title = get_the_title($aPart2);
							//echo '<li class="country_title">'.$title.'</li>';
							wtg_return_ski($aPart2);
						}
						echo '</ul>';
						echo '<ul>';
						foreach($gParts[2] as $aPart3){
							$link = wtg_esc_url(get_permalink($aPart3));
							//$title = get_the_title($aPart3);
							//echo '<li class="country_title">'.$title.'</li>';
							wtg_return_ski($aPart3);
						}
						echo '</ul>';
						echo '<ul>';
						foreach($gParts[3] as $aPart4){
							$link = wtg_esc_url(get_permalink($aPart4));
							//$title = get_the_title($aPart4);
							//echo '<li class="country_title">'.$title.'</li>';
							wtg_return_ski($aPart4);
						}
						echo '</ul>';
						
						
						
						wp_reset_query();
                        echo'<div class="icon">
                            <a href="javascript:void(0);" class="trigger-continent">
                                <img src="'.get_template_directory_uri() .'/images/arrow_down.png">
                            </a>
                        </div>
                    </div>
                </div>
                <div id="j-l" class="tab-pane fade">
                    <div class="topnav" id="myTopnav">
                        <ul class="options_name">
                            <li><a href="#">'.$selectYourCity.'</a>
                            </li>
                        </ul>';
						$jresults = array();
                        $jargs = array(
							'post_type'             => 'guides',
							'posts_per_page' 		=> -1,
							'order' 		=> 'ASC',
							'orderby'       => 'title',
							'tax_query'             => array(
								array(
											  'taxonomy' => 'wtg_guide_type',
											  'field'    => 'slug',
											  'terms'    => 'region',
											 
								),
							),
						);
						$postsQuery = new WP_Query($jargs);
						echo '<ul>';
						if($postsQuery->have_posts()):
							while ($postsQuery->have_posts()):$postsQuery->the_post();
								$pID = get_the_ID();
								$link = wtg_esc_url(get_permalink($pID));
								$title = get_the_title($pID);
								if (substr( $title, 0, 1 ) === "J"){
									//echo '<li class="country_title">'.$title.'</li>';
									array_push($jresults, $pID);
								} else if(substr( $title, 0, 1 ) === "K"){
									//echo '<li class="country_title">'.$title.'</li>';
									array_push($jresults, $pID);
								} else if(substr( $title, 0, 1 ) === "L"){
									//echo '<li class="country_title">'.$title.'</li>';
									array_push($jresults, $pID);
								}
								
								
							endwhile;
						endif;
						
						$jParts = partition($jresults, 4);
						foreach($jParts[0] as $aPart1){
							$link = wtg_esc_url(get_permalink($aPart1));
							//$title = get_the_title($aPart1);
							//echo '<li class="country_title">'.$title.'</li>';
							wtg_return_ski($aPart1);
						}
						echo '</ul>';
						echo '<ul>';
						foreach($jParts[1] as $aPart2){
							$link = wtg_esc_url(get_permalink($aPart2));
							//$title = get_the_title($aPart2);
							//echo '<li class="country_title">'.$title.'</li>';
							wtg_return_ski($aPart2);
						}
						echo '</ul>';
						echo '<ul>';
						foreach($jParts[2] as $aPart3){
							$link = wtg_esc_url(get_permalink($aPart3));
							//$title = get_the_title($aPart3);
							//echo '<li class="country_title">'.$title.'</li>';
							wtg_return_ski($aPart3);
						}
						echo '</ul>';
						echo '<ul>';
						foreach($jParts[3] as $aPart4){
							$link = wtg_esc_url(get_permalink($aPart4));
							//$title = get_the_title($aPart4);
							//echo '<li class="country_title">'.$title.'</li>';
							wtg_return_ski($aPart4);
						}
						echo '</ul>';
						
						
						
						wp_reset_query();
                        echo'<div class="icon">
                            <a href="javascript:void(0);" class="trigger-continent">
                                <img src="'.get_template_directory_uri() .'/images/arrow_down.png">
                            </a>
                        </div>
                    </div>
                </div>

                <div id="m-o" class="tab-pane fade">
                    <div class="topnav" id="myTopnav">
                        <ul class="options_name">
                            <li><a href="#">'.$selectYourCity.'</a>
                            </li>
                        </ul>';
						$mresults = array();
                        $margs = array(
							'post_type'             => 'guides',
							'posts_per_page' 		=> -1,
							'order' 		=> 'ASC',
							'orderby'       => 'title',
							'tax_query'             => array(
								array(
											  'taxonomy' => 'wtg_guide_type',
											  'field'    => 'slug',
											  'terms'    => 'region',
											 
								),
							),
						);
						$postsQuery = new WP_Query($margs);
						if($postsQuery->have_posts()):
							while ($postsQuery->have_posts()):$postsQuery->the_post();
								$pID = get_the_ID();
								$link = wtg_esc_url(get_permalink($pID));
								$title = get_the_title($pID);
								if (substr( $title, 0, 1 ) === "M"){
									//echo '<li class="country_title">'.$title.'</li>';
									array_push($mresults, $pID);
								} else if(substr( $title, 0, 1 ) === "N"){
									//echo '<li class="country_title">'.$title.'</li>';
									array_push($mresults, $pID);
								} else if(substr( $title, 0, 1 ) === "O"){
									//echo '<li class="country_title">'.$title.'</li>';
									array_push($mresults, $pID);
								}
								
								
							endwhile;
						endif;
						
						$mParts = partition($mresults, 4);
						echo '<ul>';
						foreach($mParts[0] as $aPart1){
							$link = wtg_esc_url(get_permalink($aPart1));
							//$title = get_the_title($aPart1);
							//echo '<li class="country_title">'.$title.'</li>';
							wtg_return_ski($aPart1);
						}
						echo '</ul>';
						echo '<ul>';
						foreach($mParts[1] as $aPart2){
							$link = wtg_esc_url(get_permalink($aPart2));
							//$title = get_the_title($aPart2);
							//echo '<li class="country_title">'.$title.'</li>';
							wtg_return_ski($aPart2);
						}
						echo '</ul>';
						echo '<ul>';
						foreach($mParts[2] as $aPart3){
							$link = wtg_esc_url(get_permalink($aPart3));
							//$title = get_the_title($aPart3);
							//echo '<li class="country_title">'.$title.'</li>';
							wtg_return_ski($aPart3);
						}
						echo '</ul>';
						echo '<ul>';
						foreach($mParts[3] as $aPart4){
							$link = wtg_esc_url(get_permalink($aPart4));
							//$title = get_the_title($aPart4);
							//echo '<li class="country_title">'.$title.'</li>';
							wtg_return_ski($aPart4);
						}
						echo '</ul>';
						
						
						
						wp_reset_query();
                        echo'<div class="icon">
                            <a href="javascript:void(0);" class="trigger-continent">
                                <img src="'.get_template_directory_uri() .'/images/arrow_down.png">
                            </a>
                        </div>
                    </div>
                </div>

                <div id="p-s" class="tab-pane fade">
                    <div class="topnav" id="myTopnav">
                        <ul class="options_name">
                            <li><a href="#">'.$selectYourCountry.'</a>
                            </li>
                        </ul>';
						$presults = array();
                        $pargs = array(
							'post_type'             => 'guides',
							'posts_per_page' 		=> -1,
							'order' 		=> 'ASC',
							'orderby'       => 'title',
							'tax_query'             => array(
								array(
											  'taxonomy' => 'wtg_guide_type',
											  'field'    => 'slug',
											  'terms'    => 'region',
											 
								),
							),
						);
						$postsQuery = new WP_Query($pargs);
				
						if($postsQuery->have_posts()):
							while ($postsQuery->have_posts()):$postsQuery->the_post();
								$pID = get_the_ID();
								$link = wtg_esc_url(get_permalink($pID));
								$title = get_the_title($pID);
								if (substr( $title, 0, 1 ) === "P"){
									//echo '<li class="country_title">'.$title.'</li>';
									array_push($presults, $pID);
								} else if(substr( $title, 0, 1 ) === "Q"){
									//echo '<li class="country_title">'.$title.'</li>';
									array_push($presults, $pID);
								} else if(substr( $title, 0, 1 ) === "R"){
									//echo '<li class="country_title">'.$title.'</li>';
									array_push($presults, $pID);
								} else if(substr( $title, 0, 1 ) === "S"){
									//echo '<li class="country_title">'.$title.'</li>';
									array_push($presults, $pID);
								}
								
								
							endwhile;
						endif;
						
						$pParts = partition($presults, 4);
						echo '<ul>';
						foreach($pParts[0] as $aPart1){
							$link = wtg_esc_url(get_permalink($aPart1));
							//$title = get_the_title($aPart1);
							//echo '<li class="country_title">'.$title.'</li>';
							wtg_return_ski($aPart1);
						}
						echo '</ul>';
						echo '<ul>';
						foreach($pParts[1] as $aPart2){
							$link = wtg_esc_url(get_permalink($aPart2));
							//$title = get_the_title($aPart2);
							//echo '<li class="country_title">'.$title.'</li>';
							wtg_return_ski($aPart2);
						}
						echo '</ul>';
						echo '<ul>';
						foreach($pParts[2] as $aPart3){
							$link = wtg_esc_url(get_permalink($aPart3));
							//$title = get_the_title($aPart3);
							//echo '<li class="country_title">'.$title.'</li>';
							wtg_return_ski($aPart3);
						}
						echo '</ul>';
						echo '<ul>';
						foreach($pParts[3] as $aPart4){
							$link = wtg_esc_url(get_permalink($aPart4));
							//$title = get_the_title($aPart4);
							//echo '<li class="country_title">'.$title.'</li>';
							wtg_return_ski($aPart4);
						}
						echo '</ul>';
						
						
						
						wp_reset_query();
                        echo'<div class="icon">
                            <a href="javascript:void(0);" class="trigger-continent">
                                <img src="'.get_template_directory_uri() .'/images/arrow_down.png">
                            </a>
                        </div>
                    </div>
                </div>

                <div id="t-v" class="tab-pane fade">
                    <div class="topnav" id="myTopnav">
                        <ul class="options_name">
                            <li><a href="#">'.$selectYourCountry.'</a>
                            </li>
                        </ul>';
						$tresults = array();
                        $targs = array(
							'post_type'             => 'guides',
							'posts_per_page' 		=> -1,
							'order' 		=> 'ASC',
							'orderby'       => 'title',
							'tax_query'             => array(
								array(
											  'taxonomy' => 'wtg_guide_type',
											  'field'    => 'slug',
											  'terms'    => 'region',
											 
								),
							),
						);
						$postsQuery = new WP_Query($targs);
			
						if($postsQuery->have_posts()):
							while ($postsQuery->have_posts()):$postsQuery->the_post();
								$pID = get_the_ID();
								$link = wtg_esc_url(get_permalink($pID));
								$title = get_the_title($pID);
								if (substr( $title, 0, 1 ) === "T"){
									//echo '<li class="country_title">'.$title.'</li>';
									array_push($tresults, $pID);
								} else if(substr( $title, 0, 1 ) === "U"){
									//echo '<li class="country_title">'.$title.'</li>';
									array_push($tresults, $pID);
								} else if(substr( $title, 0, 1 ) === "V"){
									//echo '<li class="country_title">'.$title.'</li>';
									array_push($tresults, $pID);
								} 
								
								
							endwhile;
						endif;
						
						$tParts = partition($tresults, 4);
						echo '<ul>';
						foreach($tParts[0] as $aPart1){
							$link = wtg_esc_url(get_permalink($aPart1));
							//$title = get_the_title($aPart1);
							//echo '<li class="country_title">'.$title.'</li>';
							wtg_return_ski($aPart1);
						}
						echo '</ul>';
						echo '<ul>';
						foreach($tParts[1] as $aPart2){
							$link = wtg_esc_url(get_permalink($aPart2));
							//$title = get_the_title($aPart2);
							//echo '<li class="country_title">'.$title.'</li>';
							wtg_return_ski($aPart2);
						}
						echo '</ul>';
						echo '<ul>';
						foreach($tParts[2] as $aPart3){
							$link = wtg_esc_url(get_permalink($aPart3));
							//$title = get_the_title($aPart3);
							//echo '<li class="country_title">'.$title.'</li>';
							wtg_return_ski($aPart3);
						}
						echo '</ul>';
						echo '<ul>';
						foreach($tParts[3] as $aPart4){
							$link = wtg_esc_url(get_permalink($aPart4));
							//$title = get_the_title($aPart4);
							//echo '<li class="country_title">'.$title.'</li>';
							wtg_return_ski($aPart4);
						}
						echo '</ul>';
						
						
						
						wp_reset_query();
                        echo'<div class="icon">
                            <a href="javascript:void(0);" class="trigger-continent">
                                <img src="'.get_template_directory_uri() .'/images/arrow_down.png">
                            </a>
                        </div>
                    </div>
                </div>

                <div id="w-z" class="tab-pane fade">
                    <div class="topnav" id="myTopnav">
                        <ul class="options_name">
                            <li><a href="#">'.$selectYourCountry.'</a>
                            </li>
                        </ul>';
						$wresults = array();
                        $wargs = array(
							'post_type'             => 'guides',
							'posts_per_page' 		=> -1,
							'order' 		=> 'ASC',
							'orderby'       => 'title',
							'tax_query'             => array(
								array(
											  'taxonomy' => 'wtg_guide_type',
											  'field'    => 'slug',
											  'terms'    => 'region',
											 
								),
							),
						);
						$postsQuery = new WP_Query($wargs);
			
						if($postsQuery->have_posts()):
							while ($postsQuery->have_posts()):$postsQuery->the_post();
								$pID = get_the_ID();
								$link = wtg_esc_url(get_permalink($pID));
								$title = get_the_title($pID);
								if (substr( $title, 0, 1 ) === "W"){
									//echo '<li class="country_title">'.$title.'</li>';
									array_push($wresults, $pID);
								} else if(substr( $title, 0, 1 ) === "X"){
									//echo '<li class="country_title">'.$title.'</li>';
									array_push($wresults, $pID);
								} else if(substr( $title, 0, 1 ) === "Y"){
									//echo '<li class="country_title">'.$title.'</li>';
									array_push($wresults, $pID);
								} else if(substr( $title, 0, 1 ) === "Z"){
									//echo '<li class="country_title">'.$title.'</li>';
									array_push($wresults, $pID);
								}
								
								
							endwhile;
						endif;
						
						$wParts = partition($wresults, 4);
						echo '<ul>';
						foreach($wParts[0] as $aPart1){
							$link = wtg_esc_url(get_permalink($aPart1));
							//$title = get_the_title($aPart1);
							//echo '<li class="country_title">'.$title.'</li>';
							wtg_return_ski($aPart1);
						}
						echo '</ul>';
						echo '<ul>';
						foreach($wParts[1] as $aPart2){
							$link = wtg_esc_url(get_permalink($aPart2));
							//$title = get_the_title($aPart2);
							//echo '<li class="country_title">'.$title.'</li>';
							wtg_return_ski($aPart2);
						}
						echo '</ul>';
						echo '<ul>';
						foreach($wParts[2] as $aPart3){
							$link = wtg_esc_url(get_permalink($aPart3));
							//$title = get_the_title($aPart3);
							//echo '<li class="country_title">'.$title.'</li>';
							wtg_return_ski($aPart3);
						}
						echo '</ul>';
						echo '<ul>';
						foreach($wParts[3] as $aPart4){
							$link = wtg_esc_url(get_permalink($aPart4));
							//$title = get_the_title($aPart4);
							//echo '<li class="country_title">'.$title.'</li>';
							wtg_return_ski($aPart4);
						}
						echo '</ul>';
						
						
						
						wp_reset_query();
                        echo'<div class="icon">
                            <a href="javascript:void(0);" class="trigger-continent">
                                <img src="'.get_template_directory_uri() .'/images/arrow_down.png">
                            </a>
                        </div>
                    </div>
                </div>


            </div>
        </div>



    </div>';
}
function wtg_countryby_continent()
{

	$language = get_field('language','options');
	switch ($language)
	{
	case 'en':
		$countryByContinent = 'Select your country, state or region by continent';
		$findYourContinent = 'Select your country, state or region by continent';
		$findYourCity = 'Find your city from the list of countries below';
		$findYourCountry = 'Find your country';
		$selectYourCity = 'Select your city';
		$selectYourCountry = 'Select your country';
		break;

	case 'de':
		$countryByContinent = 'Länder nach Kontinent auswählen';
		$findYourContinent = 'Wählen Sie ein Kontinent';
		$findYourCity = 'Finden Sie Ihre Stadt über die Länderliste.';
		$findYourCountry = 'Wählen Sie ein Land aus';
		$selectYourCity = 'Wählen Sie eine Stadt aus';
		$selectYourCountry ='Wählen Sie ein Land aus';
		break;
	}
	
	$continents = get_terms( array(
		'taxonomy' => 'wtg_continent',
		'hide_empty' => false,
	) );
	echo '<div class="select_country">
			<div class="container">
				<h3 class="with_arrow">'.$countryByContinent.'</h3>
				<i class="icon with_arrow"></i>
				<ul class="nav nav-tabs country_title">
					<li class="options_name"><a data-toggle="tab" href="#">'.$findYourContinent.'</a></li>';
			$count = 0;
			$continentQV = get_query_var('wtg_continent');
			foreach($continents as $continent){
				$active = '';
				if ($continentQV){
					if($continentQV == $continent->slug){
						echo '<li class="active '.$continent->slug.'"><a data-toggle="tab" href="#'.$continent->slug.'">'.$continent->name.'</a></li>';
					} else {
						echo '<li class="'.$continent->slug.'"><a data-toggle="tab" href="#'.$continent->slug.'">'.$continent->name.'</a></li>';
					}
				}else {
					if($count == 0){$active = 'active';}
					echo '<li class="'.$active.' '.$continent->slug.'"><a data-toggle="tab" href="#'.$continent->slug.'">'.$continent->name.'</a></li>';
					$count++;
				}
				
				
			}
			echo '</ul>';
			
	echo '<div class="tab-content">';
			$count2 = 0;
			foreach($continents as $continent){
				$active2 = '';
				if ($continentQV){
					if($continentQV == $continent->slug){
						echo  '<div id="'.$continent->slug.'" class="tab-pane fade in active">';
					} else {
						echo  '<div id="'.$continent->slug.'" class="tab-pane fade in">';
					}
				} else {
					if($count2 == 0){$active2 = 'active';}
					echo  '<div id="'.$continent->slug.'" class="tab-pane fade in '.$active2.'">';
					$count2++;
				}
				
				echo'		<div class="topnav" id="myTopnav">
							<ul class="options_name">
								<li><a href="#">'.$selectYourCountry.'</a>
								</li>
							</ul>
                     ';
						$cargs = array(
							'post_type'             => 'guides',
							'posts_per_page' 		=> -1,
							'order' 		=> 'ASC',
							'orderby'       => 'title',
							'tax_query'             => array(
								array(
											  'taxonomy' => 'wtg_continent',
											  'field'    => 'slug',
											  'terms'    => $continent->slug,
											 
								),
								array(
											  'taxonomy' => 'wtg_guide_type',
											  'field'    => 'slug',
											  'terms'    => 'region',
											 
								),
							),
						);
						$postsQuery = new WP_Query($cargs);
						$aresults = array();

						if($postsQuery->have_posts()):
							while ($postsQuery->have_posts()):$postsQuery->the_post();
								$pID = get_the_ID();
								array_push($aresults, $pID);
								
							endwhile;
						endif;
						
						
						$aParts = partition($aresults, 4);
						echo '<ul>';
						foreach($aParts[0] as $aPart1){
							$link = wtg_esc_url(get_permalink($aPart1));
							$title = get_the_title($aPart1);
							echo '<li><a href="'.$link.'">'.$title.'</a></li>';
							
						}
						echo '</ul>';
						echo '<ul>';
						foreach($aParts[1] as $aPart2){
							$link = wtg_esc_url(get_permalink($aPart2));
							$title = get_the_title($aPart2);
							echo '<li><a href="'.$link.'">'.$title.'</a></li>';
						}
						echo '</ul>';
						echo '<ul>';
						foreach($aParts[2] as $aPart3){
							$link = wtg_esc_url(get_permalink($aPart3));
							$title = get_the_title($aPart3);
							echo '<li><a href="'.$link.'">'.$title.'</a></li>';
						}
						echo '</ul>';
						echo '<ul>';
						foreach($aParts[3] as $aPart4){
							$link = wtg_esc_url(get_permalink($aPart4));
							$title = get_the_title($aPart4);
							echo '<li><a href="'.$link.'">'.$title.'</a></li>';
						}
						echo '</ul>';
						
						
						
						wp_reset_query();
				echo '<div class="icon">
                            <a href="javascript:void(0);" class="trigger-continent">
                                <img src="'.get_template_directory_uri() .'/images/arrow_down.png">
                            </a>
                        </div>
				</div>
				</div>';
				
			
			}	
			
	echo '</div>';
	echo '</div>';
	echo '</div>';
	
	//var_dump($continents);
}


function wtg_countryby_contient_db()
{
	
	global $wpdb;
	echo '<h2 style="display:none">wtg_countryby_contient_db</h2>';
//	$language  = get_field('language','options');
	$language = 'en';
	switch ($language)
	{
	case 'en':
		$countryByContinent = 'Select your country, state or region by continent';
		$findYourContinent = 'Select your country, state or region by continent';
		$findYourCity = 'Find your city from the list of countries below';
		$findYourCountry = 'Find your country';
		$selectYourCity = 'Select your city';
		$selectYourCountry = 'Select your country';
		break;

	case 'de':
		$countryByContinent = 'Länder nach Kontinent auswählen';
		$findYourContinent = 'Wählen Sie ein Kontinent';
		$findYourCity = 'Finden Sie Ihre Stadt über die Länderliste.';
		$findYourCountry = 'Wählen Sie ein Land aus';
		$selectYourCity = 'Wählen Sie eine Stadt aus';
		$selectYourCountry ='Wählen Sie ein Land aus';
		break;
	}	
	
	echo '
	<style>
		ul.menu-columns 
		{
    		-webkit-column-count: 4; /* Chrome, Safari, Opera */
    		-moz-column-count: 4; /* Firefox */
    		column-count: 4;
			width:100%;
			float:none;
			
		}

		@media (max-width: 767px)
		{
			ul.menu-columns 
			{
			-webkit-column-count: 2; /* Chrome, Safari, Opera */
    		-moz-column-count: 2; /* Firefox */
    		column-count: 2;
			width:100%;
			float:none;
			}
		}

		@media (max-width: 569px)
		{
			ul.menu-columns 
			{
			-webkit-column-count: 1; /* Chrome, Safari, Opera */
    		-moz-column-count: 1; /* Firefox */
    		column-count: 1;
			width:100%;
			float:none;
			}
		}


	</style>';

$regions = $wpdb->get_results( 
	"
	SELECT *
	FROM wtg_regions
	WHERE 1
	ORDER BY WP_Continent, Title ASC
	"
);



		$continents = get_terms( array(
		'taxonomy' => 'wtg_continent',
		'hide_empty' => false,
	) );
	echo '<div class="select_country">
			<div class="container">
				<h3 class="with_arrow">'.$findYourContinent.'</h3>
				<i class="icon with_arrow"></i>
				<ul class="nav nav-tabs country_title">
					<li class="options_name"><a data-toggle="tab" href="#">'.$findYourContinent.'</a></li>';
			$count = 0;
			$continentQV = get_query_var('wtg_continent');
			foreach($continents as $continent){
				$active = '';
				if ($continentQV){
					if($continentQV == $continent->slug){
						echo '<li class="active '.$continent->slug.'"><a data-toggle="tab" href="#'.$continent->slug.'">'.$continent->name.'</a></li>';
					} else {
						echo '<li class="'.$continent->slug.'"><a data-toggle="tab" href="#'.$continent->slug.'">'.$continent->name.'</a></li>';
					}
				}else {
					if($count == 0){$active = 'active';}
					echo '<li class="'.$active.' '.$continent->slug.'"><a data-toggle="tab" href="#'.$continent->slug.'">'.$continent->name.'</a></li>';
					$count++;
				}
				
				
			}
			echo '</ul>';



		
	echo '<div class="tab-content">';
			$count2 = 0;
			foreach($continents as $continent){
				$active2 = '';
				if ($continentQV){
					if($continentQV == $continent->slug){
						echo  '<div id="'.$continent->slug.'" class="tab-pane fade in active">';
					} else {
						echo  '<div id="'.$continent->slug.'" class="tab-pane fade in">';
					}
				} else {
					if($count2 == 0){$active2 = 'active';}
					echo  '<div id="'.$continent->slug.'" class="tab-pane fade in '.$active2.'">';
					$count2++;
				}
			
				echo'		<div class="topnav" id="myTopnav">
							<ul class="options_name">
								<li><a href="#">Select your country</a>
								</li>
							</ul>
                     ';

echo '<ul class="menu-columns">';

foreach ($regions as $region)
{
		if ($region->WP_Continent == $continent->term_id) 
		{
			echo '<li><a href="'.$region->Link.'">'.$region->Title.'</a></li>';
		}
}
echo '</ul>';					
						
						
				echo '<div class="icon">
                            <a href="javascript:void(0);" class="trigger-continent">
                                <img src="'.get_template_directory_uri() .'/images/arrow_down.png">
                            </a>
                        </div>
				</div>
				</div>';
				
			
			}	
			
	echo '</div>';
	echo '</div>';
	echo '</div>';
}



function wtg_passvisaby_continent()
{
	
	$language = 	get_field('language','options');
	switch ($language)
	{
	case 'en':
		$visaByContinent = 'Find passport information about your country by continent';
		$findYourContinent = 'Select your country, state or region by continent';
		$findYourCity = 'Find your city from the list of countries below';
		$findYourCountry = 'Find your country';
		$selectYourCity = 'Select your city';
		$selectYourCountry = 'Select your country';
		break;

	case 'de':
		$visaByContinent = 'Reisepass & Visum von A-Z';
		$findYourContinent = 'Wählen Sie ein Kontinent';
		$findYourCity = 'Finden Sie Ihre Stadt über die Länderliste.';
		$findYourCountry = 'Wählen Sie ein Land aus';
		$selectYourCity = 'Wählen Sie eine Stadt aus';
		$selectYourCountry ='Wählen Sie ein Land aus';
		break;
	}	

	$continents = get_terms( array(
		'taxonomy' => 'wtg_continent',
		'hide_empty' => false,
	) );
	echo '<div class="select_country">
			<div class="container">
				<h3 class="with_arrow">'.$visaByContinent.'</h3>
				<i class="icon with_arrow"></i>
				<ul class="nav nav-tabs country_title">
					<li class="options_name"><a data-toggle="tab" href="#">'.$findYourContinent.'</a></li>';
			$count = 0;
			$continentQV = get_query_var('wtg_continent');
			foreach($continents as $continent){
				$active = '';
				if ($continentQV){
					if($continentQV == $continent->slug){
						echo '<li class="active '.$continent->slug.'"><a data-toggle="tab" href="#'.$continent->slug.'">'.$continent->name.'</a></li>';
					} else {
						echo '<li class="'.$continent->slug.'"><a data-toggle="tab" href="#'.$continent->slug.'">'.$continent->name.'</a></li>';
					}
				}else {
					if($count == 0){$active = 'active';}
					echo '<li class="'.$active.' '.$continent->slug.'"><a data-toggle="tab" href="#'.$continent->slug.'">'.$continent->name.'</a></li>';
					$count++;
				}
				
				
			}
			echo '</ul>';
			
	echo '<div class="tab-content">';
			$count2 = 0;
			foreach($continents as $continent){
				$active2 = '';
				if ($continentQV){
					if($continentQV == $continent->slug){
						echo  '<div id="'.$continent->slug.'" class="tab-pane fade in active">';
					} else {
						echo  '<div id="'.$continent->slug.'" class="tab-pane fade in">';
					}
				} else {
					if($count2 == 0){$active2 = 'active';}
					echo  '<div id="'.$continent->slug.'" class="tab-pane fade in '.$active2.'">';
					$count2++;
				}
				
				echo'		<div class="topnav" id="myTopnav">
							<ul class="options_name">
								<li><a href="#">'.$selectYourCountry.'</a>
								</li>
							</ul>
                     ';
						$cargs = array(
							'post_type'             => 'guides',
							'posts_per_page' 		=> -1,
							'order' 		=> 'ASC',
							'orderby'       => 'title',
							'tax_query'             => array(
								array(
											  'taxonomy' => 'wtg_continent',
											  'field'    => 'slug',
											  'terms'    => $continent->slug,
											 
								),
								array(
											  'taxonomy' => 'wtg_guide_type',
											  'field'    => 'slug',
											  'terms'    => 'region',
											 
								),
							),
						);
						$postsQuery = new WP_Query($cargs);
						$aresults = array();

						if($postsQuery->have_posts()):
							while ($postsQuery->have_posts()):$postsQuery->the_post();
								$pID = get_the_ID();
								array_push($aresults, $pID);
								
							endwhile;
						endif;
						
						
						$aParts = partition($aresults, 4);
						echo '<ul>';
						foreach($aParts[0] as $aPart1){
							$link = wtg_esc_url(get_permalink($aPart1) . 'passport-visa');
							$title = get_the_title($aPart1);
							echo '<li><a href="'.$link.'">'.$title.'</a></li>';
							
						}
						echo '</ul>';
						echo '<ul>';
						foreach($aParts[1] as $aPart2){
							$link = wtg_esc_url(get_permalink($aPart2) . 'passport-visa');
							$title = get_the_title($aPart2);
							echo '<li><a href="'.$link.'">'.$title.'</a></li>';
						}
						echo '</ul>';
						echo '<ul>';
						foreach($aParts[2] as $aPart3){
							$link = wtg_esc_url(get_permalink($aPart3) . 'passport-visa');
							$title = get_the_title($aPart3);
							echo '<li><a href="'.$link.'">'.$title.'</a></li>';
						}
						echo '</ul>';
						echo '<ul>';
						foreach($aParts[3] as $aPart4){
							$link = wtg_esc_url(get_permalink($aPart4) . 'passport-visa');
							$title = get_the_title($aPart4);
							echo '<li><a href="'.$link.'">'.$title.'</a></li>';
						}
						echo '</ul>';
						
						
						
						wp_reset_query();
				echo '<div class="icon">
                            <a href="javascript:void(0);" class="trigger-continent">
                                <img src="'.get_template_directory_uri() .'/images/arrow_down.png">
                            </a>
                        </div>
				</div>
				</div>';
				
			
			}	
			
	echo '</div>';
	echo '</div>';
	echo '</div>';
	
	//var_dump($continents);
}






function wtg_publicholsby_continent()
{
	$continents = get_terms( array(
		'taxonomy' => 'wtg_continent',
		'hide_empty' => false,
	) );
	echo '<div class="select_country">
			<div class="container">
				<h3 class="with_arrow">Select your country, state or region by continent</h3>
				<i class="icon with_arrow"></i>
				<ul class="nav nav-tabs country_title">
					<li class="options_name"><a data-toggle="tab" href="#">Find your continent</a></li>';
			$count = 0;
			$continentQV = get_query_var('wtg_continent');
			foreach($continents as $continent){
				$active = '';
				if ($continentQV){
					if($continentQV == $continent->slug){
						echo '<li class="active '.$continent->slug.'"><a data-toggle="tab" href="#'.$continent->slug.'">'.$continent->name.'</a></li>';
					} else {
						echo '<li class="'.$continent->slug.'"><a data-toggle="tab" href="#'.$continent->slug.'">'.$continent->name.'</a></li>';
					}
				}else {
					if($count == 0){$active = 'active';}
					echo '<li class="'.$active.' '.$continent->slug.'"><a data-toggle="tab" href="#'.$continent->slug.'">'.$continent->name.'</a></li>';
					$count++;
				}
				
				
			}
			echo '</ul>';
			
	echo '<div class="tab-content">';
			$count2 = 0;
			foreach($continents as $continent){
				$active2 = '';
				if ($continentQV){
					if($continentQV == $continent->slug){
						echo  '<div id="'.$continent->slug.'" class="tab-pane fade in active">';
					} else {
						echo  '<div id="'.$continent->slug.'" class="tab-pane fade in">';
					}
				} else {
					if($count2 == 0){$active2 = 'active';}
					echo  '<div id="'.$continent->slug.'" class="tab-pane fade in '.$active2.'">';
					$count2++;
				}
				
				echo'		<div class="topnav" id="myTopnav">
							<ul class="options_name">
								<li><a href="#">Select your country</a>
								</li>
							</ul>
                     ';
						$cargs = array(
							'post_type'             => 'guides',
							'posts_per_page' 		=> -1,
							'order' 		=> 'ASC',
							'orderby'       => 'title',
							'tax_query'             => array(
								array(
											  'taxonomy' => 'wtg_continent',
											  'field'    => 'slug',
											  'terms'    => $continent->slug,
											 
								),
								array(
											  'taxonomy' => 'wtg_guide_type',
											  'field'    => 'slug',
											  'terms'    => 'region',
											 
								),
							),
						);
						$postsQuery = new WP_Query($cargs);
						$aresults = array();

						if($postsQuery->have_posts()):
							while ($postsQuery->have_posts()):$postsQuery->the_post();
								$pID = get_the_ID();
								array_push($aresults, $pID);
								
							endwhile;
						endif;
						
						
						$aParts = partition($aresults, 4);
						echo '<ul>';
						foreach($aParts[0] as $aPart1){
							$link = wtg_esc_url(get_permalink($aPart1) . 'public-holidays');
							$title = get_the_title($aPart1);
							echo '<li><a href="'.$link.'">'.$title.'</a></li>';
							
						}
						echo '</ul>';
						echo '<ul>';
						foreach($aParts[1] as $aPart2){
							$link = wtg_esc_url(get_permalink($aPart2) . 'public-holidays');
							$title = get_the_title($aPart2);
							echo '<li><a href="'.$link.'">'.$title.'</a></li>';
						}
						echo '</ul>';
						echo '<ul>';
						foreach($aParts[2] as $aPart3){
							$link = wtg_esc_url(get_permalink($aPart3) . 'public-holidays');
							$title = get_the_title($aPart3);
							echo '<li><a href="'.$link.'">'.$title.'</a></li>';
						}
						echo '</ul>';
						echo '<ul>';
						foreach($aParts[3] as $aPart4){
							$link = wtg_esc_url(get_permalink($aPart4) . 'public-holidays');
							$title = get_the_title($aPart4);
							echo '<li><a href="'.$link.'">'.$title.'</a></li>';
						}
						echo '</ul>';
						
						
						
						wp_reset_query();
				echo '<div class="icon">
                            <a href="javascript:void(0);" class="trigger-continent">
                                <img src="'.get_template_directory_uri() .'/images/arrow_down.png">
                            </a>
                        </div>
				</div>
				</div>';
				
			
			}	
			
	echo '</div>';
	echo '</div>';
	echo '</div>';
	
	//var_dump($continents);
}

function wtg_city_db()
{
	
		$continents = get_terms( array(
		'taxonomy' => 'wtg_continent',
		'hide_empty' => false,
	) );
	echo '<div class="select_country">
			<div class="container">
				<h3 class="with_arrow">Select your country, state or region by continent</h3>
				<i class="icon with_arrow"></i>
				<ul class="nav nav-tabs country_title">
					<li class="options_name"><a data-toggle="tab" href="#">Find your continent</a></li>';
			$count = 0;
			$continentQV = get_query_var('wtg_continent');
			foreach($continents as $continent){
				$active = '';
				if ($continentQV){
					if($continentQV == $continent->slug){
						echo '<li class="active '.$continent->slug.'"><a data-toggle="tab" href="#'.$continent->slug.'">'.$continent->name.'</a></li>';
					} else {
						echo '<li class="'.$continent->slug.'"><a data-toggle="tab" href="#'.$continent->slug.'">'.$continent->name.'</a></li>';
					}
				}else {
					if($count == 0){$active = 'active';}
					echo '<li class="'.$active.' '.$continent->slug.'"><a data-toggle="tab" href="#'.$continent->slug.'">'.$continent->name.'</a></li>';
					$count++;
				}
				
				
			}
			echo '</ul>';

	// echo 'We are having cities!';
			$count2 = 0;
			foreach($continents as $continent){
				$active2 = '';
				if ($continentQV){
					if($continentQV == $continent->slug){
						echo  '<div id="'.$continent->slug.'" class="tab-pane fade in active">';
					} else {
						echo  '<div id="'.$continent->slug.'" class="tab-pane fade in">';
					}
				} else {
					if($count2 == 0){$active2 = 'active';}
					echo  '<div id="'.$continent->slug.'" class="tab-pane fade in '.$active2.'">';
					$count2++;
				}
				
				echo'		<div class="topnav" id="myTopnav">
							<ul class="options_name">
								<li><a href="#">Select your country</a>
								</li>
							</ul>
                     ';
						$cargs = array(
							'post_type'             => 'guides',
							'posts_per_page' 		=> -1,
							'order' 		=> 'ASC',
							'orderby'       => 'title',
							'tax_query'             => array(
								array(
											  'taxonomy' => 'wtg_continent',
											  'field'    => 'slug',
											  'terms'    => $continent->slug,
											 
								),
								array(
											  'taxonomy' => 'wtg_guide_type',
											  'field'    => 'slug',
											  'terms'    => 'city',
											 
								),
							),
						);
						$postsQuery = new WP_Query($cargs);
						$aresults = array();

						if($postsQuery->have_posts()):
							while ($postsQuery->have_posts()):$postsQuery->the_post();
								$pID = get_the_ID();
								array_push($aresults, $pID);
								
							endwhile;
						endif;
						
						
						$aParts = partition($aresults, 4);
						echo '<ul>';
						foreach($aParts[0] as $aPart1){
							$link = wtg_esc_url(get_permalink($aPart1));
							$title = get_the_title($aPart1);
							echo '<li><a href="'.$link.'">'.$title.'</a></li>';
							
						}
						echo '</ul>';
						echo '<ul>';
						foreach($aParts[1] as $aPart2){
							$link = wtg_esc_url(get_permalink($aPart2));
							$title = get_the_title($aPart2);
							echo '<li><a href="'.$link.'">'.$title.'</a></li>';
						}
						echo '</ul>';
						echo '<ul>';
						foreach($aParts[2] as $aPart3){
							$link = wtg_esc_url(get_permalink($aPart3));
							$title = get_the_title($aPart3);
							echo '<li><a href="'.$link.'">'.$title.'</a></li>';
						}
						echo '</ul>';
						echo '<ul>';
						foreach($aParts[3] as $aPart4){
							$link = wtg_esc_url(get_permalink($aPart4));
							$title = get_the_title($aPart4);
							echo '<li><a href="'.$link.'">'.$title.'</a></li>';
						}
						echo '</ul>';
						
						
						
						wp_reset_query();
				echo '<div class="icon">
                            <a href="javascript:void(0);" class="trigger-continent">
                                <img src="'.get_template_directory_uri() .'/images/arrow_down.png">
                            </a>
                        </div>
				</div>
				</div>';
				
			
			}	
			
	echo '</div>';
	echo '</div>';
	echo '</div>';
	
}


?>
