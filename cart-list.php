
<?php require 'navbar.php' ?>

<div class = "itemsShow">

<?php

include 'dbconnection.php';
$cart = array( );
$index = 0;
$total = 0;
if(empty($_SESSION['array'])){
  $cart = array("No items");
  $price = 0;
}
else
 $cart = $_SESSION['array'];

 if(isset($_POST['removeItem'])) {
    $key = $_POST['removeItem'];
        deleteItem($key);
 }
 function deleteItem($value) {
    unset($_SESSION['array'][$value]);
    $oldCart = array();
    $oldCart = $_SESSION['array'];
    unset($oldCart[$value]);
    $updateCart = array_values($oldCart);

    $_SESSION['array'] = $updateCart;
    header("Location: cart-list.php");

}
 foreach($cart as $name){
   
   $sql = "SELECT * FROM items WHERE item_name = '$name' "; //You don't need a ; like you do in SQL
   $result = $conn->query($sql);

?>
 <?php  
 while($row = $result->fetch_assoc()){  $price = $row['price'];?> 
<div id = "gridItem" class="col col-md-3" style="width: 18rem;">
<h5 class="card-title"><?php echo $row['item_name'] ?></h5>

  <img class="card-img-top" src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($row['img']); ?>" width='100' height='250' alt="Card image cap">
  <div class="card-body">
    <?php $name = $row['item_name'] ?>
  </div>
  <ul class="list-group list-group-flush">
    <li class="list-group-item"><a>Category: </a><?php echo $row['category'] ?></li>
    <li class="list-group-item"><a>Price: </a><?php echo $row['price'] ?><a>$</a></li>
  </ul>
  <div class="card-body">
  <form method="post">
   <button type = "submit" value = <?php echo ($index);?> id="addCart" class="btn btn-primary" name="removeItem" onclick = "">Remove Item</button>
   </form>  </div>
  </div>
  <?php   
} $index++; $total = $total + $price;  }  ?>
 <div class = "checkout">
 <a id = "checkoutText">Total Price: <?php echo $total; $_SESSION['total'] = $total;
?>$</a>
 <form method="post" action="checkout.php">
 <button type="submit" id = "checkoutBut" name="checkout" class="btn btn-secondary">Checkout</button>
</form>
</div>
</div>
  


 <?php  mysqli_close($conn);?>
 <hr>

</body>
</html>
    