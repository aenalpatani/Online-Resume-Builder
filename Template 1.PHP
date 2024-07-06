<?php
session_start();
$con= new mysqli("localhost","root","","resume_builder");

?>
<html>
<head>
<title>Template</title>
<script src= "https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.8.1/html2pdf.bundle.min.js" integrity="sha512vDKWohFHe2vkVWXHp3tKvIxxXg0pJxeid5eo+UjdjME3DBFBn2F8yWOE0XmiFcFbXxrEOR1JriWEno5Ckpn15A==" 
    crossorigin="anonymous">
    </script>
<style>
*{
	margin: 0;
	padding: 0;
	box-sizing: border-box;
	list-style:none;
	FONT-FAMILY: cursive;
-webkit-print-color-adjust: exact;
}
body{
	background:white;
	font-size:14px;
	line-height:22px;
	color:#555555;
}
#size {
            min-height: 200px;
            width: 60%;
            min-width: 600px;
            background: white;
            margin: 20px auto;
            padding: 30px;
            
        }
.down
{
	width:12%;
	margin-left:40%;
	font-size:22px;
	padding:5px;
	background-color: WhiteSmoke;
	border-radius:5px;
	/*margin-left:500px;
	margin-top: 20px;
	padding: 5px;
	font-size: 20px;
	font-style:bold;
	background-color: white;
	border: 2px solid black;
	border-radius:7px;
	width: 20%;
	margin-bottom:50px;*/
}
.RESUME
{
	width:600px;
	height:auto;
	display:flex;
	border: 2px solid black;
	padding:10px;
	border-radius: 10px  10px 0px 0px;
}
.RESUME-BOTTOM{
	padding:10px;
	width:600px;
	height:auto;
	border: 2px solid black;
	border-radius: 0px  0px 10px 10px;
	//background-color: White;
}
.PERSONAL
{
	margin-left: 270PX;
}
</style>
</head>
<body>
<div id="print-resume">
<div id="size">
<div class="RESUME">
<?php
	$username = $_SESSION["uname"];
	$query="Select User_id from create_account where Username='$username'";
	$result1=mysqli_query($con,$query);
	$row = mysqli_fetch_array($result1);
	$user_id = $row["User_id"];
	$sql = "Select * from `personal_information` where User_id='$user_id'";
	$result=mysqli_query($con,$sql);
	$row1 = mysqli_fetch_array($result);
	if($row1)
	{
		echo $row1["Last_name"]." ".$row1["First_name"]." ".$row1["Middle_name"];
		echo "<br>".$row1["Address"]."<br>";
		echo $row1["Email"]."<br>";
		echo $row1["Phone_number"]."<br>";
		?>
	<img src="<?php echo "images/".$row1['Profile_photo']; ?>" style="margin-left:320px" width="20%" height="20%" alt="Profile pic">
	<?PHP
	}
	else
	{
?>
Name: ABC<BR>
Address: abcdefgh<BR>
Email: abc@gmail.com<BR>
Phone: +91 8976554223

<?php
	}
?>


</div>
<div class="RESUME-BOTTOM">
<B style="color:red">Education</B>
<?php
	$sql = "Select * from `education` where User_id='$user_id'";
	$result2=mysqli_query($con,$sql);
	
	if($result2)
	{
		?>
		<P CLASS="PERSONAL">
		<?php
		while($row2 = mysqli_fetch_array($result2))
		{
			echo "Degree : ".$row2["Degree"]."<br>";
			echo "University : ".$row2["University"]."<br>";
			echo "Grade : ".$row2["Grade"]."<br>";
			echo "Year : ".$row2["Year"]."<br>";
		}
		?>
		</p>
		
		<HR>
		
		<?php
	}
	else
	{
?>
<P CLASS="PERSONAL">
SSC board pass.<br/>
Diploma in Computer Engineering.
</p>
<HR>
<?php
	}
?>
<B style="color:red">Experience</B>
<?php
	$sql5 = "Select * from `experience` where User_id='$user_id'";
	$result3=mysqli_query($con,$sql5);

	$sql1 ="Select Company_name from company where User_id='$user_id'";
	$sql2 ="Select Job from job where User_id='$user_id'";
	$result4 = mysqli_query($con,$sql1);
	$result5 = mysqli_query($con,$sql2);
	$row3 = mysqli_fetch_array($result3);
	$row4 = mysqli_fetch_array($result4);
	$row5 = mysqli_fetch_array($result5);
	if($row3)
	{
		?>
		<P CLASS="PERSONAL">
		<?php
		echo "Company Name : ".$row4["Company_name"]."<br>";
		echo "Job Title : ".$row5["Job"]."<br>";
		echo "Start date : ".$row3["Start_date"]."<br>";
		echo "End date : ".$row3["End_date"]."<br>";
		echo "Description : ".$row3["Details"]."<br>";
		?>
		</p>
		
		<HR>
	
		<?php
	}
	else
	{
?>
<P CLASS="PERSONAL">
SSC board pass.<br/>
Diploma in Computer Engineering.
</p>

<HR>

<?php
	}
?>
<B style="color:red">Skills</B>
<?php
	$sql4 = "Select Skill from `Skill` where User_id='$user_id'";
	$result6=mysqli_query($con,$sql4);
	
	if($result6)
	{
		?>
		<P>
		<UL CLASS="PERSONAL">
		<?php
		while($row6 = mysqli_fetch_array($result6))
		{
			echo "<LI>".$row6["Skill"]."</LI>";
		}
		?>
		</ul>
		</p>
		
		<HR>
		
		<?php
	}
	else
	{
?>
<P>
<UL CLASS="PERSONAL">
<LI>Coding</LI><br>
<LI>Designing</LI>
</UL>
</p>

<HR>

<?php
	}
?>
<B style="color:red">Objective</B>
<?php
	$sql6 = "Select Objective from `objectives` where User_id='$user_id'";
	$result7=mysqli_query($con,$sql6);
	$row7 = mysqli_fetch_array($result7);
	if($row7)
	{
		?>
		
		<p CLASS="PERSONAL">
		<?php
		echo $row7["Objective"];
		?>
		</p>
		
		<HR>
		
		<?php
	}
	else
	{
?>
<P CLASS="PERSONAL">
To become software engineer.
</p>

<HR>
<?php
	}
?>
<B style="color:red">Projects</B>
<?php
	$sql8 = "Select * from `project` where User_id='$user_id'";
	$result8=mysqli_query($con,$sql8);
	
	if($result8)
	{
		?>
		
		<p CLASS="PERSONAL">
		<?php
		while($row8 = mysqli_fetch_array($result8))
		{
			echo "<b>".$row8["Title"]."</b><br>";
			echo "<br>".$row8["Description"];
		}
		?>
		</p>
		
		<HR>
		
		<?php
	}
	else
	{
?>
<H5 CLASS="PERSONAL">Resume Builder</H5><br>
<p CLASS="PERSONAL">
This is a web application. Used to make Resume.
</p>

<HR>
<?php
	}
?>
<B style="color:red">Achievements & <br> Awards</B>
<?php
	$sql9 = "Select Description from `achievement` where User_id='$user_id'";
	$result9=mysqli_query($con,$sql9);
	
	if($result9)
	{
		?>
		
		<p CLASS="PERSONAL">
		<?php
		while($row9 = mysqli_fetch_array($result9))
		{
			echo $row9["Description"];
		}
		?>
		</p>
		
		<HR>
		
		<?php
	}
	else
	{
?>
<P CLASS="PERSONAL">
Till now nothing but soon will come.
</p>
<HR>
<?php
	}
?>
<B style="color:red">Language</B>
<?php
	$sql10 = "Select Language from `language` where User_id='$user_id'";
	$result10=mysqli_query($con,$sql10);
	
	if($result10)
	{
		?>
		<P>
		<UL CLASS="PERSONAL">
		<?php
		while($row10 = mysqli_fetch_array($result10))
		{
			echo "<LI>".$row10["Language"]."</LI>";
		}
		?>
		</ul>
		</p>
		<?php
	}
	else
	{
?>
<P>
<UL CLASS="PERSONAL">
<LI>C</LI><br/>
<LI>C++</LI><br/>
<LI>.net</LI><br/>
<LI>PHP</LI><BR>
<LI>HTML & CSS</LI>
</UL>
</p>
<?php
	}
?>
</div>
</div>	
</div>
        <input type="button" class="down" 
          onclick="GeneratePdf();" value="Download">
  
    
    <script>            
        function GeneratePdf() {
            var element = document.getElementById('print-resume');
            html2pdf(element);
            }
    </script>
</body>
</html>