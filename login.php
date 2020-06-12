<?php
session_start();
include("head.php");
include("menubar.php");
include("connect.php");
//include("register-login.php");
?>
<style type="text/css">
#login_head{
	padding-left: 25%;
	padding-top: 5px;
	padding-bottom: 5px;
	font-size: 25px;
	width: 100%;
	border-bottom: 1px solid black;
	background-color: #98b7ea;
}
form{
	padding-left: 10px;

}
#login-form{
	margin: 10px 10px 0 0;
	height: 500px;
	width:40%;
	border:2px solid black;
	float: right;
	
	background-color: #eaf2ff;
}
	input[type=text], input[type=password] {
    width: 70%;
    padding: 12px 25px;
    margin: 15px 0 0 30px;
    display: inline-block;
    border: 1px solid #ccc;
    box-sizing: border-box;

}
#email-lbl,#pass-lbl{
	float: left;
	font-size: 20px;
	padding-top: 25px;
}
#forgot{
	float: right;
	padding-right: 5px;
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
#keep_logged_in{
	position: absolute;
	left: 62%;
	top:53%;
	clear: both;
	font-size: 16px;
}
#btn-submit{
	clear: both;
}
#register-here{
	margin-top:70px; 
	clear: both;
	height: 10%;
	background-color: #e1e6ef;
}
#main-container{
	background-image: url(images/slide2.jpg);
}
</style>
<?php
if(isset($_POST['login'])){
$email=$_POST['email'];
$password=$_POST['password'];

$sql="SELECT * from `student_register` where `email`='$email' and `password`='$password' and `active`=1";
echo $result=mysql_query($sql) or die("oops"); 
if(mysql_num_rows($result)>0){
		$_SESSION['login']=true;
            while($row=mysql_fetch_array($result)){
                $_SESSION['id']=$row['id'];
                $_SESSION['fname']=$row['fname'];
                $type=$row['type'];
                if($type==1){
                		$_SESSION['emp']=true;
                		header('location:employee.php');
                		exit;
					}
                else if($type==2){
                		$_SESSION['admin']=true;
                		header('location:index.php');
                		exit;
					}					
           }
	header('location:view_my_profile.php');
	exit;
}else{
	header('location:login.php');	
}
}
?>
<div id="main-container">
<div id="login-form">
<label id="login_head">Login to MYJOB.com</label><br>
	<form action="" method="POST">
	
		<label id="email-lbl">Email&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:</label><input type="text" name="email">
		<label id="pass-lbl">Password&nbsp;:</label>
		<input type="password" name="password"><br/>
		<div id="forgot">
		<a href="forgot-password.php">Forgot password? </a><br>
		</div>
		<div id="keep_logged_in">
		<input type="checkbox" name="keep_me_logged_in"> Keep me logged-in 
		</div>
		<div id="btn-submit">
		<input id="button" type="submit" name="login" value="Login">	
		</div>
	</form>
	<div id="register-here">
	  Don't have an account ? <a href="register.php">Register here!</a>
	  </div>
</div>
</div>

<?php
//include("footer.php");
?>