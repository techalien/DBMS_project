<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Group project Expenses</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/simple-sidebar.css" rel="stylesheet">

</head>
<style>

table {
font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
    width: 100%;
    border-collapse: collapse;
}

td,th {
    font-size: 1em;
    border: 1px solid black;
    padding: 3px 7px 2px 7px;
    text-align: center;
}

th {
font-size: 1.1em;
   
    padding-top: 5px;
    padding-bottom: 4px;
    background-color: #5bc0de;
    color: #ffffff;
}

</style>
<body>

    <div id="wrapper">

        <!-- Sidebar -->
        <div id="sidebar-wrapper">
            <ul class="sidebar-nav">
                <li class="sidebar-brand">
                    <a href="index.html">
                        GPE
                    </a>
                </li>
                <li>
                    <a href="record_payment.php">RECORD PAYMENT</a>
                </li>
                <li>
                    <a href="record_expense.php">RECORD EXPENSES</a>
                </li>
                <li>
                    <a href="populate_payments.php">PAYMENT LOGS</a>
                </li>
                <li>
                    <a href="populate_expenses.php">EXPENSE LOGS</a>
                </li>
                <li>
                    <a href="record_type.php">ADD EXPENSE TYPE</a>
                </li>
                <li>
                    <a href="#">ADD MEMBER</a>
                </li>
                
            </ul>
        </div>
        <!-- /#sidebar-wrapper -->

        <!-- Page Content -->
        <div id="page-content-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                    <blockquote>
                        <h1>Payment Log</h1></blockquote>
                     <br>
                     <div class="panel panel-info">
    <div class="panel-heading">Payment log</div>
    <div class="panel-body"><pre>
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

 
$sql = "SELECT * FROM PAYMENTS";
$result = $conn->query($sql);
$payment_query = "SELECT SUM(Amount) AS TOTAL FROM PAYMENTS";

if ($result->num_rows > 0) {
    // output data of each row
echo "<table ><thead>";

echo "<tr><th>"."Name"."</th><th>"."Amount"."</th><th>" . "Date" . "</th></tr></thead><tbody>";
    while($row = $result->fetch_assoc()) {
        //echo $row['Name_Owes'] ."\t". $row['Name_Owed'] ."\t". $row['Amount'] ."\t".$row['Date']. "<br>";
      $Name = $row['Name'];
      $Amount = $row['Amount'];
      $Date = $row['Date'];
      echo "<tr><td>".$Name."</td><td>".$Amount."</td><td>".$Date."</td></tr>";

    }
echo"</tbody></table>";
} else {
    echo "0 results";
}

$payment = $conn->query($payment_query);

?></pre></div>
 
<div class="panel-footer">
<li>
<?php
if($payment->num_rows > 0)
echo "Total payment   ";
$p_tot = $payment->fetch_assoc();
echo $p_tot['TOTAL'];
$conn->close();
?>
</li>   </div></div></div>
                    
                    </div>
                </div>
            </div>
        </div>
        <!-- /#page-content-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

   

</body>

</html>
