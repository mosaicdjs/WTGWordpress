<?xml version="1.0" encoding="UTF-8"?>
<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform" xmlns:fn="http://www.w3.org/2005/xpath-functions" exclude-result-refixes="fn">
  <xsl:output method="html" />
  <xsl:param name="id"></xsl:param>
       	<xsl:template match="//Region">
			<h1><xsl:value-of select="@title"/> Gesundheit und Impfungen</h1>
				<div>
					<table class="guide-table">
						<tr>
							<th>Titel</th>
							<th>Besondere Vorsichtsmaßnahmen</th>
						</tr>
						<xsl:for-each select="Content/HealthCare/VaccinationTable/VaccinationRow">
						<tr>
							<td><xsl:value-of select="@title"/></td>
							<td><xsl:value-of select="./SpecialPrecautions" disable-output-escaping="yes"/></td>
						</tr>
						</xsl:for-each>
						<tr>
							<xsl:value-of select="Content/HealthCare/VaccinationsNote" disable-output-escaping="yes"/>
						</tr>
					</table>
				</div>
				<xsl:if test="Content/HealthCare/HealthCare/text() != ''">
				<h2>Medizinische Versorgung</h2>
					<xsl:value-of select="Content/HealthCare/HealthCare" disable-output-escaping="yes"/>
				</xsl:if>
				<xsl:if test="Content/HealthCare/FoodDrink/text() != ''">
				<h2>Essen und Drinken</h2>
					<xsl:value-of select="Content/HealthCare/FoodDrink" disable-output-escaping="yes"/>
				</xsl:if>
				<xsl:if test="Content/HealthCare/OtherRisks/text() != ''">
				<h2>Andere Risiken</h2>
					<xsl:value-of select="Content/HealthCare/OtherRisks" disable-output-escaping="yes"/>
				</xsl:if>
				<xsl:if test="Content/HealthCare/Precautions/text() != ''">
				<h2>Vorsichtsmaßnahmen</h2>
					<xsl:value-of select="Content/HealthCare/Precautions" disable-output-escaping="yes"/>
				</xsl:if>
       	</xsl:template>
</xsl:stylesheet>