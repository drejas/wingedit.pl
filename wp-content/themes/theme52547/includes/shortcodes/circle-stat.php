<?php

if (!function_exists('circle_stat_shortcode')) {

	add_action( 'wp_enqueue_scripts', 'cherry_circles' );
	function cherry_circles() {
		wp_enqueue_script( 'circles.min', CHILD_URL . '/js/circles.min.js', array( 'jquery' ), '1.0' );
	}

	function circle_stat_shortcode( $atts, $content = null, $shortcodename = '' ) {
		extract(shortcode_atts(
			array(
				'title'        => '',
				'text'         => '',
				'btn_text'     => __('Read more', CHERRY_PLUGIN_DOMAIN),
				'btn_link'     => '',
				'percent'	   => '',
				'custom_class' => ''
		), $atts));

		$random_ID          = uniqid();

		$output =  '<div class="circle-container '.$custom_class.' clearfix">';

		if ($percent!="") {
			$output .= "<script>
							jQuery(document).ready(function() {
								$('.circle').waypoint(function() {
									var myCircle = Circles.create({
										id:         'circles-". $random_ID ."',
										radius:     85,
										value:      ". $percent .",
										maxValue:   100,
										width:      10,
										text:       function(value){return value + '%';},
										colors:     ['#ffffff', '#23ba85'],
										duration:   400,
										wrpClass:   'circles-wrp',
										textClass:  'circles-text'
									});
								}, { offset: '100%', triggerOnce: true });
							});
						</script>";
			$output .= '<div class="circle" id="circles-'. $random_ID .'" percent='. $percent .'></div>';
		}

		$output .= '<div class="desc">';

		if ($title!="") {
			$output .= '<h1>';
			$output .= $title;
			$output .= '</h1>';
		}

		if ($text!="") {
			$output .= '<p>';
			$output .= $text;
			$output .= '</p>';
		}

		if ($btn_link!="") {
			$output .=  '<div class="btn-align"><a href="'.$btn_link.'" title="'.$btn_text.'" class="btn btn-'.$btn_style.' btn-'.$btn_size.' btn-primary" target="'.$target.'">';
			$output .= $btn_text;
			$output .= '</a></div>';
		}

		$output .= '</div>';

		$output .= '</div>';

		$output = apply_filters( 'cherry_plugin_shortcode_output', $output, $atts, $shortcodename );

		return $output;
	}
	add_shortcode('circle_stat', 'circle_stat_shortcode');

}
?>