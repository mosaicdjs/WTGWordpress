<?xml version="1.0" encoding="UTF-8"?>
<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform" xmlns:fn="http://www.w3.org/2005/xpath-functions" exclude-result-refixes="fn">
  <xsl:output method="html" />
  <xsl:param name="id"></xsl:param>
       	<xsl:template match="//Region">
			<h1>Sehenswertes und Unternehmungen <xsl:value-of select="@title"/></h1>
				<h2>Touristenbüros</h2>
				<xsl:for-each select="Content/Sightseeing/TouristOffice/TouristOffice">
					<h3><xsl:value-of select="@title"/></h3>
					<b>Adresse: </b>
						<span>
							<xsl:value-of select="./Address/Address1/text()" disable-output-escaping="yes"/>,
							<xsl:value-of select="./Address/Address2/text()" disable-output-escaping="yes"/>,
							<xsl:value-of select="./Address/City/text()" disable-output-escaping="yes"/>,
							<xsl:value-of select="./Address/Postcode/text()" disable-output-escaping="yes"/>
						</span><br/>
					<b>Telefon: </b><xsl:value-of select="./Telephone/text()"/><br/>
					<b>Internetseite: </b>
						<a>
							<xsl:attribute name="href">
								<xsl:value-of select="./Website/text()" disable-output-escaping="yes"/>
							</xsl:attribute>
							<xsl:value-of select="./Website/text()" disable-output-escaping="yes"/>
						</a><br/>
					<b>Öffnungszeiten: </b><xsl:value-of select="./OpeningTimes/text()" disable-output-escaping="yes"/><br/>
				</xsl:for-each>
				<h2>Sehenswürdigkeiten in <xsl:value-of select="@title"/></h2>
				<xsl:for-each select="Content/Sightseeing/MustSees/MustSee">
					<h4><xsl:value-of select="@title"/></h4>
					<xsl:value-of select="Body/text()" disable-output-escaping="yes"/><br/>
				</xsl:for-each>
       	</xsl:template>
</xsl:stylesheet>