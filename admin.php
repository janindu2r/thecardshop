<!-- add session initiation and other similar necessary php stuff below -->
<?php
include('/overhead.php');

$title = 'Administrator Dashboard' ;  // page title

if($logged != 1 && $user->shop != 1)
    header('location: /index.php');

$owner = new Seller($user->getRegID());
$owner->initiate();

$cat = new Category();
$categories =   $cat->getCategories();
$owner->getCategories();

$categ = "";
foreach($owner->categories as $key=> $val)
    $categ .= ' | '.$val;

$categ = substr($categ,3);

?>
<!-- **************************** Header Start, Do not touch **************************** -->
<!DOCTYPE html>
<html>
	<head>
        <?php include('/header.php'); ?>

        <script>
            function addCategory(){
                var val = document.getElementsByName('categories')[0].value;
                var cat = document.getElementsByName('category')[0].value;
                if(val != "")
                    cat = " | " + cat;
                document.getElementsByName('categories')[0].value = document.getElementsByName('categories')[0].value + cat;
            }
        </script>

<!-- *****************************    Add Page Edits Below   **************************** -->    
<div class="container" id="dasboard-page-body">
    <div class="row">
        <div class="col-md-2">
            <ul class="nav nav-pills nav-stacked admin-menu">
                <li class="active"><a href="#" data-target-id="home"><i class="fa fa-user fa-fw"></i>Account</a></li>
                <li><a href="#" data-target-id="products"><i class="fa fa-dropbox fa-fw"></i>Add Products</a></li>
                <li><a href="#" data-target-id="charts"><i class="fa fa-shopping-cart fa-fw"></i>All Products</a></li>
                <li><a href="#" data-target-id="pages"><i class="fa fa-table fa-fw"></i>Order History</a></li>
                <li><a href="#" data-target-id="table"><i class="fa fa-history fa-fw"></i>Go To Shop</a></li>
                <!-- <li><a href="#" data-target-id="forms"><i class="fa fa-tasks fa-fw"></i>Forms</a></li>
                <li><a href="#" data-target-id="calender"><i class="fa fa-calendar fa-fw"></i>Calender</a></li>
                <li><a href="#" data-target-id="library"><i class="fa fa-book fa-fw"></i>Library</a></li>
                <li><a href="#" data-target-id="applications"><i class="fa fa-pencil fa-fw"></i>Applications</a></li>
                <li><a href="#" data-target-id="settings"><i class="fa fa-cogs fa-fw"></i>Settings</a></li> -->
            </ul>
        </div>
        <div class="col-md-9  admin-content" id="home">

            <?php if ($_GET) { if(isset($_GET['success'])) { ?>
        	    <div class="alert alert-info">
                	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">
                    	×</button>
                	<span class="glyphicon glyphicon-info-sign"></span> <strong>Welcome Admin</strong>
            	</div>
            <?php }} ?>
            <div class="col-md-6">
                <div class="panel panel-default"><!-- Contact Details -->
                    <div class="panel-heading">
                        Shop Details
                    </div>
                    
                    <div class="panel-body">
                    <div class="form-group">
                        <label for="UserName">Shop Name</label>
                        <input type="text" class="form-control" id="" value="<?php echo $owner->shopName ?>" placeholder="Shop john26769">
                    </div>
                    <div class="form-group">
                        <label for="UserName">Shop Description</label>
                        <textarea class="form-control" id="descr" name="descr"><?php echo $owner->shopDesc ?></textarea>

                    </div>

                        <div class="form-group">
                            <label for="">Location</label>
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

                    <div class="form-group">
                       <label class="control-label" for="selectbasic">Categories</label>
						  <div class="form-group col-xs-6 col-md-10">
                              <div class="col-xs-4 col-md-8">
                                  <select class="form-control" name="category">
                                      <option value="" selected disabled>Category</option>
                                      <?php
                                      if($categories){
                                          foreach($categories as $row)
                                              echo "<option value=". $row['category_name'] .">". $row['category_name'] ."</option>";
                                      }
                                      ?>
                                  </select>
                              </div>
                              <div class="col-xs-2 col-md-2"> <button type="button" onclick="addCategory()">Add</button> </div>
                        </div>
                    </div>

                        <div class="form-group">
                        <div class="">
                            <textarea class="form-control" rows="2" name="categories" placeholder="Add your categories below"><?php echo $categ; ?></textarea>
                        </div>
                            </div>



                        <input type="submit" class=" btn btn-primary btn-success" id="exampleSubmit" value="Add">
                        <input type="reset" class=" btn btn-primary btn-danger" id="exampleSubmit" value="Discard">
                  <!--  <div class="form-group pull-right">
                        <a href="#" class="btn btn-primary btn-success"><span class="glyphicon glyphicon-floppy-disk"></span> Save</a>
                        <a href="#" class="btn btn-primary btn-danger"><span class="glyphicon glyphicon-remove"></span> Discard</a>
                    </div>-->
                </div>
                </div><!-- /.Contact Details --> 
            </div>
            <div class="col-md-6">

                <div class="panel panel-default"><!-- Contact Details -->
                    <div class="panel-heading">
                        Shop Theme
                    </div>

                    <div class="panel-body">
                        <div class="form-group">
                            <label for="">Upload Logo(JPG)</label>
                                <input type="file" name="shoplogo">
                        </div>

                        <div class="form-group">
                            <label for="">Upload Banner Images</label>
                                <input type="file" name="banner[0]">
                                <input type="file" name="banner[1]">
                        </div>

                    <div class="form-group pull-right">
                        <input type="submit" class=" btn btn-primary btn-success" id="exampleSubmit" value="Save">
                    </div>
                </div>
                </div><!-- /.Contact Details -->



                <div class="panel panel-default"><!-- Contact Details -->
                    <div class="panel-heading">
                        Payment Details
                    </div>

                    <div class="panel-body">
                    <div class="form-group">
                        <label for="">Paypal Email</label>
                        <input type="email" class="form-control" id="" placeholder="Paypal Email">
                    </div>
                    <div class="form-group">
                        <label for="">Paypal Token (Optional)</label>
                        <input type="text" class="form-control" id="" placeholder="Paypal Token">
                    </div>

                    <div class="form-group pull-right">
                        <input type="submit" class=" btn btn-primary btn-success" id="exampleSubmit" value="Save">
                       <!-- <a href="#" class="btn btn-primary btn-success"><span class="glyphicon glyphicon-floppy-disk"></span> Save</a>-->
                    </div>
                </div>
                </div><!-- /.Contact Details --> 
            </div>
            

        </div>
        <div class="col-md-6 admin-content" id="products">
        	<div class="panel panel-default">
        		<div class="panel-heading">
        			Add a product
        		</div>
        		<div class="panel-body">
		                    <div class="panel-body">
			                    <div class="form-group">
                                
<<<<<<< HEAD
                                <form name="addproduct" method="POST" action= "/scripts/addtoproduct.php " enctype="multipart/form-data" onclick="return validateShopForm();">
			                        <label for="#">Product Name</label>
			                        <input type="text" name = "pro_name" class="form-control" id="" placeholder="Shop Name">
=======
                            <form name="addproduct" method="POST" action= "/scripts/addtoproduct.php " enctype="multipart/form-data"  onsubmit="return validateShopForm();">

                                <div class="form-group">
                                    <label for="#">Product Name</label>
			                        <input type="text" name = "pro_name" class="form-control" id="" placeholder="Shop john26769">
>>>>>>> 9bfeed5baef57fdf3bace4b1d0fcc52148ab3e20
			                    </div>
			                    <div class="form-group">
			                        <label for="#">Price</label>
			                        <input type="number" name = "pro_price" class="form-control" id="exampleInputtext1" placeholder="Enter item price ">
			                    </div>
			                    <div class="form-group">
			                        <label for="#">Product Tags</label>
			                        <input type="text" name = "pro_tag" class="form-control" id="exampleInputtext1" placeholder="Enter product tags">
			                    </div>
			                    <div class="form-group">
			                        <label for="#">Category</label>
                                    
			                      <!-- <input type="text" class="form-control" id="exampleInputtext1" placeholder="john26769">-->
                                  
                                    <select id="catId" name="category" class="form-control">
						      <option value="0">Select Category</option>
                                        <?php if($owner->categories) {
                                            foreach ($owner->categories as $key => $val) { ?>
                                                <option value="<?php echo $key; ?>"><?php echo $val;?></option>
                                            <?php }
                                        } ?>
						    </select>
			                    </div>
			                    <div class="form-group">
			                       <label class=" control-label" for="radios">Variations </label>
									  <div class=""> 
									    <label class="radio-inline" for="radios-0">
									      <input type="radio" name="var" id="radios-0" value="1" >
									      Yes
									    </label> 
									    <label class="radio-inline" for="radios-1">
									      <input type="radio" name="var" id="radios-1" value="0">
									      No
									    </label>
                                    </div>
			                    </div>
			                    <div class="form-group">
			                       <label class="control-label" for="radios">Virtual </label>
									  <div class=""> 
									    <label class="radio-inline" for="radios-0">
									      <input type="radio" name="vir" id="radios-0" value="1" checked = "checked" >
									      Yes
									    </label> 
									    <label class="radio-inline" for="radios-1">
									      <input type="radio" name="vir" id="radios-1" value="0">
									      No
									    </label>
									  </div>
			                    </div>
			                    <div class="form-group">
			                        <label for="#">Product description</label>
			                        <textarea class="form-control" id="textarea" name="description" placeholder="Add the product description here"></textarea>
			                    </div>
			                    <div class="form-group">
			                        <label for="#">Selling Unit</label>
			                        <input type="text" name = "sel_unit" class="form-control" id="exampleInputtext1" placeholder="No of items in one package/shipment">
			                    </div>
			                    <!--<div class="form-group">
			                        <label for="#">Initial Stock</label>
			                        <input type="number" class="form-control" id="exampleInputtext1" placeholder="john26769">
			                    </div>-->
			                    <div class="form-group">
			                        <label for="#">Stock</label>
			                        <input type="number" name = "stock" class="form-control" id="exampleInputEmail1" placeholder="Add the stock amount of product">
			                    </div>
			                    <div class="form-group">
			                        <label class="control-label" for="fileUpload">Upload Thumbnail Image</label>
									  <div class="#">
									    <input id="fileUpload" name="prodimg" class="input-file" type="file">
                                      </div>
			                    </div>
			                    <div class="form-group">
                                    <input type="submit"  class=" btn btn-primary btn-success" id="exampleSubmit" value="Add">
                                    <input type="reset" class=" btn btn-primary btn-danger" id="exampleSubmit" value="Discard">
			                        <!--  <a href="#" class="btn btn-primary btn-success"><span class="glyphicon glyphicon-floppy-disk"></span> Add</a>
			                        <a href="#" class="btn btn-primary btn-danger"><span class="glyphicon glyphicon-remove"></span>Discard</a> -->
			                    </div>

                                </form>
					    	</div>
					    </div>


					
        		</div>
        	</div>
        </div>

        <div class="col-md-10 admin-content" id="pages" style="min-height:450px;">
            <h4>Orders Recieved</h4><br>
            <div class="row">

                <div class="col-md-12">

                    <div class="table-responsive">

                        <table id="mytable" class="table table-bordred table-striped">

                            <thead>
                            <th>Order</th>
                            <th>Product</th>
                            <th>Quantity</th>
                            <th class="text-right">Total</th>
                            <th class="text-right">Shipping</th>
                            <th>Billing Address</th>
                            <th>Shipping Address</th>
                            <th>Ship Item</th>
                            </thead>
                            <tbody>

                            <?php
                            $list = $owner->getAllOrderItems();
                            if($list) {
                                foreach ($list as $row) {
                                    $ord = new Order();
                                    $ord->getSimpleDetails($row['order_id']);
                                    $buyer = new User();
                                    $buyer->makeUser($ord->userId);
                                    ?>
                                    <tr>
                                        <td><?php echo $row['order_id'] ?></a></td>
                                        <td>
                                            <?php echo $row['product_title'] ?> <br>
                                           <span style="color: #555555; font-size: 0.8em"><?php echo $row['product_id'] ?></span>
                                        </td>
                                        <td><?php echo $row['quantity'] ?> </td>
                                        <td class="text-right"><?php echo $row['items_tot'] ?> $</td>
                                        <td class="text-right"><?php echo $row['shipping_tot'] ?> $</td>
                                        <td>
                                            <address style="font-size: 0.8em;">
                                                <?php echo $ord->getFullName() .'<br>'. $ord->billingAd[1] .'<br>'. $ord->billingAd[2] .'<br>'. $ord->billingAd[3] .'<br>'. $ord->billingAd[4]; ?>
                                            </address>
                                        </td>
                                        <td>
                                            <address style="font-size: 0.8em;">
                                            <?php echo $ord->shippingAd[0] .'<br>'. $ord->shippingAd[1] .'<br>'. $ord->shippingAd[2] .'<br>'. $ord->shippingAd[3] .'<br>'. $ord->shippingAd[4]; ?>
                                            </address>
                                        </td>
                                        <td><p><button class="btn btn-primary btn-xs" data-title="Edit" data-toggle="modal" data-target="#edit" ><span class="glyphicon glyphicon-pencil"></span></button></p>
                                        </td>
                                    </tr>

                                <?php }
                            } else {
                                echo "<tr></trd><td colspan='8' align='center'>No New Orders</td></tr>";
                            }?>

                            </tbody>

                        </table>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>

        </div>
        <div class="col-md-10 admin-content" id="charts" style="min-height:450px;">
        <!--script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script-->
<div class="container">
    <div class="row">
        
        
        <div class="col-md-12">
        <h4>Your Products</h4><br>
        <div class="table-responsive">
        <?php $flag = $owner->getFullProductList() ; ?>
                
              <table id="mytable" class="table table-bordred table-striped">
                   
                   <thead>
                   <th>Product Id</th>
                   <th>Product Title</th>
                   <th>Price</th>
                   <th>Current Stock</th>
                   <th>Date Added</th>
                   <th>Edit</th>
                   </thead>
    <tbody>

    <?php foreach($flag as $row) { ?>

    <tr>
    <td><?php echo $row['product_id'] ?></td>
    <td><?php echo $row['product_title'] ?></td></td>
    <td>$<?php echo $row['price'] ?></td></td>
    <td><?php echo $row['current_stck'] ?></td>
    <td><?php echo $row['date_added'] ?></td>
    <td><p><a class="btn btn-primary btn-xs" data-title="Edit" href="/customizeproduct.php?product=<?php echo $row['product_id'] ?>"><span class="glyphicon glyphicon-pencil"></span></a</p></td>
    </tr>

    <?php } ?>

    </tbody>
        
</table>

<div class="clearfix"></div>
                
            </div>
            
        </div>
    </div>
</div>


<div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
      <div class="modal-dialog">
    <div class="modal-content">
          <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h4 class="modal-title custom_align" id="Heading">Edit Your Detail</h4>
      </div>
          <div class="modal-body">
          <div class="form-group">
        <input class="form-control " type="text" placeholder="Mohsin">
        </div>
        <div class="form-group">
        
        <input class="form-control " type="text" placeholder="Irshad">
        </div>
        <div class="form-group">
        <textarea rows="2" class="form-control" placeholder="CB 106/107 Street # 11 Wah Cantt Islamabad Pakistan"></textarea>
    
        
        </div>
      </div>
          <div class="modal-footer ">
        <button type="button" class="btn btn-warning btn-lg" style="width: 100%;"><span class="glyphicon glyphicon-ok-sign"></span> Update</button>
      </div>
        </div>
    <!-- /.modal-content --> 
  </div>
      <!-- /.modal-dialog --> 
    </div>
    
    
    
    <div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
      <div class="modal-dialog">
    <div class="modal-content">
          <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h4 class="modal-title custom_align" id="Heading">Delete this entry</h4>
      </div>
          <div class="modal-body">
       
       <div class="alert alert-warning"><span class="glyphicon glyphicon-warning-sign"></span> Are you sure you want to delete this Record?</div>
       
      </div>
        <div class="modal-footer ">
        <button type="button" class="btn btn-success" ><span class="glyphicon glyphicon-ok-sign"></span> Yes</button>
        <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> No</button>
      </div>
        </div>
    <!-- /.modal-content --> 
  </div>
      <!-- /.modal-dialog --> 
    </div>
        </div>

        <div class="col-md-7 admin-content" id="table" style="min-height:450px;">

            <div class="panel panel-default">
                <div class="panel-heading">
                    Visit your shop
                </div>
                <div class="panel-body">
                    <a href="/viewshop.php?shop=<?php echo $user->getRegID() ?>" class="btn btn-lg btn-info"><span class="glyphicon glyphicon-file "></span> View Shop Home Page</a>
                    <a href="/viewproductlist.php?shop=<?php echo $user->getRegID() ?>" class="btn btn-lg btn-info"><span class="glyphicon glyphicon-briefcase"></span> View Product Showcase</a>
                </div>
            </div>
        </div>


        <!-- <div class="col-md-9 admin-content" id="table">
            Table
        </div>
        <div class="col-md-9 admin-content" id="forms">
            Forms
        </div>
        <div class="col-md-9 admin-content" id="calender">
            Calender
        </div>
        <div class="col-md-9 admin-content" id="library">
            Library
        </div>
        <div class="col-md-9 admin-content" id="applications">
            Applications
        </div>
        <div class="col-md-9 admin-content" id="settings">
            Settings
        </div> -->
    </div>
</div>
<!-- //////JavaScript for browsing tab pages////// -->
<script type="text/javascript">
    $(document).ready(function()
{
    var navItems = $('.admin-menu li > a');
    var navListItems = $('.admin-menu li');
    var allWells = $('.admin-content');
    var allWellsExceptFirst = $('.admin-content:not(:first)');
    
    allWellsExceptFirst.hide();
    navItems.click(function(e)
    {
        e.preventDefault();
        navListItems.removeClass('active');
        $(this).closest('li').addClass('active');
        
        allWells.hide();
        var target = $(this).attr('data-target-id');
        $('#' + target).show();
    });

});
</script>


<!-- *****************************      End of page edits 	 **************************** -->
<?php include('footer.php'); //including the footer?>
<!-- End of page