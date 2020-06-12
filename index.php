<?php
include("head.php");
include("menubar.php");
include("register-login.php");
include('connect.php');

?>
<div id="main-container-index">
	<div id="slides">
<?php
if(isset($_SESSION['admin'])==true){
		// 	echo '<div id="profile_section">
		// <a href="view_my_profile_employee.php">Emp Profile</a>
		// <a href="notifications.php"> Emp notifications</a>
		// </div>';
        //echo'<a href="employee.php">Admin Section</a>';
}elseif(isset($_SESSION['emp'])==true){
		// 	echo '<div id="profile_section">
		// <a href="view_my_profile_employee.php">Emp Profile</a>
		// <a href="notifications.php"> Emp notifications</a>
		// </div>';
        //echo'<a href="employee.php">Employee section</a>';
} elseif(isset($_SESSION['login'])==true){
	
	?>
		<div id="profile_section">
		<!--<a href="view_my_profile.php">Profile</a>-->
		
		</div>
	<?php

}elseif(isset($_SESSION['admin'])){
	echo "this is employee zone!";
}
	?>
	<img src="images/slide1.jpg" height="500px" width="100%">

</div>
<?php
include("footer.php");
?>
</div>
