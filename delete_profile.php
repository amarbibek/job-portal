<?php
include('connect.php');

?>

<?php
	
	//$login_user_id= $_POST['login_user_id'];
	echo $profile_id= $_GET['id'];
	//$uploader_id= $_POST['uploader_id'];
	$sql="DELETE FROM `student_register` WHERE `id`='$profile_id'";
	$check=mysql_query($sql) or die("ddnt!");
	if($check==true){
		header('location:view_users.php');
		
	echo 'Job is deleted!!!';
	}
