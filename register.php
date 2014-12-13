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


$title = 'Sign Up' ;  // page title	
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
            <legend><i class="glyphicon glyphicon-globe"></i> Sign up!</legend>
            <form action="scripts/register.php" method="post" class="form" role="form">
            <div class="row">
                <div class="col-xs-6 col-md-6">
                    <input class="form-control" name="firstname" placeholder="First Name" type="text"
                        required autofocus />
                </div>
                <div class="col-xs-6 col-md-6">
                    <input class="form-control" name="lastname" placeholder="Last Name" type="text" required />
                </div>
            </div>
            <div class="row">
                <div class="col-xs-11 col-md-11">
                    <input class="form-control" id="username" name="uname" placeholder="Username" type="text" />
                </div>
                <div class="col-xs-1 col-md-1">
                    <img id="usernamemsg" src="">
                </div>
            </div>
            <div class="row">
                <div class="col-xs-11 col-md-11">
                    <input class="form-control" id="usermail" name="email" placeholder="Your Email" type="email" />
                </div>
                <div class="col-xs-1 col-md-1">
                    <img id="usermailmsg" src="">
                </div>
            </div>
            <div class="row">
                <div class="col-xs-11 col-md-11">
                    <input class="form-control" id="checkmail" name="reenteremail" placeholder="Re-enter Email" type="email" />
                </div>
                <div class="col-xs-1 col-md-1">
                    <img id="checkmailmsg" src="">
                </div>
            </div>
            <div class="row">
                <div class="col-xs-11 col-md-11">
                    <input class="form-control" name="password" placeholder="Password" type="password" />
                </div>
                <div class="col-xs-1 col-md-1">
                    <img id="" src="">
                </div>
            </div>
            <div class="row">
                <div class="col-xs-11 col-md-11">
                    <input class="form-control" id="checkpass" name="repassword" placeholder="Re-enter Password" type="password" />
                </div>
                <div class="col-xs-1 col-md-1">
                    <img id="checkpassmsg" src="">
                </div>
            </div>
                <label for="">
                Birth Date</label>
            <div class="row">
                <div class="col-xs-4 col-md-4">
                    <select class="form-control" name="month">
                        <option value="">Month</option>
                        <option value="01">January</option>
                        <option value="02">February</option>
                    </select>
                </div>
                <div class="col-xs-4 col-md-4">
                    <select class="form-control" name="day">
                        <option value="">Day</option>
                        <option value="01">01</option>
                        <option value="01">02</option>
                        <option value="01">03</option>
                        <option value="01">04</option>
                    </select>
                </div>
                <div class="col-xs-4 col-md-4">
                    <select class="form-control" name="year">
                        <option value="">Year</option>
                        <option value="1990">1990</option>
                        <option value="1991">1991</option>
                        <option value="1992">1992</option>
                    </select>
                </div>
            </div>
            <label class="radio-inline">
                <input type="radio" name="gender" id="inlineCheckbox1" value="M" />
                Male
            </label>
            <label class="radio-inline">
                <input type="radio" name="gender" id="inlineCheckbox2" value="F" />
                Female
            </label>
            <br /><br/>
            <input class="form-control" name="add1" placeholder="Address Line 1" type="text" />
            <input class="form-control" name="add2" placeholder="Address Line 2" type="text" />
            <input class="form-control" name="add3" placeholder="Address Line 3" type="text" />
            <input class="form-control" name="postal" placeholder="Postal Code" type="text" />
            <br />
            <label><input class="checkbox-inline" name="agree" type="checkbox" value="">   Agree to Terms & Conditions</label> <br/> <br/>
            <button class="btn btn-lg btn-primary btn-block" type="submit">
                Sign up</button>
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