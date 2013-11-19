<?php
	ini_set('display_errors','On');
	 error_reporting(E_ALL);
	 

	 
	 $id = $_GET['id'];
	 
	include_once ('dash.php');
	
	//echo $id;
	
	$query='SELECT * FROM products WHERE id='.$id;
					
					$result=$mysqli->query($query)
						or die ($mysqli->error);
						
		while ($row=$result->fetch_assoc())
		{
			$product=$row['product'];
			$cost=$row['cost'];
			$img=$row['image'];				
			$desc=$row['description'];	
			$desc = str_replace(chr(146), "&#39;", $desc); 		
			$rating=$row['rating'];
			$discount=$row['discount'];


		if($discount > 0.00 && $id==19)
			 {
			 	echo '   
						<div class="row">
						<div class="ninecol "> <!--products col-->
							<div><h2>'.$product.'</h2></div>
							<div id="pic"><img src='.$img.' alt='.$product.' /></div>

						</div>
						<div class="threecol last "><!--sidebar col-->
							<div id="sidebar2">
								<div><p class="old_cost strike">$'.$cost.'</p>
								<p class="new_cost newprice">$'.$discount.'</p>
								<p class="discount red">50% off</p></div>
								<div class="rate">
									<ul style="display:none;">
										<li><i class="icon-star"></i></li>
										<li><i class="icon-star"></i></li>
										<li><i class="icon-star"></i></li>
										<li><i class="icon-star"></i></li>
										<li><i class="icon-star"></i></li>
									</ul>';
			 }
			 else if($discount > 0.00)
			 {
			 	echo '   
						<div class="row">
						<div class="ninecol "> <!--products col-->
							<div><h2>'.$product.'</h2></div>
							<div id="pic"><img src='.$img.' alt='.$product.' /></div>

						</div>
						<div class="threecol last "><!--sidebar col-->
							<div id="sidebar2">
								<div><p class="old_cost strike">$'.$cost.'</p>
								<p class="new_cost newprice">$'.$discount.'</p>
								<p class="discount red">10% off</p></div>
								<div class="rate">
									<ul style="display:none;">
										<li><i class="icon-star"></i></li>
										<li><i class="icon-star"></i></li>
										<li><i class="icon-star"></i></li>
										<li><i class="icon-star"></i></li>
										<li><i class="icon-star"></i></li>
									</ul>';
			 }
			 else
			 {
			 	echo '   
						<div class="row">
						<div class="ninecol "> <!--products col-->
							<div><h2>'.$product.'</h2></div>
							<div id="pic"><img src='.$img.' alt='.$product.' /></div>

						</div>
						<div class="threecol last "><!--sidebar col-->
							<div id="sidebar2">
								<div><p class="new_cost newprice">$'.$cost.'</p>
								<div class="rate">
									<ul style="display:none;">
										<li><i class="icon-star"></i></li>
										<li><i class="icon-star"></i></li>
										<li><i class="icon-star"></i></li>
										<li><i class="icon-star"></i></li>
										<li><i class="icon-star"></i></li>
									</ul>';
			 }



						
									switch (true) {
							case $rating > 0 && $rating <=10:
						echo "<div class='one-star'></div>";
								break;

								case $rating > 10 && $rating <=20:
						echo "<div class='two-star'></div>";
								break;
							
						case $rating > 20 && $rating <=30:
						echo "<div class='three-star'></div>";
								break;
							
						case $rating > 30 && $rating <=40:
						echo "<div class='four-star'></div>";
								break;

						case $rating > 40 && $rating <=50:
						echo "<div class='five-star'></div>";
								break;

						case $rating > 50:
						echo "<div class='five-star'></div>";
								break;

						case $rating < 0:
						echo "<div class='one-star'></div>";
								break;

							default:
						echo "<div class='one-star'></div>";
								break;
						}
						echo '<button class="thumbdown" onclick="voteDown(\'' . $id . '\')"></button>
						<button class="thumbup" onclick="voteUp(\'' . $id . '\')"></button>

								</div>
								<a href="is/add2.php?id='.$id.'&amp;name='.$product.'" class="generic-btn">Add to Cart</a>
							</div>
						</div>
						</div><!--end row-->
						<div class="row">
							<div class="twelevecol last">
								<div id="info">
									<p>'.$desc.'</p>
								</div>
							</div>
						</div>
						';
		}
						
	?>
	
	<div id="reviewForm">
	<input type="text" id="author-name" onfocus="if(this.value == 'Your Name') { this.value = ''; }" value="Your Name" />
	<input type="hidden" id="pid" value="<?php echo $id; ?>" />
	<textarea id="review" onfocus="if(this.value == 'Your Review') { this.value = ''; }" rows="4" cols="50">Your Review</textarea>
	<button id="submitReview">Submit</button> <span id="loader"> </span>
	<div id="data-response"> </div>
	</div>


	<?php

	$query1='SELECT * FROM review WHERE pid='.$id;
					
					$result1=$mysqli->query($query1)
						or die ($mysqli->error);
			echo "<div id='reviewList'>
						<h3>Reviews for {$product} </h3>
			";				
	while ($row=$result1->fetch_assoc())
		{
			$name=$row['name'];
			$review=$row['review'];

			echo "<div class='reviewBox'>";
			echo "<p><span>NAME: </span>" . $name . "</p>";
			echo "<p><span>REVIEW: </span>" . $review . "</p>";
			echo "</div><hr />";
		}
		echo "</div>"
	?>
	</div>