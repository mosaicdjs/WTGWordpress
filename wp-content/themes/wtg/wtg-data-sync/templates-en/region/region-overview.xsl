<?xml version="1.0" encoding="UTF-8"?>
<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform" xmlns:fn="http://www.w3.org/2005/xpath-functions" exclude-result-refixes="fn">
  <xsl:output method="html" />
  <xsl:param name="id"></xsl:param>
       	<xsl:template match="//Region">
			<h1 itemprop="headline"><xsl:value-of select="@title"/> travel guide</h1>
			<div itemprop="text">
				<h2>About <xsl:value-of select="@title"/></h2>
				<xsl:value-of select="Content/Overview/Overview/text()" disable-output-escaping="yes"/>
			
				<div class="keyfacts">
					<div class="key-icon"></div>
					<h4>Key facts</h4>
					<xsl:if test="Content/General/Area/text() != ''">
						<div class="row info">
							<div class="col-md-4 col-xs-4">Area:</div>
							<div class="col-md-8 col-xs-8">
								<xsl:value-of select="Content/General/Area/text()" disable-output-escaping="yes"/>
							</div>
						</div>
					</xsl:if>
					<xsl:if test="Content/General/Population/text() != ''">
						<div class="row info">
							<div class="col-md-4 col-xs-4">Population:</div>
							<div class="col-md-8 col-xs-8">
								<xsl:value-of select="Content/General/Population/text()" disable-output-escaping="yes"/>
							</div>
						</div>
					</xsl:if>
					<xsl:if test="Content/General/PopulationDensity/text() != ''">
						<div class="row info">
							<div class="col-md-4 col-xs-4">Population density:</div>
							<div class="col-md-8 col-xs-8">
							<xsl:value-of select="Content/General/PopulationDensity/text()" disable-output-escaping="yes"/>
							</div>
						</div>
					</xsl:if>
					<xsl:if test="Content/General/Capital/text() != ''">
					<div class="row info">
						<div class="col-md-4 col-xs-4">Capital:</div>
						<div class="col-md-8 col-xs-8">
						<xsl:value-of select="Content/General/Capital/text()" disable-output-escaping="yes"/>
						</div>
					</div>
					</xsl:if>
					<xsl:if test="Content/General/Government/text() != ''">
					<div class="row info">
						<div class="col-md-4 col-xs-4">Government:</div>
						<div class="col-md-8 col-xs-8">
						<xsl:value-of select="Content/General/Government/text()" disable-output-escaping="yes"/>
						</div>
					</div>
					</xsl:if>
					<xsl:if test="Content/General/HeadOfState/text() != ''">
					<div class="row info">
						<div class="col-md-4 col-xs-4">Head of state:</div>
						<div class="col-md-8 col-xs-8">
						<xsl:value-of select="Content/General/HeadOfState/text()" disable-output-escaping="yes"/>
						</div>
					</div>
					</xsl:if>
					<xsl:if test="Content/General/HeadOfGovernment/text() != ''">
					<div class="row info">
						<div class="col-md-4 col-xs-4">Head of government:</div>
						<div class="col-md-8 col-xs-8">
						<xsl:value-of select="Content/General/HeadOfGovernment/text()" disable-output-escaping="yes"/>
						</div>
					</div>
					</xsl:if>
					<xsl:if test="Content/General/Eletricity/text() != ''">
					<div class="row info">
						<div class="col-md-4 col-xs-4">Electricity:</div>
						<div class="col-md-8 col-xs-8">
						<xsl:value-of select="Content/General/Eletricity/text()" disable-output-escaping="yes"/>
						</div>
					</div>
					</xsl:if>
				</div>
				<xsl:if test="Content/TravelAdvice/TravelAdvice/text() != ''">
<!--				<div class="travel_advice">
					<div class="advice-icon"></div>
					<h4>Travel Advice</h4>
					<h4>COVID-19 Exceptional Travel Advisory Notice</h4>
						As countries respond to the COVID-19 pandemic, including travel and border restrictions, <strong>the FCO advises against all but essential international travel. </strong> Any country or area may restrict travel without notice.
					<xsl:value-of select="Content/TravelAdvice/TravelAdvice/text()" disable-output-escaping="yes"/>
				</div> -->
				</xsl:if>
				
				<xsl:if test="Content/TravelAdvice/BaggageRules/text() != ''">
					<h3>Baggage Rules</h3>
				<xsl:value-of select="Content/TravelAdvice/BaggageRules/text()" disable-output-escaping="yes"/>
				</xsl:if>
				
			</div>
       	</xsl:template>

</xsl:stylesheet>

