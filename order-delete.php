<?php
include "config.php";


if (isset($_GET['orderID'])){
	if(is_numeric($_GET['orderID'])){
		$orderID = $_GET['orderID'];
		$query = "DELETE FROM orderTable WHERE order_id = '$orderID'";
		$result = $db->query($query);
		header("Location: http://localhost/projectstep3/order-delete.php");
	}
}
?>

	


?>





<!DOCTYPE html>
			<html>
			<head>
				<meta charset="utf-8">
				<meta name="viewport" content="width=device-width, initial-scale=1">
				<title>Order Deletion</title>
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
      <a class="navbar-brand" href="order2.php">Order Management System</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li><a href="order-insert.php">Insertion <span class="sr-only">(current)</span></a></li>
        <li class="active"><a href="order-delete.php">Deletion</a></li>
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


				<div class="container">
		
        <div class ="row">
        	
		
		</div>
		
		

<hr>
		<h4 class="text-center text-danger"><b>Deleting Order</b></h4>
		<!-- Form methodlar ile ayrı ayrı değerlendiriliyorlar -->
		<form method="get">
		<div class="form-group">			
			<label>Customer ID:</label>
			<input type="text" name="customer_id" class="form-control" required>
		</div>
		<!-- -->
		<div class="form-group">
			<input type="submit" value="Find" class="btn btn-primary">
		</div>
		<div class="row">
			<div class="col-md-10 col-md-offset-1">
				<table class="table table-bordered table-striped">
				<thead>
					<th width="100">Customer ID</th>
					<th width="100">Item</th>
					<th width="100">Order ID</th>
					<th width="100">Order Date</th>
				</thead>
		</form>
				<tbody>
					<?php 
					// //burada sıralama yaptırdık id lerine göre
					if (isset($_GET['customer_id'])){

						$customer_id = $_GET['customer_id'];
						$result = $db->query("SELECT item_list, order_date, order_id, customer_id FROM orderTable WHERE customer_id='$customer_id'");
						//while döngüsü oluşturuyoruz çünkü satır satır tüm satıları almak istiyoruz
						while ($itemList = $result->fetch_array()){
					
					if (mysqli_num_rows($result) > 0) {
					// $tracing_id = $_GET['tracing_id'];
					// $sql = "SELECT company_name, shipping_method, tracing_id, item_id FROM shippingTable WHERE tracing_id='$tracing_id'";
					// $result = mysqli_query($db, $sql);

					// if (mysqli_num_rows($result) > 0) {
					//     // output data of each row
					//     while($row = mysqli_fetch_assoc($result)) {
					//         echo "Company Name: " . $row["company_name"]. " - Shipping Method: " . $row["shipping_method"]. " - Tracing ID: " . $row["tracing_id"]. " - Item ID: " . $row["item_id"]. "<br>";
					//     }
					    
					// } else {
					//     echo "0 results";
					// }




					?>
					<tr>

						<!-- Soru işareti echo anlamına geliyor-->
						<td><?=$itemList["customer_id"];?></td>
						<td><?=$itemList["item_list"];?></td>
						<td><?=$itemList["order_id"];?></td>
						<td><?=$itemList["order_date"];?></td>

						<td class="text-center"><button class="btn btn-danger" data-toggle="modal" data-target="#myModal<?=$itemList["order_id"];?>">Delete</button></td>
						<!-- Modal -->
						<div id="myModal<?=$itemList["order_id"];?>" class="modal fade" role="dialog">
						  <div class="modal-dialog">

						    <!-- Modal content-->
						    <div class="modal-content">
						      <div class="modal-header">
						        <button type="button" class="close" data-dismiss="modal">&times;</button>
						        <h4 class="modal-title">Deleting Order</h4>
						      </div> 
						      <div class="modal-body">
						        <p><b><?=$itemList["order_id"];?></b> Do you want to delete this order?</p>
						      </div>
						      <div class="modal-footer">
						      	<button type="button" class="btn btn-danger" data-dismiss="modal" onclick="location.href='?orderID=<?=$itemList["order_id"];?>';">Confirm</button>
						        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
						      </div>
						    </div>

						  </div>
						</div>
						<!-- Modal -->
					</tr>
				 <?php }
				 } 
						}?>
				</tbody>
			</table>
			</div>
		</div>
	</div>
			
			</body>
			</html>