<?xml version="1.0" encoding="UTF-8"?>
<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform" xmlns:fn="http://www.w3.org/2005/xpath-functions" exclude-result-refixes="fn">
  <xsl:output method="html" />
  <xsl:param name="id"></xsl:param>
       	<xsl:template match="//City">
			<h1><xsl:value-of select="@title"/> Nightlife</h1>
			<xsl:if test="Content/Nightlife/Nightlife/text() != ''">
				<xsl:value-of select="Content/Nightlife/Nightlife/text()" disable-output-escaping="yes"/>
			</xsl:if>
			
			<h2>Bars in <xsl:value-of select="@title"/></h2>
			<xsl:apply-templates select="Content/Nightlife/CityNightlifeItem" mode="nightlifeItem">
				<xsl:with-param name="type">Bars</xsl:with-param>
			</xsl:apply-templates>
			
			<h2>Clubs in <xsl:value-of select="@title"/></h2>
			<xsl:apply-templates select="Content/Nightlife/CityNightlifeItem" mode="nightlifeItem">
				<xsl:with-param name="type">Clubs</xsl:with-param>
			</xsl:apply-templates>
			
			<h2>Live music in <xsl:value-of select="@title"/></h2>
			<xsl:apply-templates select="Content/Nightlife/CityNightlifeItem" mode="nightlifeItem">
				<xsl:with-param name="type">Live Music</xsl:with-param>
			</xsl:apply-templates>
			
			<h2>Classical music in <xsl:value-of select="@title"/></h2>
			<xsl:apply-templates select="Content/Nightlife/CityNightlifeItem" mode="nightlifeItem">
				<xsl:with-param name="type">Classical Music</xsl:with-param>
			</xsl:apply-templates>
			
			<h2>Dance in <xsl:value-of select="@title"/></h2>
			<xsl:apply-templates select="Content/Nightlife/CityNightlifeItem" mode="nightlifeItem">
				<xsl:with-param name="type">Dance</xsl:with-param>
			</xsl:apply-templates>
			
			<h2>Theatres in <xsl:value-of select="@title"/></h2>
			<xsl:apply-templates select="Content/Nightlife/CityNightlifeItem" mode="nightlifeItem">
				<xsl:with-param name="type">Theatre</xsl:with-param>
			</xsl:apply-templates>
			
			<h2>Music and Dance in <xsl:value-of select="@title"/></h2>
			<xsl:apply-templates select="Content/Nightlife/CityNightlifeItem" mode="nightlifeItem">
				<xsl:with-param name="type">Music and Dance</xsl:with-param>
			</xsl:apply-templates>
			
			<h2>Culture in <xsl:value-of select="@title"/></h2>
			<xsl:apply-templates select="Content/Nightlife/CityNightlifeItem" mode="nightlifeItem">
				<xsl:with-param name="type">Culture</xsl:with-param>
			</xsl:apply-templates>
			
       	</xsl:template>
		
		<xsl:template match="Content/Nightlife/CityNightlifeItem" mode="nightlifeItem">
			<xsl:param name="type"></xsl:param>
				<xsl:for-each select=".">
				<xsl:if test="./Content/General/Taxonomy/CityNightlifeItems/text() = $type">
					<div>
						<b><h3><xsl:value-of select="@title"/></h3></b>
						<xsl:value-of select="./Content/General/Body/text()" disable-output-escaping="yes"/>
						<b>Address: </b>
							<span>
								<xsl:value-of select="./Content/General/Address/Address1/text()" disable-output-escaping="yes"/>,
								<xsl:value-of select="./Content/General/Address/Address2/text()" disable-output-escaping="yes"/>,
								<xsl:value-of select="./Content/General/Address/City/text()" disable-output-escaping="yes"/>,
								<xsl:value-of select="./Content/General/Address/Postcode/text()" disable-output-escaping="yes"/>
							</span><br/>
						<b>Telephone: </b><xsl:value-of select="./Content/General/Telephone/text()"/><br/>
						<xsl:if test="./Content/General/Website/text() != ''">
							<b>Website: </b>
							<a>
								<xsl:attribute name="href">
									<xsl:value-of select="./Content/General/Website/text()" disable-output-escaping="yes"/>
								</xsl:attribute>
								<xsl:value-of select="./Content/General/Website/text()" disable-output-escaping="yes"/>
							</a><br/>
						</xsl:if>
					</div>
				</xsl:if>
			</xsl:for-each>
		</xsl:template>
		
</xsl:stylesheet>