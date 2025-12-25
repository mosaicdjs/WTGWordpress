<?xml version="1.0" encoding="UTF-8"?>
<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform" xmlns:fn="http://www.w3.org/2005/xpath-functions" exclude-result-refixes="fn">
  <xsl:output method="html" />
  <xsl:param name="id"></xsl:param>
       	<xsl:template match="//Region">
			<h1><xsl:value-of select="@title"/> Reisepass und Visum</h1>
			<div itemprop="text">
				<div>
					<table class="guide-table">
						<tr>
							<th></th>
							<th>Reisepass erforderlich</th>
							<th>Rückflugticket erforderlich</th>
							<th>Visum erforderlich</th>
						</tr>
						<xsl:for-each select="Content/PassportVisa/PassportTable/PassportRow">
						<tr>
							<td><xsl:value-of select="@title"/></td>
							<td><xsl:value-of select="./PassportRequired/text()" disable-output-escaping="yes"/></td>
							<td><xsl:value-of select="./ReturnTicketRequired/text()" disable-output-escaping="yes"/></td>
							<td><xsl:value-of select="./VisaRequired/text()" disable-output-escaping="yes"/></td>
						</tr>
						</xsl:for-each>
					</table>
				</div>
				
				<h2>Reisepässe</h2>
				<xsl:if test="Content/PassportVisa/PassvisaPassports/text() != ''">
					<xsl:value-of select="Content/PassportVisa/PassvisaPassports/text()" disable-output-escaping="yes"/>
				</xsl:if>
				
				<xsl:if test="Content/PassportVisa/PassportNote/text() != ''">
					<h3>Hinweis zum Reisepass</h3>
					<xsl:value-of select="Content/PassportVisa/PassportNote/text()" disable-output-escaping="yes"/>
				</xsl:if>
				
				<h2>Visa</h2>
				<xsl:if test="Content/PassportVisa/PassvisaVisas/text() != ''">
					<xsl:value-of select="Content/PassportVisa/PassvisaVisas/text()" disable-output-escaping="yes"/>
				</xsl:if>
				
				<xsl:if test="Content/PassportVisa/VisaNote/text() != ''">
					<h3>Visa Note</h3>
					<xsl:value-of select="Content/PassportVisa/VisaNote/text()" disable-output-escaping="yes"/>
				</xsl:if>
				<xsl:if test="Content/PassportVisa/Cost/text() != ''">
					<h3>Kosten</h3>
					<xsl:value-of select="Content/PassportVisa/Cost/text()" disable-output-escaping="yes"/>
				</xsl:if>
				<xsl:if test="Content/PassportVisa/TypesCost/text() != ''">
					<h3>Visaarten und kosten</h3>
					<xsl:value-of select="Content/PassportVisa/TypesCost/text()" disable-output-escaping="yes"/>
				</xsl:if>
				<xsl:if test="Content/PassportVisa/Validity/text() != ''">
					<h3>Gültigkeit</h3>
					<xsl:value-of select="Content/PassportVisa/Validity/text()" disable-output-escaping="yes"/>
				</xsl:if>
				<xsl:if test="Content/PassportVisa/Transit/text() != ''">
					<h3>Transit</h3>
					<xsl:value-of select="Content/PassportVisa/Transit/text()" disable-output-escaping="yes"/>
				</xsl:if>
				<xsl:if test="Content/PassportVisa/ApplicationTo/text() != ''">
					<h3>Antragstellung an:</h3>
					<xsl:value-of select="Content/PassportVisa/ApplicationTo/text()" disable-output-escaping="yes"/>
				</xsl:if>
				<xsl:if test="Content/PassportVisa/ApplicationRequired/text() != ''">
					<h3>Antrag erforderlich</h3>
					<xsl:value-of select="Content/PassportVisa/ApplicationRequired/text()" disable-output-escaping="yes"/>
				</xsl:if>
				
				<xsl:if test="Content/PassportVisa/TemporaryResidence/text() != ''">
					<h3>Aufenthaltsgenehmigung</h3>
					<xsl:value-of select="Content/PassportVisa/TemporaryResidence/text()" disable-output-escaping="yes"/>
				</xsl:if>
				<xsl:if test="Content/PassportVisa/WorkingDays/text() != ''">
					<h3>Bearbeitungsdauer</h3>
					<xsl:value-of select="Content/PassportVisa/WorkingDays/text()" disable-output-escaping="yes"/>
				</xsl:if>
				<xsl:if test="Content/PassportVisa/SufficientFunds/text() != ''">
					<h3>Nachweis ausreichender Geldmittel</h3>
					<xsl:value-of select="Content/PassportVisa/SufficientFunds/text()" disable-output-escaping="yes"/>
				</xsl:if>
				<xsl:if test="Content/PassportVisa/ExtensionOfStay/text() != ''">
					<h3>Aufenthaltsverlängerung</h3>
					<xsl:value-of select="Content/PassportVisa/ExtensionOfStay/text()" disable-output-escaping="yes"/>
				</xsl:if>
				<xsl:if test="Content/PassportVisa/EntryWithChildren/text() != ''">
					<h3>Einreise mit Kindern</h3>
					<xsl:value-of select="Content/PassportVisa/EntryWithChildren/text()" disable-output-escaping="yes"/>
				</xsl:if>
				<xsl:if test="Content/PassportVisa/EntryWithPets/text() != ''">
					<h3>Einreise mit Haustieren</h3>
					<xsl:value-of select="Content/PassportVisa/EntryWithPets/text()" disable-output-escaping="yes"/>
				</xsl:if>
				<br/>
				<div id='div-gpt-ad-1492512001379-4' style="max-height:300px;margin-top:10px;">
				<script>
					googletag.cmd.push(function() { googletag.display('div-gpt-ad-1492512001379-4'); });
				</script>
				</div>
				<b><i>Unsere Visum- und Reisepassbestimmungen werden regelmäßig aktualisiert und sind zum Zeitpunkt der letzten Veröffentlichung korrekt. <br />Wir empfehlen dennoch, die für Ihre Reise wichtigen Informationen bei der zuständigen Botschaft rechtzeitig zu überprüfen.</i></b>
				<h2>Botschaften und Fremdenverkehrsämter</h2>
				<xsl:for-each select="Content/ContactAddresses/Contacts/Contact">
					<h3><xsl:value-of select="@title"/></h3>
					<b>Telefon: </b><xsl:value-of select="./Telephone"/><br/>
					<b>Internetseite: </b>
						<a>
							<xsl:attribute name="href">
								<xsl:value-of select="./Website" disable-output-escaping="yes"/>
							</xsl:attribute>
							<xsl:value-of select="./Website" disable-output-escaping="yes"/>
						</a><br/>
					<b>Adresse: </b>
						<span>
							<xsl:value-of select="./Address/Address1" disable-output-escaping="yes"/>,
							<xsl:value-of select="./Address/Address2" disable-output-escaping="yes"/>,
							<xsl:value-of select="./Address/City" disable-output-escaping="yes"/>,
							<xsl:value-of select="./Address/Postcode" disable-output-escaping="yes"/>, 
						</span><br/>
					<b>Geschäftszeiten: </b><xsl:value-of select="./OpeningTimes" disable-output-escaping="yes"/>
				</xsl:for-each>
			</div>
       	</xsl:template>
</xsl:stylesheet>