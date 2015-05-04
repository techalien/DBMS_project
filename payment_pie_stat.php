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
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <title>Highcharts Pie Chart</title>
        <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
        <script src="http://code.highcharts.com/highcharts.js"></script>
        <script src="http://code.highcharts.com/modules/exporting.js"></script>
        <script type="text/javascript">
        $(document).ready(function() {
            var options = {
                chart: {
                    renderTo: 'container',
                    
                },
                title: {
                    text: 'Member Share'
                },
                tooltip: {
                    formatter: function() {
                        return '<b>'+ this.point.name +'</b>: '+ this.percentage +' %';
                    }
                },
                plotOptions: {
                    pie: {
                        allowPointSelect: true,
                        cursor: 'pointer',
                        dataLabels: {
                            enabled: true,
                            color: '#000000',
                            connectorColor: '#000000',
                            formatter: function() {
                                return '<b>'+ this.point.name +'</b>: '+ this.percentage +' %';
                            }
                        }
                    }
                },
                series: [{
                    type: 'pie',
                    name: 'Member Share',
                    data: []
                }]
            }
           
            $.getJSON("pie_stat_json.php", function(json) {
                options.series[0].data = json;
                chart = new Highcharts.Chart(options);
            });
           
           
           
        });  
        </script>

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
                    
                        <h1>Member Stats</h1>
                        <div id="container" style="min-width: 400px; height: 400px; margin: 0 auto"></div><br><br>
                     <li>
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
$total_query = "SELECT SUM(Amount) AS TOTAL FROM EXPENSES";

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        //echo $row['Name_Owes'] ."\t". $row['Name_Owed'] ."\t". $row['Amount'] ."\t".$row['Date']. "<br>";
      $Type = $row['Type'];
      $Amount = $row['Amount'];
      $Date = $row['Date'];
    }

} 
$total = $conn->query($total_query);


if($total->num_rows > 0)
echo "Total Expense   ";
$t_cost = $total->fetch_assoc();
echo $t_cost['TOTAL'];
$conn->close();
?>
</li>
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

    <!-- Menu Toggle Script -->
    <script>
    $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
    });
    </script>

</body>

</html>
