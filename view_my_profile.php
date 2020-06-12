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
		border:2px solid #fff;
		background-color: #d1d1d1;
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
	#profile_background{
		background-image: url("images/profile-background.jpg");
	}
</style>
<div id="main-container">
<div id="profile_background">
<?php
include('profile_includes.php');
?>
<?php //include('profile_links.php');?>
<div id="my-profile">
<br>
<?php
$user_id=$_SESSION['id'];
$query="SELECT `user_id` FROM `profile` WHERE `user_id`='$user_id'";
$result=mysql_query($query) or die("query ditn't work!");
$exists=mysql_num_rows($result);
if($exists==1){



$sql="SELECT * FROM `profile` WHERE `user_id`='$user_id'";
$result=mysql_query($sql)or die("hehe");
	if($result>0){
	    while($row=mysql_fetch_array($result)){

	    	?>
	    	<img id="profile-pic" src="<?php echo $row['pick'];?>" alt="non" height="100px" width="100px" >
	    	<?php
	    	echo"<br>";
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
		}
	 }
	}else{
		echo "<h3>Please click here make profile!";
		echo '<a href="edit_my_profile.php"> Add Profile</h3></a>';
	}

?>
	</div>
</div>
</div>
