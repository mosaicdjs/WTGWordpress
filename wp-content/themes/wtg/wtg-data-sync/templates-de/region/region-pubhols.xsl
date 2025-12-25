<?xml version="1.0" encoding="UTF-8"?>
<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform" xmlns:fn="http://www.w3.org/2005/xpath-functions" exclude-result-refixes="fn">
  <xsl:output method="html" />
  <xsl:param name="id"></xsl:param>
       	<xsl:template match="//Region">
			<h1><xsl:value-of select="@title"/> Feiertage</h1>
				<b><i class="publicholidays">in <xsl:value-of select="@title"/></i></b>
					<xsl:for-each select="Content/PublicHolidays/PublicHolidayTable/PublicHolidayRow">
					  <xsl:if test="./StartDate/text() != ''">
						<div>
							<xsl:variable name="test1" select="./StartDate" />
							<xsl:variable name="month" select="substring($test1, 6,2)" />
							<xsl:variable name="day" select="substring($test1, 9,2)" />
							<xsl:variable name="year" select ="substring($test1, 0,5)"/>
							<h3><xsl:value-of select="@title"/></h3>
					

							<xsl:if test="$month = '01'">
								<xsl:value-of select="concat($year,'-Januar-',$day)"></xsl:value-of>
							</xsl:if>	

							<xsl:if test="$month = '02'">
								<xsl:value-of select="concat($year,'-Februar-',$day)"></xsl:value-of>
							</xsl:if>	

							<xsl:if test="$month = '03'">
								<xsl:value-of select="concat($year,'-März-',$day)"></xsl:value-of>
							</xsl:if>	

							<xsl:if test="$month = '04'">
								<xsl:value-of select="concat($year,'-April-',$day)"></xsl:value-of>
							</xsl:if>	

							<xsl:if test="$month = '05'">
								<xsl:value-of select="concat($year,'-Mai-',$day)"></xsl:value-of>
							</xsl:if>	

							<xsl:if test="$month = '06'">
								<xsl:value-of select="concat($year,'-Juni-',$day)"></xsl:value-of>
							</xsl:if>	

							<xsl:if test="$month = '07'">
								<xsl:value-of select="concat($year,'-Juli-',$day)"></xsl:value-of>
							</xsl:if>	


							<xsl:if test="$month = '08'">
								<xsl:value-of select="concat($year,'-August-',$day)"></xsl:value-of>
							</xsl:if>	

							<xsl:if test="$month = '09'">
								<xsl:value-of select="concat($year,'-September-',$day)"></xsl:value-of>
							</xsl:if>	

							<xsl:if test="$month = '10'">
								<xsl:value-of select="concat($year,'-Oktober-',$day)"></xsl:value-of>
							</xsl:if>	

							<xsl:if test="$month = '11'">
								<xsl:value-of select="concat($year,'-November-',$day)"></xsl:value-of>
							</xsl:if>	

							<xsl:if test="$month = '12'">
								<xsl:value-of select="concat($year,'-Dezember-',$day)"></xsl:value-of>
							</xsl:if>	
							<xsl:if test="./EndDate/text() != ''">
								<xsl:apply-templates select="./EndDate" mode="cleanDate">
									<xsl:with-param name="label">End</xsl:with-param>
								</xsl:apply-templates>
							</xsl:if>
							<xsl:if test="./TBC/text() = '1'">
								<b>Datum steht noch nicht fest: </b>jah
							</xsl:if>
						</div>
					  </xsl:if>
					</xsl:for-each>
       	</xsl:template>
	
		<xsl:template match="StartDate|EndDate" mode="cleanDate">
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
