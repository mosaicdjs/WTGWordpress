<?php

/*
* Template Name: Beach Images
*/
get_header();
echo '
	<style>img {width:auto; max-width:1200px}</style>
	<div style="width= 1400px; left:0; right:0; margin:0; text-align:center"> ';
    $file = "https://www.worldtravelguide.net/wp-content/themes/wtg/wtg-data-sync/source-data/beach_resorts-full-en.xml";    
    $xml = new DOMDocument();
    $xml->preserveWhiteSpace = FALSE;
    $xml->load($file);
    
    $xp    = new DOMXPath($xml);
    $elements = $xp->query('//BeachResort[@*]');
    
    //var_dump($nodes);
    $i=0;
	$foundImages = array();
	$notFoundImages = array();
    if (!is_null($elements)) 
	{
        foreach ($elements as $element) 
		{
            $title = $element->getAttribute('title');
            $nid = $element->getAttribute('nid');
            
            echo '<h2>'.$title.'</h2>';
                    $city_Doc = new DOMDocument();
                    $cloned = $element->cloneNode(TRUE);
                    $city_Doc->appendChild($city_Doc->importNode($cloned, True));
                    $citypath = new DOMXPath($city_Doc);
                    
					$content_tag = $citypath->query("//Content/General/BeachIntroduction");
                    $content = trim($content_tag->item(0)->nodeValue);
					// echo $content;
                    $images = $citypath->query("//Content/Images");
					// var_dump($images);
                    if (!is_null($images)) 
					{
                        $exID = 1;
                        foreach($images as $image)
						{
                            $ex_Doc = new DOMDocument();
                            $ex_clone = $image->cloneNode(TRUE);
                            $ex_Doc->appendChild($ex_Doc->importNode($ex_clone, TRUE));
                            $expath = new DOMXPath($ex_Doc);
    
                            //Hero Image
                            $image_tag = $expath->query("//HeroImage/Filepath");
                            $image_path = trim($image_tag->item(0)->nodeValue);
							// echo '<h3>Drupal Hero Image (753x350px)</h3><img src="http://manage.worldtravelguide.net/'.$image_path.'"></p>';
                            $exID=$exID+1;
							$file = 'http://manage.worldtravelguide.net/'.$image_path;
							$originalFile = str_replace('-753x320','',$file);
							$originalFile = str_replace('/files/','/files/original_images/',$originalFile);
							$file_headers = @get_headers($originalFile);
                            $caption_tag = $expath->query("//Caption");
                            $caption = trim($caption_tag->item(0)->nodeValue);
                        
							if(!$file_headers || $file_headers[0] == 'HTTP/1.1 404 Not Found') 
							{
								    $exists = false;
									$notFound++;
									// echo '<br /> Original Image not found for this guide<br />'; 
							}
							else {
    								$exists = true;
									echo '<h3>'.$caption.'</h3><img src="'.$originalFile.'" alt='."$caption".'></p>';
									$found++;
							}
						
							
                        }
                    }
    	}
	}
// echo '<h1> Total Large Images found:' .$found. 'not found'. $notFound; 
echo '</div>';
?>