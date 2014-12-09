<!-- add session initiation and other similar necessary php stuff below -->
<?php
include('overhead.php');

$title = '' ;  // page title


?>
<!-- **************************** Header Start, Do not touch **************************** -->
<!DOCTYPE html>
<html>
	<head>
        <?php include('header.php'); ?>
<!-- *****************************    Add Page Edits Below   **************************** -->    
<div class="container" id="dasboard-page-body">
    <div class="row">
        <div class="col-md-2">
            <ul class="nav nav-pills nav-stacked admin-menu">
                <li class="active"><a href="#" data-target-id="home"><i class="fa fa-user fa-fw"></i>Account</a></li>
                <li><a href="#" data-target-id="products"><i class="fa fa-dropbox fa-fw"></i>Products</a></li>
                <li><a href="#" data-target-id="pages"><i class="fa fa-history fa-fw"></i>Order History</a></li>
                <!-- <li><a href="#" data-target-id="charts"><i class="fa fa-bar-chart-o fa-fw"></i>Charts</a></li>
                <li><a href="#" data-target-id="table"><i class="fa fa-table fa-fw"></i>Table</a></li>
                <li><a href="#" data-target-id="forms"><i class="fa fa-tasks fa-fw"></i>Forms</a></li>
                <li><a href="#" data-target-id="calender"><i class="fa fa-calendar fa-fw"></i>Calender</a></li>
                <li><a href="#" data-target-id="library"><i class="fa fa-book fa-fw"></i>Library</a></li>
                <li><a href="#" data-target-id="applications"><i class="fa fa-pencil fa-fw"></i>Applications</a></li>
                <li><a href="#" data-target-id="settings"><i class="fa fa-cogs fa-fw"></i>Settings</a></li> -->
            </ul>
        </div>
        <div class="col-md-9  admin-content" id="home">
        	    <div class="alert alert-info">
                	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">
                    	×</button>
                	<span class="glyphicon glyphicon-info-sign"></span> <strong>Welcom Admin</strong>
            	</div>
            <div class="col-md-6">
                <div class="panel panel-default"><!-- Contact Details -->
                    <div class="panel-heading">
                        Account Details
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
                        <label class="control-label" for="selectbasic">Category</label>
						  <div class="">
						    <select id="selectbasic" name="selectbasic" class="form-control">
						      <option value="1">Option one</option>
						      <option value="2">Option two</option>
						    </select>
						  </div>
                    </div>
                    <div class="form-group">
                       <label class="control-label" for="selectbasic">Category</label>
						  <div class="">
						    <select id="selectbasic" name="selectbasic" class="form-control">
						      <option value="1">Option one</option>
						      <option value="2">Option two</option>
						    </select>
						  </div>
                    </div>
                                      
                    <div class="form-group pull-right">
                        <a href="#" class="btn btn-primary btn-success"><span class="glyphicon glyphicon-floppy-disk"></span> Save</a>
                        <a href="#" class="btn btn-primary btn-danger"><span class="glyphicon glyphicon-remove"></span> Discard</a>
                    </div>
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
                    
                    <div class="form-group pull-right">
                        <a href="#" class="btn btn-primary btn-success"><span class="glyphicon glyphicon-floppy-disk"></span> Save</a>
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
					    <div role="tabpanel" class="tab-pane active" id="home">...</div>
					    <div role="tabpanel" class="tab-pane" id="addProduct">

		                    <div class="panel-body">
			                    <div class="form-group">
			                        <label for="#">Product Name</label>
			                        <input type="text" class="form-control" id="" placeholder="Shop john26769">
			                    </div>
			                    <div class="form-group">
			                        <label for="#">Price</label>
			                        <input type="number" class="form-control" id="exampleInputtext1" placeholder="john26769">
			                    </div>
			                    <div class="form-group">
			                        <label for="#">Product Tag</label>
			                        <input type="text" class="form-control" id="exampleInputtext1" placeholder="john26769">
			                    </div>
			                    <div class="form-group">
			                        <label for="#">Category ID</label>
			                        <input type="text" class="form-control" id="exampleInputtext1" placeholder="john26769">
			                    </div>
			                    <div class="form-group">
			                       <label class=" control-label" for="radios">Variations </label>
									  <div class=""> 
									    <label class="radio-inline" for="radios-0">
									      <input type="radio" name="radios" id="radios-0" value="1" checked="checked">
									      Yes
									    </label> 
									    <label class="radio-inline" for="radios-1">
									      <input type="radio" name="radios" id="radios-1" value="2">
									      No
									    </label>
									  </div>
			                    </div>
			                    <div class="form-group">
			                       <label class=" control-label" for="radios">Virtual </label>
									  <div class=""> 
									    <label class="radio-inline" for="radios-0">
									      <input type="radio" name="radios" id="radios-0" value="1" checked="checked">
									      Yes
									    </label> 
									    <label class="radio-inline" for="radios-1">
									      <input type="radio" name="radios" id="radios-1" value="2">
									      No
									    </label>
									  </div>
			                    </div>
			                    <div class="form-group">
			                        <label for="#">Product description</label>
			                        <textarea class="form-control" id="textarea" name="textarea">default text</textarea>
			                    </div>
			                    <div class="form-group">
			                        <label for="#">Selling Unit</label>
			                        <input type="text" class="form-control" id="exampleInputtext1" placeholder="john26769">
			                    </div>
			                    <div class="form-group">
			                        <label for="#">Initial Stock</label>
			                        <input type="number" class="form-control" id="exampleInputtext1" placeholder="john26769">
			                    </div>
			                    <div class="form-group">
			                        <label for="#">Current Stock</label>
			                        <input type="number" class="form-control" id="exampleInputEmail1" placeholder="john26769">
			                    </div>
			                    <div class="form-group">
			                        <label class="control-label" for="fileUpload">Upload Image</label>
									  <div class="#">
									    <input id="fileUpload" name="fileUpload" class="input-file" type="file">
									  </div>
			                    </div>
			                    
			                    
			                    <div class="form-group pull-right">
			                        <a href="#" class="btn btn-primary btn-success"><span class="glyphicon glyphicon-floppy-disk"></span> Add</a>
			                        <a href="#" class="btn btn-primary btn-danger"><span class="glyphicon glyphicon-remove"></span> Discard</a>
			                    </div>
					    	</div>
					    </div>
					    <div role="tabpanel" class="tab-pane" id="messages">...</div>
					    <div role="tabpanel" class="tab-pane" id="settings">...</div>
					  </div>

					</div>
        		</div>
        	</div>
            
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