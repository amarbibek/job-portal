<?php
session_start();
?>
<div id="register">
<?php
if(isset($_SESSION['login'])==true){
	echo '<a href="logout.php">Logout</a> | <a href="change_password.php">Change Password</a>';
	}else{
	echo '<a href="login.php">Login | Register</a>';
}

?>	
</div>