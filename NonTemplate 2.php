<?php
session_start();
$con= new mysqli("localhost","root","","resume_builder");
?>
<HTML>
<HEAD>
<STYLE>
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
}
#size {
            min-height: 200px;
            width: 70%;
            min-width: 600px;
            margin: 20px auto;
            padding: 30px;
            
        }
.down
{
	margin-left:500px;
	margin-top: 10px;
	padding: 5px;
	font-size: 20px;
	font-style:bold;
	background-color: white;
	border: 2px solid black;
	border-radius:7px;
	width: 20%;
	margin-bottom:50px;
}

#RESUME
{
	height: auto;
	display: flex;
	margin: 0px auto;
	FONT-FAMILY: Cursive;
	border: 2px solid black;
	box-shadow : 5px 5px gray;
}
.resume_left
{
	width: 45%;
	height: auto;
	padding: 20px;
	background-color: yellow;
	font-size: 24px;
}
.resume_left.resume_profile
{
	width: 50%;
	height: 40%;
}
.resume_right
{
	
	PADDING: 30PX;
	width: 80%;
	HEIGHT: auto;
	background-color: white;	
	font-size: 20px;
}
</STYLE>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.4/jspdf.min.js"></script>
</HEAD>
<BODY>
<div id="size">
<DIV id="RESUME">
<div class="resume_left">
<div class="resume_profile">
<?php
	$username = $_SESSION["uname"];
	$query="Select User_id from create_account where Username='$username'";
	$result1=mysqli_query($con,$query);
	$row = mysqli_fetch_array($result1);
	$user_id = $row["User_id"];
	$query1 = "Select Profile_photo from `personal_information` where User_id='$user_id'";
	$res=mysqli_query($con,$query1);
	$ro = mysqli_fetch_array($res);
?>
<img src="<?php echo "images/".$ro['Profile_photo']; ?>" style="margin-left:40px" width="60%" height="20%" alt="Profile pic">
<br><br><hr style="border-top:2px solid black"><br>

<h3>Personal Information </h3>
<?php
	$sql = "Select * from `personal_information` where User_id='$user_id'";
	$result=mysqli_query($con,$sql);
	$row1 = mysqli_fetch_array($result);
	if($row1)
	{
		echo $row1["Last_name"]." ".$row1["First_name"]." ".$row1["Middle_name"];
		echo "<br>".$row1["Address"]."<br>";
		echo $row1["Email"]."<br>";
		echo $row1["Phone_number"]."<br>";
	}
	else
	{
?>
Patel Vaishnavi<br>
Phone no: 6353902012<br>
Email: patelvaishnavim@gmail.com<br>
<?php
	}
?>
</div>
</div>
<div class="resume_right">
<h3 style="color:red">Summary</h3>
<?php
	$sql6 = "Select Summary from `summary` where User_id='$user_id'";
	$result7=mysqli_query($con,$sql6);
	$row7 = mysqli_fetch_array($result7);
	if($row7)
	{
		?>
		
		<p>
		<?php
		echo $row7["Summary"];
		?>
		</p>
	
		<HR style="border-top:2px solid black">
	<br>
		<?php
	}
	else
	{
?>
To become software engineer.

<HR style="border-top:2px solid black">
<?php
	}
?>

<h3 style="color:red">Education</h3>
<?php
	$sql = "Select * from `education` where User_id='$user_id'";
	$result2=mysqli_query($con,$sql);
	
	if($result2)
	{
		?>
		<P>
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
		
		<HR style="border-top:2px solid black">
		<br>
		<?php
	}
	else
	{
?>
SSC board pass.<br/>
Diploma in Computer Engineering.

<HR style="border-top:2px solid black">
<?php
	}
?>

<h3 style="color:red">Experience</h3>
<?php
	$sql5 = "Select * from `experience` where User_id='$user_id'";
	$result3=mysqli_query($con,$sql5);
	$row3 = mysqli_fetch_array($result3);
	$sql1 ="Select Company_name from company where User_id='$user_id'";
	$sql2 ="Select Job from job where User_id='$user_id'";
	$result4 = mysqli_query($con,$sql1);
	$result5 = mysqli_query($con,$sql2);
	$row4 = mysqli_fetch_array($result4);
	$row5 = mysqli_fetch_array($result5);
	if($row3)
	{
		?>
		<P>
		<?php
		echo "Company Name : ".$row4["Company_name"]."<br>";
		echo "Job Title : ".$row5["Job"]."<br>";
		echo "Start date : ".$row3["Start_date"]."<br>";
		echo "End date : ".$row3["End_date"]."<br>";
		echo "Description : ".$row3["Details"]."<br>";
		?>
		</p>
	
		<HR style="border-top:2px solid black">
		<br>
		<?php
	}
	else
	{
?>
SSC board pass.<br/>
Diploma in Computer Engineering.

<HR style="border-top:2px solid black">

<?php
	}
?>
<h3 style="color:red">Interest</h3>
<?php
	$sql4 = "Select Interest_area from `Interest` where User_id='$user_id'";
	$result6=mysqli_query($con,$sql4);
	//$row6 = mysqli_fetch_array($result6);
	if($result6)
	{
		?>
		<P>
		<UL CLASS="PERSONAL">
		<?php
		while($row6 = mysqli_fetch_array($result6))
		{
			echo "<LI>".$row6["Interest_area"]."</LI>";
		}
		?>
		</ul>
		</p>
		
		<HR style="border-top:2px solid black">
		<br>
		<?php
	}
	else
	{
?>
<UL CLASS="PERSONAL">
<LI>Coding</LI><br>
<LI>Designing</LI>
</UL>

<HR style="border-top:2px solid black">

<?php
	}
?>

<h3 style="color:red">Achievements & Awards</h3>
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
		
		<HR style="border-top:2px solid black">
		<br>
		<?php
	}
	else
	{
?>
Till now nothing but soon will come.
<HR style="border-top:2px solid black">
<?php
	}
?>

<h3 style="color:red">Language</h3>
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
<UL>
<LI>C</LI><br/>
<LI>C++</LI><br/>
<LI>.net</LI><br/>
<LI>PHP</LI><BR>
<LI>HTML & CSS</LI>
</UL>
<?php
	}
?>
</div>
</DIV>
</div>
<input class="down" type="button" onclick="printContent('size')" value="Download">
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
</BODY>
</HTML>