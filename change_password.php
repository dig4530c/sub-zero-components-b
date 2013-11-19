<?php
require('./is/config.inc.php');
require('./is/dash.php');
if (!headers_sent()){
		redirect_invalid_user();
		}
else {
	include_once('./is/header.php');
	trigger_error('You do not have permission to access this page. Please log in and try
		again.');
	include_once('./is/footer.php');
	} //Redirects invalid users
	
$page_title = 'SubZero Components - Change Your Password';
include('./is/header.php');

// Errors array
$pass_errors = array();

//Validate current password
if ($_SERVER['REQUEST_METHOD'] == 'POST'){
	if (!empty($_POST['current'])){
		$current = mysqli_real_escape_string($mysqli, $_POST['current']);
		}
	else {
		$pass_errors['current'] = 'Please enter your current password.';
		}
		
	//Validate new password
	if (preg_match('/^[a-zA-Z0-9\!\@\#\$\&\*\^\~]{6,20}$/', $_POST['pass1'])){
		if ($_POST['pass1'] == $_POST['pass2']){
			$p = mysqli_real_escape_string($mysqli, $_POST['pass1']);
			}
		else {
			$pass_errors['pass2'] = 'Your password did not match the confirmed password.';
			}
		}
	else {
		$pass_errors['pass1'] = 'Please enter a valid password.';
		}
		
	if (empty($pass_errors)){ // If everything went well.
		$q = "SELECT id FROM users WHERE pass='".get_password_hash($current)."' AND id={$_SESSION['user_id']}";
		$r = mysqli_query($mysqli, $q);
		if (mysqli_num_rows($r) == 1){ // Correct
			
			//Update database with new password
			$q = "UPDATE users SET pass='".get_password_hash($p)."' WHERE id={$_SESSION['user_id']} LIMIT 1";
			if ($r = mysqli_query($mysqli, $q)){ // If it ran well.
				
				//Indicate to the user the successful change
				$update_message['pass'] = "Your password has been changed.";
				}
			else { // If it did not run well.
				trigger_error('Your password could not be changed due to a system error. We apologize for any inconvenience.');
				}
			}
		else {
			$pass_errors['current'] = 'Your current password is incorrect!';
			} // End of current password ELSE.
		} // End of $p IF.
	} // End of the submission form conditional.

//Form functions
require ('./is/form_functions.inc.php');
?>
<!-- stuff -->
<div class="container  "><!--  container-->
	<div class="row space">
		<div class="row">
			<div class="threecol "><!--sidebar col-->
				<?php include ('./is/client_sidebar.php'); ?>
			</div>
			<div class="ninecol last"> <!--change password col-->
				<div id="user-account">
					<h2>Change Your Password</h2>
					<form action="change_password.php" method="post" accept-charset="utf-8">
						<ul class="change-pass">
							<li>
								<label for="current"><strong>Current Password</strong></label>
								<?php create_form_input('current', 'password', $pass_errors); ?>
							</li>
							<li>
								<label for="pass1"><strong>New Password</strong></label>
								<?php create_form_input('pass1', 'password', $pass_errors); ?>
								<small>Must be between 6 and 20 characters long.</small>
							</li>
							<li>
								<label for="pass2"><strong>Confirm New Password</strong></label>
								<?php create_form_input('pass2', 'password', $pass_errors); ?>
							</li>
						</ul>
						<ul class="btn-list">
							<li>
								<input class="generic-btn" type="submit" name="submit_button" value="Change Password" id="submit_button" />
							</li>
							<li>
								<a class="generic-btn" href="client.php">Cancel</a>
							</li>
						</ul>
						<?php 
						if (isset($update_message['pass'])){
							echo "
								<div class='message'>".$update_message['pass']."</div>
								";
							}
						?>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
<?php
include ('./is/footer.php');
?>