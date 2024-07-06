<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <title>CV Using HTML & CSS</title>
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css"
        integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous"
        rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.8.1/html2pdf.bundle.min.js"
        integrity="sha512vDKWohFHe2vkVWXHp3tKvIxxXg0pJxeid5eo+UjdjME3DBFBn2F8yWOE0XmiFcFbXxrEOR1JriWEno5Ckpn15A=="
        crossorigin="anonymous">
        </script>

    <style>
        * {
            margin: 0;
            padding: 0;
        }

        body {
            font-family: 'Montserrat', sans-serif;
        }

        #page {
            min-height: 200px;
            width: 60%;
            min-width: 600px;
            background: whitesmoke;
            margin: 50px auto;
            padding: 30px;
            color: #27aae1;
        }

        .photo {
            width: 15%;
            min-width: 130px;
            float: left;
            margin-right: 20px;
        }

        .contact-info-box {
            width: 70.9%;
            display: inline-block;
        }

        .name {
            margin-bottom: -5px;
        }

        .job-title {
            display: inline-block;
        }

        .contact-details {
            background: #27aae1;
            color: white;
            text-align: center;
            margin: auto;
            margin-top: 25px;
            padding: 5px;
            font-size: 15px;
        }

        #objective h3 {
            border: 1px solid #d3d3d3;
            text-transform: uppercase;
            padding: 5px;
            border-radius: 5px;
            margin: 30px 0 10px;
        }

        #objective p {
            padding: 0 5px;
            line-height: 25px;
            font-size: 14px;
            color: #000;
        }

        #education h3 {
            border: 1px solid #d3d3d3;
            text-transform: uppercase;
            padding: 5px;
            border-radius: 5px;
            margin: 30px 0 10px;
        }

        #education table td {
            padding: 5px;
            font-size: 14px;
            color: #000;
        }

        #education table tr.school-1 td:first-child {
            width: 120px;
            color: gray;
            padding-bottom: 25px;
        }

        #education table tr.school-2 td:first-child {
            padding-bottom: 25px;
        }

        #work h3 {
            border: 1px solid #d3d3d3;
            text-transform: uppercase;
            padding: 5px;
            border-radius: 5px;
            margin: 30px 0 10px;
        }

        #work table td {
            padding: 5px;
            font-size: 14px;
            color: #000;
        }

        #work table tr.work-1 td:first-child {
            width: 120px;
            color: gray;
            padding-bottom: 25px;
        }

        #work table tr.work-1 td {
            padding-bottom: 25px;
        }

        #work table tr.work-2 td:first-child {
            width: 120px;
            color: gray;
        }

        #skills h3 {
            border: 1px solid #d3d3d3;
            text-transform: uppercase;
            padding: 5px;
            border-radius: 5px;
            margin: 30px 0 10px;
        }

        #skills table td {
            padding: 18px;
            font-size: 15px;
            color: #000;
        }
    </style>
</head>

<body>
    <div id="print-resume">
        <div id="page">
            <div class="photo-and-name">
                
                <?php
                include("personal.php");
                error_reporting(0);     
                $query = "SELECT * FROM personal_information";
                $data = mysqli_query($con, $query);
                $total = mysqli_num_rows($data);
                $result = mysqli_fetch_assoc($data);
               
            ?>
			<img src="<?php echo "images/".$result['Profile_photo']; ?>" style="margin-left:0px" width="20%" height="20%" alt="Profile pic">

                <div class="contact-info-box">
                    <h1 class="name">
                        <?php
                    include("personal.php");
                    error_reporting(0);
                    $query = "SELECT * FROM personal_information";
                    $data = mysqli_query($con,$query);
                    $total = mysqli_num_rows($data);
                    $result = mysqli_fetch_assoc($data);
                    echo $result['Middle_name']." ".$result['First_name']." ".$result['Last_name'];
                    if($total !=  0){
                        //echo "data shows";
                    }else{
                        echo "error";
                    }?>
                    </h1>
                    <br>
                    <p class="contact-details">Phone :
                        <?php
                include("personal.php");
                error_reporting(0);
                $query = "SELECT * FROM personal_information";
                $data = mysqli_query($con,$query);
                $total = mysqli_num_rows($data);
                $result = mysqli_fetch_assoc($data);
                echo $result['Phone_number']." - Email : ".$result['Email'];
                if($total !=  0){
                    //echo "data shows";
                }else{
                    echo "error";
                }?>
                        </h1>
                    </p>
                </div>
            </div>
            <div id="summary">
                <h3>Summary</h3>
                <p>
                    <?php
                    include("sum.php");
                    error_reporting(0);
                    $query = "SELECT * FROM summary";
                    $data = mysqli_query($con,$query);
                    $total = mysqli_num_rows($data);
                    $result = mysqli_fetch_assoc($data);
                    echo $result['Summary'];
                    if($total !=  0){
                        //echo "data shows";
                    }else{
                        echo "error";
                    }
                ?>
                </p>
            </div>
            <div id="education">
                <h3>Education</h3>
                <table>
                    <tr class="school-1">
                        <td rowspan="2">
                            <?php
                            include("educ.php");
                            error_reporting(0);
                            $query = "SELECT * FROM education";
                            $data = mysqli_query($con,$query);
                            $total = mysqli_num_rows($data);
                            $result = mysqli_fetch_assoc($data);
                            echo $result['Year'];
                            if($total !=  0){
                                //echo "data shows";
                            }else{
                                echo "error";
                            }
                    ?>
                        </td>
                        <td><b>
                                <?php
                            include("educ.php");
                            error_reporting(0);
                            $query = "SELECT * FROM education";
                            $data = mysqli_query($con,$query);
                            $total = mysqli_num_rows($data);
                            $result = mysqli_fetch_assoc($data);
                            echo $result['University'];
                            if($total !=  0){
                                //echo "data shows";
                            }else{
                                echo "error";
                            }
                    ?> :
                            </b>
                            <?php
                            include("educ.php");
                            error_reporting(0);
                            $query = "SELECT * FROM education";
                            $data = mysqli_query($con,$query);
                            $total = mysqli_num_rows($data);
                            $result = mysqli_fetch_assoc($data);
                            echo $result['Degree']."<br>"."<b>Percentage : </b>".$result['Percentage'];
                            if($total !=  0){
                                //echo "data shows";
                            }else{
                                echo "error";
                            }
                    ?>
                        </td>
                    </tr>
                    <!-- <tr class="school-2">
                    <td><b>School-2</b>: XYZ School (Standard IX-X)</td>
                </tr>

                <tr class="school-1">
                    <td rowspan="2">2012 - 2014</td>
                    <td><b>ACCESS</b>: English Micro Scholarship Program by US Consolate</td>
                </tr>
                <tr class="school-2">
                    <td><b>The Professional's Academy</b>: Web Designing (HTML, CSS, JS, Bootstrap)</td>
                </tr>

                <tr>
                    <td style="width: 120px; color: gray;">2015 - 2017</td>
                    <td><b>Intermediate</b>: Board of Intermediate Karachi - Private</td>
                </tr> -->
                </table>
            </div>
            <div id="work">
                <h3>Experience</h3>
                <table>
                    <tr class="work-1">
                        <td>
                            <?php
                            include("exp.php");
                            error_reporting(0);
                            $query = "SELECT * FROM experience";
                            $data = mysqli_query($con,$query);
                            $total = mysqli_num_rows($data);

                            $result = mysqli_fetch_assoc($data);
                            echo $result['Start_date']." - ".$result['End_date'];
                                                   
                            if($total !=  0){
                                //echo "data shows";
                            }else{
                                echo "error";
                            }
                    ?>
                        </td>
                        <td><b>
                                <?php
                            include("exp.php");
                            error_reporting(0);
                            $query = "SELECT * FROM company";
                            $data = mysqli_query($con,$query);
                            $total = mysqli_num_rows($data);
                            $result = mysqli_fetch_assoc($data);
                            echo $result['Company_name'];
                            if($total !=  0){
                                //echo "data shows";
                            }else{
                                echo "error";
                            }
                    ?> -
                                <?php
                            include("exp.php");
                            error_reporting(0);
                            $query = "SELECT * FROM job";
                            $data = mysqli_query($con,$query);
                            $total = mysqli_num_rows($data);
                            $result = mysqli_fetch_assoc($data);
                            echo $result['Job'];
                            if($total !=  0){
                                //echo "data shows";
                            }else{
                                echo "error";
                            }
                            ?>
                            </b><br>
                            <?php
                            include("exp.php");
                            error_reporting(0);
                            $query = "SELECT * FROM experience";
                            $data = mysqli_query($con,$query);
                            $total = mysqli_num_rows($data);
                            $result = mysqli_fetch_assoc($data);
                            echo $result['Details'];
                            if($total !=  0){
                                //echo "data shows";
                            }else{
                                echo "error";
                            }
                    ?>
                        </td>
                    </tr>
                    <!-- <tr class="work-2">
                    <td>2015 - Present</td>
                    <td><b>Reliable Punching</b>: More than 2 years' experience as an IT Manager and Customer Service
                        Representative</td>
                </tr> -->

                </table>
            </div>
            <div id="interests">
                <h3>Skills</h3>
                <table>
                    <tr class="interest-1">
                        <td>
                            <?php
                            include("interest_getdata.php");
                            error_reporting(0);
                            $query = "SELECT * FROM interest";
                            $data = mysqli_query($con,$query);
                            $total = mysqli_num_rows($data);
                            $r = mysqli_fetch_assoc($data);
                            echo $result["Interest_area"];                           
                           
                            if($total !=  0){
                                //echo "data shows";
                            }else{
                                echo "error";
                            }?>
                            <!-- <li>CSS</li>
                            <li>JavaScript</li> -->

                        </td>
                    </tr>
                </table>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous">
        </script>
		<center>
        <input type="button" class="btn btn-primary" 
          onclick="GeneratePdf();" value="Download">
  </center>
    
    <script>            
        function GeneratePdf() {
            var element = document.getElementById('print-resume');
            html2pdf(element);
            }
    </script>
</body>

</html>