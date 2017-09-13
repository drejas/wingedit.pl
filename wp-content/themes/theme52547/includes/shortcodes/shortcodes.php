<?php
//Recent Testimonials
if (!function_exists('shortcode_recenttesti')) {

	function shortcode_recenttesti( $atts, $content = null, $shortcodename = '' ) {
		extract(shortcode_atts(array(
				'num'           => '5',
				'thumb'         => 'true',
				'excerpt_count' => '30',
				'custom_class'  => '',
		), $atts));

		// WPML filter
		$suppress_filters = get_option('suppress_filters');

		$args = array(
				'post_type'        => 'testi',
				'numberposts'      => $num,
				'orderby'          => 'post_date',
				'suppress_filters' => $suppress_filters
			);
		$testi = get_posts($args);

		$itemcounter = 0;

		$output = '<div class="testimonials '.$custom_class.'">';

		global $post;
		global $my_string_limit_words;

		foreach ($testi as $k => $post) {
			//Check if WPML is activated
			if ( defined( 'ICL_SITEPRESS_VERSION' ) ) {
				global $sitepress;

				$post_lang = $sitepress->get_language_for_element($post->ID, 'post_testi');
				$curr_lang = $sitepress->get_current_language();
				// Unset not translated posts
				if ( $post_lang != $curr_lang ) {
					unset( $testi[$k] );
				}
				// Post ID is different in a second language Solution
				if ( function_exists( 'icl_object_id' ) ) {
					$post = get_post( icl_object_id( $post->ID, 'testi', true ) );
				}
			}
			setup_postdata( $post );
			$post_id = $post->ID;
			$excerpt = get_the_excerpt();

			// Get custom metabox value.
			$testiname  = get_post_meta( $post_id, 'my_testi_caption', true );
			$testiurl   = esc_url( get_post_meta( $post_id, 'my_testi_url', true ) );
			$testiinfo  = get_post_meta( $post_id, 'my_testi_info', true );
			$testiemail = sanitize_email( get_post_meta( $post_id, 'my_testi_email', true ) );

			$attachment_url = wp_get_attachment_image_src( get_post_thumbnail_id( $post_id ), 'full' );
			$url            = $attachment_url['0'];
			$image          = aq_resize($url, 240, 240, true);

			$output .= '<div class="testi-item list-item-'.$itemcounter.'">';
				$output .= '<blockquote class="testi-item_blockquote">';
					if ($thumb == 'true') {
						if ( has_post_thumbnail( $post_id ) ){
							$output .= '<figure class="featured-thumbnail">';
							$output .= '<img src="'.$image.'" alt="" />';
							$output .= '</figure>';
						}
					}
					$output .= '<div><a href="'.get_permalink( $post_id ).'">';
						$output .= wp_trim_words($excerpt,$excerpt_count);
					$output .= '</a><div class="clear"></div></div>';

				$output .= '</blockquote>';

				$output .= '<small class="testi-meta">';
					if ( !empty( $testiname ) ) {
						$output .= '<span class="user">';
							$output .= $testiname;
						$output .= '</span>';
					}


				$output .= '</small>';

			$output .= '</div>';
			$itemcounter++;

		}
		wp_reset_postdata(); // restore the global $post variable
		$output .= '</div>';

		$output = apply_filters( 'cherry_plugin_shortcode_output', $output, $atts, $shortcodename );

		return $output;
	}
	add_shortcode('recenttesti', 'shortcode_recenttesti');

}

if (!function_exists('address_shortcode')) {
	function address_shortcode( $atts, $content = null, $shortcodename = '' ) {
		extract(shortcode_atts(array(
				'align'           => 'left',
		), $atts));

		$output = '<address class="'.$align.'">';
		$output .= do_shortcode($content);
		$output .= '</address><!-- address (end) -->';

		$output = apply_filters( 'cherry_plugin_shortcode_output', $output, $atts, $shortcodename );

		return $output;
	}
	add_shortcode('address', 'address_shortcode');
}

?>