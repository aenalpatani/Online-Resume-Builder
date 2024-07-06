<?php

	session_start();
	
	$con= new mysqli("localhost","root","","resume_builder");
	{	
	if(isset($_POST["SignUp"]))
	{
	$Username=$_POST["Username"];
	$Password = $_POST["Password"];
	$CPassword= $_POST["Confirm_Password"];
	$q = "select * from create_account where Username = '$Username'";
	$result = mysqli_query($con,$q);
	
	if(mysqli_num_rows($result) > 0) 
	{
		echo "Username already exist";
	}
	elseif($Password==$CPassword)
	{
		$q1= "insert into create_account (Username,Password) values('$Username','$Password')";
		mysqli_query($con, $q1);
		$_SESSION["uname"] = $Username;
		header("location:Home.html");
	}
	else
	{
		echo "Please enter confirm password same as Password" ;
	}
	}
	}
?>

<!DOCTYPE html>  
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="account.css" rel="stylesheet" type="text/css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/2e756336ab.js" crossorigin="anonymous"></script>
</head>
<body>
<form method="POST">
    <div class="container register">
        <div class="row">
            <div class="col-md-3 register-left">
                <img src="https://image.ibb.co/n7oTvU/logo_white.png" alt=""/>
                <h3>Welcome</h3>
                <p>Our Resume Builder has helped users to create attractive, well-written resumes — and fast! </p>
                
            </div>
            <div class="col-md-9 register-right">
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                        <h3 class="register-heading">Create Account</h3>
                        <div class="row register-form">
                            <div class="col-md-12">
                           
                                <div class="form-group">
                                    <input type="email" class="form-control" placeholder="Email Id" value="" name="Username" required />
									</div><br>
                                <div class="form-group">
                                    <input type="password" class="form-control" placeholder="Password" value="" name="Password" required />
                                </div><br>
                                <div class="form-group">
                                    <input type="password" class="form-control"  placeholder="Confirm Password" value="" name="Confirm_Password" required>
                                </div>
                                <input type="submit" class="btnRegister"  value="Sign Up" name="SignUp" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>	
</form>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>

</body>
</html>