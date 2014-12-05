<!-- add session initiation and other similar necessary php stuff below -->
<?php
include('overhead.php');
$title = 'Profile | Comercio'  ;  // page title


?>
<!-- -------------------------------------- Header Start, Do not touch ----------------------------------------- -->
<!DOCTYPE html>
<html>
	<head>
        <?php include('header.php'); ?>
<!-- -------------------------------------- Add Page Edits Below ----------------------------------------------- -->    

<div class="container" id="dasboard-page-body">
    <div class="row">
        <div class="col-md-3">
            <ul class="nav nav-pills nav-stacked admin-menu">
                <li class="active"><a href="#" data-target-id="home"><i class="fa fa-home fa-fw">-</i>Home</a></li>
                <li><a href="#" data-target-id="widgets"><i class="fa fa-list-alt fa-fw"></i>Widgets</a></li>
                <li><a href="#" data-target-id="pages"><i class="fa fa-file-o fa-fw"></i>Pages</a></li>
                <!-- <li><a href="#" data-target-id="charts"><i class="fa fa-bar-chart-o fa-fw"></i>Charts</a></li>
                <li><a href="#" data-target-id="table"><i class="fa fa-table fa-fw"></i>Table</a></li>
                <li><a href="#" data-target-id="forms"><i class="fa fa-tasks fa-fw"></i>Forms</a></li>
                <li><a href="#" data-target-id="calender"><i class="fa fa-calendar fa-fw"></i>Calender</a></li>
                <li><a href="#" data-target-id="library"><i class="fa fa-book fa-fw"></i>Library</a></li>
                <li><a href="#" data-target-id="applications"><i class="fa fa-pencil fa-fw"></i>Applications</a></li>
                <li><a href="#" data-target-id="settings"><i class="fa fa-cogs fa-fw"></i>Settings</a></li> -->
            </ul>
        </div>
        <div class="col-md-8 admin-content" id="home">
            <p>
                Hello! This is a forked snippet.<br>
                It is for users, which use one-page layouts.
            </p>
            <p>
                Here's the original one from BhaumikPatel: <a href="http://bootsnipp.com/snippets/featured/vertical-admin-menu" target="_BLANK">Vertical Admin Menu</a>
                <br><br>
                <strong>Thank you Bhaumik!</strong>
            </p>
        </div>
        <div class="col-md-8 admin-content" id="widgets">
			<div class="RegWrapper" id="#">
			<div class="container">

			    <div class="row">

			        <div class="form">
			            <legend><i class="glyphicon glyphicon-globe"></i>Account Information</legend>
			            <form action="scripts/reg.php" method="post" class="form" role="form">
			            <div class="row">
			                <div class="col-xs-6 col-md-6">
			                    <input class="form-control" name="firstname" placeholder="First Name" type="text"
			                        required autofocus />
			                </div>
			                <div class="col-xs-6 col-md-6">
			                    <input class="form-control" name="lastname" placeholder="Last Name" type="text" required />
			                </div>
			            </div>
			            <input class="form-control" name="uname" placeholder="Username" type="text" />
			            <input class="form-control" name="email" placeholder="Your Email" type="email" />
			            <!-- <input class="form-control" name="reenteremail" placeholder="Re-enter Email" type="email" /> -->
<!-- 			            <input class="form-control" name="password" placeholder="Password" type="password" />
			            <input class="form-control" name="repassword" placeholder="Re-enter Password" type="password" /> -->
			            <label for="">
			                Birth Date</label>
			            <div class="row">
			                <div class="col-xs-4 col-md-4">
			                    <select class="form-control" name="month">
			                        <option value="Month">Month</option>
			                        <option value="01">01</option>
			                    </select>
			                </div>
			                <div class="col-xs-4 col-md-4">
			                    <select class="form-control" name="day">
			                        <option value="Day">Day</option>
			                        <option value="01">01</option>
			                    </select>
			                </div>
			                <div class="col-xs-4 col-md-4">
			                    <select class="form-control" name="year">
			                        <option value="Year">Year</option>
			                        <option value="1990">1990</option>
			                    </select>
			                </div>
			            </div>
			            <label class="radio-inline">
			                <input type="radio" name="gender" id="inlineCheckbox1" value="M" />
			                Male
			            </label>
			            <label class="radio-inline">
			                <input type="radio" name="gender" id="inlineCheckbox2" value="F" />
			                Female
			            </label>
			            <br /><br/>
			            <input class="form-control" name="add1" placeholder="Address Line 1" type="text" />
			            <input class="form-control" name="add2" placeholder="Address Line 2" type="text" />
			            <input class="form-control" name="add3" placeholder="Address Line 3" type="text" />
			            <input class="form-control" name="postal" placeholder="Postal Code" type="text" />
			            <br />
			            
			            <button class="btn btn-primary btn-block" type="submit">
			                Save</button>
			            </form>
			        </div>
			    </div>
			</div>

        </div>
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

<!-- -------------------------------------- End of page edits -------------------------------------------------- -->
<?php include('footer.php'); //including the footer?>
<!-- End of page