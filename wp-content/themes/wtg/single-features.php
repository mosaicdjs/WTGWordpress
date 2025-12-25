<?php 


 if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

get_header();
while(have_posts()):the_post();
    $pageID = get_the_ID();
				$featureType = get_field('newstyle_feature', $pageID);
endwhile;

echo '<article class="editorial_article" itemtype="https://schema.org/CreativeWork" itemscope>';
if ($featureType )	{do_action('singleFeaturesNew');} else {do_action('singleFeatures');}

	echo '
		</article>';


get_footer();

?>