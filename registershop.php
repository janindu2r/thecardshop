<!-- add session initiation and other similar necessary php stuff below -->
<?php
include('overhead.php');
$title = 'Activate Shop' ;  // page title

if($user->shop)
    header('location: /admin.php');


$db = new DbCon();

$cat = new Category();
$categories =   $cat->getCategories();


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
            function addCategory(){
                var val = document.getElementsByName('categories')[0].value;
                var cat = document.getElementsByName('category')[0].value;
                if(val != "")
                    cat = " | " + cat;
                document.getElementsByName('categories')[0].value = document.getElementsByName('categories')[0].value + cat;
            }
        </script>

<!---------------------------------------- Add Page Edits Below ------------------------------------------------->    
<!-- -->
<div class="RegWrapper" id="SignUpWrapper">
<div class="container">

    <div class="row">

        <div class="col-xs-12 col-sm-12 col-md-6 well well-sm col-md-offset-3" id="signUpFormContainer">
            <legend><i class="glyphicon glyphicon-globe"></i> Activate your Shop!</legend>
            <form action="/scripts/shop.php" method="post" class="form" role="form" name ="regShop" enctype="multipart/form-data" onsubmit="return funcValidateShopReg()">
            
            <input class="form-control" name="sname" placeholder="Shop Name" type="text" />
            <textarea class="form-control" rows="3" name="descr" placeholder="Shop Description"></textarea>
            <label for="">
                Location</label>
            <div class="row">
                <div class="col-xs-4 col-md-8">
                    <select class="form-control" name="city">
                        <option value="City" selected disabled>City</option>
                        <option value="Colombo">Colombo</option>
                        <option value="Galle">Galle</option>
                        <option value="Jaffna">Jaffna</option>
                        <option value="Anuradhapura">Anuradhapura</option>
                        <option value="Kandy">Kandy</option>
                        <option value="Negombo">Negombo</option>
                        <option value="Ratnapura">Ratnapura</option>
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
                        <?php
                            if($categories){
                               foreach($categories as $row)
                                    echo "<option value=". $row['category_name'] .">". $row['category_name'] ."</option>";
                            }
                        ?>
                    </select>
                </div>
                    <div class="col-xs-2 col-md-2"> <button type="button" onclick="addCategory()">Add</button> </div>
                </div><div class="row">
                <div class="col-xs-6 col-md-10">
                    <textarea class="form-control" rows="2" name="categories" placeholder="Add your categories below"></textarea>
                </div>
            </div>
            <label><input class="character-checkbox" name="moneyback" type="checkbox" value="">   Money back guarantee available</label> <br/> <br/><br /><br />


            <legend><i class="glyphicon glyphicon-picture"></i> Theme your Shop</legend>

                <div class="row">
                <div class="col-xs-2 col-md-3">
                    Upload Logo(JPG)
                </div>
                <div class="col-xs-3 col-md-5">
                    <input type="file" name="shoplogo">
                </div>
                </div>
                <br>
                <br><br>
                <div class="row">
                    <div class="col-xs-2 col-md-3">
                        Upload Banner Images
                    </div>
                    <div class="col-xs-3 col-md-5">
                        <input type="file" name="banner[0]">
                    </div> </div>
                <div class="row">
                    <div class="col-xs-2 col-md-3">
                    </div>
                    <div class="col-xs-3 col-md-5">
                        <input type="file" name="banner[1]">
                    </div>
                </div>
                <br> <br> <br>


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