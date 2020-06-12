<?php
include("head.php");
include("menubar.php");
include("register-login.php");
include('connect.php');
?>
<style type="text/css">
/*#edit-form{
	width: 80%;
	margin-left: 10%;
	height:475px;
	border:2px solid red;

}
input[type=text],input[type=number] {
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
#exp {
	margin-top: -40px;


	}
#resume{
	position: relative;
	left:220px;
	top: -30px; 
}*/
#button{
	    background-color: #4CAF50;
    color: white;
    padding: 14px 20px;
     margin-top:-15px;
    margin-left:220px;
    border: none;
    cursor: pointer;
    width: 20%

}
#profile_background{
		background-image: url("images/profile-background.jpg");
	}
</style>
<div id="main-container">
<div id="profile_background">
<?php
include('profile_includes.php');
?>
<?php //include('profile_links.php');?>
<br>
<?php	
$user_id= $_SESSION['id'];
if(isset($_POST['update'])){
	 $user_id= $_SESSION['id'];
$name=$_POST['name'];
$experience=$_POST['experience'];
$skills=$_POST['skills'];
$current_loc=$_POST['current_loc'];
$prefered_loc=$_POST['prefered_loc'];
$email=$_POST['email'];
$contact=$_POST['contact'];
$dob=$_POST['dob'];
$gender=$_POST['gender'];
$headline=$_POST['headline'];

 $file=$_FILES['images']['name'];
$tem_storage=$_FILES['images']['tmp_name'];
$storage="profile pics/";
move_uploaded_file($tem_storage,$storage.$file);
$file=$storage.$file;

$resume=$_FILES['resume']['name'];
$tem_storage1=$_FILES['resume']['tmp_name'];
$storage1="resumes/";
move_uploaded_file($tem_storage1,$storage1.$resume);
$resume=$storage1.$resume;
//$resume="resume not found!";
// $sql="INSERT INTO `profile` (`user_id`,`pick`,`name`,`experience`,`key_skills`,`current_location`,`prefered_location`,`email`,`contact`,`dob`,`gender`,`headline`,`resume`) VALUES ('$user_id','$file','$name','$experience','$skills','$current_loc','$prefered_loc','$email','$contact','$dob','$gender','$headline','$resume')";
$sql="UPDATE `profile` SET `pick`='$file' , `name`='$name' , `experience`= '$experience' , `key_skills`= '$skills' , `current_location`='$current_loc' , `prefered_location`= '$prefered_loc' , `email`='$email' , `contact`='$contact' , `dob`='$dob' , `gender`='$gender' , `headline`='$headline' , `resume`='$resume' where `user_id`='$user_id' ";
  $result=   mysql_query($sql) or die("ddnt!");
if($result){
	echo "sucessfully updated";
	header('Location:view_my_profile.php');
}else{
	echo "failed";
}
}

?>

<?php
 $user_id= $_SESSION['id'];
$query="SELECT * FROM `profile` where `user_id`='$user_id'";
$result=mysql_query($query) or die("could not fetch profile data");
if($result){
	if(mysql_num_rows($result)>=1){
		while ($row=mysql_fetch_array($result)) {
			$pick=$row['pick'];
			$name=$row['name'];
			$experience=$row['experience'];
			$key_skills=$row['key_skills'];
			$current_location=$row['current_location'];
			$prefered_location=$row['prefered_location'];
			$email=$row['email'];
			$contact=$row['contact'];
			$dob=$row['dob'];
			$gender=$row['gender'];
			$headline=$row['headline'];
			$resume=$row['resume'];
		

?>


<div class="jumbotron">
		<div id="edit-form">

		<form action="" method="POST" enctype="multipart/form-data">
			<div class="row">
			 	<div class="form-group">
				<label for="images" class="col-sm-3 col-md-offset-1 control-label">Profile image</label>
		       		<div class="col-sm-6 ">
		  	   			<input type="file" name="images" value="<?php  echo $images; ?>" class="form-control" id="images">
		       		</div>
		       	</div> 
	   		</div>
	    <br>
	    	<div class="row">
			 	<div class="form-group">
				<label for="name" class="col-sm-3 col-md-offset-1 control-label">Name</label>
		       		<div class="col-sm-6 ">
		  	   			<input type="text" name="name" value="<?php  echo $name; ?>" class="form-control" id="name">
		       		</div>
		       	</div> 
	   		</div>
	    <br>
	    	<div class="row">
			 	<div class="form-group">
				<label for="experience" class="col-sm-3 col-md-offset-1 control-label">Experience</label>
		       		<div class="col-sm-6 ">
		  	   			
			<select name="experience" class="form-control">
			<?php
			$query="select * from `experience`";
			$result=mysql_query($query) or die("nope!");
			while ($row=mysql_fetch_array($result)) {
				echo '<option value="'; echo $row['values']; echo '">'; echo $row['values']; echo'</option>';
			}


			?>
			</select></br>
		       		</div>
		       	</div> 
	   		</div>
	    <br>
	    	<div class="row">
			 	<div class="form-group">
				<label for="skills" class="col-sm-3 col-md-offset-1 control-label">Key Skills</label>
		       		<div class="col-sm-6 ">
		  	   			<input type="text" name="skills" value="<?php  echo $key_skills; ?>" class="form-control" id="skills">
		       		</div>
		       	</div> 
	   		</div>
	    <br>
	    	<div class="row">
			 	<div class="form-group">
				<label for="current_loc" class="col-sm-3 col-md-offset-1 control-label">Current Location</label>
		       		<div class="col-sm-6 ">
		  	   			<input type="text" name="current_loc" value="<?php  echo $current_location; ?>" class="form-control" id="current_loc">
		       		</div>
		       	</div> 
	   		</div>
	    <br>
	    	<div class="row">
			 	<div class="form-group">
				<label for="prefered_loc" class="col-sm-3 col-md-offset-1 control-label">Prefered Location</label>
		       		<div class="col-sm-6 ">
		  	   			<input type="text" name="prefered_loc" value="<?php  echo $prefered_location; ?>" class="form-control" id="prefered_loc">
		       		</div>
		       	</div> 
	   		</div>
	    <br>
	    	<div class="row">
			 	<div class="form-group">
				<label for="email" class="col-sm-3 col-md-offset-1 control-label">Email</label>
		       		<div class="col-sm-6 ">
		  	   			<input type="email" name="email" value="<?php  echo $email; ?>" class="form-control" id="email">
		       		</div>
		       	</div> 
	   		</div>
	    <br>
	    <div class="row">
			 	<div class="form-group">
				<label for="contact" class="col-sm-3 col-md-offset-1 control-label">Contact No.</label>
		       		<div class="col-sm-6 ">
		  	   			<input type="number" name="contact" value="<?php  echo $contact; ?>" class="form-control" id="contact">
		       		</div>
		       	</div> 
	   		</div>
	    <br>
	        <div class="row">
			 	<div class="form-group">
				<label for="dob" class="col-sm-3 col-md-offset-1 control-label">DOB</label>
		       		<div class="col-sm-6 ">
		  	   			<input type="date" name="dob" value="<?php  echo $dob; ?>" class="form-control" id="dob">
		       		</div>
		       	</div> 
	   		</div>
	    <br>
	    	<div class="row">
			 	<div class="form-group">
				<label for="gender" class="col-sm-3 col-md-offset-1 control-label">Gender</label>
		       		<div class="col-sm-6 ">
		  	   			<select name="gender" class="form-control">
							<option value="male">Male</option>
							<option value="female">Female</option>
							<option value="other">Other </option>
						</select>
		       		</div>
		       	</div> 
	   		</div>
	    <br>
	   		 <div class="row">
			 	<div class="form-group">
				<label for="headline" class="col-sm-3 col-md-offset-1 control-label">Resume Headline</label>
		       		<div class="col-sm-6 ">
		  	   			<input type="text" name="headline" value="<?php  echo $headline; ?>" class="form-control" id="headline">
		       		</div>
		       	</div> 
	   		</div>
	    <br>
	    	<div class="row">
			 	<div class="form-group">
				<label for="resume" class="col-sm-3 col-md-offset-1 control-label">Resume</label>
		       		<div class="col-sm-6 ">
		  	   			<input type="file" name="resume" value="<?php  echo $resume; ?>" class="form-control" id="resume">
		       		</div>
		       	</div> 
	   		</div>
	    <br>
	    <br>
	   
	    	<div class="row">
			 	<div class="form-group">
				<!-- <label for="resume" class="col-sm-3 control-label">Resume</label> -->
		       		<div class="col-md-10 col-md-offset-2">
		  	   			<input type="submit" name="update" value="Update"   id="button">
		       		</div>
		       	</div> 
	   		</div>
	    <br>
	    <!-- previous code -->
			<!-- <label>Profile Image&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:</label>
			<input id="profile-img" type="file" name="images" /></br>
			<div id="name">
			<label>Name&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:</label>
			<input id="" type="text" name="name" /></br>
			</div>
			<div id="exp">
			<label>Experience&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:</label>
			<select name="experience"> -->
			<?php
			// $query="select * from `experience`";
			// $result=mysql_query($query) or die("nope!");
			// while ($row=mysql_fetch_array($result)) {
			// 	echo '<option value="'; echo $row['values']; echo '">'; echo $row['values']; echo'</option>';
			// }


			?>
			<!-- </select></br>
			</div>
			<label>Key Skills&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:</label><input type="text" name="skills" placeholder="Enter your key skills (eg.: c,c++, etc)..." /></br>
			<label>Current Location&nbsp;&nbsp;&nbsp; :</label><input type="text" name="current_loc" placeholder="Enter your current location..."/></br>
			<label>Prefered Location &nbsp;:</label><input type="text" name="prefered_loc" placeholder="Enter your prefered location..."/></br>
			<label>Email&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:</label>
			<input id="" type="email" name="email" /></br>
			<label>Contact No.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:</label><input type="number" name="contact" placeholder="Enter your contact number..."/></br><br>
			<label>DOB&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:</label>
			<input id="" type="date" name="dob" /></br>
			<label>Gender&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:</label>

			<select name="gender">
				<option value="male">Male</option>
				<option value="female">Female</option>
				<option value="other">Other </option>
			</select></br>
			<label>Resume Headline&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:</label>
			<textarea name="headline"></textarea>
			<br/>
			<label>Resume&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:</label>
			</br><input id="resume" type="file" name="resume" /></br> -->
			<!-- <input id="button" type="submit" name="upload" value="upload"/> -->
			</form>
		</div>
		</div>
</div>

</div>




<?php
}
	}
}

?>
<?php
//include('footer.php');