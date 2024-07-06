<br><br>
<div class="content-box">
	<form id="updateForm" rel="" name="contact_details">
	<div class="row">
		<div class="col">
			<h4>User Details</h4>
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
				<th>Delete</th>
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
   		<td><a  href="view.php?view=<?php$data['User_id']?>" class="text-secondary content-link"><i class='far fa-eye'></i></a></td>
        <td><a href="javascript:void(0)" class="text-danger delete"  name="home_content" id="<?php echo $data['User_id']; ?>"><i class='far fa-trash-alt'></i></a></td>

   	</tr>
   	<?php
   $i++;}
}else{

?>
<tr>
	<td colspan="6">No User Data</td>
</tr>
<?php } ?>
		</table>
	</div>
	<br>
	
</div>
</div>
</div>

</form>
</div>