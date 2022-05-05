<?php 
include 'dbconnection.php';
session_start(); 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <script src="functions.js"></script>
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
<link rel="stylesheet" type="text/css" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">

    <title>Home</title>
    <style>
        body{ font: 14px sans-serif; text-align: center; }
    </style>

</head>
<body>
<div class = "top">
<hr id = "topline" style="height:10px;border-width:0;color:gray;background-color:#A00000;">
<div class = "logo">
<a href="home.php">
    <img src="Logo.png" width=" 154" height="60">
</a>
</div>

<div class = "search">
    <input type="text" placeholder="Just write something, we have it..." name="search" id = "search">
    <a href="something" class="bt1">Search</a>
</div>

<?php $company='';
      $education='';

    if (!isset($_SESSION['staff'])) { ?>
    <div class = "userInfo">
    <a href = "login.php">Sign In</a>
    <a href = "register.php">Sign Up</a>
    <div id="cart-container">
      <div id="cart">
      <a id="itemCount">0</a>
      <button id = "cartBut" href = "cart.php" onclick = " sendToCart()" class="fa fa-shopping-cart fa-2x" aria-hidden="true"></a>
      <button id = "clean" type = "button" onclick = "deleteCart()">Clean</button>
      </div>
    </div>
    </div>
<?php } 
        else{
            $email = $_SESSION["email"];
            $sql = "SELECT * FROM user WHERE email = '$email'"; //You don't need a ; like you do in SQL
            $result = $conn->query($sql);
            $row = $result->fetch_assoc(); 
          $company =  $row['company'];
          $education = $row['education']; 
          $disc =  $row['disc']?>
            <div class = "userInfo">
                <div class="dropdown show">
                  <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Hi, <?php echo $row['first_name']?> 
                  </a>
                  <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                    <a>Email: </a><?php echo $row['email'] ?></a><br>
                    <a>Status: </a><?php echo $row['status_user']?></a><br>
                    <?php if(!empty($education)){ ?>
                      <a>Education Account: 20% off</a>
                   <?php } ?>
                   <?php  if(!empty($company)){ 
                        $_SESSION["disc"] = $disc;
                    ?>
                      <a>Office account: <?php echo $disc; ?>% discount</a><br>
                      <a href = "changeAccount.php">Update account</a>
                   <?php } ?>
                   <?php  if(empty($education)&&empty($company)){?>
                      <a>Standart Account</a>
                   <?php } ?>
                    <form action="logout.php" method="POST">
                        <input type="submit" name="destroySession" id = "exit" value="Logout" />
                    </form>
                  </div>
                </div>
              </div>

              <div id="cart-container">
                <div id="cart">
                <a id="itemCount">0</a>

                  <button id = "cartBut" href = "cart.php" onclick = " sendToCart()" class="fa fa-shopping-cart fa-2x" aria-hidden="true"></a>
                  <button id = "clean" type = "button" onclick = "deleteCart()">Clean</button>
                </div>
              </div>
           <?php mysqli_close($conn); }?>

<?php if (!empty($education)) { ?>

<div class = "navbar">
  <a href = "home.php" id = "nav"  >Home</a>
  <a href = "books.php" id = "nav"  >Books</a>
  <a href = "stationery.php" id = "nav"  >Stationeries</a>
  <a href = "contact.php" id = "nav"  >Contact us </a>
  <a href = "privacy_notice.php" id = "nav"  >Privacy Notice </a>
  <a href = "#" id = "nav"  >About </a>
</div>
<hr id = "line" style="height:1px;border-width:0;color:gray;background-color:gray;">

<?php } 
      else if (!empty($company)){?>
    <div class = "navbar">
    <a href = "home.php" id = "nav"  >Home</a>
    <a href = stationery.php id = "nav"  >Stationeries</a>
    <a href = "services.php" id = "nav"  >Services</a>
    <a href = "contact.php" id = "nav"  >Contact us </a>
    <a href = "privacy_notice.php" id = "nav"  >Privacy Notice </a>
    <a href = "#" id = "nav"  >About </a>
    </div>
    <hr id = "line" style="height:1px;border-width:0;color:gray;background-color:gray">

    <?php } 
            else{ ?>
    <div class = "navbar">
    <a href = "home.php" id = "nav"  >Home</a>
    <a href = "books.php" id = "nav"  >Books</a>
    <a href = "stationery.php" id = "nav"  >Stationeries</a>
    <a href = "services.php" id = "nav"  >Services</a>
    <a href = "contact.php" id = "nav"  >Contact us </a>
    <a href = "privacy_notice.php" id = "nav"  >Privacy Notice </a>
    <a href = "#" id = "nav"  >About </a>
    </div>  
    <hr id = "line" style="height:1px;border-width:0;color:gray;background-color:gray">


  <?php  } ?>
  </div>

</body>
</html>