<?php 
session_start();
$conn=mysqli_connect("localhost" , "root" , "" , "resume_builder");
if(!$conn)
{
	echo "Unsuccess";
}
if(isset($_POST["Save"]))
{   $Resume_type=$_POST["Resume_type"];
	$First_name=$_POST["First_name"];
    $Middle_name=$_POST["Middle_name"];
	$Last_name=$_POST["Last_name"];
	$Email=$_POST["Email"];
    $Phone_number=$_POST["Phone_number"];
	$Address=$_POST["Address"];
	$filename=$_FILES["Profile_photo"]["name"];
	$tempname=$_FILES["Profile_photo"]["tmp_name"];
	$folder="images/".$filename;
    $username= $_SESSION["uname"];
	$query="Select User_id from create_account where Username='$username'";
	$result1=mysqli_query($conn,$query);
	$row =mysqli_fetch_array($result1);
	$User_id =$row['User_id'];
	$sql="INSERT INTO personal_information (Resume_type,User_id,First_name,Middle_name,Last_name,Email,Phone_number,Address,Profile_photo) VALUES 
	('$Resume_type','$User_id','$First_name','$Middle_name','$Last_name','$Email',$Phone_number,'$Address','$filename')";
	$result=mysqli_query($conn,$sql);
	
	if(move_uploaded_file($tempname,$folder)){
		echo "Success";
	}
	else{
		echo "Unsuccess";
	}
		if($_SESSION["TYPE"]=="Technical")
              {
                header("location:Technical.php");      
              }
              else
              {
                header("location:Non-Technical.php");      
              }

	

}
?>
<!DOCTYPE html>
<html>
<head>
    <title>PERSONAL DETAILS</title>
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.12.1/css/all.css" crossorigin="anonymous">
<meta name='viewport' content='width=device-width, initial-scale=1'>
<script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
.tech
{
width:60%;
height: auto;
padding: 20px;
Margin-left: 250px;
border: 2px solid black;
line-spacing:2;
line-height: 2;
font-size:20px;
background-color:white;
}
input[ type="text"] {
width:300px;
border-radius:5px;
padding:5px;

input[ type="email"] {
width:300px;
border-radius:5px;
padding:5px;
}
.box1{
heigth:10%;
width: 60%;
padding: 2px;
margin-top:5px;
background-color: white;
border-radius: 3px;
}
</style>
</head>
<body>
<form  method="POST" action="personal_information.php" enctype="multipart/form-data">
<div class="tech">

</head>
<body bgcolor="white">
    <center>
    
<header> <hr size="20px" color="grey"></hr></header>

	   <h3>Personal details</h3><hr>
 <font style="border:green; border-width:100px; border-style;solid;">

	    <fieldset style="width:480px">
	    <table bgcolor="white">
		   
		<tr>
		            <td>Resume Type :</td>
		            <td><input type="text" name="Resume_type" placeholder="Resume_type" required ></td>
		   </tr>
		    <tr>
		            <td>First name :</td>
		            <td><input type="text" name="First_name" placeholder="First_name" required ></td>
		   </tr>
		   <tr>
			    <td><br>Middle name : </br></td>
			    <td><br><input type="text" name="Middle_name" placeholder="Middle_name"  required></br></td>
		   </tr>
		   <tr>
			    <td><br>Last name : </br></td>
			    <td><br><input type="text" name="Last_name" placeholder="Last_name"  required></br></td>
		   </tr>
		   <tr>
			    <td><br>Address : </br></td>
			    <td><br><textarea cols="30" rows="2"  required name="Address"></textarea></br></td>
		   </tr>
		   
		   <tr>
			    <td><br>Email:</br></td>
			    <td><br><input type="Email" name="Email" placeholder="abcd12@gmail.com"  required></br></td>
		   </tr>
		   <tr>
			    <td><br>Phone number: </br></td>
			    <td><br><input type="text" name="Phone_number" placeholder="9876543210"  required></br></td>
		   </tr>
		   <tr>
		            <td><br> Profile photo :</br></td>
		            <td><br><input id ="imgField"  type="file"  name="Profile_photo" required></td>


		   </tr>
		   
		   

			
	      </table><br>
	      <div>
		   <button class="box1"  name="Save" style="font-size:20px"><i class="fas fa-save"></i>Save</button>

	      </div>
	</form>	
</body>	
</html>