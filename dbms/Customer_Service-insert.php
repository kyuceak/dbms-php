<?php 

include "config.php";

if (isset($_POST['Customer_id'])){
    
$Customer_id = $_POST['Customer_id'];
$Costumer_Assistant = $_POST['Costumer_Assistant'];
$Support_Topic = $_POST['Support_Topic'];
$sql_statement = "INSERT INTO Customer_Service(Customer_id,Costumer_Assistant, Support_Topic) VALUES ('$Customer_id','$Costumer_Assistant','$Support_Topic')";
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
      <a class="navbar-brand" href="Customer_Service.php">Customer Service Management</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li class="active"><a href="Customer_Service-insert.php">Insertion <span class="sr-only">(current)</span></a></li>
        <li><a href="Customer_Service-delete.php">Deletion</a></li>
        <li><a href="Customer_Service-selection.php">Selection</a></li>
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
<h1 class="text-center text-primary">Customer Service Insertion</h1>
<div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2" style="background-color: lightblue; border:1px solid blue; padding:15px;">
                <form method="post" action="Customer_Service-insert.php">
                    <div class="form-group">
                        <label>Customer ID</label>
                        <input type="text" name="Customer_id" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Costumer Assistant City:</label>
                        <select class="form-control" name="Costumer_Assistant">
                            <option value="" disabled selected>Please select your assistant</option>
                            <option value="5001">Yigit</option>
                            <option value="5002">Burak</option>
                            <option value="5003">Kutay</option>
                            <option value="5004">Kaan</option>
                        </select>
                    </div> 
                    <div class="form-group">
                        <label>Support Topic</label>
                        <input type="text" name="Support_Topic" class="form-control" required>
                    </div>

          
                    
                    <div class="form-group">
                        <input type="submit" value="Save" class="btn btn-primary">
                    </div>
                </form>
            </div>
        </div>
  </body>

  </html>
