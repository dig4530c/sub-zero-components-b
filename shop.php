<?php
$page_title = "SubZero Components - Shop";
include ('is/header.php'); 

$id = $_GET['id'];

include_once ('is/dash.php');


$query='SELECT * FROM products WHERE id='.$id;
	
	$result=$mysqli->query($query)
		or die ($mysqli->error);
	
while ($row=$result->fetch_assoc())
{
			$category=$row['category'];

}

if($category == "Case Fan")
{
	$link = "case_fans.php";
}
else if($category == "Heatsink")
{
	$link = "heatsinks.php";
}
else if($category == "Water / Liquid Cooling")
{
	$link = "liquid_cooling.php";
}
else if($category == "Laptop Cooling")
{
	$link = "laptop_cooling.php";
}

if(isset($_GET['action']) && $_GET['action'] == 'add'){
    echo "<div>" . $_GET['name'] . " was added to your cart.</div>";
}

//if($_GET['action']=='exists')
if(isset($_GET['action']) && $_GET['action'] == 'exists'){
    echo "<div>" . $_GET['name'] . " already exists in your cart.</div>";
}	
 
	?>
		<!-- stuff -->
		<div class="container  "><!--  container-->
			<div class="row clear">
				<div class="twelvecol "><!--nav track -->
					<div id='track'>
						<ul>
							<li><a href='home.php'>Home</a></li>
							<li>/</li>
							<li><a href='catalog.php'>Cooling Supplies</a></li>
							<li>/</li>
							<?php echo"<li><a href='$link'>$category</a></li>"; ?>
						</ul>
					</div>
				</div>
			</div>
			<div class="row space">
					<?php include ('is/product.php'); ?> 
			</div>
		</div>
		<?php include ('is/footer.php'); ?>
