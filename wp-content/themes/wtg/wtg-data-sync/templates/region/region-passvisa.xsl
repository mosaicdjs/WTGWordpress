<?xml version="1.0" encoding="UTF-8"?>
<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform" xmlns:fn="http://www.w3.org/2005/xpath-functions" exclude-result-refixes="fn">
  <xsl:output method="html" />
  <xsl:param name="id"></xsl:param>
       	<xsl:template match="//Region">
			<h1><xsl:value-of select="@title"/> Visa and Passport Requirements</h1>
			<div itemprop="text">
				<div>
					<table class="guide-table">
						<tr>
							<th></th>
							<th>Passport required</th>
							<th>Return ticket required</th>
							<th>Visa Required</th>
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
				
				<h2>Passports</h2>
				<xsl:if test="Content/PassportVisa/PassvisaPassports/text() != ''">
					<xsl:value-of select="Content/PassportVisa/PassvisaPassports/text()" disable-output-escaping="yes"/>
				</xsl:if>
				
				<xsl:if test="Content/PassportVisa/PassportNote/text() != ''">
					<h3>Passport Note</h3>
					<xsl:value-of select="Content/PassportVisa/PassportNote/text()" disable-output-escaping="yes"/>
				</xsl:if>
				
				<h2>Visas</h2>
				<xsl:if test="Content/PassportVisa/PassvisaVisas/text() != ''">
					<xsl:value-of select="Content/PassportVisa/PassvisaVisas/text()" disable-output-escaping="yes"/>
				</xsl:if>
				
				<xsl:if test="Content/PassportVisa/VisaNote/text() != ''">
					<h3>Visa Note</h3>
					<xsl:value-of select="Content/PassportVisa/VisaNote/text()" disable-output-escaping="yes"/>
				</xsl:if>

				<xsl:if test="Content/PassportVisa/TypesCost/text() != ''">
					<h3>Types and Cost</h3>
					<xsl:value-of select="Content/PassportVisa/TypesCost/text()" disable-output-escaping="yes"/>
				</xsl:if>
				<xsl:if test="Content/PassportVisa/Validity/text() != ''">
					<h3>Validity</h3>
					<xsl:value-of select="Content/PassportVisa/Validity/text()" disable-output-escaping="yes"/>
				</xsl:if>
				<xsl:if test="Content/PassportVisa/Transit/text() != ''">
					<h3>Transit</h3>
					<xsl:value-of select="Content/PassportVisa/Transit/text()" disable-output-escaping="yes"/>
				</xsl:if>
				<xsl:if test="Content/PassportVisa/ApplicationTo/text() != ''">
					<h3>Application to</h3>
					<xsl:value-of select="Content/PassportVisa/ApplicationTo/text()" disable-output-escaping="yes"/>
				</xsl:if>
				<xsl:if test="Content/PassportVisa/TemporaryResidence/text() != ''">
					<h3>Temporary residence</h3>
					<xsl:value-of select="Content/PassportVisa/TemporaryResidence/text()" disable-output-escaping="yes"/>
				</xsl:if>
				<xsl:if test="Content/PassportVisa/WorkingDays/text() != ''">
					<h3>Working days</h3>
					<xsl:value-of select="Content/PassportVisa/WorkingDays/text()" disable-output-escaping="yes"/>
				</xsl:if>
				<xsl:if test="Content/PassportVisa/ExtensionOfStay/text() != ''">
					<h3>Extension of stay</h3>
					<xsl:value-of select="Content/PassportVisa/ExtensionOfStay/text()" disable-output-escaping="yes"/>
				</xsl:if>
				<xsl:if test="Content/PassportVisa/EntryWithChildren/text() != ''">
					<h3>Entry with children</h3>
					<xsl:value-of select="Content/PassportVisa/EntryWithChildren/text()" disable-output-escaping="yes"/>
				</xsl:if>
				<xsl:if test="Content/PassportVisa/EntryWithPets/text() != ''">
					<h3>Entry with pets</h3>
					<xsl:value-of select="Content/PassportVisa/EntryWithPets/text()" disable-output-escaping="yes"/>
				</xsl:if>
				<br/>
				<div id='div-gpt-ad-1492512001379-4' style="max-height:300px;margin-top:10px;">
				<script>
					googletag.cmd.push(function() { googletag.display('div-gpt-ad-1492512001379-4'); });
				</script>
				</div>
				<b><i>Our visa and passport information is updated regularly and is correct at the time of publishing,<br/>
				We strongly recommend that you verify critical information unique to your trip with the relevant embassy before travel.</i></b>
				<h2>Embassies and tourist offices</h2>
				<xsl:for-each select="Content/ContactAddresses/Contacts/Contact">
					<h3><xsl:value-of select="@title"/></h3>
					<b>Telephone: </b><xsl:value-of select="./Telephone"/><br/>
					<b>Website: </b>
						<a>
							<xsl:attribute name="href">
								<xsl:value-of select="./Website" disable-output-escaping="yes"/>
							</xsl:attribute>
							<xsl:value-of select="./Website" disable-output-escaping="yes"/>
						</a><br/>
					<b>Address: </b>
						<span>
							<xsl:value-of select="./Address/Address1" disable-output-escaping="yes"/>,
							<xsl:value-of select="./Address/Address2" disable-output-escaping="yes"/>,
							<xsl:value-of select="./Address/City" disable-output-escaping="yes"/>,
							<xsl:value-of select="./Address/Postcode" disable-output-escaping="yes"/>, 
						</span><br/>
					<b>Opening times: </b><xsl:value-of select="./OpeningTimes" disable-output-escaping="yes"/>
				</xsl:for-each>
			</div>
       	</xsl:template>
</xsl:stylesheet>