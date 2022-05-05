<?php
 session_start();

if(empty($_SESSION['array'])){
$cart = array( );
 $cart = $_POST['itemArray'];
 $_SESSION['array'] = $cart;
}
 else {
    $oldCart = array();
    $oldCart = $_SESSION['array'];
    $updateCart = $_POST['itemArray'];
   $newCart = array_merge($oldCart,$updateCart);

    $_SESSION['array'] = $newCart;
    header("Location: cart-list.php");
}
?>