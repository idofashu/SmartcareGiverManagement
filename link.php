
<?php
if(isset($_POST['name']))
{
$username= $_POST['name'];
}
if(isset($_POST['psw']))
$password= $_POST['psw'];

if(isset($_POST['email']))
$email= $_POST['email'];

if(isset($_POST['gender']))
$gender= $_POST['gender'];

if(isset($_POST['fields']))
$field= $_POST['fields'];

if(isset($_POST['oth']))
$oth= $_POST['oth'];

if(isset($_POST['ages']))
$ages= $_POST['ages'];

if(isset($_POST['timedur']))
$time= $_POST['timedur'];

if(isset($_POST['address']))
$addr= $_POST['address'];

if(isset($_POST['yoe']))
$yoe= $_POST['yoe'];


//&& !empty($password)|| !empty($email)|| !empty($ages)|| !empty($gender)|| !empty($field)|| !empty($time)|| !empty($addr)|| !empty($yoe)


	$host="localhost";
	$dbusername="root";
	$dbpassword="";
	$dbname="healthcare";

	$conn= new mysqli($host,$dbusername,$dbpassword,$dbname);
	if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} else{
		$SELECT= "SELECT email From doctor Where email=? Limit 1";
		$INSERT= "INSERT Into doctor (Name,Pass,Email,gender,Address,Field,oth,age,duration,experience) values('$username','$password','$email','$gender','$addr','$field','$oth','$ages','$time','$yoe')";

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

header('Location: display.php');

?>
$conn->close();