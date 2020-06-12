<?php
//include("../head.php");
//include("../menubar.php");
include("../connect.php");
?>
<?php
session_start();
//$email=$_SESSION['from'];
//session_destroy();
?>
<?php
if(isset($_POST['submit'])){
	$from=$_SESSION['from'];
	$sql="SELECT `email` FROM `student_register` where `id`='$from'";
	$result=mysql_query($sql) or die("ddnt fetch email");
	if($result>0){
	    while($row=mysql_fetch_array($result)){
         $from=$row['email'];

	    }
	}
	$to=$_SESSION['to'];
	$sql="SELECT `email` FROM `student_register` where `id`='$to'";
	$result=mysql_query($sql) or die("ddnt fetch email");
	if($result>0){
	    while($row=mysql_fetch_array($result)){
         $to=$row['email'];

	    }
	}

$interview_date=$_POST['interview_date'];
$message=$_POST['message'];
$venue=$_POST['venue'];
//$to= $_POST['id'];
//header('location:email_call_for_interview/index.php');
}
?>


<?php
require 'PHPMailer/PHPMailerAutoload.php';

$mail = new PHPMailer;

$mail->isSMTP();                                   // Set mailer to use SMTP
$mail->Host = 'smtp.gmail.com';                    // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                            // Enable SMTP authentication
$mail->Username = 'kumar.bee014@gmail.com';          // SMTP username
$mail->Password = 'intersteller'; // SMTP password
$mail->SMTPSecure = 'tls';                         // Enable TLS encryption, `ssl` also accepted
$mail->Port = 587;                                 // TCP port to connect to

//$mail->setFrom('kumar.bee014@gmail.com', 'job portal');
$mail->setFrom($from, 'job portal');
//$mail->addReplyTo('kumar.bee014@gmail.com', 'job portal');
$mail->addReplyTo('kumar.bee014@gmail.com', 'job portal');
$mail->addAddress($to);  
$mail->addAddress('kumar.bee014@gmail.com'); // Add a recipient
//$mail->addCC('cc@example.com');
//$mail->addBCC('bcc@example.com');

$mail->isHTML(true);  // Set email format to HTML

$bodyContent = '<h3>You have been shortlisted for the interview. Please be present for the interview on :</h3>'.$interview_date."<br/>";
$bodyContent .= ' Message :'.$message."<br/>";
$bodyContent .= ' Venue :'.$venue;

$mail->Subject = 'Interview Call from my job portal';
$mail->Body    = $bodyContent;

if(!$mail->send()) {
    echo 'Message could not be sent.';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
} else {
    echo '<h4>Interview call mail has been sent!</h4>';
    echo '<a href="../index.php">Goto home</a>';
}
?>
