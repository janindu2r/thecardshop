        <meta charset="UTF-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
		<meta name="viewport" content="width=device-width, initial-scale=1.0"> 
        
        <title><?php echo $title ?></title>
		

		<link rel="shortcut icon" href="/favicon.ico">  <!--absolute links -->
		<!-- CSS Styles -->
		<link rel="stylesheet" type="text/css" href="/css/styles.css" />
		<link rel="stylesheet" type="text/css" href="css/comments.css"> <!-- styling for user comments -->

		<!-- JavaScripts --> <!--https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js -->
		<script src="/js/jquery.min.js"></script>
		<script src="/js/bootstrap.min.js"></script>
        <script src="/js/ajax/cart.js"></script>

        <!-- script for user comments -->
        <script type="text/javascript" >
		    $(function() {
		    $("#comment_submit").click(function() 
		    {
		    var comment = $("#comment").val();

		    var dataString = 'comment='+ comment;
		    if(comment=='')
		    {
		    alert('Please leave a comment');
		    }
		    else
		    {
		    $.ajax({
		    type: "POST",
		    url: "scripts/comments_save.php",
		    data: dataString,
		    cache: false,
		    success: function(html){
		    $("#comment").val('');
		    $("#success_msg").append(html);
		    }
		    });
		    }return false;
		    }); 
		    });

		</script>

		<!-- Bootstrap -->

   		<link href="/css/bootstrap.css" rel="stylesheet">
   		<link href="/css/bootstrap.min.css" rel="stylesheet">
	</head>

<body>
	<header>
		<div id="upper-header"> <!-- header for add my account and contacts -->
			<p class="upper-header-text">Phone orders: 1-800-0000<span>|</span>Email us: office@shop.com</p>

		</div>
		<hr class="shadow">

		<div class="clearfix"></div>
		<!-- navigation	menu -->
		<nav class="navbar" role="navigation" style="margin-bottom:0;">
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
		    <!-- Tempory navigation for different site functions -->
		    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
		      <ul class="nav navbar-nav">
		        <li class="nav-dropdown">
		          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Dropdown <span class="caret"></span></a>
		          <ul class="dropdown-menu" role="menu">
		            <li><a href="/register.php">Register</a></li>
		            <li><a href="/viewproduct.php">Single Product</a></li>
		            <li><a href="/admin.php">Admin</a></li>
		            <li class="divider"></li>
		            <li><a href="/registershop.php">Register Shop</a></li>
		            <li class="divider"></li>
		            <li><a href="/addItems.php">Add Items</a></li>
		            <li><a href="/registershop.php">Reg Shop</a></li>
		          </ul>
		        </li>
		      </ul>
		      <ul class="nav navbar-nav">
		        <li class="nav-dropdown dropdown-large">
		          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Shop by Category<span class="caret"></span></a>
		          <ul class="dropdown-menu dropdown-menu-large row" role="menu">

					<li class="col-sm-3">
						<ul>
							<li class="dropdown-header">Glyphicons</li>
							<li><a href="#">Available glyphs</a></li>
							<li class="disabled"><a href="#">How to use</a></li>
							<li><a href="#">Examples</a></li>
							<li class="divider"></li>
							<li class="dropdown-header">Dropdowns</li>
							<li><a href="#">Example</a></li>
							<li><a href="#">Aligninment options</a></li>
							<li><a href="#">Headers</a></li>
							<li><a href="#">Disabled menu items</a></li>
						</ul>
					</li>
					<li class="col-sm-3">
						<ul>
							<li class="dropdown-header">Button groups</li>
							<li><a href="#">Basic example</a></li>
							<li><a href="#">Button toolbar</a></li>
							<li><a href="#">Sizing</a></li>
							<li><a href="#">Nesting</a></li>
							<li><a href="#">Vertical variation</a></li>
							<li class="divider"></li>
							<li class="dropdown-header">Button dropdowns</li>
							<li><a href="#">Single button dropdowns</a></li>
						</ul>
					</li>
					<li class="col-sm-3">
						<ul>
							<li class="dropdown-header">Input groups</li>
							<li><a href="#">Basic example</a></li>
							<li><a href="#">Sizing</a></li>
							<li><a href="#">Checkboxes and radio addons</a></li>
							<li class="divider"></li>
							<li class="dropdown-header">Navs</li>
							<li><a href="#">Tabs</a></li>
							<li><a href="#">Pills</a></li>
							<li><a href="#">Justified</a></li>
						</ul>
					</li>
					<li class="col-sm-3">
						<ul>
							<li class="dropdown-header">Navbar</li>
							<li><a href="#">Default navbar</a></li>
							<li><a href="#">Buttons</a></li>
							<li><a href="#">Text</a></li>
							<li><a href="#">Non-nav links</a></li>
							<li><a href="#">Component alignment</a></li>
							<li><a href="#">Fixed to top</a></li>
							<li><a href="#">Fixed to bottom</a></li>
							<li><a href="#">Static top</a></li>
							<li><a href="#">Inverted navbar</a></li>
						</ul>
					</li>
				</ul>
				
			</li>
		</ul>
		
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
			            <li><a href="/dashboard.php">Account Settings <span class="glyphicon glyphicon-cog pull-right"></span></a></li>
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
		        	<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-shopping-cart"></i><span class="cart-text">$
                            <lable id="portable-total-a"><?php echo  number_format($cart->cartTotal, 2, '.', ''); ?></lable></span></a>
		        		<ul class="dropdown-menu">
								<div class="row">
									<div class="col-md-12">
										<div class="panel panel-info">
											<div class="panel-heading">
												<div class="panel-title">
													<div class="row">
														<div class="col-xs-6">
															<h5><span class="glyphicon glyphicon-shopping-cart"></span> Shopping Cart</h5>
														</div>
														<div class="col-xs-6">
															<a href="/cart.php"type="button" class="btn btn-primary btn-sm btn-block">
																<span class="glyphicon glyphicon-share-alt"></span> Continue shopping
															</a>
														</div>
													</div>
												</div>
											</div>
											<div class="panel-body" id="portable-cart">
                                                <!-- <div class="row">
                                                    <div class="text-center">
                                                        <div class="col-xs-9">
                                                            <h6 class="text-right">Added items?</h6>
                                                        </div>
                                                        
                                                    </div>
                                                </div> -->
                                                <?php echo $cart->getCompleteCartPrint() ?>
										<!--		<div class="row">
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
												<hr> -->
											</div>
											<div class="panel-footer">
												<div class="row text-center">
													<div class="col-xs-3">
                                                            <button type="button" class="btn btn-default btn-block" id="update-portable-cart">
                                                                Update cart
                                                            </button>
                                                        </div>
													<div class="col-xs-6">
														<h4 class="text-right">Total <strong>$<label id="portable-total-b"><?php echo number_format($cart->cartTotal, 2, '.', '') ?></label></strong></h4>
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
		        	<a href="javascript:;" id="loginBtn" class="forget btn btn-primary btn-success" data-toggle="modal" data-target=".login-modal"><span class="glyphicon glyphicon-log-in"></span> Login</a>
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
						              <!-- Text input-->
										<div class="form-group">
										  <input id="eid" name="eid" type="text" placeholder="Enter your user name" class="form-control input-md" required="">
										</div>
										<div class="form-group">
						              		<input type="password" class="form-control input-md" name="passwd" placeholder="Password">
						              	</div>
						              <button type="submit" class="btn btn-sm btn-primary pull-right">Sign in</button>
						                <a href="#" class="btn btn-xs btn-default">Forgot Password?</a>
						            </form>
						          </div>
						          <div class="modal-footer">
						            New To Comercio?
						            <a href="/register.php" class="btn btn-sm btn-success">Register</a>
						          </div>
						        </div>
							</div> <!-- /.modal-content -->
						</div> <!-- /.modal-dialog -->
					</div> <!-- /.modal -->

		        </li> <?php } ?>
		      </ul>
		    </div><!-- /.navbar-collapse -->
  			</div><!-- /.container-fluid -->
  			<hr class="shadow">
		</nav>

	</header><!-- Header end, Wrapper Start -->
  <div class="wrapper">
