<?php 

ini_set('display_errors','On');
 error_reporting(E_ALL);

 include ('dash.php');
 
 
 //Change permissions for all required folders (ex: img/products/category_name) to 777 first!!!
 
 
 
 if (is_uploaded_file ($_FILES['image']['tmp_name'])){

	$img=basename($_FILES['image']['name']);

	$file = $_FILES['image'];

	 
		// Validate the file type:
		$allowed_mime = array ('image/gif', 'image/pjpeg', 'image/jpeg', 'image/JPG', 'image/X-PNG', 'image/PNG', 'image/png', 'image/x-png');
		$allowed_extensions = array ('.jpg', '.gif', '.png', 'jpeg');
		$image_info = getimagesize($file['tmp_name']);
		$ext = substr($file['name'], -4);
		if ( (!in_array($file['type'], $allowed_mime)) 
		||   (!in_array($image_info['mime'], $allowed_mime) ) 
		||   (!in_array($ext, $allowed_extensions) ) 
		) {
			echo 'The uploaded file was not of the proper type. Must upload jpg, gif, png or jpeg';
		} 	
		else{
	
			$name = mysqli_real_escape_string($mysqli, $_POST['name']);
			//($_FILES['image']['name'])
			$cost = mysqli_real_escape_string($mysqli, $_POST['cost']);
			$stock = mysqli_real_escape_string($mysqli, $_POST['stock']);
			$description = mysqli_real_escape_string($mysqli, $_POST['description']);
			$category = $_POST['category'];
			
			
			//This is the directory where images will be saved
			if ($category == 'Case Fan'){
				$path ='../img/products/case-fan/'.$img;
				$fpath='img/products/case-fan/'.$img;
			}
			else if ($category == 'Heatsink'){
				$path ='../img/products/heatsink/'.$img;
				$fpath='img/products/heatsink/'.$img;
			}
			else if ($category == 'Laptop Cooling'){
				$path ='../img/products/laptopcooling/'.$img;
				$fpath='img/products/laptopcooling/'.$img;
			}
			else if ($category == 'Water / Liquid Cooling'){
				$path ='../img/products/liquid/'.$img;
				$fpath='img/products/liquid/'.$img;
			}
			
			//Prepped for query
			$image = $fpath; 
			
		

				
		//Writes the photo to the server
	if(move_uploaded_file($_FILES['image']['tmp_name'], $path))
	{

	//Tells you if its all ok
	echo "The file ". basename( $_FILES['image']['name']). " has been uploaded, and your information has been added to the directory";

	$query="INSERT INTO products (product, description, category, stock, cost, image, rating) VALUES('$name','$description','$category','$stock','$cost','$image', '25')";
		
		$result=$mysqli->query($query)
			or die ($mysqli->error);

	}
	else {

	//Gives and error if its not
	echo "Sorry, there was a problem uploading your file. ";
	}
	
	}
		//exit();
		
}
else{echo 'You did not upload a file!';}

echo '<br /><a href="../cpanel.php">Click Here</a> to return to dashboard';

header('Refresh: 20; location: ../cpanel.php');

?>