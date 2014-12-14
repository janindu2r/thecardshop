<!-- add session initiation and other similar necessary php stuff below -->
<?php
include('overhead.php');
$title = 'Activate Shop' ;  // page title

if($user->shop)



?>
<!---------------------------------------- Header Start, Do not touch ------------------------------------------->
<!DOCTYPE html>
<html>
	<head>
		<style>
			.form-control { margin-bottom: 10px; }
		</style>

        <?php include('header.php'); ?>

        <script>
            function funcValidate() {
                if (document.regShop.sname.value.length == 0) {
                    alert("please enter a shop name");
                    return false;
                }
                else if (document.regShop.sname.value.length > 30) {
                    alert("please enter a shop name with less than 30 characters");
                    return false;
                }
                else if (document.regShop.descr.value.length == 0) {
                    alert("please enter a shop description");
                    return false;
                }
                else if (document.regShop.city.selectedIndex == 0) {

                    alert("please select a location");
                    return false;
                }
                else if (document.regShop.category.selectedIndex == 0) {

                    alert("please select a category");
                    return false;
                }
                else if (document.regShop.payment.value.length == 0) {
                    alert("please enter a payment method");
                    return false;
                }
            }
        </script>

<!---------------------------------------- Add Page Edits Below ------------------------------------------------->    
<!-- -->
<div class="RegWrapper" id="SignUpWrapper">
<div class="container">

    <div class="row">

        <div class="col-xs-12 col-sm-12 col-md-6 well well-sm col-md-offset-3" id="signUpFormContainer">
            <legend><i class="glyphicon glyphicon-globe"></i> Activate your Shop!</legend>
            <form action="scripts/shop.php" method="post" class="form" role="form" name ="regShop" onsubmit="return funcValidate();">
            
            <input class="form-control" name="sname" placeholder="Shop Name" type="text" />
            <textarea class="form-control" rows="3" name="descr" placeholder="Shop Description"></textarea>
            <label for="">
                Location</label>
            <div class="row">
                <div class="col-xs-4 col-md-8">
                    <select class="form-control" name="city">
                        <option value="City" selected disabled>City</option>
                        <option value="CMB">Colombo</option>
                        <option value="GAL">Galle</option>
                        <option value="JAF">Jaffna</option>
                        <option value="ANU">Anuradhapura</option>
                        <option value="KAN">Kandy</option>
                        <option value="NEG">Negombo</option>
                        <option value="RAT">Ratnapura</option>
                    </select>
                </div>                
            </div>
            <br />
            <label for="">
                Category</label>
            <div class="row">
                <div class="col-xs-4 col-md-8">
                    <select class="form-control" name="category">
                        <option value="Category" selected disabled>Category</option>
                        <option value="00001">Electronics</option>
                        <option value="00002">Computers</option>
                        <option value="00003">Fashion</option>
                        <option value="00004">Jewellery</option>
                        <option value="00005">Mobile</option>
                        <option value="00006">Hardware</option>
                    </select>
                </div>                
            </div>
            <label><input class="character-checkbox" name="moneyback" type="checkbox" value="">   Money back guarantee available</label> <br/> <br/><br /><br />


            <legend><i class="glyphicon glyphicon-picture"></i> Theme your Shop</legend>
            <label for="#scheme">Choose your color theme</label> &nbsp;&nbsp;&nbsp;&nbsp; <input type="color" name="colorscheme" id="scheme"> <br/><br/><br/><br/>

            <legend><i class="glyphicon glyphicon-shopping-cart"></i> Add your Payment Details</legend>
            <input class="form-control" name="paypalemail" placeholder="Paypal Email" type="text" />
            <input class="form-control" name="paypaltoken" placeholder="Paypal Token" type="text" /><br/><br/><br/>

            <button class="btn btn-lg btn-primary btn-block" type="submit">
                Create Shop</button>
            </form>
        </div>
    </div>
</div>

<!--
shop activation form
<br>
<a href="shopdashboard.php">Activate and go to seller dash board</a>
<a href="viewshop.php">Activate and View your shop</a>
 -->
<!---------------------------------------- End of page edits ---------------------------------------------------->
<?php include('footer.php'); //including the footer?>
<!-- End of page -->