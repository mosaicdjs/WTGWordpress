<?xml version="1.0" encoding="UTF-8"?>
<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform" xmlns:fn="http://www.w3.org/2005/xpath-functions" exclude-result-refixes="fn">
  <xsl:output method="html" />
  <xsl:param name="id"></xsl:param>
       	<xsl:template match="//Region">
			<h1>Geld und beim Zoll <xsl:value-of select="@title"/></h1>
			<h2>Währungsinformationen und Geld</h2>
				<xsl:if test="Content/Money/CurrencyInformation/text() != ''">
				<h3>Währungsinformationen</h3>
				<xsl:value-of select="Content/Money/CurrencyInformation" disable-output-escaping="yes"/>
				</xsl:if>
				
				<xsl:if test="Content/Money/CreditCards/text() != ''">
				<h3>Kreditkarten</h3>
				<xsl:value-of select="Content/Money/CreditCards" disable-output-escaping="yes"/>
				</xsl:if>
				
				<xsl:if test="Content/Money/ATM/text() != ''">
				<h3>Am Geldautomat</h3>
				<xsl:value-of select="Content/Money/ATM" disable-output-escaping="yes"/>
				</xsl:if>
				
				<xsl:if test="Content/Money/TravellersCheques/text() != ''">
				<h3>Reiseschecks</h3>
				<xsl:value-of select="Content/Money/TravellersCheques" disable-output-escaping="yes"/>
				</xsl:if>
				
				<xsl:if test="Content/Money/BankingHours/text() != ''">
				<h3>Öffnungszeiten der Banken</h3>
				<xsl:value-of select="Content/Money/BankingHours" disable-output-escaping="yes"/>
				</xsl:if>
				
				<xsl:if test="Content/Money/CurrencyRestriction/text() != ''">
				<h3>Devisenbestimmungen</h3>
				<xsl:value-of select="Content/Money/CurrencyRestriction" disable-output-escaping="yes"/>
				</xsl:if>
				
				<xsl:if test="Content/Money/CurrencyExchange/text() != ''">
				<h3>Geldwechsel</h3>
				<xsl:value-of select="Content/Money/CurrencyExchange" disable-output-escaping="yes"/>
				</xsl:if>
				
				
			<h2><xsl:value-of select="@title"/> Einfuhrbestimmungen</h2>
				<xsl:value-of select="Content/DutyFree/Overview" disable-output-escaping="yes"/>
				<xsl:if test="Content/DutyFree/BannedImports/text() != ''">
					<h3>Verbotene Importe</h3>
					<xsl:value-of select="Content/DutyFree/BannedImports" disable-output-escaping="yes"/>
				</xsl:if>
				<xsl:if test="Content/DutyFree/BannedExports/text() != ''">
					<h3>Verbotene Exporte</h3>
					<xsl:value-of select="Content/DutyFree/BannedExports" disable-output-escaping="yes"/>
				</xsl:if>

       	</xsl:template>
</xsl:stylesheet>