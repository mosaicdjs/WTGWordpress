<?xml version="1.0" encoding="UTF-8"?>
<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform" xmlns:fn="http://www.w3.org/2005/xpath-functions" exclude-result-refixes="fn">
  <xsl:output method="html" />
  <xsl:param name="id"></xsl:param>
       	<xsl:template match="//City">
			<h1>Things to see in <xsl:value-of select="@title"/></h1>

			
			<h2>Attractions</h2>
			
				<xsl:apply-templates select="Content/Attractions/CityAttractions/Attraction" mode="attractionItem">
					<xsl:with-param name="importance">5</xsl:with-param>
				</xsl:apply-templates>
				
				<xsl:apply-templates select="Content/Attractions/CityAttractions/Attraction" mode="attractionItem">
					<xsl:with-param name="importance">3</xsl:with-param>
				</xsl:apply-templates>
				
				<xsl:apply-templates select="Content/Attractions/CityAttractions/Attraction" mode="attractionItem">
					<xsl:with-param name="importance">1</xsl:with-param>
				</xsl:apply-templates>
			
						
			<h2>Tourist Offices</h2>
			
			<xsl:for-each select="Content/Sightseeing/TouristInformationCentres/Centre">
				<div>
					<h3><xsl:value-of select="@title"/></h3>
					<b>Address: </b>
						<span>
							<xsl:value-of select="./Address/Address1/text()" disable-output-escaping="yes"/>,
							<xsl:value-of select="./Address/Address2/text()" disable-output-escaping="yes"/>,
							<xsl:value-of select="./Address/City/text()" disable-output-escaping="yes"/>,
							<xsl:value-of select="./Address/Postcode/text()" disable-output-escaping="yes"/>
						</span><br/>
					<b>Telephone: </b><xsl:value-of select="./Telephone/text()"/><br/>
					<b>Opening times: </b><xsl:value-of select="./OpeningTimes/text()" disable-output-escaping="yes"/>
					<b>Website: </b>
						<a>
							<xsl:attribute name="href">
								<xsl:value-of select="./Website/text()" disable-output-escaping="yes"/>
							</xsl:attribute>
							<xsl:value-of select="./Website/text()" disable-output-escaping="yes"/>
						</a><br/>
					<xsl:value-of select="./Body/text()" disable-output-escaping="yes"/>
				</div>
			</xsl:for-each>
			
			<xsl:if test="Content/Sightseeing/TouristPasses/text() != ''">
				<h2>Tourist passes</h2>
				<xsl:value-of select="Content/Sightseeing/TouristPasses/text()" disable-output-escaping="yes"/>
			</xsl:if>


       	</xsl:template>
		
		<xsl:template match="Content/Attractions/CityAttractions/Attraction" mode="attractionItem">
			<xsl:param name="importance"></xsl:param>
			
				<xsl:for-each select=".">
				<xsl:if test="./Importance/text() = $importance">
					<div>
						<xsl:choose>
							<xsl:when test="./Importance/text() = '5'">
								<xsl:attribute name="class">high</xsl:attribute>
							</xsl:when>
							<xsl:when test="./Importance/text() = '3'">
								<xsl:attribute name="class">medium</xsl:attribute>
							</xsl:when>
							<xsl:when test="./Importance/text() = '1'">
								<xsl:attribute name="class">low</xsl:attribute>
							</xsl:when>
						</xsl:choose>
						<b><h3><xsl:value-of select="@title"/></h3></b>
						<xsl:value-of select="./Body/text()" disable-output-escaping="yes"/>
						<b>Address: </b>
							<span>
								<xsl:value-of select="./Address/Address1/text()" disable-output-escaping="yes"/>,
								<xsl:value-of select="./Address/Address2/text()" disable-output-escaping="yes"/>,
								<xsl:value-of select="./Address/City/text()" disable-output-escaping="yes"/>,
								<xsl:value-of select="./Address/Postcode/text()" disable-output-escaping="yes"/>
							</span><br/>
						<b>Telephone: </b><xsl:value-of select="./Telephone/text()"/><br/>
						<b>Opening times: </b><xsl:value-of select="./OpeningTimes/text()" disable-output-escaping="yes"/>
						<b>Website: </b>
							<a>
								<xsl:attribute name="href">
									<xsl:value-of select="./Website/text()" disable-output-escaping="yes"/>
								</xsl:attribute>
								<xsl:value-of select="./Website/text()" disable-output-escaping="yes"/>
							</a><br/>
						<b>Admission Fees: </b><xsl:value-of select="./AdmissionFees/text()" disable-output-escaping="yes"/>
						<b>Disabled Access: </b>
						<xsl:choose>
							<xsl:when test="./DisabledAccess/text() = '1'">Yes</xsl:when>
							<xsl:otherwise>No</xsl:otherwise>
						</xsl:choose>
						<br/>
						<b>UNESCO: </b>
						<xsl:choose>
							<xsl:when test="./Unesco/text() = '1'">Yes</xsl:when>
							<xsl:otherwise>No</xsl:otherwise>
						</xsl:choose>
						<br/>
					</div>
				</xsl:if>
				</xsl:for-each>
		</xsl:template>
		
</xsl:stylesheet>