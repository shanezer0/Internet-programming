<!doctype html>
<html>
    <head>
        <title>Order-Details</title>
        
        <link rel="stylesheet" href="order.css">
        

    </head>

<body>

<?php
error_reporting(E_ERROR);
session_start();

$name = $_POST["username"];
$email = $_POST["email"];
$address1 = $_POST["address1"];
$address2 = $_POST["address2"];
$city = $_POST["city"];
$state = $_POST["state"];
$postcode = $_POST["post"];


echo "<h1>";
echo "Order Summary:";
echo"</h1>";
echo "<p>";
echo "Order placed on: ";
date_default_timezone_set('Australia/Melbourne');
$date = date('m/d/Y h:i a', time());
echo $date;
echo"</p>";

echo "<table id='table1'>";

//Heading
        echo "<tr>";
            echo "<th>";
                echo "Address";
            echo "</th>";

           
        echo "</tr>";
            

//shipping address

echo "<tr>";

            echo "<td>";
                echo "$name";
                echo "<br>";
                echo "$email";
                echo "<br>";
                echo "$address1";
                echo "<br>";
                echo "$address2";
                echo "<br>";
                echo "$city";
                echo "<br>";
                echo "$state";               
                echo "$postcode";
                
            echo "</td>";

            

echo "</tr>";

echo "</table>";

echo "<table id='table2'>";
echo "<tr>";
            echo "<th>";
                echo "Car";
            echo "</th>";

            echo "<th>";
                echo "Price Per Day($)";
            echo "</th>";

echo "</tr>";


echo "<tr>";
            
            echo "<td>";
            foreach ($_SESSION["cart"] as $car){
                echo"{$car["CarName"]}";
                echo "<br>";
            }
            echo "</td>";
           
            echo "<td>";
            foreach ($_SESSION["cart"] as $car){
            echo "{$car["PricePerDay"]}";
            echo "<br>";
            }
            echo"</td>";
echo "</tr>";


echo "</table>";
   
    
?>

    </body>

</html>










