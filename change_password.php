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
#profile_background{
		background-image: url("images/profile-background.jpg");
	}
</style>
<?php
	if (isset($_POST['change'])){
		 $id=$_SESSION['id'];
		$current=$_POST['current'];
		$new=$_POST['new'];
		$new_again=$_POST['new_again'];
		if($new!="" && $new_again!="" && $current!=""){
			
		$sql="SELECT `password` FROM `student_register` WHERE `id`='$id'";
		$result=mysql_query($sql) OR die("didnt work");
		if ($result){
			while ($row=mysql_fetch_array($result)) {
				if ($current==$row['password']){
					//echo "password is correct!!";
					
					if ($new==$new_again){
						//now we can change password here
						$sql="UPDATE `student_register` SET `password`='$new' WHERE `id`='$id'";
						$result=mysql_query($sql) OR die("Update query didn't work!");
						if ($result){
							echo "Password changed successfully!";
						}
					}else{
						echo "Password didn't match!!!";
					}

				}else{
					echo "password is incorrect!!";
				}
			
			}
		}
		
		}else{
				echo " fields can't be null!!";
			}
	}

?>
<div id="main-container">
<div id="profile_background">
<div id="change-password-form">

<form action="" method="POST">

<label>Current Password&nbsp;&nbsp;:</label><input  type="text" name="current" placeholder="Enter your current password..." required /></br>

<label>New Password&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:</label><input type="text" name="new" placeholder="Enter your new password..." required/></br>
<label>Re-password&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; :</label><input type="text" name="new_again" placeholder="Re-enter your new password..." required/></br>

<input id="button" type="submit" name="change" value="Change Password"/>
</form>
</div><br>
	</div>
</div>