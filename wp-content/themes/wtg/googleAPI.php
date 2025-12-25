<?php
global $_SERVER;
$_SERVER['HTTP_HOST'] = 'development.worldtravelguide.net';
$_SERVER['REQUEST_URI'] = '/';
$_SERVER['HTTP_HOST'] = 'staging.worldtravelguide.net';
$_SERVER['REQUEST_URI'] = '/';

require_once('../../../wp-load.php');
//var_dump(wp_upload_dir());
$args = array 
(
    'post_type' => 'hotel',
    'posts_per_page' => 1900,
);

$listings = new WP_Query($args);
$i =0;
while ($listings->have_posts() && $i < 2000)
{
    $i++;
    $listings->the_post();
    $listingID = get_the_ID();
    $latitude = get_field('listing_latitude', $listingID);
    $longitude = get_field('listing_longitude', $listingID);
    $title = get_field('listing_title', $listingID);
    echo "\n".$title;
    //$searchstring = explode(' ',$title, 2);
    $search = rawurlencode($title);
    echo 'Search string '.$search;
    $baseURL = 'https://maps.googleapis.com/maps/api/place/nearbysearch/json?location='.$latitude.','.$longitude.'&radius=15000&type=lodging&keyword='.$search.'&fields=photos,name&key=AIzaSyBx-1ry9KwxCmLrWJQf7Tk9gzj7HumPy9Y';
    // echo $baseURL;
$response = file_get_contents($baseURL);
$responses = json_decode($response);
$photoreference = false;
//var_dump($responses);
$count=0;
foreach ($responses as $response)
{   
    $count++;
    if ($count == 2)
    {
        $count2 = 0;
        foreach ($response as $indiviualResponse)
        {
            $photos = $indiviualResponse->photos;
            $photoreference = $photos[0]->photo_reference;
            $count2++;
        }
    }
}

//echo "\n The photoreference is ".$photoreference;

$photoRequest = 'https://maps.googleapis.com/maps/api/place/photo?maxwidth=400&photoreference='.$photoreference.'&sensor=false&key=AIzaSyBx-1ry9KwxCmLrWJQf7Tk9gzj7HumPy9Y';
//echo 'THe photo request is'.$photoRequest;

//echo "\n The photo request is".$photoRequest;
// echo $photoRequest;
if ($photoreference)
{
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $photoRequest);
curl_setopt($ch, CURLOPT_HEADER, TRUE);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, FALSE);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
$a = curl_exec($ch);
$url = Null;
if(preg_match('#Location: (.*)#', $a, $r)) {
     $url = trim($r[1]);
}
//echo $url;

        //Save the photo file to directory
        $file = '/var/www/wtg-staging/wp-content/themes/wtgrf/listingImages/i'.$listingID.'.png';
        $ch = curl_init($url);
        $fp = fopen($file, 'wb');
        curl_setopt($ch, CURLOPT_FILE, $fp);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_exec($ch);
        curl_close($ch);
        fclose($fp);
        //echo $url;
  //      echo "<br><hr>";
  //      echo '<img width="400px" height="400px" src="'.get_template_directory_uri().'/listingImages/i'.$listingID.'.png">';
        //$image = get_template_directory_uri().'/listingImages/i'.$listingID.'.png';
        //update_field ('listing_main_image', $image. $listingID);
       // $imageObj = new ACF_Image_Upload();
        //$imageObj->update_acf($filename);
    }
}
 //       get_footer();

        class ACF_Image_Upload {
            public $post_id;
            
            function update_acf ( $filename, $listingID) {
                
                $attach_id = $this->get_image_attach_id($filename, $listingID);
                // Saving image
                update_field('image', $attach_id, $listingID);
            }
              
            function get_image_attach_id ( $filename , $listingID) {
                    
                // Get the path to the upload directory. 
                // If it was uploaded to WP, wp_upload_dir() does the job
                $wp_upload_dir = wp_upload_dir();
                //$full_path = $wp_upload_dir['path'] . $filename;
                $full_path = $filename;
                // Check the type of file. We'll use this as the 'post_mime_type'.
                $filetype = wp_check_filetype(basename($full_path), null);
                // Prepare an array of post data for the attachment.
                $attachment = array(
//                    'guid'           => $wp_upload_dir['url'] . '/' . basename($full_path), 
                    'guid'           => get_template_directory_uri().'/listingImages/'.  basename($full_path),     
                    'post_mime_type' => $filetype['type'],
                    'post_title'     => preg_replace( '/\.[^.]+$/', '', basename($full_path) ),
                    'post_content'   => '',
                    'post_status'    => 'inherit'
                );
                // Insert the attachment.
                $attach_id = wp_insert_attachment( $attachment, $full_path, $listingID );
                return $attach_id;
            }
        }
        
?>
