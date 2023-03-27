<?php
$db = mysqli_connect('localhost','root','','project');
if($db->connect_errno > 0){
die('Unable to connect to database [' . $db->connect_error . ']'); }

if (isset($_POST['company_name'])){
$company_name = $_POST['company_name'];
$shipping_method = $_POST['shipping_method'];
$item_id = $_POST['item_id'];
//insert into da hangi sütunlara verilerin gireleceğini sonra da sırasıyla value kısmına hangi verilerin o sütünlara gireceğini yazoyoruz.
$sql_statement = "INSERT INTO shippingTable(company_name, shipping_method, item_id) VALUES ('$company_name','$shipping_method', '$item_id')";
$result = mysqli_query($db, $sql_statement);
echo "Your result is: " . $result;

//$result = $db->query("INSERT INTO myTable (price,catagory_id,expreation_date,warehouse_id) VALUES ('$_POST[price]','$_POST[catagory_id]','$_POST[expreation_date]','$_POST[warehouse_id]')");
}
if (isset($_GET['itemID'])){
	if(is_numeric($_GET['itemID'])){
		$itemID = $_GET['itemID'];
		$query = "DELETE FROM shippingTable WHERE item_id = '$itemID'";
		$result = $db->query($query);
		header("Location: http://localhost/projectstep3/shipping.php");
	}
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
<h1 class="text-center text-primary">Shipping</h1>
<div class="container">
		<div class="row">
			<div class="col-md-8 col-md-offset-2" style="background-color: lightblue; border:1px solid blue; padding:15px;">
				<form method="post">
					<div class="form-group">			
						<label>Select Item ID:</label>
						<!-- <input type="text" name="item_id" class="form-control" required> -->
						 <select class="form-control" name="item_id">
					 
					<?php
					$query = "SELECT item_id FROM myTable";
					$result = $db->query($query);
					$itemIds = array();
					while ($row = $result->fetch_assoc()) {
					  $itemIds[] = $row['item_id'];
					}

					foreach ($itemIds as $itemId) {
  						echo '<option value="' . $itemId . '">' . $itemId . '</option>';
					}
					?>

					</div>
					<div class="form-group">
						<label>Shipping Company:</label>
						<select class="form-control" name="zortingen">
					</div>

					<div class="form-group">
						<label>Shipping Company:</label>
						<select class="form-control" name="company_name">
							<option value="" disabled selected>Please select a shipping company</option>
							<option value="UPS">UPS</option>
							<option value="PTS">PTS</option>
							<option value="DHL">DHL</option>
							<option value="PTT">PTT</option>
						</select>
					</div>
                    <div class="form-group">
						<label>Shipping Method:</label>
						<select class="form-control" name="shipping_method">
							<option value="" disabled selected>Please select your shipping method</option>
							<option value="Highway">Highway</option>
							<option value="Seaway">Seaway</option>
							<option value="Airway">Airway</option>
							<option value="Railway">Railway</option>
						</select>
					</div>
					<div class="form-group">
						<input type="submit" value="Save" class="btn btn-primary">
					</div>
				</form>
			</div>
        </div>
        <hr>
		<h4 class="text-center text-danger"><b>Tracing a Shipment</b></h4>
		<!-- Form methodlar ile ayrı ayrı değerlendiriliyorlar -->
		<form method="get">
		<div class="form-group">			
			<label>Tracing ID:</label>
			<input type="text" name="tracing_id" class="form-control" required>
		</div>
		<!-- -->
		<div class="form-group">
			<input type="submit" value="Trace" class="btn btn-primary">
		</div>
		<div class="row">
			<div class="col-md-10 col-md-offset-1">
				<table class="table table-bordered table-striped">
				<thead>
					<th width="100">Company Name</th>
					<th width="100">Shipping Method</th>
					<th width="100">Tracing ID</th>
					<th width="100">Item ID</th>
				</thead>
		</form>
				<tbody>
					<?php 
					// //burada sıralama yaptırdık id lerine göre
					if (isset($_GET['tracing_id'])){

						$tracing_id = $_GET['tracing_id'];
						$result = $db->query("SELECT company_name, shipping_method, tracing_id, item_id FROM shippingTable WHERE tracing_id='$tracing_id'");
						//while döngüsü oluşturuyoruz çünkü satır satır tüm satıları almak istiyoruz
						$itemList = $result->fetch_array();
					
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
						<td><?=$itemList["company_name"];?></td>
						<td><?=$itemList["shipping_method"];?></td>
						<td><?=$itemList["tracing_id"];?></td>
						<td><?=$itemList["item_id"];?></td>

						<td class="text-center"><button class="btn btn-danger" data-toggle="modal" data-target="#myModal<?=$itemList["item_id"];?>">Delete</button></td>
						<!-- Modal -->
						<div id="myModal<?=$itemList["item_id"];?>" class="modal fade" role="dialog">
						  <div class="modal-dialog">

						    <!-- Modal content-->
						    <div class="modal-content">
						      <div class="modal-header">
						        <button type="button" class="close" data-dismiss="modal">&times;</button>
						        <h4 class="modal-title">Deleting Item</h4>
						      </div> 
						      <div class="modal-body">
						        <p><b><?=$itemList["item_id"];?></b> Do you want to delete this item?</p>
						      </div>
						      <div class="modal-footer">
						      	<button type="button" class="btn btn-danger" data-dismiss="modal" onclick="location.href='?itemID=<?=$itemList["item_id"];?>';">Confirm</button>
						        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
						      </div>
						    </div>

						  </div>
						</div>
						<!-- Modal -->
					</tr>
				 <?php }
				 } ?>
				</tbody>
			</table>
			</div>
		</div>
	</div>
</body>
</html>

