<?xml version="1.0" encoding="UTF-8"?>
<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform" xmlns:fn="http://www.w3.org/2005/xpath-functions" exclude-result-refixes="fn">
  <xsl:output method="html" />
  <xsl:param name="id"></xsl:param>
       	<xsl:template match="//Region">
			<h1><xsl:value-of select="@title"/> Einkaufen und Nachtleben</h1>
			<xsl:if test="Content/Shopping/Intro/text() != ''">
				<h2>Einkaufen in <xsl:value-of select="@title"/></h2>
				<xsl:value-of select="Content/Shopping/Intro" disable-output-escaping="yes"/>
			</xsl:if>
			<xsl:if test="Content/Shopping/Note/text() != ''">
				<h3>Hinweise zum Einkaufen</h3>
				<xsl:value-of select="Content/Shopping/Note" disable-output-escaping="yes"/>
			</xsl:if>
			<xsl:if test="Content/Shopping/OpeningHours/text() != ''">
				<h3>Ladenöffnungszeiten</h3>
				<xsl:value-of select="Content/Shopping/OpeningHours" disable-output-escaping="yes"/>
			</xsl:if>
			<xsl:if test="Content/Nightlife/Nightlife/text() != ''">
				<h2>Nachtleben in <xsl:value-of select="@title"/></h2>
				<xsl:value-of select="Content/Nightlife/Nightlife" disable-output-escaping="yes"/>
			</xsl:if>
       	</xsl:template>
</xsl:stylesheet>