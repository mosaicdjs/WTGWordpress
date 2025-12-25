<?php
/**
 * Plugin Name: FD shortcodes
 * Description: This plugin adds shortcodes for the Food and Drink site.
 * Author: Adam Faulkner
 * Author URL: 
 *
 */
final class Wines_Archive
{
    private $var = 'foo';

    public function __construct()
    {
        add_filter( 'get_wines_archive_instance', [ $this, 'get_instance' ] );
    }

    public function get_instance()
    {
        return $this; // return the object
    }

    public function return_wines()
    {
        $paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1;
		$html = '';
		$taxQuery = array();
		$awardQuery = array();
		$typeQuery = array();
		
		$wine_args = array
		(
		   'post_type' => 'wines',
		   'posts_per_page' => 12,
		   'paged' => $paged,
		   'post_parent' => 0,
			'orderby'           => 'name', 
			'order'             => 'ASC',
	 
		);
        
		
		if(isset($_POST["award"]))
		{
			//$html .= $_POST["award"];
			if($_POST["award"] != '0') {
				$awardQuery['taxonomy'] = 'wtg_wine_award';
				$awardQuery['field'] = 'slug';
				$awardQuery['terms'] = $_POST["award"];
				$wine_args = array
				(
					   'post_type' => 'wines',
					   'posts_per_page' => 12,
					   'paged' => $paged,
					   'post_parent' => 0,
						'orderby'           => 'name', 
						'order'             => 'ASC',
						'tax_query' => array($awardQuery),
				 
				);
				
			}
			
		} 
			
		if(isset($_POST["type"]))
		{
			if($_POST["type"] != '0') {
				$typeQuery['taxonomy'] = 'wtg_wine_type';
				$typeQuery['field'] = 'slug';
				$typeQuery['terms'] = $_POST["type"];
				$wine_args = array
				(
					   'post_type' => 'wines',
					   'posts_per_page' => 12,
					   'paged' => $paged,
					   'post_parent' => 0,
						'orderby'           => 'name', 
						'order'             => 'ASC',
						'tax_query' => array($typeQuery),
				 
				);
			} 
		} 
		
		
		if(isset($_POST["award"])&&isset($_POST["type"]))
		{

			if($_POST["type"] != '0'&&$_POST["award"] != '0') {
				$typeQuery['taxonomy'] = 'wtg_wine_type';
				$typeQuery['field'] = 'slug';
				$typeQuery['terms'] = $_POST["type"];
				$awardQuery['taxonomy'] = 'wtg_wine_award';
				$awardQuery['field'] = 'slug';
				$awardQuery['terms'] = $_POST["award"];
				
				$taxQuery[0] = $typeQuery;
				$taxQuery[1] = $awardQuery;
				$wine_args = array
				(
					   'post_type' => 'wines',
					   'posts_per_page' => 12,
					   'paged' => $paged,
					   'post_parent' => 0,
						'orderby'           => 'name', 
						'order'             => 'ASC',
						'tax_query' => array('relation' => 'AND',$taxQuery),
				 
				);
			}
		}
		//var_dump($wine_args);
		
        $getAwards = new WP_Query($wine_args);
        
        //query_posts ($wine_args);
		
		
        
        
        $wineIndex = 0;
        if($getAwards->have_posts()):
            while ($getAwards->have_posts()):$getAwards->the_post();
                $id = get_the_ID();
                $title = get_the_title();
                $producer = get_post_meta($id, 'producer_name', true);
                $abv = get_post_meta($id, 'alcohol_percentage', true);
                $tasting = get_post_meta($id, 'tasting_notes', true);

                //$categoryTerms = get_the_terms($id,'wtg_wine_tasting_cat');
                $wineCategorys = get_post_meta($id, 'wine_tasting_category', true);
                
                $awardterms = get_the_terms($id,'wtg_wine_award');
                $award = $awardterms[0]->name;
                $wineAltClass ='';
                if ($wineIndex % 2 != 0) {$wineAltClass='wine-alt';}
                $colourTerms = get_the_terms($id,'wtg_wine_colour');
                $wineColour = $colourTerms[0]->name;
                
                $awardTerms = get_the_terms($wineID,'wtg_wine_award');
	
				if($awardTerms[1] != '') {
					$award = $awardTerms[1]->name;
					$awardSlug = $awardTerms[1]->slug;
				} else {
					$award = $awardTerms[0]->name;
					$awardSlug = $awardTerms[0]->slug;
				}
                
                $awardYearTerms = get_the_terms($wineID,'wtg_wine_award_year');
                $awardYear = $awardYearTerms[0]->name;
                
                $awardLogoString = $awardSlug.'-'.$awardYear.'.png';
                $awardLogoPath = get_template_directory_uri().'/images/iwsc/'.$awardLogoString;
                $link = get_permalink($id);
                if(!empty($tasting)){
					$html .= '<section class="wine-section '.$wineAltClass.'"><a href="'.$link.'">';
				} else{
					$html .= '<section class="wine-section '.$wineAltClass.'">';
				}
						$html .= '<div class="wine-image-outer">';
							$html .= "<div class=''><div style='text-align:center;' class='award-logo'><img src='$awardLogoPath' /></div></div>";
						$html .= '</div>';
						$html .= '<div class="wine-text-outer">';
							$html .= '<h2>'.$title.'</h2>';
							$html .= '<div class="wine-text">';
								$html .= "<div><b>Producer:</b> $producer</div>";
								$html .= "<div><b>Tasting Category:</b> $wineCategorys</div>";
								$html .= '<div><b>Award:</b> '.$award.'</div>';
								//$html .= '<div>Region: '.$wineCategory[1].'</div>';
								//$html .= '<div>Year: '.$wineCategory[2].'</div>';
								//$html .= '<div>Alcohol Level: '.$abv.'%</div>';
							$html .= '</div>';
						$html .= '</div>';
                 //if (!empty($tasting)){   
                    //$html .= "<div>Tasting notes:<br/>$tasting</div>";
                 //}
                if(!empty($tasting)){
					$html .= '</a></section>';
				}else{
					$html .= '</section>';
				}
                //$html .= "id: $id<br/>title: $title<br/><br/>";
                
                $wineIndex++;
            endwhile;
        endif;
        
        wp_reset_query();
        $big = 999999999;
        $paginate = paginate_links( array(
            'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
            'format' => '?paged=%#%',
            'current' => max( 1, get_query_var('paged') ),
            'total' => $getAwards->max_num_pages
        ) );
        $html .= '<div class="container" style="text-align:center; padding-top:15px;">
                    <div class="row">
                        <div class="col-lg-12">'.$paginate.'
                        </div>
                    </div>
                </div>';
        
        return $html;

    }
    
    public function return_spirits()
    {
		$taxQuery = array();
        $paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1;
        $spirit_args = array
        (
               'post_type' => 'spirits',
               'posts_per_page' => 12,
               'paged' => $paged,
               'post_parent' => 0,
                'orderby'           => 'name', 
                'order'             => 'ASC',
         
        );
		
		if(isset($_POST["award"]))
		{
			if($_POST["award"] != '0') {
				$awardQuery['taxonomy'] = 'wtg_spirit_award';
				$awardQuery['field'] = 'slug';
				$awardQuery['terms'] = $_POST["award"];
				$spirit_args = array
				(
					   'post_type' => 'spirits',
					   'posts_per_page' => 12,
					   'paged' => $paged,
					   'post_parent' => 0,
						'orderby'           => 'name', 
						'order'             => 'ASC',
						'tax_query' => array($awardQuery),
				 
				);
			}
		}
			
		if(isset($_POST["type"]))
		{
			if($_POST["type"] != '0') {
			$typeQuery['taxonomy'] = 'wtg_spirit_type';
			$typeQuery['field'] = 'slug';
			$typeQuery['terms'] = $_POST["type"];
			$spirit_args = array
			(
				   'post_type' => 'spirits',
				   'posts_per_page' => 12,
				   'paged' => $paged,
				   'post_parent' => 0,
					'orderby'           => 'name', 
					'order'             => 'ASC',
					'tax_query' => array($typeQuery),
			 
			);
			}
		}
		
		if(isset($_POST["award"])&&isset($_POST["type"]))
		{

			if($_POST["type"] != '0'&&$_POST["award"] != '0') {
				$typeQuery['taxonomy'] = 'wtg_spirit_type';
				$typeQuery['field'] = 'slug';
				$typeQuery['terms'] = $_POST["type"];
				$awardQuery['taxonomy'] = 'wtg_spirit_award';
				$awardQuery['field'] = 'slug';
				$awardQuery['terms'] = $_POST["award"];
				
				$taxQuery[0] = $typeQuery;
				$taxQuery[1] = $awardQuery;
				$spirit_args = array
				(
					   'post_type' => 'spirits',
					   'posts_per_page' => 12,
					   'paged' => $paged,
					   'post_parent' => 0,
						'orderby'           => 'name', 
						'order'             => 'ASC',
						'tax_query' => array('relation' => 'AND',$taxQuery),
				 
				);
			}
		}
        
        $getAwards = new WP_Query($spirit_args);
        
        //query_posts ($wine_args);
        
        $html = '';
        $wineIndex = 0;
        if($getAwards->have_posts()):
            while ($getAwards->have_posts()):$getAwards->the_post();
                $id = get_the_ID();
                $title = get_the_title();
				$wineAltClass ='';
                
				$producer = get_post_meta($id, 'spirit_producer_name', true);
                $abv = get_post_meta($id, 'spirit_alcohol_percent', true);
                $tasting = get_post_meta($id, 'spirit_tasting_notes', true);
				$age = get_post_meta($id, 'spirit_age', true);
				$country = get_post_meta($id, 'spirit_country', true);
				$region = get_post_meta($id, 'spirit_region', true);
				$sub_region = get_post_meta($id, 'spirit_sub_region', true);
                
				$spirit_cat = get_post_meta($id, 'spirit_tasting_category', true);
				
                
                if ($wineIndex % 2 != 0) {$wineAltClass='wine-alt';}
                
                $awardTerms = get_the_terms($id,'wtg_spirit_award');
	
				if($awardTerms[1] != '') {
					$award = $awardTerms[1]->name;
					$awardSlug = $awardTerms[1]->slug;
				} else {
					$award = $awardTerms[0]->name;
					$awardSlug = $awardTerms[0]->slug;
				}
                
				if(empty($award)){
					$awardSlug = 'bronze';
				}
				
                $awardYearTerms = get_the_terms($id,'wtg_spirit_award_year');
                $awardYear = $awardYearTerms[0]->name;
                
                $awardLogoString = $awardSlug.'-'.$awardYear.'.png';
                $awardLogoPath = get_template_directory_uri().'/images/iwsc/'.$awardLogoString;
                $link = get_permalink($id);
				
                if(!empty($tasting)){
					$html .= '<section class="wine-section '.$wineAltClass.'"><a href="'.$link.'">';
				} else{
					$html .= '<section class="wine-section '.$wineAltClass.'">';
				}
						$html .= '<div class="wine-image-outer">';
							$html .= "<div class=''><div style='text-align:center;' class='award-logo'><img src='$awardLogoPath' /></div></div>";
						$html .= '</div>';
						$html .= '<div class="wine-text-outer">';
							$html .= '<h2>'.$title.'</h2>';
							$html .= '<div class="wine-text">';
								$html .= "<div><b>Producer:</b> $producer</div>";
								$html .= "<div><b>Tasting Category:</b> $spirit_cat</div>";
								$html .= '<div><b>Award:</b> '.$award.'</div>';
								//$html .= '<div>Region: '.$wineCategory[1].'</div>';
								//$html .= '<div>Year: '.$wineCategory[2].'</div>';
								//$html .= '<div>Alcohol Level: '.$abv.'%</div>';
							$html .= '</div>';
						$html .= '</div>';
                 //if (!empty($tasting)){   
                    //$html .= "<div>Tasting notes:<br/>$tasting</div>";
                 //}
                if(!empty($tasting)){
					$html .= '</a></section>';
				}else{
					$html .= '</section>';
				}
                
                //$html .= "id: $id<br/>title: $title<br/><br/>";
                
                $wineIndex++;
                
            endwhile;
        endif;
        
        wp_reset_query();
        $big = 999999999;
        $paginate = paginate_links( array(
            'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
            'format' => '?paged=%#%',
            'current' => max( 1, get_query_var('paged') ),
            'total' => $getAwards->max_num_pages
        ) );
        $html .= '<div class="container" style="text-align:center; padding-top:15px;">
                    <div class="row">
                        <div class="col-lg-12">'.$paginate.'
                        </div>
                    </div>
                </div>';

		
        return $html;
        
    }
    
    public function return_recs($atts)
	{
		extract(shortcode_atts(array(
			'type'		=> 'wines',
			
		), $atts));

        $recWines = array();

		$type = $atts['type'];
		$capType = ucfirst($type);
		$trimLastChar = substr($capType, 0, -1);
		

        $wine_args = array
        (
               'post_type' => $type,
               'posts_per_page' => -1,
                'orderby'           => 'name', 
                'order'             => 'ASC',			  
         
        );
        
        $RecAwards = new WP_Query($wine_args);
        
        if($RecAwards->have_posts()):
            while ($RecAwards->have_posts()):$RecAwards->the_post();
                $id = get_the_ID();
                $isRec = get_post_meta($id, 'iwsc_rec_is_rec', true);
                
                if($isRec == true){
                    array_push($recWines,$id);
                }
                
            endwhile;
        endif;
        wp_reset_query();
		//var_dump($recWines);
		if($recWines[0]!=''){
			$html = "<h2>Recommended $capType</h2>";
			foreach($recWines as $rec){
				$title = get_the_title($rec);
				if($type == 'wines'){
					$producer = get_post_meta($rec, 'producer_name', true);
					$abv = get_post_meta($rec, 'alcohol_percentage', true);
					$tasting = get_post_meta($rec, 'tasting_notes', true);

					$tasting_cat = get_post_meta($rec, 'wine_tasting_category', true);
					
					$awardterms = get_the_terms($rec,'wtg_wine_award');
					$award = $awardterms[0]->name;
					$wineAltClass ='';
					if ($wineIndex % 2 != 0) {$wineAltClass='wine-alt';}
					$colourTerms = get_the_terms($rec,'wtg_wine_colour');
					$wineColour = $colourTerms[0]->name;
					
					$awardTerms = get_the_terms($rec,'wtg_wine_award');
		
					if($awardTerms[1] != '') {
						$award = $awardTerms[1]->name;
						$awardSlug = $awardTerms[1]->slug;
					} else {
						$award = $awardTerms[0]->name;
						$awardSlug = $awardTerms[0]->slug;
					}
					
					$awardYearTerms = get_the_terms($rec,'wtg_wine_award_year');
					$awardYear = $awardYearTerms[0]->name;
				} else {
					$producer = get_post_meta($rec, 'spirit_producer_name', true);
					$abv = get_post_meta($rec, 'spirit_alcohol_percent', true);
					$tasting = get_post_meta($rec, 'spirit_tasting_notes', true);
					$age = get_post_meta($rec, 'spirit_age', true);
					$country = get_post_meta($rec, 'spirit_country', true);
					$region = get_post_meta($rec, 'spirit_region', true);
					$sub_region = get_post_meta($rec, 'spirit_sub_region', true);
					
					$tasting_cat = get_post_meta($rec, 'spirit_tasting_category', true);
					
					
					if ($wineIndex % 2 != 0) {$wineAltClass='wine-alt';}
					
					$awardTerms = get_the_terms($rec,'wtg_spirit_award');
		
					if($awardTerms[1] != '') {
						$award = $awardTerms[1]->name;
						$awardSlug = $awardTerms[1]->slug;
					} else {
						$award = $awardTerms[0]->name;
						$awardSlug = $awardTerms[0]->slug;
					}
					
					if(empty($award)){
						$awardSlug = 'bronze';
					}
					
					$awardYearTerms = get_the_terms($rec,'wtg_spirit_award_year');
					$awardYear = $awardYearTerms[0]->name;
				}
				$recDesc = get_post_meta($rec, 'iwsc_rec_description', true); 
				
				$awardLogoString = $awardSlug.'-'.$awardYear.'.png';
				$awardLogoPath = get_template_directory_uri().'/images/iwsc/'.$awardLogoString;
				$link = get_permalink($rec);
				
				$winnersLink = home_url().'/IWSC-'.$type;
				 if(!empty($tasting)||!empty($recDesc)){
					$html .= '<section class="wine-section '.$wineAltClass.'"><a href="'.$link.'">';
				} else{
					$html .= '<section class="wine-section '.$wineAltClass.'">';
				}
						$html .= '<div class="wine-image-outer">';
							$html .= "<div class=''><div style='text-align:center;' class='award-logo'><img src='$awardLogoPath' /></div></div>";
						$html .= '</div>';
						$html .= '<div class="wine-text-outer">';
							$html .= '<h2>'.$title.'</h2>';
							$html .= '<div class="wine-text">';
								$html .= "<div><b>Producer:</b> $producer</div>";
								$html .= "<div><b>Tasting Category:</b> $tasting_cat</div>";
								if(!empty($recDesc)){$html .= '<div><b>Recommendation:</b> '.$recDesc.'</div>';}
								//$html .= '<div>Region: '.$wineCategory[1].'</div>';
								//$html .= '<div>Year: '.$wineCategory[2].'</div>';
								//$html .= '<div>Alcohol Level: '.$abv.'%</div>';
							$html .= '</div>';
						$html .= '</div>';
				 //if (!empty($tasting)){   
					
				 //}
				if(!empty($tasting)){
					$html .= '</a></section>';
				}else{
					$html .= '</section>';
	
				}
				
			}
			$html .= "<div><a href='$winnersLink'>View more $trimLastChar winners</a></div>";
		}
		
        return $html;
        
    }
	
	public function fd_filter($atts)
	{
		extract(shortcode_atts(array(
			'type'		=> 'wines',
			
		), $atts));
		
		$type = $atts['type'];
		$capType = ucfirst($type);
		$awardTerms='';
		$typeTitle = '';
		
		$html = '<form class="searchandfilter" action="" method="POST"><div><ul>';
		switch($type){
			case 'wines' :
				$awardTerms = get_terms('wtg_wine_award');
				$typeTerms = get_terms('wtg_wine_type');
				$typeTitle = $capType.' Grape variety';
				
				break;
			case 'spirits' :
				$awardTerms = get_terms('wtg_spirit_award');
				$typeTerms = get_terms('wtg_spirit_type');
				$typeTitle = $capType . ' Type';
				
				
				break;
		}
		
		///////////////////
		
		$html .= '<li><select name="award"><option value="0">'.$capType.' Award</option>';
		if (!empty($awardTerms) && !is_wp_error($awardTerms)) {
			foreach($awardTerms as $awardTerm) {
				$html .= '<option value="'.$awardTerm->slug.'">'.$awardTerm->name.'</option>';
			}
		}
		$html .= '</select></li>';
		
		///////////////////
		
		$html .= '<li><select name="type"><option value="0">'.$typeTitle.'</option>';
		if (!empty($typeTerms) && !is_wp_error($typeTerms)) {
			foreach($typeTerms as $typeTerm) {
				$html .= '<option value="'.$typeTerm->slug.'">'.$typeTerm->name.'</option>';
			}
		}
		$html .= '</select></li>';
		
		////////////////////
		
		
		$html .= '<li><input type="submit" value="submit"></li></ul></div></form>';
		//var_dump($awardTerms);
		
		
		return $html;
		
		//echo '<form action="" method="POST">';
		//echo '<input type="text" name="testing">';
		//echo '<input type="submit" value="submit"></form>';
	}
	
	public function article_recs($atts,$content=null){
		extract(shortcode_atts(array(
			'type'		=> 'wines',
			'ids'		=> '',
			'title'		=> '',
			'notes'		=> 'Addittional Tasting notes',
			
		), $atts));
		if($atts['notes']==''){
			$notesTitle = 'Addittional Tasting notes';
		} else {
			$notesTitle = $atts['notes'];
		}
		$ids_array = array();
		$ids = $atts['ids'];
		$type = $atts['type'];
		$capType = ucfirst($type);
		$trimLastChar = substr($capType, 0, -1);
		if (!empty($ids)){
			$ids_array = explode(",", $ids);
		}
		if($ids_array[0] != ''){
			$html = '<h2>'.$atts['title'].'</h2>';
			$html .= '<p>'.$content.'</p>';
			$wineIndex = 1;
			foreach($ids_array as $rec){
				$title = get_the_title($rec);
				if($type == 'wines'){
					$producer = get_post_meta($rec, 'wine_producer_name', true);
					$abv = get_post_meta($rec, 'wine_alcohol_percentage', true);
					$tasting = get_post_meta($rec, 'wine_tasting_notes', true);

					$tasting_cat = get_post_meta($rec, 'wine_tasting_category', true);
					
					$awardterms = get_the_terms($rec,'wtg_wine_award');
					$award = $awardterms[0]->name;
					$wineAltClass ='';
					if ($wineIndex % 2 != 0) {$wineAltClass='wine-alt';}
					$colourTerms = get_the_terms($rec,'wtg_wine_colour');
					$wineColour = $colourTerms[0]->name;
					
					$awardTerms = get_the_terms($rec,'wtg_wine_award');
		
					if($awardTerms[1] != '') {
						$award = $awardTerms[1]->name;
						$awardSlug = $awardTerms[1]->slug;
					} else {
						$award = $awardTerms[0]->name;
						$awardSlug = $awardTerms[0]->slug;
					}
					
					$awardYearTerms = get_the_terms($rec,'wtg_wine_award_year');
					$awardYear = $awardYearTerms[0]->name;
				} else {
					$producer = get_post_meta($rec, 'spirit_producer_name', true);
					$abv = get_post_meta($rec, 'spirit_alcohol_percent', true);
					$tasting = get_post_meta($rec, 'spirit_tasting_notes', true);
					$age = get_post_meta($rec, 'spirit_age', true);
					$country = get_post_meta($rec, 'spirit_country', true);
					$region = get_post_meta($rec, 'spirit_region', true);
					$sub_region = get_post_meta($rec, 'spirit_sub_region', true);
					
					$tasting_cat = get_post_meta($rec, 'spirit_tasting_category', true);
					
					
					if ($wineIndex % 2 == 0) {$wineAltClass='wine-alt';}
					
					$awardTerms = get_the_terms($rec,'wtg_spirit_award');
		
					if($awardTerms[1] != '') {
						$award = $awardTerms[1]->name;
						$awardSlug = $awardTerms[1]->slug;
					} else {
						$award = $awardTerms[0]->name;
						$awardSlug = $awardTerms[0]->slug;
					}
					
					if(empty($award)){
						$awardSlug = 'bronze';
					}
					
					$awardYearTerms = get_the_terms($rec,'wtg_spirit_award_year');
					$awardYear = $awardYearTerms[0]->name;
				}
				$recDesc = get_post_meta($rec, 'iwsc_rec_description', true); 
				$recImageID = get_post_meta($rec, 'iwsc_rec_image', true);
				$recImageLink = wp_get_attachment_image_src($recImageID,'large')[0];
				$awardLogoString = $awardSlug.'-'.$awardYear.'.png';
				$awardLogoPath = get_template_directory_uri().'/images/iwsc/'.$awardLogoString;
				$link = get_permalink($rec);
				
				$outstandingClass = ''; 
				
				if (strpos($awardSlug, 'outstanding') !== false||$awardSlug == 'trophy') {
					$outstandingClass = 'outstanding';
				}
				
				$winnersLink = home_url().'/IWSC-'.$type;
				
					$html .= '<section class="wine-section">';
						$html .= '<span class="wine-helper"></span>';
						$html .= '<div class="wine-image-outer '.$outstandingClass.'">';
							$html .= "<div style='text-align:center;' class='award-logo'><img src='$awardLogoPath' /></div>";
						$html .= '</div>';
						$html .= '<div class="wine-text-outer">';
							$html .= '<h2>'.$title.'</h2>';
							$html .= '<div class="wine-text wine-details">';
								$html .= "<div><b>Producer:</b> $producer</div>";
								$html .= "<div><b>Tasting Category:</b> $tasting_cat</div>";
						if(!empty($tasting)){$html .= '<div><b>Tasting notes:</b> '.$tasting.'</div>';}
								//$html .= '<div><b>'.$notesTitle.':</b> '.$recDesc.'</div>';
								//$html .= '<div>Region: '.$wineCategory[1].'</div>';
								//$html .= '<div>Year: '.$wineCategory[2].'</div>';
								//$html .= '<div>Alcohol Level: '.$abv.'%</div>';
								//$html .= '<div>Index: '.$wineIndex.'</div>';
							$html .= '</div>';
						$html .= '</div>';
						//$html .= '<div class="wine-imagerec-outer">';
						//	$html .= "<div class=''><div style='text-align:center;' class='rec-image'><img src='$recImageLink' /></div></div>";
						//$html .= '</div>';
				 //if (!empty($tasting)){   
					
				 //}
				
					$html .= '</section>';
	
				
				$wineIndex++;
			}
			//$html .= "<div><a href='$winnersLink'>View more $trimLastChar winners</a></div>";
		}
		
        return $html;
	}
}

//add_shortcode( 'FD-wines', [ new Wines_Archive, 'return_wines' ] );
//add_shortcode( 'FD-spirits', [ new Wines_Archive, 'return_spirits' ] );
//add_shortcode( 'FD-recs', [ new Wines_Archive, 'return_recs' ] );
//add_shortcode( 'FD-filter', [ new Wines_Archive, 'fd_filter' ] );
add_shortcode( 'FD-article', [ new Wines_Archive, 'article_recs' ] );

