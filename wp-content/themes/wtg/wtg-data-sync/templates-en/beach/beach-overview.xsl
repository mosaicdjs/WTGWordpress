<?xml version="1.0" encoding="UTF-8"?>
<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform" xmlns:fn="http://www.w3.org/2005/xpath-functions" exclude-result-refixes="fn">
  <xsl:output method="html" />
  <xsl:param name="id"></xsl:param>
    <xsl:template match="//BeachResort">
	    <h1><xsl:value-of select="@title"/> Travel Guide</h1>
		<h2>About <xsl:value-of select="@title"/></h2>
		<xsl:value-of select="Content/General/BeachIntroduction/text()" disable-output-escaping="yes"/>
        <h3>Beach:</h3>
		<xsl:value-of select="Content/General/BeachBeach/text()" disable-output-escaping="yes"/>
        <h3>Beyond the beach:</h3>
		<xsl:value-of select="Content/General/BeachBeyondTheBeach/text()" disable-output-escaping="yes"/>	
        <h3>Family fun:</h3>
		<xsl:value-of select="Content/General/BeachFamilyFun/text()" disable-output-escaping="yes"/>						
        <h3>Exploring further:</h3>
		<xsl:value-of select="Content/General/BeachExploringFurther/text()" disable-output-escaping="yes"/>						
    </xsl:template>
</xsl:stylesheet>