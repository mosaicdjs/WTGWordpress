<?xml version="1.0" encoding="UTF-8"?>
<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform" xmlns:fn="http://www.w3.org/2005/xpath-functions" exclude-result-refixes="fn">
  <xsl:output method="html" />
  <xsl:param name="id"></xsl:param>
       	<xsl:template match="//City">
			<h1>Einkaufen in <xsl:value-of select="@title"/></h1>
			<xsl:if test="Content/Shopping/Introduction/text() != ''">
				<xsl:value-of select="Content/Shopping/Introduction/text()" disable-output-escaping="yes"/>
			</xsl:if>
				
			<xsl:if test="Content/Shopping/KeyAreas/text() != ''">
				<h3>Einkaufsmeilen</h3>
				<xsl:value-of select="Content/Shopping/KeyAreas/text()" disable-output-escaping="yes"/>
			</xsl:if>
				
			<xsl:if test="Content/Shopping/Markets/text() != ''">
				<h3>Märkte</h3>
				<xsl:value-of select="Content/Shopping/Markets/text()" disable-output-escaping="yes"/>
			</xsl:if>
				
			<xsl:if test="Content/Shopping/ShoppingCentres/text() != ''">
				<h3>Einkaufszentren</h3>
				<xsl:value-of select="Content/Shopping/ShoppingCentres/text()" disable-output-escaping="yes"/>
			</xsl:if>
				
			<xsl:if test="Content/Shopping/Times/text() != ''">
				<h3>Öffnungszeiten</h3>
				<xsl:value-of select="Content/Shopping/Times/text()" disable-output-escaping="yes"/>
			</xsl:if>
			
			<xsl:if test="Content/Shopping/Souvenirs/text() != ''">
				<h3>Souvenirs</h3>
				<xsl:value-of select="Content/Shopping/Souvenirs/text()" disable-output-escaping="yes"/>
			</xsl:if>
			
			<xsl:if test="Content/Shopping/TaxInfo/text() != ''">
				<h3>Steuerinformationen</h3>
				<xsl:value-of select="Content/Shopping/TaxInfo/text()" disable-output-escaping="yes"/>
			</xsl:if>
       	</xsl:template>
</xsl:stylesheet>