<?php
	session_start();
	$con=mysqli_connect("localhost","root","","Resume_Builder");
	if(!$con)
    {
      echo "Unsuccess";
    }
	if(isset($_POST["Add"]))
	{
		$Language=$_POST["Language"];
		$username = $_SESSION["uname"];
		$query="Select User_id from create_account where Username='$username'";
		$result1=mysqli_query($con,$query);
		$row = mysqli_fetch_array($result1);
		$user_id = $row["User_id"];
		$sql = "Insert into language(User_id,Language) values($user_id,'$Language')";
		$result=mysqli_query($con,$sql);
		if(!$result)
			echo mysqli_error($con);
	}
	if(isset($_POST["Next"]))
	{
		$resume = $_SESSION["TYPE"];
		if($resume == "Technical")
		{
			header("location:Technical.php");
		}
		else
		{
			header("location:Non-Technical.php");
		}
	}
?>
<HTML>
<HEAD>
<TITLE>Language</TITLE>
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
	Margin-top: 100px;
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
<form  method="POST" action="">
<div class="main">
<header> <hr size="20px" color="grey" ></hr></header>
<center><i class="fa fa-language"></i><b> Language</b></center>
<hr style="border-top:3px solid gray" ></hr>
<label><b>Language</b></label><br/>
<textarea cols="100" rows="10" name="Language" placeholder="Enter language you know"></textarea>
<button class="box"  name="Add" style="font-size:24px"> Add <i class='fas'>&#xf067;</i></button>
<button class="box"  name="Next" style="font-size:24px">Next <i class='fas fa-arrow-alt-circle-right'></i></button>
</div>
</form>
</BODY>
</HTML>