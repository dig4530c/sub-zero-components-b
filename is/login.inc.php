<?php
require_once ('./is/dash.php');
require_once ('./is/config.inc.php');
$login_errors = array();
$host = $_SERVER['HTTP-HOST'];
$uri = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');

//Validate Username
if (!empty($_POST['username'])){
	$u = mysqli_real_escape_string($mysqli, $_POST['username']);
	}
else {
	$login_errors['username'] = 'Please enter your username.';
	}
	
//Validate Password
if (!empty($_POST['pass'])){
	$p = mysqli_real_escape_string($mysqli, $_POST['pass']);
	}
else {
	$login_errors['pass'] = 'Please enter your password.';
	}
	
//If no errors exists, query the database
if (empty($login_errors)){
	$q = "SELECT id, username, user_type FROM users WHERE (username = '".$u."' AND pass='".get_password_hash($p)."');";
	$r = mysqli_query($mysqli, $q);
	if (mysqli_num_rows($r) == 1){
		$row = mysqli_fetch_array($r, MYSQLI_NUM);
		if ($row[2] == "admin" && $page_type == "admin") { // If it's an admin in admin.php
			$_SESSION['user_id'] = $row[0];
			$_SESSION['username'] = $row[1];
			$_SESSION['user_admin'] = true;
			header("Location: $host$uri/cpanel.php");
			exit();
			}
		elseif ($row[2] == "super" && $page_type == "super") { // If it's a super user in super.php
			$_SESSION['user_id'] = $row[0];
			$_SESSION['username'] = $row[1];
			$_SESSION['user_super'] = true;
			header("Location: $host$uri/cpanel.php");
			exit();
			} 
		elseif ($row[2] == "normal" && $page_type == "normal") { // If it's a normal user in login.php
			$_SESSION['user_id'] = $row[0];
			$_SESSION['username'] = $row[1];
			header("Location: $host$uri/home.php");
			exit();
			}
		else { // Error message for users not in their respective login pages
			$login_errors['login'] = 'The username and password do not match those on file.';
			}
		}
	else {
		$login_errors['login'] = 'The username and password do not match those on file.';
		}
	} // End of $login_errors IF.