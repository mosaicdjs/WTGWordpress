<?php 
/* Template name: Duty Free Dump */ 
wp_head();
    echo '<div class="container">';
    $xmlpath = '/var/www/columbus-xml/filtered/regions-full-en.xml';
    $xslpath = get_template_directory_uri().'/wtg-data-sync/templates-en/region/region-df.xsl';
    $guideRoot = '//Region';
        $dom = new DOMDocument;
        $dom->load($xmlpath);

    	$xsl = new DOMDocument;
	    $xsl->load($xslpath);
	    $xslt   = new XSLTProcessor();
	    $xslt->importStylesheet($xsl);
	    $xp     = new DOMXPath($dom);
        $elements = $xp->query($guideRoot);

        if (!is_null($elements)) 
        {
            //if ($fp == 'city-events') echo 'City events';
		    echo '<h1>Duty Free Elements</h1>';
            foreach ($elements as $element) 
            {
                $title = $element->getAttribute('title');
                $nid = $element->getAttribute('nid');
            	    $region_Doc = new DOMDocument();
                    $cloned = $element->cloneNode(TRUE);
                    $region_Doc->appendChild($region_Doc->importNode($cloned, True));
                    $regionpath = new DOMXPath($region_Doc);            
                    $guideContent = $xslt->transformToXML($region_Doc);
                    //var_dump ($guideContent);
                    print $guideContent;
		    }
        }
echo '</div>';
wp_footer();
?>
