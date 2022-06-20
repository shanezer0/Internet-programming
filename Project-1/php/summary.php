<!doctype html>
<html>
    <head>
        <title>Order-Details</title>
        <?php echo "<link rel=\"stylesheet\" type=\"text/css\" href=\"../css/order.css\" />"; ?>

        

    </head>

<body>

<?php
error_reporting(E_ERROR);
session_start();

$name = $_POST["firstname"];
$email = $_POST["email"];
$address = $_POST["address"];
$city = $_POST["city"];
$state = $_POST["state"];
$country = $_POST["country"];
$shipping_price = 3;


foreach ($_SESSION["items"] as $item){

    $total += $item["unit_price"]*$item["quantity"];
    $grand_total = $total + $shipping_price;
    
  }

 



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
                echo "Shipping Address";
            echo "</th>";

            echo "<th>";
                echo "Order Summary";
            echo "</th>";
        echo "</tr>";
            

//shipping address

echo "<tr>";

            echo "<td>";
                echo "$name";
                echo "<br>";
                echo "$email";
                echo "<br>";
                echo "$address";
                echo "<br>";
                echo "$city";
                echo "<br>";
                echo "$state";
                echo "<br>";
                echo "$country";
            echo "</td>";

            echo "<td>";
                
                echo " Total...: $ $total";
                echo "<br>";
                echo "Shipping...:$ $shipping_price";
                echo "<br>";
                echo "Grand Total...:$ $grand_total";

            echo "</td>";

echo "</tr>";


//Table-2


echo "</table>";

echo "<table id='table2'>";
echo "<tr>";
            echo "<th>";
                echo "Product";
            echo "</th>";

            echo "<th>";
                echo "Quantity";
            echo "</th>";

            echo "<th>";
                echo "Price";
            echo "</th>";

echo "</tr>";


echo "<tr>";

            echo "<td>";
            foreach ($_SESSION["items"] as $item){
                echo"{$item["product_name"]}";
                echo "<br>";
            }
            echo "</td>";
            


            echo "<td>";
            foreach ($_SESSION["items"] as $item){
            echo "{$item["quantity"]}";
            echo "<br>";
            }
            echo "</td>";

            echo "<td>";
            foreach ($_SESSION["items"] as $item){
            echo "{$item["unit_price"]}";
            echo "<br>";
            }
            echo"</td>";
echo "</tr>";


echo "</table>";
   
    
?>

    </body>

</html>










