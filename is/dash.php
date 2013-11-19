<?php
//Sulley Environment 
$mysqli = new mysqli("sulley.cah.ucf.edu", "ar400093", "group3", "ar400093");

//Edgardo's Local Environment
//$mysqli = new mysqli("localhost", "root", "", "subzero");

//<<<<<<< HEAD
//KATHERINE
//$mysqli = new mysqli("localhost", "Lily", "lily", "ka088453");
/*=======
//Edgardo's Sulley
$mysqli = new mysqli("sulley.cah.ucf.edu", "ed490983", "54nd0p4n", "ed490983");
>>>>>>> fee49f8d52b04b7a686723d493196d1f6b75ef5e*/

//Check connection 
if ($mysqli->connect_errno) {
    printf("Connect failed: %s\n", $mysqli->connect_error);
    exit();
}

//Set charset
mysqli_set_charset($mysqli, 'utf-8');

//Escape function
function escape_data($data){
	global $mysqli;
	if(get_magic_quotes_gpc()){
		$data = stripslashes($data);
		}
	return mysqli_real_escape_string(trim($data), $mysqli);
	} // End of the escape data function.

//Password hashing
function get_password_hash($password) {
	global $mysqli;
	return mysqli_real_escape_string ($mysqli, hash_hmac('sha256', $password, 'c#haRl891', true));
	}