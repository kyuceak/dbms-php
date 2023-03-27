<?php 

include "config.php";

 ?>


 <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Oders </title>
  
  <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
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
      <a class="navbar-brand active" href="order2.php">Order Management System</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li ><a href="order-insert.php">Insertion <span class="sr-only">(current)</span></a></li>
        <li><a href="order-delete.php">Deletion</a></li>
        <li><a href="order-selection.php">Selection</a></li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Select a system <span class="caret"></span></a>
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

<h1 class="text-center text-primary">Order</h1>


				<div class="container">
		
        <div class ="row">
        	<div class= "col-md-4 col-md-offset-4" ><h4 class="text-center text-danger"><b>Current Orders List</b></h4></div>
		
		</div>
		
		

		<hr>
		<div class="row">
			<div class="col-md-10 col-md-offset-1">
				<table class="table table-bordered table-striped">
				<thead>
					<th width="100">Item</th>
					<th width="100">Order Date</th>
					<th width="100">Order ID</th>
					<th width="100">Customer ID</th>
					
				</thead>

				<tbody>
					<?php 
					//burada sıralama yaptırdık id lerine göre
						$result = $db->query("SELECT * FROM orderTable ORDER BY order_id ASC");
						//while döngüsü oluşturuyoruz çünkü satır satır tüm satıları almak istiyoruz
						while ($orderList= $result->fetch_array()) {

					?>
					<tr>
						<td><?=$orderList["item_list"];?></td>
						<td><?=$orderList["order_date"];?></td>
						<td><?=$orderList["order_id"];?></td>
						<td><?=$orderList["customer_id"];?></td>

					
					</tr>
				<?php } ?>
				</tbody>
			</table>
			</div>
		</div>
	</div>


</body>
</html>