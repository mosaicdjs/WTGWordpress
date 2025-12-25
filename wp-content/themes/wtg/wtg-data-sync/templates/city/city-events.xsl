<?xml version="1.0" encoding="UTF-8"?>
<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform" xmlns:fn="http://www.w3.org/2005/xpath-functions" exclude-result-refixes="fn">
  <xsl:output method="html" />
  <xsl:param name="id"></xsl:param>
       	<xsl:template match="//City">
			<h1><xsl:value-of select="@title"/> Events</h1>
				
				<xsl:if test="Content/Events/EventIntro/text() != ''">
					<xsl:value-of select="Content/Events/EventIntro/text()" disable-output-escaping="yes"/>
				</xsl:if>
				
				<xsl:if test="Content/Events/EventBody/text() != ''">
					<xsl:value-of select="Content/Events/EventBody/text()" disable-output-escaping="yes"/>
				</xsl:if>
				
			<xsl:for-each select="Content/Events/CityEvents/Event">
								<xsl:sort select="FromDate" />
				<div>
					<h3><xsl:value-of select="@title"/></h3>
					<xsl:if test="./Body/text() != ''">
						<xsl:value-of select="Body/text()" disable-output-escaping="yes"/>
					</xsl:if>
					
					<xsl:choose>
						<xsl:when test="DateTbc/text() = '1'">
							<xsl:apply-templates select="FromDate" mode="cleanDate">
								<xsl:with-param name="label">Date (to be confirmed)</xsl:with-param>
							</xsl:apply-templates>
						</xsl:when>
						<xsl:when test="DateTbc/text() = '0'">
							<xsl:variable name="test1" select="FromDate" />
							<xsl:variable name="month" select="substring($test1, 6,2)" />
							<xsl:variable name="day" select="substring($test1, 9,2)" />
							<xsl:variable name="year" select ="substring($test1, 0,5)"/>
							<b>Date: </b>
							
							<xsl:if test="$month = '01'">
								<xsl:value-of select="concat($year,'-January-',$day)"></xsl:value-of>
							</xsl:if>	

							<xsl:if test="$month = '02'">
								<xsl:value-of select="concat($year,'-February-',$day)"></xsl:value-of>
							</xsl:if>	

							<xsl:if test="$month = '03'">
								<xsl:value-of select="concat($year,'-March-',$day)"></xsl:value-of>
							</xsl:if>	

							<xsl:if test="$month = '04'">
								<xsl:value-of select="concat($year,'-April-',$day)"></xsl:value-of>
							</xsl:if>	

							<xsl:if test="$month = '05'">
								<xsl:value-of select="concat($year,'-May-',$day)"></xsl:value-of>
							</xsl:if>	

							<xsl:if test="$month = '06'">
								<xsl:value-of select="concat($year,'-June-',$day)"></xsl:value-of>
							</xsl:if>	

							<xsl:if test="$month = '07'">
								<xsl:value-of select="concat($year,'-July-',$day)"></xsl:value-of>
							</xsl:if>	

							<xsl:if test="$month = '08'">
								<xsl:value-of select="concat($year,'-August-',$day)"></xsl:value-of>
							</xsl:if>	

							<xsl:if test="$month = '09'">
								<xsl:value-of select="concat($year,'-September-',$day)"></xsl:value-of>
							</xsl:if>	

							<xsl:if test="$month = '10'">
								<xsl:value-of select="concat($year,'-October-',$day)"></xsl:value-of>
							</xsl:if>	

							<xsl:if test="$month = '11'">
								<xsl:value-of select="concat($year,'-November-',$day)"></xsl:value-of>
							</xsl:if>	

							<xsl:if test="$month = '12'">
								<xsl:value-of select="concat($year,'-December-',$day)"></xsl:value-of>
							</xsl:if>	
						</xsl:when>
					</xsl:choose>
					<br/>
					<xsl:if test="VenueName/text() != ''">
						<b>Venue: </b><xsl:value-of select="VenueName/text()" disable-output-escaping="yes"/><br/>
					</xsl:if>
					
					<xsl:if test="Website/text() != ''">
						<b>Website: </b><xsl:value-of select="Website/text()" disable-output-escaping="yes"/><br/>
					</xsl:if>
					
					<xsl:if test="Cost/text() != ''">
						<b>Cost: </b><xsl:value-of select="./Cost/text()" disable-output-escaping="yes"/><br/>
					</xsl:if>
				</div>
			</xsl:for-each>
       	</xsl:template>
		
		<xsl:template match="FromDate" mode="cleanDate">
			<xsl:param name="label"/>
			<strong><xsl:value-of select="$label"/>: </strong>
			<xsl:choose>
				<xsl:when test="contains(./text(), 'T')">
					<xsl:value-of select="substring-before(./text(), 'T')" disable-output-escaping="yes"/><br/>
				</xsl:when>
				<xsl:when test="contains(./text(), ' ')">
					<xsl:value-of select="substring-before(./text(), ' ')" disable-output-escaping="yes"/><br/>
				</xsl:when>
				<xsl:otherwise>
					<xsl:value-of select="./text()" disable-output-escaping="yes"/><br/>
				</xsl:otherwise>
			</xsl:choose>
		
		</xsl:template>
		
		
</xsl:stylesheet>
