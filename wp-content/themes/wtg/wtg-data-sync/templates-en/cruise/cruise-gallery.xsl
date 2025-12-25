<?xml version="1.0" encoding="UTF-8"?>
<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform" xmlns:fn="http://www.w3.org/2005/xpath-functions" exclude-result-refixes="fn">
  <xsl:output method="html" />
  <xsl:param name="id"></xsl:param>
       		<xsl:template match="//Cruise">
			<h1>Images of <xsl:value-of select="@title"/></h1>
			 <xsl:for-each select="Content/Images/Image">
                <h2><xsl:value-of select="Caption/text()"/></h2>
               <xsl:element name="img">
                   <xsl:attribute name="src">
				    https://worldtravelguide.net/<xsl:value-of select="HeroImage/Filepath/text()"/>
                    </xsl:attribute>
            <xsl:attribute name="width">
				   	  100%
              </xsl:attribute>
                   <xsl:attribute name="alt">
				    <xsl:value-of select="Caption/text()"/>
                    </xsl:attribute>
                    <xsl:attribute name="width">100%
	                </xsl:attribute>     
                </xsl:element>
				<p>Source: <xsl:value-of select="Source"/></p>
				<p>Copyright: <xsl:value-of select="Copyright"/></p>
 
            </xsl:for-each>	 	
       	</xsl:template> 
</xsl:stylesheet>