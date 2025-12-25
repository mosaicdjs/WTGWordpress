<?xml version="1.0" encoding="UTF-8"?>
<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform" xmlns:fn="http://www.w3.org/2005/xpath-functions" exclude-result-refixes="fn">
  <xsl:output method="html" />
  <xsl:param name="id"></xsl:param>
       	<xsl:template match="//City">
			<h1><xsl:value-of select="@title"/> Travel Guide</h1>
				<h2>About <xsl:value-of select="@title"/></h2>
				<xsl:value-of select="Content/Overview/Overview/text()" disable-output-escaping="yes"/>
				
				<div class="keyfacts">
					<div class="key-icon"></div>
					<h4>Key facts</h4>
					<xsl:if test="Content/Data/Population/text() != ''">
						<div class="row info">
							<div class="col-md-4 col-xs-4">Population:</div>
							<div class="col-md-8 col-xs-8">
								<xsl:value-of select="Content/Data/Population/text()" disable-output-escaping="yes"/>
							</div>
						</div>
					</xsl:if>
					
					<xsl:if test="Content/General/GMapsPoint/Latitude/text() != ''">
						<div class="row info">
							<div class="col-md-4 col-xs-4">Latitude:</div>
							<div class="col-md-8 col-xs-8">
								<xsl:value-of select="Content/General/GMapsPoint/Latitude/text()" disable-output-escaping="yes"/>
							</div>
						</div>
					</xsl:if>
					
					<xsl:if test="Content/General/GMapsPoint/Longitude/text() != ''">
						<div class="row info">
							<div class="col-md-4 col-xs-4">Longitude:</div>
							<div class="col-md-8 col-xs-8">
								<xsl:value-of select="Content/General/GMapsPoint/Longitude/text()" disable-output-escaping="yes"/>
							</div>
						</div>
					</xsl:if>
					
				</div>
				
				
       	</xsl:template>
		
</xsl:stylesheet>