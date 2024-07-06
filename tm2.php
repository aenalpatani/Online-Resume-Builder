<html>
<head>
<title>Template</title>
<script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
<style>
@import url('https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;700&display=swap');
*{
	margin:0;
	padding:0;
	box-sizing: border-box;
	list-style:none;
	font-family: 'Montserrat', sans-serif;
}

body{
	background:#585c68;
	font-size:14px;
	line-height:22px;
	color:#555555;
}

.bold{
	font-weight:700;
	font-size:20px;
	text-transform:uppercase;
	
}

.semi_bold{
font-weight:500;
font-size:16px;
}

.resume{
	width:600px;
	height:auto;
	display:flex;
	margin: 50px auto;
}

.resume .resume_left{
	width:280px;
	background:#0bb5f4;
}

.resume .resume_left .resume_profile{
	width:100%;
	height:280px;
}

.resume .resume_left .resume_profile img{
	width:100%;
	height:100%;
}


.resume title{
	margin-bottom:20px;
}

.resume .resume_left .bold{
	color:#fff;
	
}

.resume .resume_left .regular{
	color: #b1eaff;
}

.resume .resume_item{
	padding: 25px 0;
	border-bottom: 2px solid #b1eaff;
}

.resume .resume_left .resume_item:last-child,
.resume .resume_right .resume_item:last-child{
border-bottom: 0px;	
}

.resume .resume_left ul li{
	display:flex;
	align-items:center;
	margin-bottom:10px;
}

.resume .resume_left ul li:last-child{
	margin-bottom:0px;
}

.resume .resume_left ul li .icon{
	width:35px;
	height:35px;
	background:#fff;
	color:#0bb5f4;
	border-radius:50%;
	margin-right:15px;
	font-size:16px;
	position:relative;
}

.resume .icon i,
.resume .resume_right .resume_hobby ul li i{
	position:absolute;
	top:50%;
	left:50%;
	transform: translate(-50%,-50%);
}

.resume .resume_left ul li .data{
	color:#b1eaff;
}



.resume .resume_right{
	width:520px;
	background:#fff;
	padding:25px;
}

.resume .resume_right .bold{
	color:#0bb5f4;
}

.resume .resume_right .resume_work ul,
.resume .resume_right .resume_education ul{
	padding-left:40px;
	overflow:hidden;
} 

.resume .resume_right ul li{
	position:relative;
}

.resume .resume_right ul li .date{
	font-size:16px;
font-weight:500;
margin-bottom:15px;

}


.resume .resume_right ul li .info{
	margin-bottom:20px;
}

.resume .resume_right ul li .last-child .info{
	margin-bottom:0;
}

.resume .resume_right .resume_work ul li:before,
.resume .resume_right .resume_education ul li:before{
	content:"";
	position:absolute;
	top:5px;
	left:-25px;
	width:6px; 
	height:5px;
	border-radius:50%;
	border:2px solid #0bb5f4;
}

.resume .resume_right .resume_work ul li:after,
.resume .resume_right .resume_education ul li:after{
	content:"";
	position:absolute;
	top:10px;
	left:-21px;
	background: #0bb5f4;
}


.resume .resume_left .Objective .p{
	margin-left:5%;
	margin-right:5%;
}

</style>
</head>
<body>
<div class="resume">
<?php
session_start();
	$con= new mysqli("localhost","root","","resume_builder");
	$username=$_SESSION["uname"];
		$query="Select User_id from create_account where Username='$username'"; 
		$result1= mysqli_query($con,$query);
		$row=mysqli_fetch_array($result1);
		$user_id=$row["User_id"];
    ?>  

  
<div class="resume_left">
 <?php
 $xyz1="SELECT * FROM `personal_information`";
        $query1 = mysqli_query($con, $xyz1);

         while($row=mysqli_fetch_array($query1))
		 {
    ?>  
<div class="resume_profile">
<img src="" alt="Profile pic">
</div>
<div class="resume_item resume_info">
<div class="Name">
<p class="bold" id="First_name" name="First_name"><?php echo $row['First_name']?> <?php echo $row['Middle_name']?> <?php echo $row['Last_name']?></p>
</div>
<ul>
<li>
<div class="icon"><i class="fas fa-map-signs"></i></div>
<div class="data" id="Address" name="Address"><?php echo $row['Address']?>
</div>
</li>
<li>
<div class="icon"><i class="fas fa-mobile-alt"></i></div>
<div class="data" id="ContactNumber"><?php echo $row['Phone_number']?>

</div>
</li>
<li>
<div class="icon"><i class="fas fa-envelope"></i></div>
<div class="data" id="email"><?php echo $row['Email']?>	
	
</div>
</li>
</ul>
<?php
}
?>
</div>

<div class="resume_item resume_info">
<div class="title">
<?php
 $xyz3="SELECT * FROM `language`";
        $query3 = mysqli_query($con, $xyz3);

         while($row=mysqli_fetch_array($query3))
		 {
    ?>  
<p class="bold">language</p>
</div>
<div class="Name"><?php echo $row['Language']?>
</div>
<?php
		 }
		 ?>
</div>	

<div class="resume_item resume_info">
<div class="title">
<?php
 $xyz4="SELECT * FROM `skill`";
        $query4 = mysqli_query($con, $xyz4);

         while($row=mysqli_fetch_array($query4))
		 {
    ?>  
<p class="bold">Skill</p>
</div>
<p class="semi-bold"><?php echo $row['Skill']?></p>
<p class="semi-bold"><?php echo $row['Skill']?></p>
<p class="semi-bold"><?php echo $row['Skill']?></p>
<?php
		 }
		 ?>
</div>
<div class="resume_item resume_info">	
<div class="Objective">
<?php
 $xyz2="SELECT * FROM `objectives`";
        $query2 = mysqli_query($con, $xyz2);

         while($row=mysqli_fetch_array($query2))
		 {
    ?>  
<div class="title">
<p class="bold">Objective</p>
</div>
<p class="semi-bold"><?php echo $row['Objective']?></p>
</div>
<?php
		 }
		 ?>
</div>		 
</div>


<div class="resume_right">
<div class="resume_item resume_about">
<div class="title">
<?php
 $xyz5="SELECT * FROM `project`";
        $query5 = mysqli_query($con, $xyz5);

         while($row=mysqli_fetch_array($query5))
		 {
    ?>  
<p class="bold">Projects</p>
</div>
<p><?php echo $row['Title']?> <?php echo $row['Description']?></p>
<p><?php echo $row['Title']?> <?php echo $row['Description']?></p>
<p><?php echo $row['Title']?> <?php echo $row['Description']?></p>
<?php
		 }
		 ?>
</div>
<div class="resume_item resume_work">
<div class="title">
<?php
 $xyz6="SELECT * FROM `experience`";
        $query6 = mysqli_query($con, $xyz6);

         while($row=mysqli_fetch_array($query6))
		 {
    ?>  
<p class="bold">Work Exprience</p>
</div>
<ul>
<li>
<div class="info">
<p><?php echo $row['Start_date']?> <?php echo $row['End_date']?> <?php echo $row['Details']?></p>
</div>
</li>
<li>
<div class="info">

<p><?php echo $row['Start_date']?> <?php echo $row['End_date']?> <?php echo $row['Details']?> </p>
</div>
</li>
<li>
<div class="info">
<p><?php echo $row['Start_date']?> <?php echo $row['End_date']?> <?php echo $row['Details']?></p>
</div>
</li>
</ul>
<?php
		 }
		 ?>
</div>
<div class="resume_item resume_education">
<div class="title">
<?php
 $xyz7="SELECT * FROM `education`";
        $query7 = mysqli_query($con, $xyz7);

         while($row=mysqli_fetch_array($query7))
		 {
    ?>  
<p class="bold">Education</p>
</div>
<ul>
<li>

<div class="info">
<p><?php echo $row['Degree/Course']?> <?php echo $row['University']?> <?php echo $row['Grade/Percentage']?> <?php echo $row['Year']?> </p>
</div>
</li>
<li>
<div class="info">

<p><?php echo $row['Degree/Course']?> <?php echo $row['University']?> <?php echo $row['Grade/Percentage']?> <?php echo $row['Year']?> </p>
</div>
</li>
</ul>
<?php
		 }
		 ?>
</div>
<div class="achievments and awards">
<div class="title">
<?php
 $xyz8="SELECT * FROM `achievement`";
        $query8 = mysqli_query($con, $xyz8);

         while($row=mysqli_fetch_array($query8))
		 {
    ?>  
<p class="bold">Achievments and awards</p>
</div>
<ul>
<li>
<p class="semi-bold"><?php echo $row['Description']?> </p>
</li>
<li>

<p><?php echo $row['Description']?></p>
</li>
</ul>
</div>
<?php
		 }
		 ?>
</div>
</div>
</body>
</html>