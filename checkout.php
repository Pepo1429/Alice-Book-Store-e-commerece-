<?php require 'navbar.php'?>
<div class = "buyerID">


<div class="userData">
  <?php $guest = 0; $educDis = 0; $compDis = 0; $afterDis = 0; $total = $_SESSION['total'];
        if (!empty($_SESSION['email'])){
       include 'dbconnection.php';
       $email = $_SESSION["email"];  
       $sql = "SELECT * FROM user Where email = '$email'"; //You don't need a ; like you do in SQL
       $result = $conn->query($sql);?>
    <h2>User Information</h2>
    <a>Name: </a><?php echo $row['first_name'] ?><br>
    <a>Sure name: </a><?php echo $row['surename'] ?><br>
    <a>Email: </a><?php echo $row['email'] ?><br>
    <a>Country: </a><?php echo $row['country'] ?><br>
    <a>City: </a><?php echo $row['city'] ?><br>
    <a>Post Code: </a><?php echo $row['user_addr'] ?><br>
<?php 
  if(empty($row['education'])&&!empty($row['company'])){
       $compDis = 1;
       $disc = $_SESSION["disc"];
       $afterDis = $disc/$total;
       $afterDis = $total - $afterDis;
        }
  else if (!empty($row['education'])&&empty($row['company'])){
        $educDis = 1;
        $afterDis = 0.80 * $total;
    }
    else if (empty($row['education'])&&empty($row['company'])){
        $afterDis = $total;
    }

} else { $guest = 1; $afterDis = $total;} ?>

<h2>Purchase Information</h2>
<h2>Cart: </h2>
<?php 
$cart = array();
$cart = $_SESSION['array'];
$cartSize = count($cart);
for ($i = 0; $i <= $cartSize-1; $i++) { ?>
  <a>"</a><?php echo $cart[$i] ?><a>"</a><br>
<?php } ?>
<h3 style="color:red;">Total amount before discount: <?php echo $total;?> $.</h3>
<h3 style="color:green;">Total amount: <?php echo $afterDis;?> $ after the discount.</h3>
</div> 
<?php if($guest == 0){?>
<form method="post" action="placeorder.php">
   <input type = "submit" id = "placeBut" class="btn btn-primary" value = "Place order"name="order"><td>
</form> <?php } else if ($guest == 1){ ?>
    <form method="post" action="guest.php">
    <input type = "submit" id = "placeBut" class="btn btn-primary" value = "Guest order"  name="order"><td>
    </form>
  <?php }  ?>
</div>

   <?php mysqli_close($conn);?>

</body>
</html>