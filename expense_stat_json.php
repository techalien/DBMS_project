
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
 
$sql = "SELECT Type,SUM(Amount) AS AMOUNT FROM EXPENSES GROUP BY Type";
$result = $conn->query($sql);
$total_query = "SELECT SUM(Amount) AS TOTAL FROM EXPENSES";

if ($result->num_rows > 0) {
    // output data of each row

    while($row = $result->fetch_assoc()) {
        //echo $row['Name_Owes'] ."\t". $row['Name_Owed'] ."\t". $row['Amount'] ."\t".$row['Date']. "<br>";
      $Type = $row['Type'];
      $Amount = $row['AMOUNT'];
      $dataArray['data'][] = $Type;
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

