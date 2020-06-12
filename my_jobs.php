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
	#button{
		font-family: "Courier New", Courier, monospace;
		font-size: 20px;
    background-color: red;
    color: white;
    padding: 14px 20px;
     margin-top:-15px;
    margin-left:500px;
    border: none;
    cursor: pointer;
    width: 35% 
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


<div id="main-container">
<div id="job_bg"><br>
<!--start of search job -->
<!-- 	<div class="container">
	<div class="row">
        <div class="col-md-6">
    		
            <div id="custom-search-input">
                <div class="input-group col-md-12">
                    <input type="text" class="form-control input-lg" placeholder="SEARCH YOUR JOBS HERE" />
                    <span class="input-group-btn">
                        <button class="btn btn-info btn-lg" type="button">
                            <i class="glyphicon glyphicon-search"></i>
                        </button>
                    </span>
                </div>
            </div>
        </div>
	</div>
</div> -->
<!--end of search job -->
	<div>
		<?php
			$sql="select * from `jobs` where `uploader_id`='$user_id'";
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
			    	echo '<form action="remove_job_employee.php" method="POST">';
			    	echo '<input type="hidden" name="login_user_id" value="';echo $user_id;echo' "/>';
			    	echo '<input type="hidden" name="job_id" value="';echo $job_id;echo' "/>';
			    	echo '<input type="hidden" name="uploader_id" value="';echo $uploader_id;echo' "/>';
			    	?>
			    	<input id="button" type="submit" name="remove_job_employee" onclick="return confirm('Are you sure? you wish to delete this job from your profile?');" value="Remove this job" />
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
