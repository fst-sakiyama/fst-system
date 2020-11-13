(function($) {
    $.extend({
		nl2br: function nl2br(str) {
			    return str.replace(/[\n\r]/g, "<br />");
			}
	});
})(jQuery);
