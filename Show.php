<?php 
include ('dbConnect.php');
if(isset($_POST['search']))
$search=$_POST{'search'};
$value=$_POST{'Choice'};
if(isset($search))
if($value="blank")
{
$sql= "Select * FROM tblContact where Fname like '%$search%' or Lname like '%$search%' or contact_num like '%$search%'  or Age like '%$search%'  or City like '%$search%'  or Gender like '$search%'";
}
else if($value = "Gender")
{
$sql="Select * FROM tblcontact where Gender = '$search%'";
}
else if($value = "City")
{
$sql="Select * FROM tblcontact where City Like '%$search%'";
}
else if($value = "Fname")
{
$sql="Select * FROM tblcontact where Fname Like '%$search%'";
}
else if($value = "Lname")
{
$sql="Select * FROM tblcontact where Lname Like '%$search%'";
}
else if($value = "Age")
{
$sql="Select * FROM tblcontact where Age Like '%$search%'";
}
else if($value = "contact_num")
{
$sql="Select * FROM tblcontact where contact_num Like '$search%'";
}
else
$sql="Select * FROM tblContact";
$q =mysqli_query($conn,$sql) or die (mysqli_error($conn));
?>
<form method="POST" action "index.php">
<center>Search<input type="text" name="search">
<Select Name="Choice"><br><br>
	<Option Value="blank">
	<Option Value="Gender">
	Gender
	<Option Value="City">
	City
	<Option Value="Fname">
	First Name
	<Option Value="Lname">
	Last Name
	<Option Value="Gender">
	Gender
	<Option Value="contact_num">
	Contact No.
	<Option Value="Age">
	Age
	</Option>	
					</Select>
<input type="submit" name="submit" value="search">
<center>
<table>
<table border="1" width="300px" cellpadding="2" cellspacing="1">	
	<tr>
		<th width="100px"><font size="5"><b>Name</th>
		<th width="100px"><font size="5"><b>Age</th>
		<th width="100px"><font size="5"><B>Gender</th>
		<th width="100px"><font size="5" ><B>City</th>
		<th width="100px"><font size="5" ><B>Contact No.</th>
	</tr>
<?php While($r=mysqli_fetch_assoc($q))
{
?>
<tr>
		<td><?php echo $r{'Lname'}.",".$r{'Fname'}; ?></td>
		<td><?php echo $r{'Age'}; ?></td>
		<td><?php echo $r{'Gender'}; ?></td>
		<td><?php echo $r{'City'}; ?></td>
		<td><?php echo $r{'contact_num'}; ?></td>
	<?php $c_id = $r{'id'};?>
	<td><a href = "delete.php?id=<?php echo $c_id;?>&lname=<?php echo $r{'Lname'};?>">
		DELETE
		</a>
		</td>
		<?php $c_id = $r{'id'};?>
	<td><a href = "edit.php?id=<?php echo $c_id;?>&lname=<?php echo $r{'Lname'};?>">
		UPDATE
		</a>
		</td>
	</tr>

<?php 	} ?>
</table>
<a href = "Contact.php">CREATE CONTACT</a>

</center>