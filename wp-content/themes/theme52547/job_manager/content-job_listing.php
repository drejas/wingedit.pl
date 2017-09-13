<?php 

$post_categories = wp_get_post_categories( $post->ID );
$cats = array();
	
foreach($post_categories as $c){
	$cat = get_category( $c );
	$cats[] = array( 'name' => $cat->name, 'slug' => $cat->slug );
}

 ?>

<li <?php job_listing_class(); ?> data-longitude="<?php echo esc_attr( $post->geolocation_lat ); ?>" data-latitude="<?php echo esc_attr( $post->geolocation_long ); ?>">
	<a href="<?php the_job_permalink(); ?>">
		<div class="col_2">
			<div class="position">
				<h3><?php the_title(); ?></h3>
				<div class="company">
					<?php the_company_name( '<strong>', '</strong> ' ); ?>
					<?php the_company_tagline( '<span class="tagline">', '</span>' ); ?>
				</div>
			</div>
		</div>		
		<div class="col_3">
			<div class="location">
				<?php the_job_location( false ); ?>
			</div>
		</div>		
		<div class="col_4">
			<ul class="meta">
				<li class="job-type <?php echo get_the_job_type() ? sanitize_title( get_the_job_type()->slug ) : ''; ?>"><?php // the_job_type(); ?>
					<?php if ( ( $job_types = wp_get_object_terms( $post->ID, 'job_listing_type', array( 'fields' => 'names' ) ) ) && is_array( $job_types ) ) : ?>
						<ul class="job-types">
							<?php 
								for ($i = 0; $i <= count($job_types)-1; $i++)
								{
									echo "<li class=".sanitize_title($job_types[$i]).">".$job_types[$i]."</li>";
								} 
							?>
						</ul>
					<?php endif; ?>
				</li>
				<li class="date"><date><?php printf( __( '%s temu', 'wp-job-manager' ), human_time_diff( get_post_time( 'U' ), current_time( 'timestamp' ) ) ); ?></date></li>
			</ul>
		</div>
	</a>
</li>