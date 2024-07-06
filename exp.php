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
	if(!empty($_POST['company_name']) && !empty($_POST['job_title']) && !empty($_POST['start_date']) && !empty($_POST['end_date'] && !empty($_POST['detail'])))
        {
            
                $company = $_POST['company_name'];
                $job_title = $_POST['job_title'];
                $start_date = $_POST['start_date'];
                $end_date = $_POST['end_date'];
                $detail = $_POST['detail'];

                $username = $_SESSION["username"];
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
                
                if($result && $result2 && $result3)
                {
                    header("location:technical.php");
                }else{
                    echo mysqli_error($con);
                }
        }else{
                echo "all field required";
        }

           mysqli_close($con);
     
        }
?>