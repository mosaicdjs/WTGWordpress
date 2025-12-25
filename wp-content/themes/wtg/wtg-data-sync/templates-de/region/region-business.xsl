<?xml version="1.0" encoding="UTF-8"?>
<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform" xmlns:fn="http://www.w3.org/2005/xpath-functions" exclude-result-refixes="fn">
  <xsl:output method="html" />
  <xsl:param name="id"></xsl:param>
       	<xsl:template match="//Region">
			<h1><xsl:value-of select="@title"/>: Geschäftsetikette und Kommunikationsmittel</h1>
				<h2>Geschäftlich unterwegs in <xsl:value-of select="@title"/></h2>
				<xsl:if test="Content/Business/Etiquette/text() != ''">
					<xsl:value-of select="Content/Business/Etiquette/text()" disable-output-escaping="yes"/>
				</xsl:if>
				
					<xsl:if test="Content/Business/OfficeHours/text() != ''">
						<h3>Bürozeiten</h3>
						<xsl:value-of select="Content/Business/OfficeHours/text()" disable-output-escaping="yes"/>
					</xsl:if>
						
					<xsl:if test="Content/Business/Economy/text() != ''">
						<h3>Wirtschaft</h3>
						<xsl:value-of select="Content/Business/Economy/text()" disable-output-escaping="yes"/>
					</xsl:if>
					
					<xsl:if test="Content/Business/GDP/text() != ''">
						<h3>BIP</h3>
						<xsl:value-of select="Content/Business/GDP/text()" disable-output-escaping="yes"/>
					</xsl:if>
					
					<xsl:if test="Content/Business/MainExports/text() != ''">
						<h3>Hauptexportgüter</h3>
						<xsl:value-of select="Content/Business/MainExports/text()" disable-output-escaping="yes"/>
					</xsl:if>
						
					<xsl:if test="Content/Business/MainImports/text() != ''">
						<h3>Wichtigste Importe</h3>
						<xsl:value-of select="Content/Business/MainImports/text()" disable-output-escaping="yes"/>
					</xsl:if>
						
					<xsl:if test="Content/Business/MainTradePartners/text() != ''">
						<h3>Haupthandelspartner</h3>
						<xsl:value-of select="Content/Business/MainTradePartners/text()" disable-output-escaping="yes"/>
					</xsl:if>
					
				<h2>In Kontakt bleiben in <xsl:value-of select="@title"/></h2>
					<xsl:if test="Content/Communications/Telephone/text() != ''">
						<h3>Telefon</h3>
						<xsl:value-of select="Content/Communications/Telephone/text()" disable-output-escaping="yes"/>
					</xsl:if>
						
					<xsl:if test="Content/Communications/MobileTelephone/text() != ''">
						<h3>Mobiltelefone</h3>
						<xsl:value-of select="Content/Communications/MobileTelephone/text()" disable-output-escaping="yes"/>
					</xsl:if>
					
					<xsl:if test="Content/Communications/Internet/text() != ''">
						<h3>Internet</h3>
						<xsl:value-of select="Content/Communications/Internet/text()" disable-output-escaping="yes"/>
					</xsl:if>
					
					<xsl:if test="Content/Communications/Media/text() != ''">
						<h3>Medien</h3>
						<xsl:value-of select="Content/Communications/Media/text()" disable-output-escaping="yes"/>
					</xsl:if>
					
					<xsl:if test="Content/Communications/Post/text() != ''">
						<h3>Post</h3>
						<xsl:value-of select="Content/Communications/Post/text()" disable-output-escaping="yes"/>
					</xsl:if>
					
					
					<xsl:if test="Content/Communications/PostOfficeHours/text() != ''">
						<b>Post Öffnungszeiten</b><br/>
						<xsl:value-of select="Content/Communications/PostOfficeHours/text()" disable-output-escaping="yes"/>
					</xsl:if>
					
       	</xsl:template>
</xsl:stylesheet>