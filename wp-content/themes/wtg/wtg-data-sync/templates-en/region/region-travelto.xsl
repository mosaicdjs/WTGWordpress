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
					
					<xsl:if test="Content/InternationalTravel/MainAirports/text() != ''">
						<h3>Main Airports</h3>
						<xsl:value-of select="Content/InternationalTravel/MainAirports/text()" disable-output-escaping="yes"/>
					</xsl:if>
					
					<xsl:if test= "Content/InternationalTravel/RegionAirports/text() != ''">
					<h3><strong>Airport Guides</strong></h3>
								<xsl:for-each select="Content/InternationalTravel/RegionAirports/Airport">
								<xsl:sort select="Code" />
										<div>
											<h3><xsl:value-of select="@title"/></h3>
											<strong>Code</strong><p><xsl:value-of select="./Content/General/Code" disable-output-escaping="yes" /></p>
											<strong>Location</strong><xsl:value-of select="./Content/General/Location/text()" disable-output-escaping="yes" />
											<strong>Telephone</strong><xsl:value-of select="./Content/General/Telephone/text()" disable-output-escaping="yes" />
											<strong>Address</strong>
												<xsl:value-of select="./Content/General/Address/Address1/text()" disable-output-escaping="yes" /><br />
												<xsl:value-of select="./Content/General/Address/Address2/text()" disable-output-escaping="yes" /><br />
												<xsl:value-of select="./Content/General/Address/City/text()" disable-output-escaping="yes" />
												<xsl:choose>
												<xsl:when test = "contains ( ./Content/General/Dst/WebsiteUrl/text(), 'block')"> </xsl:when>
												<xsl:otherwise>
												<xsl:if test= "./Content/General/Dst/WebsiteUrl/text() != ''">
												<a>
												<xsl:attribute name="href"><xsl:value-of select="./Content/General/Dst/WebsiteUrl/text()" disable-output-escaping="yes"/></xsl:attribute>
												<h4 style="text-align:right">Find out more ></h4
												></a>
												</xsl:if>
												</xsl:otherwise>
												</xsl:choose>

										</div>
								</xsl:for-each>
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

					<xsl:if test="Content/InternationalTravel/CruiseShips/text() != ''">
						<h3>Cruise ships</h3>
						<xsl:value-of select="Content/InternationalTravel/CruiseShips/text()" disable-output-escaping="yes"/>
					</xsl:if>

					<xsl:if test="Content/InternationalTravel/FerryOperators/text() != ''">
						<h3>Ferry operators</h3>
						<xsl:value-of select="Content/InternationalTravel/FerryOperators/text()" disable-output-escaping="yes"/>
					</xsl:if>
					
					
					<xsl:if test="Content/InternationalTravel/RiverRoutes/text() != ''">
						<h3>River Routes</h3>
						<xsl:value-of select="Content/InternationalTravel/RiverRoutes/text()" disable-output-escaping="yes"/>
					</xsl:if>
       	</xsl:template>
</xsl:stylesheet>