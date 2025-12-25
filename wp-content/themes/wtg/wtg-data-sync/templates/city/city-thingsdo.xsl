<?xml version="1.0" encoding="UTF-8"?>
<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform" xmlns:fn="http://www.w3.org/2005/xpath-functions" exclude-result-refixes="fn">
  <xsl:output method="html" />
  <xsl:param name="id"></xsl:param>
       	<xsl:template match="//City">
			<h1>Unternehmungen in <xsl:value-of select="@title"/></h1>
				
				<xsl:for-each select="Content/Activities/Activity">
					<div>
						<h3><xsl:value-of select="@title"/></h3>
						<xsl:if test="./Content/General/Body/text() != ''">
							<xsl:value-of select="./Content/General/Body/text()" disable-output-escaping="yes"/>
						</xsl:if>
					</div>
				</xsl:for-each>

       	</xsl:template>
</xsl:stylesheet>