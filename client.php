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
$page_title = "SubZero Components - Your Account";
include ('is/header.php');
?>
<!-- stuff -->
<div class="container  "><!--  container-->
	<div class="row space">
		<div class="row">
			<div class="threecol "><!--sidebar col-->
				<?php include ('./is/client_sidebar.php'); ?>
			</div>
			<div class="ninecol last"><!--user info col-->
				<div id="user-account"><!--Changed to 'user-account' because 'user' injects JS script.
				 Not sure if you want to use AJAX or not to display this, Arissa. -Ed -->
					<h2>My Account</h2>
					<div>
						<ul class="current-info">
							<li><strong>Username: </strong><?php echo $_SESSION['username']?></li>
							<li><strong>Account Number: </strong><?php echo $_SESSION['user_id'] ?></li>
							<li>
								<strong>Account Level: </strong>
								<?php 
								if (array_key_exists('user_admin', $_SESSION)) echo 'Administrator';
								elseif (array_key_exists('user_super', $_SESSION)) echo 'Super';
								else echo 'Regular';
								?>
							</li>
						</ul>
					</div>
				</div>
			</div>
		</div><!--end row-->	
	</div>
</div>
<?php 
include ('is/footer.php'); 
?>