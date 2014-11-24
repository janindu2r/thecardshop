        <meta charset="UTF-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
		<meta name="viewport" content="width=device-width, initial-scale=1.0"> 
        <title><?php echo $title ?></title>
		<link rel="shortcut icon" href="/favicon.ico">  <!--absolute links -->
		<link rel="stylesheet" type="text/css" href="/css/styles.css" />
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
		<!-- Bootstrap -->
   		<link href="/css/bootstrap.css" rel="stylesheet">
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
			      <a class="navbar-brand" href="#">Commercio</a>
   	 		</div>

		    <!-- Collect the nav links, forms, and other content for toggling -->
		    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
		      <ul class="nav navbar-nav">
		        <li class="nav-dropdown">
		          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Dropdown <span class="caret"></span></a>
		          <ul class="dropdown-menu" role="menu">
		            <li><a href="#">Action</a></li>
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
		          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Dropdown <span class="caret"></span></a>
		          <ul class="dropdown-menu" role="menu">
		            <li><a href="#">Action</a></li>
		            <li><a href="#">Another action</a></li>
		            <li><a href="#">Something else here</a></li>
		            <li class="divider"></li>
		            <li><a href="#">Separated link</a></li>
		            <li class="divider"></li>
		            <li><a href="#">One more separated link</a></li>
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
		      	<li class="dropdown">
		      		<a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-user pull-left"></span><span class="user-name-style"><?php echo $u_name; ?></span> <span class="sr-only">(current)</span></a>
		      		<ul class="dropdown-menu">
			            <li><a href="#">Account Settings <span class="glyphicon glyphicon-cog pull-right"></span></a></li>
			            <li class="divider"></li>
			            <li><a href="#">User stats <span class="glyphicon glyphicon-stats pull-right"></span></a></li>
			            <li class="divider"></li>
			            <li><a href="#">Messages <span class="badge pull-right"> 42 </span></a></li>
			            <li class="divider"></li>
			            <li><a href="#">Favourites Snippets <span class="glyphicon glyphicon-heart pull-right"></span></a></li>
			            <li class="divider"></li>
			            <li><a href="#">Sign Out <span class="glyphicon glyphicon-log-out pull-right"></span></a></li>
          			</ul>
		      	</li>
		        <li>
		        	<a href="#"><i class="fa fa-shopping-cart"></i><span class="cart-text">$500.50</span></a>
		        </li>
		      </ul>
		    </div><!-- /.navbar-collapse -->
  			</div><!-- /.container-fluid -->
		</nav>

	</header><!-- Header end, Wrapper Start -->
  <div class="wrapper">
