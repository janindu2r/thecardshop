<?php
include('overhead.php');
$title = 'Comercio' ; //define page title

$list = new Listing();

?>

<!DOCTYPE html>
<html>
	<head>
		<meta name="description" content="Comercio, Yeah it's yours!" />
		<meta name="keywords" content="comercio, e-commerce, buy, sell" />
		<meta name="author" content="EliteCoders" />
    <!-- include header -->
    <?php include('header.php');?>
		<?php include('carousel.php');?>
		<?php include('welcome-heading.php');?>
    <main>
			<!-- search -->
			<div class="container">
				<diiv class="row">
					<form class="card-search" role="search" action="/searchresults.php" method="GET">
						<div class="form-group">
								<div id="imaginary_container">
										<div class="input-group stylish-input-group">
												<input type="text" class="form-control" placeholder="Search" name="search" >
												<span class="input-group-addon">
														<button type="submit">
																<span class="glyphicon glyphicon-search"></span>
														</button>
												</span>
										</div>
								</div>
						</div>
					</form>
				</div>
			</div>

			<!-- featured content *************************************************************-->
			<div class="row">

			</div>
			<div class="features">
				<div class="products">
					<div class="container">
				    <div class="row">
				        <div class="row">
				            <div class="col-md-9">
				                <h3>Recent Products</h3>
				            </div>
				            <div class="col-md-3">
				                <!-- Controls -->
				                <div class="controls pull-right hidden-xs">
				                    <a class="left fa fa-chevron-left btn btn-default" href="#carousel-example-generic" data-slide="prev"></a>
														<a class="right fa fa-chevron-right btn btn-default" href="#carousel-example-generic" data-slide="next"></a>
				                </div>
				            </div>
				        </div>
				        <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
				            <!-- Wrapper for slides -->
				            <div class="carousel-inner">
				                <div class="item active">
				                    <div class="row">
																<?php
																$prd = $list->getRecentProducts(0,3);
																if($prd) {
																	foreach ($prd as $row) {
																		$viewProd = new Product();
																		if ($row[1]) {
																			$viewProd = new Variation();
																		}
																		echo $viewProd->getLargeBoxItem($row['product_id']);
																	}
																}
																?>
										                    </div>
										                </div>
										                <div class="item">
										                    <div class="row">
																<?php
																$prd = $list->getRecentProducts(3,3);
																if($prd) {
																	foreach ($prd as $row) {
																		$viewProd = new Product();
																		if ($row[1]) {
																			$viewProd = new Variation();
																		}
																		echo $viewProd->getLargeBoxItem($row['product_id']);
																	}
																}
																?>
				                    </div>
				                </div>
				            </div>
				        </div>
				    </div>
				</div>

			</div> <!-- end of products -->
	</div><!--  end of features -->


	</main>

<!-- end of middle content -->
<script>
    $('.carousel').carousel({
        interval: 8000
    })
</script>
<script>
$(document).ready(function() {
    $('#list').click(function(event){event.preventDefault();$('#products .item').addClass('list-group-item');});
    $('#grid').click(function(event){event.preventDefault();$('#products .item').removeClass('list-group-item');$('#products .item').addClass('grid-group-item');});
});
</script>
<!-- include footer -->

<?php include('footer.php');?>
