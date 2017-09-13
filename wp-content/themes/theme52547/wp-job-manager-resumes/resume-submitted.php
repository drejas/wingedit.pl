<p class="submited-form">
<?php
switch ( $resume->post_status ) :
	case 'publish' :
		printf( __( 'Resume created successfully. To view your resume <a href="%s">click here</a>.', 'wp-job-manager-resumes' ), get_permalink( $resume->ID ) );
	break;
	case 'pending' :
		printf( __( 'Resume created successfully. Your resume will be visible once approved.', 'wp-job-manager-resumes' ), get_permalink( $resume->ID ) );
	break;
	default :
		do_action( 'resume_manager_resume_submitted_content_' . str_replace( '-', '_', sanitize_title( $resume->post_status ) ), $resume );
	break;
endswitch;
?></p>
<?php 