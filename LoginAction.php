<?php
 if(isset($_POST["login"]))
 {
    $con = mysqli_connect("localhost","root","","resume_builder");
    if(!$con)
    {
      echo "Unsuccess";
    }
    $uname = $_POST["username"];
    $pass = $_POST["password"];
      $sql = "SELECT Username,Password FROM create_account WHERE Username='$uname'";
      $result = mysqli_query($con,$sql);
      $row = mysqli_fetch_assoc($result);
	  if($row)
	  {
          $a= $row["Password"];
          if($pass=$a)
          {
              session_start();
              $_SESSION['uname']=$uname;
              header("location:Home.html");       
          }
		  
		if(isset($_POST["remember"]))
		{
			setcookie("USERNAME",$uname,time()+60*60*7);
		}
	  }
	  else
		  {
				echo '<script>alert("Login Unsuccessfull");</script>';
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
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href="login.css" rel="stylesheet" type="text/css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/2e756336ab.js" crossorigin="anonymous"></script>

</head>

<body>
    <section class="vh-100">
        <div class="container-fluid h-custom">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-md-8 col-lg-5 col-xl-4">
                    <img src="side.jpeg"
                        class="img-fluid" alt="Sample image" max-width:100%;>
                </div>
                <div class="col-md-9 col-lg-7 col-xl-5 offset-xl-1">
                    <form method="post">
                        

                        <!-- Email input -->
                        <div class="form-outline mb-4">
                            <label class="form-label" for="form3Example3">Email address</label>
                            <input type="email" id="form3Example3" class="form-control form-control-lg"
                                placeholder="Enter a valid email address"  name="username" />
                        </div>

                        <!-- Password input -->
                        <div class="form-outline mb-3">
                            <label class="form-label" for="form3Example4">Password</label>
                            <input type="password" id="form3Example4" class="form-control form-control-lg"
                                placeholder="Enter password" name="password" />
                        </div>

                        <div class="d-flex justify-content-between align-items-center">
                            <!-- Checkbox -->
                            <div class="form-check mb-0">
                                <input class="form-check-input me-2" type="checkbox" value="" id="form2Example3" name="remember" />
                                <label class="form-check-label" for="form2Example3">
                                    Remember me
                                </label>
                            </div>
                            <a href="forget_password.html" class="text-body">Forgot password?</a>
                        </div>

                        <div class="text-center text-lg-start mt-4 pt-2">
                            <input type="submit" class="btn btn-dark btn-lg"
                                style="padding-left: 2.5rem; padding-right: 2.5rem;" name="login" value="Login">
                            <p class="small fw-bold mt-2 pt-1 mb-0">Don't have an account? <a href="Create.php"
                                    class="link-secondary">Create Account</a></p>
                        </div>

                    </form>
                </div>
            </div>
        </div>

    </section>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>
</body>

</html>