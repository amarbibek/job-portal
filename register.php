<?php
session_start();
include("head.php");
include("menubar.php");
include("connect.php");
//include("register-login.php");
?>
<style type="text/css">
#register_head{
	padding-left: 22%;
	padding-top: 5px;
	padding-bottom: 5px;
	font-size: 25px;
	width: 100%;
	border-bottom: 1px solid black;
	background-color: #98b7ea;
}
	#register-form{
	margin: 10px 10px 0 0;
	height: 435px;
	width:40%;
	border:2px solid black;
	float: right;
	background-color: #eaf2ff;
	}
	form{
	padding-left: 10px;

}
	input[type=text], input[type=password] {
    width: 65%;
    padding: 8px 15px;
    margin: 15px 0 0 30px;
    display: inline-block;
    border: 1px solid #ccc;
    box-sizing: border-box;

}
#button {
    background-color: #4CAF50;
    color: white;
    padding: 14px 20px;
    margin: 8px 0 0 20px;
    border: none;
    cursor: pointer;
    width: 90%;
}
#main-container{
	background-image: url(images/register_banner.jpg);
	background-repeat: no-repeat;
}

</style>
<?php
if(isset($_POST['register'])){
$name=$_POST['name'];

$email=$_POST['email'];
$number=$_POST['number'];

$password=$_POST['password'];
$password_again=$_POST['password_again'];
 $type=$_POST['emp'];
if($type=="on"){
  $type="1";
}else{
	 $type="0";
}

$query="INSERT INTO `student_register` (`name`,`email`,`contact`,`password`,`password_again`,`type`) values('$name','$email','$number','$password','$password_again','$type')";
$check=mysql_query($query)or die("die");
if($check){
	$_SESSION['email']=$email;
	$myfile = fopen("mail-list.txt", "a") or die("Unable to open file!");
	fwrite($myfile, $email);
	fwrite($myfile, "\r\n");
	fclose($myfile);
	header('location:email/index.php');

}
}
?>

<div id="main-container">
<div id="register-form">
    <label id="register_head">Register to MYJOB.com</label><br>
   
	<form id="seeker" action="" method="POST">
		<label>Name&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:</label>
		<input type="text" name="name"><br/>		
		<label>Email&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:</label>
		<input type="text" name="email"><br/>
		<label>Contact&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:</label>
		<input type="text" name="number"><br/>
		<label>Password&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:</label>
		<input type="password" name="password"><br/>
		<label>Re-password&nbsp;:</label>
		<input type="password" name="password_again"><br/>
		 <input type="checkbox" id="checkbox" name="emp" >Recruiter Register
		<input id="button" type="submit" name="register" value="Register">
	</form>


		
</div>
</div>

<?php
//include("footer.php");
?>