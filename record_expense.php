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

 
$sql = "SELECT * FROM EXPENSE_INFO";
$result = $conn->query($sql);

?>
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
                        	<h1>Add Expense Record</h1>
                        </blockquote>
                     	<br>
			<div class="panel panel-primary">
    				<div class="panel-heading">Expense update</div>
    				<div class="panel-body">
                        		<form class="form-horizontal" action="form_expense.php" method="get">
                       		 		<div class="form-group">
							<label for="TYPE" class="col-sm-2 control-label">Type:</label>
							<div class="col-sm-5">
  							<select class="form-control" type = "text" name="TYPE">
								<?php
								while($row = $result->fetch_assoc()) {
									echo "<option value=".$row['TYPE'].">" . $row['TYPE'] . "</option>";
								}
								$conn -> close();
								?>
							</select> <br>
							</div>
						</div>
						<div class="form-group">
							<label for="Amount" class="col-sm-2 control-label">Payed :</label>
							<div class="col-sm-5">
								<input class="form-control" type = "number" name = "Amount"><br>
							 </div>
 						</div>
 						<div class = "form-group"> 
 							<label for="Date" class="col-sm-2 control-label">Date</label>
							<div class="col-sm-5">
								<input class="form-group" type = "date" id ="Date"><br>
							</div>
						</div>
				</div>
			<div class="panel-footer">
 				<div class = "form-group"> 
					<div class="col-sm-12">
						<button type="submit" class="btn btn-primary btn-block"><span class="glyphicon glyphicon-ok"></span> Add Expense</button>
					</div>
				</div>
			</div>
		</div>


</form>
                    
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
