<?php
ini_set('display_errors','On');
 error_reporting(E_ALL);

//include ('dash.php');


$query="SELECT * FROM users";
	
	$result=$mysqli->query($query)
		or die ($mysqli->error);

		echo"<table border=1><tr><th>Id</th><th>Username</th><th>Email</th><th>User Type</th></tr>";		
		
		while ($row=$result->fetch_assoc())
		{
					$un=$row['username'];
					$email=$row['email'];
					$ut=$row['user_type'];
					$id=$row['id'];					
					
		echo "<tr><td>$id</td><td>$un</td><td>$email</td><td>$ut</td>
			<td><input type='submit' name='$un' value='Remove' /></td>
			</tr>";

		}

		echo "</table> <br />";
?>