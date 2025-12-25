<?php 


 if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

get_header();
while(have_posts()):the_post();
    $pageID = get_the_ID();
endwhile;

echo '<div class="editorial_article">
        <div class="container">';
do_action('singleFeatures');

	echo '</div>
		</div>';


get_footer();

?>