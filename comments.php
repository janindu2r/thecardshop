<!-- <html>
<head>
<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
<link rel="stylesheet" type="text/css" href="css/comments.css">
<script type="text/javascript" src="js/jquery.min.js"></script>

<script type="text/javascript" >
    $(function() {
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
    url: "scripts/comments_save.php",
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

</script>

</head>

<body> -->
    
    
    

    <div class="row" style="margin-top:10px;">
    <div class="well well-sm">
        <div class="row" id="post-review-box" style=";">
            <div class="col-md-12">
                <form accept-charset="UTF-8" action="#" method="POST">
                    
                    <textarea class="form-control animated" cols="50" id="new-review" name="name" placeholder="Enter your review here..." rows="5"></textarea>
    
                    <div class="text-right">
                        <div class="stars starrr" data-rating="0"></div>
                        <a class="btn btn-danger btn-sm" href="#" id="close-review-box" style="display:none; margin-right: 10px;">
                        <span class="glyphicon glyphicon-remove"></span>Cancel</a>
                        <button class="btn btn-success media-body" style="margin-top:5px;" type="submit" id="comment_submit">Comment</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    </div>

    <div id="success_msg">
        <?php include('scripts/comments_load.php');?>
    </div>

    <!-- <form action="#" method="POST">
        
        <h2>Review your product :</h2><br/>
        <div><textarea name="name" placeholder="Awaiting your comment...." id="comment"></textarea></div>
            
        <div><input type="submit" class="btn" value="Comment" id="comment_submit"></div>

    </form> -->

    

<!-- </body>

</html> -->