<?xml version="1.0" encoding="UTF-8"?>
<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform" xmlns:fn="http://www.w3.org/2005/xpath-functions" exclude-result-refixes="fn">
  <xsl:output method="html" />
  <xsl:param name="id"></xsl:param>
       	<xsl:template match="//SkiResort">
			<h1><xsl:value-of select="@title"/> ski resort</h1>
				<h2>About <xsl:value-of select="@title"/></h2>
					<xsl:value-of select="Content/Overview/Intro/text()" disable-output-escaping="yes"/>
					
					<xsl:if test="Content/Overview/Location/text() != ''">
						<h3>Location:</h3>
						<xsl:value-of select="Content/Overview/Location/text()" disable-output-escaping="yes"/>
					</xsl:if>
					
					<xsl:if test="Content/Overview/Website/text() != ''">
						<h3>Website: </h3>
						<a>
							<xsl:attribute name="href">
								<xsl:value-of select="Content/Overview/Website/text()" disable-output-escaping="yes"/>
							</xsl:attribute>
							<xsl:value-of select="Content/Overview/Website/text()" disable-output-escaping="yes"/>
						</a><br/>
					</xsl:if>
					
					<div class="keyfacts">
						<div class="advice-icon"></div>
						<h4>Resort Data:</h4>
						
						<xsl:if test="Content/Data/BeginnerRuns/text() != ''">
							<div class="row info">
								<div class="col-md-4 col-xs-4">Beginner Runs:</div>
								<div class="col-md-8 col-xs-8"><xsl:value-of select="Content/Data/BeginnerRuns/text()" disable-output-escaping="yes"/></div>
							</div>
						</xsl:if>
						
						<xsl:if test="Content/Data/IntermediateRuns/text() != ''">
							<div class="row info">
								<div class="col-md-4 col-xs-4">Intermediate Runs:</div>
								<div class="col-md-8 col-xs-8"><xsl:value-of select="Content/Data/IntermediateRuns/text()" disable-output-escaping="yes"/></div>
							</div>
						</xsl:if>
						
						<xsl:if test="Content/Data/Runs/text() != ''">
							<div class="row info">
								<div class="col-md-4 col-xs-4">Runs:</div>
								<div class="col-md-8 col-xs-8"><xsl:value-of select="Content/Data/Runs/text()" disable-output-escaping="yes"/></div>
							</div>
						</xsl:if>
						
						<xsl:if test="Content/Data/Lifts/text() != ''">
							<div class="row info">
								<div class="col-md-4 col-xs-4">Lifts:</div>
								<div class="col-md-8 col-xs-8"><xsl:value-of select="Content/Data/Lifts/text()" disable-output-escaping="yes"/></div>
							</div>
						</xsl:if>
						
						<xsl:if test="Content/Data/Chairs/text() != ''">
							<div class="row info">
								<div class="col-md-4 col-xs-4">Chairs:</div>
								<div class="col-md-8 col-xs-8"><xsl:value-of select="Content/Data/Chairs/text()" disable-output-escaping="yes"/></div>
							</div>
						</xsl:if>
						
						<xsl:if test="Content/Data/Drags/text() != ''">
							<div class="row info">
								<div class="col-md-4 col-xs-4">Drags:</div>
								<div class="col-md-8 col-xs-8"><xsl:value-of select="Content/Data/Drags/text()" disable-output-escaping="yes"/></div>
							</div>
						</xsl:if>
						
						<xsl:if test="Content/Data/GondolaCableCars/text() != ''">
							<div class="row info">
								<div class="col-md-4 col-xs-4">Gondola Cable Cars:</div>
								<div class="col-md-8 col-xs-8"><xsl:value-of select="Content/Data/GondolaCableCars/text()" disable-output-escaping="yes"/></div>
							</div>
						</xsl:if>
						
						<xsl:if test="Content/Data/Parks/text() != ''">
							<div class="row info">
								<div class="col-md-4 col-xs-4">Parks:</div>
								<div class="col-md-8 col-xs-8"><xsl:value-of select="Content/Data/Parks/text()" disable-output-escaping="yes"/></div>
							</div>
						</xsl:if>
						
						<xsl:if test="Content/Data/Pipes/text() != ''">
							<xsl:if test="Content/Data/Pipes/text() != '0'">
							<div class="row info">
								<div class="col-md-4 col-xs-4">Pipes:</div>
								<div class="col-md-8 col-xs-8"><xsl:value-of select="Content/Data/Pipes/text()" disable-output-escaping="yes"/></div>
							</div>
							</xsl:if>
						</xsl:if>
						
					</div>

				<h2>Slopes</h2>
					<xsl:for-each select="Content/General/Slopes/Slope">
						<div>
							<h3><xsl:value-of select="@title"/></h3>
							<b>Resort Elevation: </b><xsl:value-of select="./ResortElevation/text()" disable-output-escaping="yes"/>m<br/>
							<b>Top Elevation: </b><xsl:value-of select="./TopElevation/text()" disable-output-escaping="yes"/>m<br/>
							<b>Base Elevation: </b><xsl:value-of select="./BaseElevation/text()" disable-output-escaping="yes"/>m<br/>
						</div>
					</xsl:for-each>
				
				<h2>On the slopes</h2>
					<xsl:if test="Content/Slopes/HitTheSlopes/text() != ''">
						<xsl:value-of select="Content/Slopes/HitTheSlopes/text()" disable-output-escaping="yes"/>
					</xsl:if>
					
       	</xsl:template>
		
</xsl:stylesheet>