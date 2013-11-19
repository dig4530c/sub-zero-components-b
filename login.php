<?php
$page_title = "SubZero Components - Login";
$page_type = "normal";

//Redirect logged in
require_once('./is/config.inc.php');
if (!headers_sent()){
		redirect_logged_in();
		}
else {
	include_once('./is/header.php');
	trigger_error('You are already logged in!');
	include_once('./is/footer.php');
	} //Redirects users already logged in

//Validation
if($_SERVER['REQUEST_METHOD'] == 'POST'){
	include ('is/login.inc.php');
}	

include ('is/header.php'); 
?>

<!-- stuff -->
<div class="container  "><!--  container-->
	<div class="row space">
		<div class="row">
			<div class="fourcol">
			</div>
			<div class="threecol">
				<div class='space'></div>
				<div class='space'></div>
				<div class="title login">
					<h2>Login</h2>
				</div>
				<div id='login'>
					<?php
					include ('is/login_form.inc.php');
					?>
				</div>
			</div>
			<div class="fivecol last">
			</div>
		</div><!--end row-->
	</div>
</div>

<?php 
include ('is/footer.php');
exit();
?>