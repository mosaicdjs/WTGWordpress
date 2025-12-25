<?xml version="1.0" encoding="UTF-8"?>
<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform" xmlns:fn="http://www.w3.org/2005/xpath-functions" exclude-result-refixes="fn">
  <xsl:output method="html" />
  <xsl:param name="id"></xsl:param>
       	<xsl:template match="//Region">
			<h1>Getting Around <xsl:value-of select="@title"/></h1>
			<h2>Air</h2>
				<xsl:if test="Content/InternalTravel/Air/text() != ''">
					<xsl:value-of select="Content/InternalTravel/Air/text()" disable-output-escaping="yes"/>
				</xsl:if>
				
				<xsl:if test="Content/InternalTravel/MainAirports/text() != ''">
					<h3>Main Airports</h3>
					<xsl:value-of select="Content/InternalTravel/MainAirports/text()" disable-output-escaping="yes"/>
				</xsl:if>
				
				<xsl:if test="Content/InternalTravel/FlightTimes/text() != ''">
					<h3>Flight times</h3>
					<xsl:value-of select="Content/InternalTravel/FlightTimes/text()" disable-output-escaping="yes"/>
				</xsl:if>
				
				<xsl:if test="Content/InternalTravel/AirPasses/text() != ''">
					<h3>Air passes</h3>
					<xsl:value-of select="Content/InternalTravel/AirPasses/text()" disable-output-escaping="yes"/>
				</xsl:if>
				
				<xsl:if test="Content/InternalTravel/DepartureTax/text() != ''">
					<h3>Departure tax</h3>
					<xsl:value-of select="Content/InternalTravel/DepartureTax/text()" disable-output-escaping="yes"/>
				</xsl:if>
				
				<xsl:if test="Content/InternalTravel/AirNote/text() != ''">
					<h3>Air Note</h3>
					<xsl:value-of select="Content/InternalTravel/AirNote/text()" disable-output-escaping="yes"/>
				</xsl:if>
				
				
			<h2>Road</h2>
				<xsl:if test="Content/InternalTravel/Road/text() != ''">
						<xsl:value-of select="Content/InternalTravel/Road/text()" disable-output-escaping="yes"/>
				</xsl:if>
				
				<xsl:if test="Content/InternalTravel/SideOfRoad/text() != ''">
					<h3>Side of the road</h3>
					<xsl:choose>
						<xsl:when test="Content/InternalTravel/SideOfRoad/text() = 'r'">
						Right
						</xsl:when>
						<xsl:otherwise>
						Left
						</xsl:otherwise>
					</xsl:choose>
				</xsl:if>
				
				<xsl:if test="Content/InternalTravel/RoadQuality/text() != ''">
					<h3>Road Quality</h3>
					<xsl:value-of select="Content/InternalTravel/RoadQuality/text()" disable-output-escaping="yes"/>
				</xsl:if>
				
				<xsl:if test="Content/InternalTravel/RoadClassification/text() != ''">
					<h3>Road Classification</h3>
					<xsl:value-of select="Content/InternalTravel/RoadClassification/text()" disable-output-escaping="yes"/>
				</xsl:if>
				
				<xsl:if test="Content/InternalTravel/CarHire/text() != ''">
					<h3>Car Hire</h3>
					<xsl:value-of select="Content/InternalTravel/CarHire/text()" disable-output-escaping="yes"/>
				</xsl:if>
				
				<xsl:if test="Content/InternalTravel/Taxi/text() != ''">
					<h3>Taxi</h3>
					<xsl:value-of select="Content/InternalTravel/Taxi/text()" disable-output-escaping="yes"/>
				</xsl:if>
				
				<xsl:if test="Content/InternalTravel/Bike/text() != ''">
					<h3>Bike</h3>
					<xsl:value-of select="Content/InternalTravel/Bike/text()" disable-output-escaping="yes"/>
				</xsl:if>
				
				<xsl:if test="Content/InternalTravel/Coach/text() != ''">
					<h3>Coach</h3>
					<xsl:value-of select="Content/InternalTravel/Coach/text()" disable-output-escaping="yes"/>
				</xsl:if>
				
				<xsl:if test="Content/InternalTravel/Regulations/text() != ''">
					<h3>Regulations</h3>
					<xsl:value-of select="Content/InternalTravel/Regulations/text()" disable-output-escaping="yes"/>
				</xsl:if>
				
				<xsl:if test="Content/InternalTravel/BreakdownServices/text() != ''">
					<h3>Breakdown services</h3>
					<xsl:value-of select="Content/InternalTravel/BreakdownServices/text()" disable-output-escaping="yes"/>
				</xsl:if>
				
				<xsl:if test="Content/InternalTravel/Documentation/text() != ''">
					<h3>Documentation</h3>
					<xsl:value-of select="Content/InternalTravel/Documentation/text()" disable-output-escaping="yes"/>
				</xsl:if>
				
				<xsl:if test="Content/InternalTravel/RoadNote/text() != ''">
					<h3>Road note</h3>
					<xsl:value-of select="Content/InternalTravel/RoadNote/text()" disable-output-escaping="yes"/>
				</xsl:if>
				
				<xsl:if test="Content/InternalTravel/TravelUrban/text() != ''">
					<h3>Urban travel</h3>
					<xsl:value-of select="Content/InternalTravel/TravelUrban/text()" disable-output-escaping="yes"/>
				</xsl:if>
				
			<h2>Rail</h2>
				<xsl:if test="Content/InternalTravel/Rail/text() != ''">
					<xsl:value-of select="Content/InternalTravel/Rail/text()" disable-output-escaping="yes"/>
				</xsl:if>
				
				<xsl:if test="Content/InternalTravel/RailNote/text() != ''">
					<h3>RailNote</h3>
					<xsl:value-of select="Content/InternalTravel/RailNote/text()" disable-output-escaping="yes"/>
				</xsl:if>

				<xsl:if test="Content/InternalTravel/RailPasses/text() != ''">
					<h3>Rail Passes</h3>
					<xsl:value-of select="Content/InternalTravel/RailPasses/text()" disable-output-escaping="yes"/>
				</xsl:if>



				<xsl:if test="Content/InternalTravel/Water/text() != ''">
			<h2>Water</h2>
					<xsl:value-of select="Content/InternalTravel/Water/text()" disable-output-escaping="yes"/>
				</xsl:if>
				
				<xsl:if test="Content/InternalTravel/WaterNote/text() != ''">
					<h3>Water note</h3>
					<xsl:value-of select="Content/InternalTravel/WaterNote/text()" disable-output-escaping="yes"/>
				</xsl:if>
       	</xsl:template>
</xsl:stylesheet>