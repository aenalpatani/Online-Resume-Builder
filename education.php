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
	if(!empty($_POST['course_name']) && !empty($_POST['school/university_name']) && !empty($_POST['grade/score']) && !empty($_POST['year']))
        {
            
                $course = $_POST['course_name'];
                $university = $_POST['school/university_name'];
                $grade = $_POST['grade/score'];
                $year = $_POST['year'];
		
                $username = $_SESSION["uname"];
                $query="Select User_id from create_account where username='$username'";
                $result=mysqli_query($con,$query);
                $row = mysqli_fetch_array($result);
                $user_id = $row["User_id"];

                $sql = "INSERT INTO education (User_id, Degree, University, Grade, Year) VALUES ('$user_id','$course', '$university', '$grade', '$year')";

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
    <title>Education</title>
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

        .edu1 {
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
    <form method="post">
        <div class="main">
            <header>
                <hr size="20px" color="grey">
                </hr>
            </header>
            <center><i class='fas fa-book-open'></i>&nbsp;&nbsp;<b>Education</b></center>
            <hr style="border-top:3px solid gray">
            </hr>
            <section class="edu1">
                <label id="heading"><b>Education 1</b></label><button class="close"><i
                        class="fas fa-window-close fa-2x"></i></button>
                <hr color="grey">
                <table>
                    <tr>
                        <td>
                            <label>Course/Degree</label>
                        <td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <input class="des" type="text" name="course_name" id="course" size="50"></br></br>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label>School/University</label>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <input class="des" type="text" name="school/university_name" id="school_university"
                                size="50"></br></br>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label>Grade/Score</label>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <input class="des" type="text" name="grade/score" id="gradeOrScore" size="50"></br></br>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label>Year</label>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <input class="des" type="number" min="1900" max="2022" name="year" id="Year"
                                size="50"></br></br>
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
