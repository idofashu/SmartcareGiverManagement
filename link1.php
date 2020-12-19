<?php
if(isset($_POST['name']))
{
$username= $_POST['name'];
}
if(isset($_POST['psw']))
$password= $_POST['psw'];

if(isset($_POST['email']))
$email= $_POST['email'];

if(isset($_POST['address']))
$addr= $_POST['address'];


//&& !empty($password)|| !empty($email)|| !empty($ages)|| !empty($gender)|| !empty($field)|| !empty($time)|| !empty($addr)|| !empty($yoe)


	$host="localhost";
	$dbusername="root";
	$dbpassword="";
	$dbname="healthcare";

	$conn= new mysqli($host,$dbusername,$dbpassword,$dbname);
	if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} else{
		$SELECT= "SELECT email From patient Where email=? Limit 1";
		$INSERT= "INSERT Into patient (Name,Pass,Email,Address) values('$username','$password','$email','$addr')";

		$stmt=$conn->prepare($SELECT);
		$stmt->bind_param("s",$email);
		$stmt->execute();
		$stmt->bind_result($email);
		$stmt->store_result();
		$rnum= $stmt->num_rows;

		if($rnum==0){
			$stmt->close();
			$stmt= $conn->prepare($INSERT);
			/* $stmt->bind_param("ssssssssi",$username,$password,$email,$gender,$field,$ages,$time,$addr,$yoe); */
			$stmt->execute();
			echo" Record added successfully";
		}else{
			echo "Someone already registered using this email";
		}
		$stmt->close();
		$conn->close();
	}
header('Location: therepylist.html');
?>