
<?php

$field = $_POST['fields'];
$age = $_POST['ages'];
$duration = $_POST['timedur'];


	$host="localhost";
	$dbusername="root";
	$dbpassword="";
	$dbname="healthcare";

	$conn= new mysqli($host,$dbusername,$dbpassword,$dbname);
	if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} else{
$sql= "SELECT Name, Email, gender, Address, Field, age, duration, experience FROM doctor WHERE Field='$field' and age='$age' and duration='$duration'";
$query=mysqli_query($conn, $sql);
if (!$query) {
    printf("Error: %s\n", mysqli_error($conn));
    exit();
}
while($row=mysqli_fetch_array($query,MYSQLI_NUM))
{
?>

<center><table border="1" style="border:groove">
<tr bgcolor="#000000">
<td><font color="#FFFFFF">Name</td>
<td><font color="#FFFFFF">Email</td><td><font color="#FFFFFF">Gender</td><td><font color="#FFFFFF">Address</td><td><font color="#FFFFFF">Field</td><td><font color="#FFFFFF">Age</td><td><font color="#FFFFFF">Duration</td><td><font color="#FFFFFF">Experience</td><td><font color="#FFFFFF">Set Appointment</td>
</tr>
<tr>
<td><input type="text" name="name" value="<?php echo $row[0]; ?>"/></td>
<td><input type="text" name="email" value="<?php echo $row[1]; ?>"/></td>
<td><input type="text" name="gender" value="<?php echo $row[2]; ?>"/></td>
<td><input type="text" name="address" value="<?php echo $row[3]; ?>"/></td>
<td><input type="text" name="fields" value="<?php echo $row[4]; ?>"/></td>
<td><input type="text" name="ages" value="<?php echo $row[5]; ?>"/></td>
<td><input type="text" name="timedur" value="<?php echo $row[6]; ?>"/></td>
<td><input type="text" name="yoe" value="<?php echo $row[7]; ?>"/></td>
<td><a href="apt.html"><button type="submit">Select</button></a></td>
<br>
<?php
}
}
?>
</tr>
</table></center>
<center><a href="index.html">Back</a></center>
