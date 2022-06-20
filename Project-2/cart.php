<html>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
<head>
    <title>UTS Car Renting</title>
</head>
<body>

<div>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
          <a class="navbar-brand" href="base.html" style="font-size: 35px;" >Hertz-UTS</a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNav" >
            <ul class="navbar-nav ml-auto">
              <li class="nav-item  navbar-right">
                <a class="nav-link" href="cart.php"   style="font-size: 30px;" target="_self"  >Cart</a>
              </li>
            </ul>
          </div>
        </nav>
      </div>


<div class="cartDetails">
    <div class="container">
        <div class="col-sm-12" id="cartDetails">
            <div class="head">
                <p></p>
                <h1 style="text-align: center;">Car Reservation</h1>
                <p></p>
               <form action='checkout.php' target='_blank' onsubmit='return days()'>
                    <table class="table">
                        <thead class="thead-light">
                        <tr style="text-align: center; vertical-align: middle;">
                            <th scope="col">Image</th>
                            <th scope="col">Vehicle</th>
                            <th scope="col">Price Per Day</th>
                            <th scope="col">Rental days</th>
                            <th scope="col">Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                              <?php
                                    session_start();
                                    if(!isset($_SESSION['cart']) || empty($_SESSION['cart'])){
			                                
			                                echo  "<script language='JavaScript'>alert('No car has been reserved');window.location.href = 'base.html'</script>";
                                            
                                          
		                             }
                                    else{

                                        $totalMony = 0;
                                        foreach ($_SESSION['cart'] as $key=>$value){

                                            $content =  '<tr style="text-align: center;">' .

                                                '<td>'.'<img src="'.$value['Image'].'" width = "150px" height="100px">'.'</td>'.
                                                '<td>'.$value['CarName']."-".$value['Category']."-".$value['Mileage'].'</td>'.
                                                '<td>'.$value['PricePerDay'].'</td>'.
                                                '<td>'.'<input name="days[]"  id="days" type="text" value=1>'.'</td>'.
                                                '<td>'.'<a href="clear.php?id='.$value['ID'].'">'."Delete".'</a>'.'</td>'.
                                                '</tr>';
                                            echo $content;

                                        }
                                    }

                              ?>


                        </tbody>
                    </table>
                   <input type="submit"  id = "checkOutButton" class = "btn btn-danger" value="check out">
               </form>
            </div>
        </div>
    </div>
</div>
</body>


</html>

<script language="JavaScript">
    function days() {
        var days = parseInt(document.querySelector("#days").value);


        if(days < 0 || days == 0 || isNaN(days)){
            alert("");
            return false;
        }
        return true;
    }

    

</script>
