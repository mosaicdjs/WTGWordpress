<?xml version="1.0" encoding="UTF-8"?>
<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform" xmlns:fn="http://www.w3.org/2005/xpath-functions" exclude-result-refixes="fn">
  <xsl:output method="html" />
  <xsl:param name="id"></xsl:param>
       	<xsl:template match="//Region">
			<h1>Money and duty free for <xsl:value-of select="@title"/></h1>
			<h2>Currency and Money</h2>
				<xsl:if test="Content/Money/CurrencyInformation/text() != ''">
				<h3>Currency information</h3>
				<xsl:value-of select="Content/Money/CurrencyInformation" disable-output-escaping="yes"/>
				</xsl:if>
				
				<xsl:if test="Content/Money/CreditCards/text() != ''">
				<h3>Credit cards</h3>
				<xsl:value-of select="Content/Money/CreditCards" disable-output-escaping="yes"/>
				</xsl:if>
				
				<xsl:if test="Content/Money/ATM/text() != ''">
				<h3>ATM</h3>
				<xsl:value-of select="Content/Money/ATM" disable-output-escaping="yes"/>
				</xsl:if>
				
				<xsl:if test="Content/Money/TravellersCheques/text() != ''">
				<h3>Travellers cheques</h3>
				<xsl:value-of select="Content/Money/TravellersCheques" disable-output-escaping="yes"/>
				</xsl:if>
				
				<xsl:if test="Content/Money/BankingHours/text() != ''">
				<h3>Banking hours</h3>
				<xsl:value-of select="Content/Money/BankingHours" disable-output-escaping="yes"/>
				</xsl:if>
				
				<xsl:if test="Content/Money/CurrencyRestriction/text() != ''">
				<h3>Currency restrictions</h3>
				<xsl:value-of select="Content/Money/CurrencyRestriction" disable-output-escaping="yes"/>
				</xsl:if>
				
				<xsl:if test="Content/Money/CurrencyExchange/text() != ''">
				<h3>Currency exchange</h3>
				<xsl:value-of select="Content/Money/CurrencyExchange" disable-output-escaping="yes"/>
				</xsl:if>
				
				
			<h2><xsl:value-of select="@title"/>Duty free</h2>
	
				<xsl:if test="Content/DutyFree/Overview/text() != ''">
					<h3>Overview</h3>
					<xsl:value-of select="Content/DutyFree/Overview" disable-output-escaping="yes"/>
				</xsl:if>
				
				<xsl:if test="Content/DutyFree/ImportRegulations/text() != ''">
					<h3>Import Regulations</h3>
					<xsl:value-of select="Content/DutyFree/ImportRegulations" disable-output-escaping="yes"/>
				</xsl:if>
							
				<xsl:if test="Content/DutyFree/BannedImports/text() != ''">
					<h3>Banned Imports</h3>
					<xsl:value-of select="Content/DutyFree/BannedImports" disable-output-escaping="yes"/>
				</xsl:if>
				
				<xsl:if test="Content/DutyFree/ImportRestrictions/text() != ''">
					<h3>Import Restrictions</h3>
					<xsl:value-of select="Content/DutyFree/ImportRestrictions" disable-output-escaping="yes"/>
				</xsl:if>
				
				<xsl:if test="Content/DutyFree/ImportExportEu/text() != ''">
					<h3>EU Import/Export</h3>
					<xsl:value-of select="Content/DutyFree/ImportExportEu" disable-output-escaping="yes"/>
				</xsl:if>
				
				<xsl:if test="Content/DutyFree/EU/text() != ''">
					<h3>EU</h3>
					<xsl:value-of select="Content/DutyFree/EU" disable-output-escaping="yes"/>
				</xsl:if>
				
				<xsl:if test="Content/DutyFree/BannedExports/text() != ''">
					<h3>Banned Exports</h3>
					<xsl:value-of select="Content/DutyFree/BannedExports" disable-output-escaping="yes"/>
				</xsl:if>
				
				<xsl:if test="Content/DutyFree/ExportRestrictions/text() != ''">
					<h3>Export Restrictions</h3>
					<xsl:value-of select="Content/DutyFree/ExportRestrictions" disable-output-escaping="yes"/>
				</xsl:if>

				<xsl:if test="Content/DutyFree/ExportRegulations/text() != ''">
					<h3>Export Regulations</h3>
					<xsl:value-of select="Content/DutyFree/ExportRegulations" disable-output-escaping="yes"/>
				</xsl:if>

				<xsl:if test="Content/DutyFree/Note/text() != ''">
					<h3>Notes</h3>
					<xsl:value-of select="Content/DutyFree/Note" disable-output-escaping="yes"/>
				</xsl:if>

       	</xsl:template>
</xsl:stylesheet>