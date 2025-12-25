<?xml version="1.0" encoding="UTF-8"?>
<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform" xmlns:fn="http://www.w3.org/2005/xpath-functions" exclude-result-refixes="fn">
  <xsl:output method="html" />
  <xsl:param name="id"></xsl:param>
       	<xsl:template match="//City">
			<h1>Restaurants in <xsl:value-of select="@title"/></h1>
			<xsl:if test="Content/Restaurants/Restaurants/text() != ''">
				<xsl:value-of select="Content/Restaurants/Restaurants/text()" disable-output-escaping="yes"/>
			</xsl:if>
			
			<h2>Expensive</h2>
			<xsl:apply-templates select="Content/Restaurants/Restaurant" mode="restaurantItem">
				<xsl:sort select="@title" />
				<xsl:with-param name="type">Expensive</xsl:with-param>
			</xsl:apply-templates>
			
			<h2>Moderate</h2>
			<xsl:apply-templates select="Content/Restaurants/Restaurant" mode="restaurantItem">
				<xsl:sort select="@title" />
				<xsl:with-param name="type">Moderate</xsl:with-param>
			</xsl:apply-templates>
			
			<h2>Cheap</h2>
			<xsl:apply-templates select="Content/Restaurants/Restaurant" mode="restaurantItem">
				<xsl:sort select="@title" />
				<xsl:with-param name="type">Cheap</xsl:with-param>
			</xsl:apply-templates>
			
       	</xsl:template>
		
		<xsl:template match="Content/Restaurants/Restaurant" mode="restaurantItem">
			<xsl:param name="type"></xsl:param>
			
				<xsl:for-each select=".">
				<xsl:if test="./Content/General/Taxonomy/RestaurantType/text() = $type">
					<div>
						<b><h3><xsl:value-of select="@title"/></h3></b>
						<b>Cuisine: </b><xsl:value-of select="./Content/General/Cuisine/text()"/><br/>
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