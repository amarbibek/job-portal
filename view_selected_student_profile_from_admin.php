<?php
include("head.php");
include("menubar.php");
include("register-login.php");
include('connect.php');

?>
<style type="text/css">
	#my-profile{
		width: 70%;
		height:700px;
		//border:2px solid #fff;
		margin-left: 15%;
	}
	#profile-pic{
		margin-left: 280px;
		height: 250px;
		width: 250px;
	}
	table{
		//margin-left: 230px;
		//margin-top: 10px;
		background-color: #d1d1d1;
	}
	td{
		padding: 5px 2px 5px 5px;
	} 
	#button1 {
    background-color: #4CAF50;
    color: white;
    padding: 14px 20px;
    margin: 0px 10px 0 30px;
    border: none;
    cursor: pointer;
    width: 35%;
}
#button2 {
	position: relative;
	left: 345px;
	top: -56px;
    background-color: red;
    color: white;
    padding: 14px 20px;
    margin: 8px 0 0 50px;
    border: none;
    cursor: pointer;
    width: 45%;
 }
</style>
<?php
if(isset($_POST['select'])){

	$profile_id=$_SESSION['id'];
    $job_id=$_GET['job_id'];
	$applied_user_id=$_POST['applied_user_id'];
	$sql="INSERT INTO `selected_users` (`requested_id`,`requested_to`,`job_id`) VALUES('$applied_user_id','$profile_id','$job_id')";
	mysql_query($sql) or die("ddnt wrk");
	$sql="DELETE FROM `requested_for_jobs` WHERE `requested_id`='$applied_user_id' AND `job_id`='$job_id' AND `requested_to`='$profile_id'";
	mysql_query($sql) or die("couldnt  delete");

	// code to send notification
	$name="selected";
	$sql="INSERT INTO `notifications` (`name`,`applied_user_id`,`job_id`) VALUES('$name','$applied_user_id','$job_id')";

	mysql_query($sql) or die("notification query ddnt work!");

	header("location:employee.php");
	exit;
}
?>

<div id="main-container">
<div id="my-profile">
<?php
 $profile_id=$_GET['id'];
//echo $job_id=$_GET['job_id'];
$sql="SELECT * FROM `profile` WHERE `user_id`='$profile_id'";
$result=mysql_query($sql)or die("hehe");
	if($result>0){
	    while($row=mysql_fetch_array($result)){
	    	 $applied_user_id=$row['user_id'];
	    		    	?>
	    	<img id="profile-pic" src="<?php echo $row['pick'];?>" alt="non" height="100px" width="100px" >
	    	<?php
echo '<table class="table">';
	    	echo"<tr>";
	    	echo"<td>";
	    	echo "Name:";
	    	echo"</td>";
	    	echo"<td>";
	    	echo $row['name'];
	    	echo"</td>";
	    	echo"</tr>";
	    	echo"<tr>";
	    	echo"<td>";
	    	echo "Experience:";
	    	echo"</td>";
	    	echo"<td>";
	    	echo $row['experience']." year(s)";
	    	echo"</td>";
	    	echo"</tr>";
	    	echo"<tr>";
	    	echo"<td>";
	    	echo "Key Skills:";
	    	echo"</td>";
	    	echo"<td>";
	    	echo $row['key_skills'];
	    	echo"</td>";
	    	echo"</tr>";
	    	echo"<tr>";
	    	echo"<td>";
	    	echo "Current Location:";
	    	echo"</td>";
	    	echo"<td>";
	    	echo $row['current_location'];
	    	echo"</td>";
	    	echo"</tr>";
	    	echo"<tr>";
	    	echo"<td>";
	    	echo "Prefered Location:";
	    	echo"</td>";
	    	echo"<td>";
	    	echo $row['prefered_location'];
	    	echo"</td>";
	    	echo"</tr>";
			echo"<tr>";
	    	echo"<td>";
	    	echo "Email:";
	    	echo"</td>";
	    	echo"<td>";
	    	echo $row['email'];
	    	echo"</td>";
	    	echo"</tr>";
	    	echo"<tr>";
	    	echo"<td>";
	    	echo "Contact:";
	    	echo"</td>";
	    	echo"<td>";
	    	echo $row['contact'];
	    	echo"</td>";
	    	echo"</tr>";
	    	echo"<tr>";
	    	echo"<td>";
	    	echo "DOB:";
	    	echo"</td>";
	    	echo"<td>";
	    	echo $row['dob'];
	    	echo"</td>";
	    	echo"</tr>";
	    		    	echo"<tr>";
	    	echo"<td>";
	    	echo "Gender:";
	    	echo"</td>";
	    	echo"<td>";
	    	echo $row['gender'];
	    	echo"</td>";
	    	echo"</tr>";
	    		    	echo"<tr>";
	    	echo"<td>";
	    	echo "Profile Headline:";
	    	echo"</td>";
	    	echo"<td>";
	    	echo $row['headline'];
	    	echo"</td>";
	    	echo"</tr>";
	    	echo"<tr>";
	    	echo"<td>";
	    	echo "Resume:";
	    	echo"</td>";
	    	echo"<td>";
	    	$resume=$row['resume'];
	    	?>
	    	<a href="<?php echo $resume; ?>" >Download  Resume</a>

	    	<?php
	    	//echo $row['resume'];resumes/Resume.docx
	    	echo"</td>";
	    	echo"</tr>";
	    	echo "</table>";
	    	?>
	    	
	    	<?php
	    	if(isset($_SESSION['emp'])){
	    		?>
	    	
	    	
	    	<?php 
	    	}
	    	?>   	

	    	<?php
		}
	 }

?>

</div>
</div>