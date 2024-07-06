<?php 
session_start();
$conn=mysqli_connect("localhost" , "root" , "" , "resume_builder");
if(!$conn)
{
	echo "Unsuccess";
}
if(isset($_POST["ADD"]))
{
	$Interest_area=$_POST["Interest_area"];
	$username= $_SESSION["uname"];
	$query="Select User_id from create_account where Username='$username'";
	$result1=mysqli_query($conn,$query);
	$row =mysqli_fetch_array($result1);
	$User_id =$row['User_id'];
	$sql="INSERT INTO interest (User_id,Interest_area) VALUES 
	('$User_id','$Interest_area')";
	$result=mysqli_query($conn,$sql);
	if(!$result)
	{
		echo "record not inserted";
	}
	
}
	if(isset($_POST["Next"]))
	{
		header("location:Non-Technical.php");
	}
?>



<!DOCTYPE html>
<html>
<head>
    <title>INTEREST</title>
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.12.1/css/all.css" crossorigin="anonymous">
<meta name='viewport' content='width=device-width, initial-scale=1'>
<script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
.tech
{
width:60%;
height: auto;
padding: 10px;
Margin-left: 250px;
border: 2px solid black;
line-spacing:1;
line-height: 2;
font-size:20px;
background-color:white;
}
.box2
{
width:100%;
height:5%;
margin-top:3%;
font-size:25px;
padding:4px 4px;
background-color:grey;
color:white;
text-align:center;
}
.box3
{
width:100%;
height:5%;
margin-top:3%;
font-size:25px;
padding:4px 4px;
background-color:grey;
color:white;
text-align:center;
}
</style>
</head>
<body>
<FORM method="POST" action="interest.php">
<div class="tech">

</head>
<body bgcolor="white">
    
    <form method="GET">
<header> <hr size="20px" color="grey"></hr></header>

	   <center><h2>Interest<i class="fa fa-heart"></i></h2></center><hr>

 <font style="border:green; border-width:70px; border-style;solid;">  
			<div><b>Interest_area</b></div>
			 <textarea cols="100" rows="10"  required name="Interest_area"></textarea>
	      <div>
                       
                       <button class="box2"  name="ADD" style="font-size:20px">ADD<i class="fas fa-plus"></i></button>

		  <button class="box3"  name="Next" style="font-size:20px">Next<i class="fa fa-arrow-right"></i></button>
</div>
	</form>
	
</body>	
</html>
