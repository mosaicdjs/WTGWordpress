<?xml version="1.0" encoding="UTF-8"?>
<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform" xmlns:fn="http://www.w3.org/2005/xpath-functions" exclude-result-refixes="fn">
  <xsl:output method="html" />
  <xsl:param name="id"></xsl:param>
       	<xsl:template match="//Region">
			<h1>Mobilität vor Ort<xsl:value-of select="@title"/></h1>
			<h2>Flugreisen</h2>
				<xsl:if test="Content/InternalTravel/Air/text() != ''">
					<xsl:value-of select="Content/InternalTravel/Air/text()" disable-output-escaping="yes"/>
				</xsl:if>
					
				<xsl:if test="Content/InternalTravel/FlightTimes/text() != ''">
					<h3>Flugdauer</h3>
					<xsl:value-of select="Content/InternalTravel/FlightTimes/text()" disable-output-escaping="yes"/>
				</xsl:if>
				
				<xsl:if test="Content/InternalTravel/AirPasses/text() != ''">
					<h3>Air-Pässe</h3>
					<xsl:value-of select="Content/InternalTravel/AirPasses/text()" disable-output-escaping="yes"/>
				</xsl:if>
				
				<xsl:if test="Content/InternalTravel/DepartureTax/text() != ''">
					<h3>Abflugsteuer</h3>
					<xsl:value-of select="Content/InternalTravel/DepartureTax/text()" disable-output-escaping="yes"/>
				</xsl:if>
				
			<h2>Straßenverkehr</h2>
				<xsl:if test="Content/InternalTravel/Road/text() != ''">
						<xsl:value-of select="Content/InternalTravel/Road/text()" disable-output-escaping="yes"/>
				</xsl:if>
				
				<xsl:if test="Content/InternalTravel/SideOfRoad/text() != ''">
					<h3>Links- / Rechtsverkehr</h3>
					<xsl:choose>
						<xsl:when test="Content/InternalTravel/SideOfRoad/text() = 'r'">
						Rechtsverkehr
						</xsl:when>
						<xsl:otherwise>
						Linksverkehr
						</xsl:otherwise>
					</xsl:choose>
				</xsl:if>
				
				<xsl:if test="Content/InternalTravel/RoadQuality/text() != ''">
					<h3>Straßenqualität</h3>
					<xsl:value-of select="Content/InternalTravel/RoadQuality/text()" disable-output-escaping="yes"/>
				</xsl:if>
				
				<xsl:if test="Content/InternalTravel/CarHire/text() != ''">
					<h3>Autoverleih</h3>
					<xsl:value-of select="Content/InternalTravel/CarHire/text()" disable-output-escaping="yes"/>
				</xsl:if>
				
				<xsl:if test="Content/InternalTravel/Taxi/text() != ''">
					<h3>Taxi</h3>
					<xsl:value-of select="Content/InternalTravel/Taxi/text()" disable-output-escaping="yes"/>
				</xsl:if>
				
				<xsl:if test="Content/InternalTravel/Bike/text() != ''">
					<h3>Fahrrad</h3>
					<xsl:value-of select="Content/InternalTravel/Bike/text()" disable-output-escaping="yes"/>
				</xsl:if>
				
				<xsl:if test="Content/InternalTravel/Coach/text() != ''">
					<h3>Reisebus</h3>
					<xsl:value-of select="Content/InternalTravel/Coach/text()" disable-output-escaping="yes"/>
				</xsl:if>
				
				<xsl:if test="Content/InternalTravel/Regulations/text() != ''">
					<h3>Bestimmungen</h3>
					<xsl:value-of select="Content/InternalTravel/Regulations/text()" disable-output-escaping="yes"/>
				</xsl:if>
				
				<xsl:if test="Content/InternalTravel/BreakdownServices/text() != ''">
					<h3>Pannendienste</h3>
					<xsl:value-of select="Content/InternalTravel/BreakdownServices/text()" disable-output-escaping="yes"/>
				</xsl:if>
				
				<xsl:if test="Content/InternalTravel/Documentation/text() != ''">
					<h3>Unterlagen</h3>
					<xsl:value-of select="Content/InternalTravel/Documentation/text()" disable-output-escaping="yes"/>
				</xsl:if>
				
				<xsl:if test="Content/InternalTravel/RoadNote/text() != ''">
					<h3>Hinweise zum Fahren auf der Straße</h3>
					<xsl:value-of select="Content/InternalTravel/RoadNote/text()" disable-output-escaping="yes"/>
				</xsl:if>
				
				<xsl:if test="Content/InternalTravel/TravelUrban/text() != ''">
					<h3>In der Stadt unterwegs</h3>
					<xsl:value-of select="Content/InternalTravel/TravelUrban/text()" disable-output-escaping="yes"/>
				</xsl:if>
				
			<h2>Bahn</h2>
				<xsl:if test="Content/InternalTravel/Rail/text() != ''">
					<xsl:value-of select="Content/InternalTravel/Rail/text()" disable-output-escaping="yes"/>
				</xsl:if>
				
				<xsl:if test="Content/InternalTravel/RailNote/text() != ''">
					<h3>Hinweise zum Reisen mit der Bahn</h3>
					<xsl:value-of select="Content/InternalTravel/RailNote/text()" disable-output-escaping="yes"/>
				</xsl:if>

			<h2>Reisen auf dem Wasser</h2>
				<xsl:if test="Content/InternalTravel/Water/text() != ''">
					<xsl:value-of select="Content/InternalTravel/Water/text()" disable-output-escaping="yes"/>
				</xsl:if>
				
				<xsl:if test="Content/InternalTravel/WaterNote/text() != ''">
					<h3>Hinweise zum Reisen auf dem Wasser</h3>
					<xsl:value-of select="Content/InternalTravel/WaterNote/text()" disable-output-escaping="yes"/>
				</xsl:if>
       	</xsl:template>
</xsl:stylesheet>