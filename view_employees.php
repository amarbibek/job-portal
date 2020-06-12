<?php
include("head.php");
include("menubar.php");
include("register-login.php");
include('connect.php');
 $id= $_SESSION['id'];
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
<!-- this is employee zone!<br/>
you got some requests here!<br/> -->
<!-- <div id="selected-candidate">
<a href="view_my_profile_employee.php">Emp Profile</a>
<a href="notifications.php"> Emp notifications</a>
<a href="selected_candidates.php">Selected candidates</a>
<a href="add_job.php">Add new job</a>
</div> -->
<?php
$sql="SELECT * FROM `student_register` where `type`='1'";
$result=mysql_query($sql) or die("hehe");
			if($result>0){				
				?>
					<table class="table">
			    	<tr>
			    	 
			    	<th>
			    	Name
			    	</th>
			    	<th>
			    	View Profile
			    	</th>
			    	<th>
			    	Actions
			    	</th>			    	
			    	</tr>
				<?php
			    while($row=mysql_fetch_array($result)){
			    	$profile_id=$row['id'];
			    	?>
			    	<tr>
			    	<td>
			    	<?php echo $row['name']; ?>
			    	</td>
					<td>
			    	<a href="view_employee_profile.php?id=<?php echo $profile_id; ?>">See here</a>
			    	</td>
			    	<td>
			    	<a href="delete_profile.php?id=<?php echo $profile_id; ?>" onclick="return confirm(' you wish to delete this employee account profile?');" >Delete</a>
			    	</td>
			    	
					<?php
			    		echo '</tr>';
			    }
			    
		    }
?>
</table>
</div>