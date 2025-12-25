<?xml version="1.0" encoding="UTF-8"?>
<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform" xmlns:fn="http://www.w3.org/2005/xpath-functions" exclude-result-refixes="fn">
  <xsl:output method="html" />
  <xsl:param name="id"></xsl:param>
       	<xsl:template match="//Region">
			<h1>Things to see and do in <xsl:value-of select="@title"/></h1>
				<xsl:value-of select="Content/Sightseeing/SightseeingIntro" disable-output-escaping="yes"/>
                    
                    
				<h2>Attractions in <xsl:value-of select="@title"/></h2>
                <xsl:value-of select="Content/Sightseeing/SightseeingIntro" disable-output-escaping="yes"/>

				<xsl:apply-templates select="Content/Sightseeing/MustSees/MustSee" mode="mustseeItem">
                    <xsl:sort select="@title"/>
				</xsl:apply-templates>

				<h2>Tourist offices</h2>
				<xsl:for-each select="Content/Sightseeing/TouristOffice/TouristOffice">
					<h3><xsl:value-of select="@title"/></h3>
                    <xsl:if test="./Address/text() !=''">
						<b>Address: </b>
							<span>
                            <xsl:if test="./Address/Address1/text() != ''">
								<xsl:value-of select="./Address/Address1/text()" disable-output-escaping="yes"/>,
                            </xsl:if>
                            <xsl:if test="./Address/Address2/text() != ''">    
								<xsl:value-of select="./Address/Address2/text()" disable-output-escaping="yes"/>,
                            </xsl:if>
                            <xsl:if test="./Address/City/text() != ''">
								<xsl:value-of select="./Address/City/text()" disable-output-escaping="yes"/>,
                            </xsl:if>
							<xsl:value-of select="./Address/Postcode/text()" disable-output-escaping="yes"/>
							</span><br/>
                     </xsl:if>
                     <xsl:if test="./Telephone/text() != ''">	
						<b>Telephone: </b><xsl:value-of select="./Telephone/text()"/><br/>
                     </xsl:if>
                     <xsl:if test="./Website/text() != ''">	
						<b>Website: </b>
							<a>
								<xsl:attribute name="href">
									<xsl:value-of select="./Website/text()" disable-output-escaping="yes"/>
								</xsl:attribute>
								<xsl:value-of select="./Website/text()" disable-output-escaping="yes"/>
							</a><br/>
                      </xsl:if>
                      <xsl:if test="./OpeningTimes/text() != ''">
						<b>Opening times: </b><xsl:value-of select="./OpeningTimes/text()" disable-output-escaping="yes"/>
                      </xsl:if>
					</xsl:for-each>



     </xsl:template>

	<xsl:template match="Content/Sightseeing/MustSees/MustSee" mode="mustseeItem">
				<xsl:for-each select=".">
					<h3><xsl:value-of select="@title"/></h3>
					<xsl:value-of select="Body/text()" disable-output-escaping="yes"/>
				</xsl:for-each>

       	</xsl:template>
</xsl:stylesheet>