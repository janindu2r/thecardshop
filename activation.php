<!-- add session initiation and other similar necessary php stuff below -->
<?php
include('overhead.php');
$title = 'Activate your profile'  ;  // page title
$afterReg = null;
$afterApproval = null;
$valid = null;

if($_GET)
{
    foreach($_GET as $key => $val){

        switch ($key) {
            case "success":
                $valid = $val;
                $afterReg = true;
                if ($val == true)
                    $regSuccess = true;
                else
                    $regSuccess = false;
                break;
            case "confirm";
                $regCode = $val;
                $afterApproval = true;
                break;

        }
    }
}
else
    header('location: /index.php');


?>
<!-- -------------------------------------- Header Start, Do not touch ----------------------------------------- -->
<!DOCTYPE html>
<html>
	<head>
        <?php include('header.php'); ?>
<!-- -------------------------------------- Add Page Edits Below ----------------------------------------------- -->    

        <div style="padding: 3em; min-height:500px;">

<?php if($afterApproval) {
    $db = new DbCon();
    $activate = $db->runUpdateOneValue('account','verified = 1','MD5( reg_id ) = "'. $regCode . '"');

    if($activate)
        echo  '<div class="alert alert-danger" role="alert">Your account has been approved. <hr>Please login <a href="/login.php">here</a></div>';
}

if($afterReg){
    if($valid == false)
        echo '<div class="alert alert-danger" role="alert">Registration failed. Please register again or contact customer care</div>';
    else
        echo '<div class="alert alert-success" role="alert">Registration successful. Please login to your email account and activate your accout</div>';
}

?>


 </div>

<!-- -------------------------------------- End of page edits -------------------------------------------------- -->
<?php include('footer.php'); //including the footer?>
<!-- End of page