<?xml version="1.0" encoding="UTF-8"?>
<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform" xmlns:fn="http://www.w3.org/2005/xpath-functions" exclude-result-refixes="fn">
  <xsl:output method="html" />
  <xsl:param name="id"></xsl:param>
       	<xsl:template match="//Region">
			<h1><xsl:value-of select="@title"/> Weather, climate and geography</h1>
				
				<h2>Weather and climate</h2>
				
					<xsl:if test="Content/Climate/BestTimeToVisit/text() != ''">
						<h3>Best time to visit</h3>
						<xsl:value-of select="Content/Climate/BestTimeToVisit/text()" disable-output-escaping="yes"/>
					</xsl:if>
					<xsl:if test="Content/Climate/RequiredClothing/text() != ''">
						<h3>Required clothing</h3>
						<xsl:value-of select="Content/Climate/RequiredClothing/text()" disable-output-escaping="yes"/>
					</xsl:if>
				<div id='div-gpt-ad-1492512001379-4' style="max-height:300px;margin-top:10px;">
				<script>
					googletag.cmd.push(function() { googletag.display('div-gpt-ad-1492512001379-4'); });
				</script>
				</div>
				<xsl:if test="Content/General/Geography/text() != ''">
				<h2>Geography</h2>
					<xsl:value-of select="Content/General/Geography/text()" disable-output-escaping="yes"/>
				</xsl:if>
       	</xsl:template>
</xsl:stylesheet>