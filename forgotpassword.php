<?php

include('overhead.php');
$logged = 2;
if($_SESSION){
	header('location: /index.php');
}

if($_GET)
{
	if($_GET['error'])
	{
		if ($_GET['error'] = 1)
			echo '<script>alert("Please input valid data for registration!")</script>';
	}
}


$title = 'Password Recovery' ;  // page title	
?>
<!-- -------------------------------------- Header Start, Do not touch ----------------------------------------- -->
<!DOCTYPE html>
<html>
	<head>
		<style>
			.form-control { margin-bottom: 10px; }
		</style>

        <?php include('header.php'); ?>

<!-- -------------------------------------- Add Page Edits Below ----------------------------------------------- --> 

<div class="RegWrapper" id="SignUpWrapper">
<div class="container">

    <div class="row">

        <div class="col-xs-12 col-sm-12 col-md-6 well well-sm col-md-offset-3" id="signUpFormContainer">
            <legend><i class="glyphicon glyphicon-off"></i> Reset your Password</legend>
            <form action="scripts/passwordrecovery.php" method="post" class="form" role="form" name = "reset">
            <div class="row">
                <div class="col-xs-12 col-md-12">
                    <input class="form-control" id="usermail" name="email" placeholder=" me@example.com " type="email" required/>
                </div>                
            </div>                        
            
            <button class="btn btn-lg btn-primary" type="submit"><span class="glyphicon glyphicon-ok-circle"></span>
                Reset</button>
            </form>
        </div>
    </div>
</div>



    <script type="text/javascript">

        $(document).ready(function() {
            var successimg = "/img/bullets/valid.png";
            var failimg = "/img/bullets/invalid.png";

            $('#username').change(function () {
                var dataString = 'uname=' + this.value;
                $.ajax({
                    type: "POST",
                    url: "/scripts/unamecheck.php",
                    data: dataString,
                    cache: false,
                    success: function (result) {
                        var valid = parseInt(result);
                        if (valid == 1)
                            $("#usernamemsg").attr("src", successimg).fadeIn(40000);
                        else
                            $("#usernamemsg").attr("src", failimg).fadeIn(40000);
                    }
                });
            });

            $('#usermail').change(function () {
                var dataString = 'email=' + this.value ;
                $.ajax({
                    type: "POST",
                    url: "/scripts/unamecheck.php",
                    data: dataString,
                    cache: false,
                    success: function (result) {
                        var valid = parseInt(result);
                        if (valid == 1)
                            $("#usermailmsg").attr("src", successimg).fadeIn(40000);
                        else
                            $("#usermailmsg").attr("src", failimg).fadeIn(40000);
                    }
                });
            });



           $('#checkmail').change(function () {
               var newval = document.getElementsByName('email')[0].value;
               if (this.value.toString() == newval.toString())
                   $("#checkmailmsg").attr("src", successimg).fadeIn(40000);
               else if(this.value.toString() == "")
                   $("#checkmailmsg").attr("src", '').fadeIn(40000);
               else
                   $("#checkmailmsg").attr("src", failimg).fadeIn(40000);
            });


            $('#checkpass').change(function () {
                var newval = document.getElementsByName('password')[0].value;
                if (this.value.toString() == newval.toString())
                    $("#checkpassmsg").attr("src", successimg).fadeIn(40000);
                else if(this.value.toString() == "")
                    $("#checkpassmsg").attr("src", '').fadeIn(40000);
                else
                    $("#checkpassmsg").attr("src", failimg).fadeIn(40000);
            });

        });

    </script>


<!---------------------------------------- End of page edits ---------------------------------------------------->
<?php include('footer.php'); //including the footer?>
</div> <!-- end of the wrapper -->
<!-- End of page