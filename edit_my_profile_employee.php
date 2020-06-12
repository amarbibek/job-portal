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
	//border:2px solid red;

}
input[type=text],input[type=number],input[type=email] {
    width: 65%;
    padding: 8px 15px;
    margin: 15px 0 0 30px;
    display: inline-block;
    border: 1px solid #ccc;
    box-sizing: border-box;
}
label{
	font-size: 20px;
}
form{
	padding-left: 10px;
	padding-top: 10px;
}

#profile-img{
	position: relative;
	left:220px;
	top: -27px; 
}

/*#exp{
	margin-top: -40px;
	}*/

#resume{
	position: relative;
	left:220px;
	top: -30px; 
}

#button{
	background-color: #4CAF50;
    color: white;
    padding: 14px 20px;
    margin-top:10px;
    margin-left:220px;
    border: none;
    cursor: pointer;
    width: 20%

}
</style>
<div id="main-container">
<?php
//include('profile_includes_employee.php');
?>
<?php //include('profile_links.php');?>
<br>
<?php	
$user_id= $_SESSION['id'];
if(isset($_POST['upload'])){
	 $user_id= $_SESSION['id'];
//$experience=$_POST['experience'];
//$skills=$_POST['skills'];
$name=$_POST['name'];
$email=$_POST['email'];
$contact=$_POST['contact'];
$location=$_POST['location'];
$description=$_POST['description'];
$website=$_POST['website'];
$file=$_FILES['images']['name'];
$tem_storage=$_FILES['images']['tmp_name'];
$storage="profile pics/";
move_uploaded_file($tem_storage,$storage.$file);
$file=$storage.$file;


//$resume="resume not found!";
$sql="INSERT INTO `profile_employee` (`user_id`,`image`,`name`,`email`,`contact`,`location`,`description`,`website`) VALUES ('$user_id','$file','$name','$email','$contact','$location','$description','$website')";
  $result=   mysql_query($sql) or die("ddnt!");
if($result){
	echo "sucessfully uploaded";
	header('Location:view_my_profile_employee.php');
}else{
	echo "failed";
}
}

?>
<!-- <label>Edit profile</label> -->
<div id="edit-form">

<form action="" method="POST" enctype="multipart/form-data">
<label>Profile Image&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:</label>
<input id="profile-img" type="file" name="images" /></br>
<label>Name&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:</label>
<input id="" type="text" name="name" placeholder="Enter your name ..."/></br>
<label>Email&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:</label>
<input id="" type="email" name="email" placeholder="Enter your Email..."/></br>
<label>Contact No.&nbsp;:</label><input type="number" name="contact" placeholder="Enter your contact number..."/></br>
<label>Location&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:</label><input type="text" name="location" placeholder="Enter your location..."/></br>
<label>Description&nbsp;&nbsp;:</label><input type="text" name="description" placeholder="Write about your company..." /></br>
<label>Website &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:</label><input type="text" name="website" placeholder="Enter your website link ( Please type http:// brfore your website link ) ..."/></br>
<input id="button" type="submit" name="upload" value="upload"/>
</form>
</div>
</div>
<?php
//include('footer.php');