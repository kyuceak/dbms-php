<?php
include "config.php";


if (isset($_GET['whid'])){
	if(is_numeric($_GET['whid'])){
		$whid = $_GET['whid'];
		$query = "DELETE FROM warehouseTable WHERE warehouse_ID = '$whid'";
		$result = $db->query($query);
		header("Location: http://localhost/projectstep3/");
	}
}

	


?>





			<!DOCTYPE html>
			<html>
			<head>
				<meta charset="utf-8">
				<meta name="viewport" content="width=device-width, initial-scale=1">
				<title>warehouse</title>
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
      <a class="navbar-brand" href="warehouse.php">Warehouse Management System</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li ><a href="insertwarehouse.php">Insertion <span class="sr-only">(current)</span></a></li>
        <li><a href="warehouse-delete.php">Deletion</a></li>
        <li class="active"><a href="warehouse-selection.php">Selection</a></li>
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
				<label><span>Enter a Item ID</span>   </label>
				<input class="form-control" type="text" name="itemid" placeholder="Item ID">
				<br>
				<div class="form-group">
								<input type="submit" value="Filter" class="btn btn-success">
				</div>
				</div>
				
	
				
				</form>
</div>
		
        <div class ="row">
        	<div class= "col-md-2 col-md-offset-5" ><h4 class="text-center text-danger"><b> WareHouse List</b></h4></div>
		
		</div>
		
		

		<hr>
		<div class="row">
			<div class="col-md-10 col-md-offset-1">
				<table class="table table-bordered table-striped">
				<thead>
					<th width="100">warehouse_ID</th>
					<th width="100">Location</th>
					<th width="100">Stock Quantity</th>
					<th width="100">Category ID</th>
					<th width="100">Item ID</th>
					
				</thead>

				<tbody>
					<?php 
					//burada sıralama yaptırdık id lerine göre
					if(isset($_GET['itemid'])){
					$item = $_GET['itemid'];
						$result = $db->query("SELECT * FROM warehouseTable WHERE itemid='$item'");
						//while döngüsü oluşturuyoruz çünkü satır satır tüm satıları almak istiyoruz
						while ($warehouseList= $result->fetch_array()) {

					?>
					<tr>


						<!-- Soru işareti echo anlamına geliyor-->
						<td><?=$warehouseList["warehouse_ID"];?></td>
						<td><?=$warehouseList["location"];?></td>
						<td><?=$warehouseList["stock_quantity"];?></td>
						<td><?=$warehouseList["category_id"];?></td>
						<td><?=$warehouseList["itemid"];?></td>

						
					</tr>
				<?php } }?>
				</tbody>
			</table>
			</div>
		</div>
	</div>
			
			</body>
			</html>