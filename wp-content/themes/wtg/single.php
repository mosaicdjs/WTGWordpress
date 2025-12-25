<?php
get_header();
?>
<script>
$(function()
  {
	$('a').click(function() {
		if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
		var target = $(this.hash);
		target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
		if (target.length) {
			$('html,body').animate({ scrollTop: target.offset().top}, 1000);
			return false;
		}
	}
	});
});
</script>
<?php 

$i=0;
echo
'
<div id="top"></div>
';
the_post();
$landscapeImageID = get_post_meta ($post->ID, 'landscape_image', true);
$portraitImageID =  get_post_meta ($post->ID, 'portrait_image', true );
$landscapeImage =  wp_get_attachment_image_src( $landscapeImageID, 'full', false, '' );
$portraitImage = wp_get_attachment_image_src( $portraitImageID, 'full', false, '' );
$content = get_post_meta ($post->ID, 'content', true);	  
	//echo 'shmeckle';
get_footer()
?>