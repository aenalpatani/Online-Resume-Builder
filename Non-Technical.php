<?php
	session_start();
	$_SESSION["TYPE"] = "Non-Technical";
	if(isset($_POST["Personal"]))
		header("location:personal_information.php");
	if(isset($_POST["Education"]))
		header("location:education.php");
	if(isset($_POST["Experience"]))
		header("location:experience.php");
	if(isset($_POST["Interest"]))
		header("location:interest.php");
	if(isset($_POST["Summary"]))
		header("location:Summary.php");
	if(isset($_POST["Achievements"]))
		header("location:Achievements & Awards.php");
	if(isset($_POST["Language"]))
		header("location:Language.php");
	if(isset($_POST["Resume"]))
		header("location:TemplatesNonTechnical.html");
?>
<html>
<head>
<title>Non-Technical</title>
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.12.1/css/all.css" crossorigin="anonymous">
<meta name='viewport' content='width=device-width, initial-scale=1'>
<script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
.tech
{
	width: 60%;
	height: auto;
	padding: 20px;
	Margin-left: 250px;
	border: 2px solid gray;
	line-spacing: 2;
	line-height: 2;
	font-size:20px;
	background-color: white;
}
.box{
	width: 100%;
	padding: 5px;
	margin-top:15px; 
	background-color: WhiteSmoke;
	border-radius: 5px;
	//background-image: url(person-icon.png);
	//background-repeat: no-repeat;
}
.box1{
	width: 100%;
	padding: 5px;
	margin-top:15px; 
	background-color: Lightblue;
	border-radius: 5px;
}
</style>
</head>
<body>
<FORM method="POST">
<div class="tech">
<header> <hr size="20px" color="grey" ></hr></header>
<center><h2>Non-Technical Person Profile</h2></center>
<hr style="border-top:3px solid gray" ></hr>
<b>Sections</b>
<hr style="border-top:5px dashed gray" ></hr>
<button class="box"  name="Personal" style="font-size:24px"><i class="fa fa-user-circle-o"></i> Personal details</button>
<button class="box"  name="Education" style="font-size:24px"><i class='fas fa-book-open'></i> Education</button>
<button class="box"  name="Experience" style="font-size:24px"><i class="fa fa-black-tie"></i> Experience</button>
<button class="box"  name="Interest" style="font-size:24px"><i class="fa fa-heart"></i> Interest</button>
<button class="box"  name="Summary" style="font-size:24px"><i class='far fa-life-ring'></i> Summary</button>
<b>More Sections</b>
<hr style="border-top:5px dashed gray" ></hr>
<button class="box"  name="Achievements" style="font-size:24px"><i class='fas fa-award'></i> Achievements & Awards</button>
<button class="box"  name="Language" style="font-size:24px"><i class="fa fa-language"></i> Langauge</button>
<hr style="border-top:3px solid gray" ></hr>
<button class="box1"  name="Resume" style="font-size:24px"><i class="fa fa-eye"></i> View Resume</button>
</div>
</FORM>
</body>
</html>