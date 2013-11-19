<?php

ini_set('display_errors','On');
 error_reporting(E_ALL);
 
 
//include ('dash.php');
//included in cart.php instead to prevent it from being called twice by cartf.php and total.php


		
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
					echo"<span>$0.00</span>";
					}

				//id, `Product Name`, Cost, Image
				else{
					$query='SELECT * FROM products WHERE id IN (' .$ids.')';
					
					$result=$mysqli->query($query)
						or die ($mysqli->error);
						

					$num=$result->num_rows;

					
					$subtotal = 0.00;

					if ($num>0){
						while ($row=$result->fetch_assoc()){
						
								$product=$row['product'];
								$cost=$row['cost'];
								$img=$row['image'];
								$id=$row['id'];
								$discount=$row['discount'];
							
							if($discount>0.00)
							{
								$subtotal = $discount + $subtotal ;	
							}
							else
							{
								$subtotal = $cost + $subtotal ;
								//$qty=$row['qty'];
								//$qty = $_POST['qty'];

								
								//$subtotal = ($cost*$qty) + $subtotal ;
								$_SESSION['cart_total'] = $subtotal;
								
								
							}

							$_SESSION['cart_total'] = $subtotal;
								
						}
					}
							echo "
								<span>
									$$subtotal
								</span>
								
								";
				}
			
		}
		else{	echo "<span>$0.00</span>";}							
										
?>