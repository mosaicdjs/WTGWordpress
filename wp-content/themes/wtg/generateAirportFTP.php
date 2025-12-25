<?php
/*
* Template Name: Create Airport FTP
*/

$legacy_id = get_post_meta($postid,'guide_legacy_id',true);
$legacy_id = 872771;
$language = get_field('language','options');
$dom  = new DOMDocument;
$xmlpath = '/var/www/columbus-xml/filtered/cities-full-'.$language.'.xml';
$xslpath = '/var/www/wtg-live/wp-content/themes/wtg/wtg-data-sync/templates-'.$language.'/airport/AirportFTP.xsl';
$dom->load($xmlpath);
$xp    = new DOMXPath($dom);
$elements = $xp->query('//Airport');

$xsl  = new DOMDocument;
$xsl->load($xslpath);

$xslt = new XSLTProcessor();
$openedStylesheet = $xslt->importStylesheet($xsl);
echo 'Processor initialised '.$openedStylesheet;

if (!is_null($elements)) {
    foreach ($elements as $element) {
        $title = $element->getAttribute('title');
        $nid = $element->getAttribute('nid');
        if($title != ''){
            $newpath = '/var/www/columbus-xml/ftp-data/airport/'.$title.'.xml';
            echo '<p>'.$newpath.'</p>';
            $fp = fopen($newpath,'w');  
            if ($fp){
                echo "The file is open"; 
            } 
            else 
            { 
                echo "The file not found"; 
            }
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
            fwrite($fp, $xml_string);
            fclose($fp);

        }
    }
}
?>
