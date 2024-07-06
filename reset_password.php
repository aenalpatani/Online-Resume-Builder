<?php
	session_start();
	$con = mysqli_connect("localhost","root","","resume_builder");
	if(isset($_POST["submit"]))
	{
		$_SESSION["uname"]=$_POST["email"];
	}
	if(isset($_POST["Change"]))
	{
		$pass=$_POST["confirm_password"];
		$pass2 = $_POST["new_password"];
		if($pass==$pass2)
		{
			$username=$_SESSION["uname"];
			$query="Update create_account set Password = '$pass' where Username='$username'";
			$result1 = mysqli_query($con,$query);
			if($result1)
			{
				header("location:Home.html");
			}
			else
		  	{
				echo '<script>alert("Password not changed");</script>';
		  	}
		}
		else
		  {
			echo '<script>alert("Enter correct password");</script>';
		  }

		
	}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Change Password</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css?family=Montserrat">
    <link href="https://fonts.googleapis.com/css2?family=Rubik&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.12.1/css/all.css" crossorigin="anonymous">
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
    
    <style>
        body {
            font-family: 'Rubik', sans-serif;
            background: -webkit-linear-gradient(left, #d48205, #1b1c1d);
        }
        .box{
            margin: 10% 30%;
            padding:20px;
        }
        .a{
            text-align: left;
        }
        .b{
            text-align: center;
        }
        #new_pass,#con_pass{
            border:none;
            padding: 5px;
            outline: none;
            margin: 5px;
            background-color: black;
            color: white;
        }
        .btn{
            background-color: black;
            color:white;
            padding:10px;
            margin-left:35%;
            outline: none;
            border: black;
        }
    </style>
</head>

<body>
<form method="post">
    <div class="box">
    <h1 class="b">Change Your Password</h1>
    <h5 class="b">You can change your password here.</h5>
    <label class="a"><b>New Password</b></label><br><input type="text" class="a" name="new_password" id="new_pass" size="60"><br><br>
    <label class="a"><b>Confirm Password</b></label><br><input type="text" class="a" name="confirm_password" id="con_pass" size="60"><br><br>
    <button class="b btn" NAME="Change">Change Password</button>
    </div>
</form>
</body>

</html>