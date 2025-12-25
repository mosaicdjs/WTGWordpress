<?xml version="1.0" encoding="UTF-8"?>
<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform" xmlns:fn="http://www.w3.org/2005/xpath-functions" exclude-result-refixes="fn">
  <xsl:output method="html" />
  <xsl:param name="id"></xsl:param>
       	<xsl:template match="//Region">
			<h1><xsl:value-of select="@title"/> Health Care and Vaccinations</h1>
				<div>
					<table class="guide-table">
						<tr>
							<th>Title</th>
							<th>Special precautions</th>
						</tr>
						<xsl:for-each select="Content/HealthCare/VaccinationTable/VaccinationRow">
						<tr>
							<td><xsl:value-of select="@title"/></td>
							<td><xsl:value-of select="./SpecialPrecautions" disable-output-escaping="yes"/></td>
						</tr>
						</xsl:for-each>
						<tr>
						</tr>
					</table>
					
					<p><xsl:value-of select="Content/HealthCare/VaccinationsNote" disable-output-escaping="yes"/></p>
				</div>
				<xsl:if test="Content/HealthCare/HealthCare/text() != ''">
				<h2>Health Care</h2>
					<xsl:value-of select="Content/HealthCare/HealthCare" disable-output-escaping="yes"/>
				</xsl:if>
				<xsl:if test="Content/HealthCare/FoodDrink/text() != ''">
				<h2>Food and Drink</h2>
					<xsl:value-of select="Content/HealthCare/FoodDrink" disable-output-escaping="yes"/>
				</xsl:if>
				<xsl:if test="Content/HealthCare/OtherRisks/text() != ''">
				<h2>Other Risks</h2>
					<xsl:value-of select="Content/HealthCare/OtherRisks" disable-output-escaping="yes"/>
				</xsl:if>
				<xsl:if test="Content/HealthCare/Precautions/text() != ''">
				<h2>Precautions</h2>
					<xsl:value-of select="Content/HealthCare/Precautions" disable-output-escaping="yes"/>
				</xsl:if>
								<xsl:if test="Content/HealthCare/Birdflu/text() != ''">
				<h2>Bird Flu</h2>
					<xsl:value-of select="Content/HealthCare/Birdflu" disable-output-escaping="yes"/>
				</xsl:if>
								
				<xsl:if test="Content/HealthCare/Certificate/text() != ''">
				<h2>Certificate</h2>
					<xsl:value-of select="Content/HealthCare/Certificate" disable-output-escaping="yes"/>
				</xsl:if>				

				
       	</xsl:template>
</xsl:stylesheet>