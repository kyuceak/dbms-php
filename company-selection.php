<?php
include "config.php";

?>

			<!DOCTYPE html>
			<html>
			<head>
				<meta charset="utf-8">
				<meta name="viewport" content="width=device-width, initial-scale=1">
				<title>	Company Selection</title>
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
      <a class="navbar-brand" href="company.php">	Company Management System</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li ><a href="companyinsert.php">Insertion <span class="sr-only">(current)</span></a></li>
        <li><a href="company-delete.php">Deletion</a></li>
        <li class="active"><a href="company-selection.php">Selection</a></li>
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
					<div class="row">
				
        <hr>
		<h4 class="text-center text-danger"><b>Tracing a Company</b></h4>
		<!-- Form methodlar ile ayrı ayrı değerlendiriliyorlar -->
		<form method="get">
		<div class="form-group">			
			<label>Company ID:</label>
			<input type="text" name="company_id" class="form-control" required>
		</div>
		<!-- -->
		<div class="form-group">
			<input type="submit" value="Trace" class="btn btn-primary">
		</div>
		<div class="row">
			<div class="col-md-10 col-md-offset-1">
				<table class="table table-bordered table-striped">
				<thead>
					<th width="100">Company ID</th>
					<th width="100">Company Name</th>
					<th width="100">Company Logo</th>

				</thead>
		</form>
				<tbody>
					<?php 
					// //burada sıralama yaptırdık id lerine göre
					if (isset($_GET['company_id'])){

						$company_id = $_GET['company_id'];
						$result = $db->query("SELECT * FROM myTable2 WHERE company_id='$company_id'");

					
						$itemList = $result->fetch_array();

						if(empty($itemList)){
								
								echo "<script>alert('No such Tracing ID found!');</script>";


						}
					
					if (mysqli_num_rows($result) > 0) {
					


					?>
					<tr>

						<!-- Soru işareti echo anlamına geliyor-->
						<td><?=$itemList["company_id"];?></td>
						<td><?=$itemList["CompanyName"];?></td>
						<td><?=$itemList["CamponyLogo"];?></td>


						
						</div>
						<!-- Modal -->
					</tr>
				 <?php }
				 } ?>
				</tbody>
			</table>
			</div>
		</div>
			
			</body>
			</html>