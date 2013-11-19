<?php 
$id = $_POST['id'];
$name = $_POST['name'];
$review = $_POST['review'];

// echo $id . "<br />" . $name . "<br />" . $review;

include ('dash.php');
	
	//echo $id;
	
	$query="INSERT INTO review (pid,name,review) VALUES ('$id', '$name', '$review')";
					
					$result=$mysqli->query($query)
						or die ($mysqli->error);

?>