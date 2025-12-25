<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta http-equiv="content-type" content="<?php bloginfo('html_type'); ?>" charset="<?php bloginfo('charset'); ?>" />
	<meta name="google-site-verification" content="ud-RtgPmcvRIL-4ppgyrWYVeTCGecjkP0pfuyDsjNhY" />

	<?php
	$googleAdsCode = get_option('wtg_google_ads_options');



	header("Cache-Control: no-cache, no-store, must-revalidate"); // HTTP 1.1.
	header("Pragma: no-cache"); // HTTP 1.0.
	header("Expires: 0"); // Proxies.
	$icon = get_template_directory_uri().'/images/favicon.ico';
	echo "<link aysnc type='image/x-icon' href='$icon' rel='shortcut icon'>";
	if (!current_user_can('administrator'))	{ show_admin_bar( false ); }
	$pageDescription = strip_tags(get_the_excerpt());



	/* SEO Meta */

	if(!is_singular('guides'))
	{
		/* Not a guide */
		if(is_front_page())
		{
			$defaultOptions = get_option('wtg_meta_default_options');
			$defaultTitle = get_bloginfo('name').' | '.$defaultOptions['site_title'];
			echo "<title>$defaultTitle</title>";
		} 
		else 
		{
			echo '<title>'; wp_title('|', true, 'right'); echo '</title>';
		}		
	} 
	else 
	{
		/* A guide */

		$current_fp = get_query_var('fpage');
		$postid = get_the_ID();
		$title = get_the_title($postid);
		//var_dump (get_post_meta($postid));
		$pageTitle = '';
		add_filter('wpseo_twitter_title', '__return_false' );		
		add_filter('wpseo_twitter_desc', '__return_false' );
		add_filter('wpseo_opengraph_desc', '__return_false' );
		add_filter('wpseo_metadesc', '__return_false');
		add_filter('wpseo_opengraph_title', '__return_false' );
		add_filter('wpseo_metatitle', '__return_false' );
		add_filter('wpseo_metadesc','__return_false');
		$keywords = "$title, travel guide, destination guide, Travel information, Travel Advice, Information, Tips, Destination";
		$pageTitle = create_metadescription('overview');
		switch($current_fp)
		{
			//Regions
				case 'history-language-culture' :
					$pageTitle = create_metadescription('region-history');
					break;
				case 'weather-climate-geography' :
					$pageTitle = create_metadescription('region-weather');
					break;
				case 'business-communications' :
					$pageTitle = create_metadescription('region-business');
					break;
				case 'travel-by' :
					$pageTitle = create_metadescription('region-travel-to');
					break;
				case 'region-hotels' :
					$pageTitle = create_metadescription('region-hotels');
					break;
				case 'passport-visa' :
					$pageTitle = create_metadescription('region-passport-visa');
					$keywords .= ', passport visa requirements';
					break;
				case 'health' :
					$pageTitle = create_metadescription('region-health');
					break;
				case 'public-holidays' :
					$pageTitle = create_metadescription('region-public-holidays');
					//echo '<h1>'.$pageDescription.'</h1>';
					break;
				case 'money-duty-free' :
					$pageTitle = create_metadescription('region-money-duty-free');
					break;
				case 'things-to-do' :
					$pageTitle = create_metadescription('region-things-to-do');
					break;
				case 'shopping-nightlife' :
					$pageTitle = create_metadescription('region-shopping-nightlife');					
					break;
				case 'getting-around' :
					$pageTitle = create_metadescription('region-getting-around');
					break;
				case 'events' :
					$pageTitle = create_metadescription('region-events');				
					break;
				case 'food-and-drink' :
					$pageTitle = create_metadescription('region-food-and-drink');				
					break;
			//Cities
				case 'history' :
					$pageTitle = create_metadescription('city-history');				
					break;
				case 'weather' :
					$pageTitle = create_metadescription('city-weather');				
					break;
				case 'pictures' :
					$pageTitle = create_metadescription('city-pictures');				
					break;
					$pageTitle = create_metadescription('city-history');				
					case 'videos' :
					$pageTitle = create_metadescription('city-videos');				
					break;
				case 'gettingaround' :
					$pageTitle = create_metadescription('city-getting-around');				
					break;
				case 'things-to-see' :
					$pageTitle = create_metadescription('city-things-to-see');				
					break;
				case 'tours-excursions' :
					$pageTitle = create_metadescription('city-tours-excursions');								
					break;
				case 'things-to-do-0' :
					$pageTitle = create_metadescription('city-things-to-do');				
					break;
				case 'shopping' :
					$pageTitle = create_metadescription('city-shopping');				
					break;
				case 'restaurants' :
					$pageTitle = create_metadescription('city-restaurants');				
					break;
				case 'nightlife' :
					$pageTitle = create_metadescription('city-nightlife');				
					break;
				case 'city-events' :
					$pageTitle = create_metadescription('city-events');				
					break;
				case 'travel-to' :
					$pageTitle = create_metadescription('city-travel-to');				
					break;
				case 'hotels' :
					$pageTitle = create_metadescription('city-hotels');				
					break;
			//Airports
				case 'airport-hotels' :
					break;
			//Ski
				case 'apres-ski' :
					break;
		}
		echo '<!-- Meta Descriptions -->';
		//echo '<span style="display:none">Before reset description: '.$pageDescription.'</span>';
		$pageDescription = get_the_excerpt();
		$pageDescription = strip_tags($pageDescription);
		echo '<meta name="description" content="'.$pageDescription.'">';
		echo "<meta name='keywords' content='$keywords'>";
		echo '<meta property="twitter:description" content="'.$pageDescription.'">';
		echo '<meta property="og:description" content="'.$pageDescription.'">';
		
			echo "<title>$pageTitle</title>";
			echo '<meta property="twitter:title" content="'.$pageTitle.'">';
			echo '<meta property="og:title" content="'.$pageTitle.'">';
	}
	echo '
	<!-- <meta name="robots" content="index, follow"> -->
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!--[if IE]><meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"><![endif]-->';
		
	echo '<!-- the google analytics code goes here -->';

/*
?>
	<script> jQuery(document).ready(function(){	jQuery('.firstLetterSearch').click(function() { jQuery('.searchForm').toggle(); }); });	</script>
	<script>
		jQuery( document ).ready(function() 
		{
			jQuery('a.internal').click(function(e) { e.preventDefault();	return false;	});
		});
		jQuery(document).ready( function() 
		{
			jQuery(document).on('click', 'a[href^="#"]', function (event) 
			{
    			event.preventDefault();
				alert('hello');
    			jQuery('html, body').animate({ scrollTop: jQuery(jQuery.attr(this, 'href')).offset().top-300}, 1000);
			}
			);

		jQuery(window).on("scroll touchmove", function () { jQuery('header').toggleClass('minimize', jQuery(document).scrollTop() > 300);});	
	}
);
*/
?>
<?php	wp_head(); 
	echo $googleAdsCode['analytics_code'];
	echo $googleAdsCode['header_code'];
?>
<!-- <script src="https://www.paypal.com/sdk/js?client-id=ARoeu7hgKEUxF7JHlI16LLJiBqYYn2rlwRlG2sLwPAGtIcmpHatwVsEnzvqYfH7MQi414SegaCESYu7O&currency=GBP"> </script>-->
<script>
jQuery(window).load(function(){
    jQuery('.listingImage').height(jQuery('.listingImage').width() * 0.75);
    jQuery(window).resize(function(){
		jQuery('.listingImage').height(jQuery('.listingImage').width() * 0.75);
    });
});
</script>


<script>
function setCookie(cname,cvalue,exdays) {
    var d = new Date();
    d.setTime(d.getTime() + (exdays*24*60*60*1000));
    var expires = "expires=" + d.toGMTString();
    document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
}
function getCookie(cname) {
    var name = cname + "=";
    var decodedCookie = decodeURIComponent(document.cookie);
    var ca = decodedCookie.split(';');
    for(var i = 0; i < ca.length; i++) {
        var c = ca[i];
        while (c.charAt(0) == ' ') {
            c = c.substring(1);
        }
        if (c.indexOf(name) == 0) {
            return c.substring(name.length, c.length);
        }
    }
    return "";
}
function areCookiesEnabled() {
  document.cookie = "__verify=1";
  var supportsCookies = document.cookie.length >= 1 &&
                        document.cookie.indexOf("__verify=1") !== -1;
  var thePast = new Date(1976, 8, 16);
  document.cookie = "__verify=1;expires=" + thePast.toUTCString();
  return supportsCookies;
}

function welcomeBannerCookie() {
    var welcomeCookie=getCookie("noShowWelcome");
    if (welcomeCookie == "true") {
        jQuery('.email-signup-fixed1').hide();
    }
    else {
        console.log('no cookie found')
        jQuery('.email-signup-fixed').show();
        jQuery(".email-signup-fixed").click(function() {
            jQuery(".email-signup-fixed1").hide();
            setCookie("noShowWelcome", "true", 30);
        });
    }
};
jQuery(document).ready(function() {
  if ( areCookiesEnabled() ) {
    console.log('Cookies are enabled.');
    welcomeBannerCookie();
  } else {
   console.log('Cookies are disabled');
   jQuery(".email-signup-fixed").click(function() {
       jQuery(".email-signup-fixed1").hide();
   });
  }
});
</script>

	<script async src="https://fundingchoicesmessages.google.com/i/pub-2710788903622358?ers=1" nonce="wXaUCSZhkDcQjFs4Kr53eA"></script>
    <script nonce="wXaUCSZhkDcQjFs4Kr53eA">
    (function() {
        function signalGooglefcPresent() {
            if (!window.frames['googlefcPresent']) {
                if (document.body) {
                    const iframe = document.createElement('iframe');
                    iframe.style = 'width: 0; height: 0; border: none; z-index: -1000; left: -1000px; top: -1000px;';
                    iframe.style.display = 'none';
                    iframe.name = 'googlefcPresent';
                    document.body.appendChild(iframe);
                } else {
                    setTimeout(signalGooglefcPresent, 0);
                }
            }
        }
        signalGooglefcPresent();
    })();
    </script>

<style>
/*.email-signup-fixed{ 
    position: fixed; 
    top: 0;
	left:0;
    width:100%; 
    transform: translateY(0%);
    transition: 100ms ease-in-out;
    opacity: 1;
	display:none;
	background-color:pink;
    text-align:center;
    z-index:99999;
	height:80px;
    padding:10px 0;
}
.email-signup-fixed{
    color: #fff;
    text-align: center;
    font-size: 13px;
    text-transform:uppercase;
    letter-spacing: .5px;
    font-family: 'Lato';
    font-weight:300;
    margin: 0;
}
.email-signup-fixed span.big-text{
    font-size:18px;
    margin-right:10px;
}
.email-signup-fixed:hover{
    text-decoration:none;
    cursor:pointer;
}
.email-signup-fixed-container{
    position:relative;
    margin:0 auto;
    max-width:900px;
}
.email-signup-fixed .mail-icon{
    margin-right:5px; */
}
#close-welcome{
display:block;
position:absolute;
top:0px;
right:15px;
color: #346d10;
font-weight:600;
text-decoration:underline;
font-size:18px;
}
.instructions{
  max-width:900px;
  margin:55px auto 15px auto;
}
.instructions p{
  text-align:center;
}
</style>



</head>

<body <?php body_class(); ?> itemscope itemtype="https://schema.org/WebPage"><div class="email-signup-fixed">



	<?php do_action('wtg_after_body'); ?>
	<header style="height:auto!important" class="no_carousel" itemscope itemtype="https://schema.org/WPHeader"> <?php do_action('wtg_header'); ?> </header>
	<?php do_action('wtg_before_content'); ?>
	<main>
		<?php do_action('wtg_content_top');	?>

	<?php //echo '<p style="display:none">Page description'.$pageDescription.'</p>'; ?>
