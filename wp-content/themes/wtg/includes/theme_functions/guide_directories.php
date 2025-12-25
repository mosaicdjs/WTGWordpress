<?php
function wtg_regions_az_new()
{
	global $wpdb;
	$regions = $wpdb->get_results("SELECT * FROM wtg_regions ORDER BY Title ASC");
	$firstLetter = 'A';
	$newRow = $false;
    echo '
	<style> .firstLetter {padding-top:10px; padding-bottom:10px; font-size:80px; line-height: 80px;} </style>
	<div class="container box_list">
        <h2><i class="icon icon_1"></i>Regions, Countries & States</h2>';   
        wtg_az_select();
		echo '
		<div class="row"><div class="col-lg-2 col-xs-6 firstLetter">A  <a href="#" class="firstLetterSearch">
		<img alt="" src="'.get_template_directory_uri().'/images/search_icon_large_black.png">
		</a>
</div>';

    foreach ($regions as $region)
	{
		if ($region->Title[0] != $firstLetter) 
		{
			echo '</div><div id="'.$region->Title[0].'" class="row"><div class="col-lg-2 col-xs-6 firstLetter">'.$region->Title[0].
			'<a href="#A-Z"><img src="'.get_template_directory_uri().'/images/left_sidbar_arrow_up_blue.png"></a>
			
			<a href="#" class="firstLetterSearch">
		<img alt="" src="'.get_template_directory_uri().'/images/search_icon_large_black.png">
		</a>
			</div>'; $firstLetter = $region->Title[0];
		}
		echo '<div class="col-lg-2 col-xs-6" style="padding-top:10px; padding-bottom:10px; overflow:none">
			<div style="position:relative">
				<a href="'.$region->Link.'"><img src="'.$region->Image.'" width="100%" alt="'.$region->Title.'"></a>

				<div style="background-color:black; opacity:0.3; z-index:10; height:100%; width:100%; position:absolute; top:0; left:0"></div>													
				<div style="z-index:30; height:100%; width:100%; position:absolute; top:0; text-align:center"><a style="color:white" href="'.$region->Link.'"><h3>'.$region->Title.'</h3></a></div>
		</div>
        </div>';
	}	
    echo ' 	
	<span id="X-Z"></span>
	</div>
	</div>';
}

function wtg_cities_az()
{
?>
	<style> .firstLetter {padding-top:10px; padding-bottom:10px; font-size:80px; line-height: 80px;} </style>
	<div class="container box_list">
	<h2><i class="icon icon_1"></i>Cities</h2>
	<h3>Select from A-Z</h3>
	<div id="A-Z" class="row padding-top:10px; padding-bottom:10px">

	<div class="col-lg-1 col-xs-3"><a href="#A"><h2 style="font-size:35px">A</h2></a></div>
	<div class="col-lg-1 col-xs-3"><a href="#B"><h2 style="font-size:35px">B</h2></a></div>
	<div class="col-lg-1 col-xs-3"><a href="#C"><h2 style="font-size:35px">C</h2></a></div>
	<div class="col-lg-1 col-xs-3"><a href="#D"><h2 style="font-size:35px">D</h2></a></div>
	<div class="col-lg-1 col-xs-3"><a href="#E"><h2 style="font-size:35px">E</h2></a></div>
	<div class="col-lg-1 col-xs-3"><a href="#F"><h2 style="font-size:35px">F</h2></a></div>
	<div class="col-lg-1 col-xs-3"><a href="#G"><h2 style="font-size:35px">G</h2></a></div>
	<div class="col-lg-1 col-xs-3"><a href="#H"><h2 style="font-size:35px">H</h2></a></div>
	<div class="col-lg-1 col-xs-3"><a href="#I"><h2 style="font-size:35px">I</h2></a></div>
	<div class="col-lg-1 col-xs-3"><a href="#J"><h2 style="font-size:35px">J</h2></a></div>
	<div class="col-lg-1 col-xs-3"><a href="#K"><h2 style="font-size:35px">K</h2></a></div>
	<div class="col-lg-1 col-xs-3"><a href="#L"><h2 style="font-size:35px">L</h2></a></div>
	<div class="col-lg-1 col-xs-3"><a href="#M"><h2 style="font-size:35px">M</h2></a></div>
	<div class="col-lg-1 col-xs-3"><a href="#N"><h2 style="font-size:35px">N</h2></a></div>
	<div class="col-lg-1 col-xs-3"><a href="#O"><h2 style="font-size:35px">O</h2></a></div>
	<div class="col-lg-1 col-xs-3"><a href="#P"><h2 style="font-size:35px">P</h2></a></div>
	<div class="col-lg-1 col-xs-3"><a href="#Q"><h2 style="font-size:35px">Q</h2></a></div>
	<div class="col-lg-1 col-xs-3"><a href="#R"><h2 style="font-size:35px">R</h2></a></div>
	<div class="col-lg-1 col-xs-3"><a href="#S"><h2 style="font-size:35px">S</h2></a></div>
	<div class="col-lg-1 col-xs-3"><a href="#T"><h2 style="font-size:35px">T</h2></a></div>
	<div class="col-lg-1 col-xs-3"><a href="#U"><h2 style="font-size:35px">U</h2></a></div>
	<div class="col-lg-1 col-xs-3"><a href="#V"><h2 style="font-size:35px">V</h2></a></div>
	<div class="col-lg-1 col-xs-3"><a href="#W"><h2 style="font-size:35px">W</h2></a></div>
	<div class="col-lg-1 col-xs-3"><a href="#X-Z"><h2 style="font-size:35px">X-Z</h2></a></div>
	</div>
	<div class="row">
<?php

	global $wpdb;
	$regions = $wpdb->get_results("SELECT * FROM wtg_cities ORDER BY City_Title ASC");
	$firstLetter = 'A';
	$newRow = $false;
	echo '</div><div class="row"><div class="col-lg-2 col-xs-6 firstLetter">A 
	<a href="#" class="firstLetterSearch">
		<img alt="" src="'.get_template_directory_uri().'/images/search_icon_large_black.png">
		</a>
	</div>';
	foreach ($regions as $region)
	{
		if ($region->City_Title[0] != $firstLetter) 
		{
			echo '</div><div id="'.$region->City_Title[0].'" class="row"><div class="col-lg-2 col-xs-6 firstLetter">'.$region->City_Title[0].
			'<a href="#A-Z"><img src="'.get_template_directory_uri().'/images/left_sidbar_arrow_up_blue.png"></a>
			<a href="#" class="firstLetterSearch">
		<img alt="" src="'.get_template_directory_uri().'/images/search_icon_large_black.png">
		</a></div>'; $firstLetter = $region->City_Title[0];
		}
		//$firstID = get_gallery_attachments($region->WP_ID,'home_carousel')[0];
		//$postImageURL = wp_get_attachment_image_src($firstID, 'listingGallery')[0]; ?>
		<div class="col-lg-2 col-xs-6" style="padding-top:10px; padding-bottom:10px; overflow:none">
		<div style="position:relative">
				<a href="<?php echo $region->City_Link; ?>"><img src="<?php  echo $region->City_Image; ?>" width="100%" alt="<?php echo $region->City_Title; ?>"></a>
				<div style="background-color:black; opacity:0.3; z-index:10; height:100%; width:100%; position:absolute; top:0; left:0"></div>													
				<div style="z-index:30; height:100%; width:100%; position:absolute; top:0; text-align:center"><a style="color:white" href="<?php echo $region->City_Link; ?>"><h3><?php echo $region->City_Title ?></h3></a></div>
		</div>
		</div>
	<?php 
	} 	
echo '
<span id="X-Z"></span>
	</div>
	</div>';
}


function wtg_airports_az()
{
?>
	<style> .firstLetter {padding-top:20px; padding-bottom:20px; font-size:80px; line-height: 80px;} </style>
	<div class="container box_list">
	<h2><i class="icon icon_1"></i>Airports</h2>
	<h3>Select from A-Z</h3>
	<div id="A-Z" class="row padding-top:20px; padding-bottom:20px">
	<div class="col-lg-1"><a href="#A"><h2 style="font-size:35px">A</h2></a></div>
	<div class="col-lg-1"><a href="#B"><h2 style="font-size:35px">B</h2></a></div>
	<div class="col-lg-1"><a href="#C"><h2 style="font-size:35px">C</h2></a></div>
	<div class="col-lg-1"><a href="#D"><h2 style="font-size:35px">D</h2></a></div>
	<div class="col-lg-1"><a href="#E"><h2 style="font-size:35px">E</h2></a></div>
	<div class="col-lg-1"><a href="#F"><h2 style="font-size:35px">F</h2></a></div>
	<div class="col-lg-1"><a href="#G"><h2 style="font-size:35px">G</h2></a></div>
	<div class="col-lg-1"><a href="#H"><h2 style="font-size:35px">H</h2></a></div>
	<div class="col-lg-1"><a href="#I"><h2 style="font-size:35px">I</h2></a></div>
	<div class="col-lg-1"><a href="#J"><h2 style="font-size:35px">J</h2></a></div>
	<div class="col-lg-1"><a href="#K"><h2 style="font-size:35px">K</h2></a></div>
	<div class="col-lg-1"><a href="#L"><h2 style="font-size:35px">L</h2></a></div>
	<div class="col-lg-1"><a href="#M"><h2 style="font-size:35px">M</h2></a></div>
	<div class="col-lg-1"><a href="#N"><h2 style="font-size:35px">N</h2></a></div>
	<div class="col-lg-1"><a href="#O"><h2 style="font-size:35px">O</h2></a></div>
	<div class="col-lg-1"><a href="#P"><h2 style="font-size:35px">P</h2></a></div>
	<div class="col-lg-1"><a href="#Q"><h2 style="font-size:35px">Q</h2></a></div>
	<div class="col-lg-1"><a href="#R"><h2 style="font-size:35px">R</h2></a></div>
	<div class="col-lg-1"><a href="#S"><h2 style="font-size:35px">S</h2></a></div>
	<div class="col-lg-1"><a href="#T"><h2 style="font-size:35px">T</h2></a></div>
	<div class="col-lg-1"><a href="#U"><h2 style="font-size:35px">U</h2></a></div>
	<div class="col-lg-1"><a href="#V"><h2 style="font-size:35px">V</h2></a></div>
	<div class="col-lg-1"><a href="#W"><h2 style="font-size:35px">W</h2></a></div>
	<div class="col-lg-1"><a href="#X-Z"><h2 style="font-size:35px">X-Z</h2></a></div>
	</div>

	<div class="row">
<?php

	global $wpdb;
	$regions = $wpdb->get_results("SELECT * FROM wtg_airports ORDER BY Airport_Title ASC");
//	var_dump ($regions);
	$firstLetter = 'A';
	$newRow = $false;
	echo '
	<div class="row">
		<div class="col-lg-12 firstLetter">A <a href="#" class="firstLetterSearch">
		<img alt="" src="'.get_template_directory_uri().'/images/search_icon_large_black.png">
		</a></div>';
		foreach ($regions as $region)
		{
			if ($region->Airport_Title[0] != $firstLetter) 
			{
			echo '</div><div id="'.$region->Airport_Title[0].'" class="row"><div class="col-lg-12 firstLetter">'.$region->Airport_Title[0].
			'<a href="#A-Z"><img src="'.get_template_directory_uri().'/images/left_sidbar_arrow_up_blue.png"></a>
			<a href="#" class="firstLetterSearch">
		<img alt="" src="'.get_template_directory_uri().'/images/search_icon_large_black.png">
		</a></div>'; $firstLetter = $region->Airport_Title[0];
		}
		?>
		<div class="col-lg-6">
				<a href="<?php echo $region->Airport_Link; ?>"><p><?php echo $region->Airport_Title; ?></p></a>
		</div>
	<?php 
	} 	
echo '
<span id="X-Z"></span>
	</div>
	</div>';
}

function wtg_ski_resorts_az()
{
?>
	<style> .firstLetter {padding-top:20px; padding-bottom:20px; font-size:80px; line-height: 80px;} </style>
	<div class="container box_list">
	<h2><i class="icon icon_1"></i>Ski Resorts</h2>
	<h3>Select from A-Z</h3>
	<div id="A-Z" class="row padding-top:20px; padding-bottom:20px">
	<div class="col-lg-1"><a href="#A"><h2 style="font-size:35px">A</h2></a></div>
	<div class="col-lg-1"><a href="#B"><h2 style="font-size:35px">B</h2></a></div>
	<div class="col-lg-1"><a href="#C"><h2 style="font-size:35px">C</h2></a></div>
	<div class="col-lg-1"><a href="#D"><h2 style="font-size:35px">D</h2></a></div>
	<div class="col-lg-1"><a href="#E"><h2 style="font-size:35px">E</h2></a></div>
	<div class="col-lg-1"><a href="#F"><h2 style="font-size:35px">F</h2></a></div>
	<div class="col-lg-1"><a href="#G"><h2 style="font-size:35px">G</h2></a></div>
	<div class="col-lg-1"><a href="#H"><h2 style="font-size:35px">H</h2></a></div>
	<div class="col-lg-1"><a href="#I"><h2 style="font-size:35px">I</h2></a></div>
	<div class="col-lg-1"><a href="#J"><h2 style="font-size:35px">J</h2></a></div>
	<div class="col-lg-1"><a href="#K"><h2 style="font-size:35px">K</h2></a></div>
	<div class="col-lg-1"><a href="#L"><h2 style="font-size:35px">L</h2></a></div>
	<div class="col-lg-1"><a href="#M"><h2 style="font-size:35px">M</h2></a></div>
	<div class="col-lg-1"><a href="#N"><h2 style="font-size:35px">N</h2></a></div>
	<div class="col-lg-1"><a href="#O"><h2 style="font-size:35px">O</h2></a></div>
	<div class="col-lg-1"><a href="#P"><h2 style="font-size:35px">P</h2></a></div>
	<div class="col-lg-1"><a href="#Q"><h2 style="font-size:35px">Q</h2></a></div>
	<div class="col-lg-1"><a href="#R"><h2 style="font-size:35px">R</h2></a></div>
	<div class="col-lg-1"><a href="#S"><h2 style="font-size:35px">S</h2></a></div>
	<div class="col-lg-1"><a href="#T"><h2 style="font-size:35px">T</h2></a></div>
	<div class="col-lg-1"><a href="#U"><h2 style="font-size:35px">U</h2></a></div>
	<div class="col-lg-1"><a href="#V"><h2 style="font-size:35px">V</h2></a></div>
	<div class="col-lg-1"><a href="#W"><h2 style="font-size:35px">W</h2></a></div>
	<div class="col-lg-1"><a href="#X-Z"><h2 style="font-size:35px">X-Z</h2></a></div>
	</div>

	<div class="row">
<?php

	global $wpdb;
	$regions = $wpdb->get_results("SELECT * FROM wtg_ski_resorts ORDER BY ski_resort_title ASC");
	$firstLetter = 'A';
	$newRow = $false;
	echo '
	<div class="row">
		<div class="col-lg-12 firstLetter">A</div>';
		foreach ($regions as $region)
		{
			if ($region->ski_resort_title[0] != $firstLetter) 
			{
			echo '</div><div id="'.$region->ski_resort_title[0].'" class="row"><div class="col-lg-12 firstLetter">'.$region->ski_resort_title[0].'<a href="#A-Z"><span style="font-size:50px" class="dashicons dashicons-arrow-up"></span></a></div>'; $firstLetter = $region->ski_resort_title[0];
		}
		?>
		<div class="col-lg-3">
				<a href="<?php echo $region->ski_resort_link; ?>"><p><?php echo $region->ski_resort_title; ?></p></a>
		</div>
	<?php 
	} 	
echo '
<span id="X-Z"></span>
	</div>
	</div>';
}

function wtg_beaches_az()
{
?>
	<style> .firstLetter {padding-top:20px; padding-bottom:20px; font-size:80px; line-height: 80px;} </style>
	<div class="container box_list">
	<h2><i class="icon icon_1"></i>Beaches</h2>
	<h3>Select from A-Z</h3>
	<div id="A-Z" class="row padding-top:20px; padding-bottom:20px">
	<div class="col-lg-1"><a href="#A"><h2>A</h2></a></div>
	<div class="col-lg-1"><a href="#B"><h2>B</h2></a></div>
	<div class="col-lg-1"><a href="#C"><h2>C</h2></a></div>
	<div class="col-lg-1"><a href="#D"><h2>D</h2></a></div>
	<div class="col-lg-1"><a href="#E"><h2>E</h2></a></div>
	<div class="col-lg-1"><a href="#F"><h2>F</h2></a></div>
	<div class="col-lg-1"><a href="#G"><h2>G</h2></a></div>
	<div class="col-lg-1"><a href="#H"><h2>H</h2></a></div>
	<div class="col-lg-1"><a href="#I"><h2>I</h2></a></div>
	<div class="col-lg-1"><a href="#J"><h2>J</h2></a></div>
	<div class="col-lg-1"><a href="#K"><h2>K</h2></a></div>
	<div class="col-lg-1"><a href="#L"><h2>L</h2></a></div>
	<div class="col-lg-1"><a href="#M"><h2>M</h2></a></div>
	<div class="col-lg-1"><a href="#N"><h2>N</h2></a></div>
	<div class="col-lg-1"><a href="#O"><h2>O</h2></a></div>
	<div class="col-lg-1"><a href="#P"><h2>P</h2></a></div>
	<div class="col-lg-1"><a href="#Q"><h2>Q</h2></a></div>
	<div class="col-lg-1"><a href="#R"><h2>R</h2></a></div>
	<div class="col-lg-1"><a href="#S"><h2>S</h2></a></div>
	<div class="col-lg-1"><a href="#T"><h2>T</h2></a></div>
	<div class="col-lg-1"><a href="#U"><h2>U</h2></a></div>
	<div class="col-lg-1"><a href="#V"><h2>V</h2></a></div>
	<div class="col-lg-1"><a href="#W"><h2>W</h2></a></div>
	<div class="col-lg-1"><a href="#X-Z"><h2>X-Z</h2></a></div>
	</div>

	<div class="row">
<?php

	global $wpdb;
	$regions = $wpdb->get_results("SELECT * FROM wtg_beaches ORDER BY Beach_Title ASC");
	$firstLetter = 'A';
	$newRow = $false;
	echo '
	<div class="row">
		<div class="col-lg-12 firstLetter">A</div>';
		foreach ($regions as $region)
		{
			if ($region->Beach_Title[0] != $firstLetter) 
			{
			echo '</div><div id="'.$region->Beach_Title[0].'" class="row"><div class="col-lg-12 firstLetter">'.$region->Beach_Title[0].'<a href="#A-Z"><span style="font-size:50px" class="dashicons dashicons-arrow-up"></span></a></div>'; $firstLetter = $region->Beach_Title[0];
		}
		?>
		<div class="col-lg-4">
				<a href="<?php echo $region->Beach_Link; ?>"><p><?php echo $region->Beach_Title; ?></p></a>
		</div>
	<?php 
	} 	
echo '
<span id="X-Z"></span>
	</div>
	</div>';
}

function wtg_cruise_az()
{
?>
	<style> .firstLetter {padding-top:20px; padding-bottom:20px; font-size:80px; line-height: 80px;} </style>
	<div class="container box_list">
	<h2><i class="icon icon_1"></i>Cruise Destinations</h2>
	<h3>Select from A-Z</h3>
	<div id="A-Z" class="row padding-top:20px; padding-bottom:20px">
	<div class="col-lg-1"><a href="#A"><h2>A</h2></a></div>
	<div class="col-lg-1"><a href="#B"><h2>B</h2></a></div>
	<div class="col-lg-1"><a href="#C"><h2>C</h2></a></div>
	<div class="col-lg-1"><a href="#D"><h2>D</h2></a></div>
	<div class="col-lg-1"><a href="#E"><h2>E</h2></a></div>
	<div class="col-lg-1"><a href="#F"><h2>F</h2></a></div>
	<div class="col-lg-1"><a href="#G"><h2>G</h2></a></div>
	<div class="col-lg-1"><a href="#H"><h2>H</h2></a></div>
	<div class="col-lg-1"><a href="#I"><h2>I</h2></a></div>
	<div class="col-lg-1"><a href="#J"><h2>J</h2></a></div>
	<div class="col-lg-1"><a href="#K"><h2>K</h2></a></div>
	<div class="col-lg-1"><a href="#L"><h2>L</h2></a></div>
	<div class="col-lg-1"><a href="#M"><h2>M</h2></a></div>
	<div class="col-lg-1"><a href="#N"><h2>N</h2></a></div>
	<div class="col-lg-1"><a href="#O"><h2>O</h2></a></div>
	<div class="col-lg-1"><a href="#P"><h2>P</h2></a></div>
	<div class="col-lg-1"><a href="#Q"><h2>Q</h2></a></div>
	<div class="col-lg-1"><a href="#R"><h2>R</h2></a></div>
	<div class="col-lg-1"><a href="#S"><h2>S</h2></a></div>
	<div class="col-lg-1"><a href="#T"><h2>T</h2></a></div>
	<div class="col-lg-1"><a href="#U"><h2>U</h2></a></div>
	<div class="col-lg-1"><a href="#V"><h2>V</h2></a></div>
	<div class="col-lg-1"><a href="#W"><h2>W</h2></a></div>
	<div class="col-lg-1"><a href="#X-Z"><h2>X-Z</h2></a></div>
	</div>

	<div class="row">
<?php

	global $wpdb;
	$regions = $wpdb->get_results("SELECT * FROM wtg_cruises ORDER BY Cruise_Title ASC");
	$firstLetter = 'A';
	$newRow = $false;
	echo '
	<div class="row">
		<div class="col-lg-12 firstLetter">A</div>';
		foreach ($regions as $region)
		{
			if ($region->Cruise_Title[0] != $firstLetter) 
			{
			echo '</div><div id="'.$region->Cruise_Title[0].'" class="row"><div class="col-lg-12 firstLetter">'.$region->Cruise_Title[0].'<a href="#A-Z"><span style="font-size:50px" class="dashicons dashicons-arrow-up"></span></a></div>'; $firstLetter = $region->Cruise_Title[0];
		}
		?>
		<div class="col-lg-3">
				<a href="<?php echo $region->Cruise_Link; ?>"><p><?php echo $region->Cruise_Title; ?></p></a>
		</div>
	<?php 
	} 	
echo '
<span id="X-Z"></span>
	</div>
	</div>';
}


function wtg_az_select()
{
    ?>
    <h3>Select from A-Z</h3>
    <div id="A-Z" class="row padding-top:20px; padding-bottom:20px">
        <div class="col-lg-1"><a href="#A"><h2 style="font-size:35px">A</h2></a></div>
        <div class="col-lg-1"><a href="#B"><h2 style="font-size:35px">B</h2></a></div>
        <div class="col-lg-1"><a href="#C"><h2 style="font-size:35px">C</h2></a></div>
        <div class="col-lg-1"><a href="#D"><h2 style="font-size:35px">D</h2></a></div>
        <div class="col-lg-1"><a href="#E"><h2 style="font-size:35px">E</h2></a></div>
        <div class="col-lg-1"><a href="#F"><h2 style="font-size:35px">F</h2></a></div>
        <div class="col-lg-1"><a href="#G"><h2 style="font-size:35px">G</h2></a></div>
        <div class="col-lg-1"><a href="#H"><h2 style="font-size:35px">H</h2></a></div>
        <div class="col-lg-1"><a href="#I"><h2 style="font-size:35px">I</h2></a></div>
        <div class="col-lg-1"><a href="#J"><h2 style="font-size:35px">J</h2></a></div>
        <div class="col-lg-1"><a href="#K"><h2 style="font-size:35px">K</h2></a></div>
        <div class="col-lg-1"><a href="#L"><h2 style="font-size:35px">L</h2></a></div>
        <div class="col-lg-1"><a href="#M"><h2 style="font-size:35px">M</h2></a></div>
        <div class="col-lg-1"><a href="#N"><h2 style="font-size:35px">N</h2></a></div>
        <div class="col-lg-1"><a href="#O"><h2 style="font-size:35px">O</h2></a></div>
        <div class="col-lg-1"><a href="#P"><h2 style="font-size:35px">P</h2></a></div>
        <div class="col-lg-1"><a href="#Q"><h2 style="font-size:35px">Q</h2></a></div>
        <div class="col-lg-1"><a href="#R"><h2 style="font-size:35px">R</h2></a></div>
        <div class="col-lg-1"><a href="#S"><h2 style="font-size:35px">S</h2></a></div>
        <div class="col-lg-1"><a href="#T"><h2 style="font-size:35px">T</h2></a></div>
        <div class="col-lg-1"><a href="#U"><h2 style="font-size:35px">U</h2></a></div>
        <div class="col-lg-1"><a href="#V"><h2 style="font-size:35px">V</h2></a></div>
        <div class="col-lg-1"><a href="#W"><h2 style="font-size:35px">W</h2></a></div>
        <div class="col-lg-1"><a href="#X-Z"><h2 style="font-size:35px">X-Z</h2></a></div>
    </div>
<?php
}


function wtg_continent_directory()
{
	global $wpdb;
	$continent = get_query_var('wtg_continent');
	$term = get_term_by('slug', $continent, 'wtg_continent'); 
    $name = $term->name; 
	$continentID = $term->term_id;
	$regionSQL = sprintf
	(
	"SELECT WP_ID, Link, Image, Title FROM wtg_regions 	
	WHERE WP_Parent_ID = 0 AND WP_Continent = %s
	ORDER BY Title ASC", $continentID
	);
	$regions = $wpdb->get_results($regionSQL);

//
	//var_dump($regions);
	//$continents = get_terms( array( 'taxonomy' => 'wtg_continent', 'hide_empty' => false, ) );
	//$continentQV = get_query_var('wtg_continent');
	$count = 0;
	$activeContinet = '';
	$active2 = '';

	echo '
	<div class="container box_list">
		<h2><i class="icon icon_1"></i>'.$name.'</h2>
	</div>
	<div class="container">
		<div style="padding-left:20px; padding-right:20px">';
		foreach ($regions as $region)
		{
			$children = false;
			if ($region->has_children) $children = true;
			$citySQL = sprintf("SELECT City_Link, City_Title from wtg_cities WHERE WP_Parent_Region_ID = %s ORDER by City_Title ASC", $region->WP_ID);
			$cities = $wpdb->get_results($citySQL);
			$airportSQL = sprintf("SELECT Airport_Link, Airport_Title from wtg_airports WHERE WP_Parent_Region_ID = %s ORDER by Airport_Title ASC", $region->WP_ID);
			$airports = $wpdb->get_results($airportSQL);
			//$beachesSQL = sprintf("SELECT Beach_Link, Beach_Title from wtg_beaches WHERE WP_Parent_Region_ID = %s ORDER by Beach_Title ASC", $region->WP_ID);
			//$beaches = $wpdb->get_results($beachesSQL);
			//$skiResortsSQL = sprintf("SELECT ski_resort_link, ski_resort_title from wtg_ski_resorts WHERE WP_Parent_Region_ID = %s ORDER by ski_resort_title ASC", $region->WP_ID);
			//$skiResorts = $wpdb->get_results($skiResortsSQL);
			//$cruisesSQL = sprintf("SELECT Cruise_Link, Cruise_Title from wtg_cruises WHERE WP_Parent_Region_ID = %s ORDER by Cruise_Title ASC", $region->WP_ID);
			//$cruises = $wpdb->get_results($cruisesSQL);

			//$firstID = get_gallery_attachments($region->WP_ID,'home_carousel')[0];
			//$postImageURL = wp_get_attachment_image_src($firstID, $IMG_CONSTANT)[0];
			?>
				<style> .destination-link a {font-size:14px} </style>
				<div class="row" style="border-bottom:2px solid grey">
					<div class="col-lg-2" style="padding-top:10px; padding-bottom:0px;">
						<div style="position:relative">
							<a href="<?php echo $region->Link; ?>"><img src="<?php echo $region->Image; ?>" width="100%" alt="<?php echo $region->Title; ?>"></a>
							<?php /*
								<div style="background-color:black; opacity:0.3; z-index:10; height:100%; width:100%; position:absolute; top:0; left:0"></div>													
								<div style="z-index:30; height:40%; width:100%; position:absolute; top:0; text-align:center"><a style="color:white" href="<?php echo $region->Link; ?>"><h2><?php echo $region->Title ?></h2></a></div> */ ?>
						</div>
						<a href="<?php echo $region->Link; ?>"><h4><?php echo $region->Title ?></h4></a>
						<?php 
						if ($children) 
						{
							echo '<ul style="list-style-type:none; margin-left:5px; padding-left:10px;">';
							$subRegionSearch = 'SELECT Link, TItle FROM wtg_regions WHERE WP_Parent_ID = %d ORDER BY Title ASC';
							$subRegionSearchString = sprintf( $subRegionSearch, $region->WP_ID);
							$subRegions = $wpdb->get_results( $subRegionSearchString);
							foreach ($subRegions as $subRegion) { echo '<li style="font-style:italic; font-weight:100"><a href="'.$subRegion->Link.'">'.$subRegion->Title.'</a></li>';}
							echo '</ul>';
						}	
					echo '</div>';
						if ($cities) 
						{
							echo '<div class="col-lg-2" style="padding-top:10px; padding-bottom:10px;">';
							echo '<h4>Cities</h4>';
							echo '<ul style="list-style-type:none; margin-left:10px; padding-left:0px; padding-bottom:15px">';
							foreach ($cities as $city) { echo '<li class="destination-link" style="block"><a href = "'.$city->City_Link.'">'.$city->City_Title.'</a></li>'; }
							echo '</ul>';
							echo '</div>';
						} 
						if ($beaches) 
						{
							echo '<div class="col-lg-2" style="padding-top:10px; padding-bottom:10px;">';
							echo '<h4>Beach Resorts</h4>';
							echo '<ul style="list-style-type:none; margin-left:10px; padding-left:0px; padding-bottom:15px">';
							foreach ($beaches as $beach) { echo '<li class="destination-link" style="block"><a href = "'.$beach->Beach_Link.'">'.$beach->Beach_Title.'</a></li>'; }
							echo '</ul>';
							echo '</div>';
						}
						if ($skiResorts) 
						{
							echo '<div class="col-lg-2" style="padding-top:10px; padding-bottom:10px;">';
							echo '<h4>Ski Resorts</h4>';
							echo '<ul style="list-style-type:none; margin-left:10px; padding-left:0px; padding-bottom:15px">';
							foreach ($skiResorts as $skiResort) { echo '<li class="destination-link" style="block"><a href = "'.$skiResort->ski_resort_link.'">'.$skiResort->ski_resort_title.'</a></li>'; }
							echo '</ul>';
							echo '</div>';
						}

					if ($airports)
					{
						echo '<div class="col-lg-2" style="padding-top:10px; padding-bottom:10px;">';
					echo '<h4>Airports</h4>';
					echo '<ul style="list-style-type:none; margin-left:10px; padding-left:0px; padding-bottom:15px">';
					foreach ($airports as $airport) { echo '<li class="destination-link" style="block"><a href = "'.$airport->Airport_Link.'">'.$airport->Airport_Title.'</a></li>'; }
					echo '</ul>';
					echo '</div>';
					}
					if ($cruises)
					{
					echo '<div class="col-lg-2" style="padding-top:10px; padding-bottom:10px;">';
					echo '<h4>Cruise Destinations</h4>';
					echo '<ul style="list-style-type:none; margin-left:10px; padding-left:0px; padding-bottom:15px">';
					foreach ($cruises as $cruise) { echo '<li class="destination-link" style="block"><a href = "'.$cruise->Cruise_Link.'">'.$cruise->Cruise_Title.'</a></li>'; }
					echo '</ul>';
					echo '</div>';
				}

					echo '
				</div> <!-- Row -->

				<div class="icon">
					<a href="javascript:void(0);" class="trigger-continent"><img src="'.get_template_directory_uri() .'/images/arrow_down.png"></a>
				</div>';
		}	
		echo '		
		</div>
	</div>
	
	</div>';


}

function wtg_visa_directory()
{
	global $wpdb;
	$language = 'en';
	$xmlpath = '/var/www/columbus-xml/filtered/regions-full-'.$language.'.xml';
	$xslpath = get_template_directory_uri().'/wtg-data-sync/templates-'.$language.'/region/region-passvisa-overview.xsl';
	$guideRoot = '//Region';


	$continent = get_query_var('wtg_continent');
	$term = get_term_by('slug', $continent, 'wtg_continent'); 
    $name = $term->name; 
	$continentID = $term->term_id;
	echo $name.' '.$id;
	$findYourContinent = 'Select your City by Continent';
//	$findYourContinent = 
	$regionSQL = sprintf
	(
	"SELECT * FROM wtg_regions 	
	WHERE WP_Parent_ID = 0 
	ORDER BY Title ASC"
	);
	$regions = $wpdb->get_results($regionSQL);
	//var_dump($regions);
	$continents = get_terms( array( 'taxonomy' => 'wtg_continent', 'hide_empty' => false, ) );
	$continentQV = get_query_var('wtg_continent');
	$count = 0;
	$activeContinet = '';
	$active2 = '';

	echo '
	<div class="container">
		<div style="padding-left:20px; padding-right:20px">';
		foreach ($regions as $region)
		{
			$children = false;
			if ($region->has_children) $children = true;

			$firstID = get_gallery_attachments($region->WP_ID,'home_carousel')[0];
			$postImageURL = wp_get_attachment_image_src($firstID, $IMG_CONSTANT)[0];
			?>
				<div class="row" style="border-bottom:2px solid grey">
					<div class="col-lg-4" style="padding-top:20px; padding-bottom:20px;">
						<div style="position:relative">
								<a href="<?php echo $region->Link; ?>"><img src="<?php echo $postImageURL; ?>" width="100%" alt="<?php echo $region->Title; ?>"></a>
								<div style="background-color:black; opacity:0.3; z-index:10; height:40%; width:100%; position:absolute; top:0; left:0"></div>													
								<div style="z-index:30; height:40%; width:100%; position:absolute; top:0; text-align:center"><a style="color:white" href="<?php echo $region->Link; ?>"><h2><?php echo $region->Title ?></h2></a></div>
						</div>
						<?php 
						if ($children) 
						{
							echo '<ul style="list-style-type:none; margin-left:5px; padding-left:1px;">';
							$subRegionSearch = 'SELECT * FROM wtg_regions WHERE WP_Parent_ID = %d ORDER BY Title ASC';
							$subRegionSearchString = sprintf( $subRegionSearch, $region->WP_ID);
							$subRegions = $wpdb->get_results( $subRegionSearchString);
							foreach ($subRegions as $subRegion) { echo '<li style="font-style:italic; font-weight:100"><a href="'.$subRegion->Link.'">'.$subRegion->Title.'</a></li>';}
							echo '</ul>';
						}	
					echo '</div>
					<div class="col-lg-12" style="">';
					$dom = new DOMDocument;
					$dom->load($xmlpath);
				
					$xsl = new DOMDocument;
					$xsl->load($xslpath);
					$xslt   = new XSLTProcessor();
					$xslt->importStylesheet($xsl);
					$xp     = new DOMXPath($dom);
					$elements = $xp->query($guideRoot);
				
					if (!is_null($elements)) {
						foreach ($elements as $element) {
							$title = $element->getAttribute('title');
							$nid = $element->getAttribute('nid');
							if( $region->Legacy_ID == $nid){
				
								$region_Doc = new DOMDocument();
								$cloned = $element->cloneNode(TRUE);
								$region_Doc->appendChild($region_Doc->importNode($cloned, True));
								$regionpath = new DOMXPath($region_Doc);
				
								print $xslt->transformToXML($region_Doc);
							}
						}
					}

					echo '</div>	
				</div> <!-- Row -->

				<div class="icon">
					<a href="javascript:void(0);" class="trigger-continent"><img src="'.get_template_directory_uri() .'/images/arrow_down.png"></a>
				</div>';
		}	
		echo '		
		</div>
	</div>
	
	</div>';
}

function update_regions()
{
    global $post;
    $count = 0;    
    update_custom_tables('region');
}

function update_cities()
{
    global $post;
    $count = 0;    
    update_custom_tables('city');
}

function update_airports()
{
    global $post;
    $count = 0;    
    update_custom_tables('airport');
}

function update_beaches()
{
    global $post;
    $count = 0;    
    update_custom_tables('beach-resort');
}

function update_ski_resorts()
{
    global $post;
    $count = 0;    
    update_custom_tables('ski-resort');
}

function update_cruises()
{
    global $post;
    $count = 0;    
    update_custom_tables('cruise');
}


function update_custom_tables($postType)
{
    global $wpdb;
    $wpdb->show_errors();    
    $count = 0;
$args = array
(
'post_type'             => 'guides',
'posts_per_page' 		=> -1,
'order' 		=> 'ASC',
'orderby'       => 'title',
'tax_query'     => array
                    (
                    array
                        (
                        'taxonomy' => 'wtg_guide_type',
                        'field'    => 'slug',
                        'terms'    => $postType, 
                        ),
                    ),
);



    switch ($postType)
    {
        case 'region':
            $result = $wpdb->query  ( "TRUNCATE wtg_regions");
        break;
        case 'city':
            $result = $wpdb->query  ( "TRUNCATE wtg_cities");
        break;
        case 'airport':
            $result = $wpdb->query  ( "TRUNCATE wtg_airports");
        break;
        case 'beach-resort':
            $result = $wpdb->query  ( "TRUNCATE wtg_beaches");
        break;
        case 'ski-resort':
            $result = $wpdb->query  ( "TRUNCATE wtg_ski_resorts");
        break;
        case 'cruise':
            $result = $wpdb->query  ( "TRUNCATE wtg_cruises");
        break;
        
    }    

$postsQuery = new WP_Query($args);

while ($postsQuery->have_posts()):
    $postsQuery->the_post();								
	$pID = get_the_ID();
	echo '<br />Post ID: '.$pID.' Title: '.get_the_title($pID).' URL: '.get_the_permalink($pID);
    $legacyID = get_field('guide_legacy_id', $pID);
    if(!$legacyID) $legacyID = 0;
    $title = get_the_title();
    $firstID = get_gallery_attachments($pID,'home_carousel')[0];
    $postImageURL = wp_get_attachment_image_src($firstID, 'listingGallery')[0]; 
    $pParentID = wp_get_post_parent_id($pID);
    $gpParentID = wp_get_post_parent_id($pParentID);
    $args = array (
        'post_parent'=>$pID, 
        'post_type' => 'guides', 
        'tax_query'             => array(
            array(
                            'taxonomy' => 'wtg_guide_type',
                            'field'    => 'slug',
                            'terms'    => 'region',
                         
            ),
        ),);
    $children = get_children ($args);
    $hasChildren = false;
    if ($children) $hasChildren = true;
	$link = get_the_permalink($pID);
	echo 'the home url is'.home_url();
	$link = str_replace(home_url(), '', $link);
	echo '<br /> Replacement link = '.$link; 
    $title = get_the_title();
    $terms = get_the_terms($pdID, 'wtg_continent');								
    foreach ($terms as $term) { $termID = $term->term_id;}
    if ($pParentID > 0)
    {
        //echo 'This region does not have a 0 parent ID:'.get_the_title($pID);
        $termsParent = get_the_terms($pParentID, 'wtg_guide_type');
        foreach ($termsParent as $termParent) {$termParentSlug = $termParent->slug;}
        if ($termParentSlug == 'city')
        {
            // City parent 
            $cityID = $pParentID;
            $regionID = $gpParentID;
            // What happens if the region is a sub-region?
            $parentTest = $regionID;
            $WPParentRegionID = $parentTest;								
            $parentTest = wp_get_post_parent_id($parentTest);
            if ($parentTest) 
            { 
                $WPParentRegionID = $parentTest; 
                $parentTest = wp_get_post_parent_id($parentTest);
                if ($parentTest) 
                { 
                    $WPParentRegionID = $parentTest;
                    $parentTest = wp_get_post_parent_id($parentTest); 
                    if ($parentTest) 
                    {
                        $WPParentRegionID = $parentTest;
                        $parentTest = wp_get_post_parent_id($parentTest); 
                    }
                }

            }
        }
        else
        {
            $cityID = 0;
            $regionID = $pParentID;
            $parentTest = $regionID;
            $WPParentRegionID = $parentTest;
            if ($WPParentRegionID)
            {
                $parentTest = wp_get_post_parent_id($parentTest);
                if ($parentTest) 
                { 
                    $WPParentRegionID = $parentTest; 
                    $parentTest = wp_get_post_parent_id($parentTest);
                    if ($parentTest) 
                    { 
                        $WPParentRegionID = $parentTest;
                        $parentTest = wp_get_post_parent_id($parentTest); 
                        if ($parentTest) 
                        {
                            $WPParentRegionID = $parentTest;
                            $parentTest = wp_get_post_parent_id($parentTest); 
                        }
                    }
                }
            }
            else
            {
                $WPParentRegionID = $regionID;
            }									
        }
    }
    else
    {
        $regionID = $pID;
        $WPParentRegionID = $regionID;
        if ($postType == 'region') $WPParentRegionID = 0;
    }


switch ($postType)
{
    case 'region':
    $result = $wpdb->insert ( 'wtg_regions', 
                            array
                            (
                                'WP_ID' => $pID, 
                                'Legacy_ID' => $legacyID,                                         
                                'WP_Continent' => $termID , 
                                'WP_Parent_ID' => $WPParentRegionID, 
                                'has_children' => $hasChildren, 
                                'Title' => $title, 
                                'Link' => $link, 
                                'Image' =>  $postImageURL,    
                            ),
                            array('%d','%d','%d','%d','%d','%s','%s','%s'));
    break;

    case 'city':
    $result = $wpdb->insert ( 'wtg_cities', 
                            array
                            (
                                'WP_ID' => $pID,                                    
                                'Legacy_ID' => $legacyID, 
                                'WP_Continent' => $termID , 
                                'WP_Region_ID' => $regionID, 
                                'WP_Parent_Region_ID' => $WPParentRegionID, 
                                'City_Title' => $title, 
                                'City_Link' => $link,
                                'CIty_Image' => $postImageURL, 
                            ),
                            array('%d','%d','%d','%d','%d','%s','%s','%s'));
    break;

	case 'airport':
	if ( $title == 'Lanzarote Airport')  {$WPParentRegionID = 1238;}
    $result = $wpdb->insert ( 'wtg_airports', 
                            array
                            (
                                'WP_ID' => $pID, 
                                'Legacy_ID' => $legacyID, 
                                'WP_Continent' => $termID , 
                                'WP_Region_ID' => $regionID, 
                                'WP_Parent_Region_ID' => $WPParentRegionID, 
                                'WP_City_ID' => $cityID, 
                                'Airport_Title' => $title, 
                                'Airport_Link' => $link
                            ),
                            array('%d','%d','%d','%d','%d','%d','%s','%s'));

    break;

    case 'beach-resort':
    $result = $wpdb->insert (   'wtg_beaches', 
                            array 
                            (   
                                'WP_ID' => $pID, 
                                'Legacy_ID' => $legacyID, 
                                'WP_Continent' => $termID , 
                                'WP_Region_ID' => $regionID, 
                                'WP_Parent_Region_ID' => $WPParentRegionID, 
                                'Beach_Title' => $title, 
                                'Beach_Link' => $link
                            ),
                            array('%d','%d','%d','%d','%d','%s','%s'));
    break;
    case 'cruise':
    $result = $wpdb->insert ( 'wtg_cruises', 
                            array
                            (
                                'WP_ID' => $pID, 
                                'Legacy_ID' => $legacyID, 
                                'WP_Continent' => $termID , 
                                'WP_Region_ID' => $regionID, 
                                'WP_Parent_Region_ID' => $WPParentRegionID, 
                                'Cruise_Title' => $title, 
                                'Cruise_Link' => $link
                            ),
                            array('%d','%d','%d','%d','%d','%s','%s'));
    break;
	case 'ski-resort':
    $result = $wpdb->insert ( 'wtg_ski_resorts', 
                            array
                            (
                                'WP_ID' => $pID, 
                                'Legacy_ID' => $legacyID, 
                                'WP_Continent' => $termID , 
                                'WP_Region_ID' => $regionID, 
                                'WP_Parent_Region_ID' => $WPParentRegionID, 
                                'ski_resort_title' => $title, 
                                'ski_resort_link' => $link
                            ),
                            array('%d','%d','%d','%d','%d','%s','%s'));
	echo '<br />Updating Ski Resort - post ID: '.$pID.' Title: '.$title.' Link: '.$link.' Result: '.$result;
	break;
 
}

endwhile;
}
