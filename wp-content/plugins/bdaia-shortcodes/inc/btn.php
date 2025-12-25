<?php
function bdaia_shorty_btn( $atts, $content = null, $code ) {

	$btnnewt = $btnicon = $btnlink = $btntxt = $button_target = $bgcolor = $css = $tcss = $btnsize = "";

	if( is_array( $atts ) ) extract($atts);

	if( !empty( $bgcolor ) || !empty( $txtcolor ) ) {
		$css = 'style="';
		if( !empty( $bgcolor  )  ) $css .= 'background:'.$bgcolor.' !important;';
		if( !empty( $txtcolor )  ) $css .= 'color:'.$txtcolor.' !important;';
		$css .= '"';
	}

	if( !empty( $txtcolor )  ) $tcss = 'style="color:'.$txtcolor.' !important;"';

	if( !empty( $btnnewt ) && $btnnewt == 1 ) $button_target = ' target="_blank"';

	$output ="<span class='bdaia-btns bdaia-btn-".$btnsize."' $css>";
	if( !empty( $btnlink ) ) $output .='<a href="'.$btnlink.'"'.$button_target.' '.$tcss.'>';
	if( !empty( $btnicon ) ) $output .='<span class="btn-io fa '.$btnicon.'"></span>';
	$output .=do_shortcode($content);
	if( !empty( $btnlink ) ) $output .="</a>";
	$output .="</span>";
	return $output;
}
add_shortcode( 'btn', 'bdaia_shorty_btn' );