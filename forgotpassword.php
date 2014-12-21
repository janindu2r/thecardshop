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
		<style> .form-control { margin-bottom: 10px; } </style>

        <?php include('header.php'); ?>

<!-- -------------------------------------- Add Page Edits Below ----------------------------------------------- -->
        <div class="container">
<div class="RegWrapper" id="SignUpWrapper"  style="min-height:500px;">

    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-6 well well-sm col-md-offset-3" id="signUpFormContainer">
            <legend><i class="glyphicon glyphicon-off"></i> Reset your Password</legend>
            <form action="/scripts/passwordrecovery.php" method="post" class="form" role="form" name="reset">
            <div class="row">
                <div class="col-xs-12 col-md-12">
                    <input class="form-control" id="usermail" name="rec_email" placeholder="me@example.com" type="email">
                </div>                
            </div>
            <button class="btn btn-lg btn-primary" type="submit"><span class="glyphicon glyphicon-ok-circle"></span> Reset</button>
            </form>
        </div>
    </div>
</div></div>

<!---------------------------------------- End of page edits ---------------------------------------------------->
<?php include('footer.php'); //including the footer?>
<!-- End of page