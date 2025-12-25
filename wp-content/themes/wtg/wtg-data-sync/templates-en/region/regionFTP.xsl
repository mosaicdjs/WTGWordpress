<?xml version="1.0" encoding="UTF-8"?>
<xsl:transform version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform" xmlns:fn="http://www.w3.org/2005/xpath-functions">
  <xsl:output method="xml" />
  <xsl:output cdata-section-elements="DataInfo"/> 
  <xsl:output cdata-section-elements="DataTitle"/>
  <xsl:output cdata-section-elements="RegionTitle"/>
  <xsl:output cdata-section-elements="SectionTitle"/>
  <xsl:output cdata-section-elements="SpecialPrecaution"/>


  <xsl:param name="id"></xsl:param>
       	<xsl:template match="//Region">
<WTG>
<Region Name="" ColCode=""  ParentName="" ParentColCode=""  RootName="" RootColCole="" TimaticCode="" FederalCode="" LocationCode="" LocationName="" RegionLevel="0" RootTimaticCode="">
	<xsl:attribute name="Name"><xsl:value-of select="@normalised_name"/></xsl:attribute>
	<xsl:attribute name="ColCode"><xsl:value-of select="@colCode"/></xsl:attribute>
	<xsl:attribute name="ParentColCode"><xsl:value-of select="../@colCode"/></xsl:attribute>
	<xsl:attribute name="ParentName"><xsl:value-of select="../@normalised_name"/></xsl:attribute>
	<xsl:attribute name="TimaticCode"><xsl:value-of select="Content/Data/CodesTimatic/text()"/></xsl:attribute> 
	<xsl:attribute name="ParentTimaticCode"><xsl:value-of select="../Content/Data/CodesTimatic/text()"/></xsl:attribute> 

	<RegionTitle><xsl:value-of select="@title"/></RegionTitle>
	
	<Section Name="Climate">
		<SectionTitle>Climate</SectionTitle>
		<OutputData Name="Climate" ContentTypeID="">
			<DataTitle>Introduction</DataTitle>
			<DataInfo><xsl:value-of select="Content/Climate/BestTimeToVisit/text()" disable-output-escaping="yes"/></DataInfo>
		</OutputData>
		<OutputData Name="Requiredclothing" ContentTypeID="">
			<DataTitle>Required Clothing</DataTitle>
			<DataInfo><xsl:value-of select="Content/Climate/RequiredClothing/text()" disable-output-escaping="yes"/></DataInfo>
		</OutputData>
	</Section>

	<Section Name="TravelInternal">
		<SectionTitle>Getting Around</SectionTitle>
		<OutputData Name="GettingAroundByAir" ContentTypeID="">
			<DataTitle>Getting Around By Air</DataTitle>
			<DataInfo>
				<xsl:value-of select="Content/InternalTravel/Air/text()"/>
				<xsl:value-of select="Content/InternalTravel/AirNote/text()"/>
			</DataInfo>
		</OutputData>
		<OutputData Name="GettingAroundByWater" ContentTypeID="">
			<DataTitle>Getting Around by Water</DataTitle>
			<DataInfo><xsl:value-of select="Content/InternalTravel/Water/text()"/></DataInfo>
		</OutputData>
		<OutputData Name="GettingAroundByRail" ContentTypeID="">
			<DataTitle>Getting Around by Rail</DataTitle>
			<DataInfo><xsl:value-of select="Content/InternalTravel/Rail/text()"/></DataInfo>		
		</OutputData>
		<OutputData Name="GettingAroundByRail" ContentTypeID="">
			<DataTitle>Rail Passes</DataTitle>
			<DataInfo><xsl:value-of select="Content/InternalTravel/RailPasses/text()"/></DataInfo>
		</OutputData>
		<OutputData Name="GettingAroundByRoad" ContentTypeID="">
			<DataTitle>Getting Around by Road</DataTitle>
			<DataInfo>
				<xsl:value-of select="Content/InternalTravel/Road/text()"/>
				<xsl:value-of select="Content/InternalTravel/SideOfRoad/text()"/>
				<xsl:value-of select="Content/InternalTravel/RoadQuality/text()"/>
				<xsl:value-of select="Content/InternalTravel/Car/text()"/>
				<xsl:value-of select="Content/InternalTravel/Coach/text()"/>
				<xsl:value-of select="Content/InternalTravel/Taxi/text()"/>
				<xsl:value-of select="Content/InternalTravel/Documentation/text()"/>
				<xsl:value-of select="Content/InternalTravel/Regulations/text()"/>
				<xsl:value-of select="Content/InternalTravel/Notes/text()"/>
				<xsl:value-of select="Content/InternalTravel/BreakdownServices/text()"/>
				<xsl:value-of select="Content/InternalTravel/CarHire/text()"/>
				<xsl:value-of select="Content/InternalTravel/Bike/text()"/>
				<xsl:value-of select="Content/InternalTravel/Regulations/text()"/>
			</DataInfo>			
		</OutputData>
		<OutputData Name="Urban" ContentTypeID="">
			<DataTitle>Getting Around Towns and Cities</DataTitle>
			<DataInfo><xsl:value-of select="Content/InternalTravel/TravelUrban/text()"/></DataInfo>
		</OutputData>
		<OutputData Name="JourneyTimes" ContentTypeID="">
			<DataTitle>Journey Times</DataTitle>
			<DataInfo>

				<table class="DataTable">
					<tr>
						<td CLASS="DataHead">From</td>
						<td CLASS="DataHead">To</td>
						<TD CLASS="DataHead">Air</TD>
						<TD CLASS="DataHead">Road</TD>
						<TD CLASS="DataHead">Rail</TD>
					</tr>
						<xsl:for-each select="Content/InternalTravel/JourneyTimes/Route">
					<tr>
							<TD CLASS="DataHead"><xsl:value-of select="SourceCity/text()"/></TD>
							<TD CLASS="DataHead"><xsl:value-of select="DestCity/text()"/></TD>
							<TD CLASS="DataCell"><xsl:value-of select="ByAir/text()"/></TD>
							<TD CLASS="DataCell"><xsl:value-of select="ByRoad/text()"/></TD>
							<TD CLASS="DataCell"><xsl:value-of select="ByRail/text()"/></TD>
						</tr> 
				</xsl:for-each>
				</table>
			
			</DataInfo> 
		</OutputData>
	</Section>
	-->
	<Section Name="TravelInternational">
		<SectionTitle>Getting There</SectionTitle>
		<OutputData Name="GettingThereByAir" ContentTypeID="">
			<DataTitle>Getting There by Air</DataTitle>
			<DataInfo><xsl:value-of select="Content/InternationalTravel/Air/text()"/></DataInfo>
			<DataInfo><xsl:value-of select="Content/InternationalTravel/FlightTimes/text()"/></DataInfo>
		</OutputData>
		<OutputData Name="GettingThereByAir" ContentTypeID="">
			<DataTitle>Air Passes</DataTitle>
			<DataInfo><xsl:value-of select="Content/InternationalTravel/AirNote/text()"/></DataInfo>
		</OutputData>
		<OutputData Name="GettingThereByAir" ContentTypeID="">
			<DataTitle>Departure Tax</DataTitle>
			<DataInfo><xsl:value-of select="Content/InternationalTravel/DepartureTax/text()"/></DataInfo>
		</OutputData>
		<OutputData Name="GettingThereByAirNote" ContentTypeID="">
			<DataTitle>Note</DataTitle>
			<DataInfo><xsl:value-of select="Content/InternationalTravel/AirNote/text()"/></DataInfo>
		</OutputData>
		<OutputData Name="InternationalAirports" ContentTypeID="">
			<DataTitle>Main Airports</DataTitle>
			<DataInfo><xsl:value-of select="Content/InternationalTravel/MainAirports/text()"/>
				<xsl:for-each select="Content/InternationalTravel/RegionAirports/Airport">
					<b><xsl:value-of select="@title"/></b>
					<xsl:value-of select="Content/General/Website"/>
					<xsl:value-of select="Content/General/Location"/>
					<b>Tel: </b><xsl:value-of select="Content/General/Telephone"/>
				</xsl:for-each>
			</DataInfo>
		</OutputData>
		<OutputData Name="GettingThereByWater" ContentTypeID="">
			<DataTitle>Getting There by Water</DataTitle>
			<DataInfo>
				<xsl:value-of select="Content/InternationalTravel/Water/text()"/>
				<xsl:value-of select="Content/InternationalTravel/WaterNote/text()"/>
			</DataInfo>
		</OutputData>
		<OutputData Name="GettingThereByRail" ContentTypeID="">
			<DataTitle>Getting There by Rail</DataTitle>
			<DataInfo><xsl:value-of select="Content/InternationalTravel/Rail/text()"/></DataInfo>
		</OutputData>
		<OutputData Name="GettingThereByRail" ContentTypeID="">
			<DataTitle>Rail Passes</DataTitle>
			<DataInfo><xsl:value-of select="Content/InternationalTravel/RailPasses/text()"/></DataInfo>
		</OutputData>
			<OutputData Name="GettingThereByRoad" ContentTypeID="">
			<DataTitle>Getting There by Road</DataTitle>
			<DataInfo>
				<xsl:value-of select="Content/InternationalTravel/Road/text()"/>
				<xsl:value-of select="Content/InternationalTravel/RoadClassification/text()"/>
				<xsl:value-of select="Content/InternationalTravel/Coach/text()"/>
				<xsl:value-of select="Content/InternationalTravel/Documentation/text()"/>
				<xsl:value-of select="Content/InternationalTravel/Taxi/text()"/>
				<xsl:value-of select="Content/InternationalTravel/RoadNote/text()"/>
			</DataInfo>
		</OutputData>
	</Section>

	<Section Name="Communications">
		<SectionTitle>Communications</SectionTitle>
		<OutputData Name="Telephone" ContentTypeID="">
			<DataTitle>Telephone</DataTitle>
			<DataInfo>
				Country Code: <xsl:value-of select="Content/Data/CodesCallingCode/text()"/>
				<xsl:value-of select="Content/Communications/Telephone/text()"/>
			</DataInfo>
		</OutputData>
		<OutputData Name="Mobile telephone" ContentTypeID="">
			<DataTitle>Mobile Telephone</DataTitle>
			<DataInfo><xsl:value-of select="Content/Communications/MobileTelephone/text()"/></DataInfo>
		</OutputData>
		<OutputData Name="Internet" ContentTypeID="">
			<DataTitle>Internet</DataTitle>
			<DataInfo><xsl:value-of select="Content/Communications/Internet/text()"/></DataInfo>
		</OutputData>
		<OutputData Name="Media" ContentTypeID="">
			<DataTitle>Media</DataTitle>
			<DataInfo><xsl:value-of select="Content/Communications/Media/text()"/></DataInfo>
		</OutputData>
		<OutputData Name="Post" ContentTypeID="">
			<DataTitle>Post</DataTitle>
			<DataInfo>
				<xsl:value-of select="Content/Communications/Post/text()"/>
				<xsl:value-of select="Content/Communications/PostOfficeHours/text()"/>
			</DataInfo>
		</OutputData>
	</Section>
	<Section Name="TopThingsToSee">
		<SectionTitle>Top Things To See</SectionTitle>
		<OutputData Name="TopThingsToSee" ContentTypeID="">
			<DataTitle>Top Things To See</DataTitle>
			<DataInfo>
				<xsl:for-each select="Content/Attractions/RegionAttractions/Attraction">
					<xsl:sort select="@title"/>
					<p><xsl:value-of select="@title"/></p>
					<xsl:value-of select="Body/text()" disable-output-escaping="yes"/><br/>
				</xsl:for-each>
			</DataInfo>
		</OutputData>
	</Section>
	<Section Name="TopThingsToDo">
		<SectionTitle>Top Things To Do</SectionTitle>
		<OutputData Name="TopThingsToDo" ContentTypeID="">
			<DataTitle>Top Things To Do</DataTitle>
			<DataInfo>
				<xsl:for-each select="Content/Sightseeing/MustSees/MustSee">
					<xsl:sort select="@title"/>
					<p><b><xsl:value-of select="@title"/></b></p>
					<xsl:value-of select="Body/text()" disable-output-escaping="yes"/>
				</xsl:for-each>
			</DataInfo>
		</OutputData>
	</Section>
	<Section Name="BusinessProfile">
		<SectionTitle>Business</SectionTitle>
		<OutputData Name="Statistics" ContentTypeID="">
			<DataTitle>Statistics</DataTitle>
			<DataInfo>
				<b>GDP: </b><xsl:value-of select="Content/Business/GDP/text()"/>
				<b>Main Exports: </b><xsl:value-of select="Content/Business/MainExports/text()"/>
				<b>Main Imports: </b><xsl:value-of select="Content/Business/MainImports/text()"/>
				<b>Main Trade Partners: </b><xsl:value-of select="Content/Business/MainTradePartners/text()"/>			
			</DataInfo>
		</OutputData>
		<OutputData Name="Economy" ContentTypeID="">
			<DataTitle>Economy</DataTitle>
			<DataInfo>	<xsl:value-of select="Content/Business/Economy/text()"/></DataInfo>
		</OutputData>
		<OutputData Name="Business" ContentTypeID="">
			<DataTitle>Business Etiquette</DataTitle>
			<DataInfo>
				<xsl:value-of select="Content/Business/Etiquette/text()"/>
				<xsl:value-of select="Content/Business/OfficeHours/text()"/>			
			</DataInfo>
		</OutputData>
		<OutputData Name="CommercialInfo" ContentTypeID="">
			<DataTitle>Business Contacts</DataTitle>
			<DataInfo>
			<xsl:for-each select="Content/Business/CommercialContacts/CommercialContact">
					<b><xsl:value-of select="@title"/></b>
					Telephone: <xsl:value-of select="Telephone"/>
					Website:<xsl:value-of select="Website"/>
					Address: <xsl:value-of select="Address/Address1"/>,<xsl:value-of select="Address/Address2"/>,<xsl:value-of select="Address/City"/>,<xsl:value-of select="Address/Postcode"/>
				</xsl:for-each>
			</DataInfo>
		</OutputData>
<!--		<OutputData Name="ConferencesConventions" ContentTypeID="">
			<DataTitle>Conferences &amp; Conventions</DataTitle>
			<DataInfo><xsl:value-of select="Content/ConferenceAndBusiness/text()"/></DataInfo>
		</OutputData>  -->
	</Section>
	
	<Section Name="SocialConventions">
		<SectionTitle>Going Out</SectionTitle>
		<OutputData Name="FoodDrink" ContentTypeID="">
			<DataTitle>Food and Drink</DataTitle>
			<DataInfo>
				<b>Intro:</b><xsl:value-of select="Content/FoodAndDrink/Intro/text()"/>
				<b>Regional Specialities: </b><xsl:value-of select="Content/FoodAndDrink/RegionalSpecialities/text()"/>
				<b>Things to Know:</b><xsl:value-of select="Content/FoodAndDrink/ThingsToKnow/text()"/>
				<b>Tipping:</b><xsl:value-of select="Content/FoodAndDrink/Tipping/text()"/>
				<b>Drinking Age:</b><xsl:value-of select="Content/FoodAndDrink/DrinkingAge/text()"/>
			</DataInfo>
		</OutputData>
		<OutputData Name="Nightlife" ContentTypeID="">
			<DataTitle>Nightlife</DataTitle>
			<DataInfo><xsl:value-of select="Content/Nightlife/Nightlife/text()"/></DataInfo>
		</OutputData>
		<OutputData Name="Shopping" ContentTypeID="">
			<DataTitle>Shopping</DataTitle>
			<DataInfo>
				<xsl:value-of select="Content/Shopping/Intro/text()"/>
				<xsl:value-of select="Content/Shopping/OpeningHours/text()"/>
				<xsl:value-of select="Content/Shopping/Note/text()"/>
			</DataInfo>
		</OutputData>

	
	</Section>

	<Section Name="Accommodation">
		<SectionTitle>Accommodation</SectionTitle>
		<OutputData Name="Hotels" ContentTypeID="">
			<DataTitle>Hotels</DataTitle>
			<DataInfo><xsl:value-of select="Content/Accommodation/Hotels/text()"/></DataInfo>
		</OutputData>
<!-->		<OutputData Name="SelfCatering" ContentTypeID="">
			<DataTitle>Self Catering</DataTitle>
			<DataInfo></DataInfo>
		</OutputData>
		<OutputData Name="RuralFarmstayAccommodation" ContentTypeID="">
			<DataTitle>Rural/Farmstay Accommodation</DataTitle>
			<DataInfo></DataInfo>
		</OutputData>
		<OutputData Name="YouthHostels" ContentTypeID="">
			<DataTitle>Youth Hostels</DataTitle>
			<DataInfo></DataInfo>
		</OutputData>
	<OutputData Name="CampingCaravaning" ContentTypeID="">
			<DataTitle>Camping/Caravanning</DataTitle>
			<DataInfo></DataInfo>
		</OutputData>	
		<OutputData Name="AccommodationNotes" ContentTypeID="">
			<DataTitle>Accommodation Information</DataTitle>
			<DataInfo></DataInfo>
		</OutputData> -->
		<OutputData Name="GuestHouses" ContentTypeID="">
			<DataTitle>Guest Houses/Bed and Breakfast</DataTitle>
			<DataInfo><xsl:value-of select="Content/Accommodation/BedAndBreakfast/text()"/></DataInfo>
		</OutputData>
		<OutputData Name="CampingCaravaning" ContentTypeID="">
			<DataTitle>Camping/Caravanning</DataTitle>
			<DataInfo><xsl:value-of select="Content/Accommodation/Hotels/text()"/></DataInfo>
		</OutputData>
		<OutputData Name="OtherAccommodation" ContentTypeID="">
			<DataTitle>Accommodation Information</DataTitle>
			<DataInfo><xsl:value-of select="Content/Accommodation/Hotels/text()"/></DataInfo>
		</OutputData>
	</Section>
	<Section Name="Health">
	<SectionTitle>Health</SectionTitle>
	<OutputData Name="HealthTable" ContentTypeID="">
			<DataTitle>Vaccinations</DataTitle>
			<HealthInfo>
			<xsl:for-each select="Content/HealthCare/VaccinationTable/VaccinationRow">
				<xsl:value-of select="@title"/>
					<HealthPrecaution>
						<xsl:attribute name="Name"><xsl:value-of select="@title"/></xsl:attribute>
					<SpecialPrecaution><xsl:value-of select="./SpecialPrecautions"/></SpecialPrecaution>
					</HealthPrecaution>
				</xsl:for-each>
			</HealthInfo>
		</OutputData> 
		<OutputData Name="Health" ContentTypeID="">
			<DataTitle>Health Care</DataTitle>
			<DataInfo>
				<p><xsl:value-of select="Content/HealthCare/HealthCare/text()"/></p>
				<p><xsl:value-of select="Content/HealthCare/FoodDrink/text()"/></p>
				<p><xsl:value-of select="Content/HealthCare/OtherRisks/text()"/></p>			
				</DataInfo>
		</OutputData>
	</Section>

	<Section Name="PublicHolidays">
		<SectionTitle>Public Holidays</SectionTitle>
		<OutputData Name="PublicHolidays" ContentTypeID="">
			<DataTitle>Public Holidays</DataTitle>
			<DataInfo>
				<b>Note:</b> <xsl:value-of select="Content/PublicHolidays/Note/text()"/>	
				<b>Intro:</b> <xsl:value-of select="Content/PublicHolidays/Intro/text()"/>
				<xsl:for-each select="Content/PublicHolidays/PublicHolidayTable/PublicHolidayRow">
					  <xsl:if test="./StartDate/text() != ''">
							<xsl:variable name="test1" select="./StartDate" />
							<xsl:variable name="month" select="substring($test1, 6,2)" />
							<xsl:variable name="day" select="substring($test1, 9,2)" />
							<xsl:variable name="year" select ="substring($test1, 0,5)"/>							
							<p>
							<xsl:value-of select="@title"/> :
							<xsl:if test="$month = '01'">
								<xsl:value-of select="$year"></xsl:value-of><br />
								<xsl:value-of select="concat($day,' January ')"></xsl:value-of>
							</xsl:if>	

							<xsl:if test="$month = '02'">
								<xsl:value-of select="concat($day,' February ')"></xsl:value-of>
							</xsl:if>	

							<xsl:if test="$month = '03'">
								<xsl:value-of select="concat($day,' March ')"></xsl:value-of>
							</xsl:if>	

							<xsl:if test="$month = '04'">
								<xsl:value-of select="concat($day,' April ')"></xsl:value-of>
							</xsl:if>	

							<xsl:if test="$month = '05'">
								<xsl:value-of select="concat($day,' May ')"></xsl:value-of>
							</xsl:if>	

							<xsl:if test="$month = '06'">
								<xsl:value-of select="concat($day,' June ')"></xsl:value-of>
							</xsl:if>	

							<xsl:if test="$month = '07'">
								<xsl:value-of select="concat($day,' July ')"></xsl:value-of>
							</xsl:if>	

							<xsl:if test="$month = '08'">
								<xsl:value-of select="concat($day,' August ')"></xsl:value-of>
							</xsl:if>	

							<xsl:if test="$month = '09'">
								<xsl:value-of select="concat($day,' September ')"></xsl:value-of>
							</xsl:if>	

							<xsl:if test="$month = '10'">
								<xsl:value-of select="concat($day,' October ')"></xsl:value-of>
							</xsl:if>	

							<xsl:if test="$month = '11'">
								<xsl:value-of select="concat($day,' November ')"></xsl:value-of>
							</xsl:if>	

							<xsl:if test="$month = '12'">
								<xsl:value-of select="concat($day,' December ')"></xsl:value-of>
							</xsl:if>	
							<xsl:if test="./TBC/text() = '1'">
								<b>Date to be confirmed </b>yes
							</xsl:if>
							</p>
					  </xsl:if>
				</xsl:for-each>
			</DataInfo>
		</OutputData>
	</Section>
	<Section Name="DutyFree">
		<SectionTitle>Duty Free</SectionTitle>
		<OutputData Name="DutyFree" ContentTypeID="">
			<DataTitle>Overview</DataTitle>
			<DataInfo><xsl:value-of select="Content/DutyFree/Overview/text()"/></DataInfo>
		</OutputData>
		<OutputData Name="DutyFree" ContentTypeID="">
			<DataTitle>Prohibited Imports</DataTitle>
			<DataInfo><xsl:value-of select="Content/DutyFree/BannedImports/text()"/></DataInfo>
		</OutputData>
		<OutputData Name="DutyFree" ContentTypeID="">
			<DataTitle>Prohibited Exports</DataTitle>
			<DataInfo><xsl:value-of select="Content/DutyFree/BannedExports/text()"/></DataInfo>
		</OutputData>
		<OutputData Name="DutyFree" ContentTypeID="">
			<DataTitle>Import Regulations</DataTitle>
			<DataInfo><xsl:value-of select="Content/DutyFree/ImportRegulations/text()"/></DataInfo>
		</OutputData>
		<OutputData Name="DutyFree" ContentTypeID="">
			<DataTitle>Export Regulations</DataTitle>
			<DataInfo><xsl:value-of select="Content/DutyFree/ExportRegulations/text()"/></DataInfo>
		</OutputData>
		<OutputData Name="DutyFree" ContentTypeID="">
			<DataTitle>Import Restrictions</DataTitle>
			<DataInfo><xsl:value-of select="Content/DutyFree/ImportRestrictions/text()"/></DataInfo>
		</OutputData>
		<OutputData Name="DutyFree" ContentTypeID="">
			<DataTitle>Export Restrictions</DataTitle>
			<DataInfo><xsl:value-of select="Content/DutyFree/ExportRestrictions/text()"/></DataInfo>
		</OutputData>
		<OutputData Name="DutyFree" ContentTypeID="">
			<DataTitle>EU Dutry Free</DataTitle>
			<DataInfo><xsl:value-of select="Content/DutyFree/EU/text()"/></DataInfo>
		</OutputData>
		<OutputData Name="DutyFree" ContentTypeID="">
			<DataTitle>EU Import/Export</DataTitle>
			<DataInfo><xsl:value-of select="Content/DutyFree/ImportExportEu/text()"/></DataInfo>
		</OutputData>
	</Section>
	<Section Name="Currency">
		<SectionTitle>Money</SectionTitle>
		<OutputData Name="Currency" ContentTypeID="">
			<DataTitle>Currency</DataTitle>
			<DataInfo><xsl:value-of select="Content/Money/CurrencyInformation/text()"/></DataInfo>
		</OutputData>
		<OutputData Name="CurrencyExchange" ContentTypeID="">
			<DataTitle>Currency Exchange</DataTitle>
			<DataInfo><xsl:value-of select="Content/Money/CurrencyExchange/text()"/></DataInfo>
		</OutputData>
		<OutputData Name="Cards" ContentTypeID="">
			<DataTitle>Credit/Debit Cards and ATMs</DataTitle>
			<DataInfo>
				<xsl:value-of select="Content/Money/CreditCards/text()"/>
				<xsl:value-of select="Content/Money/ATM/text()"/>
			</DataInfo>
		</OutputData>
		<OutputData Name="TravellersCheques" ContentTypeID="">
			<DataTitle>Traveller's Cheques</DataTitle>
			<DataInfo><xsl:value-of select="Content/Money/TravellersCheques/text()"/></DataInfo>
		</OutputData>
		<OutputData Name="CurrencyRestrictions" ContentTypeID="">
			<DataTitle>Currency Restrictions</DataTitle>
			<DataInfo><xsl:value-of select="Content/Money/CurrencyRestrictions/text()"/></DataInfo>
		</OutputData>
		<OutputData Name="BankingHours" ContentTypeID="">
			<DataTitle>Banking Hours</DataTitle>
			<DataInfo><xsl:value-of select="Content/Money/BankingHours/text()"/></DataInfo>
		</OutputData>
		<OutputData Name="ExchangeRate" ContentTypeID="">
			<DataTitle>Exchange Rate Indicators</DataTitle>
			<DataInfo></DataInfo>
		</OutputData>
	</Section>

	<Section Name="PassportVisaRequirements">
		<SectionTitle>Passport/Visa</SectionTitle>
		<OutputData Name="PassportTable" ContentTypeID="14">
			<DataTitle>Summary</DataTitle>
			<PassportInfo>
				<xsl:for-each select="Content/PassportVisa/PassportTable/PassportRow">
    				<PassportInfoCountry>
                    	<xsl:attribute name="Name"><xsl:value-of select="@title"/></xsl:attribute>
	    				<PassportRequired><xsl:value-of select="./PassportRequired/text()" disable-output-escaping="yes"/></PassportRequired>
		    			<ReturnTicketRequired><xsl:value-of select="./ReturnTicketRequired/text()" disable-output-escaping="yes"/></ReturnTicketRequired>
			    		<VisaRequired><xsl:value-of select="./VisaRequired/text()" disable-output-escaping="yes"/></VisaRequired>
				    </PassportInfoCountry>
			    </xsl:for-each>
			</PassportInfo>
		</OutputData>
		<OutputData Name="MainPassportFields" ContentTypeID="">
			<DataTitle>Passports</DataTitle>
			<DataInfo><xsl:value-of select="Content/PassportVisa/PassvisaPassports/text()"/></DataInfo>
		</OutputData>
		<OutputData Name="PassportVisaNote" ContentTypeID="">
			<DataTitle>Entry With Children</DataTitle>
			<DataInfo><xsl:value-of select="Content/PassportVisa/EntryWithChildren/text()"/></DataInfo>
		</OutputData>
		<OutputData Name="MainVisaFields" ContentTypeID="">
			<DataTitle>Visas</DataTitle>
			<DataInfo><xsl:value-of select="Content/PassportVisa/PassVisaViasa/text()"/></DataInfo>
		</OutputData>
		<OutputData Name="VisaNote" ContentTypeID="">
			<DataTitle>Visa Note</DataTitle>
			<DataInfo><xsl:value-of select="Content/PassportVisa/PassportVisaNote/text()"/></DataInfo>
		</OutputData>
		<OutputData Name="VisaNote" ContentTypeID="">
			<DataTitle>Transit</DataTitle>
			<DataInfo><xsl:value-of select="Content/PassportVisa/Transit/text()"/></DataInfo>
		</OutputData>
		<OutputData Name="VisaNote" ContentTypeID="">
			<DataTitle>Schengen Visas</DataTitle>
			<DataInfo><xsl:value-of select="Content/PassportVisa/SchengenVisas/text()"/></DataInfo>
		</OutputData>
		<OutputData Name="VisaNote" ContentTypeID="">
			<DataTitle>Types of Visa and Cost</DataTitle>
			<DataInfo><xsl:value-of select="Content/PassportVisa/TypesCost/text()"/></DataInfo>
		</OutputData>
		<OutputData Name="VisaNote" ContentTypeID="">
			<DataTitle>Validity</DataTitle>
			<DataInfo><xsl:value-of select="Content/PassportVisa/Validity/text()"/></DataInfo>
		</OutputData>
		<OutputData Name="VisaNote" ContentTypeID="">
			<DataTitle>Applications to:</DataTitle>
			<DataInfo><xsl:value-of select="Content/PassportVisa/ApplicationTo/text()"/></DataInfo>
		</OutputData>
		<OutputData Name="VisaNote" ContentTypeID="">
			<DataTitle>Temporary Residence</DataTitle>
			<DataInfo><xsl:value-of select="Content/PassportVisa/TemporaryResidence/text()"/></DataInfo>
		</OutputData>
		<OutputData Name="VisaNote" ContentTypeID="">
			<DataTitle>Working Days Required</DataTitle>
			<DataInfo><xsl:value-of select="Content/PassportVisa/WorkingDays/text()"/></DataInfo>
		</OutputData>
		<OutputData Name="SufficientFunds" ContentTypeID="">
			<DataTitle/>
			<DataInfo><xsl:value-of select="Content/PassportVisa/SufficientFunds/text()"/></DataInfo>
		</OutputData>
		<OutputData Name="ExtensionOfStay" ContentTypeID="">
			<DataTitle/>
			<DataInfo><xsl:value-of select="Content/PassportVisa/ExtensionOfStay/text()"/></DataInfo>
		</OutputData>
		<OutputData Name="PassportVisaNote" ContentTypeID="">
			<DataTitle>Entry With Pets</DataTitle>
			<DataInfo><xsl:value-of select="Content/PassportVisa/EntryWithPets/text()"/></DataInfo>
		</OutputData>
	</Section>

	<Section Name="General">
		<SectionTitle>Key Facts</SectionTitle>
		<OutputData Name="Location" ContentTypeID="">
			<DataTitle>Location</DataTitle>
			<DataInfo>
				<b>Latitude: </b><xsl:value-of select="Content/General/GMapsPoint/Latitude/text()"/>
				<b>Longitude: </b><xsl:value-of select="Content/General/GMapsPoint/Longitude/text()"/>
			</DataInfo>
		</OutputData>
		<OutputData Name="Area" ContentTypeID="">
			<DataTitle>Area</DataTitle>
			<DataInfo><xsl:value-of select="Content/General/Area/text()"/></DataInfo>
		</OutputData>
		<OutputData Name="Population" ContentTypeID="">
			<DataInfo><xsl:value-of select="Content/General/Population/text()"/></DataInfo>
		</OutputData>
		<OutputData Name="PopulationDensity" ContentTypeID="">
			<DataInfo><xsl:value-of select="Content/General/PopulationDensity/text()"/></DataInfo>
		</OutputData>
		<OutputData Name="CapitalCity" ContentTypeID="">
			<DataTitle>Capital</DataTitle>
			<DataInfo><xsl:value-of select="Content/General/Capital/text()"/></DataInfo>
		</OutputData>
		<OutputData Name="Government" ContentTypeID="">
			<DataTitle>Government</DataTitle>
			<DataInfo><xsl:value-of select="Content/General/Government/text()"/></DataInfo>
		</OutputData>
		<OutputData Name="Geography" ContentTypeID="">
			<DataTitle>Geography</DataTitle>
			<DataInfo><xsl:value-of select="Content/General/Geography/text()"/></DataInfo>
		</OutputData> 
		<OutputData Name="Language" ContentTypeID="">
			<DataTitle>Language</DataTitle>
			<DataInfo></DataInfo>
		</OutputData>
		<OutputData Name="Religion" ContentTypeID="">
			<DataTitle>Religion</DataTitle>
			<DataInfo><xsl:value-of select="Content/Culture/Religion/text()"/></DataInfo>
		</OutputData>
		<OutputData Name="Time" ContentTypeID="">
			<DataTitle>Time</DataTitle>
			<DataInfo>
				<xsl:for-each select="Content/General/Timezones/Timezone">
					<xsl:value-of select="StdTzNameValue"/>
				</xsl:for-each>
			</DataInfo>
		</OutputData> 
		<OutputData Name="Social Conventions" ContentTypeID="">
			<DataTitle>Social Conventions</DataTitle>
			<DataInfo><xsl:value-of select="Content/Culture/SocialConventions/text()"/></DataInfo>
		</OutputData>
		<OutputData Name="Electricity" ContentTypeID="">
			<DataTitle>Electricity</DataTitle>
			<DataInfo><xsl:value-of select="Content/General/Electricity/text()"/></DataInfo>
		</OutputData>
		<OutputData Name="HeadOfGovernment" ContentTypeID="">
			<DataTitle>Head of Government</DataTitle>
			<DataInfo><xsl:value-of select="Content/General/HeadOfGovernment/text()"/></DataInfo>
		</OutputData>
		<OutputData Name="HeadOfState" ContentTypeID="">
			<DataTitle>Head of State</DataTitle>
			<DataInfo><xsl:value-of select="Content/General/HeadOfState/text()"/></DataInfo>
		</OutputData>
		<OutputData Name="RecentHistory" ContentTypeID="">
			<DataTitle>Recent History</DataTitle>
			<DataInfo><xsl:value-of select="Content/History/History/text()"/></DataInfo>
		</OutputData>
	</Section>
	<Section Name="ContactAddresses">
		<SectionTitle>Contact Addresses</SectionTitle>
		<xsl:for-each select="Content/ContactAddresses/Contacts/Contact">
		<OutputData Name="UsefulAddress" ContentTypeID="">
			<DataTitle><xsl:value-of select="@title"/></DataTitle>
			<DataInfo>
				<p><b>Tel:</b><xsl:value-of select="Telephone"/></p>
				<p><b>Website:</b><xsl:value-of select="Website"/></p>
				<p><b>Tel:</b><xsl:value-of select="Telephone"/></p>
				<p><b>Opening Times:</b><xsl:value-of select="OpeningTimes"/></p>
				<p><b>Address:</b>
					<xsl:value-of select="Address/Address1"/><br />
					<xsl:value-of select="Address/Address2"/><br />
					<xsl:value-of select="Address/City"/><br />
					<xsl:value-of select="Address/Postcode"/><br />
				</p>
			</DataInfo>
		</OutputData>
		</xsl:for-each>
	</Section>
	<Section Name="Overview">
		<SectionTitle>Overview</SectionTitle>
		<OutputData Name="CountryOverview" ContentTypeID="">
			<DataTitle>Overview</DataTitle>
			<DataInfo>
				<xsl:value-of select="Content/Overview/Overview/text()"/>
				<xsl:value-of select="Content/Overview/Precis/text()"/>
			</DataInfo>
		</OutputData> 
	</Section>
	</Region>
</WTG>
       	</xsl:template>
</xsl:transform>
