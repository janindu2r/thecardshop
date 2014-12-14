<!-- add session initiation and other similar necessary php stuff below -->
<?php
include('overhead.php');

$title = '' ;  // page title


?>
<!-- **************************** Header Start, Do not touch **************************** -->
<!DOCTYPE html>
<html>
	<head>
		<link rel="stylesheet" type="text/css" href="/css/STEPS.styles.css">
        <?php include('header.php'); ?>
<!-- *****************************    Add Page Edits Below   **************************** --> 
<div class="container">
  <div class="checkout-header">
    <h1>One step to go</h1>
  </div>
  <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
    <div class="panel panel-default">
      <div class="panel-heading" role="tab" id="headingOne">
        <h4 class="panel-title">
          <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
            Step 1: Billing Details
          </a>
        </h4>
      </div>
      <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
        <div class="panel-body">
            <div class="col-md-6">
              <legend>Your Personal Details</legend>
                <div class="#"><!-- Contact Details -->
                    
                    <div class="body">
                    <div class="form-group">
                        <label for="FirstName">First Name</label>
                        <input type="text" class="form-control" id="FirstName" name="fname" value="<?php echo $user->fName ?>" placeholder="john26769">
                    </div>
                    <div class="form-group">
                        <label for="LastName">Last Name</label>
                        <input type="text" class="form-control" id="LastName" value="<?php echo $user->lName ?>" placeholder="john26769">
                    </div>
                    <div class="form-group">
                        <label for="DateOfBirth">Email Address</label>
                        <input type="text" class="form-control" id="DateOfBirth" value="<?php echo $user->getDob() ?>" placeholder="john26769">
                    </div>
                    <div class="form-group">
                        <label for="DateOfBirth">Telephone</label>
                        <input type="text" class="form-control" id="DateOfBirth" value="<?php echo $user->getDob() ?>" placeholder="john26769">
                    </div>
                    
                </div>
                </div><!-- /.Contact Details --> 
            </div>
                        <div class="col-md-6">
              <legend>Your Address</legend>
                <div class="#"><!-- Contact Details -->
                    
                    <div class="body">
                    <div class="form-group">
                    <div class="form-group">
                        <label for="UserName">Address Line1</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" value="<?php echo $user->addressL1 ?>" placeholder="john26769">
                    </div>
                    <div class="form-group">
                        <label for="UserName">Address Line2</label>
                        <input type="email" class="form-control" id="exampleInputEmail1" value="<?php echo $user->addressL2 ?>" placeholder="john26769">
                    </div>
                    <div class="form-group">
                        <label for="UserName">Address Line3</label>
                        <input type="email" class="form-control" id="exampleInputEmail1"  value="<?php echo $user->addressL3 ?>" placeholder="john26769">
                    </div>
                    <div class="form-group">
                        <label for="UserName">City</label>
                        <input type="email" class="form-control" id="exampleInputEmail1"  value="<?php echo $user->postalCode ?>" placeholder="john26769">
                    </div>
                    <div class="form-group">
                        <label for="UserName">Postal Code</label>
                        <input type="email" class="form-control" id="exampleInputEmail1"  value="<?php echo $user->postalCode ?>" placeholder="john26769">
                    </div>
                    <div class="form-group">
                        <label for="UserName">Postal Code</label>
                        <select id="selectbasic" name="selectbasic" class="form-control">
                          <option value="1">Option one</option>
                          <option value="2">Option two</option>
                        </select>
                    </div>
                  </div>
                  <div class="form-group pull-right">
                        <a href="#headingTwo" class="btn btn-primary btn-default"  data-toggle="collapse" data-target="#collapseTwo">Continue  <span class="glyphicon glyphicon-ok"></span></a>
                    </div>
                </div><!-- /.Contact Details --> 
            </div>
         </div>
      </div>
    </div>
    <div class="panel panel-default">
      <div class="panel-heading" role="tab" id="headingTwo">
        <h4 class="panel-title">
          <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
            Step 2: Delivery Details
          </a>
        </h4>
      </div>
      <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
        <div class="panel-body">
                      <div class="col-md-6">
              <legend>Your Personal Details</legend>
                <div class="#"><!-- Contact Details -->
                    
                    <div class="body">
                    <div class="form-group">
                        <label for="FirstName">First Name</label>
                        <input type="text" class="form-control" id="FirstName" name="fname" value="<?php echo $user->fName ?>" placeholder="john26769">
                    </div>
                    <div class="form-group">
                        <label for="LastName">Last Name</label>
                        <input type="text" class="form-control" id="LastName" value="<?php echo $user->lName ?>" placeholder="john26769">
                    </div>
                    <div class="form-group">
                        <label for="DateOfBirth">Email Address</label>
                        <input type="text" class="form-control" id="DateOfBirth" value="<?php echo $user->getDob() ?>" placeholder="john26769">
                    </div>
                    <div class="form-group">
                        <label for="DateOfBirth">Telephone</label>
                        <input type="text" class="form-control" id="DateOfBirth" value="<?php echo $user->getDob() ?>" placeholder="john26769">
                    </div>
                    
                </div>
                </div><!-- /.Contact Details --> 
            </div>
                        <div class="col-md-6">
              <legend>Your Address</legend>
                <div class="#"><!-- Contact Details -->
                    
                    <div class="body">
                    <div class="form-group">
                    <div class="form-group">
                        <label for="UserName">Address Line1</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" value="<?php echo $user->addressL1 ?>" placeholder="john26769">
                    </div>
                    <div class="form-group">
                        <label for="UserName">Address Line2</label>
                        <input type="email" class="form-control" id="exampleInputEmail1" value="<?php echo $user->addressL2 ?>" placeholder="john26769">
                    </div>
                    <div class="form-group">
                        <label for="UserName">Address Line3</label>
                        <input type="email" class="form-control" id="exampleInputEmail1"  value="<?php echo $user->addressL3 ?>" placeholder="john26769">
                    </div>
                    <div class="form-group">
                        <label for="UserName">City</label>
                        <input type="email" class="form-control" id="exampleInputEmail1"  value="<?php echo $user->postalCode ?>" placeholder="john26769">
                    </div>
                    <div class="form-group">
                        <label for="UserName">Postal Code</label>
                        <input type="email" class="form-control" id="exampleInputEmail1"  value="<?php echo $user->postalCode ?>" placeholder="john26769">
                    </div>
                    <div class="form-group">
                        <label for="UserName">Postal Code</label>
                        <select id="selectbasic" name="selectbasic" class="form-control">
                          <option value="1">Option one</option>
                          <option value="2">Option two</option>
                        </select>
                    </div>
                  </div>
                  <div class="form-group pull-right">
                        <a href="#headingThree" class="btn btn-primary btn-default"  data-toggle="collapse" data-target="#collapseThree">Continue  <span class="glyphicon glyphicon-ok"></span></a>
                    </div>
                </div><!-- /.Contact Details --> 
            </div>
         </div>
        </div>
      </div>
    </div>
    <div class="panel panel-default">
      <div class="panel-heading" role="tab" id="headingThree">
        <h4 class="panel-title">
          <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
            Step 3: Payment Method
          </a>
        </h4>
      </div>
      <div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
        <div class="panel-body">
          <!-- Multiple Radios -->
          <div class="form-group">
            <label class="col-md-4 control-label" for="radios"></label>
            <div class="col-md-4">
            <div class="radio">
              <label for="radios-0">
                <input type="radio" name="radios" id="radios-0" value="1" checked="checked">
                PayPal
              </label>
            </div>
            <div class="radio">
              <label for="radios-1">
                <input type="radio" name="radios" id="radios-1" value="2">
                Other
              </label>
            </div>
            </div>
          </div>

        <!-- ****** //////Add redirection for summery page on #summery below////// *******-->
          <div class="form-group pull-right">
           <a href="/order.php" class="btn btn-lg btn-success">Confirm Order <span class="glyphicon glyphicon-ok-sign"></span></a>             
          </div>


        </div>
      </div>
    </div>
  </div>
  <div class="clearfix"></div>
  </div>
</div>

<!-- *****************************      End of page edits 	 **************************** -->
<?php include('footer.php'); //including the footer?>
<!-- End of page