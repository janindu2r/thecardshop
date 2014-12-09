<html>
<head>
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

<body>
    <div id="container">
    <h2 style='color:#777777'>Comercio Comment System</h2><br/>

    <div id="success_msg">
        <?php include('scripts/comments_load.php');?>
    </div>

    <form action="#" method="POST">
        
        <h2>Review your product :</h2><br/>
        <div><textarea name="name" placeholder="Awaiting your comment...." id="comment"></textarea></div>
            
        <div><input type="submit" class="btn" value="Comment" id="comment_submit"></div>

    </form>

    </div>

</body>

</html>