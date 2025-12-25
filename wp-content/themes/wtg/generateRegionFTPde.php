<?php
/*
* Template Name: Create FTP de
*/

$legacy_id = get_post_meta($postid,'guide_legacy_id',true);
$legacy_id = 820042;
$language = get_field('language','options');
$language ='de';
$dom  = new DOMDocument;
$xmlpath = '/var/www/columbus-xml/filtered/regions-full-'.$language.'.xml';
$xslpath = '/var/www/wtg-live/wp-content/themes/wtg/wtg-data-sync/templates-'.$language.'/region/regionFTP-de.xsl';
$newpath = '/var/www/wtg-live/wp-content/themes/wtg/wtg-data-sync/templates-'.$language.'/region/newregionFTP.xml';
echo '<h1>'.$xslpath;
$fp = fopen($newpath,'w');  
if ($fp){

    echo "The file is open"; 
} 
else 
{ 
    echo "The file not found"; 
} 

$dom->load($xmlpath);
$xp    = new DOMXPath($dom);
$elements = $xp->query('//Region');
var_dump($elements);

$xsl  = new DOMDocument;
$xsl->load($xslpath);
//print $xsl->saveXML();
$xslt = new XSLTProcessor();
$openedStylesheet = $xslt->importStylesheet($xsl);
echo 'Stylesheet opened is '.$openedStylesheet;
//$xslt->setParameter(NULL, 'id', $lagacy_id);
//print $xslt->transformToXML($dom);


if (!is_null($elements)) {
    foreach ($elements as $element) {
        $title = $element->getAttribute('title');
        $nid = $element->getAttribute('nid');
        //echo '<br />The NID is:'.$nid;
        if($legacy_id == $nid){
            //echo '<h1>Legacy ID MATCH</h1>';
            //print $xslt->transformToXML($element);
            //print $element;
            //echo $element->saveHTML();
            $region_Doc = new DOMDocument();
            $cloned = $element->cloneNode(TRUE);
            $region_Doc->appendChild($region_Doc->importNode($cloned, True));
            $regionpath = new DOMXPath($region_Doc);
            $region_Doc->formatOutput = true;
            
            //overview
            //$content_tag = $regionpath->query("//Content/Overview/Overview");
            //$content = trim($content_tag->item(0)->nodeValue);
            //print $xslt->transformToXML($region_Doc);
            $xml_string = $xslt->transformToXML($region_Doc);
            //echo $xml_string;
            fwrite($fp, $xml_string);
            fclose($fp);

        }
    }
}




?>
