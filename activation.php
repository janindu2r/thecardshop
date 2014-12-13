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

        <div style="padding: 3em">

<?php if($afterApproval) {
    $db = new DbCon();
    $activate = $db->runUpdateOneValue('account','verified = 1','MD5( reg_id ) = "'. $regCode . '"');

    if($activate)
        echo  'Your account has been approved. Please login <a href="/login.php">here</a>';
}

if($afterReg){
    if($valid == false)
        echo 'Registration failed. Please register again or contact customer care';
    else
        echo 'Registration successful. Please login to your email account and activate your accout';
}

?>


 </div>

<!-- -------------------------------------- End of page edits -------------------------------------------------- -->
<?php include('footer.php'); //including the footer?>
<!-- End of page