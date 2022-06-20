
<html>

<head>
<style>
  .asterisk:after { content:"*";color:red; }
</style>
</head>
<body>

      <form action="../php/summary.php" method="post" target="_blank">
      <form action="../php/clear.php" method="post" target="_blank">
      
      
            <h3>Contact Details</h3>
            <label class="asterisk" > Full Name</label>
            <input type="text"   name="firstname"  required >
            <label class="asterisk"> Email </label>
            <label id="validate"   style="color:red"></label>
            <input type="email"  id="email" name="email"  required>
            <label class="asterisk"> Address </label>
            <input type="text" id="adr" name="address" required>
            <label class="asterisk"> Suburb </label>
            <input type="text" id="city" name="city"  required>
            <label class="asterisk">State </label>
            <input type="text" id="state" name="state"  required>
            <label class="asterisk">Country</label>
            <input type="text" id="country" name="country"  required>
        

        
        <input type="submit" value="Purchase" class="btn" >
        
      </form>
 
</body>
</html>




