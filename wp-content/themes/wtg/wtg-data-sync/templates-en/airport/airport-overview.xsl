<?xml version="1.0" encoding="UTF-8"?>
<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform" xmlns:fn="http://www.w3.org/2005/xpath-functions" exclude-result-refixes="fn">
  <xsl:output method="html" />
  <xsl:param name="id"></xsl:param>
       	<xsl:template match="//Airport">
			<h1>About <xsl:value-of select="@title"/> (<xsl:value-of select="Content/General/Code/text()"/>)</h1>
				
				
				<div itemprop="text">
					<xsl:value-of select="Content/General/Intro/text()" disable-output-escaping="yes"/>
				
					<xsl:if test="Content/General/AddressText/text() != ''">
						<h3>Address:</h3>
						<xsl:value-of select="Content/General/AddressText/text()" disable-output-escaping="yes"/>
					</xsl:if>
					
					<xsl:if test="Content/General/AirportNews/text() != ''">
						<h3>Airport news:</h3>
						<xsl:value-of select="Content/General/AirportNews/text()" disable-output-escaping="yes"/>
					</xsl:if>
					
					<xsl:if test="Content/General/Information/text() != ''">
						<h3>Information:</h3>
						<xsl:value-of select="Content/General/Information/text()" disable-output-escaping="yes"/>
					</xsl:if>
					
					<xsl:if test="Content/General/Website/text() != ''">
						<h3>Website: </h3>
						<a>
							<xsl:attribute name="href">
								<xsl:value-of select="Content/General/Website/text()" disable-output-escaping="yes"/>
							</xsl:attribute>
							<xsl:value-of select="Content/General/Website/text()" disable-output-escaping="yes"/>
						</a><br/>
					</xsl:if>
					
					
					<xsl:if test="Content/General/DrivingDirections/text() != ''">
						<h3>Driving directions:</h3>
						<xsl:value-of select="Content/General/DrivingDirections/text()" disable-output-escaping="yes"/>
					</xsl:if>
					
					<xsl:if test="Content/General/TransferTerminals/text() != ''">
						<h3>Transfer between terminals:</h3>
						<xsl:value-of select="Content/General/TransferTerminals/text()" disable-output-escaping="yes"/>
					</xsl:if>
					
					<xsl:if test="Content/General/FlightTimes/text() != ''">
								<h3>Flight Times</h3>
								<xsl:value-of select="Content/General/FlightTimes/text()" disable-output-escaping="yes"/>
					</xsl:if>
					
					<div class="keyfacts">
						<div class="advice-icon"></div>
						<h4>Airport Info</h4>
						
						<xsl:if test="Content/General/Code/text() != ''">
							<div class="row info">
								<div class="col-md-4 col-xs-4">Code:</div>
								<div class="col-md-8 col-xs-8"><xsl:value-of select="Content/General/Code/text()" disable-output-escaping="yes"/></div>
							</div>
						</xsl:if>
						
						<xsl:if test="Content/General/Website/text() != ''">
							<div class="row info">
								<div class="col-md-4 col-xs-4">Address:</div>
								<div class="col-md-8 col-xs-8">
								<span>
									<xsl:value-of select="Content/General/Address/Address1/text()" disable-output-escaping="yes"/><br />
									<xsl:value-of select="Content/General/Address/Address2/text()" disable-output-escaping="yes"/><br />
									<xsl:value-of select="Content/General/Address/City/text()" disable-output-escaping="yes"/><br />
									<xsl:value-of select="Content/General/Address/Postcode/text()" disable-output-escaping="yes"/>
								</span>
								</div>
							</div>
						</xsl:if>
						
						<xsl:if test="Content/General/Location/text() != ''">
							<div class="row info">
								<div class="col-md-4 col-xs-4">Location:</div>
								<div class="col-md-8 col-xs-8"><xsl:value-of select="Content/General/Location/text()" disable-output-escaping="yes"/></div>
							</div>
						</xsl:if>
						
						<xsl:if test="Content/General/NumberOfTerminals/text() != ''">
							<div class="row info">
								<div class="col-md-4 col-xs-4">No. of terminals:</div>
								<div class="col-md-8 col-xs-8"><xsl:value-of select="Content/General/NumberOfTerminals/text()" disable-output-escaping="yes"/></div>
							</div>
						</xsl:if>
						
						<xsl:if test="Content/General/Telephone/text() != ''">
							<div class="row info">
								<div class="col-md-4 col-xs-4">Telephone:</div>
								<div class="col-md-8 col-xs-8"><xsl:value-of select="Content/General/Telephone/text()" disable-output-escaping="yes"/></div>
							</div>
						</xsl:if>
						
						<xsl:if test="Content/General/TimeZones/text() != ''">
							<div class="row info">
								<div class="col-md-4 col-xs-4">Time Zone:</div>
								<div class="col-md-8 col-xs-8">
								<xsl:value-of select="Content/General/TimeZones/TimeZone/StdTzNameValue/text()" disable-output-escaping="yes"/><br />
								GMT <xsl:value-of select="Content/General/TimeZones/TimeZone/StandardBiasValue/text()" disable-output-escaping="yes"/>	
							</div>
							</div>
						</xsl:if>
						
					</div>
					
					<h2>Public Transport</h2>
						<xsl:if test="Content/General/PublicTransportDesc/text() != ''">
							<xsl:value-of select="Content/General/PublicTransportDesc/text()" disable-output-escaping="yes"/>
						</xsl:if>
						
						<xsl:if test="Content/General/PublicTransportRoad/text() != ''">
							<h3>Public transport road:</h3>
							<xsl:value-of select="Content/General/PublicTransportRoad/text()" disable-output-escaping="yes"/>
						</xsl:if>
							
						<xsl:if test="Content/General/PublicTransportRail/text() != ''">
							<h3>Public transport rail:</h3>
							<xsl:value-of select="Content/General/PublicTransportRail/text()" disable-output-escaping="yes"/>
						</xsl:if>
						
						<xsl:if test="Content/General/PublicTransportWater/text() != ''">
							<h3>Public transport water:</h3>
							<xsl:value-of select="Content/General/PublicTransportWater/text()" disable-output-escaping="yes"/>
						</xsl:if>
						
						<xsl:if test="Content/General/PublicTransportAir/text() != ''">
							<h3>Public transport air:</h3>
							<xsl:value-of select="Content/General/PublicTransportAir/text()" disable-output-escaping="yes"/>
						</xsl:if>
					
					<h2>Terminal facilities</h2>
					
						<xsl:if test="Content/General/FacilitiesMoney/text() != ''">
							<h3>Money:</h3>
							<xsl:value-of select="Content/General/FacilitiesMoney/text()" disable-output-escaping="yes"/>
						</xsl:if>
					
						<xsl:if test="Content/General/Communication/text() != ''">
							<h3>Communication:</h3>
							<xsl:value-of select="Content/General/Communication/text()" disable-output-escaping="yes"/>
						</xsl:if>
							
						<xsl:if test="Content/General/FacilitiesFood/text() != ''">
							<h3>Food:</h3>
							<xsl:value-of select="Content/General/FacilitiesFood/text()" disable-output-escaping="yes"/>
						</xsl:if>
							
						<xsl:if test="Content/General/FacilitiesShopping/text() != ''">
							<h3>Shopping:</h3>
							<xsl:value-of select="Content/General/FacilitiesShopping/text()" disable-output-escaping="yes"/>
						</xsl:if>
							
						<xsl:if test="Content/General/FacilitiesLuggage/text() != ''">
							<h3>Luggage:</h3>
							<xsl:value-of select="Content/General/FacilitiesLuggage/text()" disable-output-escaping="yes"/>
						</xsl:if>
							
						<xsl:if test="Content/General/FacilitiesOther/text() != ''">
							<h3>Other:</h3>
							<xsl:value-of select="Content/General/FacilitiesOther/text()" disable-output-escaping="yes"/>
						</xsl:if>
							
					<h2>Airport facilities</h2>
						<xsl:if test="Content/General/ConferenceAndBusiness/text() != ''">
							<h3>Conference and business:</h3>
							<xsl:value-of select="Content/General/ConferenceAndBusiness/text()" disable-output-escaping="yes"/>
						</xsl:if>

						<xsl:if test="Content/General/FacilitiesComms/text() != ''">
							<h3>Communication Facilities:</h3>
							<xsl:value-of select="Content/General/FacilitiesComms/text()" disable-output-escaping="yes"/>
						</xsl:if>
							
						<xsl:if test="Content/General/DisabledFacilities/text() != ''">
							<h3>Disabled facilities:</h3>
							<xsl:value-of select="Content/General/DisabledFacilities/text()" disable-output-escaping="yes"/>
						</xsl:if>
							
						<xsl:if test="Content/General/CarParking/text() != ''">
							<h3>Car parking:</h3>
							<xsl:value-of select="Content/General/CarParking/text()" disable-output-escaping="yes"/>
						</xsl:if>
							
						<xsl:if test="Content/General/CarRental/text() != ''">
							<h3>Car rental:</h3>
							<xsl:value-of select="Content/General/CarRental/text()" disable-output-escaping="yes"/>
						</xsl:if>
				</div>
				
				
       	</xsl:template>
		
</xsl:stylesheet>