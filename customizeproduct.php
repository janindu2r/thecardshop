<!-- add session initiation and other similar necessary php stuff below -->
<?php
include('/overhead.php');

$title = 'Administrator Dashboard' ;  // page title



?>
<!-- **************************** Header Start, Do not touch **************************** -->
<!DOCTYPE html>
<html>
	<head>
        <?php include('/header.php'); ?>


<!-- *****************************    Add Page Edits Below   **************************** -->    
<div class="container" id="dasboard-page-body">
    <div class="row">
        <div class="col-md-2">
            <ul class="nav nav-pills nav-stacked admin-menu">
                <li class="active"><a href="#" data-target-id="home"><i class="fa fa-tasks fa-fw"></i>Physical</a></li>
                <li><a href="#" data-target-id="products"><i class="fa fa-dropbox fa-fw"></i>Virtual</a></li>
                <li><a href="#" data-target-id="pages"><i class="fa fa-book fa-fw"></i>Variation</a></li>
                <li><a href="#" data-target-id="charts"><i class="fa fa-pencil fa-fw"></i>Image Gallery</a></li>
            </ul>
        </div>
        <div class="col-md-8  admin-content" id="home">

            <div class="panel panel-default">
                <div class="panel-heading">
                    Physical
                </div>
                <div class="panel-body">
                    <div role="tabpanel">

                        <!-- Tab panes -->

                        <div class="tab-content col-md-6 col-md-offset-3">
                            <div role="tabpanel" class="tab-pane active" id="addProduct">

                                <div class="panel-body">
                                    <div class="form-group">

                                        <form name="physical" method="POST" action=" " enctype="multipart/form-data" onclick="//return validateShopForm();">
                                            <label for="#">Width</label>
                                            <input type="number" name="width" class="form-control" id="exampleInputtext1" placeholder="26769">
                                        </div>
                                    <div class="form-group">
                                        <label for="#">Height</label>
                                        <input type="number" name="height" class="form-control" id="exampleInputtext1" placeholder="26769">
                                    </div>
                                    <div class="form-group">
                                        <label for="#">weight</label>
                                        <input type="number" name="weight" class="form-control" id="exampleInputtext1" placeholder="26769">
                                    </div>
                                    <div class="form-group">
                                        <label for="#">Length</label>

                                        <input type="number" class="form-control" id="exampleInputtext1" placeholder="26769">
                                        </div>
                                    <div class="form-group">
                                        <label for="#">Shipping Cost</label>

                                        <input type="number" class="form-control" id="exampleInputtext1" placeholder="26769">
                                    </div>
                                    <div class="form-group">
                                        <div class="form-group">
                                            <label class=" control-label" for="radios">Variations </label>
                                            <div class="">
                                                <label class="radio-inline" for="radios-0">
                                                    <input type="radio" name="var" id="radios-0" value="1" checked="checked">
                                                    Yes
                                                </label>
                                                <label class="radio-inline" for="radios-1">
                                                    <input type="radio" name="var" id="radios-1" value="0">
                                                    No
                                                </label>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <input type="submit" class="form-control btn btn-primary btn-success" id="exampleSubmit" value="Add">
                                            <input type="reset" class="form-control btn btn-primary btn-danger" id="exampleSubmit" value="Discard">
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

        </div>
        <div class="col-md-8 admin-content" id="products">
            <div class="panel panel-default">
                <div class="panel-heading">
                  virtual
                </div>
                <div class="panel-body">
                    <div role="tabpanel">

                        <!-- Tab panes -->

                        <div class="tab-content col-md-6 col-md-offset-3">
                            <div role="tabpanel" class="tab-pane active" id="addProduct">

                                <div class="panel-body">
                                    <div class="form-group">

                                        <form name="virtual" method="POST" action=" " enctype="multipart/form-data" onclick="//return validateShopForm();">
                                            <label for="#">Download Link</label>
                                            <input type="text" name="link" class="form-control" id="" placeholder="www.asd.com">
                                            <div class="form-group">
                                                <input type="submit" class="form-control btn btn-primary btn-success" id="exampleSubmit" value="Add">
                                                <input type="reset" class="form-control btn btn-primary btn-danger" id="exampleSubmit" value="Discard">
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

            <div class="panel panel-default">
                <div class="panel-heading">
                    Products
                </div>
                <div class="panel-body">
                    <div role="tabpanel">

                        <!-- Tab panes -->

                        <div class="tab-content col-md-6 col-md-offset-3">
                            <div role="tabpanel" class="tab-pane active" id="addProduct">

                                <div class="panel-body">
                                    <div class="form-group">

                                        <form name="addproduct" method="POST" action="/scripts/addtoproduct.php " enctype="multipart/form-data" onclick="//return validateShopForm();">
                                            <label for="#">Product Name</label>
                                            <input type="text" name="pro_name" class="form-control" id="" placeholder="Shop john26769">
                                        </form></div>
                                    <div class="form-group">
                                        <label for="#">Price</label>
                                        <input type="number" name="pro_price" class="form-control" id="exampleInputtext1" placeholder="john26769">
                                    </div>
                                    <div class="form-group">
                                        <label for="#">Product Tag</label>
                                        <input type="text" name="pro_tag" class="form-control" id="exampleInputtext1" placeholder="john26769">
                                    </div>
                                    <div class="form-group">
                                        <label for="#">Category</label>

                                        <!-- <input type="text" class="form-control" id="exampleInputtext1" placeholder="john26769">-->

                                        <select id="catId" name="category" class="form-control">
                                            <option value="0">Select Category</option>

                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <div class="form-group">
                                            <label class=" control-label" for="radios">Variations </label>
                                            <div class="">
                                                <label class="radio-inline" for="radios-0">
                                                    <input type="radio" name="var" id="radios-0" value="1" checked="checked">
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
                                                    <input type="radio" name="vir" id="radios-0" value="1" checked="checked">
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
                                            <input type="text" name="sel_unit" class="form-control" id="exampleInputtext1" placeholder="john26769">
                                        </div>
                                        <!--<div class="form-group">
                                            <label for="#">Initial Stock</label>
                                            <input type="number" class="form-control" id="exampleInputtext1" placeholder="john26769">
                                        </div>-->
                                        <div class="form-group">
                                            <label for="#">Stock</label>
                                            <input type="number" name="stock" class="form-control" id="exampleInputEmail1" placeholder="john26769">
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label" for="fileUpload">Upload Image</label>
                                            <div class="#">
                                                <input id="fileUpload" name="prodimg" class="input-file" type="file">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <input type="submit" class="form-control btn btn-primary btn-success" id="exampleSubmit" value="Add">
                                            <input type="reset" class="form-control btn btn-primary btn-danger" id="exampleSubmit" value="Discard">
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


        </div>
        <div class="col-md-8 admin-content" id="charts">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Products
                </div>
                <div class="panel-body">
                    <div role="tabpanel">

                        <!-- Tab panes -->

                        <div class="tab-content col-md-6 col-md-offset-3">
                            <div role="tabpanel" class="tab-pane active" id="addProduct">

                                <div class="panel-body">
                                    <div class="form-group">

                                        <form name="addproduct" method="POST" action="/scripts/addtoproduct.php " enctype="multipart/form-data" onclick="//return validateShopForm();">
                                            <label for="#">Product Name</label>
                                            <input type="text" name="pro_name" class="form-control" id="" placeholder="Shop john26769">
                                        </form></div>
                                    <div class="form-group">
                                        <label for="#">Price</label>
                                        <input type="number" name="pro_price" class="form-control" id="exampleInputtext1" placeholder="john26769">
                                    </div>
                                    <div class="form-group">
                                        <label for="#">Product Tag</label>
                                        <input type="text" name="pro_tag" class="form-control" id="exampleInputtext1" placeholder="john26769">
                                    </div>
                                    <div class="form-group">
                                        <label for="#">Category</label>

                                        <!-- <input type="text" class="form-control" id="exampleInputtext1" placeholder="john26769">-->

                                        <select id="catId" name="category" class="form-control">
                                            <option value="0">Select Category</option>

                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <div class="form-group">
                                            <label class=" control-label" for="radios">Variations </label>
                                            <div class="">
                                                <label class="radio-inline" for="radios-0">
                                                    <input type="radio" name="var" id="radios-0" value="1" checked="checked">
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
                                                    <input type="radio" name="vir" id="radios-0" value="1" checked="checked">
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
                                            <input type="text" name="sel_unit" class="form-control" id="exampleInputtext1" placeholder="john26769">
                                        </div>
                                        <!--<div class="form-group">
                                            <label for="#">Initial Stock</label>
                                            <input type="number" class="form-control" id="exampleInputtext1" placeholder="john26769">
                                        </div>-->
                                        <div class="form-group">
                                            <label for="#">Stock</label>
                                            <input type="number" name="stock" class="form-control" id="exampleInputEmail1" placeholder="john26769">
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label" for="fileUpload">Upload Image</label>
                                            <div class="#">
                                                <input id="fileUpload" name="prodimg" class="input-file" type="file">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <input type="submit" class="form-control btn btn-primary btn-success" id="exampleSubmit" value="Add">
                                            <input type="reset" class="form-control btn btn-primary btn-danger" id="exampleSubmit" value="Discard">
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