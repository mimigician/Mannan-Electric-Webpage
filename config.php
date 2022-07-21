<?php
session_start();
$server = "localhost"; //returns host name
$user = "root"; //root is the folder where a PHP script is running.
$pass = ""; 
$database = "signin"; //name of database

$conn = mysqli_connect($server, $user, $pass, $database); //connects database to the server

if (!$conn) {
	die("<script>alert('Connection Failed')</script>");
}
if(isset($_SESSION['checked'])){
	if (isset($_SESSION['login_username']) && !isset($_COOKIE['username'])) {
		session_unset();
		session_destroy();
}
// if(isset($_COOKIE['username'])&&!isset($_SESSION['login_username'])){
// 	$_SESSION['login_username']=$_COOKIE['username'];
// }
}
