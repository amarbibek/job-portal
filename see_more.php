<?php
include("head.php");
include("menubar.php");
include("register-login.php");
include('connect.php');

?>
<div id="main-container">
	<?php
	$job_id= $_GET['job_id'];
	$notification_id= $_GET['id'];

	$query="UPDATE `notifications` SET `read`=1 WHERE `id`='$notification_id'";
	mysql_query($query) or die("ddnt wrk!");

	$sql="select * from `jobs` where `id`='$job_id'";
			$result=mysql_query($sql);
			if($result>0){
			    while($row=mysql_fetch_array($result)){
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
			    	// echo $row['name']; 
			    	// echo $row['experience'];
			    	// echo $row['location'];
			    	// echo $row['skills'];
			    	// echo $row['salary'];
			    	if(isset($_SESSION['admin'])){
			    	 echo '<a href="notifications_admin.php">RETURN</a>';
			    	}else{
			    		echo '<a href="notifications.php">RETURN</a>';
			    	}

			    }
		    }




	?>

</div>
<?php
include("footer.php");
?>