<?php
/**
 * Service Box
 *
 */
if (!function_exists('service_box_shortcode')) {

	function service_box_shortcode( $atts, $content = null, $shortcodename = '' ) {
		extract(shortcode_atts(
			array(
				'title'        => '',
				'subtitle'     => '',
				'icon'         => '',
				'text'         => '',
				'btn_text'     => '',
				'btn_link'     => '',
				'btn_size'     => '',
				'target'       => '',
				'custom_class' => ''
		), $atts));

		$output =  '<div class="service-box '.$custom_class.'">';

		if($icon != 'no'){
			$icon_url = CHERRY_PLUGIN_URL . 'includes/images/' . strtolower($icon) . '.png' ;
			if( defined ('CHILD_DIR') ) {
				if(file_exists(CHILD_DIR.'/images/'.strtolower($icon).'.png')){
					$icon_url = CHILD_URL.'/images/'.strtolower($icon).'.png';
				}
			}
			$output .= '<figure class="icon"><img src="'.$icon_url.'" alt="" /></figure>';
		} elseif (strpos ($custom_class, "count") !== false) {
			$output .= '<div class="count-num"></div>';
		}

		

		$output .= '<div class="service-box_body">';

		if ($title!="") {
			$output .= '<h2 class="title">';
				if ($btn_link!="" && $btn_text == '') {
					$output .=  '<a href="'.$btn_link.'" title="'.$btn_text.'" target="'.$target.'">';
				}
				$output .= $title;
				if ($btn_link!="" && $btn_text == '') {
					$output .=  '</a>';
				}
			$output .= '</h2>';
		}
		if ($subtitle!="") {
			$output .= '<h5 class="sub-title">';					
				$output .= $subtitle;					
			$output .= '</h5>';
		}
		if ($text!="") {
			$output .= '<div class="service-box_txt">';
			$output .= $text;
			$output .= '</div>';
		}

		if ($btn_link!="" && $btn_text != '') {
			$output .=  '<div class="btn-align"><a href="'.$btn_link.'" title="'.$btn_text.'" class="btn btn-inverse btn-'.$btn_size.' btn-primary " target="'.$target.'">';
			$output .= $btn_text;
			$output .= '</a></div>';
		}

		$output .= '</div>';

		$output .= '</div><!-- /Service Box -->';

		$output = apply_filters( 'cherry_plugin_shortcode_output', $output, $atts, $shortcodename );

		return $output;
	}
	add_shortcode('service_box', 'service_box_shortcode');

}?>