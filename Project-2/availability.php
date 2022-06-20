<?php
error_reporting(E_ERROR);
$id = $_GET["id"];

session_start();

$str = file_get_contents("cars.json") or die("Error: Cannot create Object");
$json = json_decode($str, true);

foreach ($json['cars'] as $car){
    
    if (($id == $car['ID']) && ($car['Availability'] == true)){
        echo '<pre>' . print_r($car, true) . '</pre>';
        if (!isset($_SESSION["cart"])) {
            $_SESSION["cart"] = array($id => $car);
        } else if (!isset($_SESSION["cart"][$id])) {
            $_SESSION["cart"][$id] = $car;
        }
        
    }
    
}

?>