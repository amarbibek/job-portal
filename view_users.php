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

<?php
$sql="SELECT * FROM `student_register` where `type`='0'";
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
			    	<a href="view_selected_student_profile_from_admin.php?id=<?php echo $profile_id; ?>">See here</a>
			    	</td>
			    	<td>
			    	<a href="delete_profile.php?id=<?php echo $profile_id; ?>" onclick="return confirm(' you wish to delete this user profile?');">Delete</a>
			    	</td>
			    	
					<?php
			    		echo '</tr>';
			    }
			    
		    }
?>
</table>
</div>