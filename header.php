        <meta charset="UTF-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
		<meta name="viewport" content="width=device-width, initial-scale=1.0"> 
        <title><?php echo $title ?></title>
		<link rel="shortcut icon" href="/favicon.ico">  <!--absolute links -->
		<link rel="stylesheet" type="text/css" href="/css/styles.css" />
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
		<script src="/js/bootstrap.min.js"></script>
		<script type="text/javascript">
		 	// $(document).ready(function(){
 	  //   	$(".btn").click(function(){
		 	//         $("#myModal").modal('show');
		 	//     });
		 	// });
		// </script>
		<!-- Bootstrap -->
   		<link href="/css/bootstrap.css" rel="stylesheet">
   		 <link href="/css/bootstrap.min.css" rel="stylesheet">
	</head>

<body>
	<header>
		<div id="upper-header"> <!-- header for add my account and contacts -->
			<p class="upper-header-text">Phone orders: 1-800-0000<span>|</span>Email us: office@shop.com</p>
		</div>
		<hr class="colorgraph">
		<div class="clearfix"></div>
		<!-- navigation	menu -->
		<nav class="navbar navbar-default" role="navigation" style="margin-bottom:0;">
  			<div class="container-fluid">
			    <!-- Brand and toggle get grouped for better mobile display -->
			    <div class="navbar-header">
			      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
			        <span class="sr-only">Toggle navigation</span>
			        <span class="icon-bar"></span>
			        <span class="icon-bar"></span>
			        <span class="icon-bar"></span>
			      </button>
			      <a class="navbar-brand" href="/index.php">Commercio</a>
   	 		</div>

		    <!-- Collect the nav links, forms, and other content for toggling -->
		    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
		      <ul class="nav navbar-nav">
		        <li class="nav-dropdown">
		          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Dropdown <span class="caret"></span></a>
		          <ul class="dropdown-menu" role="menu">
		            <li><a href="/register.php">Register</a></li>
		            <li><a href="#">Another action</a></li>
		            <li><a href="#">Something else here</a></li>
		            <li class="divider"></li>
		            <li><a href="#">Separated link</a></li>
		            <li class="divider"></li>
		            <li><a href="#">One more separated link</a></li>
		          </ul>
		        </li>
		      </ul>
		      <ul class="nav navbar-nav">
		        <li class="nav-dropdown">
		          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Tempory Nav<span class="caret"></span></a>
		          <ul class="dropdown-menu" role="menu">
		            <li><a href="#">Action</a></li>
		            <li><a href="#">Another action</a></li>
		            <li><a href="#">Something else here</a></li>
		            <li class="divider"></li>
		            <li><a href="#">Separated link</a></li>
		            <li class="divider"></li>
		            <li><a href="#">View Product</a></li>
		          </ul>
		        </li>
		      </ul>
		      <form class="navbar-form navbar-left" role="search">
		        
		        <div class="form-group">
		            <div id="imaginary_container"> 
		                <div class="input-group stylish-input-group">
		                    <input type="text" class="form-control"  placeholder="Search" >
		                    <span class="input-group-addon">
		                        <button type="submit">
		                            <span class="glyphicon glyphicon-search"></span>
		                        </button>  
		                    </span>
		                </div>
            		</div>
		        </div>

		      </form>
		      <ul class="nav navbar-nav navbar-right">
              <?php if($logged == 1) { ?>
		      	<li class="dropdown">
		      		<a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-user pull-left"></span><span class="user-name-style"> <?php echo $user->getprofile() ?></span> <span class="sr-only">(current)</span></a>
		      		<ul class="dropdown-menu">
			            <li><a href="#">Account Settings <span class="glyphicon glyphicon-cog pull-right"></span></a></li>
			            <li class="divider"></li>
			            <li><a href="#">User stats <span class="glyphicon glyphicon-stats pull-right"></span></a></li>
			            <li class="divider"></li>
			            <li><a href="#">Messages <span class="badge pull-right"> 42 </span></a></li>
			            <li class="divider"></li>
			            <li><a href="#">Favourites Snippets <span class="glyphicon glyphicon-heart pull-right"></span></a></li>
			            <li class="divider"></li>
			            <li><a href="/index.php?logout=1">Sign Out <span class="glyphicon glyphicon-log-out pull-right"></span></a></li>
          			</ul>
		      	</li>
		        <li class="dropdown-cart">
		        	<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-shopping-cart"></i><span class="cart-text">$500.50</span></a>
		        		<ul class="dropdown-menu">
								<div class="row">
									<div class="col-xs-12">
										<div class="panel panel-info">
											<div class="panel-heading">
												<div class="panel-title">
													<div class="row">
														<div class="col-xs-6">
															<h5><span class="glyphicon glyphicon-shopping-cart"></span> Shopping Cart</h5>
														</div>
														<div class="col-xs-6">
															<button type="button" class="btn btn-primary btn-sm btn-block">
																<span class="glyphicon glyphicon-share-alt"></span> Continue shopping
															</button>
														</div>
													</div>
												</div>
											</div>
											<div class="panel-body">
												<div class="row">
													<div class="col-xs-2"><img class="img-responsive" src="http://placehold.it/100x70">
													</div>
													<div class="col-xs-4">
														<h4 class="product-name"><strong>Product name</strong></h4><h4><small>Product description</small></h4>
													</div>
													<div class="col-xs-6">
														<div class="col-xs-6 text-right">
															<h6><strong>25.00 <span class="text-muted">x</span></strong></h6>
														</div>
														<div class="col-xs-4">
															<input type="text" class="form-control input-sm" value="1">
														</div>
														<div class="col-xs-2">
															<button type="button" class="btn btn-link btn-xs">
																<span class="glyphicon glyphicon-trash"> </span>
															</button>
														</div>
													</div>
												</div>
												<hr>
												<div class="row">
													<div class="col-xs-2"><img class="img-responsive" src="http://placehold.it/100x70">
													</div>
													<div class="col-xs-4">
														<h4 class="product-name"><strong>Product name</strong></h4><h4><small>Product description</small></h4>
													</div>
													<div class="col-xs-6">
														<div class="col-xs-6 text-right">
															<h6><strong>25.00 <span class="text-muted">x</span></strong></h6>
														</div>
														<div class="col-xs-4">
															<input type="text" class="form-control input-sm" value="1">
														</div>
														<div class="col-xs-2">
															<button type="button" class="btn btn-link btn-xs">
																<span class="glyphicon glyphicon-trash"> </span>
															</button>
														</div>
													</div>
												</div>
												<hr>
												<div class="row">
													<div class="text-center">
														<div class="col-xs-9">
															<h6 class="text-right">Added items?</h6>
														</div>
														<div class="col-xs-3">
															<button type="button" class="btn btn-default btn-sm btn-block">
																Update cart
															</button>
														</div>
													</div>
												</div>
											</div>
											<div class="panel-footer">
												<div class="row text-center">
													<div class="col-xs-9">
														<h4 class="text-right">Total <strong>$50.00</strong></h4>
													</div>
													<div class="col-xs-3">
														<button type="button" class="btn btn-success btn-block">
															Checkout
														</button>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
		        			</ul>
		        </li>
                <?php } else if($logged == 0) { ?>
		        <!-- **********************Modal window for Login *********************-->
		        <li>
		        	<a href="javascript:;" class="forget" data-toggle="modal" data-target=".login-modal">Login</a>
					<div class="modal fade login-modal" tabindex="-1" role="dialog" aria-labelledby="myForgetModalLabel" aria-hidden="true">
						<div class="modal-dialog modal-sm">
							<div class="modal-content">
						        <!-- <div class="modal hide" id="myModal"> -->
						          
						          <div class="modal-header">
						            <button type="button" class="close" data-dismiss="modal">x</button>
						            <h3>Login to Comercio</h3>
						          </div>
						          
						          <div class="modal-body">
						            <form method="post" action="" name="login_form">
						              <p><input type="text" class="span3" name="eid" id="email" placeholder="User Name or Email"></p>
						              <p><input type="password" class="span3" name="passwd" placeholder="Password"></p>
						              <p><button type="submit" class="btn btn-primary">Sign in</button>
						                <a href="#">Forgot Password?</a>
						              </p>
						            </form>
						          </div>
						          <div class="modal-footer">
						            New To Comercio?
						            <a href="/register.php" class="btn btn-primary">Register</a>
						          </div>
						        </div>
							</div> <!-- /.modal-content -->
						</div> <!-- /.modal-dialog -->
					</div> <!-- /.modal -->

		        </li> <?php } ?>
		      </ul>
		    </div><!-- /.navbar-collapse -->
  			</div><!-- /.container-fluid -->
		</nav>

	</header><!-- Header end, Wrapper Start -->
  <div class="wrapper">
