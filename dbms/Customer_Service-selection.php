<?php
include "config.php";


if (isset($_GET['Customer_id'])){
	if(is_numeric($_GET['Customer_id'])){
		$Customer_id = $_GET['Customer_id'];
		$query = "SELECT FROM Customer_Service WHERE Customer_id = '$Customer_id'";
		$result = $db->query($query);
	}
}
if (isset($_GET['item_id'])){
		$item_id = $_GET['item_id'];
		$query = "DELETE FROM Customer_Service WHERE item_id = '$item_id'";
		$result = $db->query($query);
	}

?>





			<!DOCTYPE html>
			<html>
			<head>
				<meta charset="utf-8">
				<meta name="viewport" content="width=device-width, initial-scale=1">
				<title>Customer_Service</title>
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
      <a class="navbar-brand" href="Customer_Service.php">Customer Service Management</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li ><a href="Customer_Service-insert.php">Insertion <span class="sr-only">(current)</span></a></li>
        <li><a href="Customer_Service-delete.php">Deletion</a></li>
        <li class="active"><a href="Customer_Service-selection.php">Selection</a></li>
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
				<label><span>Enter your Customer id:</span>   </label>
				<input class="form-control" type="text" name="Customer_id" placeholder="Please enter your Customer id">
				<br>
				<div class="form-group">
								<input type="submit" value="Filter" class="btn btn-success">
				</div>
				</div>
				
	
				
				</form>
</div>
		
        <div class ="row">
        	<div class= "col-md-2 col-md-offset-5" ><h4 class="text-center text-danger"><b> Customer Service List</b></h4></div>
		
		</div>
		
		

		<hr>
		<div class="row">
			<div class="col-md-10 col-md-offset-1">
				<table class="table table-bordered table-striped">
				<thead>
					<th width="100">Customer ID</th>
					<th width="100">Costumer Assistant</th>
					<th width="100">Support Topic</th>
					<th width="100">Support ID</th>
					
				</thead>

				<tbody>
					<?php 
					//burada sıralama yaptırdık id lerine göre
					if(isset($_GET['Customer_id'])){
					$Customer_id = $_GET['Customer_id'];
						$result = $db->query("SELECT * FROM Customer_Service WHERE Customer_id='$Customer_id'");
						//while döngüsü oluşturuyoruz çünkü satır satır tüm satıları almak istiyoruz
						while ($Customer_Service_List= $result->fetch_array()) {

					?>
					<tr>


						<!-- Soru işareti echo anlamına geliyor-->

						<td><?=$Customer_Service_List["Customer_id"];?></td>
						<td><?=$Customer_Service_List["Costumer_Assistant"];?></td>
						<td><?=$Customer_Service_List["Support_Topic"];?></td>
						<td><?=$Customer_Service_List["item_id"];?></td>

					
						<td class="text-center"><button class="btn btn-danger" data-toggle="modal" data-target="#myModal<?=$Customer_Service_List["item_id"];?>">Delete</button></td>
						<!-- Modal -->
						<div id="myModal<?=$Customer_Service_List["item_id"];?>" class="modal fade" role="dialog">
						  <div class="modal-dialog">

						    <!-- Modal content-->
						    <div class="modal-content">
						      <div class="modal-header">
						        <button type="button" class="close" data-dismiss="modal">&times;</button>
						        <h4 class="modal-title">Deleting Item</h4>
						      </div> 
						      <div class="modal-body">
						        <p><b><?=$Customer_Service_List["Support_Topic"];?></b> Do you want to delete this Ticket?</p>
						      </div>
						      <div class="modal-footer">
						      	<button type="button" class="btn btn-danger" data-dismiss="modal" onclick="location.href='?item_id=<?=$Customer_Service_List["item_id"];?>';">Confirm</button>
						        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
						      </div>
						    </div>

						  </div>
						</div>
						<!-- Modal -->
					</tr>
				<?php } }?>
				</tbody>
			</table>
			</div>
		</div>
	</div>
			
			</body>
			</html>