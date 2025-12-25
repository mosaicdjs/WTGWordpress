<?xml version="1.0" encoding="UTF-8"?>
<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform" xmlns:fn="http://www.w3.org/2005/xpath-functions" exclude-result-refixes="fn">
  <xsl:output method="html" />
  <xsl:param name="id"></xsl:param>
       	<xsl:template match="//Region">
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
				
				<h2>Visas</h2>
				<xsl:if test="Content/PassportVisa/PassvisaVisas/text() != ''">
					<xsl:value-of select="Content/PassportVisa/PassvisaVisas/text()" disable-output-escaping="yes"/>
				</xsl:if>
				

				<xsl:if test="Content/PassportVisa/TypesCost/text() != ''">
					<h3>Types and Cost</h3>
					<xsl:value-of select="Content/PassportVisa/TypesCost/text()" disable-output-escaping="yes"/>
				</xsl:if>

			</div>
       	</xsl:template>
</xsl:stylesheet>