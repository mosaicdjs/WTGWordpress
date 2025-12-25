<?php 
/*
* Template Name: Basic Listing Creation
*/
get_header('listing');
global $wpdb;
$taxonomyPrice =  'wtg_listing_price';
$taxonomyType = 'wtg_listing_type';
$terms = get_terms('wtg_continent' );
$termsPrice = get_terms( array('taxonomy' => $taxonomyPrice, 'hide_empty' => false));
$termsType = get_terms( array('taxonomy' => $taxonomyType, 'hide_empty' => false));
$user = wp_get_current_user();
$userID = get_current_user_id();
$permalink = get_the_permalink();
$args = array(	
	'echo'       => true,
	'remember'  => true,	
'label_username' => 'Username ',
'label_password' => 'Password ',
'redirect'       => $permalink,
);
echo '
<style> 
	#loginform label {display:block} 
	.listing label {font-weight:normal; padding-left:10px; padding-right:30px;}	
	form.listing {padding-top:40px; padding-bottom:100px}
	

</style>
<section class="section-page-content">
	<div class="container box_list articles  last">
		<div class="row">
			<h2><i class="icon icon_1"></i>'.get_the_title().'</h2>
		</div>
	</div>
	<div class="container">
		<div class="row box_item">';
			if (!is_user_logged_in())
			{
				// User not logged in - display login or register forms

				echo '
				<div class="col-sm-6">';
					$results = wp_login_form($args);
					echo '<div style="padding-top:20px; padding-bottom:20px">'.get_the_content().'</div>';
				echo '
				</div>
				<div class="col-sm-6">'.do_shortcode ( '[contact-form-7 id="16541" title="Listing Registration"]').'</div>';
			}
			else	
			{
				// Display existing Listings

					// Create New Listings

											//** Location and Type of Listing Completed

						//echo 'Submitted value is '.$_POST['submitted'];
					switch ($_POST['submitted'])
					{
						case "":
						case "0":
						echo '
						<div class="col-sm-12"><h2 style="text-align:left">Create New Listing</h2></div>
						<form class="listing" action="'.$permalink.'" method="post">
							<div class="col-sm-6">
								<h3>Listing Type</h3>
								<input type="radio" id="hotel"	name="type" value="Hotel">
								<label for="hotel"> Hotel</label><br />
								<input type="radio" id="restaurant" name="type" value="Restaurant">
								<label for="restaurant"> Restaurant</label><br />
								<input type="radio" id="attraction" name="type" value="Attraction">
								<label for="attraction"> Attraction</label>
								<input type="radio" id="nightlife" name="type" value="Nightlife">
								<label for="attraction"> Bar/Club</label>
							</div>	
							<div class="col-sm-6">
                                <div class="col-sm-4"><label for "title">Listing Reference</label></div>
                                <div class="col-sm-8" style="padding-bottom:30px"><input style="width:80%" type="text" id="title" name="title"></div>
							</div>	
							<div class="col-sm-4" style="float:right">
								<input type="hidden" name="submitted" value="1">
								<input type="submit" value="Next">
							</div>
						  </form>';
						  wtg_display_existing_listings($userID);
						  break;
							case '1':
                            $typeOfListing = $_POST['type'];
                            $title = $_POST['title'];
							echo '
								<div class="col-sm-12"><h2 style="text-align:left">Continue with Listing</h2></div>
								<div class="col-sm-12"><h3 style="text-align:left"><strong>'.$title.'</strong>:  <strong>'.$typeOfListing.'</strong></div>
								<form style="padding-top:40px" class="listing" action="'.$permalink.'" method="post">
									<div class="col-sm-6">
										<p style="padding-bottom:50px"></p>
										<input type="hidden" name="title" value="'.$title.'">
										<input type="hidden" name="type" value="'.$typeOfListing.'">
										<input type="hidden" name="submitted" value="2">
										<button type="submit" value="Submit">Confirm Listing</button>
									</div>
								</form>';
								wtg_display_existing_listings($userID);
							break;
		
							case '2' :
							

							$title = $_POST['title'];
							$postType = strtolower($_POST['type']);
							$postID = wp_insert_post
							(
								array 	(
									'post_type' => $postType,
									'post_title' => $title,
									'post_status' => 'draft',
									'comment_status' => 'closed',   // if you prefer
									'ping_status' => 'closed',      // if you prefer 
										)
							);
						
							echo '
							<form class="listing">
								<input type="hidden" name="submitted" value="0">
								<button type="submit" value=Submit">Click to Continue</button>
							</form>';	
							wtg_display_existing_listings($userID);
							break;
							
							default:
							echo ' no idea!';
							break;			
						}

					}
				
echo '</div>';
echo '</div>';
echo '</section>';
get_footer('listing'); 
?>