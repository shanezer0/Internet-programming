<?php
error_reporting(E_ERROR);
session_start();

$total = 0;
$rentalDays = $_REQUEST["days"];
$index = 0;
foreach ($_SESSION["cart"] as $key => $value) {
    $_SESSION["cart"][$key]["days"] = $rentalDays[$index];
    $total += (int)$rentalDays[$index++] * (int)$value["PricePerDay"];
    
    
}
$_SESSION["total"]=$total;
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <title>UTS Renting car system</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</head>
<body>
<style>
    .asterisk:after { content:"*";color:red; }
</style>

<nav class="navbar navbar-expand-sm bg-dark navbar-dark" >
        <h2 style="color: white;text-align: center">Car Rental Center</h2>
</nav>

<div class="container">
    <h2 style="text-align: center;">Check Out</h2>
    <p>Customer Details and Payment</p>
    <p>Please fill in your details.<span style="color:red">*</span>  indicates required field</p>
    <form name="form1" id="form1" method="post" action="summary.php">
        <div >
            <label class="asterisk" for="usr">Name:</label>
            <input type="text" class="form-control" id="usr" name="username">
        </div>
        
        <div >
            <label class="asterisk" for="pwd">Email:</label>
            <input type="email" class="form-control" id="email" name="email">
        </div>
        <div >
            <label class="asterisk" for="pwd">Address Line1:</label>
            <input type="text" class="form-control" id="address1" name="address1">
        </div>
        <div >
            <label class="asterisk" for="pwd">Address Line2:</label>
            <input type="text" class="form-control" id="address2" name="address2">
        </div>
        <div >
            <label class="asterisk" for="pwd">City:</label>
            <input type="text" class="form-control" id="city" name="city">
        </div>
        <div >
            <label class="asterisk" for="pwd" class="form-control">State:</label>
            <select id="state" class="form-control">
                <option value="NSW">AU Capital Territory</option>
                <option value="Victory">New South Wales</option>
                <option value="Queensland">Queensland</option>
                <option value="Northern Territor">Victoria</option>
                <option value="Northern Territor">Northern Territory</option>
                <option value="Northern Territor">Western Australia</option>
                <option value="Northern Territor">Tasmania</option>

            </select>
        </div>
        <div >
        <label class="asterisk" for="pwd">Post Code:</label>
            <input type="text" class="form-control" id="post" name="post">
        </div>
        <div>
        <label class="asterisk" for="pwd" class="form-control">Payment Type:</label>
            <select id="paymentType" class="form-control">
                <option value="Visa">Visa</option>
                <option value="MasterCard">Master Card</option>
                <option value="AmericanExpress">American Express</option>
            </select>
        </div>
        <h1>You are required to pay $<?php echo $total;?></h1>
        <div align="right">

            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
        </div>

    </form>
</div>




</body>
</html>
