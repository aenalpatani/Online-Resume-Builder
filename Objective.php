<?php
	session_start();
	
	$con= new mysqli("localhost","root","","resume_builder");
	{	 
	if(isset($_POST["BtnNext"]))
	{
		$username=$_SESSION["uname"];
		$query="Select User_id from create_account where Username='$username'"; 
		$result1= mysqli_query($con,$query);
		$row=mysqli_fetch_array($result1);
		$user_id=$row["User_id"];
		$Objective=$_POST["Objective"];
		$q1= "insert into objectives (User_id,Objective) values('$user_id','$Objective')";
		 	mysqli_query($con, $q1);
		if(!$q1)
			echo mysqli_error($con);
		else
			header("location:Technical.php");
	}
	}
?>
<!DOCTYPE html>  
<html lang="en">
<html>
<head>
<title>Objective</title>
<style>
body{
font-family:sans-serif;
}
.Objective{
	width:60%;
	height:auto;
border:grey;
padding:20px;
border-width:3.5px;
border-style:solid;
margin-left:15%;
}

.Button{
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
<body>
<form method="POST">
<div class="Objective">
<center><h2>Objective</h2></center>
<hr size="6" color="grey"><br><br><br>
<label for="Objective"><font color="grey"><h4>Objective</label></font></h4>
<textarea id="Objective" name="Objective" rows="9" cols="100">
 </textarea>
<input type="submit" class="Button" value="NEXT" name="BtnNext"/>
</div>
</form>
</body>
</head>
</html>
