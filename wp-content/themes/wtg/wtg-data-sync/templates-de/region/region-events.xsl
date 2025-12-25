<?xml version="1.0" encoding="UTF-8"?>
<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform" xmlns:fn="http://www.w3.org/2005/xpath-functions" exclude-result-refixes="fn">
  <xsl:output method="html" />
  <xsl:param name="id"></xsl:param>
       	<xsl:template match="//Region">
			<h1><xsl:value-of select="@title"/> Veranstaltungen</h1>
			<xsl:for-each select="Content/Events/RegionEvents/Event">
				<xsl:sort select="FromDate" />
				<div>
					<h3><xsl:value-of select="@title"/></h3>
					<xsl:if test="./Body/text() != ''">
						<xsl:value-of select="Body/text()" disable-output-escaping="yes"/>
					</xsl:if>
					
					<xsl:choose>
						<xsl:when test="./DateTbc/text() = '1'">
							<xsl:apply-templates select="FromDate" mode="cleanDate">
								<xsl:with-param name="label">Datum (steht noch nicht fest)</xsl:with-param>
							</xsl:apply-templates>
						</xsl:when>
						<xsl:when test="./DateTbc/text() = '0'">
							<xsl:variable name="test1" select="StartDate" />
							<xsl:variable name="month" select="substring($test1, 6,2)" />
							<xsl:variable name="day" select="substring($test1, 9,2)" />
							<xsl:variable name="year" select ="substring($test1, 0,5)"/>


							<xsl:apply-templates select="FromDate" mode="cleanDate">
								
								<xsl:with-param name="label">Datum:</xsl:with-param>
							</xsl:apply-templates>
						</xsl:when>
					</xsl:choose>
					
					<xsl:if test="./VenueName/text() != ''">
						<b>Ort: </b><xsl:value-of select="VenueName/text()" disable-output-escaping="yes"/><br/>
					</xsl:if>
					
					<xsl:if test="./Website/text() != ''">
						<b>Internetseite: </b><a>
							<xsl:attribute name="href">
								<xsl:value-of select="./Website" disable-output-escaping="yes"/>
							</xsl:attribute>
							<xsl:value-of select="./Website" disable-output-escaping="yes"/>
						</a><br/>
					</xsl:if>
					
					<xsl:if test="./Cost/text() != ''">
						<b>Preis: </b><xsl:value-of select="./Cost/text()" disable-output-escaping="yes"/><br/>
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