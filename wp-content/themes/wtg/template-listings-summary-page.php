<?php
/*
* Template Name: Listings Summary Page
*/
get_header();
$currentPageID= get_the_ID();
$postIDLocation = $_GET['location'];
$pageType = $_GET['type'];
$price = $_GET['price'];
$guideTerms = get_the_terms($postIDLocation,'wtg_guide_type');
$guideType = $guideTerms[0]->slug;
$parentType = 'listing_city';
if ($guideType == 'region') $parentType = 'listing_region';
if ($guideType == 'airport') $parentType = 'listing_airport';
$postType = strtolower($pageType);
$carousel_images = get_gallery_attachments($postID, 'home_carousel');
//echo '<h1>'.$parentType.' '.$postType.' Guide type - '.$guideType.'</h1>';
/*$args = array 
    (
        'post_type' => $postType,
        'posts_per_page' => 9, 
        'meta_key' => $parentType,
        'meta_value' => $postID,
    ); */
    $args = array(
        'post_type' => $postType,
        'posts_per_page' => 9, 
        'meta_query' => array(
            'relation' => 'OR',
            array(
                'key' => $parentType,
                'value' => $postIDLocation,
                'compare' => '='
            ),
    
            array(
                'key' => 'region_parent',
                'value' => $postIDLocation,
                'compare' => '='
            )
        )
    );

$listings = new WP_Query($args);
?>
<style> #map { height: 500px; width: 100%; left:0; right:0; margin:auto; }</style>
<script>
    function initMap() 
    {
    // The map
    var image = 'https://developers.google.com/maps/documentation/javascript/examples/full/images/beachflag.png';
    var map = new google.maps.Map( document.getElementById('map'), { zoom: 0, zoomControl: false });
    var infoWindow = new google.maps.InfoWindow;
    var latlngbounds = new google.maps.LatLngBounds();
    <?php
    while ($listings->have_posts())
    { 
        $listings->the_post();
        $postID = get_the_ID();
        $name = 'listing'.$postID;        
        $marker = 'marker'.$postID;        
        $latitude = get_field('listing_latitude', $postID);
        $longitude = get_field('listing_longitude', $postID);
        $infoWinContentName = 'infowincontent'.$postID;
        $infoWinContent = '<h3>'.get_field('listing_title',$postID).'</h3>';
        echo "var label = '';";
        echo 'var '.$name.' = {lat: '.$latitude.', lng: '.$longitude.'};';
        echo 'var '.$marker.' = new google.maps.Marker({position: '.$name.', map: map, label: label, icon: image });';
	    echo 'latlngbounds.extend('.$name.');';
        echo 'var '.$infoWinContentName.' = ';
        echo '\''.$infoWinContent.'\';';    
        echo $marker.".addListener('click', function() {infoWindow.setContent(".$infoWinContentName."); infoWindow.open(map, ".$marker."); });";
    }
    ?>
    map.fitBounds(latlngbounds);
    }
    </script>
      <!--Load the API from the specified URL
      * The async attribute allows the browser to render the page while the API loads
      * The key parameter will contain your own API key (which is not needed for this tutorial)
      * The callback parameter executes the initMap() function
      -->
<?php   

$args = array 
    (
        'post_type' => $postType,
        'posts_per_page' => 9, 
/*        'meta_key' => $parentType,
        'meta_value' => $postIDLocation, */
        'meta_query' => array(
            'relation' => 'OR',
            array(
                'key' => $parentType,
                'value' =>$postIDLocation,
                'compare' => '='
            ),
    
            array(
                'key' => 'region_parent',
                'value' => $postIDLocation,
                'compare' => '='
            )
            ),
        'tax_query' => array(
          array
            (
            'taxonomy' => 'wtg_listing_type',
            'field'    => 'slug',
            'terms'    => 'featured',
            ),
    ),	   
    );


$listingFeatured = new WP_Query($args);


if (!$price)
{
$args = array 
(
    'post_type' => $postType,
    'posts_per_page' => -1, 
    /*'meta_key' => $parentType,
    'meta_value' => $postIDLocation, */
    'meta_query' => array(
        'relation' => 'OR',
        array(
            'key' => $parentType,
            'value' =>$postIDLocation,
            'compare' => '='
        ),

        array(
            'key' => 'region_parent',
            'value' => $postIDLocation,
            'compare' => '='
        )
        ),
    'tax_query' => array(
        array(
            'taxonomy' => 'wtg_listing_type',
            'field'    => 'slug',
            'terms'    => 'regular',
        ),
    ),		 
);
}
else
{
$args = array 
(
    'post_type' => $postType,
    'posts_per_page' => -1, 
    /*'meta_key' => $parentType,
    'meta_value' => $postIDLocation, */
    'meta_query' => array(
        'relation' => 'OR',
        array(
            'key' => $parentType,
            'value' =>$postIDLocation,
            'compare' => '='
        ),

        array(
            'key' => 'region_parent',
            'value' => $postIDLocation,
            'compare' => '='
        )
        ),
    'tax_query' => array
    (
      array
        (
        'taxonomy' => 'wtg_listing_type',
        'field'    => 'slug',
        'terms'    => 'regular',
        ),
        array
        (
            'taxonomy' => 'wtg_listing_price',
            'field'    => 'name',
            'terms'    => $price,
        )
    ),	
);
}

$listingStandard = new WP_Query($args);
$content = '[vc_single_image image="'.$carousel_images[0].'" img_size="full"]';
echo '
<div class="container box_list articles">';
echo '<h2><i class="icon icon_1"></i>'.$pageType.' Directory</h2>'; 

    //echo do_shortcode($content);
    echo '<div id="map"></div>';
    if ($listingFeatured->have_posts())
    {
        echo'
        <div class="row"><div class="col-sm-12"><h2>Our Featured '.$pageType.'s in '.get_the_title($postIDLocation).'</h2></div></div>
        <div class="row box_item" style="display: -webkit-box; display: -webkit-flex; display: -ms-flexbox; display:flex">';
            while($listingFeatured->have_posts())
            {
                $listingFeatured->the_post();
                $postIDfeature= get_the_ID();
                $prices = get_the_terms($postIDfeature, 'wtg_listing_price');
                $price = $prices[0]->name;
            echo '
            <div class="col-md-4 col-sm-6">
                <a href="'.get_the_permalink().'"><img src="'.get_field('listing_main_image', $post->ID).'" alt="" class="img-responsive"></a>
                <div class="col-sm-12 caption">
                    <h2 style="color:#1e73be; text-align:center;">'.get_field('listing_title', $post->ID).'</h2>
                    <p style="text-align: center;"><strong>Price: '.$price.'</strong></p>
                    <p>'.get_field('listing_introduction', $post->ID).'</p>
                </div>
                <div class="col-sm-12" style="padding-bottom:70px">
                    <p>'.get_field('listing_address_line_1', $post->ID).',<br />
                    '.get_field('listing_address_line_2', $post->ID).' '.get_field('listing_address_line_3', $post->ID).'</p>
                    <p>Tel:   '.get_field('listing_telephone', $post->ID).'<br />
                    Email: '.get_field('listing_email', $post->ID).'<br />
                    Web: '.get_field('listing_website', $post->ID).'</p>
                </div>
                <div style="position:absolute; width: calc(100% - 30px); bottom: 0; left:0; right:0; margin:auto; text-align:center;"> 
                    <a href="'.get_the_permalink($post->ID).'"><button style="width:100%; background-color:#58b9da; color: #fff; padding-top:18px; padding-bottom:18px">More Information</button></a>
                </div>
            </div>';
        }
        echo '
    </div>';
    }

        echo '
        <div class="row">
            <div class="col-sm-12">
                <h2>'.$pageType.'s in '.get_the_title($postIDLocation).' to consider</h2>
                <div class="row" style="background-color:#e6e3ed; padding-top:25px; padding-bottom:25px; margin-bottom:25px">
                    <div class="col-sm-12"><strong>Filter By Price:</strong> 
                        <a href="'.get_the_permalink($currentPageID).'?location='.$postIDLocation.'&type='.$pageType.'&price=£">£</a>
                        <a href="'.get_the_permalink($currentPageID).'?location='.$postIDLocation.'&type='.$pageType.'&price=££">££</a>
                        <a href="'.get_the_permalink($currentPageID).'?location='.$postIDLocation.'&type='.$pageType.'&price=£££">£££</a>
                        <a href="'.get_the_permalink($currentPageID).'?location='.$postIDLocation.'&type='.$pageType.'&price=££££">££££</a>
                        <a href="'.get_the_permalink($currentPageID).'?location='.$postIDLocation.'&type='.$pageType.'&price=££££+">££££+</a>
                    </div>
                </div>
            </div>
        </div>';
        if ($listingStandard->have_posts())
        {
        while ($listingStandard->have_posts())
        {
            $listingStandard->the_post();
            $postIDStandard= get_the_ID();
            $prices = get_the_terms($postIDStandard, 'wtg_listing_price');
            $price = $prices[0]->name;
            $img = get_field('listing_main_image', $post->ID);
            if (!$img) $img = get_template_directory_uri().'/listingImages/i'.$postIDStandard.'.png';
            echo '
            <style> .listingImage {padding-bottom:10px} </style>
            <div class="row box_item" style="margin-bottom:25px; padding-top:10px; border:1px solid #1e73be;">
            <div class="col-sm-4 listingImage"><div style="width:100%; height:100%; background-position:center; background-size:cover; background-repeat:no-repeat; background-image:url(\''.$img.'\')"></div></div> 
                     <!-- [vc_btn title="Vist Hotel" align="center"] -->
                <div class="col-sm-8">
                    <h3>'.get_field('listing_title', $post->ID).'</h3>
                    <p>'.get_field('listing_introduction', $post->ID).'</p>
                     <div class="row">
                        <div class="col-sm-4">
                          <p>'.get_field('listing_address_line_1', $post->ID).',<br />
                            '.get_field('listing_address_line_2', $post->ID).',<br /> 
                            '.get_field('listing_address_line_3', $post->ID).'<br /></p>
                        </div>
                        <div class="col-sm-5">
                         <p>Tel:   '.get_field('listing_telephone', $post->ID).'<br />
                            Email: '.get_field('listing_email', $post->ID).'<br />
                            Web: <a href="'.get_field('listing_website', $post->ID).'"><span style="font-size:13px">'.get_field('listing_website', $post->ID).'</span></a><br /></p>
                        </div>
                        <div class="col-sm-3">
                            <p style="text-align: center;"><strong>Price: '.$price.'</strong></p>
                            <div style="text-align: center;">
                                <a href="'.get_field('listing_website', $post->ID).'"><button style="background-color:#f7be68; color:#FFF; font-size:14px; padding-top:8px; padding-bottom:8px; padding-left:20px; padding-right:20px">Visit Hotel</button></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>';

        }
    }
    else
    {
        if ($price) {echo 'No listings found in the '.$price.' range'; } else {echo 'No listings found';}

    }
 get_footer();
?>