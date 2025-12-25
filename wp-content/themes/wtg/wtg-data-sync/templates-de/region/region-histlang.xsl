<?xml version="1.0" encoding="UTF-8"?>
<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform" xmlns:fn="http://www.w3.org/2005/xpath-functions" exclude-result-refixes="fn">
  <xsl:output method="html" />
  <xsl:param name="id"></xsl:param>
       	<xsl:template match="//Region">
			<h1><xsl:value-of select="@title"/> Geschichte, Sprache und Kultur</h1>
				<xsl:if test="Content/History/History/text() != ''">
					<h2>Geschichte von <xsl:value-of select="@title"/></h2>
					<xsl:value-of select="Content/History/History/text()" disable-output-escaping="yes"/>
				</xsl:if>
				<h2><xsl:value-of select="@title"/> Kultur</h2>
				<xsl:if test="Content/Culture/Religion/text() != ''">
					<h3>Religion in <xsl:value-of select="@title"/></h3>
					<xsl:value-of select="Content/Culture/Religion/text()" disable-output-escaping="yes"/>
				</xsl:if>
				<xsl:if test="Content/Culture/SocialConventions/text() != ''">
					<h3>Sitten und Gebräuche in <xsl:value-of select="@title"/></h3>
					<xsl:value-of select="Content/Culture/SocialConventions/text()" disable-output-escaping="yes"/>
				</xsl:if>
				<xsl:if test="Content/Language/Overview/text() != ''">
					<h2>Sprache in <xsl:value-of select="@title"/></h2>
					<xsl:value-of select="Content/Language/Overview/text()" disable-output-escaping="yes"/>
				</xsl:if>
				<xsl:if test="Content/Language/Phrases/text() != ''">
					<h3>Nützliche Sätze</h3>
					<xsl:value-of select="Content/Language/Phrases/text()" disable-output-escaping="yes"/>
				</xsl:if>
       	</xsl:template>
</xsl:stylesheet>

