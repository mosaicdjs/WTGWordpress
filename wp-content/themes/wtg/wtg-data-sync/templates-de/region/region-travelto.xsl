<?xml version="1.0" encoding="UTF-8"?>
<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform" xmlns:fn="http://www.w3.org/2005/xpath-functions" exclude-result-refixes="fn">
  <xsl:output method="html" />
  <xsl:param name="id"></xsl:param>
       	<xsl:template match="//Region">
			<h1>Reisen nach <xsl:value-of select="@title"/></h1>
				
				<h2>Fliegen Nach <xsl:value-of select="@title"/></h2>
					<xsl:if test="Content/InternationalTravel/Air/text() != ''">
						<xsl:value-of select="Content/InternationalTravel/Air/text()" disable-output-escaping="yes"/>
					</xsl:if>
					
					<xsl:if test="Content/InternationalTravel/AirNote/text() != ''">
						<h3>Flugdauer</h3>
						<xsl:value-of select="Content/InternationalTravel/AirNote/text()" disable-output-escaping="yes"/>
					</xsl:if>
					
					<xsl:if test="Content/InternationalTravel/FlightTimes/text() != ''">
						<h3>Flugdauer</h3>
						<xsl:value-of select="Content/InternationalTravel/FlightTimes/text()" disable-output-escaping="yes"/>
					</xsl:if>
					
					<xsl:if test="Content/InternationalTravel/AirPasses/text() != ''">
						<h3>Air-Pässe</h3>
						<xsl:value-of select="Content/InternationalTravel/AirPasses/text()" disable-output-escaping="yes"/>
					</xsl:if>
					
					<xsl:if test="Content/InternationalTravel/DepartureTax/text() != ''">
						<h3>Ausreisesteuer</h3>
						<xsl:value-of select="Content/InternationalTravel/DepartureTax/text()" disable-output-escaping="yes"/>
					</xsl:if>
				
				<h2>Mit der Bahn nach <xsl:value-of select="@title"/> reisen</h2>
					<xsl:if test="Content/InternationalTravel/Rail/text() != ''">
						<xsl:value-of select="Content/InternationalTravel/Rail/text()" disable-output-escaping="yes"/>
					</xsl:if>
					
					<xsl:if test="Content/InternationalTravel/RailPasses/text() != ''">
						<h3>Bahnreisepässe</h3>
						<xsl:value-of select="Content/InternationalTravel/RailPasses/text()" disable-output-escaping="yes"/>
					</xsl:if>
					
					<xsl:if test="Content/InternationalTravel/RailNote/text() != ''">
						<h3>Hinweis zum Reisen mit der Bahn </h3>
						<xsl:value-of select="Content/InternationalTravel/RailNote/text()" disable-output-escaping="yes"/>
					</xsl:if>
				
				<h2>Fahren nach <xsl:value-of select="@title"/></h2>
					<xsl:if test="Content/InternationalTravel/Road/text() != ''">
						<xsl:value-of select="Content/InternationalTravel/Road/text()" disable-output-escaping="yes"/>
					</xsl:if>
					
					<xsl:if test="Content/InternationalTravel/RoadNote/text() != ''">
						<h3>Hinweis zum Fahren auf der Straße</h3>
						<xsl:value-of select="Content/InternationalTravel/RoadNote/text()" disable-output-escaping="yes"/>
					</xsl:if>
				
				<h2>Mit dem Schiff nach <xsl:value-of select="@title"/> fahren </h2>
					<xsl:if test="Content/InternationalTravel/Water/text() != ''">
						<xsl:value-of select="Content/InternationalTravel/Water/text()" disable-output-escaping="yes"/>
					</xsl:if>
					
					<xsl:if test="Content/InternationalTravel/WaterNote/text() != ''">
						<h3>Hinweis zum Reisen auf dem Wasser</h3>
						<xsl:value-of select="Content/InternationalTravel/WaterNote/text()" disable-output-escaping="yes"/>
					</xsl:if>
					
					<xsl:if test="Content/InternationalTravel/FerryOperators/text() != ''">
						<h3>Fährenbetreiber</h3>
						<xsl:value-of select="Content/InternationalTravel/FerryOperators/text()" disable-output-escaping="yes"/>
					</xsl:if>
       	</xsl:template>
</xsl:stylesheet>