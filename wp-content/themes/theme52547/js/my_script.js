jQuery(document).ready(function() {
	jQuery(window).resize(
		function(){
			if(!jQuery('body').hasClass('cherry-fixed-layout')) {
				jQuery('.full-width-block').width(jQuery(window).width());
				jQuery('.full-width-block').css({width: jQuery(window).width(), "margin-left": (jQuery(window).width()/-2), left: "50%"});
			};
		}
	).trigger('resize');
	
	var header_height = jQuery('.nav-wrap').outerHeight() + jQuery('#wpadminbar').outerHeight();
	jQuery('.main-holder.stuck .hashAncor').css('top', '-'+header_height*1.3+'px');

	jQuery(window).scroll(function() {
		var header_height = jQuery('.nav-wrap').outerHeight() + jQuery('#wpadminbar').outerHeight();
		jQuery('.main-holder.stuck .hashAncor').css('top', '-'+header_height*1.3+'px');
	});

	if( jQuery("html").hasClass("ie8") || jQuery("html").hasClass("ie9") ) {
		jQuery(function(){
			jQuery('input, textarea').placeholder();
		});
	}
	jQuery('.job-manager-error').remove().clone().prependTo('.job-manager-form');

	jQuery('.job_types input').styler();
	jQuery('#job_type').styler();
})
