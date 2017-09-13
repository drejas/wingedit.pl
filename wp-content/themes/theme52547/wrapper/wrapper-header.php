<?php /* Wrapper Name: Header */ ?>
<div class="hashAncor" id="homePage"></div>
<?php 

global $wp_query;
$page_id = $wp_query->get_queried_object_id();

$parallax = wp_get_attachment_image_src( get_post_thumbnail_id( $page_id ), 'full' );

if ( has_post_thumbnail( $page_id ) && (!is_single())) {
	$file_url = explode("/", $parallax[0]);
	$file_url = end($file_url);
	
	ob_start();
		include( 'header-content.php' );
		$text_to_be_wrapped_in_shortcode = ob_get_contents ();
	ob_end_clean();

	echo do_shortcode('[cherry_parallax image="'.$file_url.'" speed="normal" invert="false" custom_class="parallax-header"][row][span12]'.$text_to_be_wrapped_in_shortcode.'[/span12][/row][/cherry_parallax]');
} else { ?>
	<div class="nav-wrap">
		<div class="row">
			<div class="span4" data-motopress-type="static" data-motopress-static-file="static/static-logo.php">
				<?php get_template_part("static/static-logo"); ?>
			</div>
			<div class="span8" data-motopress-type="static" data-motopress-static-file="static/static-nav.php">
				<?php get_template_part("static/static-nav"); ?>
			</div>
		</div>
	</div>
	<?php if (!is_front_page()): ?>
		<div class="row">
			<div class="<?php echo cherry_get_layout_class( 'full_width_content' ); ?>" data-motopress-type="static" data-motopress-static-file="static/static-title.php">
				<?php get_template_part("static/static-title"); ?>
			</div>
		</div>
	<?php endif ?>
<?php } ?>