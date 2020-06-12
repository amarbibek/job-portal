<?php
include('connect.php');

?>

<?php
	if(isset($_POST['remove_job_employee'])){
	//$login_user_id= $_POST['login_user_id'];
	 $profile_id= $_POST['login_user_id'];
	 $job_id= $_POST['job_id'];
	 $uploader_id= $_POST['uploader_id'];
	//$uploader_id= $_POST['uploader_id'];
	$sql="DELETE FROM `jobs` WHERE  `id`='$job_id'";
	$check=mysql_query($sql) or die("ddnt!");
	if($check==true){
		header('location:my_jobs.php');
		
	echo 'Job is deleted!!!';
	}
}
