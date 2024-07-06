<?php
    error_reporting(0);
	session_start();
	$con=mysqli_connect("localhost","root","","resume_builder");
	if(!$con)
    {
      echo "Unsuccess";
    }
	if(isset($_POST["Next"]))
	{
		$skill=$_POST["Skills"];
		$username = $_SESSION["username"];
		$query="Select User_id from create_account where username='$username'";
		$result=mysqli_query($con,$query);
		$row = mysqli_fetch_array($result);
		$user_id = $row["User_id"];
		$sql = "Insert into skill(User_id,Skill) values('$user_id','$skill')";
		$result=mysqli_query($con,$sql);
		if(!$result)
			echo mysqli_error($con);
		else
			header("location:technical.php");
	}
?>