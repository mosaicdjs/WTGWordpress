<?php
/*
* Template Name: Listing Summary Page
*/
get_header();
?>
  <style>
       /* Set the size of the div element that contains the map */
      #map {
        height: 500px;  /* The height is 400 pixels */
        width: 100%;  /* The width is the width of the web page */
        left:0;
        right:0;
        margin:auto;
       }
    </style>

<script>
function initMap() {
    // The location of Uluru
    // 51.53944,-0.05663
      var dolphin = {lat: 51.539859, lng: -0.056411};
      var bullshead = {lat: 53.0446751, lng:-2.2014082};
      var name = '';
      var urllink = 'https://www.worldtravelguide.net';
      var infoWindow = new google.maps.InfoWindow;
  
    // The map, centered at Uluru
    var map = new google.maps.Map(
        document.getElementById('map'), 
        {
          zoom: 0, 
          //center: dolphin,
          //gestureHandling: 'none',
          zoomControl: false    
        });
  
         var image = 'https://developers.google.com/maps/documentation/javascript/examples/full/images/beachflag.png';
    // The marker, positioned at Uluru
    var marker = new google.maps.Marker({position: dolphin, map: map, label: name, icon: image });
    var marker1 = new google.maps.Marker({position: bullshead, map: map, label: name, icon: image });

    var latlngbounds = new google.maps.LatLngBounds();
	latlngbounds.extend(dolphin);
    latlngbounds.extend(bullshead)
	map.fitBounds(latlngbounds);

    var CTMstyles = [
            {
              featureType: "poi",
              stylers: [{visibility: "off"}]
            },
    ];
  
    var infowincontent = 'This is the infamous <a href="https://www.designmynight.com/london/bars/hackney/the-dolphin/review"><h1>Dophin Pub</h1></a> as frequented by the infamous CTM Crew....';
    var infowincontent1 = 'This is the infamous <a href="https://www.designmynight.com/london/bars/hackney/the-dolphin/review"><h1>Bulls Head</h1></a> the infamous Titanic Wreckage brew pub....';

    marker.addListener('click', function() {
                  infoWindow.setContent(infowincontent);
                  infoWindow.open(map, marker);
                });
    marker1.addListener('click', function() {
                  infoWindow.setContent(infowincontent1);
                  infoWindow.open(map, marker1);
                });

  
  }
  
  
  
      </script>
      <!--Load the API from the specified URL
      * The async attribute allows the browser to render the page while the API loads
      * The key parameter will contain your own API key (which is not needed for this tutorial)
      * The callback parameter executes the initMap() function
      -->
<?php   
$currentPageID= get_the_ID();
$postID = $_GET['location'];
$pageType = $_GET['type'];
$price = $_GET['price'];
$guideTerms = get_the_terms($postID,'wtg_guide_type');
$guideType = $guideTerms[0]->slug;
$parentType = 'listing_city';
if ($guideType == 'region') $parentType = 'listing_region';
if ($guideType == 'airport') $parentType = 'listing_airport';
$postType = strtolower($pageType);
$carousel_images = get_gallery_attachments($postID, 'home_carousel');
if ($guideType == 'region') $descendants = get_posts_children($postID);

    $args = array 
    (
        'post_type' => $postType,
        'posts_per_page' => 9, 
        'meta_key' => $parentType,
        'meta_value' => $postID,
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
    'meta_key' => $parentType,
    'meta_value' => $postID,
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
    'meta_key' => $parentType,
    'meta_value' => $postID,
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
        <div class="row"><div class="col-sm-12"><h2>Our Featured '.$pageType.'s in '.get_the_title($postID).'</h2></div></div>
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
    if ($listingStandard->have_posts())
    {
        echo '
        <div class="row">
            <div class="col-sm-12">
                <h2>More '.$pageType.'s in '.get_the_title($postID).' to consider</h2>
                <div class="row" style="background-color:#e6e3ed; padding-top:25px; padding-bottom:25px; margin-bottom:25px">
                    <div class="col-sm-12"><strong>Filter By Price:</strong> 
                        <a href="'.get_the_permalink($currentPageID).'?location='.$postID.'&type='.$pageType.'&price=£">£</a>
                        <a href="'.get_the_permalink($currentPageID).'?location='.$postID.'&type='.$pageType.'&price=££">££</a>
                        <a href="'.get_the_permalink($currentPageID).'?location='.$postID.'&type='.$pageType.'&price=£££">£££</a>
                        <a href="'.get_the_permalink($currentPageID).'?location='.$postID.'&type='.$pageType.'&price=££££">££££</a>
                        <a href="'.get_the_permalink($currentPageID).'?location='.$postID.'&type='.$pageType.'&price=££££+">££££+</a>
                    </div>
                </div>
            </div>
        </div>';
        while ($listingStandard->have_posts())
        {
            $listingStandard->the_post();
            $postIDStandard= get_the_ID();
            $prices = get_the_terms($postIDStandard, 'wtg_listing_price');
            $price = $prices[0]->name;
            $standardimg = get_field('listing_main_image', $post->ID);
            echo '
            <div class="row box_item" style="margin-bottom:25px; padding-top:10px; border:1px solid #1e73be;">
                <div class="col-sm-4">';
                    if ($standardimg) echo '<img src="'.$standardimg.'" alt="" class="img-responsive">';
            echo '        
                </div> 
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
                        <div class="col-sm-4">
                         <p>Tel:   '.get_field('listing_telephone', $post->ID).'<br />
                            Email: '.get_field('listing_email', $post->ID).'<br />
                            Web: '.get_field('listing_website', $post->ID).'<br /></p>
                        </div>
                        <div class="col-sm-4">
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

    function get_posts_children($parent_id){
        $children = array();
        // grab the posts children
        $posts = get_posts( array( 'numberposts' => -1, 'post_status' => 'publish', 'post_type' => 'guide', 'post_parent' => $parent_id, 'suppress_filters' => false ));
        // now grab the grand children
        foreach( $posts as $child ){
            // recursion!! hurrah
            $gchildren = get_posts_children($child->ID);
            // merge the grand children into the children array
            if( !empty($gchildren) ) {
                $children = array_merge($children, $gchildren);
            }
        }
        // merge in the direct descendants we found earlier
        $children = array_merge($children,$posts);
        return $children;
    }
 get_footer();
?>