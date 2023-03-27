<?php 



include "config.php";

if (isset($_POST['item_list'])){
$item_list = $_POST['item_list'];
$order_date = $_POST['order_date'];
$customer_id = $_POST['customer_id'];
$items_array = explode(" ", $item_list);


//insert into da hangi sütunlara verilerin gireleceğini sonra da sırasıyla value kısmına hangi verilerin o sütünlara gireceğini yazoyoruz.
foreach($items_array as $item_in_array){
$sql_statement = "INSERT INTO orderTable(item_list, order_date, customer_id) VALUES ('$item_in_array','$order_date', '$customer_id')";
$result = mysqli_query($db, $sql_statement);
}
echo "Your result is: " . $result;
header("Location: http://localhost/projectstep3/order-insert.php");


}




 ?>

 <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Order Insert </title>
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
      <a class="navbar-brand" href="order2.php">Order Management System</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li class="active"><a href="order-insert.php">Insertion <span class="sr-only">(current)</span></a></li>
        <li><a href="order-delete.php">Deletion</a></li>
        <li><a href="order-selection.php">Selection</a></li>
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
<h1 class="text-center text-primary">Order Insertion</h1>
<div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2" style="background-color: lightblue; border:1px solid blue; padding:15px;">
                <form method="post">
                    <div class="form-group">            
                        <label>Item List:</label>
                        <input type="text" name="item_list" class="form-control" placeholder = "Please leave a space between the items." required>
                    </div>
                    <div class="form-group">            
                        <label>Customer ID:</label>
                        <input type="text" name="customer_id" class="form-control" required>
                    </div>
                    <div class="form-group">            
                        <label>Order Date:</label>
                        <input type="date" name="order_date" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <input type="submit" value="Save" class="btn btn-primary">
                    </div>
                </form>
            </div>
        </div>
  </body>

  </html>