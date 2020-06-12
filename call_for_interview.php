<?php
include("head.php");
include("menubar.php");
include("register-login.php");
include('connect.php');
$_SESSION['from']=$_GET['id'];
$_SESSION['to']=$_GET['requested_id'];
?>
<?php 
// if(isset($_POST['submit'])){
// 	$from=$_SESSION['from'];
// 	$sql="SELECT `email` FROM `student_register` where `id`='$from'";
// 	$result=mysql_query($sql) or die("ddnt fetch email");
// 	if($result>0){
// 	    while($row=mysql_fetch_array($result)){
//          $from=$row['email'];

// 	    }
// 	}
// 	$to=$_SESSION['requested_id'];
// 	$sql="SELECT `email` FROM `student_register` where `id`='$to'";
// 	$result=mysql_query($sql) or die("ddnt fetch email");
// 	if($result>0){
// 	    while($row=mysql_fetch_array($result)){
//          $to=$row['email'];

// 	    }
// 	}

// $interview_date=$_POST['interview_date'];
// $message=$_POST['message'];
// $venue=$_POST['venue'];
// //$to= $_POST['id'];
// //header('location:email_call_for_interview/index.php');
// }
?>
<div id="main-container">
	<h3>Please enter the interview info!</h3><br/>
	<div class="jumbotron">
	<form action="/portal/email_call_for_interview/index.php" method="POST">
	    <div class="row">
		 	<div class="form-group">
	       		<label for="interview_date" class="col-sm-2 control-label col-sm-offset-1">Interview Date  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: </label>
	       		<div class="col-sm-5">
	  	   			<input type="date" name="interview_date"  class="form-control" id="interview_date">
	       		</div>
	       </div> 
	    </div><br>
	    <div class="row">
		 	<div class="form-group">
	       		<label for="message" class="col-sm-2 control-label col-sm-offset-1">Message  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: </label>
	       		<div class="col-sm-5">
	  	   			<!-- <input type="date" name="interview_date"  class="form-control" id="interview_date"> -->
	  	   			<textarea name="message" cols="12" rows="5" class="form-control" placeholder="Enter the message like documents should bring for interview!!!"></textarea>
	       		</div>
	       </div> 
	    </div><br>
	    <div class="row">
		 	<div class="form-group">
	       		<label for="venue" class="col-sm-2 control-label col-sm-offset-1">Venue  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: </label>
	       		<div class="col-sm-5">
	  	   			<input type="text" name="venue"  class="form-control" id="venue" placeholder="Enter the Interview venue!!!">
	       		</div>
	       </div> 
	    </div><br>
		<!-- Interview date:<input type="date" name="interview_date"><br>
		Message:<input type="text" name="message"><br>
		Venue:<input type="text" name="venue"><br> -->
		<!-- <input type="text" name="venue" value="<?php echo $to;?>"> -->
		<br>
		<div class="row">
		 	<div class="form-group">
	       		<div class="col-sm-3 col-sm-offset-4">
	  	   			<button type="submit" class="btn btn-primary form-control" name="submit">Send Mail</button>
	       		</div>
	        </div> 
	    </div>
		<!-- <input type="submit" name="submit" value="Send mail"> -->
	</form>
</div>

</div>
<?php
//include("footer.php");
?>