<?php	
/*if (!is_front_page()) 
{
?>	
<div class="container">
	<div class="row">
    	<div class="col-lg-12">        
			<div id="rcjsload_33717a"></div>
        </div>
     </div>
</div>     
<script type="text/javascript">
(function() {
var referer="";try{if(referer=document.referrer,"undefined"==typeof referer||""==referer)throw"undefined"}catch(exception){referer=document.location.href,(""==referer||"undefined"==typeof referer)&&(referer=document.URL)}referer=referer.substr(0,700);
var rcds = document.getElementById("rcjsload_33717a");
var rcel = document.createElement("script");
rcel.id = 'rc_' + Math.floor(Math.random() * 1000);
rcel.type = 'text/javascript';
rcel.src = "https://trends.revcontent.com/serve.js.php?w=96966&t="+rcel.id+"&c="+(new Date()).getTime()+"&width="+(window.outerWidth || document.documentElement.clientWidth)+"&referer="+referer;
rcel.async = true;
rcds.appendChild(rcel);
})();
</script>
<?php
} */    
?>   
</main><!-- #content -->
 
<?php do_action('basetheme_footer');?>

<?php do_action('wtg_before_body_end');?>


<?php wp_footer(); ?>
<script async defer src="https://maps.googleapis.com/maps/api/js?v=3&amp;sensor=false&amp;key=AIzaSyBx-1ry9KwxCmLrWJQf7Tk9gzj7HumPy9Y&callback=initMap"> </script>
<?php
echo '<link rel="stylesheet" type="text/css" defer href="//fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i&subset=latin-ext" />
';

$options = get_option('wtg_google_ads_options');

$footerCode = $options['footer_code'];

echo $footerCode;

?>



</body>
</html>