<?php
ini_set('display_errors',1); 
error_reporting(E_ALL);
require ('dash.php');
if ($_SERVER['REQUEST_METHOD'] == 'POST'){
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
		else {
		
			$name = mysqli_real_escape_string($mysqli, $_POST['name']);
			//($_FILES['image']['name'])
			$cost = mysqli_real_escape_string($mysqli, $_POST['cost']);
			$stock = mysqli_real_escape_string($mysqli, $_POST['stock']);
			$description = mysqli_real_escape_string($mysqli, $_POST['description']);
			$category = $_POST['category'];
			
			
			//This is the directory where images will be saved
			if ($category == 'Case Fan'){
				$path ='img/products/case-fan/'.$img;
				$fpath='img/products/case-fan/'.$img;
			}
			else if ($category == 'Heatsink'){
				$path ='img/products/heatsink/'.$img;
				$fpath='img/products/heatsink/'.$img;
			}
			else if ($category == 'Laptop Cooling'){
				$path ='img/products/laptopcooling/'.$img;
				$fpath='img/products/laptopcooling/'.$img;
			}
			else if ($category == 'Water / Liquid Cooling'){
				$path ='img/products/liquid/'.$img;
				$fpath='img/products/liquid/'.$img;
			}
			
			//Prepped for query
			$image = $fpath; 	
					
			//Writes the photo to the server
			if(move_uploaded_file($_FILES['image']['tmp_name'], $path)){
			
				//Tells you if its all ok
				echo "The file ". basename( $_FILES['image']['name']). " has been uploaded, and your information has been added to the directory";

				$query="INSERT INTO products (product, description, category, stock, cost, image, rating) VALUES('$name','$description','$category','$stock','$cost','$image', '25')";
				$result=$mysqli->query($query) or die ($mysqli->error);
			}
			else {
				//Gives and error if its not
				echo "Sorry, there was a problem uploading your file. ";
			}
		}
		//exit();	
	}
	else {
		echo 'You did not upload a file!';
	}
}

//show form
?>


<div id='addp'>
	<form enctype="multipart/form-data" action="add.php" method="post" accept-charset="utf-8">

		<input type="hidden" name="MAX_FILE_SIZE" value="524288" />
		
		<fieldset>
			<legend>Fill out the form to add a product to the catalog. All fields are required.</legend>
			<div class="field">
				<label for="category"><strong>Category</strong></label><br />
				<select name="category">
					<option value = "Case Fan">Case Fan</option>
					<option value = "Heatsink">Heatsink</option>
					<option value = "Laptop Cooling">Laptop Cooling</option>
					<option value = "Water / Liquid Cooling">Water / Liquid Cooling</option>
				</select>
			</div>
			<div class="field"><label for="name"><strong>Name</strong></label><br /><input name="name" type="text" id="name" required/></div>
			<div class="field"><label for="cost"><strong>Cost (No dollar sign)</strong></label><br /><input name="cost" type="text" id="cost" required/><br /></div>
			<div class="field"><label for="stock"><strong>Stock</strong></label><br /><input name="stock" type="text" id="stock" required/></div>
			<div class="field"><label for="description"><strong>Description</strong></label><br /><textarea cols="64" rows="5" name="description"></textarea></div>
			<br />
			<div class="field"><label for="image"><strong>Image</strong></label><br /><input type="file" name="image" /></div>
			<br />
			<div class="field"><input type="submit" value="Add This Product" class="button" /></div>
			
		</fieldset>
	</form>
</div>