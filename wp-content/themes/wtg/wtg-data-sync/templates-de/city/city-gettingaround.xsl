<?xml version="1.0" encoding="UTF-8"?>
<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform" xmlns:fn="http://www.w3.org/2005/xpath-functions" exclude-result-refixes="fn">
  <xsl:output method="html" />
  <xsl:param name="id"></xsl:param>
       	<xsl:template match="//City">
			<h1>Mobilität vor Ort in  <xsl:value-of select="@title"/></h1>
			<xsl:if test="Content/GettingAround/PublicTransport/text() != ''">
				<h3>Öffentliche Verkehrsmittel</h3>
				<xsl:value-of select="Content/GettingAround/PublicTransport/text()" disable-output-escaping="yes"/>
			</xsl:if>
				
			<xsl:if test="Content/GettingAround/Taxis/text() != ''">
				<h3>Taxis</h3>
				<xsl:value-of select="Content/GettingAround/Taxis/text()" disable-output-escaping="yes"/>
			</xsl:if>
				
			<xsl:if test="Content/GettingAround/Driving/text() != ''">
				<h3>Autofahren in der Stadt</h3>
				<xsl:value-of select="Content/GettingAround/Driving/text()" disable-output-escaping="yes"/>
			</xsl:if>
				
			<xsl:if test="Content/GettingAround/CarHire/text() != ''">
				<h3>Autoverleih</h3>
				<xsl:value-of select="Content/GettingAround/CarHire/text()" disable-output-escaping="yes"/>
			</xsl:if>
				
			<xsl:if test="Content/GettingAround/BikeHire/text() != ''">
				<h3>Fahrradverleih</h3>
				<xsl:value-of select="Content/GettingAround/BikeHire/text()" disable-output-escaping="yes"/>
			</xsl:if>
       	</xsl:template>
</xsl:stylesheet>
