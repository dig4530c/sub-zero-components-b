<?php
ini_set('display_errors','On');
error_reporting(E_ALL);

require ('./is/config.inc.php');
require ('is/dash.php');
if (!headers_sent()){
		redirect_non_super();
		}
else {
	include_once('./is/header.php');
	trigger_error('You do not have permission to access this page. Please log in and try
		again.');
	include_once('./is/footer.php');
	} //Redirects invalid users
	
//Field count
$field_count = 0;

//Track Updates
$notice = array();

//Edit Product Validation
if ($_SERVER['REQUEST_METHOD'] == 'POST'){

	//See what product they chose
	$productq = "
		SELECT id, product FROM products;
		";
	if ($r = mysqli_query($mysqli, $productq)){
		while ($row = mysqli_fetch_array($r)){
			if (array_key_exists($row[0], $_POST)){
				$pid = $row[0];
				$pname = $row[1];
				}
			}
		}
	
	//See what records changed
	if (!empty($_POST['cost'])){
		$c = mysqli_real_escape_string($mysqli, $_POST['cost']);
		$field_count++;
		}
	if (!empty($_POST['stock'])){
		$s = mysqli_real_escape_string($mysqli, $_POST['stock']);
		$field_count++;
		}
	if (!empty($_POST['description'])){
		$d = mysqli_real_escape_string($mysqli, $_POST['description']);
		$field_count++;
		}
		
	//Make update notice and update query
	if ($field_count > 0){
		$notice['update'] = '"'.$pname.'"';
		$update_q = "UPDATE products SET";
		while ($field_count > 1){ //Add commas
			if (!empty($_POST['cost'])){
				$notice['update'] .= " cost";
				$update_q .= " cost='$c'";
				unset($_POST['cost']);
				}
			elseif (!empty($_POST['stock'])){
				$notice['update'] .= " stock";
				$update_q .= " stock='$s'";
				unset($_POST['stock']);
				}
			elseif (!empty($_POST['description'])){
				$notice['update'] .= " description";
				$update_q .= " description='$d'";
				unset($_POST['description']);
				}
			$notice['update'] .= ",";
			$update_q .= ",";
			$field_count--;
			}
			
		//Last update, no comma
		if (!empty($_POST['cost'])){
			$notice['update'] .= " cost";
			$update_q .= " cost='$c'";
			}
		elseif (!empty($_POST['stock'])){
			$notice['update'] .= " stock";
			$update_q .= " stock='$s'";
			}
		elseif (!empty($_POST['description'])){
			$notice['update'] .= " description";
			$update_q .= " description='$d'";
			}
		$notice['update'] .= " successfully updated.";
		$update_q .= " WHERE id='$pid'";
		mysqli_query($mysqli, $update_q);
		}
	elseif ($_POST[$pid] == 'Remove') { //If product was removed
		$remove_q = "
			DELETE FROM products WHERE id='".$pid."'
			";
		mysqli_query($mysqli, $remove_q);
		$notice['update'] = 'Product "'.$pname.'" was remove from the database.';
		}
	else { //No updates made
		if (isset($pname)){
			$notice['update'] = 'No changes made to "'.$pname.'".';
			}
		}
	}
	
$page_title = "SubZero Components - Manage Products";
include ('is/header.php'); 
?>

		<!-- stuff -->
		<div class="container  "><!--  container-->
			<div class="row space">
				<div class="row">
					<div class="threecol "><!--sidebar col-->
						<div id="sidebar">
							<div><h3><a href="cpanel.php" class='super' id='apanel'>Administrator Panel</a></h3></div>
							<div>
								<ul>
									<li><a href="add.php" class='see' id='make'>Add Products</a></li>
									<li><a href="manage.php" class='see'  id='pro' >Manage Products</a></li>
									<?php
									if (isset($_SESSION['user_admin'])){
										echo "<li><a href='users.php' class='see' id='users'>Manage Users</a></li>";
										}
									?>		
								</ul>
							</div>
						</div>
					</div>
					<div class="ninecol last"> <!--user info col-->
						<div id="mpro" class='show'>
							<h2 class="cpanel">Manage Products</h2>
							<?php
							if (isset($notice['update'])) echo "<div class='message'>".$notice['update']."</div>";
							include ('is/managep.php'); 
							?>
						</div>
					</div>
				</div><!--end row-->
				
				</div>
		</div>
<?php include ('is/footer.php'); ?>