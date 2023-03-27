<?php
include "config.php";

if (isset($_GET['orderID'])){
	if(is_numeric($_GET['orderID'])){
		$orderID = $_GET['orderID'];
		$query = "DELETE FROM orderTable WHERE order_id = '$orderID'";
		$result = $db->query($query);
		header("Location: http://localhost/projectstep3/order.php");
	}
}


	


?>





			<!DOCTYPE html>
			<html>
			<head>
				<meta charset="utf-8">
				<meta name="viewport" content="width=device-width, initial-scale=1">
				<title>Order Selection</title>
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
        <li ><a href="order-insert.php">Insertion <span class="sr-only">(current)</span></a></li>
        <li><a href="order-delete.php">Deletion</a></li>
        <li class="active"><a href="order-selection.php">Selection</a></li>
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
					<div class= "row" >
			
				<form>
					<div class="form-group col-md-4 col-md-offset-4">
				<label><span>Enter a order ID</span>   </label>
				<input class="form-control" type="text" name="order_id" placeholder="Order ID">
				<br>
				<div class="form-group">
								<input type="submit" value="Filter" class="btn btn-success">
				</div>
				</div>
				
	
				
				</form>
</div>
		
        <div class ="row">
        	<div class= "col-md-2 col-md-offset-5" ><h4 class="text-center text-danger"><b> Order List</b></h4></div>
		
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
					// //burada sıralama yaptırdık id lerine göre
					if (isset($_GET['order_id'])){

						$order_id = $_GET['order_id'];
						$result = $db->query("SELECT item_list, order_date, order_id, customer_id FROM orderTable WHERE order_id='$order_id'");
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
						<td><?=$itemList["item_list"];?></td>
						<td><?=$itemList["order_date"];?></td>
						<td><?=$itemList["order_id"];?></td>
						<td><?=$itemList["customer_id"];?></td>

						
					</tr>
				<?php } }
			}?>
				</tbody>
			</table>
			</div>
		</div>
	</div>
			
			</body>
			</html>