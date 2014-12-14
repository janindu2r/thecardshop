<!-- add session initiation and other similar necessary php stuff below -->
<?php
include('/overhead.php');

$title = 'Administrator Dashboard' ;  // page title

$owner = new Seller();
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
                <li><a href="#" data-target-id="products"><i class="fa fa-dropbox fa-fw"></i>Products</a></li>
                <li><a href="#" data-target-id="pages"><i class="fa fa-history fa-fw"></i>Order History</a></li>
                <li><a href="/shophome.php" data-target-id="charts"><i class="fa fa-bar-chart-o fa-fw"></i>View Products</a></li>
                <!-- <li><a href="#" data-target-id="table"><i class="fa fa-table fa-fw"></i>Table</a></li>
                <li><a href="#" data-target-id="forms"><i class="fa fa-tasks fa-fw"></i>Forms</a></li>
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
        <div class="col-md-9 admin-content" id="products">
        	<div class="panel panel-default">
        		<div class="panel-heading">
        			Products
        		</div>
        		<div class="panel-body">
        			<div role="tabpanel">

					  <!-- Nav tabs -->
					  <ul class="nav nav-tabs" role="tablist">
					    <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">Home</a></li>
					    <li role="presentation"><a href="#addProduct" aria-controls="addProduct" role="tab" data-toggle="tab">Add Product</a></li>
					    <!-- <li role="presentation"><a href="#messages" aria-controls="messages" role="tab" data-toggle="tab">Messages</a></li>
					    <li role="presentation"><a href="#settings" aria-controls="settings" role="tab" data-toggle="tab">Settings</a></li> -->
					  </ul>

					  <!-- Tab panes -->

					  <div class="tab-content col-md-6 col-md-offset-3">
					    <div role="tabpanel" class="tab-pane active" id="home">

                            Some content

					    </div>
					    <div role="tabpanel" class="tab-pane" id="addProduct">

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
			                        <label for="#">Product Tag</label>
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
					<!--    <div role="tabpanel" class="tab-pane" id="messages">...</div>
					    <div role="tabpanel" class="tab-pane" id="settings">...</div> -->
					  </div>

					</div>
        		</div>
        	</div></div>
            
        </div> <!-- /.end of widgets tab page -->

        <div class="col-md-8 admin-content" id="pages">
            Pages
        </div>
        <div class="col-md-8 admin-content" id="charts">
            Charts
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