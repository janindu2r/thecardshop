<!-- add session initiation and other similar necessary php stuff below -->
<?php
include('/overhead.php');

if($logged != 1)
    header('location: /index.php');

/*
if($_GET)
{
    if(isset($_GET['edited'])){
        //password edited (or not if 0)
        $_GET['pass'];

        //email edited (or not if 0)
        $_GET['email'];

        //userdetails edited (or not if 0)
        $_GET['user'];
    }
} */

$title = 'Dashboard | Comercio'  ;  // page title

?>
<!-- -------------------------------------- Header Start, Do not touch ----------------------------------------- -->
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/html">
<head>
    <link rel="stylesheet" type="text/css" href="/css/dashboard.styles.css">
    <?php include('header.php'); ?>
<!-- -------------------------------------- Add Page Edits Below ----------------------------------------------- -->    

<div class="container" id="dasboard-page-body">
    <div class="row">
        <div class="col-md-2">
            <ul class="nav nav-pills nav-stacked admin-menu">
                <li class="active"><a href="#" data-target-id="home"><i class="fa fa-user fa-fw"></i>Profile</a></li>
                <!-- <li><a href="#" data-target-id="widgets"><i class="fa fa-heart fa-fw"></i> My Wish List</a></li> -->
                <li><a href="#" data-target-id="pages"><i class="fa fa-history fa-fw"></i> Order History</a></li>

              <?php if(!$user->shop) { ?>
                 <li><a href="#" data-target-id="charts"><i class="fa fa-suitcase fa-fw"></i> Activate Shop</a></li>
             <?php } else {?>
                  <li><a href="/viewshop.php" data-target-id="charts"><i class="fa fa-suitcase fa-fw"></i> Visit Shop</a></li>
              <?php  } ?>
                
            </ul>
        </div>
        <div class="col-md-9  admin-content" id="home">
            <div class="col-md-6">
                <div class="panel panel-default"><!-- Contact Details -->
                    <div class="panel-heading">
                        Account Details
                    </div>
                    <div class="panel-body">
                    <form name="editProfile" action="scripts/editprofile.php" method="post">
                    <div class="form-group">
                        <label for="FirstName">First Name</label>
                        <input type="text" class="form-control" id="FirstName" name="fname" value="<?php echo $user->fName ?>" placeholder="john26769">
                    </div>
                    <div class="form-group">
                        <label for="LastName">Last Name</label>
                        <input type="text" class="form-control" id="LastName" name="lname" value="<?php echo $user->lName ?>" placeholder="john26769">
                    </div>
                    <div class="form-group">
                        <label for="DateOfBirth">Date of Birth</label>
                        <input type="date" class="form-control" id="DateOfBirth" name="dob" value="<?php echo $user->getDob() ?>" placeholder="" disabled>
                    </div>
                    <div class="form-group">
                        <label for="UserName">Address Line1</label>
                        <input type="text" class="form-control" id="exampleInputEmail1"name="add1" value="<?php echo $user->addressL1 ?>" placeholder="john26769">
                    </div>
                    <div class="form-group">
                        <label for="UserName">Address Line2</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" name="add2" value="<?php echo $user->addressL2 ?>" placeholder="john26769">
                    </div>
                    <div class="form-group">
                        <label for="UserName">Address Line3</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" name="add3" value="<?php echo $user->addressL3 ?>" placeholder="john26769">
                    </div>
                    <div class="form-group">
                        <label for="UserName">Postal Code</label>
                        <input type="number" class="form-control" id="exampleInputEmail1"  name="postal" value="<?php echo $user->postalCode ?>" placeholder="john26769">
                    </div>
                    
                    <div class="form-group pull-right">
                        <input type="submit" name="submitUser" class="btn btn-primary btn-success"  value="Save" >
                       

                    </div>

                    </form>
                    </div>
                </div><!-- /.Contact Details -->
            </div>
            <div class="col-md-6">
                <div class="panel panel-default"><!-- Login Details -->
                    <div class="panel-heading">
                        Login Details
                    </div>
                    <div class="panel-body">
                    <form name="editEmail" action="scripts/editprofile.php" method="post">
                    <div class="form-group">
                        <label for="UserName">User Name</label>
                        <input type="text" class="form-control" id="exampleInputEmail1"  name="dispName" value="<?php echo $user->getDispName()?>" disabled>
                    </div>
                    <div class="form-group">
                        <label for="UserName">Email</label>
                        <input type="email" class="form-control" id="exampleInputEmail1" name="email" value="<?php echo $user->email ?>" placeholder="john@abc.com">
                    </div>
                    <div class="form-group pull-right">
                        <input type="submit" name="submitEmail" class="btn btn-primary btn-success" value="Save">
                        <!-- <a href="#" name="submit2" class="btn btn-primary btn-success" type="submit"><span class="glyphicon glyphicon-floppy-disk"></span> Save</a> -->
                    </div>
                    </form>
                </div>
                </div><!-- /.Login Details -->
                <div class="panel panel-default"><!-- Password Details -->
                    <div class="panel-heading">
                        Credentials
                    </div>
                    
                <div class="panel-body">
                <form name="editPass" action="scripts/editprofile.php" method="post">
                    <div class="form-group">
                        <label for="UserName">Current Password</label>
                        <input type="password" class="form-control" name="password" id=""  value="">
                    </div>
                    <div class="form-group">
                        <label for="UserName">New Password</label>
                        <input type="password" class="form-control" name="newpassword" id=""  value="">
                    </div>
                    <div class="form-group pull-right">
                        <input type="submit" name="submitPass" class="btn btn-primary btn-success" value="Save">
                    </div>
                </form>
                </div>
                </div><!-- /.Contact Details --> 
            </div>
        </div>

        <div class="col-md-8 admin-content" id="widgets">
        </div> <!-- /.end of widgets tab page -->

        <div class="col-md-10 admin-content" id="pages">
<h4>Details of you order history</h4>
    <div class="row">
    <div class="col-md-4 col-offset-3 hidden-xs pull-right">

        <div class="input-group custom-search-form">
              <input type="text" class="form-control">
              <span class="input-group-btn">
              <button class="btn btn-default" type="button">
              <span class="glyphicon glyphicon-search"></span>
             </button>
             </span>
             </div><!-- /input-group -->
    </div>
    
        <div class="col-md-12">        
        
        <div class="table-responsive">

<table id="mytable" class="table table-bordred table-striped">

                    <thead>
                    <th>Order ID</th>
                    <th>View Invoice</th>
                    <th>Total Items</th>
                    <th>Processed Items</th>
                    <th>Overall Status</th>
                    <th>Update Items</th>
                   </thead>
            <tbody>

            <?php
            $buyer = new Buyer($user->getRegID());

            if($buyer->ordList) {
                foreach ($buyer->ordList as $row) { ?>

                    <tr>
                        <td><?php echo $row['order_id'] ?></a></td>
                        <td>
                            <a href="order.php?order=<?php echo $row['order_id'] ?>"><button class="btn btn-info btn-xs" data-title="View"><span class="glyphicon glyphicon-th-list"></span></button></a>
                        </td>
                        <td><?php echo $row['tot_items_in_cart'] ?> </td>
                        <td><?php echo $row['processed_items'] ?> </td>
                        <td><?php echo $row['order_status'] ?> </td>
                        <td>
                            <a href="editorder.php?order=<?php echo $row['order_id'] ?>">
                                <button class="btn btn-primary btn-xs" data-title="Edit" <?php if($row['order_status'] == 'Completed') echo 'disabled'; ?> ><span class="glyphicon glyphicon-pencil"></span></button>
                            </a>
                        </td>
                    </tr>

                <?php }
            } else {
                echo "<td colspan='6' align='center'>Your Order History is Empty</td>";
            }?>


         <!--   <td><p><button class="btn btn-primary btn-xs" data-title="Edit" data-toggle="modal" data-target="#edit" ><span class="glyphicon glyphicon-pencil"></span></button></p></td>
            <td><p><button class="btn btn-danger btn-xs" data-title="Delete" data-toggle="modal" data-target="#delete" ><span class="glyphicon glyphicon-trash"></span></button></p></td>
            -->

            </tbody>
        
</table>

<div class="clearfix"></div>

                
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


        <?php if(!$user->shop) { ?>
           <div class="col-md-8 admin-content" id="charts" style="min-height:450px;">
               <div class="col-md-3 col-offset-3">
                   <div class="panel">
                       <div class="panel-body">
                           <a href="/registershop.php" class="btn btn-lg btn-info"><span class="glyphicon glyphicon-bullhorn"></span> Activate Your Shop</a>
                       </div>
                   </div>
               </div>
           </div>
        <?php } else { ?>
            <div class="col-md-8 admin-content" id="charts" style="min-height:45px;">
                <div class="col-md-3 col-offset-3">
                    <div class="panel">
                        <div class="panel-body">
                            <a href="/viewshop.php" class="btn btn-lg btn-info"><span class="glyphicon glyphicon-bullhorn"></span>View Shop</a>
                        </div>
                    </div>
                </div>
            </div>
        <?php } ?>
        <!--
           <div class="col-md-9 admin-content" id="table">
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
           </div>
       </div>-->
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

$(document).ready(function(){
$("#mytable #checkall").click(function () {
        if ($("#mytable #checkall").is(':checked')) {
            $("#mytable input[type=checkbox]").each(function () {
                $(this).prop("checked", true);
            });

        } else {
            $("#mytable input[type=checkbox]").each(function () {
                $(this).prop("checked", false);
            });
        }
    });
});

</script>

<!-- -------------------------------------- End of page edits -------------------------------------------------- -->
    <!---------------------------------------- End of page edits ---------------------------------------------------->
    <?php include('footer.php'); //including the footer?>
    <!-- End of page -->