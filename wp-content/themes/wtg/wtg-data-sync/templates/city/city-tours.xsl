<?xml version="1.0" encoding="UTF-8"?>
<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform" xmlns:fn="http://www.w3.org/2005/xpath-functions" exclude-result-refixes="fn">
  <xsl:output method="html" />
  <xsl:param name="id"></xsl:param>
       	<xsl:template match="//City">
			<h1><xsl:value-of select="@title"/> Touren und Ausflüge</h1>
			
				<h2><xsl:value-of select="@title"/> touren</h2>
				
					<xsl:for-each select="Content/Tours/Tour">
						<div>
							<h3><xsl:value-of select="@title"/></h3>
							<xsl:if test="./Content/General/Body/text() != ''">
								<xsl:value-of select="./Content/General/Body/text()" disable-output-escaping="yes"/>
							</xsl:if>
							<xsl:if test="./Content/General/Telephone/text() != ''">
								<b>Tel: </b><xsl:value-of select="./Content/General/Telephone/text()" disable-output-escaping="yes"/><br/>
							</xsl:if>
							<xsl:if test="./Content/General/Website/text() != ''">
								<b>Internetseite: </b>
								<a>
									<xsl:attribute name="href">
										<xsl:value-of select="./Content/General/Website/text()" disable-output-escaping="yes"/>
									</xsl:attribute>
									<xsl:value-of select="./Content/General/Website/text()" disable-output-escaping="yes"/>
								</a><br/>
							</xsl:if>
						</div>
					</xsl:for-each>
				
				
				<h2><xsl:value-of select="@title"/> ausflüge</h2>
				
					<xsl:for-each select="Content/Excursions/Excursion">
						<div>
							<h3><xsl:value-of select="@title"/></h3>
							<xsl:if test="./Content/General/Body/text() != ''">
								<xsl:value-of select="./Content/General/Body/text()" disable-output-escaping="yes"/>
							</xsl:if>
							<xsl:if test="./Content/General/Telephone/text() != ''">
								<b>Tel: </b><xsl:value-of select="./Content/General/Telephone/text()" disable-output-escaping="yes"/><br/>
							</xsl:if>
							<xsl:if test="./Content/General/Website/text() != ''">
								<b>Internetseite: </b>
								<a>
									<xsl:attribute name="href">
										<xsl:value-of select="./Content/General/Website/text()" disable-output-escaping="yes"/>
									</xsl:attribute>
									<xsl:value-of select="./Content/General/Website/text()" disable-output-escaping="yes"/>
								</a><br/>
							</xsl:if>
						</div>
					</xsl:for-each>
					
       	</xsl:template>
</xsl:stylesheet>