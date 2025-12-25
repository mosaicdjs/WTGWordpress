<?php 
global $_SERVER;
$GUIDETYPE = 'city';
$_SERVER['HTTP_HOST'] = 'development.worldtravelguide.net';
$_SERVER['REQUEST_URI'] = '/';

require_once('../wp-load.php');
$regionFile = "/var/www/columbus-xml/source-data/cities-full-en.xml";
$cityFile = "/var/www/columbus-xml/source-data/regions-full-en.xml";
echo get_bloginfo();
$xml = new DOMDocument();
$xml->preserveWhiteSpace = FALSE;
echo $cityFile;
$xml->load($cityFile);
$xp    = new DOMXPath($xml);
$elements = $xp->query('//City');
var_dump ($elements);    
foreach ($elements as $element) 
{
    $title = $element->getAttribute('title');
    $nid = $element->getAttribute('nid');            
    echo "Title: ".$title." | nid: ".$nid."\n";
    $match = get_page_by_title($title, OBJECT, 'guides');
    $wpID = $match->ID;
    $city_Doc = new DOMDocument();
    $cloned = $element->cloneNode(TRUE);
    $city_Doc->appendChild($city_Doc->importNode($cloned, True));
    $citypath = new DOMXPath($city_Doc);
    $content_tag = $citypath->query("//Content/Overview/Overview");
    $content = trim($content_tag->item(0)->nodeValue);
    $trimmedExcerpt = substr($content, 0, 319);
    $endOfString = strrpos ( $trimmedExcerpt, '.', 0 );
    $endOfStringsemi = strrpos ( $trimmedExcerpt, ';', 0 );
    if ($endOfStringsemi > $endOfString) {$endOfString = $endOfStringsemi; }
    $trimmedExcerpt = substr($trimmedExcerpt, 0, $endOfString+1);
    $trimmedExcerpt = strip_tags ($trimmedExcerpt);                
    $my_post = array( 'ID' => $wpID, 'post_excerpt' => $trimmedExcerpt,);
    wp_update_post( $my_post, true );
    if (is_wp_error($wpID)) 
    { 
        $errors = $wpID->get_error_messages(); 
        foreach ($errors as $error) { echo $error; }; 
    }
    else
    {
        echo "\n $title updated ";
    }
}