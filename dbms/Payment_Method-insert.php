<?php 

include "config.php";

if (isset($_POST['Customer_id'])){
    
$Customer_id = $_POST['Customer_id'];
$Credit_Card = $_POST['Credit_Card'];
$sql_statement = "INSERT INTO Payment_Method(Customer_id,Credit_Card) VALUES ('$Customer_id','$Credit_Card')";
$result = mysqli_query($db, $sql_statement);
echo "Your result is: " . $result;
}

 ?>

 <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Item </title>
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
    <script type="text/javascript" src="assets/js/jquery-3.3.1.min.js"></script>
    <script type="text/javascript" src="assets/js/bootstrap.min.js"></script> 
</head>
<body>
    <nav class="navbar navbar-default">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="Payment_Method.php">Payment Method Management</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li class="active"><a href="Payment_Method-insert.php">Insertion <span class="sr-only">(current)</span></a></li>
        <li><a href="Payment_Method-delete.php">Deletion</a></li>
        <li><a href="Payment_Method-selection.php">Selection</a></li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Select a system<span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="item.php">Item Management System</a></li>
            <li><a href="shipping2.php">Shipping Management System</a></li>
            <li><a href="order2.php">Order Management System</a></li>
            <li><a href="warehouse.php">Warehouse Management System</a></li>
            <li><a href="Customer_Index.php">Customer Service Management System</a></li>
            <li><a href="payment_method.php">Payment Method Management System</a></li>
            <li><a href="company.php">Company Management System</a></li>
            <li><a href="customer.php">Customer Management System</a></li>
          </ul>
        </li>
      </ul>
     
      
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
<h1 class="text-center text-primary">Payment Method Insertion</h1>
<div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2" style="background-color: lightblue; border:1px solid blue; padding:15px;">
                <form method="post" action="Payment_Method-insert.php">
                    <div class="form-group">
                        <label>Customer id</label>
                        <input type="text" name="Customer_id" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Credit Card</label>
                        <input type="text" name="Credit_Card" class="form-control" required>
                    </div>
                    

          
                    
                    <div class="form-group">
                        <input type="submit" value="Save" class="btn btn-primary">
                    </div>
                </form>
            </div>
        </div>
  </body>

  </html>
