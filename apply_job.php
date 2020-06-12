<?php
include("head.php");
include("menubar.php");
include("register-login.php");
include('connect.php');
include('login_redirect.php');
?>
<div id="main-container">
<?php

if(isset($_POST['apply'])){
	
	$login_user_id= $_POST['login_user_id'];
	$job_id= $_POST['job_id'];
	$uploader_id= $_POST['uploader_id'];
	$sql="INSERT INTO `requested_for_jobs` (`requested_id`,`job_id`,`requested_to`) VALUES ('$login_user_id','$job_id','$uploader_id')";
	$check=mysql_query($sql) or die("ddnt!");
	if($check==true){
		echo 'you have applied for the job now!';
	}
}
?>
</div>