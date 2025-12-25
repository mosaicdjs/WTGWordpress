<?xml version="1.0" encoding="UTF-8"?>
<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform" xmlns:fn="http://www.w3.org/2005/xpath-functions" exclude-result-refixes="fn">
  <xsl:output method="html" />
  <xsl:param name="id"></xsl:param>
       	<xsl:template match="//City">
			<h1>Reisen nach <xsl:value-of select="@title"/></h1>
				
				
					<xsl:if test="Content/Flights/Intro/text() != ''">
				<h2>Nach  <xsl:value-of select="@title"/> fliegen</h2>
						<xsl:value-of select="Content/Flights/Intro/text()" disable-output-escaping="yes"/>
					</xsl:if>
					
					<xsl:if test="Content/Flights/Times/text() != ''">
						<h3>Flugdauer</h3>
						<xsl:value-of select="Content/Flights/Times/text()" disable-output-escaping="yes"/>
					</xsl:if>
					
					<xsl:if test="Content/Road/Summary/text() != ''">
				<h2>Anreise mit dem Pkw / Bus</h2>
						<xsl:value-of select="Content/Road/Summary/text()" disable-output-escaping="yes"/>
					</xsl:if>
					
					<xsl:if test="Content/Road/Emergency/text() != ''">
						<h3>Pannennotdienste</h3>
						<xsl:value-of select="Content/Road/Emergency/text()" disable-output-escaping="yes"/>
					</xsl:if>
				
					<xsl:if test="Content/Road/Routes/text() != ''">
						<h3>Routen</h3>
						<xsl:value-of select="Content/Road/Routes/text()" disable-output-escaping="yes"/>
					</xsl:if>
					
					<xsl:if test="Content/Road/Coaches/text() != ''">
						<h3>Reisebusse</h3>
						<xsl:value-of select="Content/Road/Coaches/text()" disable-output-escaping="yes"/>
					</xsl:if>
				
					<xsl:if test="Content/Road/Driving/text() != ''">
						<h3>Fahrtdauer</h3>
						<xsl:value-of select="Content/Road/Driving/text()" disable-output-escaping="yes"/>
					</xsl:if>
					
					<xsl:if test="Content/Road/TimeToCity/text() != ''">
						<h3>Fahrtdauer zur Stadt</h3>
						<xsl:value-of select="Content/Road/TimeToCity/text()" disable-output-escaping="yes"/>
					</xsl:if>
				
					<xsl:if test="Content/Rail/Services/text() != ''">
				<h2>Anreise mit der Bahn</h2>
						<h3>Zugverbindungen</h3>
						<xsl:value-of select="Content/Rail/Services/text()" disable-output-escaping="yes"/>
					</xsl:if>
					
					<xsl:if test="Content/InternationalTravel/RailPasses/text() != ''">
						<h3>Betreiber</h3>
						<xsl:value-of select="Content/InternationalTravel/RailPasses/text()" disable-output-escaping="yes"/>
					</xsl:if>
					
					<xsl:if test="Content/InternationalTravel/RailNote/text() != ''">
						<h3>Fahrtdauer</h3>
						<xsl:value-of select="Content/InternationalTravel/RailNote/text()" disable-output-escaping="yes"/>
					</xsl:if>
				
					<xsl:if test="Content/Water/Intro/text() != ''">
				<h2>Reisen auf dem Wasser</h2>
						<xsl:value-of select="Content/Water/Intro/text()" disable-output-escaping="yes"/>
					</xsl:if>
					
					<xsl:if test="Content/Water/Ferry/text() != ''">
						<h3>Fährenbetreiber</h3>
						<xsl:value-of select="Content/Water/Ferry/text()" disable-output-escaping="yes"/>
					</xsl:if>
					
					<xsl:if test="Content/Water/NearestPort/text() != ''">
						<h3>nächstgelegener Hafen</h3>
						<xsl:value-of select="Content/Water/NearestPort/text()" disable-output-escaping="yes"/>
					</xsl:if>
					
					<xsl:if test="Content/Water/TimeToCity/text() != ''">
						<h3>Fahrtdauer zur Stadt</h3>
						<xsl:value-of select="Content/Water/TimeToCity/text()" disable-output-escaping="yes"/>
					</xsl:if>
					
					<xsl:if test="Content/Water/Transfer/text() != ''">
						<h3>Transfer in die Stadt</h3>
						<xsl:value-of select="Content/Water/Transfer/text()" disable-output-escaping="yes"/>
					</xsl:if>
					
					<xsl:if test="Content/Water/TransferTime/text() != ''">
						<h3>Transferdauer</h3>
						<xsl:value-of select="Content/Water/TransferTime/text()" disable-output-escaping="yes"/>
					</xsl:if>
					
					<xsl:if test="Content/Water/TransferDistance/text() != ''">
						<h3>Transferstrecke</h3>
						<xsl:value-of select="Content/Water/TransferDistance/text()" disable-output-escaping="yes"/>
					</xsl:if>
       	</xsl:template>
</xsl:stylesheet>
