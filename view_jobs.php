<?php
include("head.php");
include("menubar.php");
include("register-login.php");
include('connect.php');
?>

<style type="text/css">
.container{
	margin-top: 10px;
	padding-left: 300px;
}
	#custom-search-input{
    padding: 3px;
    border: solid 1px #E4E4E4;
    border-radius: 6px;
    background-color: #fff;
}

#custom-search-input input{
    border: 0;
    box-shadow: none;
}

#custom-search-input button{
    margin: 2px 0 0 0;
    background: none;
    box-shadow: none;
    border: 0;
    color: #666666;
    padding: 0 8px 0 10px;
    border-left: solid 1px #ccc;
}

#custom-search-input button:hover{
    border: 0;
    box-shadow: none;
    border-left: solid 1px #ccc;
}

#custom-search-input .glyphicon-search{
    font-size: 15px;
}
</style>
<style type="text/css">
	#btn-submit{
		font-family: "Courier New", Courier, monospace;
		font-size: 25px;
		font-weight: bold;
		background-color: red;
		color: #d2d8e0;
		margin-left: 460px;
		padding:5px 40px 5px 40px; 
		}
		
		#job_bg{
			background-image: url('images/about-bg2.jpg');
		}
</style>

<?php
if(isset($_SESSION['login'])==true){
	$user_id=$_SESSION['id'];
}
?>
<script type="text/javascript">
	function ask(){
		//alert("heee!");
	}
</script>

<?php
//job delete code here

if(isset($_POST['remove'])){
	
	//$login_user_id= $_POST['login_user_id'];
	 $job_id= $_POST['job_id'];
	//$uploader_id= $_POST['uploader_id'];
	//$sql="DELETE FROM `jobss` WHERE `id`='$job_id'";
	//$check=mysql_query($sql) or die("ddnt!");
	//if($check==true){
	//	echo 'Job is deleted!!!';
	//}
}





?>

<div id="main-container">
	<div id="job_bg">
	<div>
		<?php
			$sql="select * from `jobs`";
			$result=mysql_query($sql);
			if($result>0){
			    while($row=mysql_fetch_array($result)){
			    	echo '<div class="jobs">';
			    		$job_id=$row['id'];
			    		$uploader_id=$row['uploader_id'];
			    		echo '<table>';
			    		echo '<th>';
			    		//echo '<td>';
			    	echo $row['name'];
			    	    //echo '</td>';
			    	    echo '</th>';
			    	    echo '<tr>';
			    	    echo '<td>';
			    	    echo "Exp:";
			    	    echo '</td>';
			    	    echo '<td>';
			    	echo $row['experience'];
			    	echo '</td>';
			    	echo '</tr>';
			    	echo '<tr>';
			    	echo '<td>';
			    	echo "Location:";
			    	echo '</td>';

			    	echo '<td>';
			    	echo $row['location'];
			    	echo '</td>';
			    	echo '</tr>';
			    	echo '<tr>';
			    	echo '<td>';
			    	echo "Key skills:";
			    	echo '</td>';
			    	echo '<td>';
			    	echo $row['skills'];
			    	echo '</td>';
			    	echo '</tr>';
			    	echo '<tr>';
			    	echo '<td>';
			    	echo"sal:";
			    	echo '</td>';
			    	echo '<td>';
			    	echo $row['salary'];
			    	echo '</td>';
			    	echo '</tr>';
			    	echo '<tr>';
			       	echo '<td>';
			    	echo"Posted By:";
			    	echo '</td>';
			    	echo '<td>';
			    	echo $row['posted_by'];
			    	echo '</td>';
			    	echo '<td>';
			    	echo"Posted on:";
			    	echo $row['posted_on'];
			    	echo '</td>';
			    	echo '</tr>';
			    	echo '</table>';
			    	echo '<form action="" method="POST">';
			    	echo '<input type="hidden" name="login_user_id" value="';echo $user_id;echo' "/>';
			    	echo '<input type="hidden" name="job_id" value="';echo $job_id;echo' "/>';
			    	echo '<input type="hidden" name="uploader_id" value="';echo $uploader_id;echo' "/>';
			    	?>
			    	<input id="btn-submit" onclick="return confirm(' you wish to delete this employee account profile?');"  type="submit" name="remove" value="Remove This Job" />
			    	<?php
			    	echo '</form>';
			    	echo '</div>';

			    }
		    }
		?>
	</div>
</div>
</div>


<?php
//include("footer.php");
?>
