<?php   
        error_reporting(0);
        session_start();
        $server = "localhost";
        $username = "root";
        $password = "";
        $dbname = "resume_builder";

        $con = mysqli_connect($server, $username, $password, $dbname);
        

	if(isset($_POST['Next']))
        {
	if(!empty($_POST['course_name']) && !empty($_POST['school/university_name']) && !empty($_POST['grade/score']) && !empty($_POST['year']))
        {
            
                $course = $_POST['course_name'];
                $university = $_POST['school/university_name'];
                $grade = $_POST['grade/score'];
                $year = $_POST['year'];
		
                $username = $_SESSION["username"];
                $query="Select User_id from create_account where username='$username'";
                $result=mysqli_query($con,$query);
                $row = mysqli_fetch_array($result);
                $user_id = $row["User_id"];

                $sql = "INSERT INTO education (User_id, Degree, University, Percentage, Year) VALUES ('$user_id','$course', '$university', '$grade', '$year')";

                $result = mysqli_query($con, $sql) or die(mysqli_error($con));
               
                if(!$result)
			        echo mysqli_error($con);
		        else
			        header("location:technical.php");
                
        }else{
                echo "all field required";
        }

           mysqli_close($con);
     
        }
?> 