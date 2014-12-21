<!-- add session initiation and other similar necessary php stuff below -->
<?php
include('/overhead.php');

$title = 'Customize Product' ;  // page title

if($_GET){
    if(isset($_GET['product']))
        $prodId = $_GET['product'];
}
$custProd = new Product();
$custProd = $custProd->returnProduct($prodId);

$vir = $custProd->virtual;
$var = $custProd->variation;

?>
<!-- **************************** Header Start, Do not touch **************************** -->
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/html" xmlns="http://www.w3.org/1999/html">
	<head>
        <?php include('/header.php'); ?>


<!-- *****************************    Add Page Edits Below   **************************** -->    
<div class="container" id="dasboard-page-body">
    <div class="row">
        <div class="col-md-2">
            <ul class="nav nav-pills nav-stacked admin-menu">

                <li class="active"><a href="#" data-target-id="home"><i class="fa fa-tasks fa-fw"></i>Edit Product</a></li>
                <?php if($vir) { ?>
                <li><a href="#" data-target-id="products"><i class="fa fa-dropbox fa-fw"></i>Virtual</a></li>
                <?php } else { ?>
                    <li><a href="#" data-target-id="settings"><i class="fa fa-dropbox fa-fw"></i>Physical</a></li>
                    <?php if ($var) { ?>
                        <li><a href="#" data-target-id="pages"><i class="fa fa-book fa-fw"></i>Variation</a></li>
                    <?php } //variation end
                } //physical end ?>
                <li><a href="#" data-target-id="charts"><i class="fa fa-pencil fa-fw"></i>Gallery</a></li>
            </ul>
        </div>

        <!-- Edit Product -->
        <div class="col-md-8 admin-content" id="home">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Edit Product
                </div>
                <div class="panel-body">
                    <div role="tabpanel">

                        <!-- Tab panes -->

                        <div class="tab-content col-md-6 col-md-offset-3">
                            <div role="tabpanel" class="tab-pane active" id="addProduct">
                                <div class="panel-body">
                                    <div class="form-group">
                                        <form name="addproduct" method="POST" action= "/scripts/editProductDetails.php" enctype="multipart/form-data">
                                            <div class="form-group">
                                                <label for="#">Product Name</label>
                                                <input type="text" name = "pro_name" class="form-control" id="" placeholder="Product Name">
                                            </div>
                                            <div class="form-group">
                                                <label for="#">Price</label>
                                                <input type="number" name = "pro_price" class="form-control" id="exampleInputtext1" placeholder="Product Price">
                                            </div>
                                            <div class="form-group">
                                                <label for="#">Tags</label>
                                                <input type="text" name = "pro_tag" class="form-control" id="exampleInputtext1" placeholder="Product Tag">
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
                                                <label for="#">Product description</label>
                                                <textarea class="form-control" id="textarea" name="description" placeholder="Add product description"></textarea>
                                            </div>
                                            <div class="form-group">
                                                <label for="#">Selling Unit</label>
                                                <input type="text" name = "sel_unit" class="form-control" id="exampleInputtext1" placeholder="No of items in one package/shipment">
                                            </div>
                                            <div class="form-group">
                                                <label for="#">Stock</label>
                                                <input type="number" name = "stock" class="form-control" id="exampleInputEmail1" placeholder="Add the stock amount of product">
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label" for="fileUpload">Upload Image</label>
                                                <div class="#">
                                                    <input id="fileUpload" name="prodimg" class="input-file" type="file">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <input type="submit" name = "add" class=" btn btn-primary btn-success" id="exampleSubmit" value="Add">
                                                <input type="reset" class=" btn btn-primary btn-danger" id="exampleSubmit" value="Discard">
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <!--    <div role="tabpanel" class="tab-pane" id="messages">...</div>
                                    <div role="tabpanel" class="tab-pane" id="settings">...</div> -->
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div> <!-- /.end of tab page -->
        <!-- End of Edit Product -->

        <?php if($vir) { ?>
        <!-- Virtual -->
        <div class="col-md-8 admin-content" id="products">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Virtual
                </div>
                <div class="panel-body">
                    <div role="tabpanel">

                        <!-- Tab panes -->

                        <div class="tab-content col-md-6 col-md-offset-3">
                            <div role="tabpanel" class="tab-pane active" id="addProduct">

                                <div class="panel-body">
                                    <div class="form-group">

                                        <form name="virtual" method="POST" action=" " onclick="//return validateShopForm();">

                                            <div class="form-group">
                                                <label for="#">Download Link</label>
                                                <div class="#">
                                                    <input type="text" name="link" class="form-control" id="" placeholder="www.asd.com">
                                                </div>
                                            </div>


                                            <div class="form-group">
                                                <input type="submit" class="btn btn-primary btn-success" id="exampleSubmit" value="Add">
                                                <input type="reset" class="btn btn-primary btn-danger" id="exampleSubmit" value="Discard">
                                                <!--  <a href="#" class="btn btn-primary btn-success"><span class="glyphicon glyphicon-floppy-disk"></span> Add</a>
                                                <a href="#" class="btn btn-primary btn-danger"><span class="glyphicon glyphicon-remove"></span>Discard</a> -->
                                            </div>

                                            </form>
                                    </div>



                                </div>
                                <!--    <div role="tabpanel" class="tab-pane" id="messages">...</div>
                                    <div role="tabpanel" class="tab-pane" id="settings">...</div> -->
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div> <!-- /.end of tab page -->
        <!-- End of Virtual -->

        <?php } else { ?>
        <!-- Physical -->
        <div class="col-md-8 admin-content" id="settings">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Dimentions of the product
                </div>
                <div class="panel-body">
                    <div role="tabpanel">
                        <!-- Tab panes -->
                        <div class="tab-content col-md-6 col-md-offset-3">
                            <div role="tabpanel" class="tab-pane active" id="addProduct">
                                <form name="physical" method="POST" action="/script/addtophysical ">
                                <div class="panel-body">
                                    <div class="form-group">
                                            <label for="#">Width</label>
                                            <input type="number" name="width" class="form-control" id="exampleInputtext1" placeholder="Product Width">
                                    </div>
                                    <div class="form-group">
                                        <label for="#">Height</label>
                                        <input type="number" name="height" class="form-control" id="exampleInputtext1" placeholder="Product Height">
                                    </div>
                                    <div class="form-group">
                                        <label for="#">Weight</label>
                                        <input type="number" name="weight" class="form-control" id="exampleInputtext1" placeholder="Product Weight">
                                    </div>
                                    <div class="form-group">
                                        <label for="#">Length</label>

                                        <input type="number" class="form-control" id="exampleInputtext1" placeholder="Product Length">
                                    </div>
                                    <div class="form-group">
                                        <label for="#">Shipping Cost</label>

                                        <input type="number" name="cost" class="form-control" id="exampleInputtext1" placeholder="$69">
                                    </div>
                                    <div class="form-group">
                                        <div class="form-group">
                                            <label class=" control-label" for="radios">Should shipping cost be multiplied by quantity?</label>
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
                                            <input type="submit"  class="btn btn-primary btn-success"  id="exampleSubmit" value="Add">
                                            <input type="reset"  class="btn btn-primary btn-danger"  id="exampleSubmit" value="Discard">
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
                </div>

            </div>
        </div> <!-- /.end of tab page -->
        <!-- End of Physical -->

        <?php if ($var) { ?>
        <!-- Variations -->
        <div class="col-md-8 admin-content" id="pages">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Variations
                </div>
                <div class="panel-body">
                    <div role="tabpanel">
                        <!-- Tab panes -->
                        <div class="tab-content col-md-6 col-md-offset-3">
                            <div role="tabpanel" class="tab-pane active" id="addProduct">

                                <div class="panel-body">
                                    <div class="form-group">
                                    <form name="addproduct" method="POST" action="/scripts/addtoproduct.php ">
                                    <div class="form-group">
                                            <label for="#">Product Name</label>
                                            <input type="text" name="pro_name" class="form-control" id="" placeholder="Product Name">
                                    </div>
                                    <div class="form-group">
                                        <label for="#">Price</label>
                                        <input type="number" name="pro_price" class="form-control" id="exampleInputtext1" placeholder="Product Price">
                                    </div>
                                    <div class="form-group">
                                        <label for="#">Product Tag</label>
                                        <input type="text" name="pro_tag" class="form-control" id="exampleInputtext1" placeholder="Product Tags">
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
                                            <textarea class="form-control" id="textarea" name="description" placeholder="Add product description"></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label for="#">Selling Unit</label>
                                            <input type="text" name="sel_unit" class="form-control" id="exampleInputtext1" placeholder="No of items in one package/shipment">
                                        </div>
                                        <div class="form-group">
                                            <label for="#">Stock</label>
                                            <input type="number" name="stock" class="form-control" id="exampleInputEmail1" placeholder="Add the stock amount of product">
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label" for="fileUpload">Upload Image</label>
                                            <div class="#">
                                                <input id="fileUpload" name="prodimg" class="input-file" type="file">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <input type="submit" class="btn btn-primary btn-success" id="exampleSubmit" value="Add">
                                            <input type="reset" class="btn btn-primary btn-danger" id="exampleSubmit" value="Discard">
                                        </div>
                                    </div> <!-- form group -->
                                    </form>
                                </div>
                                </div>
                                <!--    <div role="tabpanel" class="tab-pane" id="messages">...</div>
                                    <div role="tabpanel" class="tab-pane" id="settings">...</div> -->
                            </div>
                        </div>
                    </div>
               </div>
            </div>
        </div><!-- /.end of tab page -->
        <!-- End of Variations -->
            <?php } //variation end
        } //physical end ?>

        <!-- Product Gallery -->
        <div class="col-md-8 admin-content" id="charts" style="min-height:450px;">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Image Gallery
                </div>

                <div class="panel-body">
                    <div role="tabpanel">
                        <!-- Tab panes -->
                        <div class="tab-content col-md-6 col-md-offset-3">
                            <div role="tabpanel" class="tab-pane active" id="addProduct">
                                <div class="panel-body">
                                    <form name="addImages" method="POST" enctype="multipart/form-data" action="/scripts/prodimageupload.php?product=<?php echo $prodId ?>">
                                    <div class="form-group">
                                            <div class="form-group">
                                                <label class="control-label" for="fileUpload">Upload Images</label>
                                                <div class="#">
                                                    <input id="fileUpload" name="prodImages[]" class="input-file" type="file" multiple>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                            <input type="submit" class="btn btn-primary btn-success" id="exampleSubmit" value="Add">
                                            <input type="reset" class="btn btn-primary btn-danger" id="exampleSubmit" value="Discard">
                                            </div>
                                    </div>
                                    </form>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

            </div>
        </div> <!-- /.end of tab page -->
        <!-- End of Product Gallery -->

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