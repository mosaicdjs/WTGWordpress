<?xml version="1.0" encoding="UTF-8"?>
<xsl:transform version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform" xmlns:fn="http://www.w3.org/2005/xpath-functions">
 <xsl:output method="xml" />
  <xsl:output cdata-section-elements="DataInfo"/> 
  <xsl:output cdata-section-elements="DataTitle"/>
  <xsl:output cdata-section-elements="RegionTitle"/>
  <xsl:output cdata-section-elements="SectionTitle"/>
  <xsl:output cdata-section-elements="SpecialPrecaution"/>
  <xsl:param name="id"></xsl:param>
       	<xsl:template match="//City">
<WTG>
  <Region Name="" ColCode="" ParentName="" ParentColCode="" RootName="" RootColCode="" TimaticCode="" FederalCode="" LocationCode="" LocationName="" RegionLevel="">
   	<xsl:attribute name="Name"><xsl:value-of select="@title"/></xsl:attribute>
	<xsl:attribute name="ColCode"><xsl:value-of select="@colCode"/></xsl:attribute>
	<xsl:attribute name="TimaticCode"><xsl:value-of select="Content/Data/CodesTimatic/text()"/></xsl:attribute> 
	<xsl:attribute name="ParentTimaticCode"><xsl:value-of select="../Content/Data/CodesTimatic/text()"/></xsl:attribute> 
   
    <RegionTitle>
      London
    </RegionTitle>
      <Section Name="SpecialEvents">
      <SectionTitle>
        Special Events
      </SectionTitle>
      <OutputData Name="CitySpecialEventsSection" ContentTypeID="">
        <DataTitle>
          Text
        </DataTitle>
        <DataInfo>
          <xsl:for-each select="Content/Events/CityEvents/Event">
            <p><b><xsl:value-of select="@title"/></b></p>
            <p>From: <xsl:value-of select="FromDate"/></p>
            <p>To: <xsl:value-of select="ToDate"/></p>
            <p><xsl:value-of select="DateDescription"/></p>
            <p>Website:<xsl:value-of select="Website"/> </p>
            <p>Venue(s): <xsl:value-of select="VenueName"/> </p>
            <p><xsl:value-of select="Body"/></p>
           </xsl:for-each> 
        </DataInfo>
      </OutputData>
    </Section>
    <Section Name="Excursions">
      <SectionTitle>Excursions</SectionTitle>
      <OutputData Name="Excursions" ContentTypeID="">
        <DataTitle>
          Text
        </DataTitle>
        <DataInfo>
        <xsl:for-each select="Content/Excursions/Excursion">
          <p><b><xsl:value-of select="@title"/></b></p>
          <xsl:value-of select="Content/General/Body/text()"/>          
        </xsl:for-each>
        </DataInfo>
      </OutputData>
    </Section>
   <Section Name="Culture">
      <SectionTitle>
        Culture
      </SectionTitle>
      <OutputData Name="Introduction" ContentTypeID="">
        <DataTitle>
          Introduction
        </DataTitle>
        <DataInfo>If you are interested in sampling culture within the city, there is a wealth of things on offer.</DataInfo>
      </OutputData>
    </Section>
    <Section Name="Shopping">
      <SectionTitle>
        Shopping
      </SectionTitle>
      <OutputData Name="Shopping" ContentTypeID="">
        <DataTitle>
          Introduction
        </DataTitle>
        <DataInfo>
          <xsl:value-of select="Content/Shopping/Introduction/text()"/>
          Shopping Areas:<xsl:value-of select="Content/Shopping/KeyAreas/text()"/>
          Markets:<xsl:value-of select="Content/Shopping/Markets/text()"/>
          Shopping Centres:<xsl:value-of select="Content/Shopping/ShoppingCentres/text()"/>
          Opening Hours:<xsl:value-of select="Content/Shopping/Times/text()"/>
          Souvenirs:<xsl:value-of select="Content/Shopping/Souvenirs/text()"/>
          Tax:<xsl:value-of select="Content/Shopping/Tax/text()"/>
        </DataInfo>
      </OutputData>
    </Section>
    <Section Name="Nightlife">
      <SectionTitle>
        Nightlife
      </SectionTitle>
      <OutputData Name="Nightlife" ContentTypeID="">
        <DataTitle>
          Introduction
        </DataTitle>
        <DataInfo>
          <xsl:value-of select="Content/Nightlife/text()"/>
        </DataInfo>
      </OutputData>
      <OutputData Name="Nightlife" ContentTypeID="">
        <DataTitle>
          Venues
        </DataTitle>
        <DataInfo>
        <xsl:for-each select="Content/Nightlife/CityNightlifeItem">
          <p><b><xsl:valaue-of select="@title"/></b></p>
          <b>Telephone:</b> <xsl:value-of select="Content/General/Telephone/text()"/><br />
          <b>Website:</b> <xsl:value-of select="Content/General/Website/text()"/><br />
          <p>
          <b>Address:</b> <br />
          <xsl:value-of select="Content/General/Address/Address1/text()"/><br />
          <xsl:value-of select="Content/General/Address/Address2/text()"/><br />
          <xsl:value-of select="Content/General/Address/Postcode/text()"/>
          </p>
          <xsl:value-of select="Content/General/Body/text()"/>
        </xsl:for-each>  
        </DataInfo>
      </OutputData>
    </Section>
    <Section Name="Restaurants">
      <SectionTitle>
        Restaurants
      </SectionTitle>
      <OutputData Name="Introduction" ContentTypeID="">
        <DataTitle>
          Restaurants
        </DataTitle>
        <DataInfo>
          <xsl:value-of select="Content/Restaurants/Restaurants/text()"/>
          <xsl:for-each select="Content/Restaurants/Restaurant">
            <p><b><xsl:value-of select="@title"/></b></p>
            <xsl:value-of select="Content/General/Body/text()"/>
            <b>Cuisine: </b><xsl:value-of select="Content/General/Cuisine/text()"/><br />
            <b>Telephone: </b><xsl:value-of select="Content/General/Telephone/text()"/><br />
            <b>Website: </b><xsl:value-of select="Content/General/Website/text()"/><br />
            <b>Price: </b><xsl:value-of select="Content/General/Taxonomy/RestaurantType/text()"/><br />
            <p>
            <b>Address: </b> <br />
                <xsl:value-of select="Content/General/Address/Address1/text()"/><br />
                <xsl:value-of select="Content/General/Address/Address2/text()"/><br />
                <xsl:value-of select="Content/General/Address/Postcode/text()"/>
             </p>
          </xsl:for-each>
        </DataInfo>
      </OutputData>
    </Section>
    <Section Name="ToursoftheCity">
      <SectionTitle>
        Tours of the City
      </SectionTitle>
      <OutputData Name="ToursoftheCity" ContentTypeID="">
        <DataTitle>
         Tours
        </DataTitle>
        <DataInfo>
          <xsl:for-each select="Content/Tours/Tour">
            <b><xsl:value-of select="@title"/></b>
            <xsl:value-of select="Content/General/Body/text()"/>
          </xsl:for-each>
        </DataInfo>
      </OutputData>
    </Section>
    <Section Name="FurtherDistractions">
      <SectionTitle>
        Further Distractions
      </SectionTitle>
      <OutputData Name="FurtherDistractions" ContentTypeID="">
        <DataTitle></DataTitle>
        <DataInfo>
        <xsl:for-each select="Content/Attractions/CityAttractions/Attraction">
        <xsl:if test="Importance &lt; 5 ">
          <p><b><xsl:value-of select="@title"/></b></p>
            <xsl:value-of select="Body/text()"/>
            <b>Website: </b><xsl:value-of select="Website/text()"/><br />
            <b>Opening Times: </b><xsl:value-of select="OpeningTimes/text()"/><br />
            <b>Admission Fees: </b><xsl:value-of select="AdmissionFees/text()"/><br />
            <b>Attraction Type: </b><xsl:value-of select="AttractionType/text()"/><br />
            <p>
            <b>Address: </b> <br />
                <xsl:value-of select="Content/General/Address/Address1/text()"/><br />
                <xsl:value-of select="Content/General/Address/Address2/text()"/><br />
                <xsl:value-of select="Content/General/Address/Postcode/text()"/>
             </p>
          </xsl:if>
        </xsl:for-each>
        </DataInfo>
      </OutputData>
    </Section>
    <Section Name="KeyAttractions">
      <SectionTitle>
        Key Attractions
      </SectionTitle>
      <OutputData Name="KeyAttractions" ContentTypeID="">
        <DataTitle>
          List of Attractions
        </DataTitle>
        <DataInfo>
        <xsl:for-each select="Content/Attractions/CityAttractions/Attraction">
        <xsl:if test="Importance &gt; 4 ">
          <p><b><xsl:value-of select="@title"/></b></p>
            <xsl:value-of select="Body/text()"/>
            <b>Website: </b><xsl:value-of select="Website/text()"/><br />
            <b>Opening Times: </b><xsl:value-of select="OpeningTimes/text()"/><br />
            <b>Admission Fees: </b><xsl:value-of select="AdmissionFees/text()"/><br />
            <b>Attraction Type: </b><xsl:value-of select="AttractionType/text()"/><br />
            <p>
            <b>Address: </b> <br />
                <xsl:value-of select="Content/General/Address/Address1/text()"/><br />
                <xsl:value-of select="Content/General/Address/Address2/text()"/><br />
                <xsl:value-of select="Content/General/Address/Postcode/text()"/>
             </p>
          </xsl:if>
        </xsl:for-each>

        </DataInfo>
      </OutputData>
    </Section>
    <Section Name="Sightseeing">
      <SectionTitle>
        Sightseeing
      </SectionTitle>
<!-->      <OutputData Name="Sightseeing Overview" ContentTypeID="">
        <DataTitle>
          Sightseeing Overview
        </DataTitle>
        <DataInfo>
        </DataInfo>
      </OutputData> -->
      <OutputData Name="Tourist Information" ContentTypeID="">
        <DataTitle>
          Tourist Information
        </DataTitle>
        <DataInfo>
        <xsl:for-each select="Content/Sightseeing/TouristInformationCentres/Centre">
				<div>
					<h3><xsl:value-of select="@title"/></h3>
					<b>Address: </b>
						<span>
							<xsl:value-of select="./Address/Address1/text()"/>,
							<xsl:value-of select="./Address/Address2/text()"/>,
							<xsl:value-of select="./Address/City/text()"/>,
							<xsl:value-of select="./Address/Postcode/text()"/>
						</span><br/>
					<b>Telephone: </b><xsl:value-of select="./Telephone/text()"/><br/>
					<b>Opening times: </b><xsl:value-of select="./OpeningTimes/text()"/>
					<b>Website: </b>
						<a>
							<xsl:attribute name="href">
								<xsl:value-of select="./Website/text()"/>
							</xsl:attribute>
							<xsl:value-of select="./Website/text()"/>
						</a><br/>
					<xsl:value-of select="./Body/text()" />
				</div>
			</xsl:for-each>
        </DataInfo>
      </OutputData>
      <OutputData Name="Sightseeing" ContentTypeID="">
        <DataTitle>
          Passes
        </DataTitle>
        <xsl:value-of select="Content/Sightseeing/TouristPasses/text()"/>
        <DataInfo>
        </DataInfo>
      </OutputData>
    </Section>
    <Section Name="GettingAround">
      <SectionTitle>
        Getting Around
      </SectionTitle>
      <OutputData Name="GettingAround" ContentTypeID="">
        <DataTitle>
          Public Transport
        </DataTitle>
        <DataInfo>
        <xsl:value-of select="Content/GettingAround/PublicTransport/text()"/>
        </DataInfo>
      </OutputData>
      <OutputData Name="GettingAround" ContentTypeID="">
        <DataTitle>
          Taxis
        </DataTitle>
        <DataInfo>
        <xsl:value-of select="Content/GettingAround/Taxis/text()"/>
        </DataInfo>
      </OutputData>
      <OutputData Name="GettingAround" ContentTypeID="">
        <DataTitle>
          Driving in the City
        </DataTitle>
        <DataInfo>
        <xsl:value-of select="Content/GettingAround/Driving/text()"/>
        </DataInfo>
      </OutputData>
      <OutputData Name="GettingAround" ContentTypeID="">
        <DataTitle>
          Car Hire
        </DataTitle>
        <DataInfo>
          <xsl:value-of select="Content/GettingAround/CarHire/text()"/>
        </DataInfo>
      </OutputData>
      <OutputData Name="GettingAround" ContentTypeID="">
        <DataTitle>
          Bicycle Hire
        </DataTitle>
        <DataInfo>
        <xsl:value-of select="Content/GettingAround/BikeHire/text()"/>
        </DataInfo>
      </OutputData>
    </Section>
 <!-->   <Section Name="Business">
      <SectionTitle>
        Business Etiquette
      </SectionTitle>
      <OutputData Name="BusinessEtiquette" ContentTypeID="">
        <DataTitle>
          Business Etiquette
        </DataTitle>
        <DataInfo>
        </DataInfo>
      </OutputData>
    </Section> -->
    <Section Name="History">
      <SectionTitle>
        History
      </SectionTitle>
      <OutputData Name="History" ContentTypeID="">
        <DataTitle>
         Overview
        </DataTitle>
        <DataInfo>
        <xsl:value-of select="Content/History/History/text()"/>
        </DataInfo>
      </OutputData>
    </Section>
    <Section Name="Hotels">
      <SectionTitle>
        Hotels
      </SectionTitle>
      <OutputData Name="Introduction" ContentTypeID="">
        <DataTitle>
          Hotel List
        </DataTitle>
        <DataInfo>
         <xsl:for-each select="Content/Accommodation/Hotel">
              <p><b><xsl:value-of select="@title"/></b>></p>
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
         </xsl:for-each>
        </DataInfo>
      </OutputData>
    </Section>
<!-->    <Section Name="CostofLiving">
      <SectionTitle>
        Money
      </SectionTitle>
      <OutputData Name="CostofLiving" ContentTypeID="">
        <DataTitle>
          Text
        </DataTitle>
        <DataInfo>
        </DataInfo>
      </OutputData>
    </Section> -->
    <Section Name="CityStatistics">
      <SectionTitle>
        City Statistics
      </SectionTitle>
      <OutputData Name="Location" ContentTypeID="">
        <DataTitle>
          Location
        </DataTitle>
        <DataInfo>
        <b>Latitude: </b><xsl:value-of select="Content/General/GMapsPoint/Latitude/text()"/>
        <b>Longitude: </b><xsl:value-of select="Content/General/GMapsPoint/Longitude/text()"/>
        </DataInfo>
      </OutputData>
      <OutputData Name="TimeZone" ContentTypeID="">
        <DataTitle>
          Time zone
        </DataTitle>
        <DataInfo>
        <xsl:value-of select="Content/General/TimeZone/TimeZone/Description/text()"/>
        </DataInfo>
      </OutputData>
<!-->      <OutputData Name="Electricity" ContentTypeID="">
        <DataTitle>
          Electricity
        </DataTitle>
        <DataInfo>
        </DataInfo>
      </OutputData>
      <OutputData Name="AverageJanuaryTemp" ContentTypeID="">
        <DataTitle>
        </DataTitle>
        <DataInfo>
        </DataInfo>
      </OutputData>
      <OutputData Name="AverageJulyTemp" ContentTypeID="">
        <DataTitle>
        </DataTitle>
        <DataInfo>
        </DataInfo>
      </OutputData>
      <OutputData Name="AverageAnnualRainfall" ContentTypeID="">
        <DataTitle>
        </DataTitle>
        <DataInfo>
        </DataInfo>
      </OutputData> -->
    </Section>
   <Section Name="Road">
      <SectionTitle>
        Getting There By Road
      </SectionTitle>
      <OutputData Name="Road" ContentTypeID="">
        <DataTitle>
          Overview
        </DataTitle>
        <DataInfo>
          <xsl:value-of select="Content/Road/Summary/text()"/>
          <b>Emergency breakdown services: </b><xsl:value-of select="Content/Road/Emergency/text()"/>
          <b>Routes: </b><xsl:value-of select="Content/Road/Routes/text()"/>
          <b>Coaches: </b><xsl:value-of select="Content/Road/Coaches/text()"/>
          <b>Driving times: </b><xsl:value-of select="Content/Road/Driving/text()"/>
          <b>Time to city: </b><xsl:value-of select="Content/Road/TimeToCity/text()"/>
        </DataInfo>
      </OutputData>
    </Section>
    <Section Name="Rail">
      <SectionTitle>
        Getting There By Rail
      </SectionTitle>
      <OutputData Name="Rail" ContentTypeID="">
        <DataTitle>Services</DataTitle>
        <DataInfo>
        <xsl:value-of select="Content/Rail/Services/text()"/>
        <p><b>Operators: </b><xsl:value-of select="Content/Rail/Operators/text()"/></p>
        <p><b>Rail Passes: </b><xsl:value-of select="Content/InternationalTravel/RailPasses/text()"/></p>
        <p><b>Journey Times: </b><xsl:value-of select="Content/Rail/JourneyTimes/text()"/></p>
        <p><b>Transfer: </b><xsl:value-of select="Content/Rail/Transfer/text()"/></p>
        </DataInfo>
      </OutputData>
    </Section>
    <Section Name="Air">
      <SectionTitle>
        Getting There By Air
      </SectionTitle>
      <OutputData Name="Air" ContentTypeID="">
        <DataTitle>
          Flying to <xls:value-of select="@title"/>
        </DataTitle>
        <DataInfo>
        	<xsl:value-of select="Content/Flights/Intro/text()"/>
          <b>Flight times: </b><xsl:value-of select="Content/Flights/Times/text()"/>
        </DataInfo>
      </OutputData>
    </Section>
    <Section Name="CityOverview">
      <SectionTitle>
        Overview
      </SectionTitle>
      <OutputData Name="Overview" ContentTypeID="">
        <DataTitle>
          Overview
        </DataTitle>
        <DataInfo>
          <xsl:value-of select="Content/Overview/Overview/text()"/>		
        </DataInfo>
      </OutputData>
    </Section>
  </Region>
</WTG>
       	</xsl:template>
</xsl:transform>