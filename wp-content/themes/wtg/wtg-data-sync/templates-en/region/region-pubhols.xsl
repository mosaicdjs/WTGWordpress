<?xml version="1.0" encoding="UTF-8"?>
<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform" xmlns:fn="http://www.w3.org/2005/xpath-functions" exclude-result-refixes="fn">
  <xsl:output method="html" />
  <xsl:param name="id"></xsl:param>
       	<xsl:template match="//Region">
			<h1><xsl:value-of select="@title"/> Public Holidays</h1>
				<b><i class="publicholidays">Below are listed Public Holidays in <xsl:value-of select="@title"/></i></b>
					<xsl:for-each select="Content/PublicHolidays/PublicHolidayTable/PublicHolidayRow">
					  <xsl:if test="./StartDate/text() != ''">
						<div>
							<xsl:variable name="test1" select="./StartDate" />
							<xsl:variable name="month" select="substring($test1, 6,2)" />
							<xsl:variable name="day" select="substring($test1, 9,2)" />
							<xsl:variable name="year" select ="substring($test1, 0,5)"/>
							<h3><xsl:value-of select="@title"/></h3>
					

							<xsl:if test="$month = '01'">
								<xsl:value-of select="concat($day,' January ',$year)"></xsl:value-of>
							</xsl:if>	

							<xsl:if test="$month = '02'">
								<xsl:value-of select="concat($day,' February ',$year)"></xsl:value-of>
							</xsl:if>	

							<xsl:if test="$month = '03'">
								<xsl:value-of select="concat($day,' March ',$year)"></xsl:value-of>
							</xsl:if>	

							<xsl:if test="$month = '04'">
								<xsl:value-of select="concat($day,' April ',$year)"></xsl:value-of>
							</xsl:if>	

							<xsl:if test="$month = '05'">
								<xsl:value-of select="concat($day,' May ',$year)"></xsl:value-of>
							</xsl:if>	

							<xsl:if test="$month = '06'">
								<xsl:value-of select="concat($day,' June ',$year)"></xsl:value-of>
							</xsl:if>	

							<xsl:if test="$month = '07'">
								<xsl:value-of select="concat($day,' July ',$year)"></xsl:value-of>
							</xsl:if>	

							<xsl:if test="$month = '08'">
								<xsl:value-of select="concat($day,' August ',$year)"></xsl:value-of>
							</xsl:if>	

							<xsl:if test="$month = '09'">
								<xsl:value-of select="concat($day,' September ',$year)"></xsl:value-of>
							</xsl:if>	

							<xsl:if test="$month = '10'">
								<xsl:value-of select="concat($day,' October ',$year)"></xsl:value-of>
							</xsl:if>	

							<xsl:if test="$month = '11'">
								<xsl:value-of select="concat($day,' November ',$year)"></xsl:value-of>
							</xsl:if>	

							<xsl:if test="$month = '12'">
								<xsl:value-of select="concat($day,' December ',$year)"></xsl:value-of>
							</xsl:if>	
							<xsl:if test="./EndDate/text() != ''">
							 to  
							<xsl:variable name="test1e" select="./EndDate" />
							<xsl:variable name="monthe" select="substring($test1e, 6,2)" />
							<xsl:variable name="daye" select="substring($test1e, 9,2)" />
							<xsl:variable name="yeare" select ="substring($test1e, 0,5)"/>
							<xsl:if test="$monthe = '01'">
								<xsl:value-of select="concat($daye,' January ',$yeare)"></xsl:value-of>
							</xsl:if>	

							<xsl:if test="$monthe = '02'">
								<xsl:value-of select="concat($daye,' February ',$yeare)"></xsl:value-of>
							</xsl:if>	

							<xsl:if test="$monthe = '03'">
								<xsl:value-of select="concat($daye,' March ',$yeare)"></xsl:value-of>
							</xsl:if>	

							<xsl:if test="$monthe = '04'">
								<xsl:value-of select="concat($daye,' April ',$yeare)"></xsl:value-of>
							</xsl:if>	

							<xsl:if test="$monthe = '05'">
								<xsl:value-of select="concat($daye,' May ',$yeare)"></xsl:value-of>
							</xsl:if>	

							<xsl:if test="$monthe = '06'">
								<xsl:value-of select="concat($daye,' June ',$yeare)"></xsl:value-of>
							</xsl:if>	

							<xsl:if test="$monthe = '07'">
								<xsl:value-of select="concat($daye,' July ',$yeare)"></xsl:value-of>
							</xsl:if>	

							<xsl:if test="$monthe = '08'">
								<xsl:value-of select="concat($daye,' August ',$yeare)"></xsl:value-of>
							</xsl:if>	

							<xsl:if test="$monthe = '09'">
								<xsl:value-of select="concat($daye,' September ',$yeare)"></xsl:value-of>
							</xsl:if>	

							<xsl:if test="$monthe = '10'">
								<xsl:value-of select="concat($daye,' October ',$yeare)"></xsl:value-of>
							</xsl:if>	

							<xsl:if test="$monthe = '11'">
								<xsl:value-of select="concat($daye,' November ',$yeare)"></xsl:value-of>
							</xsl:if>	

							<xsl:if test="$monthe = '12'">
								<xsl:value-of select="concat($daye,' December ',$yeare)"></xsl:value-of>
							</xsl:if>	
								
							</xsl:if>
							<xsl:if test="./TBC/text() = '1'">
								<b>Date to be confirmed: </b>yes
							</xsl:if>
							
							<xsl:if test="./Note/text() != ''">
								<p>Note: <xsl:value-of select="./Note/text()" disable-output-escaping="yes"/></p>
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
