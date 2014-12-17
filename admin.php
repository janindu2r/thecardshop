<!-- add session initiation and other similar necessary php stuff below -->
<?php
include('/overhead.php');

$title = 'Administrator Dashboard' ;  // page title

if(!$_SESSION)
    header('location: /index.php');

$owner = new Seller($user->getRegID());
$owner->initiate();


?>
<!-- **************************** Header Start, Do not touch **************************** -->
<!DOCTYPE html>
<html>
	<head>
        <?php include('/header.php'); ?>

        <!-- Javascript Form Validation -->
        <script>
            function validateShopForm() {

                if (document.addproduct.pro_name.value.length == 0) {
                    alert("please enter the product name");
                }
                else if (document.addproduct.pro_name.value.length > 25) {
                    alert("use a name with less than 25 characters");
                }
                else if (document.addproduct.pro_price.value == 0) {
                    alert("please enter the price");
                }
                else if (document.addproduct.pro_tag.value.length > 50) {
                    alert("please enter a product tag which has less than 50 characters");
                }
                else if (document.addproduct.category.selectedIndex == 0) {
                    alert("please select the category Id");
                }
                else if (!(document.addproduct.var[0].checked || document.addproduct.var[1].checked)) {
                    alert("please select a button for variations");
                }
                else if (document.addproduct.description.value.length == 0) {
                    alert("please enter a product description");
                }
                else if (document.addproduct.sel_unit.value == 0) {
                    alert("please enter selling unit");
                }
                else if (document.addproduct.stock.value == 0) {
                    alert("please enter stock");
                }
            }
        </script>

<!-- *****************************    Add Page Edits Below   **************************** -->    
<div class="container" id="dasboard-page-body">
    <div class="row">
        <div class="col-md-2">
            <ul class="nav nav-pills nav-stacked admin-menu">
                <li class="active"><a href="#" data-target-id="home"><i class="fa fa-user fa-fw"></i>Account</a></li>
                <li><a href="#" data-target-id="products"><i class="fa fa-dropbox fa-fw"></i>Add Products</a></li>
                <li><a href="#" data-target-id="charts"><i class="fa fa-table fa-fw"></i>All Products</a></li>
                <li><a href="#" data-target-id="pages"><i class="fa fa-history fa-fw"></i>Order History</a></li>
                
                <li><a href="#" data-target-id="table"><i class="fa fa-shopping-cart fa-fw"></i>Go To Shop</a></li>
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
                        <input type="text" class="form-control" id="" placeholder="Shop john26769">
                    </div>
                    <div class="form-group">
                        <label for="UserName">Shop Description</label>
                        <textarea class="form-control" id="descr" name="descr"></textarea>
                    </div>
                    <div class="form-group">
                       <label class="control-label" for="selectbasic">Select</label>
						  <div class="">
						    <select id="selectbasic" name="selectbasic" class="form-control">
						      <option value="1">Option one</option>
						      <option value="2">Option two</option>
						    </select>
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
                        Account Details
                    </div>
                    
                    <div class="panel-body">
                    <div class="form-group">
                        <label for="UserName">User Name</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" placeholder="john26769">
                    </div>
                    <div class="form-group">
                        <label for="UserName">Email</label>
                        <input type="email" class="form-control" id="exampleInputEmail1" placeholder="john@abc.com">
                    </div>
                        <input type="submit" class=" btn btn-primary btn-success" id="exampleSubmit" value="Save">
                    <div class="form-group pull-right">
                        <a href="#" class="btn btn-primary btn-success"><span class="glyphicon glyphicon-floppy-disk"></span> Save</a>
                    </div>
                </div>
                </div><!-- /.Contact Details -->
                <div class="panel panel-default"><!-- Contact Details -->
                    <div class="panel-heading">
                        Password
                    </div>

                    <div class="panel-body">
                    <div class="form-group">
                        <label for="UserName">Current Password</label>
                        <input type="password" class="form-control" id="" placeholder="***********">
                    </div>
                    <div class="form-group">
                        <label for="UserName">New Password</label>
                        <input type="password" class="form-control" id="" placeholder="***********">
                    </div>
                        <input type="submit" class=" btn btn-primary btn-success" id="exampleSubmit" value="save">
                    <div class="form-group pull-right">
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
                                
                                <form name="addproduct" method="POST" action= "/scripts/addtoproduct.php " enctype="multipart/form-data" onclick="return validateShopForm();">
			                        <label for="#">Product Name</label>
			                        <input type="text" name = "pro_name" class="form-control" id="" placeholder="Shop john26769">
			                    </div>
			                    <div class="form-group">
			                        <label for="#">Price</label>
			                        <input type="number" name = "pro_price" class="form-control" id="exampleInputtext1" placeholder="john26769">
			                    </div>
			                    <div class="form-group">
			                        <label for="#">Product Tags</label>
			                        <input type="text" name = "pro_tag" class="form-control" id="exampleInputtext1" placeholder="john26769">
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
			                       <label class=" control-label" for="radios">Virtual </label>
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
			                        <textarea class="form-control" id="textarea" name="description"></textarea>
			                    </div>
			                    <div class="form-group">
			                        <label for="#">Selling Unit</label>
			                        <input type="text" name = "sel_unit" class="form-control" id="exampleInputtext1" placeholder="john26769">
			                    </div>
			                    <!--<div class="form-group">
			                        <label for="#">Initial Stock</label>
			                        <input type="number" class="form-control" id="exampleInputtext1" placeholder="john26769">
			                    </div>-->
			                    <div class="form-group">
			                        <label for="#">Stock</label>
			                        <input type="number" name = "stock" class="form-control" id="exampleInputEmail1" placeholder="john26769">
			                    </div>
			                    <div class="form-group">
			                        <label class="control-label" for="fileUpload">Upload Image</label>
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
					    	</div>
					    </div>


					
        		</div>
        	</div>
        </div>


        <div class="col-md-8 admin-content" id="pages">
            Pages
        </div>
        <div class="col-md-10 admin-content" id="charts">
        <!--script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script-->
<div class="container">
    <div class="row">
        
        
        <div class="col-md-12">
        <h4>Your Products</h4>
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

        <div class="col-md-7 admin-content" id="table">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Visit your shop
                </div>
                <div class="panel-body">
                    <a href="/viewshop.php?shop=<?php echo $user->getRegID() ?>" class="btn btn-lg btn-info"><span class="glyphicon glyphicon-bullhorn"></span>View Shop Home Page</a>
                    <a href="/viewproductlist.php?shop=<?php echo $user->getRegID() ?>" class="btn btn-lg btn-info"><span class="glyphicon glyphicon-bullhorn"></span>View Product Showcase</a>
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