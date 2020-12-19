<?php
if(isset($_POST['dates']))
{
$username= $_POST['dates'];
}
if(isset($_POST['times']))
$password= $_POST['times'];


//&& !empty($password)|| !empty($email)|| !empty($ages)|| !empty($gender)|| !empty($field)|| !empty($time)|| !empty($addr)|| !empty($yoe)


	$host="localhost";
	$dbusername="root";
	$dbpassword="";
	$dbname="healthcare";

	$conn= new mysqli($host,$dbusername,$dbpassword,$dbname);
	if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} else{
		
		$INSERT= "INSERT Into status (date1,time1) values('$username','$password')";

		if ($conn->query($INSERT) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
}

$conn->close();

header('Location: thankyou.html');

?>
