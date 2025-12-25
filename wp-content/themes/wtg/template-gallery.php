<?php
/*
* Template Name: Gallery
*/
get_header();

$current_fp = get_query_var('fpage');
//echo $current_fp.'<br/>';
$postid = get_the_ID();
//echo $postid;
$title = get_the_title($postid);
$legacy_id = get_post_meta($postid,'guide_legacy_id',true);
$language = get_field('language','options');
$dom  = new DOMDocument;
$xmlpath = '/var/www/columbus-xml/filtered/regions-full-'.$language.'.xml';
$xslpath = get_template_directory_uri().'/wtg-data-sync/templates-'.$language.'/region/region-gallery.xsl';

$dom->load($xmlpath);

$xp    = new DOMXPath($dom);
$elements = $xp->query('//Region');

$xsl  = new DOMDocument;
$xsl->load($xslpath);
$xslt = new XSLTProcessor();
$xslt->importStylesheet($xsl);
//$xslt->setParameter(NULL, 'id', $lagacy_id);
//print $xslt->transformToXML($dom);

if($current_fp=='passport-visa'){
   // visa_central_promo_top();
}

if (!is_null($elements)) {
    foreach ($elements as $element) {
        $title = $element->getAttribute('title');
        $nid = $element->getAttribute('nid');
        if($legacy_id == $nid){
            //print $xslt->transformToXML($element);
            //print $element;
            //echo $element->saveHTML();
            $region_Doc = new DOMDocument();
            $cloned = $element->cloneNode(TRUE);
            $region_Doc->appendChild($region_Doc->importNode($cloned, True));
            $regionpath = new DOMXPath($region_Doc);
            
            //overview
            //$content_tag = $regionpath->query("//Content/Overview/Overview");
            //$content = trim($content_tag->item(0)->nodeValue);
            print $xslt->transformToXML($region_Doc);
            //echo $content;
        }
    }
}

get_footer();