<?php
session_start();
include("head.php");
include("menubar.php");
include("connect.php");
//include("register-login.php");
?>
<?php
if(isset($_POST['register'])){
$fname=$_POST['fname'];
$lname=$_POST['lname'];
$email=$_POST['email'];
$dob=$_POST['dob'];
$password=$_POST['password'];
$password_again=$_POST['password_again'];
$query="insert into `student_register` (`fname`,`lname`,`email`,`dob`,`password`,`password_again`) values('$fname','$lname','$email','$dob','$password','$password_again')";
$check=mysql_query($query);
if($check){
	$_SESSION['email']=$email;
	header('location:email/index.php');

}
}
?>
<div id="main-container">
	<form action="" method="POST">
		<label>First Name:</label>
		<input type="text" name="fname"><br/>
		<label>Last Name:</label>
		<input type="text" name="lname"><br/>
		<label>Email:</label>
		<input type="text" name="email"><br/>
		<label>DOB:</label>
		<input type="date" name="dob"><br/>
		<label>Password:</label>
		<input type="password" name="password"><br/>
		<label>password again:</label>
		<input type="password" name="password_again"><br/>
		<input type="submit" name="register" value="Register">
	</form>
</div>

<?php
include("footer.php");
?>