<?php
//include("connection.php");
if(isset($_POST['email']))
$usr=$_POST['email'];

if(isset($_POST['psw']))
$psd=$_POST['psw'];

$link = new mysqli("localhost","root","","healthcare");
if($link->connect_error){
	die("connection failed: ". $link->connect_error);
}
else
{

$sql= "select * from patient where Email='$usr' and Pass='$psd'";


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
	<a href="therepylist.html"><b>Click Here To Proceed</b></a></center>
    <?php
}
else
{
?>
<center><h1>You Have  Enter Wrong Username or Password</h1></center>

<center><a href="Doc_login.html"><b>Back</b></a>
</center>

<?php
}
}
?>