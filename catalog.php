<?php
ini_set('display_errors','On');
error_reporting(E_ALL);
$page_title = "SubZero Components - Catalog";
include ('is/header.php');
include_once('store/jcart/jcart.php'); //JCART PHP*
?>

		<!-- stuff -->
		<div class="container "><!--  container-->
			<div class="row space">
				<div class="row">
			
					<div class="threecol "><!--sidebar col-->
						<div id="sidebar">
							<div id="jcart">
							<?php 
							
								if ($_SERVER['REQUEST_METHOD'] == 'POST'){
									$jcart->display_cart(); //CART DISPLAY* 
									}
								
							?>
							</div>
							<!--<div><h3><a href='catalog.php'>Cooling Supplies</a></h3></div>
							<div>
								<ul>
									<li><a href='case_fans.php'>Case Fans</a></li>
									<li><a href='heatsinks.php'>Heatsinks</a></li>
									<li><a href='laptop_cooling.php'>Laptop Cooling</a></li>
									<li><a href='liquid_cooling.php'>Liquid Cooling</a></li>
								</ul>-->
							</div>
						</div>
					</div>
					<div class="ninecol last"> <!--products col-->
						<div>
							<?php include ('is/listing.php'); ?>
						</div>
					</div>
				</div><!--end row-->

				</div>
		</div>
<?php include ('is/footer.php'); ?>
