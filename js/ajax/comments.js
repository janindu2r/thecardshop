$(document).ready(function() {
	$("#comment_submit").click(function () {
		var item = {};
		item['comment'] = $("#new-review").val();
		item['prod'] = $("#comment_product").val();
		if (item['comment'] == '') {
			alert('Please leave a comment');
		}
		else {
		$.ajax({
				type: "POST",
				url: "/scripts/comments_save.php",
				data: item,
				cache: false,
				success: function (html) {
					$("#new-review").val('');
					$("#success_msg").prepend(html);
				}
			});
		}
		return false;
	});
});
