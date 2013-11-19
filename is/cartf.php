<?php

ini_set('display_errors','On');
 error_reporting(E_ALL);
 

//include ('dash.php');
//included in cart.php instead to prevent it from being called twice by cartf.php and total.php

	if(isset($_GET['action']) && $_GET['action'] == 'removed'){
			echo "<div class='message'>" . $_GET['name'] . " was removed from cart.</div>";
		}
		
		if(isset($_SESSION['cart'])){
                $ids = "";
				//echo	 "<div>" . $ids . " are in ids.</div>";
                foreach($_SESSION['cart'] as $id){
                        $ids = $ids . $id . ",";
                }
                
                // remove the last comma
                $ids = rtrim($ids, ',');
					//echo	 "<div>" . $ids . " are in ids.</div>";

		
		
				if (($ids=="")||($ids == null)){
					echo "<div>Your cart is empty. Start shopping!</div>";
					}

				//id, `Product Name`, Cost, Image
				else{
					$query='SELECT * FROM products WHERE id IN (' .$ids.')'; 
					
					$result=$mysqli->query($query)
						or die ($mysqli->error);
						

					$num=$result->num_rows;

					//echo "there are .$num. of rows";


					if ($num>0){
						echo"
						<ul class='cart-list'>
							<li>
								<ul>
									<li class='heading' width='400'>Product Name</li>
									<li class='heading' width='50'>Price</li>
									<li class='heading' width='40'>Qty</li>
									<li class='heading'>Remove </li>
								</ul>								
							</li>";
						
						while ($row=$result->fetch_assoc()){
						
								$product=$row['product'];
								$cost=$row['cost'];
								$img=$row['image'];
								$id=$row['id'];
								$stock = $row['stock'];
								$discount=$row['discount'];

								if($discount > 0.00)
								{
									$cost = $discount;
								}
								
							
								//$subtotal += $cost;
								
								/*echo "
								<div class='catalog'>
									<div class='list'>
										<h2>$product</h2>
										<p>$$cost</p><a href='is/remove.php?id={$id}&name={$product}' class='btn'>Remove</a>
									</div>
									<img src='$img' alt='$product' />
								</div>
								
								
								
								";*/
								
								//MY ATTEMPT
								// <li class='unit'><img src='$img' alt='$product' /></li>
								//Unit is the heading for the table Image - Cost -
								echo "
								<li>
									<ul>
										<li class='unit' width='400'>$product</li>
										<li class='unit' width='50'>$cost</li>
										<li class='unit' width='40'>
										<input type='text' name='qty' value='1' id='qty' size='2' maxlength='2' /></li>
									<li class='unit'><a href='is/remove.php?id={$id}&name={$product}' class='btn'>Remove</a></li>
									 </ul>
								</li>
								";
								}
								echo "</ul>";
							}
							
							
							echo "
								<ul class='btn-list'>
									<li>
										<a href='is/empty.php' class='btn'>Empty Cart</a>
									</li>
									<li>
										<a href='#' class='btn'>Update</a> 
									</li>
								</ul>
								
							
								";
				} //?cart=updateDatabase
			
		}
		else{	echo "<div class='message'>Your cart is empty. Start shopping!</div>";}		

/*		
		//STARTING HERE WILL EFFECT DATABASE
		//Out side of function changes occur when page is refreshed
		//CAN BE WRITTEN AS FUNCTION
		
		//function updateDatabase() 
		//{
			// NEED FIGURE OUT VARIABLE FOR STOCK of ALL
			if ($ids)
			{
				 
				echo "$ids are the id of items added to cart";
				echo "<br />$id is id of last item in cart";
				echo "<br />$stock is stock of last item in cart (old)";	
				
				$query='UPDATE products SET stock=stock-1 WHERE id IN (' .$ids.')';
				//INSTEAD of STOCK MINUS 1 IT CAN BE MINUS QUANTITIY NEED CREATE VARABLE n input box
				
				//NEEDED
				$result=$mysqli->query($query)
							or die ($mysqli->error);
							
				$stock2 = $stock - 1;
				echo "<br />$stock2 is stock in database (changed)";	

			}
			
			if ($stock2 == 0) {
				
				echo "<br />Stock of id $ids is empty/reached 0";
				//INSERT STOP SO table in database stop reducing instead going to negative
				//customer can not longer purchase
				
			}
			
			/*else {
				echo "<br />OKAY either button no click or we have a problem SEE else statement";	
			}*/
			
		//} //Close function*/
		
		/*if(!empty($_GET['true'])) {
      		echo updateDatabase();
   		}*/
		
		

?>
										