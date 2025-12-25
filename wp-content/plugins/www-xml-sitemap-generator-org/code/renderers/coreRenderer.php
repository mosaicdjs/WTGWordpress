<?php

namespace xmlSitemapGenerator;

	interface iSitemapRenderer
	{
		public function renderIndex($page);
		public function renderPages($urls);
	}
	
	

	class sitemapRenderer 
	{
		
				// returns a list of  the core provider types
		static function getRendererList()
		{	
			return array(  "rss", "xml", "htm", "news");
		}
		
		static function validate($type) { 
			$types = self::getRendererList();
			if (!in_array($type, $types))
			{
				echo 'XML Sitemap Generator Error. <br />Invalid Renderer type specified : ' . $type;
				exit;
			}	
		}
		
		static function getInstance($type)
		{
			self::validate($type);
			
			$file = $type . 'Renderer.php';
			if (@include_once($file))
			{
				$class = '\\xmlSitemapGenerator\\' . $type . 'Renderer';
				return new $class();				
			}
			else
			{
				echo 'XML Sitemap Generator Error. <br />Renderer not found : ' . $type;
				exit;
			}
		}

	}
	
	class rendererCore 
	{
		public static function renderComment()
		{
			echo "<!-- Created using XmlSitemapGenerator.org WordPress Plugin - Free HTML, RSS and XML sitemap generator -->";
		}
		
	}
	

?>