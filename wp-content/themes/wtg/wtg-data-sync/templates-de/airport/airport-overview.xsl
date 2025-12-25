<?xml version="1.0" encoding="UTF-8"?>
<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform" xmlns:fn="http://www.w3.org/2005/xpath-functions" exclude-result-refixes="fn">
  <xsl:output method="html" />
  <xsl:param name="id"></xsl:param>
       	<xsl:template match="//Airport">
			<h1>Über<xsl:value-of select="@title"/> (<xsl:value-of select="Content/General/Code/text()"/>)</h1>
				
				
				<div itemprop="text">
					<xsl:value-of select="Content/General/Intro/text()" disable-output-escaping="yes"/>
					
					<xsl:if test="Content/General/AirportNews/text() != ''">
						<h3>Aktuelles:</h3>
						<xsl:value-of select="Content/General/AirportNews/text()" disable-output-escaping="yes"/>
					</xsl:if>
					
					<xsl:if test="Content/General/Information/text() != ''">
						<h3>Informationen:</h3>
						<xsl:value-of select="Content/General/Information/text()" disable-output-escaping="yes"/>
					</xsl:if>
					
					<xsl:if test="Content/General/Website/text() != ''">
						<h3>Internetseite: </h3>
						<a>
							<xsl:attribute name="href">
								<xsl:value-of select="Content/General/Website/text()" disable-output-escaping="yes"/>
							</xsl:attribute>
							<xsl:value-of select="Content/General/Website/text()" disable-output-escaping="yes"/>
						</a><br/>
					</xsl:if>
					
					
					<xsl:if test="Content/General/DrivingDirections/text() != ''">
						<h3>Wegbeschreibung:</h3>
						<xsl:value-of select="Content/General/DrivingDirections/text()" disable-output-escaping="yes"/>
					</xsl:if>
					
					<xsl:if test="Content/General/TransferTerminals/text() != ''">
						<h3>Transfer zwischen den Terminals:</h3>
						<xsl:value-of select="Content/General/TransferTerminals/text()" disable-output-escaping="yes"/>
					</xsl:if>
					
					<div class="keyfacts">
						<div class="advice-icon"></div>
						<h4>Flughafeninformationen</h4>
						
						<xsl:if test="Content/General/Code/text() != ''">
							<div class="row info">
								<div class="col-md-4 col-xs-4">IATA-Flughafencode:</div>
								<div class="col-md-8 col-xs-8"><xsl:value-of select="Content/General/Code/text()" disable-output-escaping="yes"/></div>
							</div>
						</xsl:if>
						
						<xsl:if test="Content/General/Website/text() != ''">
							<div class="row info">
								<div class="col-md-4 col-xs-4">Adresse:</div>
								<div class="col-md-8 col-xs-8">
								<span>
									<xsl:value-of select="Content/General/Address/Address1/text()" disable-output-escaping="yes"/>,
									<xsl:value-of select="Content/General/Address/Address2/text()" disable-output-escaping="yes"/>,
									<xsl:value-of select="Content/General/Address/City/text()" disable-output-escaping="yes"/>,
									<xsl:value-of select="Content/General/Address/Postcode/text()" disable-output-escaping="yes"/>
								</span>
								</div>
							</div>
						</xsl:if>
						
						<xsl:if test="Content/General/Location/text() != ''">
							<div class="row info">
								<div class="col-md-4 col-xs-4">Lage:</div>
								<div class="col-md-8 col-xs-8"><xsl:value-of select="Content/General/Location/text()" disable-output-escaping="yes"/></div>
							</div>
						</xsl:if>
						
						<xsl:if test="Content/General/NumberOfTerminals/text() != ''">
							<div class="row info">
								<div class="col-md-4 col-xs-4">Anzahl der Terminals:</div>
								<div class="col-md-8 col-xs-8"><xsl:value-of select="Content/General/NumberOfTerminals/text()" disable-output-escaping="yes"/></div>
							</div>
						</xsl:if>
						
						<xsl:if test="Content/General/Telephone/text() != ''">
							<div class="row info">
								<div class="col-md-4 col-xs-4">Telefon:</div>
								<div class="col-md-8 col-xs-8"><xsl:value-of select="Content/General/Telephone/text()" disable-output-escaping="yes"/></div>
							</div>
						</xsl:if>
						
					</div>
					
					<h2>Öffentliche Verkehrsmitte</h2>
						<xsl:if test="Content/General/PublicTransportDesc/text() != ''">
							<xsl:value-of select="Content/General/PublicTransportDesc/text()" disable-output-escaping="yes"/>
						</xsl:if>
						
						<xsl:if test="Content/General/PublicTransportRoad/text() != ''">
							<h3>Öffentliche Verkehrsmittel - Straße:</h3>
							<xsl:value-of select="Content/General/PublicTransportRoad/text()" disable-output-escaping="yes"/>
						</xsl:if>
							
						<xsl:if test="Content/General/PublicTransportRail/text() != ''">
							<h3>Öffentliche Verkehrsmittel - Bahn:</h3>
							<xsl:value-of select="Content/General/PublicTransportRail/text()" disable-output-escaping="yes"/>
						</xsl:if>
						
						<xsl:if test="Content/General/PublicTransportWater/text() != ''">
							<h3>Öffentliche Verkehrsmittel - Wasser:</h3>
							<xsl:value-of select="Content/General/PublicTransportWater/text()" disable-output-escaping="yes"/>
						</xsl:if>
						
						<xsl:if test="Content/General/PublicTransportAir/text() != ''">
							<h3>Öffentliche Verkehrsmittel - Luft:</h3>
							<xsl:value-of select="Content/General/PublicTransportAir/text()" disable-output-escaping="yes"/>
						</xsl:if>
					
					<h2>Einrichtungen im Terminal</h2>
					
						<xsl:if test="Content/General/FacilitiesMoney/text() != ''">
							<h3>Geld:</h3>
							<xsl:value-of select="Content/General/FacilitiesMoney/text()" disable-output-escaping="yes"/>
						</xsl:if>
					
						<xsl:if test="Content/General/Communication/text() != ''">
							<h3>Kommunikationsmittel:</h3>
							<xsl:value-of select="Content/General/Communication/text()" disable-output-escaping="yes"/>
						</xsl:if>
							
						<xsl:if test="Content/General/FacilitiesFood/text() != ''">
							<h3>Gastronomie:</h3>
							<xsl:value-of select="Content/General/FacilitiesFood/text()" disable-output-escaping="yes"/>
						</xsl:if>
							
						<xsl:if test="Content/General/FacilitiesShopping/text() != ''">
							<h3>Einkaufen:</h3>
							<xsl:value-of select="Content/General/FacilitiesShopping/text()" disable-output-escaping="yes"/>
						</xsl:if>
							
						<xsl:if test="Content/General/FacilitiesLuggage/text() != ''">
							<h3>Gepäck:</h3>
							<xsl:value-of select="Content/General/FacilitiesLuggage/text()" disable-output-escaping="yes"/>
						</xsl:if>
							
						<xsl:if test="Content/General/FacilitiesOther/text() != ''">
							<h3>Sonstige Einrichtungen:</h3>
							<xsl:value-of select="Content/General/FacilitiesOther/text()" disable-output-escaping="yes"/>
						</xsl:if>
							
					<h2>Flughafeneinrichtungen</h2>
						<xsl:if test="Content/General/ConerenceAndBusiness/text() != ''">
							<h3>Konferenz- und Tagungsräume:</h3>
							<xsl:value-of select="Content/General/ConerenceAndBusiness/text()" disable-output-escaping="yes"/>
						</xsl:if>
							
						<xsl:if test="Content/General/DisabledFacilities/text() != ''">
							<h3>Einrichtungen für die Barrierefreiheit:</h3>
							<xsl:value-of select="Content/General/DisabledFacilities/text()" disable-output-escaping="yes"/>
						</xsl:if>
							
						<xsl:if test="Content/General/CarParking/text() != ''">
							<h3>Parkplätze:</h3>
							<xsl:value-of select="Content/General/CarParking/text()" disable-output-escaping="yes"/>
						</xsl:if>
							
						<xsl:if test="Content/General/CarRental/text() != ''">
							<h3>Autoverleih:</h3>
							<xsl:value-of select="Content/General/CarRental/text()" disable-output-escaping="yes"/>
						</xsl:if>
				</div>
				
				
       	</xsl:template>
		
</xsl:stylesheet>
