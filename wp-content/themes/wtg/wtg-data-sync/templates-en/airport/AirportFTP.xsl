<?xml version="1.0" encoding="UTF-8"?>
<xsl:transform version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform" xmlns:fn="http://www.w3.org/2005/xpath-functions">
 <xsl:output method="xml" />
  <xsl:output cdata-section-elements="DataInfo"/> 
  <xsl:output cdata-section-elements="DataTitle"/>
  <xsl:output cdata-section-elements="RegionTitle"/>
  <xsl:output cdata-section-elements="SectionTitle"/>
  <xsl:output cdata-section-elements="SpecialPrecaution"/>
  <xsl:param name="id"></xsl:param>
       	<xsl:template match="//Airport">
<WTG>
  <Region Name="" ColCode="" ParentName="" ParentColCode="eng" RootName="" RootColCode="" TimaticCode="" FederalCode="" LocationCode="eur" LocationName="Europe" RegionLevel="" ParentTimaticCode="en" RootTimaticCode="" ISO3166-1-alpha-2="" ISO3166-1-alpha-3="" ISO3166-1-numeric-3="">
  	<xsl:attribute name="Name"><xsl:value-of select="@title"/></xsl:attribute>
	<xsl:attribute name="ColCode"><xsl:value-of select="@colCode"/></xsl:attribute>
	<xsl:attribute name="TimaticCode"><xsl:value-of select="Content/Data/CodesTimatic/text()"/></xsl:attribute> 
	<xsl:attribute name="ParentTimaticCode"><xsl:value-of select="../Content/Data/CodesTimatic/text()"/></xsl:attribute> 

    <RegionTitle>
      London Heathrow Airport
    </RegionTitle>
    <Section Name="AirportInformation">
      <SectionTitle>
        Airport Guides
      </SectionTitle>
      <OutputData Name="Address" ContentTypeID="">
        <DataTitle>
          Address
        </DataTitle>
 	    <DataInfo>
    	    <xsl:value-of select="Content/General/AddressText/text()"/>
        </DataInfo>
      </OutputData>
      <OutputData Name="Telephone" ContentTypeID="">
        <DataTitle>
          Telephone
        </DataTitle>
        <DataInfo>
	        <xsl:value-of select="Content/General/Telephone/text()"/>
        </DataInfo>
      </OutputData>
      <OutputData Name="Website" ContentTypeID="">
        <DataTitle>
          Website
        </DataTitle>
        <DataInfo>
	        <xsl:value-of select="Content/General/Website/text()"/>
        </DataInfo>
      </OutputData>
      <OutputData Name="Numberofterminals" ContentTypeID="">
        <DataTitle>
          Number of Terminals
        </DataTitle>
        <DataInfo>
	        <xsl:value-of select="Content/General/NumberOfTerminals/text()"/>
        </DataInfo>
      </OutputData>
      <OutputData Name="Timezone" ContentTypeID="">
        <DataTitle>
          Time Zone
        </DataTitle>
        <DataInfo>
        <xsl:value-of select="Content/General/TimeZones/TimeZone/StdTzNameValue/text()"/>
        GMT <xsl:value-of select="Content/General/TimeZones/TimeZone/StandardBiasValue/text()"/>
        </DataInfo>
      </OutputData>
      <OutputData Name="Location" ContentTypeID="">
        <DataTitle>
          Location
        </DataTitle>
        <DataInfo>
    	    <xsl:value-of select="Content/General/Location/text()"/>
        </DataInfo>
      </OutputData>
      <OutputData Name="AirportCode" ContentTypeID="">
        <DataTitle>
          Airport Code
        </DataTitle>
        <DataInfo>
	        <xsl:value-of select="Content/General/Code/text()"/>
        </DataInfo>
      </OutputData>
 <!--     <OutputData Name="Countrydiallingcode" ContentTypeID="">
        <DataTitle>
          Country Code
        </DataTitle>
        <DataInfo>
        
        </DataInfo> 
      </OutputData> -->
      
      <OutputData Name="Transferbetweenterminals" ContentTypeID="">
        <DataTitle>
          Transfer Between Terminals
        </DataTitle>
        <DataInfo>
        	<xsl:value-of select="Content/General/TransferTerminals/text()"/>
        </DataInfo>
      </OutputData>
      <OutputData Name="Drivingdirections" ContentTypeID="">
        <DataTitle>
          Driving Directions
        </DataTitle>
        <DataInfo>
	        <xsl:value-of select="Content/General/DrivingDirections/text()"/>
        </DataInfo>
      </OutputData>
      <OutputData Name="Carrental" ContentTypeID="">
        <DataTitle>
          Car Hire
        </DataTitle>
        <DataInfo>
 			<xsl:value-of select="Content/General/CarRental/text()"/>
        </DataInfo>
      </OutputData>
      <OutputData Name="Publictransportandtaxis" ContentTypeID="">
        <DataTitle>
          Public Transport
        </DataTitle>
        <DataInfo>
	        <xsl:value-of select="Content/General/PublicTransportDesc/text()"/>
            <b>Road: </b> <xsl:value-of select="Content/General/PublicTransportRoad/text()"/>
            <b>Rail: </b> <xsl:value-of select="Content/General/PublicTransportRail/text()"/>
            <b>Water: </b> <xsl:value-of select="Content/General/PublicTransportWater/text()"/>
            <b>Air: </b> <xsl:value-of select="Content/General/PublicTransportAir/text()"/>
        </DataInfo>
      </OutputData>
      <OutputData Name="Carparking" ContentTypeID="">
        <DataTitle>
          Car Parking
        </DataTitle>
        <DataInfo>
	        <xsl:value-of select="Content/General/CarParking/text()"/>
        </DataInfo>
      </OutputData>
      <OutputData Name="Informationandhelpdesks" ContentTypeID="">
        <DataTitle>
          Information and Help Desks
        </DataTitle>
        <DataInfo>
        <xsl:value-of select="Content/General/Information/text()"/>
        </DataInfo>
      </OutputData>
      <OutputData Name="Airportfacilities" ContentTypeID="">
        <DataTitle>
          Airport Facilities
        </DataTitle>
        <DataInfo>
        <b>Money: </b> <xsl:value-of select="Content/General/FacilitiesMoney/text()"/>
        <b>Food: </b> <xsl:value-of select="Content/General/FacilitiesFood/text()"/>
        <b>Shopping: </b> <xsl:value-of select="Content/General/FacilitiesShopping/text()"/>
        <b>Luggage: </b> <xsl:value-of select="Content/General/FacilitiesLuggage/text()"/>
        <b>Other </b> <xsl:value-of select="Content/General/FacilitiesOther/text()"/>
        </DataInfo>
      </OutputData>
      <OutputData Name="Conferenceandbusinessfacilities" ContentTypeID="">
        <DataTitle>
          Conference and Business Facilities
        </DataTitle>
        <DataInfo>
        <xsl:value-of select="Content/General/ConferenceAndBusiness/text()"/>
        </DataInfo>
      </OutputData>
      <OutputData Name="Disabledfacilities" ContentTypeID="">
        <DataTitle>
          Facilities for Disabled Travellers
        </DataTitle>
        <DataInfo>
        	<xsl:value-of select="Content/General/DisabledFacilities/text()"/>
        </DataInfo>
      </OutputData>
      <OutputData Name="Airporthotels" ContentTypeID="">
        <DataTitle>
          Hotels
        </DataTitle>
        <DataInfo>
        </DataInfo>
      </OutputData>
      <OutputData Name="FullAirportName" ContentTypeID="">
        <DataTitle>
          Full Airport name
        </DataTitle>
        <DataInfo>
        <xsl:value-of select="@title"/>
        </DataInfo>
      </OutputData>
      <OutputData Name="City" ContentTypeID="">
        <DataTitle>
          City
        </DataTitle>
        <DataInfo>
        <xsl:value-of select="Content/General/Address/City/text()"/>
        </DataInfo>
      </OutputData>
      <OutputData Name="StateOrProvince" ContentTypeID="">
        <DataTitle>
          Country
        </DataTitle>
        <DataInfo>
        <xsl:value-of select="Content/General/Address/Country/text()"/>
        </DataInfo>
      </OutputData>
    </Section>
  </Region>
</WTG>
</xsl:template>
</xsl:transform>
