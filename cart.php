<?php 
$page_title = "SubZero Components - Cart";
include ('is/header.php'); 
include ('is/dash.php');

$_SESSION['cart_total'] = 0.00;
?>

		<!-- stuff -->
		<div class="container cart-container"><!--  container-->
			<div class="row space">
				<div class="row">
					<div class="ninecol"> <!--cart col-->
						<h2>Your Cart</h2>
						<div id='cart'>
							 <?php include ('is/cartf.php'); ?>
						</div>					
					</div>
					<div class="threecol last">
						<div id="checkout">
							<div id="total">
								<span>Your subtotal is:</span>
								<?php include ('is/total.php'); ?>
							</div>
							<div id="cbtn">
							
									
									<?php 
										if($_SESSION['cart_total'] == 0)
										{

										}
										else
										{
											$cart_total=$_SESSION['cart_total'];
											echo"
												<div class='seperate'>
													<form name='_xclick' action='https://www.sandbox.paypal.com/cgi-bin/webscr' method='post' target='_top'>
														<fieldset class='third-party-group'>
															<legend>Checkout with:</legend>
															<img src='https://www.sandbox.paypal.com/en_US/i/logo/paypal_logo.gif'></img>
															<input type='hidden' name='cmd' value='_xclick'>
															<input type='hidden' name='business' value='seller@knights.ucf.edu'>
															<input type='hidden' name='currency_code' value='USD'>
															<input type='hidden' name='item_name' value='Cooling Supplies'>
															<input type='hidden' name='amount' value='$cart_total'>
															<input type='hidden' name='return' value='http://sulley.cah.ucf.edu/~ar400093/dig4530c/dig4530c_group03/A/payment.php'>
															<input type='hidden' name='cancel_return' value='http://sulley.cah.ucf.edu/~ar400093/dig4530c/dig4530c_group03/A/cart.php'>
															<input type='hidden' name='handling' value='7.95'>
															<input type='image' src='https://www.sandbox.paypal.com/en_US/i/btn/btn_paynowCC_LG.gif' border='0' name='submit' alt='PayPal - The safer, easier way to pay online!'>
														</fieldset>
													</form>
												</div>
											";
										}
									?>

							</div>
						
						</div>
					</div>
				</div><!--end row-->
				
				</div>
		</div>
<?php include ('is/footer.php');?>
