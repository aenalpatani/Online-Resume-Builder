<?php    
        error_reporting(0);
        session_start();
        $server = "localhost";
        $username = "root";
        $password = "";
        $dbname = "resume_builder";

        $con = mysqli_connect($server, $username, $password, $dbname);

	if(isset($_POST['Add']))
        {
	if(!empty($_POST['company_name']) && !empty($_POST['job_title']) && !empty($_POST['start_date']) && !empty($_POST['end_date'] && !empty($_POST['detail'])))
        {
            
                $company = $_POST['company_name'];
                $job_title = $_POST['job_title'];
                $start_date = $_POST['start_date'];
                $end_date = $_POST['end_date'];
                $detail = $_POST['detail'];

                $username = $_SESSION["uname"];
		        $query="Select User_id from create_account where username='$username'";
		        $result=mysqli_query($con,$query);
		        $row = mysqli_fetch_array($result);
		        $user_id = $row["User_id"];
		
                $sql2 = "INSERT INTO job (User_id,Job) VALUES ('$user_id','$job_title')";
                $sql3 = "INSERT INTO company (User_id,Company_name) VALUES ('$user_id','$company')";

                $result2 = mysqli_query($con, $sql2) or die(mysqli_error($con));
                $result3= mysqli_query($con, $sql3) or die(mysqli_error($con));

		        $query="Select Company_id from company where User_id='$user_id'";
		        $result4=mysqli_query($con,$query);
		        $row = mysqli_fetch_array($result4);
		        $Company_id = $row["Company_id"];

                $query="Select Job_id from job where User_id='$user_id'";
		        $result5=mysqli_query($con,$query);
		        $row = mysqli_fetch_array($result5);
		        $Job_id = $row["Job_id"];

                $sql = "INSERT INTO experience (User_id, Company_id, Job_id, Details, Start_date, End_date) VALUES ('$user_id','$Company_id','$Job_id','$detail', '$start_date', '$end_date')";
                
                $result = mysqli_query($con, $sql) or die(mysqli_error($con));
                
        }else{
                echo "all field required";
        }
     
        }

        if(isset($_POST['Next']))
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
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.12.1/css/all.css" crossorigin="anonymous">
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
    <script src="https://kit.fontawesome.com/2e756336ab.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css?family=Montserrat">
    <link href="https://fonts.googleapis.com/css2?family=Rubik&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Rubik', sans-serif;
        }

        .main {
            width: 60%;
            height: auto;
            padding: 10px;
            Margin-left: 250px;
            Margin-top: 20px;
            border: 2px solid gray;
            font-size: 30px;
            background-color: white;
        }

        .box {
            width: 49%;
            padding: 10px;
            margin-top: 5px;
            background-color: WhiteSmoke;
            border-radius: 5px;
            font-size: 18px;
            font-weight: 800;
            font-family: 'Rubik', sans-serif;
        }

        #heading {
            font-size: 20px;
        }

        .exp1 {
            border: 2px solid gray;
            font-size: 15px;
            margin-bottom: 10px;
        }

        .des,
        label {
            margin-left: 10px;
        }

        .close {
            float: right;
            margin-right: 7px;
            margin-top: 3px;
            border: none;
            font-size: 16px;
            background-color: black;
            color: white;
        }
    </style>
</head>

<body>
    <form method="post" >
        <div class="main">
            <header>
                <hr size="20px" color="grey">
                </hr>
            </header>
            <center><i class='fas fa-user-tie'></i>&nbsp;&nbsp;<b>Experience</b></center>
            <hr style="border-top:3px solid gray">
            </hr>
            <section class="exp1">
                <label id="heading"><b>Experience 1</b></label><button class="close"><i
                        class="fas fa-window-close fa-2x"></i></button>
                <hr color="grey">
                <table>
                    <tr>
                        <td>
                            <label>Company Name</label>
                        <td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <input class="des" type="text" name="company_name" id="com_name" size="50"></br></br>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label>Job Title</label>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <input class="des" type="text" name="job_title" id="j_title" size="50"></br></br>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label>Start Date</label><br><input class="des" type="date" name="start_date"
                                id="s_date"></br></br>
                        </td>
                        <td>
                            <label>End Date</label><br><input class="des" type="date" name="end_date"
                                id="e_date"></br></br>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label>Details</label>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <textarea class="des" id="description" placeholder="job description...."
                                cols="50" name="detail"></textarea>
                        </td>
                    </tr>
                </table>
            </section>
            <button class="box" name="Add" style="font-size:20px"> Add <i class='fas'>&#xf067;</i></button>
            <button class="box" name="Next" style="font-size:20px">Next <i
                    class='fas fa-arrow-alt-circle-right'></i></button>
        </div>
    </form>
</body>

</html>

