<?php
session_start();
	$con= new mysqli("localhost","root","","resume_builder");
?>
<html>
<head>
<title>Template</title>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
<style>
@import url('https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;700&display=swap');
*{
	margin:0;
	padding:0;
	box-sizing: border-box;
	list-style:none;
	font-family: 'Montserrat', sans-serif;
	-webkit-print-color-adjust: exact;
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
	height:200px;
}

.resume .resume_left .resume_profile img{
	width:100%;
	height:100%;
}

.resume .resume_left .resume_content{
	padding:0 25px;
}

.resume title{
	margin-bottom:20px;
}

.resume .resume_left .bold{
	color:white;
	margin-left:15px;
	
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

.resume .resume_left ul li,
.resume .resume_right ul li{
	display:flex;
	align-items:center;
	margin-bottom:10px;
}

.resume .resume_left ul li:last-child{
	margin-bottom:0px;
}

.resume .resume_left ul li .icon,
.resume .resume_right ul li .icon{
	width:35px;
	height:35px;
	background:gray;
	color:white;
	border-radius:50%;
	margin-right:15px;
	font-size:16px;
	position:relative;
}

.resume .icon i{
	position:absolute;
	top:50%;
	left:50%;
	transform: translate(-50%,-50%);
}

.resume .resume_left ul li .data{
	color:#b1eaff;
}

.resume .resume_left .resume_skills ul li{
	color:#b1eaff;
	justify-content: space-between;
}

.resume .resume_left .resume_skills ul li .skill_name{
width:25%;	
}

.resume .resume_left .resume_skills ul li .skill_process{
	width:60%;
	margin: 0 5px;
	height: 5px;
	background: #009fd9;
	position:relative;
}

.resume .resume_left .resume_skills ul li .skill_per{
	width:15%;
}

.resume .resume_left .resume_skills ul li .skill_process span{
	position:absolute;
	top:0;
	left:0;
	background:#fff;
	height:100%;
}

.resume .resume_right{
	width:520px;
	background:#fff;
	padding:25px;
}

.resume .resume_right .bold{
	color:gray;
}

.resume .resume_right .resume_work ul,
.resume .resume_right .resume_education ul{
	padding-left:40px;
	overflow:hidden;
} 

.resume .resume_right ul li{
	position:relative;
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
	height:6px;
	border-radius:30%;
	border:1px solid gray;
}

.resume .resume_right .resume_work ul li:after
{
	content:"";
	position:absolute;
	top:12px;
	left:-22px;
	width:3px; 
	
	background: gray;
}

.resume .resume_right .resume_hobby ul{
	display:flex;
	justify-content:space-between;
}

.resume .resume_right .resume_hobby ul li{
	width:80px;
	height:80px;
	border:2px solid gray;
	border-radius:50%;
	position:relative;
	color:gray;
}

.resume .resume_right .resume_hobby ul li i{
	font-size:30px;
}

.resume .resume_right .resume_hobby ul li:before{
	content:"";
	position:absolute;
	top:40px;
	right:-52px;
	width:50px;
	height:2px;
	background:gray;
}

.resume .resume_right .resume_hobby ul li:last-child:before{
	display:none;
}

.a{
margin-left:15px;
color:white;
}

.button{
	width:12%;
	margin-left:45%;
	font-size:22px;
	padding:5px;
	background-color: WhiteSmoke;
	border-radius:5px;
}

</style>
</head>
<body>
<?php
	$username=$_SESSION["uname"];
		$query="Select User_id from create_account where Username='$username'"; 
		$result1= mysqli_query($con,$query);
		$row=mysqli_fetch_array($result1);
		$user_id=$row["User_id"]; 
    ?>  
	<div id ="print-resume">
<div class="resume"> 
<div class="resume_left">
 
<div class="resume_profile">
<?php
 $xyz1="SELECT * FROM `personal_information` where User_id='$user_id'";
        $query1 = mysqli_query($con, $xyz1);

         while($row=mysqli_fetch_array($query1))
		 {
    ?>  
<img src="<?php echo "images/".$row['Profile_photo']; ?>" style="margin-left:0px" width="60%" height="20%" alt="Profile pic">
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
<p class="bold">language</p>
</div>
<?php
 $xyz3="SELECT * FROM `language` where User_id='$user_id'";
        $query3 = mysqli_query($con, $xyz3);

         while($row=mysqli_fetch_array($query3))
		 {
    ?>  

<div class="a"><?php echo $row['Language']?>
</div>
<?php
}
?>
</div>	

<div class="resume_item resume_info">
<div class="title">
<p class="bold">Interest</p>
</div >
<?php
 $xyz2="SELECT * FROM `interest` where User_id='$user_id'";
        $query2 = mysqli_query($con, $xyz2);

         while($row=mysqli_fetch_array($query2))
		 {
    ?>  

<p class="a"><?php echo $row['Interest_area']?></p>

<?php
}
?>
</div>		 
</div>


<div class="resume_right">
<div class="resume_item resume_about">
<div class="title">
<p class="bold">summary</p>
</div>
<?php
 $xyz4="SELECT * FROM `summary` where User_id='$user_id'";
        $query4 = mysqli_query($con, $xyz4);

         while($row=mysqli_fetch_array($query4))
		 {
    ?>  

<p><?php echo $row['Summary']?></p>
<?php
}
?>
</div>
<div class="resume_item resume_work">
<div class="title">
<div class="bold">Work Exprience</div>
</div>
<?php
 $xyz5="SELECT * FROM `experience` where User_id='$user_id'";
        $query5 = mysqli_query($con, $xyz5);
         $row=mysqli_fetch_array($query5);
    ?> 
<?php
 $xyz11="SELECT * FROM `job` where User_id='$user_id'";
        $query11 = mysqli_query($con, $xyz11);
         $row1=mysqli_fetch_array($query11);
    ?> 	
<?php
 $xyz12="SELECT * FROM `company` where User_id='$user_id'";
        $query12 = mysqli_query($con, $xyz12);
         $row2=mysqli_fetch_array($query12);
    ?> 	 

<ul>
<li>
<div class="info">
<p class="semi-bold">Company Name: <?php echo $row2['Company_name']?><br>Job Title: <?php echo $row1['Job']?><br>Start Date: <?php echo $row['Start_date']?><br>End Date: <?php echo $row['End_date']?><br>Details: <?php echo $row['Details']?></p>
</div>
</li>
</ul>
</div>

<div class="resume_item resume_education">
<div class="title">
<p class="bold">Education</p>
</div>
<?php
 $xyz7="SELECT * FROM `education`where User_id='$user_id'";
        $query7 = mysqli_query($con, $xyz7);

         while($row=mysqli_fetch_array($query7))
		 {
    ?>  
<ul>
<li>

<div class="info">
<p>Course: <?php echo $row['Degree']?><br>School/University: <?php echo $row['University']?><br>Grade: <?php echo $row['Grade']?><br>Year: <?php echo $row['Year']?> </p>

</div>
</li>
</ul>
<?php
}
?>
</div>

<div class="resume_item resume_achievment">
<div class="title">
<p class="bold">Achievments and awards</p>
</div>
<?php
 $xyz8="SELECT * FROM `achievement` where User_id='$user_id'";
        $query8 = mysqli_query($con, $xyz8);

         while($row=mysqli_fetch_array($query8))
		 {
    ?> 

<ul>
<li>
<p class="semi-bold"><?php echo $row['Description']?></p>
</li>
</ul>
<?php
}
?>
</div>
</div>
</div>
</div>
<button class="button" name="Download" onclick="printContent('print-resume')">Download</button>
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