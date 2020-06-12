<?php
include("head.php");
include("menubar.php");
include("register-login.php");
include('connect.php');
?>
<style type="text/css">
	#button{
    background-color: red;
    color: white;
    padding: 14px 20px;
     margin-top:-15px;
    margin-left:500px;
    border: none;
    cursor: pointer;
    width: 30%
	}
	#job-text{
		font-size: 25px;
		margin-left: 350px;
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


<label id="job-text">Jobs you have applied for:</label> <br>
<?php
$user_id=$_SESSION['id'];
			$sql="select * from `requested_for_jobs` where `requested_id`='$user_id'";
			$result=mysql_query($sql);
			if($result>0){
				//echo '<div class="jobs">';
			    while($row=mysql_fetch_array($result)){
			    	
			    		 $job_id=$row['job_id'];
			    		//$uploader_id=$row['uploader_id'];
			    	//echo $row['id']; 
			    	//echo'<br/>';
			    	//echo $row['requested_id'];
			    	//echo'<br/>';
			    	//echo $row['job_id'];
			    	//echo'<br/>';
			    	//echo $row['requested_to'];
			    	//echo'<br/>';
			    		
			    		$sql1="select * from `jobs` where `id`='$job_id'";
			$result1=mysql_query($sql1);
			if($result1>0){

			    while($row=mysql_fetch_array($result1)){
			    	 echo '<div class="jobs">';
			    		$job_id=$row['id'];
			    		$uploader_id=$row['uploader_id'];
			    		echo '<table>';
			    		echo '<th>';
			    		//echo '<td>';
			    	echo $row['name'];
			    	    //echo '</td>';
			    	    echo '</th>';
			    	    echo '<tr>';
			    	    echo '<td>';
			    	    echo "Exp:";
			    	    echo '</td>';
			    	    echo '<td>';
			    	echo $row['experience'];
			    	echo '</td>';
			    	echo '</tr>';
			    	echo '<tr>';
			    	echo '<td>';
			    	echo "Location:";
			    	echo '</td>';

			    	echo '<td>';
			    	echo $row['location'];
			    	echo '</td>';
			    	echo '</tr>';
			    	echo '<tr>';
			    	echo '<td>';
			    	echo "Key skills:";
			    	echo '</td>';
			    	echo '<td>';
			    	echo $row['skills'];
			    	echo '</td>';
			    	echo '</tr>';
			    	echo '<tr>';
			    	echo '<td>';
			    	echo"sal:";
			    	echo '</td>';
			    	echo '<td>';
			    	echo $row['salary'];
			    	echo '</td>';
			    	echo '</tr>';
			    	echo '<tr>';
			       	echo '<td>';
			    	echo"Posted By:";
			    	echo '</td>';
			    	echo '<td>';
			    	echo $row['posted_by'];
			    	echo '</td>';
			    	echo '<td>';
			    	echo"Posted on:";
			    	echo $row['posted_on'];
			    	echo '</td>';
			    	echo '</tr>';
			    	echo '</table>';
			    	echo '<form action="delete_job_from_my_profile.php" method="POST">';
			    	echo '<input type="hidden" name="login_user_id" value="';echo $user_id;echo' "/>';
			    	echo '<input type="hidden" name="job_id" value="';echo $job_id;echo' "/>';
			    	echo '<input type="hidden" name="uploader_id" value="';echo $uploader_id;echo' "/>';
			    	?>
			    	<input id="button" type="submit" name="delete_job_from_my_profile" onclick="return confirm('Are you sure you wish to delete this job from your profila?');" value="Delete from my profile" />
			    	<?php
			    	echo '</form>';
			    	echo '</div>';
			    }
			    	
			}
		
		}

    }

?>
</div>
</div>
<?php
//include('footer.php');

?>

