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
	$Resume_type=$_POST["Resume_type"];
	$First_name=$_POST["First_name"];
    $Middle_name=$_POST["Middle_name"];
	$Last_name=$_POST["Last_name"];
	$Email=$_POST["Email"];
    $Phone_number=$_POST["Phone_number"];
	$Address=$_POST["Address"];
	$Profile_photo=$_POST["Profile_photo"];
	$username= $_SESSION["username"];
	$query="Select User_id from create_account where username='$username'";
	$result=mysqli_query($con,$query);
	$row =mysqli_fetch_array($result);
	$User_id =$row['User_id'];
	$sql="INSERT INTO personal_information (Resume_type,User_id,First_name,Middle_name,Last_name,Email,Phone_number,Address,Profile_photo) VALUES 
	('$Resume_type','$User_id','$First_name','$Middle_name','$Last_name','$Email',$Phone_number,'$Address','$Profile_photo')";
	$result=mysqli_query($con,$sql);
		if(!$result)
			echo mysqli_error($con);
		else
			header("location:technical.php");
	}
?>
