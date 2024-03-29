<!-- add session initiation and other similar necessary php stuff below -->
<?php
include('overhead.php');
$logged = 2;
if($_SESSION){
	header('location: /index.php');
}
$title = 'Login' ;  // page title

?>
<!---------------------------------------- Header Start, Do not touch ----------------------------------------- -->
<!DOCTYPE html>
<html>
	<head>
		<!-- include header -->
		<?php include('header.php');?>
		<?php include('carousel.php');?>
<!---------------------------------------- Add Page Edits Below ----------------------------------------------- -->

<section id="login">
    <div class="container">
    	<div class="row">
    	    <div class="col-md-12">
        	    <div class="form-wrap">
                <h1>Log in</h1>
                    <form role="form" action="/index.php" method="post" id="login-form" autocomplete="off">
                        <div class="form-group">
                            <label for="email" class="sr-only">Email</label>
                            <input type="text" name="eid" id="email" class="form-control" placeholder="Username/Email">
                        </div>
                        <div class="form-group">
                            <label for="key" class="sr-only">Password</label>
                            <input type="password" name="passwd" id="key" class="form-control" placeholder="Password">
                        </div>

                        <input type="submit" id="btn-login" class="btn btn-success btn-lg btn-block" value="Log in">
                    </form>
                    <a href="javascript:;" class="forget" data-toggle="modal" data-target=".forget-modal">Forgot your password?</a>
                    <hr>
        	    </div>
    		</div> <!-- /.col-xs-12 -->
    	</div> <!-- /.row -->
    </div> <!-- /.container -->
</section>

<div class="modal fade forget-modal" tabindex="-1" role="dialog" aria-labelledby="myForgetModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-sm">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">
					<span aria-hidden="true">×</span>
					<span class="sr-only">Close</span>
				</button>
				<h4 class="modal-title">Recovery password</h4>
			</div>
			<div class="modal-body">
				<p>Type your email account</p>
				<input type="email" name="recovery-email" id="recovery-email" class="form-control" autocomplete="off">
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
				<button type="button" class="btn btn-custom" id="btn-send-mail">Recovery</button>
			</div>
		</div> <!-- /.modal-content -->
	</div> <!-- /.modal-dialog -->
</div> <!-- /.modal -->

		<!--- start of javascript -->


		<script type="text/javascript">
			$(document).ready(function()
			{
				$('#btn-send-mail').click(function() {
					var mail = document.getElementsByName('recovery-email')[0].value;
					var email = "rec_email= " + mail;
					$.ajax({
						type: "POST",
						url: "/scripts/passwordrecovery.php",
						data: email,
						cache: false,
						success: function(result){
							alert(result);
							if(result == '1')
								alert('Check your email and change your password');
							else
								alert('There is an error. Please try again');
						}
					});
				});

				$('#showpassword').change(function() {
					alert(this.value); //check if on
					var element =  document.getElementsByName('passwd')[0];
					//change element source
				});

			});


		</script>


<!---------------------------------------- End of page edits ---------------------------------------------------->
<?php include('footer.php'); //including the footer?>
<!-- End of page -->
