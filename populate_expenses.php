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
</head>

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
                        <h1>Expense Log</h1></blockquote>
                     <br>
                     <div class="panel panel-info">
    <div class="panel-heading">Expense log</div>
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

 
$sql = "SELECT * FROM EXPENSES";
$result = $conn->query($sql);
$total_query = "SELECT SUM(Amount) AS TOTAL FROM EXPENSES";

if ($result->num_rows > 0) {
    // output data of each row
echo "<table>";

echo "<tr><th>"."Type"."</th><th>"."Amount"."</th><th>" . "Date" . "</th></tr>";
    while($row = $result->fetch_assoc()) {
        //echo $row['Name_Owes'] ."\t". $row['Name_Owed'] ."\t". $row['Amount'] ."\t".$row['Date']. "<br>";
      $Type = $row['Type'];
      $Amount = $row['Amount'];
      $Date = $row['Date'];
      echo "<tr><td>".$Type."</td><td>".$Amount."</td><td>".$Date."</td></tr>";

    }
echo"</table>";
} else {
    echo "0 results";
}
$total = $conn->query($total_query);



?></pre></div>
<div class="panel-footer">
<li>
<?php
if($total->num_rows > 0)
echo "Total Expense   ";
$t_cost = $total->fetch_assoc();
echo $t_cost['TOTAL'];
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
