<?php
//include("connection.php");
session_start();
if(isset($_POST['email']))
$usr=$_POST['email'];
$_SESSION['user']=$usr;

if(isset($_POST['psw']))
$psd=$_POST['psw'];

$link = new mysqli("localhost","root","","healthcare");
if($link->connect_error){
	die("connection failed: ". $link->connect_error);
}
else
{

$sql= "select * from doctor where Email='$usr' and Pass='$psd'";


//$query=mysqli_query($con,$sql);

$stmt=$link->prepare($sql);
$stmt->execute();
$stmt->store_result();
$row=$stmt->num_rows;

if($row===1)
{
	?>
	<h1 align=center>
	<?php echo "Welcome ".$usr;
	?>
	</h1><center><h1>You Have Sucessfully Enter Your Username And Password</h1>
	<a href="display.php"><b>Click Here To Proceed</b></a></center>
    <?php
}
else
{
?>
<center><h1>You Have  Enter Wrong Username or Password</h1></center>

<center><a href="patient_login.html"><b>Back</b></a>
</center>

<?php
}
}
?>