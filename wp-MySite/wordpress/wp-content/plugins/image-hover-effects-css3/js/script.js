jQuery(window).load(function($) {
	if (jQuery('.enablemasonry').length) {
		jQuery('.grid-pad').css('padding', '0');
		jQuery('.grid-pad').css('margin', '0');
		jQuery('.enablemasonry').masonry({
		  itemSelector: '.mason-item',
		  columnWidth: '.mason-item',
		});
	}
});
jQuery(document).ready(function($) {
	if($("a[rel^='prettyPhoto']").length){
		$("a[rel^='prettyPhoto']").prettyPhoto({
			social_tools      : false,
			horizontal_padding: 20,
			opacity           : 0.8,
			deeplinking       : false
		});
	}
});