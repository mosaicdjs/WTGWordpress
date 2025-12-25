<?xml version="1.0" encoding="UTF-8"?>
<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform" xmlns:fn="http://www.w3.org/2005/xpath-functions" exclude-result-refixes="fn">
  <xsl:output method="html" />
  <xsl:param name="id"></xsl:param>
       	<xsl:template match="//City">
			<h1>Travel to <xsl:value-of select="@title"/></h1>
				
				
					<xsl:if test="Content/Flights/Intro/text() != ''">
				<h2>Flying to <xsl:value-of select="@title"/></h2>
						<xsl:value-of select="Content/Flights/Intro/text()" disable-output-escaping="yes"/>
					</xsl:if>
					
					<xsl:if test="Content/Flights/Times/text() != ''">
						<h3>Flight times</h3>
						<xsl:value-of select="Content/Flights/Times/text()" disable-output-escaping="yes"/>
					</xsl:if>
<!--					
					<xsl:if test="Content/Flights/CityAirports/text() != ''">
						<h3>Airports</h3>
						<xsl:value-of select="Content/Flights/CityAirports/text()" disable-output-escaping="yes"/>
					</xsl:if>
					
					-->
					<xsl:if test="Content/Road/Summary/text() != ''">
				<h2>Travel by road</h2>
						<xsl:value-of select="Content/Road/Summary/text()" disable-output-escaping="yes"/>
					</xsl:if>
					
					<xsl:if test="Content/Road/Emergency/text() != ''">
						<h3>Emergency breakdown services</h3>
						<xsl:value-of select="Content/Road/Emergency/text()" disable-output-escaping="yes"/>
					</xsl:if>
				
					<xsl:if test="Content/Road/Routes/text() != ''">
						<h3>Routes</h3>
						<xsl:value-of select="Content/Road/Routes/text()" disable-output-escaping="yes"/>
					</xsl:if>
					
					<xsl:if test="Content/Road/Coaches/text() != ''">
						<h3>Coaches</h3>
						<xsl:value-of select="Content/Road/Coaches/text()" disable-output-escaping="yes"/>
					</xsl:if>
				
					<xsl:if test="Content/Road/Driving/text() != ''">
						<h3>Driving times</h3>
						<xsl:value-of select="Content/Road/Driving/text()" disable-output-escaping="yes"/>
					</xsl:if>
					
					<xsl:if test="Content/Road/TimeToCity/text() != ''">
						<h3>Time to city</h3>
						<xsl:value-of select="Content/Road/TimeToCity/text()" disable-output-escaping="yes"/>
					</xsl:if>
				
					<xsl:if test="Content/Rail/Services/text() != ''">
				<h2>Travel by Rail</h2>
						<h3>Services</h3>
						<xsl:value-of select="Content/Rail/Services/text()" disable-output-escaping="yes"/>
					</xsl:if>

					<xsl:if test="Content/Rail/Operators/text() != ''">
						<h3>Operators</h3>
						<xsl:value-of select="Content/Rail/Operators/text()" disable-output-escaping="yes"/>
					</xsl:if>

					
					<xsl:if test="Content/Rail/RailPasses/text() != ''">
						<h3>Rail Passes</h3>
						<xsl:value-of select="Content/InternationalTravel/RailPasses/text()" disable-output-escaping="yes"/>
					</xsl:if>
					
					<xsl:if test="Content/Rail/JourneyTimes/text() != ''">
						<h3>Journey times</h3>
						<xsl:value-of select="Content/Rail/JourneyTimes/text()" disable-output-escaping="yes"/>
					</xsl:if>
					
					<xsl:if test="Content/Rail/Transfer/text() != ''">
						<h3>Transfer</h3>
						<xsl:value-of select="Content/Rail/Transfer/text()" disable-output-escaping="yes"/>
					</xsl:if>
					
				
					<xsl:if test="Content/Water/Intro/text() != ''">
				<h2>Travel by boat</h2>
						<xsl:value-of select="Content/Water/Intro/text()" disable-output-escaping="yes"/>
					</xsl:if>
					
					<xsl:if test="Content/Water/Ferry/text() != ''">
						<h3>Ferry operators</h3>
						<xsl:value-of select="Content/Water/Ferry/text()" disable-output-escaping="yes"/>
					</xsl:if>
					
					<xsl:if test="Content/Water/NearestPort/text() != ''">
						<h3>Nearest port</h3>
						<xsl:value-of select="Content/Water/NearestPort/text()" disable-output-escaping="yes"/>
					</xsl:if>
					
					<xsl:if test="Content/Water/TimeToCity/text() != ''">
						<h3>Time to city</h3>
						<xsl:value-of select="Content/Water/TimeToCity/text()" disable-output-escaping="yes"/>
					</xsl:if>
					
					<xsl:if test="Content/Water/Transfer/text() != ''">
						<h3>Transfer</h3>
						<xsl:value-of select="Content/Water/Transfer/text()" disable-output-escaping="yes"/>
					</xsl:if>
					
					<xsl:if test="Content/Water/TransferTime/text() != ''">
						<h3>Transfer time</h3>
						<xsl:value-of select="Content/Water/TransferTime/text()" disable-output-escaping="yes"/>
					</xsl:if>
					
					<xsl:if test="Content/Water/TransferDistance/text() != ''">
						<h3>Transfer distance</h3>
						<xsl:value-of select="Content/Water/TransferDistance/text()" disable-output-escaping="yes"/>
					</xsl:if>
					
									<xsl:if test="Content/Water/TransferNotes/text() != ''">
						<h3>Transfer info</h3>
						<xsl:value-of select="Content/Water/TransferNotes/text()" disable-output-escaping="yes"/>
					</xsl:if>
					
					<xsl:if test="Content/Water/PortWebsite/text() != ''">
						<h3>Port Website</h3>
						<xsl:value-of select="Content/Water/PorWebsite/text()" disable-output-escaping="yes"/>
					</xsl:if>
					
       	</xsl:template>
</xsl:stylesheet>