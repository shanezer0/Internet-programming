<?php

error_reporting(E_ERROR);
session_start();

?>

<!DOCTYPE html>
<html lang="en">
<head>
	
	<title>Document</title>
	
	
	<?php echo "<link rel=\"stylesheet\" type=\"text/css\" href=\"../css/top-right.css\" />"; ?>
	
</head>
<body>

<?php

	if (isset($_REQUEST['data'])) 
	{
		$ID = $_REQUEST['data'];
		$_SESSION["currentID"] = $ID;
		// $connection = mysqli_connect("aa1am8hq1oqswpr.c3plv9oivdwe.us-east-1.rds.amazonaws.com","uts","password","assignment1");
		$connection = mysqli_connect("localhost","root","password","assignment1");
		$query_string = "select * from products where (product_id = $ID)";		 
		$result=mysqli_query($connection,$query_string);		 
		$num_rows=mysqli_num_rows($result);

		if ($num_rows > 0 ) {
			
			if ( $a_row = mysqli_fetch_array($result))
			{										
				
				echo "<table id='Products_Data'>";
				echo "<tr>\n";
				echo "<th>Product</th>";
				echo "<th>Price($)</th>";
				echo "<th>Quantity</th>";
				echo "<th>Stock Available</th>";
				echo "</tr>";

				echo "<tr>\n";
				echo "<td>$a_row[product_name]</td>";
				echo "<td>$a_row[unit_price]</td>";
				echo "<td>$a_row[unit_quantity]</td>";
				echo "<td>$a_row[in_stock]</td>";
				echo "</tr>";

				echo "</table>";

				$_SESSION["currentProduct"] = $a_row;

				echo '
				<div>
				<form action="bottom-right.php" method="get" target="bottom-right" onsubmit="return validate_quantity()" style="padding-top:4%">
					Quantity (between 1 and 20):
					<input type="number" class="number-box" id="quantity" name="quantity" min="1" value="1">
					<input type="submit" class="add-quantity-button" value="ADD">
				 </form>
				 </div>';
				 mysqli_close($connection);
				 
			}
			
		}
			
	
	} 
	
	if( $_REQUEST["showcheckoutForm"] == 1 )
	{
		if($_SESSION["items"] > 0)
		{
			require('checkoutform.php');
		}
		else{
			echo '<script language="javascript">';
			echo 'alert("Cart Cannot be Empty!")';
			echo '</script>';
		}
		
		
	}

?>

<script>
	function validate_quantity(){
		var quantity = document.getElementById("quantity").value;

		if (quantity > 20) {
			alert("quantity should less than 20");
    		return false;			
		} 
		return true;
	}
	
</script>
</body>
</html>

