<?php
error_reporting(0);
session_start();
?>
<body>
<div id="menubar">
	<div id="logo">
		<a href="index.php"><img src="images/logo.jpg" height="70px" width="70px"></a>
		
	</div>
	<div id="company-name">
		MYJOB.com
		
	</div>
		<?php

if(isset($_SESSION['admin'])==true){
	?>
	<div class="navs">
		<a href="add_admin.php">ADD ADMIN</a>
		<a href="view_users.php">VIEW USERS</a>
		<a href="view_employees.php">VIEW EMPLOYEES</a>
		<a href="view_jobs.php">VIEW JOBS</a>
		<a href="notifications_admin.php">NOTIFICATIONS</a>
	</div>

	<?php

}elseif(isset($_SESSION['emp'])==true){
	?>
	<div class="navs">
		<a href="employee.php">REQUESTS</a>
		<a href="selected_candidates.php">CANDIDATES</a>
		<a href="my_jobs.php">MY JOBS</a>
		<a href="add_job.php">ADD JOB</a>
		<a href="view_my_profile_employee.php">VIEW PROFILE</a>
		<!--<a href="edit_my_profile_employee.php">EDIT PROFILE</a> 
		 <a href="notifications.php">NOTIFICATIONS</a>-->
	</div>
		<?php
	}else{
		?>
	<div class="navs">
		<a href="index.php">HOME</a>
		<a href="jobs.php">JOBS</a>
		<a href="view_my_profile.php">MY PROFILE</a>
		<a href="about-us.php">ABOUT US</a>
		<a href="contact-us.php">CONTACT US</a>
	</div>
		
		<?php
	}	
		?>		
	
</div>

