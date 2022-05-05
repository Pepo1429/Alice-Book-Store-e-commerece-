<?php require 'navbar.php' ?>

<?php
include 'dbconnection.php';

   $sql = "SELECT * FROM items WHERE category = 'Book'"; //You don't need a ; like you do in SQL
   $result = $conn->query($sql);
?>
<div class = "itemsShow">
 <?php  
 $cartArr = array();
 while($row = $result->fetch_assoc()){ ?> 
<div id = "gridItem" class="col col-md-3" style="width: 18rem;">
<h5 class="card-title"><?php echo $row['item_name'] ?></h5>

  <img class="card-img-top" src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($row['img']); ?>" width='100' height='250' alt="Card image cap">
  <div class="card-body">
    <?php $name = $row['item_name'] ?>
    <p class="card-text">Description: <?php echo $row['descript'] ?></p>
  </div>
  <ul class="list-group list-group-flush">
    <li class="list-group-item"><a>Category: </a><?php echo $row['category'] ?></li>
    <li class="list-group-item">Quantity: </a><?php echo $row['in_stock'] ?></li>
    <li class="list-group-item"><a>Price: </a><?php echo $row['price'] ?><a>$</a></li>
  </ul>
  <div class="card-body">
  <button type="submit" class="btn btn-primary"id="addCart" name="cart" onclick = "addtoCart('<?php echo $name ?>')">Add to Cart</button>
  </div>
  </div>

  <?php }  ?>
 </div>
 <?php include 'footer.php';?>

  

 <?php  mysqli_close($conn);?>
</body>
</html>