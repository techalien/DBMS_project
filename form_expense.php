<?php
$servername = "localhost";
$username = "akhil";
$password = "Tech*#A1060";

$conn = new mysqli($servername, $username,$password,"TechAlien");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 



$Type = $_GET['TYPE'];
$Amount = $_GET['Amount']; 
$Date = $_GET['Date'];

$sql = "INSERT INTO EXPENSES VALUES ('$Type','$Amount','$Date')";

if ($conn->query($sql) == TRUE) {
    echo "Database updated successfully.";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>

<html>
<a href="http://www.techalien.in/project/index.html">
 <button>Home</button>
</a>
</html>