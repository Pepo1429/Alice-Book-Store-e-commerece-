<?php
session_start();

if($_SESSION["staff"] !== "Yes"){
    header("location: staff-login.php");
    exit;
}

?>
<!doctype html>

<meta charset="UTF-8">
    <script src="functions.js"></script>
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
<link rel="stylesheet" type="text/css" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Staff Panel</title>

</head>

<body>
<body>
<div class = "top">
<hr id = "topline" style="height:10px;border-width:0;color:gray;background-color:#A00000;">
<div class = "logo">
<a href="homepage.php">
    <img src="Logo.png" width=" 154" height="60">
</a>
</div>
<div class="navbarAdmin">
<a id = "navA" href = "/addItem.php" id = "add" >Add Item</a>
  <a id = "navA"href = "/orders.php" id = "order" >Awaiting Orders</a>
    <hr id = "line" style="height:1px;border-width:0;color:gray;background-color:gray;">

  </div>

  <form action="logout.php" method="POST">
  <input id ="logoutBut" type="submit" name="destroySession" id = "exit" value="Logout" />
  </form>

  <div id="staffOptions">
  </div>



</body>
<?php include 'footer.php';?>

</html>