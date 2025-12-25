<?xml version="1.0" encoding="UTF-8"?>
<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform" xmlns:fn="http://www.w3.org/2005/xpath-functions" exclude-result-refixes="fn">
  <xsl:output method="html" />
  <xsl:param name="id"></xsl:param>
       	<xsl:template match="//Region">
			<h1>Unterkünfte in <xsl:value-of select="@title"/></h1>
				<xsl:if test="Content/Accommodation/Hotels/text() != ''">
					<h2>Hotels</h2>
					<xsl:value-of select="Content/Accommodation/Hotels/text()" disable-output-escaping="yes"/>
				</xsl:if>
				
				<xsl:if test="Content/Accommodation/BedAndBreakfast/text() != ''">
					<h2>Bed and Breakfast</h2>
					<xsl:value-of select="Content/Accommodation/BedAndBreakfast/text()" disable-output-escaping="yes"/>
				</xsl:if>
				
				<xsl:if test="Content/Accommodation/CampingCaravaning/text() != ''">
					<h2>Campen</h2>
					<xsl:value-of select="Content/Accommodation/CampingCaravaning/text()" disable-output-escaping="yes"/>
				</xsl:if>
				
				<xsl:if test="Content/Accommodation/Other/text() != ''">
					<h2>Andere Unterkünfte</h2>
					<xsl:value-of select="Content/Accommodation/Other/text()" disable-output-escaping="yes"/>
				</xsl:if>
       	</xsl:template>
</xsl:stylesheet>
