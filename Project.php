<?php
	session_start();
	$con=mysqli_connect("localhost","root","","resume_builder");
	if(!$con)
    {
      echo "Unsuccess";
    }
	if(isset($_POST["Add"]))
	{
		$title=$_POST["title"];
		$desc =$_POST["Project"];
		$username = $_SESSION["uname"];
		$query="Select User_id from create_account where Username='$username'";
		$result1=mysqli_query($con,$query);
		$row = mysqli_fetch_array($result1);
		$user_id = $row["User_id"];
		$sql = "INSERT INTO project (User_id,Title,Description) VALUES ($user_id,'$title','$desc')";
		$result=mysqli_query($con,$sql);
		if(!$result)
			echo mysqli_error($con);
	}
	if(isset($_POST["Next"]))
	{
		header("location:Technical.php");
	}
?>
<HTML>
<HEAD>
<TITLE>Project</TITLE>
</HEAD>
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.12.1/css/all.css" crossorigin="anonymous">
<script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
<style>
.main
{
	width: 60%;
	height: auto;
	padding: 20px;
	Margin-left: 250px;
	Margin-top: 60px;
	border: 2px solid gray;
	line-spacing: 2;
	line-height: 2;
	font-size:20px;
	background-color: white;
}
.box{
	width: 370px;
	padding: 5px;
	margin-top:15px; 
	background-color: WhiteSmoke;
	border-radius: 5px;
}
</style>
<BODY>
<form method="POST" action="">
<div class="main">
<header> <hr size="20px" color="grey" ></hr></header>
<center><i class='fas fa-plane'></i><b> Project</b></center>
<hr style="border-top:3px solid gray" ></hr>
<b style="font-size:24px; text-decoration:underline">Project</b><br>
<label><b>Title</b></label><br/>
<input type="text" name="title" placeholder="Enter Your Project Title" size="108"><br>
<label><b>Description</b></label><br/>
<textarea cols="100" rows="10" name="Project" placeholder="Enter Your Project Description"></textarea>
<button class="box"  name="Add" style="font-size:24px"> Add <i class='fas'>&#xf067;</i></button>
<button class="box"  name="Next" style="font-size:24px">Next <i class='fas fa-arrow-alt-circle-right'></i></button>
</div>
</form>
</BODY>
</HTML>