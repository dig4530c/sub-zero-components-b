<?php
require('./is/config.inc.php');
if (!headers_sent()){
		redirect_invalid_user();
		}
else {
	include_once('./is/header.php');
	trigger_error('You do not have permission to access this page. Please log in and try
		again.');
	include_once('./is/footer.php');
	} //Redirects invalid users
	
$page_title = "SubZero Components - Change User Info";
include ('./is/header.php');
require ('./is/form_functions.inc.php');
require ('./is/dash.php');

//Errors array
$user_info_errors = array();

//Update Message Array
$update_message = array();

//Changed Fields array
$changed_fields = array();

//Field Count
$field_count = 0;

//Validation
if ($_SERVER['REQUEST_METHOD'] == 'POST'){

	//First Name
	if (preg_match('/^[A-Z\'.-]{2,20}$/i', $_POST['first_name'])){ //Validates as name
		$fn = mysqli_real_escape_string($mysqli, $_POST['first_name']);
		$field_count++;
		}
	elseif (!empty($_POST['first_name'])){ //Doesn't validate as name
		$user_info_errors['first_name'] = "Please enter a name from 2 to 20 letters.";
		}
	
	//Last Name
	if (preg_match('/^[A-Z\'.-]{2,40}$/i', $_POST['last_name'])){ //Validates as name
		$ln = mysqli_real_escape_string($mysqli, $_POST['last_name']);
		$field_count++;
		}	
	elseif (!empty($_POST['last_name'])){ //Doesn't validate as name
		$user_info_errors['last_name'] = "Please enter a name from 2 to 40 letters.";
		}
	
	//Email
	if (filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){ //Validates as email
		$e = mysqli_real_escape_string($mysqli, $_POST['email']);
		$field_count++;
		}
	elseif (!empty($_POST['email'])){ //Doesn't validate as email
		$user_info_errors['email'] = "Please enter a valid email address.";
		}
		
	//Password
	if (!empty($_POST['pass'])){ //Field is not empty
		$current_p = mysqli_real_escape_string($mysqli, $_POST['pass']);
		
		//Validate password against db password
		$pass_q = "SELECT id FROM users WHERE pass='".get_password_hash($current_p)."' AND id={$_SESSION['user_id']}";
		$pass_r = mysqli_query($mysqli, $pass_q);
		if (mysqli_num_rows($pass_r) == 1){ // Correct Password
			
			//No entries were filled
			if (empty($_POST['first_name']) && empty($_POST['last_name']) && empty($_POST['email'])){
				$update_message['user_info'] = "No changes were made.";
				}
				
			//No entry errors found
			elseif (empty($user_info_errors)){
				
				//Set Update query variables and build query dynamically
				$update_q = "UPDATE users SET";
				if (isset($fn)) $fnq = " first_name = '$fn'";
				if (isset($ln)) $lnq = " last_name = '$ln'";
				if (isset($e)) $eq = " email = '$e'";
				
				while ($field_count > 1){ //Need to add commas between fields if there's more than one.
					if (isset($fnq)){
						$update_q .= $fnq;
						unset($fnq);
						}
					elseif (isset($lnq)){
						$update_q .= $lnq;
						unset($lnq);
						}
					elseif (isset($eq)){
						$update_q .= $eq;
						unset($eq);
						}
					$update_q .= ',';
					$field_count--;
					}
					
				//Final field in update query, no need for comma.
				if (isset($fnq)) $update_q .= $fnq; 	
				elseif (isset($lnq)) $update_q .= $lnq;
				elseif (isset($eq)) $update_q .= $eq; 
				$update_q .= " WHERE id={$_SESSION['user_id']};";
				if ($update_r = mysqli_query($mysqli, $update_q)){ //If successful, confirm with user.
					$update_message['user_info'] = "You have successfully updated your information.";
					}
				}
			}
		else { //Incorrect Password
			$user_info_errors['pass'] = "Password is incorrect.";
			}
		}
	else { // Password field is empty
		$user_info_errors['pass'] = "Please enter your password.";
		}
	}
?>
<!-- stuff -->
<div class="container"><!--  container-->
	<div class="row space">
		<div class="row">
			<div class="threecol "><!--sidebar col-->
				<?php include ('./is/client_sidebar.php'); ?>
			</div>
			<div class="ninecol last"> <!--user info col-->
				<div id="user-account">
					<h2>Change User Info</h2>
					<h3>Current Info</h3>
					<ul class="current-info">						
						<?php
						$info_q = "SELECT first_name, last_name, email FROM users WHERE id={$_SESSION['user_id']};";
						$info_r = mysqli_query($mysqli, $info_q);
						if (mysqli_num_rows($info_r) == 1){
							$row = mysqli_fetch_array($info_r, MYSQLI_NUM);
							echo "
								<li><strong>First Name: </strong>".$row[0]."</li>
								<li><strong>Last Name: </strong>".$row[1]."</li>
								<li><strong>Email: </strong>".$row[2]."</li>
								";
							}
						?>
					</ul>
					<form action="change_user_info.php" method="post" accept-charset="utf-8">
						<?php 
						if (isset($update_message['user_info'])){
							echo "
								<div class='message'>".$update_message['user_info']."</div>
								";
							}
						?>
						<ul class="change-info">
							<li>
								<label for="first-name"><strong>First Name</strong></label>
								<?php create_form_input('first_name', 'text', $user_info_errors); ?>
							</li>
							<li>
								<label for="last-name"><strong>Last Name</strong></label>
								<?php create_form_input('last_name', 'text', $user_info_errors); ?>
							</li>
							<li>
								<label for="email"><strong>Email</strong></label>
								<?php create_form_input('email', 'text', $user_info_errors); ?>
							</li>
							<li>
								<small>Enter your password to edit your information.</small>
								<?php create_form_input('pass', 'password', $user_info_errors); ?>
							</li>
						</ul>
						<ul class="btn-list">
							<li>
								<input type="submit" name="submit_button" value="Update" id="submit_button" 
								 class="generic-btn" />
							</li>
							<li>
								<a class="generic-btn" href="client.php">Cancel</a>
							</li>							
						</ul>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
<?php
include ('./is/footer.php');
?>