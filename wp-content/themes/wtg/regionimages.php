<?php

/*
* Template Name: Region Images
*/
get_header();
echo '
	<style>img {width:auto; max-width:1200px}</style>
	<div style="width= 1400px; left:0; right:0; margin:0; text-align:center">';
    $file = "https://www.worldtravelguide.net/wp-content/themes/wtg/wtg-data-sync/source-data/regions-full-en.xml";    
    $xml = new DOMDocument();
    $xml->preserveWhiteSpace = FALSE;
    $xml->load($file);
    
    $xp    = new DOMXPath($xml);
    $elements = $xp->query('//Region[@*]');
    
    //var_dump($nodes);
    $i=0;
	$i1 = 0;
	$foundImages = array();
	$notFoundImages = array();
    if (!is_null($elements)) 
	{
        foreach ($elements as $element) 
		{
            $title = $element->getAttribute('title');
            $nid = $element->getAttribute('nid');
            
		
                    $city_Doc = new DOMDocument();
                    $cloned = $element->cloneNode(TRUE);
                    $city_Doc->appendChild($city_Doc->importNode($cloned, True));
                    $citypath = new DOMXPath($city_Doc);

					$content_tag = $citypath->query("//Content/General/Dst/WebsiteUrl");
            		$content = trim($content_tag->item(0)->nodeValue);
					//echo $content;
            		echo '<h1 style="background-color:black; color:white; font-size:50px">'.$content.'</h1>';
	
                    
                    $images = $citypath->query("//Content/Images/Image");
					
					// var_dump($images);
                    if (!is_null($images)) 
					{
                        $exID = 1;
                        foreach($images as $image)
						{
							echo $exID;
                            $ex_Doc = new DOMDocument();
                            $ex_clone = $image->cloneNode(TRUE);
                            $ex_Doc->appendChild($ex_Doc->importNode($ex_clone, TRUE));
                            $expath = new DOMXPath($ex_Doc);
    
                            //Hero Image
                            $image_tag = $expath->query("//HeroImage/Filepath");
                            $image_path = trim($image_tag->item(0)->nodeValue);
//							echo '<h3>Drupal Hero Image (753x350px)</h3><img src="http://manage.worldtravelguide.net/'.$image_path.'"></p>';
                            $exID=$exID+1;
							$i1++;
							$file = 'http://manage.worldtravelguide.net/'.$image_path;
							$originalFile_tag = $expath->query("//OriginalImage/Filepath");
                            $originalFile_path = trim($originalFile_tag->item(0)->nodeValue);
							$originalfile = 'http://manage.worldtravelguide.net/'.$originalFile_path;
							$title = $image->getAttribute('title');
	
	                        $source_tag = $expath->query("//Source");
                            $source = trim($source_tag->item(0)->nodeValue);
							$copyright_tag = $expath->query("//Copyright");
							$copyright = trim($copyright_tag->item(0)->nodeValue);
							$caption_tag = $expath->query("//Caption");
							$caption = trim($caption_tag->item(0)->nodeValue);
						
							if (strpos($source,'Thinkstock') !== false) {$thinkstock++;}
							if (strpos( $source,'Creative') !==false) {$creative++;}
							if (strpos ($source, '123') !==false) {$WTG++;}
						 
							echo '<h3>'.$title.'</h3>
							<img alt="'.$caption.'" src="http://manage.worldtravelguide.net/'.$originalFile_path.'">';
							echo '<h3 >Image source:'.$source.'</h3>';
							echo '<h3 >Copyright:'.$copyright.'</h3>';
			
							//echo '<h2 >Caption:'.$title.'</h2>';
							//echo '<h2 >Caption:'.$caption.'</h2>';
	
                        }
						// echo '<h1> Total number of images found for '.$content.'is '.$exID.'</h1>';
                    }
    	}
	}
//echo '<h1> Total Number of Images Found</h1>'.$i1;
//echo '<br />Thinkstock: '.$thinkstock;
//echo '<br />Creative Commons '.$creative;
//echo '<br />123 '.$WTG;
echo '</div>';
get_footer();
?>