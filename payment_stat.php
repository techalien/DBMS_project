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
        <title>Payment stats</title>
        <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
        <script src="http://code.highcharts.com/highcharts.js"></script>
        <script src="http://code.highcharts.com/modules/exporting.js"></script>
        <script type="text/javascript">
        $(document).ready(function() {
            var options = {
                chart: {
                    renderTo: 'container1',
                    type: 'column',
                    marginRight: 130,
                    marginBottom: 25
                },
                title: {
                    text: 'Project',
                    x: -20 //center
                },
                subtitle: {
                    text: 'Payment Stats',
                    x: -20
                },
                xAxis: {
                title: {
                        text: 'Member'
                    },
                    categories: []
                },
                yAxis: {
                    title: {
                        text: 'Amount'
                    },
                    plotLines: [{
                        value: 0,
                        width: 1,
                        color: '#808080'
                    }]
                },
                tooltip: {
                    formatter: function() {
                            return '<b>'+ this.series.name +'</b><br/>'+
                            this.x +': '+ this.y;
                    }
                },
                legend: {
                    layout: 'vertical',
                    align: 'right',
                    verticalAlign: 'top',
                    x: -10,
                    y: 100,
                    borderWidth: 0
                },
                series: []
            }
            
            $.getJSON("payment_stat_json.php", function(json) {
                options.xAxis.categories = json[0]['data'];
                options.series[0] = json[1];
                chart = new Highcharts.Chart(options);
            });
        });
        </script>
          <script type="text/javascript">
        $(document).ready(function() {
            var options = {
                chart: {
                    renderTo: 'container2',
                    plotBackgroundColor: null,
                    plotBorderWidth: null,
                    plotShadow: false
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
                    name: 'Browser share',
                    data: []
                }]
            }
           
            $.getJSON("payment_pie_stat_json.php", function(json) {
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
                <blockquote><h1>Payment Stats</h1></blockquote>
                    <div class="col-lg-6">
                    
                        
                        <div id="container1" style="min-width: 400px; height: 400px; margin: 0 auto"></div><br><br>
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
$sql = "SELECT COUNT(*) AS CNT FROM users";
$total_query = "SELECT SUM(Amount) AS TOTAL FROM EXPENSES";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    $row = $result->fetch_assoc();
    $num = $row['CNT'];

} 
$total = $conn->query($total_query);


if($total->num_rows > 0)
echo "Total Expense per head  ";
$t_cost = $total->fetch_assoc();
$t_expense = $t_cost['TOTAL'];
//echo $num;
echo ($t_expense / $num);
//echo $exp_head;
?>
</li>
                    </div>
                    <div class="col-lg-6">
                    <div id="container2" style="min-width: 400px; height: 400px; margin: 0 auto"></div><br><br>
                    <li>
                    	<?php
                    		$sql = "SELECT Name,MAX(Amount) AS MAX FROM (SELECT Name,SUM(Amount) as Amount FROM PAYMENTS GROUP BY Name)s1";
                    		$result = $conn->query($sql);
                    		$row = $result->fetch_assoc();
                    		$name = $row['Name'];
                    		echo "Highest contribution by" . $name;
                    	?>
                    </li>
                    </div>
                </div>
                <a id="menu-toggle" class="btn btn-primary btn-block" href="#menu-toggle">Toggle Fullscreen</a>
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
