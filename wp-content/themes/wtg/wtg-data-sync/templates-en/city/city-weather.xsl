<?xml version="1.0" encoding="UTF-8"?>
<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform" xmlns:fn="http://www.w3.org/2005/xpath-functions" exclude-result-refixes="fn">
  <xsl:output method="html" />
  <xsl:param name="id"></xsl:param>
       	<xsl:template match="//City">
			<h1>Weather in <xsl:value-of select="@title"/></h1>
				<xsl:value-of select="Content/Weather/BestTimeToVisit/text()" disable-output-escaping="yes"/>
				<div id='div-gpt-ad-1492512001379-4' style="max-height:300px;margin-top:10px;">
				<script>
					googletag.cmd.push(function() { googletag.display('div-gpt-ad-1492512001379-4'); });
				</script>
				</div>
       	</xsl:template>
		
</xsl:stylesheet>