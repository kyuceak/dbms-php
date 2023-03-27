<?php
$db = mysqli_connect('localhost','root','','project');
if($db->connect_errno > 0){
die('Unable to connect to database [' . $db->connect_error . ']'); }

if (isset($_POST['price'])){
$price = $_POST['price'];
$catagory_id = $_POST['catagory_id'];
$expreation_date = $_POST['expreation_date'];
$warehouse_id = $_POST['warehouse_id'];
$company_id = $_POST['company_id'];
//insert into da hangi sütunlara verilerin gireleceğini sonra da sırasıyla value kısmına hangi verilerin o sütünlara gireceğini yazoyoruz.
$sql_statement = "INSERT INTO myTable(price, catagory_id, expreation_date, warehouse_id, company_id) VALUES ('$price','$catagory_id', '$expreation_date', '$warehouse_id', '$company_id')";
$result = mysqli_query($db, $sql_statement);
echo "Your result is: " . $result;
header("Location: http://localhost/projectstep3/item.php");

//$result = $db->query("INSERT INTO myTable (price,catagory_id,expreation_date,warehouse_id) VALUES ('$_POST[price]','$_POST[catagory_id]','$_POST[expreation_date]','$_POST[warehouse_id]')");
}
if (isset($_GET['itemID'])){
	if(is_numeric($_GET['itemID'])){
		$itemID = $_GET['itemID'];
		$query = "DELETE FROM myTable WHERE item_id = '$itemID'";
		$result = $db->query($query);
		header("Location: http://localhost/projectstep3/item.php");
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
      <a class="navbar-brand" href="warehouse.php">Item Management System</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Select a system<span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="warehouse.php">Warehouse Management System</a></li>
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
<h1 class="text-center text-primary">Item</h1>
<div class="container">
		<div class="row">
			<div class="col-md-8 col-md-offset-2" style="background-color: lightblue; border:1px solid blue; padding:15px;">
				<form method="post">
					<div class="form-group">
						<label>Price:</label>
						<input type="text" name="price" class="form-control" required>
					</div>
					<div class="form-group">
						<label>Experation Date:</label>
						<input type="text" name="expreation_date" class="form-control" required>
					</div>
					<div class="form-group">
						<label>Catagory ID:</label>
						<select class="form-control" name="catagory_id">
							<option value="" disabled selected>Please select catagory id</option>
							<option value="1001">Clothing</option>
							<option value="1001">Tech</option>
							<option value="1003">Home Furniture</option>
							<option value="1004">Food</option>
						</select>
					</div>
                    <div class="form-group">
						<label>Warehouse ID:</label>
						<select class="form-control" name="warehouse_id">
							<option value="" disabled selected>Please select your warehouse id</option>
							<option value="2001">Warehouse 1</option>
							<option value="2002">Warehouse 2</option>
							<option value="2003">Warehouse 3</option>
							<option value="2004">Warehouse 4</option>
						</select>
					</div>
					<div class="form-group">            
                        <label>Select Your Company:</label>
                        <!-- <input type="text" name="item_id" class="form-control" required> -->
                         <select class="form-control" name="company_id">
                     
                    <?php
                    $query = "SELECT company_id FROM myTable2";
                    $result = $db->query($query);
                    $itemIds = array();
                    while ($row = $result->fetch_assoc()) {
                      $itemIds[] = $row['company_id'];
                    }

                    foreach ($itemIds as $itemId) {
                        echo '<option value="' . $itemId . '">' . $itemId . '</option>';
                    }

                 

                    ?>



                    </div>
					<div class="form-group">
						<input type="submit" value="Kaydet" class="btn btn-primary">
					</div>
				</form>
			</div>
        </div>
        <hr>
		<h4 class="text-center text-danger"><b>Current Item List</b></h4>
		<div class="row">
			<div class="col-md-10 col-md-offset-1">
				<table class="table table-bordered table-striped">
				<thead>
					<th width="100">Item ID</th>
					<th width="100">Experation Date</th>
					<th width="100">Price</th>
					<th width="100">Catagory ID</th>
				</thead>

				<tbody>
					<?php 
					//burada sıralama yaptırdık id lerine göre
						$result = $db->query("SELECT * FROM myTable ORDER BY item_id ASC");
						//while döngüsü oluşturuyoruz çünkü satır satır tüm satıları almak istiyoruz
						while ($itemList = $result->fetch_array()) {

					?>
					<tr>

						<!-- Soru işareti echo anlamına geliyor-->
						<td><?=$itemList["item_id"];?></td>
						<td><?=$itemList["expreation_date"];?></td>
						<td><?=$itemList["price"];?></td>
						<td><?=$itemList["catagory_id"];?></td>


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
				<?php } ?>
				</tbody>
			</table>
			</div>
		</div>
	</div>
</body>
</html>

