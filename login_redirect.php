<?php
include("head.php");
include("menubar.php");
//include("register-login.php");
include('connect.php');
//session_start();
//echo $_SESSION['login'];
if(isset($_SESSION['login'])==true){
	
}else{
	header('location:login_redirected.php');
	exit;
}