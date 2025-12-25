<?php
//REGISTER SHORTCODES
add_action('init', 'register_my_shortcodes');
function register_my_shortcodes(){
	//register get_team, see get_team_function.
	add_shortcode('get_team','get_team_function');
	////// IMAGES
	// example shortcode [aImage id='530']
	add_shortcode('aImage','wtg_embed_article_image');
	
	// same as above, this shortcode was used for testing. the new formate is easier for Editors to use.
	add_shortcode('ARTICLE-IMAGE','wtg_embed_article_image');
	add_shortcode('ARTICLE-IMAGE-NEW','wtg_embed_article_image_new');	
	////// Large Text. Equivelant to "Stand-first"
	// example shortcode[largeText] content [/largeText]
	add_shortcode('largetext', 'wtg_large_text');
	
	////// Book shops"
	add_shortcode('bookshop', 'wtg_book_shop');
	add_shortcode('paypal-bookshop','wtg_paypal_book_shop');
	
	////// Adverts
	add_shortcode('adverts', 'wtg_article_advert');
	
	add_shortcode('hotel-link','wtg_hotel_link');
	
	add_shortcode('fd-link','wtg_FD_link');
	
	add_shortcode('wtg-MPU', 'wtg_article_mpu');
	add_shortcode('wtg-AD', 'wtg_article_mpu_new');
	add_shortcode('sekindo-video', 'wtg_sekindo_video' );

	add_shortcode('tiqet-discovery', 'wtg_tiqet_discovery');
	add_shortcode('your-guides', 'wtg_your_guides');
}

function wtg_tiqet_discovery ($atts, $content = null)
{
		extract(shortcode_atts(array(
		'name' 			=> 'London',
	), $atts));
	
	$cities = array (
		'Aberdeen' => '67665',
		'Abu Dhabi' => '60013',
		'Abu Dhabi' => '260933',
		'Agrigento' => '71484',
		'Akureyri' => '71389',
		'Al Ain' => '60010',
		'Albufeira' => '76558',
		'Alicante' => '66088',
		'Alphen aan den Rijn' => '75064',
		'Amatitán' => '110387',
		'Amboise' => '97582',
		'Amersfoort' => '75063',
		'Amlapura' => '261203',
		'Amnéville' => '97579',
		'Amsterdam' => '75061',
		'Angers' => '67158',
		'Antalya' => '78987',
		'Antigua Guatemala' => '68016',
		'Antwerp' => '60863',
		'Aosta' => '72022',
		'Apeldoorn' => '75059',
		'Apulia' => '1304',
		'Arequipa' => '75334',
		'Arizona' => '126364',
		'Armenia' => '63930',
		'Arnhem' => '75058',
		'Astorga' => '95315',
		'Athens' => '99239',
		'Athens' => '67896',
		'Atlanta' => '79980',
		'Auburn Hills' => '80986',
		'Avignon' => '184100',
		'Ayutthaya' => '78545',
		'Bakewell' => '186855',
		'Balchik' => '85333',
		'Ballarat' => '60478',
		'Baltimore' => '80176',
		'Banff' => '87579',
		'Bangkok' => '78586',
		'Barcelona' => '66342',
		'Bari' => '210005',
		'Bariloche' => '60331',
		'Bastogne' => '85127',
		'Bath' => '67623',
		'Belfast' => '67614',
		'Benalmádena' => '66061',
		'Benidorm' => '66059',
		'Berchtesgaden' => '93086',
		'Bergamo' => '71991',
		'Berlin' => '65144',
		'Bethlehem' => '76477',
		'Biddinghuizen' => '111567',
		'Bilbao' => '66335',
		'Birmingham' => '67597',
		'Blackpool' => '67591',
		'Blankenberge' => '60852',
		'Bodrum' => '78967',
		'Bogotá' => '81',
		'Bologna' => '71986',
		'Bordeaux' => '67101',
		'Boston' => '80874',
		'Boulogne-sur-Mer' => '67098',
		'Bournemouth' => '67582',
		'Braga' => '76598',
		'Brampton' => '98490',
		'Bran' => '115866',
		'Brașov' => '260938',
		'Breda' => '75035',
		'Brescia' => '71978',
		'Brest' => '67091',
		'Brighton' => '67570',
		'Bruges' => '60844',
		'Brussels' => '60843',
		'Bucharest' => '76753',
		'Budapest' => '68199',
		'Buenos Aires' => '60189',
		'Burgas' => '60950',
		'Caen' => '67081',
		'Cagliari' => '71473',
		'Cairns' => '60466',
		'Calgary' => '62338',
		'Cambridge' => '80879',
		'Cambridge, UK' => '67548',
		'Camden, NJ' => '80406',
		'Cancún' => '24',
		'Capri' => '105984',
		'Carcassonne' => '67073',
		'Cardiff' => '67545',
		'Cartagena de Indias' => '63906',
		'Caserta' => '71946',
		'Caserta' => '105064',
		'Castel di Lama' => '106390',
		'Catania' => '71461',
		'Centallo' => '105851',
		'Chamonix-Mont-Blanc' => '97278',
		'Chantilly' => '97268',
		'Charleston' => '80045',
		'Charlotte' => '80353',
		'Chaumont-sur-Loire' => '182857',
		'Cherbourg-en-Cotentin' => '67038',
		'Chicago' => '80816',
		'Chichén Itzá' => '74049',
		'Chinon' => '97220',
		'Chur' => '62684',
		'Clearwater' => '79783',
		'Clermont' => '79784',
		'Cluny' => '182711',
		'Cobh' => '100441',
		'Coevorden' => '111536',
		'Coimbra' => '76595',
		'Cologne' => '64765',
		'Columbus' => '79988',
		'Como' => '71894',
		'Constanța (Constanta)' => '260939',
		'Copenhagen' => '113',
		'Copenhagen_' => '65314',
		'Cordoba' => '27',
		'Cork' => '1841',
		'Cortona' => '71882',
		'County Clare' => '914',
		'County Galway' => '1384',
		'County Kildare' => '100419',
		'County Limerick' => '624',
		'County Wicklow' => '547',
		'Cozumel (Island)' => '370',
		'Cullera' => '66020',
		'Cusco (Cuzco)' => '75323',
		'Cádiz' => '66051',
		'Dachau' => '65070',
		'Dallas' => '80608',
		'De Panne' => '85055',
		'Delft' => '75020',
		'Delhi' => '70505',
		'Denpasar' => '68506',
		'Derinkuyu' => '120725',
		'Derry' => '199867',
		'Dorgali' => '105708',
		'Dortmund' => '65045',
		'Dresden' => '65042',
		'Dubai' => '60005',
		'Dublin' => '68616',
		'Durham' => '126',
		'Düsseldorf' => '65037',
		'Edinburgh' => '21',
		'Egilsstaðir' => '104188',
		'Eindhoven' => '75003',
		'Eisenstadt' => '83806',
		'El Calafate' => '83553',
		'Emmeloord' => '75000',
		'Emmen' => '74999',
		'Enkhuizen' => '74998',
		'Essen' => '64998',
		'Fairbanks' => '82344',
		'Felton' => '248079',
		'Ferney-Voltaire' => '97034',
		'Fethiye' => '78917',
		'Figueres' => '66292',
		'Florence' => '71854',
		'Flores' => '67993',
		'Flúðir' => '261005',
		'Fort Lauderdale' => '79817',
		'Fort Myers' => '79818',
		'Frankfurt' => '64980',
		'Funchal' => '76533',
		'Fátima' => '114807',
		'Geneva' => '62678',
		'Genk' => '60815',
		'Genoa' => '71831',
		'Ghent' => '60814',
		'Girona' => '66285',
		'Giverny' => '276',
		'Glasgow' => '5',
		'Goa' => '279',
		'Gold Coast' => '60442',
		'Gothenburg' => '78108',
		'Gozo' => '1270',
		'Gran Canaria (Island)' => '810',
		'Granada' => '66003',
		'Graz' => '60360',
		'Grindavík' => '203923',
		'Grosseto' => '71818',
		'Guadalajara' => '74270',
		'Guatemala City' => '68006',
		'Gurgaon' => '70285',
		'Göreme (Goreme)' => '120668',
		'Haarlem' => '74982',
		'Haines' => '258507',
		'Hamburg' => '64886',
		'Harderwijk' => '74980',
		'Harlow' => '12',
		'Hasselt' => '60807',
		'Haßloch' => '64872',
		'Healy' => '258629',
		'Hellendoorn' => '836',
		'Helsinki' => '66544',
		'Hilvarenbeek' => '74962',
		'Hong Kong' => '34',
		'Honolulu' => '82342',
		'Houston' => '80638',
		'Huelva' => '65996',
		'Husavik' => '261104',
		'Höfn' => '203903',
		'Húsafell' => '260972',
		'Húsavík' => '203902',
		'Incheon' => '73118',
		'Innsbruck' => '60358',
		'Interlaken' => '88270',
		'Inverness' => '29',
		'Isla Mujeres' => '109534',
		'Istanbul' => '79079',
		'Izmir' => '1343',
		'Jasper' => '322',
		'Jerusalem' => '68627',
		'Johor Bahru' => '74350',
		'Kaatsheuvel' => '952',
		'Kahului' => '82330',
		'Kansas City' => '80090',
		'Kaprun' => '130704',
		'Katoomba' => '60435',
		'Kauai' => '1246',
		'Kayenta' => '125517',
		'Kearny' => '81190',
		'Kerkrade' => '74948',
		'Key West' => '79844',
		'Kiel' => '64775',
		'Kissimmee' => '79846',
		'Klaipeda (Klaipėda)' => '73367',
		'Ko Samui' => '78483',
		'Krakow' => '46',
		'Kuala Lumpur' => '74416',
		'Kuranda' => '261170',
		'Kutná Hora' => '64187',
		'Kuşadası (Kusadasi)' => '78863',
		'Kyoto' => '72420',
		'Köflach' => '83755',
		'La Flèche' => '66907',
		'La Rochelle' => '66897',
		'Langkawi' => '772',
		'Laren' => '111406',
		'Las Palmas de Gran Canaria' => '65973',
		'Las Vegas' => '82073',
		'Lausanne' => '62666',
		'Le Mont-Saint-Michel' => '260936',
		'Lecce' => '71793',
		'Leeuwarden' => '74943',
		'Leiden' => '74942',
		'Leipzig' => '64715',
		'Lelystad' => '74940',
		'Les Epesses' => '180481',
		'Leticia' => '63843',
		'Lewiston' => '80974',
		'Liberia' => '63976',
		'Lido di Jesolo' => '71809',
		'Lille' => '66858',
		'Lima' => '75306',
		'Lisbon' => '76528',
		'Lisse' => '74936',
		'Lisse' => '260931',
		'Liverpool' => '67463',
		'Livorno' => '71786',
		'Ljubljana' => '78133',
		'London' => '67458',
		'Los Angeles' => '81810',
		'Loxahatchee' => '248469',
		'Lucca' => '71784',
		'Lyon' => '66838',
		'Maastricht' => '74931',
		'Macau' => '47',
		'Madrid' => '66254',
		'Mallorca (Island)' => '471',
		'Malta' => '1271',
		'Manchester' => '67441',
		'Manta' => '207794',
		'Maranello' => '71773',
		'Marmaris' => '78854',
		'Marseille' => '66825',
		'Matera' => '71760',
		'Maui' => '2',
		'Mechelen' => '60769',
		'Medellín' => '63829',
		'Melaka' => '74395',
		'Melbourne' => '60426',
		'Memphis' => '80554',
		'Merritt Island' => '79867',
		'Metz' => '66814',
		'Mexico City' => '74040',
		'Miami' => '79868',
		'Milan' => '71749',
		'Minneapolis' => '81094',
		'Modena' => '71744',
		'Monaco' => '73505',
		'Monreale' => '71437',
		'Monterosso al Mare' => '207409',
		'Monteux' => '96478',
		'Montevideo' => '82413',
		'Montpellier' => '66788',
		'Montreal' => '25',
		'Moscow' => '77231',
		'Munich' => '31',
		'Muscat' => '75189',
		'Myrtle Beach' => '80512',
		'Málaga' => '32',
		'München' => '64627',
		'Mývatn' => '261039',
		'Naantali' => '95595',
		'Nancy' => '66778',
		'Nantes' => '66776',
		'Naples' => '71720',
		'Naples, Florida' => '79874',
		'Nara' => '72353',
		'Nashville' => '82353',
		'Naxxar' => '108911',
		'Nerja' => '65926',
		'Nevşehir' => '78844',
		'New Orleans' => '80162',
		'New York' => '260932',
		'Newcastle' => '185710',
		'Niagara Falls (CAN)' => '62419',
		'Niagara Falls (US)' => '81337',
		'Niagara-On-The-Lake' => '982',
		'Nice' => '66770',
		'Nieuwpoort' => '84858',
		'Nijmegen' => '74919',
		'Northumberland' => '596',
		'Nuenen' => '74916',
		'Nusajaya' => '194489',
		'Ocho Rios' => '106481',
		'Oostende' => '60750',
		'Oranjestad' => '60507',
		'Orlando' => '79889',
		'Orvieto' => '71696',
		'Osaka' => '28',
		'Oslo' => '75084',
		'Ota' => '177169',
		'Ottawa' => '62431',
		'Otterlo' => '219719',
		'Oxenford' => '84283',
		'Oxford' => '67381',
		'Oxfordshire' => '11',
		'Padua' => '138',
		'Padula' => '105173',
		'Palermo' => '71428',
		'Palm Springs' => '79898',
		'Palma de Mallorca' => '65915',
		'Parabiago' => '71684',
		'Paris' => '66746',
		'Pattaya' => '48',
		'Peaugres' => '179024',
		'Perugia' => '71679',
		'Philadelphia' => '80492',
		'Phnom Penh' => '72955',
		'Phoenix' => '81637',
		'Pigeon Forge' => '124347',
		'Pisa' => '260935',
		'Playa del Carmen' => '73927',
		'Plovdiv' => '261171',
		'Poitiers' => '66735',
		'Pompei' => '71657',
		'Poole' => '67363',
		'Portland' => '80975',
		'Porto' => '76573',
		'Portsmouth' => '67358',
		'Potsdam' => '64529',
		'Pozza di Fassa' => '206622',
		'Prague' => '64162',
		'Puerto Vallarta' => '74201',
		'Puno' => '75296',
		'Quimbaya' => '63796',
		'Quito' => '65652',
		'Rathangan' => '199738',
		'Ravenna' => '71640',
		'Reykholt' => '1320',
		'Reykjavík' => '22',
		'Riga' => '73383',
		'Rimini' => '71634',
		'Rio de Janeiro' => '61535',
		'Rome' => '71631',
		'Ronda' => '65896',
		'Rotterdam' => '74895',
		'Rust' => '158873',
		'Saarbrücken' => '64473',
		'Saint Augustine' => '122690',
		'Saint Petersburg' => '77061',
		'Saint-Émilion' => '177951',
		'Salisbury' => '67309',
		'Salta' => '60240',
		'Salzburg' => '60346',
		'Samut Songkhram' => '78528',
		'San Antonio' => '248671',
		'San Clemente del Tuyú' => '83245',
		'San Diego' => '81920',
		'San Francisco' => '1772',
		'San Francisco (old)' => '260934',
		'San Giovanni la Punta' => '71409',
		'San Jose' => '81926',
		'San José' => '63962',
		'San Sebastián' => '66172',
		'Santa Clara' => '81940',
		'Santa Cruz' => '898',
		'Santa Cruz de Tenerife' => '65876',
		'Santander' => '66168',
		'Sauðárkrókur' => '104177',
		'Savannah' => '80026',
		'Scarborough' => '67306',
		'Seattle' => '82304',
		'Segovia' => '66160',
		'Seoul' => '73067',
		'Sevenum' => '784',
		'Seville' => '65870',
		'Seward' => '258647',
		'Sežana' => '119195',
		'Sharjah' => '60007',
		'Sicily' => '558',
		'Siem Reap' => '72961',
		'Siena' => '71558',
		'Sighișoara' => '76778',
		'Sinaia' => '115342',
		'Singapore' => '78125',
		'Sintra' => '76496',
		'Skagway' => '292',
		'Slagharen' => '839',
		'Sliema' => '108895',
		'Sliven' => '60916',
		'Sofia' => '60914',
		'Soltau' => '64408',
		'Somersby' => '261071',
		'Sonoma' => '126046',
		'Sorrento' => '71552',
		'Split' => '68069',
		'Squamish' => '301',
		'Stavelot' => '84775',
		'Stockholm' => '1638',
		'Stockholm (old)' => '78060',
		'Stoke-on-Trent' => '67269',
		'Stratford-upon-Avon' => '97844',
		'Surfers Paradise' => '60401',
		'Sydney' => '60400',
		'Syracuse' => '71400',
		'Săpânţa (Sapanta)' => '232513',
		'Taipei' => '79181',
		'Talkeetna' => '523',
		'Tallinn' => '65702',
		'Tamborine Mountain' => '84267',
		'Tampa' => '79946',
		'Tanah Rata' => '110510',
		'Tarragona' => '66154',
		'Tel Aviv' => '68635',
		'Tenerife' => '461',
		'Teotihuacán' => '662',
		'Teplice' => '64148',
		'Teruel' => '66150',
		'The Hague' => '74889',
		'Tilburg' => '74872',
		'Tivoli' => '71537',
		'Tokyo' => '72181',
		'Toledo' => '170113',
		'Toronto' => '62492',
		'Torquay' => '83942',
		'Torzym' => '228776',
		'Toulouse' => '66619',
		'Tours' => '66615',
		'Tredozio' => '205342',
		'Trento' => '71526',
		'Treviso' => '71524',
		'Tulum' => '109113',
		'Turin' => '71534',
		'Ubud' => '68270',
		'Ungersheim' => '176560',
		'Urbino' => '71518',
		'Ushuaia' => '60210',
		'Utrecht' => '74866',
		'Valeggio sul Mincio' => '104617',
		'Valencia' => '65847',
		'Valladolid' => '73843',
		'Valletta' => '73787',
		'Vancouver' => '62496',
		'Vantaa' => '66489',
		'Varenna' => '205179',
		'Varese' => '71514',
		'Varna' => '60906',
		'Vatican City' => '82525',
		'Veliko Tarnovo' => '60905',
		'Venice' => '71510',
		'Veracruz' => '73840',
		'Verbania' => '72048',
		'Verona' => '71506',
		'Versailles' => '66594',
		'Vestmannaeyjar (Vestmannaeyjabær)' => '203910',
		'Victoria' => '62501',
		'Vienna' => '60335',
		'Villafranca di Verona' => '71498',
		'Vilnius' => '73352',
		'Virginia Beach' => '167',
		'Viterbo' => '71494',
		'Volendam' => '74851',
		'Vík' => '71390',
		'Wailuku' => '82338',
		'Wangetti' => '261137',
		'Warsaw' => '485',
		'Warsaw' => '76115',
		'Washington, D.C.' => '79751',
		'Wassenaar' => '74841',
		'Waterford' => '68596',
		'Wattens' => '83662',
		'Wexford' => '651',
		'Weymouth' => '67236',
		'Wieliczka' => '76112',
		'Williamsburg' => '260937',
		'Windermere' => '97691',
		'Windsor' => '67223',
		'Winter Haven' => '79971',
		'Wolfsburg' => '64249',
		'Yambol' => '60901',
		'Yonkers' => '81390',
		'Yorba Linda' => '82014',
		'York' => '67204',
		'Yucatán (Region)' => '1258',
		'Zaandam' => '74827',
		'Zator' => '228605'); 
		$name = $atts['name'];
	$cityID = $cities[$name];
	$code = '<div data-tiqets-widget="discovery" data-city-id="'.$cityID.'" data-language="en" data-currency="GBP" data-partner="travelguidecolumbus" data-cards-layout="horizontal" data-width="auto" data-height="auto"></div><script defer src="https://widgets.tiqets.com/loader.js"></script>';
	return $code;
}


function wtg_your_guides ($atts, $content = null)
{
		extract(shortcode_atts(array(
		'name' 			=> 'London',
	), $atts));

echo '	
	<script async defer src="https://widget.getyourguide.com/dist/pa.umd.production.min.js" data-gyg-partner-id="3UTG0R6"></script>

	<div data-gyg-href="https://widget.getyourguide.com/default/activites.frame" data-gyg-locale-code="en-UK" data-gyg-widget="activities" data-gyg-number-of-items="4" data-gyg-partner-id="3UTG0R6" data-gyg-placement="content-top" data-gyg-q="'.$content.'"></div>';
}


function wtg_sekindo_video ($atts,$content = null)
{
$imagehtml = '<div class="inline-video-container col-xs-hidden"  style="width:600px; left:0; right:0; margin:autp; padding:10px; border:1px solid black">
		
<script type="text/javascript" language="javascript" src="https://live.sekindo.com/live/liveView.php?s=92825&cbuster=[CACHE_BUSTER]&pubUrl=[PAGE_URL_ENCODED]&x=[580px]&y=[420px]&vp_content=plembed5ddtwizprmno&vp_template=269"></script>
			</div>
	<div class="inline-video-container col-xs-hidden"  style="width:600px; left:0; right:0; margin:autp; padding:10px; border:1px solid black">
<script type="text/javascript" language="javascript" src="https://live.sekindo.com/live/liveView.php?s=92825&cbuster=[CACHE_BUSTER]&pubUrl=[PAGE_URL_ENCODED]&x=[580]&y=[420]&vp_content=plembed5ddtwizprmno&vp_template=269"></script>
			</div>
<script type="text/javascript" language="javascript" src="https://live.sekindo.com/live/liveView.php?s=92825&cbuster=[CACHE_BUSTER]&pubUrl=https://www.worldtravelguide.net/guides/europe/spain/&x=580&y=420&vp_content=plembed5ddtwizprmno&vp_template=269"></script>
			</div>
			
			
			
			';	
	
	return $imagehtml;
}
function wtg_embed_article_image_new ($atts, $content = null)
{
		extract(shortcode_atts(array(
		'id' 			=> 493,
	), $atts));
	
	$imageID = $atts['id'];
	$imageStuff = wtg_get_attachment( $imageID );
	$imageSrc = $imageStuff['src'];
	$imageAlt = $imageStuff['alt'];
	$imageTitle = $imageStuff['caption'];
	$imageCaption = $imageStuff['description'];
	
//	var_dump($imageStuff);
	$theSrc = str_replace('http://', 'https://', $imageSrc );
	$imageMeta = wp_prepare_attachment_for_js( $imageID );

	$imageAlt = $imageMeta['alt'];
	if ($imageAlt == '') $imageAlt = $imageMeta['Caption'];
	if ($imageAlt == '') $imageAlt = $imageMeta['title'];
	
	
	$theSrc = str_replace('178.62.2.112/wtg-dev/', 'www.worldtravelguide.net/',$theSrc);
	
	$imagehtml = '<div class="inline-image-container">
				<img alt="'.$imageAlt.'" src="'.$theSrc.'" class="img-responsive '.$imageID.'">
				<p><span>'.$imageTitle.'</span>'.$imageCaption.'</p>
			</div>';
	
	return $imagehtml;
}

function wtg_article_mpu_new($atts, $content = null)
{
	extract(shortcode_atts(array(
		'id' 		=> 1,
	), $atts));
	
	$mpuID = $atts['id'];
	
	$html .= "
	<div style='overflow:auto; left:0; right:0; padding-top:20px; padding-bottom:20px; margin-bottom:2rem; border: 1px solid black;'>
	<p>Advertisement</p>
	<div id='div-gpt-ad-1492512001379-$mpuID' style='overflow:hidden; left:0; right:0; margin:auto;'>
		<script>
		googletag.cmd.push(function() { googletag.display('div-gpt-ad-1492512001379-$mpuID'); });
		</script>
	</div>
	</div>";

	return $html;
}




function wtg_article_mpu($atts, $content = null)
{
	extract(shortcode_atts(array(
		'id' 		=> 1,
	), $atts));
	
	$mpuID = $atts['id'];
	
			$html = "<div class='related_image' style='left:0; right:0; margin:auto; overflow:hidden'>";
		$html .= "<div id='div-gpt-ad-1492512001379-$mpuID' style='text-align:center'>
<script>
googletag.cmd.push(function() { googletag.display('div-gpt-ad-1492512001379-$mpuID'); });
</script>";
	$html .= "</div></div>";

	return $html;
}


//SHORT CODE FUNCTIONS
function wtg_article_advert($atts, $content = null)
{
	extract(shortcode_atts(array(
		'id' 		=> 467,
		'link'		=> '',
		'follow' 	=> 'false',
		'target'	=> 'false',
	), $atts));
	
	$rel = 'nofollow';
	$target = '';
	$imageID = $atts['id'];
	$imageStuff = wtg_get_attachment( $imageID );
	$imageSrc = $imageStuff['src'];
	$imageAlt = $imageStuff['alt'];
	$link= $atts['link'];
	
	switch ($atts['rel']){
		case 'false':
			$rel = 'nofollow';
			break;
		case 'true':
			$rel = 'follow"';
			break;
	}
	switch ($atts['target']){
		case 'false':
			$target = '';
			break;
		case 'true':
			$target = '_blank';
			break;		
	}
	
	$html = "<div class='related_image'>
				<a href='$link' rel='$rel' target='$target'>
					<img alt='$imageAlt' src='$imageSrc' class='img-responsive'>
				</a>
			</div>";
	
	return $html;
	
}

function wtg_paypal_book_shop()
{
	extract(shortcode_atts(array(
		
	), $atts));
    
    $booksAgrs = array(
        'post_type'             => 'books',
		'posts_per_page' 		=> -1,
		'orderby' 				=> 'menu_order',
	);
	
	$booksQuery = new WP_Query($booksAgrs);
    $booksIDs = array();
	
	if($booksQuery->have_posts()):
		while ($booksQuery->have_posts()):$booksQuery->the_post();
			$bID = get_the_ID();
			array_push($booksIDs,$bID);
		endwhile;
	endif;
    
	$returnHTML = '<ul class="book-list" >'; 
	$bookNumber = 0;
    foreach($booksIDs as $booksID){
		//echo $memberID;
		$bookNumber++;
        $bookName = get_the_title($booksID);
        $bookExcerpt = get_the_excerpt($booksID);
		$bookLink = get_permalink($booksID);
        $bookPrice = get_post_meta($booksID,'book_price',true);
		$bookStockUK = get_post_meta($booksID,'stock_levels_uk',true);
		$bookStockSA = get_post_meta($booksID,'stock_levels_sa',true);
		$bookStockUSA = get_post_meta($booksID,'stock_levels_usa',true);
		$bookStockRest = get_post_meta($booksID,'stock_levels_rest_of_world',true);
		$bookBuy = get_post_meta($booksID,'book_link',true);
        
		
		$memberImageID = get_post_meta($booksID,'book_image', true);
        $memberImageSrc =  wp_get_attachment_image_src( $memberImageID, 'full');
        
        $returnHTML .= '<li class="book-item" >';
        $returnHTML .= '<div style="background-image:url('.$memberImageSrc[0].'); " class="book-image col-xs-6 col-md-1"></div>';
        
		$returnHTML .= '<div class="book-buy col-xs-6 col-md-3">';
            $returnHTML .= '<div class="book-buy-top">';
                $returnHTML .= '<div>'.$bookPrice.'</div>';
                $returnHTML .= '<div>Stock UK:					'.$bookStockUK.'</div>';
				$returnHTML .= '<div>Stock USA :					'.$bookStockUSA.'</div>';
				$returnHTML .= '<div>Stock South Africa :		'.$bookStockSA.'</div>';
                $returnHTML .= '<div>Stock Rest of the world :	'.$bookStockRest.'</div>';
				
				if($bookStockUK == 'out-stock' && $bookStockSA == 'out-stock' && $bookStockUSA == 'out-stock' && $bookStockRest == 'out-stock') {
					$returnHTML .= '<div>Sold out</div>';
				} else{
//					$returnHTML .= '<div><a href="'.$bookBuy.'">Buy Now</a></div>';
					$returnHTML .= '<div id="paypal-button-container-'.$bookNumber.'"></div>';
					$returnHTML .= '<script>paypal.button.render("#paypal-button-container-'.$bookNumber.'");</script>';
				}
            $returnHTML .= '</div>';
        $returnHTML .= '</div>';
		
		$returnHTML .= '<div class="book-info col-xs-12 col-md-8 ">';
            $returnHTML .= '<div class="book-info-top">';
                $returnHTML .= '<div><b>'.$bookName.'</b></div>';
                $returnHTML .= '<div>'.$bookExcerpt.'</div>';
				$returnHTML .= "<div id=><a href='$bookLink'>Read more</a></div>";
            $returnHTML .= '</div>';
        $returnHTML .= '</div>';
		$returnHTML .= '</li>';
        
    }
    
    wp_reset_query();
    $returnHTML .= '</ul>';
    return $returnHTML;
	
}

function wtg_book_shop()
{
	extract(shortcode_atts(array(
		
	), $atts));
    
    $booksAgrs = array(
        'post_type'             => 'books',
		'posts_per_page' 		=> -1,
		'orderby' 				=> 'menu_order',
	);
	
	$booksQuery = new WP_Query($booksAgrs);
    $booksIDs = array();
	
	if($booksQuery->have_posts()):
		while ($booksQuery->have_posts()):$booksQuery->the_post();
			$bID = get_the_ID();
			array_push($booksIDs,$bID);
		endwhile;
	endif;
    
    $returnHTML = '<ul class="book-list" >'; 
    foreach($booksIDs as $booksID){
        //echo $memberID;
        $bookName = get_the_title($booksID);
        $bookExcerpt = get_the_excerpt($booksID);
		$bookLink = get_permalink($booksID);
        $bookPrice = get_post_meta($booksID,'book_price',true);
		$bookStockUK = get_post_meta($booksID,'stock_levels_uk',true);
		$bookStockSA = get_post_meta($booksID,'stock_levels_sa',true);
		$bookStockUSA = get_post_meta($booksID,'stock_levels_usa',true);
		$bookStockRest = get_post_meta($booksID,'stock_levels_rest_of_world',true);
		$bookBuy = get_post_meta($booksID,'book_link',true);
        
		
		$memberImageID = get_post_meta($booksID,'book_image', true);
        $memberImageSrc =  wp_get_attachment_image_src( $memberImageID, 'full');
        
        $returnHTML .= '<li class="book-item" >';
        $returnHTML .= '<div style="background-image:url('.$memberImageSrc[0].'); " class="book-image col-xs-6 col-md-1"></div>';
        
		$returnHTML .= '<div class="book-buy col-xs-6 col-md-3">';
            $returnHTML .= '<div class="book-buy-top">';
                $returnHTML .= '<div>'.$bookPrice.'</div>';
                $returnHTML .= '<div>Stock UK:					'.$bookStockUK.'</div>';
				$returnHTML .= '<div>Stock USA :					'.$bookStockUSA.'</div>';
				$returnHTML .= '<div>Stock South Africa :		'.$bookStockSA.'</div>';
                $returnHTML .= '<div>Stock Rest of the world :	'.$bookStockRest.'</div>';
				
				if($bookStockUK == 'out-stock' && $bookStockSA == 'out-stock' && $bookStockUSA == 'out-stock' && $bookStockRest == 'out-stock') {
					$returnHTML .= '<div>Sold out</div>';
				} else{
					$returnHTML .= '<div><a href="'.$bookBuy.'">Buy Now</a></div>';
				}
            $returnHTML .= '</div>';
        $returnHTML .= '</div>';
		
		$returnHTML .= '<div class="book-info col-xs-12 col-md-8 ">';
            $returnHTML .= '<div class="book-info-top">';
                $returnHTML .= '<div><b>'.$bookName.'</b></div>';
                $returnHTML .= '<div>'.$bookExcerpt.'</div>';
				$returnHTML .= "<div><a href='$bookLink'>Read more</a></div>";
            $returnHTML .= '</div>';
        $returnHTML .= '</div>';
		$returnHTML .= '</li>';
        
    }
    
    wp_reset_query();
    $returnHTML .= '</ul>';
    return $returnHTML;
	
}

function wtg_embed_article_image($atts, $content = null)
{
	extract(shortcode_atts(array(
		'id' 			=> 493,
	), $atts));
	
	$imageID = $atts['id'];
	$imageStuff = wtg_get_attachment( $imageID );
	$imageSrc = $imageStuff['src'];
	//echo 'image source = '.$imageSrc;
	//if ($imageSrc == '') $imageSrc = $imageStuff['href'];
	$imageAlt = $imageStuff['alt'];
	$imageTitle = $imageStuff['caption'];
	$imageCaption = $imageStuff['description'];
	$imageMeta = wp_prepare_attachment_for_js( $imageID );

	$imageAlt = $imageMeta['alt'];
	if ($imageAlt == '') $imageAlt = $imageMeta['Caption'];
	if ($imageAlt == '') $imageAlt = $imageMeta['title'];
	

	
	
	//var_dump($imageStuff);
	$theSrc = str_replace('http://', 'https://', $imageSrc );
	
	$theSrc = str_replace('178.62.2.112/wtg-dev/', 'www.worldtravelguide.net/',$theSrc);
	echo '<style> .editorial_article .article_content .related_image p {margin:0px; padding-top:4px; padding-bottom:4px} </style>'; 
	$imagehtml = '<div class="related_image" style="padding-bottom:10px">
				<img alt="'.$imageAlt.'" src="'.$theSrc.'" class="img-responsive '.$imageID.'">
				<p><span>'.$imageTitle.'</span>'.$imageCaption.'</p>
			</div>';
	
	return $imagehtml;
}

function wtg_large_text($atts, $content = null)
{
	extract(shortcode_atts(array(
	), $atts));
	
	$html = '<p class="large">'.$content.'</p>';
	
	return $html;
	
}

function wtg_hotel_link($atts)
{
	
	$searchTerm = '';
    $title = '';
    $bookingLink = "http://www.bookingbuddy.com/c/lander/overlay.html?mode=hotel&optimizely_force_tracking=true&optimizely_x8362053544=1&overlayedAd=20005853&source=73435&mcid=42736";
	
	$image = get_template_directory_uri().'/images/WTG-Holiday-Sidebar.jpg';
	
    if(!is_singular('guides')){
        $searchTerm = 'london';
    } else {
        $postid = get_the_ID();
        $guideTerms = get_the_terms($postid,'wtg_guide_type');
        $guideType = $guideTerms[0]->slug;
        if($guideType == 'city'){
            $searchTerm = get_the_title($postid);
            $title = 'in '.$searchTerm;
            $bookingLink = "http://www.onetime.com/hotel-listing/webcaptive.html?city=$searchTerm&source=73435&mcid=42736&optimizely_snippet=s3-656510837&optimizely_show_preview=false&optimizely_token=97ef6cb905e9c3ab8aa818e2924304cc2dc03875d7549c88bf89bb8506d2da55&optimizely_x8292427615=1";
    
        } 
    }
	
	$html = '<div class="hotel-link"><a href="'.$bookingLink.'"><img src="'.$image.'"></a></div>';

	return $html;
}

function wtg_FD_link()
{
	$searchTerm = '';
    $title = '';
    $bookingLink = "https://worldoffoodanddrink.worldtravelguide.net/";
	$image = get_template_directory_uri().'/images/FandDSidebar.jpg';
	
	$html = '<div class="hotel-link"><a href="'.$bookingLink.'"><img src="'.$image.'"></a></div>';

	return $html;
}

?>
