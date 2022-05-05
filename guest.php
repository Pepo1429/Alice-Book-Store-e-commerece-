<?php require 'navbar.php'?>
<div class = "guestID">

<fieldset><legend>Guest information</legend></fieldset>

<form method="post" action="guestInsert.php">

  <label for="fname">First name:</label><br>
  <input type="text" id="fname" name="fname" value=""><br>

  <label for="sname">Surname:</label><br>
  <input type="text" id="sname" name="sname" value=""><br>

  <label for="email">Email:</label><br>
  <input type="text" id="email" name="email" value=""><br>

  <label for="country">Country:</label><br>
  <input type="text" id="country" name="country" value=""><br>
  
  <label for="city">City:</label><br>
  <input type="text" id="city" name="city" value=""><br>

  <label for="pcode">Post code:</label><br>
  <input type="text" id="pcode" name="pcode" value=""><br>
  
  <label for="addr">Address:</label><br>
  <input type="text" id="addr" name="addr" value=""><br>

  <input type="submit" id = "guestBut" class="btn btn-primary" name="guestOrder" value="Buy as guest">

</form>
</div>
<?php include 'footer.php';?>

</body>
</html>