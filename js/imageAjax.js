/**
 * Ajax image upload script
 */

$(document).ready(function() {
	var f = $('form');
	var l = $('#loader'); // loder.gif image
	var b = $('#button'); // upload button
	var p = $('#preview'); // preview area

	b.click(function(){
		// implement with ajaxForm Plugin
		f.ajaxForm({
			beforeSend: function(){
				l.show();
				b.attr('disabled', 'disabled');
				p.fadeOut();
			},
			success: function(e){
				l.hide();
				f.resetForm();
				b.removeAttr('disabled');
				p.html(e).fadeIn();
			},
			error: function(e){
				b.removeAttr('disabled');
				p.html(e).fadeIn();
			}
		});
	});
});