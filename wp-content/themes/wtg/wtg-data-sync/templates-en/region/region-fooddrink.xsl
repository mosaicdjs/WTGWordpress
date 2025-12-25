<?xml version="1.0" encoding="UTF-8"?>
<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform" xmlns:fn="http://www.w3.org/2005/xpath-functions" exclude-result-refixes="fn">
  <xsl:output method="html" />
  <xsl:param name="id"></xsl:param>
       	<xsl:template match="//Region">
			<h1><xsl:value-of select="@title"/> Food and Drink</h1>
			<xsl:if test="Content/FoodAndDrink/Intro/text() != ''">
				<xsl:value-of select="Content/FoodAndDrink/Intro" disable-output-escaping="yes"/>
			</xsl:if>
			<xsl:if test="Content/FoodAndDrink/RegionalSpecialities/text() != ''">
				<h2>Specialities</h2>
				<xsl:value-of select="Content/FoodAndDrink/RegionalSpecialities" disable-output-escaping="yes"/>
			</xsl:if>
			<xsl:if test="Content/FoodAndDrink/ThingsToKnow/text() != ''">
				<h2>Things to know</h2>
				<xsl:value-of select="Content/FoodAndDrink/ThingsToKnow" disable-output-escaping="yes"/>
			</xsl:if>
			<xsl:if test="Content/FoodAndDrink/Tipping/text() != ''">
				<h2>Tipping</h2>
				<xsl:value-of select="Content/FoodAndDrink/Tipping" disable-output-escaping="yes"/>
			</xsl:if>
			<xsl:if test="Content/FoodAndDrink/DrinkingAge/text() != ''">
				<h2>Drinking age</h2>
				<xsl:value-of select="Content/FoodAndDrink/DrinkingAge" disable-output-escaping="yes"/>
			</xsl:if>
			<xsl:if test="Content/FoodAndDrink/RegionalDrinks/text() != ''">
				<h2>Regional drinks</h2>
				<xsl:value-of select="Content/FoodAndDrink/RegionalDrinks" disable-output-escaping="yes"/>
			</xsl:if>
       	</xsl:template>
</xsl:stylesheet>