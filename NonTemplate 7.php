<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
<head>
<meta content="text/html; charset=ISO-8859-1" http-equiv="content-type">
<title>NonTemplate 7</title>
<link rel="stylesheet" href="https://cdjns.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://kit.fontawesome.com/b99e675b6e.js" crossorigin="anonymous"></script>
<style>
*{
	-webkit-print-color-adjust: exact;
}
.{
vertical-align:middle;
width:50px;
height:50px;
border-radius:50%;}
.button
{
	width:12%;
	margin-left:45%;
	font-size:22px;
	padding:5px;
	background-color: WhiteSmoke;
	border-radius:5px;
    font-family:Times New Roman;

}
.image
{
text-align:center;
Margin-right: 50px;
padding-bottom: 50px;
Margin-left: 50px;
padding: 20px;

}
.semi_bold
{
font-weight:500;
font-size:16px;
    font-family:Times New Roman;

}
.bold
{
	font-weight:700;
	font-size:20px;
	text-transform:uppercase;
}


.resume .resume_item{
	padding: 25px 0;
	border-bottom: 2px solid #b1eaff;
}
.a
{
	    font-family:Times New Roman;
}
.resume .icon i{
	position:absolute;
	top:50%;
	left:50%;
	transform: translate(-50%,-50%);
}
 </style>
 <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.4/jspdf.min.js"></script>
</head>
<body>
<?php
session_start();
	$con=mysqli_connect("localhost","root","","resume_builder");
	$username= $_SESSION["uname"];
	$query="Select User_id from create_account where Username='$username'"; 
	$result1= mysqli_query($con,$query);
	$row=mysqli_fetch_array($result1);
	$User_id=$row['User_id'];
    ?> 
<form method="POST" action="TEMPLATE.php" id="print-resume">
<table style="width: 949px; height: 407px; text-align: left; margin-left: auto; margin-right: auto;" border="5" cellpadding="2" cellspacing="2">
<tbody>
<tr>
<td style="width: 529px; vertical-align: top; background-color:#EDC9AF; text-align:left;"><big><big><big><big><span style="font-weight: bold;"><span style="color: rgb(0, 0, 153)"> Non-Technical Resume</span> <span style="color:rgb(255, 153, 255);"></span></span></big></big></big></big><br>
<div style="text-align: left;">
<hr style="height: 2px; width: 360px; margin-left: 0px; margin-right: auto;" color="blue">
 <div class="bold">
<?php
 $xyz="SELECT * FROM `summary` where User_id='$User_id'";
        $query = mysqli_query($con, $xyz);

         while($row=mysqli_fetch_array($query))
		 {
    ?>  

SUMMARY<hr color="blue">
</div>
<br>
<li><?php echo $row['Summary']?></li
<?php
}
?>

</div>
<br>

 <div class="bold">
<?php
 $xyz="SELECT * FROM `education` where User_id='$User_id'";
        $query = mysqli_query($con, $xyz);

         while($row=mysqli_fetch_array($query))
		 {
    ?>  

EDUCATION<hr color="blue">
</div>
<br>
<b>Degree:-</b><?php echo $row['Degree']?><br><br><b>University:-</b><?php echo $row['University']?><br><br><b>Grade:-</b><?php echo $row['Grade']?><br><br><b>Year:-</b><?php echo $row['Year']?>
<?php
}
?>
</div>

<br>

<br>
<div class="bold">
<?php
 $xyz="SELECT * FROM `achievement` where User_id='$User_id'";
        $query = mysqli_query($con, $xyz);

         while($row=mysqli_fetch_array($query))
		 {
    ?> 

achievement & Awards<hr color="blue">
</div>
<br>
<li><?php echo $row['Description']?></li
<?php
}
?>
</div>
<br>


<div class="bold">
<?php
 $xyz="SELECT * FROM `experience` where User_id='$User_id'";
        $query = mysqli_query($con, $xyz);
         $row=mysqli_fetch_array($query);
    ?> 
<?php
 $xyz="SELECT * FROM `job` where User_id='$User_id'";
        $query = mysqli_query($con, $xyz);
         $row1=mysqli_fetch_array($query);
    ?> 	
<?php
 $xyz="SELECT * FROM `company` where User_id='$User_id'";
        $query = mysqli_query($con, $xyz);
         $row2=mysqli_fetch_array($query);
 ?> 	


experience<hr color="blue">
</div>
<b>Company Name: </b><?php echo $row2['Company_name']?><br><br><b>Job:</b><?php echo $row1['Job']?><br><br><b>Start Date:</b> <?php echo $row['Start_date']?><br><br><b>End Date:</b> <?php echo $row['End_date']?><br><br><b>Details:</b> <?php echo $row['Details']?>
</div>
<br>
<br>
<br>
<br>
<br>

</td>
<br><br><br>
<td style="width: 529px; vertical-align: top; background-color:#EE82EE; text-align:left;"><big><big><big><big><span style="font-weight: bold;"><span style="color: rgb(0, 0, 153);">CONTACT</span> <span style= color:rgb(255, 153, 255);></span></span></big></big></big></big><br>

<hr style="height: 2px; width: 360px; margin-left: 0px; margin-right: auto;" color="blue">


<div class="resume_right">
<div class="resume_item resume_about">
<?php
 $xyz="SELECT * FROM `personal_information` where User_id='$User_id'";
        $query = mysqli_query($con, $xyz);

         while($row=mysqli_fetch_array($query))
		 {
    ?>  
<div class="title">

<p class="bold"></p>
</div>
<div class="image"><img src="<?php echo "images/".$row['Profile_photo']; ?>" style="margin-left:30px" width="30%" height="20%" alt="Profile pic"></div>

<?php
}
?>
</div>
<br>
<br>
<hr color:rgb(255, 153, 255);> 
<br>

<div class="resume_item resume_info">
<div class="resume_profile">

</div>

<?php
 $xyz1="SELECT * FROM `personal_information`where User_id='$User_id'";
        $query1 = mysqli_query($con, $xyz1);

         while($row=mysqli_fetch_array($query1))
		 {
    ?>  
<div class="Name">
<p id="First_name" name="First_name"><b>Name:-<?php echo $row['First_name']?> <?php echo $row['Middle_name']?> <?php echo $row['Last_name']?></b></p>

</div>

<div class="icon"> 
<div class="data" id="Address" name="Address"><b>Address:-</b></i><?php echo $row['Address']?></div>
</div><br>
<div class="icon"></div>
<div class="data" id="ContactNumber"> <b>Phone number:-</b><?php echo $row['Phone_number']?>

</div><br>
<div class="icon"></div>
<div class="data" id="email"><b>Email:-</b><?php echo $row['Email']?>	
	
</div>
<?php
}
?>
</div> 
<br>
<hr color:rgb(255, 153, 255);> 

<div class="bold">
<?php
 $xyz="SELECT * FROM `language` where User_id='$User_id'";
        $query = mysqli_query($con, $xyz);

         while($row=mysqli_fetch_array($query))
		 {
    ?>  
language
</div>
<br>
<li><?php echo $row['Language']?></li
<?php
}
?>
</div>	
<hr color:rgb(255, 153, 255);> 

<div class="bold">
<?php
 $xyz="SELECT * FROM `interest` where User_id='$User_id'";
        $query = mysqli_query($con, $xyz);

         while($row=mysqli_fetch_array($query))
		 {
    ?> 
	
INTEREST
</div>
<br>

<li><?php echo $row['Interest_area']?></li
<?php
}
?>

</div>



 <hr color:rgb(255, 153, 255);> 

 
 
</td>
</tr>
</tbody>
</table>
</form>
<button class="button" onclick="printContent('print-resume')" name="Download"><b>DOWNLOAD</b> <i class="fas fa-download"></i></button>
<script>
function printContent(el){
var restorepage = $('body').html();
var printcontent = $('#' + el).clone();
$('body').empty().html(printcontent);
window.print();
$('body').html(restorepage);
}
</script>
</body>
</html>
		