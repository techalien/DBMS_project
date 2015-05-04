<?php
$servername = "localhost";
$username = "akhil";
$password = "Tech*#A1060";
$dbname = "TechAlien";

$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

 $dataArray=array();
 $dataArray['name'] = 'Type';
 $amountarray = array();
 $amountarray['name'] = 'Amount';
 
$sql = "SELECT Name,SUM(Amount) AS AMOUNT FROM PAYMENTS GROUP BY Name";
$result = $conn->query($sql);


if ($result->num_rows > 0) {
    // output data of each row

    while($row = $result->fetch_assoc()) {
        //echo $row['Name_Owes'] ."\t". $row['Name_Owed'] ."\t". $row['Amount'] ."\t".$row['Date']. "<br>";
      $Name = $row['Name'];
      $Amount = $row['AMOUNT'];
      $dataArray['data'][] = $Name;
      $amountarray['data'][] = $Amount;
      

    }

} else {
    echo "0 results";
}

$res = array();
array_push($res,$dataArray);
array_push($res,$amountarray);

print json_encode($res,JSON_NUMERIC_CHECK);
?>

