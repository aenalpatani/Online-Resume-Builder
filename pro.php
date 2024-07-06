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
		$title=$_POST["title"];
		$desc =$_POST["Project"];
		$username = $_SESSION["username"];
		$query="Select User_id from create_account where username='$username'";
		$result=mysqli_query($con,$query);
		$row = mysqli_fetch_array($result);
		$user_id = $row["User_id"];
		$sql = "INSERT INTO project (User_id,Title,Description) VALUES ('$user_id','$title','$desc')";
		$result=mysqli_query($con,$sql);
		if(!$result)
			echo mysqli_error($con);
		else
			header("location:technical.php");
	}
?>