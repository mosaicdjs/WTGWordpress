<?xml version="1.0" encoding="UTF-8"?>
<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform" xmlns:fn="http://www.w3.org/2005/xpath-functions" exclude-result-refixes="fn">
  <xsl:output method="html" />
  <xsl:param name="id"></xsl:param>
       	<xsl:template match="//City">
			<h1><xsl:value-of select="@title"/> History</h1>
				<xsl:value-of select="Content/History/History/text()" disable-output-escaping="yes"/>
				
       	</xsl:template>
		
</xsl:stylesheet>
