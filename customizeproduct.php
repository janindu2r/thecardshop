<!-- add session initiation and other similar necessary php stuff below -->
<?php
include('/overhead.php');

$title = 'Customize Product' ;  // page title

if($_GET){
    if(isset($_GET['product']))
        $prodId = $_GET['product'];
}
else
    header('location: /index.php');


$custProd = new Product();
$custProd = $custProd->returnProduct($prodId);

$vir = $custProd->virtual;
$var = $custProd->variation;

$varCount = 0;
if ($var) {
    $custProd = new Variation();
    $custProd = $custProd->selectPhysicalProduct($prodId);
    $custProd->getAllVariations($prodId);
    $varCount = sizeof($custProd->varIdNames);
}

$seller = new Seller($custProd->shopId);
$seller->getCategories();

?>
<!-- **************************** Header Start, Do not touch **************************** -->
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/html" xmlns="http://www.w3.org/1999/html">
	<head>
        <script src="/js/ajax/variations.js" ></script>
        <?php include('/header.php'); ?>

        <script>

            var  i = <?php echo $varCount ?> ;
            function addVariation(){
                if(i< 10) {
                    var val = document.getElementsByName('categories')[i].value;
                    var cat = document.getElementsByName('category')[i].value;
                    if (val != "")
                        cat = " | " + cat;
                    document.getElementsByName('categories')[0].value = document.getElementsByName('categories')[0].value + cat;
                    i++;
                }
                else
                    alert('You cannot add more than 10 variations per product.')
            }
        </script>
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
                    <?php
                    if ($var) { ?>
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
                                        <form name="editproduct" method="POST" action= "/scripts/editproductdetails.php" enctype="multipart/form-data">
                                            <div class="form-group">
                                                <input type="hidden" name="prod_id" value="<?php echo $custProd->prodId ?>">
                                                <label for="#">Product Name</label>
                                                <input type="text" name = "pro_name" class="form-control" id="" placeholder="Product Name" value="<?php echo $custProd->proName ?>">
                                            </div>
                                            <div class="form-group">
                                                <label for="#">Price</label>
                                                <input type="number" name = "pro_price" class="form-control" id="exampleInputtext1" placeholder="Product Price" value="<?php echo $custProd->proPrice ?>">
                                            </div>
                                            <div class="form-group">
                                                <label for="#">Tags</label>
                                                <input type="text" name = "pro_tag" class="form-control" id="exampleInputtext1" placeholder="Product Tags" value="<?php echo $custProd->proTag ?>">
                                            </div>
                                            <div class="form-group">
                                                <label for="#">Category</label>


                                                <!-- <input type="text" class="form-control" id="exampleInputtext1" placeholder="john26769">-->

                                                <select id="catId" name="category" class="form-control">
                                                    <option value="0">Select Category</option>
                                                    <?php
                                                        foreach ($seller->categories as $key => $val) {
                                                            $ad = '';
                                                            if($key == $custProd->catId)
                                                                $ad = 'selected';
                                                            ?>
                                                            <option value="<?php echo $key; ?>" <?php echo $ad ?>><?php echo $val;?></option>
                                                        <?php }
                                                     ?>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="#">Product description</label>
                                                <textarea class="form-control" id="textarea" name="description" placeholder="Add product description"><?php echo $custProd->description ?></textarea>
                                            </div>
                                            <div class="form-group">
                                                <label for="#">Selling Unit</label>
                                                <input type="text" name = "sel_unit" class="form-control" id="exampleInputtext1" placeholder="No of items in one package/shipment" value="<?php echo $custProd->sellUnit ?>">
                                            </div>
                                            <div class="form-group">
                                                <label for="#">Stock</label>
                                                <input type="number" name = "stock" class="form-control" id="exampleInputEmail1" placeholder="Add the stock amount of product" value="<?php echo $custProd->cuStock ?>">
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

        <?php if($vir) {

            $down_link = '';
            $down_link = $custProd->db->getScalar('select download_link from virtual where prod_id = ' . $custProd->prodId);

            ?>
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

                                        <form name="virtual" method="POST" action="/scripts/addtovirtual.php">
                                            <input type="hidden" name="prod_id" value="<?php echo $custProd->prodId ?>">
                                            <div class="form-group">
                                                <label for="#">Download Link</label>
                                                <div class="#">
                                                    <input type="text" name="link" class="form-control" id="" placeholder="www.asd.com" value="<?php echo $down_link?>">
                                                </div>
                                            </div>


                                            <div class="form-group">
                                                <input type="submit" class="btn btn-primary btn-success" id="exampleSubmit" value="Add" name="addVirtual">
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
            <?php
            $db = new DbCon();
            $phy = $db->getFirstRow('select * from physical where prod_id = '. $custProd->prodId);
            ?>

        <div class="col-md-8 admin-content" id="settings">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Dimensions of the shipment
                </div>
                <div class="panel-body">
                    <div role="tabpanel">
                        <!-- Tab panes -->
                        <div class="tab-content col-md-6 col-md-offset-3">
                            <div role="tabpanel" class="tab-pane active" id="addProduct">
                                <form name="physical" method="POST" action="/scripts/addtophysical.php">
                                <div class="panel-body">
                                    <input type="hidden" name="prod_id" value="<?php echo $custProd->prodId ?>">
                                    <div class="form-group">
                                            <label for="#">Width</label>
                                            <input type="number" name="width" class="form-control" id="exampleInputtext1" placeholder="Product Width" value="<?php if($phy) echo $phy['width']?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="#">Height</label>
                                        <input type="number" name="height" class="form-control" id="exampleInputtext1" placeholder="Product Height" value="<?php if($phy) echo $phy['height']?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="#">Weight</label>
                                        <input type="number" name="weight" class="form-control" id="exampleInputtext1" placeholder="Product Weight" value="<?php if($phy) echo $phy['weight']?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="#">Length</label>

                                        <input type="number" name="length" class="form-control" id="exampleInputtext1" placeholder="Product Length" value="<?php if($phy) echo $phy['length']?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="#">Shipping Cost</label>

                                        <input type="number" name="cost" class="form-control" id="exampleInputtext1" placeholder="69" value="<?php if($phy) echo $phy['shipping_cost']?>">
                                    </div>
                                    <div class="form-group">
                                        <div class="form-group">

                                            <div class="">
                                                <input class="character-checkbox" name="mult" type="checkbox" value="" <?php if($phy && $phy['multiply_byq']) echo 'checked'?>>
                                                Shipping cost should be multiplied by quantity
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <input type="submit"  class="btn btn-primary btn-success" name="addPhysical" id="exampleSubmit" value="Add">
                                            <input type="reset"  class="btn btn-primary btn-danger" name="Discard" id="exampleSubmit" value="Discard">
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

        <?php

            if ($var) { ?>
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

                                 <?php if($varCount) {
                                     echo '<hr>';
                                     foreach($custProd->varIdNames as $key => $val) {

                                         $variationString = '';
                                         foreach($custProd->varNameValues[$val] as $varVl)
                                         {
                                             $variationString .= ' | '. $varVl;
                                         }
                                            $variationString =  substr($variationString, 2);

                                         ?>
                                         <div class="form-group">
                                            <div class="form-group">
                                                <label for="#">Variation Name</label>
                                                <input type="text" value="<?php  echo $val ?>" class="form-control" id="" placeholder="Variation Name" contenteditable="false">
                                            </div>
                                            <div class="form-group">
                                                <label for="#">Variation Values</label>
                                                    <textarea class="form-control" id="textarea" name="var_values[<?php echo $key ?>]" placeholder="Add Variation Values"><?php  echo $variationString; ?></textarea>
                                            </div>
                                        </div>
                                         <hr>

                               <?php      }
                                 } ?>


                                    <div class="form-group">
                                        <div class="form-group">
                                            <label for="#">Variation Name</label>
                                            <input type="text" name="var_name" class="form-control" id="" placeholder="Variation Name">
                                        </div>
                                        <div class="form-group">
                                            <label for="#">Variation Values</label>
                                                <textarea class="form-control" id="textarea" name="var_values" placeholder="Add Variation Values"></textarea>
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