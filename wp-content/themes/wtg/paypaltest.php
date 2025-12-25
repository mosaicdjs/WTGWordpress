<?php
/*
* Template Name: Paypal Test
*/
?>
<?php 
get_header();
do_action('bookshop');
echo '<section class="section-page-content">';
echo '<div class="container box_list articles  last" style="padding-top:0px;">';
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
    
	echo '<ul class="book-list" >'; 
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
        
        echo '<li class="book-item" >';
        echo '<div style="background-image:url('.$memberImageSrc[0].'); " class="book-image col-xs-6 col-md-1"></div>';
        
		echo '<div class="book-buy col-xs-6 col-md-3">';
            echo '<div class="book-buy-top">';
                echo '<div>'.$bookPrice.'</div>';
                echo '<div>Stock UK:					'.$bookStockUK.'</div>';
				echo '<div>Stock USA :					'.$bookStockUSA.'</div>';
				echo '<div>Stock South Africa :		'.$bookStockSA.'</div>';
                echo '<div>Stock Rest of the world :	'.$bookStockRest.'</div>';
                //$bookPrice = 25;
				$bookPrice = str_replace("£","",$bookPrice);
				if($bookStockUK == 'out-stock' && $bookStockSA == 'out-stock' && $bookStockUSA == 'out-stock' && $bookStockRest == 'out-stock') {
					echo '<div>Sold out</div>';
				} else{
//					$returnHTML .= '<div><a href="'.$bookBuy.'">Buy Now</a></div>';
                    echo '<div id="paypal-button-container-'.$bookNumber.'" style="max-width:300px"></div>'; ?>
                    <script>
                    // Render the PayPal button into #paypal-button-container
                    paypal.Buttons({
            
                        // Set up the transaction
                        createOrder: function(data, actions) {
                            return actions.order.create({
                                purchase_units: [{
                                    amount: {
                                        value: <?php echo $bookPrice; ?>
                                    }
                                    
                                }]
                            });
                        },
            
                        // Finalize the transaction
                        onApprove: function(data, actions) {
                            return actions.order.capture().then(function(details) {
                                // Show a success message to the buyer
                                alert('Transaction completed by ' + details.payer.name.given_name + '!');
                            });
                        }
            
            
                    }).render('#paypal-button-container-<?php echo $bookNumber; ?>');
                </script>
            <?php 
				}
           echo '</div>';
        echo '</div>';
		
		echo '<div class="book-info col-xs-12 col-md-8 ">';
            echo '<div class="book-info-top">';
                echo '<div><b>'.$bookName.'</b></div>';
                echo '<div>'.$bookExcerpt.'</div>';
				echo  "<div id=><a href='$bookLink'>Read more</a></div>";
            echo '</div>';
        echo '</div>';
		echo '</li>';
        
    }
    echo '</div></section>';
get_footer();
?>



