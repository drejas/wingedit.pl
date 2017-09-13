<?php 
if ( function_exists('pagination') ) :
	pagination( $wp_query->max_num_pages );
else :
	if ( $wp_query->max_num_pages > 1 ) : ?>
	<ul class="pager">
		<li class="previous">
			<?php echo "starsze" ?>
		</li><!--.older-->
		<li class="next">
			<?php echo "nowsze" ?>
		</li><!--.newer-->
	</ul><!--.oldernewer-->
	<?php endif;
endif; ?>
<!-- Posts navigation -->