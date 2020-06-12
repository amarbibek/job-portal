<?php
include("head.php");
include("menubar.php");
include("register-login.php");
include('connect.php');

?>
<style type="text/css">
	table{
		//margin-left: 200px;
		//margin-top: 10px;
		background-color: #d1d1d1;
	}
	td{
		//padding: 5px 20px 5px 20px;
	}
	th{
	//text-align:center;
	//padding: 0px 10px 0px 10px;
	}

</style>
<div id="main-container">
<strong>Selected Candidates For The Interview : </strong><br/>
<?php
$id=$_SESSION['id'];
$sql="SELECT * FROM `selected_users` where `requested_to`='$id'";
$result=mysql_query($sql)or die("hehe");
	if($result>0){
	   
	    	?>

	    	<table class="table">
			    	<tr>
			    	 
			    	<th>
			    	SELECTED CANDIDATES
			    	</th>
			    	
			    	<th>
			    	JOB NAME
			    	</th>

			    	
			    	<th>
			    	POSTED ON
			    	</th>

			    	<th>
			    	VIEW PROFILE
			    	</th>
			    	<th>
			    	CALL FOR INTERVIEW
			    	</th>
			    	</tr>
				<?php
			    while($row=mysql_fetch_array($result)){
			    	 $requested_id= $row['requested_id']; 
			    	$job_id= $row['job_id']; 
			    	//$selected_on=$row['selected_on'];
			    	?>
			    	<?php
			    	$sql1="SELECT * FROM `profile` where `user_id`='$requested_id'";
			    	$result1=mysql_query($sql1)or die("hehe");
			if($result1>0){
			    while($row=mysql_fetch_array($result1)){
			    	?>
			    	<tr>
			    	<td>
			    	<?php echo $row['name']; ?>
			    	</td>
			    	<?php
			   		 	}
					}
					?>
					<?php
			    	$sql2="SELECT * FROM `jobs` where `id`='$job_id'";
			    	$result2=mysql_query($sql2)or die("hehe");
			if($result2>0){
			    while($row=mysql_fetch_array($result2)){
				?>
				<td>
			    	<?php echo $row['name']; ?>
			    	</td>
			    	<td>
			    	<?php echo $row['posted_on']; ?>
			    	</td>
                    
			    	<?php
			   		 	}
			   		 	
					}
					?>
										<td>
			    	<a href="view_selected_student_profile_from_employee.php?id=<?php echo $requested_id; ?>& job_id=<?php echo $job_id; ?>">See here</a>
			    	</td>
			    	<td>
			    		<a href="call_for_interview.php?id=<?php echo $id; ?>&requested_id=<?php echo $requested_id; ?>">Call for interview</a>
			    	</td>
					<?php
			    		echo '</tr>';
	    }
	}
?>
</table>
</div>
<?php
//include("footer.php");
?>