<?php
include("head.php");
include("menubar.php");
include("register-login.php");
include('connect.php');

?>
<?php
if(isset($_POST['forgot'])){
	$email=$_POST['email'];
	//$sql="SELECT `student_register`.`id`,`student_register`.`email`,`employee_register`.`id`,`employee_register`.`email` FROM `student_register` JOIN `employee_register` "

	//$sql="SELECT * FROM `student_register`,`employee_register` WHERE `email`='$email'";

	$sql="SELECT `email` FROM `student_register` WHERE `email`='$email' ";
	 echo $result=mysql_query($sql) or die("mail query didn't work!");
	 echo  $count=mysql_num_rows($result);
	 
	 if($count==0){
	 	$sql1="SELECT `email` FROM `employee_register` WHERE `email`='$email' ";
	 echo $result1=mysql_query($sql1) or die("mail query didn't work!");
	 echo $count1=mysql_num_rows($result1);
	  if($count1==1){
	  	$_SESSION['reset_mail']=$email;
	  	$_SESSION['type']="emp";
	  	header('location:email forgot/index.php');
	  }
	}else{
		$_SESSION['reset_mail']=$email;
		header('location:email forgot/index.php');
		$_SESSION['type']="user";
	}
	
}


?>
<div id="main-container">
<div id="forgot_password-form">
<label id="login_head">Please Enter Your Registered Email :</label><br>
	<form action="" method="POST">
	
		<label id="email-lbl">Email&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:</label><input type="text" name="email">
		
		<div id="btn-submit">
		<input id="button" type="submit" name="forgot" value="Send mail">	
		</div>
	</form>
</div>
</div>