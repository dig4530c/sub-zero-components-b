<?php 
$page_title = "SubZero Components - Search";
include ('is/header.php'); 
?>

		<!-- stuff -->
		<div class="container homec "><!-- home container-->
		<div class="row " >

		<?php 

		function excerpt($text, $number_of_words,$id) {
   $text = strip_tags($text);

   $text = preg_replace("/^\W*((\w[\w'-]*\b\W*){1,$number_of_words}).*/ms", '\\1', $text);
   return str_replace("\n", "", $text."<a href='shop.php?id=".$id."'>...</a>");
	}
		include ('is/dash.php'); 
		// error_reporting(0);
		$keyword = $_GET['keyword'];
		if(isset($keyword) && !empty($keyword) && $keyword!=" "){
		$query="SELECT id,`product` AS prodname,description,CONVERT(stock USING utf8) AS stock,CONVERT(image USING utf8) AS image FROM products WHERE `product` LIKE '%$keyword%'";
		}

		echo "<h3 id='resultfor'>Results for \"". $keyword . "\"</h3>";

		
	$result=$mysqli->query($query)
		or die ($mysqli->error);
	
while ($row=$result->fetch_assoc())
{			
			$id=$row['id'];
			$product=$row['prodname'];
			$description=$row['description'];
			$stock=$row['stock'];
			$img=$row['image'];
			echo "<div class='search-result'>";
			echo "<div class='search-img'><img src='" . $img . "' style='height:150px;' /></div>";
			echo "<div class='search-title'><p>" . $product . "<p><br />";
			echo "<small>Stock count: " . $stock . "</small>";
			echo "</div>"; //close search-title

			echo "<div class='product-desc'>" . excerpt($description,60,$id) . "</div><br /><br />";
			echo "<div class='add2cart'><a href='shop.php?id=".$id."' class='btn'>SEE DETAILS</a><br /><br /><a href='#' class='btn'>ADD TO CART</a></div><br /><br />";

			echo "<div class='clear'> </div>";
			echo "</div>"; //close search-result

}
		// echo $keyword;	
		?>
		</div>
		</div><!--end container class -->
<?php include ('is/footer.php'); ?>
	