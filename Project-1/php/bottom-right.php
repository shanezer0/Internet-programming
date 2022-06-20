<?php
error_reporting(E_ERROR);
session_start();

if ($_REQUEST["clear"] == 1) {
  unset($_SESSION["currentProduct"]);
  unset($_SESSION['showCheckout']);
  unset($_SESSION['items']);
}
if(isset($_SESSION["currentProduct"]) && $_REQUEST["quantity"] > 0){

  if (!isset($_SESSION["items"])) {  
 
      $id = $_SESSION["currentProduct"]["product_id"];
      $_SESSION["items"][$id]["product_id"] = $_SESSION["currentProduct"]["product_id"];
      $_SESSION["items"][$id]["product_name"] = $_SESSION["currentProduct"]["product_name"];
      $_SESSION["items"][$id]["unit_price"] = $_SESSION["currentProduct"]["unit_price"];
      $_SESSION["items"][$id]["unit_quantity"] = $_SESSION["currentProduct"]["unit_quantity"];
      $_SESSION["items"][$id]["quantity"] = $_REQUEST["quantity"];

  }else
  {
    $searchid = $_SESSION["currentProduct"]["product_id"];
    $find = 0;

      foreach ($_SESSION["items"] as $item) {
        if ($item["product_id"] == $searchid) {    
          //Update quntity
          $_SESSION["items"][$searchid]["quantity"] = $_REQUEST["quantity"];
          $t = $_SESSION["items"][$searchid]["quantity"];

          $find = 1;
          break;
        }

      }

      if ($find == 0) {
        $id = $_SESSION["currentProduct"]["product_id"];  
        $_SESSION["items"][$id]["product_id"] = $_SESSION["currentProduct"]["product_id"];
        $_SESSION["items"][$id]["product_name"] = $_SESSION["currentProduct"]["product_name"];
        $_SESSION["items"][$id]["unit_price"] = $_SESSION["currentProduct"]["unit_price"];
        $_SESSION["items"][$id]["unit_quantity"] = $_SESSION["currentProduct"]["unit_quantity"];
        $_SESSION["items"][$id]["quantity"] = $_REQUEST["quantity"];
       
      }

      $number = 0;
      foreach ($_SESSION["items"] as $item){

        $number += $item["quantity"];

      }
    }

} 
      $total_number = 0;
      foreach ($_SESSION["items"] as $item){
        $total_number += $item["quantity"];
      }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    
    <?php 
    
    echo "<link rel=\"stylesheet\" type=\"text/css\" href=\"../css/bottom-right.css\" />";
    
    ?>
  

</head>
<body>

<div id="info-banner" style="display:none" class="alert alert-info">
  <strong>Note:</strong> No items! 
</div>


<hr>



<div class="container">
    <h4>Cart 
      <span class="price" style="color:black">
        
        <b id='number-items'><?php echo $total_number;?></b>
      </span>
    </h4>
      
    <?php 
      foreach($_SESSION["items"] as $product){ ?>
        <p><?php echo $product["product_name"];?> * <?php echo $product["quantity"];?><span class="price">$<?php echo $product["unit_price"]*$product["quantity"];?></span></p>
    <?php } ?>

    <hr>

    <p>Total <span class="price" style="color:black"><b>$
    <?php
    $total = 0;
    foreach($_SESSION["items"] as $product){
      $total += $product["unit_price"]*$product["quantity"];
    }
    echo $total;
    ?></b></span></p>
</div>



<script>
  document.getElementById("checkout-btn").onclick=checkout;
  function checkout() {	
    
    var number = document.getElementById("number-items").innerHTML;
    console.log(number);
    if (number != 0) 
    {
      //show
      var popup = document.getElementById("info-banner");
      popup.classList.toggle("show");

            
    } else {

    }
  }
</script>

<a href="bottom-right.php?clear=1" target="bottom-right" class="clear_button" style="float:right;">CLEAR</a>
<a href="top-right.php?showcheckoutForm=1" target="top-right" class="checkout_button" id="checkout-btn">CHECKOUT</a>
</body>
</html>