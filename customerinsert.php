<?php 

include "config.php";

if (isset($_POST['customer_name'])){
    
$customer_name = $_POST['customer_name'];
$customer_phonenumber = $_POST['customer_phonenumber'];
$customer_country = $_POST['customer_country'];
$customer_city = $_POST['customer_city'];







        if($customer_country == "Turkey"){
            
            if($customer_city == "Istanbul"){
                $sql_statement = "INSERT INTO Customer(customer_name, customer_phonenumber, customer_country,customer_city ) VALUES ('$customer_name', '$customer_phonenumber','$customer_country' , '$customer_city')";
                $result = mysqli_query($db, $sql_statement);
                echo "Your result is: " . $result;
        }

            else if($customer_city == "Izmir"){

                $sql_statement = "INSERT INTO Customer(customer_name, customer_phonenumber, customer_country,customer_city ) VALUES ('$customer_name', '$customer_phonenumber','$customer_country' , '$customer_city')";
                $result = mysqli_query($db, $sql_statement);
                echo "Your result is: " . $result;
            }

            else{

                echo "<script>alert('Please choose Istanbul or Izmir!');</script>";

            }


            
    }

    if($customer_country == "Germany"){
            
            if($customer_city == "Berlin"){
                $sql_statement = "INSERT INTO Customer(customer_name, customer_phonenumber, customer_country,customer_city ) VALUES ('$customer_name', '$customer_phonenumber','$customer_country' , '$customer_city')";
                $result = mysqli_query($db, $sql_statement);
                echo "Your result is: " . $result;
        }

            else if($customer_city == "Munich"){

                $sql_statement = "INSERT INTO Customer(customer_name, customer_phonenumber, customer_country,customer_city ) VALUES ('$customer_name', '$customer_phonenumber','$customer_country' , '$customer_city')";
                $result = mysqli_query($db, $sql_statement);
                echo "Your result is: " . $result;
            }

            else{

                echo "<script>alert('Please choose Berlin or Munich!');</script>";
            }

        
            
    }

    if($customer_country == "Netherlands"){
            
            if($customer_city == "Amsterdam"){
                $sql_statement = "INSERT INTO Customer(customer_name, customer_phonenumber, customer_country,customer_city ) VALUES ('$customer_name', '$customer_phonenumber','$customer_country' , '$customer_city')";
                $result = mysqli_query($db, $sql_statement);
                echo "Your result is: " . $result;
        }

            else if($customer_city == "Rotterdam"){

                $sql_statement = "INSERT INTO Customer(customer_name, customer_phonenumber, customer_country,customer_city ) VALUES ('$customer_name', '$customer_phonenumber','$customer_country' , '$customer_city')";
                $result = mysqli_query($db, $sql_statement);
                echo "Your result is: " . $result;
            }

            else{
                echo "<script>alert('Please choose Amsterdam or Rotterdam!');</script>";
            }

        
            
    }

    if($customer_country == "Greece"){
            
            if($customer_city == "Athens"){
                $sql_statement = "INSERT INTO Customer(customer_name, customer_phonenumber, customer_country,customer_city ) VALUES ('$customer_name', '$customer_phonenumber','$customer_country' , '$customer_city')";
                $result = mysqli_query($db, $sql_statement);
                echo "Your result is: " . $result;
        }

            else if($customer_city == "Samos"){

                $sql_statement = "INSERT INTO Customer(customer_name, customer_phonenumber, customer_country,customer_city ) VALUES ('$customer_name', '$customer_phonenumber','$customer_country' , '$customer_city')";
                $result = mysqli_query($db, $sql_statement);
                echo "Your result is: " . $result;
                
            }

            else{
                echo "<script>alert('Please choose Athens or Samos!');</script>";

            }

        
            
        }




$result2 = $db->query("SELECT customer_id FROM Customer WHERE customer_phonenumber='$customer_phonenumber'");
$customerList= $result2->fetch_array();
echo "<script>alert('Your Customer ID is:'.$customerList[0]);</script>";

}



?>

 <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Customer Insertion</title>
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
      <a class="navbar-brand" href="customer.php">Customer Management</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li class="active"><a href="customerinsert.php">Insertion <span class="sr-only">(current)</span></a></li>
        <li><a href="customer-delete.php">Deletion</a></li>
        <li><a href="customer-selection.php">Selection</a></li>
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
<h1 class="text-center text-primary">Customer Insertion</h1>
<div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2" style="background-color: lightblue; border:1px solid blue; padding:15px;">
                <form method="post" action="customerinsert.php">
                    
                    <div class="form-group">
                        <label>Customer Name:</label>
                        <input type="text" name="customer_name" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Customer Phone Number:</label>
                        <input type="text" name="customer_phonenumber" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Customer Country:</label>
                        <select class="form-control" name="customer_country">
                            <option value="" disabled selected>Please select your country</option>
                            <option value="Turkey">Turkey</option>
                            <option value="Germany">Germany</option>
                            <option value="Netherlands">Netherlands</option>
                            <option value="Greece">Greece</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Customer City:</label>
                        <select class="form-control" name="customer_city">
                            <option value="" disabled selected>Please select your city</option>
                            <option value="Istanbul">Istanbul</option>
                            <option value="Izmir">Izmir</option>
                            <option value="Berlin">Berlin</option>
                            <option value="Munich">Munich</option>
                            <option value="Amsterdam">Amsterdam</option>
                            <option value="Rotterdam">Rotterdam</option>
                            <option value="Athens">Athens</option>
                            <option value="Samos">Samos</option>
                        </select>
                    </div>           
                    <div class="form-group">
                        <input type="submit" value="Save" class="btn btn-primary">
                    </div>
                </form>
            </div>
        </div>
  </body>

  </html>
