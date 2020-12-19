<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>

/* For Notification Button */

body {
  font-family: Arial, Helvetica, sans-serif;
}

.notification {
  background-color: #555;
  color: white;
  float: left;
  text-decoration: none;
  padding: 9.4px 90px;
  margin: 0px 13px;
  position: relative;
  display: inline-block;
  border-radius: 0px;
}

.notification:hover {
  background: red;
}

.notification .badge {
  position: absolute;
  top: -10px;
  right: -10px;
  padding: 5px 10px;
  border-radius: 50%;
  background-color: red;
  color: white;
}

/* End of notification button */

.card {
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
  max-width: 500px;
  margin: auto;
  text-align: center;
  font-family: arial;
}

.title {
  color: grey;
  font-family:verdana;
  font-size: 18px;
}

.imgcontainer {
  text-align: center;
  /*margin: 24px 0 12px 0; */
}

.logoutbtn {
  float: right;
  background-color: #243ff2;
  color: white;
  border: none;
  padding: 11px 90px;
  margin: 0 13px;
}

</style>
</head>
<body>

<div class="title">

<h2 style="text-align:center">Your Profile Card</h2>

</div>

<div class="card">

	<div class="imgcontainer">
		<br>
	
    <img src="docprofile.png" alt="Avatar" class="avatar">
    <br>
    <br>
  </div>

<?php



$host = "localhost";
$dbusername = "root";
$dbpassword = "";
$dbname = "healthcare";

// Create connection
$conn = new mysqli($host, $dbusername, $dbpassword, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 


  $sql = "SELECT * FROM doctor ORDER BY UID DESC LIMIT 1";
//$sql = "SELECT Name, Pass, Email FROM doctor";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo  "Name: " . $row["Name"]. "<br> <br>";    
        echo "Email: " . $row["Email"]. "<br> <br>";  
        echo "Gender: " . $row["gender"]. "<br><br>";
        echo "Field of Specialization: " . $row["Field"]. "<br><br>";
        echo "Provide Therapy for: " . $row["age"]. "<br><br>";
        echo "Available for: " . $row["duration"]. "<br><br>";
        echo "Address: " . $row["Address"]. "<br><br>";
        echo "Year of Experience: " . $row["experience"]. "<br><br>"; 
    }
} else {
    echo "0 results";
}
$conn->close();
?>
<a href="#" class="notification">
  <span>Inbox</span>
  <span class="badge">3</span>
</a>

<a href="Doc_login.html">  <button type="logout" class="logoutbtn">Log Out</button></a>
<br>
<br>
<br>
</div>
</body>
</html>
