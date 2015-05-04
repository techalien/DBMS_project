
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
$result1 = $conn->query($sql);
$sql = "SELECT COUNT(*) AS CNT FROM users";
$total_query = "SELECT SUM(Amount) AS TOTAL FROM EXPENSES";
$result = $conn->query($sql);


    // output data of each row
    $row = $result->fetch_assoc();
    $num = $row['CNT'];


$total = $conn->query($total_query);


if($total->num_rows > 0)
$t_cost = $total->fetch_assoc();
$t_expense = $t_cost['TOTAL'];
//echo $num;
$perhead = $t_expense / $num;


if ($result1->num_rows > 0) {
    // output data of each row

    while($row = $result1->fetch_assoc()) {
        //echo $row['Name_Owes'] ."\t". $row['Name_Owed'] ."\t". $row['Amount'] ."\t".$row['Date']. "<br>";
      $Type = $row['Name'];
      $Amount = $row['AMOUNT'];
      $dataArray['data'][] = $Type;
      $amountarray['data'][] = $perhead-$Amount;
      

    }

} else {
    echo "0 results";
}

$res = array();
array_push($res,$dataArray);
array_push($res,$amountarray);

print json_encode($res,JSON_NUMERIC_CHECK);
?>

