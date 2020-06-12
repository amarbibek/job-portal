<?php
//include("../head.php");
//include("../menubar.php");
include("../connect.php");
?>
<?php
session_start();
$email=$_SESSION['email'];
session_destroy();
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

$mail->setFrom('kumar.bee014@gmail.com', 'job portal');
$mail->addReplyTo('kumar.bee014@gmail.com', 'job portal');
$mail->addAddress($email);  
//$mail->addAddress('kumar.bee014@gmail.com'); // Add a recipient
//$mail->addCC('cc@example.com');
//$mail->addBCC('bcc@example.com');

$mail->isHTML(true);  // Set email format to HTML

$bodyContent = '<h3>Please click on this verification link to verify your account!</h3>';
$bodyContent .= ' http://localhost:8080/portal/activate.php?email='.$email;

$mail->Subject = 'verification link from my job portal';
$mail->Body    = $bodyContent;

if(!$mail->send()) {
    echo 'Message could not be sent.';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
} else {
    echo '<h4>Verification link has been send to your email. Please click on the verification link to verify your account!</h4>';
    echo '<a href="../index.php">Goto home</a>';
}
?>
