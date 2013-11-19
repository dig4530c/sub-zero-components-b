<?php

 $id = $_GET['id'];
 include ('dash.php');

 $query="UPDATE products SET rating=rating-1 WHERE id='$id'";
	
	$result=$mysqli->query($query)
		or die ($mysqli->error);
		
// mysql_query("");
?>