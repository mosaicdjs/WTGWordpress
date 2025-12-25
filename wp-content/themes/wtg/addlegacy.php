<?php
/*
*TemplateName:AddLegacy
*/
function create_guide($legacyId, $code, $title)
{
	$id = wp_insert_post(array('post_title'=>$title, 'post_type'=>'guides', 'post_status'=>'publish'));
	echo 'New post created with ID '.$id;
	$cat_ids = 3;
	if ($id)
	{
		echo ' Updating legacy ID'.$legacyID;
		update_field('guide_legacy_id', $legacyId, $id);
		update_field('overview_airport_code', $code, $id);
		$term_taxonomy_ids = wp_set_object_terms( $id, $cat_ids, 'wtg_guide_type', true );
	}
	return $id;
}


//  create_guide('2800302','CCS','Caracas Flughafen (Aeropuerto Internacional de Maiquetía Simón Bolívar)');
//  create_guide('2699942','BOG','El Dorado International Flughafen (Bogota)');
//  create_guide('872734','LIM','Lima Jorge Chavez Internationaler Flughafen');
//  create_guide('872971','GRU','São Paulo/Guarulhos Internationaler Flughafen');
  create_guide('872939','GIG','Rio de Janeiro/Galeão - RIOgaleão – Aeroporto Internacional Tom Jobim');
  create_guide('873571','EZE','Buenos Aires (Ezeiza) Ministro Pistarini Internationaler Flughafen');
  create_guide('873052','WLG','Wellington Internationaler Flughafen');
  create_guide('872593','CHC','Christchurch Internationaler Flughafen');
  create_guide('872504','AKL','Auckland Internationaler Flughafen');
  create_guide('872902','PER','Perth Internationaler Flughafen');
  create_guide('872483','ADL','Adelaide Flughafen');
  create_guide('872557','BNE','Brisbane Flughafen');
  create_guide('873003','SYD','Sydney Kingsford Smith Internationaler Flughafen');
  create_guide('872814','MEL','Melbourne Flughafen');
  create_guide('1318042','DUR','Durban King Shaka Internationaler Flughafen');
  create_guide('872925','PLZ','Port Elizabeth Internationaler Flughafen');
  create_guide('872728','JNB','Johannesburg O.R. Tambo Internationaler Flughafen');
  create_guide('872579','CPT','Kapstadt Internationaler Flughafen');
  create_guide('2799992','ADD','Addis Abeba Bole Internationaler Flughafen');
  create_guide('1171172','MBA','Mombasa Moi Internationaler Flughafen');
  create_guide('1171182','NBO','Nairobi Jomo Kenyatta Internationaler Flughafen');
  create_guide('2813702','ACC','Accra Kotoka Internationaler Flughafen');
  create_guide('2813432','TUN','Tunis-Carthage Internationaler Flughafen');
  create_guide('1070602','BVC','Boa Vista Aristides Pereira Flughafen');
  create_guide('872364','CMN','Casablanca Mohammed V Internationaler Flughafen');
  create_guide('1070682','AGA','Agadir Al Massira Flughafen');
  create_guide('1057242','MRU','Mauritius Sir Seewoosagur Ramgoolam Internationaler Flughafen');
  create_guide('873494','RMF','Marsa Alam Internationaler Flughafen');
  create_guide('873148','SSH','Sharm el Scheikh Internationaler Flughafen');
  create_guide('873150','HRG','Hurghada Internationaler Flughafen');
  create_guide('872570','CAI','Kairo Internationaler Flughafen');
  create_guide('2813832','LOS','(Lagos) Murtala Muhammed Internationaler Flughafen');
  create_guide('2813722','ALG','(Algiers) Houari Boumediene Flughafen ');
  create_guide('1057202','POP','Puerto Plata Gregorio Luperón Internationaler Flughafen');
  create_guide('1070632','PUJ','Punta Cana Internationaler Flughafen');
  create_guide('872696','uvf','Hewanorra Internationaler Flughafen');
  create_guide('872446','SJU','(San Juan) Luis Muñoz Marín Internationaler Flughafen');
  create_guide('5643902','PTY','Tocumen Panama Internationaler Flughafen');
  create_guide('872576','CUN','Cancún Internationaler Flughafen');
  create_guide('872399','MEX','Mexiko City Internationaler Flughafen');
  create_guide('873029','ANU','St. John\'s V.C. Bird Internationaler Flughafen');
  create_guide('1070592','VRA','Varadero Juan Gualberto Gómez Flughafen ');
  create_guide('873048','IAD','Washington Dulles Internationaler Flughafen');
  create_guide('872471','DCA','(Washington) Ronald Reagan Washington National Flughafen');
  create_guide('872957','SLC','Salt Lake City Internationaler Flughafen');
  create_guide('872354','BOS','(Boston) Logan Internationaler Flughafen');
  create_guide('872738','MCI','Kansas City Internationaler Flughafen');
  create_guide('872510','BWI','Baltimore/Washington International Thurgood Marshall Flughafen');
  create_guide('872854','EWR','Newark Liberty Internationaler Flughafen');
  create_guide('872975','SEA','Seattle-Tacoma Internationaler Flughafen');
  create_guide('872923','CMH','(Columbus) Port Columbus Internationaler Flughafen');
  create_guide('872596','CVG','Cincinnati-Northern Kentucky Internationaler Flughafen');
  create_guide('872600','CLE','Cleveland Hopkins Internationaler Flughafen');
  create_guide('872420','MSY','Louis Armstrong New Orleans Internationaler Flughafen');
  create_guide('872708','HNL','Daniel K. Inouye Internationaler Flughafen');
  create_guide('872850','BNA','Nashville Internationaler Flughafen');
  create_guide('872818','MEM','Memphis Internationaler Flughafen');
  create_guide('872716','IND','Indianapolis Internationaler Flughafen');
  create_guide('872788','SDF','Louisville Internationaler Flughafen');
  create_guide('872403','MKE','(Milwaukee) General Mitchell Internationaler Flughafen');
  create_guide('872955','SMF','Sacramento Internationaler Flughafen');
  create_guide('872963','SAN','San Diego Internationaler Flughafen');
  create_guide('872442','SJC','San Jose Internationaler Flughafen');
  create_guide('6059672','SJC','Mineta San José Internationaler Flughafen (SJC)');
  create_guide('872876','ONT','Ontario Internationaler Flughafen');
  create_guide('872784','LAX','Los Angeles Internationaler Flughafen');
  create_guide('872732','SNA','John Wayne Flughafen');
  create_guide('872358','BUR','Bob Hope Flughafen');
  create_guide('872967','SFO','San Francisco Internationaler Flughafen');
  create_guide('872872','OAK','Oakland Internationaler Flughafen');
  create_guide('872350','ATL','(Atlanta) Hartsfield Atlanta Internationaler Flughafen');
  create_guide('872553','BDL','Bradley Internationaler Flughafen');
  create_guide('872927','PDX','Portland Internationaler Flughafen');
  create_guide('872488','ABQ','Albuquerque International Sunport');
  create_guide('872621','DEN','Denver Internationaler Flughafen');
  create_guide('872961','SAT','San Antonio Internationaler Flughafen');
  create_guide('872648','ELP','El Paso Internationaler Flughafen');
  create_guide('872616','DFW','Dallas/Fort Worth Internationaler Flughafen');
  create_guide('872508','AUS','Austin Bergstrom Internationaler Flughafen');
  create_guide('872378','IAH','(Houston) George Bush Intercontinental Flughafen');
  create_guide('872382','HOU','Houston William P. Hobby Flughafen');
  create_guide('872935','RDU','Raleigh-Durham Internationaler Flughafen');
  create_guide('872585','CLT','Charlotte-Douglas International Flughafen');
  create_guide('872459','STL','Lambert-St. Louis Internationaler Flughafen');
  create_guide('872937','RNO','Reno-Tahoe Internationaler Flughafen');
  create_guide('872391','LAS','(Las Vegas) McCarran Internationaler Flughafen');
  create_guide('872432','OKC','(Oklahoma City) Will Rogers World Flughafen');
  create_guide('872724','JAX','Jacksonville Internationaler Flughafen');
  create_guide('872589','ORD','Chicago O\'Hare Internationaler Flughafen');
  create_guide('873027','TUS','Tucson Internationaler Flughafen');
  create_guide('872909','PHX','Phoenix Sky Harbor Internationaler Flughafen');
  create_guide('872917','PIT','Pittsburgh Internationaler Flughafen');
  create_guide('872905','PHL','Philadelphia Internationaler Flughafen');
  create_guide('872625','DTW','Detroit Metro Flughafen');
  create_guide('872568','BUF','Buffalo Niagara Internationaler Flughafen');
  create_guide('872424','JFK','(New York) John F. Kennedy Internationaler Flughafen');
  create_guide('872428','LGA','(New York) LaGuardia Flughafen');
  create_guide('873007','TPA','Tampa Internationaler Flughafen');
  create_guide('872991','RSW','Southwest Florida Internationaler Flughafen');
  create_guide('872886','PBI','Palm Beach Internationaler Flughafen');
  create_guide('872657','FLL','Fort Lauderdale Hollywood Internationaler Flughafen');
  create_guide('872822','MIA','Miami Internationaler Flughafen');
  create_guide('872878','MCO','Orlando Internationaler Flughafen');
  create_guide('872834','MSP','Minneapolis-St Paul Internationaler Flughafen');
  create_guide('872573','YYC','Calgary Internationaler Flughafen');
  create_guide('873019','YYZ','Toronto Pearson Internationaler Flughafen');
  create_guide('873032','YVR','Vancouver Internationaler Flughafen');
  create_guide('872683','YHZ','Halifax Stanfield Internationaler Flughafen');
  create_guide('872838','YUL','Montréal—Pierre Elliott Trudeau Internationaler Flughafen');
  create_guide('2814402','ALA','Almaty internationaler Flughafen');
  create_guide('872451','ICN','Seoul Incheon Internationaler Flughafen');
  create_guide('872360','PUS','Gimhae Internationaler Flughafen');
  create_guide('2814452','GYD','Baku Heydar Aliyev Internationaler Flughafen');
  create_guide('2814262','SGN','Tan Son Nhat Internationaler Flughafen');
  create_guide('2814162','EBL','Erbil Internationaler Flughafen ');
  create_guide('2813572','HKT','Phuket Internationaler Flughafen');
  create_guide('873066','DMK','(Bangkok) Don Mueang Internationaler Flughafen');
  create_guide('872514','BKK','(Bangkok) Suvarnabhumi Internationaler Flughafen');
  create_guide('2800262','TBS','Tiflis Internationaler Flughafen');
  create_guide('2800082','BEY','Beirut Rafiq-Hariri internationaler Flughafen');
  create_guide('1057282','MLE','Velana Internationaler Flughafen');
  create_guide('872479','AUH','Abu Dhabi Internationaler Flughafen');
  create_guide('872486','AAN','Al Ain Internationaler Flughafen');
  create_guide('872629','DXB','Dubai Internationaler Flughafen');
  create_guide('872986','CGK','(Jakarta) Soekarno-Hatta Internationaler Flughafen');
  create_guide('872367','DPS','(Denpasar) Ngurah Rai Flughafen');
  create_guide('872534','TLV','(Tel Aviv) Ben Gurion Internationaler Flughafen');
  create_guide('1057052','CMB','Colombo Bandaranaike Internationaler Flughafen');
  create_guide('872742','KUL','Kuala Lumpur Internationaler Flughafen');
  create_guide('2813782','AMM','(Amman) Queen Alia Internationaler Flughafen ');
  create_guide('2815442','MCT','Maskat Flughafen');
  create_guide('2801272','KWI','Kuwait Flughafen');
  create_guide('872943','RUH','Riad King Khalid Internationaler Flughafen');
  create_guide('2813872','JED','(Dschidda) King Abdulaziz Internationaler Flughafen');
  create_guide('872395','MNL','Manila Ninoy Aquino Internationaler Flughafen');
  create_guide('872434','KIX','Osaka Kansai Internationaler Flughafen');
  create_guide('2801322','NGO','Chūbu Flughafen (Centrair)');
  create_guide('873559','HND','Flughafen Tokio-Haneda');
  create_guide('873015','NRT','Tokio Narita Internationaler Flughafen');
  create_guide('2800812','IKA','Teheran Imam Khomeini Internationaler Flughafen');
  create_guide('872413','BOM','Mumbai Chhatrapati Shivaji Internationaler Flughafen');
  create_guide('872416','DEL','New Delhi Indira Gandhi Internationaler Flughafen');
  create_guide('2801232','BLR','(Bengaluru) Kempegowda Internationaler Flughafen');
  create_guide('2800342','MAA','Chennai Internationaler Flughafen');
  create_guide('872467','TPE','Taiwan Taoyuan Internationaler Flughafen');
  create_guide('2814082','DOH','(Doha) Hamad Internationaler Flughafen');
  create_guide('872522','PEK','Peking Capital Internationaler Flughafen');
  create_guide('872704','SHA','Shanghai Hong Qiao Internationaler Flughafen');
  create_guide('872455','PVG','Shanghai Pudong Internationaler Flughafen');
  create_guide('872700','HKG','Hong Kong Internationaler Flughafen');
  create_guide('872982','SIN','Singapur Changi Internationaler Flughafen');
  create_guide('2800782','CLJ','Cluj-Napoca (Klausenburg) Flughafen');
  create_guide('2802092','TSR','Timisoara Traian Vuia Internationaler Flughafen');
  create_guide('2801552','SBZ','Hermannstadt Flughafen');
  create_guide('2460662','OTP','Bukarest Henri Coandă Internationaler Flughafen');
  create_guide('2699912','BLL','Billund Flughafen');
  create_guide('872608','CPH','Kopenhagen Flughafen');
  create_guide('2802142','TIA','Tirana internationaler Flughafen Nënë Tereza');
  create_guide('873472','SKG','Flughafen Makedonien /Thessaloniki Flughafen');
  create_guide('872501','ATH','Athen Internationaler Flughafen');
  create_guide('1057412','HER','Heraklion Internationaler Flughafen - Nikos Kazantzakis');
  create_guide('1057392','KGS','Kos Internationaler Flughafen - Hippocrates');
  create_guide('1057152','RHO','Rhodos Diagoras Internationaler Flughafen');
  create_guide('1057062','CFU','Korfu Ioannis Kapodistrias Internationaler Flughafen');
  create_guide('1070652','CHQ','Chania Internationaler Flughafen');
  create_guide('872561','BRU','Brüssel Flughafen');
  create_guide('2700262','RIX','Riga Internationaler Flughafen');
  create_guide('872802','MLA','Malta Internationaler Flughafen');
  create_guide('872673','GOT','Göteborg-Landvetter Flughafen');
  create_guide('872993','ARN','Stockholm Arlanda Flughafen');
  create_guide('2815492','LWO','Lwiw Flughafen');
  create_guide('2700062','KBP','Kiew-Boryspil Internationaler Flughafen ');
  create_guide('1144372','LUX','Luxemburg Flughafen');
  create_guide('872753','LCA','Larnaca Internationaler Flughafen');
  create_guide('2817142','VNO','Vilnius Flughafen');
  create_guide('872653','FAO','Faro Internationaler Flughafen');
  create_guide('1057262','FNC','Madeira Cristiano Ronaldo Flughafen');
  create_guide('2700212','OPO','Porto Francisco Sá Carneiro Internationaler Flughafen');
  create_guide('872760','LIS','Lissabon Portela Flughafen');
  create_guide('873495','ACH','St. Gallen-Altenrhein Flughafen');
  create_guide('872650','BSL/MLH/EAP','Basel-Mulhouse-Freiburg EuroFlughafen');
  create_guide('872665','GVA','Genf Internationaler Flughafen');
  create_guide('2123942','BRN','Bern-Belp Flughafen');
  create_guide('873055','ZRH','Zürich Flughafen');
  create_guide('2698992','BGO','Flughafen Bergen');
  create_guide('2700802','SVG','Stavanger Flughafen');
  create_guide('872882','OSL','Oslo Flughafen');
  create_guide('2813522','KEF','(Reykjavik) Keflavík Internationaler Flughafen');
  create_guide('873023','TLS','Toulouse-Blagnac Flughafen');
  create_guide('872790','LYS','Lyon Saint Exupéry Flughafen');
  create_guide('872810','MRS','Marseille Provence Flughafen');
  create_guide('872549','BOD','Bordeaux Internationaler Flughafen');
  create_guide('2813822','BIA','Bastia Poretta Flughafen ');
  create_guide('2700842','SXB','Straßburg Internationaler Flughafen');
  create_guide('872894','ORY','Paris Orly Flughafen');
  create_guide('872898','CDG','Paris Charles de Gaulle Flughafen');
  create_guide('872862','NCE','Nizza Cote d\'Azur Flughafen');
  create_guide('872722','ADB','Izmir Adnan Menderes');
  create_guide('872498','AYT','Antalya Havalimani Flughafen');
  create_guide('1057162','DLM','Dalaman Flughafen');
  create_guide('1057132','SAW','Istanbul Sabiha Gökçen Internationaler Flughafen');
  create_guide('2698932','ESB','Ankara Esanboğa Internationaler Flughafen');
  create_guide('872386','IST','Istanbul Atatürk Internationaler Flughafen');
  create_guide('2801482','SJJ','Sarajevo Flughafen');
  create_guide('873474','GRZ','Graz - Thalerhof Flughafen');
  create_guide('873475','KLU','Klagenfurt - Flughafen');
  create_guide('873477','LNZ','Linz Blue Danube Flughafen');
  create_guide('873100','INN','Innsbruck Flughafen');
  create_guide('873097','SZG','Salzburg - W.A. Mozart Flughafen');
  create_guide('873040','VIE','Wien Internationaler Flughafen');
  create_guide('872463','LED','St. Petersburg Pulkovo Flughafen');
  create_guide('2802802','GOJ','Nischni Nowgorod Flughafen');
  create_guide('2802782','KUF','Samara Flughafen');
  create_guide('873608','VKO','Moskau Vnukovo Internationaler Flughafen');
  create_guide('872409','SVO','Moskau Sheremetyevo Internationaler Flughafen');
  create_guide('872407','DME','Moskau Domodedovo Internationaler Flughafen');
  create_guide('2813672','LJU','(Laibach) Ljubljana Jože Pučnik Flughafen');
  create_guide('873011','TFS','Teneriffa-Süd Reina Sofia Flughafen');
  create_guide('872798','AGP','Málaga Flughafen');
  create_guide('872749','ACE','Lanzarote Internationaler Flughafen');
  create_guide('872676','LPA','Gran Canaria Las Palmas Flughafen');
  create_guide('872712','IBZ','Ibiza Flughafen');
  create_guide('872490','ALC','Alicante Flughafen');
  create_guide('1057322','MAH','Menorca Flughafen');
  create_guide('1057302','FUE','Fuerteventura Flughafen');
  create_guide('1070692','XRY','Jerez Flughafen');
  create_guide('2802382','VLC','Valencia Flughafen');
  create_guide('2460592','BIO','Bilbao Flughafen');
  create_guide('872794','MAD','Madrid Barajas Adolfo Suárez Flughafen');
  create_guide('872518','BCN','Barcelona Internationaler Flughafen');
  create_guide('872888','PMI','Palma de Mallorca Flughafen');
  create_guide('873471','DRS','Dresden Flughafen');
  create_guide('873476','LEJ','Leipzig-Halle Flughafen');
  create_guide('873480','AOC','Leipzig-Altenburg Flughafen');
  create_guide('873481','FMM','Memmingen Verkehrsflughafen');
  create_guide('873482','FKB','Karlsruhe/Baden-Baden Flughafen');
  create_guide('873483','BRE','Bremen Flughafen');
  create_guide('873484','DTM','Dortmund Flughafen 21');
  create_guide('873485','ERF','Erfurt-Weimar Flughafen');
  create_guide('873486','FDH','Friedrichshafen Flughafen');
  create_guide('873488','FMO','Münster-Osnabrück Flughafen');
  create_guide('873489','NUE','Albrecht Dürer Flughafen Nürnberg');
  create_guide('873490','PAD','Paderborn/Lippstadt Flughafen');
  create_guide('873491','RLG','Rostock/Laage Flughafen');
  create_guide('873492','SCN','Saarbrücken Flughafen');
  create_guide('873493','','Weeze Flughafen');
  create_guide('873000','STR','Stuttgart Flughafen - Manfred Rommel Flughafen');
  create_guide('872689','HAJ','Hannover Flughafen');
  create_guide('2800202','GWT','Sylt (Westerland) Flughafen');
  create_guide('873479','HHN','Frankfurt Hahn Flughafen');
  create_guide('872661','FRA','Frankfurt Flughafen');
  create_guide('872640','DUS','Düsseldorf Flughafen');
  create_guide('872604','CGN','Köln-Bonn (Konrad Adenauer) Flughafen');
  create_guide('873473','SXF','Berlin Schönefeld Flughafen');
  create_guide('872537','TXL','Berlin-Tegel');
  create_guide('872685','HAM','Hamburg Flughafen Helmut Schmidt');
  create_guide('872842','MUC','München Flughafen');
  create_guide('2802702','ZAG','Franjo Tuđman Zagreb Flughafen');
  create_guide('2813402','ZAD','Zadar Flughafen');
  create_guide('2800862','DBV','Dubrovnik Flughafen');
  create_guide('2800132','SPU','Split Flughafen');
  create_guide('1069712','BOJ','Burgas Flughafen');
  create_guide('2700302','SOF','Sofia Flughafen');
  create_guide('2802752','MSQ','Minsk Nationaler Flughafen');
  create_guide('2698962','BEG','Flughafen Nikola Tesla Belgrad');
  create_guide('2814802','KIV','Chisinau Internationaler Flughafen');
  create_guide('872951','RTM','Rotterdam Den Haag Flughafen');
  create_guide('872494','AMS','Amsterdam Schiphol Internationaler Flughafen');
  create_guide('2699402','KRK','Johannes Paul II. Krakau-Balice Flughafen');
  create_guide('873044','WAW','Warschau Frederic Chopin Flughafen');
  create_guide('2813472','RZE','Rzeszów-Jasionka Flughafen');
  create_guide('2802432','WRO','Wroclaw (Breslau) Nikolaus-Kopernikus-Flughafen');
  create_guide('2801362','POZ','Posen-Ławica-Flughafen');
  create_guide('2801042','KTW','Kattowitz Flughafen');
  create_guide('2700042','GDN','Lech-Wałęsa-Flughafen Danzig');
  create_guide('872846','NAP','Neapel Internationaler Flughafen');
  create_guide('872545','BLQ','Bologna G. Marconi Flughafen');
  create_guide('1069742','CTA','Catania Fontanarossa Flughafen');
  create_guide('2815412','PMO','Palermo-Punta Raisi Flughafen');
  create_guide('2814122','CAG','(Elmas) Cagliari Flughafen');
  create_guide('2813602','OLB','Olbia Costa Smeralda Flughafen');
  create_guide('2802172','TRS','Triest - Friuli Venezia Giulia Flughafen');
  create_guide('2800962','GOA','Genua Flughafen');
  create_guide('2800072','BRI','Bari Johannes Paul II. (Karol Wojtyla) Flughafen');
  create_guide('2800042','AOI','Ancona Falconara Flughafen');
  create_guide('2700932','VRN','Verona Villafranca Flughafen');
  create_guide('2700872','TRN','Turin Caselle Flughafen');
  create_guide('873036','VCE','Venedig Marco Polo Flughafen');
  create_guide('873544','CIA','Rom Ciampino Flughafen');
  create_guide('872947','FCO','Rom-Fiumicino Leonardo da Vinci Flughafen');
  create_guide('872826','LIN','Mailand Linate Flughafen');
  create_guide('872830','MXP','Mailand Malpensa Flughafen');
  create_guide('872913','PSA','Pisa Galileo Galilei Flughafen');
  create_guide('2700002','FLR','Florenz Flughafen');
  create_guide('872858','NCL','Newcastle Flughafen');
  create_guide('872868','EMA','East Midlands Flughafen');
  create_guide('872806','MAN','Manchester Internationaler Flughafen');
  create_guide('872756','LBA','Leeds Bradford Internationaler Flughafen');
  create_guide('872541','BHX','Birmingham Internationaler Flughafen');
  create_guide('872764','LCY','London City Flughafen');
  create_guide('872768','LGW','London Gatwick Flughafen');
  create_guide('872772','LHR','London Heathrow Flughafen');
  create_guide('872776','LTN','London Luton Flughafen');
  create_guide('872780','STN','London Stansted Flughafen');
  create_guide('872526','BHD','Belfast City George Best Flughafen');
  create_guide('872530','BFS','Belfast Internationaler Flughafen');
  create_guide('872644','EDI','Edinburgh Flughafen');
  create_guide('872669','GLA','Glasgow Flughafen');
  create_guide('872718','INV','Inverness Flughafen');
  create_guide('872475','ABZ','Aberdeen Internationaler Flughafen');
  create_guide('872565','BUD','Budapest Ferenc Liszt Flughafen');
  create_guide('873557','TLL','Tallinn Flughafen');
  create_guide('872633','DUB','Dublin Flughafen');
  create_guide('872931','PRG','Letiště Václava Havla Praha Internationaler Flughafen');
  create_guide('872692','HEL','Helsinki-Vantaa Flughafen');

 /* 
$pageObject=get_page_by_title('Palma De Mallorca',OBJECT,'guides');update_field('guide_legacy_id','860603',$pageObject->ID);echo'<br/>'.$pageObject->ID;
$pageObject=get_page_by_title('Rio de Janeiro',OBJECT,'guides');update_field('guide_legacy_id','854191',$pageObject->ID);echo'<br/>'.$pageObject->ID;
$pageObject=get_page_by_title('Buenos Aires',OBJECT,'guides');update_field('guide_legacy_id','858041',$pageObject->ID);echo'<br/>'.$pageObject->ID;
$pageObject=get_page_by_title('New York City',OBJECT,'guides');update_field('guide_legacy_id','863939',$pageObject->ID);echo'<br/>'.$pageObject->ID;
$pageObject=get_page_by_title('Los Angeles',OBJECT,'guides');update_field('guide_legacy_id','862750',$pageObject->ID);echo'<br/>'.$pageObject->ID;
$pageObject=get_page_by_title('San Francisco',OBJECT,'guides');update_field('guide_legacy_id','854534',$pageObject->ID);echo'<br/>'.$pageObject->ID;
$pageObject=get_page_by_title('Las Vegas',OBJECT,'guides');update_field('guide_legacy_id','861806',$pageObject->ID);echo'<br/>'.$pageObject->ID;
$pageObject=get_page_by_title('Kopenhagen',OBJECT,'guides');
update_field('guide_legacy_id','859099',$pageObject->ID);
echo'<br/>'.$pageObject->ID;
$pageObject=get_page_by_title('Lissabon',OBJECT,'guides');update_field('guide_legacy_id','862445',$pageObject->ID);echo'<br/>'.$pageObject->ID;
$pageObject=get_page_by_title('Madrid',OBJECT,'guides');update_field('guide_legacy_id','862872',$pageObject->ID);echo'<br/>'.$pageObject->ID;
$pageObject=get_page_by_title('Barcelona',OBJECT,'guides');update_field('guide_legacy_id','854619',$pageObject->ID);echo'<br/>'.$pageObject->ID;
$pageObject=get_page_by_title('Paris',OBJECT,'guides');update_field('guide_legacy_id','864155',$pageObject->ID);echo'<br/>'.$pageObject->ID;
$pageObject=get_page_by_title('Nizza',OBJECT,'guides');update_field('guide_legacy_id','857541',$pageObject->ID);echo'<br/>'.$pageObject->ID;
$pageObject=get_page_by_title('Zürich',OBJECT,'guides');update_field('guide_legacy_id','856383',$pageObject->ID);echo'<br/>'.$pageObject->ID;
$pageObject=get_page_by_title('Stockholm',OBJECT,'guides');update_field('guide_legacy_id','855315',$pageObject->ID);echo'<br/>'.$pageObject->ID;
$pageObject=get_page_by_title('Tallinn',OBJECT,'guides');update_field('guide_legacy_id','855559',$pageObject->ID);echo'<br/>'.$pageObject->ID;
$pageObject=get_page_by_title('Oslo',OBJECT,'guides');update_field('guide_legacy_id','864053',$pageObject->ID);echo'<br/>'.$pageObject->ID;
$pageObject=get_page_by_title('Dublin',OBJECT,'guides');update_field('guide_legacy_id','859871',$pageObject->ID);echo'<br/>'.$pageObject->ID;
$pageObject=get_page_by_title('Mailand',OBJECT,'guides');update_field('guide_legacy_id','863462',$pageObject->ID);echo'<br/>'.$pageObject->ID;
$pageObject=get_page_by_title('Florenz',OBJECT,'guides');update_field('guide_legacy_id','860112',$pageObject->ID);echo'<br/>'.$pageObject->ID;
$pageObject=get_page_by_title('Venedig',OBJECT,'guides');update_field('guide_legacy_id','856026',$pageObject->ID);echo'<br/>'.$pageObject->ID;
$pageObject=get_page_by_title('Rom',OBJECT,'guides');update_field('guide_legacy_id','854274',$pageObject->ID);echo'<br/>'.$pageObject->ID;
$pageObject=get_page_by_title('Budapest',OBJECT,'guides');update_field('guide_legacy_id','857919',$pageObject->ID);echo'<br/>'.$pageObject->ID;
$pageObject=get_page_by_title('Moskau',OBJECT,'guides');update_field('guide_legacy_id','863646',$pageObject->ID);echo'<br/>'.$pageObject->ID;
$pageObject=get_page_by_title('Istanbul',OBJECT,'guides');update_field('guide_legacy_id','861228',$pageObject->ID);echo'<br/>'.$pageObject->ID;
$pageObject=get_page_by_title('Prag',OBJECT,'guides');update_field('guide_legacy_id','864310',$pageObject->ID);echo'<br/>'.$pageObject->ID;
$pageObject=get_page_by_title('Wien',OBJECT,'guides');update_field('guide_legacy_id','856111',$pageObject->ID);echo'<br/>'.$pageObject->ID;
$pageObject=get_page_by_title('Salzburg',OBJECT,'guides');update_field('guide_legacy_id','854399',$pageObject->ID);echo'<br/>'.$pageObject->ID;
$pageObject=get_page_by_title('Amsterdam',OBJECT,'guides');update_field('guide_legacy_id','859552',$pageObject->ID);echo'<br/>'.$pageObject->ID;
$pageObject=get_page_by_title('München',OBJECT,'guides');update_field('guide_legacy_id','863748',$pageObject->ID);echo'<br/>'.$pageObject->ID;
$pageObject=get_page_by_title('Köln',OBJECT,'guides');update_field('guide_legacy_id','861476',$pageObject->ID);echo'<br/>'.$pageObject->ID;
$pageObject=get_page_by_title('Frankfurt',OBJECT,'guides');update_field('guide_legacy_id','860184',$pageObject->ID);echo'<br/>'.$pageObject->ID;
$pageObject=get_page_by_title('Düsseldorf',OBJECT,'guides');update_field('guide_legacy_id','858964',$pageObject->ID);echo'<br/>'.$pageObject->ID;
$pageObject=get_page_by_title('Hamburg',OBJECT,'guides');update_field('guide_legacy_id','856557',$pageObject->ID);echo'<br/>'.$pageObject->ID;
$pageObject=get_page_by_title('Berlin',OBJECT,'guides');update_field('guide_legacy_id','856468',$pageObject->ID);echo'<br/>'.$pageObject->ID;
$pageObject=get_page_by_title('Helsinki',OBJECT,'guides');update_field('guide_legacy_id','860985',$pageObject->ID);echo'<br/>'.$pageObject->ID;
$pageObject=get_page_by_title('London',OBJECT,'guides');update_field('guide_legacy_id','862681',$pageObject->ID);echo'<br/>'.$pageObject->ID;

$pageObject=get_page_by_title('Singapur',OBJECT,'guides');update_field('guide_legacy_id','855027',$pageObject->ID);echo'<br/>'.$pageObject->ID;
$pageObject=get_page_by_title('Dubai',OBJECT,'guides');update_field('guide_legacy_id','859783',$pageObject->ID);echo'<br/>'.$pageObject->ID;
$pageObject=get_page_by_title('Peking',OBJECT,'guides');update_field('guide_legacy_id','855230',$pageObject->ID);echo'<br/>'.$pageObject->ID;
$pageObject=get_page_by_title('Shanghai',OBJECT,'guides');update_field('guide_legacy_id','854947',$pageObject->ID);echo'<br/>'.$pageObject->ID;
$pageObject=get_page_by_title('Hongkong',OBJECT,'guides');update_field('guide_legacy_id','861106',$pageObject->ID);echo'<br/>'.$pageObject->ID;
$pageObject=get_page_by_title('Bangkok',OBJECT,'guides');update_field('guide_legacy_id','853905',$pageObject->ID);echo'<br/>'.$pageObject->ID;
$pageObject=get_page_by_title('Tokio',OBJECT,'guides');update_field('guide_legacy_id','855669',$pageObject->ID);echo'<br/>'.$pageObject->ID;
$pageObject=get_page_by_title('Melbourne',OBJECT,'guides');update_field('guide_legacy_id','863163',$pageObject->ID);echo'<br/>'.$pageObject->ID;
$pageObject=get_page_by_title('Sydney',OBJECT,'guides');update_field('guide_legacy_id','855438',$pageObject->ID);echo'<br/>'.$pageObject->ID;
$pageObject=get_page_by_title('Toronto',OBJECT,'guides');update_field('guide_legacy_id','855747',$pageObject->ID);echo'<br/>'.$pageObject->ID;
$pageObject=get_page_by_title('Orlando',OBJECT,'guides');update_field('guide_legacy_id','864000',$pageObject->ID);echo'<br/>'.$pageObject->ID;
$pageObject=get_page_by_title('Miami',OBJECT,'guides');update_field('guide_legacy_id','863380',$pageObject->ID);echo'<br/>'.$pageObject->ID;

$pageObject=get_page_by_title('Kairo',OBJECT,'guides');update_field('guide_legacy_id','858298',$pageObject->ID);echo'<br/>'.$pageObject->ID;
$pageObject=get_page_by_title('Johannesburg',OBJECT,'guides');update_field('guide_legacy_id','861414',$pageObject->ID);echo'<br/>'.$pageObject->ID;
$pageObject=get_page_by_title('Kapstadt',OBJECT,'guides');update_field('guide_legacy_id','858603',$pageObject->ID);echo'<br/>'.$pageObject->ID;
/*
<?php$pageObject=get_page_by_title('Afghanistan',OBJECT,'guides','guides')?>
<?phpupdate_field('guide_legacy_id','guide_legacy_id','833870',$pageObject->ID);echo'<br/>ID='.$pageObject->ID;?>
<?phpecho'thepageobjectIDis'.$pageObject->ID;?>
<?php$pageObject=get_page_by_title('S?oTom?undPr?ncipe',OBJECT,'guides')?><?phpupdate_field('guide_legacy_id','844447',$pageObject->ID);echo'<br/>ID='.$pageObject->ID;?>
<?php$pageObject=get_page_by_title('S?dkorea',OBJECT,'guides')?><?phpupdate_field('guide_legacy_id','835403',$pageObject->ID);echo'<br/>ID='.$pageObject->ID;?>
<?php$pageObject=get_page_by_title('Cura?ao',OBJECT,'guides')?><?phpupdate_field('guide_legacy_id','826088',$pageObject->ID);echo'<br/>ID='.$pageObject->ID;?>
<?php$pageObject=get_page_by_title('Gr?nland',OBJECT,'guides')?><?phpupdate_field('guide_legacy_id','829477',$pageObject->ID);echo'<br/>ID='.$pageObject->ID;?>
<?php$pageObject=get_page_by_title('S?dsudan',OBJECT,'guides')?><?phpupdate_field('guide_legacy_id','938692',$pageObject->ID);echo'<br/>ID='.$pageObject->ID;?>
<?php$pageObject=get_page_by_title('S?dafrika',OBJECT,'guides')?><?phpupdate_field('guide_legacy_id','845057',$pageObject->ID);echo'<br/>ID='.$pageObject->ID;?>
<?php$pageObject=get_page_by_title('R?union',OBJECT,'guides')?><?phpupdate_field('guide_legacy_id','846659',$pageObject->ID);echo'<br/>ID='.$pageObject->ID;?>
<?php$pageObject=get_page_by_title('C?ted\'Ivoire',OBJECT,'guides')?><?phpupdate_field('guide_legacy_id','842320',$pageObject->ID);echo'<br/>ID='.$pageObject->ID;?>
<?php$pageObject=get_page_by_title('Franz?sisch-Guyana',OBJECT,'guides')?><?phpupdate_field('guide_legacy_id','846550',$pageObject->ID);echo'<br/>ID='.$pageObject->ID;?>
<?php$pageObject=get_page_by_title('Franz?sische?berseegebiete',OBJECT,'guides')?><?phpupdate_field('guide_legacy_id','820196',$pageObject->ID);echo'<br/>ID='.$pageObject->ID;?>
<?php$pageObject=get_page_by_title('Rum?nien',OBJECT,'guides')?><?phpupdate_field('guide_legacy_id','823164',$pageObject->ID);echo'<br/>ID='.$pageObject->ID;?>
<?php$pageObject=get_page_by_title('D?nemark',OBJECT,'guides')?><?phpupdate_field('guide_legacy_id','819690',$pageObject->ID);echo'<br/>ID='.$pageObject->ID;?>
<?php$pageObject=get_page_by_title('Gro?britannienundNordirland',OBJECT,'guides')?><?phpupdate_field('guide_legacy_id','824730',$pageObject->ID);echo'<br/>ID='.$pageObject->ID;?>
<?php$pageObject=get_page_by_title('T?rkei',OBJECT,'guides')?><?phpupdate_field('guide_legacy_id','824446',$pageObject->ID);echo'<br/>ID='.$pageObject->ID;?>
<?php$pageObject=get_page_by_title('Britische?berseegebiete',OBJECT,'guides')?><?phpupdate_field('guide_legacy_id','847744',$pageObject->ID);echo'<br/>ID='.$pageObject->ID;?>
<?php$pageObject=get_page_by_title('N?rdlicheMarianen',OBJECT,'guides')?><?phpupdate_field('guide_legacy_id','853381',$pageObject->ID);echo'<br/>ID='.$pageObject->ID;?>
<?php$pageObject=get_page_by_title('F?derierteStaatenvonMikronesien',OBJECT,'guides')?><?phpupdate_field('guide_legacy_id','853241',$pageObject->ID);echo'<br/>ID='.$pageObject->ID;
<?php$pageObject=get_page_by_title('RussischeF?deration',OBJECT,'guides')?><?phpupdate_field('guide_legacy_id','823289',$pageObject->ID);echo'<br/>ID='.$pageObject->ID;?>
<?php$pageObject=get_page_by_title('Franz?sisch-Polynesien',OBJECT,'guides')?><?phpupdate_field('guide_legacy_id','831525',$pageObject->ID);echo'<br/>ID='.$pageObject->ID;?>

<?php$pageObject=get_page_by_title('Egypten',OBJECT,'guides')?><?phpupdate_field('guide_legacy_id','841284',$pageObject->ID);echo'<br/>ID='.$pageObject->ID;?>
<?php$pageObject=get_page_by_title('Equatorialguinea',OBJECT,'guides')?><?phpupdate_field('guide_legacy_id','841424',$pageObject->ID);echo'<br/>ID='.$pageObject->ID;?>
<?php$pageObject=get_page_by_title('Ethiopien',OBJECT,'guides')?><?phpupdate_field('guide_legacy_id','841645',$pageObject->ID);echo'<br/>ID='.$pageObject->ID;?>
<?php$pageObject=get_page_by_title('Osterreich',OBJECT,'guides')?><?phpupdate_field('guide_legacy_id','818598',$pageObject->ID);echo'<br/>ID='.$pageObject->ID;?>


<?php/*$pageObject=get_page_by_title('Armenien',OBJECT,'guides')?><?phpupdate_field('guide_legacy_id','833989',$pageObject->ID);echo'<br/>ID='.$pageObject->ID;?>
<?php$pageObject=get_page_by_title('Aserbaidschan',OBJECT,'guides')?><?phpupdate_field('guide_legacy_id','834109',$pageObject->ID);echo'<br/>ID='.$pageObject->ID;?>
<?php$pageObject=get_page_by_title('Georgien',OBJECT,'guides')?><?phpupdate_field('guide_legacy_id','834222',$pageObject->ID);echo'<br/>ID='.$pageObject->ID;?>
<?php$pageObject=get_page_by_title('Kasachstan',OBJECT,'guides')?><?phpupdate_field('guide_legacy_id','834328',$pageObject->ID);echo'<br/>ID='.$pageObject->ID;?>
<?php$pageObject=get_page_by_title('Kirgisistan',OBJECT,'guides')?><?phpupdate_field('guide_legacy_id','834436',$pageObject->ID);echo'<br/>ID='.$pageObject->ID;?>
<?php$pageObject=get_page_by_title('Mongolei',OBJECT,'guides')?><?phpupdate_field('guide_legacy_id','834545',$pageObject->ID);echo'<br/>ID='.$pageObject->ID;?>
<?php$pageObject=get_page_by_title('Tadschikistan',OBJECT,'guides')?><?phpupdate_field('guide_legacy_id','834651',$pageObject->ID);echo'<br/>ID='.$pageObject->ID;?>
<?php$pageObject=get_page_by_title('Turkmenistan',OBJECT,'guides')?><?phpupdate_field('guide_legacy_id','834764',$pageObject->ID);echo'<br/>ID='.$pageObject->ID;?>
<?php$pageObject=get_page_by_title('Usbekistan',OBJECT,'guides')?><?phpupdate_field('guide_legacy_id','834873',$pageObject->ID);echo'<br/>ID='.$pageObject->ID;?>
<?php$pageObject=get_page_by_title('China(Volksrepublik)',OBJECT,'guides')?><?phpupdate_field('guide_legacy_id','834981',$pageObject->ID);echo'<br/>ID='.$pageObject->ID;?>
<?php$pageObject=get_page_by_title('Tibet',OBJECT,'guides')?><?phpupdate_field('guide_legacy_id','1044002',$pageObject->ID);echo'<br/>ID='.$pageObject->ID;?>
<?php$pageObject=get_page_by_title('Macau',OBJECT,'guides')?><?phpupdate_field('guide_legacy_id','853728',$pageObject->ID);echo'<br/>ID='.$pageObject->ID;?>
<?php$pageObject=get_page_by_title('Hongkong(China)',OBJECT,'guides')?><?phpupdate_field('guide_legacy_id','853593',$pageObject->ID);echo'<br/>ID='.$pageObject->ID;?>
<?php$pageObject=get_page_by_title('Japan',OBJECT,'guides')?><?phpupdate_field('guide_legacy_id','835146',$pageObject->ID);echo'<br/>ID='.$pageObject->ID;?>
<?php$pageObject=get_page_by_title('Korea(Nord)',OBJECT,'guides')?><?phpupdate_field('guide_legacy_id','835293',$pageObject->ID);echo'<br/>ID='.$pageObject->ID;?>
<?php$pageObject=get_page_by_title('Taiwan(China)',OBJECT,'guides')?><?phpupdate_field('guide_legacy_id','835526',$pageObject->ID);echo'<br/>ID='.$pageObject->ID;?>
<?php$pageObject=get_page_by_title('Bangladesch',OBJECT,'guides')?><?phpupdate_field('guide_legacy_id','835666',$pageObject->ID);echo'<br/>ID='.$pageObject->ID;?>
<?php$pageObject=get_page_by_title('Bhutan',OBJECT,'guides')?><?phpupdate_field('guide_legacy_id','835797',$pageObject->ID);echo'<br/>ID='.$pageObject->ID;?>
<?php$pageObject=get_page_by_title('Indien',OBJECT,'guides')?><?phpupdate_field('guide_legacy_id','835930',$pageObject->ID);echo'<br/>ID='.$pageObject->ID;?>
<?php$pageObject=get_page_by_title('Malediven',OBJECT,'guides')?><?phpupdate_field('guide_legacy_id','836088',$pageObject->ID);echo'<br/>ID='.$pageObject->ID;?>
<?php$pageObject=get_page_by_title('Nepal',OBJECT,'guides')?><?phpupdate_field('guide_legacy_id','836255',$pageObject->ID);echo'<br/>ID='.$pageObject->ID;?>
<?php$pageObject=get_page_by_title('Pakistan',OBJECT,'guides')?><?phpupdate_field('guide_legacy_id','836391',$pageObject->ID);echo'<br/>ID='.$pageObject->ID;?>
<?php$pageObject=get_page_by_title('SriLanka',OBJECT,'guides')?><?phpupdate_field('guide_legacy_id','836546',$pageObject->ID);echo'<br/>ID='.$pageObject->ID;?>
<?php$pageObject=get_page_by_title('Bahrain',OBJECT,'guides')?><?phpupdate_field('guide_legacy_id','836670',$pageObject->ID);echo'<br/>ID='.$pageObject->ID;?>
<?php$pageObject=get_page_by_title('Iran',OBJECT,'guides')?><?phpupdate_field('guide_legacy_id','836799',$pageObject->ID);echo'<br/>ID='.$pageObject->ID;?>
<?php$pageObject=get_page_by_title('Irak',OBJECT,'guides')?><?phpupdate_field('guide_legacy_id','836924',$pageObject->ID);echo'<br/>ID='.$pageObject->ID;?>
<?php$pageObject=get_page_by_title('Israel',OBJECT,'guides')?><?phpupdate_field('guide_legacy_id','837031',$pageObject->ID);echo'<br/>ID='.$pageObject->ID;?>
<?php$pageObject=get_page_by_title('Jordanien',OBJECT,'guides')?><?phpupdate_field('guide_legacy_id','837185',$pageObject->ID);echo'<br/>ID='.$pageObject->ID;?>
<?php$pageObject=get_page_by_title('Kuwait',OBJECT,'guides')?><?phpupdate_field('guide_legacy_id','837303',$pageObject->ID);echo'<br/>ID='.$pageObject->ID;?>
<?php$pageObject=get_page_by_title('Libanon',OBJECT,'guides')?><?phpupdate_field('guide_legacy_id','837449',$pageObject->ID);echo'<br/>ID='.$pageObject->ID;?>
<?php$pageObject=get_page_by_title('Oman',OBJECT,'guides')?><?phpupdate_field('guide_legacy_id','837574',$pageObject->ID);echo'<br/>ID='.$pageObject->ID;?>
<?php$pageObject=get_page_by_title('Katar',OBJECT,'guides')?><?phpupdate_field('guide_legacy_id','837742',$pageObject->ID);echo'<br/>ID='.$pageObject->ID;?>
<?php$pageObject=get_page_by_title('Saudi-Arabien',OBJECT,'guides')?><?phpupdate_field('guide_legacy_id','837851',$pageObject->ID);echo'<br/>ID='.$pageObject->ID;?>
<?php$pageObject=get_page_by_title('Syrien',OBJECT,'guides')?><?phpupdate_field('guide_legacy_id','837997',$pageObject->ID);echo'<br/>ID='.$pageObject->ID;?>
<?php$pageObject=get_page_by_title('VereinigteArabischeEmirate',OBJECT,'guides')?><?phpupdate_field('guide_legacy_id','838129',$pageObject->ID);echo'<br/>ID='.$pageObject->ID;?>
<?php$pageObject=get_page_by_title('Jemen',OBJECT,'guides')?><?phpupdate_field('guide_legacy_id','838252',$pageObject->ID);echo'<br/>ID='.$pageObject->ID;?>
<?php$pageObject=get_page_by_title('Brunei',OBJECT,'guides')?><?phpupdate_field('guide_legacy_id','838363',$pageObject->ID);echo'<br/>ID='.$pageObject->ID;?>
<?php$pageObject=get_page_by_title('Kambodscha',OBJECT,'guides')?><?phpupdate_field('guide_legacy_id','838487',$pageObject->ID);echo'<br/>ID='.$pageObject->ID;?>
<?php$pageObject=get_page_by_title('Timor-Leste',OBJECT,'guides')?><?phpupdate_field('guide_legacy_id','838605',$pageObject->ID);echo'<br/>ID='.$pageObject->ID;?>
<?php$pageObject=get_page_by_title('Indonesien',OBJECT,'guides')?><?phpupdate_field('guide_legacy_id','838704',$pageObject->ID);echo'<br/>ID='.$pageObject->ID;?>
<?php$pageObject=get_page_by_title('Laos',OBJECT,'guides')?><?phpupdate_field('guide_legacy_id','838832',$pageObject->ID);echo'<br/>ID='.$pageObject->ID;?>
<?php$pageObject=get_page_by_title('Malaysia',OBJECT,'guides')?><?phpupdate_field('guide_legacy_id','838966',$pageObject->ID);echo'<br/>ID='.$pageObject->ID;?>
<?php$pageObject=get_page_by_title('Myanmar',OBJECT,'guides')?><?phpupdate_field('guide_legacy_id','839114',$pageObject->ID);echo'<br/>ID='.$pageObject->ID;?>
<?php$pageObject=get_page_by_title('Philippinen',OBJECT,'guides')?><?phpupdate_field('guide_legacy_id','839237',$pageObject->ID);echo'<br/>ID='.$pageObject->ID;?>
<?php$pageObject=get_page_by_title('Singapur',OBJECT,'guides')?><?phpupdate_field('guide_legacy_id','839378',$pageObject->ID);echo'<br/>ID='.$pageObject->ID;?>
<?php$pageObject=get_page_by_title('Thailand',OBJECT,'guides')?><?phpupdate_field('guide_legacy_id','839522',$pageObject->ID);echo'<br/>ID='.$pageObject->ID;?>
<?php$pageObject=get_page_by_title('Vietnam',OBJECT,'guides')?><?phpupdate_field('guide_legacy_id','839660',$pageObject->ID);echo'<br/>ID='.$pageObject->ID;?>
<?php$pageObject=get_page_by_title('Martinique',OBJECT,'guides')?><?phpupdate_field('guide_legacy_id','846412',$pageObject->ID);echo'<br/>ID='.$pageObject->ID;?>
<?php$pageObject=get_page_by_title('Guadeloupe',OBJECT,'guides')?><?phpupdate_field('guide_legacy_id','846303',$pageObject->ID);echo'<br/>ID='.$pageObject->ID;?>
<?php$pageObject=get_page_by_title('Anguilla',OBJECT,'guides')?><?phpupdate_field('guide_legacy_id','824929',$pageObject->ID);echo'<br/>ID='.$pageObject->ID;?>
<?php$pageObject=get_page_by_title('AntiguaundBarbuda',OBJECT,'guides')?><?phpupdate_field('guide_legacy_id','825047',$pageObject->ID);echo'<br/>ID='.$pageObject->ID;?>
<?php$pageObject=get_page_by_title('Aruba',OBJECT,'guides')?><?phpupdate_field('guide_legacy_id','825173',$pageObject->ID);echo'<br/>ID='.$pageObject->ID;?>
<?php$pageObject=get_page_by_title('Bahamas',OBJECT,'guides')?><?phpupdate_field('guide_legacy_id','825300',$pageObject->ID);echo'<br/>ID='.$pageObject->ID;?>
<?php$pageObject=get_page_by_title('Barbados',OBJECT,'guides')?><?phpupdate_field('guide_legacy_id','825454',$pageObject->ID);echo'<br/>ID='.$pageObject->ID;?>
<?php$pageObject=get_page_by_title('Bonaire',OBJECT,'guides')?><?phpupdate_field('guide_legacy_id','825605',$pageObject->ID);echo'<br/>ID='.$pageObject->ID;?>
<?php$pageObject=get_page_by_title('BritischeJungferninseln',OBJECT,'guides')?><?phpupdate_field('guide_legacy_id','825720',$pageObject->ID);echo'<br/>ID='.$pageObject->ID;?>
<?php$pageObject=get_page_by_title('Cayman-Inseln',OBJECT,'guides')?><?phpupdate_field('guide_legacy_id','825835',$pageObject->ID);echo'<br/>ID='.$pageObject->ID;?>
<?php$pageObject=get_page_by_title('Kuba',OBJECT,'guides')?><?phpupdate_field('guide_legacy_id','825949',$pageObject->ID);echo'<br/>ID='.$pageObject->ID;?>
<?php$pageObject=get_page_by_title('Dominica',OBJECT,'guides')?><?phpupdate_field('guide_legacy_id','826208',$pageObject->ID);echo'<br/>ID='.$pageObject->ID;?>
<?php$pageObject=get_page_by_title('DominikanischeRepublik',OBJECT,'guides')?><?phpupdate_field('guide_legacy_id','826332',$pageObject->ID);echo'<br/>ID='.$pageObject->ID;?>
<?php$pageObject=get_page_by_title('Grenada',OBJECT,'guides')?><?phpupdate_field('guide_legacy_id','826477',$pageObject->ID);echo'<br/>ID='.$pageObject->ID;?>
<?php$pageObject=get_page_by_title('Haiti',OBJECT,'guides')?><?phpupdate_field('guide_legacy_id','826610',$pageObject->ID);echo'<br/>ID='.$pageObject->ID;?>
<?php$pageObject=get_page_by_title('Jamaika',OBJECT,'guides')?><?phpupdate_field('guide_legacy_id','826714',$pageObject->ID);echo'<br/>ID='.$pageObject->ID;?>
<?php$pageObject=get_page_by_title('Montserrat',OBJECT,'guides')?><?phpupdate_field('guide_legacy_id','826860',$pageObject->ID);echo'<br/>ID='.$pageObject->ID;?>
<?php$pageObject=get_page_by_title('PuertoRico',OBJECT,'guides')?><?phpupdate_field('guide_legacy_id','826986',$pageObject->ID);echo'<br/>ID='.$pageObject->ID;?>
<?php$pageObject=get_page_by_title('Saba',OBJECT,'guides')?><?phpupdate_field('guide_legacy_id','827115',$pageObject->ID);echo'<br/>ID='.$pageObject->ID;?>
<?php$pageObject=get_page_by_title('St.Eustatius',OBJECT,'guides')?><?phpupdate_field('guide_legacy_id','827221',$pageObject->ID);echo'<br/>ID='.$pageObject->ID;?>
<?php$pageObject=get_page_by_title('St.KittsundNevis',OBJECT,'guides')?><?phpupdate_field('guide_legacy_id','827336',$pageObject->ID);echo'<br/>ID='.$pageObject->ID;?>
<?php$pageObject=get_page_by_title('St.Lucia',OBJECT,'guides')?><?phpupdate_field('guide_legacy_id','827461',$pageObject->ID);echo'<br/>ID='.$pageObject->ID;?>
<?php$pageObject=get_page_by_title('St.Maarten',OBJECT,'guides')?><?phpupdate_field('guide_legacy_id','827607',$pageObject->ID);echo'<br/>ID='.$pageObject->ID;?>
<?php$pageObject=get_page_by_title('St.VincentunddieGrenadinen',OBJECT,'guides')?><?phpupdate_field('guide_legacy_id','827732',$pageObject->ID);echo'<br/>ID='.$pageObject->ID;?>
<?php$pageObject=get_page_by_title('TrinidadundTobago',OBJECT,'guides')?><?phpupdate_field('guide_legacy_id','827868',$pageObject->ID);echo'<br/>ID='.$pageObject->ID;?>
<?php$pageObject=get_page_by_title('Turks-undCaicos-Inseln',OBJECT,'guides')?><?phpupdate_field('guide_legacy_id','828013',$pageObject->ID);echo'<br/>ID='.$pageObject->ID;?>
<?php$pageObject=get_page_by_title('AmerikanischeJungferninseln',OBJECT,'guides')?><?phpupdate_field('guide_legacy_id','828135',$pageObject->ID);echo'<br/>ID='.$pageObject->ID;?>
<?php$pageObject=get_page_by_title('Belize',OBJECT,'guides')?><?phpupdate_field('guide_legacy_id','828244',$pageObject->ID);echo'<br/>ID='.$pageObject->ID;?>
<?php$pageObject=get_page_by_title('CostaRica',OBJECT,'guides')?><?phpupdate_field('guide_legacy_id','828366',$pageObject->ID);echo'<br/>ID='.$pageObject->ID;?>
<?php$pageObject=get_page_by_title('ElSalvador',OBJECT,'guides')?><?phpupdate_field('guide_legacy_id','828503',$pageObject->ID);echo'<br/>ID='.$pageObject->ID;?>
<?php$pageObject=get_page_by_title('Guatemala',OBJECT,'guides')?><?phpupdate_field('guide_legacy_id','828640',$pageObject->ID);echo'<br/>ID='.$pageObject->ID;?>
<?php$pageObject=get_page_by_title('Honduras',OBJECT,'guides')?><?phpupdate_field('guide_legacy_id','828784',$pageObject->ID);echo'<br/>ID='.$pageObject->ID;?>
<?php$pageObject=get_page_by_title('Nicaragua',OBJECT,'guides')?><?phpupdate_field('guide_legacy_id','828924',$pageObject->ID);echo'<br/>ID='.$pageObject->ID;?>
<?php$pageObject=get_page_by_title('Panama',OBJECT,'guides')?><?phpupdate_field('guide_legacy_id','829066',$pageObject->ID);echo'<br/>ID='.$pageObject->ID;?>
<?php$pageObject=get_page_by_title('Bermuda',OBJECT,'guides')?><?phpupdate_field('guide_legacy_id','829207',$pageObject->ID);echo'<br/>ID='.$pageObject->ID;?>
<?php$pageObject=get_page_by_title('Kanada',OBJECT,'guides')?><?phpupdate_field('guide_legacy_id','829335',$pageObject->ID);echo'<br/>ID='.$pageObject->ID;?>
<?php$pageObject=get_page_by_title('Alberta',OBJECT,'guides')?><?phpupdate_field('guide_legacy_id','849256',$pageObject->ID);echo'<br/>ID='.$pageObject->ID;?>
<?php$pageObject=get_page_by_title('BritishColumbia',OBJECT,'guides')?><?phpupdate_field('guide_legacy_id','849185',$pageObject->ID);echo'<br/>ID='.$pageObject->ID;?>
<?php$pageObject=get_page_by_title('Saskatchewan',OBJECT,'guides')?><?phpupdate_field('guide_legacy_id','849118',$pageObject->ID);echo'<br/>ID='.$pageObject->ID;?>
<?php$pageObject=get_page_by_title('Nunavut',OBJECT,'guides')?><?phpupdate_field('guide_legacy_id','849049',$pageObject->ID);echo'<br/>ID='.$pageObject->ID;?>
<?php$pageObject=get_page_by_title('Newfoundland&Labrador',OBJECT,'guides')?><?phpupdate_field('guide_legacy_id','848977',$pageObject->ID);echo'<br/>ID='.$pageObject->ID;?>
<?php$pageObject=get_page_by_title('YukonTerritory',OBJECT,'guides')?><?phpupdate_field('guide_legacy_id','848908',$pageObject->ID);echo'<br/>ID='.$pageObject->ID;?>
<?php$pageObject=get_page_by_title('NorthwestTerritories',OBJECT,'guides')?><?phpupdate_field('guide_legacy_id','848841',$pageObject->ID);echo'<br/>ID='.$pageObject->ID;?>
<?php$pageObject=get_page_by_title('PrinceEdwardIsland',OBJECT,'guides')?><?phpupdate_field('guide_legacy_id','848775',$pageObject->ID);echo'<br/>ID='.$pageObject->ID;?>
<?php$pageObject=get_page_by_title('Ontario',OBJECT,'guides')?><?phpupdate_field('guide_legacy_id','848709',$pageObject->ID);echo'<br/>ID='.$pageObject->ID;?>
<?php$pageObject=get_page_by_title('NewBrunswick',OBJECT,'guides')?><?phpupdate_field('guide_legacy_id','848643',$pageObject->ID);echo'<br/>ID='.$pageObject->ID;?>
<?php$pageObject=get_page_by_title('Quebec',OBJECT,'guides')?><?phpupdate_field('guide_legacy_id','848571',$pageObject->ID);echo'<br/>ID='.$pageObject->ID;?>
<?php$pageObject=get_page_by_title('Manitoba',OBJECT,'guides')?><?phpupdate_field('guide_legacy_id','848502',$pageObject->ID);echo'<br/>ID='.$pageObject->ID;?>
<?php$pageObject=get_page_by_title('NovaScotia',OBJECT,'guides')?><?phpupdate_field('guide_legacy_id','848438',$pageObject->ID);echo'<br/>ID='.$pageObject->ID;?>

<?php$pageObject=get_page_by_title('Mexiko',OBJECT,'guides')?><?phpupdate_field('guide_legacy_id','829594',$pageObject->ID);echo'<br/>ID='.$pageObject->ID;?>
<?php$pageObject=get_page_by_title('USA',OBJECT,'guides')?><?phpupdate_field('guide_legacy_id','829740',$pageObject->ID);echo'<br/>ID='.$pageObject->ID;?>
<?php$pageObject=get_page_by_title('SouthDakota',OBJECT,'guides')?><?phpupdate_field('guide_legacy_id','852737',$pageObject->ID);echo'<br/>ID='.$pageObject->ID;?>
<?php$pageObject=get_page_by_title('Kansas',OBJECT,'guides')?><?phpupdate_field('guide_legacy_id','852674',$pageObject->ID);echo'<br/>ID='.$pageObject->ID;?>
<?php$pageObject=get_page_by_title('StaatNewYork',OBJECT,'guides')?><?phpupdate_field('guide_legacy_id','852607',$pageObject->ID);echo'<br/>ID='.$pageObject->ID;?>
<?php$pageObject=get_page_by_title('NewJersey',OBJECT,'guides')?><?phpupdate_field('guide_legacy_id','852536',$pageObject->ID);echo'<br/>ID='.$pageObject->ID;?>
<?php$pageObject=get_page_by_title('Virginia',OBJECT,'guides')?><?phpupdate_field('guide_legacy_id','852467',$pageObject->ID);echo'<br/>ID='.$pageObject->ID;?>
<?php$pageObject=get_page_by_title('Alaska',OBJECT,'guides')?><?phpupdate_field('guide_legacy_id','852404',$pageObject->ID);echo'<br/>ID='.$pageObject->ID;?>
<?php$pageObject=get_page_by_title('Pennsylvania',OBJECT,'guides')?><?phpupdate_field('guide_legacy_id','852329',$pageObject->ID);echo'<br/>ID='.$pageObject->ID;?>
<?php$pageObject=get_page_by_title('Nebraska',OBJECT,'guides')?><?phpupdate_field('guide_legacy_id','852260',$pageObject->ID);echo'<br/>ID='.$pageObject->ID;?>
<?php$pageObject=get_page_by_title('Illinois',OBJECT,'guides')?><?phpupdate_field('guide_legacy_id','852194',$pageObject->ID);echo'<br/>ID='.$pageObject->ID;?>
<?php$pageObject=get_page_by_title('NewHampshire',OBJECT,'guides')?><?phpupdate_field('guide_legacy_id','852131',$pageObject->ID);echo'<br/>ID='.$pageObject->ID;?>
<?php$pageObject=get_page_by_title('Maryland',OBJECT,'guides')?><?phpupdate_field('guide_legacy_id','852063',$pageObject->ID);echo'<br/>ID='.$pageObject->ID;?>
<?php$pageObject=get_page_by_title('Oklahoma',OBJECT,'guides')?><?phpupdate_field('guide_legacy_id','851997',$pageObject->ID);echo'<br/>ID='.$pageObject->ID;?>
<?php$pageObject=get_page_by_title('Louisiana',OBJECT,'guides')?><?phpupdate_field('guide_legacy_id','851928',$pageObject->ID);echo'<br/>ID='.$pageObject->ID;?>
<?php$pageObject=get_page_by_title('Massachusetts',OBJECT,'guides')?><?phpupdate_field('guide_legacy_id','851854',$pageObject->ID);echo'<br/>ID='.$pageObject->ID;?>
<?php$pageObject=get_page_by_title('Ohio',OBJECT,'guides')?><?phpupdate_field('guide_legacy_id','851784',$pageObject->ID);echo'<br/>ID='.$pageObject->ID;?>
<?php$pageObject=get_page_by_title('Montana',OBJECT,'guides')?><?phpupdate_field('guide_legacy_id','851715',$pageObject->ID);echo'<br/>ID='.$pageObject->ID;?>
<?php$pageObject=get_page_by_title('Georgia',OBJECT,'guides')?><?phpupdate_field('guide_legacy_id','851646',$pageObject->ID);echo'<br/>ID='.$pageObject->ID;?>
<?php$pageObject=get_page_by_title('Vermont',OBJECT,'guides')?><?phpupdate_field('guide_legacy_id','851584',$pageObject->ID);echo'<br/>ID='.$pageObject->ID;?>
<?php$pageObject=get_page_by_title('Missouri',OBJECT,'guides')?><?phpupdate_field('guide_legacy_id','851516',$pageObject->ID);echo'<br/>ID='.$pageObject->ID;?>
<?php$pageObject=get_page_by_title('Idaho',OBJECT,'guides')?><?phpupdate_field('guide_legacy_id','851447',$pageObject->ID);echo'<br/>ID='.$pageObject->ID;?>
<?php$pageObject=get_page_by_title('Tennessee',OBJECT,'guides')?><?phpupdate_field('guide_legacy_id','851387',$pageObject->ID);echo'<br/>ID='.$pageObject->ID;?>
<?php$pageObject=get_page_by_title('Texas',OBJECT,'guides')?><?phpupdate_field('guide_legacy_id','851244',$pageObject->ID);echo'<br/>ID='.$pageObject->ID;?>
<?php$pageObject=get_page_by_title('Colorado',OBJECT,'guides')?><?phpupdate_field('guide_legacy_id','851315',$pageObject->ID);echo'<br/>ID='.$pageObject->ID;?>
<?php$pageObject=get_page_by_title('Nevada',OBJECT,'guides')?><?phpupdate_field('guide_legacy_id','851139',$pageObject->ID);echo'<br/>ID='.$pageObject->ID;?>
<?php$pageObject=get_page_by_title('Hawaii',OBJECT,'guides')?><?phpupdate_field('guide_legacy_id','851032',$pageObject->ID);echo'<br/>ID='.$pageObject->ID;?>
<?php$pageObject=get_page_by_title('Arizona',OBJECT,'guides')?><?phpupdate_field('guide_legacy_id','850963',$pageObject->ID);echo'<br/>ID='.$pageObject->ID;?>
<?php$pageObject=get_page_by_title('Maine',OBJECT,'guides')?><?phpupdate_field('guide_legacy_id','850890',$pageObject->ID);echo'<br/>ID='.$pageObject->ID;?>
<?php$pageObject=get_page_by_title('Wisconsin',OBJECT,'guides')?><?phpupdate_field('guide_legacy_id','850827',$pageObject->ID);echo'<br/>ID='.$pageObject->ID;?>
<?php$pageObject=get_page_by_title('Delaware',OBJECT,'guides')?><?phpupdate_field('guide_legacy_id','850763',$pageObject->ID);echo'<br/>ID='.$pageObject->ID;?>
<?php$pageObject=get_page_by_title('Alabama',OBJECT,'guides')?><?phpupdate_field('guide_legacy_id','850645',$pageObject->ID);echo'<br/>ID='.$pageObject->ID;?>
<?php$pageObject=get_page_by_title('NorthDakota',OBJECT,'guides')?><?phpupdate_field('guide_legacy_id','850703',$pageObject->ID);echo'<br/>ID='.$pageObject->ID;?>
<?php$pageObject=get_page_by_title('NorthCarolina',OBJECT,'guides')?><?phpupdate_field('guide_legacy_id','850574',$pageObject->ID);echo'<br/>ID='.$pageObject->ID;?>
<?php$pageObject=get_page_by_title('Michigan',OBJECT,'guides')?><?phpupdate_field('guide_legacy_id','850499',$pageObject->ID);echo'<br/>ID='.$pageObject->ID;?>
<?php$pageObject=get_page_by_title('SouthCarolina',OBJECT,'guides')?><?phpupdate_field('guide_legacy_id','850432',$pageObject->ID);echo'<br/>ID='.$pageObject->ID;?>
<?php$pageObject=get_page_by_title('Oregon',OBJECT,'guides')?><?phpupdate_field('guide_legacy_id','850367',$pageObject->ID);echo'<br/>ID='.$pageObject->ID;?>
<?php$pageObject=get_page_by_title('Arkansas',OBJECT,'guides')?><?phpupdate_field('guide_legacy_id','850302',$pageObject->ID);echo'<br/>ID='.$pageObject->ID;?>
<?php$pageObject=get_page_by_title('Connecticut',OBJECT,'guides')?><?phpupdate_field('guide_legacy_id','850234',$pageObject->ID);echo'<br/>ID='.$pageObject->ID;?>
<?php$pageObject=get_page_by_title('Wyoming',OBJECT,'guides')?><?phpupdate_field('guide_legacy_id','850174',$pageObject->ID);echo'<br/>ID='.$pageObject->ID;?>
<?php$pageObject=get_page_by_title('Utah',OBJECT,'guides')?><?phpupdate_field('guide_legacy_id','850109',$pageObject->ID);echo'<br/>ID='.$pageObject->ID;?>
<?php$pageObject=get_page_by_title('RhodeIsland',OBJECT,'guides')?><?phpupdate_field('guide_legacy_id','850040',$pageObject->ID);echo'<br/>ID='.$pageObject->ID;?>
<?php$pageObject=get_page_by_title('WashingtonDC',OBJECT,'guides')?><?phpupdate_field('guide_legacy_id','849967',$pageObject->ID);echo'<br/>ID='.$pageObject->ID;?>
<?php$pageObject=get_page_by_title('WashingtonState',OBJECT,'guides')?><?phpupdate_field('guide_legacy_id','849916',$pageObject->ID);echo'<br/>ID='.$pageObject->ID;?>
<?php$pageObject=get_page_by_title('Minnesota',OBJECT,'guides')?><?phpupdate_field('guide_legacy_id','849848',$pageObject->ID);echo'<br/>ID='.$pageObject->ID;?>
<?php$pageObject=get_page_by_title('Indiana',OBJECT,'guides')?><?phpupdate_field('guide_legacy_id','849783',$pageObject->ID);echo'<br/>ID='.$pageObject->ID;?>
<?php$pageObject=get_page_by_title('Mississippi',OBJECT,'guides')?><?phpupdate_field('guide_legacy_id','849725',$pageObject->ID);echo'<br/>ID='.$pageObject->ID;?>
<?php$pageObject=get_page_by_title('Kalifornien',OBJECT,'guides')?><?phpupdate_field('guide_legacy_id','849660',$pageObject->ID);echo'<br/>ID='.$pageObject->ID;?>
<?php$pageObject=get_page_by_title('Iowa',OBJECT,'guides')?><?phpupdate_field('guide_legacy_id','849594',$pageObject->ID);echo'<br/>ID='.$pageObject->ID;?>
<?php$pageObject=get_page_by_title('Florida',OBJECT,'guides')?><?phpupdate_field('guide_legacy_id','849529',$pageObject->ID);echo'<br/>ID='.$pageObject->ID;?>
<?php$pageObject=get_page_by_title('WestVirginia',OBJECT,'guides')?><?phpupdate_field('guide_legacy_id','849467',$pageObject->ID);echo'<br/>ID='.$pageObject->ID;?>
<?php$pageObject=get_page_by_title('NewMexico',OBJECT,'guides')?><?phpupdate_field('guide_legacy_id','849403',$pageObject->ID);echo'<br/>ID='.$pageObject->ID;?>
<?php$pageObject=get_page_by_title('Kentucky',OBJECT,'guides')?><?phpupdate_field('guide_legacy_id','849334',$pageObject->ID);echo'<br/>ID='.$pageObject->ID;?>
<?php$pageObject=get_page_by_title('Libyen',OBJECT,'guides')?><?phpupdate_field('guide_legacy_id','842813',$pageObject->ID);echo'<br/>ID='.$pageObject->ID;?>
<?php$pageObject=get_page_by_title('Liberia',OBJECT,'guides')?><?phpupdate_field('guide_legacy_id','842696',$pageObject->ID);echo'<br/>ID='.$pageObject->ID;?>
<?php$pageObject=get_page_by_title('Mali',OBJECT,'guides')?><?phpupdate_field('guide_legacy_id','843166',$pageObject->ID);echo'<br/>ID='.$pageObject->ID;?>
<?php$pageObject=get_page_by_title('Malawi',OBJECT,'guides')?><?phpupdate_field('guide_legacy_id','843055',$pageObject->ID);echo'<br/>ID='.$pageObject->ID;?>
<?php$pageObject=get_page_by_title('Madagaskar',OBJECT,'guides')?><?phpupdate_field('guide_legacy_id','842929',$pageObject->ID);echo'<br/>ID='.$pageObject->ID;?>
<?php$pageObject=get_page_by_title('Senegal',OBJECT,'guides')?><?phpupdate_field('guide_legacy_id','844558',$pageObject->ID);echo'<br/>ID='.$pageObject->ID;?>
<?php$pageObject=get_page_by_title('SierraLeone',OBJECT,'guides')?><?phpupdate_field('guide_legacy_id','844837',$pageObject->ID);echo'<br/>ID='.$pageObject->ID;?>
<?php$pageObject=get_page_by_title('Ruanda',OBJECT,'guides')?><?phpupdate_field('guide_legacy_id','844337',$pageObject->ID);echo'<br/>ID='.$pageObject->ID;?>
<?php$pageObject=get_page_by_title('Kongo(Republik)',OBJECT,'guides')?><?phpupdate_field('guide_legacy_id','844217',$pageObject->ID);echo'<br/>ID='.$pageObject->ID;?>
<?php$pageObject=get_page_by_title('Seychellen',OBJECT,'guides')?><?phpupdate_field('guide_legacy_id','844705',$pageObject->ID);echo'<br/>ID='.$pageObject->ID;?>
<?php$pageObject=get_page_by_title('Nigeria',OBJECT,'guides')?><?phpupdate_field('guide_legacy_id','844095',$pageObject->ID);echo'<br/>ID='.$pageObject->ID;?>
<?php$pageObject=get_page_by_title('Niger',OBJECT,'guides')?><?phpupdate_field('guide_legacy_id','843972',$pageObject->ID);echo'<br/>ID='.$pageObject->ID;?>
<?php$pageObject=get_page_by_title('Namibia',OBJECT,'guides')?><?phpupdate_field('guide_legacy_id','843837',$pageObject->ID);echo'<br/>ID='.$pageObject->ID;?>

<?php$pageObject=get_page_by_title('Uganda',OBJECT,'guides')?><?phpupdate_field('guide_legacy_id','845868',$pageObject->ID);echo'<br/>ID='.$pageObject->ID;?>
<?php$pageObject=get_page_by_title('Tunesien',OBJECT,'guides')?><?phpupdate_field('guide_legacy_id','845721',$pageObject->ID);echo'<br/>ID='.$pageObject->ID;?>
<?php$pageObject=get_page_by_title('Togo',OBJECT,'guides')?><?phpupdate_field('guide_legacy_id','845589',$pageObject->ID);echo'<br/>ID='.$pageObject->ID;?>
<?php$pageObject=get_page_by_title('Tansania',OBJECT,'guides')?><?phpupdate_field('guide_legacy_id','845444',$pageObject->ID);echo'<br/>ID='.$pageObject->ID;?>
<?php$pageObject=get_page_by_title('Swasiland',OBJECT,'guides')?><?phpupdate_field('guide_legacy_id','845320',$pageObject->ID);echo'<br/>ID='.$pageObject->ID;?>
<?php$pageObject=get_page_by_title('Sudan',OBJECT,'guides')?><?phpupdate_field('guide_legacy_id','845200',$pageObject->ID);echo'<br/>ID='.$pageObject->ID;?>

<?php$pageObject=get_page_by_title('Somalia',OBJECT,'guides')?><?phpupdate_field('guide_legacy_id','844939',$pageObject->ID);echo'<br/>ID='.$pageObject->ID;?>

<?php$pageObject=get_page_by_title('Simbabwe',OBJECT,'guides')?><?phpupdate_field('guide_legacy_id','846113',$pageObject->ID);echo'<br/>ID='.$pageObject->ID;?>
<?php$pageObject=get_page_by_title('Sambia',OBJECT,'guides')?><?phpupdate_field('guide_legacy_id','845997',$pageObject->ID);echo'<br/>ID='.$pageObject->ID;?>
<?php$pageObject=get_page_by_title('Mauretanien',OBJECT,'guides')?><?phpupdate_field('guide_legacy_id','843286',$pageObject->ID);echo'<br/>ID='.$pageObject->ID;?>
<?php$pageObject=get_page_by_title('Mauritius',OBJECT,'guides')?><?phpupdate_field('guide_legacy_id','843409',$pageObject->ID);echo'<br/>ID='.$pageObject->ID;?>
<?php$pageObject=get_page_by_title('Marokko',OBJECT,'guides')?><?phpupdate_field('guide_legacy_id','843555',$pageObject->ID);echo'<br/>ID='.$pageObject->ID;?>
<?php$pageObject=get_page_by_title('Mosambik',OBJECT,'guides')?><?phpupdate_field('guide_legacy_id','843703',$pageObject->ID);echo'<br/>ID='.$pageObject->ID;?>
<?php$pageObject=get_page_by_title('Lesotho',OBJECT,'guides')?><?phpupdate_field('guide_legacy_id','842584',$pageObject->ID);echo'<br/>ID='.$pageObject->ID;?>
<?php$pageObject=get_page_by_title('Kenia',OBJECT,'guides')?><?phpupdate_field('guide_legacy_id','842449',$pageObject->ID);echo'<br/>ID='.$pageObject->ID;?>
<?php$pageObject=get_page_by_title('Algerien',OBJECT,'guides')?><?phpupdate_field('guide_legacy_id','839786',$pageObject->ID);echo'<br/>ID='.$pageObject->ID;?>
<?php$pageObject=get_page_by_title('Angola',OBJECT,'guides')?><?phpupdate_field('guide_legacy_id','839926',$pageObject->ID);echo'<br/>ID='.$pageObject->ID;?>
<?php$pageObject=get_page_by_title('Benin',OBJECT,'guides')?><?phpupdate_field('guide_legacy_id','840046',$pageObject->ID);echo'<br/>ID='.$pageObject->ID;?>
<?php$pageObject=get_page_by_title('Botswana',OBJECT,'guides')?><?phpupdate_field('guide_legacy_id','840166',$pageObject->ID);echo'<br/>ID='.$pageObject->ID;?>
<?php$pageObject=get_page_by_title('BurkinaFaso',OBJECT,'guides')?><?phpupdate_field('guide_legacy_id','840298',$pageObject->ID);echo'<br/>ID='.$pageObject->ID;?>
<?php$pageObject=get_page_by_title('Burundi',OBJECT,'guides')?><?phpupdate_field('guide_legacy_id','840406',$pageObject->ID);echo'<br/>ID='.$pageObject->ID;?>
<?php$pageObject=get_page_by_title('Kamerun',OBJECT,'guides')?><?phpupdate_field('guide_legacy_id','840521',$pageObject->ID);echo'<br/>ID='.$pageObject->ID;?>
<?php$pageObject=get_page_by_title('KapVerde',OBJECT,'guides')?><?phpupdate_field('guide_legacy_id','840648',$pageObject->ID);echo'<br/>ID='.$pageObject->ID;?>
<?php$pageObject=get_page_by_title('ZentralafrikanischeRepublik',OBJECT,'guides')?><?phpupdate_field('guide_legacy_id','840749',$pageObject->ID);echo'<br/>ID='.$pageObject->ID;?>
<?php$pageObject=get_page_by_title('Tschad',OBJECT,'guides')?><?phpupdate_field('guide_legacy_id','840859',$pageObject->ID);echo'<br/>ID='.$pageObject->ID;?>
<?php$pageObject=get_page_by_title('Komoren',OBJECT,'guides')?><?phpupdate_field('guide_legacy_id','840969',$pageObject->ID);echo'<br/>ID='.$pageObject->ID;?>
<?php$pageObject=get_page_by_title('Kongo(DemokratischeRepublik)',OBJECT,'guides')?><?phpupdate_field('guide_legacy_id','841074',$pageObject->ID);echo'<br/>ID='.$pageObject->ID;?>
<?php$pageObject=get_page_by_title('Djibouti',OBJECT,'guides')?><?phpupdate_field('guide_legacy_id','841177',$pageObject->ID);echo'<br/>ID='.$pageObject->ID;?>
<?php$pageObject=get_page_by_title('Eritrea',OBJECT,'guides')?><?phpupdate_field('guide_legacy_id','841536',$pageObject->ID);echo'<br/>ID='.$pageObject->ID;?>

<?php$pageObject=get_page_by_title('Gabun',OBJECT,'guides')?><?phpupdate_field('guide_legacy_id','841756',$pageObject->ID);echo'<br/>ID='.$pageObject->ID;?>
<?php$pageObject=get_page_by_title('Gambia',OBJECT,'guides')?><?phpupdate_field('guide_legacy_id','841873',$pageObject->ID);echo'<br/>ID='.$pageObject->ID;?>
<?php$pageObject=get_page_by_title('Ghana',OBJECT,'guides')?><?phpupdate_field('guide_legacy_id','841994',$pageObject->ID);echo'<br/>ID='.$pageObject->ID;?>
<?php$pageObject=get_page_by_title('Guinea',OBJECT,'guides')?><?phpupdate_field('guide_legacy_id','842101',$pageObject->ID);echo'<br/>ID='.$pageObject->ID;?>
<?php$pageObject=get_page_by_title('Guinea-Bissau',OBJECT,'guides')?><?phpupdate_field('guide_legacy_id','842204',$pageObject->ID);echo'<br/>ID='.$pageObject->ID;?>


<?php$pageObject=get_page_by_title('Antarktis',OBJECT,'guides')?><?phpupdate_field('guide_legacy_id','831956',$pageObject->ID);echo'<br/>ID='.$pageObject->ID;?>
<?php$pageObject=get_page_by_title('Argentinien',OBJECT,'guides')?><?phpupdate_field('guide_legacy_id','832053',$pageObject->ID);echo'<br/>ID='.$pageObject->ID;?>
<?php$pageObject=get_page_by_title('Bolivien',OBJECT,'guides')?><?phpupdate_field('guide_legacy_id','832191',$pageObject->ID);echo'<br/>ID='.$pageObject->ID;?>
<?php$pageObject=get_page_by_title('Brasilien',OBJECT,'guides')?><?phpupdate_field('guide_legacy_id','832343',$pageObject->ID);echo'<br/>ID='.$pageObject->ID;?>
<?php$pageObject=get_page_by_title('Chile',OBJECT,'guides')?><?phpupdate_field('guide_legacy_id','832494',$pageObject->ID);echo'<br/>ID='.$pageObject->ID;?>
<?php$pageObject=get_page_by_title('Kolumbien',OBJECT,'guides')?><?phpupdate_field('guide_legacy_id','832654',$pageObject->ID);echo'<br/>ID='.$pageObject->ID;?>
<?php$pageObject=get_page_by_title('Ecuador',OBJECT,'guides')?><?phpupdate_field('guide_legacy_id','832801',$pageObject->ID);echo'<br/>ID='.$pageObject->ID;?>
<?php$pageObject=get_page_by_title('Falkland-Inseln',OBJECT,'guides')?><?phpupdate_field('guide_legacy_id','832929',$pageObject->ID);echo'<br/>ID='.$pageObject->ID;?>
<?php$pageObject=get_page_by_title('Guyana',OBJECT,'guides')?><?phpupdate_field('guide_legacy_id','833046',$pageObject->ID);echo'<br/>ID='.$pageObject->ID;?>
<?php$pageObject=get_page_by_title('Paraguay',OBJECT,'guides')?><?phpupdate_field('guide_legacy_id','833161',$pageObject->ID);echo'<br/>ID='.$pageObject->ID;?>
<?php$pageObject=get_page_by_title('Peru',OBJECT,'guides')?><?phpupdate_field('guide_legacy_id','833307',$pageObject->ID);echo'<br/>ID='.$pageObject->ID;?>
<?php$pageObject=get_page_by_title('Suriname',OBJECT,'guides')?><?phpupdate_field('guide_legacy_id','833458',$pageObject->ID);echo'<br/>ID='.$pageObject->ID;?>
<?php$pageObject=get_page_by_title('Uruguay',OBJECT,'guides')?><?phpupdate_field('guide_legacy_id','833576',$pageObject->ID);echo'<br/>ID='.$pageObject->ID;?>
<?php$pageObject=get_page_by_title('Venezuela',OBJECT,'guides')?><?phpupdate_field('guide_legacy_id','833724',$pageObject->ID);echo'<br/>ID='.$pageObject->ID;?>
<?php$pageObject=get_page_by_title('Albanien',OBJECT,'guides')?><?phpupdate_field('guide_legacy_id','818324',$pageObject->ID);echo'<br/>ID='.$pageObject->ID;?>
<?php$pageObject=get_page_by_title('Andorra',OBJECT,'guides')?><?phpupdate_field('guide_legacy_id','818459',$pageObject->ID);echo'<br/>ID='.$pageObject->ID;?>

<?php$pageObject=get_page_by_title('Belarus',OBJECT,'guides')?><?phpupdate_field('guide_legacy_id','818743',$pageObject->ID);echo'<br/>ID='.$pageObject->ID;?>
<?php$pageObject=get_page_by_title('Belgien',OBJECT,'guides')?><?phpupdate_field('guide_legacy_id','818865',$pageObject->ID);echo'<br/>ID='.$pageObject->ID;?>
<?php$pageObject=get_page_by_title('BosnienundHerzegowina',OBJECT,'guides')?><?phpupdate_field('guide_legacy_id','819010',$pageObject->ID);echo'<br/>ID='.$pageObject->ID;?>
<?php$pageObject=get_page_by_title('Bulgarien',OBJECT,'guides')?><?phpupdate_field('guide_legacy_id','819135',$pageObject->ID);echo'<br/>ID='.$pageObject->ID;?>
<?php$pageObject=get_page_by_title('Kroatien',OBJECT,'guides')?><?phpupdate_field('guide_legacy_id','819282',$pageObject->ID);echo'<br/>ID='.$pageObject->ID;?>
<?php$pageObject=get_page_by_title('Zypern',OBJECT,'guides')?><?phpupdate_field('guide_legacy_id','819420',$pageObject->ID);echo'<br/>ID='.$pageObject->ID;?>
<?php$pageObject=get_page_by_title('TschechischeRepublik',OBJECT,'guides')?><?phpupdate_field('guide_legacy_id','819551',$pageObject->ID);echo'<br/>ID='.$pageObject->ID;?>

<?php$pageObject=get_page_by_title('Estland',OBJECT,'guides')?><?phpupdate_field('guide_legacy_id','819829',$pageObject->ID);echo'<br/>ID='.$pageObject->ID;?>
<?php$pageObject=get_page_by_title('Finnland',OBJECT,'guides')?><?phpupdate_field('guide_legacy_id','819961',$pageObject->ID);echo'<br/>ID='.$pageObject->ID;?>
<?php$pageObject=get_page_by_title('Frankreich',OBJECT,'guides')?><?phpupdate_field('guide_legacy_id','820099',$pageObject->ID);echo'<br/>ID='.$pageObject->ID;?>

<?php$pageObject=get_page_by_title('Deutschland',OBJECT,'guides')?><?phpupdate_field('guide_legacy_id','820288',$pageObject->ID);echo'<br/>ID='.$pageObject->ID;?>
<?php$pageObject=get_page_by_title('Gibraltar',OBJECT,'guides')?><?phpupdate_field('guide_legacy_id','820445',$pageObject->ID);echo'<br/>ID='.$pageObject->ID;?>
<?php$pageObject=get_page_by_title('Griechenland',OBJECT,'guides')?><?phpupdate_field('guide_legacy_id','820566',$pageObject->ID);echo'<br/>ID='.$pageObject->ID;?>
<?php$pageObject=get_page_by_title('Ungarn',OBJECT,'guides')?><?phpupdate_field('guide_legacy_id','820714',$pageObject->ID);echo'<br/>ID='.$pageObject->ID;?>
<?php$pageObject=get_page_by_title('Island',OBJECT,'guides')?><?phpupdate_field('guide_legacy_id','820845',$pageObject->ID);echo'<br/>ID='.$pageObject->ID;?>
<?php$pageObject=get_page_by_title('Irland(Republik)',OBJECT,'guides')?><?phpupdate_field('guide_legacy_id','820978',$pageObject->ID);echo'<br/>ID='.$pageObject->ID;?>
<?php$pageObject=get_page_by_title('Italien',OBJECT,'guides')?><?phpupdate_field('guide_legacy_id','821135',$pageObject->ID);echo'<br/>ID='.$pageObject->ID;?>
<?php$pageObject=get_page_by_title('Kosovo',OBJECT,'guides')?><?phpupdate_field('guide_legacy_id','821280',$pageObject->ID);echo'<br/>ID='.$pageObject->ID;?>
<?php$pageObject=get_page_by_title('Lettland',OBJECT,'guides')?><?phpupdate_field('guide_legacy_id','821399',$pageObject->ID);echo'<br/>ID='.$pageObject->ID;?>
<?php$pageObject=get_page_by_title('Liechtenstein',OBJECT,'guides')?><?phpupdate_field('guide_legacy_id','821527',$pageObject->ID);echo'<br/>ID='.$pageObject->ID;?>
<?php$pageObject=get_page_by_title('Litauen',OBJECT,'guides')?><?phpupdate_field('guide_legacy_id','821657',$pageObject->ID);echo'<br/>ID='.$pageObject->ID;?>
<?php$pageObject=get_page_by_title('Luxemburg',OBJECT,'guides')?><?phpupdate_field('guide_legacy_id','821787',$pageObject->ID);echo'<br/>ID='.$pageObject->ID;?>
<?php$pageObject=get_page_by_title('Mazedonien',OBJECT,'guides')?><?phpupdate_field('guide_legacy_id','821930',$pageObject->ID);echo'<br/>ID='.$pageObject->ID;?>
<?php$pageObject=get_page_by_title('Malta',OBJECT,'guides')?><?phpupdate_field('guide_legacy_id','822044',$pageObject->ID);echo'<br/>ID='.$pageObject->ID;?>
<?php$pageObject=get_page_by_title('Moldau',OBJECT,'guides')?><?phpupdate_field('guide_legacy_id','822177',$pageObject->ID);echo'<br/>ID='.$pageObject->ID;?>
<?php$pageObject=get_page_by_title('Monaco',OBJECT,'guides')?><?phpupdate_field('guide_legacy_id','822290',$pageObject->ID);echo'<br/>ID='.$pageObject->ID;?>
<?php$pageObject=get_page_by_title('Montenegro',OBJECT,'guides')?><?phpupdate_field('guide_legacy_id','822428',$pageObject->ID);echo'<br/>ID='.$pageObject->ID;?>
<?php$pageObject=get_page_by_title('Niederlande',OBJECT,'guides')?><?phpupdate_field('guide_legacy_id','822554',$pageObject->ID);echo'<br/>ID='.$pageObject->ID;?>
<?php$pageObject=get_page_by_title('Norwegen',OBJECT,'guides')?><?phpupdate_field('guide_legacy_id','822706',$pageObject->ID);echo'<br/>ID='.$pageObject->ID;?>
<?php$pageObject=get_page_by_title('Polen',OBJECT,'guides')?><?phpupdate_field('guide_legacy_id','822865',$pageObject->ID);echo'<br/>ID='.$pageObject->ID;?>
<?php$pageObject=get_page_by_title('Portugal',OBJECT,'guides')?><?phpupdate_field('guide_legacy_id','823018',$pageObject->ID);echo'<br/>ID='.$pageObject->ID;?>
<?php$pageObject=get_page_by_title('Azoren',OBJECT,'guides')?><?phpupdate_field('guide_legacy_id','846841',$pageObject->ID);echo'<br/>ID='.$pageObject->ID;?>
<?php$pageObject=get_page_by_title('Madeira',OBJECT,'guides')?><?phpupdate_field('guide_legacy_id','846780',$pageObject->ID);echo'<br/>ID='.$pageObject->ID;?>


<?php$pageObject=get_page_by_title('SanMarino',OBJECT,'guides')?><?phpupdate_field('guide_legacy_id','823432',$pageObject->ID);echo'<br/>ID='.$pageObject->ID;?>
<?php$pageObject=get_page_by_title('Serbien',OBJECT,'guides')?><?phpupdate_field('guide_legacy_id','823540',$pageObject->ID);echo'<br/>ID='.$pageObject->ID;?>
<?php$pageObject=get_page_by_title('SlowakischeRepublik',OBJECT,'guides')?><?phpupdate_field('guide_legacy_id','823706',$pageObject->ID);echo'<br/>ID='.$pageObject->ID;?>
<?php$pageObject=get_page_by_title('Slowenien',OBJECT,'guides')?><?phpupdate_field('guide_legacy_id','823855',$pageObject->ID);echo'<br/>ID='.$pageObject->ID;?>
<?php$pageObject=get_page_by_title('Spanien',OBJECT,'guides')?><?phpupdate_field('guide_legacy_id','823996',$pageObject->ID);echo'<br/>ID='.$pageObject->ID;?>
<?php$pageObject=get_page_by_title('Balearen',OBJECT,'guides')?><?phpupdate_field('guide_legacy_id','846900',$pageObject->ID);echo'<br/>ID='.$pageObject->ID;?>
<?php$pageObject=get_page_by_title('Menorca',OBJECT,'guides')?><?phpupdate_field('guide_legacy_id','847126',$pageObject->ID);echo'<br/>ID='.$pageObject->ID;?>
<?php$pageObject=get_page_by_title('KanarischeInseln',OBJECT,'guides')?><?phpupdate_field('guide_legacy_id','846957',$pageObject->ID);echo'<br/>ID='.$pageObject->ID;?>
<?php$pageObject=get_page_by_title('Schweden',OBJECT,'guides')?><?phpupdate_field('guide_legacy_id','824156',$pageObject->ID);echo'<br/>ID='.$pageObject->ID;?>
<?php$pageObject=get_page_by_title('Schweiz',OBJECT,'guides')?><?phpupdate_field('guide_legacy_id','824306',$pageObject->ID);echo'<br/>ID='.$pageObject->ID;?>

<?php$pageObject=get_page_by_title('Ukraine',OBJECT,'guides')?><?phpupdate_field('guide_legacy_id','824594',$pageObject->ID);echo'<br/>ID='.$pageObject->ID;?>


<?php$pageObject=get_page_by_title('Nordirland',OBJECT,'guides')?><?phpupdate_field('guide_legacy_id','847978',$pageObject->ID);echo'<br/>ID='.$pageObject->ID;?>
<?php$pageObject=get_page_by_title('England',OBJECT,'guides')?><?phpupdate_field('guide_legacy_id','847864',$pageObject->ID);echo'<br/>ID='.$pageObject->ID;?>
<?php$pageObject=get_page_by_title('Kanalinseln',OBJECT,'guides')?><?phpupdate_field('guide_legacy_id','847782',$pageObject->ID);echo'<br/>ID='.$pageObject->ID;?>
<?php$pageObject=get_page_by_title('Guernsey',OBJECT,'guides')?><?phpupdate_field('guide_legacy_id','848357',$pageObject->ID);echo'<br/>ID='.$pageObject->ID;?>
<?php$pageObject=get_page_by_title('SarkundHerm',OBJECT,'guides')?><?phpupdate_field('guide_legacy_id','848267',$pageObject->ID);echo'<br/>ID='.$pageObject->ID;?>
<?php$pageObject=get_page_by_title('Jersey',OBJECT,'guides')?><?phpupdate_field('guide_legacy_id','848177',$pageObject->ID);echo'<br/>ID='.$pageObject->ID;?>
<?php$pageObject=get_page_by_title('Alderney',OBJECT,'guides')?><?phpupdate_field('guide_legacy_id','848086',$pageObject->ID);echo'<br/>ID='.$pageObject->ID;?>

<?php$pageObject=get_page_by_title('Schottland',OBJECT,'guides')?><?phpupdate_field('guide_legacy_id','847690',$pageObject->ID);echo'<br/>ID='.$pageObject->ID;?>
<?php$pageObject=get_page_by_title('IsleofMan',OBJECT,'guides')?><?phpupdate_field('guide_legacy_id','847588',$pageObject->ID);echo'<br/>ID='.$pageObject->ID;?>
<?php$pageObject=get_page_by_title('Wales',OBJECT,'guides')?><?phpupdate_field('guide_legacy_id','847483',$pageObject->ID);echo'<br/>ID='.$pageObject->ID;?>
<?php$pageObject=get_page_by_title('Vatikanstadt',OBJECT,'guides')?><?phpupdate_field('guide_legacy_id','824828',$pageObject->ID);echo'<br/>ID='.$pageObject->ID;?>
<?php$pageObject=get_page_by_title('Amerikanisch-Samoa',OBJECT,'guides')?><?phpupdate_field('guide_legacy_id','829905',$pageObject->ID);echo'<br/>ID='.$pageObject->ID;?>
<?php$pageObject=get_page_by_title('Australien',OBJECT,'guides')?><?phpupdate_field('guide_legacy_id','830017',$pageObject->ID);echo'<br/>ID='.$pageObject->ID;?>
<?php$pageObject=get_page_by_title('NewSouthWales',OBJECT,'guides')?><?phpupdate_field('guide_legacy_id','853148',$pageObject->ID);echo'<br/>ID='.$pageObject->ID;?>
<?php$pageObject=get_page_by_title('Queensland',OBJECT,'guides')?><?phpupdate_field('guide_legacy_id','853051',$pageObject->ID);echo'<br/>ID='.$pageObject->ID;?>
<?php$pageObject=get_page_by_title('Tasmania',OBJECT,'guides')?><?phpupdate_field('guide_legacy_id','853101',$pageObject->ID);echo'<br/>ID='.$pageObject->ID;?>
<?php$pageObject=get_page_by_title('AustralianCapitalTerritory',OBJECT,'guides')?><?phpupdate_field('guide_legacy_id','852986',$pageObject->ID);echo'<br/>ID='.$pageObject->ID;?>
<?php$pageObject=get_page_by_title('WesternAustralia',OBJECT,'guides')?><?phpupdate_field('guide_legacy_id','852945',$pageObject->ID);echo'<br/>ID='.$pageObject->ID;?>
<?php$pageObject=get_page_by_title('Victoria',OBJECT,'guides')?><?phpupdate_field('guide_legacy_id','852897',$pageObject->ID);echo'<br/>ID='.$pageObject->ID;?>
<?php$pageObject=get_page_by_title('NorthernTerritory',OBJECT,'guides')?><?phpupdate_field('guide_legacy_id','852845',$pageObject->ID);echo'<br/>ID='.$pageObject->ID;?>
<?php$pageObject=get_page_by_title('SouthAustralia',OBJECT,'guides')?><?phpupdate_field('guide_legacy_id','852794',$pageObject->ID);echo'<br/>ID='.$pageObject->ID;?>
<?php$pageObject=get_page_by_title('Cook-Inseln',OBJECT,'guides')?><?phpupdate_field('guide_legacy_id','830157',$pageObject->ID);echo'<br/>ID='.$pageObject->ID;?>
<?php$pageObject=get_page_by_title('Fidschi',OBJECT,'guides')?><?phpupdate_field('guide_legacy_id','830267',$pageObject->ID);echo'<br/>ID='.$pageObject->ID;?>
<?php$pageObject=get_page_by_title('Guam',OBJECT,'guides')?><?phpupdate_field('guide_legacy_id','830400',$pageObject->ID);echo'<br/>ID='.$pageObject->ID;?>
<?php$pageObject=get_page_by_title('Kiribati',OBJECT,'guides')?><?phpupdate_field('guide_legacy_id','830506',$pageObject->ID);echo'<br/>ID='.$pageObject->ID;?>
<?php$pageObject=get_page_by_title('Nauru',OBJECT,'guides')?><?phpupdate_field('guide_legacy_id','830614',$pageObject->ID);echo'<br/>ID='.$pageObject->ID;?>
<?php$pageObject=get_page_by_title('Neukaledonien',OBJECT,'guides')?><?phpupdate_field('guide_legacy_id','830732',$pageObject->ID);echo'<br/>ID='.$pageObject->ID;?>
<?php$pageObject=get_page_by_title('Neuseeland',OBJECT,'guides')?><?phpupdate_field('guide_legacy_id','830853',$pageObject->ID);echo'<br/>ID='.$pageObject->ID;?>
<?php$pageObject=get_page_by_title('Niue',OBJECT,'guides')?><?phpupdate_field('guide_legacy_id','830997',$pageObject->ID);echo'<br/>ID='.$pageObject->ID;?>
<?php$pageObject=get_page_by_title('PazifischeInselnvonMikronesien',OBJECT,'guides')?><?phpupdate_field('guide_legacy_id','831079',$pageObject->ID);echo'<br/>ID='.$pageObject->ID;?>
<?php$pageObject=get_page_by_title('Marshall-Inseln',OBJECT,'guides')?><?phpupdate_field('guide_legacy_id','1044012',$pageObject->ID);echo'<br/>ID='.$pageObject->ID;?>
<?php$pageObject=get_page_by_title('RepublikPalau(Belau)',OBJECT,'guides')?><?phpupdate_field('guide_legacy_id','853476',$pageObject->ID);echo'<br/>ID='.$pageObject->ID;?>


<?php$pageObject=get_page_by_title('Papua-Neuguinea',OBJECT,'guides')?><?phpupdate_field('guide_legacy_id','831186',$pageObject->ID);echo'<br/>ID='.$pageObject->ID;?>
<?php$pageObject=get_page_by_title('Samoa',OBJECT,'guides')?><?phpupdate_field('guide_legacy_id','831302',$pageObject->ID);echo'<br/>ID='.$pageObject->ID;?>
<?php$pageObject=get_page_by_title('Salomonen',OBJECT,'guides')?><?phpupdate_field('guide_legacy_id','831405',$pageObject->ID);echo'<br/>ID='.$pageObject->ID;?>

<?php$pageObject=get_page_by_title('Tonga',OBJECT,'guides')?><?phpupdate_field('guide_legacy_id','831660',$pageObject->ID);echo'<br/>ID='.$pageObject->ID;?>
<?php$pageObject=get_page_by_title('Tuvalu',OBJECT,'guides')?><?phpupdate_field('guide_legacy_id','831771',$pageObject->ID);echo'<br/>ID='.$pageObject->ID;?>
<?php$pageObject=get_page_by_title('Vanuatu',OBJECT,'guides')?><?phpupdate_field('guide_legacy_id','831883',$pageObject->ID);echo'<br/>ID='.$pageObject->ID;?>
*/ ?>