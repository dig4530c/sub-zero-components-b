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
	
$page_title = "SubZero Components - Registration Complete";
include ('is/header.php');
include ('is/dash.php');
?>

<div class="container  "><!--  container-->
	<div class="row space">
		<div class="row">
			<div class="fourcol">
			</div>
			<div class="threecol">
				<div class='space'></div>
				<div class='space'></div>
				<div class="title register">
					<h2>Thank you for registering!</h2>
				</div>
				<div class="supervmargin">
					<a href="home.php" class="generic-btn">Home</a>
				</div>
			</div>
		</div>
	</div>
</div>

<?php 
include ('is/footer.php');
exit();
?>