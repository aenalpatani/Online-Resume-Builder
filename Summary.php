<?php
	session_start();
	$con=mysqli_connect("localhost","root","","resume_builder");
	if(!$con)
    {
      echo "Unsuccess";
    }
	 
	if(isset($_POST["BtnNext"]))
	{
		$username=$_SESSION["uname"];
		$query="Select User_id from create_account where Username='$username'"; 
		$result1= mysqli_query($con,$query);
		$row=mysqli_fetch_array($result1);
		$user_id=$row["User_id"];
		$Summary=$_POST["Summary"];
		$q1= "insert into summary(User_id,Summary) values($user_id,'$Summary')";
		$result=mysqli_query($con, $q1);
		if(!$result)
			echo mysqli_error($con);
		else
			header("location:Non-Technical.php");
	}
?>
<!DOCTYPE html> 
<html>
<head>
<title>Summary</title>
</head>
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.12.1/css/all.css" crossorigin="anonymous">
<script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
<style>
.Summary
{
	width: 60%;
	height: auto;
	padding: 20px;
	Margin-left: 250px;
	Margin-top: 100px;
	border: 2px solid gray;
	line-spacing: 2;
	line-height: 2;
	font-size:20px;
	background-color: white;
}
.button{
	width: 370px;
	padding: 5px;
	margin-left:15%;
	background-color: WhiteSmoke;
	border-radius: 5px;
}

</style>
<body>
<form method="POST">
<div class="Summary">
<center><h2>Summary</h2></center>
<header> <hr size="20px" color="grey" ></hr></header>
<center><b>Summary</b></center>
<hr style="border-top:3px solid gray" ></hr>
<label><b>Summary</b></label><br/>
<textarea cols="100" rows="10" name="Summary" placeholder="Your Summary"></textarea>
<button class="button"  name="BtnNext" style="font-size:24px">Next <i class='fas fa-arrow-alt-circle-right'></i></button>
</div>
</body>
</html> 