<?xml version="1.0" encoding="UTF-8"?>
<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform" xmlns:fn="http://www.w3.org/2005/xpath-functions" exclude-result-refixes="fn">
  <xsl:output method="html" />
  <xsl:param name="id"></xsl:param>
       	<xsl:template match="//Region">
			<h1>Travel to <xsl:value-of select="@title"/></h1>
				
				<h2>Flying to <xsl:value-of select="@title"/></h2>
					<xsl:if test="Content/InternationalTravel/Air/text() != ''">
						<xsl:value-of select="Content/InternationalTravel/Air/text()" disable-output-escaping="yes"/>
					</xsl:if>
					
					<xsl:if test="Content/InternationalTravel/AirNote/text() != ''">
						<h3>Notes</h3>
						<xsl:value-of select="Content/InternationalTravel/AirNote/text()" disable-output-escaping="yes"/>
					</xsl:if>
					
					<xsl:if test="Content/InternationalTravel/FlightTimes/text() != ''">
						<h3>Flight times</h3>
						<xsl:value-of select="Content/InternationalTravel/FlightTimes/text()" disable-output-escaping="yes"/>
					</xsl:if>
					
					<xsl:if test="Content/InternationalTravel/AirPasses/text() != ''">
						<h3>Air passes</h3>
						<xsl:value-of select="Content/InternationalTravel/AirPasses/text()" disable-output-escaping="yes"/>
					</xsl:if>
					
					<xsl:if test="Content/InternationalTravel/DepartureTax/text() != ''">
						<h3>Departure tax</h3>
						<xsl:value-of select="Content/InternationalTravel/DepartureTax/text()" disable-output-escaping="yes"/>
					</xsl:if>
				
				<h2>Travelling to <xsl:value-of select="@title"/> by Rail</h2>
					<xsl:if test="Content/InternationalTravel/Rail/text() != ''">
						<xsl:value-of select="Content/InternationalTravel/Rail/text()" disable-output-escaping="yes"/>
					</xsl:if>
					
					<xsl:if test="Content/InternationalTravel/RailPasses/text() != ''">
						<h3>Rail passes</h3>
						<xsl:value-of select="Content/InternationalTravel/RailPasses/text()" disable-output-escaping="yes"/>
					</xsl:if>
					
					<xsl:if test="Content/InternationalTravel/RailNote/text() != ''">
						<h3>Rail note</h3>
						<xsl:value-of select="Content/InternationalTravel/RailNote/text()" disable-output-escaping="yes"/>
					</xsl:if>
				
				<h2>Driving to <xsl:value-of select="@title"/></h2>
					<xsl:if test="Content/InternationalTravel/Road/text() != ''">
						<xsl:value-of select="Content/InternationalTravel/Road/text()" disable-output-escaping="yes"/>
					</xsl:if>
					
					<xsl:if test="Content/InternationalTravel/RoadNote/text() != ''">
						<h3>Driving note</h3>
						<xsl:value-of select="Content/InternationalTravel/RoadNote/text()" disable-output-escaping="yes"/>
					</xsl:if>
				
				<h2>Getting to <xsl:value-of select="@title"/> by boat</h2>
					<xsl:if test="Content/InternationalTravel/Water/text() != ''">
						<xsl:value-of select="Content/InternationalTravel/Water/text()" disable-output-escaping="yes"/>
					</xsl:if>
					
					<xsl:if test="Content/InternationalTravel/WaterNote/text() != ''">
						<h3>Water note</h3>
						<xsl:value-of select="Content/InternationalTravel/WaterNote/text()" disable-output-escaping="yes"/>
					</xsl:if>
					
					<xsl:if test="Content/InternationalTravel/FerryOperators/text() != ''">
						<h3>Ferry operators</h3>
						<xsl:value-of select="Content/InternationalTravel/FerryOperators/text()" disable-output-escaping="yes"/>
					</xsl:if>
       	</xsl:template>
</xsl:stylesheet>