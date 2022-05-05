<?php require 'navbar.php'?>
<div class = "guestID">
<?php

include 'dbconnection.php';
   $email = $_SESSION['email'];
   $name; $sname; $country; $city; $userAddr; $postcode; $comp;
   $sql = "SELECT * FROM user WHERE email = '$email'"; //You don't need a ; like you do in SQL
   $result = $conn->query($sql);
   if($row = $result->fetch_assoc()){
        $name = $row['first_name'];
        $sname = $row['surename'];
        $country = $row['country'];
        $city = $row['city'];
        $userAddr = $row['user_addr'];
        $postcode = $row['post_code'];
        $comp = $row['company'];
   }
?>

<fieldset><legend>User update</legend></fieldset>

<form method="post" action="proceed.php">

  <label for="fname">First name:</label><br>
  <input type="text" id="fname" name="fname" value="<?php echo $name?>"><br>

  <label for="sname">Surname:</label><br>
  <input type="text" id="sname" name="sname" value="<?php echo $sname?>"><br>

  <label for="country">Country:</label><br>
  <input type="text" id="country" name="country" value="<?php echo $country?>"><br>
  
  <label for="city">City:</label><br>
  <input type="text" id="city" name="city" value="<?php echo $city?>"><br>

  <label for="pcode">Post code:</label><br>
  <input type="text" id="pcode" name="pcode" value="<?php echo $postcode?>"><br>
  
  <label for="addr">Address:</label><br>
  <input type="text" id="addr" name="addr" value="<?php echo $userAddr?>"><br>

  <label for="company">Company:</label><br>
  <input type="text" id="company" required="required" name="company" value="<?php echo $comp?>"><br>

  <input type="submit" id = "guestBut" class="btn btn-primary" name="update" value="Make changes">

</form>
</div>
<?php include 'footer.php';?>
<?php  mysqli_close($conn);?>

</body>
</html>