<?php
include("head.php");
include("menubar.php");
//include("register-login.php");
?>


<div id="main-container">
	<form action="" method="POST">
		<label>Email:</label>
		<input type="text" name="email"><br/>
		<label>password:</label>
		<input type="password" name="password"><br/>
		<input type="submit" name="login" value="Login">	
	</form>
	<a href="forgot-password.php">Forgot password ? </a> | Don't have an account ? <a href="register.php">Register here!</a>
</div>

<?php
include("footer.php");
?>