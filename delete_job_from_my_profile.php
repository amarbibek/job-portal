<?php
include('connect.php');

?>

<?php
	if(isset($_POST['delete_job_from_my_profile'])){
	//$login_user_id= $_POST['login_user_id'];
	 $profile_id= $_POST['login_user_id'];
	 $job_id= $_POST['job_id'];
	 $uploader_id= $_POST['uploader_id'];
	//$uploader_id= $_POST['uploader_id'];
	$sql="DELETE FROM `requested_for_jobs` WHERE `requested_id`='$profile_id' and `job_id`='$job_id' and `requested_to`='$uploader_id'";
	$check=mysql_query($sql) or die("ddnt!");
	if($check==true){
		header('location:applied_for_jobs.php');
		
	echo 'Job is deleted!!!';
	}
}
