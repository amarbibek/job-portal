<?php
include("head.php");
include("menubar.php");
include("register-login.php");
include('connect.php');

?>
<style type="text/css">
	#notifications{
		position: absolute;
		left:350px;
		top: 50px;
	}
	#notification_texts{
		position: absolute;
		left: 50px;
		top: 20px;
	}
	.notifications_list{
		border-bottom: 2px solid blue;
		background-color: #dce0e8;
	}
	.notifications_list_read{
		border-bottom: 2px solid blue;
		background-color: #ffffff;
	}
	#main-container{
		//background-image: url("images/profile-background.jpg");
	}
</style>

<div id="main-container">
<div id="jumbotron">
	<div id="notifications">
	<?php
	$profile_id=$_SESSION['id'];
	$sql="SELECT * FROM `notifications` where `name`='job_added'";
    $result=mysql_query($sql)or die("hehe");
    $count=mysql_num_rows($result);

    //for counting of unread notifications
    $sql1="SELECT * FROM `notifications` where `name`='job_added' AND `read`=0";
    $result1=mysql_query($sql1)or die("hehe");
    $count1=mysql_num_rows($result1);
    echo '<div id="notification_text">';
    echo '<h3>you have <strong>('; echo $count1; echo')</strong> new  notifications!!!</h3>';
    echo '</div>';
    echo "<br/>";
			if($result>0){
			    while($row=mysql_fetch_array($result)){
			    	 $notification_id= $row['id']; 
			    	 //$requested_id= $row['applied_user_id']; 
			    	  $name= $row['name'];
			    	   $job_id= $row['job_id'];
			    	  $read= $row['read'];
			    	  if($read==0){
			    	  echo '<div class="notifications_list">';
			    	 $sql1="SELECT * FROM `jobs` where `id`='$job_id'";
			    	 	$result1=mysql_query($sql1) or die("job name!");
			    	 if($result1>0){
			    	 		while($row1=mysql_fetch_array($result1)){
			    	 			echo $job_name= $row1['name']; 

			    	 	}
			    	 	}
			    	 if($name=="job_added"){
			    	 	
			    	 	echo "&nbsp;<--One job is posted!!";
			    	 	?>
			    	 	<a href="see_more.php?job_id=<?php echo $job_id ;?>&id=<?php echo $notification_id ;?>">see more</a>
			    	 	<?php
			    	 	
			    	 	echo '</div>';
			    	 	
			    	 }
			    	}else{

			    			  echo '<div class="notifications_list_read">';
			    	 	$sql1="SELECT * FROM `jobs` where `id`='$job_id'";
			    	 	$result1=mysql_query($sql1) or die("job name!");
			    	 	if($result1>0){
			    	 		while($row1=mysql_fetch_array($result1)){
			    	 			echo $job_name= $row1['name']; 

			    	 		}
			    	 	}
			    	 if($name=="job_added"){
			    	 	
			    	 	echo "&nbsp;<--One job is posted!!";
			    	 	?>
			    	 	<a href="see_more.php?job_id=<?php echo $job_id ;?>&id=<?php echo $notification_id ;?>">see more</a>
			    	 	<?php
			    	 	
			    	 	echo '</div>';
			    	 	
			    	 	


			    	}
			    	 echo"<br/>";
			    	}
			    }
		    }


	?>
</div>
<div id="notifications_unread">

	
</div>
</div>
</div>