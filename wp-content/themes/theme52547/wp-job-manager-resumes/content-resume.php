<?php $category = get_the_resume_category(); ?>
<li <?php resume_class(); ?>>
	<a href="<?php the_resume_permalink(); ?>">
		<div class="col_1">
			<?php the_candidate_photo('job-company-thumb'); ?>
		</div>
		<div class="col_2">
			<div class="candidate-column">
				<h3><?php the_candidate_title(); ?></h3>
				<div class="candidate-title">
					<?php the_title( '<strong>', '</strong> '); ?>
				</div>
			</div>
		</div>
		<div class="col_3">
			<div class="candidate-location-column">
				<?php the_candidate_location( false ); ?>
			</div>
		</div>		
		<div class="col_4">
			<div class="resume-posted-column <?php if ( $category ) : ?>resume-meta<?php endif; ?>">
				<?php if ( $category ) : ?>
					<div class="resume-category <?php echo sanitize_title($category); ?>">
						<?php echo $category ?>
					</div>
				<?php endif; ?>
				<?php if ( ( $skills = wp_get_object_terms( $post->ID, 'resume_skill', array( 'fields' => 'names' ) ) ) && is_array( $skills ) ) : ?>
					<ul class="skills">
						<?php 
							for ($i = 0; $i <= count($skills)-1; $i++)
							{
								if ($i == count($skills)-1) {
									echo "<li class='".sanitize_title($skills[$i])." last'>".$skills[$i]."</li>";
								} else {
									echo "<li class='".sanitize_title($skills[$i])."'>".$skills[$i]."</li>";
								}
							} 
						?>
					</ul>
				<?php endif; ?>
				<date><?php printf( __( 'Updated %s ago', 'wp-job-manager-resumes' ), human_time_diff( get_the_modified_time( 'U' ), current_time( 'timestamp' ) ) ); ?></date> 
			</div>
		</div>		
	</a>
</li>