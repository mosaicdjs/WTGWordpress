<?xml version="1.0" encoding="UTF-8"?>
<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform" xmlns:fn="http://www.w3.org/2005/xpath-functions" exclude-result-refixes="fn">
  <xsl:output method="html" />
  <xsl:param name="id"></xsl:param>
       	<xsl:template match="//SkiResort">
			<h1><xsl:value-of select="@title"/> Information</h1>
					
					<xsl:if test="Content/ApresSki/ApresSki/text() != ''">
				<h2>Apres-ski</h2>
						<xsl:value-of select="Content/ApresSki/ApresSki/text()" disable-output-escaping="yes"/>
					</xsl:if>
					
					<xsl:if test="Content/ApresSki/EatingOut/text() != ''">
						<h3>Eating out</h3>
						<xsl:value-of select="Content/ApresSki/EatingOut/text()" disable-output-escaping="yes"/>
					</xsl:if>
					
					
				<h2>Resort Information</h2>
					<xsl:if test="Content/Info/BeyondTheSlopes/text() != ''">
						<h3>Beyond the slopes</h3>
						<xsl:value-of select="Content/Info/BeyondTheSlopes/text()" disable-output-escaping="yes"/>
					</xsl:if>
					
					<xsl:if test="Content/Info/FamilyFun/text() != ''">
						<h3>Family fun</h3>
						<xsl:value-of select="Content/Info/FamilyFun/text()" disable-output-escaping="yes"/>
					</xsl:if>
					
					<xsl:if test="Content/Info/RetailTherapy/text() != ''">
						<h3>Retail therapy</h3>
						<xsl:value-of select="Content/Info/RetailTherapy/text()" disable-output-escaping="yes"/>
					</xsl:if>
					
					<xsl:if test="Content/Info/SplashingOut/text() != ''">
						<h3>Splashing out</h3>
						<xsl:value-of select="Content/Info/SplashingOut/text()" disable-output-escaping="yes"/>
					</xsl:if>
					
				<h2>Hotels</h2>
					<xsl:if test="Content/Hotels/AccommodationIntro/text() != ''">
						<xsl:value-of select="Content/Hotels/AccommodationIntro/text()" disable-output-escaping="yes"/>
					</xsl:if>
					
					<h3>Luxury</h3>
					<xsl:apply-templates select="Content/Hotels/Hotel" mode="hotelItem">
						<xsl:with-param name="type">Luxury</xsl:with-param>
					</xsl:apply-templates>
					
					<h3>Moderate</h3>
					<xsl:apply-templates select="Content/Hotels/Hotel" mode="hotelItem">
						<xsl:with-param name="type">Moderate</xsl:with-param>
					</xsl:apply-templates>
					
					<h3>Cheap</h3>
					<xsl:apply-templates select="Content/Hotels/Hotel" mode="hotelItem">
						<xsl:with-param name="type">Cheap</xsl:with-param>
					</xsl:apply-templates>
       	</xsl:template>
		
		<xsl:template match="Content/Hotels/Hotel" mode="hotelItem">
			<xsl:param name="type"></xsl:param>
				<xsl:for-each select=".">
				<xsl:if test="./Content/General/Taxonomy/HotelType/text() = $type">
					<div>
						<b><h4><xsl:value-of select="@title"/></h4></b>
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