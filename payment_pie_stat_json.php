
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




 
$sql = "SELECT Name,SUM(Amount) AS AMOUNT FROM PAYMENTS GROUP BY Name";
$result1 = $conn->query($sql);


$total_query = "SELECT SUM(Amount) AS TOTAL FROM EXPENSES";
$result2 = $conn->query($total_query);

if ($result1->num_rows > 0) {
    // output data of each row
$res = array();
    while($row = $result1->fetch_assoc()) {
        //echo $row['Name_Owes'] ."\t". $row['Name_Owed'] ."\t". $row['Amount'] ."\t".$row['Date']. "<br>";
      $Type = $row['Name'];
      $Amount = $row['AMOUNT'];
      $dataArray[0] = $Type;
      $dataArray[1] = $Amount;
      array_push($res,$dataArray);
      

    }

} else {
    echo "0 results";
}





print json_encode($res,JSON_NUMERIC_CHECK);
?>

