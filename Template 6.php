<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>Resume/CV</title>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.4/jspdf.min.js"></script>
  <style>
    @import url("https://fonts.googleapis.com/css?family=Montserrat:400,500,700&display=swap");

    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      list-style: none;
      font-family: "Montserrat", sans-serif;
    }

    body {
      background: #585c68;
      font-size: 14px;
      line-height: 22px;
      color: #555555;
    }

    .bold {
      font-weight: 700;
      font-size: 20px;
      text-transform: uppercase;
    }

    .semi-bold {
      font-weight: 500;
      font-size: 16px;
    }

    .resume {
      width: 800px;
      height: auto;
      display: flex;
      margin: 50px auto;
    }

    .resume .resume_left {
      width: 280px;
      background: #141531;
    }

    .resume .resume_left .resume_profile {
      width: 100%;
      height: 280px;
    }

    .resume .resume_left .resume_profile img {
      width: 100%;
      height: 100%;
    }

    .resume .resume_left .resume_content {
      padding: 0 25px;
    }

    .resume .title {
      margin-bottom: 20px;
    }

    .resume .resume_left .bold {
      color: #fff;
    }

    .resume .resume_left .regular {
      color: #32333A;
    }

    .resume .resume_item {
      padding: 25px 0;
      border-bottom: 2px solid #b1eaff;
    }

    .resume .resume_left .resume_item:last-child,
    .resume .resume_right .resume_item:last-child {
      border-bottom: 0px;
    }

    .resume .resume_left ul li {
      display: flex;
      margin-bottom: 10px;
      align-items: center;
    }

    .resume .resume_left ul li:last-child {
      margin-bottom: 0;
    }

    .resume .resume_left ul li .icon {
      width: 35px;
      height: 35px;
      background: #fff;
      color: #32333A;
      border-radius: 50%;
      margin-right: 15px;
      font-size: 16px;
      position: relative;
    }

    .resume .icon i,
    .resume .resume_right .resume_hobby ul li i {
      position: absolute;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
    }

    .resume .resume_left ul li .data {
      color: #ffffff;
    }

    .resume .resume_left .resume_skills ul li {
      display: flex;
      margin-bottom: 10px;
      color: #ffffff;
      justify-content: space-between;
      align-items: center;
    }

    .resume .resume_left .resume_skills ul li .skill_name {
      width: 25%;
    }

    .resume .resume_left .resume_skills ul li .skill_progress {
      width: 60%;
      margin: 0 5px;
      height: 5px;
      background: #A9AAC2;
      position: relative;
    }

    .resume .resume_left .resume_skills ul li .skill_per {
      width: 15%;
    }

    .resume .resume_left .resume_skills ul li .skill_progress span {
      position: absolute;
      top: 0;
      left: 0;
      height: 100%;
      background: #fff;
    }

    .resume .resume_left .resume_social .semi-bold {
      color: #fff;
      margin-bottom: 3px;
    }

    .resume .resume_right {
      width: 520px;
      background: #fff;
      padding: 25px;
    }

    .resume .resume_right .bold {
      color: #141531;
    }

    .resume .resume_right .resume_work ul,
    .resume .resume_right .resume_education ul {
      padding-left: 40px;
      overflow: hidden;
    }

    .resume .resume_right ul li .date {
      font-size: 16px;
      font-weight: 500;
      margin-bottom: 15px;
    }

    .resume .resume_right ul li .info {
      margin-bottom: 20px;
    }

    .resume .resume_right ul li:last-child .info {
      margin-bottom: 0;
    }

    .resume .resume_right .resume_work ul li:before,
    .resume .resume_right .resume_education ul li:before {
      content: "";
      position: absolute;
      top: 5px;
      left: -25px;
      width: 6px;
      height: 6px;
      border-radius: 50%;
      border: 2px solid #141531;
    }

    .resume .resume_right .resume_work ul li:after,
    .resume .resume_right .resume_education ul li:after {
      content: "";
      position: absolute;
      top: 14px;
      left: -21px;
      width: 2px;
      height: 115px;
      background: #141531;
    }

    .resume .resume_right .resume_hobby ul {
      display: flex;
      justify-content: space-between;
    }

    .resume .resume_right .resume_hobby ul li {
      width: 80px;
      height: 80px;
      border: 2px solid #141531;
      border-radius: 50%;
      position: relative;
      color: #141531;
    }

    .resume .resume_right .resume_hobby ul li i {
      font-size: 30px;
    }

    .resume .resume_right .resume_hobby ul li:before {
      content: "";
      position: absolute;
      top: 40px;
      right: -52px;
      width: 50px;
      height: 2px;
      background: #141531;
    }

    .resume .resume_right .resume_hobby ul li:last-child:before {
      display: none;
    }
  </style>
  <script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
</head>

<body>
<div id="print-resume">
  <div class="resume">
    <div class="resume_left">
	<?php
                    include("personal.php");
                    error_reporting(0);
                    $query = "SELECT * FROM personal_information";
                    $data = mysqli_query($con,$query);
                    $total = mysqli_num_rows($data);
                    $result = mysqli_fetch_assoc($data);
					?>
      <div class="resume_profile">
        <img src="<?php echo "images/".$result['Profile_photo']; ?>" style="margin-left:0px" width="15%" height="20%" alt="Profile pic">
      </div>
      <div class="resume_content">
        <div class="resume_item resume_info">
          <div class="title">
            <p class="bold">
              
					<?php
                    echo $result['Middle_name']." ".$result['First_name']." ".$result['Last_name'];
                    if($total !=  0){
                        //echo "data shows";
                    }else{
                        echo "error";
                    }?>
            </p>
			
          </div>
          <ul>
            <!-- <li>
                            <div class="icon">
                                <i class="fas fa-map-signs"></i>
                            </div>
                            <div class="data">
                                12 North Sreet,Baunia,Turag<br /> Dhaka-1230
                            </div>
                        </li> -->
            <li>
              <div class="icon">
                <i class="fas fa-mobile-alt"></i>
              </div>
              <div class="data">
                +<?php
                include("personal.php");
                error_reporting(0);
                $query = "SELECT * FROM personal_information";
                $data = mysqli_query($con,$query);
                $total = mysqli_num_rows($data);
                $result = mysqli_fetch_assoc($data);
                echo $result['Phone_number'];
                if($total !=  0){
                    //echo "data shows";
                }else{
                    echo "error";
                }?>
              </div>
            </li>
            <li>
              <div class="icon">
                <i class="fas fa-envelope"></i>
              </div>
              <div class="data">
              <?php
                include("personal.php");
                error_reporting(0);
                $query = "SELECT * FROM personal_information";
                $data = mysqli_query($con,$query);
                $total = mysqli_num_rows($data);
                $result = mysqli_fetch_assoc($data);
                echo $result['Email'];
                if($total !=  0){
                    //echo "data shows";
                }else{
                    echo "error";
                }?>
              </div>
            </li>
          </ul>
        </div>
        <div class="resume_item resume_skills">
          <div class="title">
            <p class="bold">skill's</p>
          </div>
          <ul type="square">
            <li>
              <div class="skill_name">
              <?php
                            include("ski.php");
                            error_reporting(0);
                            $query = "SELECT * FROM skill";
                            $data = mysqli_query($con,$query);
                            $total = mysqli_num_rows($data);
                            $result = mysqli_fetch_assoc($data);
                            echo $result['Skill'];
                            if($total !=  0){
                                //echo "data shows";
                            }else{
                                echo "error";
                            }?>
              </div>
              <!-- <div class="skill_progress">
                                <span style="width: 80%;"></span>
                            </div>
                            <div class="skill_per">80%</div>-->
            </li>
            <li>
              <div class="skill_name">
                <!-- CSS -->
              </div>
              <!-- <div class="skill_progress">
                                <span style="width: 70%;"></span>
                            </div>
                            <div class="skill_per">70%</div>-->
            </li>
            <li>
              <div class="skill_name">
                <!-- SASS -->
              </div>
              <!-- <div class="s kill_progress">
                                <span style="width: 50%;"></span>
                            </div>
                            <div class="skill_per">50%</div>-->
            </li>
            <li>
              <div class="skill_name">
                <!-- JS -->
              </div>
              <!-- <div class="skill_progress">
                                <span style="width: 60%;"></span>
                            </div>
                            <div class="skill_per">60%</div> -->
            </li>
            <li>
              <div class="skill_name">
                <!-- JQUERY -->
              </div>
              <!-- <div class="skill_progress">
                                <span style="width: 50%;"></span>
                            </div>
                            <div class="skill_per">50%</div> -->
            </li>
          </ul>
        </div>
        <div class="resume_item resume_social">
          <div class="title">
            <p class="bold">Interests</p>
          </div>
          <ul>
            <li>
              <div class="data">
                <p class="semi-bold"><?php
                            include("in.php");
                            error_reporting(0);
                            $query = "SELECT * FROM interest";
                            $data = mysqli_query($con,$query);
                            $total = mysqli_num_rows($data);
                            $result = mysqli_fetch_assoc($data);
                            echo $result['Interest_area'];
                            if($total !=  0){
                                //echo "data shows";
                            }else{
                                echo "error";
                            }?></p>
              </div>
            </li>
            <li>
              <!-- <div class="data">
                <p class="semi-bold">Front End Web Developer</p>
              </div>
            </li>
            <li>
              <div class="data">
                <p class="semi-bold">Android Developer</p>
              </div>
            </li>
            <li>
              <div class="data">
                <p class="semi-bold">Graphic Design</p>
              </div> -->
            </li>
          </ul>
        </div>
      </div>
    </div>

    <div class="resume_right">
      <div class="resume_item resume_about">
        <div class="title">
          <p class="bold">Objective</p>
        </div>
        <p> 
        <?php
                    include("obj.php");
                    error_reporting(0);
                    $query = "SELECT * FROM objectives";
                    $data = mysqli_query($con,$query);
                    $total = mysqli_num_rows($data);
                    $result = mysqli_fetch_assoc($data);
                    echo $result['Objective'];
                    if($total !=  0){
                        //echo "data shows";
                    }else{
                        echo "error";
                    }
                ?>
        </p>
      </div>
      <div class="resume_item resume_education">
        <div class="title">
          <p class="bold">Education</p>
        </div>
        <ul>
          <li>
            <div class="date"><?php
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
                    ?></div>
            <div class="info">
              <p class="semi-bold"><?php
                            include("educ.php");
                            error_reporting(0);
                            $query = "SELECT * FROM education";
                            $data = mysqli_query($con,$query);
                            $total = mysqli_num_rows($data);
                            $result = mysqli_fetch_assoc($data);
                            echo $result['University']." <b>-</b> ".$result['Degree'];
                            if($total !=  0){
                                //echo "data shows";
                            }else{
                                echo "error";
                            }
                    ?> :</p>
              <p><br><b><?php
                            include("educ.php");
                            error_reporting(0);
                            $query = "SELECT * FROM education";
                            $data = mysqli_query($con,$query);
                            $total = mysqli_num_rows($data);
                            $result = mysqli_fetch_assoc($data);
                            echo $result['Percentage'];
                            if($total !=  0){
                                //echo "data shows";
                            }else{
                                echo "error";
                            }
                    ?></b></p>
            </div>
          </li>
          <!-- <li>
            <div class="date">2014 - 2016</div>
            <div class="info">
              <p class="semi-bold">Higher Secondary Certificate (HSC) in Science</p>
              <p>Al-Amin Academy,Board: Comilla<br>PER: 90.00%</p>
            </div>
          </li> -->
        </ul>
      </div>
      <div class="resume_item resume_work">
        <div class="title">
          <p class="bold">Projects</p>
        </div>
        <ul>
          <li>
            <div class="info">
              <p class="semi-bold"><b><?php
                            include("pro.php");
                            error_reporting(0);
                            $query = "SELECT * FROM project";
                            $data = mysqli_query($con,$query);
                            $total = mysqli_num_rows($data);
                            $result = mysqli_fetch_assoc($data);
                            echo $result['Title'];
                            if($total !=  0){
                                //echo "data shows";
                            }else{
                                echo "error";
                            }
                    ?></b></p>
              <p><?php
                            include("pro.php");
                            error_reporting(0);
                            $query = "SELECT * FROM project";
                            $data = mysqli_query($con,$query);
                            $total = mysqli_num_rows($data);
                            $result = mysqli_fetch_assoc($data);
                            echo $result['Description'];
                            if($total !=  0){
                                //echo "data shows";
                            }else{
                                echo "error";
                            }
                    ?> </p>
            </div>
          </li>
          <!-- <li>
            <div class="info">
              <p class="semi-bold">Food Order Application for Android </p>
              <p>Developed in Android studio by using Java. And I used Firebase Database </p>
            </div>
          </li> -->
        </ul>
      </div>

      <div class="resume_item resume_work">
        <div class="title">
          <p class="bold">Experience</p>
        </div>
        <ul>
          <li>
            <div class="info">
              <p class="semi-bold"> <?php
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
                    ?><b><?php
                    include("exp.php");
                    error_reporting(0);
                    $query = "SELECT * FROM company";
                    $data = mysqli_query($con,$query);
                    $total = mysqli_num_rows($data);
                    $result = mysqli_fetch_assoc($data);
                    echo "<br>".$result['Company_name'];
                    if($total !=  0){
                        //echo "data shows";
                    }else{
                        echo "error";
                    }
            ?></b> - <?php
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
                <br>
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
            ?></p>
            </div>
          </li>
          <!-- <li>
            <div class="info">
              <p class="semi-bold">DI</p>
            </div>
          </li> -->
        </ul>
      </div>
    </div>
</div>
</div>
<center>
        <input type="button" class="btn btn-primary" 
           onclick="printContent('print-resume')" value="Download">
  </center>
    
    <script>
	function printContent(el)
	{
		var restorepage = $('body').html();
		var printcontent = $('#' + el).clone();
		$('body').empty().html(printcontent);
		window.print();
		$('body').html(restorepage);
	}
	</script>
</body>

</html>