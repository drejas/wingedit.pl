jQuery(document).ready(function(jQuery) {
	//btn-from-top, btn-from-bottom, btn-from-left, btn-from-right, btn-from-center-vertical, btn-from-center-horizontal, btn-to-center-vertical, btn-to-center-horizontal, btn-from-center-in-sides, btn-only-text-line-from-left, btn-only-text-two-lines-from-left
	var btn_hover = 'btn-from-left';

	jQuery("a.btn-primary, a.btn-default, .reply a").each(function(){
		var btn_html = jQuery(this).html();
		var btn_text = jQuery(this).text();
		jQuery(this).addClass(btn_hover).empty().append('<span data-hover="'+btn_text+'">'+btn_html+'</span>');
	});

});
