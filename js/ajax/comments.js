$(document).ready(function() {
$("#comment_submit").click(function() 
		    {
		    var comment = $("#comment").val();

		    var dataString = 'comment='+ comment;
		    if(comment=='')
		    {
		    alert('Please leave a comment');
		    }
		    else
		    {
		    $.ajax({
		    type: "POST",
		    url: "/scripts/comments_save.php",
		    data: dataString,
		    cache: false,
		    success: function(html){
		    $("#comment").val('');
		    $("#success_msg").append(html);
		    }
		    });
		    }return false;
		    });    
});
