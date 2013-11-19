<?php 
$page_title = "SubZero Components - Checkout";
include ('is/header.php'); 
?>

		<!-- stuff -->
		<div class="container  "><!--  container-->
			<div class="row space clear">
				<div class="row">
			
					<!--<div class="ninecol ">--> <!--cart col-->
						<h1>Checkout</h1>
						
							<div class="sixcol"> <!--above ship add -->
								<h3>Shipping Address</h3>
								<div id="sfbox">  
								<form id='ship' action="post" name="shipping">
									<fieldset>
										  <div class="field name">
												<label for="fname">First Name</label>
												<input type="text" id="fname" name="shipping_firstname" />
										  </div>
										  <div class="field name">
												<label for="lname">Last Name</label>
												<input type="text" id="lname" name="shipping_lastname" />
										  </div>
									</fieldset>
									<fieldset>
										<div class="field loc">
												<label for="address">Address</label>
												<input type="text" id="address" name="shipping_address" />
										  </div>
										  <div class="field loc">
												<label for="address2">Address 2</label>
												<input type="text" id="address2" name="shipping_address2" />
										  </div>
									</fieldset>
									<fieldset>
										<div class="field name">
												<label for="city">City</label>
												<input type="text" id="city" name="shipping_city" />
										  </div>
										  <div class="field">
												<label for="state">State</label>
												<select id="state" name="shipping_state">
													<option>Alabama</option> <option>Alaska</option>
                                                    <option>American Samoa</option> <option>Arizona</option>
													<option>Arkansas</option> <option>California</option>
                                                    <option>Colorado</option> <option>Connecticut</option>
                                                    <option>Delaware</option> <option>District of Columbia</option> 
                                                    <option>Florida</option> <option>Georgia</option> 
                                                    <option>Guam</option> <option>Hawaii</option> 
                                                    <option>Idaho</option> <option>Illinois</option> 
                                                    <option>Indiana</option> <option>Iowa</option> 
                                                    <option>Kansas</option> <option>Kentucky</option> 
                                                    <option>Louisiana</option> <option>Maine</option> 
                                                    <option>Maryland</option> <option>Massachusetts</option> 
                                                    <option>Michigan</option> <option>Minnesota</option>
                                                    <option>Mississippi</option> <option>Missouri</option>
                                                    <option>Montana</option> <option>Nebraska</option>
                                                    <option>Nevada</option> <option>New Hampshire</option>
                                                    <option>New Jersey</option> <option>New Mexico</option>
                                                    <option>New York</option> <option>North Carolina</option> 
                                                    <option>North Dakota</option> <option>Northern Marianas Islands </option>
                                                    <option>Ohio</option> <option>Oklahoma</option>
                                                    <option>Oregon</option> <option>Pennsylvania</option>
                                                    <option>Puerto Rico</option> <option>Rhode Island</option>
                                                    <option>South Carolina</option> <option>South Dakota</option>
                                                    <option>Tennessee</option> <option>Texas</option>
                                                    <option>Utah</option> <option>Vermont</option> 
                                                    <option>Virginia</option> <option>Virgin Islands</option>
                                                    <option>Washington</option> <option>West Virginia</option>
                                                    <option>Wisconsin</option> <option>Wyoming </option>
												</select>	
										  </div>
										  <div class="field name">
												<label for="zip">Zip Code</label>
												<input type="text" id="zip" name="shipping_zip" />
										  </div>
									</fieldset>
									<fieldset>
										<div class="field name">
												<label for="phone">Phone</label>
												<input type="text" id="phone" name="shipping_phone" />
										  </div>
										  <div class="field name">
												<label for="city">Email</label>
												<input type="text" id="email" name="shipping_email" />
										  </div>
									</fieldset>
								</form>
								</div>
							</div> <!--above ship add close -->
						<!-- <div id="pbtn"><span><a href="billing.php">Continue</a></span></div> old button -->
					<!--</div>--> <!--cart col-->
                    
					<!-- div class row MOVED DOWN -->
                    
							<div class="sixcol last"> <!--above bill -->
								<h3>Billing Information</h3>
								<div id="sfbox">  
								<form id='bill' action="post" name="billing">
                                <!-- Divider here KD-->
                                <div class="seperate">
									<fieldset>
								<input type="checkbox" name="checkbilling" value="1" onClick="copy_ship_info()" [BCHECKED]>
                                          <!-- input thing to copy shipping address -->
                                          My Billing Information is same as shipping<br>
										  <div class="field name">
												<label for="fname">First Name</label>
												<input type="text" id="firstname" name="billing_firstname" />
										  </div>
										  <div class="field name">
												<label for="lname">Last Name</label>
												<input type="text" id="lastname" name="billing_lastname" />
										  </div>
									</fieldset>
                                    <fieldset>
										<div class="field phone"> <!-- ADD DIV to CSS-->
												<label for="phone">Phone</label>
												<input type="text" id="phone" name="billing_phone" />
										  </div>
									</fieldset>
									<fieldset>
										<div class="field loc">
												<label for="address">Address</label>
												<input type="text" id="address" name="billing_address" />
										  </div>
									</fieldset>
                                    <fieldset>
                                           <div class="field country">
												<label for="country">Country</label>
												<select id="country" name="billing_country">
													<option>United States</option>
													<option>Other</option>
												</select>	
										  </div>
                                    </fieldset>
									<fieldset>
										<div class="field name">
												<label for="city">City</label>
												<input type="text" id="city" name="billing_city" />
										  </div>
                                    </fieldset>                                  
                                    <fieldset>
										  <div class="field"> <!-- ADD DIV to CSS-->
												<label for="state">State</label>
												<select id="state" name="billing_state">
													<option>Alabama</option> <option>Alaska</option>
                                                    <option>American Samoa</option> <option>Arizona</option>
													<option>Arkansas</option> <option>California</option>
                                                    <option>Colorado</option> <option>Connecticut</option>
                                                    <option>Delaware</option> <option>District of Columbia</option> 
                                                    <option>Florida</option> <option>Georgia</option> 
                                                    <option>Guam</option> <option>Hawaii</option> 
                                                    <option>Idaho</option> <option>Illinois</option> 
                                                    <option>Indiana</option> <option>Iowa</option> 
                                                    <option>Kansas</option> <option>Kentucky</option> 
                                                    <option>Louisiana</option> <option>Maine</option> 
                                                    <option>Maryland</option> <option>Massachusetts</option> 
                                                    <option>Michigan</option> <option>Minnesota</option>
                                                    <option>Mississippi</option> <option>Missouri</option>
                                                    <option>Montana</option> <option>Nebraska</option>
                                                    <option>Nevada</option> <option>New Hampshire</option>
                                                    <option>New Jersey</option> <option>New Mexico</option>
                                                    <option>New York</option> <option>North Carolina</option> 
                                                    <option>North Dakota</option> <option>Northern Marianas Islands </option>
                                                    <option>Ohio</option> <option>Oklahoma</option>
                                                    <option>Oregon</option> <option>Pennsylvania</option>
                                                    <option>Puerto Rico</option> <option>Rhode Island</option>
                                                    <option>South Carolina</option> <option>South Dakota</option>
                                                    <option>Tennessee</option> <option>Texas</option>
                                                    <option>Utah</option> <option>Vermont</option> 
                                                    <option>Virginia</option> <option>Virgin Islands</option>
                                                    <option>Washington</option> <option>West Virginia</option>
                                                    <option>Wisconsin</option> <option>Wyoming </option>
												</select>	
										  </div>
                                    </fieldset>                                
                                    <fieldset>
										  <div class="field name">
												<label for="zip">Zip Code</label>
												<input type="text" id="zip" name="billing_zip" />
										  </div>
									</fieldset>
                                    </div> <!-- close divider -->
                                    
                                    <!-- INSERT DIVIDER HERE KD-->
                                    <!-- <div class="seperate">
									<fieldset>
										<div class="field name">
												<label for="card">Credit Card Number</label>
												<input type="text" id="card" />
										  </div>
                                    </fieldset>
                                    <fieldset>
                                          <div class="field expire">
												<label for="expiremonth">Expiration</label>
												<select id="expiremonth">
													<option>01</option>
													<option>02</option>
                                                    <option>03</option>
                                                    <option>04</option>
                                                    <option>05</option>
                                                    <option>06</option>
                                                    <option>07</option>
                                                    <option>08</option>
                                                    <option>09</option>
                                                    <option>10</option>
                                                    <option>11</option>
                                                    <option>12</option>
												</select>
                                                
                                                <label for="expireyr">Expiration</label>
												<select id="expireyr">
													<option>2013</option>
													<option>2014</option>
                                                    <option>2015</option>
                                                    <option>2016</option>
                                                    <option>2017</option>
                                                    <option>2018</option>
                                                    <option>2019</option>
                                                    <option>2020</option>
                                                    <option>2021</option>
                                                    <option>2022</option>
                                                    <option>2023</option>
                                                    <option>2024</option>
												</select>	
										  </div>
                                    </fieldset>
                                    <fieldset>
                                          <div class="field cardtype">
												<label for="cardtype">Card Type</label>
												<select id="cardtype">
													<option>Visa</option>
													<option>Mastercard</option>
                                                    <option>American Express</option>
													<option>Discover</option>
												</select>	
										  </div>
                                    </fieldset>
                                    <fieldset>
										  <div class="field"> // does it here
												<label for="cvv2">CVV2</label>
												<input type="text" id="cvv2" />
												//open window to display what cvv2 is
												<a href="#" onClick="javascript:window.open('img/cvv2.gif','new','menubars=no, resizable=no, statusbar=no, titlebar=no, width=300, height=500');">
												What's this?</a>
										  </div>
									</fieldset>
                                    </div>// close divider -->
								</form>
								</div> <!-- sfbox close -->
							</div> <!--above bill close -->


				</div> <!-- div class row -->
						<div id="pbtn"><span><a href="payment.php">Payment ></a></span></div>
			</div> <!-- row space clear close -->
			
					<div class="threecol last">
						<div >
							<!-- img box? -->
						
						</div>
					</div>
				</div><!--end row-->
				
				</div>
		</div>
<?php include ('is/footer.php'); ?>