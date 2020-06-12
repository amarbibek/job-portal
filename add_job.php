<?php
include("head.php");
include("menubar.php");
include("register-login.php");
include('connect.php');

?>
<style type="text/css">
#new-job-head{
	padding-left: 38%;
	padding-top: 5px;
	padding-bottom: 5px;
	font-size: 25px;
	width: 100%;
	border-bottom: 1px solid black;
	background-color: #98b7ea;
	color:#fff;
}
#add-job-form{
	width: 80%;
	margin-left: 10%;
	height:500px;
	border:2px solid red;
	margin-top: 10px;

}
	form{
	padding-left: 10px;

}
label{
	font-size: 20px;
}
	input[type=text], input[type=number],input[type=date] {
    width: 65%;
    padding: 8px 15px;
    margin: 20px 0 0 30px;
    display: inline-block;
    border: 1px solid #ccc;
    box-sizing: border-box;

}
#button {
    background-color: #4CAF50;
    color: white;
    padding: 14px 20px;
    margin: 20px 0 0 300px;
    border: none;
    cursor: pointer;
    width: 30%;
}
</style>
<div id="main-container">
	
	<?php	
//echo $user_id= $_SESSION['id'];
if(isset($_POST['upload'])){
	 $user_id= $_SESSION['id'];
$experience=$_POST['experience'];
$skills=$_POST['skills'];
$name=$_POST['name'];
$location=$_POST['location'];
$salary=$_POST['salary'];
$date=$_POST['date'];

$sql="INSERT INTO `jobs` (`uploader_id`,`name`,`experience`,`location`,`skills`,`salary`,`posted_on`) VALUES ('$user_id','$name','$experience','$location','$skills','$salary','$date')";
  $result=mysql_query($sql) or die("ddnt!");
if($result){
	echo "sucessfully uploaded";
	//header('Location:add_job.php');
}else{
	echo "failed";
}

//code to find the last job added in database-->starts here

$sql1="SELECT * FROM `jobs` ORDER BY id DESC LIMIT 1";
  $result1=mysql_query($sql1) or die("ddnt!!!!");
if($result1){
	 while($row=mysql_fetch_array($result1)){
			    	 $job_id= $row['id'];
			    	$query="INSERT INTO `notifications` (`name`,`job_id`,`read`,`emp_id`) VALUES('job_added','$job_id','0','$user_id')";
 					 $result=mysql_query($query) or die("ddnt!");
					if($result){
					//echo "notification added!";
					//header('Location:add_job.php');
					}else{
					echo "failed";
					}
	 }
	
}else{
	echo "failed";
}




//code to find the last job added in database-->ends here


// code for admin-notification

// $query="INSERT INTO `notifications` (`name`,`read`,`emp_id`) VALUES('job_added','0','$user_id')";
//   $result=mysql_query($query) or die("ddnt!");
// if($result){
// 	echo "notification added!";
// 	header('Location:add_job.php');
// }else{
// 	echo "failed";
// }
}

?>
<div id="add-job-form">
<label id="new-job-head">Add New Job</label>

<form action="" method="POST">
 <label>Job Name&nbsp;&nbsp;&nbsp;:</label><input type="text" name="name" placeholder="Enter the job name..." /></br>
<label>Experience&nbsp;:</label><input type="text" name="experience" placeholder="Enter reqiured experience (in years)..."/></br>
<label>Location&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:</label><input type="text" name="location" placeholder="Enter the job location..."/></br>
<label>Key Skills&nbsp;&nbsp;&nbsp;:</label><input type="text" name="skills" placeholder="Enter required key skills..."/></br>
<label>Salary&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:</label><input type="number" name="salary" placeholder="Enter the salary offered..."/></br>
<label>Date&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:</label><input type="date" name="date" /></br>

<input id="button" type="submit" name="upload" value="Add New Job"/>
</form>

</div>
</div>
<?php
//include("footer.php");
?>