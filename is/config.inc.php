<?php

$live = false;
$contact_email = 'admin@subzerocomponents.com';

DEFINE ('BASE_URI', 'sulley.cah.ucf.edu/~ar400093/dig4530c/dig4530c_group03/A/'); //Arissa's Final Sulley
//DEFINE ('BASE_URI', 'sulley.cah.ucf.edu/~ar400093/dig4530c/group4/'); //Arissa's Test Sulley
//DEFINE ('BASE_URI', 'sulley.cah.ucf.edu/~ed490983/dig4530c/subzero/'); //Ed's Final Sulley
//DEFINE ('BASE_URI', 'sulley.cah.ucf.edu/~ed490983/dig4530c/subzero_test/'); //Ed's Test Sulley
//DEFINE ('BASE_URI', 'localhost/subzero/'); // WAMP Testing
DEFINE ('BASE_URL', BASE_URI);
DEFINE ('MYSQL', BASE_URI.'is/dash.php');

session_start();
		
//Redirect non user
function redirect_invalid_user($check = 'user_id', $destination = 'home.php', $protocol = 
	'http://'){
	if (!isset($_SESSION[$check])){
		$url = $protocol.BASE_URL.$destination;
		header("Location: $url");
		exit();
		}
	}
	
//Redirect user or lower
function redirect_non_super($destination = 'home.php', $protocol = 
	'http://'){
	if (!isset($_SESSION['user_admin'])){
		if (!isset($_SESSION['user_super'])){
			$url = $protocol.BASE_URL.$destination;
			header("Location: $url");
			exit();
			}
		}
	}
	
//Redirect super or lower
function redirect_non_admin($destination = 'home.php', $protocol = 
	'http://'){
	if (!isset($_SESSION['user_admin'])){
		$url = $protocol.BASE_URL.$destination;
		header("Location: $url");
		exit();
		}
	}
	
//Redirect logged in user 
	function redirect_logged_in($protocol = 
	'http://'){
	if (isset($_SESSION['user_id'])){
		if (isset($_SESSION['user_admin']) || isset($_SESSION['user_super'])) {
			$url = $protocol.BASE_URL.'cpanel.php';
			header("Location: $url");
			exit();
			}
		else {
			$url = $protocol.BASE_URL.'client.php';
			header("Location: $url");
			exit();
			}
		}
	}