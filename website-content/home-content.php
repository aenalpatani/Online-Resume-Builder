<br><br>

<div class="content-box">
	<?php
if($_GET['subcat']=='add-home-content'){

	if(!empty($_GET['edit'])){

   $editId= $_GET['edit'];
   $query="SELECT * FROM home_content WHERE id=$editId";
   $res= $conn->query($query);
   $editData=$res->fetch_assoc();
   $contentSection= $editData['content_section'];
   $firstTitle= $editData['first_title'];
   $secondTitle= $editData['second_title'];
   $description= $editData['description'];

   
   $idAttr="updateForm";
   
}else{
	$contentSection='';
   $firstTitle= '';
   $secondTitle= '';
   $description= '';
  
   $editId='';
    $idAttr="adminForm";
}


?>
	
	<div class="row">
		<div class="col">
			<h4>Home Content</h4>
		</div>
		<div class="col text-right">
			<a href="dashboard.php?cat=website-content&subcat=home-content" class="btn btn-secondary content-link"> View</a>
		</div>
	</div>
	<br>
	<form id="<?php echo $idAttr; ?>" rel="<?php echo $editId; ?>" name="home_content">
	<div class="row">
		<div class="col">
			  <div class="form-group">
			  	
            	<select class="form-control" name="content_section">
            		<option value="">Select Content Section</option>
            		<?php
            		
            		if(!empty($contentSection))
            		{

                      	
                   switch (strtolower($contentSection)) {

                          case 'how to download':
                          ?>
                     <option value="how to download" selected>How to Download</option>
            		<option value="about downloader">About Downloader</option>
            		<option value="downloader features">Downloader Features</option>
            		<option value="downloader details">Downloader Details</option>
                          
                          <?php 
                          break;
                          case 'about downloader':
                          ?>
                    <option value="how to download" >How to Download</option>
            		<option value="about downloader" selected>About Downloader</option>
            		<option value="downloader features">Downloader Features</option>
            		<option value="downloader details">Downloader Details</option>
                           <?php
                          break;
                          case 'downloader features':
                           ?>
                     <option value="how to download">How to Download</option>
            		<option value="about downloader">About Downloader</option>
            		<option value="downloader features" selected>Downloader Features</option>
            		<option value="downloader details">Downloader Details</option>
                           <?php
                          break;
                         case 'downloader details':
                           ?>
                     <option value="how to download">How to Download</option>
            		<option value="about downloader">About Downloader</option>
            		<option value="downloader features" >Downloader Features</option>
            		<option value="downloader details" selected>Downloader Details</option>
                           <?php    		
                            
                    }                      	
                      		
                      		
                      		
                      	 
                       
                      	
                  }else{
            		?>
            		<option value="how to download">How to Download</option>
            		<option value="about downloader">About Downloader</option>
            		<option value="downloader features">Downloader Features</option>
            		<option value="downloader details">Downloader Details</option>
            	<?php } ?>
            	</select>
            </div>
		</div>
		<div class="col">
			<div class="form-group">
				<input type="text" class="form-control"  placeholder="Home Page Title (h1)" name="first_title" value="<?php echo $firstTitle; ?>">
			</div>
		</div>
		<div class="col">
			<div class="form-group">
				<input type="text" class="form-control"  placeholder="Home Page Subtitle (h2)" name="second_title" value="<?php echo $secondTitle; ?>">
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col">
			<!---===== form start====-->
          
			
			
			<div class="form-group">
				<textarea placeholder="Description" class="form-control" name="description">
					<?php echo $description; ?>
				</textarea>
			</div>
			<div class="form-group">
				<button class="btn btn-secondary">Save</button>
			</div>
			<!---====== form end==========-->
		</div>
		
	</div>
</form>
<?php }elseif (!empty($_GET['view'])) {?>
	
	<?php 
	$con=mysqli_connect("localhost","root","","resume_builder");
	$id= $_GET['view'];
   $query="SELECT * FROM personal_information WHERE User_id=$id";
   $res= $con->query($query);
   $viewData=mysqli_fetch_assoc($res);
   $backId=$viewData['User_id']-1;
    $type=$viewData['Resume_type'];
	$fname =$viewData['First_name'];
	$lname =$viewData['Last_name'];
	$mname =$viewData['Middle_name'];
	$email =$viewData['Email'];
	$pno =$viewData['Phone_number'];
	$address =$viewData['Address'];
    //$secondTitle=$viewData['second_title'];
    //$description=$viewData['description'];
   $query1="SELECT * FROM education WHERE User_id=$id";
   $res1= $con->query($query1);
   $viewData1=mysqli_fetch_assoc($res1);
   $query2="SELECT * FROM Experience WHERE User_id=$id";
   $res2= $con->query($query2);
   $viewData2=mysqli_fetch_assoc($res2);
   $query3="SELECT * FROM company WHERE User_id=$id";
   $res3= $con->query($query3);
   $viewData3=mysqli_fetch_assoc($res3);
   $query4="SELECT * FROM job WHERE User_id=$id";
   $res4= $con->query($query4);
   $viewData4=mysqli_fetch_assoc($res4);
   $query5="SELECT * FROM Objectives WHERE User_id=$id";
   $res5= $con->query($query5);
   $viewData5=mysqli_fetch_assoc($res5);
   $query6="SELECT * FROM skill WHERE User_id=$id";
   $res6= $con->query($query6);
   $viewData6=mysqli_fetch_assoc($res6);
   $query7="SELECT * FROM interest WHERE User_id=$id";
   $res7= $con->query($query7);
   $viewData7=mysqli_fetch_assoc($res7);
   $query8="SELECT * FROM summary WHERE User_id=$id";
   $res8=$con->query($query8);
   $viewData8=mysqli_fetch_assoc($res8);
   $query9="SELECT * FROM project WHERE User_id=$id";
   $res9=$con->query($query9);
   $viewData9=mysqli_fetch_assoc($res9);
   $query10="SELECT * FROM achievement WHERE User_id=$id";
   $res10=$con->query($query10);
   $viewData10=mysqli_fetch_assoc($res10);
   $query11="SELECT * FROM language WHERE User_id=$id";
   $res11=$con->query($query11);
   $viewData11=mysqli_fetch_assoc($res11);
   
	?>
	<!-----=================table content start=================-->
	<br>
	<div class="row">
		<div class="col">
			<?php echo "<h4>Personal Information<br></h4>"; ?>
		</div>
		<div class="col text-right">
			<a href="dashboard.php?cat=website-content&subcat=home-content" class="btn btn-secondary content-link">Back </a>
		</div>
	</div>
	<br>
	<div class="row">
		<div class="col">
	<div class="table-responsive">
	<table class="table">
	<tr>
				<th>Resume Type</th>
				<th>Name</th>
				<th>Email</th>
				<th>Phone number</th>
				<th>Address</th>
				
	</tr>
	<tr>
        <td><h5><?php echo $type; ?></h5></td>
		<td><h5><?php echo $fname." ".$mname." ".$lname; ?></h5></td>
        <td><h5><?php echo $email; ?></h5></td>
		<td><h5><?php echo $pno; ?></h5></td>
		<td><h5><?php echo $address; ?></h5></td>
		</tr>
	</div>
</div>
</div>
</table>
<br>
<div class="row">
		<div class="col">
			<?php echo "<h4>Education<br></h4>"; ?>
		</div>
		</div>
		<br>
	<div class="row">
		<div class="col">
	<div class="table-responsive">
	<table class="table">
	<tr>
				<th>Degree</th>
				<th>University</th>
				<th>Grade</th>
				<th>Year</th>
				
	</tr>
	<tr>
        <td><h5><?php echo $viewData1["Degree"]; ?></h5></td>
		<td><h5><?php echo $viewData1["University"]; ?></h5></td>
        <td><h5><?php echo $viewData1["Grade"]; ?></h5></td>
		<td><h5><?php echo $viewData1["Year"]; ?></h5></td>
		</tr>
		</table>
	</div>
</div>
</div>
<br>
<div class="row">
		<div class="col">
			<?php echo "<h4>Experience<br></h4>"; ?>
		</div>
		</div>
		<br>
	<div class="row">
		<div class="col">
	<div class="table-responsive">
	<table class="table">
	<tr>
				<th>Job</th>
				<th>Company</th>
				<th>Start date</th>
				<th>End date</th>
				<th>Description</th>
	</tr>
	<tr>
        <td><h5><?php echo $viewData4["Job"]; ?></h5></td>
		<td><h5><?php echo $viewData3["Company_name"]; ?></h5></td>
        <td><h5><?php echo $viewData2["Start_date"]; ?></h5></td>
		<td><h5><?php echo $viewData2["End_date"]; ?></h5></td>
		<td><h5><?php echo $viewData2["Details"]; ?></h5></td>
		</tr>
		</table>
	</div>
</div>
</div>
<br>
<?php
if($type=="Technical")
{
?>
<div class="row">
		<div class="col">
			<?php echo "<h4>Objective<br></h4>"; ?>
		</div>
		</div>
		<br>
	<div class="row">
		<div class="col">
	<div class="table-responsive">
	
	<table class="table">
	<tr>
				<th>Objective</th>
				
	</tr>
	<tr>
        <td><h5><?php echo $viewData5["Objective"]; ?></h5></td>
		
		</tr>
		</table>
		
	</div>
</div>
</div>
<?php
}
?>
<br>
<?php
if($type=="Technical")
{
?>
<div class="row">
		<div class="col">
			<?php echo "<h4>Skills<br></h4>"; ?>
		</div>
		</div>
		<br>
	<div class="row">
		<div class="col">
	<div class="table-responsive">
	
	<table class="table">
	<tr>
				<th>Skills</th>
				
	</tr>
	<tr>
        <td><h5><?php echo $viewData6["Skill"]; ?></h5></td>
		
		</tr>
		</table>
		
	</div>
</div>
</div>
<?php
}
?>
<br>
<?php
if($type=="Non-Technical")
{
?>
<div class="row">
		<div class="col">
			<?php echo "<h4>Interest<br></h4>"; ?>
		</div>
		</div>
		<br>
	<div class="row">
		<div class="col">
	<div class="table-responsive">
	
	<table class="table">
	<tr>
				<th>Interest</th>
				
	</tr>
	<tr>
        <td><h5><?php echo $viewData7["Interest_area"]; ?></h5></td>
		
		</tr>
		</table>
		
	</div>
</div>
</div>
<?php
}
?>
<br>
<?php
if($type=="Non-Technical")
{
?>
<div class="row">
		<div class="col">
			<?php echo "<h4>Summary<br></h4>"; ?>
		</div>
		</div>
		<br>
	<div class="row">
		<div class="col">
	<div class="table-responsive">
	
	<table class="table">
	<tr>
				<th>Summary</th>
				
	</tr>
	<tr>
        <td><h5><?php echo $viewData8["Summary"]; ?></h5></td>
		
		</tr>
		</table>
		
	</div>
</div>
</div>
<?php
}
?>
<br>
<?php
if($type=="Technical")
{
?>
<div class="row">
		<div class="col">
			<?php echo "<h4>Project<br></h4>"; ?>
		</div>
		</div>
		<br>
	<div class="row">
		<div class="col">
	<div class="table-responsive">
	
	<table class="table">
	<tr>
				<th>Title</th>
				<th>Description</th>
	</tr>
	<tr>
        <td><h5><?php echo $viewData9["Title"]; ?></h5></td>
		<td><h5><?php echo $viewData9["Description"]; ?></h5></td>
		</tr>
		</table>
		
	</div>
</div>
</div>
<?php
}
?>
<br>
<div class="row">
		<div class="col">
			<?php echo "<h4>Achievements & Awards<br></h4>"; ?>
		</div>
		</div>
		<br>
	<div class="row">
		<div class="col">
	<div class="table-responsive">
	
	<table class="table">
	<tr>
				<th>Description</th>
				
	</tr>
	<tr>
        <td><h5><?php echo $viewData10["Description"]; ?></h5></td>
		
		</tr>
		</table>
		
	</div>
</div>
</div>
<br>
<div class="row">
		<div class="col">
			<?php echo "<h4>Language<br></h4>"; ?>
		</div>
		</div>
		<br>
	<div class="row">
		<div class="col">
	<div class="table-responsive">
	
	<table class="table">
	<tr>
				<th>Language</th>
				
	</tr>
	<tr>
        <td><h5><?php echo $viewData11["Language"]; ?></h5></td>
		
		</tr>
		</table>
		
	</div>
</div>
</div>
	<!-----==================table content end===================-->
	<?php
}

else{?>

	<!-----=================table content start=================-->
	<br>
	<div class="row">
		<div class="col">
			<h4> User details</h4>
		</div>
		
	</div>
	<br>
	<div class="row">
		<div class="col">
	<div class="table-responsive">
		<table class="table">
			<tr>
				<th>Section</th>
				<th>User name</th>
				<th>Password</th>
				<th>View</th>
				
			</tr>
						<?php
  			$con=mysqli_connect("localhost","root","","resume_builder");
			$sql1 = "Select * from create_account";
			$query = mysqli_query($con,$sql1);
			//$result = mysqli_fetch_array($query);
			$rows = mysqli_num_rows($query);
			if($rows>0)
			{$i=1;
			while($data=$query->fetch_assoc()){
   	?>
   	<tr>
   		<td><?php echo $i; ?></td>
   		<td><?php echo $data['Username']; ?></td>
   		<td><?php echo $data['Password']; ?></td>
   		
   		<td><a  href="dashboard.php?cat=website-content&subcat=home-content&view=<?php echo $data['User_id']; ?>" class="text-secondary content-link"><i class='far fa-eye'></i></a></td>
        

   	</tr>
   	<?php
   $i++;}
}else{

?>
<tr>
	<td colspan="6">No Admin Profile Data</td>
</tr>
<?php } ?>
		</table>
	</div>
</div>
</div>
	<!-----==================table content end===================-->
<?php } ?>

</div>