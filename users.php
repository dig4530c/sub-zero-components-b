<?php
require('./is/config.inc.php');
if (!headers_sent()){
		redirect_non_admin();
		}
else {
	include_once('./is/header.php');
	trigger_error('You do not have permission to access this page. Please log in and try
		again.');
	include_once('./is/footer.php');
	} //Redirects invalid users
$page_title = "SubZero Components - Manage Users";
include ('is/header.php'); 
include ('is/dash.php'); 

//Remove User Validation
if ($_SERVER['REQUEST_METHOD'] == 'POST'){
	
	//See which button they pressed
	$userq = "
		SELECT username FROM users;
		";
	if ($r = mysqli_query($mysqli, $userq)){
		while ($row = mysqli_fetch_array($r)){
			if (array_key_exists($row[0], $_POST)){
				$u = $row[0];
				}
			}
		mysqli_free_result($r);
		
		//Delete appropriate user
		$deleteq = "
			DELETE FROM users WHERE username = '".$u."';
			";
		$r = mysqli_query($mysqli, $deleteq);
		$notice['remove'] = "User \"$u\" has been deleted from the database.";
		}
	}
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
									<li><a href="users.php"class='see' id='users'>Manage Users</a></li>
								</ul>
							</div>
						</div>
					</div>
					<div class="ninecol last"> <!--user info col-->
						<div id="musers" class='show'>
							<h2 class="cpanel">All Users</h2>
							<?php
							if (isset($notice['remove'])){
								echo "<div class='notice'>".$notice['remove']."</div>";
								}
							?>
							<form action="users.php" method="POST">
								<?php include ('is/manageu.php'); ?>
							</form>
						</div>
					</div>
				</div><!--end row-->
				
				</div>
		</div>
<?php include ('is/footer.php'); ?>