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