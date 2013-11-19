

<?php
ini_set('display_errors','On');
 error_reporting(E_ALL);


//include ('dash.php');
//included in home.php instead to prevent it from being called twice by cartf.php and total.php

$query="SELECT * FROM products WHERE id='4'";
	
	$result=$mysqli->query($query)
		or die ($mysqli->error);

	
while ($row=$result->fetch_assoc())
{
			$product=$row['product'];
			$cost=$row['cost'];
			$img=$row['image'];
			$id=$row['id'];
			$rating=$row['rating'];
			$discount=$row['discount'];
		
			echo "
			<div class='text'>
				<h2><a href='shop.php?id={$id}'>$product</a></h2>
				<div class='rate'>
						<ul style='display:none;'>
							<li><i class='icon-star'></i></li>
							<li><i class='icon-star'></i></li>
							<li><i class='icon-star'></i></li>
							<li><i class='icon-star'></i></li>
							<li><i class='icon-star'></i></li>
						</ul>";
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
				echo "<button class='thumbdown' onclick='voteDown(\"" . $id . "\")'></button>
						<button class='thumbup' onclick='voteUp(\"" . $id . "\")'></button>
					</div>
				<p class='old_cost strike'>$$cost</p>
					<p class='new_cost newprice'>$$discount</p>
					<p class='discount red'>10% off</p>
				<a href='shop.php?id={$id}' class='btn'>Shop</a>
			</div>
			<img src='$img' alt='$product' />";
			
	}

?>
