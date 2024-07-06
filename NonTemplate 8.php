<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
	<meta content="text/html; charset=ISO-8859-1" http-equiv="content-type">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NonTemplate 8</title>
    <link rel="stylesheet" href="css/style.css">
	<script src="https://kit.fontawesome.com/b99e675b6e.js" crossorigin="anonymous"></script>
	<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.4/jspdf.min.js"></script>
	<style>
*{
	-webkit-print-color-adjust: exact;
}
{
    padding:0px;
    margin: 0px;
}

.outer{
    width: 100%;
    height: 100%;
    margin:0px auto;
}
.outer h1{
    text-align: center;
}
p{
    font: size 20px;
    text-align:right;

}
.border{
	
    width:auto;
	height:auto;
    padding: 0px;
    background-color:#E41B17;
    border: 1px solid black;
    font-weight: bold;
    text-align:left;
	    font-family: 'Montserrat', Bookman Old Style;
	font-size:20px;

	
}
ul{
    font: size 20px;
    margin-left: 30px;
}
.{
vertical-align:middle;
width:50px;
height:autopx;
border-radius:50%;}
.button
{
	width:30%;
	margin-left:35%;

	font-size:22px;
	padding:5px;
	background-color: WhiteSmoke;
	border-radius:5px;
    font-family: 'Montserrat', Bookman Old Style;

}
.semi_bold
{
font-weight:500;
font-size:16px;
    font-family: 'Montserrat', Bookman Old Style;

}
.bold
{
	font-weight:700;
	font-size:20px;
	text-align:left;
    margin-right:35%;


}


.resume .resume_item{
	border-bottom: 2px solid #b1eaff;
	text-align:left;
}
.a
{
	    font-family: 'Montserrat',Bookman Old Style;
		text-align:left;
}
.star
{
	font-weight:700;
	font-size:30px;
	text-align:left;

}
.image
{
margin-right: 30px;
 padding-top: 30px;
margin-left: 30px;

padding-bottom: 10px;
text-align:right;
}
.tech
{
width:auto;
height: auto;
padding: 20px;
Margin-left: 250px;
Margin-right: 250px;
border: 2px solid black;
font-size:20px;
background-color:#E6BF83;
}
.image
{
text-align:left;
margin-left:2%;
margin-right:30%;
margin-top:2px;
padding:10px;
padding-bottom: 20px;
padding-top: 0px;
height:80%;
width:80%;
}

</style>
 <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.4/jspdf.min.js"></script>
</head>
<body>

 <?php
session_start();
	$con=mysqli_connect("localhost","root","","resume_builder");
	$Username= $_SESSION["uname"];
	$query="Select User_id from create_account where Username='$Username'"; 
	$result1= mysqli_query($con,$query);
	$row=mysqli_fetch_array($result1);
	$User_id=$row["User_id"];
    ?> 

<div class="tech" id="print-resume">
<div class="border"><div class="star"><b>TECHNICAL RESUME</b></div>
<hr color="black">
<?php
 $xyz="SELECT * FROM `objectives` where User_id='$User_id'";
        $query = mysqli_query($con, $xyz);

         while($row=mysqli_fetch_array($query))
		 {
    ?>  

OBJECTIVE

<br>
<br>
<li><?php echo $row['Objective']?></li
<?php
}
?>
<br>


<?php
 $xyz="SELECT * FROM `personal_information` where User_id='$User_id'";
        $query = mysqli_query($con, $xyz);

         while($row=mysqli_fetch_array($query))
		 {
    ?> 


<br>
<div class="image"><img src="<?php echo "images/".$row['Profile_photo']; ?>" width="30%" height="30%" alt="Profile pic" "></div></div>
<?php
}
?>

<br>
<br>
 <div class="border">
<?php
 $xyz1="SELECT * FROM `personal_information`where User_id='$User_id'";
        $query1 = mysqli_query($con, $xyz1);

         while($row=mysqli_fetch_array($query1))
		 {
    ?>  
        PERSONAL DETAILS
		
    </div>
    <br>
        <li><b>Name: <?php echo $row['First_name']?> <?php echo $row['Middle_name']?> <?php echo $row['Last_name']?></b></li><br>
        <li> <b>Email:</b><?php echo $row['Email']?></li><br>
        <li> <b>Address:</b><?php echo $row['Address']?></li><br>
        <li><b>Mobile:</b><?php echo $row['Phone_number']?></li>
		          <?php } ?>

<br>
	
<div class="border">
<?php
 $xyz="SELECT * FROM `education` where User_id='$User_id'";
        $query = mysqli_query($con, $xyz);

         while($row=mysqli_fetch_array($query))
		 {
    ?>  
    EDUCATION</div>
<br>
<li><b>Degree:-</b><?php echo $row['Degree']?></li><li><b>University:-</b><?php echo $row['University']?></li><li><b>Grade:-</b><?php echo $row['Grade']?></li><li><b>Year:-</b><?php echo $row['Year']?></li
		 <?php } ?>
		 <br>
<div class="border">
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
EXPERIENCE
		 </div>
		 <br>
		 <li><b>Company: </b><?php echo $row2['Company_name']?></li><li><b>Job:</b><?php echo $row1['Job']?></li><li><b>Start Date:</b> <?php echo $row['Start_date']?></li><li><b>End Date:</b> <?php echo $row['End_date']?></li><li><b>Details:</b> <?php echo $row['Details']?></li
         
		
		
		  <br>
		  
		  
		   <div class="border">
<?php
 $xyz2="SELECT * FROM `skill` where User_id='$User_id'";
        $query2 = mysqli_query($con, $xyz2);
 
         while($row=mysqli_fetch_array($query2))
		 {
    ?>  

SKILL
</div>
<br>
<li><?php echo $row['Skill']?></li
<?php
}
?>

<br>
 <div class="border">
<?php
 $xyz="SELECT * FROM `achievement` where User_id='$User_id'";
        $query = mysqli_query($con, $xyz);

         while($row=mysqli_fetch_array($query))
		 {
    ?> 

    ACHIEVEMENT and AWARDS
</div>
<br>
<li><?php echo $row['Description']?></li
<?php
}
?>

<br>

<div class="border">
<?php
 $xyz="SELECT * FROM `language` where User_id='$User_id'";
        $query = mysqli_query($con, $xyz);

         while($row=mysqli_fetch_array($query))
		 {
    ?> 

    LANGUAGES
</div>
<br>
<li><?php echo $row['Language']?></li
<?php
}
?>


<br>




		 <div class="border">
		 
<?php
 $xyz="SELECT * FROM `project` where User_id='$User_id'";
        $query = mysqli_query($con, $xyz);

         while($row=mysqli_fetch_array($query))
		 {
    ?> 

    Project
</div>
<br>
<li><?php echo $row['Description']?></li
<?php
}
?>
</div>
</div>
<br>
<br>
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