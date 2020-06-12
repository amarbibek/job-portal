<?php
include("connect.php");
	$email = trim($_GET['email']);
	//if (isset($_GET['success']) === true && empty($_GET['success']) === true) {
	mysql_query("UPDATE `student_register` SET `active` = 1 WHERE `email` = '$email'");
	echo "<h2>Thanks,we have activated your account...</h2>
<p>you're free to login.</p>";

?>