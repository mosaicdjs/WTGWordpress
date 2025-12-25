<?xml version="1.0" encoding="UTF-8"?>
<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform" xmlns:fn="http://www.w3.org/2005/xpath-functions" exclude-result-refixes="fn">
  <xsl:output method="html" />
  <xsl:param name="id"></xsl:param>
    <xsl:template match="//Cruise">
	    <h1><xsl:value-of select="@title"/> Travel Guide</h1>
		<h2>About <xsl:value-of select="@title"/></h2>
		<xsl:value-of select="Content/General/Overview/text()" disable-output-escaping="yes"/>
        <h3>Sightseeing:</h3>
		<xsl:value-of select="Content/General/Sightseeing/text()" disable-output-escaping="yes"/>
        <h3>Tourist Information Centres</h3>
		<xsl:value-of select="Content/General/TouristInformationCentres/text()" disable-output-escaping="yes"/>	
        <h3>Shopping:</h3>
		<xsl:value-of select="Content/General/Shopping/text()" disable-output-escaping="yes"/>						
        <h3>Restaurants</h3>
		<xsl:value-of select="Content/General/Restaurants/text()" disable-output-escaping="yes"/>						
        <h3>When to go:</h3>
		<xsl:value-of select="Content/General/WhenToGo/text()" disable-output-escaping="yes"/>						
        <h3>Nearest Destination:</h3>
		<xsl:value-of select="Content/General/NearestDestination/text()" disable-output-escaping="yes"/>						
        <h3>Transfer Distance:</h3>
		<xsl:value-of select="Content/General/Restaurants/text()" disable-output-escaping="yes"/>						
        <h3>Transfer Time</h3>
		<xsl:value-of select="Content/General/TransferTime/text()" disable-output-escaping="yes"/>						

    </xsl:template>
</xsl:stylesheet>