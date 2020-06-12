<?php
include("head.php");
include("menubar.php");
include("register-login.php");
include('connect.php');

?>
<style type="text/css">
#edit-form{
	width: 80%;
	margin-left: 10%;
	height:475px;
	border:2px solid red;

}
input[type=text] {
    width: 65%;
    padding: 8px 15px;
    margin: 25px 0 0 30px;
    display: inline-block;
    border: 1px solid #ccc;
    box-sizing: border-box;


}
label{
	font-size: 20px;
}
form{
	padding-left: 80px;
	padding-top: 30px;
}


#button{
	    background-color: #4CAF50;
    color: white;
    padding: 14px 20px;
    margin-top:30px;
    margin-left:220px;
    border: none;
    cursor: pointer;
    width: 20%

}
</style>
<?php

	$email = trim($_GET['email']);
	$type = trim($_GET['type']);
	//if($type=="emp"){
	//if (isset($_GET['success']) === true && empty($_GET['success']) === true) {
	//mysql_query("UPDATE `employee_register` SET `active` = 1 WHERE `email` = '$email'");
	//echo "<h2>Thanks,we have activated your account...</h2>
//<p>you're free to login.</p>";

//}

?>
<?php
	if (isset($_POST['change'])){
		 //$id=$_SESSION['id'];
		//$current=$_POST['current'];
		$new=$_POST['new'];
		$new_again=$_POST['new_again'];
		if($new!="" && $new_again!=""){
			if($new==$new_again){
			if($type=="emp"){	
				
					//now we can change password here
					$sql="UPDATE `employee_register` SET `password`='$new' WHERE `email`='$email'";
					$result=mysql_query($sql) OR die("Update query didn't work!");
					if($result){
						echo "Password changed successfully!";
					}
				
				}elseif($type=="user"){
					$sql="UPDATE `student_register` SET `password`='$new' WHERE `email`='$email'";
					$result=mysql_query($sql) OR die("Update query didn't work!");
					if($result){
						echo "Password changed successfully!";
					}
					}else{

							echo "something went wrong in reset link!!!";
						}
		
					}else{
				echo " Password didn't match!!!";
			}
			}else{
					echo "fields can't be null!!";
					}
	}

?>

<div id="main-container">
<div id="change-password-form">

<form action="" method="POST">



<label>New Password&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:</label><input type="text" name="new" placeholder="Enter your new password..." /></br>
<label>Re-password&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; :</label><input type="text" name="new_again" placeholder="Re-enter your new password..." /></br>

<input id="button" type="submit" name="change" value="Change Password"/>
</form>
</div>
	
</div>