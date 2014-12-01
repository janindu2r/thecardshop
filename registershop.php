<!-- add session initiation and other similar necessary php stuff below -->
<?php

$title = 'Activate Shop' ;  // page title


?>
<!---------------------------------------- Header Start, Do not touch ------------------------------------------->
<!DOCTYPE html>
<html>
	<head>
        <?php include('header.php'); ?>
<!---------------------------------------- Add Page Edits Below ------------------------------------------------->    

<!-- -->
<div class="RegWrapper" id="SignUpWrapper">
<div class="container">

    <div class="row">

        <div class="col-xs-12 col-sm-12 col-md-6 well well-sm col-md-offset-3" id="signUpFormContainer">
            <legend><i class="glyphicon glyphicon-globe"></i> Sign up!</legend>
            <form action="scripts/reg.php" method="post" class="form" role="form">
            <div class="row">
                <div class="col-xs-6 col-md-6">
                    <input class="form-control" name="firstname" placeholder="First Name" type="text"
                        required autofocus />
                </div>
                <div class="col-xs-6 col-md-6">
                    <input class="form-control" name="lastname" placeholder="Last Name" type="text" required />
                </div>
            </div>
            <input class="form-control" name="uname" placeholder="Username" type="text" />
            <input class="form-control" name="email" placeholder="Your Email" type="email" />
            <input class="form-control" name="reenteremail" placeholder="Re-enter Email" type="email" />
            <input class="form-control" name="password" placeholder="Password" type="password" />
            <input class="form-control" name="repassword" placeholder="Re-enter Password" type="password" />
            <label for="">
                Birth Date</label>
            <div class="row">
                <div class="col-xs-4 col-md-4">
                    <select class="form-control" name="month">
                        <option value="Month">Month</option>
                        <option value="01">01</option>
                    </select>
                </div>
                <div class="col-xs-4 col-md-4">
                    <select class="form-control" name="day">
                        <option value="Day">Day</option>
                        <option value="01">01</option>
                    </select>
                </div>
                <div class="col-xs-4 col-md-4">
                    <select class="form-control" name="year">
                        <option value="Year">Year</option>
                        <option value="1990">1990</option>
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


shop activation form
<br>
<a href="shopdashboard.php">Activate and go to seller dash board</a>
<a href="viewshop.php">Activate and View your shop</a>
 

<!---------------------------------------- End of page edits ---------------------------------------------------->
<?php include('footer.php'); //including the footer?>
<!-- End of page -->