<?php

session_start();
	$con=mysqli_connect("localhost","root","","resume_builder");
	if(!$con)
    {
      echo "Unsuccess";
    }
	if(isset($_POST["Next"]))
	{
		$Interest_area=$_POST["interests"];
		$username= $_SESSION["username"];
		$query="Select User_id from create_account where username='$username'";
		$result=mysqli_query($con,$query);
		$row =mysqli_fetch_array($result);
		$User_id =$row['User_id'];
		$sql="INSERT INTO interest (User_id,Interest_area) VALUES 
		('$User_id','$Interest_area')";
		$result=mysqli_query($con,$sql);
		if(!$result)
			echo mysqli_error($con);
		else
			header("location:technical.php");
	}

?>
    