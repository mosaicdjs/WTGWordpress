<?php

global $_SERVER;

$POSTTYPE = 'guides';
$GUIDETYPE = 'Attraction';
$INSERTNEW = true;

$_SERVER['HTTP_HOST'] = 'ctpro.hosted.worldtravelguide.net';
$_SERVER['REQUEST_URI'] = '/';

require_once('../../../../wp-load.php');

$blog_title = get_bloginfo();
echo 'The blog is'.$blog_title;
    
$file = "/var/www/columbus-xml/source-data/attractions-full-en.xml";
    
    $debugString = "";
    $debugString .= "Current site: $blog_title\n";
    $debugString .= "Blog ID: $wtgID\n";
    $debugString .= "Blog Lang: $wtgLang\n";
    $debugString .= "Import File: $file\n\n";

    echo($debugString);

    $xml = new DOMDocument();
    $xml->preserveWhiteSpace = FALSE;
    $xml->load($file);
    
    $xp    = new DOMXPath($xml);
    $elements = $xp->query('//Attraction[@*]');
    
    //var_dump($nodes);
$i=0;
if (!is_null($elements)) 
{
    foreach ($elements as $element) 
    {
            if ($i < 1000)
            {
            $title = $element->getAttribute('title');
            $nid = $element->getAttribute('nid');
            
            echo "Title: $title | nid: $nid\n";
            if (!$INSERTNEW)
            {
                $match;
                $match = get_page_by_title($title, OBJECT, 'guides');
                $wpID = $match->ID;
                $guideTerms = get_the_terms($wpID,'wtg_guide_type');
                $guideType = $guideTerms[0]->slug;
                if($guideType == 'attraction') { update_post_meta($wpID,'guide_legacy_id',$nid); $i++;}
            }
                else
            {
                    $postStat = 'publish';
                    $postContent = ' ';
                    $placesNode = $element->parentNode;
                    $name = $placesNode->nodeName;   
                    $parentNode = $placesNode->parentNode;
                    $parentNodeTitle = $parentNode->getAttribute('title');
                    $parentNodeNID = $parentNode->getAttribute('nid');
                    $page = get_page_by_title($parentNodeTitle, OBJECT, 'guides');
                    echo 'the ID of the parent is'.$page->ID;
                    echo "INSERTING:- post_title: $title | post_type: $POSTTYPE | post_status: $postStat | post_content: $postContent | post_parent $page->ID\n";
                    $insertID = wp_insert_post(array(
                                               'post_title'=>$title,
                                               'post_type'=>$POSTTYPE,
                                               'post_status'=>$postStat,
                                               'post_content'=>$postContent,
                                               'post_parent'=>$page->ID,
                                               
                                               ));
                    $guideTerms = get_the_terms($page->ID,'wtg_continent');
                    $guidecontinent = $guideTerms[0]->slug;
                    wp_set_object_terms($insertID,$continent,'wtg_continent',true);
                    wp_set_object_terms($insertID,$GUIDETYPE,'wtg_guide_type',true);
                    if($insertID){ echo "Inserted!"; $i++; } else { echo "Failed!"; }
                    
                
            }
            echo "\n\n";
            $i++;    
                 }         //$i++;
        }
    }

    if($INSERTNEW)
    {
        echo "Total Added: $i\n";
        echo "Run again for content\n";
    }
    else 
    {
        if($i ==0){ echo "$i Inserted or $i Found.\nNothing done.\n"; } else { echo "Total: $i\n";}
    }
?>